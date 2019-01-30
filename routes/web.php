<?php
Route::get('/', 'HomeController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('questions', 'QuestionsController');
});

