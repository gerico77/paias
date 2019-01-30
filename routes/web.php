<?php
Route::get('/', 'HomeController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('questions', 'QuestionsController');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    // Route::resource('tests', 'TestsController');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'UserActionsController');
    // Route::resource('topics', 'TopicsController');
    // Route::post('topics_mass_destroy', ['uses' => 'TopicsController@massDestroy', 'as' => 'topics.mass_destroy']);
    // Route::resource('questions', 'QuestionsController');
    // Route::post('questions_mass_destroy', ['uses' => 'QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
    // Route::resource('questions_options', 'QuestionsOptionsController');
    // Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
    // Route::resource('results', 'ResultsController');
    // Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);
});
