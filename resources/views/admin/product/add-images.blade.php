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
                            <li class="breadcrumb-item active">Products Images</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="post" name="productForm" id="productForm" action="{{url('admin/add-images/'.$productData['id'])}}" enctype="multipart/form-data">
                @if(\Illuminate\Support\Facades\Session::has('success_message'))
                    <div style="margin-top: 10px" class="alert alert-success" role="alert">
                        {{\Illuminate\Support\Facades\Session::get('success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="close" >
                            <span aria-label="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Session::has('error_message'))
                    <div style="margin-top: 10px" class="alert alert-danger" role="alert">
                        {{\Illuminate\Support\Facades\Session::get('error_message')}}
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
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="product_name">product Name :&nbsp; {{ucwords($productData->product_name)}}</label>

                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">product Code:&nbsp; {{ucwords($productData->product_code)}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label  for="product_name">product Color:&nbsp; {{ucwords($productData->product_color)}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_discount">Product Price:&nbsp; {{number_format($productData->product_price)}}</label>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="form-group">
                                    @if(!empty($productData->main_image))
                                        <img width="200px" height="200px" src="{{asset("/admin/images/product_images/small_image/".$productData->main_image)}}">
                                    @endif
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="field_wrapper">
                                        <div>
                                            <div>
                                                <label>You can chose several related images</label>
                                            </div>
                                            <input id="image" multiple="" type="file" name="image[]"  />
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ucwords($productData->product_name)}}&nbsp; Images Table</h3>
                </div>
                <form method="post" name="ImageForm" id="ImageForm" action="{{url('admin/edit-images/'.$productData['id'])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div id="categories" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Number</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Image</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Action</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($productData['images'] as $key=>$image)
                                            <input style="display: none" type="text" value="{{$image->id}}" name="attrId[]">
                                            <tr role="row" class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td>
                                                <td>
                                                    <img width="120px" height="120px" src={{asset("/admin/images/product_images/small_image/".$image->image)}}>
                                                </td>
                                                <td>
                                                    @if($image->status==1)
                                                        <a class="updateImageStatus" id="image-{{$image->id}}" image_id="{{$image->id}}"
                                                           href="javascript:void (0)">
                                                            active</a>
                                                    @elseif($image->status==0)
                                                        <a class="updateImageStatus" id="image-{{$image->id}}" image_id="{{$image->id}}"
                                                           href="javascript:void (0)">
                                                            inactive</a>
                                                    @endif
                                                    &nbsp;&nbsp;
                                                        <a title="Delete Image" class="confirmDelete" record="image" recordid="{{$image->id}}" href="javascript:void (0)"><li class="fas fa-trash"></li></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit" >Update</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
