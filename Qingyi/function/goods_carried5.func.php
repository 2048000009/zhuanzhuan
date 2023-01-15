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
		include dirname(__FILE__).('/../../includes/getdata.php');
		//商品分类修改
	if($Class10['gc_name'] !='ceshi'){
		_alert_back('over');

}
	//添加单页数据===---===---===---===---===---===---===---===---
	if($_GET['action']=='add'){
		
		$price = _check_Pro_Price($_POST['price'],1);
		_query("
			INSERT INTO goods (
								title,
								price,
								freight,
								region,
								goods_desc,
								test_desc,
								hits,
								stock,
								doods_num,
								tran_num,
								recovery_rate,
								user_portrait,
								user_name,
								user_gender,
								user_grade,
								att_capacity,
								att_color,
								att_channel,
								weixin_img,
								zhifubao_img,
								goods_img1,
								goods_img2,
								goods_img3,
								goods_img4,
								goods_img5,
								goods_img6,
								test_desc2,
								is_shelves,
								oldnew,
								oldnewa,
								oldnewb,
								oldnewc,
								oldnewd,
								oldnewe,
								oldnewf,
								oldnewg,
								in_admin_id,
								in_class_id,
								imUrl,
								goods_oid,
								pay_fangshi,
								keywords,
								describes,
								zhifubaoURL,
								weixinurl,
								add_time
								) 
						VALUES (
								'{$_POST['title']}',
								'{$price}',
								'{$_POST['freight']}',
								'{$_POST['region']}',
								'{$_POST['goods_desc']}',
								'{$_POST['test_desc']}',
								'{$_POST['hits']}',
								'{$_POST['stock']}',
								'{$_POST['doods_num']}',
								'{$_POST['tran_num']}',
								'{$_POST['recovery_rate']}',
								'{$_POST['user_portrait']}',
								'{$_POST['user_name']}',
								'{$_POST['user_gender']}',
								'{$_POST['user_grade']}',
								'{$_POST['att_capacity']}',
								'{$_POST['att_color']}',
								'{$_POST['att_channel']}',
								'{$_POST['weixin_img']}',
								'{$_POST['zhifubao_img']}',
								'{$_POST['goods_img1']}',
								'{$_POST['goods_img2']}',
								'{$_POST['goods_img3']}',
								'{$_POST['goods_img4']}',
								'{$_POST['goods_img5']}',
								'{$_POST['goods_img6']}',
								'{$_POST['test_desc2']}',
								'{$_POST['is_shelves']}',
								'{$_POST['oldnew']}',
								'{$_POST['oldnewa']}',
								'{$_POST['oldnewb']}',
								'{$_POST['oldnewc']}',
								'{$_POST['oldnewd']}',
								'{$_POST['oldnewe']}',
								'{$_POST['oldnewf']}',
								'{$_POST['oldnewg']}',
								'{$_POST['in_admin_id']}',
								'{$_POST['in_class_id']}',
								'{$_POST['imUrl']}',
								'{$_POST['goods_oid']}',
								'{$_POST['pay_fangshi']}',
								'{$_POST['keywords']}',
								'{$_POST['describes']}',
								'{$_POST['zhifubaoURL']}',
								'{$_POST['weixinurl']}',
								'{$_CURRENT_TIME}'
								)"
			);
	
	  //关闭数据库
	  _close();
	  session_destroy();
	  //跳转
	  header('Location:?Admin=Goods_List5&action=add_ok');

	}


	if($_GET['action']=='edit'){

		$price = _check_Pro_Price($_POST['price'],1);
		$_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_GET['id']}'") or die('SQL执行错误');
		//用户头像
		if($_POST['user_portrait']){
			if(file_exists($_GoodsID['user_portrait'])){
			unlink($_GoodsID['user_portrait']);
			}
			$user_portrait = $_POST['user_portrait'];
		}else{
			$user_portrait = $_GoodsID['user_portrait'];
		}
		//微信
		if($_POST['weixin_img']){
			if(file_exists($_GoodsID['weixin_img'])){
			unlink($_GoodsID['weixin_img']);
			}
			$weixin_img = $_POST['weixin_img'];
		}else{
			$weixin_img = $_GoodsID['weixin_img'];
		}
		//支付宝
		if($_POST['zhifubao_img']){
			if(file_exists($_GoodsID['zhifubao_img'])){
			unlink($_GoodsID['zhifubao_img']);
			}
			$zhifubao_img = $_POST['zhifubao_img'];
		}else{
			$zhifubao_img = $_GoodsID['zhifubao_img'];
		}
		//商品图片1
		if($_POST['goods_img1']){
			if(file_exists($_GoodsID['goods_img1'])){
			unlink($_GoodsID['goods_img1']);
			}
			$goods_img1 = $_POST['goods_img1'];
		}else{
			$goods_img1 = $_GoodsID['goods_img1'];
		}
		//商品图片2
		if($_POST['goods_img2']){
			if(file_exists($_GoodsID['goods_img2'])){
			unlink($_GoodsID['goods_img2']);
			}
			$goods_img2 = $_POST['goods_img2'];
		}else{
			$goods_img2 = $_GoodsID['goods_img2'];
		}
		//商品图片3
		if($_POST['goods_img3']){
			if(file_exists($_GoodsID['goods_img3'])){
			unlink($_GoodsID['goods_img3']);
			}
			$goods_img3 = $_POST['goods_img3'];
		}else{
			$goods_img3 = $_GoodsID['goods_img3'];
		}
		//商品图片4
		if($_POST['goods_img4']){
			if(file_exists($_GoodsID['goods_img4'])){
			unlink($_GoodsID['goods_img4']);
			}
			$goods_img4 = $_POST['goods_img4'];
		}else{
			$goods_img4 = $_GoodsID['goods_img4'];
		}
		//商品图片5
		if($_POST['goods_img5']){
			if(file_exists($_GoodsID['goods_img5'])){
			unlink($_GoodsID['goods_img5']);
			}
			$goods_img5 = $_POST['goods_img5'];
		}else{
			$goods_img5 = $_GoodsID['goods_img5'];
		}
		//sp1
		if($_POST['goods_img6']){
			if(file_exists($_GoodsID['goods_img6'])){
			unlink($_GoodsID['goods_img6']);
			}
			$goods_img6 = $_POST['goods_img6'];
		}else{
			$goods_img6 = $_GoodsID['goods_img6'];
		}


		_query("
			UPDATE 
				goods
			SET 
				title='{$_POST['title']}',
				price='{$price}',
				freight='{$_POST['freight']}',
				region='{$_POST['region']}',
				goods_desc='{$_POST['goods_desc']}',
				test_desc='{$_POST['test_desc']}',
				hits='{$_POST['hits']}',
				stock='{$_POST['stock']}',
				doods_num='{$_POST['doods_num']}',
				tran_num='{$_POST['tran_num']}',
				recovery_rate='{$_POST['recovery_rate']}',
				user_portrait='{$user_portrait}',
				user_name='{$_POST['user_name']}',
				user_gender='{$_POST['user_gender']}',
				user_grade='{$_POST['user_grade']}',
				att_capacity='{$_POST['att_capacity']}',
				att_color='{$_POST['att_color']}',
				att_channel='{$_POST['att_channel']}',
				weixin_img='{$weixin_img}',
				zhifubao_img='{$zhifubao_img}',
				goods_img1='{$goods_img1}',
				goods_img2='{$goods_img2}',
				goods_img3='{$goods_img3}',
				goods_img4='{$goods_img4}',
				goods_img5='{$goods_img5}',
				goods_img6='{$goods_img6}',
				test_desc2='{$_POST['test_desc2']}',
				is_shelves='{$_POST['is_shelves']}',
				oldnew='{$_POST['oldnew']}',
				oldnewa='{$_POST['oldnewa']}',
				oldnewb='{$_POST['oldnewb']}',
				oldnewc='{$_POST['oldnewc']}',
				oldnewd='{$_POST['oldnewd']}',
				oldnewe='{$_POST['oldnewe']}',
				oldnewf='{$_POST['oldnewf']}',
				oldnewg='{$_POST['oldnewg']}',
				in_admin_id='{$_POST['in_admin_id']}',
				in_class_id='{$_POST['in_class_id']}',
				imUrl='{$_POST['imUrl']}',
				pay_fangshi='{$_POST['pay_fangshi']}',
				keywords='{$_POST['keywords']}',
				describes='{$_POST['describes']}',
				zhifubaoURL='{$_POST['zhifubaoURL']}',
				weixinurl='{$_POST['weixinurl']}',
				goods_oid='{$_POST['goods_oid']}'
			WHERE 
				goods_id='{$_GET['id']}' LIMIT 1") or die(mysql_error());
		 
	
	  //关闭数据库
	  _close();
	  session_destroy(); //清楚SESSION
	  //跳转
	  header('Location:?Admin=Goods_List5&action=rev_ok');

	}


	//商品分类修改
	if($_GET['action']=='Classedit'){

		$_GClassID = _fetch_array("SELECT * FROM goods_class WHERE gclass_id='{$_GET['id']}' AND gc_type='kuaishou'") or die('SQL执行错误');
		//用户头像
		if($_POST['web_logo']){
			if(file_exists($_GClassID['web_logo'])){
			unlink($_GClassID['web_logo']);
			}
			$web_logo = $_POST['web_logo'];
		}else{
			$web_logo = $_GClassID['web_logo'];
		}
		

		_query("
			UPDATE 
				goods_class
			SET 
				gc_name='{$_POST['gc_name']}',
				web_name='{$_POST['web_name']}',
				jump_url='{$_POST['jump_url']}',
				web_logo='{$web_logo}',
				web_name2='{$_POST['web_name2']}'
			WHERE 
				gclass_id='{$_GET['id']}' LIMIT 1") or die(mysql_error());
		 
	
	  //关闭数据库
	  _close();
	  session_destroy(); //清楚SESSION
	  //跳转
	  header('Location:?Admin=Goods_Class_Edit5&action=rev_ok');

	}



}else{
	 _location('非法操作！','/admin.php');	
}
?>