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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
            <form action="{{url('admin/products')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                    <h3 class="card-title">Add Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select name="category_id" id="select-category" class="form-control select-category" style="width: 100%;">
                                    <option selected="selected" disabled>select</option>
                                    @foreach($categories as $section)
                                        <optgroup label="{{$section->name}}"></optgroup>
                                        @foreach($section->categories as $category)
                                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>
                                                &nbsp;&nbsp;&raquo;&nbsp;{{$category->name}}
                                            </option>
                                            @foreach($category->subcategories as $sub_category)
                                                <option value="{{$sub_category->id}}" {{old('category_id') == $sub_category->id ? 'selected' : ''}}>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo; &nbsp;{{$sub_category->name}}
                                                </option>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Product Code</label>
                                    <input
                                        type="text"
                                        name="code"
                                        class="form-control"
                                        id="code"
                                        value="{{old('code')}}"
                                        placeholder="Enter Product Code"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Brand</label>
                                    <select name="brand_id" id="select-brand" class="form-control select-brand" style="width: 100%;">
                                    <option selected="selected" disabled>select</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" {{old('brand_id') == $brand->id ? 'selected' : ''}}>
                                            {{$brand->name}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        id="name"
                                        value="{{old('name')}}"
                                        placeholder="Enter Product Name"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Product Color</label>
                                    <input
                                        type="text"
                                        name="color"
                                        class="form-control"
                                        id="color"
                                        value="{{old('color')}}"
                                        placeholder="Enter Product Code"
                                    >
                                </div>             
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount">Product Price</label>
                                    <input
                                    type="text"
                                    name="price"
                                    class="form-control"
                                    id="price"
                                    value="{{old('price')}}"
                                    placeholder="Enter Product Price"
                                    >
                                </div>    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Product weight</label>
                                    <input
                                    type="text"
                                    name="weight"
                                    class="form-control"
                                    id="weight"
                                    value="{{old('weight')}}"
                                    placeholder="Enter Product weight"
                                    >
                                </div>    
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount">Product Discount(%)</label>
                                    <input
                                        type="text"
                                        name="discount"
                                        class="form-control"
                                        id="discount"
                                        value="{{old('discount')}}"
                                        placeholder="Enter category discount"
                                    >
                                </div>       
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Product Main image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                        </div>                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="video">Product Video</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="video" id="video">
                                            <label class="custom-file-label" for="video">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Fabric</label>
                                    <select name="fabric" id="fabric" class="form-control select-fabric" style="width: 100%;">
                                    <option selected="selected" disabled>select</option>
                                    @foreach($data['fabricArray'] as $fabric)
                                    <option value="{{$fabric}}" {{old('fabric') == $fabric ? 'selected' : ''}} >{{$fabric}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Sleeve</label>
                                    <select name="sleeve" id="sleeve" class="form-control select-sleeve" style="width: 100%;">
                                    <option selected="selected" disabled>select</option>
                                    @foreach($data['sleeveArray'] as $sleeve)
                                    <option value="{{$sleeve}}" {{old('sleeve') == $sleeve ? 'selected' : ''}}>{{$sleeve}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Fit</label>
                                    <select name="fit" id="fit" class="form-control select-fit" style="width: 100%;">
                                    <option selected="selected" disabled>select</option>
                                    @foreach($data['fitArray'] as $fit)
                                    <option value="{{$fit}}" {{old('fit') == $fit ? 'selected' : ''}}>{{$fit}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Pattern</label>
                                    <select name="pattern" id="pattern" class="form-control select-pattern" style="width: 100%;">
                                    <option selected="selected" disabled>select</option>
                                    @foreach($data['patternArray'] as $pattern)
                                    <option value="{{$pattern}}" {{old('pattern') == $pattern ? 'selected' : ''}}>{{$pattern}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Occasion</label>
                                    <select name="occasion" id="occasion" class="form-control select-occasion" style="width: 100%;">
                                    <option selected="selected" disabled>select</option>
                                    @foreach($data['occasionArray'] as $occasion)
                                    <option value="{{$occasion}}" {{old('occasion') == $occasion ? 'selected' : ''}}>{{$occasion}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <textarea name="meta_title" id="meta-title" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" id="meta-description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <textarea name="meta_keywords" id="meta-keywords" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Wash Cares</label>
                                    <textarea name="wash_care" id="wash-care" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_featured" id="is-featured">
                                    <label class="form-check-label" for="is-featured">Is Featured</label>
                                </div>
                            </div>
                        </div>
                    </div>               
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@endsection
@section('footer-script')
<script>
  $(function() {
      $('.select-category').select2()
  })
  $(function() {
      $('.select-brand').select2()
  })
  $(function() {
      $('.select-fabric').select2()
  })
  $(function() {
      $('.select-sleeve').select2()
  })
  $(function() {
      $('.select-fit').select2()
  })
  $(function() {
      $('.select-pattern').select2()
  })
  $(function() {
      $('.select-occasion').select2()
  })
</script>
@endsection