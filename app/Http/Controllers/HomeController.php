<?php

namespace App\Http\Controllers;
use App\Models\AiSoftware;
use App\Models\Category;
use App\Models\Tutorial;
use App\Models\QuizTopic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $tutorials = Tutorial::machineLearningTutorials();
        $feature_softwares = AiSoftware::all()->random(10);
        $blogs = null;
        $blog_category = Category::where('category_slug', 'blog')->first(); //get blog category id
        if($blog_category){
            $single_blog_post = Tutorial::where('category_id', $blog_category->id)->latest()->first();
            $blogs = Tutorial::where('category_id', $blog_category->id)->latest()->take(3)->get();
        }
        $blog_category = Category::where('category_slug', 'blog')->first();
        return view('home.index', compact('tutorials', 'feature_softwares', 'blogs', 'single_blog_post'));
    }

    public function xmlSitemap(){
        $ai_softwares = AiSoftware::get();
        return response()->view('other.sitemap', compact('ai_softwares'))->header('Content-Type', 'text/xml');
    }

}
