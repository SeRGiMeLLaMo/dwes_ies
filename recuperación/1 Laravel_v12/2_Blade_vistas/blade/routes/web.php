<?php

use Illuminate\Support\Facades\Route;


Route::view( '/', 'home')->name('home');

Route::view( '/info', 'info')->name('info');    

Route::view( '/contacto', 'contacto')->name('contacto');

Route::view( '/error', 'error')->name('error');