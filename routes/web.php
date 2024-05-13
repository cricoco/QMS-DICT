<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//======================
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageControllerAdmin;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicDocumentController;
use App\Http\Controllers\DocumentHistoryController;
use App\Http\Controllers\DownloadTrackerController;
use App\Models\DocumentHistory;
use App\Models\Document;

// Route::resource("/document", DocumentController::class);

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

    // Admin User Interactions
    //Route::resource("/document", DocumentController::class);
    Route::get('documents/', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('documents/store', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/manuals', [DocumentController::class, 'manuals'])->name('documents.manuals');
    Route::get('/documents/formats', [DocumentController::class, 'formats'])->name('documents.formats');
    Route::resource("/document", DocumentController::class);
}); 

//============== Normal user middleware
Route::middleware(['auth', 'verified'])->group(function () {
    //Route::get('/download/{file}',[PageController::class,'download']);
    Route::get('/view/{is}',[PageController::class,'view']);
    Route::get('/show',[PageController::class,'show']);
    Route::get('/index', function () {
        return view('admin.index');
    });
    // Route::get('/', function () {
    //     return view('publichome')->name();
    // });


    // User Interactions
    
    Route::resource("/p/document", PublicDocumentController::class);
    Route::get('/p/documents/', [PublicDocumentController::class, 'index'])->name('publicdocuments.index');
    Route::post('/p/documents/create', [PublicDocumentController::class, 'create'])->name('publicdocuments.create');
    Route::post('/p/documents/store', [PublicDocumentController::class, 'store'])->name('publicdocuments.store');
    Route::get('/p/documents/manuals', [PublicDocumentController::class, 'manuals'])->name('publicdocuments.manuals');
    Route::get('/p/documents/formats', [PublicDocumentController::class, 'formats'])->name('publicdocuments.formats');

});   
//Route::get('/download/{file}', 'DocumentController@download')->name('document.download');

Route::get('/download/{file}', [DocumentController::class, 'download'])->name('document.download');
// Route::get('/documents/manuals', [DocumentController::class, 'manuals'])->name('documents.manuals');
// Route::get('/documents/formats', [DocumentController::class, 'formats'])->name('documents.formats');
// Route::get('/documents', [DocumentController::class, 'show'])->name('documents.index');

//==================

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    // Auth check
    if (Auth::check()) {
        $usertype = Auth::user()->role_id;
        $history = DocumentHistory::orderBy('updated_at', 'desc')->paginate(10);
        if ($usertype == 0) {
            return view('publichome');
        } elseif ($usertype == 1) {
            return view('home')->with('history', $history);
        } else {
            return redirect()->back();
        }
    } else {
        return redirect()->route('login'); // Redirect to login page if user is not logged in
    }
});



// route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('name');

// Route::get('/history', [DocumentHistoryController::class, 'history'])->name('history');
// Route::get('/', [HomeController::class, 'index']);
Route::get('/history', [DocumentHistoryController::class, 'index']);
Route::get('document/{id}', [DocumentController::class, 'show'])->name('documents.show');

// Route::get('/home', [HomeController::class, 'history'])->middleware(['auth', 'verified', 'isAdmin'])->name('home');;
// Route::get('/', [HomeController::class, 'history'])->middleware(['auth', 'verified', 'isAdmin'])->name('/');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    $history = DocumentHistory::orderBy('updated_at', 'desc')->paginate(10);
   
    return view('home')->with('history', $history);
})->middleware(['auth', 'verified', 'isAdmin'])->name('home');

Route::get('/p/publichome', function () {
    return view('publichome');
})->middleware(['auth', 'verified'])->name('publichome');

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
