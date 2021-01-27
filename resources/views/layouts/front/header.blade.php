<?php
use App\Models\Cart;
use App\Models\Section;
use App\Models\Setting;
$general=Setting::generals();
$sections=Section::sections();
$carts=Cart::userCartItems();

?>
<header>
    <div class="header-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <div class="logo"><a title="ecommerce Template" href="{{url('/')}}"><img alt="ecommerce Template" src="{{asset("/admin/images/logo/".$general->logo)}}"></a></div>
                    <div class="nav-icon">
                        <div class="mega-container visible-lg visible-md visible-sm">
                            <div class="navleft-container">
                                <div class="mega-menu-title">
                                    <h3><i class="fa fa-navicon"></i>Categories</h3>
                                </div>
                                <div class="mega-menu-category">
                                    <ul class="nav">
                                        @foreach($sections as $section)
                                        <li><a href="#">{{$section->name}}</a>
                                            <div class="wrap-popup">
                                                <div class="popup">

                                                    <div class="row">
                                                        @foreach($section['categories'] as $category)
                                                          @if(count($section['categories'])>0)
                                                        <div class="col-md-6 col-sm-6 " >
                                                            <h3><a href="{{url($category['url'])}}">{{$category['category_name']}}</a></h3>
                                                            <ul class="nav">
                                                                @foreach($category['subCategories'] as $subcategory)
                                                                <li><a href="{{url($subcategory['url'])}}">{{$subcategory['category_name']}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                            <br>
                                                        </div>
                                                            @endif
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        <li class="nosub"><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                    <div class="side-banner"><img src="/front/images/top-banner.jpg" alt="Flash Sale" class="img-responsive"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-9 col-xs-12 jtv-rhs-header">
                    <div class="jtv-mob-toggle-wrap">
                        <div class="mm-toggle"><i class="fa fa-reorder"></i><span class="mm-label">Menu</span></div>
                    </div>
                    <div class="jtv-header-box">
                        <div class="search_cart_block">
                            <div class="search-box hidden-xs">
                                <form id="search_mini_form" action="{{route('search')}}" method="get">
                                    <input id="search" type="text" name="query" value="{{request()->input('query')}}" class="searchbox" placeholder="Search entire store here..." maxlength="128">
                                    <button type="submit" title="Search" class="search-btn-bg" id="submit-button"><span class="hidden-sm">Search</span><i class="fa fa-search hidden-xs hidden-lg hidden-md"></i></button>
                                </form>
                            </div>
                            <div class="right_menu">
                                <div class="menu_top">
                                    <div class="top-cart-contain pull-right">
                                        <div class="mini-cart">
                                            <div class="basket"><a class="basket-icon" href="#"><i class="fa fa-shopping-basket"></i> Shopping Cart
                                                    <span>
                                                        {{--  helper function--}}
                                                        {{totalCartItem()}}
                                                    </span></a>
                                                <div class="top-cart-content">
                                                    <div class="block-subtitle">
                                                        <div class="top-subtotal">{{count($carts)}} items</div>
                                                    </div>
                                                    <ul class="mini-products-list" id="cart-sidebar">
                                                        <?php $total_price=0; ?>
                                                        @foreach($carts as $cart)
                                                        <li class="item">
                                                            <div class="item-inner"><a class="product-image" title="product tilte is here" href="{{url('/product/'.$cart->product->product_name)}}"><figure><img alt="product tilte is here" src="{{asset("/admin/images/product_images/large_image/".$cart->product->main_image)}}"></figure></a>
                                                                <div class="product-details">
                                                                    <div class="access"><a class="btn-edit" title="Edit item" href="{{url('/cart')}}"><i class="fa fa-pencil"></i><span class="hidden">Edit item</span></a>  </div>
                                                                    <p class="product-name"><a href="{{url('/product/'.$cart->product->product_name)}}">{{$cart->product->product_name}} <br> ({{$cart->size}})</a></p>
                                                                    <?php $attrPrice=\App\Models\Product::getDiscountedAttrPrice($cart['product_id'],$cart['size']); ?>
                                                                    <strong>{{$cart->quantity}}</strong> x <span class="price">$ {{ $attrPrice['product_price'] }}</span></div>
                                                                <?php $total_price= $total_price + ($attrPrice['final_price'] * $cart['quantity']); ?>
                                                            </div>
                                                        </li>
                                                        @endforeach

                                                    </ul>
                                                    <div class="actions"> <a href="{{url('/cart')}}" class="view-cart"><span>View Cart</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="language-box hidden-xs">--}}
{{--                                    <select class="selectpicker" data-width="fit">--}}
{{--                                        <option>English</option>--}}
{{--                                        <option>Francais</option>--}}
{{--                                        <option>German</option>--}}
{{--                                        <option>Español</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="currency-box hidden-xs">--}}
{{--                                    <form class="form-inline">--}}
{{--                                        <div class="input-group">--}}
{{--                                            <div class="currency-addon">--}}
{{--                                                <select class="currency-selector">--}}
{{--                                                    <option data-symbol="$">USD</option>--}}
{{--                                                    <option data-symbol="€">EUR</option>--}}
{{--                                                    <option data-symbol="£">GBP</option>--}}
{{--                                                    <option data-symbol="¥">JPY</option>--}}
{{--                                                    <option data-symbol="$">CAD</option>--}}
{{--                                                    <option data-symbol="$">AUD</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="top_section hidden-xs">
                            <div class="toplinks">
                                <div class="site-dir hidden-xs"> <a class="hidden-sm" href="#"><i class="fa fa-phone"></i> <strong>Hotline:</strong>{{$general->hotline}}</a> <a href="mailto:support@example.com"><i class="fa fa-envelope"></i> support@example.com</a> </div>
                                <ul class="links">
                                    <li>
                                        <a title="home" href="{{url('/')}}">Home</a>
                                    </li>
                                    <li
                                        @if(url()->current() == route('shop')) style="" @endif
                                    >
                                        <a title="Shop" href="{{url('/shop')}}">Shop</a>
                                    </li>
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                    <li
                                        @if(url()->current() == route('account')) class="current" @endif
                                    >
                                        <a title="My Account" href="{{url('/account')}}">My Account</a>
                                    </li>
                                    @endif
                                    <li><a title="My Wishlist" href="{{url('/wishlist')}}">Wishlist</a></li>
                                    <li><a title="Compare List" href="{{url('/compare')}}">Compare</a></li>
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                        <li><a title="Log In" href="{{url('/logout')}}">Log Out</a></li>
                                    @else
                                        <li><a title="Log In" href="{{url('/login')}}">LogIn/Register</a></li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
