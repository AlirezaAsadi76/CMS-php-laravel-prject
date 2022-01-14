<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateThumbnailRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::orderBy('id','DESC')->get();
        return view('Admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('Admin.category.create');
    }

    public function store(CreateThumbnailRequest $request)
    {
        $cat=new Category();
        $cat->thumbnail=$request->thumbnail;
        $cat->user_id=Auth::id();
        $cat->name=$request->name;
        $cat->slug=Str::slug($request->slug);
        $cat->is_published=$request->publish;
        $cat->save();
        $request->session()->flash('message', 'Category created successfully');
        return redirect()->route('categories.index');

    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('Admin.category.edit',compact('category'));
    }

    public function update(CreateThumbnailRequest $request, Category $category)
    {
        $category->thumbnail=$request->thumbnail;
        $category->user_id=Auth::id();
        $category->name=$request->name;
        $category->slug=Str::slug($request->slug);
        $category->is_published=$request->publish;
        $category->save();
        $request->session()->flash('message', 'Category Update successfully');
        return redirect()->route('categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('delete-message', 'Category deleted successfully');
        return redirect()->route('categories.index');
    }
}
