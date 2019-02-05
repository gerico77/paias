<?php
Route::get('/', 'HomeController@index');

Route::resource('students', 'StudentController');
Route::post('create', 'StudentController@store')->name('store');
Route::get('/create', 'StudentController@store')->name('store');

// Group
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('tests', 'TestsController');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'UserActionsController');
    Route::resource('questions_options', 'QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
    Route::resource('subjects', 'SubjectsController');
    Route::post('subjects_mass_destroy', ['uses' => 'SubjectsController@massDestroy', 'as' => 'subjects.mass_destroy']);
    Route::resource('courses', 'CoursesController');
    Route::post('courses_mass_destroy', ['uses' => 'CoursesController@massDestroy', 'as' => 'courses.mass_destroy']);
    Route::resource('results', 'ResultsController');
    Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);
    Route::resource('departments', 'DepartmentsController');
    Route::post('departments_mass_destroy', ['uses' => 'DepartmentsController@massDestroy', 'as' => 'departments.mass_destroy']);
    Route::resource('results', 'ResultsController');

    // Questions
    Route::resource('questions', 'QuestionsController')->except([
        'create','show'
    ]);
    Route::get('/questions/create/{question_type}', 'QuestionsController@create')->name('questions.create');
    Route::get('/questions/show/{question_type}/{id}', 'QuestionsController@show')->name('questions.show');

    Route::post('questions_mass_destroy', ['uses' => 'QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
});

// Auth
Auth::routes();