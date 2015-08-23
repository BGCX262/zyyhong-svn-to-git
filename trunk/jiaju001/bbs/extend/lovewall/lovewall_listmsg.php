<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if($adminid != 1) {
	showmessage("您无此权限，请用管理员帐号登陆。");
}

if($operation) {
	##给用户发短信息，通知其爱墙号被删
	$query = $db->query("SELECT `uid`, `id` FROM `".$tablepre."lovewall` WHERE `id` IN ('".implode('\',\'', $moderate)."')");
	while($delrow = $db->fetch_array($query)) {
		$duid = $delrow['uid'];
		$subject = "被删除祝福的号码";
		$message = "您好，您在爱墙发布的祝福因为违规已经被删除。\r\n被删除的祝福号码：".$delrow['id'];
		$fromid = $lovepmid ? $lovepmid : 0;
		$from = $lovepmname ? $lovepmname : $bbname;
		sendpm($duid, $subject, $message, $fromid, $from);
	}
	
	$db->query("DELETE FROM `".$tablepre."lovewall` WHERE `id` IN ('".implode('\',\'', $moderate)."')");
	loveidcache();
	for($i=1; $i<$lovek; $i++) {
		@unlink(DISCUZ_ROOT."./extend/lovewall/cache_lovewall_$i.php");
	}
}

$tpp = 25;
$page = empty($page) || !intval($page) ? 1 : $page;
$start_limit = ($page - 1) * $tpp;
$query = $db->query("select COUNT(*) from `".$tablepre."lovewall`");
$qcount = $db->result($query, 0);
$multipage = multi($qcount, $tpp, $page, "lovewall.php?index=listmsg", $threadmaxpages);

$query = $db->query("select * FROM `".$tablepre."lovewall` ORDER BY `id` desc limit $start_limit,$tpp");
while($rowlove = $db->fetch_array($query)) {
	$rowlove['lovetime'] = gmdate("$dateformat $timeformat", $rowlove['lovetime'] + 3600 * $timeoffset);
	$rowlove['lovesay'] = dhtmlspecialchars($rowlove['lovesay']);
	$rowlove['lovesay'] = nl2br(str_replace(array("\t", '   ', '  ', "\r\n"), array('&nbsp; &nbsp; &nbsp; &nbsp; ', '&nbsp; &nbsp;', '&nbsp;&nbsp;', '<br>'), $rowlove['lovesay']));
	
	if(!$smileyoff && !empty($GLOBALS['_DCACHE']['smilies']) && is_array($GLOBALS['_DCACHE']['smilies'])) {
		$rowlove['lovesay'] = preg_replace($GLOBALS['_DCACHE']['smilies']['searcharray'], $GLOBALS['_DCACHE']['smilies']['replacearray'], $rowlove['lovesay'], $maxsmilies);
	}
	$rowlove['lovesay'] = str_replace('\&quot;', '&quot;', $rowlove['lovesay']);
	$lovewall[$rowlove[id]]	= $rowlove;
}
$navigation.= " &raquo; <a href=\"lovewall.php\">$lovetitle</a> &raquo; 爱墙信息管理";
?>