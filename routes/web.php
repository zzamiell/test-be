<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index');
Route::post('/bikinPola', 'IndexController@bikinPola')->name('bikinPola');
