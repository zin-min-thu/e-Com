@extends('layouts.admin_layout.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Settings</a></li>
              <li class="breadcrumb-item active">Admin | Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Admin Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                @include('validation_message')
                <form role="form" action="{{url('admin/update-detail')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            value="{{$admin->email}}"
                            readonly
                        >
                        </div>
                        <div class="form-group">
                        <label for="name">Type</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            value="{{$admin->type}}"
                            readonly
                        >
                        </div>
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            value="{{ucwords($admin->name)}}"
                        >
                        </div>
                        <div class="form-group">
                        <label for="name">Mobile</label>
                        <input
                            type="text"
                            class="form-control"
                            id="mobile"
                            name="mobile"
                            value="{{$admin->mobile}}"
                        >
                        </div>
                        <div class="form-group">
                        <label for="name">Image</label>
                        <input
                            type="file"
                            class="form-control"
                            id="image"
                            name="image"
                            value=""
                        >
                        </div>
                        @if(!empty($admin->image))
                            <input type="hidden" name="current_admin_image" value="{{$admin->image}}">
                            <a target="_blank" href="{{url('images/admin_images/admin_photos/'.$admin->image)}}" title="View Image">
                            <img src="{{url('images/admin_images/admin_photos/'.$admin->image)}}" style="width: 40; height: 50;" alt="Item not found">
                            </a>
                        @endif
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection