<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<title>鲨鱼系统-安装向导</title>
<link href="https://bootswatch.com/3/paper/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
error_reporting(0);
@header('Content-Type: text/html; charset=UTF-8');
if(file_exists('install/install.lock')){
$installed=true;}
?>
<?php if($installed){ ?>
<script language="javascript">
  document.location.href="jiusni.cn/detail1/index.php";
</script>
<?php }else{?>

<div class="container"><br>
<div class="row">
<div class="col-xs-12">
<div class="alert alert-success" role="alert"><center><h4><font color="#fff">安装向导</font></h4></center></div>
</div>
<div class="col-xs-12">
<div class="panel panel-primary">
<div class="panel-heading text-center">该页面安装完成后再打开会跳转百度</div>
<div class="panel-body">
<p><iframe src="1A安装教程必看.txt" style="width:100%;height:300px;"></iframe></p>
<a href="/install" class="btn list-group-item"> <font color="#2196f3"><span id="time"30">60</span>秒后进入安装页面</font> </a>
<?php }?>
</div>
</div>
</div></div>
</div>
<script type="text/javascript">  
    delayURL();    
    function delayURL() { 
        var delay = document.getElementById("time").innerHTML;
 var t = setTimeout("delayURL()", 1000);
        if (delay > 0) {
            delay--;
            document.getElementById("time").innerHTML = delay;
        } else {
     clearTimeout(t); 
            window.location.href = "/install";
        }        
    } 
</script>
