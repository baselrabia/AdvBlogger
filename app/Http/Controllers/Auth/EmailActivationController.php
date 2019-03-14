<?php

namespace App\Http\Controllers\Auth; 

use App\User;
use Sentinel;
use Activation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EmailActivationController extends Controller
{
    

    public function activateUser($email,$token){
    	if($user = User::whereEmail($email)->first()){
    		$user = Sentinel::findById($user->id);
    		if(Activation::exists($user)){

    			if(Activation::complete($user,$token)){
    				Activation::removeExpired();
	    			 if(Sentinel::login($user,true)){
	    				return redirect()->home()->with('success','logged in Successfuly.');
	    			}
	    		}

    		}else{
    			return redirect()->route('home')->with('error','Invalid Activation token');
    		}
    	}else{
    		return redirect()->route('home')->with('error','Email doesn\'t exists');
    	}
}
}
