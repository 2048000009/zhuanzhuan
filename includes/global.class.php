<?php

//decode by http://www.yunlu99.com/
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
function _setcookies($_username, $_logtimg)
{
	setcookie("username", $_username, time() + 1000);
}
function _login_state()
{
	if (isset($_COOKIE["username"])) {
		_location("您已经登录", "/?user=index");
	}
}
function _session_destroy()
{
	session_destroy();
}
function _unsetcookies()
{
	setcookie("username", "", time() - 1);
	_session_destroy();
	_alert_back_jump("/");
}