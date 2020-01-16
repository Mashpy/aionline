@extends('layouts.master')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                 <div class="alert text-center" style="background-color: #13C191 "><b>Alternative Software Category</b></div>
            </div>
            <div class="col-md-12">
                 @include('includes.message')
            </div>
            <div class="col-md-5">
                 <div class="alert alert-success">
                    <h5>Create new</h5>
                    <form action="{{ route('alternative_software_category.store') }}" method="post">
                        @csrf
                        <table id="order-listing" class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <td>
                                    <input class="form-control" type="text" name="name">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-success text-white float-right" type="submit"></a>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="col-md-7">
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                    <td>
                                       <a class="btn btn-sm btn-success text-white">Edit</a>
                                       <a class="btn btn-sm btn-danger text-white">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $categories->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection