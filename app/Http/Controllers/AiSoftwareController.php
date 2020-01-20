<?php

namespace App\Http\Controllers;

use App\Models\AiSoftware;
use App\Models\AiSoftwareLikeCount;
use App\Models\AiSoftwareReview;
use Illuminate\Http\Request;

class AiSoftwareController extends Controller
{
    public function index(){
        $ai_softares = AiSoftware::latest()->get();
        return view('ai_software.index', compact('ai_softares'));
    }
    public function view($slug){
        $ai_softare = AiSoftware::where('slug', $slug)->first();
        $reviews = $this->reviews($slug);
        return view('ai_software.view', compact('ai_softare', 'reviews'));
    }
    public function review($slug){
        $ai_softare = AiSoftware::where('slug', $slug)->first();
        $reviews = $this->reviews($slug);
        return view('ai_software.review', compact('ai_softare', 'reviews'));
    }
    public function reviews($slug){
        $software_id = AiSoftware::where('slug', $slug)->pluck('id');
        return $reviews = AiSoftwareReview::where('ai_software_id', $software_id)->latest()->get();
    }
    public function storeReview(Request $request){
        $request->validate([
            'title' => ['required'],
            'review_by' => ['required'],
            'ai_software_id' => ['required'],
            'description' => ['required'],
        ]);
        AiSoftwareReview::create([
            'title'=> $request->title,
            'ai_software_id' =>$request->ai_software_id,
            'review_by' =>$request->review_by,
            'description' =>$request->description,
        ]);
        \Session::flash('success','Your review added successfully!!');
        return back();
    }
    public function like(Request $request, $id){
        $check_ip = AiSoftwareLikeCount::where('ai_software_id', $id)->where('client_ip', $request->ip())->first();
        if(empty($check_ip)){
            $like = AiSoftware::find($id);
            $like->like++;
            $like->save();
            AiSoftwareLikeCount::create([
                'ai_software_id' => $id,
                'client_ip' => $request->ip(),
            ]);
            \Session::flash('success','Your liked this software!!');
            return back();
        }
        \Session::flash('error','Your already liked this software!!');
        return back();

    }
}
