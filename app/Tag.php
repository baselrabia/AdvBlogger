<?php

namespace App;

use Sentinel;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	 private static $delimeters = [' ',','];
	protected $fillable = ['name','admin_id'];


     public function getRouteKeyName(){
        return 'name';
    }

    public function posts(){
       return $this->belongsToMany(Post::class);
    }

    public function admin(){
       return $this->belongsTo(admin::class);
    }


    public static function delimeters($request){
        foreach (self::$delimeters as $delimeter) {
            if(strpos($request,$delimeter)){
                $delimeters[] = $delimeter;    
            } 
        }
        return $delimeters ?? NULL;
    }

     public static function assignTags($new)
    {
        $tags = new self();
        if(self::delimeters($new) != NULL){
            $inserted_tags = preg_split('/(,| )/',$new);
               
           foreach ($inserted_tags as $tag) {
               if($tags->where('name',str_slug($tag))->exists()){
                    $user_tags[] = Tag::whereName(['name' => $tag])->get();
                    continue;
               }
               $tags->create(['name' => str_slug($tag) , 'admin_id' => Sentinel::getUser()->id]);
               $user_tags[] = Tag::whereName($tag)->get();
               
           }
         
         
        }else{
            if(!$tags->where('name',str_slug($new))->exists()){
                $tags->create(['name' => str_slug($new),'admin_id' => Sentinel::getUser()->id]);
                
            }            
            $user_tags = $tags->where('name',str_slug($new))->first();
        }
        \Session::put('tags',$user_tags);
        return true;
    }


     public static function PopularTags()
    {
        return static::join('post_tag','post_tag.tag_id', '=' , 'tags.id')
        ->groupBy(['tags.id','tags.name'])
        ->get(['tags.id','tags.name',\DB::raw(' count(tags.id) as tag_count')])
        ->sortByDesc('tag_count')->take(3);
    }
    public static function countTag($tag){
        return static::whereName($tag)->count();
    }

}
