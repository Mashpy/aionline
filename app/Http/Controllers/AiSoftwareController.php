<?php

namespace App\Http\Controllers;

use App\Models\AiSoftware;
use App\Models\AiSoftwareReview;
use App\Models\Category;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AiSoftwareController extends Controller
{
    private $data =[];

    private function wash_link($link){
        $replaced = Str::replaceArray('www.', [''], $link);
        $replaced = Str::replaceArray('https://www.', [''], $replaced);
        $replaced = Str::replaceArray('https://', [''], $replaced);
        $replaced = Str::replaceArray('http://www.', [''], $replaced);
        $replaced = Str::replaceArray('http://', [''], $replaced);
        return $replaced = rtrim($replaced, '/');
    }

    private function social_link($links){
        $social = ['facebook', 'youtube', 'linkedin', 'twitter'];
        $social_link = [];
        foreach ($social as $social_item){
            $matched_array_key = $this->array_search_partial($links, $social_item);
            if($matched_array_key !== null){
                if($social_item == 'twitter'){
                    $social_link[$social_item] = $this->wash_link($links[$matched_array_key]);
                }else{
                    $social_link[$social_item] = $this->wash_link($links[$matched_array_key]).'/about';
                }
            }
        }
        return $social_link;
    }

    public function index(){
        $category_parent = Category::where('parent_id', null)->get();
        foreach ($category_parent as $key => $value) {
            $category_parent[$key]['softwares'] = AiSoftware::whereIn('category_id',$this->subCategory($value->id, $key))->where('published', true)->latest()->take(5)->get();
        }
        $feature_softwares = AiSoftware::all()->where('published', true)->random(5);
        $ai_softwares = AiSoftware::latest()->where('published', true)->get();
        $recently_added_software = AiSoftware::latest()->where('published', true)->take(5)->get();
        return view('ai_software.index', compact('ai_softwares', 'recently_added_software', 'category_parent', 'feature_softwares'));
    }

    public function requestNewSoftware() {
        $ai_softwares = AiSoftware::latest()->get();
        $categories = Category::with('children')->whereNull('parent_id')->latest()->get();
        return view('ai_software.request_new_software', compact('ai_softwares', 'categories'));
    }

    public function requestNewSoftwareStore(Request $request) {
        $validatedData = $request->validate([
            'official_link' => ['required'],
        ]);

        $client = new Client();
        $software = new AiSoftware;
        $software->category_id = $request->parent_id;
        $software->meta_description = $request->meta_description;
        $software->description = $request->description;
        $software->feature = $request->feature;
        $software->pricing = $request->pricing;
        $software->published = AiSoftware::UNPUBLISHED;
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
            try {
                $crawler = $client->request('GET', 'https://'.$official_link);
                $title = $crawler->filter('title')->each(function ($node) {
                    return $node->text();
                });
                $software->name = $title[0];
                $software->slug = Str::slug($title[0]);
            } catch (\Exception $e) {
                return back()->with(['error' => 'Something went wrong! Use a valid URL']);
            }
        }

        if ($request->file('logo')) {
            $image = $request->file('logo');
            $imageName = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            $image->move(public_path(AiSoftware::IMAGE_UPLOAD_PATH.'/'.date('Y').'/'.date('m')), $imageName);
            $software->logo = $imageName;
        }

        try {
            $crawler = $client->request('GET', 'https://'.$official_link);
            $links = $crawler->filter('a')->each(function($node) {
                return $href  = $node->attr('href');
            });
            $social_links =  $this->social_link($links);
            foreach ($social_links as $key => $value){
                $software[$key] = $value;
            }
        } catch (\Exception $e) { }

        if ($software->save()){
            return back()->with(['success' => 'New Software add request successfully']);
        } else {
            return back()->with(['error' => 'Something went wrong!!! Please try again']);
        }
    }

    public function categorySoftwares($category_slug){
        $category = Category::where('category_slug', $category_slug)->first();
        $category_softwares = AiSoftware::whereIn('category_id', $this->subCategory($category->id))->latest()->get();
        return view('ai_software.category_softwares', compact('category_softwares', 'category'));
    }

    public function subCategory($children, $key_val = 0){
        if($key_val >0){
            $this->data =[];
        }
        array_push($this->data, $children);
        $cat_parent = Category::where("parent_id", $children)->get();
        foreach ($cat_parent as $key => $value) {
            $this->subCategory($value["id"]);
        }
        return $this->data;
    }

    public function show($slug){
       $ai_software = AiSoftware::where('slug', $slug)->first();
        if($ai_software){
            $category_parent = Category::where('parent_id', null)->get();
            foreach ($category_parent as $key => $value) {
                $category_parent[$key]['softwares'] = AiSoftware::whereIn('category_id',$this->subCategory($value->id, $key))->where('published', true)->latest()->take(3)->get();
            }
            $reviews = AiSoftwareReview::where('ai_software_id', $ai_software->id)->latest()->get();
            return view('ai_software.view', compact('ai_software', 'reviews', 'category_parent'));
        }else{
            return redirect()->route('ai_software.index');
        }
    }

    public function softwareSearch(Request $request){
        $request->validate([
            'software_search' => ['required'],
        ]);
        if(empty($request->software_search)){
            return back();
        }
        $query = $request->software_search;
        $ai_softwares = AiSoftware::latest()->get();
        $search_results = AiSoftware::where('name','LIKE','%'.$request->software_search.'%')
                            ->orwhere('description','LIKE','%'.$request->software_search.'%')
                            ->orwhere('slug','LIKE','%'.$request->software_search.'%')
                            ->get();
        return view('ai_software.search_result', compact('search_results', 'query', 'ai_softwares'));
    }

    public function indexOld(){
        return redirect()->route('ai_software.index');
    }

    public function showOld($slug){
        return redirect()->route('ai_software.view', $slug);
    }

    public function categorySoftwaresOld($category_slug){
        return redirect()->route('ai_software.category-softwares', $category_slug);
    }
}
