@extends('layouts.master')

@section('title')Artificial Intelligence Online Course @endsection

@section('content')
@include('includes.header')
    <div class="container-fluid ml-2">
        <div class="row mt-2">
            <div class="col-md-2">
               @include('home.left_sidebar')
                <div class="row left-side-trending-tag mt-2">
                    <p>Trending Tags</p>
                    <div class="col-md-12">
                        <ul>
                            <li>
                                <a href="{{ route('home.search',['keyword' => 'Machine Learning'])}}">Machine Learning</a>
                            </li>
                            <li>
                                <a href="{{ route('home.search',['keyword' => 'Artificial Intelligence']) }}">Artificial Intelligence</a>
                            </li>
                            <li>
                                <a href="{{ route('home.search',['keyword' => 'Recognition']) }}">Recognition</a>
                            </li>
                            <li>
                                <a href="{{ route('home.search',['keyword' => 'Data Science']) }}">Data Science</a>
                            </li>
                            <li>
                                <a href="{{ route('home.search',['keyword' => 'automation']) }}">Automation</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row left-side-info mt-2">
                    <div class="col-md-12">
                        <ul>
                            <li>
                                <a href="{{ route('about') }}">About</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">ContactUs</a>
                            </li>
                            <li>
                                <a href="{{ route('terms') }}">Copyright</a>
                            </li>
                            <li>
                                <a href="{{ route('privacy') }}">Privacy policy Terms</a>
                            </li>
                            <li>
                                <a href="#">
                                    <b>&copy; <script type="text/JavaScript">
                                        document.write(new Date().getFullYear());
                                        </script> aionlinecourse.com  All rights reserved.</b>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-7 blog-lg-section">
                        <a href="{{ route('blog.show', $single_blog_post->slug) }}" title="{{ $single_blog_post->title }}">
                        <div class="blog-lg-container">
                            <img src="{{ $single_blog_post->tutorial_cover }}">
                            <div class="blog-lg-content">
                                <h4>{{ $single_blog_post->title }}</h4>
                                <p>By {{ $single_blog_post->user ? $single_blog_post->user->name : '' }} on {{ $single_blog_post->created_at->toFormattedDateString() }}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-5">
                        @foreach($blogs as $blog)
                            <a href="{{route('blog.show', $blog->slug)}}" class="blog-sm-section" title="{{ $blog->title }}">
                                <div class="row blog-sm-container">
                                    <div class="col-5 col-md-5">
                                        <img src="{{ $blog->tutorial_cover }}">
                                    </div>
                                    <div class="col-7 col-md-7 blog-sm-content">{{ str_limit(strip_tags($blog->title), $limit = 90, $end = '...') }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr-0 feature-soft-section">
                        <div class="feature-soft">
                            <div class="row feature-soft-title">
                                <div class="col-md-12">
                                    <p>Featured Software</p>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <!-- Swiper -->
                                  <div class="swiper-container">
                                      <div class="swiper-wrapper feature-box-div">
                                          @foreach($feature_softwares as $software)
                                              <div class="swiper-slide feature-soft-home">
                                                  <a href="{{route('ai_software.view', $software->slug)}}"><img src="{{$software->logo !== null ? $software->logo_url : asset('no-image-found.jpg')}}" alt="{{ $software->name }}"></a>
                                              </div>
                                          @endforeach
                                      </div>
                                      <div class="swiper-button-next"></div>
                                      <div class="swiper-button-prev"></div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr-0 feature-soft-section">
                        <div class="feature-soft">
                            <div class="row feature-soft-title">
                                <div class="col-md-12">
                                    <p>Machine Learning</p>
                                </div>
                            </div>
                            <div class="row tutorial-home-section">
                                @foreach($tutorials as $key => $tutorial)
                                <div class="col-md-4 col-6 tutorial-item">
                                    <a href="{{ $tutorial->tutorial_url }}">
                                       <div class="card home-tutorial-card">
                                           <h5 class="card-title">{{ $key + 1 }}. {{ $tutorial->title }}</h5>
                                           <div class="tutorial-img-home">
                                               <img class="card-img-top card-cover-img" src="{{ $tutorial->tutorial_cover }}">
                                           </div>
                                           <div class="card-body" style="padding: .1rem">
                                               <p class="card-text">
                                                   {{ str_limit(strip_tags($tutorial->description), $limit = 130, $end = '...') }}
                                               </p>
                                           </div>
                                       </div>
                                    </a>
                               </div>
                                @endforeach
                                    <div class="more-tutorial justify-content-center text-center">
                                        <a href="{{ route('tutorial.index') }}" class="btn btn-outline-success btn-sm">More Tutorial <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ml-3 quiz-home-container">
                        <div class="row">
                            <div class="col-md-6 quiz-home-section">
                                <h1>Test Your Knowledge with AI QUIZ</h1>
                                <p>Choose a category in which to play the AI Online Quiz from Artificial Intelligence,  Machine Learning, Natural Language Processing, Data Science and more.</p>
                                <div class="form-button text-center">
                                    <a href="{{ route('ai-quiz-questions.index') }}" class="ibtn">Get started</a>
                                </div>
                            </div>
                            <div class="col-md-6 quiz-right-side-image">
                                <img src="{{ asset('/images/icons/quiz.svg') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('includes.footer')
@stop
@section('run_custom_js_file')
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: getItem(),
            direction: 'horizontal',
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
        });

        function getItem() {
            var windowWidth = window.innerWidth;
            var item = window.innerWidth <= 760 ? '4' : '5';
            return item;
        }
    </script>
@stop
