<?php

namespace App\Http\Controllers;

use App\Models\AlternativeSoftware;
use App\Models\SoftwareLikeCount;
use App\Models\SoftwareReview;
use Illuminate\Http\Request;

class AiToolController extends Controller
{
    public function index(){
        $ai_tools = AlternativeSoftware::latest()->get();
        return view('ai_tool.index', compact('ai_tools'));
    }
    public function view($slug){
        $ai_tool = AlternativeSoftware::where('slug', $slug)->first();
        $reviews = $this->reviews($slug);
        return view('ai_tool.view', compact('ai_tool', 'reviews'));
    }
    public function review($slug){
        $ai_tool = AlternativeSoftware::where('slug', $slug)->first();
        $reviews = $this->reviews($slug);
        return view('ai_tool.review', compact('ai_tool', 'reviews'));
    }
    public function reviews($slug){
        $software_id = AlternativeSoftware::where('slug', $slug)->pluck('id');
        return $reviews = SoftwareReview::where('alternative_software_id', $software_id)->latest()->get();
    }
    public function storeReview(Request $request){
        $request->validate([
            'title' => ['required'],
            'review_by' => ['required'],
            'alternative_software_id' => ['required'],
            'description' => ['required'],
        ]);
        SoftwareReview::create([
            'title'=> $request->title,
            'alternative_software_id' =>$request->alternative_software_id,
            'review_by' =>$request->review_by,
            'description' =>$request->description,
        ]);
        \Session::flash('success','Your review added successfully!!');
        return back();
    }
    public function like(Request $request, $id){
        $check_ip = SoftwareLikeCount::where('alternative_software_id', $id)->where('client_ip', $request->ip())->first();
        if(empty($check_ip)){
            $like = AlternativeSoftware::find($id);
            $like->like++;
            $like->save();
            SoftwareLikeCount::create([
                'alternative_software_id' => $id,
                'client_ip' => $request->ip(),
            ]);
            \Session::flash('success','Your liked this software!!');
            return back();
        }
        \Session::flash('error','Your already liked this software!!');
        return back();

    }
}
