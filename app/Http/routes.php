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

// Route::get('/', function()
// {
// 	return Redirect::route('login');
// });

// login
Route::get('/login', array('uses' => 'AuthController@getLogin', 'as' => 'login'));
Route::post('login', array('as' => 'login.post', 'uses' => 'AuthController@postLogin'));

Route::get('logout', array('uses' => 'AuthController@getLogout' , 'as' => 'logout' ));

Route::resource('user', 'UsersController');
