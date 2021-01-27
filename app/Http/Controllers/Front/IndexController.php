<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        //Get Featured Product
        //$featuredNumberProducts=Product::where('is_featured',"Yes")->count();
        $featuredProducts=Product::where('is_featured',"Yes")->where('status',1)->get();
        //Get Latest Products
        $latestProducts=Product::orderby('id','DESC')->where('status',1)->limit(6)->get();
        $topDeal=Product::where('product_discount','>=',1)->inRandomOrder()->first();
        return view('front.index',compact('featuredProducts','latestProducts','topDeal'));
    }
}
