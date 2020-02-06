@foreach($subcategories as $subcategory)
    <tr id="sub-category-col" class="sub-category-col" data-id="{{$subcategory->id}}" data-parent="{{$dataParent}}" data-level ="{{$dataLevel + 1}}">
        <td data-column="name">
            <span class="sub-category-col-name ml-4" id="sub-category-col-name">
                @if($subcategory->children->count() > 0)
                    <span class="btn btn-link"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                @else
                    <span class="btn btn-link disabled"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                @endif
                {{$subcategory->name}}
            </span>
        </td>
        <td data-column="action">
             <span class="float-right">
                <a class="btn btn-sm btn-success text-white" href="{{route('admin_ai_software_category.edit', $subcategory->id)}}"><i class="fa fa-edit"></i></a>
                @include('includes._confirm_delete',[
                        'id' => $subcategory->id,
                        'url' => route('admin_ai_software_category.destroy', $subcategory->id),
                        'message' => 'Are you sure to delete this category?',
                    ])
            </span>
        </td>
    </tr>
    @if(count($subcategory->children) > 0)
        @include('admin.ai_software.software_category.sub_category',['subcategories' => $subcategory->children, 'dataParent' => $subcategory->id, 'dataLevel' => $dataLevel ])
    @endif
@endforeach