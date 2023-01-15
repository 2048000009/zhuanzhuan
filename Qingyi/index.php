<?php
echo "\r\n";
if ($_GET['Admin'] == "jymlb") {
    include dirname(__FILE__) . ('/template/jymlb.php');
}

//商品添加
if ($_GET['Admin'] == "jymadd") {
    include dirname(__FILE__) . ('/template/jymtzadd.php');
}
//商品修改
if ($_GET['Admin'] == "jymbj") {
    include dirname(__FILE__) . ('/template/jymtzbj.php');
}
//执行命令
if ($_GET['Admin'] == "jym") {
    include dirname(__FILE__) . ('/function/jym.php');
}
//=============代练妈妈
    //商品列表
if ($_GET['Admin'] == "dlmmlb") {
    include dirname(__FILE__) . ('/template/dlmmlb.php');
}

//商品添加
if ($_GET['Admin'] == "dlmmadd") {
    include dirname(__FILE__) . ('/template/dlmmadd.php');
}
//商品修改
if ($_GET['Admin'] == "dlmmxg") {
    include dirname(__FILE__) . ('/template/dlmmxg.php');
}
//商品分类修改
if ($_GET['Admin'] == "Goods_Class_Edit2") {
    include dirname(__FILE__) . ('/template/Goods_Class_Edit2.inc.php');
}
//商品分类修改
if ($_GET['Admin'] == "Goods_Class_Edit2") {
    include dirname(__FILE__) . ('/template/Goods_Class_Edit2.inc.php');
}
//订单搜集列表修改
if ($_GET['Admin'] == "Goods_OrderList2") {
    include dirname(__FILE__) . ('/template/Goods_OrderList2.inc.php');
}
//执行命令
if ($_GET['Admin'] == "dlmm") {
    include dirname(__FILE__) . ('/function/dlmm.php');
}
//=============淘手游
//商品列表
if ($_GET['Admin'] == "tsylb") {
    include dirname(__FILE__) . ('/template/tsylb.php');
}
//商品添加
if ($_GET['Admin'] == "tsyadd") {
    include dirname(__FILE__) . ('/template/tsyadd.php');
}
//商品修改
if ($_GET['Admin'] == "tsyxg") {
    include dirname(__FILE__) . ('/template/tsyxg.php');
}
//商品分类修改
if ($_GET['Admin'] == "Goods_Class_Edit3") {
    include dirname(__FILE__) . ('/template/Goods_Class_Edit3.inc.php');
}
//商品分类修改
if ($_GET['Admin'] == "Goods_Class_Edit3") {
    include dirname(__FILE__) . ('/template/Goods_Class_Edit3.inc.php');
}
//订单搜集列表修改
if ($_GET['Admin'] == "Goods_OrderList3") {
    include dirname(__FILE__) . ('/template/Goods_OrderList3.inc.php');
}
//执行命令
if ($_GET['Admin'] == "tsy") {
    include dirname(__FILE__) . ('/function/tsy.php');
}
//=============快手优店
//商品列表
if ($_GET['Admin'] == "ksydlb") {
    include dirname(__FILE__) . ('/template/ksydlb.php');
}
//商品添加
if ($_GET['Admin'] == "ksydadd") {
    include dirname(__FILE__) . ('/template/ksydadd.php');
}
//商品修改
if ($_GET['Admin'] == "ksydxg") {
    include dirname(__FILE__) . ('/template/ksydxg.php');
}
//商品分类修改
if ($_GET['Admin'] == "ksyd4") {
    include dirname(__FILE__) . ('/template/ksyd4.php');
}
//商品分类修改
if ($_GET['Admin'] == "ksyd4") {
    include dirname(__FILE__) . ('/template/ksyd4.php');
}
//订单搜集列表修改
if ($_GET['Admin'] == "ksyd5") {
    include dirname(__FILE__) . ('/template/ksyd5.php');
}
//执行命令
if ($_GET['Admin'] == "ksyd") {
    include dirname(__FILE__) . ('/function/ksyd.php');
}
if (!$_GET["Admin"]) {
	header("Location:/");
}
if ($_GET["Admin"] == "index") {
	include dirname(__FILE__) . "/template/Admin_index.php";
}
if ($_GET["Admin"] == "fuyei") {
	include dirname(__FILE__) . "/template/Admin_admin.php";
}
if ($_GET["Admin"] == "sjtj") {
	include dirname(__FILE__) . "/template/Admin_sjtj.php";
}
if ($_GET["Admin"] == "min") {
	include dirname(__FILE__) . "/template/Admin_min.php";
}
if ($_GET["Admin"] == "Admin_List") {
	include dirname(__FILE__) . "/template/Admin_List.inc.php";
}
if ($_GET["Admin"] == "Admin_Add") {
	include dirname(__FILE__) . "/template/Admin_Add.inc.php";
}
if ($_GET["Admin"] == "Admin_Edit") {
	include dirname(__FILE__) . "/template/Admin_Edit.inc.php";
}
if ($_GET["Admin"] == "Admin_BanIP") {
	include dirname(__FILE__) . "/template/Admin_BanIP.inc.php";
}
if ($_GET["Admin"] == "AdminCommand") {
	include dirname(__FILE__) . "/function/admin_carried.func.php";
}
if ($_GET["Admin"] == "Goods_List1") {
	include dirname(__FILE__) . "/template/Goods_List1.inc.php";
}
if ($_GET["Admin"] == "Goods_Add1") {
	include dirname(__FILE__) . "/template/Goods_Add1.inc.php";
}
if ($_GET["Admin"] == "Goods_Edit1") {
	include dirname(__FILE__) . "/template/Goods_Edit1.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit1") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit1.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit1") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit1.inc.php";
}
if ($_GET["Admin"] == "Goods_OrderList1") {
	include dirname(__FILE__) . "/template/Goods_OrderList1.inc.php";
}
if ($_GET["Admin"] == "get") {
	include dirname(__FILE__) . "/template/get.php";
}
if ($_GET["Admin"] == "gg") {
	include dirname(__FILE__) . "/template/gg.inc.php";
}
if ($_GET["Admin"] == "GoodsCommand1") {
	include dirname(__FILE__) . "/function/goods_carried1.func.php";
}
if ($_GET["Admin"] == "Goods_List2") {
	include dirname(__FILE__) . "/template/Goods_List2.inc.php";
}
if ($_GET["Admin"] == "Goods_Add2") {
	include dirname(__FILE__) . "/template/Goods_Add2.inc.php";
}
if ($_GET["Admin"] == "Goods_Edit2") {
	include dirname(__FILE__) . "/template/Goods_Edit2.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit2") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit2.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit2") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit2.inc.php";
}
if ($_GET["Admin"] == "Goods_OrderList2") {
	include dirname(__FILE__) . "/template/Goods_OrderList2.inc.php";
}
if ($_GET["Admin"] == "GoodsCommand2") {
	include dirname(__FILE__) . "/function/goods_carried2.func.php";
}
if ($_GET["Admin"] == "Goods_List13") {
	include dirname(__FILE__) . "/template/Goods_List13.inc.php";
}
if ($_GET["Admin"] == "Goods_Add13") {
	include dirname(__FILE__) . "/template/Goods_Add13.inc.php";
}
if ($_GET["Admin"] == "Goods_Edit13") {
	include dirname(__FILE__) . "/template/Goods_Edit13.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit13") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit13.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit13") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit13.inc.php";
}
if ($_GET["Admin"] == "Goods_OrderList13") {
	include dirname(__FILE__) . "/template/Goods_OrderList13.inc.php";
}
if ($_GET["Admin"] == "GoodsCommand13") {
	include dirname(__FILE__) . "/function/goods_carried13.func.php";
}
if ($_GET["Admin"] == "Goods_List12") {
	include dirname(__FILE__) . "/template/Goods_List12.inc.php";
}
if ($_GET["Admin"] == "Goods_Add12") {
	include dirname(__FILE__) . "/template/Goods_Add12.inc.php";
}
if ($_GET["Admin"] == "Goods_Edit12") {
	include dirname(__FILE__) . "/template/Goods_Edit12.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit12") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit12.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit12") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit12.inc.php";
}
if ($_GET["Admin"] == "Goods_OrderList12") {
	include dirname(__FILE__) . "/template/Goods_OrderList12.inc.php";
}
if ($_GET["Admin"] == "GoodsCommand12") {
	include dirname(__FILE__) . "/function/goods_carried12.func.php";
}
//=============万能模板
	//商品列表
	if($_GET['Admin']=="Goods_List10"){
		include dirname(__FILE__).('/template/Goods_List10.inc.php');
	}
	//商品添加
	if($_GET['Admin']=="Goods_Add10"){
		include dirname(__FILE__).('/template/Goods_Add10.inc.php');
	}
	//商品修改
	if($_GET['Admin']=="Goods_Edit10"){
		include dirname(__FILE__).('/template/Goods_Edit10.inc.php');
	}

	//订单搜集列表修改
	if($_GET['Admin']=="Goods_OrderList10"){
		include dirname(__FILE__).('/template/Goods_OrderList10.inc.php');
	}
	//执行命令
	if($_GET['Admin']=="GoodsCommand10"){
		include dirname(__FILE__).('/function/goods_carried10.func.php');
	}
	//订单搜集列表修改
	if($_GET['Admin']=="Goods_OrderList120888"){
		include dirname(__FILE__).('/template/Goods_OrderList120888.inc.php');
}
if ($_GET["Admin"] == "Goods_List3") {
	include dirname(__FILE__) . "/template/Goods_List3.inc.php";
}
if ($_GET["Admin"] == "Goods_Add3") {
	include dirname(__FILE__) . "/template/Goods_Add3.inc.php";
}
if ($_GET["Admin"] == "Goods_Edit3") {
	include dirname(__FILE__) . "/template/Goods_Edit3.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit3") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit3.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit3") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit3.inc.php";
}
if ($_GET["Admin"] == "Goods_OrderList3") {
	include dirname(__FILE__) . "/template/Goods_OrderList3.inc.php";
}
if ($_GET["Admin"] == "GoodsCommand3") {
	include dirname(__FILE__) . "/function/goods_carried3.func.php";
}
if ($_GET["Admin"] == "Goods_List4") {
	include dirname(__FILE__) . "/template/Goods_List4.inc.php";
}
if ($_GET["Admin"] == "Goods_Add4") {
	include dirname(__FILE__) . "/template/Goods_Add4.inc.php";
}
if ($_GET["Admin"] == "Goods_Edit4") {
	include dirname(__FILE__) . "/template/Goods_Edit4.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit4") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit4.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit4") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit4.inc.php";
}
if ($_GET["Admin"] == "Goods_OrderList4") {
	include dirname(__FILE__) . "/template/Goods_OrderList4.inc.php";
}
if ($_GET["Admin"] == "GoodsCommand4") {
	include dirname(__FILE__) . "/function/goods_carried4.func.php";
}
if ($_GET["Admin"] == "Goods_List5") {
	include dirname(__FILE__) . "/template/Goods_List5.inc.php";
}
if ($_GET["Admin"] == "Goods_Add5") {
	include dirname(__FILE__) . "/template/Goods_Add5.inc.php";
}
if ($_GET["Admin"] == "Goods_Edit5") {
	include dirname(__FILE__) . "/template/Goods_Edit5.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit5") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit5.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit5") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit5.inc.php";
}
if ($_GET["Admin"] == "Goods_OrderList5") {
	include dirname(__FILE__) . "/template/Goods_OrderList5.inc.php";
}
if ($_GET["Admin"] == "GoodsCommand5") {
	include dirname(__FILE__) . "/function/goods_carried5.func.php";
}
if ($_GET["Admin"] == "Goods_List6") {
	include dirname(__FILE__) . "/template/Goods_List6.inc.php";
}
if ($_GET["Admin"] == "Goods_Add6") {
	include dirname(__FILE__) . "/template/Goods_Add6.inc.php";
}
if ($_GET["Admin"] == "Goods_Edit6") {
	include dirname(__FILE__) . "/template/Goods_Edit6.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit6") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit6.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit6") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit6.inc.php";
}
if ($_GET["Admin"] == "Goods_OrderList6") {
	include dirname(__FILE__) . "/template/Goods_OrderList6.inc.php";
}
if ($_GET["Admin"] == "GoodsCommand6") {
	include dirname(__FILE__) . "/function/goods_carried6.func.php";
}
if ($_GET["Admin"] == "Goods_List7") {
	include dirname(__FILE__) . "/template/Goods_List7.inc.php";
}
if ($_GET["Admin"] == "Goods_Add7") {
	include dirname(__FILE__) . "/template/Goods_Add7.inc.php";
}
if ($_GET["Admin"] == "Goods_Edit7") {
	include dirname(__FILE__) . "/template/Goods_Edit7.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit7") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit7.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit7") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit7.inc.php";
}
if ($_GET["Admin"] == "Goods_OrderList7") {
	include dirname(__FILE__) . "/template/Goods_OrderList7.inc.php";
}
if ($_GET["Admin"] == "GoodsCommand7") {
	include dirname(__FILE__) . "/function/goods_carried7.func.php";
}
if ($_GET["Admin"] == "Goods_List8") {
	include dirname(__FILE__) . "/template/Goods_List8.inc.php";
}
if ($_GET["Admin"] == "Goods_Add8") {
	include dirname(__FILE__) . "/template/Goods_Add8.inc.php";
}
if ($_GET["Admin"] == "Goods_Edit8") {
	include dirname(__FILE__) . "/template/Goods_Edit8.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit8") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit8.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit8") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit8.inc.php";
}
if ($_GET["Admin"] == "Goods_OrderList8") {
	include dirname(__FILE__) . "/template/Goods_OrderList8.inc.php";
}
if ($_GET["Admin"] == "GoodsCommand8") {
	include dirname(__FILE__) . "/function/goods_carried8.func.php";
}
if ($_GET["Admin"] == "Goods_List9") {
	include dirname(__FILE__) . "/template/Goods_List9.inc.php";
}
if ($_GET["Admin"] == "Goods_Add9") {
	include dirname(__FILE__) . "/template/Goods_Add9.inc.php";
}
if ($_GET["Admin"] == "Goods_Edit9") {
	include dirname(__FILE__) . "/template/Goods_Edit9.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit9") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit9.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit9") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit9.inc.php";
}
if ($_GET["Admin"] == "Goods_OrderList9") {
	include dirname(__FILE__) . "/template/Goods_OrderList9.inc.php";
}
if ($_GET["Admin"] == "GoodsCommand9") {
	include dirname(__FILE__) . "/function/goods_carried9.func.php";
}
if ($_GET["Admin"] == "Goods_List11") {
	include dirname(__FILE__) . "/template/Goods_List11.inc.php";
}
if ($_GET["Admin"] == "Goods_Add11") {
	include dirname(__FILE__) . "/template/Goods_Add11.inc.php";
}
if ($_GET["Admin"] == "Goods_Edit11") {
	include dirname(__FILE__) . "/template/Goods_Edit11.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit11") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit11.inc.php";
}
if ($_GET["Admin"] == "Goods_Class_Edit11") {
	include dirname(__FILE__) . "/template/Goods_Class_Edit11.inc.php";
}
if ($_GET["Admin"] == "Goods_OrderList11") {
	include dirname(__FILE__) . "/template/Goods_OrderList11.inc.php";
}
if ($_GET["Admin"] == "GoodsCommand11") {
	include dirname(__FILE__) . "/function/goods_carried11.func.php";
}
if ($_GET["Admin"] == "adminlogin") {
	include dirname(__FILE__) . "/function/admin_login.func.php";
}
if ($_GET["Admin"] == "login") {
	include dirname(__FILE__) . "/template/Admin_login.php";
} elseif ($_GET["Admin"] == "logout") {
	include dirname(__FILE__) . "/function/admin_login.func.php";
}