@extends('layouts.admin.index')
@section('content')
    <div class="content-wrapper" style="min-height: 1322.44px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Banners</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Banner Table</h3>
                                <a href="{{url('/admin/add-edit-banner')}}" class="btn btn-success" style="float: right; max-width: 150px; display: inline-block">Add Banner</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="sections" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Title</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">link</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Image</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($banners as $key=>$banner)
                                                    <tr role="row" class="odd">
                                                        <td>{{$banner->title}}</td>
                                                        <td>{{$banner->link}}</td>
                                                        <td><img width="120px" height="120px" src="{{asset('admin/images/banner_images/'.$banner->image)}}"></td>
                                                        <td>
                                                            &nbsp;&nbsp;
                                                            <a title="Edit Product" class="" href="{{url('admin/add-edit-banner/'.$banner->id)}}"><li class="fas fa-edit"></li></a>
                                                            &nbsp;&nbsp;
                                                            <a title="Delete Banner" class="confirmDelete" record="banner" recordid="{{$banner->id}}" href="javascript:void (0)"><li class="fas fa-trash"></li></a>
                                                            &nbsp;&nbsp;
                                                            @if($banner->status==1)
                                                                <a class="updateBannerStatus" id="banner-{{$banner->id}}" banner_id="{{$banner->id}}"
                                                                   href="javascript:void (0)">
                                                                <i class="fas fa-toggle-on" aria-hidden="true" status="active"></i>
                                                                </a>
                                                            @elseif($banner->status==0)
                                                                <a class="updateBannerStatus" id="banner-{{$banner->id}}" banner_id="{{$banner->id}}"
                                                                   href="javascript:void (0)">
                                                                    <i class="fas fa-toggle-off" aria-hidden="true" status="inactive"></i>
                                                                    </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
