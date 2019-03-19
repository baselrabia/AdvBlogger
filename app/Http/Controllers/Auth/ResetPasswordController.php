<?php
namespace App\Http\Controllers\Auth;
use Sentinel;
use Activation;
use Reminder;
use App\User;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class ResetPasswordController extends Controller
{
    function getResetPasswordByEmail($email,$token){
    	$user = User::whereEmail($email)->first();
    	if($user){
			$user = Sentinel::findById($user->id);
			if(Reminder::exists($user)->code === $token){
				\Session::put('user',$user);
				\Session::put('token',$token);
				return view('auth.reset-password');

			}else{
				return redirect()->route('login')->with('error','invalid Token');
			}
    		

    	}else{
    		return redirect()->route('login')->with('error','invalid Email');
    	}
        

    }
    function postResetPasswordByEmail(){
    	request()->validate([
    		'password' => 'required|confirmed|min:6|max:32'
    	]);

    	$user = Sentinel::findById(1);

		if ($reminder = Reminder::complete(\Session::get('user'), \Session::get('token'), request()->password)){
		    Reminder::removeExpired();
		    \Session::flush();
		    return redirect()->route('login')->with('success','Password Changed Successfully');


		}else{
			return redirect()->route('login')->with('error','please try again later'); 
		}
    }

    function getResetPasswordByQuestion(){
    	return view('auth.resetByQuestion');

    }
    function postResetPasswordByQuestion1(){
    	request()->validate([
    		'email' => 'required|exists:users,email|email',
    	 	
    	 	'location'=> ['regex:/^[a-zA-Z0-9-_. ]*$/','required','min:3','max:23','exists:users,location'],
    	 	
    	 	'dob'=> 'required|date|before_or_equal:2010-01-01|date_format:Y-m-d',
    	 	
    	]);

    	if($user = User::whereEmail(request('email'))->first()){
 		$user = Sentinel::findById($user->id);

	 		if (Activation::completed($user)){
	 		$user = User::where(['email' => request('email'),'location' => request('location') ,'dob' => request('dob')])->first();
            
		 		if($user){
		 			Session::put('user' , $user); 
		 			Session::flash('success' , 'stage 2 : answering the sequrity question');
		 			return redirect()->back()->with('stage 2', 'this is a stage 2' );  
		 		}else{
		 			Session::flush();
		 			return redirect()->back()->with('error','Invalid Data');
		 		}
		 	}else{
		 		Session::flush();
		 		return redirect()->back()->with('error','Account is not activated yet');
		 	}}	

    }

    function postResetPasswordByQuestion2(){
    	request()->validate([
           'sec_question'=>'required|string|in:where_are_you_from,what_is_your_hobby,what_is_your_favorite_car,who_is_your_favorite_doctor_or_teacher',
    	 	'sec_answer'=> [
    	 		'regex:/^[a-zA-Z0-9 ]*$/',
    	 		'required',
    	 		'min:3',
    	 		'max:32',
    	 		'string'
    	 	],
    	]);

    	if (Session::exists('user')){
    		$user = User::where([
    			'email'=> Session::get('user')->email,
    			'location'=> Session::get('user')->location,
    			'dob'=> Session::get('user')->dob,
                'secuirty_question'=> request('sec_question'),
    			'secuirty_answer'=> request('sec_answer')
    		])->first();
    		if($user){
    			Session::put('sec_answer' , request('sec_answer'));
    			return redirect()->back()->with(['success' , 'stage 3 : Submit new password','stage 3' => 'this is a stage 3']); 
    		}else{
    			Session::flush();
    			return redirect()->back()->with('error','Invalid Data');
    		}
    	}
    	Session::flush();
		return redirect()->back()->with('error','Invalid Data');
    }

    function postResetPasswordByQuestion3(){
    	request()->validate([
    	 	'password'=> 'required|string|min:6|max:32|confirmed ',
    	 	
    	]);

    	if (Session::exists(['user','sec_answer'])){
    		$user = User::where([
    			'email'=> Session::get('user')->email,
    			'secuirty_answer'=>Session::get('sec_answer')
    		])->first();

    		if($user){
    			$user->password = bcrypt(request('password'));
    			$user->save();
    			Session::flush();
    	 		return redirect()->route('login')->with('success','Password Changed Successfully');
			}else{
				Session::flush();
				return redirect()->back()->with('error','Invalid Data');
    		}
    	}

    	Session::flush();
		return redirect()->back()->with('error','Invalid Data');



    }



}
