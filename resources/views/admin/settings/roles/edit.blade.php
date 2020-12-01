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
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Role</h3>
                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <form action="{{ route('roles.update',$role->id)}}" method="post">
                  @method('PATCH')
                  @csrf
                  <table class="table table-hover text-nowrap">
                    <tbody>
                      <tr>
                          <th>Name</th>
                          <td class="text-right">
                            <input type="text" name="name" value="{{old('name') ? old('name') : $role->name}}" class="form-control" placeholder="Name">
                          </td>
                      </tr>
                      <tr>
                        <th colspan="2" ><h4>Permission:</h4></th>
                      </tr>
                      @foreach($permissions as $key => $permission)
                        <th style="padding-left:60px;" colspan="2"> {{ucfirst($key)}}</th>
                        @foreach($permission as $v)
                        <tr>
                          <td style="padding-left:80px;">{{$v->name}}</td>
                          <td class="text-right">
                            <input type="checkbox" name="permission[]" value="{{$v->id}}"
                              @if(in_array($v->name,$rolePermission))
                              checked
                              @endif
                            >
                          </td>
                        </tr>
                        @endforeach
                      @endforeach
                      <tr>
                        <td colspan="2">
                        <button class="btn btn-info" type="submit">Update</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection