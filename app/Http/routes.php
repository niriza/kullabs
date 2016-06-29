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

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes...
Route::get('auth/login', array('uses' => 'Auth\AuthController@getLogin', 'as' => 'login'));
Route::post('auth/login', array('uses'=> 'Auth\AuthController@postLogin', 'as' => 'login.post'));
Route::get('auth/logout', array('uses'=>'Auth\AuthController@logout','as' => 'logout'));

// Registration routes...
Route::get('auth/register', array('uses' => 'Auth\AuthController@getRegister', 'as' => 'getRegister'));
Route::post('auth/register', array('uses'=>'Auth\AuthController@postRegister', 'as' => 'postRegister'));

Route::resource('user', 'UsersController');
