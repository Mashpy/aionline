@extends('layouts.master')
@section('content')
@section('run_custom_css_file')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@endsection

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <div class="float-right"><a class="btn btn-success" target="_blank" href="{{ route('admin_tutorial.show', $tutorial->slug) }}">View</a></div>
                    <div class="clearfix"></div>
                    <form method="post" action="{{ route('admin_tutorial.update', $tutorial->slug) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">Title</label>
                            <input class="form-control" name="title" type="text"  value="{{$tutorial->title}}" />
                        </div>

                        <div class="form-group">
                            <textarea class="summernote" name="description" placeholder="Description">{{ $tutorial->description }}</textarea>
                        </div>

                        <div class="form-group category-box">
                            <div>Select category here:</div>
                            <select class="form-control" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}" {{ $tutorial->category_id == $category->id ? 'selected'  : '' }}> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div>Select Username here:</div>
                            <select class="form-control" name="user_id" data-value="1">
                                <option value="">Select Username</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id}}" {{ $tutorial->user_id == $user->id ? 'selected'  : '' }} > {{ $user->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                            <button type="button" class="btn btn-danger pull-right" id="clear">Clear</button>
                        </div>
                        <div class="clearfix"></div>

                    </form>

                    @if(count($uploads) > 0)
                        <div>Uploaded images</div>
                        @foreach($uploads as $upload)
                                <img style="width: 200px; height: auto" class="img-responsive" src="{{ $upload->upload_url }}">
                        @endforeach
                    @else
                        <div class="text-center">You have uploaded no images</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
@section('run_custom_js_file')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
@endsection
@section('run_custom_jquery')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
@endsection