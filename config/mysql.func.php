<?php
echo "\r\n";

error_reporting(0);
define("PM_CALL", true);
include dirname(__FILE__) . "/../includes/public.class.php";
session_start();
$_SESSION["LogIP"] = getIP();
function _connect()
{
	global $conn;
	if (!($conn = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_PORT))) {
		exit("数据库链接失败");
	}
}
function _select_db()
{
	if (!mysql_select_db(DB_NAME)) {
		exit("找不到指定数据库");
	}
}
function _set_names()
{
	if (!mysql_query("SET NAMES utf8")) {
		exit("字符集错误");
	}
}
function _query($_sql)
{
	if (!($_result = mysql_query($_sql))) {
		exit(mysql_error());
	}
	return $_result;
}
function _fetch_array($_sql)
{
	return mysql_fetch_array(_query($_sql), MYSQL_ASSOC);
}
function _is_repeat($_sql, $_info)
{
	if (_fetch_array($_sql)) {
		_alert_back($_info);
	}
}
function _if_repeat($_sql, $_info)
{
	if (!_fetch_array($_sql)) {
		_alert_back($_info);
	}
}
function _close()
{
	if (!mysql_close()) {
		exit("出现异常错误");
	}
}