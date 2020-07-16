@extends('layouts.master')

@section('title') Contact US | Ai Online Course @endsection

@section('content')
    @include('includes.header')
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <h3>CONTACT WITH US</h3>
                    <small>Welcome to our website. We are glade to have around</small>
                    <form class="mt-2" action="{{ route('contactme.submit') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col">
                                <input type="text" name="name" class="form-control" placeholder="Name*" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email*" required>
                         </div>
                        <div class="form-group">
                           <textarea name="message" class="form-control" placeholder="Message*" rows="6" required></textarea>
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