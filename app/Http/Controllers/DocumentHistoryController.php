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

    public function index()
    {
        $history = DocumentHistory::all();
        return view('history', compact('history'));
    }
}
