<?
require_once './include/common.inc.php';

$discuz_action = 209;
include DISCUZ_ROOT.'./forumdata/cache/plugin_lovewall.php';
require_once DISCUZ_ROOT.'./forumdata/cache/cache_viewthread.php';
require_once DISCUZ_ROOT.'./include/discuzcode.func.php';

//对数组序列化
function arrayeval($array, $level = 0) {
	$space = '';
	for($i = 0; $i <= $level; $i++) {
		$space .= "\t";
	}
	$evaluate = "Array\n$space(\n";
	$comma = $space;
	foreach($array as $key => $val) {
		$key = is_string($key) ? '\''.addcslashes($key, '\'\\').'\'' : $key;
		$val = !is_array($val) && (!preg_match("/^\-?[1-9]\d*$/", $val) || strlen($val) > 12) ? '\''.addcslashes($val, '\'\\').'\'' : $val;
		if(is_array($val)) {
			$evaluate .= "$comma$key => ".arrayeval($val, $level + 1);
		} else {
			$evaluate .= "$comma$key => $val";
		}
		$comma = ",\n$space";
	}
	$evaluate .= "\n$space)";
	return $evaluate;
}

@extract($_DPLUGIN['lovewall']['vars'], EXTR_OVERWRITE);
if($loveswitch == 0 && $adminid != 1) showmessage($loveclosemsg, NULL);
//缓存LOVEID
$loveid_dir = DISCUZ_ROOT."./extend/lovewall/cache/cache_lovewall_id.php";
if(file_exists($loveid_dir)) {
	@require_once $loveid_dir;
} else {
	$loveid_cache = loveidcache();
}

switch($index)
{
	case 'somsg':
		include_once DISCUZ_ROOT.'./extend/lovewall/lovewall_somsg.php';
	break;
	case 'sendmsg':
		include_once DISCUZ_ROOT.'./extend/lovewall/lovewall_sendmsg.php';
	break;
	case 'listmsg':
		if($adminid != 1) {
			showmessage("对不起，您的权限不够，请用管理员帐号登陆");
		}
		include_once DISCUZ_ROOT.'./extend/lovewall/lovewall_listmsg.php';
	break;
	case 'cache':
		if($adminid != 1) {
			showmessage("对不起，您的权限不够，请用管理员帐号登陆");
		}
		if(!$idover) {
			loveidcache();
		}
		$page = empty($page) || !intval($page) ? 1 : $page;
		lovecache();
		$page++;
		if($lovek < $page) {
			showmessage("所有缓存文件更新成功", 'lovewall.php');
		} else {
			header("Location: lovewall.php?index=cache&idover=1&page=$page");
		}
	break;
	case 'checkpos':
		$query = $db->query("select `postop`, `posleft`, `id` from `".$tablepre."lovewall`");
		while($row = $db->fetch_array($query)) {
			$change = '';
			$x = $row['posleft'] < $loveltxmin ? $loveltxmin : ($row['posleft'] > $loveltxmax ? $loveltxmax : $row['posleft']);
			$y = $row['postop'] < $loveltymin ? $loveltymin : ($row['postop'] > $loveltymax ? $loveltymax : $row['postop']);
			$change = $x == $row['posleft'] ? '' : "`posleft`='$x'";
			$change.= $y == $row['postop'] ? '' : ($change ? ",`postop`='$y'" : "`postop`='$y'");
			if($change) {
				$db->query("update `".$tablepre."lovewall` set $change where `id`='$row[id]'");
			}
		}
		for($i=1; $i<$lovek; $i++) {
			@unlink(DISCUZ_ROOT."./extend/lovewall/cache/cache_lovewall_$i.php");
		}
		showmessage("纸条坐标修复成功", "lovewall.php?index=cache");
	break;
	case 'position':
		$backcolor = "f";
		for($i=0;$i<5;$i++) {
			$nmsg=dechex(rand(0,15));
			$backcolor .= $nmsg;
		}
		$curtime = gmdate("$dateformat $timeformat", $timestamp + 3600 * $timeoffset);
		$lovewall[] = array('id' => '1', 'posleft' => $loveltxmin, 'postop' => $loveltymin, 
			'lovetime' => $curtime,	'uname' => 'admin', 'colorid' => "0", 'moodid' => "0");
		$lovewall[] = array('id' => '2', 'posleft' => $loveltxmin, 'postop' => $loveltymax, 
			'lovetime' => $curtime,	'uname' => 'admin', 'colorid' => "1", 'moodid' => "1");
		$lovewall[] = array('id' => '3', 'posleft' => $loveltxmax, 'postop' => $loveltymin, 
			'lovetime' => $curtime,	'uname' => 'admin', 'colorid' => "2", 'moodid' => "2");
		$lovewall[] = array('id' => '4', 'posleft' => $loveltxmax, 'postop' => $loveltymax, 
			'lovetime' => $curtime,	'uname' => 'admin', 'colorid' => "3", 'moodid' => "3");
		$navigation.= " &raquo; <a href=\"lovewall.php\">$lovetitle</a> &raquo; 四角边界测试";
	break;
	default:
		include_once DISCUZ_ROOT.'./extend/lovewall/lovewall_default.php';
	break;
}
function loveidcache() {
	global $db, $tablepre, $lovek, $lovepage;
	$tpp = $lovepage ? $lovepage : 800;
	$query = $db->query("select `id` FROM `".$tablepre."lovewall` ORDER BY `id` asc");
	$k = 1;
	$i = 0;
	while($rowlove = $db->fetch_array($query)) {
		if($i && $i % $tpp == 0) $k++;
		$lovewallid[$rowlove['id']] = $k;
		$i++;
	}
	$lovek = $k;
	$filepath = DISCUZ_ROOT."./extend/lovewall/cache/cache_lovewall_id.php";
	$love_data = $lovewallid ? "\$loveid_cache = ".arrayeval($lovewallid).";\n\n\$lovek = $lovek;\n\n" : "";
	if(@$fp = fopen($filepath, 'w')) {
		fwrite($fp, "<?php\n//Discuz! cache file, DO NOT modify me!\n"."//Created on ".date("M j, Y, G:i")."\n\n$love_data?>");
		fclose($fp);
	} else {
		dexit('Can not write to cache files, please check directory ./extend/lovewall/cache/ .');
	}
	
	return $lovewallid;
}
//读取用户留言
function lovecache() {
	global $db, $tablepre, $lovecache, $smileyoff, $maxsmilies, $page, $lovepage, $dateformat, $timeformat, $timeoffset;
	
	$tpp = $lovepage ? $lovepage : 800;
	$start_limit = ($page - 1) * $tpp;
	$query = $db->query("select * FROM `".$tablepre."lovewall` ORDER BY `id` asc 
		limit $start_limit,$tpp");
	while($rowlove = $db->fetch_array($query)) {
		$temptime = $rowlove['lovetime'];
		$rowlove['lovetime']= gmdate("$dateformat $timeformat", $temptime + 3600 * $timeoffset);
		$rowlove['lovesay']	= dhtmlspecialchars($rowlove['lovesay']);
		$rowlove['lovesay']	= str_replace(array("'", '"'), array("\'", "\""), $rowlove['lovesay']);
		$rowlove['lovesay'] = nl2br(str_replace(array("\t", '   ', '  ', "\r\n"), array('&nbsp; &nbsp; &nbsp; &nbsp; ', '&nbsp; &nbsp;', '&nbsp;&nbsp;', '<br>'), $rowlove['lovesay']));
		$rowlove['colorid'] = $rowlove['colorid'] ? $rowlove['colorid'] : mt_rand(0, 5);
		$rowlove['moodid'] = $rowlove['moodid'] ? $rowlove['moodid'] : mt_rand(0, 15);
		if($rowlove['mysign'] == "匿名" or $rowlove['mysign'] == "") {
			$rowlove['mysign'] = str_replace(array("'", '"'), array("\'", "\""), dhtmlspecialchars($rowlove['uname']));
		} else {
			$rowlove['mysign'] = str_replace(array("'", '"'), array("\'", "\""), dhtmlspecialchars($rowlove['mysign']));
		}
		$rowlove['nickname'] = str_replace(array("'", '"'), array("\'", "\""), dhtmlspecialchars($rowlove['nickname']));
		if(!$smileyoff && !empty($GLOBALS['_DCACHE']['smilies']) && is_array($GLOBALS['_DCACHE']['smilies'])) {
			$rowlove['lovesay'] = preg_replace($GLOBALS['_DCACHE']['smilies']['searcharray'], $GLOBALS['_DCACHE']['smilies']['replacearray'], $rowlove['lovesay'], $maxsmilies);
		}
		$rowlove['lovesay']		= str_replace('\&quot;', '&quot;', $rowlove['lovesay']);
		unset($rowlove['uid']);
		unset($rowlove['uname']);
		$lovewall[$rowlove[id]]	= $rowlove;
	}
	
	if($lovecache == 1) {
		$filepath = DISCUZ_ROOT."./extend/lovewall/cache/cache_lovewall_$page.php";
		$love_data = $lovewall ? "\$love_cache = ".arrayeval($lovewall).";\n\n" : "";
		if(@$fp = fopen($filepath, 'w')) {
			fwrite($fp, "<?php\n//Discuz! cache file, DO NOT modify me!\n"."//Created on ".date("M j, Y, G:i")."\n\n$love_data?>");
			fclose($fp);
		} else {
			dexit('Can not write to cache files, please check directory ./extend/lovewall/cache/ .');
		}
	}
	return $lovewall;
}

$navtitle.= $lovetitle;

include template('extend_lovewall');
?>