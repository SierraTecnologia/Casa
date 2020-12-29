<?php

// Route::get('home', 'HomeController@index')->name('home');

Route::resource('/acaoHumanas', 'AcaoHumanaController')->parameters([
    'acaoHumanas' => 'id'
]);
Route::resource('/estimates', 'EstimateController')->parameters([
    'estimates' => 'id'
]);
Route::resource('/events', 'EventController')->parameters([
    'events' => 'id'
]);
Route::resource('/tasks', 'TaskController')->parameters([
    'tasks' => 'id'
]);
