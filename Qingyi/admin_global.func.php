<?php


header("Content-type: text/html; charset=utf-8");

function _alert_back($_info)
{
	echo "<script type='text/javascript'>alert('" . $_info . "');history.back();</script>";
	exit;
}
function _location($_info, $_url)
{
	echo "<script type='text/javascript'>alert('" . $_info . "');location.href='{$_url}';</script>";
	exit;
}
function _alert_back_jump($_url)
{
	echo "<script type='text/javascript'>location.href='{$_url}';</script >";
	exit;
}
function _Alogin_state()
{
	if (isset($_COOKIE["Aname"])) {
		_alert_back_jump("?Admin=index");
	}
}
function _Ansetcookies()
{
	setcookie("Aname", "", time() - 1);
	session_destroy();
	_location("提示：成功注销", "/admin.php");
}