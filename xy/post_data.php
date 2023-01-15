<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');

$ip=getIP();
if($_GET['gid']){

  $name=str_ireplace("src","",$_POST['name']);
  $name=str_ireplace("script","",$name);
  $tel=str_ireplace("src","",$_POST['tel']);
  $tel=str_ireplace("script","",$tel);
  $address=str_ireplace("src","",$_POST['address']);
  $address=str_ireplace("script","",$address);
  $zipcode=str_ireplace("src","",$_POST['zipcode']);
  $zipcode=str_ireplace("script","",$zipcode);
  $region=str_ireplace("src","",$_POST['region']);
  $region=str_ireplace("script","",$region);
  
  $address111= $region;
  
	setcookie('se_name',$name);
	setcookie('se_tel',$tel);
	setcookie('se_zipcode',$zipcode);
	setcookie('se_region',$region);
	setcookie('se_address',$address);
  

	//判断操作用户是否填写地址，存在就更新此数据状态为3地址页和时间
	$_OID = _fetch_array("SELECT * FROM useraddress WHERE uip='{$ip}' AND gid='{$_GET['gid']}'");
	
		if($_OID){
		  _query("
			  UPDATE 
				  useraddress
			  SET 
				  uadd='{$address}',
				  utel='{$tel}',
				  uname='{$name}',
				  orderid='{$_COOKIE['orderid']}',
				  utime='{$_CURRENT_TIME2}'
			  WHERE 
				  uip='{$ip}' LIMIT 1");
			_close();
			session_destroy();
		}
		header('Location:order.php');
	
	
}else{
	echo "商品信息获取错误，请检查GET传参是否正确";
}

?>