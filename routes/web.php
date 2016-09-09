<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('events', 'EventController');
Route::resource('donates', 'Donate');
Route::resource('contact', 'ContactController');
Route::get('/userprofile', function () {

	return view( '/users/userprofile' );

}
);

Auth::routes();

Route::get('/home', 'HomeController@index');
