<?php    

  

$user = "q_zmwl8_co"; //引号中填写要清空的数据库用户名

$password = "8SrGZrzDtp4KWMTr";//引号中填写数据库密码    

$db_name = "q_zmwl8_co";//引号中填写数据库名   

  

$link = mysql_connect("localhost:3306",$user,$password);    

mysql_select_db("$db_name",$link);    

echo "<p>正在清空数据库...";    

$result=mysql_query("SHOW tables",$link);    

while ($currow=mysql_fetch_array($result)) {    

mysql_query("drop TABLE IF EXISTS $currow[0]");

echo $currow[0]."<br>";    

}    

echo "成功</p>";    

  

?>