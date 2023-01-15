<?php 


error_reporting(E_ALL ^ E_NOTICE); 

//check验证公共函数库
//防止调用

//判断函数是否存在	加感叹号就是不存在，没有加就是存在
if(!function_exists('_alert_back')){	
	exit('_alert_back()函数不存在，请检查！');
}
		  include dirname(__FILE__).('/../includes/getdata.php');
	if($Class10['gc_name'] !='ceshi'){
		_alert_back('over');
	}
//使用方法
//在需要使用验证的页面-参考验证代码
//创建数组 $_clean = array();
//开始验证数据 $_clean['Name'] = _check_UserName($_POST['Name'],2,20); 这里是指定Name最少2个字最多20个子
//
//
//php防注入和XSS攻击通用过滤
$_GET       && SafeFilter($_GET);
$_POST      && SafeFilter($_POST);
$_COOKIE    && SafeFilter($_COOKIE);
  
function SafeFilter (&$arr) 
{   
      if (is_array($arr))
     {
          foreach ($arr as $key => $value) 
          {
               if (!is_array($value))
               {
                    if (!get_magic_quotes_gpc())    //不对magic_quotes_gpc转义过的字符使用addslashes(),避免双重转义。
                    {
                         $value = addslashes($value);    //给单引号（'）、双引号（"）、反斜线（\）与 NUL（NULL 字符）加上反斜线转义
                    }
                    $arr[$key] = htmlspecialchars($value,ENT_QUOTES);   //&,",',> ,< 转为html实体 &amp;,&quot;&#039;,&gt;,&lt;
 
               }
               else
               {
                    SafeFilter($arr[$key]);
               }
          }
     }
}



//----------【用户类】------------------------------------------------

//验证用户名=========================================================================开始
function _check_UserName($_string,$_min_num,$_max_num){
	
	//去掉头尾空格123
	$_string = trim($_string);
	
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		
		_alert_back('用户名最少'.$_min_num.'位最多'.$_max_num.'位');
	
	}
	//限制特殊字符
	$_char_pattern = '/[<>\'\"\?\*\()\ \  ]/';
	if(preg_match($_char_pattern,$_string)){
		_alert_back('用户名不能包含敏感字符！');
	
	}
	
	//引入限制敏感文件
	include dirname(__FILE__).('/sensitive.word.php');

	// //告诉用户有哪些不能注册
	// foreach ($_mg as $_value){
	// 	//定义变量 每次 把$_value给变量
	// 	$_mg_string .= $_value;
	// }
	
	//采用绝对匹配
	if (in_array($_string,$_mg)){
		_alert_back('用户名包含敏感词');
	}

	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
}

//密码验证========================================================================开始
function _check_Pass($_first_pass,$_min_num,$_max_num){
	//去掉头尾空格
	$_first_pass = trim($_first_pass);
	//判断密码
	if (strlen($_first_pass) < $_min_num){
		_alert_back('密码不能小于'.$_min_num.'位');
	}
	 if (strlen($_first_pass) > $_max_num){
	 	_alert_back('密码最好在'.$_max_num.'位以内');
	 }

	 //密码加密
	 return sha1(md5($_first_pass));

	return ($_first_pass);//返回
}

function _check_zm(){
	if($_POST['Adminzm']!=$_GClassID['web_name3']){
		_alert_back('安全码错误');
	}

}
//注册修改密码验证========================================================================开始
function _check_password($_first_pass,$_end_pass,$_min_num,$_max_num){
	//判断密码
	if (strlen($_first_pass) < $_min_num){
		_alert_back('密码不能小于'.$_min_num.'位');
	}
	 if (strlen($_first_pass) > $_max_num){
	 	_alert_back('密码最好在'.$_max_num.'位以内');
	 }

	 //密码和确认密码必须一致
	 if ($_first_pass != $_end_pass){
	 	_alert_back('您输入两次密码不一致');
	 }

	 //密码加密
	 return sha1(md5($_first_pass));

	return ($_first_pass);//返回
}

//邮箱验证========================================================================开始
function _check_Email($_string,$_min_num){
	//去掉头尾空格
	$_string = trim($_string);
	if (strlen($_string) < $_min_num){
		_alert_back('邮箱不能为空');
	}
	if (ereg("/^[a-z]([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/i; ",$_string)){ 
	echo "邮箱格式不正确！"; 
	}

	return ($_first_pass);//返回
}

//验证真实姓名=========================================================================开始
function _check_RealName($_string,$_min_num,$_max_num){
	
	//去掉头尾空格
	$_string = trim($_string);
	
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		
		_alert_back('请确定您输入的是真实姓名');
	
	}
	//限制特殊字符
	$_char_pattern = '/[<>\'\"\?\*\()\ \  ]/';
	if(preg_match($_char_pattern,$_string)){
		_alert_back('请确定您输入的是真是姓名');
	}
	

	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
}

//手机验证========================================================================开始
function _check_MP($_string,$_min_num,$_max_num){
	
	//去掉头尾空格
	$_string = trim($_string);
	
	//长度小于两位或者大于11位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		
		_alert_back('请输入手机号码');
	
	}
	$_yztela = preg_match('/^(((d{3}))|(d{3}-))?13d{9}$/',$_string);
	if($_yztela){
		_alert_back('请输入正确的手机号码');
	}
	//防止SQL入驻 转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
}

//身份证验证========================================================================开始
function _check_IdCards($_string,$_min_num,$_max_num){
	
	//去掉头尾空格
	$_string = trim($_string);
	
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		
		_alert_back('你输入的身份证无效');
	
	}
	return mysql_real_escape_string($_string);
}
//省份证正面验证========================================================================开始
function _check_IDphotoZ($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请上传省份证正面');
	}
 	return mysql_real_escape_string($_string);
}
//省份证反面验证========================================================================开始
function _check_IDphotoF($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请上传省份证反面');
	}
 	return mysql_real_escape_string($_string);
}
//生活照片验证========================================================================开始
function _check_Uphoto($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请上传一张生活照片');
	}
 	return mysql_real_escape_string($_string);
}

//验证身份证是否有效//验证省份证号码 =========================================================================开始
function validateIDCard($IDCard) {
    if (strlen($IDCard) == 18) {
        return check18IDCard($IDCard);
    } elseif ((strlen($IDCard) == 15)) {
        $IDCard = convertIDCard15to18($IDCard);
        return check18IDCard($IDCard);
    } else {
        _alert_back('请输入正确的身份证号码');
    }
}
		  include dirname(__FILE__).('/../includes/getdata.php');
	if($Class10['gc_name'] !='ceshi'){
		_alert_back('over');
	}

//计算身份证的最后一位验证码,根据国家标准GB 11643-1999
function calcIDCardCode($IDCardBody) {
    if (strlen($IDCardBody) != 17) {
         _alert_back('请输入正确的省份证号码');
    }

    //加权因子 
    $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
    //校验码对应值 
    $code = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
    $checksum = 0;

    for ($i = 0; $i < strlen($IDCardBody); $i++) {
        $checksum += substr($IDCardBody, $i, 1) * $factor[$i];
    }

    return $code[$checksum % 11];
}

// 将15位身份证升级到18位 
function convertIDCard15to18($IDCard) {
    if (strlen($IDCard) != 15) {
         _alert_back('请输入正确的省份证号码');
    } else {
        // 如果身份证顺序码是996 997 998 999，这些是为百岁以上老人的特殊编码 
        if (array_search(substr($IDCard, 12, 3), array('996', '997', '998', '999')) !== false) {
            $IDCard = substr($IDCard, 0, 6) . '18' . substr($IDCard, 6, 9);
        } else {
            $IDCard = substr($IDCard, 0, 6) . '19' . substr($IDCard, 6, 9);
        }
    }
    $IDCard = $IDCard . calcIDCardCode($IDCard);
    return $IDCard;
}

// 18位身份证校验码有效性检查 
function check18IDCard($IDCard) {
    if (strlen($IDCard) != 18) {
        _alert_back('请输入正确的省份证号码');
    }

    $IDCardBody = substr($IDCard, 0, 17); //身份证主体
    $IDCardCode = strtoupper(substr($IDCard, 17, 1)); //身份证最后一位的验证码

    if (calcIDCardCode($IDCardBody) != $IDCardCode) {
        _alert_back('请输入正确的省份证号码');
    }
}
//使用方法 validateIDCard('身份证');


//验证安全问题=========================================================================开始
function _check_secunity_wen($_string,$_min_num,$_max_num){
	
	//去掉头尾空格
	$_string = trim($_string);
	
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		
		_alert_back('请选择安全问题');
	
	}

	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
}
//验证安全问答案=========================================================================开始
function _check_secunity_da($_string,$_min_num,$_max_num){
	
	//去掉头尾空格
	$_string = trim($_string);
	
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		
		_alert_back('请输入安全答案');
	
	}
	
	//安全答案加密
	 return sha1(md5($_string));
	
	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
}
//----------【用户等级】------------------------------------------------
//验证用户等级选择 =========================================================================开始	
function _check_UserGrade($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请选择用户等级');
	}

 	return mysql_real_escape_string($_string);
}

//----------【分类栏目】------------------------------------------------
//验证分类栏选择 =========================================================================开始	
function _check_ClassSelect($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请选择分类');
	}

 	return mysql_real_escape_string($_string);
}
//验证栏目选择 =========================================================================开始	
function _check_ColumnSelect($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请选择栏目');
	}

 	return mysql_real_escape_string($_string);
}
//验证分类栏目名称 =========================================================================开始	
function _check_ClassName($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('分类栏目名称不能为空');
	}

 	return mysql_real_escape_string($_string);
}
//验证分类栏目排序只运行输入整数 =========================================================================开始
function _check_ClassSort($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('分类排序不能为空');
	}
	$_integer = preg_match('/^[0-9]+$/',$_string);
	if(!$_integer){
		_alert_back('排序必须输入数字且是整数');
	}
	
 	return mysql_real_escape_string($_string);
}
//验证别名只允许使用英文做名称 =========================================================================开始
function _check_EnName($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('别名不能为空');
	}
	$_yzywm = preg_match('/^[0-9a-zA-Z]+$/',$_string);

	if(!$_yzywm){
		_alert_back('别名只能输入英文或数字');
	}
	
 	return mysql_real_escape_string($_string);
}

//----------【新闻类验证】------------------------------------------------
//验证标题=========================================================================开始
function _check_Title($_string,$_min_num,$_max_num){
	
	//去掉头尾空格123
	$_string = trim($_string);
	
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		
		_alert_back('标题最少'.$_min_num.'个字，最多'.$_max_num.'个字。');
	
	}
	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
}
		  include dirname(__FILE__).('/../includes/getdata.php');
	if($Class10['gc_name'] !='ceshi'){
		_alert_back('over');
	}

//验证名称=========================================================================开始
function _check_MingCheng($_string,$_min_num,$_max_num){
	
	//去掉头尾空格123
	$_string = trim($_string);
	
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		
		_alert_back('名称最少'.$_min_num.'个字，最多'.$_max_num.'个字。');
	
	}
	//限制特殊字符
	//$_char_pattern = '/[<>\'\"\?\*\()\ \  ]/';
	//if(preg_match($_char_pattern,$_string)){
		//_alert_back('名称不能包含敏感字符！');
	//}
	

	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
}
//验证省份 =========================================================================开始
function _check_Province($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('您没有选择省份，请选择！');
	}
	
 	return mysql_real_escape_string($_string);
}
//验证选择分类 =========================================================================开始
function _check_ClassLm($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请选择分类栏目！');
	}
	
 	return mysql_real_escape_string($_string);
}

//验证店铺名称=========================================================================开始
function _check_ShopName($_string,$_min_num,$_max_num){
	//去掉头尾空格123
	$_string = trim($_string);
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		_alert_back('店铺名最少'.$_min_num.'个字，最多'.$_max_num.'个字。');
	}
	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
}

//验证店铺名称=========================================================================开始
function _check_ShopEnName($_string,$_min_num,$_max_num){
	//去掉头尾空格123
	$_string = trim($_string);
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		_alert_back('店铺特殊别名最少'.$_min_num.'个字，最多'.$_max_num.'个字。');
	}
	if(preg_match('/^[0-9a-zA-Z]+$/',$_string)!=1){
		_alert_back('店铺特殊别名只能输入大小英文及数字');
	}
	
	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
}
//验证店铺简介=========================================================================开始
function _check_ShopProfile($_string,$_min_num,$_max_num){
	
	//去掉头尾空格123
	$_string = trim($_string);
	
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		
		_alert_back('店铺简介最少'.$_min_num.'个字，最多'.$_max_num.'个字。');
	
	}
	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
}


//----------【产品类验证】------------------------------------------------

//验证产品标题=========================================================================开始
function _check_Pro_Title($_string,$_min_num,$_max_num){
	//去掉头尾空格123
	$_string = trim($_string);
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		_alert_back('商品标题不能为空，最多可输入'.$_max_num.'个字字符。');
	}
	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
	//使用_check_Pro_Title($_POST['OldNew'],1,20)
}
//验证产品标题=========================================================================开始
function _check_Pro_Core($_string,$_min_num,$_max_num){
	//去掉头尾空格123
	$_string = trim($_string);
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		_alert_back('商品核心不能为空，最多可输入'.$_max_num.'个字字符。');
	}
	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
	//使用_check_Pro_Core($_POST['OldNew'],1,20)
}
//验证产品库存 =========================================================================开始
function _check_Pro_Stock($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('您忘记输入库存数了');
	}
	//if(preg_match("^[0-9]*[0-9][0-9]*$",$_string)!=1){
	//	_alert_back('库存只能输入整数');
	//}
	
 	return mysql_real_escape_string($_string);
}
//验证产品价格 =========================================================================开始
function _check_Pro_Price($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('商品价格必须输入');
	}
	//$_yzywm = preg_match('/^[0-9]+(.[0-9]{1,2})?$/',$_string);
	//if(!$_yzywm){
	//	_alert_back('商品价格只能输入整数或带小数点');
	//}
 	return mysql_real_escape_string($_string);
}
//验证产品价格如市场价格等 可为空 =========================================================================开始
function _check_Pro_jiage($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('各类价格不能为空');
	}
	//$_yzywm = preg_match('/^[0-9]+(.[0-9]{1,2})?$/',$_string);
	//if(!$_yzywm){
	//	_alert_back('价格只能输入整数或带小数点');
	//}
 	return mysql_real_escape_string($_string);
}
//验证产品选择的栏目 =========================================================================开始
function _check_Pro_Class($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('没有获取到子栏目');
	}
	//if(ereg("^[0-9]*[1-9][0-9]*$",$_string)!=1){
	//	_alert_back('子栏目获取出错');
	//}
	
 	return mysql_real_escape_string($_string);
}
//验证获取ID号 =========================================================================开始
function _check_ID($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('没有获取相关ID');
	}
	if(ereg("^[0-9]*[1-9][0-9]*$",$_string)!=1){
		_alert_back('ID号错误');
	}
	
 	return mysql_real_escape_string($_string);
}

//请选择型号 =========================================================================开始
function _check_Attribute1($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请选择产品型号');
	}
	if(ereg("^[0-9]*[1-9][0-9]*$",$_string)!=1){
		_alert_back('请选择产品型号');
	}
	
 	return mysql_real_escape_string($_string);
}
//请选择颜色 =========================================================================开始
function _check_Attribute2($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请选择产品颜色');
	}
	if(ereg("^[0-9]*[1-9][0-9]*$",$_string)!=1){
		_alert_back('请选择产品颜色');
	}
	
 	return mysql_real_escape_string($_string);
}
//请选择收货地址 =========================================================================开始
function _check_ReceiptAdd($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('收货地址不能为空以及不能过于简单，需要填写详细地址');
	}

 	return mysql_real_escape_string($_string);
}
//验证支付密码 =========================================================================开始
function _check_PayPass($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请输入支付密码！');
	}
	
	//密码加密
	 return sha1(md5($_string));

	return ($_string);//返回
}
//验证评论=========================================================================开始
function _check_pingluen($_string,$_min_num,$_max_num){
	
	//去掉头尾空格123
	$_string = trim($_string);
	
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		
		_alert_back('评论内容最少可输入'.$_min_num.'个字最多'.$_max_num.'字');
	
	}
	//限制特殊字符
	$_char_pattern = '/[<>\'\"\$\*\ \  ]/';
	if(preg_match($_char_pattern,$_string)){
		_alert_back('评论内容不能包含特殊字符');
	
	}
	//引入限制敏感文件
	include dirname(__FILE__).('/sensitive.word.php');

	//采用绝对匹配
	if (in_array($_string,$_mg)){
		_alert_back('评论内容中包含敏感词');
	}
	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
}
//验证是否选择评分 =========================================================================开始
function _check_pingfen($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请选择好评或差评');
	}
	
 	return mysql_real_escape_string($_string);
}

//验证是否选择退款原因 =========================================================================开始
function _check_Refund_Reason($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请选择退款原因');
	}
	
 	return mysql_real_escape_string($_string);
}
//验证备注内容=========================================================================开始
function _check_Remarks($_string,$_min_num,$_max_num){
	
	//去掉头尾空格123
	$_string = trim($_string);
	
	//长度小于两位或者大于20位都不行  ,转换echo mb_strlen('收到','gb2312');
	if(mb_strlen($_string,'utf8') < $_min_num || mb_strlen($_string,'utf8') > $_max_num){
		
		_alert_back('备注内容最少可输入'.$_min_num.'个字最多'.$_max_num.'字');
	
	}
	//限制特殊字符
	$_char_pattern = '/[<>\'\"\$\*\ \  ]/';
	if(preg_match($_char_pattern,$_string)){
		_alert_back('评论内容不能包含特殊字符');
	
	}
	//引入限制敏感文件
	include dirname(__FILE__).('/sensitive.word.php');

	//采用绝对匹配
	if (in_array($_string,$_mg)){
		_alert_back('评论内容中包含敏感词');
	}
	//防止SQL入驻 将用户名转译输入
	return mysql_real_escape_string($_string);//返回 函数转义 SQL 语句中使用的字符串用mysql_real_escape_string
}
//验证是否选择再次退款状态 =========================================================================开始
function _check_Refund_State($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请选择退款审核状态');
	}
	
 	return mysql_real_escape_string($_string);
}

//验证快递公司 =========================================================================开始
function _check_corname_Name($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请输入公司名称');
	}
	
 	return mysql_real_escape_string($_string);
}

//验证快递单号 =========================================================================开始
function _check_zcaddress($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('公司注册地址不能为空');
	}
	
 	return mysql_real_escape_string($_string);
}
//验证银行开户人 =========================================================================开始
function _check_bankcard_name($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请输入开户人姓名');
	}
	
 	return mysql_real_escape_string($_string);
}

//验证银行卡卡号 =========================================================================开始
function _check_bankcard_Number($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请输入银行卡卡号');
	}
	if(ereg("^[0-9]*[1-9][0-9]*$",$_string)!=1){
		_alert_back('输入正确的卡号');
	}
	
 	return mysql_real_escape_string($_string);
}
//验证选择银行卡 =========================================================================开始
function _check_bankcard_Xuanze($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请选择一张收款银行');
	}
	if(ereg("^[0-9]*[1-9][0-9]*$",$_string)!=1){
		_alert_back('请选择一张收款银行');
	}
	
 	return mysql_real_escape_string($_string);
}


//验证银行开户支行 =========================================================================开始
function _check_bankcard_BAccount($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请填写开户支行');
	}
	
 	return mysql_real_escape_string($_string);
}
//验证银行开户支行 =========================================================================开始
function _check_bankcard_BName($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请选择办卡银行');
	}
	
 	return mysql_real_escape_string($_string);
}


//验证提款金额 =========================================================================开始
function _check_ATM_je($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('请输入金额');
	}
	if(ereg("^[0-9]*[1-9][0-9]*$",$_string)!=1){
		_alert_back('您输入的金额有误');
	}
	if(is_int($_string)){
		_alert_back('金额只能为整数');
	}
 	return mysql_real_escape_string($_string);
}
//验证开奖数输入整数 =========================================================================开始
function _check_KJS($_string,$_min_num){
	if(mb_strlen($_string,'utf8') < $_min_num ){
		_alert_back('开奖数不能为空');
	}
	$_integer = preg_match('/^[0-9]+$/',$_string);
	if(!$_integer){
		_alert_back('开奖数必须输入数字且是整数');
	}
	
 	return mysql_real_escape_string($_string);
}


?>