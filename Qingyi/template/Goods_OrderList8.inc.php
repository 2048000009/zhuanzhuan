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
	
	//获取
	$maxRows_List = 30;
	$Page = 0;
	if (isset($_GET['Page'])) {
	  $Page = $_GET['Page'];
	}
	$startRow_List = $Page * $maxRows_List;
	$startRow_List = $Page * $maxRows_List;
	$query_List = "SELECT * FROM useraddress WHERE aid=$_AID ORDER BY uadd_id DESC";
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




    if($_GET['actiondel'] == 'Delete'&& isset($_GET['id'])){
			  //删除订单
              _query("DELETE FROM useraddress WHERE uadd_id='{$_GET['id']}' LIMIT 8");
              //关闭数据库
              _close();
              //跳转
              _location('删除成功','?Admin=Goods_OrderList8&action=del_ok');
     }
               
	if($_GET['actiondel'] == 'QBDelete'&& isset($_GET['id'])){
			  //删除订单
              _query("DELETE FROM useraddress WHERE aid='{$_AID}' ");
              //关闭数据库
              _close();
              //跳转
              _location('删除成功','?Admin=Goods_OrderList8&action=del_ok');
     }


	
}else{
   _location('你还未登录非法操作！','/admin.php');  	
}
?>
        	<?php
include 'head.php';
?>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta http-equiv="Refresh" content=15>
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->

<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<nav class="breadcrumb"><a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.reload();" title="刷新" ><i class="fa fa-rotate-left" aria-hidden="true"></i></a></nav>

	<main class="content_wrapper">
					<!--page title start-->
					<div class="page-heading">
						<div class="container-fluid">
							<div class="row d-flex align-items-center">
								<div class="col-md-6">
									<div class="page-breadcrumb">
										<h1>闲鱼商品记录</h1>
									</div>
								</div>
							</div>
						</div>
					</div>

<div class="container-fluid">     <div class="mail-box">
                    
   
                    <aside class="sm-side">
					<div class="inbox-body">

                           
                           <a class="btn btn-compose" href="?Admin=Goods_OrderList3&actiondel=QBDelete&id=<?php echo $_List['uadd_id']; ?>" onClick="return del();">全部清除</a>
                        </div> </div>
						<!-- state start-->
						  <!--mail inbox start-->
						     <?php if($_List) {?>
				                 <?php do { ?>		     
                <div class="mail-box">
                    
   
                    <aside class="sm-side">
					<div class="inbox-body">
                           
                           <a class="btn btn-compose" href="?Admin=Goods_OrderList3&actiondel=Delete&id=<?php echo $_List['uadd_id']; ?>" title="删除"  onClick="return del();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </div>
           
                        <ul class="nav nav-pills nav-stacked labels-info inbox-divider ">

                            <li> <a href="#"> <i class=" fa fa-circle text-success"></i>商品名称：
                    <font color="red"><?php echo $_List['biaoti']; ?></font> 编号：<?php echo $_List['gid']; ?><p>I do not think</p></a>  </li>
                            <li> <a href="#"> <i class=" fa fa-circle text-muted "></i> 设备型号：
                          <?php echo $_List['xinghao']; ?>
                            <p>I am not here</p></a>
                            </li><li> <a href="#"> <i class=" fa fa-circle text-muted "></i> 已浏览到： <?php if($_List['state']==1){?>
                    <span class="label label-success radius" style="background-color:#333;">商品页</span>
                    <?php }?>
                    <?php if($_List['state']==2){?>
                    <span class="label label-success radius" style="background-color:#06F;">订单页</span>
                    <?php }?>
                    <?php if($_List['state']==3){?>
                    <span class="label label-success radius" style="background-color:#939;">地址页</span>
                    <?php }?>
                    <?php if($_List['state']==4){?>
                    <span class="label label-success radius" style="background-color:#F30;">支付页</span>
                    <?php }?>
                    <?php if($_List['state']==11){?>
                    <span class="label label-success radius" style="background-color:#06F;">登录页</span>
                    <?php }?><p>I am not here</p></a>
                            </li>
                            <li> <a href="#"> <i class=" fa fa-circle text-muted "></i> 时间： <?php echo $_List['utime']; ?>   
                
                       <p>I am not here</p></a>
                            </li>
                            <li> <a href="#"> <i class=" fa fa-circle text-muted "></i> <?php if($_List['state']==1){?>
                    <span class="label label-success radius" style="background-color:	#AAAAAA;">未点击支付按钮</span>
                        <?php }?>
                        <?php if($_List['state']==2){?>
                    <span class="label label-success radius" style="background-color:	#AAAAAA;">未点击支付按钮</span>
                        <?php }?>
                        <?php if($_List['state']==3){?>
                    <span class="label label-success radius" style="background-color:	#AAAAAA;">未点击支付按钮</span>
                        <?php }?>
                        
                        <?php if($_List['state']== 4){?>
                    <span class="label label-success radius">已点击支付按钮</h5></span>
                
                        <?php }?> <p>I am not here</p></a>
                            </li>
                            
                        </ul>

                  
                    </aside>
                </div>
         	 <?php } while ($_List = mysql_fetch_assoc($List)); ?>
					</div>
				

					       <?php }else{ echo '没有任何数据，请自行添加'; }?> 
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
<script type="text/javascript" src="chajian/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="chajian/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="chajian/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="chajian/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="chajian/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="chajian/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="chajian/lib/laypage/1.2/laypage.js"></script>
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