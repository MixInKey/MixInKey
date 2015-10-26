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

//getting the login page
Route::get('/', array('uses' => 'UsersController@getLogin', 'as' => 'login'));
Route::get('/register', array('uses' => 'UsersController@registerPage', 'as' => 'register'));
Route::post('login', array('uses' => 'UsersController@postLogin', 'as' => 'postLogin'));
Route::post('register', array('uses' => 'UsersController@postRegister', 'as' => 'postRegister'));
Route::get('logout', array('uses' => 'UsersController@getLogout', 'as' => 'getLogout'));

Route::get('/search', ['uses' => 'BeatportController@search', 'as' => 'search']);

Route::get('/call', array('uses' => 'BeatportController@call'));
Route::get('/artists', array('uses' => 'BeatportController@getAllArtists'));
Route::get('/genres', array('uses' => 'BeatportController@getAllGenres'));
Route::post('/request', array('uses' => 'BeatportController@jsonRequest'));
