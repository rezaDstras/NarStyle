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
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="post" name="productForm" id="productForm" action="{{url('admin/general/update/'.$setting['id'])}}" enctype="multipart/form-data">
                @if(\Illuminate\Support\Facades\Session::has('success_message'))
                    <div style="margin-top: 10px" class="alert alert-success" role="alert">
                        {{\Illuminate\Support\Facades\Session::get('success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="close" >
                            <span aria-label="true">&times;</span>
                        </button>
                    </div>
                @endif
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
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Update Setting</h3>
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
                                        <label>Shop Title</label>
                                        <input type="text" name="shop_title" class="form-control" id="product_name"
                                               @if(!empty($setting['shop_title']))
                                               value="{{$setting->shop_title}}"
                                               @else
                                               value="{{old('shop_title')}}"
                                               @endif
                                               >
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="product_name">Hotline</label>
                                        <input type="text" name="hotline" class="form-control" id="hotline"
                                               @if(!empty($setting['hotline']))
                                               value="{{$setting->hotline}}"
                                               @else
                                               value="{{old('hotline')}}"
                                               @endif
                                               >
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Instagram</label>
                                        <input type="text" name="instagram" class="form-control" id="instagram"
                                               @if(!empty($setting['instagram']))
                                               value="{{$setting->instagram}}"
                                               @else
                                               value="{{old('instagram')}}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Facebook</label>
                                        <input type="text" name="facebook" class="form-control" id="facebook"
                                               @if(!empty($setting['facebook']))
                                               value="{{$setting->facebook}}"
                                               @else
                                               value="{{old('facebook')}}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">linkedin</label>
                                        <input type="text" name="linkedin" class="form-control" id="linkedin"
                                               @if(!empty($setting['linkedin']))
                                               value="{{$setting->linkedin}}"
                                               @else
                                               value="{{old('linkedin')}}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Rss</label>
                                        <input type="text" name="rss" class="form-control" id="rss"
                                               @if(!empty($setting['rss']))
                                               value="{{$setting->rss}}"
                                               @else
                                               value="{{old('rss')}}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Youtube</label>
                                        <input type="text" name="youtube" class="form-control" id="youtube"
                                               @if(!empty($setting['youtube']))
                                               value="{{$setting->youtube}}"
                                               @else
                                               value="{{old('youtube')}}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Pinterest</label>
                                        <input type="text" name="pinterest" class="form-control" id="pinterest"
                                               @if(!empty($setting['pinterest']))
                                               value="{{$setting->pinterest}}"
                                               @else
                                               value="{{old('pinterest')}}"
                                            @endif>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_name">Email</label>
                                        <input type="email" name="email" class="form-control" id="product_code"
                                               @if(!empty($setting['email']))
                                               value="{{$setting->email}}"
                                               @else
                                               value="{{old('email')}}"
                                               @endif >
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="exampleInputFile">Logo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="logo" type="file" class="custom-file-input" id="logo">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Email</label>
                                            <input type="text" name="email" class="form-control" id="product_code"
                                                   @if(!empty($setting['email']))
                                                   value="{{$setting->email}}"
                                                   @else
                                                   value="{{old('email')}}"
                                                @endif >
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Google-plus</label>
                                            <input type="text" name="google_plus" class="form-control" id="google-plus"
                                                   @if(!empty($setting['google_plus']))
                                                   value="{{$setting['google_plus']}}"
                                                   @else
                                                   value="{{old('google_plus')}}"
                                                @endif >
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Skype</label>
                                            <input type="text" name="skype" class="form-control" id="skype"
                                                   @if(!empty($setting['skype']))
                                                   value="{{$setting->skype}}"
                                                   @else
                                                   value="{{old('skype')}}"
                                                @endif >
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Vimeo</label>
                                            <input type="text" name="vimeo" class="form-control" id="vimeo"
                                                   @if(!empty($setting['vimeo']))
                                                   value="{{$setting->vimeo}}"
                                                   @else
                                                   value="{{old('vimeo')}}"
                                                @endif >
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">About</label>
                                            <textarea name="about" class="form-control" rows="2" placeholder="Enter ...">@if(!empty($setting['about'])){{$setting['about']}}@else{{old('about')}}@endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Address</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                   @if(!empty($setting['address']))
                                                   value="{{$setting->address}}"
                                                   @else
                                                   value="{{old('address')}}"
                                                @endif>
                                        </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
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
