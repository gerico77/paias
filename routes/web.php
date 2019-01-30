<?php
Route::get('/', 'HomeController@index');
Route::resource('students', 'StudentController');
Route::post('create', 'StudentController@store')->name('store');
//Route::get('/create', 'StudentController@store')->name('store');

// Group
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('questions', 'QuestionsController');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'UserActionsController');
    Route::resource('professors', 'ProfessorController');
    Route::post('professors_mass_destroy', ['uses' => 'ProfessorController@massDestroy', 'as' => 'professors.mass_destroy']);
});

// Auth
Auth::routes();