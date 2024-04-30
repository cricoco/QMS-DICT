<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        return view ('documents.index')->with('documents', $documents);
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
        // $input = $request->all();
        // Document::create($input);
        // return redirect('document')->with('flash_message', 'Document Added!'); 
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'mobile' => 'required|string',
            'file' => 'required|file|max:2048', // Adjust the file size limit as needed
      ]);

      // Handle file upload
      if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets', $filename);
      }

      // Create a new document record
      $document = new Document();
      $document->name = $request->name;
      $document->address = $request->address;
      $document->mobile = $request->mobile;
      $document->file = $filename; // Store the file name in the database
      $document->save();

      // Redirect back with a success message
      return redirect()->back()->with('success', 'Document added successfully.');
        
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
        return view('documents.show')->with('documents', $documents);
        
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
        return view('documents.edit')->with('documents', $documents);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $documents = Document::find($id);
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
        Document::destroy($id);
        return redirect('documents')->with('flash_message', 'Document deleted!');  
    }
     
    public function download(Request $request,$id)
    {

        return response()->download(public_path('assets/'.$id));
    }
}

