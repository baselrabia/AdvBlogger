<?php

namespace App\Http\Controllers\Auth;

use Sentinel;
use Activation;
use Mail; 
use App\Mail\UserActivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function getRegister(){
    	return view('auth.register');

    }

    public function postRegister(){

    	/*

    	array:9 [▼
  "_token" => "aqOalC9m6l4LHm18AFprV9xhqE4C8sUngFFY08iN"
  "email" => "johndoe@gmail.com"
  "username" => "JoneDoe"
  "first_name" => "jone"
  "last_name" => "doe"
  "location" => "united states"
  "password" => "123456"
  "password_confirmation" => "123456"
  "dob" => "1994-10-10"
]
    	*/
    	
    	 request()->validate([
    	 	'email' => 'required|unique:users,email|email',
    	 	'username' => 'required|min:6|max:18|alpha_dash|unique:users,username',
    	 	'first_name'=> 'required|min:3|max:18|alpha ',
    	 	'last_name'=> 'required|min:3|max:18|alpha ',
    	 	'location'=> ['regex:/^[a-zA-Z0-9-_. ]*$/','required','min:3','max:23'],
    	 	'password'=> 'required|string|min:6|max:32|confirmed ',
    	 	'dob'=> 'required|date|before_or_equal:2010-01-01|date_format:Y-m-d',

    	 ]);

    	
    	 $user = Sentinel::register([
    	 	'email' =>request()->email,
    	 	'username' => request()->username,
    	 	'first_name'=> request()->first_name,
    	 	'last_name'=> request()->last_name,
    	 	'location'=> request()->location,
    	 	'password'=> request()->password,
    	 	'dob'=> request()->dob
    	 ]);

    	 $user = Sentinel::findById($user->id);
    	 $activationToken = Activation::create($user);

    	 Mail::to($user)->send(new UserActivation($user,$activationToken));

    	 $role = Sentinel::findRoleBySlug('user');
    	 $role->users()->attach($user);



 		return redirect()->route('login')->with('success','you have been Registered Successfully, Check your email for verify');

    }
}
