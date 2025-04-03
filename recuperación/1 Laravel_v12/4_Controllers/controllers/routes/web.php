<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index']) ->name('book.index');
Route::get('/create', [BookController::class, 'create']) ->name('book.create');