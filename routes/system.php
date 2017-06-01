<?php

Route::group(['namespace' => 'System'], function() {
    Route::group(['prefix' => 'system'], function() {

        Route::get('roles', ['uses' => 'RolesController@index', 'as' => 'system.roles.index']);
        Route::post('roles', ['uses' => 'RolesController@update', 'as' => 'system.roles.update']);
        Route::post('roledesc', ['uses' => 'RolesController@updateRoleDesc', 'as' => 'system.roles.roledesc']);

        Route::get('settings', ['uses' => 'SettingsController@index', 'as' => 'system.settings.index']);
        Route::post('settings', ['uses' => 'SettingsController@update', 'as' => 'system.settings.update']);
        Route::post('logo', ['uses' => 'SettingsController@logo', 'as' => 'system.settings.logo']);
        Route::post('welcomemsg', ['uses' => 'SettingsController@welcomeText', 'as' => 'system.settings.welcomemsg']);

        Route::get('airports', ['uses' => 'AirportController@index', 'as' => 'system.airports.index']);
        Route::post('airports', ['uses' => 'AirportController@update', 'as' => 'system.airports.update']);
        Route::post('airports/home', ['uses' => 'AirportController@updateHome', 'as' => 'system.airports.updatehome']);

    });
});