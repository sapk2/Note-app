<?php

use App\Http\Controllers\Notescontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\shared_Notecontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// note
Route::get('/note',[Notescontroller::class,'index'])->name('notes.index');
Route::get('/note-create',[Notescontroller::class,'create'])->name('note.create');
Route::post('/note/store',[Notescontroller::class,'store'])->name('note.store');
Route::get('note/{id}/edit',[Notescontroller::class,'edit'])->name('note.edit');
Route::post('note/{id}/update',[Notescontroller::class,'update'])->name('note.update');
Route::delete('note/{id}/delete',[Notescontroller::class,'delete'])->name('note.delete');


//shared note 
Route::get('/shared-notes', [shared_Notecontroller::class, 'index'])->name('shared-notes.index');
Route::post('/shared-notes', [shared_Notecontroller::class, 'store'])->name('sharednotes.store');
Route::put('/shared-notes/{id}', [shared_Notecontroller::class, 'update'])->name('sharednotes.update');
Route::delete('/shared-notes/{id}', [shared_Notecontroller::class, 'destroy'])->name('sharednotes.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
