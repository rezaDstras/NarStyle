<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function getRouteKeyName()
    {
        return 'product_name';
    }


    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class , 'section_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class , 'brand_id');
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public static function productFilter ()
    {
        $productFilter['fabrics']=array('Cotton','Polyester','Wool','Pure_Cotton');
        $productFilter['sleeves']=array('Full Sleeve','Half Sleeve','Short Sleeve' , 'Sleeveless');
        $productFilter['patterns']=array('Checked','Plain','Self','Solid','Printed');
        $productFilter['fits']=array('Regular','Slim');
        $productFilter['occassions']=array('Casual','Formal');

        return $productFilter;
    }

    public static function getProductDiscount ($product_id)
    {
        $proDetail=Product::where('id',$product_id)->first();
        return $proDetail;
        $catDetail=Category::where('id',$proDetail['category_id'])->first();
        if ($proDetail['product_discount']>0){
            $discountPrice=$proDetail['product_price'] - ($proDetail['product_price'] * $proDetail['product_discount']/100);
        }elseif ($catDetail['parent_discount']>0){
            $discountPrice=$proDetail['product_price'] -($proDetail['product_price'] * $catDetail['parent_discount']/100);
        }else{
            $discountPrice=0;
        }
        return $discountPrice;
    }

    public static function getDiscountedAttrPrice($product_id,$size)
    {
        $proAttrPrice=Attribute::where(['product_id'=>$product_id ,'size'=>$size])->first();
        $proDetails=Product::select('product_discount','category_id')->where('id',$product_id)->first();
        $catDetails=Category::select('parent_discount')->where('id',$proDetails['category_id'])->first();
        if ($proDetails['product_discount']>0){
            $final_price=$proAttrPrice['price'] - ($proAttrPrice['price'] * $proDetails['product_discount']/100 );
            $discount=$proAttrPrice['price'] - $final_price;
        }elseif ($catDetails['parent_discount']>0){
            $final_price=$proAttrPrice['price'] - ($proAttrPrice['price'] * $catDetails['parent_discount']/100 );
            $discount=$proAttrPrice['price'] - $final_price;
        }else{
            $final_price=$proAttrPrice['price'];
            $discount=0;
        }
        return array('product_price'=>$proAttrPrice['price'],'final_price'=>$final_price,'discount'=>$discount);
    }
}
