<?php

Route::group(['namespace' => 'ARTCC'], function() {

    Route::group(['prefix' => 'artcc'], function() {

        Route::get('roster', ['uses' => 'RosterController@index', 'as' => 'artcc.roster.index']);
        Route::get('roster/{user}', ['uses' => 'RosterController@member', 'as' => 'artcc.roster.member']);

        Route::get('management', ['uses' => 'ManagementController@index', 'as' => 'artcc.management.index']);

    });

});