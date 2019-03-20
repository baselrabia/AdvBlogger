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

	Route::get('/reset','ForgetPassController@getForgetPass')->name('reset');
	Route::post('/reset','ForgetPassController@postForgetPass')->name('reset');
	Route::get('/reset/{email}/{token}','ResetPasswordController@getResetPasswordByEmail')
	->name('reset-password');
	Route::post('/reset-password','ResetPasswordController@postResetPasswordByEmail')
	->name('reset-password');


	Route::get('/resetBySecurityQuestion',[
		'uses' => 'ResetPasswordController@getResetPasswordByQuestion',
		'as' => 'reset.security'
	]);
	Route::post('/resetBySecurityQuestion/stage1',[
		'uses' => 'ResetPasswordController@postResetPasswordByQuestion1',
		'as' => 'reset.security1'
	]);
	Route::post('/resetBySecurityQuestion/stage2',[
		'uses' => 'ResetPasswordController@postResetPasswordByQuestion2',
		'as' => 'reset.security2'
	]);
	Route::post('/resetBySecurityQuestion/stage3',[
		'uses' => 'ResetPasswordController@postResetPasswordByQuestion3',
		'as' => 'reset.security3'
	]);

 Route::get('/login/{provider}', 'SocialController@redirect');
 Route::get('/login/{provider}/callback','SocialController@Callback');


 });

	// Admin Middleware

Route::group(['middleware'=>'admin'],function(){
	Route::get('/change-password',[
		'uses' => 'ChangePasswordController@getChangePassword',
		'as' => 'change-password'
	]);
	Route::post('/change-password',[
		'uses' => 'ChangePasswordController@postChangePassword',
		'as' => 'change-password'
	]);


});

Route::post('/logout',[
		'uses' => 'LoginController@logout',
		'as' => 'logout'
	]);

});
 

 Route::group(['middleware'=>'admin'],function(){

 	Route::get('/admin',function(){
		return view('admin.dashboard');
	})->name('admin');

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
