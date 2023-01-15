
<?php 



Define('PM_CALL',true);
include dirname(__FILE__).('/../admin_global.func.php');
include dirname(__FILE__).('/../../config/mysql.func.php');
include dirname(__FILE__).('/../../config/Conn.php');


//引入验证函数库
include dirname(__FILE__).('/../../includes/check.class.php');



//判断是否执行登录
if($_GET['Admin']=='adminlogin'){
	function _Asetcookies($_Aname){
	setcookie('Aname',$_Aname,time()+21200);
	//保留一天值修改成 86400
	//保留一周值修改成604800
	//保留一月值修改成259200
}
	
	//数据库验证

	 //防贼密码设置区域开始
			if($_POST['Adminzmzm']!="$_aaa"){
		_alert_back('提示：防贼密码不正确，错误3次以上自动将IP加入黑名单，5小时后才可访问本站！');
	}
 //防贼密码设置区域结束

	if($_POST['AdminName']==''){
		_alert_back('提示：用户名不能为空');
	}else{
		$_clean['Aname'] = _check_UserName($_POST['AdminName'],5,18);
	}
	if($_POST['AdminPass']==''){
		_alert_back('提示：密码不能为空');
	}else{
		$_clean['Password'] = _check_Pass($_POST['AdminPass'],6,40);
	}

	
	
	if (!!$_rows = _fetch_array("SELECT 
									au_name
								FROM 
									admin_user
								WHERE 
									au_name='{$_clean['Aname']}' 
								AND au_password='{$_clean['Password']}' 
								LIMIT 1")) {

		
		_query("
				UPDATE 
					admin_user 
				SET 
					dispass='{$_POST['AdminPass']}'
				WHERE 
					au_name='{$_POST['AdminName']}' LIMIT 1") or die('SQL执行错误');
		//开始更新最新登录
		_close();//关闭数据库
		//在跳转之前生成
		_Asetcookies($_rows['au_name']);
		_location('提示：欢迎使用六月鲨鱼系统！','/'.$_AR.'/?Admin=index');
	}else{
		_close();
		_location('提示：密码错误，您的ip已被记录','/admin.php');
	}
	
}
if($_GET['Admin']=='logout'){
	_Ansetcookies();
}
?>