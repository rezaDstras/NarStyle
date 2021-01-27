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
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="post" name="categoryForm" id="categoryForm"
                  @if(empty($categoryData['id']))
                  action="{{url('admin/add-edit-category')}}"
                  @else
                  action="{{url('admin/add-edit-category/'.$categoryData['id'])}}"
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
                                    <label for="category_name">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="category_name"
                                           @if(!empty($categoryData['category_name']))
                                               value="{{$categoryData['category_name']}}"
                                           @else
                                           value="{{old('category_name')}}"
                                           @endif
                                           placeholder="Enter Category">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Section</label>
                                    <select name="section_id" id="section_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
                                        <option >select category</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}"
                                            @if(!empty($categoryData['section_id']) && $categoryData['section_id']==$section->id)
                                                    selected
                                            @endif
                                            >{{$section->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div id="categorLevel">
                                    @include('admin.category.level_category')
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="exampleInputFile">Image Category </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="category_image" type="file" class="custom-file-input" id="category_image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($categoryData['category_image']))
                                    <img width="100px" height="100px" src="{{asset('admin/images/category_image/'.$categoryData['category_image'])}}">
                                    <a href="{{url('admin/delete-category-image/'.$categoryData['id'])}}" class="btn btn-danger">Delete</a>
                            @endif
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="parent_discount">Category Discount</label>
                                    <input name="parent_discount" type="text" class="form-control" id="parent_discount"
                                           @if(!empty($categoryData['parent_discount']))
                                           value="{{$categoryData['parent_discount']}}"
                                           @else
                                           {{old('parent_discount')}}
                                           @endif
                                           placeholder="Enter Discount">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="url">Category Url</label>
                                    <input name="url" type="text" class="form-control" id="url"
                                           @if(!empty($categoryData['url']))
                                           value="{{$categoryData['url']}}"
                                           @else
                                           {{old('url')}}
                                           @endif

                                           placeholder="Enter Url">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Enter ...">@if(!empty($categoryData['description'])){{$categoryData['description']}}@else{{old('description')}}@endif
                                    </textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Meta Title </label>
                                    <textarea name="meta_title" class="form-control" rows="3" placeholder="Enter ...">@if(!empty($categoryData['meta_title'])){{$categoryData['meta_title']}}@else{{old('meta_title')}}@endif

                                    </textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter ...">@if(!empty($categoryData['meta_description'])){{$categoryData['meta_description']}}@else{{old('meta_description')}}@endif

                                    </textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Meta keywords </label>
                                    <textarea name="meta_keywords" class="form-control" rows="3" placeholder="Enter ...">@if(!empty($categoryData['meta_keywords'])){{$categoryData['meta_keywords']}}@else{{old('meta_keywords')}}@endif
                                    </textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
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
