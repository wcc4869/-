<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class GrowController extends Controller
{
    public function run()
    {
        //首先获取今天的日期
        $today = date('Y-m-d',time());
        //只要大于今天的日期就打钱给投资人
        $task = DB::table('tasks')->where('enddate' ,'>=', $today)->get();

        //为每个用户循环打钱
        foreach($task as $t)
        {
            $t = (array)$t;
            $t['paytime'] = $today;
            unset($t['tid']);
            unset($t['enddate']);
            DB::table('grows')->insert($t);
        }

    }
}
