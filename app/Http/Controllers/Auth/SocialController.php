<?php

namespace App\Http\Controllers\Auth;

use Sentinel;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use App\Http\Controllers\Controller;
use File; 

class SocialController extends Controller
{
    public function redirect($provider)
    {
     return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
	{
	    $userSocial = Socialite::driver($provider)->stateless()->user();
        $user       = User::where(['email' => $userSocial->getEmail()])->first();

		if($user){
					$user = Sentinel::findById($user->id);
		            $user = Sentinel::login($user); 
		        	return redirect()->home();
		}else{	

		if ($provider = 'facebook'){
			$fileContents = file_get_contents($userSocial->getAvatar());
			File::put(public_path() . '/profile_pictures/' . $userSocial->getId()  . time() . "_avatar.jpg", $fileContents);
			$file_name_new = $userSocial->getId()  . time() . "_avatar.jpg";
			}



					$user = Sentinel::registerAndActivate([
			    	 	'email'			=> $userSocial->getEmail(),
			    	 	'username' 		=> $userSocial->getName(),
			    	 	'provider_id'   => $userSocial->getId(),
			    	 	'profile_picture'=> $file_name_new ?? "default.png",
		                'provider'      => $provider,
		                'password' 		=> bcrypt(substr($userSocial->token, 0, 10)),
		                'dob'			=>null,
		                'secuirty_question'=>null,
    	 				'secuirty_answer'=>null,
    	 				'location'=>null,
    	 				'first_name'=> explode(' ',$userSocial->getName())[0],
    	 				'last_name'=> explode(' ',$userSocial->getName())[1],


			    	 ]);

					$role = Sentinel::findRoleBySlug('user');
    	 			$role->users()->attach($user);

    	 			$user = Sentinel::login($user); 
		        	return redirect()->home();
		}
	}
	


}