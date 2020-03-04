<?php

Route::group(['middleware' => ['web']], function () {
    Route::prefix('casa')->group(function () {
        Route::group(['as' => 'casa.'], function () {

            /**
             * dash
             */
            Route::prefix('dash')->group(function () {
                Route::group(['as' => 'dash.'], function () {
                    Route::get('/', 'DashController@index')->name('index');
                });
            });

            /**
             * finances
             */
            Route::prefix('finances')->group(function () {
                Route::group(['as' => 'finances.'], function () {
                    Route::get('/', 'FinancesController@index')->name('index');
                });
            });

            /**
             * espolio
             */
            Route::prefix('espolio')->group(function () {
                Route::group(['as' => 'espolio.'], function () {
                    Route::get('/', 'EspolioController@index')->name('index');
                });
            });



            /**
             * Development
             */
            Route::namespace('Development')->group(function () {
                Route::prefix('development')->group(function () {
                    Route::group(['as' => 'development.'], function () {

                        Route::prefix('clients')->group(function () {
                            Route::group(['as' => 'clients.'], function () {
                                Route::get('/', 'ClientsController@index')->name('index');
                            });
                        });    


                        Route::prefix('projects')->group(function () {
                            Route::group(['as' => 'projects.'], function () {
                                Route::get('/', 'ProjectsController@index')->name('index');
                            });
                        });    

                                
                    });
                });    
            });



            /**
             * Social
             */
            Route::namespace('Social')->group(function () {
                Route::prefix('social')->group(function () {
                    Route::group(['as' => 'social.'], function () {

                        Route::prefix('photo')->group(function () {
                            Route::group(['as' => 'photo.'], function () {
                                Route::get('/', 'PhotoController@index')->name('index');
                            });
                        });

                        Route::prefix('person')->group(function () {
                            Route::group(['as' => 'person.'], function () {
                                Route::get('/', 'PersonController@index')->name('index');
                                Route::get('/', 'PersonController@persons')->name('persons');
                            });
                        });
                        
                    });
                });    
            });


            /**
             * Manager
             */
            Route::namespace('Manager')->group(function () {
                Route::prefix('manager')->group(function () {
                    Route::group(['as' => 'manager.'], function () {

                        Route::prefix('arquitetura')->group(function () {
                            Route::group(['as' => 'arquitetura.'], function () {
                                Route::get('/', 'ArquiteturaController@index')->name('index');
                            });
                        });    
                        Route::prefix('fields')->group(function () {
                            Route::group(['as' => 'fields.'], function () {
                                Route::get('/', 'FieldsController@index')->name('index');
                            });
                        });
                    });
                });    
            });





        });
    });
});