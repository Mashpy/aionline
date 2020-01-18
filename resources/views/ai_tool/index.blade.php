@extends('layouts.master')

@section('title')
@endsection

@section('content')
    @include('includes.header')

    <div class="container">
        <h3 class="ai-tool-header">Alternative Software</h3>
        <div class="row">
            @foreach($ai_tools as $ai_tool)
               <div class="col-md-3 mb-2">
                   <div class="card pt-2 ai-tool-card-width">
                       <img src="{{ asset('/' . $ai_tool->logo)}}" class="ai-logo" alt="...">
                       <div class="card-body">
                           <h5 class="card-title text-center"><a class="ai-tool-card-head" href="">{{$ai_tool->name}}</a></h5>
                           <p class="card-text text-center">
                              <small class="text-secondary">{!! $ai_tool->like !== null ? $ai_tool->like : 0 !!} likes | {{ $ai_tool->alternate_software }} alternatives</small>
                           </p>
                       </div>
                   </div>
               </div>
            @endforeach
        </div>
    </div>
    @include('includes.footer')
@endsection


