<div class="niwdoawi_top mw_1180">
    <div class="header w1190 clearfix">
        <div class="fl tel">
            <em class="fs_14 mr_5 tel_ico">客服热线</em><i class="aril">010-57155250</i>

            <span class="iphone"><i></i>
            <a href="{{ url('/home') }}">首页</a>
            <div class="webdown"></div>
            </span>
          <!--   <span class="hover_sina">
                <a target="_blank" href="#"></a>
            </span> -->
            <span class="fs_12 ml_10">市场有风险，投资需谨慎</span>
        </div>
        <div class="fr login clearfix">

            @if(! isset(Auth::user()->name) )
            <div class="login_bt"><a class="fff" title="登录" rel="nofollow" href="{{ url('auth/login') }}">登录</a><a class="fff" title="注册" rel="nofollow" href="auth/register">注册</a></div>
            @else
                <div class="login_bt fff">
                <a class="fff" href="{{url ('user') }}">{{ Auth::user()->name }}</a>
                <a class="fff" href="{{url ('auth/logout') }}">退出</a></div>

            @endif


        </div>
    </div>
</div><!--登录-->
<div class="niwdoawi_center mw_1180">
    <div class="w1190 logo clearfix">
        <a class="fl pl_20 logo_a holiday_logo" id='holiday_logo' title="给梦想可能" href="{{url('/home')}}"><img height="52" alt="点点贷" src="/image/logo_all.png"></a>
        <div class="fl logo_aft">
            <div id="headLogo" class="pos_aft">
                <a href="{{url('/home')}}" class="defaultlogo"><img src="/image/logo1200.png"></a>
            </div>
        </div>
        <div class="fr righ">
            <ul class="nav clearfix">
                <li>
                    <a class="one" title="首页" href="{{url('/home')}}" rel="nofollow">首页</a>
                </li>
                <li class="one">
                    <a class="one" title="我的投资" href="{{url('mytz')}}">我的投资</a>
                </li>
                 <li class="one">
                    <a class="one" title="我的收益" href="{{url('mysy')}}">我的收益</a>
                </li>
                <li class="rela">
                    <a class="one" title="我要借款" href="{{url('jie')}}">我要借款</a>
                </li>
                <li class="rela">
                    <a class="one" title="我的项目" href="{{url('mypro')}}">我的项目</a>
                </li>

                <li style="margin-right:0;">
                    <a class="one" title="我的账单" target="_blank" href="{{url('myzd')}}">我的账单 </a>
                </li>
            </ul>
        </div>
    </div>
</div><!--nav-->
<!-- 头部结束 -->