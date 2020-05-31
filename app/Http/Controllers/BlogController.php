<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        //get blog category id
        $blog_category = Category::where('category_slug', 'blog')->first();
        if($blog_category){
            $blog = Tutorial::where('category_id', $blog_category->id)->latest()->Paginate(50);
            return view('blog.index', compact('blog'));
        }
        return back();
    }

    public function show($slug){
        $blog_tutorial = Tutorial::where('slug', $slug)->first();
        $category = Category::where('id', $blog_tutorial->category_id)->first();
        if($category->category_slug == 'blog'){
            $previous_blog = Tutorial::where('category_id', $category->id)->where('id', '<', $blog_tutorial->id)->orderBy('id','desc')->first();
            $next_blog = Tutorial::where('category_id', $category->id)->where('id', '>', $blog_tutorial->id)->orderBy('id','asc')->first();
            $category_blog = Tutorial::where('category_id', $blog_tutorial->category_id)->get();
            return view('blog.show', compact('blog_tutorial', 'category_blog', 'previous_blog', 'next_blog'));
        }
        return back();
    }
}
