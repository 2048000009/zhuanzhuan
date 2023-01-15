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

	
	//获取
	$maxRows_List = 20;
	$Page = 0;
	if (isset($_GET['Page'])) {
	  $Page = $_GET['Page'];
	}
	$startRow_List = $Page * $maxRows_List;
	$startRow_List = $Page * $maxRows_List;
	$query_List = "SELECT * FROM goods WHERE in_admin_id = $_AID AND in_class_id=1 ORDER BY goods_id DESC";
	$query_limit_List = sprintf("%s LIMIT %d, %d", $query_List, $startRow_List, $maxRows_List);
	$List = mysql_query($query_limit_List, $conn) or die(mysql_error());
	$_List = mysql_fetch_assoc($List);
	
	if (isset($_GET['totalRows_List'])) {
	  $totalRows_List = $_GET['totalRows_List'];
	} else {
	  $all_List = mysql_query($query_List);
	  $totalRows_List = mysql_num_rows($all_List);
	}
	$totalPages_List = ceil($totalRows_List/$maxRows_List)-1;
	
	$queryString_List = "";
	if (!empty($_SERVER['QUERY_STRING'])) {
	  $params = explode("&", $_SERVER['QUERY_STRING']);
	  $newParams = array();
	  foreach ($params as $param) {
		if (stristr($param, "Page") == false) {
		  array_push($newParams, $param);
		}
	  }
	  if (count($newParams) != 0) {
		$queryString_List = "&" . htmlentities(implode("&", $newParams));
	  }
	}




    if($_GET['actiondel'] == 'GoodsDelete'&& isset($_GET['id'])){
              $_GoodsID = _fetch_array("SELECT * FROM goods WHERE goods_id='{$_GET['id']}'") or die('SQL执行错误');
              if(file_exists($_GoodsID['user_portrait'])){
				  unlink($_GoodsID['user_portrait']);
			  }
			  if(file_exists($_GoodsID['weixin_img'])){
				  unlink($_GoodsID['weixin_img']);
			  }
			  if(file_exists($_GoodsID['zhifubao_img'])){
				  unlink($_GoodsID['zhifubao_img']);
			  }
			  if(file_exists($_GoodsID['goods_img1'])){
				  unlink($_GoodsID['goods_img1']);
			  }
			  if(file_exists($_GoodsID['goods_img2'])){
				  unlink($_GoodsID['goods_img2']);
			  }
			  if(file_exists($_GoodsID['goods_img3'])){
				  unlink($_GoodsID['goods_img3']);
			  }
			  if(file_exists($_GoodsID['goods_img4'])){
				  unlink($_GoodsID['goods_img4']);
			  }
			  if(file_exists($_GoodsID['goods_img5'])){
				  unlink($_GoodsID['goods_img5']);
			  }
			  //删除订单
              _query("DELETE FROM goods WHERE goods_id='{$_GET['id']}' LIMIT 1");
              //关闭数据库
              _close();
              //跳转
              _location('删除成功','?Admin=Goods_List1&action=del_ok');
     }
               



	
}else{
	 _location('非法操作！','/admin.php');	
}
?>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
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
<title>商品列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品管理 <span class="c-gray en">&gt;</span> 商品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<div class="mt-20">
    <?php if($_List) {?>
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="15">商品序号：<?php if($_COOKIE['se_tel']){?><?php echo $_COOKIE['se_tel']; ?><?php }?></th>
				
			
				</tr>
			</thead>
			<tbody>
            	<?php do { ?>

				<tr class="text-c">
					<td><img src="
					<?php 
					if($_List['goods_img1']){
						echo $_List['goods_img1'];
					}else{
						if($_List['goods_img2']){
							echo $_List['goods_img2'];
						}else{
							if($_List['goods_img3']){
								echo $_List['goods_img3'];
							}else{
								if($_List['goods_img4']){
									echo $_List['goods_img4'];
								}else{
									if($_List['goods_img1']){
										echo $_List['goods_img1'];
									}else{
										echo "images/noimg.jpg";
									}
								}
							}
						}
					}
					?>
					" width="80" height="80"></td>
					<td>商品名称：<font color="red"><?php echo $_List['title']; ?></font></td>
					<td class="text-l"><center>发布时间：<?php echo $mag['id']; ?></center></td>
					<td>上架状态：
						<?php if($_List['is_shelves']==1) {?><span class="label label-success radius">已上架</span><?php }?>
                        <?php if($_List['is_shelves']==0) {?><span class="label label-danger radius">未上架</span><?php }?>
					</td>
					<td style="display:none;"></td>
					<td style="display:none;"></td>
					<td style="display:none;"></td>
					<td class="td-status" style="display:none;"></td>
					<td class="f-14 td-manage">
						<a style="text-decoration:none;font-size:22px;color:#06C" class="ml-5" href="?Admin=Goods_Edit1&id=<?php echo $_List['goods_id']; ?>" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
							
						<a  style="text-decoration:none;font-size:22px;color:#F30;" class="ml-5" href="?Admin=Goods_List1&actiondel=GoodsDelete&id=<?php echo $_List['goods_id']; ?>" title="删除"  onClick="return del();"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        
                        <a style="text-decoration:none;font-size:22px;color:#06F;" class="ml-5" href="/zz/?i=<?php echo $_List['goods_oid']; ?>.shtml&fullCate=<?php echo $_List['in_admin_id']; ?>&zhuanzhuanSourceFrom=<?php echo $zhuanzhuanNUM1_1; ?>&PGTID=0d400005-0278-44ac-f681-fdcb1dfcf2fe&ClickID=<?php echo $_List['goods_id']; ?>" title="手机" target="_blank"><i class="Hui-iconfont">&#xe666;</i></a>
						
						<a style="text-decoration:none;font-size:22px;color:#06F;" class="ml-5" href="/zz2/?i=<?php echo $_List['goods_oid']; ?>.shtml&fullCate=<?php echo $_List['in_admin_id']; ?>&zhuanzhuanSourceFrom=<?php echo $zhuanzhuanNUM1_1; ?>&PGTID=0d400005-0278-44ac-f681-fdcb1dfcf2fe&ClickID=<?php echo $_List['goods_id']; ?>" title="物品" target="_blank"><i class="Hui-iconfont">&#9889;</i></a>
					</td>
				</tr>
                <?php } while ($_List = mysql_fetch_assoc($List)); ?>
			</tbody>
		</table>
       <?php }else{ echo '没有任何数据，请自行添加'; }?> 
	</div>
    
    
        <!--分页-->
<div class="paging">
        <!--首页-->
		<?php if ($Page > 0) { ?>
        <a href="<?php printf("%s?Page=%d%s", $currentPage, 0, $queryString_List); ?>" class="btn btn-primary radius" style="margin-bottom:8px;">首</a>
        <?php } ?>
        <!--首页--> 
        
        <!--上页-->
        <?php if ($Page > 0) { ?>
        <a href="<?php printf("%s?Page=%d%s", $currentPage, max(0, $Page - 1), $queryString_List); ?>" class="btn btn-primary radius" style="margin-bottom:8px;"><i class="icon-chevron-left"></i>上一页</a>
        <?php } ?>
        <!--上页-->
        
        <!--数字分页-->  
        <?php 
        $i=1;
        while($i<=$totalPages_List+1)
        {
        ?> 
        <?php if ($_GET[Page]+1==$i){ ?>
        <a class="btn btn-success radius" style="margin-bottom:8px;"><?php echo $i ?></a>
        <?php } else { ?>
        <a href="<?php printf("%s?Page=%d%s", $currentPage, $i-1, $queryString_List); ?>" class="btn btn-primary radius" style="margin-bottom:8px;"><?php echo $i ?></a>
        <?php } ?>
        <?php   
        $i++;
        }
        ?>
        <!--数字分页--> 
        
        
        <!--下页-->
        <?php if ($Page < $totalPages_List) { ?> 
        <a href="<?php printf("%s?Page=%d%s", $currentPage, min($totalPages_List, $Page + 1), $queryString_List); ?>" class="btn btn-primary radius" style="margin-bottom:8px;">下一页<i class="icon-chevron-right"></i></a>	
        <?php } ?>
        <!--下页-->
        <!--尾页-->
        <?php if ($Page < $totalPages_List) { ?>    
        <a href="<?php printf("%s?Page=%d%s", $currentPage, $totalPages_List, $queryString_List); ?>" class="btn btn-primary radius" style="margin-bottom:8px;">尾</a>	
        <?php } ?>
        <!--尾页-->
        </div>
        <!--分页-->  
    
    
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">


/*资讯-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-删除*/
function article_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*资讯-审核*/
function article_shenhe(obj,id){
	layer.confirm('审核文章？', {
		btn: ['通过','不通过','取消'], 
		shade: false,
		closeBtn: 0
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布', {icon:6,time:1000});
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
		$(obj).remove();
    	layer.msg('未通过', {icon:5,time:1000});
	});	
}
/*资讯-下架*/
function article_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*资讯-发布*/
function article_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}
/*资讯-申请上线*/
function article_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

function del(){
  return window.confirm('您确定删除吗？一旦删除数据无法恢复！');
}
</script> 
<?php if($_GET['action']=="del_ok") {?>
<script type="text/javascript">
layer.msg('删除成功!', {icon: 6,time:1000});
</script>
<?php } ?>
<?php if($_GET['action']=="add_ok") {?>
<script type="text/javascript">
layer.msg('添加成功!', {icon: 6,time:1000});
</script>
<?php } ?>
<?php if($_GET['action']=="rev_ok") {?>
<script type="text/javascript">
layer.msg('修改成功!', {icon: 6,time:1000});
</script>
<?php } ?>

</body>
</html>