@extends('layouts.front.layout')
@section('contact')
<section class="main-container col1-layout" xmlns="http://www.w3.org/1999/html">
        <div class="main container">
            <div class="compare-list">
                <h2>Compare Products</h2>
                <div class="compare-area">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive cart-area">
                                    @if(count($compares)>0)
                                        @if(\Illuminate\Support\Facades\Session::has('success_message'))
                                            <div style="margin-top: 10px" class="alert alert-success" role="alert">
                                                {{\Illuminate\Support\Facades\Session::get('success_message')}}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="close" >
                                                    <span aria-label="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    <table class="shop_table cart table">
                                        <thead>
                                        <tr>
                                            <th class="table-head th-name uppercase">Product Name</th>
                                            @foreach($compares as $compare)
                                            <th class="table-head item-nam">{{$compare->product->product_name}}</th>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="cart_item">
                                            <td class="item-quality">Image</td>
                                            @foreach($compares as $compare)
                                                <td class="item-des">
                                                    <img height="200px" width="200px" src="{{asset("/admin/images/product_images/large_image/".$compare->product->main_image)}}">
                                                        <Button type="submit" >
                                                           <a class="confirmDelete" record="compare" recordid="{{$compare->id}}" href="javascript:void (0)"><i class="fa fa-close"></i></a>
                                                        </Button>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="item-quality">Color</td>
                                            @foreach($compares as $compare)
                                            <td class="item-des">{{$compare->product->product_color}}</td>
                                            @endforeach
                                        </tr>

                                        <tr class="cart_item">
                                            <td class="item-quality">Brand</td>
                                            @foreach($compares as $compare)
                                            <td class="item-des">{{$compare->product->brand->name}}</td>
                                            @endforeach
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="item-quality">Fabric</td>
                                            @foreach($compares as $compare)
                                            <td class="item-des">{{$compare->product->fabric}}</td>
                                            @endforeach
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="item-quality">Base Price</td>
                                            @foreach($compares as $compare)
                                            <td class="item-des">${{number_format($compare->product->product_price)}}</td>
                                            @endforeach
                                        </tr>
{{--                                        <tr class="cart_item">--}}
{{--                                            <td class="item-quality">Size</td>--}}
{{--                                            @foreach($compares as $compare)--}}
{{--                                                @foreach($compare->product->attribute->size as $size)--}}
{{--                                            <td class="item-des">{{$size}}</td>--}}
{{--                                                @endforeach--}}
{{--                                            @endforeach--}}
{{--                                        </tr>--}}
                                        <tr class="cart_item">
                                            <td class="item-quality">Discount</td>
                                            @foreach($compares as $compare)
                                                @if($compare->product->product_discount>0)
                                            <td class="item-des">%{{$compare->product->product_discount}}</td>
                                                @else
                                                    <td class="item-des">N/A</td>
                                                @endif

                                            @endforeach
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="item-quality">Sleeve</td>
                                            @foreach($compares as $compare)
                                            <td class="item-des">{{$compare->product->sleeve}}</td>
                                            @endforeach
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="item-quality">Pattern</td>
                                            @foreach($compares as $compare)
                                                <td class="item-des">{{$compare->product->pattern}}</td>
                                            @endforeach
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="item-quality">Fit</td>
                                            @foreach($compares as $compare)
                                                <td class="item-des">{{$compare->product->fit}}</td>
                                            @endforeach
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="item-quality">Overview</td>
                                            @foreach($compares as $compare)
                                            <td class="item-des">
                                                <p>{{$compare->product->meta_description}}</p>
                                            </td>
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                    @else
                                   <h2>Empty!</h2>
                                    <h3><img src="/front/images/signal.png">There is any product for comparing!</h3>
                                     <div><button  type="button" class="btn-home"><a href="{{url('/')}}"><span>Back To Home</span></a> </button></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
