<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\QuizTopic;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use Session;

class QuizTopicController extends Controller
{
    public function index(){
        $quiz_topics = QuizTopic::orderBy('created_at','desc')->get();
        $quiz_categories = QuizTopic::select('category_id')->distinct()->with('quiz_topics')->get();
        return view('quiz_topic.index', compact('quiz_topics', 'quiz_categories'));
    }

    public function store(Request $request){
        $quiz_topic = new QuizTopic();
        $quiz_topic->topic_name = $request->topic_name;
        $quiz_topic->category_id = $request->category_id;
        $quiz_topic->save();
        Session::flash('success','Question added successfully!!');
        return redirect()->route('quiz-topic.index');
    }
}