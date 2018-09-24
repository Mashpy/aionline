@extends('layouts.master')
@section('content')
@include('includes.header')
<div>
    <img src="{{ asset('uploads/others/homepage_header.jpg') }}" class="img-responsive" width="100%"/>
</div>
    <div class="container">
        <h2 class="text-center top30 bottom10">Machine Learning Tutorials</h2>
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    @foreach($tutorials as $key => $tutorial)
                        <div class="col-md-6 nopadding">
                            <div class="box-style">
                                <a href="{{ $tutorial->tutorial_url }}" class="custom-card">
                                    <h4 class="tutorial-title">{{ $key + 1 }}. {{$tutorial->title}}</h4>
                                    <p>{{ str_limit(strip_tags($tutorial->description), $limit = 130, $end = '...') }}</p>
                                </a>

                                <hr>
                                <div class="float-left">
                                    <span class="btn-xs btn-info"><i class="fa fa-tags"></i> {{$tutorial->category->name}}</span>
                                </div>
                                <div class="btn-wrap float-right">
                                    <a class="btn-sm btn-success" href="{{ $tutorial->tutorial_url }}">Read more</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-2">
                @include('includes/google_ad')
            </div>

            <div class="clearfix"></div>
            <div class="col-md-12">
                <?php $category = [] ?>
                @foreach($quiz_topics as $quiz_topic)
                    @if(!in_array($quiz_topic->category->name, $category))
                        <br/>
                        <h3>{{ $quiz_topic->category->name }}</h3>
                    @endif
                    <div><a href="{{ route('quiz_question.index', ['quiz_topic_id' => $quiz_topic->id])}}">{{$quiz_topic->topic_name}}</a></div>
                    <?php array_push($category, $quiz_topic->category->name); ?>
                @endforeach
            </div>
        </div>

        <div>
            {!! $tutorials->render() !!}
        </div>
        {{--<div class="pagination">--}}
        {{--<a href = "#">&laquo;</a>--}}
        {{--<a href = "#">1</a>--}}
        {{--<a href = "#" class="active">2</a>--}}
        {{--<a href = "#">3</a>--}}
        {{--<a href = "#">4</a>--}}
        {{--<a href = "#">5</a>--}}
        {{--<a href = "#">6</a>--}}
        {{--<a href = "#">&raquo;</a>--}}
        {{--</div>--}}
    </div>
@include('includes.footer')

@endsection
