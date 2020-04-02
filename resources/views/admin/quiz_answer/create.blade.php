@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            {{--<div class="col-md-12">
                @include('includes.message')
                <div class="alert alert-success">
                    <form method="post" action="{{ route('admin_quiz_answer.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="quiz_question_id" value="{{ $quiz_question_id }}">

                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name" >answer_details</label>
                            <input class="form-control" name="answer_details" type="text" placeholder="answer_details" required />
                        </div>

                        <div class="form-group"> <!-- Name field -->
                            <span>is correct:</span>
                            <input name="is_correct" onclick="correctAnswer()" value="1" type="checkbox"/>
                        </div>
                        <div class="form-group d-none"id="answer_explain"> <!-- Name field -->
                            <label class="control-label " for="name" >answer_explanation</label>
                            <input class="form-control" name="answer_explanation" type="text" placeholder="answer_explanation"/>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                            <button type="button" class="btn btn-danger pull-right" id="clear">Clear</button>
                        </div>

                    </form>
                </div>
            </div>--}}
            <div class="col-md-12">
                <div class="alert alert-success">
                    <form action="{{ route('admin_quiz_answer.store') }}" method="post">
                        {{ csrf_field() }}
                        <table class="table">
                            <tr>
                                <th>Option</th>
                                <th>Correct Answer</th>
                            </tr>
                                <tr>
                                    <input type="hidden" name="quiz_question_id" value="{{ $quiz_question_id }}">
                                    <input type="hidden" name="quiz_topic_id" value="{{ Request::get('quiz_topic_id') }}">
                                    <td>
                                        <input type="text" name="answer_details[]" class="form-control" placeholder="Enter option Ex. A.option1" required>
                                    </td>
                                    <td>
                                        <select class="form-control" name="is_correct[]">
                                            <option value="0">Incorrect</option>
                                            <option value="1">Correct</option>
                                        </select>
                                    </td>
                                </tr>
                            <tr>
                                <td>
                                    <input type="text" name="answer_details[]" class="form-control" placeholder="Enter option Ex. A.option1" required>
                                </td>
                                <td>
                                    <select class="form-control" name="is_correct[]">
                                        <option value="0">Incorrect</option>
                                        <option value="1">Correct</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="answer_details[]" class="form-control" placeholder="Enter option Ex. A.option1" required>
                                </td>
                                <td>
                                    <select class="form-control" name="is_correct[]">
                                        <option value="0">Incorrect</option>
                                        <option value="1">Correct</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="answer_details[]" class="form-control" placeholder="Enter option Ex. A.option1" required>
                                </td>
                                <td>
                                    <select class="form-control" name="is_correct[]">
                                        <option value="0">Incorrect</option>
                                        <option value="1">Correct</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="btn btn-primary">Add Answer</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('run_custom_jquery')
    <script>
        function correctAnswer() {
            if ($('#answer_explain').hasClass('d-none')) {
                $('#answer_explain').removeClass('d-none')
            }else {
                $('#answer_explain').addClass('d-none')
            }
        }

    </script>
@endsection