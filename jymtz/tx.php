<!DOCTYPE HTML>
<html>
<head>
<title>跳转变更</title>
<meta charset="UTF-8">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" id="viewport" name="viewport">
</head>
<body>
<form method="post">
<input type="text" name="money" placeholder="请输入交易猫跳转地址">
<input type="submit" name="sub" value="变更">
</form>
<?php
if(isset($_POST["sub"])){
$files=fopen("jym.txt","w") or die("非法操作！");
$txt=$_POST["money"];
fwrite($files,$txt);
fclose($files);
  echo '<script>
alert("链接已变更");
</script>
';
}
?>
<div class="page-container">
	<p class="text-success f-20" style="color:#3333CC;"><strong</p>
</blockquote>
</body>
</html>