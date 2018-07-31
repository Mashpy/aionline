@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    Here you will get tutorial. <a href="{{ route('admin_tutorial.create') }}">Create Tutorials</a>
                </div>
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title </th>
                                <th>Category_id</th>
                                <th>description</th>
                            </tr>
                        </thead>
                    <tbody>

                    @foreach($tutorials as $tutorial)
                        <tr>
                            <td>{{$tutorial->title}}</td>
                            <td>{{$tutorial->category_id}}</td>
                            <td>{{$tutorial->description}}</td>
                            <td>
                                <a href="{{ route('admin_tutorial.show', $tutorial) }}" class="btn btn-outline-primary">Views</a>
                                <a href="{{ route('admin_tutorial.edit', $tutorial) }}" class="btn btn-outline-warning">Edit</a>
                                <a href="{{ route('admin_tutorial.destroy', $tutorial) }}" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection