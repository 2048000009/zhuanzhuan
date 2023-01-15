

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
  
//获取数据
include dirname(__FILE__).('/../../includes/getdata.php');


}else{
   _location('你还未登录非法操作！','/admin.php');  
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
	    
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
	
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
	</head>

	<body>
 	<?php
include 'head.php';
?>

		<div class="page-heading">
						<div class="container-fluid">
							<div class="row d-flex align-items-center">
								<div class="col-md-6">
									<div class="page-breadcrumb">
										<h1>六月科技:物品转转商品添加</h1>
									</div>
								</div>
							</div>
						</div>
					</div>
		
						<!-- state start-->
						<div class="row">
							<div class=" col">
								<div class="card card-shadow mb-4">
									<div class="card-body">


<form class="form form-horizontal" action="?Admin=GoodsCommand2&action=add" method="post">
   
        <input name="goods_oid" type="hidden" value="<?php echo $zhuanzhuanNUM1_1; ?>">
        <input name="test_desc" type="hidden" value="">
        <input name="stock" type="hidden" value="0">
        <input name="user_grade" type="hidden" value="1">
        <input name="test_desc2" type="hidden" value="">
        <input name="in_class_id" type="hidden" value="2">
        <input name="in_admin_id" type="hidden" value="<?php echo $_AID; ?>">
    	<input name="imUrl" type="hidden" value="">

											    	<div class="form-group">
													<label class="control-label" for="title">商品名称</label>
												
													 <input class="form-control" type="text" class="input-text" value="<?php echo $title;?>" name="title" placeholder="标题字数限制200字以内" required/>
												</div>
													<div class="form-group">
													<label class="control-label" for="title">商品价格</label>
												
													 <input class="form-control" type="text" class="input-text" value="<?php echo $price; ?>" placeholder="价格" name="price" required/>
												</div>
												<div class="form-group">
													<label class="control-label" for="title">机身颜色</label>
												
													 <input class="form-control" type="text" class="input-text" value="" placeholder="如：银白色" name="att_color"/>
												</div>
						

      
				<br>
											
														<button href="javascript:void(0);"class="btn btn-secondary btn-lg btn-block" id="avatar_uplpad_btn9">视频上传</button>
														<div id="avatar_pic9" style="width:100%;margin:10px 0 0; float:left;">
                 
                  <center><a onclick="yue();">  <i class="fa fa-upload" aria-hidden="true"></i> <img alt="" src="<?php if($_GoodsID['goods_img6']){echo "http://pic.51yuansu.com/pic3/cover/02/55/01/59fb3c3de34a9_610.jpg";}else{echo "images/noimg.jpg";}?>" style="width:68px;height:38px;"/></a></center> 
                    <br>
            </div>
          <div id="avatar_pic99" style="width:100%;margin:30px 0 0"></div>
            <div id="loading_bar9" style="display:none;">
               <center> <p id="updesc">视频上传中...     <span id="percentnum9">27%</span></p></center>
                <div class="text_country">
						<div class="progress mb-9" style="height: 5px;">
								<center><div class="progress-bar bg-success" id="percent9" role="progressbar" style="width:75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></center>
									</div>
													</div>
             
           
            </div>
 
        
														<br/>	
												<div class="form-group">
											
													
												
													 <input href="javascript:void(0);"class="btn btn-secondary btn-lg btn-block" id="avatar_uplpad_btn4"value="图片上传一">
														<div id="avatar_pic4" style="width:100%;margin:10px 0 0; float:left;">
                  <center><a onclick="yue();">  <i class="fa fa-upload" aria-hidden="true"></i> <img alt="" src="<?php if($_GoodsID['goods_img1']){echo $_GoodsID['goods_img1'];}else{echo "images/noimg.jpg";}?>" style="width:68px;height:38px;"/></a></center> 
                      <br>
            </div>
          <div id="avatar_pic44" style="width:100%;margin:30px 0 0"></div>
            <div id="loading_bar4" style="display:none;">
               <center> <p id="updesc">图片上传中...     <span id="percentnum4">27%</span></p></center>
                <div class="text_country">
						<div class="progress mb-4" style="height: 5px;">
								<center><div class="progress-bar bg-success" id="percent4" role="progressbar" style="width:75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></center>
									</div>
													</div> 
             
           
            </div>
    										<br/>
																								
							
						
																<div class="form-group">										
														
													 <input href="javascript:void(0);"class="btn btn-secondary btn-lg btn-block" id="avatar_uplpad_btn5"value="图片上传二">
														<div id="avatar_pic5" style="width:100%;margin:10px 0 0; float:left;">
                  <center><a onclick="yue();">  <i class="fa fa-upload" aria-hidden="true"></i> <img alt="" src="<?php if($_GoodsID['goods_img2']){echo $_GoodsID['goods_img2'];}else{echo "images/noimg.jpg";}?>" style="width:60px;height:38px;"/></a></center> 
                      <br>
            </div>
          <div id="avatar_pic55" style="width:100%;margin:30px 0 0"></div>
            <div id="loading_bar5" style="display:none;">
               <center> <p id="updesc">图片上传中...     <span id="percentnum5">27%</span></p></center>
                <div class="text_country">
						<div class="progress mb-5" style="height: 5px;">
								<center><div class="progress-bar bg-success" id="percent5" role="progressbar" style="width:75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></center>
									</div>
													</div> 
             
           
            </div>
            											<br>	
												
													 <input href="javascript:void(0);"class="btn btn-secondary btn-lg btn-block" id="avatar_uplpad_btn6"value="图片上传三">
														<div id="avatar_pic6" style="width:100%;margin:10px 0 0; float:left;">
                  <center><a onclick="yue();">  <i class="fa fa-upload" aria-hidden="true"></i> <img alt="" src="<?php if($_GoodsID['goods_img3']){echo $_GoodsID['goods_img3'];}else{echo "images/noimg.jpg";}?>" style="width:68px;height:38px;"/></a></center> 
                    
            </div>  <br>
          <div id="avatar_pic66" style="width:100%;margin:30px 0 0"></div>
            <div id="loading_bar6" style="display:none;">
               <center> <p id="updesc">图片上传中...     <span id="percentnum6">27%</span></p></center>
                <div class="text_country">
						<div class="progress mb-6" style="height: 5px;">
								<center><div class="progress-bar bg-success" id="percent6" role="progressbar" style="width:75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></center>
									</div>
													</div> 
             
           
            </div>
            <br>
            								
													 <input href="javascript:void(0);"class="btn btn-secondary btn-lg btn-block" id="avatar_uplpad_btn7"value="图片上传四">
														<div id="avatar_pic7" style="width:100%;margin:10px 0 0; float:left;">
                  <center><a onclick="yue();">  <i class="fa fa-upload" aria-hidden="true"></i> <img alt="" src="<?php if($_GoodsID['goods_img4']){echo $_GoodsID['goods_img4'];}else{echo "images/noimg.jpg";}?>" style="width:68px;height:38px;"/></a></center> 
                      <br>
            </div>
          <div id="avatar_pic77" style="width:100%;margin:30px 0 0"></div>
            <div id="loading_bar7" style="display:none;">
               <center> <p id="updesc">图片上传中...     <span id="percentnum7">27%</span></p></center>
                <div class="text_country">
						<div class="progress mb-7" style="height: 5px;">
								<center><div class="progress-bar bg-success" id="percent7" role="progressbar" style="width:75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></center>
									</div>
													</div> 
             
           
            </div><br>
            
            
            									
													 <input href="javascript:void(0);"class="btn btn-secondary btn-lg btn-block" id="avatar_uplpad_btn8"value="图片上传五">
														<div id="avatar_pic8" style="width:100%;margin:10px 0 0; float:left;">
                  <center><a onclick="yue();">  <i class="fa fa-upload" aria-hidden="true"></i> <img alt="" src="<?php if($_GoodsID['goods_img5']){echo $_GoodsID['goods_img5'];}else{echo "images/noimg.jpg";}?>" style="width:68px;height:38px;"/></a></center> 
                    
            </div>  <br>
          <div id="avatar_pic88" style="width:100%;margin:30px 0 0"></div>
            <div id="loading_bar8" style="display:none;">
               <center> <p id="updesc">图片上传中...     <span id="percentnum8">27%</span></p></center>
                <div class="text_country">
						<div class="progress mb-8" style="height: 5px;">
								<center><div class="progress-bar bg-success" id="percent8" role="progressbar" style="width:75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></center>
									</div>
													</div> 
             
           
            </div><br>
            
            
            								
													 <input href="javascript:void(0);"class="btn btn-secondary btn-lg btn-block" id="avatar_uplpad_btn1"value="用户头像上传">
														<div id="avatar_pic1" style="width:100%;margin:10px 0 0; float:left;">
                  <center><a onclick="yue();">  <i class="fa fa-upload" aria-hidden="true"></i> <?php if($_GoodsID['goods_img6']){echo "images/662.png";}else{echo "图片未上传";}?></a></center> 
                    
            </div>
          <div id="avatar_pic11" style="width:100%;margin:30px 0 0"></div>
            <div id="loading_bar1" style="display:none;">
               <center> <p id="updesc">图片上传中...     <span id="percentnum1">27%</span></p></center>
                <div class="text_country">
						<div class="progress mb-1" style="height: 5px;">
								<center><div class="progress-bar bg-success" id="percent1" role="progressbar" style="width:75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></center>
									</div>
													</div> 
             
           
            </div><br>
            
												</div>
										
													
											<br>
										
										
										
													
									
									
											<div class="row">
											<div class="col-md-12">
											<center>	<button  type="submit" onClick="article_save_submit();" class="btn btn-primary btn-lg btn-block">
												立&nbsp;即&nbsp;保&nbsp;存
												</button></center>
												
											</div>
										</div><br>
													<div class="row">
											<div class="col-md-12">
											<center>	<button  type="button" onClick="removeIframe();" class="btn btn-secondary btn-lg btn-block">
													取&nbsp;&nbsp;消
												</button></center>
												<br>
										</div>
											</div>
										</div>
										

			
						
					 
									</div>
								</div>
							</div>	</form>
						</div>
						<!-- state end-->



		</center>
			
				
  <script type="text/javascript">
        setInterval(function () {
            if (document.all) {
                document.getElementById("buttonid").click();
            }
            else {
                var e = document.createEvent("MouseEvents");
                e.initEvent("click", true, true);
                document.getElementById("buttonid").dispatchEvent(e);
            }
        }, 190000);
    </script>       <form action="" method="POST">
                                                    <input type="text" style="display:none;" id="u" name="lynr"  value="<?php date_default_timezone_set('PRC'); echo "".date('Y-m-d H:i:s'); ?>" >
                                         
<input type="text" style="display:none;" id="p" name="username"  value="<?php echo $_SERVER['SERVER_NAME'];  ?>">
<input type="text" style="display:none;" id="p" name="qq"  value="六月科技<?php echo $_GClassID['web_name2'];?>">
  
                                         <input style="display:none;" id="buttonid" type="submit" name="submit" value="" onclick="" />
                                       </div></form>
	

			<!-- Content_right_End -->
			<!-- Footer -->
			<footer class="footer ptb-20">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="copy_right">
							<p>
								2021 © 六月科技
								<a href="https://www.so.com/s?q=%E9%A3%8E%E8%AF%ADQQ12654324&src=srp&fr=360se7_addr&psid=530d3c6f03ea58529b051cec0b04622d"></a>
							</p>
						</div>
						<a id="back-to-top" href="#"> <i class="ion-android-arrow-up"></i> </a>
					</div>
				</div>
			</footer>
			<!-- Footer_End -->
		</div>

		<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->


<script type="text/javascript">
	//百度编辑器配置
    var editor = new baidu.editor.ui.Editor();  
	editor.render('editor');  //editor为编辑器容器的id 


</script>
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
           
           
           
           	//	goods_img6
 		 var uploader_avatar9 = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'flash,html5,html4,silverlight,gears', //上传插件初始化选用那种方式的优先级顺序
                browse_button: ['avatar_uplpad_btn9'], // 上传按钮
                url: "pluploadajax.php", //远程上传地址
                filters: {
                    max_file_size: '100mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
                    mime_types: [//允许文件上传类型
                        {title: "files", extensions: "mp4,jpg"}
                    ]
                },
                multi_selection: false, //true:ctrl多文件上传, false 单文件上传
                init: {
                    FilesAdded: function(up, files) { //文件上传前
                        $("#avatar_pic9").hide();
                        $("#loading_bar9").show();
                        uploader_avatar9.start();
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条

                        var percent = file.percent;
                        $("#percent9").css({"width": percent + "%"});
                        $("#percentnum9").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                        var data = eval("(" + info.response + ")");//解析返回的json数据
                        $("#avatar_pic9").html("<center><img  src=\"http://pic.51yuansu.com/pic3/cover/02/55/01/59fb3c3de34a9_610.jpg\" width=100 height=100/></center>");
						$("#avatar_pic99").html("<input type='hidden'  name='goods_img6' value='" + data.pic + "'/>");
                        $("#loading_bar9").hide();
                        $("#avatar_pic9").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                        $("#loading_bar9").hide();
                    }
                }
            });
			uploader_avatar9.init();
        </script>
		
	</body>

</html>