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

    public function search(Request $request){
        $query = $request->keyword;
        if(empty($query)){
            return back();
        }
        $blog_category = Category::where('category_slug', 'blog')->first();
        $software_search_results = AiSoftware::where('name', 'LIKE', '%'.$query.'%')
            ->orWhere('description', 'LIKE', '%'.$query.'%')
            ->orWhere('slug', 'LIKE', '%'.$query.'%')
            ->get();

         $tutorial_post = Tutorial::where('category_id', '!=', $blog_category->id);
         $tutorial_search_results = $tutorial_post->where('title', 'LIKE', '%'.$query.'%')
            ->orWhere('description', 'LIKE', '%'.$query.'%')
            ->orWhere('slug', 'LIKE', '%'.$query.'%')
            ->get();

         $blog_post = Tutorial::where('category_id', $blog_category->id);
          $blog_search = Tutorial::where('title', 'LIKE', '%'.$query.'%')
            ->orWhere('description', 'LIKE', '%'.$query.'%')
            ->orWhere('slug', 'LIKE', '%'.$query.'%')
              ->get();
        $collection = collect($blog_search);
        $blog_search_results = $collection->where('category_id', $blog_category->id);
         return view('home.search', compact('query', 'software_search_results', 'tutorial_search_results', 'blog_search_results'));
    }

    public function xmlSitemap(){
        $ai_softwares = AiSoftware::get();
        return response()->view('other.sitemap', compact('ai_softwares'))->header('Content-Type', 'text/xml');
    }

    public function about(){
        return view('about');
    }

    public function faq(){
        return view('faq');
    }

    public function contact(){
        return view('contact');
    }

    public function privacy(){
        return view('privacy');
    }

    public function terms(){
        return view('terms');
    }

}
