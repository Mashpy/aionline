<?php

namespace App\Http\Controllers;

use App\Models\AiSoftware;
use App\Models\AiSoftwareReview;
use App\Models\Category;
use Illuminate\Http\Request;

class AiSoftwareController extends Controller
{
    public function index(){
        $ai_softwares = AiSoftware::latest()->get();
        $recently_added_software = AiSoftware::latest()->take(5)->get();
        $parent_category = Category::where('parent_id', null)->with('children')->with('softwares')->get();
        return view('ai_software.index', compact('ai_softwares', 'recently_added_software', 'parent_category'));
    }

    public function view($slug){
        $ai_software = AiSoftware::where('slug', $slug)->first();
        $reviews = AiSoftwareReview::where('ai_software_id', $ai_software->id)->latest()->get();
        return view('ai_software.view', compact('ai_software', 'reviews'));
    }

    public function softwareSearch(Request $request){
        $request->validate([
            'software_search' => ['required'],
        ]);
        if(empty($request->software_search)){
            return back();
        }
        $query = $request->software_search;
        $ai_softwares = AiSoftware::latest()->get();
        $search_results = AiSoftware::where('name','LIKE','%'.$request->software_search.'%')
                            ->orwhere('description','LIKE','%'.$request->software_search.'%')
                            ->orwhere('slug','LIKE','%'.$request->software_search.'%')
                            ->get();
        return view('ai_software.search', compact('search_results', 'query', 'ai_softwares'));
    }
}
