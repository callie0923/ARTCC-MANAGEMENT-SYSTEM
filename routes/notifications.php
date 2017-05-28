<?php

Route::get('/api/notificationcount', ['uses' => 'Api\NotificationController@getCount', 'as' => 'api.note.getcount']);
Route::get('/api/notifications', ['uses' => 'Api\NotificationController@loadNotifications', 'as' => 'api.note.loadnotifications']);


Route::post('/api/notifications/markread', ['uses' => 'Api\NotificationController@markRead', 'as' => 'api.note.read']);
Route::post('/api/notifications/markallread', ['uses' => 'Api\NotificationController@markAllRead', 'as' => 'api.note.allread']);