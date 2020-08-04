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
            <form action="{{url('admin/categories/'.$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card card-default">
                    <div class="card-header">
                    <h3 class="card-title">Add New Cagegory</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    id="name"
                                    placeholder="Enter category name"
                                    value="{{old('name') ? old('name') : $category->name}}"
                                >
                            </div>
                            <!-- /.form-group -->
                            <div id="appendCagegoryLevel">
                              @include('admin.category._append_level')
                            </div>
                        <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Section</label>
                                <select name="section_id" id="section-id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>select</option>
                                @foreach($sections as $section)
                                <option value="{{$section->id}}" {{$section->id == $category->section_id ? 'Selected' : ''}}>
                                    {{$section->name}}
                                </option>
                                @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="exampleInputFile">Category Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                                @if(!empty($category->image))
                                <a target="_blank" href="{{url('images/admin_images/category_images/'.$category->image)}}" title="Click to view image">
                                    <img src="{{url('images/admin_images/category_images/'.$category->image)}}" style="width: 100px; height:80px;">
                                </a>
                                @else
                                <span class="text-red">You need to upload category image.</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="discount">Category Discount</label>
                                <input
                                    type="text"
                                    name="discount"
                                    class="form-control"
                                    id="discount"
                                    placeholder="Enter category discount"
                                    value="{{old('discount') ? old('discount') : $category->discount}}"
                                >
                            </div>
                        <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="url">Category URL</label>
                                <input
                                    type="text"
                                    name="url"
                                    class="form-control"
                                    id="url"
                                    placeholder="Enter category url"
                                    value="{{old('url') ? old('url') : $category->url}}"
                                >
                            </div>
                        <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Cagegory Description</label>
                                <textarea name="description" class="form-control" placeholder="Enter ...">{{old('description') ? old('description') : $category->description}}</textarea>
                            </div>
                        <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Meta Title</label>
                                <textarea name="meta_title" class="form-control" placeholder="Enter ...">{{old('meta_title') ? old('meta_title') : $category->meta_title}}</textarea>
                            </div>
                        <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" placeholder="Enter ...">{{old('meta_description') ? old('meta_description') : $category->meta_description}}</textarea>
                            </div>
                        <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Meta Keywords</label>
                                <textarea name="meta_keywords" class="form-control" placeholder="Enter ...">{{old('meta_keywords') ? old('meta_keywords') : $category->meta_keywords}}</textarea>
                            </div>
                        <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>
@endsection