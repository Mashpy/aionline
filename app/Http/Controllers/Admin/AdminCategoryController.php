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
        $categories = Category::with('children')->whereNull('parent_id')->latest()->paginate(15);
        $category = Category::find($category_id);
        return view('admin.ai_software.software_category.edit', compact('category', 'categories'));
    }

    public function destroy($category_id){
        $category = Category::find($category_id);
        $category->destroy();
        Session::put('exception','Tutorial Delete successfully');
        return redirect()->route('admin.tutorial.create');
    }
    public function getSubCategory(Request $request){
        $sub_category = Category::where('parent_id', $request->id)->get();
        return json_encode($sub_category);
    }

}