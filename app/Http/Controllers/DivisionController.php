<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    public function submitDivisionDetails(Request $request)
    {
        $submitDivision = new Division();
        $submitDivision->division_name = $request->input('division_name');
        $submitDivision->status = $request->input('status');
        $submitDivision->save();

        return redirect('/')->with('success', 'Form submitted successfully!');
    }
}
