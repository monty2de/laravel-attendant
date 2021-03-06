<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['cors'])->group(function () {

    
    //user
    Route::post('/user/login', 'UserController@login');


    //subject
    Route::post('/subjects/get', 'SubjectController@get');

    // student
    Route::post('/students/get', 'StudentController@get');

    //attent
    Route::post('/attendant/store', 'AttendanceController@store');

        
});
