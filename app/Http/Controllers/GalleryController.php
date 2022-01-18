<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests\CreateGalleryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries=Gallery::orderBy('id', 'DESC')->get();
        // dd($galleries);
        return view('Admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGalleryRequest $request)
    {
        $image=$request->file('image_url');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $gallery=new Gallery();
        $gallery->user_id=Auth::id();
        $gallery->image_url=$imageName;
        $save=$gallery->save();
        if ($save) {
            $image->move(public_path('images'), $imageName);
        }
        $request->session()->flash('message', 'images uploaded successfully');
        return redirect()->route('galleries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('Admin.category.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        File::delete(public_path('images/'.$gallery->image_url));
        $gallery->delete();
        session()->flash('delete-message', 'image deleted successfully');
        return redirect()->route('galleries.index');
    }
}
