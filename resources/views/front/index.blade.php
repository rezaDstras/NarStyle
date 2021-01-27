@extends('layouts.front.layout')
@section('contact')
    <!-- Revslider -->
    @include('front.Home_banner')
    <!-- Main Container -->
    <div class="container">
        <div class="support-policy-box">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="support-policy"> <i class="fa fa-truck"></i>
                        <div class="content">Free Shipping on order over $49</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="support-policy"> <i class="fa fa-phone"></i>
                        <div class="content">Need Help +1 123 456 7890</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="support-policy"> <i class="fa fa-refresh"></i>
                        <div class="content">30 days return Service</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="col-main">
                        <div class="jtv-featured-products">
                            <div class="slider-items-products">
                                <div class="jtv-new-title">
                                    <h2>Featured Products</h2>
                                </div>
                                <div id="featured-slider" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col4 products-grid">
                                        @foreach($featuredProducts as $item)
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="item-img">
                                                    <div class="item-img-info"><a class="product-image" title="{{$item->product_name}}" href="{{url('/product/'.$item['product_name'])}}"> <img alt="Product tilte is here" src={{asset("/admin/images/product_images/large_image/".$item->main_image)}}> </a>
                                                        <div class="new-label new-top-left">new</div>
                                                        @if($item->product_discount>0)
                                                        <div class="sale-label sale-top-right">Sale</div>
                                                        @endif
                                                        <div class="mask-shop-white"></div>
{{--                                                        <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a>--}}
                                                            <div class="mask-left-shop wish_product" data-id="{{$item['id']}}" style="cursor: pointer"><i class="fa fa-heart"></i></div>
                                                            <div class="mask-right-shop compare_product" data-id="{{$item['id']}}" style="cursor: pointer"> <i class="fa fa-signal"></i></div>
                                                         </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"> <a title="Product tilte is here" href="{{url('/product/'.$item['product_name'])}}">{{$item->product_name}}</a> </div>
                                                        <div class="item-content">
                                                            <div class="rating">
                                                                <?php $vote=vote($item['id']); ?>
                                                                @if($vote>=10)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($vote>=20)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($vote>=30)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($vote>=40)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($vote>=50)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            </div>
                                                            <div class="item-price">
                                                                @if($item->product_discount>0)
                                                                    <?php
                                                                    $calculate_discount=100-$item->product_discount;
                                                                    $discount=($item->product_price/100)*$calculate_discount;
                                                                    ?>
                                                                        <div class="price-box"> <span class="regular-price"> <span class="price">${{number_format($discount)}}</span></span>
                                                                            <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">${{number_format($item->product_price)}}</span> </p>
                                                                        </div>
                                                                @else
                                                                    <div class="price-box"> <span class="regular-price"> <span class="price">${{number_format($item->product_price)}}</span></span></div>
                                                                @endif

                                                            </div>
                                                            <div class="actions">
                                                                <div class="add_cart">
                                                                    <button class="button btn-cart" type="button"><a href="{{url('/product/'.$item['product_name'])}}"><span><i class="fa fa-search"></i> Show Detail</a></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Trending Products Slider -->
                    <div class="jtv-trending-products">
                        <div class="slider-items-products">
                            <div class="jtv-new-title">
                                <h2>Latest Products</h2>
                            </div>
                            <div id="trending-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col4 products-grid">
                                    @foreach($latestProducts as $newProduct)
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="{{url('/product/'.$newProduct['product_name'])}}"> <img alt="Product tilte is here" src={{asset("/admin/images/product_images/large_image/".$newProduct->main_image)}}> </a>
                                                    @if(strtotime($newProduct->created_at)>strtotime("-30 days"))
                                                    <div class="new-label new-top-left">new</div>
                                                    @endif
                                                    @if($newProduct->product_discount>0)
                                                        <div class="sale-label sale-top-right">Sale</div>
                                                    @endif
                                                    <div class="mask-shop-white"></div>

{{--                                                    <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a>--}}
                                                    <div class="mask-left-shop wish_product" data-id="{{$newProduct['id']}}" style="cursor: pointer"><i class="fa fa-heart"></i></div>
                                                    <div class="mask-right-shop compare_product" data-id="{{$newProduct['id']}}" style="cursor: pointer"> <i class="fa fa-signal"></i></div>
                                                    </a> </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"> <a title="Product tilte is here" href="{{url('/product/'.$newProduct['product_name'])}}">{{$newProduct->product_name}} </a> </div>
                                                    <div class="item-content">
                                                        <div class="rating">
                                                            <?php $vote=vote($newProduct['id']); ?>
                                                                @if($vote>=10)
                                                                     <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($vote>=20)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($vote>=30)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($vote>=40)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($vote>=50)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                        </div>
                                                        <div class="price-box"> <span class="regular-price"> <span style="color: grey">{{$newProduct->product_code}}&nbsp;({{ucwords($newProduct->product_color)}})</span></span>
                                                        </div>
                                                        <div class="item-price">
                                                            @if($newProduct->product_discount>0)
                                                                <?php
                                                                $calculate_discount=100-$newProduct->product_discount;
                                                                $discount=($newProduct->product_price/100)*$calculate_discount;
                                                                ?>
                                                                <div class="price-box"> <span class="regular-price"> <span class="price">${{number_format($discount)}}</span></span>
                                                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">${{number_format($newProduct->product_price)}}</span> </p>
                                                                </div>
                                                            @else
                                                                <div class="price-box"> <span class="regular-price"> <span class="price">${{number_format($newProduct->product_price)}}</span></span></div>
                                                            @endif
                                                        </div>
                                                        <div class="actions">
                                                            <div class="add_cart">
                                                                <button class="button btn-cart" type="button"><span><a href="{{url('/product/'.$newProduct['product_name'])}}"><i class="fa fa-search"></i> Show Detail</a></span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Latest Products Slider -->
                </div>
            </div>
        </div>
    </section>
    <!-- Collection Banner -->
    <div class="jtv-collection-area">
        <div class="container">
            <div class="column-right pull-left col-sm-4 no-padding"> <a href="#"> <img src="/front/images/women-top.jpg" alt="Top Collections"> </a>
                <div class="col-right-text">
                    <h5 class="text-uppercase">Top Collections <span> 35% </span> get it now</h5>
                </div>
            </div>
            <div class="column-left pull-right col-sm-8 no-padding">
                <div class="column-left-top">
                    <div class="col-left-top-left pull-left col-sm-8 no-padding"> <a href="#"> <img src="/front/images/men-suits.jpg" alt="Men's Suits"> </a>
                        <div class="col-left-top-left-text">
                            <h5 class="text-uppercase">Dressing for your Wedding</h5>
                            <h3 class="text-uppercase">Men's Suits</h3>
                            <h5 class="text-uppercase">Look Good, Feel Good</h5>
                        </div>
                    </div>
                    <div class="col-left-top-right pull-right col-sm-4 no-padding"> <a href="#"> <img src="/front/images/footwear.jpg" alt="footwear"> </a>
                        <div class="col-left-top-right-text text-center">
                            <h5 class="text-uppercase">Footwear Fashion Sale</h5>
                            <h3>50%</h3>
                            <h5 class="text-uppercase">Buy 1, Get 1</h5>
                        </div>
                    </div>
                </div>
                <div class="column-left-bottom col-sm-12 no-padding">
                    <div class="col-left-bottom-left pull-left col-sm-4 no-padding"> <a href="#"> <img src="/front/images/handbag.jpg" alt="Handbag"> </a>
                        <div class="col-left-bottom-left-text">
                            <h5 class="text-uppercase">What's New?</h5>
                            <h3 class="text-uppercase">Bag's</h3>
                            <h5 class="text-uppercase">Everyday<br>
                                Low Prices</h5>
                        </div>
                    </div>
                    <div class="col-left-bottom-right pull-right col-sm-8 no-padding"> <a href="#"> <img src="/front/images/watch-banner.jpg" alt="Watch"> </a>
                        <div class="col-left-bottom-right-text">
                            <h5 class="text-uppercase">Never Miss a Second</h5>
                            <h3 class="text-uppercase">Watch</h3>
                            <h5 class="text-uppercase">Time to buy a watch!</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- collection area end -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div class="jtv-hot-deal-product">
                    <div class="jtv-new-title">
                        <h2>Deals Of The Day</h2>
                    </div>
                    <ul class="products-grid">
                        <li class="right-space two-height item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="#" title="Product tilte is here" class="product-image"><img src={{asset("/admin/images/product_images/large_image/".$topDeal->main_image)}} > </a>
                                        <div class="hot-label hot-top-left">Hot Deal</div>
                                        <div class="mask-shop-white"></div>
{{--                                        <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a>--}}
                                        <div class="mask-left-shop wish_product" data-id="{{$topDeal['id']}}" style="cursor: pointer"><i class="fa fa-heart"></i></div>
                                        <div class="mask-right-shop compare_product" data-id="{{$topDeal['id']}}" style="cursor: pointer"> <i class="fa fa-signal"></i></div>
{{--                                    <div class="jtv-timer-box">--}}
{{--                                        <div class="countbox_1 timer-grid"></div>--}}
{{--                                    </div>--}}
                                </div>

                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="Product tilte is here" href="{{url('/product/'.$topDeal->product_name)}}">{{$topDeal->product_name}}</a> </div>
                                        <div class="item-content">
{{--                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>--}}
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">${{$topDeal->product_price}}</span></span></div>
                                            </div>
                                            <div class="actions">
                                                <div class="add_cart">
                                                    <button class="button btn-cart" type="button"><a  href="{{url('/product/'.$topDeal['product_name'])}}"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 hidden-sm">
                <div class="sidebar-banner">
                    <div class="jtv-top-banner"> <a href="{{url('/shop')}}"> <img src="/front/images/banner3.jpg" alt="banner"> </a> </div>
                    <div class="jtv-top-banner"> <a href="{{url('/shop')}}"> <img src="/front/images/banner4.jpg" alt="banner"> </a> </div></div>
            </div>
            <!-- Top Seller Slider -->
            <div class="col-sm-4 col-xs-12">
                <div class="jtv-top-products">
                    <div class="slider-items-products">
                        <div class="jtv-new-title">
                            <h2>Top Seller</h2>
                        </div>
                        <div id="top-products-slider" class="product-flexslider hidden-buttons">
                            <div class="slider-items slider-width-col4 products-grid">
                                @foreach($latestProducts as $newProduct)
                                <div class="item">
                                    <div class="item-inner">
                                        <div class="item-img">
                                            <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src={{asset("/admin/images/product_images/large_image/".$newProduct->main_image)}}> </a>
                                                @if(strtotime($newProduct->created_at)>strtotime("-30 days"))
                                                    <div class="new-label new-top-left">new</div>
                                                @endif
                                                @if($newProduct->product_discount>0)
                                                    <div class="sale-label sale-top-right">Sale</div>
                                                @endif
{{--                                                <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a>--}}
                                                <div class="mask-left-shop wish_product" data-id="{{$newProduct['id']}}" style="cursor: pointer"><i class="fa fa-heart"></i></div>
                                                <div class="mask-right-shop compare_product" data-id="{{$newProduct['id']}}" style="cursor: pointer"> <i class="fa fa-signal"></i></div>
                                            </div>
                                        </div>
                                        <div class="item-info">
                                            <div class="info-inner">
                                                <div class="item-title"> <a title="Product tilte is here" href="{{url('/product/'.$newProduct->product_name)}}">{{$newProduct->product_name}} </a> </div>
                                                <div class="item-content">
{{--                                                    <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>--}}
                                                    <div class="item-price">
                                                        <div class="price-box"> <span class="regular-price"> <span class="price">${{$newProduct->product_price}} </span></span></div>
                                                    </div>
                                                    <div class="actions">
                                                        <div class="add_cart">
                                                            <button class="button btn-cart" type="button"><a  href="{{url('/product/'.$newProduct['product_name'])}}"><span ><i class="fa fa-shopping-cart"></i> Add to Cart</span></a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Top Seller Slider -->
            </div>
        </div>
    </div>

    <!-- Brand Logo -->
    @include('front.home_brand')
@endsection
