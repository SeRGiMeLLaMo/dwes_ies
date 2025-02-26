<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::get('/', [ExampleController::class, 'index'])->middleware('example')->name('index');
//Le damos también un nombre de ruta con el método name
//Route::get('/no-access', [ExampleController::class, 'noAccess'])->name('no-access');
//Route::middleware('example')->get('/', [ExampleController::class, 'index']);
Route::post('/create', [AuthController::class, 'store'])->name('create');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});