<?php

Route::group(['namespace' => 'System', 'prefix' => 'system'], function() {

    Route::get('roles', ['uses' => 'RolesController@index', 'as' => 'system.roles.index']);
    Route::post('roles', ['uses' => 'RolesController@update', 'as' => 'system.roles.update']);
    Route::post('roledesc', ['uses' => 'RolesController@updateRoleDesc', 'as' => 'system.roles.roledesc']);

    Route::get('settings', ['uses' => 'SettingsController@index', 'as' => 'system.settings.index']);
    Route::post('settings', ['uses' => 'SettingsController@update', 'as' => 'system.settings.update']);
    Route::post('logo', ['uses' => 'SettingsController@logo', 'as' => 'system.settings.logo']);
    Route::post('welcomemsg', ['uses' => 'SettingsController@welcomeText', 'as' => 'system.settings.welcomemsg']);

    Route::get('airports', ['uses' => 'AirportController@index', 'as' => 'system.airports.index']);
    Route::post('airports', ['uses' => 'AirportController@update', 'as' => 'system.airports.update']);
    Route::post('airports/home', ['uses' => 'AirportController@updateHome', 'as' => 'system.airports.updatehome']);

    // FORUM ADMIN ROUTES
    // TODO: TIDY UP ROUTES
    Route::get('forum', ['uses' => 'ForumController@index', 'as' => 'system.forum.index']);
    Route::get('dummy', ['uses' => 'ForumController@dummy', 'as' => 'system.forum.dummy']);
    Route::post('forum/sortcat', ['uses' => 'ForumController@resortCat', 'as' => 'system.forum.sortcat']);

    Route::get('forum/category/{category}/edit', ['uses' => 'Forum\CategoryController@editCategory', 'as' => 'system.forum.category.edit']);
    Route::post('forum/category/{category}', ['uses' => 'Forum\CategoryController@updateCategory', 'as' => 'system.forum.category.update']);
    Route::post('forum/category', ['uses' => 'Forum\CategoryController@addCategory', 'as' => 'system.forum.category.add']);
    Route::post('forum/category/delete', ['uses' => 'Forum\CategoryController@deleteCategory', 'as' => 'system.forum.category.del']);

    Route::get('forum/category/{category}/boards', ['uses' => 'Forum\BoardController@viewBoards', 'as' => 'system.forum.category.boards']);
    Route::post('forum/category/{category}/sortboards', ['uses' => 'Forum\BoardController@sortBoards', 'as' => 'system.forum.category.sortboards']);
    Route::post('forum/category/{category}/boards/create', ['uses' => 'Forum\BoardController@addBoard', 'as' => 'system.forum.category.board.add']);
    Route::get('forum/boards/{board}/edit', ['uses' => 'Forum\BoardController@editBoard', 'as' => 'system.forum.category.board.edit']);
    Route::post('forum/boards/{board}', ['uses' => 'Forum\BoardController@updateBoard', 'as' => 'system.forum.category.board.update']);
    Route::post('forum/boards/{board}/delete', ['uses' => 'Forum\BoardController@deleteBoard', 'as' => 'system.forum.category.board.delete']);

});