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
              <li class="breadcrumb-item active">Category</li>
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
                          <h3 class="card-title">Products</h3>
                          <div class="text-right">
                            @if(auth()->guard('admin')->user()->can('product-create'))
                            <a href="{{url('admin/products/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> AddCategory</a>
                            @endif
                          </div>
                        </div>
                        <!-- /.card-header -->
                      <div class="card-body">
                          <table id="productDataTable" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Code</th>
                                  <th>Color</th>
                                  <th class="text-center">Image</th>
                                  <th>Category</th>
                                  <th>Section</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                  @foreach($products as $product)
                                  <tr>
                                      <td>{{$product->getKey()}}</td>
                                      <td>{{$product->name}}</td>
                                      <td>{{$product->code}}</td>
                                      <td>{{$product->color}}</td>
                                      <td class="text-center">
                                      @if(!empty($product->image) && file_exists('images/product_images/small/'.$product->image))
                                      <img src="{{url('images/product_images/small/'.$product->image)}}" style="width: 80px; height: 60px;">
                                      @else
                                        <img src="{{url('images/product_images/small/no_image.png')}}" style="width: 80px; height: 60px;">
                                      @endif
                                      </td>
                                      <td>{{$product->category->name}}</td>
                                      <td>{{$product->section->name}}</td>
                                      <td>
                                          @include('admin.products._update_status')
                                      </td>
                                      <td>
                                        <a title="Edit Product" href="{{url('admin/products/'.$product->id).'/edit'}}" class="btn btn-info btn-sm">
                                        &nbsp;&nbsp;<i class="fa fa-edit"></i>
                                        </a>
                                        <a title="Delete Product" class="confirmDelete btn btn-danger btn-sm" record="product" recordId="{{$product->id}}" href="javascript:void(0)">
                                        &nbsp;&nbsp;<i class="fa fa-trash"></i>
                                        </a>
                                        <br>
                                        <a style="margin-top:3px;" title="Add product attributes" href="{{url('admin/products/'.$product->id.'/add-attribute')}}" class="btn btn-primary btn-sm">
                                          <i class="fa fa-plus">Attr</i>
                                        </a>
                                        <a style="margin-top:3px;" title="Add product images" href="{{url('admin/products/'.$product->id.'/add-images')}}" class="btn btn-info btn-sm">
                                          <i class="fa fa-plus-circle">Image</i>
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
    $("#productDataTable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection