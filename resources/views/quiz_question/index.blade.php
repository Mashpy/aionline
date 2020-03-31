@extends('layouts.master')
@section('content')
    @include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
          <h4>{{ $quiz_topic->topic_name }} Question and Answer </h4>
            <br>
            <form method="POST" action="{{ route('quiz-result.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @foreach($quiz_questions as $key => $question)
                    <div id="radio-button">{{ $key + 1 }}. {{$question->question_details}}</div>
                    <div class="p-1">
                         {{$question->question}}
                    </div>
                    @foreach($question->quiz_answers as $quiz_answer)
                        <div class="pl-3">
                            <label class="answer-{{ $question->id }}" id="correct-ans-{{$quiz_answer->id}}">

                                <input type="radio" name="selected_answers[question_id_{{ $question->id }}]"  onclick="checkAnswer({{$quiz_answer->id}}, {{$question->id}})"  value="{{ $quiz_answer->id}}"> {{ $quiz_answer->answer_details }}<br>


                            </label>
                        </div>
                    @endforeach
                    <button type="button" class="mb-2" onclick="showAnswer({{ $question->id }})">View Answer</button>
                    <div id="question-{{ $question->id}}" class="d-none mb-2"><b class="text-success">view answer:</b> <span data-ans-id="{{$question->quiz_correct_answer['id']}}" id="ans-{{$question->id}}">{{ $question->quiz_correct_answer['answer_details'] }}</span><br><b class="text-success">Explanation: </b>{{ $question->answer_explanation}}</div>
                @endforeach
{{--                <div class="form-group mt-5">--}}
{{--                    <button type="submit" class="btn btn-primary ">Submit</button>--}}
{{--                    <button type="button" class="btn btn-danger pull-right" id="clear">Clear</button>--}}
{{--                </div>--}}
            </form>
        </div>
    </div>
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
                // {
                //     if ($('#question-' + question_id).hasClass('d-none')) {
                //         $('#question-' + question_id).removeClass('d-none');
                //         $('#question-' + question_id).addClass('d-block');
                //     } else {
                //         $('#question-' + question_id).removeClass('d-block');
                //         $('#question-' + question_id).addClass('d-none');
                //     }
                // }
                showAnswer(qus_id);
            }else{
                $("#correct-ans-"+answer_id).addClass('text-danger');
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