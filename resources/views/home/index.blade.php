@extends('layouts.master')

@section('title')Artificial Intelligence Online Course @endsection

@section('content')
@include('includes.header')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12>">
                        <div class="left-side-home-menu">
                            <ul>
                                <li class="active">
                                    <a href="#">
                                        <img src="{{ asset('images/icons/home.png') }}">
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('images/icons/browse_tutorial.png') }}">
                                        <span>Browse Tutorials</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('images/icons/ai_software.png') }}">
                                        <span>Ai Softwares</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('images/icons/quiz.png') }}">
                                        <span>Quiz</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('images/icons/blog.png') }}">
                                        <span>Blog</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('images/icons/help.png') }}">
                                        <span>Help</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('images/icons/feedback.png') }}">
                                        <span>Send Feedback</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row left-side-trending-tag mt-2">
                    <p>Trending Tags</p>
                    <div class="col-md-12">
                        <ul>
                            <li>
                                <a href="#">Deep Learning</a>
                            </li>
                            <li>
                                <a href="#">Natural Lang..</a>
                            </li>
                            <li>
                                <a href="#">Clusterning</a>
                            </li>
                            <li>
                                <a href="#">Recognition</a>
                            </li>
                            <li>
                                <a href="#">Data Pre Processing</a>
                            </li>
                            <li>
                                <a href="#">Classification</a>
                            </li>
                        </ul>
                        <a class="float-right see-more-trending" href="">more...</a>
                    </div>
                </div>
                <div class="row left-side-info mt-2">
                    <div class="col-md-12">
                        <ul>
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#">Press</a>
                            </li>
                            <li>
                                <a href="#">ContactUs</a>
                            </li>
                            <li>
                                <a href="#">Developers</a>
                            </li>
                            <li>
                                <a href="#">Copyright</a>
                            </li>
                            <li>
                                <a href="#">Privacy policy Terms</a>
                            </li>
                            <li>
                                <a href="#">
                                    <b>&copy; <script type="text/JavaScript">
                                        document.write(new Date().getFullYear());
                                        </script> NamespaceIT  All rights reserved.</b>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-8 blog-lg-section">
                        <div class="blog-lg-container">
                            <img src="/images/icons/test.jpg">
                            <div class="blog-lg-content">
                                <h4>Lorem ipsum dolor sit amet, an his etiam torquatos.</h4>
                                <p>By mohaimen on May 2020 in Machine Learning</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row blog-sm-container">
                            <div class="col-5 col-md-5">
                                <img src="/images/icons/test.jpg">
                            </div>
                            <div class="col-7 col-md-7 blog-sm-content">Lorem ipsum dolor sit amet, an his etiam torquatos.</div>
                        </div>
                        <div class="row blog-sm-container">
                            <div class="col-5 col-md-5">
                                <img src="/images/icons/test.jpg">
                            </div>
                            <div class="col-7 col-md-7 blog-sm-content">Lorem ipsum dolor sit amet, an his etiam torquatos.</div>
                        </div>
                        <div class="row blog-sm-container">
                            <div class="col-5 col-md-5">
                                <img src="/images/icons/test.jpg">
                            </div>
                            <div class="col-7 col-md-7 blog-sm-content">Lorem ipsum dolor sit amet, an his etiam torquatos.</div>
                        </div>
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
                                          <div class="swiper-slide feature-soft-home" style="width: 100px">
                                              <a href="https://www.aionlinecourse.com/ai-softwares/vox-neural"><img src="https://www.aionlinecourse.com/uploads/ai_software/image/2020/02/vox-neural.jpg" alt="..."></a>
                                          </div>
                                          <div class="swiper-slide feature-soft-home">
                                              <a href="https://www.aionlinecourse.com/ai-softwares/rapidminer"><img src="https://www.aionlinecourse.com/uploads/ai_software/image/2020/02/rapidminer.jpg" alt="..."></a>
                                          </div>
                                          <div class="swiper-slide feature-soft-home">
                                              <a href="https://www.aionlinecourse.com/ai-softwares/routeenet"><img src="https://www.aionlinecourse.com/uploads/ai_software/image/2020/02/routeenet.jpg" alt="..."></a>
                                          </div>
                                          <div class="swiper-slide feature-soft-home">
                                              <a href="https://www.aionlinecourse.com/ai-softwares/ebbyco"><img src="https://www.aionlinecourse.com/uploads/ai_software/image/2020/02/ebbyco.jpg" alt="..."></a>
                                          </div>
                                          <div class="swiper-slide feature-soft-home">
                                              <a class="ai-software-card-head" href="https://www.aionlinecourse.com/ai-softwares/sestek"><img src="https://www.aionlinecourse.com/uploads/ai_software/image/2020/02/sestek.jpg" alt="..."></a>
                                          </div>
                                          <div class="swiper-slide feature-soft-home">
                                              <a href="https://www.aionlinecourse.com/ai-softwares/rapidminer"><img src="https://www.aionlinecourse.com/uploads/ai_software/image/2020/02/rapidminer.jpg" alt="..."></a>
                                          </div>
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
                               <div class="col-md-4 col-6 tutorial-item">
                                   <div class="card home-tutorial-card">
                                       <h5 class="card-title">1. Introduction of Machine Learning</h5>
                                       <img class="card-img-top" src="/images/icons/test.jpg">
                                       <div class="card-body" style="padding: .1rem">
                                           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. build on the card title and make up the bulk of the card's content.</p>
                                       </div>
                                   </div>
                               </div>
                                <div class="col-md-4 col-6 tutorial-item">
                                    <div class="card home-tutorial-card">
                                        <h5 class="card-title">2. Data Pre Processing Tutorial</h5>
                                        <img class="card-img-top" src="/images/icons/test.jpg">
                                        <div class="card-body" style="padding: .1rem">
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 tutorial-item">
                                    <div class="card home-tutorial-card">
                                        <h5 class="card-title">2. Data Pre Processing Tutorial</h5>
                                        <img class="card-img-top" src="/images/icons/test.jpg">
                                        <div class="card-body" style="padding: .1rem">
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 tutorial-item">
                                    <div class="card home-tutorial-card">
                                        <h5 class="card-title">2. Data Pre Processing Tutorial</h5>
                                        <img class="card-img-top" src="/images/icons/test.jpg">
                                        <div class="card-body" style="padding: .1rem">
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 tutorial-item">
                                    <div class="card home-tutorial-card">
                                        <h5 class="card-title">2. Data Pre Processing Tutorial</h5>
                                        <img class="card-img-top" src="/images/icons/test.jpg">
                                        <div class="card-body" style="padding: .1rem">
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 tutorial-item">
                                    <div class="card home-tutorial-card">
                                        <h5 class="card-title">2. Data Pre Processing Tutorial</h5>
                                        <img class="card-img-top" src="/images/icons/test.jpg">
                                        <div class="card-body" style="padding: .1rem">
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
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
                                    <button id="submit" type="submit" class="ibtn">Get started</button>
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
@endsection
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
