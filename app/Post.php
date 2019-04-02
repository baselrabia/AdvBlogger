<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   public function getRouteKeyName(){
        return 'title';
    }

   public function admin(){
       return $this->belongsTo(Admin::class);
    }

    public static function listApproved(){
    	return static::whereApproved(1)->orderByDesc('created_at')->paginate(10);
    }
}

