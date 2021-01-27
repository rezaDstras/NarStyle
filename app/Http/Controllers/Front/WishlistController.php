<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Compare;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function wishlist()
    {
        if (Auth::check()){
            $wishlist=Wishlist::where('user_id',auth()->user()->id)->get();
        }else{
            $wishlist=Wishlist::where('session_id',Session::get('session_id'))->get();
        }

        return view('.front.user.wishlist',compact('wishlist'));

    }
    public function wishlistStore(Request $request)
    {

        if ($request->ajax()){
            $data=$request->all();
            $id=$data['id'];
//            echo "<pre>";print_r($id);die();
            $products=Product::find($id);
            if (Auth::check()){
                if (Wishlist::where(['user_id'=>auth()->user()->id,'product_id'=>$products['id']])->get()->count() > 0) {
                    return response()->json(['wish_fault'=>'exceeded']);
                }else{
                    $wishlist=new Wishlist;
                    $wishlist->product_id=$products['id'];
                    $wishlist->user_id=auth()->user()->id;
                    $wishlist->session_id=0;
                    $wishlist->save();
                }
            }else{
                if(Session::has('session_id')){
                    if (Wishlist::where(['session_id'=>Session::get('session_id'),'product_id'=>$products->id])->get()->count() > 0) {
                        return response()->json(['wish_fault'=>'exceeded']);
                    }else{
                        $wishlist=new Wishlist;
                        $wishlist->product_id=$products['id'];
                        $wishlist->user_id=0;
                        $wishlist->session_id=Session::get('session_id');
                        $wishlist->save();
                    }
                }else{
                    $session_id=Session::getId();
                    Session::put('session_id',$session_id);
                    $wishlist=new Wishlist;
                    $wishlist->product_id=$products['id'];
                    $wishlist->user_id=0;
                    $wishlist->session_id=$session_id;
                    $wishlist->save();
                }

            }
            return response()->json(['wish_create'=>'success']);
        }
    }

    public function deleteWishlistItem(Wishlist $wishlist)
    {

        Wishlist::where('id',$wishlist['id'])->delete();
        return redirect()->back();

    }
}
