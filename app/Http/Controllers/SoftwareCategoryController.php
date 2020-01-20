<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoftwareCategory;
use Illuminate\Support\Str;

class SoftwareCategoryController extends Controller
{
 	public function index(){
 		$categories = SoftwareCategory::with('children')->whereNull('parent_id')->latest()->paginate(15);
 		return view('admin.ai_software.software_category.index', compact('categories'));
 	}
 	public function store(Request $request){
        $request->validate([
            'name' => ['required','unique:software_categories,name'],
        ]);
 		$category = SoftwareCategory::create([
 		    'name' => $request->name,
 		    'software_category_slug' => Str::slug($request->name),
 		    'parent_id' => $request->parent_id
        ]);
 		\Session::flash('success','Software category created successfully!!');
        return back();
 	}
 	public function edit($category_id){
        $categories = SoftwareCategory::with('children')->whereNull('parent_id')->latest()->paginate(15);
        $category = SoftwareCategory::find($category_id);
        return view('admin.ai_software.software_category.edit', compact('category', 'categories'));
    }
    public function update(Request $request, $category_id){
        $request->validate([
            'name' => ['required','unique:software_categories,name,'.$category_id],
        ]);
        $category = SoftwareCategory::find($category_id);
        $category = $category->update([
            'name'=> $request->name,
            'parent_id'=> $request->parent_id,
            ]);
        \Session::flash('success','Software category updated successfully!!');
        return back();
    }
    public function destroy(SoftwareCategory $alternative_software_category)
    {
        $sub_category = SoftwareCategory::where('parent_id', $alternative_software_category->id)->get();
        foreach ($sub_category as $sub){
            $sub->delete();
        }
        $alternative_software_category->delete();
        return back()->with(['success' => 'Category deleted successfully']);
    }
}
