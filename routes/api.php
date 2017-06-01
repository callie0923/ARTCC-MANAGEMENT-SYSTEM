<?php

Route::group(['namespace' => 'API'], function () {
    Route::get('/roster', ['uses' => 'APIController@roster', 'as' => 'api.getroster']);
    Route::get('/transfers', ['APIController@transfers', 'as' => 'api.gettransfers']);
    Route::get('/vatusa/{cid}', ['APIController@vatusaController', 'as' => 'api.getvatusa']);
    Route::get('/vatsim/{cid}', ['APIController@vatsimController', 'as' => 'api.getvatsim']);

    Route::get('airport', ['uses' => 'ResourceController@airport', 'as' => 'api.airport']);

    Route::get('members', ['uses' => 'ResourceController@members', 'as' => 'api.members']);
});
