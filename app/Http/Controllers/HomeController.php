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
    public function index()
    {
        //get only machine learning category tutorial
        $category_id = Category::where('category_slug', 'machine-learning')->first()->id;
        $tutorials = Tutorial::where('category_id', $category_id)->Paginate(100);
        return view('home.index', compact('tutorials'));
    }

    public function xmlSitemap(){
        $ai_softwares = AiSoftware::get();
        return response()->view('other.sitemap', compact('ai_softwares'))->header('Content-Type', 'text/xml');
    }

}
