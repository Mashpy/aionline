<?php

namespace App\Http\Controllers;

use App\Models\AiSoftware;
use App\Models\AiSoftwareLikeCount;
use App\Models\AiSoftwareReview;
use Illuminate\Http\Request;

class AiSoftwareReviewController extends Controller
{
    public function reviews($slug){
        $ai_software = AiSoftware::where('slug', $slug)->first();
        $reviews = AiSoftwareReview::where('ai_software_id', $ai_software->id)->latest()->get();
        return view('ai_software.review', compact('ai_software', 'reviews'));
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
