<?php 
require_once './include/config.inc.php';
!$id && exit("ID丢失");
!$odiyname && exit("下载资料请先登录或注册");
$shop=$db->get_one("select * from odiy_shops where shopid='$id'");
header("Location: ".$shop['path'].""); 
?>