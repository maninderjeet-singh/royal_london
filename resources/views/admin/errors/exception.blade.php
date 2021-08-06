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

<!-- 404 Error Text -->
<div class="text-center">
    <div class="error mx-auto" data-text="500">500</div>
    <p class="lead text-gray-800 mb-5">Whoops! something went wrong.</p>
    <p class="text-gray-500 mb-0">{{$response['exception_message']}}</p>
    <a href="index.html">&larr; Back to Dashboard</a>
</div>
@endsection
              