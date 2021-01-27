<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function general ()
    {
        $setting=Setting::first();
        return view('admin.setting.update',compact('setting'));
    }

    public function updateGeneral(Request $request,$id)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
            $general=Setting::find($id);
            if ($request->hasFile('logo')){
                $logo_tmp=$request->file('logo');
                if ($logo_tmp->isValid()){
                    $extension=$logo_tmp->getClientOriginalExtension();
                    $imageName=rand(111,9999).".".$extension;
                    $largeImagePath='admin/images/logo/'.$imageName;
                    Image::make($logo_tmp)->save($largeImagePath);
                    $general->logo=$imageName;
                }
            }
            $general->shop_title=$data['shop_title'];
            $general->hotline=$data['hotline'];
            $general->email=$data['email'];
            $general->about=$data['about'];
            $general->address=$data['address'];
            $general->instagram=$data['instagram'];
            $general->facebook=$data['facebook'];
            $general->linkedin=$data['linkedin'];
            $general->rss=$data['rss'];
            $general->youtube=$data['youtube'];
            $general->pinterest=$data['pinterest'];
            $general->google_plus=$data['google_plus'];
            $general->skype=$data['skype'];
            $general->vimeo=$data['vimeo'];
            $general->save();
            Session::flash('success_message','general has een updated successfully!');
            return redirect()->back();
        }
    }
}
