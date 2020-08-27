@extends('layouts.admin_layout.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Catalogues</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Brand</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if(session('success_message'))
      <div class="alert alert-success alert-dismissible fade show" style="margin: 10px;" role="alert">
        {{session('success_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Brands</h3>
                            <div class="text-right">
                            <a href="{{url('admin/brands/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> AddBrand</a>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="brandDataTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $brand)
                                    <tr>
                                        <td>{{$brand->getKey()}}</td>
                                        <td>{{$brand->name}}</td>
                                        <td>
                                            @if($brand->status == 1)
                                                <a title="Click to inactive status" href="javascript:void(0)" id="brand-{{$brand->id}}" brand_id = "{{$brand->id}}" class="updateStatusBrand">
                                                    <i status="Active" class="fa fa-toggle-on fa-lg"></i>
                                                </a>
                                            @else
                                                <a title="Click to active status" href="javascript:void(0)" id="brand-{{$brand->id}}" brand_id = "{{$brand->id}}" class="updateStatusBrand">
                                                    <i status="Inactive" class="fa fa-toggle-off fa-lg text-red"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a title="Edit Product" href="{{url('admin/brands/'.$brand->id).'/edit'}}" class="btn btn-info btn-sm">
                                                &nbsp;&nbsp;<i class="fa fa-edit"></i>
                                            </a>
                                            <a title="Delete brand" class="confirmDelete btn btn-danger btn-sm" record="brand" recordId="{{$brand->id}}" href="javascript:void(0)">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        <!-- /.row -->
        </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('footer-script')
<script>
  $(function () {
    $("#brandDataTable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection