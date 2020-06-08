@extends('layouts.master')

@section('title')Search Result of {{ $query }}@endsection

@section('content')
    @include('includes.header')
    <div class="container">
        <div class="col-md-12">
            <h2 class="text-center top30 bottom10">Search Result of {{ $query }}</h2>
        </div>
       <div class="row">
           <div class="col-md-2">
               @include('home.left_sidebar')
           </div>
           <div class="col-md-8">
               <div class="col-md-12" id="tutorial">
                   <div class="card">
                       <h5 class="card-header">Tutorial Found ({{$tutorial_search_results->count()}}) </h5>
                       @foreach($tutorial_search_results as $tutorial)
                           <div class="card-body">
                               <h5 class="card-title"><a href="{{ $tutorial->tutorial_url }}">{{ $tutorial->title }}</a></h5>
                               <p class="card-text">{{ str_limit(strip_tags($tutorial->description), $limit = 160, $end = '...') }}</p>
                               <a href="{{ $tutorial->tutorial_url }}" class="btn btn-success btn-sm">view tutorial</a>
                           </div>
                       @endforeach
                   </div>
                   <div class="card mt-2" id="blog">
                       <h5 class="card-header">Blog Found ({{ $blog_search_results->count() }}) </h5>
                       @foreach($blog_search_results as $blog)
                           <div class="card-body">
                               <h5 class="card-title"><a href="{{ $blog->tutorial_url }}">{{ $blog->title }}</a></h5>
                               <p class="card-text">{{ str_limit(strip_tags($blog->description), $limit = 160, $end = '...') }}</p>
                               <a href="{{ $blog->tutorial_url }}" class="btn btn-success btn-sm">view tutorial</a>
                           </div>
                       @endforeach
                   </div>

                   <div class="card mt-2" id="aisoftware">
                       <h5 class="card-header">Ai Software Found ({{$software_search_results->count()}}) </h5>
                       @foreach($software_search_results as $recently_added)
                           <div class="row recently-added-software-item pt-4">
                               <div class="col-md-2">
                                   <a class="ai-software-card-head" href="{{route('ai_software.view', $recently_added->slug)}}"><img src="{{$recently_added->logo !== null ? $recently_added->logo_url : asset('no-image-found.jpg')}}" class="ai-logo" alt="..."></a>
                               </div>
                               <div class="col-md-10">
                                   <div><a href="{{route('ai_software.view', $recently_added->slug)}}" class="box-image-title">{{$recently_added->name}}</a></div>
                                   <p>{{ $recently_added->short_description }}... <a href="{{route('ai_software.view', $recently_added->slug)}}">See more</a></p>
                               </div>
                           </div>
                       @endforeach
                   </div>
               </div>
           </div>
           <div class="col-md-2">
               <div class="row">
                   <div class="col-md-12">
                       <div class="card left-bar-search-result" style="width: 12rem">
                           <div class="card-body">
                               <h5 class="card-title">Search result</h5>
                               <ul>
                                   <li><a href="#tutorial">Tutorial Found ({{$tutorial_search_results->count()}})</a></li>
                                   <li><a href="#blog">Blog Found ({{ $blog_search_results->count() }})</a></li>
                                   <li><a href="#aisoftware">Ai Software Found ({{$software_search_results->count()}})</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </div>
    @include('includes.footer')

@endsection
