@extends('layouts.master')
@section('title') Alternative Software of {{$ai_software->name}} @endsection
@section('meta_description'){!! $ai_software->meta_description ? strip_tags($ai_software->meta_description) : str_limit(strip_tags($ai_software->description), 250, $end ='...')!!}@endsection
@section('meta_title'){!! $ai_software->name !!}@endsection
@section('meta_image'){!! $ai_software->logo_url !!}@endsection

@section('content')
@include('includes.header')
<div class="container">
    <div class="row mt-1">
        <div class="col-md-12 mb-2 software-view-panel software-view-fix-hight">
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
                                        <span class="text-secondary">By {{$ai_software->name}}</span>
                                        <a href="#reviews" id="write_review"><i class="fa fa-edit"></i> Write a Review!</a>
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
                        <div class="col-md-12 mt-4">
                            <div id="navbar">
                                <div class="row">
                                    <div class="col-md-12" id="top-menu">
                                       <span class="nav-after-scrolling display-none float-left">
                                           <img src="{{$ai_software->logo_url}}" class="software-view-logo-after-scroll" alt="...">
                                       </span>
                                        <a href="#about" class="{{Route::is('ai_software.view') ? 'active' : ''}}">About</a>
                                        <a href="#features" class="">Features</a>
                                        <a href="#pricing" class="">Pricing</a>
                                        <a href="#reviews" class="">Reviews</a>
                                    </div>
                                </div>
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
                                            @foreach($ai_software->softwareScreenshot as $key => $screenshot)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : ''}}" data-slide-number="{{$loop->index}}">
                                                    <img src="{{$screenshot->screenshot_url}}" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="carousel-thumb">
                                            <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="row mx-0">
                                                            @foreach($ai_software->softwareScreenshot as $key => $screenshot)
                                                                <div id="carousel-selector-{{$loop->index}}" class="thumb col-4 col-sm-2 px-1 py-2 {{ $key == 0 ? 'selected' : ''}}" data-target="#myCarousel" data-slide-to="{{$loop->index}}">
                                                                    <img src="{{$screenshot->screenshot_url}}" class="img-fluid img-thumb-slider" alt="...">
                                                                </div>
                                                            @endforeach
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
        <div class="row">
            <div class="col-md-9">
                @if(!empty($ai_software->feature))
                    <div class="col-md-12 mb-2 software-view-panel">
                        <section id="features">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <div>
                                            <h3 class="text-secondary">Features of {{$ai_software->name}}</h3>
                                            <p>{!! $ai_software->feature !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                @endif

                @if(!empty($ai_software->pricing))
                    <div class="col-md-12 mb-2 software-view-panel">
                        <section id="pricing">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <div>
                                            <h3 class="text-secondary">Pricing</h3>
                                            <p class="ml-3">{!! $ai_software->pricing !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                @endif
                @include('ai_software.ai_alternative_software')
            </div>
            @if(!empty($ai_software->feature) || $ai_software->alternate_software->count() > 0)
                <div class="col-md-3">
                    <div class="container">
                        @include('includes/google_ad')
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@include('ai_software.review')
@include('includes.footer')

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
    <script>
        // Cache selectors
        var lastId,
            topMenu = $("#top-menu"),
            topMenuHeight = topMenu.outerHeight()+50,
            // All list items
            menuItems = topMenu.find("a"),
            // Anchors corresponding to menu items
            scrollItems = menuItems.map(function(){
                var item = $($(this).attr("href"));
                if (item.length) { return item; }
            });
        // Bind click handler to menu items
        // so we can get a fancy scroll animation
        menuItems.click(function(e){
            var href = $(this).attr("href"),
                offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
            $('html, body').stop().animate({
                scrollTop: offsetTop
            }, 300);
            e.preventDefault();
        });

        // Bind to scroll
        $(window).scroll(function(){
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                document.getElementById("navbar").style.top = "0";
                $("#navbar").addClass('navbar-after-scroll');
                $(".nav-after-scrolling").removeClass('display-none');
            } else {
                $("#navbar").removeClass('navbar-after-scroll');
                $(".nav-after-scrolling").addClass('display-none');
            }
            // Get container scroll position
            var fromTop = $(this).scrollTop()+topMenuHeight;

            // Get id of current scroll item
            var cur = scrollItems.map(function(){
                if ($(this).offset().top < fromTop)
                    return this;
            });
            // Get the id of the current element
            cur = cur[cur.length-1];
            var id = cur && cur.length ? cur[0].id : "";

            if (lastId !== id) {
                lastId = id;
                // Set/remove active class
                menuItems.removeClass("active");
                menuItems.filter("[href='#"+id+"']").addClass("active");
            }
        });
    </script>
@stop

@endsection


