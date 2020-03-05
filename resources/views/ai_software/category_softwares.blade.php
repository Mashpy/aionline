@extends('layouts.master')

@section('title') Softwares of {{$category->name}}
@endsection

@section('content')
    @include('includes.header')
    <section class="software-box">
        <div class="container">
            <div class="box">
                <div class="row box-title">
                    <div class="col-md-12">
                        <h2>{{$category->name}} softwares</h2>
                    </div>
                </div>
                @if($category_softwares->count() > 0)
                    <div class="row box-div">
                        @foreach($category_softwares as $category_software)
                            <div class="col-md-2 col-sm-6 col-lg-2 box-item">
                                <a class="ai-software-card-head" href="{{route('ai_software.view', $category_software->slug)}}"><img src="{{$category_software->logo !== null ? $category_software->logo_url : '/uploads/default_photo/image_not_found1.png'}}" class="ai-logo" alt="..."></a>
                                <div><p><a class="alternate-software-card-head" href="{{route('ai_software.view', $category_software->slug)}}">{{$category_software->name}}</a></p></div>
                            </div>
                        @endforeach
                    </div>
                @else
                <div class="alert alert-danger col-md-12 mt-2" role="alert">
                    No Software Found!!
                </div>
                @endif
            </div>
        </div>
    </section>
    @include('includes.footer')
@endsection


