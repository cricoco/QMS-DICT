<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Requires user to be authenticated before accessing library */
Route::get('/home', function () {
    return view('home');                                 
})->middleware(['auth', 'verified'])->name('home');

Route::get('/home/library', function () {
    return view('library');                                 
})->middleware(['auth', 'verified'])->name('library');

// Route::get('/dashboard/manuals', function () {
//     return view('manuals');                                 
// })->middleware(['auth', 'verified'])->name('manuals');

// Route::get('/dashboard/formats', function () {
//     return view('formatz');                                 
// })->middleware(['auth', 'verified'])->name('manuals');


require __DIR__.'/auth.php';
