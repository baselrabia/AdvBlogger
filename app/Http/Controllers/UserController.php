<?php

namespace App\Http\Controllers;

use Sentinel;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

	public function getProfile(){
    	return view('user.profile')->with('user', Sentinel::getUser());
    }


	public function getUserProfile($username){
    	
	
		$user = \App\User::whereUsername($username)->first();

		if($user){
			return view('user.profile')->with('user',$user);	
		}
		

		if(Sentinel::hasAnyAccess(['admin.*','moderator.*'])){
			return redirect()->route('admin.dashboard')->with('error','Invalid Profile Name');
		}
		return redirect()->route('user.dashboard')->with('error','Invalid Profile Name');

	}
    

    public function postProfile(Request $request){
    	$user = Sentinel::getUser();

    	 request()->validate([
    	 	'email' => "required|unique:users,email,$user->id|email",
    	 	'username' => "required|min:6|max:18|alpha_dash|unique:users,username,$user->id",
    	 	'first_name'=> 'required|min:3|max:18|alpha ',
    	 	'last_name'=> 'required|min:3|max:18|alpha ',
    	 	'location'=> ['regex:/^[a-zA-Z0-9-_. ]*$/','required','min:3','max:23'],
    	 	'password'=> 'required|string|min:6|max:32 ',
    	 	'dob'=> 'required|date|before_or_equal:2010-01-01|date_format:Y-m-d',
    	 	'profile_picture'=> 'nullable|max:1999|image|mimes:jpg,png,jpeg'
		]);


    	 if(Hash::check(request()->password,$user->password)){
    	 	if(request()->hasFile('profile_picture')){
    	 		$file_with_ext = request()->file('profile_picture')->getClientOriginalName();
	        	$file_ext = request()->file('profile_picture')->getClientOriginalExtension();
	            $file_name_new = str_random(40) . time().'.'.$file_ext;
	            $file_path = request()->file('profile_picture')->move(public_path().'/profile_pictures/',$file_name_new);

    	 	}

    	 	$user -> update([
    	 	'email' =>request()->email,
    	 	'username' => request()->username,
    	 	'first_name'=> request()->first_name,
    	 	'last_name'=> request()->last_name,
    	 	'location'=> request()->location,
    	 	
    	 	'dob'=> request()->dob,
    	 	'profile_picture'=> $file_name_new ?? "default.png"

    	 ]);

    	 	if($user->hasAnyAccess(['admin.*','moderator.*'])){
    	 		return redirect()->route('admin.dashboard')->with('success','Profile Updated ');

    	 	}
    	 	return redirect()->route('user.dashboard')->with('success','Profile Updated ');
    	 }else{
    	 return redirect()->back()->with('error','invalid Password !!! ');
		 }
    }
}
