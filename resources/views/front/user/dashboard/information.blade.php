@extends('front.user.dashboard.dashboard')
@section('content')
<div class="col-main">
    @if(\Illuminate\Support\Facades\Session::has('success_message'))
        <div style="margin-top: 10px" class="alert alert-success" role="alert">
            {{\Illuminate\Support\Facades\Session::get('success_message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="close" >
                <span aria-label="true">&times;</span>
            </button>
        </div>
    @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form id="informationForm" method="post" action="{{url('/account/information')}}">
        @csrf
        <div class="my-account">
                <div class="page-title">
                    <h2>Edit Account Information</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="title-box">
                            <h3>Account Information</h3>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <div class="form-group">
                                    <label for="name"> Name <span class="required">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="" value="{{$userDetail->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile <span class="required">*</span></label>
                                    <input type="text" name="mobile" id="mobile" class="form-control"  value="{{$userDetail->mobile}}">
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label for="email">Email Address <span class="required">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" disabled  value="{{$userDetail->email}}">
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label for="country">Country<span class="required">*</span></label>
                                    <select name="country" id="country" class="form-control">
                                        <option>Select Country</option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->country_name}}"
                                        @if($userDetail['country']==$countries->country_name)
                                            selected
                                                @endif
                                        >{{$countries->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="title-box">
                            <h3>Change Password</h3>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <div class="form-group">
                                    <label for="address">Address<span class="required">*</span></label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{$userDetail->address}}">
                                </div>
                            </li>
{{--                            <li>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="cpassword">Current Password <span class="required">*</span></label>--}}
{{--                                    <input type="password" name="cpassword" id="cpassword" class="form-control">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="npassword">New Password <span class="required">*</span></label>--}}
{{--                                    <input type="password" name="npassword" id="npassword" class="form-control">--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="cnewpassword">Confirm New Password <span class="required">*</span></label>--}}
{{--                                    <input type="password" name="cnewpassword" id="cnewpassword" class="form-control">--}}
{{--                                </div>--}}
{{--                            </li>--}}
                        </ul>
                    </div>

                </div>
                <div class="buttons-set">
                    <button id="send2"  type="submit" class="button login"><span>Save</span></button>
            </div>
    </form>
        </div>
@endsection
