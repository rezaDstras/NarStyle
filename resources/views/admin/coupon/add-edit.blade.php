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
            <form method="post" name="couponForm" id="couponForm"
                  @if(empty($coupon['id']))
                  action="{{url('admin/add-edit-coupon')}}"
                  @else
                  action="{{url('admin/add-edit-coupon/'.$coupon['id'])}}"
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
                                    @if(empty($coupon['coupon_code']))
                                    <div class="form-group">
                                        <label for="coupon_option">Coupon Option</label><br>
                                        <span><input type="radio" id="AutomaticCoupon" name="coupon_option" value="Automatic" checked="">Automatic</span>
                                        &nbsp;&nbsp;<br>
                                        <span><input type="radio" id="ManualCoupon" name="coupon_option" value="Manual">Manual</span>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group" style="display: none" id="couponField">
                                        <label>Coupon Code</label>
                                        <input name="coupon_code" type="text" class="form-control" id="coupon_code">
                                    </div>
                                    @else
                                        <div class="form-group" >
                                            <input type="hidden" name="coupon_option" value="{{$coupon->coupon_option}}">
                                            <input type="hidden" name="coupon_code" value="{{$coupon->coupon_code}}">
                                        <label>Coupon Code</label>
                                            <br>
                                        <span><h4>{{$coupon->coupon_code}}</h4></span>
                                    @endif
                                </div>

                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select name="categories[]"  class="form-control select2 select2-hidden-accessible" multiple="" style="width: 100%;" >
                                            @foreach($categories as $section)
                                                <optgroup label="{{$section->name}}"></optgroup>
                                                @foreach($section['categories'] as $category)
                                                    <option value="{{$category->id}}" @if(in_array($category->id,$catCoupon)) selected="" @endif
                                                    >&nbsp;
                                                        {{$category->category_name}}</option>
                                                    @foreach($category['subcategories'] as $subcategory)
                                                        <option value="{{$subcategory->id}}"
                                                                @if(in_array($subcategory->id,$catCoupon)) selected="" @endif
                                                        >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;
                                                            {{$subcategory->category_name}}</option>
                                                    @endforeach
                                                @endforeach
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Select Users</label>
                                        <select name="users[]"  class="form-control select2 select2-hidden-accessible" data-live-search="" multiple="" style="width: 100%;" >
                                            @foreach($users as $user)
                                                <option value="{{$user->email}}"
                                                        @if(in_array($user['email'],$userCoupon)) selected @endif
                                                >{{$user->email}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="coupon_type">Coupon Type</label><br>
                                        <span><input type="radio"  name="coupon_type" value="Multiple times" checked=""
                                            @if(isset($coupon['coupon_type']) && $coupon['coupon_type'] == "Multiple times" ) checked=""@endif >
                                            Multiple times</span>
                                        &nbsp;&nbsp;<br>
                                        <span><input type="radio"  name="coupon_type" value="Single times"
                                             @if(isset($coupon['coupon_type']) && $coupon['coupon_type'] == "Single times" ) checked=""@endif >
                                            Single times</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="coupon_type">Amount Type</label><br>
                                        <span><input type="radio"  name="amount_type" value="Percentage" checked=""
                                            @if(isset($coupon['amount_type']) && $coupon['amount_type'] == "Percentage" ) checked=""@endif
                                            >Percentage(%)</span>
                                        &nbsp;&nbsp;<br>
                                        <span><input type="radio"  name="amount_type" value="Fixed"
                                            @if(isset($coupon['amount_type']) && $coupon['amount_type'] == "Fixed" ) checked=""@endif
                                            >Fixed($)</span>
                                    </div>
                                    <div class="form-group" >
                                        <label>Amount</label>
                                        <input name="amount" type="text" class="form-control" id="amount"  @if(isset($coupon['amount'])) value="{{$coupon['amount']}}" @endif>
                                    </div>
                                    <div class="form-group" >
                                        <label>Expiry Date</label>
                                        <input name="expiry_date" type="text" class="form-control" id="expiry_date"
                                               @if(isset($coupon['expiry_date'])) value="{{$coupon['expiry_date']}}" @endif
                                         data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
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
