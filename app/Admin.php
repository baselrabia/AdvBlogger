<?php

namespace App;

use Sentinel;
use Activation;
use Cartalyst\Sentinel\Users\EloquentUser;

class Admin extends EloquentUser
{
    protected $table = 'users';

    public function tags(){
       return $this->hasMany(Tag::class);
    }

    public function posts(){
       return $this->hasMany(Post::class);
    }

    public static function approve($id){
    	$post = \App\Post::find($id)->whereApproved(0)->first();
    	if($post){
    		$post->approved = 1 ;
    		$post->approved_by = Sentinel::getUser()->username;
    		$post->approved_at = date('Y-m-d H:i:s');
    		$post->save();

    		return true;

    	}

    	return false;


    }


    public static function adminTags(){
        $username = Sentinel::getUser()->username;
       return static::whereUsername($username)->first()->tags->take(4);
    }




    static function listOnlineUsers(){

    	$users = static::pluck('id')->all();

    	foreach ($users as $user) {

    	 	if (Activation::completed(static::find($user))) {

    	 		$code = Sentinel::findById($user)->persistences->first()->code ?? NULL;

    	 		if($code){

    	 		$online_users[] = Sentinel::findByPersistenceCode($code);

    	 		}

    	 		continue;
    		 }
    	 } 
    	  
		return $online_users ?? NULL;
    	

    }

    public static function upgradeUser($id,$permissions){
    	$user = Sentinel::findById($id);

    	if ($user->hasAccess('admin.*')){
    		return false;
    	}

    	if (is_array($permissions)){
    		foreach ($permissions as $permission => $value) {
    			$user->updatePermission($permission,$value,true)->save();

    		}
    		return true;
    	}else{
    		$user->updatePermission($permissions,true,true)->save();
    		return true;
    	}
    	return false;
    }


 	public static function downgradeUser($id,$permissions){
    	$user = Sentinel::findById($id);

    	if ($user->hasAccess('admin.*')){
    		return false;
    	}

    	if (is_array($permissions)){
    		foreach ($permissions as $permission => $value) {
    			$user->updatePermission($permission,$value,true)->save();

    		}
    		return true;
    	}else{
    		$user->updatePermission($permissions,false,true)->save();
    		return true;
    	}
    	return false;
    }

     public static function listUsers(){
        foreach (\App\Admin::pluck('id') as $value) {
            $user = \Sentinel::findById($value);
            if(\Activation::completed($user)){
                if(!$user->hasAnyAccess(['admin.*'])){
                    $users[] = $user;
                }
            }
            continue;
        }
        return $users ?? NULL;
    }   

}

