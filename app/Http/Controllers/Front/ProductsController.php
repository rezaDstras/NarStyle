<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Country;
use Illuminate\pagination\paginator;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Monolog\Handler\IFTTTHandler;

class ProductsController extends Controller
{
    public function listing(Request $request)
    {
        paginator::useBootstrap();
        if ($request->ajax()){
            $data=$request->all();
//           echo "<pre>"; print_r($data['fabric']);die();
            $url=$data['url'];
            $categoryCount=Category::where(['url'=>$url ,'status'=>1])->count();
            if($categoryCount>0){
                //Get Category Detail
                $categoryDetails=Category::catDetails($url);
                $categoryProducts=Product::with('brand')
                    ->whereIn('category_id',$categoryDetails['catIds'])
                    ->where('status',1);
                //If Filter Option Selected By User
                if (isset($data['fabric']) && !empty($data['fabric'])){
                    $categoryProducts->whereIn('fabric',$data['fabric']);
                }
                if (isset($data['sleeve']) && !empty($data['sleeve'])){
                    $categoryProducts->whereIn('sleeve',$data['sleeve']);
                }
                if (isset($data['pattern']) && !empty($data['pattern'])){
                    $categoryProducts->whereIn('pattern',$data['pattern']);
                }
                if (isset($data['fit']) && !empty($data['fit'])){
                    $categoryProducts->whereIn('fit',$data['fit']);
                }
                if (isset($data['occasion']) && !empty($data['occasion'])){
                    $categoryProducts->whereIn('occasion',$data['occasion']);
                }

                //If sort Option Selected By User
                if (isset($data['sort']) && !empty($data['sort'])){
                    if ($data['sort']=="product_latest"){
                        $categoryProducts->orderby('id','Desc');
                    }elseif ($data['sort']=="product_name_a_z"){
                        $categoryProducts->orderby('product_name','Asc');
                    }elseif ($data['sort']=="product_name_z_a"){
                        $categoryProducts->orderby('product_name','Desc');
                    }elseif ($data['sort']=="product_lowest"){
                        $categoryProducts->orderby('product_price','Asc');
                    }elseif ($data['sort']=="product_highest"){
                        $categoryProducts->orderby('product_price','Desc');
                    }
                }else{
                    $categoryProducts->orderby('id','Desc');
                }
                $categoryProducts=$categoryProducts->Paginate(15);


                return view('front.product.ajax_listing-product',
                    compact('categoryProducts', 'categoryDetails'));
            }else{
                //abort(404);
                //or
                return view('front.404');
            }
        }else{
            //routing category
           $url=Route::getFacadeRoot()->current()->uri();
            //get category
            $category=Category::where('url',$url)->first();
            $categoryCount=Category::where(['url'=>$url ,'status'=>1])->count();
            if($categoryCount>0){
                //Get Category Detail
                $categoryDetails=Category::catDetails($url);
                $categoryProducts=Product::with('brand')
                    ->whereIn('category_id',$categoryDetails['catIds'])
                    ->where('status',1);
                paginator::useBootstrap();
                $categoryProducts=$categoryProducts->Paginate(12);
                //Filter Product
                $productFilter=Product::productFilter();
                $fabrics=$productFilter['fabrics'];
                $sleeves=$productFilter['sleeves'];
                $patterns=$productFilter['patterns'];
                $fits=$productFilter['fits'];
                $occassions=$productFilter['occassions'];



                return view('front.product.listing-product',
                    compact('category','categoryProducts', 'categoryDetails','fabrics','sleeves','fits','patterns','occassions'));
            }else{
                //abort(404);
                //or

                return view('front.404');
            }

        }

    }

    public function detail(Product $product)
    {
        //with relations
        $productDetail=Product::with(['brand','category','attributes'=>function($query){
            $query->where('status',1);
    }

            ,'images'])->find($product['id']);
        //Get Total Stock
        $totalStock=Attribute::where('product_id',$product['id'])->sum('stock');
        //Get Comment
        //Related Products
        $relatedProducts=Product::where('category_id',$productDetail['category_id'])->where('id','!=',$product['id'])->limit(7)->inRandomOrder()->get();
        return view('front.product.detail',compact('productDetail','totalStock','relatedProducts'));
    }

    public function productPrice(Request $request)
    {
        if ($request->ajax()){
            $data=$request->all();
            $getDiscountedAttrPrice=Product::getDiscountedAttrPrice($data['product_id'],$data['size']);
            return $getDiscountedAttrPrice;
        }
    }

    public function addToCart(Request $request)
    {
        if ($request->isMethod('POST')){
            $data=$request->all();
//            echo "<pre>";print_r($data);die();

            //Check selected product stock is available or not
            $productStock=Attribute::where(['product_id'=>$data['product_id'],'size'=>$data['size']])->first();
//            echo $productStock['stock'];die();
            if ($productStock['stock']<$data['quantity']){
                $message="Required Product Quantity is not available ";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
            //Generate session_id if not exist
            $session_id=Session::get('session_id');
            if(empty($session_id)){
                $session_id=Session::getId();
                Session::put('session_id',$session_id);
            }
            if (Auth::check()){
                $countProduct=Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'user_id'=>Auth::user()->id])->count();

            }else{
                $countProduct=Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'session_id'=>Session::get('session_id')])->count();
            }
            //Check if product already exists in cart
            if ($countProduct>0){
                $message="Required Product already exist in cart";
                Session::flash('error_message',$message);
                return redirect()->back();
            }

            if (Auth::check()){
                $user_id=Auth::user()->id;
            }else{
                $user_id=0;
            }


            $cart=new Cart;
            $cart->session_id= $session_id;
            $cart->user_id= $user_id;
            $cart->product_id= $data['product_id'];
            $cart->size= $data['size'];
            $cart->quantity= $data['quantity'];
            $cart->save();

            $message="Required Product has been added to cart successfully! ";
            Session::flash('success_message',$message);
            return redirect()->back();

        }
    }

    public function Cart()
    {
        //Get User id
        $userCartItems=Cart::userCartItems();
//      echo  "<pre>"; print_r($userCartItems);die();
        $countries=Country::get();
        return view('front.product.cart',compact('userCartItems','countries'));
    }

    public function updateCartQty(Request $request)
    {
        if ($request->ajax()){
            $data=$request->all();
//            echo  "<pre>"; print_r($data);die();
            //Get Cart Detail
            $cartDetail=Cart::find($data['cartid']);
            //Get Available Stock Product
            $availableStock=Attribute::select('stock')->where(['product_id'=>$cartDetail['product_id'],'size'=>$cartDetail['size']])->first();
            //Check Product Stock is available or not
            if ($data['qty']>$availableStock['stock']){
                $userCartItems=Cart::userCartItems();
                return response()->json([
                    'status'=>false,
                    'message'=>'product stock is not available',
                    'view'=>(string)View::make('front.product.cart_items')->with(compact('userCartItems'))

                ]);
            }
            //Check size Available
            $availableSize=Attribute::where(['product_id'=>$cartDetail['product_id'],'size'=>$cartDetail['size'],'status'=>1])->count();
            if ($availableSize==0){
                $userCartItems=Cart::userCartItems();
                return response()->json([
                    'status'=>false,
                    'message'=>'product size is not available',
                    'view'=>(string)View::make('front.product.cart_items')->with(compact('userCartItems'))
                ]);
            }
           Cart::where('id',$data['cartid'])->update(['quantity'=>$data['qty']]);
            $userCartItems=Cart::userCartItems();
            return response()->json([
                'status'=>true,
                'view'=>(string)View::make('front.product.cart_items')->with(compact('userCartItems'))
            ]);
        }
    }

    public function deleteCartItem(Cart $cart)
    {
//        if ($request->ajax()){
//            $data=$request->all();
////            echo "<pre>";print_r($data);die();
//            Cart::where('id',$data['cartid'])->delete();
//            $userCartItems=Cart::userCartItems();
//            return response()->json([
//                'view'=>(string)View::make('front.product.cart_items')->with(compact('userCartItems'))
//            ]);
//        }
        Cart::where('id',$cart['id'])->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        paginator::useBootstrap();
        $query=$request->input('query');
        $products=Product::where('product_name','like','%'.$query.'%')->Paginate(15);

        return view('front.product.search')->with('products',$products);

    }

    public function shop()
    {
        paginator::useBootstrap();
        $products=Product::where('status',1)->orderBy('created_at','Desc')->Paginate(16);
        return view('front.product.shop',compact('products'));
    }

    public function comment(Request $request,$id)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
            $rules=[
                'price'=>'required',
                'value'=>'required',
                'quality'=>'required',
                'comment'=>'required',
            ];
            $customMessage=[
                'price.required'=>'name is required',
                'value.required'=>'value is required',
                'quality.required'=>'quality is required',
                'comment.required'=>'comment is required',

            ];
            $this->validate($request,$rules,$customMessage);

            $comment=new Comment;
            $comment->price=$data['price'];
            $comment->value=$data['value'];
            $comment->quality=$data['quality'];
            $comment->comment=$data['comment'];
            $comment->product_id=$id;
            $comment->user_id=Auth::user()->id;
            $comment->save();

            $message="Your Comment has been Submitted successfully! ";
            Session::flash('success_message',$message);
            return redirect()->back();
        }
    }

    public function checkout(Request $request)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
            echo "<pre>";print_r($data);die();
        }
    }

    public function brand(Brand $brand)
    {
        paginator::useBootstrap();
        $products=Product::where(['brand_id'=>$brand['id']])->paginate(4);
        return view('front.product.brand',compact('products','brand'));
    }
}
