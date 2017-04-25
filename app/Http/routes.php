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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('hello', function(){
	return 'Hello ice za';
});
//Route::get('welcome/hello','WelcomeController@hello');
//
//Route::get('welcome/page/{id}/{title?}','WelcomeController@page')
//->where(['id' => '[0-9]+', 'titel'=>'[a-zA-Z]+']);
//
Route::controller('welcome','WelcomeController');

Route::get('hello', 'HelloController@index');

Route::resource('articles','ArticlesController');

Route::get('lang/{lang}', function($lang){
		$available = ['en', 'th'];
		Session::put('locale',
						in_array($lang, $available)?
						$lang : Config::get('app.locale'));
		return redirect()->back();
	});
