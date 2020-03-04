<?php

namespace App\Http\Controllers;

use App\Models\AiSoftware;
use App\Models\AiSoftwareReview;
use App\Models\Category;
use Illuminate\Http\Request;

class AiSoftwareController extends Controller
{
    private $data =[];
    public function index(){
        $category_parent = Category::where('parent_id', null)->get();
        foreach ($category_parent as $key => $value) {
            $category_parent[$key]['softwares'] = AiSoftware::whereIn('category_id',$this->subCategory($value->id, $key))->latest()->take(5)->get();
        }
        $feature_softwares = AiSoftware::all()->random(5);
        $ai_softwares = AiSoftware::latest()->get();
        $recently_added_software = AiSoftware::latest()->take(5)->get();
        return view('ai_software.index', compact('ai_softwares', 'recently_added_software', 'category_parent', 'feature_softwares'));
    }

    public function subCategory($children, $key_val = 0){
        if($key_val >0){
            $this->data =[];
        }
        array_push($this->data, $children);
        $cat_parent = Category::where("parent_id", $children)->get();
        foreach ($cat_parent as $key => $value) {
            $this->subCategory($value["id"]);
        }
        return $this->data;
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
