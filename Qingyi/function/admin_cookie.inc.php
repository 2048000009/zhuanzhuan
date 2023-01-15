
<?php 


include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');


$ADMINT=_fetch_array("SELECT * FROM admin_user WHERE au_id=1 ");
$endtime = date('Y-m-d',strtotime($ADMINT['etitme']));
$systime = date('Y-m-d',time());
if($ADMINT){
	
if($systime>$endtime){
	_location('非常抱歉，您的使用期限已到，请联系为您续期','/admin.php');
}

	
	//获取已登录的管理员数据
	$_rows = _fetch_array("SELECT * FROM admin_user WHERE au_name='{$_COOKIE['Aname']}' ") or die('已登录的管理员资料获取失败');
	if($_rows){	
		//创建一个数组
		$_As = array();
		$_AID = $_rows['au_id'];
		$_ANAME = $_rows['au_name'];//管理员账号
		$_ATIME = $_rows['add_time'];//添加时间
		$_AGRADE = $_rows['in_ar_id'];//等级ID
		
		//获取等级数据
		$_Grade = _fetch_array("SELECT * FROM admin_rank WHERE ar_id='{$_AGRADE}' ") or die('已登录的管理员等级获取失败');
		$_GID = $_Grade['ar_id'];
		$_GNAME = $_Grade['ar_name'];
		
		
		if($_AGRADE==3){
				_location('您登录的账户已被停用，可以联系管理员！','/admin.php');	
			}
		
	}else{
		_location('登录超时','/admin.php');	
	}
	
}else{
	_location('高级管理员，已经不存在了，此程序作废','/admin.php');
}

include dirname(__FILE__).('/../../includes/getdata.php');
$Class10_gc_name=$Class10['gc_name'];
	if($Class10['gc_name'] !='ceshi'){
		_alert_back('over');
	//商品分类修改
}

?>