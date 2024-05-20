<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentHistory;

class PublicDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $sortBy = $request->input('sort_by', 'created_at');
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
         return view('publicdocuments.index')->with('documents', $documents);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documents = Document::find($id);
        return response()->json($documents);
        
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
        $sortBy = $request->input('sort_by', 'created_at');
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
    
        return view('publicdocuments.manuals')->with('documents', $documents);
    }
    


    public function formats(Request $request)
    {
        $searchQuery = $request->input('search');
        $sortBy = $request->input('sort_by', 'created_at');
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
        return view('publicdocuments.formats')->with('documents', $documents);
    }

}
