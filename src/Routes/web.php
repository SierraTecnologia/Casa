<?php

Route::group(['middleware' => ['web']], function () {

    Route::prefix('casa')->group(function () {
        Route::group(['as' => 'casa.'], function () {

            Route::prefix('dash')->group(function () {
                Route::group(['as' => 'dash.'], function () {
                    Route::get('/', 'DashController@index')->name('index');
                });
            });

            Route::prefix('finances')->group(function () {
                Route::group(['as' => 'finances.'], function () {
                    Route::get('/', 'FinancesController@index')->name('index');
                });
            });

            Route::prefix('espolio')->group(function () {
                Route::group(['as' => 'espolio.'], function () {
                    Route::get('/', 'EspolioController@index')->name('index');
                });
            });

        });
    });

});