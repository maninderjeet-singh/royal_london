@extends('admin.layoutz.app')

@section('title', 'Manage Products')
@section('css')
<!-- Custom css here -->
<style>
    .product-status{
        cursor: pointer;
    }
    .pointer{
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product</h1>
    <a href="{{url('products')}}" class="d-sm-inline-block btn btn-sm btn-info shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
</div>

<!-- Approach -->
<div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
    </div> -->
    <div class="card-body">
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                {{isset($product) ? 'Update':'Add New' }} Product
            </div>
            <div class="card-body">

                <!-- Category , sub categaory and sub sub category section -->
                <i id="catData" data-alldata="{{$categoryData}}"></i>
                {{-- <div class="heading">
                    <span style="font-size:35px">Select Category </span>
                    <button class="btn btn-outline-dark" id="resetCatSection" style="display:none" >reset </button>

                </div>
                <div class="category-section">
                    <div class="row">
                        <!-- Categories -->
                        @foreach($categoryData as $category)
                        <div class="col-lg-2 mb-4">
                            <div class="card bg-success  text-white shadow">
                                <div class="card-body text-center pointer">
                                    {{$category->name}}
                                    <!-- <div class="text-white-50 small">dd</div> -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> --}}

                <!-- Product Form -->

                <div id="accordion" class="prodcut-form-section" style="display:nosne;">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#basicDetail">
                            Basic Deatils
                            </a>
                        </div>
                        <div id="basicDetail" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <form id="basic-form">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Product Name:</label>
                                                <input type="text" class="form-control" value="{{isset($product) ? $product->name:'' }}" placeholder="Enter product name" id="name" name="name">
                                                <span class="text-danger form-error" id="error_name"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="type">Type:</label>
                                                <select name="type" id="type" class="form-control" readonly>
                                                    <option value="">Select Type</option>
                                                    <option value="1">Normal</option>
                                                    <option value="2" selected>Variable</option>
                                                </select>
                                                <span class="text-danger form-error" id="error_type"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="category_id ">Category:</label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option value="">Select Category</option>
                                                    @foreach($categoryData as $category )
                                                    <option value="{{$category->id}}" @if(isset($product) && $product->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger form-error" id="error_category_id"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="sub_category_id ">Sub Category:</label>
                                                <select name="sub_category_id" id="sub_category_id" class="form-control">
                                                    <option value="">Select Sub Category</option>
                                                </select>
                                                <span class="text-danger form-error" id="error_sub_category_id"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="sub_sub_category_id ">Sub Sub Category:</label>
                                                <select name="sub_sub_category_id" id="sub_sub_category_id" class="form-control">
                                                    <option value="">Select Sub Sub Category</option>
                                                </select>
                                                <span class="text-danger form-error" id="error_sub_sub_category_id"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="sub_sub_category_type_id ">Sub Sub Category Type:</label>
                                                <select name="sub_sub_category_type_id" id="sub_sub_category_type_id" class="form-control">
                                                    <option value="">Select Sub Category</option>
                                                </select>
                                                <span class="text-danger form-error" id="error_sub_sub_category_type_id"></span>
                                            </div>
                                        </div>

                                        


                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="tax_type">Tax Type:</label>
                                                <select name="tax_type" id="tax_type" class="form-control">
                                                    <option value="">Select Tax Type</option>
                                                    <option value="1" @if(isset($product) && $product->tax_type == 1) selected @endif>Inclusive</option>
                                                    <option value="2" @if(isset($product) && $product->tax_type == 2) selected @endif>Exclusive</option>
                                                </select>
                                                <span class="text-danger form-error" id="error_tax_type"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="tax">Tax :</label>
                                                <input type="text" class="form-control" placeholder="Enter tax" id="tax" name="tax" value="{{isset($product) ? $product->tax:'' }}">
                                                <span class="text-danger form-error" id="error_tax"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="brand_id ">Brand:</label>
                                                <select name="brand_id" id="brand_id" class="form-control">
                                                    <option value="">Select Brand</option>
                                                    @foreach($brands as $key=>$name )
                                                    <option value="{{$key}}" @if(isset($product) && $product->brand_id == $key) selected @endif>{{$name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger form-error" id="error_brand_id"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="material_id  ">Material:</label>
                                                <select name="material_id" id="material_id" class="form-control">
                                                    <option value="">Select Material</option>
                                                    @foreach($materials as $key=>$name )
                                                    <option value="{{$key}}" @if(isset($product) && $product->material_id == $key) selected @endif>{{$name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger form-error" id="error_material_id"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="default_discount">Default Discount :</label>
                                                <input type="text" class="form-control" placeholder="Enter Default Discount" id="default_discount" name="default_discount" value="{{isset($product) ? $product->default_discount:'' }}">
                                                <span class="text-danger form-error" id="error_default_discount"></span>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#infoDetail">
                                Product Information
                            </a>
                        </div>
                        <div id="infoDetail" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                            <form id="info-form">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="weight">Weight:</label>
                                                <input type="text" class="form-control" value="{{isset($product) ? $product->info->weight:'' }}" placeholder="Enter Weight" id="weight" name="weight">
                                                <span class="text-danger form-error" id="error_weight"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="dimension_type">Dimension Type:</label>
                                                <input type="text" class="form-control" value="{{isset($product) ? $product->info->dimension_type:'' }}" placeholder="Enter Dimension Type ex.W x H x L" id="dimension_type" name="dimension_type">
                                                <span class="text-danger form-error" id="error_dimension_type"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="dimension_value">Dimension Value:</label>
                                                <input type="text" class="form-control" value="{{isset($product) ? $product->info->dimension_value:'' }}" placeholder="Enter Dimension Value ex. 25 inch x 50 inch x 75 inch" id="dimension_value" name="dimension_value">
                                                <span class="text-danger form-error" id="error_dimension_value"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="warranty">Warranty:</label>
                                                <input type="text" class="form-control" value="{{isset($product) ? $product->info->warranty:'' }}" placeholder="Enter Warranty" id="warranty" name="warranty">
                                                <span class="text-danger form-error" id="error_warranty"></span>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Description:</label>
                                                <textarea class="form-control" placeholder="Enter Description" id="description" name="description" cols="30" rows="5">{{isset($product) ? $product->info->description:'' }}</textarea>
                                                <span class="text-danger form-error" id="error_description"></span>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="form-btns mt-4">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary" id="save-product" data-productsecretkey="{{isset($product) ? set_encrypt_data($product->id) : ''}}">{{isset($product) ? 'Update':'Save' }} Product</button>
                            </div>
                        </div>
                    </div>
                    

                    <!-- <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                            Collapsible Group Item #3
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                            Lorem ipsum..
                            </div>
                        </div>
                    </div> -->

                </div>
                <!-- Product Form End here -->
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
@include('admin.product.js')
@endsection