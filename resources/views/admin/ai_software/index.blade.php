@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success text-white text-center category-heading"><b>Ai Alternative Software</b></div>
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
                            <th class="w-15">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($ai_softwares as $key => $ai_software)
                                <tr>
                                    <td>{{ ($ai_softwares->perPage()*$ai_softwares->currentPage() - $ai_softwares->perPage()) + $key + 1 }}</td>
                                    <td><img class="alternative-software-logo" src="{{ $ai_software->logo_url }}"/></td>
                                    <td>{{$ai_software->name}}</td>
                                    <td>{{$ai_software->softwareCategoryName ? $ai_software->softwareCategoryName->name : ''}}</td>
                                    <td>{{ str_limit($ai_software->description, $limit = 80, $end = '...') }}</td>
                                    <td>{{$ai_software->official_link}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info text-white" href="{{route('ai_software.view', $ai_software->slug)}}" target="_blank" title="view"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-sm btn-success text-white" href="{{route('admin_ai_software.edit', $ai_software->id)}}" title="edit"><i class="fa fa-edit"></i></a>
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
                    {{ $ai_softwares->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection