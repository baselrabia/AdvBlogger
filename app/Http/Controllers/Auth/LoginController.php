<?php

namespace App\Http\Controllers\Auth;

use Sentinel;
use Activation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Checkpoints\{NotActivatedException,ThrottlingException};
use App\User;
use Hash;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('auth.login');

    }

    public function postLogin(){
    request()->validate([
            'email' => new \App\Rules\usernameOrEmail,
            'password' => 'required|string|min:6|max:32',
            'remember' => 'in:on,null'
           
        ],['remember.in' =>'invalid Value']);

    $remember = false;
    if (request()->remember === 'on'){
        $remember = true;
    }

    	
 		if ($user = User::whereUsernameOrEmail(request('email'),request('email'))->first()) {
 			$user = Sentinel::findById($user->id);

            try {

	 		if (Activation::completed($user)){
                if(Hash::check(request()->password,$user->password)){
	 			$user = Sentinel::login($user,$remember); 

		 		if ($user->hasAnyAccess(['admin.*','moderator.*'])) {
		            return redirect()->route('admin.dashboard')->with('success','Welcome To Admin Dashboard');
		        }elseif($user->hasAccess('user.*')){
		            return redirect()->route('home')->with('success','logged in Successfully');
		        }}
                return redirect()->route('login')->with('error','invalid Data !!! ');

	 		}else{
	 			return redirect()->route('login')->with('error','Perhaps you forget to activate your account !!! ');
	 		}

	 		} catch (NotActivatedException $e){

                return redirect()->back()->with('error','Perhaps you forget to activate your account');

            } catch (ThrottlingException $e){

                return redirect()->back()->with('error',$e->getMessage());

            }

	    }


    	 
		return redirect()->back()->with('error','E-Mail or Password is Wrong');
		

    }

    public function logout(){

    	Sentinel::logout(null,true);
    	return redirect()->route('login')->with('success',' Logged Out Successfully');

    }
}
