<div class="category-products filter_products" >
    <ul class="products-grid">
        @foreach($categoryProducts as $product)
            <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="item-inner">
                    <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="{{$product->product_name}}" href="{{url('/product/'.$product['product_name'])}}"> <img alt="Product tilte is here" src={{asset("/admin/images/product_images/large_image/".$product->main_image)}}> </a>
                            @if(strtotime($product->created_at)>strtotime("-30 days"))
                                <div class="new-label new-top-left">new</div>
                            @endif
                            @if($product->product_discount>0)
                                <div class="sale-label sale-top-right">Sale</div>
                            @endif
{{--                            <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a>--}}
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="info-inner">
                            <div class="item-title"> <a title="Product tilte is here" href="{{url('/product/'.$product['product_name'])}}">{{$product->product_name}} </a> </div>
                            <div class="item-content">
                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="price-box"> <span class="regular-price"> <span style="color: gray">Brand({{ucwords($product['brand']['name'])}})</span></span>
                                </div>
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
                                        {{$product->fabric}}/{{$product->sleeve}}/{{$product->fit}}/{{$product->pattern}}/{{$product->occasion}}
                                </div>
                                <div class="actions">
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><a href="{{url('/product/'.$product->product_name)}}"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></a></button>
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
