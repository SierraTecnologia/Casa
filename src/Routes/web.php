<?php

Route::group(
    ['middleware' => ['web']], function () {
        Route::prefix('casa')->group(
            function () {
                Route::group(
                    ['as' => 'casa.'], function () {

                        /**
                         * 
                         */
                        Route::get('assets', ['uses' => 'BaseController@assets', 'as' => 'assets']);

                        /**
                         * dash
                         */
                        Route::prefix('dash')->group(
                            function () {
                                Route::group(
                                    ['as' => 'dash.'], function () {
                                        Route::get('/', 'DashController@index')->name('index');
                                    }
                                );
                            }
                        );

                        /**
                         * finances
                         */
                        Route::prefix('finances')->group(
                            function () {
                                Route::group(
                                    ['as' => 'finances.'], function () {
                                        Route::get('/', 'FinancesController@index')->name('index');
                                    }
                                );
                            }
                        );

                        /**
                         * espolio
                         */
                        Route::prefix('espolio')->group(
                            function () {
                                Route::group(
                                    ['as' => 'espolio.'], function () {
                                        Route::get('/', 'EspolioController@index')->name('index');
                                    }
                                );
                            }
                        );



                        /**
                         * Comercial
                         */
                        Route::namespace('Comercial')->group(
                            function () {
                                Route::prefix('comercial')->group(
                                    function () {
                                        Route::group(
                                            ['as' => 'comercial.'], function () {

                                                Route::prefix('clients')->group(
                                                    function () {
                                                        Route::group(
                                                            ['as' => 'clients.'], function () {
                                                                Route::get('/', 'ClientsController@index')->name('index');
                                                            }
                                                        );
                                                    }
                                                );    


                                                Route::prefix('projects')->group(
                                                    function () {
                                                        Route::group(
                                                            ['as' => 'projects.'], function () {
                                                                Route::get('/', 'ProjectsController@index')->name('index');
                                                            }
                                                        );
                                                    }
                                                );    

                                
                                            }
                                        );
                                    }
                                );    
                            }
                        );



                        /**
                         * Social
                         */
                        Route::namespace('Social')->group(
                            function () {
                                Route::prefix('social')->group(
                                    function () {
                                        Route::group(
                                            ['as' => 'social.'], function () {

                                                Route::prefix('photo')->group(
                                                    function () {
                                                        Route::group(
                                                            ['as' => 'photo.'], function () {
                                                                Route::get('/', 'PhotoController@index')->name('index');
                                                            }
                                                        );
                                                    }
                                                );

                                                // Admin Media
                                                Route::group(
                                                    [
                                                    'as'     => 'photo.',
                                                    'prefix' => 'photo',
                                                    ], function () {
                                                        Route::get('/all', ['uses' => 'PhotoController@all',              'as' => 'all']);


                                                        Route::get('/', ['uses' => 'PhotoController@index',              'as' => 'index']);
                                                        Route::post('files', ['uses' => 'PhotoController@files',              'as' => 'files']);
                                                        Route::post('new_folder', ['uses' => 'PhotoController@new_folder',         'as' => 'new_folder']);
                                                        Route::post('delete_file_folder', ['uses' => 'PhotoController@delete', 'as' => 'delete']);
                                                        Route::post('move_file', ['uses' => 'PhotoController@move',          'as' => 'move']);
                                                        Route::post('rename_file', ['uses' => 'PhotoController@rename',        'as' => 'rename']);
                                                        Route::post('upload', ['uses' => 'PhotoController@upload',             'as' => 'upload']);
                                                        Route::post('crop', ['uses' => 'PhotoController@crop',             'as' => 'crop']);
                                                    }
                                                );

                                                Route::prefix('person')->group(
                                                    function () {
                                                        Route::group(
                                                            ['as' => 'person.'], function () {
                                                                Route::get('/', 'PersonController@index')->name('index');
                                                                Route::get('/persons', 'PersonController@persons')->name('persons');
                                                            }
                                                        );
                                                    }
                                                );
                        
                                            }
                                        );
                                    }
                                );    
                            }
                        );


                        /**
                         * Manager
                         */
                        Route::namespace('Manager')->group(
                            function () {
                                Route::prefix('manager')->group(
                                    function () {
                                        Route::group(
                                            ['as' => 'manager.'], function () {

                                                Route::prefix('arquitetura')->group(
                                                    function () {
                                                        Route::group(
                                                            ['as' => 'arquitetura.'], function () {
                                                                Route::get('/', 'ArquiteturaController@index')->name('index');
                                                            }
                                                        );
                                                    }
                                                );    
                                                Route::prefix('fields')->group(
                                                    function () {
                                                        Route::group(
                                                            ['as' => 'fields.'], function () {
                                                                Route::get('/', 'FieldsController@index')->name('index');
                                                            }
                                                        );
                                                    }
                                                );
                                            }
                                        );
                                    }
                                );    
                            }
                        );





                    }
                );
            }
        );
    }
);