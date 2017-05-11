<?php

Route::group(['namespace' => 'Pilots'], function() {
    Route::group(['prefix' => 'pilots'], function() {
        Route::get('routes', ['uses' => 'RouteController@index', 'as' => 'pilots.routes.index']);
        Route::post('genroute', ['uses' => 'RouteController@loadRoutes', 'as' => 'pilots.routes.load']);
    });
});