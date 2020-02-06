<?php

namespace App\Http\Controllers;

use App\Models\AiSoftware;
use App\Models\AiSoftwareReview;

class AiSoftwareController extends Controller
{
    public function index(){
        $ai_softwares = AiSoftware::latest()->get();
        return view('ai_software.index', compact('ai_softwares'));
    }
    public function view($slug){
        $ai_software = AiSoftware::where('slug', $slug)->first();
        $reviews = AiSoftwareReview::where('ai_software_id', $ai_software->id)->latest()->get();
        return view('ai_software.view', compact('ai_software', 'reviews'));
    }
}
