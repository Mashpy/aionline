@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert text-center category-heading text-white"><b>Question List</b></div>
                {{--<div>
                    @if(Request::get('quiz_topic_id'))
                        Here you will get tutorial. <a href="{{ route('admin_quiz_question.create', ['quiz_topic_id' =>  Request::get('quiz_topic_id')??'']) }}">Create Questions</a>
                        @else
                            Here you will get tutorial. <a href="{{ url('admin/admin_quiz_topic') }}">Question Topic</a>
                        @endif
--}}{{--                    Here you will get tutorial. <a href="{{ url('/admin_quiz_topic'}}">Create Questions</a>--}}{{--
                </div>--}}
                <div class="col-md-12">
                    @include('includes.message')
                    <div class="alert alert-success">
                        <form method="post" action="{{ route('admin_quiz_question.store') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="quiz_topic_id" value="{{Request::get('quiz_topic_id')}}"/>
                            <div class="form-group"> <!-- Name field -->
                                <label class="control-label " for="name" >Question Details</label>
                                <input class="form-control" name="question_details" type="text" placeholder="Write Question here" required />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name" >Explanation</label>
                                <input class="form-control" name="answer_explanation" type="text" placeholder="Write Question Explanation Here( Not Required)" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ">Create Question</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                        <tr>
                            <th>question</th>
                            <th>Answer</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($quiz_questions as $question)
                            <tr>
                                <td>{{$question->question_details}}</td>
                                <td>
                                <div>
                                {{$question->question}}
                                </div>
                                @foreach($question->quiz_answers as $quiz_answer)
                                    <span class="btn-sm btn-{{ $quiz_answer->is_correct? 'success' : 'info' }}">{{ $quiz_answer->answer_details }}</span>
                                @endforeach
                                </td>
                                <td>
                                    @if($question->quiz_answers->count() < 1)
                                    <a href="{{ route('admin_quiz_answer.create', [ 'quiz_question_id' => $question->id, 'quiz_topic_id' => Request::get('quiz_topic_id')]) }}" class="btn btn-warning">Add</a>
                                    @endif
                                    <a href="{{ route('admin_quiz_question.edit', $question->id)}}" class="btn btn-outline-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection