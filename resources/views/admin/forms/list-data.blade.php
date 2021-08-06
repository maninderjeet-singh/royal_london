@php
$customIteration = ($products->currentPage() - 1) * $products->perPage() + 1;
@endphp
@foreach($products as $product)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->category->name}}</td>
        <td>{{$product->subCategory->name}}</td>
        <td>{{$product->subSubCategory->name}}</td>
        <td>{{$product->subSubCategoryType->name}}</td>
        <td>
            @if ($product->status == 0)
                <span class="badge badge-danger pointer change-status" data-id="{{set_encrypt_data($product->id)}}" data-status="1">In-Active</span>
            @endif
            @if ($product->status == 1)
                <span class="badge badge-success pointer change-status" data-id="{{set_encrypt_data($product->id)}}" data-status="0">Active</span>
            @endif
        </td>
        <td>{{$product->created_at}}</td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-light badge badge-light dropdown-toggle" data-toggle="dropdown">
                Actions
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item edit-product" data-productid="{{set_encrypt_data($product->id)}}" data-productName="{{$product->name}}"   href="{{url('product/'.set_encrypt_data($product->id).'/variants')}}"><span class="fas fa-eye text-dark"> </span> Assigned Variant </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item edit-product" data-productid="{{set_encrypt_data($product->id)}}" data-productName="{{$product->name}}"   href="{{url('products/'.set_encrypt_data($product->id))}}"><span class="fas fa-edit text-dark"> </span> Edit </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item delete-product" data-productid="{{set_encrypt_data($product->id)}}"  href="javascript:void(0)"><span class="fa fa-trash text-danger"> </span> Delete</a>
                </div>
            </div>
        </td>
    </tr>
    
{{-- </div> --}}

@endforeach

@if($products->hasPages())
    <tr>
        <td colspan="10">
            <div id="pagination">{{{ $products->render() }}}</div>
        </td>
    </tr>
@endif
@if($products->count() < 1)
<tr>
    <td colspan="5" class="text-center">
    <span class="text-center">
        No data found
    </span>
    </td>
</tr>
@endif


