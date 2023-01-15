<?php
($Class1 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=1")) || exit("SQL执行错误");
$Class1_gc_name = $Class1["gc_name"];
$Class1_jump_url = $Class1["jump_url"];
($Class2 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=2")) || exit("SQL执行错误");
$Class2_gc_name = $Class2["gc_name"];
$Class2_jump_url = $Class2["jump_url"];
($Class3 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=3")) || exit("SQL执行错误");
$Class3_gc_name = $Class3["gc_name"];
$Class3_jump_url = $Class3["jump_url"];
($Class4 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=4")) || exit("SQL执行错误");
$Class4_gc_name = $Class4["gc_name"];
$Class4_jump_url = $Class4["jump_url"];
($Class5 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=5")) || exit("SQL执行错误");
$Class5_gc_name = $Class5["gc_name"];
$Class5_jump_url = $Class5["jump_url"];
($Class6 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=6")) || exit("SQL执行错误");
$Class6_gc_name = $Class6["gc_name"];
$Class6_jump_url = $Class6["jump_url"];
($Class7 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=7")) || exit("SQL执行错误");
$Class7_gc_name = $Class7["gc_name"];
$Class7_jump_url = $Class7["jump_url"];
($Class8 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=8")) || exit("SQL执行错误");
$Class8_gc_name = $Class8["gc_name"];
$Class8_jump_url = $Class8["jump_url"];
($Class9 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=9")) || exit("SQL执行错误");
$Class9_gc_name = $Class9["gc_name"];
$Class9_jump_url = $Class9["jump_url"];
($Class10 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=10")) || exit("SQL执行错误");
$Class10_gc_name = $Class10["gc_name"];
$Class10_jump_url = $Class10["jump_url"];
if ($Class10["gc_name"] != "ceshi") {
	_alert_back("over");
}
//分类ID5 交易猫
$Class5 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=5") or die('SQL执行错误');
$Class5_gc_name=$Class5['gc_name'];
$Class5_jump_url=$Class5['jump_url'];
//分类ID5 交易猫
$Class6 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=6") or die('SQL执行错误');
$Class6_gc_name=$Class6['gc_name'];
$Class6_jump_url=$Class6['jump_url'];
//分类ID5 交易猫
$Class7 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=7") or die('SQL执行错误');
$Class7_gc_name=$Class7['gc_name'];
$Class7_jump_url=$Class7['jump_url'];
//分类ID5 交易猫
$Class8 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=8") or die('SQL执行错误');
$Class8_gc_name=$Class8['gc_name'];
$Class8_jump_url=$Class8['jump_url'];
//分类ID5 交易猫
$Class9 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=9") or die('SQL执行错误');
$Class9_gc_name=$Class9['gc_name'];
$Class9_jump_url=$Class9['jump_url'];
//分类ID10 交易猫-万能模板
$Class10 = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=10") or die('SQL执行错误');
$Class10_gc_name=$Class10['gc_name'];
$Class10_jump_url=$Class10['jump_url'];