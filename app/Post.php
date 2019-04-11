<?php

namespace App;

use Carbon\Carbon;
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
    	return static::whereApproved(1)->orderByDesc('created_at');
    }


    public static function archives(){
      return static::selectRaw('year(created_at) year,monthname(created_at) month,count(*) published')
      ->groupBy('year','month')
      ->orderByDesc('year')
      ->get()->toArray();

    }


    public static function scopeFilter($query,$month = null ,$year = null){

       if (isset($month)){
         $query->whereMonth('created_at',Carbon::parse($month)->month);

      }
       if (isset($year)){
         $query->whereYear('created_at',intval($year));
      }
   
    }




}

