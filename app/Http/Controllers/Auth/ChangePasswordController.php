<?php

namespace App\Http\Controllers\Auth;

use Hash;
use Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class ChangePasswordController extends Controller
{
    public function getChangePassword(){
    	return view('auth.change-password');
    }



    public function postChangePassword(){
    	if (Sentinel::check()){
    		$user = User::whereEmail(Sentinel::getUser()->email)->first();
    		if ($user){
    			request()->validate([
    				'current_password'=> 'required|string|min:6|max:32',
    			    'password'=> 'required|string|min:6|max:32|confirmed',
    			]);

    			if(Hash::check(request()->current_password,Sentinel::getUser()->password)){
    				$user->password = Hash::make(request()->password);
    				$user->save();

    				if (Sentinel::hasAnyAccess(['moderator.*','admin.*'])){
    					return redirect()->route('admin.dashboard')->with('success','Password Changed Successfully');
    				}

    				return redirect()->route('home')->with('success','Password Changed Successfully');

    			}else{
    				return redirect()->back()->with('error','Invalid Password');
    			}


    		}



    	}else{
    		return redirect()->route('login')->with('info','you should login first');
    	}




    }





}
