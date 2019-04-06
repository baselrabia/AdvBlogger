<?php

namespace App\Http\Controllers;

use App\Tag;
use Sentinel;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags',Tag::all());
    }

     public function sortByPopularity(){
        return view('tags.index')->with('tags',Tag::PopularTags());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         request()->validate([
            'name'=> 'required|unique:tags,name',
        ]);

        if(\App\Tag::assignTags(request('name'))){
            return redirect()->route('tags.index')->with('success','Tag Has Been Created Successfully'); 
            \Session::forget('tags');
        }      
            return redirect()->route('tags.index')->with('error','Could Not Created Tag'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
       return view('tags.show')->with('tag',$tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
       if (Sentinel::getUser()->id != $tag->admin_id){
            return redirect()->route('tags.index')->with('error','unauthorized Page');
        }
        return view('tags.edit')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        request()->validate([
            'name'=> "required|unique:tags,name,$tag->id",
        ]);

        Tag::whereName($tag->name)->update([
            'name'=> request('name'),
            'admin_id'=>Sentinel::getUser()->id,

        ]);
        return redirect()->route('tags.index')->with('success','Tag Has Been Updated Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if (Sentinel::getUser()->id != $tag->admin_id){
            return redirect()->route('tags.index')->with('error','unauthorized Page');
        }
       
        $tag->delete();
        return redirect()->route('tags.index')->with('success','Tag Has Been Deleted Successfully');
    }
}
