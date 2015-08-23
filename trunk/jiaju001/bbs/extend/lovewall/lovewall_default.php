<?php
if(!defined('IN_DISCUZ')) exit('Access Denied');

$multipage = multi($lovek, 1, $page, "lovewall.php", $threadmaxpages);
$page = empty($page) || !intval($page) ? 1 : $page;
$page = $lovek + 1 - $page;
if($page < 1) {
	$page = 1;
}

$dir = DISCUZ_ROOT."./extend/lovewall/cache/cache_lovewall_$page.php";
if(file_exists($dir)) {
	@require_once $dir;
}

if(is_array($love_cache) && $lovecache == 1) {
	$lovewall = $love_cache;
} else {
	$lovewall = lovecache();
}
$navigation.= " &raquo; $lovetitle";
?>