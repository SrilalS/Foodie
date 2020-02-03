<?php

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
    return response('Invalid API Usage.');
});

Route::post('/api/1.0/users/add','UsersController@add');
Route::post('/api/1.0/users/login','UsersController@login');
