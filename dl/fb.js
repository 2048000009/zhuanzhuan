<?php 
<script type="text/javascript">
//@author 无陌然 qq2633544207
//blog:aidezy.com
var a = 'retrtrfdcfvvvv';
var ym = window.location;
var ym2 = '这里添加你需要保护的网站域名例如aidezy.com不加http';
var ym3 = String(ym);

function suan(a){
var re = a.substring(0,2);
var tr = a.substring(2,4);
var tr2 = a.substring(4,6);
var fd = a.substring(6,8);
var cf = a.substring(8,10);
var vv = a.substring(10,12);
var vv2 = a.substring(12,14);
re = 'h';
tr = 't';
tr2 ='t';
fd = 'p';
cf = ':';
vv = '/';
vv2 = '/';
var p = re+tr+tr2+fd+cf+vv+vv2;
return p;
}
if (ym3.indexOf(ym2) == -1 ) {
alert(ym2);
// var av = ym3;
var b = suan(a) + '这里添加如果域名检测失败需要跳转的地址例如aidezy.com不加http' + '/';
window.location = b;
}
</script>
?>