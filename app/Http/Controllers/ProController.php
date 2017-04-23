<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pro;
use App\Att;
use App\Bid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProController extends Controller
{
    //借款頁面
    public function jie()
    {
        return view('woyaojiekuan');
    }

    public function jiePost(Request $request)
    {

        $captcha = $request->session()->get('milkcaptcha');
        $imgcode = $request->input('imgcode');
        $pro     = new Pro();
        $att     = new Att();

        $user = $request->user();
        if ($captcha == $imgcode) {
            //借款表
            $pro->money   = $request->money;
            $pro->mobile  = $request->mobile;
            $pro->uid     = $user->uid;
            $pro->name    = $request->realname;
            $pro->pubtime = time();
            $pro->title   = $request->title;
            $pro->hrange  = $request->hrange;
            $pro->rate    = $request->rate;
            $pro->save();
            //附属表
            $att->age    = $request->age;
            $att->pid    = $pro->pid;
            $att->uid    = $user->uid;
            $att->gender = $request->gender;
            $att->title  = $request->title;
            $att->save();

            return 'ok';
        } else {
            echo 'failed';
        }
    }

    //投资页展示
    public function pro(Request $request,$pid)
    {
        $pro = Pro::find($pid);
        return view('lijitouzi',['pro'=>$pro]);
    }
    //投资
    public function touzi(Request $request,$pid){
        //获取用户登录信息
        //Auth::user();
        $puser = Pro::where('pid',$pid)->first();
        $user = $request->user();
        $pro  = Pro::find($pid);
        $bid  = new Bid();

        if ($user == $puser) {
            return '投资者和借款者冲突';
        }


        if($request->money > ($pro->money-$pro->recive)){
            return '金额不能大于';
        }
        //写入投资信息
        $bid->uid = $user->uid;
        $bid->pid = $pro->pid;
        $bid->title = $pro->title;
        $bid->money = $request->money;
        $bid->pubtime = time();
        $bid->save();

        $pro->recive += $bid->money;
        $pro->save();

        if ($pro->money == $pro->recive) {
            $this->touziDone($pid);
        }
        return '购买成功';
    }

    public function touziDone($pid)
    {
        //修改项目状态
        $pro = Pro::find($pid);
        $pro->status = 2;
        $pro->save();

        //为还款人生成每月的还款账单,本金+利息
        $amount = ($pro->money/$pro->hrange + ($pro->money*$pro->rate/1200));
        $row = ['uid'=>$pro->uid,'pid'=>$pro->pid,'title'=>$pro->title];
        $row['amount'] = $amount;
        $row['status'] = 0;

        //循环显示还款的账单
        //$today = date('Y-m-d',time());
        for($i=1;$i <= $pro->hrange;$i++)
        {
            $row['paydate'] = date('Y-m-d',strtotime("+ $i months"));
            DB::table('hks')->insert($row);
        }

        //为投资人生成预收益账单
        $bid = Bid::where('pid',$pro->pid)->get();
        $row = [];
        $row['pid'] = $pro->pid;
        $row['title'] = $pro->title;
        $row['enddate'] = date('Y-m-d',strtotime("+ $pro->hrange months"));

        //循环投资人的信息
        foreach($bid as $b)
        {
            $row['uid'] = $b->uid;
            //每天的预收益
            $row['amount'] = $b->money * $pro->rate / 365;
            DB::table('tasks')->insert($row);
        }

    }
//还款账单
    public function myzd()
    {
        //获取用户登录信息
        $user = Auth::user();
        $hks = DB::table('hks')->where('uid',$user->uid)->paginate(3);
        return view('myzd',['hks'=>$hks]);
    }

//投资收益
    public function mytz()
    {
        //获取用户登录信息
        $user = Auth::user();
        $bid = Bid::where('bids.uid',$user->uid)->whereIn('status',[1,2])->
        join('projects','bids.pid','=','projects.pid')->get(['bids.*','projects.status']);
        return view('mytz',['bid'=>$bid]);

    }
    //用户收益
    public function mysy()
    {
        //获取用户登录信息
        $user = Auth::user();
        $grow = DB::table('grows')->where('uid',$user->uid)->orderBy('gid','desc')->get();
        return view('mysy',['grow'=>$grow]);
    }

    //用户发布的的项目
    public function mypro()
    {
        //获取用户登录信息
        $user = Auth::user();

        $mypro = Pro::where('uid',$user->uid)->orderBy('pid','desc')->paginate(3);


        return view('mypro',['mypro'=>$mypro]);
    }

//修改编辑项目
    public function edit($pid)
    {

         $pro = Pro::find($pid);
         $att = Att::where('pid',$pid)->first();
         return view('edit',['pro'=>$pro,'att'=>$att]);
    }

    public function delete($pid)
    {
         $pro = Pro::find($pid);
         $re = $pro->delete();
         if ($re) {
             return redirect('mypro');
         }
    }
}
