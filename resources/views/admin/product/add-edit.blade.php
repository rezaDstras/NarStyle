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
            <form method="post" name="productForm" id="productForm"
                  @if(empty($productData['id'])) action="{{url('admin/add-edit-product')}}"
                  @else  action="{{url('admin/add-edit-product/'.$productData['id'])}}" @endif
                  enctype="multipart/form-data">
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
                                    <label>Category</label>
                                    <select name="category_id" id="category_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
                                        <option >select Category</option>
                                        @foreach($categories as $section)
                                            <optgroup label="{{$section->name}}"></optgroup>
                                                @foreach($section['categories'] as $category)
                                                <option value="{{$category->id}}" @if(!empty($productData['category_id']) && $productData['category_id']==$category['id'] )
                                                    selected=""
                                                        @endif
                                                    >&nbsp;
                                                    {{$category->category_name}}</option>
                                                      @foreach($category['subcategories'] as $subcategory)
                                                    <option value="{{$subcategory->id}}"
                                                            @if(!empty($productData['category_id']) && $productData['category_id']==$subcategory['id'] )
                                                            selected=""
                                                        @endif
                                                    >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;
                                                        {{$subcategory->category_name}}</option>
                                                      @endforeach
                                                @endforeach
                                        @endforeach

                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="product_name">product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="product_name"
                                           @if(!empty($productData['product_name']))
                                           value="{{$productData->product_name}}"
                                           @else
                                           value="{{old('product_name')}}"
                                           @endif
                                           placeholder="Enter product">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_name">product Code</label>
                                    <input type="text" name="product_code" class="form-control" id="product_code"
                                           @if(!empty($productData['product_code']))
                                           value="{{$productData->product_code}}"
                                           @else
                                           value="{{old('product_code')}}"
                                           @endif
                                           placeholder="Enter product code">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="product_name">product Color</label>
                                    <input type="text" name="product_color" class="form-control" id="product_color"
                                           @if(!empty($productData['product_color']))
                                           value="{{$productData->product_color}}"
                                           @else
                                           value="{{old('product_color')}}"
                                           @endif
                                           placeholder="Enter product color">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="parent_discount">Product Price</label>
                                    <input name="product_price" type="text" class="form-control" id="product_price"
                                           @if(!empty($productData['product_price']))
                                           value="{{$productData->product_price}}"
                                           @else
                                           value="{{old('product_price')}}"
                                           @endif
                                           placeholder="Enter product price">
                                </div>
                                <div class="form-group">
                                    <label for="parent_discount">Product Discount</label>
                                    <input name="product_discount" type="text" class="form-control" id="product_discount"
                                           @if(!empty($productData['product_discount']))
                                           value="{{$productData->product_discount}}"
                                           @else
                                           value="{{old('product_discount')}}"
                                           @endif
                                           placeholder="Enter product price">
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                    <label>Select Fabric</label>
                                    <select name="fabric" id="fabric" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
                                        @foreach($fabrics as $fabric)
                                            <option value="{{$fabric}}"
                                                    @if(!empty($productData->fabric) && $productData->fabric==$fabric)
                                                    selected
                                                  @endif
                                            >{{$fabric}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="url">product Weight</label>
                                    <input name="product_weight" type="text" class="form-control" id="product_weight"
                                           @if(!empty($productData['product_weight']))
                                           value="{{$productData->product_weight}}"
                                           @else
                                           value="{{old('product_weight')}}"
                                           @endif
                                           placeholder="Enter product weight">
                                </div>
                                <div class="form-group">
                                    <label>Select Sleeve</label>
                                    <select name="sleeve" id="sleeve" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
                                        @foreach($sleeves as $sleeve)
                                            <option value="{{$sleeve}}"
                                                    @if(!empty($productData->sleeve) && $productData->sleeve==$sleeve)
                                                    selected
                                                    @endif
                                            >{{$sleeve}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Select Brand</label>
                                    <select name="brand_id" id="brand_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
                                        @foreach($brands as $brand)
                                            <option value="{{$brand['id']}}"
                                            @if(!empty($productData->brand_id) && $productData->brand_id==$brand['id'])
                                                selected
                                            @endif
                                            >{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select Pattern</label>
                                    <select name="pattern" id="pattern" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
                                        @foreach($patterns as $pattern)
                                            <option value="{{$pattern}}">{{$pattern}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>wash Care</label>
                                    <textarea name="wash_care" class="form-control" rows="3" placeholder="Enter ...">@if(!empty($productData['wash_care'])){{$productData['wash_care']}}@else{{old('wash_care')}}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <label>product Description</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Enter ...">@if(!empty($productData['description'])){{$productData['description']}}@else{{old('description')}}@endif</textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">

                                <div class="form-group">
                                    <label>Select Fit</label>
                                    <select name="fit" id="fit" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
                                        @foreach($fits as $fit)
                                            <option value="{{$fit}}"
                                                @if(!empty($productData->fit) && $productData->fit==$fit)
                                                    selected
                                                @endif
                                            >{{$fit}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select Occasion</label>
                                    <select name="occasion" id="occasion" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
                                        @foreach($occassions as $occassion)
                                            <option
                                                value="{{$occassion}}"
                                                @if(!empty($productData->occasion) && $productData->occasion==$occassion)
                                                selected
                                                @endif
                                            >{{$occassion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Meta Title </label>
                                    <textarea name="meta_title" class="form-control" rows="3" placeholder="Enter ...">@if(!empty($productData['meta_title'])){{$productData['meta_title']}}@else{{old('meta_title')}}@endif</textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter ...">@if(!empty($productData['meta_description'])){{$productData['meta_description']}}@else{{old('meta_description')}}@endif</textarea>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="exampleInputFile">Image Product </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="main_image" type="file" class="custom-file-input" id="main_image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <P>Recommended Image is width:560 px height:700 px</P>
                                    <div>
                                        @if(!empty($productData->main_image))
                                        <img width="100px" height="100px" src="{{asset("/admin/images/product_images/small_image/".$productData->main_image)}}">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Featured Item </label>
                                   <input type="checkbox" value="Yes" name="is_featured"
                                   @if(!empty($productData['is_featured']) && $productData['is_featured']=='Yes') checked @endif
                                   >
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Meta keywords </label>
                                    <textarea name="meta_keywords" class="form-control" rows="3" placeholder="Enter ...">@if(!empty($productData['meta_keywords'])){{$productData['meta_keywords']}}@else{{old('meta_keywords')}}@endif</textarea>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="exampleInputFile">Video Product </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="product_video" type="file" class="custom-file-input" id="product_video">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($productData['product_video']))
                                    <div>
                                        <a href="{{url('admin/images/product_images/video_format/'.$productData['product_video'])}}" download >Download</a>|
                                        <a class="confirmDelete" href="javascript:void(0)" record="product-video" recordid="{{$productData['id']}}">Delete Video</a>
                                    </div>
                                @endif
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
