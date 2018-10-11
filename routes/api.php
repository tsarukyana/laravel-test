<?php

use Illuminate\Http\Request;

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

Route::post('/users/all', 'UsersController@all');
Route::post('/users/store', 'UsersController@store');
Route::delete('/users/{id}', 'UsersController@destroy');
Route::put('/users/{id}', 'UsersController@update');
