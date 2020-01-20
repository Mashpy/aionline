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
                    <a href="{{route('ai-tool.view', $ai_tool->slug)}}" class="nav-item nav-link nav-tab-menu active">
                        <i class="fa fa-home"></i> Alternatives
                    </a>
                    <a href="{{route('ai-tool.reviews', $ai_tool->slug)}}" class="nav-item nav-tab-menu nav-link">
                        <i class="fa fa-user"></i> Reviews
                    </a>
                </nav>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h3 class="ai-tool-header float-left">Alternative Software of {{$ai_tool->name}} ...</h3>
                    </div>
                    @foreach($ai_tool->alternate_software as $ai_tool_alternative)
                        <div class="col-md-4 mb-2">
                            <div class="card ai-tool-card-width">
                                <div class="card-body">
                                    <img src="{{$ai_tool->logo_url}}" class="ai-logo" alt="...">
                                    <h5 class="card-title text-center"><a class="ai-tool-card-head" href="{{route('ai-tool.view', $ai_tool_alternative->slug)}}">{{$ai_tool_alternative->name}}</a></h5>
                                    <p class="card-text text-center">
                                        <small class="text-secondary">{!! $ai_tool_alternative->like !== null ? $ai_tool_alternative->like : 0 !!} likes | {{ $ai_tool->alternate_software->count() }} alternatives</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                @include('includes/google_ad')
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection


