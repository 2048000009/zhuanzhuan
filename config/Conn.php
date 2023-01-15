<?php


//拒绝PHP低版本，版本不能小于4.1.0
if (PHP_VERSION < '4.1.0'){
	exit ('PHP version is to low,Your current PHP version is less than 4.1.0');
}
	define('DB_USER','cs');
	define('DB_PASSWORD','cs');
	define('DB_HOST','localhost');
	define('DB_NAME','cs');
	
_connect();
_select_db();
_set_names();
	
                        //靓仔，look me
//^_^这里是代码放置处，请将此段文字删除然后粘贴复制的代码，即可完成安装！





/*数据库配置*/
$oreoconfi=array(
	'host' => 'localhost', //数据库服务器
	'port' => 3306, //数据库端口
	'user' => 'www_dkewl_com', //数据库用户名
	'pwd' => 'www_dkewl_com', //数据库密码
	'dbname' => 'www_dkewl_com', //数据库名
);






//

$_CMSNAME = '后台管理';
$_aaa = '';//这里是防贼码修改


$_CNNAME = '';

$_GZWANG = '';

$_CMSV = ' v1'; 

$_SUFFIX = 20160516; 

$_AR = 'Qingyi'; 

$_SHOUQUANW = 'http://127.0.0.1'; 

$_CURRENT_TIME = date('Y-m-d H:i:1',time());
//解决获取当前时间相差8小时
$_CURRENT_TIME2 = date('Y-m-d H:i:s', time()+8*60*60);
//空的时间值
$_NOTIME = '0000-00-00 00:00:00';

$_HTMLTIMEID = date('YmdHi',time());


$REFERER = Array('HTTP_REFERER');

?>