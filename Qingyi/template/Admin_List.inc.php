<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<?php 
define("PM_CALL", true);
include dirname(__FILE__) . "/../admin_global.func.php";
include dirname(__FILE__) . "/../../config/mysql.func.php";
include dirname(__FILE__) . "/../../config/Conn.php";

$maxRows_List = 20;
$Page = 0;
if (isset($_GET["Page"])) {
	$Page = $_GET["Page"];
}
$startRow_List = $Page * $maxRows_List;
$startRow_List = $Page * $maxRows_List;
$query_List = "SELECT * FROM admin_user ORDER BY au_id ASC";
$query_limit_List = sprintf("%s LIMIT %d, %d", $query_List, $startRow_List, $maxRows_List);
($List = mysql_query($query_limit_List, $conn)) || exit(mysql_error());
$_List = mysql_fetch_assoc($List);
if (isset($_GET["totalRows_List"])) {
	$totalRows_List = $_GET["totalRows_List"];
} else {
	$all_List = mysql_query($query_List);
	$totalRows_List = mysql_num_rows($all_List);
}
$totalPages_List = ceil($totalRows_List / $maxRows_List) - 1;
$queryString_List = "";
if (!empty($_SERVER["QUERY_STRING"])) {
	$params = explode("&", $_SERVER["QUERY_STRING"]);
	$newParams = [];
	foreach ($params as $param) {
		if (!stristr($param, "Page")) {
			array_push($newParams, $param);
		}
	}
	if (count($newParams) != 0) {
		$queryString_List = "&" . htmlentities(implode("&", $newParams));
	}
}
if ($_GET["actiondel"] == "AdminDelete" && isset($_GET["id"])) {
	_query("DELETE FROM admin_user WHERE au_id='{$_GET["id"]}' LIMIT 1");
	_close();
	_location("删除成功", "?Admin=Admin_List&action=del_ok");
}
echo " \t";
include "head.php";
?>  <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css">
       <link rel="stylesheet" href="assets/layui/admin/pro/dist/layuiadmin/style/admin.css" media="all">
	<div class="page-heading">
						<div class="container-fluid">
							<div class="row d-flex align-items-center">
								<div class="col-md-6">
									<div class="page-breadcrumb">
										<h1>用户管理</h1>
									</div>
								</div>
							</div>
						</div>
			
	<div class="mt-20">  
 

  <div class="layui-row layui-col-space15">
    <div class="layui-col-md8">
	<div class="layui-card">
        <div class="layui-card-header">
        <i class="layui-icon layui-icon-survey"></i>
        </div>
        <div class="layui-card-body layui-text">
               <?php 
if ($_List) {
	echo "\r\n            \t";
	do {
		?>          	
          <table class="layui-table">
            <colgroup>
              <col width="100">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <td>时间</td>
                <td>
               <?php 
		if ($_List["add_time"] == "") {
			?>鲨鱼系统<?php 
		} else {
			?><?php echo strval($_List["add_time"]);?><?php 
		}
		?> 
                   </td>
              </tr>
              <tr>
                <td>账号信息</td>
                <td>
                 <?php echo $_List["au_name"];?></td>
              </tr>
              <tr>
                <td>用户状态</td>
                <td><?php 
		if ($_List["in_ar_id"] != 3) {
			?><span class="label label-success radius">正常</span><?php 
		}
		?>                        <?php 
		if ($_List["in_ar_id"] == 3) {
			?><span class="label label-danger radius">通用</span><?php 
		}
		?></td>
              </tr>
              <tr>
                <td>操作</td>
                <td style="padding-bottom: 0;">
                  <div class="layui-btn-container">
                                             	<?php 
		if ($_List["au_id"] != 1) {
			?>                       <a href="?Admin=Admin_List&actiondel=AdminDelete&id=<?php echo $_List['au_id']; ?>" title="删除"  onClick="return del();" target="_blank" class="layui-btn layui-btn-danger">删除用户</a>
                            <?php 
		}
		?>  

                  </div>
                </td>
              </tr>
              	<br>
            <?php 
	} while ($_List = mysql_fetch_assoc($List));
	?>			</tbody>
		</table>
	
       <?php 
} else {
	echo "没有任何数据，请自行添加";
}
?> 
        </div>
      </div>  </div>
     
			
    
        <!--分页-->
<div class="paging">
        <!--首页-->
		<?php 
if ($Page > 0) {
	?>        <a href="<?php 
	printf("%s?Page=%d%s", $currentPage, 0, $queryString_List);
	?>" class="btn btn-primary radius" style="margin-bottom:8px;">首</a>
        <?php 
}
echo "        <!--首页--> \r\n        \r\n        <!--上页-->\r\n        ";
if ($Page > 0) {
	?>        <a href="<?php 
	printf("%s?Page=%d%s", $currentPage, max(0, $Page - 1), $queryString_List);
	?>" class="btn btn-primary radius" style="margin-bottom:8px;"><i class="icon-chevron-left"></i>上一页</a>
        <?php 
}
echo "        <!--上页-->\r\n        \r\n        <!--数字分页-->  \r\n        ";
for ($i = 1; $i <= $totalPages_List + 1; $i++) {
	echo " \r\n        ";
	if ($_GET[Page] + 1 == $i) {
		?>        <a class="btn btn-success radius" style="margin-bottom:8px;"><?php echo $i;?></a>
        <?php 
	} else {
		?>        <a href="<?php 
		printf("%s?Page=%d%s", $currentPage, $i - 1, $queryString_List);
		?>" class="btn btn-primary radius" style="margin-bottom:8px;"><?php echo $i;?></a>
        <?php 
	}
	echo "        ";
}
echo "        <!--数字分页--> \r\n        \r\n        \r\n        <!--下页-->\r\n        ";
if ($Page < $totalPages_List) {
	?> 
        <a href="<?php 
	printf("%s?Page=%d%s", $currentPage, min($totalPages_List, $Page + 1), $queryString_List);
	?>" class="btn btn-primary radius" style="margin-bottom:8px;">下一页<i class="icon-chevron-right"></i></a>	
        <?php 
}
echo "        <!--下页-->\r\n        <!--尾页-->\r\n        ";
if ($Page < $totalPages_List) {
	?>    
        <a href="<?php 
	printf("%s?Page=%d%s", $currentPage, $totalPages_List, $queryString_List);
	?>" class="btn btn-primary radius" style="margin-bottom:8px;">尾</a>	
        <?php 
}
?>        <!--尾页-->
        </div>
        <!--分页-->  
    
    
</div>
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
<?php 
if ($_GET["action"] == "del_ok") {
	?><script type="text/javascript">
layer.msg('删除成功!', {icon: 6,time:1000});
</script>
<?php 
}
if ($_GET["action"] == "add_ok") {
	?><script type="text/javascript">
layer.msg('添加成功!', {icon: 6,time:1000});
</script>
<?php 
}
if ($_GET["action"] == "rev_ok") {
	?><script type="text/javascript">
layer.msg('修改成功!', {icon: 6,time:1000});
</script>
<?php 
}
?>

</body>
</html>