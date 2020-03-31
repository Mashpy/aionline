@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success text-center category-heading"><b>Ai Tutorial List</b></div>
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title </th>
                                <th>Category_name</th>
                                <th>User</th>
                            </tr>
                        </thead>
                    <tbody>

                    @foreach($tutorials as $key => $tutorial)
                        {{ csrf_field() }}
                        <tr>
                            <td>{{ $tutorial->id }}</td>
                            <td>{{$tutorial->title}}</td>
                            <td>{{$tutorial->category->name}}</td>
                            <td>{{ $tutorial->user ? $tutorial->user->name : ''}}</td>
                            <td width="5%">
                                <a href="{{ $tutorial->tutorial_url }}" target="_blank" class="btn-sm btn-primary">Views</a>
                                <a href="{{ route('admin_tutorial.edit', $tutorial->slug) }}" target="_blank" class="btn-sm btn-warning">Edit</a>
                              <form method="POST" action="{{ route('admin_tutorial.destroy', $tutorial->slug) }}">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="submit" value="Delete" class="btn-sm btn-danger">
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