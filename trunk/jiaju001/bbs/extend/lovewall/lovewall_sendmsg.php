<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if(!$discuz_user) {
	showmessage('not_loggedin');
}
//����û��Ƿ����������
if($lovealltotal > 0) {
	$query = $db->query("select COUNT(*) from `".$tablepre."lovewall` where `uid`='$discuz_uid'");
	$bodycount = $db->result($query, 0);
	if($bodycount >= $lovealltotal) {
		showmessage("��������ף���Ѿ�����&nbsp;$lovealltotal&nbsp;�������������ԣ�","lovewall.php");
	}
}
if($lovedaytotal > 0) {
	$begintime = $timestamp - 86400;
	$query = $db->query("select COUNT(*) from `".$tablepre."lovewall` where `uid`='$discuz_uid' and `lovetime`>'$begintime'");
	$daycount = $db->result($query, 0);
	if($daycount >= $lovedaytotal) {
		showmessage("�������24Сʱ�ڷ�����ף���Ѿ�����&nbsp;$lovedaytotal&nbsp;�������������ԣ�","lovewall.php");
	}
}
##�ж��û��Ļ����Ƿ���
if($adminid != 1) {
	$moneytran = $lovenum;
	$query = $db->query("SELECT $lovenum FROM `".$tablepre."members` WHERE `uid`='$discuz_uid'");
	$fduser=$db->fetch_array($query);
	if($fduser[$lovenum] < $lovemoney) {
		showmessage("�Բ����ڰ�ǽÿ����һ��ף��ֽ����Ҫ$lovemoney $credits_name ������ֻ��$fduser[$lovenum] $credits_name ������޷�����ף��ֽ�������ȷ��ط���׬ȡ��ҡ�","lovewall.php");
	}
}
//$lovewidth="100%";
//������Ϣ���
if($MyMessage) {
	$dir = DISCUZ_ROOT.'./extend/lovewall/cache_lovewall.php';
	if(file_exists($dir)) {
		@require_once $dir;
	}
	//��Ǯ
	$query = $db->query("UPDATE `".$tablepre."members` SET {$lovenum}={$lovenum}-{$lovemoney} WHERE `uid`='$discuz_uid'");
	//�����������ɫ����
	$backcolor = "f";
	for($i=0;$i<5;$i++) {
		$nmsg=dechex(rand(0,15));
		$backcolor .= $nmsg;
	}
	//���Ե�����
	$posleft = rand($loveltxmin, $loveltxmax);
	$postop = rand($loveltymin, $loveltymax);
	$db->query("INSERT INTO `".$tablepre."lovewall` (`lovesay`, `uid`, `uname`, `backcolor`, 
		`postop`, `posleft`, `lovetime`, `nickname`, `mysign`, `colorid`, `moodid`)
		VALUES ('$MyMessage', '$discuz_uid', '$discuz_user', '$backcolor', '$postop', '$posleft', 
		'$timestamp', '$recvnick', '$nick', '$scolor', '$smood')");
	$loveid = $db->insert_id();
	##���û�������Ϣ��֪ͨ�䰮ǽ��
	$subject = "���ڰ�ǽ����ף���ĺ���";
	$message = "���ã����ڰ�ǽ������ף���Ѿ���ɣ�������ף�����룬���ס���Ա��ڲ�ѯ��\r\nף�����룺".$loveid;
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
	//����LOVEID����
	$loveid_cache = loveidcache();
	if($lovecache == 1) {
		$page = $lovek;
		lovecache();
	}
	$tipsa = '���ڰ�ǽ������ף�������Ѿ����������ռ��䣬��ע�����';
	$tipsb = $loveokmsg ? $loveokmsg : "���ڰ�ǽ������Ϣ�ɹ�";
	$lovesay_send_succeed = $lovepmswitch ? $tipsa : $tipsb;
	showmessage("$lovesay_send_succeed", 'lovewall.php');
} else {
	require_once DISCUZ_ROOT.'./forumdata/cache/cache_post.php';
}
$navigation.= " &raquo; <a href=\"lovewall.php\">$lovetitle</a> &raquo; �µ�����";
?>