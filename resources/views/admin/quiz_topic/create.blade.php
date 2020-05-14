@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert text-center category-heading text-white"><b>Create New Quiz</b></div>
                <div class="alert alert-success">
                    <form method="post" action="{{ route('admin_quiz_topic.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">Topic name</label>
                            <input class="form-control" name="topic_name" type="text" placeholder="Enter Topic name" required />
                        </div>
                        <div class="form-group category-box">
                            <div>Select category here:</div>
                            <select name="category_id" class="form-control category_select" data-value="1" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="meta_description">Meta Description</label>
                           <textarea class="form-control" name="meta_description" rows="5" placeholder="Enter meta description"></textarea>
                        </div>
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="keyword">Keyword</label>
                            <input class="form-control" name="keyword" type="text" placeholder="Enter keyword" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection