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
            <form action="{{url('admin/products/'.$product->id.'/add-attribute')}}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
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
                                        <a href="{{url('images/product_images/medium/'.$product->image)}}" target="_blank">
                                            <img src="{{url('images/product_images/medium/'.$product->image)}}" alt="Item Not Found" width="120" height="100">
                                        </a>
                                    </div>
                                @endif         
                            </div>
                        </div>
                        <div class="field_wrapper">
                            <div>
                                <input type="text" name="size[]" placeholder="Size" style="width: 120px;" required/>
                                <input type="text" name="sku[]" placeholder="SKU" style="width: 120px;" required/>
                                <input type="number" name="price[]" placeholder="Price" style="width: 120px;" required/>
                                <input type="number" name="stock[]" placeholder="Stock" style="width: 120px;" required/>
                                <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                            </div>
                        </div>
                    </div>               
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add Attribute</button>
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
                                  <th>Size</th>
                                  <th>SKU</th>
                                  <th>Price</th>
                                  <th>Stock</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>
                                  @foreach($product->attributes as $product)
                                  <input style="display: none;" type="text" name="attribute_id[]" value="{{$product->id}}">
                                  <tr>
                                      <td>{{$product->getKey()}}</td>
                                      <td>{{$product->size}}</td>
                                      <td>{{$product->sku}}</td>
                                      <td>
                                        <input type="number" name="price[]" id="price" value="{{$product->price}}">
                                      </td>
                                      <td>
                                        <input type="number" name="stock[]" id="stock" value="{{$product->stock}}">
                                      </td>
                                      <td>
                                        <a title="Add product attributes" href="javascript:void(0)" id="attribute-{{$product->id}}" attribute_id = "{{$product->id}}" class="updateStatusAttribute">
                                          @if($product->status == 1)
                                            <span style="color:green;font-weight:bold;">Active</span>
                                          @else
                                            <span style="color:red;font-weight:bold;">Inactive</span>
                                          @endif
                                        </a>
                                        <a title="Delete product attribute" class="confirmDelete text-red" record="product-attribute" recordId="{{$product->id}}" href="javascript:void(0)">
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
                          <button type="submit" class="btn btn-primary">Update Attribute</button>
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
<script type="text/javascript">
  $(document).ready(function(){
      var maxField = 10; //Input fields increment limitation
      var addButton = $('.add_button'); //Add button selector
      var wrapper = $('.field_wrapper'); //Input field wrapper
      var fieldHTML = '<div style="margin-top: 5px;"><input type="text" name="size[]" placeholder="Size" style="width: 120px;"/>&nbsp;<input type="text" name="sku[]" placeholder="SKU" style="width: 120px;"/>&nbsp;<input type="number" name="price[]" placeholder="Price" style="width: 120px;"/>&nbsp;<input type="number" name="stock[]" placeholder="Stock" style="width: 120px;"/>&nbsp;<a href="javascript:void(0);" class="remove_button" style="color: red;">Remove</a></div>'; //New input field html
      var x = 1; //Initial field counter is 1

      //Once add button is clicked
      $(addButton).click(function(){
          //Check maximum number of input fields
          if(x < maxField){
              x++; //Increment field counter
              $(wrapper).append(fieldHTML); //Add field html
          }
      });
    
      //Once remove button is clicked
      $(wrapper).on('click', '.remove_button', function(e){
          e.preventDefault();
          $(this).parent('div').remove(); //Remove field html
          x--; //Decrement field counter
      });
  });
</script>
<script>
  $(function () {
    $("#productDataTable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection