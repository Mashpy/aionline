@extends('layouts.master')

@section('title') Softwares of {{$category->name}}
@endsection

@section('content')
    @include('includes.header')
    <section class="software-box">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-lg-9">
                    <div class="box">
                        <div class="box-title d-block text-center">
                            <h2 class="text-center">{{$category->name}} softwares</h2>
                        </div>
                        @if($category_softwares->count() > 0)
                            <div class="col-md-12">
                                @foreach($category_softwares as $category_software)
                                    <div class="row recently-added-software-item pt-4">
                                        <div class="col-md-2">
                                            <a class="ai-software-card-head" href="{{route('ai_software.view', $category_software->slug)}}"><img src="{{$category_software->logo !== null ? $category_software->logo_url : '/uploads/default_photo/image_not_found1.png'}}" class="ai-category-software-logo" alt="..."></a>
                                        </div>
                                        <div class="col-md-10">
                                            <div><a href="{{route('ai_software.view', $category_software->slug)}}" class="box-image-title">{{$category_software->name}}</a></div>
                                            <p>{{str_limit($category_software->description, $limit = 150, $end = '...')}}<a href="{{route('ai_software.view', $category_software->slug)}}">see more</a> </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @else
                            <div class="col-md-12">
                                <div class="alert alert-danger mt-2" role="alert">
                                    No Software Found!
                                </div>
                            </div>

                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    @include('includes/google_ad')
                </div>
            </div>
        </div>
    </section>
    @include('includes.footer')
@endsection


