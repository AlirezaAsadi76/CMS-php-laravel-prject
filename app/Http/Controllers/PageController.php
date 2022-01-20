<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pages=Post::orderBy('id','Desc')->where('post_type','=','page')->get();
        return view('Admin.page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePageRequest $request)
    {

        $post=new Post();
        $post->user_id=Auth::id();
        $post->details=$request->details;
        $post->title=$request->title;
        $post->thumbnail=$request->thumbnail;
        $post->sub_title=$request->sub_title;
        $post->slug=str_slug($request->title);
        $post->post_type='page';
        $post->is_published=$request->publish;
        $sa=$post->save();
        session()->flash("message","page created successfully");
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $page)
    {

        return view('Admin.page.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request,Post $page)
    {
        $page->details=$request->details;
        $page->title=$request->title;
        $page->thumbnail=$request->thumbnail;
        $page->sub_title=$request->sub_title;
        $page->slug=str_slug($request->title);
        $page->post_type='page';
        $page->is_published=$request->publish;
        $page->update();

        session()->flash("message","page update successfully");
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $page)
    {
        $page->delete();
        session()->flash('delete-message', 'page deleted successfully');
        return redirect()->route('pages.index');
    }
}
