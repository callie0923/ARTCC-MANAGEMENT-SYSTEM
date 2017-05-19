<?php

Route::group(['namespace' => 'ARTCC'], function() {
    Route::group(['prefix' => 'artcc'], function() {

        Route::get('management', ['uses' => 'ManagementController@index', 'as' => 'artcc.management.index']);

    });
});