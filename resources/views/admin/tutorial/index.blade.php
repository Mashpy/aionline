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
                                <th>Category_name</th>
                                <th>User</th>
                            </tr>
                        </thead>
                    <tbody>

                    @foreach($tutorials as $tutorial)
                        {{ csrf_field() }}
                        <tr>
                            <td>{{$tutorial->title}}</td>
                            <td>{{$tutorial->category->name}}</td>
                            <td>{{$tutorial->user->name}}</td>
                            <td>
                                <a href="{{ route('tutorial.show', $tutorial->slug) }}" class="btn btn-outline-primary">Views</a>
                                <a href="{{ route('admin_tutorial.edit', $tutorial->slug) }}" class="btn btn-outline-warning">Edit</a>
                              <form method="POST" action="{{ route('admin_tutorial.destroy', $tutorial->slug) }}">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>

                <div>
                    {!! $tutorials->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection