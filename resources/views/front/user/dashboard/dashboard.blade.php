@extends('layouts.front.layout')
@section('contact')
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 col-xs-12">
            @yield('content')
            </section>
            @include('front.user.dashboard.aside')
        </div>
    </div>
</div>
@endsection
