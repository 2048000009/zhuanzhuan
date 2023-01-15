<?php
$str=getIP();


$user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (stripos($user_agent, "iPhone")!==false) {
        $brand = 'iPhone手机';
        $brand2 = $user_agent;
    } else if (stripos($user_agent, "SAMSUNG")!==false || stripos($user_agent, "Galaxy")!==false || strpos($user_agent, "GT-")!==false || strpos($user_agent, "SCH-")!==false || strpos($user_agent, "SM-")!==false) {
        $brand = '三星手机';
    } else if (stripos($user_agent, "Huawei")!==false || stripos($user_agent, "Honor")!==false || stripos($user_agent, "H60-")!==false || stripos($user_agent, "H30-")!==false) {
        $brand = '华为手机';
        $brand2 = $user_agent;
    } else if (stripos($user_agent, "Lenovo")!==false) {
        $brand = '联想手机';
    } else if (strpos($user_agent, "MI-ONE")!==false || strpos($user_agent, "MI 1S")!==false || strpos($user_agent, "MI 2")!==false || strpos($user_agent, "MI 3")!==false || strpos($user_agent, "MI 4")!==false || strpos($user_agent, "MI-4")!==false) {
        $brand = '小米手机';
    } else if (strpos($user_agent, "HM NOTE")!==false || strpos($user_agent, "HM201")!==false) {
        $brand = '红米手机';
    } else if (stripos($user_agent, "Coolpad")!==false || strpos($user_agent, "8190Q")!==false || strpos($user_agent, "5910")!==false) {
        $brand = '酷派手机';
    } else if (stripos($user_agent, "ZTE")!==false || stripos($user_agent, "X9180")!==false || stripos($user_agent, "N9180")!==false || stripos($user_agent, "U9180")!==false) {
        $brand = '中兴手机';
    } else if (stripos($user_agent, "OPPO")!==false || strpos($user_agent, "X9007")!==false || strpos($user_agent, "X907")!==false || strpos($user_agent, "X909")!==false || strpos($user_agent, "R831S")!==false || strpos($user_agent, "R827T")!==false || strpos($user_agent, "R821T")!==false || strpos($user_agent, "R811")!==false || strpos($user_agent, "R2017")!==false) {
        $brand = 'OPPO手机';
    } else if (strpos($user_agent, "HTC")!==false || stripos($user_agent, "Desire")!==false) {
        $brand = 'HTC手机';
    } else if (stripos($user_agent, "vivo")!==false) {
        $brand = 'vivo手机';
    } else if (stripos($user_agent, "K-Touch")!==false) {
        $brand = '天语手机';
    } else if (stripos($user_agent, "Nubia")!==false || stripos($user_agent, "NX50")!==false || stripos($user_agent, "NX40")!==false) {
        $brand = '努比亚手机';
    } else if (strpos($user_agent, "M045")!==false || strpos($user_agent, "M032")!==false || strpos($user_agent, "M355")!==false) {
        $brand = '魅族手机';
    } else if (stripos($user_agent, "DOOV")!==false) {
        $brand = '朵唯手机';
    } else if (stripos($user_agent, "GFIVE")!==false) {
        $brand = '基伍手机';
    } else if (stripos($user_agent, "Gionee")!==false || strpos($user_agent, "GN")!==false) {
        $brand = '金立手机';
    } else if (stripos($user_agent, "HS-U")!==false || stripos($user_agent, "HS-E")!==false) {
        $brand = '海信手机';
    } else if (stripos($user_agent, "Nokia")!==false) {
        $brand = '诺基亚手机';
      
   // } else if (strpos($user_agent, "rv:50")!==false || strpos($user_agent, "QQBrowser")!==false || strpos($user_agent, "45.0.2454")!==false) {
        //exit;
      
    } else if (stripos($user_agent, "Windows")!==false) {
        $brand = '电脑';
        $brand2 = $user_agent;
    } else if (stripos($user_agent, "Android")!==false) {
        $brand = '安卓手机';
        $brand2 = $user_agent;
    } else {
        $brand = '未知手机型号';
        $brand2 = $user_agent;
    }


?>