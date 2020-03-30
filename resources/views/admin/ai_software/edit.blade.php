@extends('layouts.master')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                Here you will view all software. <a href="{{route('admin_ai_software.index')}}">view software</a>
                <div class="alert text-center category-heading"><b>Alternative Software</b></div>
            </div>
            <div class="col-md-12">
                @include('includes.message')
            </div>
            <div class="col-md-12">
                <div  class="alert alert-success">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading p-2 mb-2" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>Add Slider Screenshot(Click here to add)</span><span class="float-right"><i class="fa fa-arrow-down"></i> </span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse mb-4" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body p-2">
                                    <div class="row">
                                        <div class="col-md-12 d-inline">
                                            @foreach($ai_software_screenshots as $screenshot)
                                                <img width="150" src="{{$screenshot->screenshot_url}}">
                                            @endforeach
                                        </div>
                                    </div>
                                    <form class="form-horizontal" action="{{route('admin.ai_software.screenshot-store', $ai_software->id)}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="homepage">Home Page url:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="homepage" placeholder="Enter software homepage url" name="home_page_url">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pricing_page">Pricing Page url:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="pricing_page" placeholder="Enter software pricing page url" name="pricing_page_url">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pricing_page">Other Page url:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="pricing_page" placeholder="Enter software other page url" name="other_page_url">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- panel-group -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="alert alert-success">
                    <h5>Edit Software</h5>
                    <form action="{{route('admin_ai_software.update', $ai_software->id)}}" method="post" enctype="multipart/form-data">
                        @csrf @method('put')
                        <table id="order-listing" class="table table-striped">
                            <tr>
                                <th>Software Name</th>
                                <td>
                                    <input class="form-control" type="text" name="name" value="{{$ai_software->name}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>
                                    <input class="form-control" type="text" name="slug" value="{{$ai_software->slug}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>
                                    <span class="{{$ai_software->category_id == null ? 'display-none' : ''}}">Already you have selected <strong>{{$ai_software->category_id !== null ? $ai_software->softwareCategoryName->name : ''}}</strong>. If you want to change, please select again</span>
                                    <div class="category-box">
                                        <select class="form-control category_select" name="parent_id" data-value="1">
                                            <option value="" data-browse-node-id="0">Select your option</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" data-browse-node-id="{{ $category->id }}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" value="{{$ai_software->category_id}}" name="old_parent_id">
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>
                                    <textarea class="form-control summernote" rows="6" name="description">{{$ai_software->description}}</textarea>
                                    <div class="text-center">
                                        @php $prefix = "http://"; @endphp
                                        <a href="{{ $ai_software->facebook ? $prefix.$ai_software->facebook : '' }}" title="facebook" class="{{ $ai_software->facebook ? '' : 'isDisabled' }}" target="_blank"><i class="fa fa-facebook-square social-button"></i></a>
                                        <a href="{{ $ai_software->linkedin ? $prefix.$ai_software->linkedin : '' }}" title="linkedin" class="{{ $ai_software->linkedin ? '' : 'isDisabled' }}" target="_blank"><i class="fa fa-linkedin-square social-button"></i></a>
                                        <a href="{{ $ai_software->youtube ? $prefix.$ai_software->youtube : '' }}" title="youtube" class="{{ $ai_software->youtube ? '' : 'isDisabled' }}" target="_blank"><i class="fa fa-youtube-square social-button"></i></a>
                                        <a href="{{ $ai_software->twitter ? $prefix.$ai_software->twitter : '' }}" title="twitter" class="{{ $ai_software->twitter ? '' : 'isDisabled' }} " target="_blank"><i class="fa fa-twitter-square social-button"></i></a>
                                        <a href="{{ $prefix.$ai_software->official_link}}" title="official link" target="_blank"><i class="fa fa-dribbble social-button"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Features</th>
                                <td>
                                    <textarea class="form-control summernote" rows="6" name="feature">{{$ai_software->feature}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Pricing</th>
                                <td>
                                    <textarea class="form-control summernote" rows="6" name="pricing">{{$ai_software->pricing}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Official Link</th>
                                <td>
                                    <input class="form-control" type="text" name="official_link" value="{{$ai_software->official_link}}">
                                </td>
                            </tr><tr>
                                <th>Logo</th>
                                <td>
                                    <input type="hidden" value="{{$ai_software->logo}}" name="old_logo">
                                    <img class="alternative-software-logo" src="{{$ai_software->logo_url}}" />
                                    <input class="form-control" type="file" name="logo">
                                    <strong>OR</strong>
                                    <input class="form-control" type="text" name="logo_url" placeholder="Ex- https://facebook.com/image.jpg">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-success text-white float-right" type="submit" value="update">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('run_custom_css_file')
    <link href="{{asset('summernote/summernote.css')}}" rel="stylesheet">
@stop
@section('run_custom_js_file')
    @include('admin.ai_software.software_category.sub_category_js')
    <script src="{{asset('summernote/summernote.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
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
@endsection
