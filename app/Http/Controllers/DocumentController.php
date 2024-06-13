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
        $sortBy = $request->input('sort_by', 'created_at');
        $sortDirection = $request->input('sort_dir', 'desc');
        $type = $request->input('type');

        $documents = Document::where('status', 'Active') // Add this condition for active documents
        ->when($type, function ($query) use ($type) {
            // Filter by selected type (Internal or External)
            $query->where('type_intext', $type);
        })
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
                ->orWhere('file', 'LIKE', "%$query%")
                ->orWhere('type_intext', 'LIKE', "%$query%");
        })
        ->orderBy($sortBy, $sortDirection)
        ->paginate(10)
        ->appends([
            'search' => $query,
            'sort_by' => $sortBy,
            'sort_dir' => $sortDirection,
            'type' => $type
        ]);

        $availableDocuments = Document::select('doc_ref_code', 'doc_title')
        ->where('status', 'Active')
        ->distinct()
            ->get();


        foreach ($documents as $document) {
            $this->archiveOlderRevisions($document);
        }
        return view('documents.index')->with('documents', $documents)->with('availableDocuments', $availableDocuments);
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
    // public function create()
    // {
    //     $availableDocuments = Document::select('doc_ref_code', 'doc_title')
    //     ->where('status', 'Active')
    //     ->distinct()
    //         ->get();
    //     return view('documents.create', compact('availableDocuments'));
    // }

    public function showByDocRefCode(Request $request)
    {
        // $document = Document::find($id)->first();
        $document = Document::where('doc_ref_code', $request->doc_ref_code)
                            ->orderBy('revision_num', 'desc')
                            ->first();
        return response()->json($document);
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
            'status' => 200,
            'document' => $documents,
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

    public function download(Request $request, $file)
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
        $type = $request->input('type');

        $documents = Document::whereIn('doc_type', ['Quality Manual', 'Operations Manual', 'Procedure Manual'])
        ->where('status', 'Active')
        ->when($type, function ($query) use ($type) {
            // Filter by selected type (Internal or External)
            $query->where('type_intext', $type);
        })
        ->when($searchQuery, function ($query) use ($searchQuery) {
            $query->where(function ($queryBuilder) use ($searchQuery) {
                $queryBuilder->orWhere('doc_ref_code', 'LIKE', "%$searchQuery%")
                ->orWhere('doc_title', 'LIKE', "%$searchQuery%")
                ->orWhere('dmt_incharged', 'LIKE', "%$searchQuery%")
                ->orWhere('division', 'LIKE', "%$searchQuery%")
                ->orWhere('process_owner', 'LIKE', "%$searchQuery%");
            });
        })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10)
            ->appends([
                'search' => $searchQuery,
                'sort_by' => $sortBy,
                'sort_dir' => $sortDirection,
                'type' => $type
            ]);

        $availableDocuments = Document::select('doc_ref_code', 'doc_title')
        ->where('status', 'Active')
        ->distinct()
            ->get();

        foreach ($documents as $document) {
            $this->archiveOlderRevisions($document);
        }

        return view('documents.manuals')->with('documents', $documents)->with('availableDocuments', $availableDocuments);
    }


    public function formats(Request $request)    // FIX SEARCHING. IT INCLUDED THE OBSOLETE
    {
        $searchQuery = $request->input('search');
        $sortBy = $request->input('sort_by', 'created_at');
        $sortDirection = $request->input('sort_dir', 'desc');
        $type = $request->input('type');

        $documents = Document::whereIn('doc_type', ['Quality Procedure Form', 'Corrective Action Request Form', 'Form/Template'])
        ->where('status', 'Active')
        ->when($type, function ($query) use ($type) {
            // Filter by selected type (Internal or External)
            $query->where('type_intext', $type);
        })
        ->when($searchQuery, function ($query) use ($searchQuery) {
            $query->where(function ($queryBuilder) use ($searchQuery) {
                $queryBuilder->orWhere('doc_ref_code', 'LIKE', "%$searchQuery%")
                ->orWhere('doc_title', 'LIKE', "%$searchQuery%")
                ->orWhere('dmt_incharged', 'LIKE', "%$searchQuery%")
                ->orWhere('division', 'LIKE', "%$searchQuery%")
                ->orWhere('process_owner', 'LIKE', "%$searchQuery%");
            });
        })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10)
            ->appends([
                'search' => $searchQuery,
                'sort_by' => $sortBy,
                'sort_dir' => $sortDirection,
                'type' => $type
            ]);

        $availableDocuments = Document::select('doc_ref_code', 'doc_title')
        ->where('status', 'Active')
        ->distinct()
            ->get();

        foreach ($documents as $document) {
            $this->archiveOlderRevisions($document);
        }
        return view('documents.formats')->with('documents', $documents)->with('availableDocuments', $availableDocuments);
    }

    public function archives(Request $request)
    {
        $query = $request->input('search');
        $sortBy = $request->input('sort_by', 'created_at');
        $sortDirection = $request->input('sort_dir', 'desc');
        $type = $request->input('type');

        $documents = Document::where('status', 'Obsolete') // Add this condition for active documents
        ->when($type, function ($query) use ($type) {
            // Filter by selected type (Internal or External)
            $query->where('type_intext', $type);
        })
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
                ->orWhere('file', 'LIKE', "%$query%")
                ->orWhere('type_intext', 'LIKE', "%$query%");
        })
        ->orderBy($sortBy, $sortDirection)
        ->paginate(10)
        ->appends([
            'search' => $query,
            'sort_by' => $sortBy,
            'sort_dir' => $sortDirection,
            'type' => $type
        ]);

        $availableDocuments = Document::select('doc_ref_code', 'doc_title')
        ->where('status', 'Active')
        ->distinct()
            ->get();

        return view('archives')->with('documents', $documents)->with('availableDocuments', $availableDocuments);
    }

    public function checkDocumentExists(Request $request)
    {
        $docRefCode = $request->input('doc_ref_code');
        $existingDocument = Document::where('doc_ref_code', $docRefCode)
                                    ->orderBy('revision_num', 'desc')
                                    ->first();

        return response()->json(['exists' => !!$existingDocument]);
    }

    public function uploadCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
            'document_files.*' => 'file|mimes:doc,docx,xls,xlsx,pdf|max:30720'
        ]);

        $file = $request->file('csv_file');
        $csvData = array_map('str_getcsv', file($file->getRealPath()));

        // Assuming the CSV has a header row
        $header = array_shift($csvData);

        foreach ($csvData as $row) {
            $data = array_combine($header, $row);

            // Check if the document with the same doc_ref_code and revision_num exists
            $documentExists = Document::where('doc_ref_code', $data['doc_ref_code'])
                                      ->where('revision_num', $data['revision_num'])
                                      ->exists();

            if ($documentExists) {
                // Skip this iteration if the document already exists
                continue;
            }

            $document = new Document([
                'doc_ref_code' => $data['doc_ref_code'],
                'doc_title' => $data['doc_title'],
                'request_date' => $data['request_date'],
                'revision_num' => $data['revision_num'],
                'effectivity_date' => $data['effectivity_date'],
                'process_owner' => $data['process_owner'],
                'type_intext' => $data['type_intext'],
                'file' => $data['file'],
                'division' => $data['division'],
                'unit' => $data['unit'],
                'request_reason' => $data['request_reason'],
                'request_type' => $data['request_type'],
                'requester' => $data['requester'],
                'created_at' => $data['created_at'],
                'updated_at' => $data['update_at']
            ]);
            $document->save();

            $user_history_id = $data['revision_num'] == 0 ? auth()->id() : $data['user_revision_id'];

            DocumentHistory::create([
                'username_id' => $user_history_id,
                'document_id' => $document->id,
                'operation' => 'created',
                'created_at' => $data['created_at']
            ]);
        }

        // Handle the document files
        if ($request->hasFile('document_files')) {
            foreach ($request->file('document_files') as $uploadedFile) {
                $filename = $uploadedFile->getClientOriginalName();
                $path = $uploadedFile->storeAs('public/documents', $filename);

                // Save file information to the database if needed
                // You can link these files to the corresponding documents or create new records
            }
        }

        return redirect()->route('documents.index')->with('flash_message', 'CSV uploaded successfully.');
    }
}
