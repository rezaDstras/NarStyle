@extends('layouts.front.layout')
@section('contact')
<div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"> <a href="{{url('/')}}" title="Go to Home Page">Home</a> <span>/</span></li>
                        <li><a href="{{url($productDetail['category']['url'])}}" title="">{{$productDetail['category']['category_name']}}</a> <span>/ </span></li>
                        <li> <strong>{{$productDetail->product_name}} </strong> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<section class="main-container col1-layout">
        <div class="container">
            <div class="row">
                <div class="product-view">
                    <div class="product-essential">
                        @if(\Illuminate\Support\Facades\Session::has('success_message'))
                            <div style="margin-top: 10px" class="alert alert-success" role="alert">
                                {{\Illuminate\Support\Facades\Session::get('success_message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="close" >
                                    <span aria-label="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            @if(\Illuminate\Support\Facades\Session::has('error_message'))
                                <div style="margin-top: 10px" class="alert alert-danger" role="alert">
                                    {{\Illuminate\Support\Facades\Session::get('error_message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close" >
                                        <span aria-label="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="product-img-box col-lg-4 col-sm-5 col-xs-12">
                                <div class="product-image">
                                    <div class="product-full">
                                        <div class="new-label new-top-left"> New </div>
                                        <figure><img id="product-zoom" src="{{asset("/admin/images/product_images/large_image/".$productDetail->main_image)}}"  data-zoom-image="{{asset("/admin/images/product_images/large_image/".$productDetail->main_image)}}" alt="product-image"/> </figure></div>
                                    <div class="more-views">
                                        <div class="slider-items-products">
                                            <div id="jtv-more-views-img" class="product-flexslider hidden-buttons product-img-thumb">
                                                <div class="slider-items slider-width-col4 block-content owl-carousel owl-theme" style="opacity: 1; display: block;">
                                                    <div class="owl-wrapper-outer">
                                                        <div class="owl-wrapper" style="width: 940px; left: 0px; display: block;">
                                                            @foreach($productDetail['images'] as $image)
                                                            <div class="owl-item" style="width: 94px;">
                                                                <div class="more-views-items">
                                                                    <a href="{{asset("/admin/images/product_images/large_image/".$image->image)}}" data-image="{{asset("/admin/images/product_images/large_image/".$image->image)}}" data-zoom-image="{{asset("/admin/images/product_images/large_image/".$image->image)}}">
                                                                        <figure><img id="product-zoom" src="{{asset("/admin/images/product_images/large_image/".$image->image)}}" alt="product-image"></figure>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"><a class="flex-prev"></a></div><div class="owl-next"><a class="flex-next"></a></div></div></div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: more-images -->
                            </div>
                            <div class="product-shop col-lg-8 col-sm-7 col-xs-12">
                                <div class="product-name">
                                    <h1>{{$productDetail->product_name}}</h1>
                                    <h5 style="color:grey;">Brand : {{ucwords($productDetail['brand']['name'])}}</h5>
                                </div>
                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="price-block">
                                    <div class="price-box">

                                        @if($productDetail->product_discount > 0)
                                            <?php
                                            $calculate_discount=100-$productDetail->product_discount;
                                            $discount_price=($productDetail->product_price/100)*$calculate_discount;
                                            ?>
                                                <p class="special-price"> <span class="price-label">Special Price</span><span class="price getAttrPrice">${{number_format($discount_price)}}</span></p>
                                                <p class="old-price"> <span class="price-label">Regular Price:</span><span class="price getAttrOldPrice"> ${{number_format($productDetail->product_price)}} </span></p>
                                        @else
                                                <p class="special-price"> <span class="price-label">Special Price</span><span class="price getAttrPrice">${{number_format($productDetail->product_price)}}</span></p>
                                         @endif
                                    @if($totalStock>0)
                                          <p class="availability in-stock"><span>In Stock ({{$totalStock}})</span></p>
                                         @else
                                          <p class="availability out-of-stock"><span>Out Of Stock</span></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="short-description">
                                    <h2>Code:{{$productDetail->product_code}}</h2>
                                    <h2>Quick Overview</h2>
                                    <p>{{$productDetail->meta_description}}</p>
                                    <br>
                                    <p></p>
                                </div>
                                {{--Add To Cart--}}
                                @if(count($productDetail['attributes'])>0)
                                <div class="add-to-box">
                                    <form action="{{url('/add_to_cart')}}" method="post" >
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                       <div class="add-to-cart">
                                        <div class="pull-left">
                                            <input type="hidden"  name="product_id" value="{{$productDetail['id']}}">
                                            <div class="custom pull-left">
                                                <label>Quantity:</label>
                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                                                <input name="quantity" type="text" required class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" >
                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="custom pull-left">
                                                <label>Size:</label>
                                                <select id="getPrice" name="size" product_id="{{$productDetail['id']}}" required="">
                                                    @foreach($productDetail['attributes'] as $attribute)
                                                    <option value="{{$attribute->size}}">{{$attribute->size}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                           <button class="button btn-cart"  type="submit" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                       </div>
                                    </form>
                                    <div class="email-addto-box">
                                        <ul class="add-to-links">
                                            <li><button class="link-wishlist wish_product" data-id="{{$productDetail['id']}}" ><i class="fa fa-heart"></i><span>Add to Wishlist</span></button></li>
                                            <li><button class="link-compare compare_product" data-id="{{$productDetail['id']}}" ><i class="fa fa-signal"></i><span>Add to Compare</span></button></li>
                                        </ul>
                                    </div>
                                </div>
                                @endif
                                {{-- Social Part--}}
                                <div class="social">
                                    <?php $social= GetSocial(); ?>
                                    <ul>
                                        <li><a href="https://{{$social->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://{{$social->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="https://{{$social->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="https://{{$social->rss}}"><i class="fa fa-rss"></i></a></li>
                                        <li><a href="https://{{$social->youtube}}"><i class="fa fa-youtube"></i></a></li>
                                        <li><a href="https://{{$social->instagram}}"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-next-prev"> <a class="product-next" href="#"><i class="fa fa-angle-left"></i></a> <a class="product-prev" href="#"><i class="fa fa-angle-right"></i></a> </div>
                            </div>

                    </div>
                </div>
                <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
                    <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                        <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a></li>
                        <li><a href="#product_tabs_custom" data-toggle="tab">Features</a></li>
                        <li><a href="#reviews_tabs" data-toggle="tab">Reviews</a></li>

                    </ul>
                    <div id="productTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="product_tabs_description">
                            <div class="std">
                                <p>{{$productDetail->description}}</p>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews_tabs">
                            <div class="box-collateral box-reviews" id="customer-reviews">
                                <div class="box-reviews1">
                                    <div class="form-add">
                                        @if(auth()->check())
                                        <form id="review-form" method="post" action="{{'/comment-store/'.$productDetail['id']}}">
                                            @csrf
                                            <h3>Write Your Own Review</h3>
                                            <fieldset>
                                                <h4>How do you rate this product? <em class="required">*</em></h4>
                                                <span id="input-message-box"></span>
                                                <table id="product-review-table" class="data-table">
                                                    <thead>
                                                    <tr class="first last">
                                                        <th>&nbsp;</th>
                                                        <th><span class="nobr">1 *</span></th>
                                                        <th><span class="nobr">2 *</span></th>
                                                        <th><span class="nobr">3 *</span></th>
                                                        <th><span class="nobr">4 *</span></th>
                                                        <th><span class="nobr">5 *</span></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="first odd">
                                                        <th>Price</th>
                                                        <td class="value"><input type="radio" class="radio" value="1" id="Price_1" name="price"></td>
                                                        <td class="value"><input type="radio" class="radio" value="2" id="Price_2" name="price"></td>
                                                        <td class="value"><input type="radio" class="radio" value="3" id="Price_3" name="price"></td>
                                                        <td class="value"><input type="radio" class="radio" value="4" id="Price_4" name="price"></td>
                                                        <td class="value last"><input type="radio" class="radio" value="5" id="Price_5" name="price"></td>
                                                    </tr>
                                                    <tr class="even">
                                                        <th>Value</th>
                                                        <td class="value"><input type="radio" class="radio" value="1" id="Value_1" name="value"></td>
                                                        <td class="value"><input type="radio" class="radio" value="2" id="Value_2" name="value"></td>
                                                        <td class="value"><input type="radio" class="radio" value="3" id="Value_3" name="value"></td>
                                                        <td class="value"><input type="radio" class="radio" value="4" id="Value_4" name="value"></td>
                                                        <td class="value last"><input type="radio" class="radio" value="5" id="Value_5" name="value"></td>
                                                    </tr>
                                                    <tr class="last odd">
                                                        <th>Quality</th>
                                                        <td class="value"><input type="radio" class="radio" value="1" id="Quality_1" name="quality"></td>
                                                        <td class="value"><input type="radio" class="radio" value="2" id="Quality_2" name="quality"></td>
                                                        <td class="value"><input type="radio" class="radio" value="3" id="Quality_3" name="quality"></td>
                                                        <td class="value"><input type="radio" class="radio" value="4" id="Quality_4" name="quality"></td>
                                                        <td class="value last"><input type="radio" class="radio" value="5" id="Quality_5" name="quality"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="review2">
                                                    <ul>
                                                        <li>
                                                            <label class="required " for="review_field" >Review<em>*</em></label>
                                                            <div class="input-box">
                                                                <textarea required rows="3" cols="5" id="review_field" name="comment"></textarea>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="buttons-set">
                                                        <button class="button submit" title="Submit Review" type="submit"><span>Submit Review</span></button>
                                                    </div>@if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </fieldset>
                                        </form>
                                        @else
                                            <h4 >For Submitting Your Review Please <a style="color: #f82e56" class="product-availability" href="{{'/login'}}">Login</a> First</h4>

                                        @endif
                                    </div>
                                </div>
                                <div class="box-reviews2">
                                    <h3>Customer Reviews</h3>
                                    <div class="box visible">
                                        <ul>
                                            @foreach($productDetail->comment as $comment)
                                            <li class="even">
                                                <table class="ratings-table">
                                                    <tbody>
                                                    <tr>
                                                        <th>Value</th>
                                                        <td>
                                                            <div class="rating">
                                                                @if($comment->value>=1)
                                                                <i class="fa fa-star"></i>
                                                                @endif
                                                                @if($comment->value>=2)
                                                                <i class="fa fa-star"></i>
                                                                @else
                                                                <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($comment->value>=3)
                                                                <i class="fa fa-star"></i>
                                                                @else
                                                                <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($comment->value>=4)
                                                                <i class="fa fa-star"></i>
                                                                @else
                                                                <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($comment->value>=5)
                                                                <i class="fa fa-star"></i>
                                                                @else
                                                                <i class="fa fa-star-o"></i>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Quality</th>
                                                        <td>
                                                            <div class="rating">
                                                                @if($comment->quality>=1)
                                                                    <i class="fa fa-star"></i>
                                                                @endif
                                                                @if($comment->quality>=2)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($comment->quality>=3)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($comment->quality>=4)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($comment->quality>=5)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Price</th>
                                                        <td>
                                                            <div class="rating">
                                                                @if($comment->price>=1)
                                                                    <i class="fa fa-star"></i>
                                                                @endif
                                                                @if($comment->price>=2)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($comment->price>=3)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($comment->price>=4)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                                @if($comment->price>=5)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="review">
                                                    <h6>{{ucwords($comment->user->name)}} </h6>
                                                    <small>Member From<span>{{$comment->user->created_at->diffForHumans()}}</span></small><br>
                                                    <small>Review by <span>{{$comment->user->name}}</span>{{$comment->created_at->diffForHumans()}}</small>
                                                    <div class="review-txt">{{$comment->comment}}.</div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product_tabs_custom">
                            <div class="product-tabs-content-inner clearfix">
                                <div class="col-md-6">
                                    <table style="width:100%">
                                        @if(!empty($productDetail->fabric))
                                        <tr>
                                            <th>Fabric:</th>
                                            <td>{{$productDetail->fabric}}</td>
                                        </tr>
                                        @endif
                                         @if(!empty($productDetail->pattern))
                                        <tr>
                                            <th>Pattern:</th>
                                            <td>{{$productDetail->pattern}}</td>
                                        </tr>
                                         @endif
                                          @if(!empty($productDetail->sleeve))
                                        <tr>
                                            <th>Sleeve:</th>
                                            <td>{{$productDetail->sleeve}}</td>
                                        </tr>
                                          @endif
                                            @if(!empty($productDetail->fit))
                                            <tr>
                                              <th>Fit:</th>
                                                <td>{{$productDetail->fit}}</td>
                                            </tr>
                                            @endif
                                            @if(!empty($productDetail->occasion))
                                        <tr>
                                            <th>Occasion:</th>
                                            <td>{{$productDetail->occasion}}</td>
                                        </tr>
                                            @endif
                                            @if(!empty($productDetail->wash_care))
                                        <tr>
                                            <th>Wash Care:</th>
                                            <td>{{$productDetail->wash_care}}</td>
                                        </tr>
                                            @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@if(count($relatedProducts)>0)
<div class="container">
        <div class="jtv-related-products">
            <div class="slider-items-products">
                <div class="jtv-new-title">
                    <h2>Related Products</h2>
                </div>
                <div class="related-block">
                    <div id="jtv-related-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">
                            @foreach($relatedProducts as $relatedProduct)
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="{{url('/product/'.$relatedProduct['product_name'])}}"><figure> <img alt="Product tilte is here" src={{asset("/admin/images/product_images/large_image/".$relatedProduct->main_image)}}></figure> </a>
                                            <div class="new-label new-top-left">new</div>
                                            <div class="mask-shop-white"></div>
                                            <div class="new-label new-top-left">new</div>
{{--                                            <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a>--}}
                                            <div class="mask-left-shop wish_product" data-id="{{$relatedProduct['id']}}" style="cursor: pointer"><i class="fa fa-heart"></i></div>
                                            <div class="mask-right-shop compare_product" data-id="{{$relatedProduct['id']}}" style="cursor: pointer"> <i class="fa fa-signal"></i></div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Product tilte is here" href="{{url('/product/'.$relatedProduct['product_name'])}}">{{$relatedProduct->product_name}} </a> </div>
                                            <div class="item-content">
                                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">${{$relatedProduct->product_price}}</span></span></div>
                                                </div>
                                                <div class="actions">
                                                    <button class="button btn-cart" type="button"><span><a href="{{url('/product/'.$relatedProduct['product_name'])}}"><i class="fa fa-search"></i> Show Detail</a></span></button>
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
    </div>
@endif
@endsection
