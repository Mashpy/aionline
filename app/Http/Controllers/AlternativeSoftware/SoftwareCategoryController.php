<?php

namespace App\Http\Controllers\AlternativeSoftware;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoftwareCategory;

class SoftwareCategoryController extends Controller
{
 	public function index(){
 		$categories = SoftwareCategory::latest()->paginate(15);
 		return view('admin.alternative_software.software_category.index', compact('categories'));
 	}   
 	public function store(Request $request){
 		$category = SoftwareCategory::create(['name'=> $request->name]);
 		\Session::flash('success','Software category created successfully!!');
        return back();
 	}
}
