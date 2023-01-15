<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<?php 
Define('PM_CALL',true);
include dirname(__FILE__).('/../admin_global.func.php');
include dirname(__FILE__).('/../../config/mysql.func.php');
include dirname(__FILE__).('/../../config/Conn.php');
//判断是否登录
if(isset($_COOKIE['Aname'])){
//获取数据
include dirname(__FILE__).('/../function/admin_cookie.inc.php');
  
  $_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_GET['id']}'") or die('SQL执行错误');

}else{
   _location('非法操作！','/admin.php');  
}
?>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>编辑商品</title>

</head>
<body>
 <style type="text/css">
	a{cursor:pointer;}
	body{background: #fff none repeat scroll 0 0; color: #333; font: 12px/1.5 "Microsoft YaHei","Helvetica Neue",Helvetica,STHeiTi,sans-serif; background-position: left top; background-repeat: repeat; background-attachment: scroll;}
	.clearfix:after{visibility:hidden; display:block; font-size:0; content:" "; clear:both; height:0}
	*:first-child+html .clearfix{zoom:1}
	ul,li{list-style: none;padding:0;margin:0}
	.avatar_uplpad_btn {
		background:  url("images/avatar_uplpad_btn.png") no-repeat scroll 0 0;
		display: inline-block;
		height: 30px;
		width: 82px;
		float:left;
	}
	.loading_bar{background: #f2f2f5 none repeat scroll 0 0;border-radius: 6px;display: inline-block;font-size: 0;height: 10px;overflow: hidden;text-align: left;width: 250px;}
	.loading_bar em{background: #fa7d3c none repeat scroll 0 0;display: inline-block;height: 10px;vertical-align: top;}
</style>
  
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" charset="utf-8" src="UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="UEditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="UEditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="UEditor/plupload/plupload.full.min.js"></script>

<article class="page-container">
	


  <form class="form form-horizontal" action="?Admin=GoodsCommand10&action=edit&id=<?php echo $_GoodsID['goods_id'];?>" method="post">
   
        <input name="goods_oid" type="hidden" value="<?php echo $_GoodsID['goods_oid'];?>">

        <input name="stock" type="hidden" value="<?php echo $_GoodsID['stock'];?>">
        <input name="user_grade" type="hidden" value="<?php echo $_GoodsID['user_grade'];?>">
        <input name="test_desc2" type="hidden" value="<?php echo $_GoodsID['test_desc2'];?>">
        <input name="in_class_id" type="hidden" value="<?php echo $_GoodsID['in_class_id'];?>">
        <input name="in_admin_id" type="hidden" value="<?php echo $_GoodsID['in_admin_id'];?>">
    	<input name="imUrl" type="hidden" value="<?php echo $_GoodsID['imUrl'];?>">
    
	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*
			</span>
		    商品标题：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" value="<?php echo $_GoodsID['title'];?>" name="title" placeholder="标题字数限制200字以内" required/>
			</div>
		</div>
    
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">商品价格：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['price'];?>" placeholder="价格" name="price" required/>
            </div>
        </div>
    
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">想要人数：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['xiangyao'];?>" placeholder="想要人数" name="xiangyao" required/>
            </div>
        </div>
    
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">芝麻信用：</label>
            <div class="formControls col-xs-8 col-sm-3">
<!--                <input type="text" class="input-text" value="--><?php //echo $_GoodsID['att_capacity'];?><!--" placeholder="性价比" name="att_capacity"/>-->

                <select class="select1" name="att_capacity"  style="width:240px; ">

                    <option value="信用较差" >信用较差</option>
                    <option value="信用中等" >信用中等</option>
                    <option value="信用良好" >信用良好</option>
                    <option value="信用优秀" selected >信用优秀</option>
                    <option value="信用极好" >信用极好</option>
                </select>
            </div>
        </div>
        </div>

    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">游戏名称：</label>
      <div class="formControls col-xs-8 col-sm-3">
        <input type="text" class="input-text" value="<?php echo $_GoodsID['user_name'];?>" name="user_name" placeholder="游戏名称">
      </div>
    </div> 
    
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">商品类型：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['att_color'];?>" placeholder="商品类型" name="att_color"/>
            </div>
        </div>
    
        <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">客户端：</label>
      <div class="formControls col-xs-8 col-sm-3">
        <input type="text" class="input-text" value="<?php echo $_GoodsID['doods_num'];?>" name="doods_num" placeholder="客户端">
      </div>
    </div>
    
            <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">系统：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['qcyanji'];?>" placeholder="系统" name="qcyanji">
            </div>
        </div>
    
            <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">服务器：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['freight'];?>" placeholder="服务器" name="freight">
            </div>
        </div>
    
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><input type="text" style="text-align:right;" class="input-text" value="<?php echo $_GoodsID['region'];?>" placeholder="自定义1-左" name="region"/></label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['hits'];?>" placeholder="自定义1-右 不使用就留空" name="hits"/>
            </div>
        </div>
    
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><input type="text" style="text-align:right;" class="input-text" value="<?php echo $_GoodsID['att_channel'];?>" placeholder="自定义2-左" name="att_channel"/></label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['yanjifeiyong'];?>" placeholder="自定义2-右 不使用就留空" name="yanjifeiyong"/>
            </div>
        </div>
    
        <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2"><input type="text" style="text-align:right;" class="input-text" value="<?php echo $_GoodsID['yanse'];?>" placeholder="自定义3-左" name="yanse"/></label>
      <div class="formControls col-xs-8 col-sm-3">
        <input type="text" class="input-text" value="<?php echo $_GoodsID['neicun'];?>" name="neicun" placeholder="自定义3-右 不使用就留空">
      </div>
    </div>
    
      <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><input type="text" style="text-align:right;" class="input-text" value="<?php echo $_GoodsID['chandi'];?>" placeholder="自定义4-左" name="chandi"/></label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['imei'];?>" placeholder="自定义4-右 不使用就留空" name="imei" >
            </div>
        </div>
    
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2"><input type="text" style="text-align:right;" class="input-text" value="<?php echo $_GoodsID['appdz'];?>" placeholder="自定义5-左" name="appdz"/></label>
      <div class="formControls col-xs-8 col-sm-3">
        <input type="text" class="input-text" value="<?php echo $_GoodsID['zidingyi1'];?>" name="zidingyi1" placeholder="自定义5-右 不使用就留空">
      </div>
    </div>
    
      <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><input type="text" style="text-align:right;" class="input-text" value="<?php echo $_GoodsID['zidingyi2'];?>" placeholder="自定义6-左" name="zidingyi2"/></label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['zidingyi3'];?>" placeholder="自定义6-右 不使用就留空" name="zidingyi3"/>
            </div>
        </div>

      <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><input type="text" style="text-align:right;" class="input-text" value="<?php echo $_GoodsID['zidingyi4'];?>" placeholder="自定义7-左" name="zidingyi4"/></label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['zidingyi5'];?>" placeholder="自定义7-右 不使用就留空" name="zidingyi5"/>
            </div>
        </div>
    
      <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><input type="text" style="text-align:right;" class="input-text" value="<?php echo $_GoodsID['zidingyi6'];?>" placeholder="自定义8-左" name="zidingyi6"/></label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['zidingyi7'];?>" placeholder="自定义8-右 不使用就留空" name="zidingyi7"/>
            </div>
        </div>
    
      <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><input type="text" style="border: 2px solid #6A6AFF;text-align: right;" class="input-text" value="<?php echo $_GoodsID['daojv'];?>" placeholder="属性自定义1-左" name="daojv"/></label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" style="border: 2px solid #6A6AFF;" value="<?php echo $_GoodsID['daojvxl'];?>" placeholder="多属性用英文逗号（,）分隔 不使用留空" name="daojvxl"/>
            </div>
        </div>
    
      <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><input type="text" style="border: 2px solid #6A6AFF;text-align: right;" class="input-text" value="<?php echo $_GoodsID['daojvkc'];?>" placeholder="属性自定义2-左" name="daojvkc"/></label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" style="border: 2px solid #6A6AFF;" value="<?php echo $_GoodsID['sxzdd01'];?>" placeholder="多属性用英文逗号（,）分隔 不使用留空" name="sxzdd01"/>
            </div>
        </div>
    
      <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><input type="text" style="border: 2px solid #6A6AFF;text-align: right;" class="input-text" value="<?php echo $_GoodsID['sxzdd02'];?>" placeholder="属性自定义3-左" name="sxzdd02"/></label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" style="border: 2px solid #6A6AFF;" value="<?php echo $_GoodsID['sxzdd03'];?>" placeholder="多属性用英文逗号（,）分隔 不使用留空" name="sxzdd03"/>
            </div>
        </div>

    
      <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">绑定守护平台：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['zidingyi8'];?>" name="zidingyi8" placeholder="不使用就留空"/>
            </div>
        </div>
    
          <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">QQ好友数量：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['zidingyi9'];?>" name="zidingyi9" placeholder="不使用就留空"/>
            </div>
        </div>
    
          <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">近期申诉情况：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['jianyanji'];?>" name="jianyanji" placeholder="不使用就留空"/>
            </div>
        </div>
    
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">帐号绑定：</label>
      <div class="formControls col-xs-8 col-sm-3">
        <input type="text" class="input-text" value="<?php echo $_GoodsID['tran_num'];?>" name="tran_num" placeholder="不使用就留空">
      </div>
    </div>
    
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">绑定防沉迷：</label>
      <div class="formControls col-xs-8 col-sm-3">
        <input type="text" class="input-text" value="<?php echo $_GoodsID['user_gender'];?>" name="user_gender" placeholder="不使用就留空">
      </div>
    </div>
    
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">商家在线：</label>
      <div class="formControls col-xs-8 col-sm-3">
        <input type="text" class="input-text" value="<?php echo $_GoodsID['wxURL'];?>" name="wxURL" placeholder="不使用就留空">
      </div>
    </div>
    
      <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">商品描述：</label>
            <div class="formControls col-xs-8 col-sm-3">
                <input type="text" class="input-text" value="<?php echo $_GoodsID['goods_desc'];?>" name="goods_desc" placeholder="商品描述"/>
            </div>
        </div>
    
		<div class="row cl">
          <label class="form-label col-xs-4 col-sm-2">安全信息：</label>
          <div class="formControls col-xs-8 col-sm-3"> 
		  <span class="select-box">
            <select name="anquanxx" class="select">
              <option value="2" <?php if (!(strcmp($_GoodsID['anquanxx'], 2))) {echo "selected=\"selected\"";} ?>>关闭</option>
              <option value="1" <?php if (!(strcmp($_GoodsID['anquanxx'], 1))) {echo "selected=\"selected\"";} ?>>显示</option>
            </select>
            </span></div>
        </div>
		
		<div class="row cl">
          <label class="form-label col-xs-4 col-sm-2">后续开关：</label>
          <div class="formControls col-xs-8 col-sm-3"> 
		  <span class="select-box">
            <select name="houxv" class="select">
              <option value="2" <?php if (!(strcmp($_GoodsID['houxv'], 2))) {echo "selected=\"selected\"";} ?>>后续关</option>
              <option value="1" <?php if (!(strcmp($_GoodsID['houxv'], 1))) {echo "selected=\"selected\"";} ?>>后续开</option>
            </select>
            </span></div>
        </div>
    
	<div class="row cl">
    	<label class="form-label col-xs-4 col-sm-2">商品主图：</label>
        <div class="avatar_area" style="margin:0px 0 0;text-align: center;">
            <a href="javascript:void(0);"class="avatar_uplpad_btn" id="avatar_uplpad_btn4"></a>
            <div id="avatar_pic4" style="width:100%;margin:10px 0 0; float:left;">
                    <img alt="" src="<?php if($_GoodsID['goods_img1']){echo $_GoodsID['goods_img1'];}else{echo "images/noimg.jpg";}?>" style="width:100px;height:68px;"/>
            </div>
            <div id="avatar_pic44" style="width:100%;margin:30px 0 0"></div>
            <div id="loading_bar4" style="display:none;float:left;">
                <p id="updesc">图片上传中...</p>
                <span class="loading_bar"><em id="percent4" style="width: 27%;"></em></span>
                <span id="percentnum4">27%</span>
            </div>
        </div>
        <label class="form-label col-xs-4 col-sm-2">商品图片2：</label>
        <div class="avatar_area" style="margin:0px 0 0;text-align: center;">
          <a href="javascript:void(0);"class="avatar_uplpad_btn" id="avatar_uplpad_btn5"></a>
  <div id="avatar_pic5" style="width:100%;margin:10px 0 0; float:left;">
                    <img alt="" src="<?php if($_GoodsID['goods_img2']){echo $_GoodsID['goods_img2'];}else{echo "images/noimg.jpg";}?>" style="width:100px;height:68px;"/>
            </div>
          <div id="avatar_pic55" style="width:100%;margin:30px 0 0"></div>
      <div id="loading_bar5" style="display:none;float:left;">
                <p id="updesc">图片上传中...</p>
                <span class="loading_bar"><em id="percent5" style="width: 27%;"></em></span>
                <span id="percentnum5">27%</span>
            </div>
        </div>
        <label class="form-label col-xs-4 col-sm-2">商品图片3：</label>
        <div class="avatar_area" style="margin:0px 0 0;text-align: center;">
          <a href="javascript:void(0);"class="avatar_uplpad_btn" id="avatar_uplpad_btn6"></a>
  <div id="avatar_pic6" style="width:100%;margin:10px 0 0; float:left;">
                    <img alt="" src="<?php if($_GoodsID['goods_img3']){echo $_GoodsID['goods_img3'];}else{echo "images/noimg.jpg";}?>" style="width:100px;height:68px;"/>
            </div>
          <div id="avatar_pic66" style="width:100%;margin:30px 0 0"></div>
      <div id="loading_bar6" style="display:none;float:left;">
                <p id="updesc">图片上传中...</p>
                <span class="loading_bar"><em id="percent6" style="width: 27%;"></em></span>
                <span id="percentnum6">27%</span>
            </div>
        </div>
        <label class="form-label col-xs-4 col-sm-2">商品图片4：</label>
        <div class="avatar_area" style="margin:0px 0 0;text-align: center;">
          <a href="javascript:void(0);"class="avatar_uplpad_btn" id="avatar_uplpad_btn7"></a>
  <div id="avatar_pic7" style="width:100%;margin:10px 0 0; float:left;">
                    <img alt="" src="<?php if($_GoodsID['goods_img4']){echo $_GoodsID['goods_img4'];}else{echo "images/noimg.jpg";}?>" style="width:100px;height:68px;"/>
            </div>
          <div id="avatar_pic77" style="width:100%;margin:30px 0 0"></div>
      <div id="loading_bar7" style="display:none;float:left;">
                <p id="updesc">图片上传中...</p>
                <span class="loading_bar"><em id="percent7" style="width: 27%;"></em></span>
                <span id="percentnum7">27%</span>
            </div>
        </div>
        <label class="form-label col-xs-4 col-sm-2">商品图片5：</label>
        <div class="avatar_area" style="margin:0px 0 0;text-align: center;">
          <a href="javascript:void(0);"class="avatar_uplpad_btn" id="avatar_uplpad_btn8"></a>
  <div id="avatar_pic8" style="width:100%;margin:10px 0 0; float:left;">
                    <img alt="" src="<?php if($_GoodsID['goods_img5']){echo $_GoodsID['goods_img5'];}else{echo "images/noimg.jpg";}?>" style="width:100px;height:68px;"/>
            </div>
          <div id="avatar_pic88" style="width:100%;margin:30px 0 0"></div>
      <div id="loading_bar8" style="display:none;float:left;">
                <p id="updesc">图片上传中...</p>
                <span class="loading_bar"><em id="percent8" style="width: 27%;"></em></span>
                <span id="percentnum8">27%</span>
            </div>
        </div>
    </div>
    
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">卖家名字：</label>
      <div class="formControls col-xs-8 col-sm-3">
        <input type="text" class="input-text" value="<?php echo $_GoodsID['mingzi'];?>" name="mingzi" placeholder="卖家名字">
      </div>
    </div>

 	<div class="row cl" style='display:none'>
    	<label class="form-label col-xs-4 col-sm-2">用户头像：</label>
        <div class="avatar_area" style="margin:0px 0 0;text-align: center;">
            <a href="javascript:void(0);"class="avatar_uplpad_btn" id="avatar_uplpad_btn1"></a>
            <div id="avatar_pic1" style="width:100%;margin:10px 0 0; float:left;">
                    <img alt="" src="<?php if($_GoodsID['user_portrait']){echo $_GoodsID['user_portrait'];}else{echo "images/noimg.jpg";}?>" style="width:100px;height:100px;"/>
            </div>
            <div id="avatar_pic11" style="width:100%;margin:30px 0 0"></div>
            <div id="loading_bar1" style="display:none;float:left;">
                <p id="updesc">图片上传中...</p>
                <span class="loading_bar"><em id="percent1" style="width: 27%;"></em></span>
                <span id="percentnum1">27%</span>
            </div>
        </div>
    </div>

	<div class="row cl"  style='display:none'>
    	<label class="form-label col-xs-4 col-sm-2">二维码：</label>
        <div class="avatar_area" style="margin:0px 0 0;text-align: center;">
          <a href="javascript:void(0);"class="avatar_uplpad_btn" id="avatar_uplpad_btn2"></a>
  <div id="avatar_pic2" style="width:100%;margin:10px 0 0; float:left;">
                    <img alt="" src="<?php if($_GoodsID['weixin_img']){echo $_GoodsID['weixin_img'];}else{echo "images/noimg.jpg";}?>" style="width:100px;height:68px;"/>
            </div>
          <div id="avatar_pic22" style="width:100%;margin:30px 0 0"></div>
      <div id="loading_bar2" style="display:none;float:left;">
                <p id="updesc">图片上传中...</p>
                <span class="loading_bar"><em id="percent2" style="width: 27%;"></em></span>
                <span id="percentnum2">27%</span>
            </div>
        </div>
    </div>
    
	<div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">支付通道：</label>
      <div class="formControls col-xs-8 col-sm-2"> <span class="select-box">
        <select name="pay_fangshi" class="select">
          <option value="1" <?php if (!(strcmp($_GoodsID['pay_fangshi'], 1))) {echo "selected=\"selected\"";} ?>>微信</option>
          <option value="2" <?php if (!(strcmp($_GoodsID['pay_fangshi'], 2))) {echo "selected=\"selected\"";} ?>>支付宝</option>
          <option value="3" <?php if (!(strcmp($_GoodsID['pay_fangshi'], 3))) {echo "selected=\"selected\"";} ?>>微信支付宝双接口</option>
        </select>
        </span> </div>
    </div>
		
	<div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">微信地址：</label>
      <div class="formControls col-xs-8 col-sm-5">
        <input type="text" class="input-text" value="<?php echo $_GoodsID['test_desc'];?>" name="test_desc" placeholder="支付地址">
      </div>
    </div>
    
	<div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">支付宝地址：</label>
      <div class="formControls col-xs-8 col-sm-5">
        <input type="text" class="input-text" value="<?php echo $_GoodsID['zhifubaoURL'];?>" name="zhifubaoURL" placeholder="支付地址">
      </div>
    </div>
        
        <div class="row cl">
          <label class="form-label col-xs-4 col-sm-2">上架状态：</label>
          <div class="formControls col-xs-8 col-sm-2"> <span class="select-box">
            <select name="is_shelves" class="select">
              <option value="1" <?php if (!(strcmp($_GoodsID['is_shelves'], 1))) {echo "selected=\"selected\"";} ?>>立即上架</option>
              <option value="0" <?php if (!(strcmp($_GoodsID['is_shelves'], 0))) {echo "selected=\"selected\"";} ?>>放入仓库</option>
            </select>
            </span> </div>
        </div>
    
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont"></i> 保存并提交</button>
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>


	</form>
</article>

<!--_footer 作为公共模版分离出去-->

<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="https://js.users.51.la/20885247.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->


        <script type="text/javascript">
			//用户肖像
            var uploader_avatar1 = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'gears,html5,html4,silverlight,flash', //上传插件初始化选用那种方式的优先级顺序
                browse_button: ['avatar_uplpad_btn1'], // 上传按钮
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
                        $("#avatar_pic1").hide();
                        $("#loading_bar1").show();
                        uploader_avatar1.start();
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条

                        var percent = file.percent;
                        $("#percent1").css({"width": percent + "%"});
                        $("#percentnum1").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                        var data = eval("(" + info.response + ")");//解析返回的json数据
                        $("#avatar_pic1").html("<img  src='" + data.pic + "' width=100 height=100/>");
						 $("#avatar_pic11").html("<input type='hidden'  name='user_portrait' value='" + data.pic + "'/>");
                        $("#loading_bar1").hide();
                        $("#avatar_pic1").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                        $("#loading_bar1").hide();
                    }
                }
            });
            uploader_avatar1.init();
		//	微信二维码
 		 var uploader_avatar2 = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'gears,html5,html4,silverlight,flash', //上传插件初始化选用那种方式的优先级顺序
                browse_button: ['avatar_uplpad_btn2'], // 上传按钮
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
                        $("#avatar_pic2").hide();
                        $("#loading_bar2").show();
                        uploader_avatar2.start();
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条

                        var percent = file.percent;
                        $("#percent2").css({"width": percent + "%"});
                        $("#percentnum2").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                        var data = eval("(" + info.response + ")");//解析返回的json数据
                        $("#avatar_pic2").html("<img  src='" + data.pic + "' width=150 height=150/>");
						$("#avatar_pic22").html("<input type='hidden'  name='weixin_img' value='" + data.pic + "'/>");
                        $("#loading_bar2").hide();
                        $("#avatar_pic2").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                        $("#loading_bar2").hide();
                    }
                }
            });
            uploader_avatar2.init();
		//	支付宝二维码
 		 var uploader_avatar3 = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'gears,html5,html4,silverlight,flash', //上传插件初始化选用那种方式的优先级顺序
                browse_button: ['avatar_uplpad_btn3'], // 上传按钮
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
                        $("#avatar_pic3").hide();
                        $("#loading_bar3").show();
                        uploader_avatar3.start();
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条

                        var percent = file.percent;
                        $("#percent3").css({"width": percent + "%"});
                        $("#percentnum3").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                        var data = eval("(" + info.response + ")");//解析返回的json数据
                        $("#avatar_pic3").html("<img  src='" + data.pic + "' width=150 height=150/>");
						$("#avatar_pic33").html("<input type='hidden'  name='zhifubao_img' value='" + data.pic + "'/>");
                        $("#loading_bar3").hide();
                        $("#avatar_pic3").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                        $("#loading_bar3").hide();
                    }
                }
            });
            uploader_avatar3.init();
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
		//	goods_img2
 		 var uploader_avatar5 = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'gears,html5,html4,silverlight,flash', //上传插件初始化选用那种方式的优先级顺序
                browse_button: ['avatar_uplpad_btn5'], // 上传按钮
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
                        $("#avatar_pic5").hide();
                        $("#loading_bar5").show();
                        uploader_avatar5.start();
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条

                        var percent = file.percent;
                        $("#percent5").css({"width": percent + "%"});
                        $("#percentnum5").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                        var data = eval("(" + info.response + ")");//解析返回的json数据
                        $("#avatar_pic5").html("<img  src='" + data.pic + "' width=100 height=100/>");
						$("#avatar_pic55").html("<input type='hidden'  name='goods_img2' value='" + data.pic + "'/>");
                        $("#loading_bar5").hide();
                        $("#avatar_pic5").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                        $("#loading_bar5").hide();
                    }
                }
            });
            uploader_avatar5.init();
		//	goods_img3
 		 var uploader_avatar6 = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'gears,html5,html4,silverlight,flash', //上传插件初始化选用那种方式的优先级顺序
                browse_button: ['avatar_uplpad_btn6'], // 上传按钮
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
                        $("#avatar_pic6").hide();
                        $("#loading_bar6").show();
                        uploader_avatar6.start();
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条

                        var percent = file.percent;
                        $("#percent6").css({"width": percent + "%"});
                        $("#percentnum6").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                        var data = eval("(" + info.response + ")");//解析返回的json数据
                        $("#avatar_pic6").html("<img  src='" + data.pic + "' width=100 height=100/>");
						$("#avatar_pic66").html("<input type='hidden'  name='goods_img3' value='" + data.pic + "'/>");
                        $("#loading_bar6").hide();
                        $("#avatar_pic6").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                        $("#loading_bar6").hide();
                    }
                }
            });
            uploader_avatar6.init();
		//	goods_img4
 		 var uploader_avatar7 = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'gears,html5,html4,silverlight,flash', //上传插件初始化选用那种方式的优先级顺序
                browse_button: ['avatar_uplpad_btn7'], // 上传按钮
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
                        $("#avatar_pic7").hide();
                        $("#loading_bar7").show();
                        uploader_avatar7.start();
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条

                        var percent = file.percent;
                        $("#percent7").css({"width": percent + "%"});
                        $("#percentnum7").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                        var data = eval("(" + info.response + ")");//解析返回的json数据
                        $("#avatar_pic7").html("<img  src='" + data.pic + "' width=100 height=100/>");
						$("#avatar_pic77").html("<input type='hidden'  name='goods_img4' value='" + data.pic + "'/>");
                        $("#loading_bar7").hide();
                        $("#avatar_pic7").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                        $("#loading_bar7").hide();
                    }
                }
            });
            uploader_avatar7.init();
		//	goods_img5
 		 var uploader_avatar8 = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'gears,html5,html4,silverlight,flash', //上传插件初始化选用那种方式的优先级顺序
                browse_button: ['avatar_uplpad_btn8'], // 上传按钮
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
                        $("#avatar_pic8").hide();
                        $("#loading_bar8").show();
                        uploader_avatar8.start();
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条

                        var percent = file.percent;
                        $("#percent8").css({"width": percent + "%"});
                        $("#percentnum8").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                        var data = eval("(" + info.response + ")");//解析返回的json数据
                        $("#avatar_pic8").html("<img  src='" + data.pic + "' width=100 height=100/>");
						$("#avatar_pic88").html("<input type='hidden'  name='goods_img5' value='" + data.pic + "'/>");
                        $("#loading_bar8").hide();
                        $("#avatar_pic8").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                        $("#loading_bar8").hide();
                    }
                }
            });
            uploader_avatar8.init();
        </script>
</body>
</html>