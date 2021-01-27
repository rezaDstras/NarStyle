<?php
use App\Models\Section;
$sections=Section::sections();
?>
<div id="jtv-mobile-menu">
    <ul>
        <li>
            <div class="mm-search">
                <form id="mob-search" name="search">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        @foreach($sections as $section)
        <li><a href="#">{{$section->name}}</a>
            <ul>
                @foreach($section['categories'] as $category)
                <li><a href="{{url($category['url'])}}">{{$category->category_name}}</a>
                    <ul>
                        @foreach($category['subCategories'] as $subcategory)
                        <li><a href="{{url($subcategory['url'])}}">{{$subcategory->category_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
        <li><a href="contact-us.html">Contact Us</a></li>
    </ul>
    <div class="top-links">
        <ul class="links">
            <li><a title="My Account" href="my-account.html">My Account</a></li>
            <li><a title="Wishlist" href="wishlist.html">Wishlist</a></li>
            <li><a title="Checkout" href="checkout.html">Checkout</a></li>
            <li class="last"><a title="Login" href="login.html"><span>Login</span></a></li>
        </ul>
        <div class="language-box">
            <select class="selectpicker" data-width="fit">
                <option>English</option>
                <option>Francais</option>
                <option>German</option>
                <option>Español</option>
            </select>
        </div>
        <div class="currency-box">
            <form class="form-inline">
                <div class="input-group">
                    <div class="currency-addon">
                        <select class="currency-selector">
                            <option data-symbol="$">USD</option>
                            <option data-symbol="€">EUR</option>
                            <option data-symbol="£">GBP</option>
                            <option data-symbol="¥">JPY</option>
                            <option data-symbol="$">CAD</option>
                            <option data-symbol="$">AUD</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
