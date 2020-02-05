@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                Back to <a href="{{route('admin_ai_software_category.index')}}">Software Category</a>
                <div class="alert text-center category-heading"><b>Alternative Software Category</b></div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                @include('includes.message')
                <div class="alert alert-success">
                    <h5>Update Category</h5>
                    <form action="{{ route('admin_ai_software_category.update', $category->id) }}" method="post">
                        @csrf @method('put')
                        <table id="order-listing" class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <td>
                                    <input class="form-control" type="text" name="name" value="{{$category->name}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Parent Category</th>
                                <td>
                                    <span class="{{$category->parent_id !== null ? '' : 'display-none' }}">Already you have selected <strong>{{$category->parent_id !== null ? $category->parent->name : ''}}</strong>. If you want to change, please select again</span>
                                    <div class="category-box">
                                        <select class="form-control category_select" name="parent_id" data-value="1">
                                            <option value="" data-browse-node-id="0">Select your option</option>
                                            {{--value = 0 used for update as a main parent category--}}
                                            @if($category->parent_id !== null)
                                                <option data-browse-node-id="0" value="0">Parent Category</option>
                                            @endif
                                            @foreach($patent_categories as $patent_category)
                                                <option value="{{$patent_category->id}}" data-browse-node-id="{{ $patent_category->id }}">{{$patent_category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" value="{{$category->parent_id}}" name="old_parent_id">
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
@section('run_custom_js_file')
    @include('admin.ai_software.software_category.sub_category_js')
@endsection
