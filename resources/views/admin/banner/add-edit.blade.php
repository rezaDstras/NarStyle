@extends('layouts.admin.index')
@section('content')

    <div class="content-wrapper" style="min-height: 1365.62px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Catalogue</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Banner</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="post" name="categoryForm" id="categoryForm"
                  @if(empty($banner['id']))
                  action="{{url('admin/add-edit-banner')}}"
                  @else
                  action="{{url('admin/add-edit-banner/'.$banner['id'])}}"
                  @endif
                  enctype="multipart/form-data">
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
                @if(\Illuminate\Support\Facades\Session::has('success_message'))
                    <div style="margin-top: 10px" class="alert alert-success" role="alert">
                        {{\Illuminate\Support\Facades\Session::get('success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="close" >
                            <span aria-label="true">&times;</span>
                        </button>
                    </div>
                @endif
                @csrf
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}} </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="brand_name">Banner Title</label>
                                        <input type="text" name="title" class="form-control" id="banner_title"
                                               @if(!empty($banner['title']))
                                               value="{{$banner['title']}}"
                                               @else
                                               value="{{old('title')}}"
                                               @endif
                                               placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="brand_name">Banner link</label>
                                        <input type="text" name="link" class="form-control" id="banner_link"
                                               @if(!empty($banner['link']))
                                               value="{{$banner['link']}}"
                                               @else
                                               value="{{old('link')}}"
                                               @endif
                                               placeholder="Enter Link">
                                    </div>
                                    <div class="form-group">
                                        <label for="brand_name">Banner alert</label>
                                        <input type="text" name="alert" class="form-control" id="banner_alert"
                                               @if(!empty($banner['alert']))
                                               value="{{$banner['alert']}}"
                                               @else
                                               value="{{old('alert')}}"
                                               @endif
                                               placeholder="Enter Alert">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Banner Image </label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input" id="image">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit" >Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
