<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Personal;

class UploadDataController extends Controller
  {
    public function index()
    {
      return view('uploadpage');
    }

    public function store(Request $request)
    {
        $data=new personal;

         if($request->file('file'))

             {
                 $file=request->file('file');
                 $filename=time().'.'.$file->getClientOriginalExtension();
                 $request->file->move('storage',$filename);

                 $data->file=$filename;
             }

             $data->name=$request->name;
             $data->email=$request->email;

             $data->save();

             return redirect->back();
    }
          
  }
