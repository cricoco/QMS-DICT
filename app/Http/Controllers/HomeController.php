<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() 
    {
        if (Auth::check()) {
            $usertype = Auth::user()->role_id;

            if ($usertype == 0) {
                return view('publichome');
            } elseif ($usertype == 1) {
                return view('home');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login'); // Redirect to login page if user is not logged in
        }
    }
}
