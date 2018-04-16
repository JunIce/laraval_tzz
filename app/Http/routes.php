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

Route::get('/', 'HomeController@index');

Route::get('/label/{tagid}', 'HomeController@tag')->where('tagid', '[0-9]+');

Route::get('/posts/photo/{id}', 'HomeController@photo')->where('id', '[0-9]+');

Route::group(['prefix' => 'ajax'], function (){
	Route::get('homelist', 'HomeController@getlist');
	Route::get('taglist', 'TagController@getlist');	
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
