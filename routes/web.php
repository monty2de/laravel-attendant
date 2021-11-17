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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UserController@index');
Route::get('/users/add', 'UserController@create');
Route::post('/users/store', 'UserController@store');
Route::get('/users/{user}', 'UserController@show');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::patch('/users/{user}', 'UserController@update');
Route::delete('/users/{user}', 'UserController@destroy');


Route::get('/students', 'StudentController@index');
Route::get('/students/add', 'StudentController@create');
Route::post('/students/store', 'StudentController@store');

