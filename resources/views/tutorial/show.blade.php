@extends('layouts.master')

@section('title')
    {{ $tutorial->title . ' | ' . $tutorial->category->name . ' | ' }}
@endsection

@section('content')
    @include('includes.header')

    <div class="container-fluid top15">
        <div class="row">
            <div class="col-md-3">
                <h4>Tutorials</h4>
                <table class="table table-striped">
                    <tbody>
                        <div class="list-group">
                            @foreach($category_tutorials as $category_tutorial)
                                <div>
                                    <a class="list-group-item list-group-item-action {{ Request::url() == route('tutorial.show', $category_tutorial->slug) ? 'active' : '' }}" href="{{ route('tutorial.show', $category_tutorial->slug) }}">{{$category_tutorial->title}}</a>
                                </div>
                            @endforeach
                        </div>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6 individual-article">
                <h3>{{ $tutorial->title }}</h3>
                <p class="category">{{$tutorial->category->name}}</p>
                <p class="meta">{{ $tutorial->created_at->format('m-d-Y') }}</p>
                <p>{!! $tutorial->description !!}</p>
            </div>

            <div class="col-md-3">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- aionlinecourse_rightsidebar -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-1505016841070170"
                     data-ad-slot="7718620146"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </div>
@endsection

@section('run_custom_jquery')
    <script>
        $("img").addClass("img-responsive");
    </script>
@endsection
