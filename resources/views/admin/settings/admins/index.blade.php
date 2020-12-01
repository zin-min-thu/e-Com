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
              <li class="breadcrumb-item active">Admin</li>
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
                          <h3 class="card-title">Admin Users</h3>
                          <div class="text-right">
                            <a href="{{ route('admins.create') }}" class="btn btn-info"> <i class="fa fa-plus"></i> Admin Users</a>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="adminUserTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->id}}</td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>
                                            @if(!empty($admin->getRoleNames()))
                                                @foreach($admin->getRoleNames() as $v)
                                                <span class="badge badge-primary">{{$v}}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admins.edit',$admin->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                            <a title="Delete admin user" class="confirmDelete btn btn-danger btn-sm" record="admin" recordId="{{$admin->id}}" href="javascript:void(0)">
                                              <i class="fa fa-trash"></i>
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
    $("#adminUserTable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection