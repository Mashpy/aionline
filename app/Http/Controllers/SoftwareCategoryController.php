<?php

namespace App\Http\Controllers;
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
        $request->validate([
            'name' => ['required','unique:software_categories,name'],
        ]);
 		$category = SoftwareCategory::create(['name'=> $request->name]);
 		\Session::flash('success','Software category created successfully!!');
        return back();
 	}
 	public function edit($category_id){
 	    $category = SoftwareCategory::find($category_id);
        return view('admin.alternative_software.software_category.edit', compact('category'));
    }
    public function update(Request $request, $category_id){
        $request->validate([
            'name' => ['required','unique:software_categories,name,'.$category_id],
        ]);
        $category = SoftwareCategory::find($category_id);
        $category = $category->update(['name'=> $request->name]);
        \Session::flash('success','Software category updated successfully!!');
        return back();
    }
    public function destroy(SoftwareCategory $alternative_software_category)
    {
        if ($alternative_software_category->delete()){
            return back()->with(['success' => 'Category deleted successfully']);
        } else {
            return back()->with(['error' => 'Something went wrong!!! Please try again']);
        }
    }
}
