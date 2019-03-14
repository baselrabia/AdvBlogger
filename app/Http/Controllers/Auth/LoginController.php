<?php

namespace App\Http\Controllers\Auth;

use Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('auth.login');

    }

    public function postLogin(){
    request()->validate([
            'email' => new \App\Rules\usernameOrEmail,
            'password' => 'required|string|min:6|max:32'
           
        ]);

    	
 		if ($user = User::whereUsernameOrEmail(request('email'),request('email'))->first()) {
 			$user = Sentinel::findById($user->id);
	 		$user = Sentinel::login($user); 

	 		if ($user->hasAnyAccess(['admin.*','moderator.*'])) {
	            return redirect()->route('admin.dashboard')->with('success','Welcome To Admin Dashboard');
	        }elseif($user->hasAccess('user.*')){
	            return redirect()->route('home')->with('success','logged in Successfully');
	        }
	    }


    	 
		return redirect()->back()->with('error','E-Mail or Password is Wrong');
		

    }

    public function logout(){

    	Sentinel::logout(null,true);
    	return redirect()->route('login')->with('success',' - logged out Successfully');

    }
}
