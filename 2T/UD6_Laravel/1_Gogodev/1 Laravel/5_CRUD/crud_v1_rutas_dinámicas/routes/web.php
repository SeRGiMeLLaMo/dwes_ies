<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;



//mostar todas las notas 
Route::get('/note', [NoteController::class, 'index'])->name('note.index');

//creamos nota 
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');


Route::post('/note/store', [NoteController::class, 'store'])->name('note.store');


Route::get('/note/edit/{note}', [NoteController::class, 'edit'])->name('note.edit');

Route::put('/note/update/{note}', [NoteController::class, 'update'])->name('note.update');

Route::get('/note/show/{note}', [NoteController::class, 'show'])->name('note.show');

Route::delete('/note/destroy/{note}', [NoteController::class, 'destroy'])->name('note.destroy');