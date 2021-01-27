@extends('layouts.front.layout')
@section('contact')
<section class="main-container col1-layout">
    <div class="main container">
        @if(\Illuminate\Support\Facades\Session::has('error_message'))
            <div style="margin-top: 10px" class="alert alert-danger" role="alert">
                {{\Illuminate\Support\Facades\Session::get('error_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close" >
                    <span aria-label="true">&times;</span>
                </button>
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
        <div class="account-login">
            <div class="page-title">
                <h2>Login or Create an Account</h2>
            </div>
            <fieldset class="col2-set">
                <div class="col-1 new-users"><strong>New Customers</strong>
                    <div class="content" style="margin: 10px 0px">
                        <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                        <div class="buttons-set">
                            <a class="button create-account" href="{{url('/register')}}"><span>Create an Account</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-2 registered-users"><strong>Registered Customers</strong>
                    <form id="loginForm" action="{{url('/login-store')}}" method="post" >
                        @csrf
                        <div class="content">
                            <p>If you have an account with us, please log in.</p>
                            <ul class="form-list">
                                <li>
                                    <label for="email">Email Address <span class="required">*</span></label>
                                    <input type="text" title="Email Address" required class="input-text required-entry" id="email" value="" name="email">
                                </li>
                                <li>
                                    <label for="pass">Password <span class="required">*</span></label>
                                    <input type="password" title="Password" required id="password" class="input-text required-entry validate-password" name="password">
                                </li>
                            </ul>
                            <div class="buttons-set">
                                <button id="send2"  type="submit" class="button login"><span>Login</span></button>
                                <a class="forgot-word" href="{{url('forgot-password')}}">Forgot Your Password?</a> </div>
                        </div>
                    </form>

                </div>
            </fieldset>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</section>
@endsection
