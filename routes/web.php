<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
});

Route::get('/library', function () {
    return view('library');
});

Route::get('/manuals', function () {
    return view('manuals');
});

Route::get('/forms', function () {
    return view('forms');
});
