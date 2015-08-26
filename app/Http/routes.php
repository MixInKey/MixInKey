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
    return view('index');
});

Route::get('/electro', function () {
    return view('templates.electro');
});

Route::get('/login', function () {
    return view('templates.login');
});


Route::get('/search', function () {
    return view('templates.search');
});

Route::get('/call', array('uses' => 'BeatportController@call'));
