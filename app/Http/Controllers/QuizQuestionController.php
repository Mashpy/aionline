<?php
namespace App\Http\Controllers;

use App\Models\QuizAnswer;
use App\Models\QuizTopic;
use Illuminate\Http\Request;
use App\Models\QuizQuestion;

class QuizQuestionController extends Controller
{
    public function show($slug){
        $quiz_topic = QuizTopic::where('slug', $slug)->first();
        $quiz_categories = QuizTopic::select('category_id')->distinct()->with('quiz_topics')->get();
        if(empty($slug)){
            $quiz_questions = QuizQuestion::orderBy('created_at','desc')->Paginate(10);
        } else {
            $quiz_questions = QuizQuestion::where('quiz_topic_id', $quiz_topic->id)->orderBy('created_at','desc')->Paginate(10);
        }
        return view('quiz_question.index', compact('quiz_questions', 'quiz_topic', 'quiz_categories'));
    }

}