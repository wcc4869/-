<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="robots" content="all">
<meta charset="utf-8">
<meta name="description" content="点点贷贷款专栏专注于为个人和企业提供2013年最新的贷款利息查询、小额贷款、个人贷款、商业贷款、短期借款期限、汽车抵押贷款、房屋抵押贷款、信用贷款、申请贷款条件等贷款咨询服务。">
<meta name="keywords" content="贷款利率,小额贷款,无抵押贷款,p2p贷款，借钱,长期借款">
<title>快速申请 -点点贷</title>
<meta name="Robots" content="index,follow">
<meta property="wb:webmaster" content="ac04ec3477e29c81">
<meta property="qc:admins" content="1533374623661774116375">

<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">


<link href="/css/common.css" rel="stylesheet" type="text/css"> 
<link href="/css/sea.css" rel="stylesheet" type="text/css">
<link href="/css/style.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="/css/webstyle2.css">
<link href="/css/wyjk.css" rel="stylesheet" type="text/css">
</head>
<script>
    function re_captcha() {
        $url = "{{ URL('captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('imgc').src=$url;
    }
</script>
<body>
<!--header start-->
@include('header')
<!--header end-->


<form id="applyForm" name="applyForm" action="" method="POST">
    {!! csrf_field() !!}
 <div class="application">
        <figure class="banner"></figure>
        <div class="delCon">

            <h1>快速申请</h1>
            <div class="iptBox">
                <span>项目名称</span>
                <input id="age" name="title"  value="{{$pro->title}}" maxlength="11" type="text">
                <p id="mobileError" class="error"></p>
            </div>
            <div class="iptBox">
                <span>真实年龄</span>
                <input id="age" name="title"  value="{{$att->age}}" maxlength="11" type="text">
                <p id="mobileError" class="error"></p>
            </div>
            <div class="iptBox">
                <span>真实姓名</span>
                <input id="realanme" name="realname" value="{{$pro->name}}"  maxlength="11" type="text">
                
            </div>
            <div class="iptBox">
                <span>真实性别</span>
                <input id="gender" name="title"  value="{{$att->gender}}" maxlength="11" type="text">
                <p id="mobileError" class="error"></p>
            </div>
           <div class="iptBox">
                <span>借款期限</span>
                <input id="hrange" name="hrange"  value="{{$pro->hrange}}" maxlength="11" type="text">
                <p id="mobileError" class="error"></p>
            </div>
           <div class="iptBox">
                <span>借款利率</span>
                <input id="rate" name="rate"  value="{{$pro->rate}}" maxlength="11" type="text">
                <p id="mobileError" class="error"></p>
            </div>
            <div class="iptBox">

                <span>借款金额</span>
                <input id="loanAmount" name="money" maxlength="8"  type="text" value="{{$pro->money}}">
                
            </div>
            <div class="iptBox">
                <span>手机号码</span>
                <input id="mobile" name="mobile" value="{{$pro->mobile}}" maxlength="11" type="text">
               
            </div>

           
            <input class="applyBtn" value="保存" id="save" type="submit">
        </div>
    </div>
</form>

<!--foot start-->
<!--foot Start-->
@include('footer')
<!--foot End-->
<link href="/css/grey2013.css" rel="stylesheet">

<!--时间  s-->

<link href="/css/jquery-ui.css" rel="stylesheet" type="text/css"> 

<!--时间  e-->
 
<!---静态化 - 头部内容---->



<style>
.foot1 .out .r .line2{
	margin-top: 0;
}
.foot2 .out .line2{
 	border-bottom: none;
    margin-top: 0;
}
</style>


</body></html>