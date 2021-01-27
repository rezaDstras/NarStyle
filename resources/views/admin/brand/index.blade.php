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
                            <li class="breadcrumb-item active">Brands</li>
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
                                <h3 class="card-title">Brand Table</h3>
                                <a href="{{url('/admin/add-edit-brand')}}" class="btn btn-success" style="float: right; max-width: 150px; display: inline-block">Add Brand</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="sections" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Number</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($brands as $key=>$brand)
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td>
                                                        <td>{{$brand->name}}</td>
                                                        <td>
                                                            &nbsp;&nbsp;
                                                            <a title="Edit Product" class="" href="{{url('admin/add-edit-brand/'.$brand->id)}}"><li class="fas fa-edit"></li></a>
                                                            &nbsp;&nbsp;
                                                            <a title="Delete Brand" class="confirmDelete" record="brand" recordid="{{$brand->id}}" href="javascript:void (0)"><li class="fas fa-trash"></li></a>
                                                            &nbsp;&nbsp;
                                                            @if($brand->status==1)
                                                                <a class="updateBrandStatus" id="brand-{{$brand->id}}" brand_id="{{$brand->id}}"
                                                                   href="javascript:void (0)">
                                                                <i class="fas fa-toggle-on" aria-hidden="true" status="active"></i>
                                                                </a>
                                                            @elseif($brand->status==0)
                                                                <a class="updateBrandStatus" id="brand-{{$brand->id}}" brand_id="{{$brand->id}}"
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
