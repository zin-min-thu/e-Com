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
              <li class="breadcrumb-item active">bunner</li>
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
                            <h3 class="card-title">Bunners</h3>
                            <div class="text-right">
                            <a href="{{url('admin/bunners/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Addbunner</a>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="bunnerDataTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Link</th>
                                    <th>Title</th>
                                    <th>Alt</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($bunners as $bunner)
                                    <tr>
                                        <td>{{$bunner->getKey()}}</td>
                                        <td>
                                        @if(!empty($bunner->image) && file_exists('images/bunner_images/'.$bunner->image))
                                            <img src="{{url('images/bunner_images/'.$bunner->image)}}" style="width: 180px; height: 60px;">
                                        @else
                                            <img src="{{url('images/no_image.png')}}" style="width: 80px; height: 60px;">
                                        @endif
                                        </td>
                                        <td>{{$bunner->link}}</td>
                                        <td>{{$bunner->title}}</td>
                                        <td>{{$bunner->alt}}</td>
                                        <td>
                                            @if($bunner->status == 1)
                                                <a title="Click to inactive status" href="javascript:void(0)" id="bunner-{{$bunner->id}}" bunner_id = "{{$bunner->id}}" class="updateStatusBunner">
                                                    <i status="Active" class="fa fa-toggle-on fa-lg"></i>
                                                </a>
                                            @else
                                                <a title="Click to active status" href="javascript:void(0)" id="bunner-{{$bunner->id}}" bunner_id = "{{$bunner->id}}" class="updateStatusBunner">
                                                    <i status="Inactive" class="fa fa-toggle-off fa-lg text-red"></i>
                                                </a>
                                            @endif
                                            <a title="Edit Bunner" href="{{url('admin/bunners/'.$bunner->id).'/edit'}}" class="btn btn-info btn-sm">
                                                &nbsp;&nbsp;<i class="fa fa-edit"></i>
                                            </a>
                                            <a title="Delete bunner" class="confirmDelete btn btn-danger btn-sm" record="bunner" recordId="{{$bunner->id}}" href="javascript:void(0)">
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
    $("#bunnerDataTable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection