@extends('layouts.master')

@section('title') Contact US | Ai Online Course @endsection

@section('content')
    @include('includes.header')
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-6">
                    <h3>CONTACT INFO</h3>
                    <small>Welcome to our website. We are glade to have around</small>
                    <div class="email-address">
                        <i class="fa fa-envelope"></i><span class="title-contact">EMAIL</span>
                        <p>aionlinecourse@gmail.com</p>
                    </div>
                    <div class="email-address">
                        <i class="fa fa-location-arrow"></i><span class="title-contact">ADDRESS</span>
                        <p>NamespaceIT</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>SEND MESSAGE</h3>
                    <small>Welcome to our website. We are glade to have around</small>
                    <form class="mt-2">
                        <div class="form-group row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Name*">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Email*">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputAddress" placeholder="Phone*">
                         </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputAddress" placeholder="Subject*">
                         </div>
                        <div class="form-group">
                           <textarea class="form-control" placeholder="Message*" rows="6"></textarea>
                         </div>
                        <div class="form-group">
                            <button class="btn btn-secondary contact-form-btn">SUBMIT</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
@stop