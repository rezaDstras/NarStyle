@extends('layouts.front.layout')
@section('contact')
<section class="content-wrapper">
    <div class="container">
        <div class="std">
            <div class="page-not-found">
                <h2>404</h2>
                <h3><img src="/front/images/signal.png">Oops! The Page you requested was not found!</h3>
                <div><a href="{{url('/')}}" type="button" class="btn-home"><span>Back To Home</span></a></div>
            </div>
        </div>
    </div>
</section>
@endsection
