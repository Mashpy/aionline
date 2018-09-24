<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;

class TutorialController extends Controller
{
    public function show($category, $slug){
        $tutorial = Tutorial::where('slug', $slug)->first();
        $previous_tutorial = Tutorial::where('id', '<', $tutorial->id)->orderBy('id','desc')->first();
        $next_tutorial = Tutorial::where('id', '>', $tutorial->id)->orderBy('id','asc')->first();
        $category_tutorials = Tutorial::where('category_id', $tutorial->category_id)->get();
        return view('tutorial.show', compact('tutorial', 'category_tutorials', 'previous_tutorial', 'next_tutorial'));
    }

}
