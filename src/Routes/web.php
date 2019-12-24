<?php

Route::group(['middleware' => ['web']], function () {

    Route::prefix('casa')->group(function () {
        Route::group(['as' => 'casa.'], function () {

            Route::get('home', 'HomeController@index')->name('home');
            
        });
    });

});