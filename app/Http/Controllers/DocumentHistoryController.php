<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentHistory;
use App\Models\Document; 


class DocumentHistoryController extends Controller
{
    // public function show($id)
    // {
    //     $histories = DocumentHistory::find($id);
    //     return view('histories.show')->with('histories', $histories);
        
    // }

    public function index(Request $request)
    {
        
        $history = DocumentHistory::orderBy('updated_at', 'desc')->paginate(10);
        
        return view('history')->with('history', $history);
    }

    public function specifichistory($id)
    {
        // Get the doc_ref_code of the document with the given id
        $doc_ref_code = Document::where('id', $id)->value('doc_ref_code');

        // Search for documents with the same doc_ref_code but different IDs
        $related_documents = Document::where('doc_ref_code', $doc_ref_code)
            ->where('id', '!=', $id)
            ->pluck('id');

        // get history for the related documents along with the current document
        $history = DocumentHistory::whereIn('document_id', $related_documents->push($id)->toArray())
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('specifichistory')->with('history', $history);
    }
}
