<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Post;
use App\User;
use App\Comment;
use Sentinel;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Comment $comment,Post $post)
    {
         request()->validate([
            'comment'=> 'required|max:500|min:3',
        ]);

         $reply = new Reply;
         $reply->body = request('comment');
         $reply->user_id = Sentinel::getUser()->id; 
         $reply->updated_at = null; 
         $reply->comment()->associate($comment);
         $reply->post()->associate($post);
         $reply->save();

         return back()->with('success','Reply Added'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        return view('posts.show')->with('post', $reply->post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply,Post $post)
    {
        return view('posts.show')->with(['reply'=> $reply,'post'=> $reply->post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        request()->validate([
            'comment'=> 'required|max:500|min:3',
        ]);

         $reply->update([
           'body' => request('comment'),
           'updated_at' => date('Y-m-d H:i:s'),
            'user_id' => Sentinel::getUser()->id

         ]);

         
         return redirect()->route('posts.show', $reply->post->title)->with('success','Reply Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
       $reply->delete();
        return redirect()->route('posts.show', $reply->post->title)->with('success','Reply Deleted');


    }
}
