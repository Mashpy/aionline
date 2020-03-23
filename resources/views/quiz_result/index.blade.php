@extends('layouts.master')
@section('content')
@include('includes.header')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="news-grid">

                    <div class="col-md-6 news-text two">
                        <table id="order-listing" class="table table-striped">
                        <thead>
                        <tr>
                            <th>SI</th>
                            <th>Date </th>
                            <th>User </th>
                            <th>Quiz_topic</th>
                            <th>Marks</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($quiz_results->count())
                            @foreach($quiz_results as $key => $quiz_result)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{$quiz_result->created_at}}</td>
                                    <td>{{$quiz_result->user->name}}</td>
                                    <td>{{$quiz_result->quiz_topic->topic_name}}</td>
                                    <td>{{$quiz_result->marks}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        </table>

                    {{--<div>--}}
                    {{--Tutorial Title--}}
                    {{--Category-id--}}
                    {{--Description--}}
                    {{--</div>--}}
                    {{--<div>--}}
                    {{--{{ $tutorial->title }}--}}
                    {{--{{ $tutorial->category_id }}--}}
                    {{--{{ $tutorial->description }}--}}
                    {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('includes.footer')
@endsection