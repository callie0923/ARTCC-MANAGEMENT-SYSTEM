<?php

Route::get('/api/notificationcount', ['uses' => 'API\NotificationController@getCount', 'as' => 'api.note.getcount']);
Route::get('/api/notifications', ['uses' => 'API\NotificationController@loadNotifications', 'as' => 'api.note.loadnotifications']);


Route::post('/api/notifications/markread', ['uses' => 'API\NotificationController@markRead', 'as' => 'api.note.read']);
Route::post('/api/notifications/markallread', ['uses' => 'API\NotificationController@markAllRead', 'as' => 'api.note.allread']);