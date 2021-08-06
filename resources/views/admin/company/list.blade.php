@extends('admin.layoutz.app')

@section('title', 'Manage companys')
@section('css')
<!-- Custom css here -->
<style>
    .company-status{
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Companies</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#companyModal">
        <i class="fas fa-plus fa-sm text-white-50"></i> Create New</a>
</div>

<!-- Approach -->
<div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
    </div> -->
    <div class="card-body">
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                Companies List
            </div>
            <div class="card-body">
                <form id="filter-form">
                    <div class="row">
                        <div class="col-lg-2">
                            <label for="per_page" >Show Per Page </label>
                            <select name="per_page" class="form-control" id="per_page">
                                <option value="10">10</option>
                                <option value="25"> 25 </option>
                                <option value="50"> 50 </option>
                                <option value="100"> 100 </option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label for="status_filter">Status </label>
                            <select name="status_filter" class="form-control" id="status_filter">
                                <option value="">All</option>
                                <option value="0"> In-Active </option>
                                <option value="1"> Active </option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label for="status_filter">Search </label>
                            <input type="text" name="search_filter" class="form-control" id="search_filter" placeholder="search company">
                        </div>
                        <div class="col-lg-2">
                            <label for="columnBy_filter">Filter By </label>
                            <select name="columnBy_filter" class="form-control" id="columnBy_filter">
                                <option value="">Created At</option>
                                <option value="name"> Name </option>
                                <option value="status"> Status </option>
                            </select>
                        </div>
                        
                        <div class="col-lg-1">
                            <label for="orderBy_filter">Order By </label>
                            <select name="orderBy_filter" class="form-control" id="orderBy_filter">
                                <option value="asc"> Asc </option>
                                <option value="desc"> Desc </option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" id="clear_filter" class="btn btn-dark" style="margin-top: 30px;">Clear Filter</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="card mb-4">
            {{-- <div class="card-header bg-info text-white">
                companys List
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless" id="dataTsable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Created dt.</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="dynamic-data">
                            {{-- @ include('admin.company.list-data') --}}
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
   
</div>

<!-- The Category Modal -->
<div class="modal fade" id="companyModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Company Detail</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form id="company-form">
                <div class="form-group">
                    <label for="company">Company Name:</label>
                    <input type="text" class="form-control" placeholder="Company Name" id="company">
                    <span class="text-danger name_error"></span>
                </div>


                <button type="button" class="btn btn-info" id="savecompany" data-companySecretKey="" >Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>

@endsection
@section('js')
@include('admin.company.js')
@endsection