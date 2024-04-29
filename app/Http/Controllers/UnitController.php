<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function submitUnitDetails(Request $request)
    {
        $submitUnit = new Unit();
        $submitUnit->division_id = $request->input('division_id');
        $submitUnit->unit_name = $request->input('unit_name');
        $submitUnit->status = $request->input('status');
        $submitUnit->save();

        return redirect('/')->with('success', 'Form submitted successfully!');
    }
}
