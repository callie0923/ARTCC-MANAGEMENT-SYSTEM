<?php

Route::group(['namespace' => 'System'], function() {
    Route::group(['prefix' => 'system'], function() {

        Route::get('roles', ['uses' => 'RolesController@index', 'as' => 'system.roles.index']);
        Route::post('roles', ['uses' => 'RolesController@update', 'as' => 'system.roles.update']);
        Route::post('roledesc', ['uses' => 'RolesController@updateRoleDesc', 'as' => 'system.roles.roledesc']);

        Route::get('settings', ['uses' => 'SettingsController@index', 'as' => 'system.settings.index']);
        Route::post('settings', ['uses' => 'SettingsController@update', 'as' => 'system.settings.update']);

        Route::get('airports', ['uses' => 'AirportController@index', 'as' => 'system.airports.index']);
        Route::post('airports', ['uses' => 'AirportController@update', 'as' => 'system.airports.update']);

    });
});