<?php

Route::group(['namespace' => 'Admin'], function() {
    Route::group(['prefix' => 'admin'], function() {

        Route::group(['middleware' => ['role:atm|datm|ta']], function() {
            Route::get('staff', ['uses' => 'StaffController@index', 'as' => 'admin.staff.index']);
            Route::post('staff', ['uses' => 'StaffController@updateRoleUser', 'as' => 'admin.staff.update']);
            Route::post('trainingstaff', ['uses' => 'StaffController@updateTrainingRoleUser', 'as' => 'admin.staff.trainingstaff']);
        });

        Route::group(['middleware' => ['role:atm|datm'], 'prefix' => 'transfers'], function() {
            Route::get('/', ['uses' => 'TransferController@index', 'as' => 'admin.transfer.index']);
            Route::get('load', ['uses' => 'TransferController@load', 'as' => 'admin.transfer.load']);
            Route::post('accept', ['uses' => 'TransferController@accept', 'as' => 'admin.transfer.accept']);
            Route::post('reject', ['uses' => 'TransferController@reject', 'as' => 'admin.transfer.reject']);
        });

        Route::group(['middleware' => ['role:atm|datm|ta|wm|ata|ins|mtr'], 'prefix' => 'roster'], function() {
            Route::get('/', ['uses' => 'RosterController@index', 'as' => 'admin.roster.index']);
            Route::get('load', ['uses' => 'RosterController@loadRoster', 'as' => 'admin.roster.load']);
            Route::get('{user}/edit', ['uses' => 'RosterController@controller', 'as' => 'admin.roster.controller']);
            Route::post('update/certs', ['uses' => 'RosterController@updateCerts', 'as' => 'admin.roster.certs']);

            Route::group(['middleware' => 'role:atm|datm|ta|wm|ata|ins'], function() {
                Route::post('promote', ['uses' => 'RosterController@promote', 'as' => 'admin.roster.promote']);
            });
        });

    });
});