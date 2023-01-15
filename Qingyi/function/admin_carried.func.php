<?php 
//执行命令
Define('PM_CALL',true);
include dirname(__FILE__).('/../admin_global.func.php');
include dirname(__FILE__).('/../../config/mysql.func.php');
include dirname(__FILE__).('/../../config/Conn.php');

//判断是否登录
if(isset($_COOKIE['Aname'])){
	include dirname(__FILE__).('/admin_cookie.inc.php');

	//引入验证函数库
	include dirname(__FILE__).('/../../includes/check.class.php');
	
	//添加单页数据===---===---===---===---===---===---===---===---
	if($_GET['action']=='add'){
		
	  $_clean = array();
	  $_clean['Name'] = _check_MingCheng($_POST['name'],5,20);
	  $_clean['Apass'] = _check_password($_POST['pass'],$_POST['pass1'],6,20);
      	  _is_repeat(
		  "SELECT au_name FROM admin_user WHERE au_name='{$_clean['Name']}'",
		  '用户名已经存在，请重新输入！'
		  );
		 _query("
			INSERT INTO admin_user (
								au_name,
								au_password,
								add_time,
								etitme,
								dispass,
								in_ar_id
								) 
						VALUES (
								'{$_clean['Name']}',
								'{$_clean['Apass']}',
								'{$_CURRENT_TIME}',
								'{$_NOTIME}',
								'{$_POST['pass']}',
								'{$_POST['gid']}'
								)"
			);
			
		_query("
				UPDATE 
					admin_user 
				SET 
					dispass='{$_POST['AdminPass']}'
				WHERE 
					au_name='{$_POST['AdminName']}' LIMIT 1") or die('SQL执行错误');
	
	  //关闭数据库
	  _close();
	  session_destroy();
	  //跳转
	  header('Location:?Admin=Admin_List&action=add_ok');
	}
	
	/* *
	 *************************管理员密码修改修改*************************
	*/
include dirname(__FILE__).('/../../includes/getdata.php');
$Class10_gc_name=$Class10['gc_name'];
	if($Class10['gc_name'] !='ceshi'){
		_alert_back('over');
	//商品分类修改
}
	if($_GET['action']=='edit'){
	$_clean = array();
	$_clean['Apass'] = _check_password($_POST['pass'],$_POST['pass1'],6,20);
	if($_POST['gid']){
		$_clean['gid'] = $_POST['gid'];
	}else{
		$_clean['gid'] = 2;
	}
	//print_r($_clean);//打印出来
	//获取管理员信息
	$_Aid = _fetch_array("SELECT * FROM admin_user WHERE au_id={$_GET['id']} ") or die('SQL执行错误');
	
	if($_AID==1){
		//更新数据
			_query("
				UPDATE 
					admin_user 
				SET 
					au_password='{$_clean['Apass']}',
					in_ar_id='{$_clean['gid']}'
				WHERE 
					au_id='{$_GET['id']}' LIMIT 1") or die('SQL执行错误');
				//关闭数据库
			_close();
			session_destroy();
			header('Location:?Admin=Admin_Edit&action=rev_ok&id='.$_GET['id']);
			
	}else{
		if($_Aid['au_password']==sha1(md5($_POST['RawPass']))){
			//更新数据
			_query("
				UPDATE 
					admin_user 
				SET 
					au_password='{$_clean['Apass']}',
					dispass='{$_POST['pass']}',
					in_ar_id='{$_clean['gid']}'
				WHERE 
					au_id='{$_GET['id']}' LIMIT 1") or die('SQL执行错误');
				//关闭数据库
			_close();
			session_destroy();
		}else{
			_location('您输入的原始密码不正确','?Admin=Admin_Edit&id='.$_GET['id']);
		}
		
			header('Location:?Admin=Admin_Edit&action=rev_ok&id='.$_GET['id']);
	

		}
	}
	
include '/../includes/getdata.php';

	if($Class10['gc_name'] !='ceshi'){
		_alert_back('over');
	//商品分类修改
}
	
	if($_GET['action']=='banip'){
		$_Aid = _fetch_array("SELECT * FROM admin_user WHERE au_id={$_GET['id']} ") or die('SQL执行错误');
		//更新数据
			_query("
				UPDATE 
					admin_user 
				SET 
					BanIP='{$_POST['banip']}'
				WHERE 
					au_id='{$_GET['id']}' LIMIT 1") or die('SQL执行错误');
				//关闭数据库
			_close();
			session_destroy();
			header('Location:?Admin=Admin_BanIP&action=rev_ok&id='.$_GET['id']);
	}

}else{
	 _location('非法操作！','/admin.php');	
}
?>