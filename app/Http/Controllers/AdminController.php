<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MailMagazineHistory;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function mailmagazine(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('mailmagazine');
        }else{
            //postの場合,バリデーション
            $rules = [
                "subject"=>"required",
                "time"=>"required",
                "message"=>"required"
            ];
            $messages = [
                "subject.required"=>"ご入力ください。",
                "time.required"=>"ご入力ください。",
                "message.required"=>"ご入力ください。"
            ];
            $validator = Validator::make($request->all(),$rules,$messages);
            if ($validator->fails()) {
                return redirect()->route('get_mailmagazine')->withErrors($validator)->withInput();
            }else {
                $mailmagazinehistory = new MailMagazineHistory;
                $mailmagazinehistory->subject = $request->subject;
                $mailmagazinehistory->content = $request->message;
                $mailmagazinehistory->send_time = $request->time;
                $mailmagazinehistory->save();
                return '登録成功';
            }
        }
        
    }
}
