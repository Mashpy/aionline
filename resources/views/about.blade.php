@extends('layouts.master')

@section('title') About | Ai Online Course @endsection

@section('content')
    @include('includes.header')
    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset('images/ai-banner.png') }}" style="width:100%;">
            <div class="col-md-6 top-left">
                <h1>About Us</h1>
                We are leading online platforms, we provide online training and early access to upcoming AI software’s our easy learning and skill development tools will help to share, coach, and mentor young educated youth with industry-relevant skills. aionlinecourse.com facilitates fresher’s through an easily understandable way to learn their aspiring courses and to enter the corporate world and experienced eagerness to gain and improve their knowledge and attain industry-relevant skills to achieve their life goals and career aspirations. Our exclusive testing options help you evaluate your AI knowledge. We want to ensure unmatched value in each phase of Human Capital. We are passionate to provide career guidance, coaching, and mentoring to young and educated youth to improve their employability with industry-relevant skills and latest technologies by providing the best online training for best AI technologies.
            </div>
        </div>
    </div>
    @include('includes.footer')
@stop