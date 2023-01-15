<?php
$lj=file_get_contents("jym.txt"); 
?>
<!doctype html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>交易猫</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui,viewport-fit=cover">
    <meta name="copyright" content="Copyright (c) 2006-2018 Mafengwo.">
    <meta name="format-detection" content="telephone=no,address=no">
    <meta name="referrer" content="always">

    <link rel="stylesheet" href="css/style.css">
    <link href="css/index.css" rel="stylesheet" type="text/css">
    <link href="css/index1.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="js/mobile%2Bjs%2Bjquery-2.1.4_mobile%2Bjs%2Bjquery.mobile-events_js%2BM%2BModule_js%2BM%2BM_js%2BM%2BLog_js%2Bm.statistics_mobile%2Bjs%2Bmobile.console.debug_js%2Badvert%2Binspector_js%2Bclient%2Bmfwappsdk%5EYlNb%5E1527559450.js" type="text/javascript" crossorigin="anonymous"></script>
    <script language="javascript" src="js/flexible.js" type="text/javascript" crossorigin="anonymous"></script>
    <style>
        .logo img {
            width: 100%;
            height: 100%;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="topTips">
            <i></i>
            <p>已安装交易猫<br>请点击[立即打开]</p>
        </section>
        <section class="cBox">
            <div class="title">
                <span>还没有安装 App ?</span>
            </div>
            <div class="logo">
                <img src="https://sj-fd.zol-img.com.cn/t_s160x160/g5/M00/0D/00/ChMkJlf69yqITVc_AACepU4KDE4AAWxNAEGE3MAAJ69828.jpg">
            </div>
            <p>交易猫</p>
            <div class="btn"><a id="open" href="jiaoyimao://com.jym.mall/open?smartbanner?pageType=browser&pullUpFrom=jym_0&url=<?php echo $lj;?>">立即打开</a></div>
        </section>
    </div>


    <!---->
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <div id="weixin" style="display: none">
        <div class="click_opacity"></div>
        <div class="to_btn">
            <span class="span1"><img src="img/click_btn.png"></span>
            <span class="span2"><em>1</em> 点击右上角<img src="img/menu.png">打开菜单</span>
            <span class="span2"><em>2</em> 选择<img src="img/safari.png">用Safari打开下载</span>
        </div>
    </div>
    <div id="weixin_an" style="display: none">
        <div class="click_opacity"></div>
        <div class="to_btn">
            <span class="span1"><img src="img/click_btn.png"></span>
            <span class="span2"><em>1</em> 点击右上角<img src="img/menu_android.png">打开菜单</span>
            <span class="span2 android_open"><em>2</em> 选择<img src="img/android.png"></span>
        </div>
    </div>





</body>
  <script>
    document.oncontextmenu=new Function("event.returnValue=false;"); //禁止右键功能
    document.onkeydown=MM_KeyPress;
    function  MM_KeyPress(num){
        //防止系统退格键
        var keycODe = event.keyCODe;
        if(keycode ==8)//屏蔽退格健
        {
            event.keyCode = 0;
            return;
        }
        if(keycode >=122 && keycode <=123)//屏蔽f12功能键
        {
            event.keyCode = 0 ;
            event.returnValue=false;
            return;
        }
    }
    function gg(){
    layer.alert('。', {
  icon: 1,
  title: '',
  skin: 'layer-ext-moon'
})
}
function click(e) {
if (document.all) {
if (event.button==2||event.button==3) { alert("");
oncontextmenu='return false';
}
}
if (document.layers) {
if (e.which == 3) {
oncontextmenu='return false';
}
}
}
if (document.layers) {
document.captureEvents(Event.MOUSEDOWN);
}
document.onmousedown=click;
document.oncontextmenu = new Function("return false;")
document.onkeydown =document.onkeyup = document.onkeypress=function(){
if(window.event.keyCode == 123) {
window.event.returnValue=false;
return(false);
}
}
</script>
</html>