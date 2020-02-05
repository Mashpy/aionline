<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\AiSoftware;
use Illuminate\Support\Str;
use Goutte\Client;
use Image;

class AiSoftwareController extends Controller
{
    public function index(){
        $ai_softwares = AiSoftware::latest()->paginate(20);
        return view('admin.ai_software.index', compact('ai_softwares'));
    }

    public function create(){
        $categories = Category::with('children')->whereNull('parent_id')->latest()->get();
        return view('admin.ai_software.create', compact('categories'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'official_link' => ['required'],
        ]);

        $client = new Client();
        $software = new AiSoftware;
        $software->category_id = $request->parent_id;
        $software->description = $request->description;
        $official_link = $this->wash_link($request->official_link);
        $check_official_link = AiSoftware::where('official_link', $official_link)->first();
        if($check_official_link){
            return back()->with(['error' => 'The official link has already been taken.']);
        }
        $software->official_link = $official_link;

        if($request->name){
            $software->name = $request->name;
            $software->slug = Str::slug($request->name);
        }else{
            $crawler = $client->request('GET', 'https://'.$official_link);
            $title = $crawler->filter('title')->each(function ($node) {
                return $node->text();
            });
            $software->name = $title[0];
            $software->slug = Str::slug($title[0]);
        }

        if ($request->file('logo')) {
            $image = $request->file('logo');
            $imageName = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            $image->move(public_path(AiSoftware::IMAGE_UPLOAD_PATH.date('Y').'/'.date('m')), $imageName);
            $software->logo = $imageName;
        }

        $crawler = $client->request('GET', 'https://'.$official_link);
        $links = $crawler->filter('a')->each(function($node) {
            return $href  = $node->attr('href');
        });
        $social_links =  $this->social_link($links);
        foreach ($social_links as $key => $value){
            $software[$key] = $value;
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
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'slug' => ['required', 'unique:ai_softwares,slug,'.$id],
        ]);
        $ai_software = AiSoftware::find($id);
        $ai_software->name = $request->name;
        $ai_software->description = $request->description;
        $ai_software->official_link = $this->wash_link($request->official_link);
        $ai_software->slug = $request->slug;
        if($request->parent_id){
            $ai_software->category_id = $request->parent_id;
        }else{
            $ai_software->category_id = $request->old_parent_id;
        }

        if ($request->logo) {
            if(!empty($request->old_logo)){
                unlink(public_path(AiSoftware::IMAGE_UPLOAD_PATH.$ai_software->created_at->format('Y').'/'.$ai_software->created_at->format('m')).'/'.$ai_software->logo);
            }
            $image = $request->file('logo');
            $imageName = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            $image->move(public_path(AiSoftware::IMAGE_UPLOAD_PATH.$ai_software->created_at->format('Y').'/'.$ai_software->created_at->format('m')), $imageName);
            $ai_software->logo = $imageName;
        }else{
            $ai_software->logo = $request->old_logo;
        }
        if($request->logo_url){
            if(!empty($request->old_logo)){
                unlink(public_path(AiSoftware::IMAGE_UPLOAD_PATH.$ai_software->created_at->format('Y').'/'.$ai_software->created_at->format('m')).'/'.$ai_software->logo);
            }
            $path = $request->logo_url;
            $imageName  = $request->slug.'.jpg';
            header('Content-Type: image/png');
            Image::make($path)->save(public_path(AiSoftware::IMAGE_UPLOAD_PATH.$ai_software->created_at->format('Y').'/'.$ai_software->created_at->format('m')).'/'. $imageName);
            $ai_software->logo = $imageName;
        }
        $ai_software->save();
        return back()->with(['success' => 'Software updated successfully']);
    }

    public function destroy($id)
    {
        $ai_software = AiSoftware::find($id);
        $ai_software->delete();
        if ($ai_software->logo !== null){
            if (file_exists(public_path(AiSoftware::IMAGE_UPLOAD_PATH.$ai_software->created_at->format('Y').'/'.$ai_software->created_at->format('m')).'/'.$ai_software->logo)) {
                unlink(public_path(AiSoftware::IMAGE_UPLOAD_PATH.$ai_software->created_at->format('Y').'/'.$ai_software->created_at->format('m')).'/'.$ai_software->logo);
            }
            return back()->with(['success' => 'Software deleted successfully']);
        } else {
            return back()->with(['fail' => 'Something went wrong!!! Please try again']);
        }
    }

    public function wash_link($link){
        $replaced = Str::replaceArray('www.', [''], $link);
        $replaced = Str::replaceArray('https://www.', [''], $replaced);
        $replaced = Str::replaceArray('https://', [''], $replaced);
        $replaced = Str::replaceArray('http://www.', [''], $replaced);
        $replaced = Str::replaceArray('http://', [''], $replaced);
        return $replaced = Str::replaceArray('//', ['/'], $replaced);
    }

    public function social_link($links){
        $social = ['facebook', 'youtube', 'linkedin', 'twitter'];
        $social_link = [];
        foreach ($social as $social_item){
            $matched_array_key = $this->array_search_partial($links, $social_item);
            if($matched_array_key !== null){
                if($social_item == 'twitter'){
                    $social_link[$social_item] = $this->wash_link($links[$matched_array_key]);
                }else{
                    $social_link[$social_item] = $this->wash_link($links[$matched_array_key].'/about');
                }
            }
        }
        return $social_link;
    }

    public function array_search_partial($arr, $keyword) {
        foreach($arr as $index => $string) {
            if (strpos($string, $keyword) !== FALSE)
                return $index;
        }
    }
}
