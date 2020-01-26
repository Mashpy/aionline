@extends('layouts.master')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                Here you will go main menu <a href="{{route('admin.index')}}">Main Menu</a>
                Here you will add new software. <a href="{{route('admin_ai_software.create')}}">Create new software</a>
                <div class="alert text-center category-heading"><b>Alternative Software</b></div>
            </div>
            <div class="col-md-12">
                @include('includes.message')
            </div>
            <div class="col-md-12">
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Logo</th>
                            <th>Software Name</th>
                            <th>Category</th>
                            <th class="w-20">Description</th>
                            <th>Official Link</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($ai_softwares as $ai_software)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td><img class="alternative-software-logo" src="{{ $ai_software->logo_url }}"/></td>
                                    <td>{{$ai_software->name}}</td>
                                    <td>{{$ai_software->softwareCategoryName ? $ai_software->softwareCategoryName->name : ''}}</td>
                                    <td>{{ str_limit($ai_software->description, $limit = 80, $end = '...') }}</td>
                                    <td>{{$ai_software->official_link}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success text-white" href="{{route('admin_ai_software.edit', $ai_software->id)}}"><i class="fa fa-edit"></i></a>
                                        @include('includes._confirm_delete',[
                                                'id' => $ai_software->id,
                                                'url' => route('admin_ai_software.destroy', $ai_software->id),
                                                'message' => 'Are you sure to delete this Software?',
                                            ])
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