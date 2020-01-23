@extends('layouts.master')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                 <div class="alert text-center category-heading"><b>Ai Software Category</b></div>
            </div>
            <div class="col-md-12">
                 @include('includes.message')
            </div>
            <div class="col-md-5">
                 <div class="alert alert-success">
                    <h5>Create new</h5>
                    <form action="{{ route('admin_ai_software_category.store') }}" method="post">
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
                                    <div class="category-box">
                                        <select class="form-control category_select" name="parent_id" data-value="1">
                                            <option value="" data-browse-node-id="0">Choose parent category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" data-browse-node-id="{{ $category->id }}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                    <div class="card">
                        <div class="card-body">
                            <table id="tree-table" class="table table-hover table-bordered">
                                <tbody>
                                    <th>Categories Name</th>
                                    <th>Action</th>
                                    @foreach($categories as $category)
                                        <tr id="category-col" data-id="{{$category->id}}" data-parent="0" data-level="1">
                                            <td data-column="name">
                                                @if($category->children->count() > 0)
                                                    <span class="btn btn-link"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                                @else
                                                    <span class="btn btn-link disabled"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                                @endif
                                                {{$category->name}}
                                            </td>
                                            <td data-column="action">
                                                <span class="float-right">
                                                    <a class="btn btn-sm btn-success text-white" href="{{route('admin_ai_software_category.edit', $category->id)}}"><i class="fa fa-edit"></i></a>
                                                    @include('includes._confirm_delete',[
                                                            'id' => $category->id,
                                                            'url' => route('admin_ai_software_category.destroy', $category->id),
                                                            'message' => 'Are you sure to delete this category?',
                                                    ])
                                                </span>
                                            </td>
                                        </tr>
                                        @if(count($category->children))
                                            @include('admin.ai_software.software_category.sub_category',['subcategories' => $category->children, 'dataParent' => $category->id , 'dataLevel' => 1])
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {!! $categories->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('run_custom_js_file')
    <script src="{{asset('js/subcategory-plugin-javascript.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#category-col").click(function(){
                $category_level = $("#category-col").data('level');
                if($("#sub-category-col") && $("#sub-category-col").data('level') == $category_level+1){
                    $(".sub-category-col-name").addClass("ml-4");
                }
            });
        });
    </script>
    @include('admin.ai_software.software_category.sub_category_js')
@endsection