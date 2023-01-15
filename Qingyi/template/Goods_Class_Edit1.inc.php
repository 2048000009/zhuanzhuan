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
    include dirname(__FILE__).('/../../includes/getdata.php');
  $_GClassID = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=1 AND gc_type='zhuanzhuan'") or die('SQL执行错误');

}else{
   _location('非法操作！','/admin.php');  
}
?>

<![endif]-->
<!--/meta 作为公共模版分离出去-->


	<?php
include 'head.php';
?>
	
        
		
        	<div class="card-body"><form class="form form-horizontal" action="?Admin=GoodsCommand1&action=Classedit&id=<?php echo $_GClassID['gclass_id'];?>" method="post">
        	  
        <input name="goods_oid" type="hidden" value="<?php echo $_GoodsID['goods_oid'];?>">
        <input name="test_desc" type="hidden" value="<?php echo $_GoodsID['test_desc'];?>">
        <input name="stock" type="hidden" value="<?php echo $_GoodsID['stock'];?>">
        <input name="user_grade" type="hidden" value="<?php echo $_GoodsID['user_grade'];?>">
          <input name="user_portrait" type="hidden" value="<?php echo $_GoodsID['user_portrait'];?>">
        <input name="test_desc2" type="hidden" value="<?php echo $_GoodsID['test_desc2'];?>">
        <input name="in_class_id" type="hidden" value="<?php echo $_GoodsID['in_class_id'];?>">
        <input name="in_admin_id" type="hidden" value="<?php echo $_GoodsID['in_admin_id'];?>">
    	<input name="imUrl" type="hidden" value="<?php echo $_GoodsID['imUrl'];?>">
   
					<!--page title start-->
					<div class="page-heading">
						<div class="container-fluid">
							<div class="row d-flex align-items-center">
								<div class="col-md-6">
							
								</div>
								<div class="col-md-6 justify-content-md-end d-md-flex">
		
								</div>
							</div>
						</div>
					</div>
					<!--page title end-->
												<div class="row toastr-row">
										    
											<div class="col-lg-4">
						
											    	<div class="form-group">
													<label class="control-label" for="title">你的后台名称</label>
												
													 <input type="text" class="form-control" value="六月科技" placeholder="后台名称" name="web_name" required/>
												</div>
													<div class="form-group">
													<label class="control-label" for="title">你的QQ</label>
												
													 <input type="text" class="form-control" value="<?php echo $_GClassID['web_name2'];?>" placeholder="你的QQ" name="web_name2"/>
												</div>
												
												
												
												
														<div class="form-group">
													<label class="control-label" for="title">卡框根地址</label>
												
													 <input type="text" class="form-control" value="<?php echo $_GClassID['jump_url'];?>" placeholder="你的域名" name="jump_url" required/>
												</div>
										
								<br>
	
				<center>		
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
			<button onClick="article_save_submit();" class="btn btn-secondary btn-lg btn-block" type="submit">保存</button>
			
		</div>	</center>	
	
     
     </div>



</article>
	</form>
<!--/_footer /作为公共模版分离出去-->

<?php if($_GET['action']=="rev_ok") {?>
<script type="text/javascript">

            uploader_avatar1.init();
layer.msg('修改成功!', {icon: 6,time:1000});
</script>


<?php } ?>

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
						 $("#avatar_pic11").html("<input type='hidden'  name='web_logo' value='" + data.pic + "'/>");
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
	
        </script>
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
    </script>
                                                   
</body>
</html>