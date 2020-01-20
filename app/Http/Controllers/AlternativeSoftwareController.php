<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoftwareCategory;
use App\Models\AlternativeSoftware;
use Illuminate\Support\Str;

class AlternativeSoftwareController extends Controller
{
    public function index(){
        $alternative_softwares = AlternativeSoftware::orderBy('name')->get();
        return view('admin.alternative_software.index', compact('alternative_softwares'));
    }
    public function create(){
        $software_categories = SoftwareCategory::orderBy('name')->get();
        return view('admin.alternative_software.create', compact('software_categories'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'software_category_id' => ['required'],
            'description' => ['required'],
            'logo' => ['required'],
        ]);

        $software = new AlternativeSoftware;
        $software->name = $request->name;
        $software->software_category_id = $request->software_category_id;
        $software->description = $request->description;
        $software->official_link = $request->official_link;
        $software->slug = Str::slug($request->name);

        if ($request->file('logo')) {
            $image = $request->file('logo');
            $imageName = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            $image->move(public_path(AlternativeSoftware::IMAGE_UPLOAD_PATH.'/'.date('Y').'/'.date('m')), $imageName);
            $software->logo = $imageName;
        }
        if ($software->save()){
            return redirect()->route('alternative_software.index')->with(['success' => 'New Software added successfully']);
        } else {
            return back()->with(['error' => 'Something went wrong!!! Please try again']);
        }
    }

    public function destroy(AlternativeSoftware $alternative_software)
    {
        if ($alternative_software->delete()){
            if (file_exists(public_path(AlternativeSoftware::IMAGE_UPLOAD_PATH.'/'.$alternative_software->created_at->format('Y').'/'.$alternative_software->created_at->format('m')).'/'.$alternative_software->logo)) {
                unlink(public_path(AlternativeSoftware::IMAGE_UPLOAD_PATH.'/'.$alternative_software->created_at->format('Y').'/'.$alternative_software->created_at->format('m')).'/'.$alternative_software->logo);
            }
            return back()->with(['success' => 'Software deleted successfully']);
        } else {
            return back()->with(['fail' => 'Something went wrong!!! Please try again']);
        }
    }
    public function edit(AlternativeSoftware $alternative_software){
        $software_categories = SoftwareCategory::orderBy('name')->get();
        return view('admin.alternative_software.edit', compact('alternative_software', 'software_categories'));
    }
    public function update(Request $request, AlternativeSoftware $alternative_software){
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'software_category_id' => ['required'],
            'description' => ['required'],
        ]);
        $alternative_software->name = $request->name;
        $alternative_software->software_category_id = $request->software_category_id;
        $alternative_software->description = $request->description;
        $alternative_software->official_link = $request->official_link;
        $alternative_software->slug = Str::slug($request->name);

        if ($request->logo) {
            unlink(public_path(AlternativeSoftware::IMAGE_UPLOAD_PATH.'/'.$alternative_software->created_at->format('Y').'/'.$alternative_software->created_at->format('m')).'/'.$alternative_software->logo);
            $image = $request->file('logo');
            $imageName = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            $image->move(public_path(AlternativeSoftware::IMAGE_UPLOAD_PATH.'/'.$alternative_software->created_at->format('Y').'/'.$alternative_software->created_at->format('m')), $imageName);
            $alternative_software->logo = $imageName;
        }else{
            $alternative_software->logo = $alternative_software->old_logo;
        }
        $alternative_software->save();
        return redirect()->route('alternative_software.index')->with(['success' => 'Software updated successfully']);
    }
}
