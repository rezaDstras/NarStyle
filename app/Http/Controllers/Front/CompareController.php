<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Compare;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CompareController extends Controller
{

    public function compare()
    {
        if (Auth::check()){
            $compares=Compare::where('user_id',auth()->user()->id)->get();
        }else{
            $compares=Compare::where('session_id',Session::get('session_id'))->get();
        }
        return view('.front.user.compare',compact('compares'));
    }

    public function compareStore(Request $request)
    {

        if ($request->ajax()){
            $data=$request->all();
            $id=$data['id'];
//            echo "<pre>";print_r($id);die();
            $products=Product::find($id);
            if (Auth::check()){
                if (Compare::where(['user_id'=>auth()->user()->id,'product_id'=>$products['id']])->get()->count() > 0) {
                    return response()->json(['compare_fault'=>'exceeded']);
                }else{
                    $compare=new Compare;
                    $compare->product_id=$products['id'];
                    $compare->user_id=auth()->user()->id;
                    $compare->session_id=0;
                    $compare->save();
                }
            }else{
                if (Compare::where(['session_id'=>Session::get('session_id'),'product_id'=>$products->id])->get()->count() > 0) {
                    return response()->json(['compare_fault'=>'exceeded']);
                }else{
                    $compare=new Compare;
                    $compare->product_id=$products['id'];
                    $compare->user_id=0;
                    $compare->session_id=Session::get('session_id');
                    $compare->save();
                }
            }
            return response()->json(['compare_create'=>'success']);
        }
    }
    public function deleteCompareItem(Compare $compare)
    {
       Compare::where('id',$compare['id'])->delete();
        return redirect()->back();

    }


}




