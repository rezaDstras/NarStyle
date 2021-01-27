@extends('layouts.front.layout')
@section('contact')
<div class="container">
        <div class="row">
            <section class="col-sm-12 col-xs-12">
                <div class="cart-page-area">
                    <h2>My Wishlist</h2>
                        <div class="table-responsive">
                            @if(count($wishlist)>0)
                            <table class="shop-cart-table">
                                    @if(\Illuminate\Support\Facades\Session::has('success_message'))
                                        <div style="margin-top: 10px" class="alert alert-success" role="alert">
                                            {{\Illuminate\Support\Facades\Session::get('success_message')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="close" >
                                                <span aria-label="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                <thead>
                                <tr>
                                    <th class="product-thumbnail ">Image</th>
                                    <th class="product-name ">Product Name</th>
                                    <th class="product-price ">Unit Price</th>
                                    <th class="product-subtotal ">Stock</th>
                                    <th class="product-quantity">Add Item</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlist as $item)
                                <tr class="cart_item">
                                    <td class="item-img"><a href="{{url('/product/'.$item->product->id)}}"><figure><img alt="Product tilte is here" src="{{asset("/admin/images/product_images/large_image/".$item->product->main_image)}}"></figure> </a></td>
                                    <td class="item-title"><a href="{{url('/product/'.$item->product->id)}}">{{$item->product->product_name}}</a></td>
                                    <td class="item-price">$ {{number_format($item->product->product_price)}} </td>
                                    <td class="item-qty">
                                        <?php $totalStock=\App\Models\Attribute::where('product_id',$item->product->id)->sum('stock'); ?>
                                        @if($totalStock>0)
                                            In Stock<br>
                                                ({{$totalStock}} Items)
                                        @else
                                            Out Of Stock
                                        @endif
                                    </td>
                                    <td class="total-price"><a class="btn-def btn2" href="{{url('/product/'.$item->product->id)}}">Add To Cart</a></td>
                                    <td class="remove-item"><a class="confirmDelete" record="wishlist" recordid="{{$item->id}}" href="javascript:void (0)"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                                <h2>Empty!</h2>
                                <h3><img src="/front/images/signal.png">You Have Not Chosen Favourite Product Yet! </h3>
                                <div><button  type="button" class="btn-home"><a href="{{url('/')}}"><span>Back To Home</span></a> </button></div>
                            @endif
                        </div>
                </div>
            </section>
        </div>
    </div>
@endsection
