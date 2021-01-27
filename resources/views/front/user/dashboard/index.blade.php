@extends('front.user.dashboard.dashboard')
@section('content')
    <div class="col-main">
        <div class="my-account">
            <div class="page-title">
                <h2>My Dashboard</h2>
            </div>
            <div class="dashboard">
                <div class="welcome-msg"> <strong>Hello, {{ucwords($userDetail->name)}}!</strong>
                    <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
                </div>
                <div class="box-account">
                    <div class="page-title">
                        <h2>Account Information</h2>
                    </div>
                    <div class="col2-set">
                        <div class="col-1">
                            <h5>Contact Information</h5>
                            <a href="{{url('/account/information')}}">Edit</a>
                            <p>{{ucwords($userDetail->name)}}<br>
                                {{$userDetail->email}}<br>
                                <a href="{{url('/account/information')}}">Change Password</a> </p>
                        </div>
                        <div class="col-2">
                            <div class="col-1">
                                <h5>Primary Address</h5>
                                <address>
                                    {{$userDetail->address}}<br>
                                    {{ucwords($userDetail->country)}}<br>
                                    {{$userDetail->mobile}} <br>
                                    <a href="{{url('/account/information')}}">Manage Addresses</a>
                                </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
