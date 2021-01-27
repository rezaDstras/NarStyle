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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
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
                                <h3 class="card-title">Section Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="sections" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Number</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($section as $key=>$value)
                                                <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td>
                                                    <td>{{$value->name}}</td>
                                                    <td>
                                                        @if($value->status==1)
                                                            <a class="updateSectionStatus" id="section-{{$value->id}}" section_id="{{$value->id}}"
                                                            href="javascript:void (0)">
                                                                active</a>
                                                        @elseif($value->status==0)
                                                            <a class="updateSectionStatus" id="section-{{$value->id}}" section_id="{{$value->id}}"
                                                               href="javascript:void (0)">
                                                                inactive</a>
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
