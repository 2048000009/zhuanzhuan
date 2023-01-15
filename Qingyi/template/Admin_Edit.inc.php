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
//获取数据
include dirname(__FILE__).('/../../includes/getdata.php');
$_AUID = _fetch_array("SELECT * FROM admin_user WHERE au_id='{$_GET['id']}'") or die('SQL执行错误');

}else{
	 _location('非法操作！','/'.$_AR.'/?Admin=login&go=cao');	
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

<title>管理员修改</title>
</head>
<body>
     	<?php
include 'head.php';
?>
<article class="page-container">
	<form action="?Admin=AdminCommand&action=edit&id=<?php echo $_AUID['au_id']; ?>" method="post" class="form form-horizontal">
		<div class="row cl" style="display:none;">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>管理员名称：<div class="formControls col-xs-8 col-sm-4">
				<?php echo $_AUID['au_name']; ?>
			</div></label>
			
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">原始密码：</label>
			<div class="formControls col-xs-8 col-sm-4">
				<input type="text" class="input-text" value="" placeholder="请输入原始密码" name="RawPass">
			</div>
		</div>
        
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">新密码：</label>
			<div class="formControls col-xs-8 col-sm-4">
				<input type="text" class="input-text" value="" placeholder="请输入新密码" name="pass">
			</div>
		</div>
        
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">确认密码：</label>
			<div class="formControls col-xs-8 col-sm-4">
				<input type="text" class="input-text" value="" placeholder="再次输入新密码" name="pass1">
			</div>
		</div>
        <?php if($_AGRADE==1){?>
        <div class="row cl">
          <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>状态：</label>
          <div class="formControls col-xs-8 col-sm-9 skin-minimal">
            <div class="radio-box">
              <input name="gid" type="radio" id="sex-1" value="1" checked="checked" class="icheckbox-blue">
              <label for="sex-1">管理员</label>
            </div>
            <?php if($_AUID['au_id']<>1){?>
            <div class="radio-box">
              <input name="gid" type="radio" id="sex-1" value="2" checked="checked" class="icheckbox-blue">
              <label for="sex-1">子级账户</label>
            </div>
           	
            <div class="radio-box">
              <input name="gid" type="radio" id="sex-1" value="3" class="icheckbox-blue">
              <label for="sex-1">停用</label>
            </div>
			<?php }?>
          </div>
          <div class="col-4"> </div>
        </div>
		<?php }?>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp; 确认添加 &nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});
	
	$("#form-admin-role-add").validate({
		rules:{
			roleName:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.layer.close(index);
		}
	});
});


</script>

<?php if($_GET['action']=="rev_ok") {?>
<script type="text/javascript">
layer.msg('密码修改成功!', {icon: 6,time:1000});
</script>
<?php } ?>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>