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

/* Route::get('/', function () {
    return view('welcome');
}); */

// Route Login
Route::get('/', 'LoginController@index');
Route::post('login', 'LoginController@doLogin');

// Route Home
Route::get('/logout', 'UserController@doLogout');

// Route Resource Page User
Route::resource('user', 'UserController');