<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_description' , 'Aionlinecourse will provide you the best resource about artificial Intelligence.
    You can learn about machine learning, data science, natural language processing etc.')">
    <meta name="google-site-verification" content="jUW49wwiLLX6T2wYn35wtYFgisGIM8Y1liK6bnXrnsE" />
    <meta name="author" content="www.aionlinecourse.com">
    <meta property="og:title" content="@yield('meta_title')" />
    <meta name="keywords" content="@yield('meta_keyword', 'ais ite')">
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="www.aionlinecourse.com">
    <meta property="og:image" content="@yield('meta_image', asset('ai-logo.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <!-- BASE CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{ asset('css/swiper.min.css')}}" rel="stylesheet">

    @yield('run_custom_css_file')
    @yield('run_custom_css')
</head>

<body>
@yield('content')

@if (env('APP_ENV') == 'production' && empty(Auth::user()))
    <script>
        //        Analytics code
    </script>
@endif

<script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
@if (env('APP_ENV') == 'production' && empty(Auth::check()))
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126290142-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-126290142-1');
</script>

<!-- Hotjar Tracking Code for www.aionlinecourse.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2314701,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
@endif
<a id="back2Top" title="Back to top" href="#"><i class="fa fa-arrow-up"></i></a>
<script>
    /*Scroll to top when arrow up clicked BEGIN*/
    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height > 100) {
            $('#back2Top').fadeIn();
        } else {
            $('#back2Top').fadeOut();
        }
    });
    $(document).ready(function() {
        $("#back2Top").click(function(event) {
            event.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });

    });
    /*Scroll to top when arrow up clicked END*/
</script>
<!-- Auto close flash message -->
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
<script src="{{ asset('js/swiper.min.js')}}"></script>
@yield('run_custom_js_file')
@yield('run_custom_jquery')
@stack('custom_jQuery')
</body>
</html>
