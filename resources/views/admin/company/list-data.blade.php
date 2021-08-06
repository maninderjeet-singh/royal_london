@php
$customIteration = ($brands->currentPage() - 1) * $brands->perPage() + 1;
@endphp
@foreach($brands as $brand)
    <tr>
        <td>{{$customIteration++}}</td>
        <td>{{$brand->name}}</td>
        <td>
            @if($brand->status)
            <span class="badge badge-success brand-status" data-brandid="{{set_encrypt_data($brand->id)}}" data-status="0">Active</span>
            @else
            <span class="badge badge-danger brand-status" data-brandid="{{set_encrypt_data($brand->id)}}" data-status="1">In-Active</span>
            @endif
        </td>
        <td>
            {{$brand->created_at}}
        </td>
        <td>
            <div class="action-btns">
                <div class="dropdown">
                    <button type="button" class="btn btn-light badge badge-light dropdown-toggle" data-toggle="dropdown">
                    Actions
                    </button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item edit-brand" data-brandid="{{set_encrypt_data($brand->id)}}" data-brandName="{{$brand->name}}"   href="javascript:void(0)"><span class="fas fa-edit text-dark"> </span> Edit </a>
                        <div class="dropdown-divider"></div>
                        
                        <a class="dropdown-item delete-brand" data-brandid="{{set_encrypt_data($brand->id)}}"  href="javascript:void(0)"><span class="fa fa-trash text-danger"> </span> Delete</a>
                    </div>
                </div>
            </div>
        </td>
    </tr>
@endforeach

@if($brands->hasPages())
    <tr>
        <td colspan="10">
            <div id="pagination">{{{ $brands->render() }}}</div>
        </td>
    </tr>
@endif
@if($brands->count() < 1)
<tr>
    <td colspan="5" class="text-center">
    <span class="text-center">
        No data found
    </span>
    </td>
</tr>
@endif