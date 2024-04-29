<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//======================
use App\Http\Controllers\PageController;

Route::get('/',[PageController::class,'index']);

Route::get('/uploadpage',[PageController::class,'uploadpage']);

Route::post('/uploadproduct',[PageController::class,'store']);


Route::get('/show',[PageController::class,'show']);

Route::get('/download/{file}',[PageController::class,'download']);

Route::get('/view/{is}',[PageController::class,'view']);
//==============

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    // Auth check
    if (!Auth::check()) {
        // If not logged in, go login.
        return redirect()->route('login');
    } else {
        return redirect()->route('home');
    }
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/about-us', function () {
    return view('about-us');
})->middleware(['auth', 'verified'])->name('about-us');

Route::get('/library', function () {
    return view('library');
})->middleware(['auth', 'verified'])->name('library');

Route::get('/library/manuals', function () {
    return view('manuals');
})->middleware(['auth', 'verified'])->name('manuals');

Route::get('/library/formats', function () {
    return view('formats');
})->middleware(['auth', 'verified'])->name('formats');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Requires user to be authenticated before accessing library */

Route::get('/division', function () {
    return view('division');
})->middleware(['auth', 'verified'])->name('division');

Route::get('/unit', function () {
    return view('unit');
})->middleware(['auth', 'verified'])->name('unit');



require __DIR__.'/auth.php';
