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

// Auth namespace Middleware

Route::group(['namespace'=>'Auth'],function(){
	// guest Middleware with Auth namespace
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

	// user:admin Middleware with Auth namespace

	Route::group(['middleware'=>'user:admin'],function(){
		Route::get('/change-password',[
			'uses' => 'ChangePasswordController@getChangePassword',
			'as' => 'change-password'
		]);
		Route::post('/change-password',[
			'uses' => 'ChangePasswordController@postChangePassword',
			'as' => 'change-password'
		]);
		Route::post('/logout',[
				'uses' => 'LoginController@logout',
				'as' => 'logout'
			]);

	});



});
 
// just Admin Middleware

 Route::group(['middleware'=>'admin'],function(){

 	Route::get('/admin',function(){
		return view('admin.dashboard');
	})->name('admin');

	Route::get('/admin/dashboard',function(){
		return view('admin.dashboard');
	})->name('admin.dashboard');


	Route::get('/upgrade','AdminController@listUsers')->name('list.users');
	Route::get('/downgrade','AdminController@listUsers');
	Route::post('/downgrade/{username}','AdminController@downgradeUser')->name('downgrade.users');
	Route::post('/upgrade/{username}','AdminController@upgradeUser')->name('upgrade.users');


	Route::resource('/posts','PostController');

	Route::get('/postsunapproved',[
			'uses' => 'PostController@listUnApproved',
			'as' => 'posts.unapproved'
		]);
	Route::post('/posts/approve/{id}',[
			'uses' => 'AdminController@approve',
			'as' => 'posts.approve'
		]);

	Route::resource('/tags','TagController');

	Route::get('/popular/tags','TagController@sortByPopularity');




});


// just user:admin Middleware
 Route::group(['middleware'=>'user:admin'],function(){
	Route::get('/profile','UserController@getProfile')->name('myProfile');
	Route::get('/profile/{username}','UserController@getUserProfile')->name('profile');
	Route::post('/profile','UserController@postProfile')->name('profile');


		Route::get('/posts','PostController@index')->name('posts.index');
	Route::get('/posts/{post}','PostController@show')->name('posts.show');

			Route::get('/comments/{comment}','CommentController@show')->name('comments.show');
	Route::get('/comments/{comment}/{post}','CommentController@edit')->name('comments.edit');
			Route::post('/comments/{post}','CommentController@store')->name('comments.store');
		Route::put('/comments/{comment}','CommentController@update')->name('comments.update');
	Route::delete('/comments/{comment}','CommentController@destroy')->name('comments.destroy');

	Route::get('/replies/{reply}','ReplyController@show')->name('replies.show');
	Route::get('/replies/{reply}/{post}','ReplyController@edit')->name('replies.edit');
	Route::post('/replies/{comment}/{post}','ReplyController@store')->name('replies.store');
	Route::put('/replies/{reply}','ReplyController@update')->name('replies.update');
	Route::delete('/replies/{reply}','ReplyController@destroy')->name('replies.destroy');


	Route::get('/home','PostController@home')->name('home');

});


// just User Middleware
Route::get('/user/dashboard',function(){
	return view('user.dashboard');
})->name('user.dashboard')->middleware('user');


// No Middleware
Route::get('/',function(){
	return view('welcome');
});

Route::get('/archives/{month}/{year}','PostController@getByArchive')->name('archives');







// just Admin Tests Middleware

 Route::group(['middleware'=>'admin'],function(){


	Route::get('/sessions',function(){
		dd(session()->all());
	});



	Route::get('/test',function(){
		if(\App\Admin::listOnlineUsers() !== NULL){
			foreach ( \App\Admin::listOnlineUsers() as $user) {
				dump($user->roles()->first()->slug);
			}


		}else{
			echo 'No Online Users Now';
		};
	});

	Route::get('/testn2',function(){
		dd(\App\Admin::upgradeUser(30,['user.show' => true ,'moderator.create' => false ,'admin.edit' => false]));
	});
});