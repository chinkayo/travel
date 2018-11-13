<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Verification;
use App\User;
use Validator;
use Redirect;

class UsersController extends Controller
{
    public function signup(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('signup');
        }else {
            $rules = [
                'familyname'=>'required',
                'givenname'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|alpha_num|min:6|confirmed',
                'password_confirmation'=>'required',
                'agreed'=>'required'
            ];

            $messages = [
                'familyname.required'=>'苗字を入力してください。',
                'givenname.required'=>'名前を入力してください。',
                'email.required'=>'メールアドレスを入力してください。',
                'email.email'=>'正しいメールアドレスを入力してください。',
                'email.unique'=>'メールアドレスすでに登録済みです。',
                'password.required'=>'パスワードを入力してください。',
                'password.alpha_num'=>'英字、数字、-、_、のみ入力してください。',
                'password.min'=>'最小6桁を入力してください。',
                'password.confirmed'=>'パスワード一致していません。',
                'password_confirmation.required'=>'パスワード二回を入力してください。',
                'agreed.required'=>'利用規則に同意してください。'
            ];

            $validator = Validator::make($request->all(),$rules,$messages);
            if ($validator->fails()) {
                return redirect(route('get_signup'))->withErrors($validator)->withInput();
            }else{  
                $user = new User;
                $user->familyname = $request->familyname;
                $user->givenname = $request->givenname;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->token = str_random(25);
                $user->user_status_id = 1 ;
                $user->save();
                $userid = $user->id;
                $user = User::find($userid);

                Mail::to($user->email)->send(new Verification($user));
                return view('to_verification');
            }
        }
    }

    public function verify($token)
    {
        $user = User::where('token',$token)->firstOrFail();
        $user->user_status_id = 2;
        $user->save();
        
        return view('verified');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('login');
        }else {
            //バリデーション
            $rules = [
                'email'=>'required',
                'password'=>'required'
            ];
            $messages = [
                'email.required'=>'メールアドレスを入力してください。',
                'password.required'=>'パスワードを入力してください。'
            ];
            $validator = Validator::make($request->all(),$rules,$messages);
            if ($validator->fails()) {
                return redirect()->route('get_login')->withErrors($validator)->withInput();
            }else {
                //バリデーション成功の場合
                if (Auth::attempt(['email'=>$request->email,
                                   'password'=>$request->password,
                                   'user_status_id'=>2])) {
                    return redirect()->route('user_detail');
                }else {
                    return redirect()->route('get_login');
                }
            
            }
        }
    }

    public function members()
    {
        return view('loggedin'); 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('get_login');
    }


}
