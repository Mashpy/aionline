<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use App\Models\Category;


class TutorialController extends Controller
{
    public function show($category, $slug){
        if($category == 'machine-learning'){
            $tutorial = Tutorial::where('slug', $slug)->first();
            $category_id = Category::where('category_slug', 'machine-learning')->first()->id;
            $previous_tutorial = Tutorial::where('category_id', $category_id)->where('id', '<', $tutorial->id)->orderBy('id','desc')->first();
            $next_tutorial = Tutorial::where('category_id', $category_id)->where('id', '>', $tutorial->id)->orderBy('id','asc')->first();
            $category_tutorials = Tutorial::where('category_id', $tutorial->category_id)->get();
            return view('tutorial.show', compact('tutorial', 'category_tutorials', 'previous_tutorial', 'next_tutorial'));
        }
        return back();
    }

}
