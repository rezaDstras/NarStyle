@extends('layouts.admin.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Setting</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Update Admin Detail</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Admin Detail</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{url('/admin/update-admin')}}" name="updateAdminDetail" id="updateAdminDetail"
                enctype="multipart/form-data"
                >
                    @if(\Illuminate\Support\Facades\Session::has('error_message'))
                        <div style="margin-top: 10px" class="alert alert-danger" role="alert">
                            {{\Illuminate\Support\Facades\Session::get('error_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close" >
                                <span aria-label="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('success_message'))
                        <div style="margin-top: 10px" class="alert alert-success" role="alert">
                            {{\Illuminate\Support\Facades\Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close" >
                                <span aria-label="true">&times;</span>
                            </button>
                        </div>
                    @endif
                        {{-- validation alert--}}
                        @if ($errors->any())
                            <div class="alert alert-danger" style="margin-top: 10px">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close" >
                                            <span aria-label="true">&times;</span>
                                        </button>
                                </ul>

                            </div>
                        @endif
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="admin-email" name="email" value="{{$admin->email}}" class="form-control" readonly >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Name</label>
                            <input type="text" name="name"  class="form-control" id="exampleInputPassword1" value="{{$admin->name}}"  placeholder="Enter Current Password">
                        </div>
                          <div class="form-group">
                           <label for="exampleInputPassword1">Type</label>
                            <input type="text" name="type" class="form-control" readonly id="exampleInputPassword1" value="{{$admin->type}}"  placeholder="Enter Current Password">
                             </div>
                              <div class="form-group">
                              <label for="exampleInputPassword1">Mobile</label>
                              <input type="text" name="mobile" class="form-control" id="exampleInputPassword1" value="{{$admin->mobile}}" placeholder="Enter Current Password">
                              </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    @if(!empty($admin->image))
                                      <input type="hidden" name="current_image" value="{{$admin->image}}">
                                    @endif
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @if(!empty($admin->image))
                                <img style="margin-top: 10px; border: 1px solid dodgerblue;" width="100px" height="100px" src={{asset("/admin/images/admin_images$admin->image")}}
                            @endif
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
