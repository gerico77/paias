<?php

// use Symfony\Component\Routing\Route;
Route::get('/', 'HomeController@index');

// Group
Route::group(['middleware' => 'auth'], function () {

    // Home
    Route::get('/home', 'HomeController@index')->name('home');

    // Test
    Route::resource('tests', 'TestsController');
    Route::post('tests_mass_destroy', ['tests' => 'TestsController@massDestroy', 'as' => 'tests.mass_destroy']);

    // Role
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);

    // User
    Route::resource('users', 'UsersController');
    Route::get('users_export', ['uses' => 'UsersController@export', 'as' => 'users.export']);
    // Route::get('/export', 'UsersController@export')->name('export');
    Route::post('/import', 'UsersController@import')->name('import');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'UserActionsController');

    // Question Options
    Route::resource('questions_options', 'QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);

    // Subject
    Route::resource('subjects', 'SubjectsController');
    Route::post('subjects_mass_destroy', ['uses' => 'SubjectsController@massDestroy', 'as' => 'subjects.mass_destroy']);

    // Course
    Route::resource('courses', 'CoursesController');
    Route::get('courses_export', ['uses' => 'CoursesController@export', 'as' => 'courses.export']);
    Route::post('courses_mass_destroy', ['uses' => 'CoursesController@massDestroy', 'as' => 'courses.mass_destroy']);

    // Result
    Route::resource('results', 'ResultsController');
    Route::get('results_export', ['uses' => 'ResultsController@export', 'as' => 'results.export']);
    Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);

    // Department
    Route::resource('departments', 'DepartmentsController');
    Route::post('departments_mass_destroy', ['uses' => 'DepartmentsController@massDestroy', 'as' => 'departments.mass_destroy']);

    // Professor
    Route::resource('professors', 'ProfessorsController');
    Route::post('professors_mass_destroy', ['professors' => 'ProfessorsController@massDestroy', 'as' => 'professors.mass_destroy']);

    // Student
    Route::resource('students', 'StudentsController');
    Route::post('students_mass_destroy', ['students' => 'StudentsController@massDestroy', 'as' => 'students.mass_destroy']);

    // Enroll
    Route::resource('enrolls', 'EnrollsController');
    Route::post('enrolls_mass_destroy', ['errolls' => 'EnrollsController@massDestroy', 'as' => 'enrolls.mass_destroy']);

    // Tasks
    Route::resource('tasks', 'TasksController');

    // Questions
    Route::resource('questions', 'QuestionsController')->except([
        'create','show','edit'
    ]);
    Route::get('/questions/create/{qtype}', 'QuestionsController@create')->name('questions.create');
    Route::get('/questions/show/{qtype}/{id}', 'QuestionsController@show')->name('questions.show');
    Route::get('/questions/{qtype}/{id}/edit', 'QuestionsController@edit')->name('questions.edit');
    Route::post('questions_mass_destroy', ['uses' => 'QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);

    // Download Files
    
});

Route::get('/viewAlldownloadfile','DownloadController@downfunc');
    // Student
// Route::resource('students', 'StudentController');
// Route::post('create', 'StudentController@store')->name('store');
// Route::get('/create', 'StudentController@store')->name('store');

// Auth
Auth::routes();