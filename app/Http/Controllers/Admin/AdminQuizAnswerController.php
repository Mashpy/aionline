<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\QuizAnswer;
use App\Models\Category;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class AdminQuizAnswerController extends Controller
{
    public function index(){
        $answers = QuizAnswer::orderBy('created_at','desc')->Paginate(10);
        return view('admin.quiz_answer.index', compact('answers'));
    }
    public function create(Request $request){
        $quiz_question_id = $request->quiz_question_id;
        $categories = Category::all();
        $users = User::all();
        return view ('admin.quiz_answer.create', compact('categories','users', 'quiz_question_id'));
    }

    public function store(Request $request){
        foreach($request->answer_details as  $key => $answer_details){
            QuizAnswer::insert([
                    'answer_details' => $answer_details,
                    'quiz_question_id' => $request->quiz_question_id,
                    'is_correct' => $request->is_correct[$key],
                ]);
        }
        Session::flash('success','Question answer added successfully!!');
        return redirect()->route('admin_quiz_question.index', ['quiz_topic_id' => $request->quiz_topic_id]);
    }

    public function show($id){
        $answer = new QuizAnswer();
        return view('admin.quiz_answer.show', compact('answer'));
    }

    public function destroy($slug){
        $answer = QuizAnswer::where('slug', $slug)->first();
        $answer->delete();
        Session::flash('success','Question delete successfully');
        return redirect()->route('admin_quiz_answer.index');
    }

    public function update(Request $request, $id){
        foreach($request->option_id as  $key => $option_id){
            QuizAnswer::where('id', $option_id)
                ->where('quiz_question_id', $id)
                ->update([
                    'answer_details' => $request->option[$key],
                    'is_correct' => $request->is_correct[$key],
                ]);
        }
        Session::flash('success','Updated Successfully!');
        return back();
    }
}