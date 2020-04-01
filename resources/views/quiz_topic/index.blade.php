@extends('layouts.master')
@section('content')
    @include('includes.header')
    <div class="container">
        <section>
            <div class="row p-4">
                <div class="col-md-12">
                    <div class="quiz-title">
                        <h1 class="display-4">ONLINE <span>QUIZ</span></h1>
                        <p>We've got all the quizzes you love about AI ! Play thousands of free online quizzes. There is a fun quiz about AI every topic imaginable: Artificial Intelligence, Data Mining, Data Pre processing, Image Processing and more!</p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-md-12">
                    <div class="quiz-topics">
                        <h4>Quiz Topics</h4>
                        <ul>
                            @foreach($quiz_topics as $quiz_topic)
                                <li>
                                    <a href="{{ route('quiz-question.show', $quiz_topic->slug)}}">{{$quiz_topic->topic_name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="card p-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7 p-4">
                            <div class=" container category-topic accordion-body">
                                <h5 class="card-title text-center mb-4">Quiz Category</h5>
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    @foreach($quiz_categories as $key => $quiz_categorie)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                                        {{$quiz_categorie->category->name}}
                                                        <i class="fa fa-plus float-right"></i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-{{$key}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <ul>
                                                        @foreach($quiz_categorie->quiz_topics as $topics)
                                                            <a href="{{ route('quiz-question.show', $topics->slug)}}">
                                                                <li class="bg-white">
                                                                {{$topics->topic_name}}
                                                                <i class="fa fa-arrow-right float-right"></i>
                                                                </li>
                                                            </a>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 p-4">
                            Ad
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('includes.footer')
@endsection