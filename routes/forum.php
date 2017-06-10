<?php

Route::group(['namespace' => 'Forum'], function() {
    Route::group(['prefix' => 'forum'], function() {

        Route::get('/', ['uses' => 'ForumController@index', 'as' => 'forum.index']);
        Route::get('/category/{category}', ['uses' => 'ForumController@category', 'as' => 'forum.category']);
        Route::get('/category/{category}/board/{board}', ['uses' => 'ForumController@board', 'as' => 'forum.board']);
        Route::get('/category/{category}/board/{board}/thread/{thread}', ['uses' => 'ForumController@thread', 'as' => 'forum.thread']);

        Route::get('/category/{category}/board/{board}/new', ['uses' => 'ForumController@newPost', 'as' => 'forum.board.new']);
        Route::post('/category/{category}/board/{board}/new', ['uses' => 'ForumController@saveNewPost', 'as' => 'forum.board.savenewpost']);

    });
});