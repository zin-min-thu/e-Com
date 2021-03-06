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
                          <h3 class="card-title">Category</h3>
                          <div class="text-right">
                            <a href="{{url('admin/categories/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> AddCategory</a>
                          </div>
                        </div>
                        <!-- /.card-header -->
                      <div class="card-body">
                          <table id="categoryDataTable" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Parent Category</th>
                                  <th>Section</th>
                                  <th>URL</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                  @foreach($categories as $category)
                                  <tr>
                                      <td>{{$category->getKey()}}</td>
                                      <td>{{$category->name}}</td>
                                      <td>
                                        @if(isset($category->parent_category->name))
                                        {{$category->parent_category->name}}
                                        @else
                                        Root
                                        @endif
                                      </td>
                                      <td>{{$category->section->name}}</td>
                                      <td>{{$category->url}}</td>
                                      <td>
                                          @include('admin.categories._update_status')
                                      </td>
                                      <td>
                                        <a href="{{url('admin/categories/'.$category->id).'/edit'}}">Edit</a>
                                        <a class="confirmDelete text-red" record="category" recordId="{{$category->id}}" href="javascript:void(0)" class="text-red">&nbsp;&nbsp;Delete</a>
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
    $("#categoryDataTable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection