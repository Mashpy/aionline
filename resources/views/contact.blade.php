@extends('layouts.master')

@section('title') Contact US | Ai Online Course @endsection

@section('content')
    @include('includes.header')
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3>CONTACT WITH US</h3>
                    <small>Welcome to our website. We are glade to have around</small>
                    <div id="res-message"></div>
                    <form class="mt-2">
                        @csrf
                        <div class="form-group row">
                            <div class="col">
                                <input id="name" type="text" name="name" class="form-control" placeholder="Name*" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input id="email" type="text" name="email" class="form-control" id="email" placeholder="Email*" required>
                         </div>
                        <div class="form-group">
                           <textarea id="message" name="message" class="form-control" placeholder="Message*" rows="6" required></textarea>
                         </div>
                        <div class="form-group">
                            <button class="btn btn-secondary contact-form-btn" id="contact-form">
                                SUBMIT
                            </button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
@stop
@push('custom_jQuery')
    <script>
      $("#contact-form").click(function(e) {
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        if(name === '' || email === '' || message == '') {
          alert("All field is required!");
          return false;
        }
        $("#contact-form").attr('disabled', true);
        $("#contact-form").html(`<i class="fa fa-spinner fa-spin"></i> Sending`);
        e.preventDefault();
        var data = {
          service_id: 'service_z9tcmpx',
          template_id: 'template_leynloq',
          user_id: 'user_b2p3MRghnloGpeifc0hlV',
          template_params: {
            name: name,
            email: email,
            message: message
          }
        };

        $.ajax('https://api.emailjs.com/api/v1.0/email/send', {
          type: 'POST',
          data: JSON.stringify(data),
          contentType: 'application/json'
        }).done(function() {
          $("#contact-form").html('Submit');
          $("#contact-form").attr('disabled', false);
          $("#name").val('');
          $("#email").val('');
          $("#message").val('');
          $("#res-message").html(`<div class="alert alert-success" role="alert">
                            Email Send Successfully!
                        </div>`)
        }).fail(function(error) {
          $("#res-message").html(`<div class="alert alert-success" role="alert">
                            Something Went Wrong!
                        </div>`)
        });
      });
    </script>
@endpush
