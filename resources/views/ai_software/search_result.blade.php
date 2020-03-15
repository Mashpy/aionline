@extends('layouts.master')

@section('title') Search for {{$query}}
@endsection

@section('content')
    @include('includes.header')
    @include('ai_software.search_panel')
    <section class="software-box">
        <div class="container">
            <div class="box">
                <div class="row box-title">
                    <div class="col-md-12">
                        <h2>Search Results for "{{$query}}"</h2>
                    </div>
                </div>
                @if(!empty($search_results) && $search_results->count() > 0)
                    <div class="row box-div">
                        @foreach($search_results as $search_result)
                            <div class="col-md-2 col-sm-6 col-lg-2 box-item">
                                <a class="ai-software-card-head" href="{{route('ai_software.view', $search_result->slug)}}"><img src="{{$search_result->logo !== null ? $search_result->logo_url : '/uploads/default_photo/image_not_found1.png'}}" class="ai-logo" alt="..."></a>
                                <div><p><a class="alternate-software-card-head" href="{{route('ai_software.view', $search_result->slug)}}">{{$search_result->name}}</a></p></div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-primary col-md-12 mt-2" role="alert">
                        No Software Found!! Try To Search Again!
                    </div>
                @endif
            </div>
        </div>
    </section>
    @include('includes.footer')
@endsection


