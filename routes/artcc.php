<?php

Route::group(['namespace' => 'ARTCC'], function() {

    Route::group(['prefix' => 'artcc'], function() {

        Route::get('roster', ['uses' => 'RosterController@index', 'as' => 'artcc.roster.index']);
        Route::get('roster/home', ['uses' => 'RosterController@home', 'as' => 'artcc.roster.index.home']);
        Route::get('roster/visit', ['uses' => 'RosterController@visit', 'as' => 'artcc.roster.index.visit']);
        Route::get('roster/{user}', ['uses' => 'RosterController@member', 'as' => 'artcc.roster.member']);

        Route::get('management', ['uses' => 'ManagementController@index', 'as' => 'artcc.management.index']);

    });

});