<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//remove
Route::get('/home', 'HomeController@index')->name('home');

//users
Route::get('/users', 'UserController@index');
Route::get('/users/add', 'UserController@create');
Route::post('/users/store', 'UserController@store');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::patch('/users/{user}', 'UserController@update');
Route::delete('/users/{user}', 'UserController@destroy');

//students
Route::get('/students', 'StudentController@index');
Route::get('/students/add', 'StudentController@create');
Route::post('/students/store', 'StudentController@store');
Route::get('/students/{st}/edit', 'StudentController@edit');
Route::patch('/students/{st}', 'StudentController@update');
Route::delete('/students/{st}', 'StudentController@destroy');

Route::get('/students/move/{year}', 'StudentController@move');


//subjects
Route::get('/subjects', 'SubjectController@index');
Route::get('/subjects/add', 'SubjectController@create');
Route::post('/subjects/store', 'SubjectController@store');
Route::get('/subjects/{sub}/edit', 'SubjectController@edit');
Route::patch('/subjects/{sub}', 'SubjectController@update');
Route::delete('/subjects/{sub}', 'SubjectController@destroy');

//attendent
Route::get('/attendent', 'AttendanceController@get');
Route::post('/attendent/index', 'AttendanceController@index');
Route::delete('/attendent/{attendent}', 'AttendanceController@destroy');
Route::get('/attendent/export', 'AttendanceController@export');

Route::post('/attendent/searchall', 'AttendanceController@searchall');
Route::post('/attendent/searchone', 'AttendanceController@searchone');
Route::get('/attendent/{att}/edit', 'AttendanceController@edit');
Route::patch('/attendent/{att}', 'AttendanceController@update');

Route::delete('/status/deleteall', 'AttendanceController@destroyStatus');


//sick
Route::get('/sick', 'SickController@create');
Route::post('/sick/store', 'SickController@store');
Route::delete('/sick/{sick}', 'SickController@destroy');


//levels
Route::get('/levels', 'LevelController@index');
Route::get('/levels/add', 'LevelController@create');
Route::post('/levels/store', 'LevelController@store');
Route::get('/levels/{level}/edit', 'LevelController@edit');
Route::patch('/levels/{level}', 'LevelController@update');
Route::delete('/levels/{level}', 'LevelController@destroy');


//semester
Route::get('/semesters', 'SemesterController@index');
Route::get('/semesters/add', 'SemesterController@create');
Route::post('/semesters/store', 'SemesterController@store');
Route::get('/semesters/{semester}/edit', 'SemesterController@edit');
Route::patch('/semesters/{semester}', 'SemesterController@update');
Route::delete('/semesters/{semester}', 'SemesterController@destroy');



//course_instructor
Route::get('/povits', 'PovitController@index');
Route::get('/povits/add', 'PovitController@create');
Route::post('/povits/store', 'PovitController@store');
Route::get('/povits/{id}/edit', 'PovitController@edit');
Route::patch('/povits/{id}', 'PovitController@update');
Route::delete('/povits/{id}', 'PovitController@destroy');