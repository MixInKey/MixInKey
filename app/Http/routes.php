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
    return view('templates.search');
});

Route::get('/login', function () {
    return view('templates.login');
});


Route::get('/search', function () {
    return view('templates.search');
});

Route::get('/call', array('uses' => 'BeatportController@call'));
Route::get('/artists', array('uses' => 'BeatportController@getAllArtists'));
Route::get('/genres', array('uses' => 'BeatportController@getAllGenres'));
Route::post('/request', array('uses' => 'BeatportController@jsonRequest'));
