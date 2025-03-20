<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::view( '/home', 'landing.home')->name('home');
Route::view( '/info', 'landing.info')->name('info');