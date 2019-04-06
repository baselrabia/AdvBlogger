<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = ['title','admin_id','body','imagePath'];
   public function getRouteKeyName(){
        return 'title';
    }

    public function comments(){
       return $this->hasMany(Comment::class);
    }

      public function tags(){
       return $this->belongsToMany(Tag::class);
    }

   public function admin(){
       return $this->belongsTo(Admin::class);
    }

    public static function listApproved(){
    	return static::whereApproved(1)->orderByDesc('created_at')->paginate(10);
    }
}

