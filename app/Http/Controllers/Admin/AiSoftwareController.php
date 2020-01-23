<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SoftwareCategory;
use App\Models\AiSoftware;
use Illuminate\Support\Str;

class AiSoftwareController extends Controller
{
    public function index(){
        $ai_softwares = AiSoftware::orderBy('name')->get();
        return view('admin.ai_software.index', compact('ai_softwares'));
    }

    public function create(){
        $categories = Category::with('children')->whereNull('parent_id')->latest()->get();
        return view('admin.ai_software.create', compact('categories'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'category_id' => ['required'],
            'description' => ['required'],
            'logo' => ['required'],
        ]);

        $software = new AiSoftware;
        $software->name = $request->name;
        $software->category_id = $request->category_id;
        $software->description = $request->description;
        $software->official_link = $request->official_link;
        $software->slug = Str::slug($request->name);

        if ($request->file('logo')) {
            $image = $request->file('logo');
            $imageName = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            $image->move(public_path(AiSoftware::IMAGE_UPLOAD_PATH.'/'.date('Y').'/'.date('m')), $imageName);
            $software->logo = $imageName;
        }
        if ($software->save()){
            return redirect()->route('admin_ai_software.index')->with(['success' => 'New Software added successfully']);
        } else {
            return back()->with(['error' => 'Something went wrong!!! Please try again']);
        }
    }

    public function edit($id){
        $ai_software = AiSoftware::find($id);
        $categories = Category::with('children')->whereNull('parent_id')->latest()->get();
        return view('admin.ai_software.edit', compact('ai_software', 'categories'));
    }

    public function update(Request $request, $id){
        $ai_software = AiSoftware::find($id);

        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required'],
        ]);
        $ai_software->name = $request->name;
        $ai_software->description = $request->description;
        $ai_software->official_link = $request->official_link;
        $ai_software->slug = Str::slug($request->name);
        if($request->parent_id){
            $ai_software->category_id = $request->parent_id;
        }else{
            $ai_software->category_id = $request->old_parent_id;
        }

        if ($request->logo) {
            unlink(public_path(AiSoftware::IMAGE_UPLOAD_PATH.'/'.$ai_software->created_at->format('Y').'/'.$ai_software->created_at->format('m')).'/'.$ai_software->logo);
            $image = $request->file('logo');
            $imageName = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            $image->move(public_path(AiSoftware::IMAGE_UPLOAD_PATH.'/'.$ai_software->created_at->format('Y').'/'.$ai_software->created_at->format('m')), $imageName);
            $ai_software->logo = $imageName;
        }else{
            $ai_software->logo = $request->old_logo;
        }
        $ai_software->save();
        return redirect()->route('admin_ai_software.index')->with(['success' => 'Software updated successfully']);
    }

    public function destroy($id)
    {
        $ai_software = AiSoftware::find($id);
        if ($ai_software->delete()){
            if (file_exists(public_path(AiSoftware::IMAGE_UPLOAD_PATH.'/'.$ai_software->created_at->format('Y').'/'.$ai_software->created_at->format('m')).'/'.$ai_software->logo)) {
                unlink(public_path(AiSoftware::IMAGE_UPLOAD_PATH.'/'.$ai_software->created_at->format('Y').'/'.$ai_software->created_at->format('m')).'/'.$ai_software->logo);
            }
            return back()->with(['success' => 'Software deleted successfully']);
        } else {
            return back()->with(['fail' => 'Something went wrong!!! Please try again']);
        }
    }
}
