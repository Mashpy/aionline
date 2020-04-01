@extends('layouts.master')
@section('content')
    @include('includes.header')
<div class="container mt-2">
    <section>
        <div class="row">
            <div class="col-md-4">
                 <div class="container category-topic accordion-body">
                    <h5 class="card-title text-center mb-4">Quiz Category</h5>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @foreach($quiz_categories as $key => $quiz_categorie)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                            {{$quiz_categorie->category->name}}
                                            <i class="fa fa-plus float-right"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse-{{$key}}" class="panel-collapse collapse {{$quiz_categorie->category_id == $quiz_topic->category_id ? 'show' : ''}}" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <ul>
                                            @foreach($quiz_categorie->quiz_topics as $topics)
                                                <a href="{{ route('quiz-question.show', $topics->slug)}}">
                                                    <li class="bg-white">
                                                        {{$topics->topic_name}}
                                                        <i class="fa fa-arrow-right float-right"></i>
                                                    </li>
                                                </a>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center quiz-view-question">Quiz Topic - {{ $quiz_topic->topic_name }}</h4>
                        <form method="POST" action="{{ route('quiz-result.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @foreach($quiz_questions as $key => $question)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div id="radio-button">
                                            {{ $key + 1 }}. <span class="quiz-question">{{$question->question_details}}</span>
                                        </div>
                                        <div class="p-1">
                                            {{$question->question}}
                                        </div>
                                        <hr>
                                        @foreach($question->quiz_answers as $quiz_answer)
                                            <div class="pl-3">
                                                <label class="answer-{{ $question->id }}" id="correct-ans-{{$quiz_answer->id}}">
                                                    <input type="radio" name="selected_answers[question_id_{{ $question->id }}]"  onclick="checkAnswer({{$quiz_answer->id}}, {{$question->id}})"  value="{{ $quiz_answer->id}}"> {{ $quiz_answer->answer_details }}
                                                    <span class="text-success d-none" id="correct-{{$quiz_answer->id}}"><b><i class="fa fa-check"></i></b></span>
                                                    <span class="text-danger d-none" id="incorrect-{{$quiz_answer->id}}"><b><i class="fa fa-times"></i></b></span>
                                                </label>
                                            </div>
                                        @endforeach
                                        {{--use for checking ans alart--}}
                                        <!--start-->
                                        <div class="d-none">
                                            <b class="text-success">view answer:</b>
                                            <span data-ans-id="{{$question->quiz_correct_answer['id']}}" id="ans-{{$question->id}}">{{ $question->quiz_correct_answer['answer_details'] }}</span><br>
                                        </div>
                                        <!--end-->
                                        @if($question->answer_explanation)
                                            <div class="explanation">
                                                <button class="btn btn-info btn-sm" type="button" class="mb-2" onclick="showAnswer({{ $question->id }})">View Explanation</button>
                                                <div id="question-{{ $question->id}}" class="d-none mb-2">
                                                    <b class="text-success">Explanation: </b>{{ $question->answer_explanation}}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('includes.footer')

@endsection
@section('run_custom_jquery')
    <script>
        function checkAnswer(answer_id, qus_id){
            let ans_id = $("#ans-"+qus_id).data('ans-id');
            $(".answer-"+qus_id).removeClass("text-success")
            $(".answer-"+qus_id).removeClass("text-danger")
            if(ans_id == answer_id){
                $("#correct-ans-"+answer_id).addClass('text-success');
                $('#correct-'+answer_id).removeClass('d-none');
                showAnswer(qus_id);
            }else{
                $("#correct-ans-"+answer_id).addClass('text-danger');
                $('#incorrect-'+answer_id).removeClass('d-none');
            }
        }

        $("checkAnswer").click(function(){
            $('#radio-button').each(function(){
                $("input[type='radio']").css("color", "red");
            });
        });
        function showAnswer(question_id) {
            if ($('#question-' + question_id).hasClass('d-none')) {
                $('#question-' + question_id).removeClass('d-none');
                $('#question-' + question_id).addClass('d-block');
            } else {
                $('#question-' + question_id).removeClass('d-block');
                $('#question-' + question_id).addClass('d-none');
            }
        }

        $("#clear").click(function(){
            $('#radio-button').each(function(){
                $("input[type='radio']").prop("checked", false);
            });
        });
    </script>
@endsection























{{--@extends('layouts.master')--}}
{{--@section('content')--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="alert alert-success">--}}
                    {{--<table id="order-listing" class="table table-striped">--}}
                        {{--<tbody>--}}
                        {{--@foreach($quiz_questions as $question)--}}
                        {{--<tr>--}}
                                {{--<td>{{$question->question_details}}</td>--}}
                                {{--<td>--}}
                            {{--<tr>--}}
                                    {{--@foreach($question->quiz_answers as $quiz_answer)--}}
                                    {{--<td>{{ $quiz_answer->answer_details }}</td>--}}
                                    {{--@endforeach--}}
                        {{--</tr>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}









{{--@extends('layouts.master')--}}
{{--@section('content')--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="alert alert-success">--}}
                    {{--<table id="order-listing" class="table table-striped">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>Category_name</th>--}}
                            {{--<th>question</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@foreach($quiz_questions as $question)--}}
                            {{--<tr>--}}
                                {{--<td>{{$question->category->name}}</td>--}}
                                {{--<td>{{$question->question_details}}</td>--}}
                                {{--<td>--}}
                                    {{--<div>--}}
                                        {{--{{$question->question}}--}}
                                    {{--</div>--}}

                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                    {{--<div>--}}
                    {{--Tutorial Title--}}
                    {{--Category-id--}}
                    {{--Description--}}
                    {{--</div>--}}
                    {{--<div>--}}
                    {{--{{ $tutorial->title }}--}}
                    {{--{{ $tutorial->category_id }}--}}
                    {{--{{ $tutorial->description }}--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
{{--@endsection--}}