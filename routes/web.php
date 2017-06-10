<?php

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);

Route::get('/index/weather', ['uses' => 'HomeController@weatherPanel', 'as' => 'index.weather']);
Route::get('/index/atc', ['uses' => 'HomeController@atcPanel', 'as' => 'index.atc']);
Route::get('/index/news', ['uses' => 'HomeController@newsPanel', 'as' => 'index.news']);
Route::get('/index/members', ['uses' => 'HomeController@newestMembersPanel', 'as' => 'index.members']);
Route::get('/index/promotions', ['uses' => 'HomeController@promotionsPanel', 'as' => 'index.promotions']);

Route::get('/noaccess', ['uses' => 'HomeController@noaccess', 'as' => 'noaccess']);
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', ['uses' => 'AuthController@login', 'as' => 'auth.login']);
});

require base_path('routes/pilots.php');
require base_path('routes/artcc.php');
require base_path('routes/forum.php');


Route::group(['middleware' => ['web','ulsauth']], function () {

    Route::group(['namespace' => 'Auth'], function () {
        Route::get('logout', ['uses' => 'AuthController@logout', 'as' => 'auth.logout']);
    });

    require base_path('routes/ids.php');
    require base_path('routes/notifications.php');

    require base_path('routes/admin.php');

    Route::group(['middleware' => ['web','ulsauth','role:atm|datm']], function () {
        require base_path('routes/system.php');
    });

});