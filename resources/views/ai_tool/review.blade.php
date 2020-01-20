@extends('layouts.master')

@section('title')
@endsection

@section('content')
    @include('includes.header')
    @include('ai_tool.ai_software_view_head')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-9">
                @include('includes.message')
                <nav class="nav nav-tabs">
                    <a href="{{route('ai_software.view', $ai_tool->slug)}}" class="nav-item nav-link nav-tab-menu">
                        <i class="fa fa-home"></i> Alternatives
                    </a>
                    <a href="{{route('ai_software.reviews', $ai_tool->slug)}}" class="nav-item nav-link nav-tab-menu active">
                        <i class="fa fa-user"></i> Reviews
                    </a>
                </nav>
                <div class="row">
                    <div class="col-md-12 mb-4 clearfix">
                        <h3 class="ai-software-header float-left">{{$ai_tool->name}} Reviews</h3>
                        <a class="btn btn-success btn-green float-right mt-2" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="well well-sm">
                                <div class="row display-none" id="post-review-box">
                                    <div class="col-md-12">
                                        <form accept-charset="UTF-8" action="{{route('ai_software.review.store')}}" method="post">
                                            @csrf
                                            <table class="table">
                                                <tr>
                                                    <th>Name</th>
                                                    <td>
                                                        <input type="text" class="form-control" name="review_by" placeholder="Enter your name" required>
                                                        <input type="hidden" name="alternative_software_id" value="{{$ai_tool->id}}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>
                                                        <input type="text" class="form-control" name="title" placeholder="Enter a title" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Comment</th>
                                                    <td>
                                                        <textarea class="form-control animated" cols="100" id="new-review" name="description" required placeholder="Enter your review here..." rows="5"></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="text-right mr-2">
                                                <button class="btn btn-danger btn-sm" id="close-review-box">Cancel</button>
                                                <button class="btn btn-success btn-sm" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        @foreach($reviews as $review)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{asset('uploads/default_photo/reviewer.jpg')}}" class="img img-rounded img-fluid"/>
                                        </div>
                                        <div class="col-md-10">
                                            <h5 class="review-title">{{$review->title}}</h5>
                                            <p>
                                                <small class="float-left">by <strong>{{$review->review_by}}</strong> &bull; about {{$ai_tool->name}} &bull; {{$review->created_at}}</small><br>
                                            </p>
                                            <div class="clearfix"></div>
                                            <p>{{$review->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('includes/google_ad')
            </div>
        </div>
    </div>
@include('includes.footer')
@section('run_custom_jquery')
    <script>
        $(document).ready(function(){
            $("#open-review-box").click(function(){
                $("#open-review-box").hide();
                $("#post-review-box").slideDown("slow");
            });
            $("#close-review-box").click(function(){
                $("#open-review-box").show();
                $("#post-review-box").slideUp("slow");
            });
        });
    </script>
@endsection

@endsection


