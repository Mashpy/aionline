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
                <div class="alert alert-success">
                    <h5>Add new Software</h5>
                    <form action="{{ route('admin_ai_software.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table id="order-listing" class="table table-striped">
                            <tr>
                                <th>Software Name</th>
                                <td>
                                    <input class="form-control" type="text" name="name" placeholder="Enter software name">
                                </td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>
                                    <div class="category-box">
                                        <select class="form-control category_select" name="parent_id" data-value="1">
                                            <option value="" data-browse-node-id="0">Choose parent category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" data-browse-node-id="{{ $category->id }}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>
                                    <textarea class="form-control" rows="6" name="description" placeholder="Enter description"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Official Link</th>
                                <td>
                                    <input class="form-control" type="text" name="official_link" placeholder="Enter official link">
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
    </div>
@endsection
@section('run_custom_js_file')
    @include('admin.ai_software.software_category.sub_category_js')
@endsection