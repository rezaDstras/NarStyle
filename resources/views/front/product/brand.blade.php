@extends('layouts.front.layout')
@section('contact')
<div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <article class="col-main">
                    <div class="page-title">
                        <h1>Result(s) Products For :<span style="color: #e40046"> "{{$brand->name}}"</span></h1>
                    </div>
                    @if(count($products)>0)
                        <div class="category-products">
                            <ol class="products-list" id="products-list">
                                @foreach($products as $product)
                                    <li class="item">
                                        <div class="product-image"> <a href="{{url('/product/'.$product->product_name)}}" title="Product tilte is here"> <figure><img class="small-image" src="{{asset("/admin/images/product_images/large_image/".$product->main_image)}}" > </figure></a>
                                            @if(strtotime($product->created_at)>strtotime("-30 days"))
                                                <div class="new-label new-top-left">new</div>
                                            @endif
                                            @if($product->product_discount>0)
                                                <div class="sale-label sale-top-right">Sale</div>
                                            @endif
                                        </div>
                                        <div class="product-shop">
                                            <h2 class="product-name"><a href="{{url('/product/'.$product->product_name)}}" title="Product tilte is here">{{$product->product_name}}({{$brand->name}})</a></h2>
                                            <div class="desc std">
                                                <p>{{$product->description}}</p>
                                            </div>
                                            <div class="price-box">
                                                @if($product->product_discount>0)
                                                    <?php
                                                    $calculate_discount=100-$product->product_discount;
                                                    $discount=($product->product_price/100)*$calculate_discount;
                                                    ?>
                                                    <p class="old-price"> <span class="price-label"></span><span class="price"> ${{number_format($product->product_price)}} </span></p>
                                                    <p class="special-price"> <span class="price-label"></span><span class="price"> ${{number_format($discount)}} </span></p>
                                                @else
                                                    <p class="special-price"> <span class="price-label"></span><span class="price"> ${{number_format($product->product_price)}} </span></p>
                                                @endif
                                            </div>
                                            <div class="actions">
                                                <button class="button btn-cart" title="Add to Cart" type="button"><span><a href="{{url('/product/'.$product['product_name'])}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a></span></button>
                                                <span class="add-to-links"> <a title="Add to Wishlist" class="button link-wishlist wish_product" data-id="{{$product['id']}}" style="cursor: pointer"><i class="fa fa-heart"></i>Add to Wishlist</a>
                                            <a title="Add to Compare" class="button link-compare compare_product" data-id="{{$product['id']}}" style="cursor: pointer"><i class="fa fa-signal"></i>Add to Compare</a> </span></div>
                                        </div>
                                    </li>
                                @endforeach

                            </ol>
                        </div>
                    @else
                        <section class="col-sm-12 col-xs-12">
                            <div class="cart-page-area">
                                <div class="table-responsive">
                                    <h2>Empty!</h2>
                                    <h3><img src="/front/images/signal.png">There is any product! </h3>
                                    <div><button type="button" class="btn-home"><a href="http://127.0.0.1:8000"><span>Back To Home</span></a> </button></div>
                                </div>
                            </div>
                        </section>
                    @endif
                    <div class="toolbar bottom">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <div class="pages">
                                    <ul class="pagination">
                                        {{$products->links()}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection
