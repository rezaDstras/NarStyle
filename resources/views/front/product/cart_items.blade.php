<div class="cart-page-area">
    <form method="post" action="#">
        <div class="table-responsive">
            <table class="shop-cart-table">
                <thead>
                <tr>
                    <th class="product-thumbnail ">Image</th>
                    <th class="product-name ">Product Name</th>
                    <th class="product-price ">Size</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-price ">Unit Price</th>
                    <th >Discount</th>
                    <th class="product-subtotal ">Total Price</th>
                    <th class="product-remove">Remove</th>
                </tr>
                </thead>
                <tbody>
                <?php $total_price=0; ?>
                @foreach($userCartItems as $product)
                    <!--                                                  --><?php //$attrPrice=\App\Models\Attribute::where(['product_id'=>$product['product_id'],'size'=>$product['size']])->first(); ?>
                    <?php $attrPrice=\App\Models\Product::getDiscountedAttrPrice($product['product_id'],$product['size']); ?>
                    <tr class="cart_item">
                        <td class="item-img"><a href="{{url('/product/'.$product['product']->product_name )}}"><img src="{{asset("/admin/images/product_images/large_image/".$product['product']->main_image)}}" alt="Product tilte is here "> </a></td>
                        <td class="item-title"><a href="{{url('/product/'.$product['product']->product_name )}}">{{$product['product']->product_name }}<br>Color : {{$product['product']->product_color }}</a></td>
                        <td class="item-price"> {{$product['size'] }}</td>
                        <td class="item-qty"><div class="cart-quantity">
                                <div class="product-qty">
                                    <div class="cart-quantity">
                                        <div class="cart-plus-minus">
                                            <input value="{{$product['quantity'] }}" name="qtybutton" class="cart-plus-minus-box" type="text">
                                            <div class="dec qtybutton qtyMinus" data-cartid="{{$product['id']}}" >-</div>
                                            <div class="inc qtybutton qtyPlus" data-cartid="{{$product['id']}}" >+</div>
                                        </div>
                                    </div>
                                </div>
                            </div></td>
                        <td class="item-price"> $ {{ $attrPrice['product_price'] }} </td>
                        <td class="total-price"><strong> $ {{ $attrPrice['discount'] * $product['quantity'] }}</strong></td>
                        <td class="total-price"><strong> $ {{ $attrPrice['final_price'] * $product['quantity'] }}</strong></td>
                        <?php $total_price= $total_price + ($attrPrice['final_price'] * $product['quantity']); ?>
                        <td ><a class="confirmDelete" record="cart" recordid="{{$product->id}}" href="javascript:void (0)" ><i class="fa fa-trash-o" ></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="cart-bottom-area">
            <div class="row">
                <div class="col-md-8 col-sm-7 col-xs-12">
                    <div class="update-coupne-area">
                        <div class="coupn-area">
                            <div class="discount">
                                <h3>Discount Codes</h3>

                                <label for="coupon_code">Enter your coupon code if you have one.</label>
                                <input type="hidden" value="0" id="remove-coupone" name="remove">
                                <input type="text" value="" name="code" id="code" class="input-text fullwidth">
                                <button id="ApplyCoupon" value="Apply Coupon" onclick="discountForm.submit(false)" class="button coupon " title="Apply Coupon" type="button"><span>Apply Coupon</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-5 col-xs-12">
                    <div class="cart-total-area">
                        <div class="catagory-title cat-tit-5 text-right">
                            <h3>Cart Totals</h3>
                        </div>
                        <div class="sub-shipping">
                            <p>Subtotal <span>$ {{$total_price}}</span></p>
                            <p>Coupon <span>$00.00</span></p>
                        </div>
                        <div class="process-cart-total">
                            <p>Total <span>$ {{$total_price}}</span></p>
                        </div>
                        <div class="process-checkout-btn text-right">
                            <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><a href="#checkout" aria-controls="checkout" role="tab" data-toggle="tab" style="color: #fff0f0"><span>Proceed to Checkout</span></a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
