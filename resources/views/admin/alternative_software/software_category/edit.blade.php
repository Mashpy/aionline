@extends('layouts.master')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="alert text-center category-heading"><b>Alternative Software Category</b></div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @include('includes.message')
                <div class="alert alert-success">
                    <h5>Update Category</h5>
                    <form action="{{ route('alternative_software_category.update', $category->id) }}" method="post">
                        @csrf @method('put')
                        <table id="order-listing" class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <td>
                                    <input class="form-control" type="text" name="name" value="{{$category->name}}">
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