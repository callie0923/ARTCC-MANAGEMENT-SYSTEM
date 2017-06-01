<?php

Route::group(['namespace' => 'Admin'], function() {
    Route::group(['prefix' => 'admin'], function() {

        Route::group(['middleware' => ['role:atm|datm|ta|wm']], function() {
            Route::get('staff', ['uses' => 'StaffController@index', 'as' => 'admin.staff.index']);
            Route::post('staff', ['uses' => 'StaffController@updateRoleUser', 'as' => 'admin.staff.update']);
            Route::post('trainingstaff', ['uses' => 'StaffController@updateTrainingRoleUser', 'as' => 'admin.staff.trainingstaff']);
        });

    });
});