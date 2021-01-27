<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Section;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        Session::put('page','product');
        //section and category are created in product model as relations
        $products=Product::with('section','category')->get();
        return view('admin.product.index',compact('products'));
    }
    public function updateProductStatus(Request $request)
    {
        if ($request->ajax()){
            $data=$request->all();
            //NOTICE
            // set URL in verifyCsrfToken
            if ($request['status']=="active"){
                $status="0";
            }else{
                $status="1";
            }
            Product::where('id',$data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }
    }
    public function deleteProduct(Product $product)
    {
        Product::where('id',$product['id'])->delete();
        return redirect()->back();
    }

    public function addEditProduct(Request $request,Product $product=null)
    {
        if ($product==""){
            $title="Add Product";
            $product= new Product;
            $productData=array();
            $message='Product has been added successfully';
        }else{
            $title="Edit Product";
            $productData=Product::find($product['id']);
            $product=Product::find($product['id']);
            $message='Product has been Updated successfully';

        }

        if ($request->isMethod('post')){
            $data=$request->all();

            $rules=[
                'category_id'=>'required',
                'brand_id'=>'required',
                //validate with space in name
                'product_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'product_code'=>'required|regex:/^[\w-]*$/',
                'product_price'=>'required|numeric',
                'product_color'=>'required|regex:/^[\pL\s\-]+$/u',
            ];
            $customMessage=[
                'category_id.required'=>'Category is required',
                'brand_id.required'=>'Brand is required',
                'product_name.regex'=>' Valid Name is required',
                'product_name.required'=>' Name is required',
                'product_code.required'=>'Product Code is required',
                'product_code.regex'=>'Valid Product Code is required',
                'product_price.numeric'=>' valid Price is required',
                'product_price.required'=>' Price is required',
                'product_color.regex'=>' Valid Product Color is required',
                'product_color.required'=>' Product Color is required',
            ];
            $this->validate($request,$rules,$customMessage);

            //upload image after resize
            if ($request->hasFile('main_image')){
                $image_tmp=$request->file('main_image');
                if ($image_tmp->isValid()){
                    $image_name=$image_tmp->getClientOriginalName();
                    $extension=$image_tmp->getClientOriginalExtension();
                    $imageName=rand(111,9999).".".$extension;
                    $largeImagePath='admin/images/product_images/large_image/'.$imageName;
                    $mediumImagePath='admin/images/product_images/medium_image/'.$imageName;
                    $smallImagePath='admin/images/product_images/small_image/'.$imageName;
                    Image::make($image_tmp)->save($largeImagePath);
                    Image::make($image_tmp)->resize(520,600)->save($mediumImagePath);
                    Image::make($image_tmp)->resize(260,300)->save($smallImagePath);
                    //upload image in database
                    $product->main_image=$imageName;

                }
            }

            //upload product Video
            if ($request->hasFile('product_video')){
                $video_tmp=$request->file('product_video');
                if ($video_tmp->isValid()){
                    $video_name=$video_tmp->getClientOriginalName();
                    $extension=$video_tmp->getClientOriginalExtension();
                    $videoName=$video_name."-".rand(111,9999).".".$extension;
                    $videoPath='admin/images/product_images/video_format/';
                    $video_tmp->move($videoPath,$videoName);
                    //upload in database
                    $product->product_video=$videoName;
                }

            }

            //save product in database
            //**find section id
            $categoryDetail=Category::find($data['category_id']);
            $product->section_id=$categoryDetail['section_id'];
            $product->product_name=$data['product_name'];
            $product->category_id=$data['category_id'];
            $product->product_code=$data['product_code'];
            $product->product_color=$data['product_color'];
            $product->product_price=$data['product_price'];

            if (empty($data['product_discount'])) {
                $data['product_discount'] = "";
            }
                $product->product_discount=$data['product_discount'];

            if (empty($data['product_weight'])){
                $data['product_weight']="";
            }
                $product->product_weight=$data['product_weight'];
            if (empty($data['product_video'])){
                $data['product_video']="";
            }

            if (empty($data['main_image'])){
                $data['main_image']="";
            }
            if (empty($data['description'])){
                $data['description']="";
            }
                $product->description=$data['description'];
            if (empty($data['wash_care'])){
                $data['wash_care']="";
            }
                $product->wash_care=$data['wash_care'];
            if (empty($data['fabric'])){
                $data['fabric']="";
            }
                $product->fabric=$data['fabric'];
            if (empty($data['brand_id'])){
                $data['brand_id']="";
            }
            $product->brand_id=$data['brand_id'];
            if (empty($data['pattern'])) {
                $data['pattern'] = "";
            }
                $product->pattern=$data['pattern'];
            if (empty($data['sleeve'])){
                $data['sleeve']=" ";
            }
                $product->sleeve=$data['sleeve'];
            if (empty($data['fit'])) {
                $data['fit'] = " ";
            }
                $product->fit=$data['fit'];
            if (empty($data['occasion'])){
                $data['occasion']=" ";
            }
                $product->occasion=$data['occasion'];
            if (empty($data['meta_title'])){
                $data['meta_title']=" ";
            }
                $product->meta_title=$data['meta_title'];

            if (empty($data['meta_description'])) {
                $data['meta_description'] = " ";
            }
                $product->meta_description=$data['meta_description'];

            if (empty($data['meta_keywords'])) {
                $data['meta_keywords'] = " ";
            }
                $product->meta_keywords=$data['meta_keywords'];
            if(empty($data['is_featured'])){
                $is_featured="No";
            }else{
                $is_featured="Yes";
            }
            $product->is_featured=$is_featured;
            $product->status=1;
            $product->save();
            Session::flash('success_message',$message);
            return redirect()->back();

        }


        //Filter Product
        $productFilter=Product::productFilter();
        $fabrics=$productFilter['fabrics'];
        $sleeves=$productFilter['sleeves'];
        $patterns=$productFilter['patterns'];
        $fits=$productFilter['fits'];
        $occassions=$productFilter['occassions'];
        //Get All Brands
        $brands=Brand::where('status',1)->get();
        //section with categories an sub categories
        $categories=Section::with('categories')->get();

        return view('admin.product.add-edit',compact('title','categories',
            'fabrics','fits','sleeves','occassions','patterns','productData','brands'));
    }

    public function deleteProductVideo (Product $product)
    {
        //get Product Video
        $productVideo=Product::select('product_video')->where('id',$product['id'])->first();


        //path of product video
        $path='admin/images/product_images/video_format/';
        //delete Product Video form Product Video folder if exists
        if (file_exists($path.$productVideo->product_video)){
            unlink($path.$productVideo->product_video);
        }
        //delete category image from database
        Product::where('id',$product['id'])->update(['product_video'=>""]);
        Session::flash('success_message','Video has been deleted successfully!');
        return redirect()->back();
    }

    public function addAttribute(Request $request,$id)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
//          echo "<pre>"; print_r($data); die();

            foreach ($data['sku'] as $key=>$value){
                if (!empty($value)){
//                    echo "<pre>"; print_r($value); die();
                    //check sku already exist
                    $attributeSku=Attribute::where('sku',$value)->count();
                    if ($attributeSku>0){
                        Session::flash('error_message','Sku Attributes already exists ! please add another one');
                        return redirect()->back();
                    }
                    //check size already exist
                    $attributeSize=Attribute::where(['product_id'=>$id ,'size'=>$data['size'][$key]])->count();
                    if ($attributeSize>0){
                        Session::flash('error_message','size Attributes already exists ! please add another one');
                        return redirect()->back();
                    }
                    Attribute::query()->create([
                        'product_id'=>$id,
                        'sku'=>$value,
                        'size'=>$data['size'][$key],
                        'stock'=>$data['stock'][$key],
                        'price'=>$data['price'][$key],
                        'status'=>'1',
                    ]);
                }
            }
            Session::flash('success_message','Attributes has been added successfully!');
            return redirect()->back();
        }
        //attributes created as a relation in product model
        $productData=Product::with('attributes')->find($id);
        $title="Product Attributes";
//        echo "<pre>"; print_r($productData);die();
        return view('admin.product.add-attributes',compact('productData','title'));
    }

    public function editAttributes(Request $request,Product $product)
    {

        if ($request->isMethod('post')){
            $data=$request->all();
            //echo "<pre>"; print_r($data);die();
            foreach ($data['attrId'] as $key=>$value){
                if (!empty($value)){
                    Attribute::where(['id'=>$data['attrId'][$key]])->update(['price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
                }
            }
            Session::flash('success_message','Attributes has been updated successfully!');
            return redirect()->back();

        }
    }

    public function updateAttributeStatus(Request $request)
    {
        if ($request->ajax()){
            $data=$request->all();
            //NOTICE
            // set URL in verifyCsrfToken
            if ($request['status']=="active"){
                $status="0";
            }else{
                $status="1";
            }
            Attribute::where('id',$data['attribute_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'attribute_id'=>$data['attribute_id']]);
        }
    }

    public function deleteAttribute($id)
    {
        Attribute::where('id',$id)->delete();
        return redirect()->back();
    }

    public function addImages(Request $request,$id)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
            if ($request->hasFile('image')){
                $images=$request->file('image');
                foreach ($images as $key=>$image){
                    $productImage=new ProductImage;
                    $image_tmp=Image::make($image);
                    $extension=$image->getClientOriginalExtension();
                    $imageName=rand(111,999999).time().".".$extension;

                    $largeImagePath='admin/images/product_images/large_image/'.$imageName;
                    $mediumImagePath='admin/images/product_images/medium_image/'.$imageName;
                    $smallImagePath='admin/images/product_images/small_image/'.$imageName;
                    Image::make($image_tmp)->save($largeImagePath);
                    Image::make($image_tmp)->resize(520,600)->save($mediumImagePath);
                    Image::make($image_tmp)->resize(260,300)->save($smallImagePath);
                    //upload image in database
                    $productImage->image=$imageName;
                    $productImage->product_id=$id;
                    $productImage->status=1;
                    $productImage->save();
                }
            }
            Session::flash('success_message','Images has been Added successfully!');
            return redirect()->back();
        }
        //images created in product model as a relation
        $productData=Product::with('images')->find($id);
//        echo "<pre>"; print_r($productData);die();
        $title="product Images";
        return view('admin.product.add-images',compact('productData','title'));
    }
    public function updateImageStatus(Request $request)
    {
        if ($request->ajax()){
            $data=$request->all();
            //NOTICE
            // set URL in verifyCsrfToken
            if ($request['status']=="active"){
                $status="0";
            }else{
                $status="1";
            }
            ProductImage::where('id',$data['image_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'image_id'=>$data['image_id']]);
        }
    }

    public function deleteImage($id)
    {
        $productImage=ProductImage::select('image')->where('id',$id)->first();

        //get image paths
        $largeImagePath='admin/images/product_images/large_image/';
        $mediumImagePath='admin/images/product_images/medium_image/';
        $smallImagePath='admin/images/product_images/small_image/';

        //delete large image if exists in large folder
        if (file_exists($largeImagePath.$productImage->image)){
            unlink($largeImagePath.$productImage->image);
        }
        //delete medium image if exists in medium folder
        if (file_exists($mediumImagePath.$productImage->image)){
            unlink($mediumImagePath.$productImage->image);
        }
        //delete small image if exists in small folder
        if (file_exists($smallImagePath.$productImage->image)){
            unlink($smallImagePath.$productImage->image);
        }
        //delete product image from productImage table in database
        ProductImage::where('id',$id)->delete();
        return redirect()->back();
    }

}
