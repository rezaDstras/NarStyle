<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index()
    {
        Session::put('page','brand');
        $brands=Brand::get()->all();
        return view('admin.brand.index',compact('brands'));
    }

    public function updateBrandStatus(Request $request)
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
            Brand::where('id',$data['brand_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'brand_id'=>$data['brand_id']]);
        }
    }

    public function addEditBrand(Request $request,Brand $brand=null)
    {
        if ($brand==""){
            $title="Add Brand";
            $brand=new Brand;
            $message="Brand Has Been Added Successfully!";
        }else{
            $title="Edit Brand";
            $brand=Brand::find($brand->id);
            $message="Brand Has Been Updated Successfully!";
        }
        if ($request->isMethod('post')){
            $data=$request->all();

            if ($request->hasFile('image')){
                $image_tmp=$request->file('image');
                if ($image_tmp->isValid()){
                    $image_name=$image_tmp->getClientOriginalName();
                    $extension=$image_tmp->getClientOriginalExtension();
                    $imageName=rand(111,9999).".".$extension;
                    $largeImagePath='admin/images/brand_images/'.$imageName;
                    Image::make($image_tmp)->save($largeImagePath);
                    //upload image in database
                    $brand->image=$imageName;
                }
            }
            $rules=[
                //validate with space in name
                'name'=>'required|regex:/^[\pL\s\-]+$/u',
            ];
            $customMessage=[
                'name.required'=>'Namr is required',
                'name.regex'=>'Valid Name is required',
            ];
            $this->validate($request,$rules,$customMessage);
            $brand->name=$data['name'];
            $brand->status=1;
            $brand->save();
            Session::flash('success_message',$message);
            return redirect()->back();

        }
        return view('admin.brand.add-edit',compact('title','brand'));
    }

    public function deleteBrand(Brand $brand)
    {
        Brand::where('id',$brand['id'])->delete();
        return redirect()->back();
    }
}
