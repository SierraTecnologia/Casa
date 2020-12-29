<?php

// Route::get('home', 'HomeController@index')->name('home');

Route::resource('/gastos', 'GastoController')->parameters([
    'gastos' => 'id'
]);
Route::resource('/rendas', 'RendaController')->parameters([
    'rendas' => 'id'
]);
Route::resource('/routines', 'RoutineController')->parameters([
    'routines' => 'id'
]);
Route::resource('/workers', 'WorkerController')->parameters([
    'workers' => 'id'
]);

