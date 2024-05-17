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
        
        $history = DocumentHistory::where('document_id', $id)
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
        
        return view('specifichistory')->with('history', $history);
    }
}
