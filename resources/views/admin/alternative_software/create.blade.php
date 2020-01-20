@extends('layouts.master')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                Here you will view all software. <a href="{{route('ai_software.index')}}">view software</a>
                <div class="alert text-center category-heading"><b>Alternative Software</b></div>
            </div>
            <div class="col-md-12">
                @include('includes.message')
            </div>
            <div class="col-md-12">
                <div class="alert alert-success">
                    <h5>Add new Software</h5>
                    <form action="{{ route('ai_software.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table id="order-listing" class="table table-striped">
                            <tr>
                                <th>Software Name</th>
                                <td>
                                    <input class="form-control" type="text" name="name">
                                </td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>
                                    <select class="form-control" name="software_category_id">
                                        <option>Select Category</option>
                                        @foreach($software_categories as $software_category)
                                        <option value="{{$software_category->id}}">{{$software_category->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Sub Category</th>
                                <td>
                                    <select class="form-control" name="software_category_id">
                                        <option>Select Sub Category</option>
                                        @foreach($software_categories as $software_category)
                                            <option value="{{$software_category->id}}">{{$software_category->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>
                                    <textarea class="form-control" rows="6" name="description"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Official Link</th>
                                <td>
                                    <input class="form-control" type="text" name="official_link">
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