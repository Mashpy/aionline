@extends('layouts.master')

@section('title')
 Alternative Software of {{$ai_software->name}} | 
@endsection

@section('content')
    @include('includes.header')
    @include('ai_software.ai_software_view_head')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-9">
                @include('includes.message')
                <nav class="nav nav-tabs">
                    <a href="{{route('ai_software.view', $ai_software->slug)}}" class="nav-item nav-link nav-tab-menu active">
                        <i class="fa fa-home"></i> Alternatives
                    </a>
                    <a href="{{route('ai_software.reviews', $ai_software->slug)}}" class="nav-item nav-tab-menu nav-link">
                        <i class="fa fa-user"></i> Reviews
                    </a>
                </nav>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h3 class="ai-software-header float-left">Alternative Software of {{$ai_software->name}} ...</h3>
                    </div>
                    @if($ai_software->alternate_software->count() < 1)
                        <div class="alert alert-primary col-md-12" role="alert">
                            No Alternate Software Found!
                        </div>
                    @endif
                    @foreach($ai_software->alternate_software as $ai_softare_alternative)
                        <div class="col-md-4 mb-2">
                            <div class="card ai-software-card-width">
                                <div class="card-body">
                                    <img src="{{$ai_softare_alternative->logo_url}}" class="ai-logo" alt="...">
                                    <h5 class="card-title text-center"><a class="ai-software-card-head" href="{{route('ai_software.view', $ai_softare_alternative->slug)}}">{{$ai_softare_alternative->name}}</a></h5>
                                    <p class="card-text text-center">
                                        <small class="text-secondary">{!! $ai_softare_alternative->like !== null ? $ai_softare_alternative->like : 0 !!} likes | {{ $ai_software->alternate_software->count() }} alternatives</small>
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


