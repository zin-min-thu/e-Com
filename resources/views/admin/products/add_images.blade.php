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
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if ($errors->any())
        <div class="alert alert-danger" style="margin: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success_message'))
      <div class="alert alert-success alert-dismissible fade show" style="margin: 10px;" role="alert">
        {{session('success_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @if(session('error_message'))
      <div class="alert alert-danger alert-dismissible fade show" style="margin: 10px;" role="alert">
        {{session('error_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
            <form action="{{url('admin/products/'.$product->id.'/add-images')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                    <h3 class="card-title">Add Product Attribute</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>
                                    <strong>Product Name:</strong>&nbsp;&nbsp;{{$product->name}}
                                </p>
                                <p>
                                    <strong>Product Code:</strong>&nbsp;&nbsp;{{$product->code}}
                                </p>
                                <p>
                                    <strong>Product Color:</strong>&nbsp;&nbsp;{{$product->color}}
                                </p>
                            </div>
                            <div class="col-md-4">
                                @if(!empty($product->image))
                                    <div style="margin-top: 10px;">
                                        <a title="View Image" href="{{url('images/product_images/medium/'.$product->image)}}" target="_blank">
                                            <img src="{{url('images/product_images/medium/'.$product->image)}}" alt="Item Not Found" width="120" height="100">
                                        </a>
                                    </div>
                                @endif         
                            </div>
                        </div>
                        <div class="field_wrapper">
                            <div class="form-group">
                                <label for="images">Upload Images</label>
                                <input multiple="" type="file" name="images[]" id="images"/>
                            </div>
                        </div>
                    </div>               
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add Images</button>
                    </div>
                </div>
            </form>
            <!-- /.card -->
            <div class="row">
                <div class="col-12">
                  <form action="{{url('admin/products/'.$product->id.'/update-attribute')}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Product Attributes</h3>
                        </div>
                        <!-- /.card-header -->
                      <div class="card-body">
                          <table id="productDataTable" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Image</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                                  @foreach($product->images as $image)
                                  <input style="display: none;" type="text" name="attribute_id[]" value="{{$image->id}}">
                                  <tr>
                                      <td>{{$image->getKey()}}</td>
                                      <td>
                                        <img src="{{url('images/product_images/medium/'.$image->image)}}" alt="Item Not Found" width="120" height="100">
                                      </td>
                                      <td>
                                        <a title="Update product image status" href="javascript:void(0)" id="product-image-{{$image->id}}" productImageID = "{{$image->id}}" class="updateStatusProductImage">
                                          @if($image->status == 1)
                                            <span style="color:green;font-weight:bold;">Active</span>
                                          @else
                                            <span style="color:red;font-weight:bold;">Inactive</span>
                                          @endif
                                        </a>
                                        <a title="Delete product images" class="confirmDelete text-red" record="product-images" recordId="{{$image->id}}" href="javascript:void(0)">
                                          &nbsp;&nbsp;<i class="fa fa-trash"></i>
                                        </a>
                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Update Image</button>
                        </div>
                      </div>
                      <!-- /.card -->
                    </div>
                  </form>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
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