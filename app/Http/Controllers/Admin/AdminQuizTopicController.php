<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\QuizTopic;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Str;

class AdminQuizTopicController extends Controller
{
    public function index(){
        $quiz_topics = QuizTopic::orderBy('created_at','desc')->Paginate(30);
        return view('admin.quiz_topic.index', compact('quiz_topics'));
    }
    public function create(){
        $categories = Category::all();
        return view ('admin.quiz_topic.create', compact('categories'));
    }
    public function store(Request $request){
        $quiz_topic = new QuizTopic();
        $quiz_topic->topic_name = $request->topic_name;
        $quiz_topic->slug = Str::slug($request->topic_name, '-');
        $quiz_topic->category_id = $request->category_id;
        $quiz_topic->meta_description = $request->meta_description;
        $quiz_topic->keyword = $request->keyword;
        $quiz_topic->save();
        Session::flash('success','Question added successfully!!');
        return redirect()->route('admin_quiz_topic.index');
    }

    public function edit($id){
        $topic = QuizTopic::find($id);
        return $topic;
    }

    public function update(Request $request){
        $quiz_topic = QuizTopic::find($request->id);
        $quiz_topic->topic_name = $request->topic_name;
        $quiz_topic->slug = Str::slug($request->topic_name, '-');
        $quiz_topic->category_id = $request->category_id;
        $quiz_topic->meta_description = $request->meta_description;
        $quiz_topic->keyword = $request->keyword;
        $quiz_topic->save();
        return back()->with('success', 'Quiz Topic Updated Successfully!');
    }
}