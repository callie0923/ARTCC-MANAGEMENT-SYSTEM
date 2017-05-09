<?php

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);
Route::get('/dashboard', ['uses' => 'HomeController@index', 'as' => 'dashboard']);
Route::get('/dummy', ['uses' => 'HomeController@index', 'as' => 'dummy']);
