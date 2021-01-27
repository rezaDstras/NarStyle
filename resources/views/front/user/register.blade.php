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
                <h2>Create an Account</h2>
            </div>
            <fieldset class="col2-set">
                <div class="col-2 registered-users"><strong>Register Customers</strong>
                    <form id="registerForm" action="{{url('/register-store')}}" method="post">
                        @csrf
                         <div class="content">
                        <ul class="form-list">
                            <li>
                                <label for="name">Name<span class="required">*</span></label>
                                <input type="text" title="name" class="input-text required-entry" id="name" value="" name="name">
                            </li>
                            <li>
                                <label for="mobile">Mobile<span class="required">*</span></label>
                                <input type="text" title="mobile" class="input-text required-entry" id="mobile" value="" name="mobile">
                            </li>
                            <li>
                                <label for="email">Email Address <span class="required">*</span></label>
                                <input type="email" title="Email Address" class="input-text required-entry" id="email" value="" name="email">
                            </li>
                            <li>
                                <label for="pass">Password <span class="required">*</span></label>
                                <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="password">
                            </li>
                        </ul>
                        <div class="buttons-set">
                            <button id="send2"  type="submit" class="button login"><span>SignIn</span></button>
                            <a class="forgot-word" href="{{url('/login')}}">Do You Have An Account?</a> </div>
                         </div>
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
