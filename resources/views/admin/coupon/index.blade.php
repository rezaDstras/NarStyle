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
                            <li class="breadcrumb-item active">Coupons</li>
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
                                <h3 class="card-title">Coupon Table</h3>
                                <a href="{{url('/admin/add-edit-coupon')}}" class="btn btn-success" style="float: right; max-width: 150px; display: inline-block">Add Coupon</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="sections" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Number</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Code</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Coupon Type</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Amount</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Expiry Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($coupons as $key=>$coupon)
                                                    <tr role="row" class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td>
                                                        <td>{{$coupon->coupon_code}}</td>
                                                        <td>{{$coupon->coupon_type}}</td>
                                                        <td>
                                                            @if($coupon->amount_type!='Percentage')
                                                                $
                                                            @endif
                                                            {{$coupon->amount}}
                                                            @if($coupon->amount_type == 'Percentage' )
                                                                %
                                                            @endif

                                                        </td>
                                                        <td>{{$coupon->expiry_date}}</td>
                                                        <td>
                                                            &nbsp;&nbsp;
                                                            <a title="Edit Coupon" class="" href="{{url('admin/add-edit-coupon/'.$coupon->id)}}"><li class="fas fa-edit"></li></a>
                                                            &nbsp;&nbsp;
                                                            <a title="Delete Coupon" class="confirmDelete" record="coupon" recordid="{{$coupon->id}}" href="javascript:void (0)"><li class="fas fa-trash"></li></a>
                                                            &nbsp;&nbsp;
                                                            @if($coupon->status==1)
                                                                <a class="updateCouponStatus" id="coupon-{{$coupon->id}}" coupon_id="{{$coupon->id}}"
                                                                   href="javascript:void (0)">
                                                                <i class="fas fa-toggle-on" aria-hidden="true" status="active"></i>
                                                                </a>
                                                            @elseif($coupon->status==0)
                                                                <a class="updateCouponStatus" id="coupon-{{$coupon->id}}" coupon_id="{{$coupon->id}}"
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
