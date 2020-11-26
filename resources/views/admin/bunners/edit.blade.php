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
              <li class="breadcrumb-item active">Bunners</li>
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
            <form action="{{url('admin/bunners/'.$bunner->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card card-default">
                    <div class="card-header">
                    <h3 class="card-title">Add Bunner</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">  
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Bunner image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                    @if(!empty($bunner->image && file_exists("images/bunner_images/".$bunner->image)))
                                        <div style="margin-top: 10px;">
                                            <a href="{{url('images/bunner_images/'.$bunner->image)}}" target="_blank">
                                                <img src="{{url('images/bunner_images/'.$bunner->image)}}" alt="Item Not Found" style="width: 80px; height: 60px;">
                                            </a>
                                            <a href="javascript::void(0)" record="bunner-image" recordId="{{$bunner->id}}" class="confirmDelete text-red">Delete Image</a>
                                        </div>
                                    @else
                                        <span class="text-red">There is no image to show.</span>
                                    @endif
                                </div>       
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Bunner Title</label>
                                    <input
                                        type="text"
                                        name="title"
                                        class="form-control"
                                        id="title"
                                        value="{{old('title') ? old('title') : $bunner->title}}"
                                        placeholder="Enter bunner title"
                                    >
                                </div>       
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="link">Bunner Link</label>
                                    <input
                                        type="text"
                                        name="link"
                                        class="form-control"
                                        id="link"
                                        value="{{old('link') ? old('link') : $bunner->link}}"
                                        placeholder="Enter bunner link"
                                    >
                                </div>       
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alt">Bunner Alternative Text</label>
                                    <input
                                        type="text"
                                        name="alt"
                                        class="form-control"
                                        id="alt"
                                        value="{{old('alt') ? old('alt') : $bunner->alt}}"
                                        placeholder="Enter bunner alt"
                                    >
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

@endsection