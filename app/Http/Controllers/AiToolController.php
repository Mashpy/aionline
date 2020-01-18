<?php

namespace App\Http\Controllers;

use App\Models\AlternativeSoftware;
use Illuminate\Http\Request;

class AiToolController extends Controller
{
    public function index(){
        $ai_tools = AlternativeSoftware::latest()->get();
        return view('ai_tool.index', compact('ai_tools'));
    }
}
