@extends('layouts.master')

@section('title') List of Ai Softwares
@endsection

@section('content')
    @include('includes.header')
    @include('ai_software.search_panel')<br>
    <section class="recently-added-software">
        <div class="container">
            @include('includes.message')
            <div class="row">
                <div class="col-md-9 col-sm-12 col-lg-9">
                    <div class="box">
                        <div class="box-title">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Request a new software</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <form action="{{ route('ai_software.request_new_software_store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <table id="order-listing" class="table table-striped">
                                    <tr>
                                        <th>Software Name</th>
                                        <td>
                                            <input class="form-control" type="text" name="name" placeholder="Enter software name" value="{{ old('name') }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>
                                            <textarea class="form-control summernote" rows="6" name="description" placeholder="Enter description">{{ old('description') }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Features</th>
                                        <td>
                                            <textarea class="form-control summernote" rows="6" name="feature" placeholder="Enter Features">{{ old('feature') }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Pricing</th>
                                        <td>
                                            <textarea class="form-control summernote" rows="6" name="pricing" placeholder="Enter Pricing">{{ old('pricing') }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Official Link</th>
                                        <td>
                                            <input class="form-control" type="text" name="official_link" placeholder="Enter official link" value="{{ old('official_link') }}">
                                        </td>
                                    </tr><tr>
                                        <th>Logo</th>
                                        <td>
                                            <input class="form-control" type="file" name="logo">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input class="btn btn-success text-white float-right" type="submit">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    @include('includes/google_ad')
                </div>
            </div>
        </div>
    </section>
    @include('includes.footer')
@endsection
@section('run_custom_js_file')
    <link href="{{asset('summernote/summernote.css')}}" rel="stylesheet">
@stop
@section('run_custom_jquery')
    <script src="{{asset('summernote/summernote.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['fontsize', ['fontsize']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['hr']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '24', '36', '48' , '64'],
                height: 250,
                dialogsInBody: true,
                callbacks:{
                    onInit:function(){
                        $('body > .note-popover').hide();
                    }
                },
            });
        });

    </script>
@stop


