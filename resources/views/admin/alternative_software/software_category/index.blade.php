@extends('layouts.master')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                 <div class="alert text-center category-heading"><b>Alternative Software Category</b></div>
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
                                    <input class="form-control" type="text" name="name" placeholder="Category name">
                                </td>
                            </tr>
                            <tr>
                                <th>Parent Category</th>
                                <td>
                                    <select class="form-control" name="parent_id">
                                        <option value="">Choose parent category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-sm btn-success text-white float-right" type="submit" value="Add">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="col-md-7">
                <div class="alert alert-success">
                        <div id="accordion">
                            @foreach($categories as $category)
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        @if($category->children->count() > 0)
                                            <span class="btn btn-link" data-toggle="collapse" data-target="#collapse-{{$category->id}}" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                        @else
                                            <span class="btn btn-link disabled"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                        @endif
                                        <span class="btn collapsed">
                                            {{ $category->name }}
                                        </span>
                                        <span class="float-right">
                                            <a class="btn btn-sm btn-success text-white" href="{{route('alternative_software_category.edit', $category->id)}}"><i class="fa fa-edit"></i></a>
                                            @include('includes._confirm_delete',[
                                                    'id' => $category->id,
                                                    'url' => route('alternative_software_category.destroy', $category->id),
                                                    'message' => 'Are you sure to delete this category?',
                                                ])
                                        </span>
                                    </h5>
                                </div>
                                <div id="collapse-{{$category->id}}" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                @if($category->children->count() > 0)
                                                    @foreach($category->children as $children)
                                                        <tr>
                                                            <td>{{$loop->index+1}}</td>
                                                            <td>{{$children->name}}</td>
                                                            <td>
                                                                <a class="btn btn-sm btn-success text-white" href="{{route('alternative_software_category.edit', $children->id)}}"><i class="fa fa-edit"></i></a>
                                                                @include('includes._confirm_delete',[
                                                                        'id' => $children->id,
                                                                        'url' => route('alternative_software_category.destroy', $children->id),
                                                                        'message' => 'Are you sure to delete this category?',
                                                                    ])
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                        </div>

                       {{-- <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        @if($category->children->count() > 0)
                                            <span><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                        @endif
                                    </td>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                    <td>
                                       <a class="btn btn-sm btn-success text-white" href="{{route('alternative_software_category.edit', $category->id)}}"><i class="fa fa-edit"></i></a>
                                        @include('includes._confirm_delete',[
                                                'id' => $category->id,
                                                'url' => route('alternative_software_category.destroy', $category->id),
                                                'message' => 'Are you sure to delete this category?',
                                            ])
                                    </td>
                                    @if($category->children->count() > 0)
                                        @foreach($category->children as $children)
                                            <tr class="display-none" id="#sub-category">
                                                <td>-></td>
                                                <td>{{$children->name}}</td>
                                                <td>{{$children->created_at->format('d/m/Y')}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>--}}
                    {!! $categories->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection