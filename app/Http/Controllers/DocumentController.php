<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Document;

class DocumentController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming file. Refuses anything bigger than 2048 kilobyes (=2MB)
        $request->validate([
            'file_upload' => 'required|mimes:pdf,jpg,png|max:2048',
        ]);

        // Store the file in storage\app\public folder
        $file = $request->file('file_upload');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');

        // Store file information in the database
        $uploadedFile = new Document();
        $uploadedFile->filename = $fileName;
        $uploadedFile->original_name = $file->getClientOriginalName();
        $uploadedFile->file_path = $filePath;
        $uploadedFile->save();

        // Redirect back to the index page with a success message
        return redirect()->route('documents.index')
            ->with('success', "File `{$uploadedFile->original_name}` uploaded successfully.");
    }

    // shows the create form
    public function create()
    {
        return view('documents.create');
    }

    // shows the uploads index
    public function index()
    {
        $uploadedFiles = DocumentController::all();
        return view('documents.index', compact('uploadedFiles'));
    }    
     
}

