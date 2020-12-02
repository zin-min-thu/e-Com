@extends('layouts.admin_layout.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Management</h1>
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
                <h3 class="card-title">Create Admin User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @include('validation_message')
              <form role="form" action="{{ route('admins.store')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        value="{{old('name')}}"
                        name="name"
                        placeholder="Name"
                    >
                  </div>
                  <div class="form-group">
                    <label for="name">Mobile</label>
                    <input
                        type="text"
                        class="form-control"
                        id="mobile"
                        value="{{old('mobile')}}"
                        name="mobile"
                        placeholder="Mobile"
                    >
                  </div>
                  <div class="form-group">
                    <label for="type">Type</label>
                    <input 
                        type="text"
                        class="form-control"
                        id="type"
                        name="type"
                        value="{{old('type')}}"
                        placeholder="Type"
                    >
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="text"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{old('email')}}"
                        placeholder="Email"
                    >
                  </div>
                  <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input 
                        type="password"
                        name="new_password"
                        class="form-control" 
                        id="new-password"
                        placeholder="New Password"
                        value="{{old('new_password')}}"
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
                        value="{{old('confirm_password')}}"
                    >
                  </div>
                  <div class="form-group">
                    <label for="role">Roles</label>
                    <select name="role[]" id="role" class="form-control" multiple>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}"
                        >{{$role->name}}
                        </option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
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