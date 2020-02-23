@extends('layouts.master')

@section('title')
 Alternative Software of {{$ai_software->name}}
@endsection

@section('content')
    @include('includes.header')
    @include('ai_software.ai_software_view_head')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-lg-9">
                @include('includes.message')
                <nav class="nav nav-tabs mb-4">
                    <a href="{{route('ai_software.view', $ai_software->slug)}}" class="nav-item nav-link nav-tab-menu active">
                        <i class="fa fa-home"></i> Alternatives
                    </a>
                    <a href="{{route('ai_software.reviews', $ai_software->slug)}}" class="nav-item nav-tab-menu nav-link">
                        <i class="fa fa-user"></i> Reviews
                    </a>
                </nav>
                <div class="row">
                    @if($ai_software->alternate_software->count() < 1)
                        <div class="alert alert-primary col-md-12" role="alert">
                            No Alternate Software Found!
                        </div>
                    @endif

                    @if($ai_software->alternate_software->count() > 0)
                    <section class="alternate-software">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box">
                                        <div class="box-title">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h2 class="alternate-software-count">{{ $ai_software->alternate_software->count() }} Best Alternatives of {{$ai_software->name}}</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            @foreach($ai_software->alternate_software as $ai_softare_alternative)
                                                <div class="row alternate-software-item p-4">
                                                    <div class="col-md-2">
                                                        <a href="{{route('ai_software.view', $ai_softare_alternative->slug)}}"><img src="{{$ai_softare_alternative->logo_url}}" class="alternative-software-logo" alt="..."></a>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div>
                                                            <h5><a class="alternate-software-card-head" href="{{route('ai_software.view', $ai_softare_alternative->slug)}}">{{$ai_softare_alternative->name}}</a></h5>
                                                        </div>
                                                        <p>{{str_limit($ai_softare_alternative->description, $limit = 170, $end = '...')}}</p>
                                                    </div>
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-10">
                                                        <p class="float-left">
                                                            <small class="text-secondary"><i class="fa fa-thumbs-up alternate-software-item-icon"></i> {!! $ai_softare_alternative->like !== null ? $ai_softare_alternative->like : 0 !!} likes  <i class="fa fa-map-signs alternate-software-item-icon"></i> {{ $ai_software->alternate_software->count() }} alternatives</small>
                                                        </p>
                                                        <a class="float-right" href="{{route('ai_software.view', $ai_softare_alternative->slug)}}"><button class="float-right btn btn-sm alternate-seemore-btn">View Details</button></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                @include('includes/google_ad')
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection


