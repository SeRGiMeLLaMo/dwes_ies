<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::view( '/', 'lading.index')->name('index');
Route::view( '/about', 'landing.about')->name('about');
Route::get();
Route::post();
Route::put();
Route::delete();
Route::patch();