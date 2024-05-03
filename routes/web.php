<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//======================
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageControllerAdmin;
use App\Http\Controllers\DocumentController;


 
Route::resource("/document", DocumentController::class);

//Route::get('/',[PageController::class,'index']);

//Route::get('/uploadpage',[PageController::class,'uploadpage'])->middleware(['auth', 'verified']);

//Route::post('/uploadproduct',[PageController::class,'store']);


//Route::get('/show',[PageController::class,'show']);

//Route::get('/download/{file}',[PageController::class,'download']);

//Route::get('/view/{is}',[PageController::class,'view']);

//============== Admin middleware
Route::middleware(['auth', 'verified', 'isAdmin'])->group(function () {
    Route::get('/uploadpage',[PageControllerAdmin::class,'uploadpage']);
    Route::post('/uploadproduct',[PageControllerAdmin::class,'store']);
    Route::get('/a/show',[PageControllerAdmin::class,'show']);  
}); 

//============== Normal user middleware
Route::middleware(['auth', 'verified'])->group(function () {
    //Route::get('/download/{file}',[PageController::class,'download']);
    Route::get('/view/{is}',[PageController::class,'view']);
    Route::get('/show',[PageController::class,'show']);
    Route::get('/index', function () {
        return view('admin.index');
    });
});   
//Route::get('/download/{file}', 'DocumentController@download')->name('document.download');
Route::get('/download/{file}', [DocumentController::class, 'download'])->name('document.download');
Route::get('/manuals', [DocumentController::class, 'manuals'])->name('documents.manuals');
Route::get('/formats', [DocumentController::class, 'formats'])->name('documents.formats');

//==================

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
    return view('documents.manuals');
})->middleware(['auth', 'verified'])->name('manuals');

// Route::get('/library/formats', function () {
//     return view('documents.formats');
// })->middleware(['auth', 'verified'])->name('formats');

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
