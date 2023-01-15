<?php 


function GetIp(){  
    $realip = '';  
    $unknown = 'unknown';  
    if (isset($_SERVER)){  
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){  
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);  
            foreach($arr as $ip){  
                $ip = trim($ip);  
                if ($ip != 'unknown'){  
                    $realip = $ip;  
                    break;  
                }  
            }  
        }else if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)){  
            $realip = $_SERVER['HTTP_CLIENT_IP'];  
        }else if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){  
            $realip = $_SERVER['REMOTE_ADDR'];  
        }else{  
            $realip = $unknown;  
        }  
    }else{  
        if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)){  
            $realip = getenv("HTTP_X_FORWARDED_FOR");  
        }else if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)){  
            $realip = getenv("HTTP_CLIENT_IP");  
        }else if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $unknown)){  
            $realip = getenv("REMOTE_ADDR");  
        }else{  
            $realip = $unknown;  
        }  
    }  
    $realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;  
    return $realip;  
}  
  
function GetIpLookup($ip = ''){  
    if(empty($ip)){  
        $ip = GetIp();  
    }  
   	//$res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip); 
	$res = $ip; 
    if(empty($res)){ return false; }  
    $jsonMatches = array();  
    preg_match('#\{.+?\}#', $res, $jsonMatches);  
    if(!isset($jsonMatches[0])){ return false; }  
    $json = json_decode($jsonMatches[0], true);  
    if(isset($json['ret']) && $json['ret'] == 1){  
        $json['ip'] = $ip;  
        unset($json['ret']);  
    }else{  
        return false;  
    }  
    return $json;  
}  
  
 
$ipInfos = GetIpLookup($ip); //baidu.com IP地址  
//var_dump($ipInfos); 显示

/*
echo $ipInfos["province"];
echo $ipInfos["city"];
*/

  
/*
使用方法：
echo getIP(); 
*/

//隐藏IP后几位==========
/*
$ip='127.0.0.1';
*/
$HideIp1='/((?:\d+\.){3})\d+/';
$HideIp2='~(\d+)\.(\d+)\.(\d+)\.(\d+)~';
/*
echo preg_replace($HideIp1,"\\1*",$ip);//以上输出结果为：127.0.0.*
echo preg_replace($HideIp2,"$1.$2.*.*",$ip);//以上输出结果为：127.0.*.*
*/


/*
========随机头像===================
*/
function RandomPortrait($Random_len) 
{ 
    $chars = array( 
        "../images/portrait/niming-tx1.jpg",
		"../images/portrait/niming-tx2.jpg",
		"../images/portrait/niming-tx3.jpg",
		"../images/portrait/niming-tx4.jpg",
		"../images/portrait/niming-tx5.jpg",
		"../images/portrait/niming-tx6.jpg",
		"../images/portrait/niming-tx7.jpg",
		"../images/portrait/niming-tx8.jpg",
		"../images/portrait/niming-tx9.jpg",
		"../images/portrait/niming-tx10.jpg",
		"../images/portrait/niming-tx11.jpg",
		"../images/portrait/niming-tx12.jpg",
		"../images/portrait/niming-tx13.jpg",
		"../images/portrait/niming-tx14.jpg",
		"../images/portrait/niming-tx15.jpg",
		"../images/portrait/niming-tx16.jpg",
		"../images/portrait/niming-tx17.jpg",
		"../images/portrait/niming-tx18.jpg",
		"../images/portrait/niming-tx19.jpg",
		"../images/portrait/niming-tx20.jpg",
		"../images/portrait/niming-tx21.jpg",
		"../images/portrait/niming-tx22.jpg",
		"../images/portrait/niming-tx23.jpg",
		"../images/portrait/niming-tx24.jpg",
		"../images/portrait/niming-tx25.jpg",
		"../images/portrait/niming-tx26.jpg",
		"../images/portrait/niming-tx27.jpg",
		"../images/portrait/niming-tx28.jpg",
		"../images/portrait/niming-tx29.jpg",
		"../images/portrait/niming-tx30.jpg",
		"../images/portrait/niming-tx31.jpg",
		"../images/portrait/niming-tx32.jpg",
		"../images/portrait/niming-tx33.jpg",
		"../images/portrait/niming-tx34.jpg",
		"../images/portrait/niming-tx35.jpg",
		"../images/portrait/niming-tx36.jpg",
		"../images/portrait/niming-tx37.jpg",
		"../images/portrait/niming-tx38.jpg",
		"../images/portrait/niming-tx39.jpg",
		"../images/portrait/niming-tx40.jpg",
		"../images/portrait/niming-tx41.jpg",
		"../images/portrait/niming-tx42.jpg",
		"../images/portrait/niming-tx43.jpg",
		"../images/portrait/niming-tx44.jpg",
		"../images/portrait/niming-tx45.jpg",
		"../images/portrait/niming-tx46.jpg",
		"../images/portrait/niming-tx47.jpg",
		"../images/portrait/niming-tx48.jpg",
		"../images/portrait/niming-tx49.jpg",
		"../images/portrait/niming-tx50.jpg"
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$Random_len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
} 
$PORTRAIT = RandomPortrait(1);


/*
========判断是否微信内核===================
*/
//if(is_weixin()){
//echo "这是微信内部浏览器";
//}else{
//echo "这是微信外部浏览器";
//}


function is_weixin(){ 
if ( strpos($_SERVER['HTTP_USER_AGENT'], 
'MicroMessenger') !== false ) {
        return true;

    }  
        return false;
}


//隐藏IP后几位==========
/*
$ip='127.0.0.1';
*/
$HideIp1 = '/((?:\d+\.){3})\d+/';
$HideIp2 = '~(\d+)\.(\d+)\.(\d+)\.(\d+)~';
/*
echo preg_replace($HideIp1,"\\1*",$ip);//以上输出结果为：127.0.0.*
echo preg_replace($HideIp2,"$1.$2.*.*",$ip);//以上输出结果为：127.0.*.*
*/
function HidTel($phone) {
    $IsWhat = preg_match('/(0[0-9]{2,3}[\-]?[2-9][0-9]{6,7}[\-]?[0-9]?)/i', $phone); //固定电话
    if ($IsWhat == 1) {
        return preg_replace('/(0[0-9]{2,3}[\-]?[2-9])[0-9]{3,4}([0-9]{3}[\-]?[0-9]?)/i', '$1****$2', $phone);
    } else {
        return preg_replace('/(1[358]{1}[0-9])[0-9]{4}([0-9]{4})/i', '$1****$2', $phone);
    }
}
/*
用法
echo HidTel('18758036615');
*/
//截取字符串
function jiequ($string, $_min_num, $_max_num) {
    echo mb_substr($string, $_min_num, $_max_num, 'utf-8');
}
/*
用法
$_title = "123456789";
echo jiequ($_title,0,8);
*/

/*
========随机编号===================
*/
//随机生成数字
function GetOrderNumberA($len) 
{ 
    $chars = array( 
        "0", "1", "2","3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
}
//随机生成大写字母
function GetRandStrB($len) 
{ 
    $chars = array( 
        "A", "B", "C", "D", "E", "F", "G",  
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
        "S", "T", "U", "V", "W", "X", "Y", "Z"
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
}
//随机小写字母
function GetRandStrC($len) 
{ 
    $chars = array( 
        "a", "b", "c", "d", "e", "f", "g",  
        "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r",  
        "s", "t", "u", "v", "w", "x", "y", "z"
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
}
//随机生成字大写母+数字
function GetRandStrD($len) 
{ 
    $chars = array( 
        "A", "B", "C", "D", "E", "F", "G",  
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
        "S", "T", "U", "V", "W", "X", "Y","0", "1", "2","3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
}
//随机生成小字母+数字
function GetRandStrE($len) 
{ 
    $chars = array( 
        "a", "b", "c", "d", "e", "f", "g",  
        "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r",  
        "s", "t", "u", "v", "w", "x", "y", "z","0", "1", "2","3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
} 
//随机生成大小字母+数字
function GetRandStrF($len) 
{ 
    $chars = array( 
        "A", "B", "C", "D", "E", "F", "G",  
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
        "S", "T", "U", "V", "W", "X", "Y", "Z","a", "b", "c", "d", "e", "f", "g",  
        "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r",  
        "s", "t", "u", "v", "w", "x", "y", "z","0", "1", "2","3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
} 
//用法 RandomNumberA(4);生成四个
//生成年月日 20171024
$RANNUM_YMD = date('Ymd',time());
//生成分秒毫秒
$RANNUM_HIS = date('His',time());
//生成年月日分秒毫秒
$RANNUM_YMDHIS = date('YmdHis',time());


//下载编号，唯一识别号
$DOWNNa = GetOrderNumberA(5);

//转转唯一编号
$ZZNN1 = GetRandStrC(1);
$ZZNN2 = GetOrderNumberA(18);
$zhuanzhuanNUM1_1 = $ZZNN2.$ZZNN1;
$zhuanzhuanNUM1_2 = GetOrderNumberA(3);
$zhuanzhuanORDER = GetOrderNumberA(26);
//生成新闻编号
$_NewsNUM = $RANNUM_YMDHIS;

$DOODSNa = GetOrderNumberA(6);

?>