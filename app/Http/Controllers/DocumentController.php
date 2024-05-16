<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentHistory;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $sortBy = $request->input('sort_by', 'revision_num');
        $sortDirection = $request->input('sort_dir', 'desc');

        $documents = Document::where('status', 'Active') // Add this condition for active documents
        ->where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('doc_ref_code', 'LIKE', "%$query%")
            ->orWhere('doc_title', 'LIKE', "%$query%")
                ->orWhere('dmt_incharged', 'LIKE', "%$query%")
                ->orWhere('division', 'LIKE', "%$query%")
                ->orWhere('process_owner', 'LIKE', "%$query%")
                ->orWhere('status', 'LIKE', "%$query%")
                ->orWhere('doc_type', 'LIKE', "%$query%")
                ->orWhere('request_type', 'LIKE', "%$query%")
                ->orWhere('request_reason', 'LIKE', "%$query%")
                ->orWhere('requester', 'LIKE', "%$query%")
                ->orWhere('request_date', 'LIKE', "%$query%")
                ->orWhere('revision_num', 'LIKE', "%$query%")
                ->orWhere('effectivity_date', 'LIKE', "%$query%")
                ->orWhere('file', 'LIKE', "%$query%");
        })
        ->orderBy($sortBy, $sortDirection)
        ->paginate(10)
        ->appends(['search' => $query, 'sort_by' => $sortBy, 'sort_dir' => $sortDirection]);

        

        foreach ($documents as $document) {
            $this->archiveOlderRevisions($document);
        }
         return view('documents.index')->with('documents', $documents);
    }


    private function archiveOlderRevisions($document)
    {
        $latestRevision = Document::where('doc_ref_code', $document->doc_ref_code)
            ->orderBy('revision_num', 'desc')
            ->first();

        if ($document->id !== $latestRevision->id) {
            // If this document is not the latest revision, mark it as obsolete
            $document->status = 'Obsolete';
            $document->save();

            // Log the archival operation
            DocumentHistory::create([
                'username_id' => auth()->id(),
                'document_id' => $document->id,
                'operation' => 'archived',
            ]);
        }
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // $fileName = time() . '_' . $file->getClientOriginalName();
            $fileName = $file->getClientOriginalName() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $fileName); // Adjust storage path as needed
            $input['file'] = $fileName;
        }
        
        $documentRefCode = $input['doc_ref_code'];
        $existingDocument = Document::where('doc_ref_code', $documentRefCode)
        ->orderBy('revision_num', 'desc') // Order by revision number descending
        ->first();
        if ($existingDocument) {
            // If exists, get the maximum revision number and increment it
            $revisionNumber = intval($existingDocument->revision_num) + 1;
        } else {
            // If doesn't exist, set revision number to 0
            $revisionNumber = 0;
        }
        $input['revision_num'] = $revisionNumber;


        $documents = Document::create($input);

        DocumentHistory::create([
            'username_id' => auth()->id(), 
            'document_id' => $documents->id,
            'operation' => 'created',
        ]);
           
        return redirect('document')->with('flash_message', 'Document Added!'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documents = Document::find($id);
        // return view('documents.show')->with('documents', $documents);
        return response()->json($documents);
        
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documents = Document::find($id);
        // return view('documents.edit')->with('documents', $documents);
        return response()->json([
            'status'=>200,
            'document'=>$documents,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $doc_id = $request->input('doc_id');
        $documents = Document::find($doc_id);

        DocumentHistory::create([
            'username_id' => auth()->id(),
            'document_id' => $documents->id,
            'operation' => 'updated',
        ]);

        $input = $request->all();
        $documents->update($input);
        return redirect('documents')->with('flash_message', 'Document Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Document::destroy($id);
        $document = Document::find($id);

        DocumentHistory::create([
            'username_id' => auth()->id(), 
            'document_id' => $document->id,
            'operation' => 'archived',
        ]);

        $document->status = 'Obsolete';
        $document->save();

        return redirect('documents')->with('flash_message', 'Document archived!');  
    }
     
    public function download(Request $request,$file)
    {

        $filePath = storage_path('app/public/documents/' . $file); // Adjust storage path as needed

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }
    
        return redirect()->back()->with('error', 'File not found.');
    }

    public function manuals(Request $request)
    {
        $searchQuery = $request->input('search');
        $sortBy = $request->input('sort_by', 'revision_num');
        $sortDirection = $request->input('sort_dir', 'desc');
        
        $documents = Document::whereIn('doc_type', ['Quality Manual', 'Operations Manual', 'Procedure Manual'])
                        ->where('status', 'Active')
                        ->when($searchQuery, function ($query) use ($searchQuery) {
                            $query->where('doc_ref_code', 'LIKE', "%$searchQuery%");
                            $query->orWhere('doc_title', 'LIKE', "%$searchQuery%");
                            $query->orWhere('dmt_incharged', 'LIKE', "%$searchQuery%");
                            $query->orWhere('division', 'LIKE', "%$searchQuery%");
                            $query->orWhere('process_owner', 'LIKE', "%$searchQuery%");
                            $query->orWhere('status', 'LIKE', "%$searchQuery%");
                        })
                        ->orderBy($sortBy, $sortDirection)
                        ->paginate(10)
                        ->appends(['search' => $searchQuery, 'sort_by' => $sortBy, 'sort_dir' => $sortDirection]);

                        foreach ($documents as $document) {
                            $this->archiveOlderRevisions($document);
                        }
    
        return view('documents.manuals')->with('documents', $documents);
    }
    
public function formats(Request $request)
    {
        $searchQuery = $request->input('search');
        $sortBy = $request->input('sort_by', 'revision_num');
        $sortDirection = $request->input('sort_dir', 'desc');
        
        $documents = Document::whereIn('doc_type', ['Quality Procedure Form', 'Corrective Action Request Form', 'Form/Template'])
                        ->where('status', 'Active')
                        ->when($searchQuery, function ($query) use ($searchQuery) {
                            $query->where('doc_ref_code', 'LIKE', "%$searchQuery%");
                            $query->orWhere('doc_title', 'LIKE', "%$searchQuery%");
                            $query->orWhere('dmt_incharged', 'LIKE', "%$searchQuery%");
                            $query->orWhere('division', 'LIKE', "%$searchQuery%");
                            $query->orWhere('process_owner', 'LIKE', "%$searchQuery%");
                            $query->orWhere('status', 'LIKE', "%$searchQuery%");
                        })
                        ->orderBy($sortBy, $sortDirection)
                        ->paginate(10)
                        ->appends(['search' => $searchQuery, 'sort_by' => $sortBy, 'sort_dir' => $sortDirection]);
    
                        foreach ($documents as $document) {
                            $this->archiveOlderRevisions($document);
                        }
        return view('documents.formats')->with('documents', $documents);
    }

}
