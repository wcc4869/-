<?php

namespace App\Http\Controllers;

use App\Pro;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //     $user = auth()->user();
    //     if(isset($user)){
    //         $name = $user->name;
    //         $request->session()->set('name', $name);
    //     }else{
    //         $request->session()->forget('name');
    //     }
        $pro = Pro::where('status',1)->orderBy('pid','desc')->limit(3)->get();
        return view('index',['pro'=>$pro]);
     }

     public function more()
     {
         $pros = Pro::where('status',1)->orderBy('pid','desc')->paginate(3);
         return view('more',['pros'=>$pros]);
     }

}
