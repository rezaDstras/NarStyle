<aside class="col-right sidebar col-sm-3 col-xs-12">
    <div class="block block-account">
        <div class="block-title">My Account</div>
        <div class="block-content">
            <ul>
                <li @if(url()->current() == route('account')) class="current" @endif><a href="{{url('/account')}}"><i class="fa fa-angle-right"></i> Account Dashboard</a></li>
                <li @if(url()->current() == route('information')) class="current" @endif><a href="{{url('/account/information')}}"><i class="fa fa-angle-right"></i> Account Information</a></li>
                <li><a href="#" ><i class="fa fa-angle-right"></i> My Orders</a></li>
                <li @if(url()->current() == route('userComment')) class="current" @endif><a href="{{url('/account/user-comment')}}"><i class="fa fa-angle-right"></i> My Product Reviews</a></li>
                <li><a href="{{url('/compare')}}"><i class="fa fa-angle-right"></i> My Compare Items List</a></li>
                <li><a href="{{url('wishlist')}}"><i class="fa fa-angle-right"></i> My Wishlist</a></li>
                <li><a href="{{url('/logout')}}"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</aside>
