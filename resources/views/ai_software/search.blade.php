@extends('layouts.master')

@section('title') List of Ai Software
@endsection

@section('content')
    @include('includes.header')
    <section class="highlight">
        <div class="container">
            <div class="row">
                <div class="col col-sm-12 col-md-12 col-lg-12 ai-software-head">
                    <h3>Find Alternative Software</h3>
                    <h5>Currently, {{$ai_softwares->count()}} software added.</h5>
                </div>
                <div align="center" class="col-sm-12 col-md-12 col-lg-12 text-center d-flex justify-content-center align-items-center">
                    <div class="col-md-8">
                        <form action="{{route('ai_software.search')}}" method="post">
                            @csrf
                            <input type="search" name="software_search" required class="form-control p-2" placeholder="Search Your Software...">
                            <button class="btn btn-danger mt-2">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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


