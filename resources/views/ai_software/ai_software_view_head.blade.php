<div class="container" data-spy="scroll" data-target=".navbar_secound" data-offset="50" style="position: relative; ">
    <div class="row mt-1">
        <div class="col-md-12 mb-2 software-view-panel">
            @if (Session::has('error-like'))
                <div class="text-center like-alert-error">
                    <div id="flash-notice">{{ Session::get('error-like') }}</div>
                </div>
            @endif
            @if(Session::has('success-like'))
                <div class="text-center like-alert-success">
                    <div id="flash-notice">{{ Session::get('success-like') }}</div>
                </div>
            @endif
            <section>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{$ai_software->logo_url}}" class="software-view-logo" alt="...">
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="software-view-title">{{$ai_software->name}}</h2>
                                    <div class="write-review">
                                        <span class="text-secondary">By Bons Ai Ltd</span>
                                        <a href="{{route('ai_software.reviews', $ai_software->slug)}}">Write a Review!</a>
                                    </div>
                                    <div class="d-inline buttons-links">
                                        <a class="btn btn-danger like" onclick="event.preventDefault(); document.getElementById('like-form').submit();"><i class="fa fa-thumbs-up"></i> Like</a>
                                        @php $official_link = "http://".$ai_software->official_link ; @endphp
                                        <a class="btn btn-primary website" href="{{$official_link}}" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                    </div>
                                    <form id="like-form" action="{{route('ai_software.software.like', $ai_software->id)}}" method="post">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 navbar-software-view mt-4">
                            <div id="navbar">
                                <a href="#about" class="{{Route::is('ai_software.view') ? 'active' : ''}}">About</a>
                                <a href="#features">Features</a>
                                <a href="#pricing">Pricing</a>
                                <a href="{{ Route::is('ai_software.reviews') ? '#reviews' : route('ai_software.reviews', $ai_software->slug)}}" class="{{Route::is('ai_software.reviews') ? 'active' : ''}}">Reviews</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 mb-2 software-view-panel">
            <section  id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div>
                                <h3 class="text-secondary mt-4">Product Details</h3>
                                <p>{!! $ai_software->description !!}</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="container mt-5">
                                <div class="carousel-container position-relative row">
                                    <div id="myCarousel" class="carousel carousel-view slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-slide-number="0">
                                                <img src="{{asset('uploads/slider/slide-1.png')}}" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/Pn6iimgM-wo/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                            </div>
                                            <div class="carousel-item" data-slide-number="1">
                                                <img src="{{asset('uploads/slider/slide-2.png')}}" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/tXqVe7oO-go/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                            </div>
                                            <div class="carousel-item" data-slide-number="2">
                                                <img src="{{asset('uploads/slider/slide-1.png')}}" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/QfEfkWk1Uhk/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                            </div>
                                        </div>
                                        <div class="carousel-thumb">
                                            <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="row mx-0">
                                                            <div id="carousel-selector-0" class="thumb col-4 col-sm-2 px-1 py-2 selected" data-target="#myCarousel" data-slide-to="0">
                                                                <img src="{{asset('uploads/slider/slide-1.png')}}" class="img-fluid" alt="...">
                                                            </div>
                                                            <div id="carousel-selector-1" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="1">
                                                                <img src="{{asset('uploads/slider/slide-2.png')}}" class="img-fluid" alt="...">
                                                            </div>
                                                            <div id="carousel-selector-2" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="2">
                                                                <img src="{{asset('uploads/slider/slide-1.png')}}" class="img-fluid" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- /container -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 mb-2 software-view-panel">
            <section id="features">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 mt-4">
                            <div>
                                <h3 class="text-secondary">Features of {{$ai_software->name}}</h3>
                                <p>{!! $ai_software->feature !!}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="container mt-5">
                               ad
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 mb-2 software-view-panel">
            <section id="pricing">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div>
                                <h3 class="text-secondary">Pricing</h3>
                                <p class="ml-3">{!! $ai_software->pricing ? $ai_software->pricing : 'Not provided by vendor
' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@section('run_custom_js_file')
    <script>
        $(document).ready(function(){
            $('#navbar a').click(function(){
                $('#navbar a').removeClass("active");
                $(this).addClass("active");
            });
        });
        // when the carousel slides, auto update
        $('#myCarousel').on('slide.bs.carousel', function(e) {
            var id = parseInt( $(e.relatedTarget).attr('data-slide-number') );
            $('[id^=carousel-selector-]').removeClass('selected');
            $('[id=carousel-selector-'+id+']').addClass('selected');
        });

        $('#myCarousel .carousel-item img').on('click', function(e) {
            var src = $(e.target).attr('data-remote');
            if (src) $(this).ekkoLightbox();
        });
    </script>
@stop
