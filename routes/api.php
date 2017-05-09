<?php

Route::group(['namespace' => 'API'], function () {
    Route::get('/roster', 'APIController@roster');
    Route::get('/transfers', 'APIController@transfers');
    Route::get('/vatusa/{cid}', 'APIController@vatusaController');
    Route::get('/vatsim/{cid}', 'APIController@vatsimController');
});
