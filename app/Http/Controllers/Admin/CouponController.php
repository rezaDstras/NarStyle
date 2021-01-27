<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Section;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CouponController extends Controller
{
    public function index()
    {
        Session::put('page','coupon');
        $coupons=Coupon::get();
        return view('admin.coupon.index',compact('coupons'));
    }
    public function updateCouponStatus(Request $request)
    {
        if ($request->ajax()){
            $data=$request->all();
            //NOTICE
            // set URL in verify Csrf Token
            if ($request['status']=="active"){
                $status="0";
            }else{
                $status="1";
            }
            Coupon::where('id',$data['coupon_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'coupon_id'=>$data['coupon_id']]);
        }
    }
    public function deleteCoupon(Coupon $coupon)
    {
        Coupon::where('id',$coupon['id'])->delete();
        return redirect()->back();
    }
    public function addEditCoupon(Request $request,Coupon $coupon=null)
    {
        if ($coupon==""){
            $title="Add Coupon";
            $coupon=new Coupon;
            $catCoupon=array();
            $userCoupon=array();
            $message="Coupon Has Been Added Successfully!";
        }else{
            $title="Edit Coupon";
            $coupon=Coupon::find($coupon->id);
            $catCoupon=explode(',',$coupon['categories']);
            $userCoupon=explode(',',$coupon['users']);
            $message="Coupon Has Been Updated Successfully!";
        }
        if ($request->isMethod('post')){
            $data=$request->all();

            $rules=[
                //validate with space in name
                'coupon_option'=>'required',
                'coupon_type'=>'required',
                'amount_type'=>'required',
                'amount'=>'required|numeric',
                'users'=>'required',
                'categories'=>'required',
                'expiry_date'=>'required',
            ];
            $customMessage=[
                'coupon_option.required'=>'coupon option is required',
                'coupon_type.required'=>'coupon type is required',
                'amount_type.required'=>'amount type is required',
                'amount.required'=>'amount is required',
                'amount.numeric'=>'valid amount is required',
                'users.required'=>'Select users is required',
                'categories.required'=>'Select categories is required',
                'expiry_date.required'=>'expiry date is required',
            ];
            $this->validate($request,$rules,$customMessage);

            if (isset($data['users'])){
                $users=implode(',',$data['users']);
            }else{
                $users="";
            }
            if (isset($data['categories'])){
                $categories=implode(',',$data['categories']);
            }else{
                $categories="";
            }
            if ($data['coupon_option']=='Automatic'){
                $coupon_code=str::random(8);
            }else{
                $coupon_code=$data['coupon_code'];
            }

            $coupon->coupon_option=$data['coupon_option'];
            $coupon->coupon_code=$coupon_code;
            $coupon->categories=$categories;
            $coupon->users=$users;
            $coupon->coupon_type=$data['coupon_type'];
            $coupon->amount_type=$data['amount_type'];
            $coupon->amount=$data['amount'];
            $coupon->expiry_date=$data['expiry_date'];
            $coupon->status=1;
            $coupon->save();

            Session::flash('success_message',$message);
            return redirect()->back();

        }
        //Get Categories
        $categories=Section::with('categories')->get();
        //Select User
        $users=\App\Models\User::where('status',1)->get();

        return view('admin.coupon.add-edit',compact('title','coupon','categories','users','userCoupon','catCoupon'));
    }
}
