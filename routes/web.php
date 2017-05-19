<?php

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', ['uses' => 'AuthController@login', 'as' => 'auth.login']);
});


require base_path('routes/pilots.php');
require base_path('routes/artcc.php');


Route::group(['middleware' => ['web','ulsauth']], function () {

    Route::group(['namespace' => 'Auth'], function () {
        Route::get('logout', ['uses' => 'AuthController@logout', 'as' => 'auth.logout']);
    });

    require base_path('routes/forum.php');
    require base_path('routes/ids.php');

    Route::group(['middleware' => ['web','ulsauth','role:atm|datm']], function () {
        require base_path('routes/system.php');
    });

});