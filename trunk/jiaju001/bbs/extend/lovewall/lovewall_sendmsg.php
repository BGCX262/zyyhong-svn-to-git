<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if(!$discuz_user) {
	showmessage('not_loggedin');
}
//检测用户是否可以再留言
if($lovealltotal > 0) {
	$query = $db->query("select COUNT(*) from `".$tablepre."lovewall` where `uid`='$discuz_uid'");
	$bodycount = $db->result($query, 0);
	if($bodycount >= $lovealltotal) {
		showmessage("您发布的祝福已经超过&nbsp;$lovealltotal&nbsp;条，不能再留言！","lovewall.php");
	}
}
if($lovedaytotal > 0) {
	$begintime = $timestamp - 86400;
	$query = $db->query("select COUNT(*) from `".$tablepre."lovewall` where `uid`='$discuz_uid' and `lovetime`>'$begintime'");
	$daycount = $db->result($query, 0);
	if($daycount >= $lovedaytotal) {
		showmessage("您在最近24小时内发布的祝福已经超过&nbsp;$lovedaytotal&nbsp;条，不能再留言！","lovewall.php");
	}
}
##判断用户的积分是否够用
if($adminid != 1) {
	$moneytran = $lovenum;
	$query = $db->query("SELECT $lovenum FROM `".$tablepre."members` WHERE `uid`='$discuz_uid'");
	$fduser=$db->fetch_array($query);
	if($fduser[$lovenum] < $lovemoney) {
		showmessage("对不起，在爱墙每发布一条祝福纸条需要$lovemoney $credits_name ，而您只有$fduser[$lovenum] $credits_name ，因此无法发布祝福纸条，请先返回发帖赚取瑞币。","lovewall.php");
	}
}
//$lovewidth="100%";
//留言信息入库
if($MyMessage) {
	$dir = DISCUZ_ROOT.'./extend/lovewall/cache_lovewall.php';
	if(file_exists($dir)) {
		@require_once $dir;
	}
	//扣钱
	$query = $db->query("UPDATE `".$tablepre."members` SET {$lovenum}={$lovenum}-{$lovemoney} WHERE `uid`='$discuz_uid'");
	//生成随机的颜色代码
	$backcolor = "f";
	for($i=0;$i<5;$i++) {
		$nmsg=dechex(rand(0,15));
		$backcolor .= $nmsg;
	}
	//留言的坐标
	$posleft = rand($loveltxmin, $loveltxmax);
	$postop = rand($loveltymin, $loveltymax);
	$db->query("INSERT INTO `".$tablepre."lovewall` (`lovesay`, `uid`, `uname`, `backcolor`, 
		`postop`, `posleft`, `lovetime`, `nickname`, `mysign`, `colorid`, `moodid`)
		VALUES ('$MyMessage', '$discuz_uid', '$discuz_user', '$backcolor', '$postop', '$posleft', 
		'$timestamp', '$recvnick', '$nick', '$scolor', '$smood')");
	$loveid = $db->insert_id();
	##给用户发短信息，通知其爱墙号
	$subject = "您在爱墙发布祝福的号码";
	$message = "您好，您在爱墙发布的祝福已经完成，下面是祝福号码，请记住，以便于查询。\r\n祝福号码：".$loveid;
	$message = $lovepmswitch ? $message : $loveokmsg;
	$fromid = $lovepmid ? $lovepmid : 0;
	$from = $lovepmname ? $lovepmname : $bbname;
	if($lovepmswitch) {
		sendpm($discuz_uid, $subject, $message, $fromid, $from);
	}
	if($lovemailswitch) {
		$mailsend = 1;
		$mailfrom = $lovemail ? $lovemail : $adminemail;
		$query = $db->query("select email from `".$tablepre."members` where `uid`='$discuz_uid'");
		$rowu = $db->fetch_array($query);
		sendmail($rowu[email], $subject, $message, $mailfrom);
	}
	$lovetime = gmdate("$dateformat $timeformat", $timestamp + 3600 * $timeoffset);
	$massages = dhtmlspecialchars($massages);
	$massages = nl2br(str_replace(array("\t", '   ', '  ', "\r\n"), array('&nbsp; &nbsp; &nbsp; &nbsp; ', '&nbsp; &nbsp;', '&nbsp;&nbsp;', '<br>'), $massages));
	if(!$smileyoff && !empty($GLOBALS['_DCACHE']['smilies']) && is_array($GLOBALS['_DCACHE']['smilies'])) {
		$massages = preg_replace($GLOBALS['_DCACHE']['smilies']['searcharray'], $GLOBALS['_DCACHE']['smilies']['replacearray'], $massages, $maxsmilies);
	}
	$massages = str_replace(array('\&quot;', "\'"), array('&quot;', "'"), $massages);
	//生成LOVEID缓存
	$loveid_cache = loveidcache();
	if($lovecache == 1) {
		$page = $lovek;
		lovecache();
	}
	$tipsa = '您在爱墙发布的祝福号码已经发到您的收件箱，请注意查收';
	$tipsb = $loveokmsg ? $loveokmsg : "您在爱墙发布信息成功";
	$lovesay_send_succeed = $lovepmswitch ? $tipsa : $tipsb;
	showmessage("$lovesay_send_succeed", 'lovewall.php');
} else {
	require_once DISCUZ_ROOT.'./forumdata/cache/cache_post.php';
}
$navigation.= " &raquo; <a href=\"lovewall.php\">$lovetitle</a> &raquo; 新的留言";
?>