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
                            <li class="breadcrumb-item active">Setting Admin</li>
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
                <h3 class="card-title">Update Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{url('/admin/update-psw')}}" name="updatePasswordForm" id="updatePasswordForm">
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
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" id="admin-email" name="email"  class="form-control" readonly value="{{$admin->email}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" name="name" readonly class="form-control" id="exampleInputPassword1" value="{{$admin->name}}" placeholder="Enter Current Password">
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleInputPassword1">Type</label>--}}
{{--                        <input type="text" name="type" class="form-control" readonly id="exampleInputPassword1" value="{{$admin->type}}" placeholder="Enter Current Password">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleInputPassword1">Mobile</label>--}}
{{--                        <input type="text" name="mobile" class="form-control" id="exampleInputPassword1" value="{{$admin->mobile}}" placeholder="Enter Current Password">--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label for="exampleInputPassword1">Current Password</label>
                        <input type="password" name="current_pwd"  class="form-control" id="current_pwd" placeholder="Enter Current Password">
                        <span id="chkPwd"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password"  name="new_password" class="form-control" id="new_password" placeholder="Enter New Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password">
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
