<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

/*Route::get('/', function () {
    return view('welcome');
});
*/
/*
//Creamos la primera ruta y le pasamos el controlador y el metodo que queremos que ejecute eb este caso con el nombre de la ruta
//ruta con parámetro opcional, más específica
Route::get('/note/hello', [NoteController::class, 'example'])->name('note.example');
//ruta con parámetro opcional, más general
Route::get('/note/{id?}', [NoteController::class, 'index'])->name('note.index');
*/
//mostar todas las notas    
Route::get('/note', [NoteController::class, 'index'])->name('note.index');
//creamos nota
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');