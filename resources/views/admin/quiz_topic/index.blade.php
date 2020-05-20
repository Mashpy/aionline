@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="alert text-center category-heading text-white"><b>Quiz Topic List</b></div>
                </div>
                @include('includes.message')
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Topic name</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quiz_topics as $quiz_topic)
                            <tr>
                                <td>{{$quiz_topic->topic_name}}</td>
                                <td>{{$quiz_topic->category->name}}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin_quiz_question.index', ['quiz_topic_id' => $quiz_topic->id])}}" class="btn btn-warning btn-sm">View Question</a>
                                    <button type="button" onClick="get_topic({{$quiz_topic->id}})" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Edit Topic</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--tracking modal--}}
    <div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Update Quiz Topic</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('admin.quiz-topic-update')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" required>
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">Topic name</label>
                            <input class="form-control" name="topic_name" id="topic_name" type="text" placeholder="Enter Topic name" required />
                        </div>
                        <div class="form-group category-box">
                            <div>Select category here:</div>
                            <select name="category_id" id="category_id" class="form-control category_select" data-value="1" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label" for="meta_description">Meta Description</label>
                            <textarea class="form-control" name="meta_description" id="meta_description" rows="5" placeholder="Enter meta description"></textarea>
                        </div>
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label" for="keyword">Keyword</label>
                            <input class="form-control" name="keyword" id="keyword" type="text" placeholder="Enter keyword" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('run_custom_js_file')
    <script>
        function get_topic(id){
            $.get("/admin/admin_quiz_topic/"+id+"/edit" , function (data) {
                $('#id').val(data.id);
                $('#topic_name').val(data.topic_name);
                $('#meta_description').val(data.meta_description);
                $('#keyword').val(data.keyword);
                $('#category_id option[value='+data.category_id+']').attr("selected", "selected");
            });
        }
    </script>
@stop
@endsection