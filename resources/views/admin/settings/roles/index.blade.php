@extends('layouts.admin_layout.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Role Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Role</li>
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
                          <h3 class="card-title">Roles</h3>
                          <div class="text-right">
                            <a href="{{ route('roles.create') }}" class="btn btn-info"> <i class="fa fa-plus"></i> Add Role</a>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="roleTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{ucfirst($role->name)}}</td>
                                        <td>
                                            <a href="{{ route('roles.edit',$role->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </a>
                                            <a title="Delete role" class="confirmDelete btn btn-danger btn-sm" record="role" recordId="{{$role->id}}" href="javascript:void(0)">
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
    $("#roleTable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection