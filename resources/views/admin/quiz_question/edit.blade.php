@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert text-center category-heading text-white"><b>Update Quiz Question and Answer</b></div>
                @include('includes.message')
                <div class="alert alert-success">
                    <form method="post" action="{{ route('admin_quiz_question.update', $question->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="control-label" for="name" >Question</label>
                            <input class="form-control" value="{{ $question->question_details  }}" name="question_details" type="text" placeholder="Write Question here" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name" >Explanation</label>
                            <input class="form-control" value="{{ $question->answer_explanation  }}" name="answer_explanation" type="text" placeholder="Write Question here" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ">Update Question</button>
                        </div>
                    </form>
                </div>
            </div>
            @if($question->quiz_answers->count())
            <div class="col-md-12">
                <div class="alert alert-success">
                    <form action="{{route('admin_quiz_answer.update', $question->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <table class="table">
                            <tr>
                                <th>Option</th>
                                <th>Correct Answer</th>
                            </tr>
                            @foreach($question->quiz_answers as $options)
                            <tr>
                                <td class="d-none">
                                    <input type="hidden" value="{{ $options->id}}" name="option_id[]">
                                </td>
                                <td>
                                    <input type="text" name="option[]" value="{{ $options->answer_details }}" class="form-control" required>
                                </td>
                                <td>
                                    <select class="form-control" name="is_correct[]">
                                        <option value="0">Incorrect</option>
                                        <option value="1" {{$options->is_correct == 1 ? 'selected': ''}}>Correct</option>
                                    </select>
                                </td>
                            </tr>
                                @endforeach
                            <tr>
                                <td>
                                    <button class="btn btn-primary">Update Answer</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection