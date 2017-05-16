<?php

Route::group(['namespace' => 'System'], function() {
    Route::group(['prefix' => 'system'], function() {

        Route::get('roles', ['uses' => 'RolesController@index', 'as' => 'system.roles.index']);
        Route::post('roles', ['uses' => 'RolesController@update', 'as' => 'system.roles.update']);

    });
});