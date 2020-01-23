<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SoftwareCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function index(){
        $categories = Category::with('children')->whereNull('parent_id')->latest()->paginate(15);
        return view('admin.ai_software.software_category.index', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required','unique:categories,name'],
        ]);
        $category = Category::create([
            'name' => $request->name,
            'category_slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id
        ]);
        \Session::flash('success','Software category created successfully!!');
        return back();
    }

    public function edit($category_id){
        $patent_categories = Category::with('children')->whereNull('parent_id')->latest()->paginate(15);
        $category = Category::find($category_id);
        return view('admin.ai_software.software_category.edit', compact('category', 'patent_categories'));
    }

    public function update(Request $request, $category_id){

        $request->validate([
            'name' => ['required','unique:software_categories,name,'.$category_id],
        ]);
        $category = Category::find($category_id);
        $category->name = $request->name;

        if($request->parent_id == null && !empty($request->old_parent_id)){
            $category->parent_id = $request->old_parent_id;
        }else if($request->parent_id == 0){
            $category->parent_id = null;
        }else{
            $category->parent_id = $request->parent_id;
        }
        $category->save();
        \Session::flash('success','Software category updated successfully!!');
        return back();
    }

    public function destroy($category_id)
    {
        $sub_category = Category::find($category_id);
        $sub_categories = Category::where('parent_id', $category_id)->get();
        foreach ($sub_categories as $sub){
            $sub->delete();
        }
        $sub_category->delete();
        return back()->with(['success' => 'Category deleted successfully']);
    }

    public function getSubCategory(Request $request){
        $sub_categories = Category::where('parent_id', $request->id)->get();
        $temp = [];
        $category_json = null;

        foreach ($sub_categories as $category) {
            $temp['id'] = $category->id;
            $temp['name'] = $category->name;
            $temp['browse_node_id'] = $category->parent_id;
            $category_json[] = $temp;
        }
        return response()->json($category_json);
    }

}