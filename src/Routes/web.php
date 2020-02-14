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




            Route::namespace('Development')->group(function () {
                Route::prefix('development')->group(function () {
                    Route::group(['as' => 'development.'], function () {
                        Route::get('/', 'ClientsController@index')->name('index');
                        Route::get('/', 'FinancesController@index')->name('index');
                    });
                });    
            });


            Route::namespace('Manager')->group(function () {
                Route::prefix('manager')->group(function () {
                    Route::group(['as' => 'manager.'], function () {
                        Route::get('/', 'ArquiteturaController@index')->name('index');
                        Route::get('/', 'FinancesController@index')->name('index');
                    });
                });    
            });





        });
    });

});