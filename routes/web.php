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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UserController');
    Route::get('profile', 'UserController@editProfile');
    Route::post('profile', 'UserController@updateProfile');
    Route::resource('roles', 'RoleController');
    Route::get('update-profile', 'UserController@editProfile');
    Route::post('update-profile', 'UserController@updateProfile');
});