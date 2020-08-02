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
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
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
                <h3 class="card-title">Update Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(session('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                  {{session('error_message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              @if(session('success_message'))
                <div class="alert alert-success alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                  {{session('success_message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              <form role="form" action="{{url('admin/update-current-password')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Admin Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        value="{{ucwords($admin->name)}}"
                        readonly
                    >
                  </div>
                  <div class="form-group">
                    <label for="email">Admin Email</label>
                    <input
                        type="text"
                        class="form-control"
                        id="email"
                        value="{{$admin->email}}" 
                        readonly
                    >
                  </div>
                  <div class="form-group">
                    <label for="type">Admin Type</label>
                    <input 
                        type="text"
                        class="form-control"
                        id="type"
                        value="{{$admin->type}}"
                        readonly
                    >
                  </div>
                  <div class="form-group">
                    <label for="current_password">Currnet Password</label>
                    <input
                        type="password"
                        name="current_password"
                        class="form-control"
                        id="current-password"
                        placeholder="Current Password"
                    >
                    <span id="checkCurrentPassword"></span>
                  </div>
                  <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input 
                        type="password"
                        name="new_password"
                        class="form-control" 
                        id="new-password"
                        placeholder="New Password"
                    >
                  </div>
                  <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input
                        type="password"
                        name="confirm_password"
                        class="form-control"
                        id="confirm-password"
                        placeholder="Confirm Password"
                    >
                  </div>
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