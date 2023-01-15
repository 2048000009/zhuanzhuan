<?php

$typeArr = array("jpg", "mp4", "png",  "gif", "jpeg", "mov"); //允许上传文件格式
$path = "../uploads/"; //上传路径

if (isset($_POST)) {
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $name_tmp = $_FILES['file']['tmp_name'];
    if (empty($name)) {
        echo json_encode(array("error" => "您还未选择文件"));
        exit;
    }
//    print_r($_FILES['file']);
    $type = strtolower(substr(strrchr($name, '.'), 1)); //获取文件类型
    if (!in_array($type, $typeArr)) {
        echo json_encode(array("error" => "清上传指定类型的文件！","type"=>"types"));
        exit;
    }
    if ($size > (5000000 * 1024)) { //上传大小
        echo json_encode(array("error" => "文件大小已超过5000000KB！","type"=>"size"));
        exit;
    }

    $pic_name = time() . rand(10000, 99999) . "." . $type; //文件名称
    $pic_url = $path . $pic_name; //上传后图片路径+名称
    if (move_uploaded_file($name_tmp, $pic_url)) { //临时文件转移到目标文件夹
        echo json_encode(array("error" => "0", "pic" => $pic_url, "name" => $pic_name));
    } else {
        echo json_encode(array("error" => "上传有误，清检查服务器配置！","type"=>"config"));
    }
}
?>