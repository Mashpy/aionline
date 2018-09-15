@extends('layouts.master')

@section('title')
    {{ $tutorial->title . ' | ' . $tutorial->category->name . ' | ' }}
@endsection

@section('content')
    @include('includes.header')

    <div class="container top15">
        <div class="row">
            <div class="col-md-3">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Tutorials</th>
                    </tr>
                    </thead>
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

            <div class="col-md-9">
                <h3>{{ $tutorial->title }}</h3>
                <p class="category">{{$tutorial->category->name}}</p>
                <p class="meta">{{ $tutorial->created_at->format('m-d-Y') }}</p>
                <p>{!! $tutorial->description !!}</p>
            </div>
        </div>
    </div>
@endsection
