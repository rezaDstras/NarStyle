@extends('layouts.front.layout')
@section('contact')
<div class="breadcrumbs">
     <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li><a href="{{url('/')}}" title="Go to Home Page">Home</a><span>/</span></li>
                        <li><strong><a  title="shop" >Shop</a></strong></li>
                    </ul>
                </div>
            </div>
      </div>
</div>
<div class="main-container col1-layout">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <article class="col-main">
                    <div class="page-title">
                        <h2>Shop</h2>
                    </div>
                    <div class="toolbar">
                        <div id="sort-by">
                            <label class="left">Sort By: </label>
                            <ul>
                                <li><a href="#">Position<span class="right-arrow"></span></a>
                                    <ul>
                                        <li><a href="#">Name</a></li>
                                        <li><a href="#">Price</a></li>
                                        <li><a href="#">Position</a></li>
                                    </ul>
                                </li>
                            </ul>
                    </div>
                    <div class="category-products">
                        <ul class="products-grid">
                            @foreach($products as $product)
                            <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href=""> <img alt="{{$product->product_name}}" src="{{asset("/admin/images/product_images/large_image/".$product->main_image)}}"> </a>
                                            @if(strtotime($product->created_at)>strtotime("-30 days"))
                                                <div class="new-label new-top-left">new</div>
                                            @endif
                                            @if($product->product_discount>0)
                                                <div class="sale-label sale-top-right">Sale</div>
                                            @endif
{{--                                            <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a>--}}
                                            <div class="mask-left-shop wish_product" data-id="{{$product['id']}}" style="cursor: pointer"><i class="fa fa-heart"></i></div>
                                            <div class="mask-right-shop compare_product" data-id="{{$product['id']}}" style="cursor: pointer"> <i class="fa fa-signal"></i></div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Product tilte is here" href="{{url('/product/'.$product->product_name)}}">{{$product->product_name}}</a> </div>
                                            <div class="item-content">
                                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                <div class="item-price">
                                                    @if($product->product_discount>0)
                                                        <?php
                                                        $calculate_discount=100-$product->product_discount;
                                                        $discount=($product->product_price/100)*$calculate_discount;
                                                        ?>
                                                        <div class="price-box"> <span class="regular-price"> <span class="price">${{number_format($discount)}}</span></span>
                                                            <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">${{number_format($product->product_price)}}</span> </p>
                                                        </div>
                                                    @else
                                                        <div class="price-box"> <span class="regular-price"> <span class="price">${{number_format($product->product_price)}}</span></span></div>
                                                    @endif
                                                </div>
                                                <div class="actions">
                                                    <div class="add_cart">
                                                        <button class="button btn-cart" type="button"><span><a href="{{url('/product/'.$product['product_name'])}}"><i class="fa fa-search"></i> Show Detail</a></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="toolbar bottom">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <div class="pages">
                                    <ul class="pagination">
                                        {{ $products->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>

@endsection
