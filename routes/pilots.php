<?php

Route::group(['namespace' => 'Pilots'], function() {
    Route::group(['prefix' => 'pilots'], function() {

        Route::get('routes', ['uses' => 'RouteController@index', 'as' => 'pilots.routes.index']);
        Route::post('genroute', ['uses' => 'RouteController@loadRoutes', 'as' => 'pilots.routes.load']);

        Route::get('weather', ['uses' => 'WeatherController@index', 'as' => 'pilots.weather.index']);

        Route::get('airport', ['uses' => 'AirportController@index', 'as' => 'pilots.airport.index']);
        Route::get('airport/{airport}', ['uses' => 'AirportController@airport', 'as' => 'pilots.airport.airport']);
        Route::get('charts/{airport}', ['uses' => 'AirportController@charts', 'as' => 'pilots.airport.charts']);

    });
});