<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadDataController extends Controller
  {
    public function index()
    {
      return view('uploadpage');
    }
  }
