@extends('layouts.front.layout')
@section('contact')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
          <div class="col-xs-12">
               <ul>
                  <li class="home"> <a href="index.html" title="Go to Home Page">Home</a> <span>/</span></li>
                     <li> <strong>Shopping cart </strong> </li>
               </ul>
          </div>
        </div>
     </div>
</div>
<section class="main-container col1-layout">
    <div class="main container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="product-area">
                    <div class="title-tab-product-category">
                        <div class="text-center">
                            <ul class="nav jtv-heading-style" role="tablist">
                                <li role="presentation" class="active"><a href="#cart" aria-controls="cart" role="tab" data-toggle="tab">1 Shopping cart</a></li>
                                <li role="presentation" class=""><a href="#checkout" aria-controls="checkout" role="tab" data-toggle="tab">2 Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="content-tab-product-category">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="cart">
                                <!-- cart are start-->
                                <div id="AppendCartItems">
                                    @include('front.product.cart_items')
                                </div>
                                <!-- cart are end-->
                            </div>
                            <div role="tabpanel" class="tab-pane  fade in " id="checkout">
                                <!-- Checkout are start-->
                                <div class="checkout-area">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="billing-details">
                                                            <div class="contact-text right-side">
                                                                <h2>Billing Details</h2>
                                                                <form action="{{url('/checkout-store')}}" method="post">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>First Name <em>*</em></label>
                                                                                <input type="text" name="namm" class="info" placeholder="First Name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Last Name<em>*</em></label>
                                                                                <input type="text" name="namm" class="info" placeholder="Last Name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Email Address<em>*</em></label>
                                                                                <input type="email" name="email" class="info" placeholder="Your Email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Phone Number<em>*</em></label>
                                                                                <input type="text" name="phone" class="info" placeholder="Phone Number">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Country <em>*</em></label>
                                                                                <select class="selectpicker select-custom" data-live-search="true">
                                                                                    @foreach($countries as $country)
                                                                                        <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Address <em>*</em></label>
                                                                                <input type="text" name="add1" class="info mb-10" placeholder="Street Address">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Town/City <em>*</em></label>
                                                                                <input type="text" name="add1" class="info" placeholder="Town/City">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>State/Divison <em>*</em></label>
                                                                                <select class="selectpicker select-custom" data-live-search="true">
                                                                                    <option data-tokens="Barisal">Barisal</option>
                                                                                    <option data-tokens="Dhaka">Dhaka</option>
                                                                                    <option data-tokens="Kulna">Kulna</option>
                                                                                    <option data-tokens="Rajshahi">Rajshahi</option>
                                                                                    <option data-tokens="Sylet">Sylet</option>
                                                                                    <option data-tokens="Chittagong">Chittagong</option>
                                                                                    <option data-tokens="Rangpur">Rangpur</option>
                                                                                    <option data-tokens="Maymanshing">Maymanshing</option>
                                                                                    <option data-tokens="Cox">Cox's Bazar</option>
                                                                                    <option data-tokens="Saint">Saint Martin</option>
                                                                                    <option data-tokens="Kuakata">Kuakata</option>
                                                                                    <option data-tokens="Sajeq">Sajeq</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="input-box">
                                                                                <label>Post Code/Zip Code<em>*</em></label>
                                                                                <input type="text" name="zipcode" class="info" placeholder="Zip Code">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-xs-12">
                                                            <div class="checkout-payment-area">
                                                                <div class="checkout-total">
                                                                    <h3>Your order</h3>
                                                                        <div class="table-responsive">
                                                                            <table class="checkout-area table">
                                                                                <thead>
                                                                                <tr class="cart_item check-heading">
                                                                                    <td class="ctg-type"> Product</td>
                                                                                    <td class="cgt-des"> Total</td>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php $total_price=0; ?>
                                                                                @foreach($userCartItems as $product)
                                                                                    <?php $attrPrice=\App\Models\Product::getDiscountedAttrPrice($product['product_id'],$product['size']); ?>
                                                                                <tr class="cart_item check-item prd-name">
                                                                                    <td class="ctg-type"> {{$product->product->product_name}} × <span style="color: #f82e56">{{$product['quantity'] }}</span></td>
                                                                                    <td class="cgt-des">${{ $attrPrice['final_price'] * $product['quantity'] }}</td>
                                                                                </tr>
                                                                                    <?php $total_price= $total_price + ($attrPrice['final_price'] * $product['quantity']); ?>
                                                                                @endforeach
                                                                                <tr class="cart_item">
                                                                                    <td class="ctg-type"> Subtotal</td>
                                                                                    <td class="cgt-des">${{$total_price}}</td>
                                                                                </tr>
                                                                                <tr class="cart_item">
                                                                                    <td class="ctg-type crt-total"> Total</td>
                                                                                    <td class="cgt-des prc-total">  $ {{$total_price}} </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                </div>
                                                                <div class="payment-section">
                                                                    <div class="pay-toggle">
                                                                            <div class="pay-type-total">
                                                                                <div class="pay-type">
                                                                                    <input type="radio" id="pay-toggle01" name="pay">
                                                                                    <label for="pay-toggle01">Direct Bank Transfer</label>
                                                                                </div>
                                                                                <div class="pay-type">
                                                                                    <input type="radio" id="pay-toggle02" name="pay">
                                                                                    <label for="pay-toggle02">Cheque Payment</label>
                                                                                </div>
                                                                                <div class="pay-type">
                                                                                    <input type="radio" id="pay-toggle03" name="pay">
                                                                                    <label for="pay-toggle03">Cash on Delivery</label>
                                                                                </div>
                                                                                <div class="pay-type">
                                                                                    <input type="radio" id="pay-toggle04" name="pay">
                                                                                    <label for="pay-toggle04">Paypal</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="input-box"> <button type="submit" class="btn-def btn2">Place order</button> </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Checkout are end-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
