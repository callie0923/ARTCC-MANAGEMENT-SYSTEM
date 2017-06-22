<?php

Route::group(['namespace' => 'Admin'], function() {
    Route::group(['prefix' => 'admin'], function() {

        Route::group(['middleware' => ['role:atm|datm|ta']], function() {
            Route::get('staff', ['uses' => 'StaffController@index', 'as' => 'admin.staff.index']);
            Route::post('staff', ['uses' => 'StaffController@updateRoleUser', 'as' => 'admin.staff.update']);
            Route::post('trainingstaff', ['uses' => 'StaffController@updateTrainingRoleUser', 'as' => 'admin.staff.trainingstaff']);
        });


        Route::group(['middleware' => ['role:atm|datm|ta|wm|ata|ins|mtr']], function() {
            Route::get('roster', ['uses' => 'RosterController@index', 'as' => 'admin.roster.index']);
            Route::get('/roster/load', ['uses' => 'RosterController@loadRoster', 'as' => 'admin.roster.load']);
            Route::get('/roster/{user}/edit', ['uses' => 'RosterController@controller', 'as' => 'admin.roster.controller']);
            Route::post('/roster/update/certs', ['uses' => 'RosterController@updateCerts', 'as' => 'admin.roster.certs']);
        });

    });
});