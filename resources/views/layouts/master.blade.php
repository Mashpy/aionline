<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_description' , 'ai site description')">
    <meta name="author" content="aisite">
    <meta name="keywords" content="@yield('meta_keyword', 'ais ite');">
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="www.aisite.com">
    <meta property="og:image" content="">
    <meta property="og:url" content="{{ url()->current() }}">
    <title>@yield('title') AI Online Course</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('img/faviconN.ico')}}" type="image/x-icon">

    <!-- BASE CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet">

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
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>

@yield('run_custom_js_file')
@yield('run_custom_jquery')

</body>
</html>
