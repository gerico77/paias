<?php

// Auth
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Home
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

// Group
Route::group(['middleware' => 'auth'], function () {
    // Users
    Route::resource('users', 'UsersController');
    Route::get('users_export', ['uses' => 'UsersController@export', 'as' => 'users.export']);
    Route::post('/import', 'UsersController@import')->name('import');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);

    // Professors
    Route::resource('professors', 'ProfessorsController');
    Route::post('professors_mass_destroy', ['uses' => 'ProfessorsController@massDestroy', 'as' => 'professors.mass_destroy']);

    // Students
    Route::resource('students', 'StudentsController');
    Route::post('students_mass_destroy', ['uses' => 'StudentsController@massDestroy', 'as' => 'students.mass_destroy']);

    // Roles
    Route::resource('roles', 'RolesController');

    // Enrolls
    Route::resource('enrolls', 'EnrollsController');
    Route::post('enrolls_mass_destroy', ['uses' => 'EnrollsController@massDestroy', 'as' => 'enrolls.mass_destroy']);

    // Exams
    Route::resource('exams', 'ExamsController');
    Route::post('exams_mass_destroy', ['uses' => 'ExamsController@massDestroy', 'as' => 'exams.mass_destroy']);

    // Exam Questions
    Route::resource('exam_questions', 'ExamQuestionsController');
    Route::post('exams_mass_create', ['uses' => 'ExamQuestionsController@massCreate', 'as' => 'exam_questions.mass_create']);

    // Questions
    Route::resource('questions', 'QuestionsController')->except([
        'create','show','edit'
    ]);
    Route::get('/questions/create/{qtype}', 'QuestionsController@create')->name('questions.create');
    Route::get('/questions/show/{qtype}/{id}', 'QuestionsController@show')->name('questions.show');
    Route::get('/questions/{qtype}/{id}/edit', 'QuestionsController@edit')->name('questions.edit');
    Route::post('questions_mass_destroy', ['uses' => 'QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);

    // Question Options
    Route::resource('questions_options', 'QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);

    // Results
    Route::get('results_export', ['uses' => 'TestsController@export', 'as' => 'results.export']);
    
    // Item Analysis
    Route::resource('item_analysis', 'ItemAnalysisController');

    // Departments
    Route::resource('departments', 'DepartmentsController');
    Route::post('departments_mass_destroy', ['uses' => 'DepartmentsController@massDestroy', 'as' => 'departments.mass_destroy']);

    // Courses
    Route::resource('courses', 'CoursesController');
    Route::get('courses_export', ['uses' => 'CoursesController@export', 'as' => 'courses.export']);
    Route::post('courses_mass_destroy', ['uses' => 'CoursesController@massDestroy', 'as' => 'courses.mass_destroy']);

    // Subjects
    Route::resource('subjects', 'SubjectsController');
    Route::post('subjects_mass_destroy', ['uses' => 'SubjectsController@massDestroy', 'as' => 'subjects.mass_destroy']);
    
    // User Actions
    Route::resource('user_actions', 'UserActionsController');
});

// Results
Route::resource('results', 'ResultsController');
Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);

// Tests
Route::resource('tests', 'TestsController')->except([
    'index','show'
]);
Route::get('/tests/{exam_id}/{user_id}', 'TestsController@index')->name('tests.index');

