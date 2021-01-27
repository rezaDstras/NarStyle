<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
   }
    public function login(Request $request)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
           /* echo "<pre>"; print_r($data); die(); */
            $validateData=$request->validate([
                'email'=>'required|email|max:255',
                'password'=>'required',
            ]);
            if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('/admin/dashboard');
            }else{
                Session::flash('error_message','Invalid Email or Password');
                return redirect()->back();
            }

        }
        //generate hash password
//        echo $password=Hash::make('1111'); die();
        return view('admin.login');


    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function setting()
    {
        Session::put('page','setting');
        $admin=Auth::guard('admin')->user();
        return view('admin.setting',compact('admin'));
    }

    public function checkCurrentPwd(Request $request)
    {
        $data=$request->all();
       if (Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
           echo "true";
       }else{
           echo "false";
           //NOTICE ++++
           //set '/admin/check-current-pwd' in part of $except in verifyCsrfToken
       }
    }

    public function update_psw(Request $request)
    {


        if ($request->isMethod('post')){
            $data=$request->all();
            //check current password
            if (Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
                //check equal new password with confirm password
                if ($data['new_password']==$data['confirm_password']){
                    Admin::where('id',Auth::guard('admin')->user()->id)->update([
                        'password'=>bcrypt($data['new_password'])
                    ]);
                    Session::flash('success_message','Your Information has been updated successfully');
                }else{
                    Session::flash('error_message','New Password and Confirm Password is not match');
                }
            }else{
                Session::flash('error_message','Your Current Password is incorrect');
            }
            return redirect()->back();
        }
    }

    public function update_admin(Request $request)
    {
        Session::put('page','update-admin');
        if ($request->isMethod('post')){
            $data=$request->all();
//             echo "<pre>"; print_r($data); die();
            $rules=[
                //validate with space in name
                'name'=>'required|regex:/^[a-zA-Z\s]*$/',
                'mobile'=>'required|numeric',
            ];
            $customMessage=[
                'name.required'=>'name is required',
                'name.regex'=>' valid name is required',
                 'mobile.required'=>'mobile is required',
                 'mobile.numeric'=>' valid mobile is required',
            ];
            $this->validate($request,$rules,$customMessage);
            //upload file
                if ($request->hasFile('image')){
                    $image_tmp=$request->file('image');
                    if ($image_tmp->isValid()){
                        //get image extension
                        $extension=$image_tmp->getClientOriginalExtension();
                        //generate new name
                        $imageName=rand(11,999999).'.'.$extension;
                        $imagePath='admin/images/admin_images/admin_image'.$imageName;
                    }
                    //upload the file
                  Image::make($image_tmp)->save($imagePath);
                }else if(!empty($data['current_image'])){
                    $imageName=$data['current_image'];
                }else{
                    $imageName="";
                }

            //update Detail in Daabase
            Admin::where('id',Auth::guard('admin')->user()->id)->update([
                'name'=>$data['name'],
                'mobile'=>$data['mobile'],
                'image'=>$imageName,
            ]);
            Session::flash('success_message','Detail has been updated successfully');
            return redirect()->back();
        }
        $admin=Auth::guard('admin')->user();
        return view('admin.edit_admin',compact('admin'));
    }
}
