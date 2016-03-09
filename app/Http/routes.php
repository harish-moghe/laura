<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
});

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */
Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', function () {
        return view('welcome');
    });
});


Route::group(['prefix' => 'admin', 'namespace' => 'backend', 'before' => 'admin'], function() {
    // only /admin/ routes in here that will be in a namespace folder of "backend" with admin middleware
    Route::resource('pages', 'PagesController'); // app/Http/controllers/backend/PagesController.php
    Route::resource('users', 'UserController');
});
