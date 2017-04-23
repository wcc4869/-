<?php

namespace App\Http\Controllers;

use App\Att;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pro;

class CheckController extends Controller
{
    public function prolist()
    {
         $name = Auth::user()->name;
         if ($name != 'admin') {
            return redirect('/home');
         }
        $pros = Pro::orderBy('pid','desc')->get();

        return view('prolist',['pros'=>$pros]);

    }

    public function check($pid)
    {
        $pro = Pro::find($pid);
        $att = Att::where('pid',$pid)->first();

        return view('shenhe',['pro'=>$pro,'att'=>$att]);
    }

    public function checkPost(Request $request,$pid)
    {
        $pro = Pro::find($pid);
        $pro->status = $request->status;
        if ($pro->save())
        {
            return redirect('prolist');
        }else{
            echo 'fail';
        }
    }

}
