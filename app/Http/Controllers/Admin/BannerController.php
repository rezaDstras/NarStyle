<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function banner()
    {
        Session::put('page','banner');
        $banners=Banner::get();
        return view('admin.banner.index',compact('banners'));
    }
    public function updateBannerStatus(Request $request)
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
            Banner::where('id',$data['banner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'banner_id'=>$data['banner_id']]);
        }
    }
    public function deleteBanner(Banner $banner)
    {
        //Get Banner Image
        $bannerImage=Banner::where('id',$banner['id'])->first();
        //Get Banner Image Path
        $path='/admin/images/banner_images';
        //Delete Banner Image form folder
        if (file_exists($path.$bannerImage)){
            unlink($path.$bannerImage);
        }
        //Delete From Banner Table
        Banner::where('id',$banner['id'])->delete();

        return redirect()->back();
    }
    public function addEditBanner(Request $request,Banner $banner=null)
    {
        if ($banner==""){
            $title="Add Banner";
            $banner=new Banner;
            $message="Banner Has Been Added Successfully!";
        }else{
            $title="Edit Banner";
            $banner=Banner::find($banner->id);
            $message="Banner Has Been Updated Successfully!";
        }
        if ($request->isMethod('post')){
            $data=$request->all();

            if ($request->hasFile('image')){
                $image_tmp=$request->file('image');
                if ($image_tmp->isValid()){
                    $image_name=$image_tmp->getClientOriginalName();
                    $extension=$image_tmp->getClientOriginalExtension();
                    $imageName=rand(111,9999).".".$extension;
                    $largeImagePath='admin/images/banner_images/'.$imageName;
                    Image::make($image_tmp)->save($largeImagePath);
                    //upload image in database
                    $banner->image=$imageName;
                }
            }
            $rules=[
                //validate with space in name
                'title'=>'required|regex:/^[\pL\s\-]+$/u',
                'link'=>'required',
                'alert'=>'required',
                'image'=>'required',
            ];
            $customMessage=[
                'name.required'=>'Name is required',
                'name.regex'=>'Valid Name is required',
                'link.required'=>'Name is required',
                'alert.required'=>'Name is required',
                'image.required'=>'Name is required',
            ];
            $this->validate($request,$rules,$customMessage);

            $banner->title=$data['title'];
            $banner->link=$data['link'];
            $banner->alert=$data['alert'];
            $banner->status=1;
            $banner->save();
            Session::flash('success_message',$message);
            return redirect()->back();

        }
        return view('admin.banner.add-edit',compact('title','banner'));
    }
}
