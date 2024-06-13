<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//======================

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PublicDocumentController;
use App\Http\Controllers\DocumentHistoryController;
use App\Http\Controllers\VerifyManUsersController;
use App\Http\Controllers\AdminUserController;
use App\Models\DocumentHistory;
use App\Models\Document;

//============== Admin middleware
Route::middleware(['auth', 'verified', 'isAdmin', 'isVerifiedMan'])->group(function () {


    Route::get('documents/', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('documents/store', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/manuals', [DocumentController::class, 'manuals'])->name('documents.manuals');
    Route::get('/documents/formats', [DocumentController::class, 'formats'])->name('documents.formats');
    Route::resource("/document", DocumentController::class);

    Route::get('document/{id}', [DocumentController::class, 'show'])->name('documents.show');
    Route::get('edit-document/{id}', [DocumentController::class, 'edit']);
    Route::put('update-document', [DocumentController::class, 'update']);

    Route::get('/document/history/{id}', [DocumentHistoryController::class, 'specifichistory'])->name('specifichistory');
    Route::get('documentxx/{doc_ref_code}', [DocumentController::class, 'showByDocRefCode']);

    Route::get('archives/', [DocumentController::class, 'archives'])->name('archives');
    Route::post('/document/check', [App\Http\Controllers\DocumentController::class, 'checkDocumentExists'])->name('document.check');

    Route::get('/admin/unverifiedusers', [VerifyManUsersController::class, 'index'])->name('admin.unverifiedusers');
    Route::post('/admin/unverifiedusers/{user}/verify', [VerifyManUsersController::class, 'verify'])->name('admin.unverifiedusers.verify');

    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/upload', [AdminUserController::class, 'upload'])->name('admin.users.upload');
    Route::post('/admin/users/{user}/promote', [AdminUserController::class, 'promote'])->name('admin.users.promote');
    Route::post('/admin/users/{user}/demote', [AdminUserController::class, 'demote'])->name('admin.users.demote');


});

//============== Normal user middleware
Route::middleware(['auth', 'verified', 'isVerifiedMan'])->group(function () {

    // Route::get('/index', function () {
    //     return view('admin.index');
    // });

    Route::resource("/p/document", PublicDocumentController::class);

    Route::get('/p/documents/', [PublicDocumentController::class, 'index'])->name('publicdocuments.index');
    Route::post('/p/documents/create', [PublicDocumentController::class, 'create'])->name('publicdocuments.create');
    Route::post('/p/documents/store', [PublicDocumentController::class, 'store'])->name('publicdocuments.store');
    Route::get('/p/documents/manuals', [PublicDocumentController::class, 'manuals'])->name('publicdocuments.manuals');
    Route::get('/p/documents/formats', [PublicDocumentController::class, 'formats'])->name('publicdocuments.formats');
    Route::get('/p/document/{id}', [PublicDocumentController::class, 'show'])->name('publicdocuments.show');
    Route::get('/download/{file}', [DocumentController::class, 'download'])->name('document.download');

});




Route::get('/', function () {
    // Auth check
    if (Auth::check()) {
        $usertype = Auth::user()->role_id;
        $history = DocumentHistory::orderBy('updated_at', 'desc')->paginate(10);
        $totalDocuments = Document::where('status', 'Active')->count();
        $totalManuals = Document::where('status', 'Active')->whereIn('doc_type', ['Quality Manual', 'Operations Manual', 'Procedure Manual'])->count();
        $totalForms = Document::where('status', 'Active')->whereIn('doc_type', ['Quality Procedure Form', 'Corrective Action Request Form', 'Form/Template'])->count();
        $totalArchives = Document::where('status', 'Obsolete')->count();

        if ($usertype == 0) {
            return view('publichome');
        } elseif ($usertype == 1) {
            return view('home')->with('history', $history)
                               ->with('totalDocuments', $totalDocuments)
                               ->with('totalManuals', $totalManuals)
                               ->with('totalForms', $totalForms)
                               ->with('totalArchives', $totalArchives);

        } else {
            return redirect()->back();
        }
    } else {
        return redirect()->route('login'); // Redirect to login page if user is not logged in
    }
})->middleware(['isVerifiedMan']);



Route::get('/home', function () {
    $history = DocumentHistory::orderBy('updated_at', 'desc')->paginate(10);

    return view('home')->with('history', $history);
})->middleware(['auth', 'verified', 'isAdmin', 'isVerifiedMan'])->name('home');

Route::get('/p/publichome', function () {
    return view('publichome');
})->middleware(['auth', 'verified', 'isVerifiedMan'])->name('publichome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
