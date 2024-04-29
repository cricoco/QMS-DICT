<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcom');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
});->name('dashboard');

Route::get('/UploadPage','App\Http\Controllers\UploadDataContorller@index');

ROute::post('/UploadPage','App\Http\Controller\UploadDataController@store');
