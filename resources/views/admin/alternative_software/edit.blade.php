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
                    <h5>Edit Software</h5>
                    <form action="{{route('ai_software.update', $alternative_software->id)}}" method="post" enctype="multipart/form-data">
                        @csrf @method('put')
                        <table id="order-listing" class="table table-striped">
                            <tr>
                                <th>Software Name</th>
                                <td>
                                    <input class="form-control" type="text" name="name" value="{{$alternative_software->name}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>
                                    <select class="form-control" name="software_category_id">
                                        <option>Select Category</option>
                                        @foreach($software_categories as $software_category)
                                            <option value="{{$software_category->id}}" {{ $software_category->id == $alternative_software->software_category_id ? 'Selected' : ' ' }}>{{$software_category->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>
                                    <textarea class="form-control" rows="6" name="description">{{$alternative_software->description}}"</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Official Link</th>
                                <td>
                                    <input class="form-control" type="text" name="official_link" value="{{$alternative_software->official_link}}">
                                </td>
                            </tr><tr>
                                <th>Logo</th>
                                <td>
                                    <input type="hidden" value="{{$alternative_software->logo}}" name="old_logo">
                                    <img class="alternative-software-logo" src="{{$alternative_software->logo_url}}" />
                                    <input class="form-control" type="file" name="logo">
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