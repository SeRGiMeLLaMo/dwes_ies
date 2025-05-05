<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book/update/{book}', [BookController::class, 'update'])->name('book.update');
Route::get('/book/show/{book}', [BookController::class, 'show'])->name('book.show');
Route::delete('/book/destroy/{book}', [BookController::class, 'destroy'])->name('book.destroy');