<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    use HasFactory;

    //Get User id For Shopping Cart
    public static function userCartItems()
    {
        if (Auth::check()){
            $userCartItems=Cart::with(['product'=>function($query){
                $query->select('id','product_name','product_code','main_image','product_color','product_price');
            }])->where('user_id',Auth::user()->id)->orderBy('id','Desc')->get();
        }else{
            $userCartItems=Cart::with(['product'=>function($query){
                $query->select('id','product_name','product_code','main_image','product_color','product_price');
            }])->where('session_id',Session::get('session_id'))->orderBy('id','Desc')->get();
        }
        return $userCartItems;
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }



}
