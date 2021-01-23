<?php

Route::get('/timelines/render', 'TimelineController@render')->name('timelines.render');

Route::resource('/timelines', 'TimelineController')->parameters([
    'timelines' => 'id'
]);
Route::resource('/localizations', 'LocalizationController')->parameters([
    'localizations' => 'id'
]);