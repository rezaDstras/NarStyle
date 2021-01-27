<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function register()
    {
        return view('front.user.register');
    }

    public function registerUser(Request $request)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
//            echo "<pre>";print_r($data);die();
            //Check Email if already exists
            $userCount=User::where('email',$data['email'])->count();
            if ($userCount>0){
                $message="Email already exists";
                Session::flash('error_message',$message);
                return redirect()->back();
            }else{
                $user=new User;
                $user->name=$data['name'];
                $user->email=$data['email'];
                $user->mobile=$data['mobile'];
                $user->password=bcrypt($data['password']);
                $user->status=0;
                $user->save();

                //send confirmation email
                $email=$data['email'];
                $messageData=[
                    'email'=>$data['email'],
                    'name'=>$data['name'],
                    'code'=>base64_encode($data['email']),
                ];
                Mail::send('emails.confirmation',$messageData,function ($message) use($email){
                        $message->to($email)->subject('Confirm your email address!');
                    });
                //redirect back with success message
                $message="Please Confirm your email to active your account!";
                Session::flash('success_message',$message);
                return redirect()->back();



//                if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
//                    //update User cart with user id after register
//                    if (!empty(Session::get('session_id'))){
//                        $user_id=Auth::user()->id;
//                        $session_id=Session::get('session_id');
//                        Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
//                    }
//                    //send register email
//                    $email=$data['email'];
//                    $messageData=['name'=>$data['name'],'mobile'=>$data['mobile'],'email'=>$data['email']];
//                    Mail::send('emails.register',$messageData,function ($message) use($email){
//                        $message->to($email)->subject('Welcome to Narstyle Shop!');
//                    });
//
//                    return redirect('/');
//                }
            }

        }
    }

    public function checkEmail(Request $request)
    {
        //if email already exists
        $data=$request->all();
        $emailCount=User::where('email',$data['email'])->count();
        if ($emailCount>0){
            return "false";
        }else{
            return "true";
        }
    }

    public function login()
    {

        return view('front.user.login');
    }

    public function loginUser(Request $request)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
//            echo "<pre>"; print_r($data);die();
            if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                //check email is active or not
                $userStatus=User::where('email',$data['email'])->first();
                if ($userStatus->status == 0){
                    Auth::logout();
                    $message="your account is not active !please confirm your email!";
                    Session::flash('error_message',$message);
                    return redirect()->back();
                }

                //update User cart with user id after login
                if (!empty(Session::get('session_id'))){
                    $user_id=Auth::user()->id;
                    $session_id=Session::get('session_id');
                    Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                }

                return redirect('/');
            }else{
                $message="Invalid Email or Password already exists";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    //Account Functions
    public function dashboard()
    {

        $userDetail=User::find(Auth::user()->id);
        return view('front.user.dashboard.index',compact('userDetail'));
    }

    public function InfoUser(Request $request)
    {
        $user_id=Auth::user()->id;
        $userDetail=User::find($user_id);
        $country=Country::where('status',1)->get();
        if ($request->isMethod('post')){
            $data=$request->all();
//            echo "<pre>";print_r($data);die();
            $rules=[
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

            $user=User::find($user_id);
            $user->name=$data['name'];
            $user->address=$data['address'];
            $user->country=$data['country'];
            $user->mobile=$data['mobile'];
            $user->save();
            $message="Information has been updated successfully!";
            Session::flash('success_message',$message);
            return redirect()->back();
        }
        return view('front.user.dashboard.information',compact('userDetail','country'));
    }

    public function userComment()
    {
        paginator::useBootstrap();
        $comments=Comment::where('user_id',Auth::user()->id)->orderBy('id','Desc')->paginate(5);
        return view('front.user.dashboard.comment',compact('comments'));
    }

    public function confirmAccount($email)
    {
        $email=base64_decode($email);
        $userCount=User::where('email',$email)->count();
        if ($userCount>0){
            //check if account is already activated
            $userDetail=User::where('email',$email)->first();
            if ($userDetail->status == 1){
                $message="Your Account is already activated!please login!";
                Session::flash('error_message',$message);
                return redirect('front.user.login');
            }else{
                //update user status to 1 for active account
                User::where('email',$email)->update(['status'=>1]);
//                send register email
                    $email=$userDetail['email'];
                    $messageData=['name'=>$userDetail['name'],'mobile'=>$userDetail['mobile'],'email'=>$userDetail['email']];
                    Mail::send('emails.register',$messageData,function ($message) use($email){
                        $message->to($email)->subject('Welcome to Narstyle Shop!');
                    });
                    //redirect to login page with success message
                    $message="Your Account has been activated!please login!";
                    Session::flash('success_message',$message);
                    return redirect('front.user.login');
            }

        }else{
            abort(404);
        }
    }

    public function forgotPassword(Request $request)
    {
        if ($request->isMethod('post')){
            $data=$request->all();
            $emailCount=User::where('email',$data['email'])->count();
            if ($emailCount==0){
                $message="Email dose not exists!";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
            //Generate Random Password
             $randomPassword=str::random(8);
            //encode/secure password
            $newPassword=bcrypt($randomPassword);
            //update Password
            User::where('email',$data['email'])->update(['password'=>$newPassword]);
            //Get User Name
            $userName=User::select('name')->where('email',$data['email'])->first();
            //send forgot password
            $email=$data['email'];
            $name=$userName->name;
            $messageData=[
                'email'=>$email,
                'name'=>$name,
                'password'=>$randomPassword,
            ];
            Mail::send('emails.forgot_password',$messageData,function ($message) use($email){
                $message->to($email)->subject('New Password - narstyle');
            });
            //redirect to forgot password page with success message
            $message="Please check your email for new password!";
            Session::flash('success_message',$message);
            return redirect()->back();

        }
       return view('front.user.forgot_password');

    }
}
