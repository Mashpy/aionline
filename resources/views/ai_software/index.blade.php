@extends('layouts.master')

@section('title')
@endsection

@section('content')
    @include('includes.header')
    <div class="container">
        <h3 class="ai-software-header">Alternative Software</h3>
       <div class="row">
           <div class="col-md-9">
               <div class="row">
                   @foreach($ai_softwares as $ai_software)
                       <div class="col-md-4 mb-2">
                           <div class="card pt-2 ai-software-card-width">
                               <img src="{{$ai_software->logo_url}}" class="ai-logo" alt="...">
                               <div class="card-body">
                                   <h5 class="card-title text-center"><a class="ai-software-card-head" href="{{route('ai_software.view', $ai_software->slug)}}">{{$ai_software->name}}</a></h5>
                                   <p class="card-text text-center">
                                       <small class="text-secondary">{!! $ai_software->like !== null ? $ai_software->like : 0 !!} likes | {{ $ai_software->alternate_software->count() }} alternatives</small>
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

