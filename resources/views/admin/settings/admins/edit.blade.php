@extends('layouts.admin_layout.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin User Management</h1>
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
                <h3 class="card-title">Update Admin User</h3>
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
              <form role="form" action="{{ route('admins.update',$admin->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Admin Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        value="{{ucwords($admin->name)}}"
                        name="name"
                    >
                  </div>
                  <div class="form-group">
                    <label for="name">Admin Mobile</label>
                    <input
                        type="text"
                        class="form-control"
                        id="mobile"
                        value="{{$admin->mobile}}"
                        name="mobile"
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
                    <label for="role">Roles</label>
                    <select name="role[]" id="role" class="form-control" multiple>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}"
                            @if(in_array($role->name, $adminRole))
                            selected
                            @endif
                        >{{$role->name}}
                        </option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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