<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function send()
    {
        $data = ['email'=>'460547899@qq.com', 'name'=>'wcc', 'uid'=>1, 'activationcode'=>'www'];
        Mail::send('activemail', $data, function($message) use($data)
        {
            $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
        });
    }

    public function active(Request $request)
    {
        $code = $request->activationcode;
        if ($code == 'www')
        {
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function user()
    {
        $uid = Auth::user()->uid;
        $myproject = DB::table('projects')->select('title','money','rate','hrange','status')
        ->where('uid',$uid)->get();
        //var_dump($myproject);

        
    }
}
