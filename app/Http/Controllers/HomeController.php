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
        return view('home.index');
    }

    public function xmlSitemap(){
        $ai_softwares = AiSoftware::get();
        return response()->view('other.sitemap', compact('ai_softwares'))->header('Content-Type', 'text/xml');
    }

}
