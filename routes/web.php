<?php

use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\Notescontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\shared_Notecontroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPanelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::middleware('isadmin')->group(function () {
     Route::get('/admin-dashboard', [dashboardcontroller::class,'dashboard'] )->name('admin.dashboard');
    
// note
Route::get('/admin/note',[Notescontroller::class,'index'])->name('admin.note.index');
Route::get('/note-create',[Notescontroller::class,'create'])->name('admin.note.create');
Route::post('/note/store',[Notescontroller::class,'store'])->name('admin.note.store');
Route::get('note/{id}/edit',[Notescontroller::class,'edit'])->name('admin.note.edit');
Route::post('note/{id}/update',[Notescontroller::class,'update'])->name('admin.note.update');
Route::delete('note/{id}/delete',[Notescontroller::class,'delete'])->name('admin.note.delete');

//user-management
Route::get('/admin/user',[UserController::class,'index'])->name('admin.users.index');
//Route::get('user-create',[UserController::class,'create'])->name('users.create');
Route::post('user/store',[UserController::class,'store'])->name('admin.users.store');
Route::get('user/{id}/edit',[UserController::class,'edit'])->name('admin.users.edit');
Route::post('user/{id}/update',[UserController::class,'update'])->name('admin.users.update');
Route::get('user/{id}/delete',[UserController::class,'delete'])->name('admin.users.delete');


//shared note 
Route::get('/admin/shared-notes', [shared_Notecontroller::class, 'index'])->name('admin.shared-notes.index');
Route::post('/shared-notes', [shared_Notecontroller::class, 'store'])->name('admin.sharednotes.store');
Route::put('/shared-notes/{id}', [shared_Notecontroller::class, 'update'])->name('admin.sharednotes.update');
Route::delete('/shared-notes/{id}', [shared_Notecontroller::class, 'destroy'])->name('admin.sharednotes.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/******user dashboard ****/
Route::middleware('is_user')->group(function(){
    Route::get('user/dashboard', [UserPanelController::class, 'mynote'])->name('users.dashboard');
    Route::get('/notes/create', [UserPanelController::class, 'mynotecreate'])->name('users.mynotes');
    Route::post('/notes/store', [UserPanelController::class, 'mystore'])->name('users.mystore');
    Route::get('/notes/edit/{id}', [UserPanelController::class, 'mynoteedit'])->name('users.noteedit');
    Route::put('/notes/update/{id}', [UserPanelController::class, 'mynoteupdate'])->name('users.notesupdate');
    Route::delete('/notes/delete/{id}', [UserPanelController::class, 'mynotedelete'])->name('users.notesdelete');
    Route::get('/notes/{id}/show', [UserPanelController::class, 'noteshow'])->name('users.noteshow');

    
});

require __DIR__.'/auth.php';
