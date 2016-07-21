<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'IndexController@index');

Route::get('/trending', 'OrderController@trending');

Route::get('/o/{id}', 'OrderController@order');

Route::get('/o/{id}/edit', 'OrderController@edit');

Route::get('/login', 'LoginController@index');

Route::get('/signup', 'SignupController@index');

Route::get('/videos/{tag}', 'VideoController@index');