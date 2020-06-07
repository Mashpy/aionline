@extends('layouts.master')

@section('title')Artificial Intelligence Online Course @endsection

@section('content')
@include('includes.header')
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
        </div>

        <div>
            {!! $tutorials->render() !!}
        </div>
    </div>
@include('includes.footer')

@endsection
