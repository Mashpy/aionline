@extends('layouts.master')

@section('title') Blog | Ai Online Course @endsection

@section('content')
    @include('includes.header')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center top30 bottom10 blog-page-main-heading">Latest Blog Post</h2>
            </div>
        </div>
        <div class="row">
        <div class="col-md-10">
               <div class="row">
                   @if($blog->count() > 0)
                       @foreach($blog as $key => $blog_post)
                           <div class="col-md-6">
                               <div class="box-style">
                                   <a href="{{route('blog.show', $blog_post->slug)}}" class="custom-card">
                                       <h4 class="tutorial-title">{{$blog_post->title}}</h4>
                                       <p>{{ str_limit(strip_tags($blog_post->description), $limit = 150, $end = '...') }}</p>
                                   </a>
                                   <hr>
                                   <div class="float-left">
                                       <span class="btn-xs btn-info"><i class="fa fa-tags"></i> {{$blog_post->category->name}}</span>
                                   </div>
                                   <div class="btn-wrap float-right">
                                       <a class="btn-sm btn-success" href="{{route('blog.show', $blog_post->slug)}}">Read more</a>
                                   </div>
                                   <div class="clearfix"></div>
                               </div>
                           </div>
                       @endforeach
               </div>
               @else
               <div class="col-md-12 justify-content-center">
                   <div class="alert alert-warning blog-alert-box" role="alert">
                       No Blog Post Available Right Now!
                   </div>
               </div>
                @endif
        </div>

        <div class="col-md-2">
            @include('includes/google_ad')
        </div>

        <div class="clearfix"></div>
        </div>

        <div>
            {!! $blog->render() !!}
        </div>
    </div>
    @include('includes.footer')

@endsection
