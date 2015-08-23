<?php
if(!defined('IN_DISCUZ')) exit('Access Denied');

if(!$discuz_user) {
	showmessage('not_loggedin');
}
//搜索看是否有记录
if(!$loveid_cache[$massages]) {
	showmessage("没有找到该纸条，可能已被删除或是输入不正确，请返回！","lovewall.php");
}

$page = $loveid_cache[$massages];
$dir = DISCUZ_ROOT."./extend/lovewall/cache_lovewall_$page.php";
if(file_exists($dir)) @require_once $dir;

if(is_array($love_cache) && $lovecache == 1) {
	$lovewall = $love_cache;
} else {
	$lovewall = lovecache();
}

/*$lovewall[$massages]['show'] = 'f';
$cursearch	= $lovewall[$massages];
$layerid	= 999999;*/

$page = $lovek + 1 - $page;
$multipage = multi($lovek, 1, $page, "lovewall.php", $threadmaxpages);
?>