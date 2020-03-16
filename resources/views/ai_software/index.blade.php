@extends('layouts.master')

@section('title') List of Ai Software
@endsection

@section('content')
    @include('includes.header')
    @include('ai_software.search_panel')
    <section class="software-box">
        <div class="container">
            <div class="box">
               <div class="row box-title">
                   <div class="col-md-12">
                       <h2>Featured Software</h2>
                   </div>
               </div>
                <div class="row box-div justify-content-center">
                    @foreach($feature_softwares as $software)
                       <div class="col-md-2 col-sm-3 col-lg-2 box-item">
                           <a class="ai-software-card-head" href="{{route('ai_software.view', $software->slug)}}"><img src="{{$software->logo !== null ? $software->logo_url : '/uploads/default_photo/image_not_found1.png'}}" alt="..."></a>
                           <div><a href="{{route('ai_software.view', $software->slug)}}" class="box-image-title">{{ $software->name }}</a></div>
                       </div>
                    @endforeach
               </div>
           </div>
        </div>
    </section>
    <section class="recently-added-software">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-lg-9">
                    <div class="box">
                        <div class="box-title">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Recently Added Software</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            @foreach($recently_added_software as $recently_added)
                                <div class="row recently-added-software-item pt-4">
                                    <div class="col-md-2">
                                        <a class="ai-software-card-head" href="{{route('ai_software.view', $recently_added->slug)}}"><img src="{{$recently_added->logo !== null ? $recently_added->logo_url : '/uploads/default_photo/image_not_found1.png'}}" class="ai-logo" alt="..."></a>
                                    </div>
                                    <div class="col-md-10">
                                        <div><a href="{{route('ai_software.view', $recently_added->slug)}}" class="box-image-title">{{$recently_added->name}}</a></div>
                                        @if($recently_added->category_id == !null)
                                            <div><a href="{{route('ai_software.category-softwares', $recently_added->softwareCategoryName->category_slug)}}"><button class="btn btn-xs btn-secondary"><small>{{$recently_added->softwareCategoryName->name}}</small></button></a></div>
                                            <p>{{str_limit($recently_added->description, $limit = 150, $end = '...')}}<a href="{{route('ai_software.view', $recently_added->slug)}}">see more</a> </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    @include('includes/google_ad')
                </div>
            </div>
        </div>
    </section>
    @foreach($category_parent as $category)
        @if($category->softwares->count() > 0)
            <section class="software-box">
                <div class="container">
                    <div class="box">
                        <div class="row box-title">
                            <div class="col-md-12">
                                <h2 class="float-left"><span class="d-none d-sm-block">{{$category->name}}</span><span class="d-block d-sm-none">{{str_limit($category->name, $limit = 27, $end = '...')}}</span></h2>
                            </div>
                        </div>
                        <div class="row box-div justify-content-center">
                            @foreach($category->softwares as $software)
                                <div class="col-md-2 col-sm-3 col-lg-2 box-item">
                                    <a class="ai-software-card-head" href="{{route('ai_software.view', $software->slug)}}"><img src="{{$software->logo !== null ? $software->logo_url : '/uploads/default_photo/image_not_found1.png'}}" alt="..."></a>
                                    <div><a href="{{route('ai_software.view', $software->slug)}}" class="box-image-title"> {{$software->name}}</a></div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12 text-center mb-3">
                            <a href="{{route('ai_software.category-softwares', $category->category_slug)}}">
                                <button class="btn btn-sm view-more-btn">View more</button>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
    @include('includes.footer')
@endsection


