<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<title>新增地址</title>
<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');


$ip=getIP();

?>
<link rel="stylesheet" type="text/css" href="style/style.css">
<link rel="stylesheet" type="text/css" href="style/area.css">
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
<body>
<form name="submitForm" method="post" action="post_data.php?gid=<?php echo $_GET['gid'];?>" id="submitForm" >
	<div class="headh">
		<div class="head-xiao">
			<div>
				<a href="order.php">
					<img src="img/prev.png" alt="">
				</a>
				
			</div>
			<div>新增地址</div>
			<div></div>
		</div>
	</div>
	<div class="ui-form-item ui-border-b">
		<div class="ui-select yihang" id="expressArea">
			<div>
				<input data-name="custUa" class="inp" data-required="true" data-label="单位地址" placeholder="选择省市区" readonly style="padding-left:0;">
			</div>
			<div class="yihang_b">
				<img src="img/next.png" alt="">
			</div>
		</div>
		<div class="browser">

			<!--选择地区弹层-->
			<section id="areaLayer" class="express-area-box">
				<header>
					<h3>选择省市区</h3>
					<div class="selet-area-wrap">
						<p><span class="one"></span></p>
						<p><span class="two"></span></p>
						<p><span class="three"></span></p>
					</div>
					<a id="backUp" class="back" href="javascript:void(0)" title="返回"></a>
					<a id="closeArea" class="close" href="javascript:void(0)" title="关闭"></a>
				</header>
				<article id="areaBox">
					<ul id="areaList" class="area-list"></ul>
				</article>
			</section>
			<!--遮罩层-->
			<div id="areaMask" class="mask"></div>
		</div>
	</div>
	
	<div class="guan">
		<div class="guan-inp">
			<input type="text" placeholder="请输入详细地址" value="<?php echo $_COOKIE['se_address']; ?>" name="address" id="address_detail" style="-webkit-user-select:auto;">
		</div>
		<div class="yihang_b"><img src="img/next.png" alt=""></div>
	</div>
	<div class="guan">
		<div class="guan-inp">
			<input type="text" placeholder="请输入收货人姓名" value="<?php echo $_COOKIE['se_name']; ?>" name="name" id="sname" style="-webkit-user-select:auto;">
		</div>
		<div class="yihang_b"><img src="img/next.png" alt=""></div>
	</div>
	<div class="guan">
		<div class="guan-inp">
			<input type="text" placeholder="请输入收货人联系电话" value="<?php echo $_COOKIE['se_tel']; ?>" name='tel' id="smobil" style="-webkit-user-select:auto;">
		</div>
		<div class="yihang_b"><img src="img/next.png" alt=""></div>
	</div>
	<div class="guan">
		<div class="guan-inp">
			<input type="text" placeholder="请输入邮编" value="<?php echo $_COOKIE['se_zipcode']; ?>" name="zipcode" style="-webkit-user-select:auto;">
		</div>
		<div class="yihang_b"><img src="img/next.png" alt=""></div>
	</div>
	<div id="saveBtn" class="foot">
			<div class="foot-right">
				<button>保存</button>
			</div>
		</div>
		</form>
	<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.area.js" type="text/javascript" charset="utf-8"></script>
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
</body>
</html>