<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// guest Middleware

Route::group(['namespace'=>'Auth'],function(){
	Route::group(['middleware'=>'guest'],function(){


	Route::get('/register', [
		'uses' => 'RegisterController@getRegister',
		'as' => 'register'
	]);
	Route::post('/register', [
		'uses' => 'RegisterController@postRegister',
		'as' => 'register'
	]);

	Route::get('/login',[
		'uses' => 'LoginController@getLogin',
		'as' => 'login'
	]);
	Route::post('/login',[
		'uses' => 'LoginController@postLogin',
		'as' => 'login'
	]);
	Route::get('/activate/{email}/{token}','EmailActivationController@activateUser');

 });

 	Route::post('/logout',[
		'uses' => 'LoginController@logout',
		'as' => 'logout'
	]);
});

// Admin Middleware

Route::group(['middleware'=>'admin'],function(){

	Route::get('/admin',function(){
		return view('admin.dashboard');
	})->name('admin.dashboard');

	Route::get('/admin/dashboard',function(){
		return view('admin.dashboard');
	})->name('admin.dashboard');
});

Route::get('/home',function(){
	return view('home');
})->name('home');
Route::get('/',function(){
	return view('welcome');
});


Route::get('/user/dashboard',function(){
	return view('user.dashboard');
})->name('user.dashboard');



Route::get('/sessions',function(){
	dd(session()->all());
});
