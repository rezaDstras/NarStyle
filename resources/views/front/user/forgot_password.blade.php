@extends('layouts.front.layout')
@section('contact')
<section class="main-container col1-layout">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
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
                <h2>Forgot Password</h2>
            </div>
            <fieldset>
                <div class="registered-users">
                    <div class="content">
                        <p>Enter Your Email to get new password!</p>
                        <form id="forgotPasswordForm" action="{{url('/forgot-password')}}"  method="post">
                            @csrf
                            <ul class="form-list">
                                <li>
                                    <label for="pass">Email <span class="required">*</span></label>
                                    <input type="email" title="email" class="form-control" id="email" name="email" required="">
                                </li>
                            </ul>

                            <div class="buttons-set">
                                <button id="send2"  type="submit" class="button login"><span>Submit</span></button>
                            </div>
                        </form>
                    </div>
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
