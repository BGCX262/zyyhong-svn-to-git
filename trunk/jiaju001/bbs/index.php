<?php

/*
	[Discuz!] (C)2001-2007 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: index.php 10486 2007-09-03 06:53:29Z liuqiang $
*/

define('CURSCRIPT', 'index');

require_once './include/common.inc.php';
require_once DISCUZ_ROOT.'./include/forum.func.php';

$discuz_action = 1;

//虚拟在线会员+游客 START

$virtualhack = '0';                 // 1=开 0=关

if($virtualhack=='1') {

    $mintime = 100;                // 在线的最小值(秒)
    $maxtime = 600;                // 在线的最大值(秒)
    $dis_time = 610;               // 超过dis_time(秒)删除

    $current_user = 200;             // 当前用户少于10，就执行虚拟用户

    $min_user = 50;                // 设定想增加多少会员的最小值
    $max_user = 100;                // 设定想增加多少会员的最大值

    $min_guest = 10;                // 设定想增加多少访客的最小值
    $max_guest = 500;                // 设定想增加多少访客的最大值

    $start_uid = 3;             //  起始会员UID
    $end_uid = 5000;            //  结束会员UID
    
    $action_arr = array("0","0","1","1","2","191","1","2","2","2","31","51"); //设定虚拟用户允许动作

    $current = time();
    $current_different = $current - $dis_time;

    $db -> query("DELETE FROM {$tablepre}sessions WHERE ip1='000' AND lastactivity <='$current_different'");

    $query = $db -> query("SELECT COUNT(*) FROM {$tablepre}sessions ");
    $onlineuser = $db -> result($query, 0);

    if($onlineuser <= $current_user ) {

        $randguest = mt_rand($min_guest, $max_guest); //游客
        $randuser = mt_rand($min_user, $max_user);    //会员

        $query = $db -> query("SELECT fid FROM {$tablepre}forums WHERE type = 'forum'");
        while($fidresult = $db -> fetch_array($query)) {
            $fidscope[] = $fidresult['fid']; 
        }

//  随机插入在线会员
        for($i = 1; $i <= $randuser; $i++) {

            $randtime = mt_rand($mintime, $maxtime);
            $onlinetime = $current - $randtime;

            $randaction = mt_rand(0, count($action_arr));
            $onlineaction = $action_arr[$randaction];

            $onlinefid = 0;
            if($onlineaction == '2') {
                $randfid = mt_rand(0, count($fidscope));
                $onlinefid = $fidscope[$randfid];
            }
            $online_sid = random(6);   
            

            $rand_uid = mt_rand($start_uid, $end_uid);
            $query = $db -> query("SELECT `uid`,`username` FROM {$tablepre}members WHERE `uid` = '$rand_uid'");
            while($row = $db -> fetch_array($query)){
                $db -> query("INSERT INTO {$tablepre}sessions (sid,ip1, groupid, styleid, lastactivity, action, fid, uid, username ) 
                VALUES ('$online_sid','000' ,'10', '1','$onlinetime','$onlineaction','$onlinefid','$row[uid]','$row[username]')"); 
            }
        }

//  随机插入在线游客
        for($i = 1; $i <= $randguest; $i++) {
            $randtime = mt_rand($mintime, $maxtime);
            $onlinetime = $current - $randtime;

            $randaction = mt_rand(0,count($action_arr));
            $onlineaction = $action_arr[$randaction];

            $onlinefid = 0;
            if($onlineaction == '2') {
                $randfid = mt_rand(0,count($fidscope));
                $onlinefid = $fidscope[$randfid];
            }
            $online_sid = random(6); 
            $db -> query("INSERT INTO {$tablepre}sessions (sid,ip1, groupid, styleid, lastactivity, action, fid ) 
                VALUES ('$online_sid','000' ,'7', '1','$onlinetime','$onlineaction','$onlinefid')"); 
        }


    }
}

//虚拟在线会员+游客 END


if($cacheindexlife && !$discuz_uid && $showoldetails != 'yes' && (!$_DCACHE['settings']['frameon'] || $_DCACHE['settings']['frameon'] && $_GET['frameon'] != 'yes') && empty($gid)) {

	$indexcache = getcacheinfo(0);

	if($timestamp - $indexcache['filemtime'] > $cacheindexlife) {
		@unlink($indexcache['filename']);
		define('CACHE_FILE', $indexcache['filename']);
		$styleid = $_DCACHE['settings']['styleid'];
	} elseif($indexcache['filename']) {
		@readfile($indexcache['filename']);
		$debug && debuginfo();
		die('<script type="text/javascript">document.getElementById("debuginfo").innerHTML = " '.($debug ? 'Update at '.gmdate("H:i:s", $indexcache['filemtime'] + 3600 * 8).', Processed in '.$debuginfo['time'].' second(s), '.$debuginfo['queries'].' Queries'.($gzipcompress ? ', Gzip enabled' : '') : '').'";</script>');
	}
}

$validdays = $discuz_uid && !empty($groupexpiry) && $groupexpiry >= $timestamp ? ceil(($groupexpiry - $timestamp) / 86400) : 0;
if(isset($showoldetails)) {
	switch($showoldetails) {
		case 'no': dsetcookie('onlineindex', 0, 86400 * 365); break;
		case 'yes': dsetcookie('onlineindex', 1, 86400 * 365); break;
	}
} else {
	$showoldetails = false;
}

$currenttime = gmdate($timeformat, $timestamp + $timeoffset * 3600);
$lastvisittime = gmdate("$dateformat $timeformat", $lastvisit + $timeoffset * 3600);

$memberenc = rawurlencode($lastmember);
$newthreads = round(($timestamp - $lastvisit + 600) / 1000) * 1000;
$rsshead = $rssstatus ? ('<link rel="alternate" type="application/rss+xml" title="'.$bbname.'" href="'.$boardurl.'rss.php?auth='.$rssauth."\" />\n") : '';
$customtopics = '';
if($qihoo['maxtopics']) {
	foreach(explode("\t", isset($_DCOOKIE['customkw']) ? $_DCOOKIE['customkw'] : '') as $topic) {
		$topic = dhtmlspecialchars(trim(stripslashes($topic)));
		$customtopics .= '<a href="topic.php?keyword='.rawurlencode($topic).'" target="_blank">'.$topic.'</a> &nbsp;';
	}
}
$supeitemsstatus = $supe['status'] && $supe['items']['status'] && $_DCACHE['supe_updateitems'];
$hottagstatus = $tagstatus && $hottags && $_DCACHE['tags'];

$catlist = $forumlist = $sublist = $pmlist = array();
$threads = $posts = $todayposts = $fids = $announcepm = 0;
$postdata = $historyposts ? explode("\t", $historyposts) : array();

foreach(array('forumlinks', 'birthdays', 'supe_updateusers') as $key) {
	if(!isset($_COOKIE['discuz_collapse']) || strpos($_COOKIE['discuz_collapse'], $key) === FALSE) {
		$collapseimg[$key] = 'collapsed_no.gif';
		$collapse[$key] = '';
	} else {
		$collapseimg[$key] = 'collapsed_yes.gif';
		$collapse[$key] = 'display: none';
	}
}

$gid = !empty($gid) ? intval($gid) : 0;
$areaid = !empty($areaid) ? intval($areaid) : 1;
if(!$gid) {
	$announcements = '';
	if($_DCACHE['announcements']) {
		$readapmids = !empty($_DCOOKIE['readapmid']) ? explode('D', $_DCOOKIE['readapmid']) : array();
		foreach($_DCACHE['announcements'] as $announcement) {
			if(empty($announcement['groups']) || in_array($groupid, $announcement['groups'])) {
				if(empty($announcement['type'])) {
					$announcements .= '<li><a href="announcement.php?id='.$announcement['id'].'#'.$announcement['id'].'">'.$announcement['subject'].
						'<em>('.gmdate($dateformat, $announcement['starttime'] + $timeoffset * 3600).')</em></a></li>';
				} elseif($announcement['type'] == 1) {
					$announcements .= '<li><a href="'.$announcement['message'].'" target="_blank">'.$announcement['subject'].
						'<em>('.gmdate($dateformat, $announcement['starttime'] + $timeoffset * 3600).')</em></a></li>';
				} elseif($discuz_uid && $announcement['type'] == 2 && !in_array($announcement['pmid'], $readapmids)) {
					$announcement['announce'] = TRUE;
					$pmlist[] = $announcement;
					$announcepm++;
				}
			}
		}
	}
	unset($_DCACHE['announcements']);

	$sql = !empty($accessmasks) ?
       "SELECT f.fid, f.fup, f.type, f.name, f.threads, f.posts, f.todayposts, f.lastpost, f.inheritedmod, f.forumcolumns, f.simple, ff.description, ff.moderators, ff.icon, ff.viewperm, a.allowview FROM {$tablepre}forums f
         LEFT JOIN {$tablepre}forumfields ff ON ff.fid=f.fid
         LEFT JOIN {$tablepre}access a ON a.uid='$discuz_uid' AND a.fid=f.fid
         WHERE f.status>0 AND f.areaid='$areaid' OR f.areaid='999' ORDER BY f.type, f.displayorder"
       : "SELECT f.fid, f.fup, f.type, f.name, f.threads, f.posts, f.todayposts, f.lastpost, f.inheritedmod, f.forumcolumns, f.simple, ff.description, ff.moderators, ff.icon, ff.viewperm FROM {$tablepre}forums f
         LEFT JOIN {$tablepre}forumfields ff USING(fid)
         WHERE f.status>0 AND f.areaid='$areaid' OR f.areaid='999' ORDER BY f.type, f.displayorder";

	$query = $db->query($sql);

	while($forum = $db->fetch_array($query)) {
		$forumname[$forum['fid']] = strip_tags($forum['name']);
		if($forum['type'] != 'group') {
			$threads += $forum['threads'];
			$posts += $forum['posts'];
			$todayposts += $forum['todayposts'];

			if($forum['type'] == 'forum') {

				if(forum($forum)) {
					$catlist[$forum['fup']]['forums'][] = $forum['fid'];
					$forum['orderid'] = $catlist[$forum['fup']]['forumscount']++;
					$forum['subforums'] = '';
					$forumlist[$forum['fid']] = $forum;
				}

			} elseif(isset($forumlist[$forum['fup']])) {

				$forumlist[$forum['fup']]['threads'] += $forum['threads'];
				$forumlist[$forum['fup']]['posts'] += $forum['posts'];
				$forumlist[$forum['fup']]['todayposts'] += $forum['todayposts'];
				if($subforumsindex && $forumlist[$forum['fup']]['permission'] == 2 && !($forumlist[$forum['fup']]['simple'] & 16) || ($forumlist[$forum['fup']]['simple'] & 8)) {
					$forumlist[$forum['fup']]['subforums'] .= '<a href="forumdisplay.php?fid='.$forum['fid'].'">'.$forum['name'].'</a>&nbsp;&nbsp;';
				}

			}

		} else {

			if(!isset($_COOKIE['discuz_collapse']) || strpos($_COOKIE['discuz_collapse'], 'category_'.$forum['fid']) === FALSE) {
				$forum['collapseimg'] = 'collapsed_no.gif';
				$collapse['category_'.$forum['fid']] = '';
			} else {
				$forum['collapseimg'] = 'collapsed_yes.gif';
				$collapse['category_'.$forum['fid']] = 'display: none';
			}

			if($forum['moderators']) {
			 	$forum['moderators'] = moddisplay($forum['moderators'], 'flat');
			}
			$forum['forumscount'] 	= 0;
			$catlist[$forum['fid']] = $forum;
		}
	}

	foreach($catlist as  $catid => $category) {
		if($catlist[$catid]['forumscount'] && $category['forumcolumns']) {
			$catlist[$catid]['forumcolwidth'] = floor(100 / $category['forumcolumns']).'%';
			$catlist[$catid]['endrows'] = '';
			if($colspan = $category['forumscount'] % $category['forumcolumns']) {
				while(($category['forumcolumns'] - $colspan) > 0) {
					$catlist[$catid]['endrows'] .= '<td>&nbsp;</td>';
					$colspan ++;
				}
				$catlist[$catid]['endrows'] .= '</tr>';
			}

		} elseif(empty($category['forumscount'])) {
			unset($catlist[$catid]);
		}
	}

	if(isset($catlist[0]) && $catlist[0]['forumscount']) {
		$catlist[0]['fid'] = 0;
		$catlist[0]['type'] = 'group';
		$catlist[0]['name'] = $bbname;
		$catlist[0]['collapseimg'] = 'collapsed_no.gif';
	} else {
		unset($catlist[0]);
	}

	if($whosonlinestatus == 1 || $whosonlinestatus == 3) {
		$whosonlinestatus = 1;

		$onlineinfo = explode("\t", $onlinerecord);
		if(empty($_DCOOKIE['onlineusernum'])) {
			$onlinenum = $db->result($db->query("SELECT COUNT(*) FROM {$tablepre}sessions"), 0);
			if($onlinenum > $onlineinfo[0]) {
				$_DCACHE['settings']['onlinerecord'] = $onlinerecord = "$onlinenum\t$timestamp";
				$db->query("UPDATE {$tablepre}settings SET value='$onlinerecord' WHERE variable='onlinerecord'");
				require_once DISCUZ_ROOT.'./include/cache.func.php';
				updatesettings();
				$onlineinfo = array($onlinenum, $timestamp);
			}
			dsetcookie('onlineusernum', intval($onlinenum), 300);
		} else {
			$onlinenum = intval($_DCOOKIE['onlineusernum']);
		}
		$onlineinfo[1] = gmdate($dateformat, $onlineinfo[1] + ($timeoffset * 3600));

		$detailstatus = $showoldetails == 'yes' || (((!isset($_DCOOKIE['onlineindex']) && !$whosonline_contract) || $_DCOOKIE['onlineindex']) && $onlinenum < 500 && !$showoldetails);

		if($detailstatus) {
			@include language('actions');

			$discuz_uid && updatesession();
			$membercount = $invisiblecount = 0;
			$whosonline = array();

			$maxonlinelist = $maxonlinelist ? $maxonlinelist : 500;

			$query = $db->query("SELECT uid, username, groupid, invisible, action, lastactivity, fid FROM {$tablepre}sessions ".(isset($_DCACHE['onlinelist'][7]) ? '' : 'WHERE uid <> 0')." ORDER BY uid DESC LIMIT ".$maxonlinelist);
			while($online = $db->fetch_array($query)) {
				if($online['uid']) {
					$membercount ++;
					if($online['invisible']) {
						$invisiblecount++;
						continue;
					} else {
						$online['icon'] = isset($_DCACHE['onlinelist'][$online['groupid']]) ? $_DCACHE['onlinelist'][$online['groupid']] : $_DCACHE['onlinelist'][0];
					}

				} else {
					$online['icon'] = $_DCACHE['onlinelist'][7];
					$online['username'] = $_DCACHE['onlinelist']['guest'];
				}

				$online['fid'] = $online['fid'] ? $forumname[$online['fid']] : 0;
				$online['action'] = $actioncode[$online['action']];
				$online['lastactivity'] = gmdate($timeformat, $online['lastactivity'] + ($timeoffset * 3600));
				$whosonline[] = $online;
			}

			if($onlinenum > $maxonlinelist) {
				$membercount = $db->result($db->query("SELECT COUNT(*) FROM {$tablepre}sessions WHERE uid <> '0'"), 0);
				$invisiblecount = $db->result($db->query("SELECT COUNT(*) FROM {$tablepre}sessions WHERE invisible = '1'"), 0);
			}

			if($onlinenum < $membercount) {
				$onlinenum = $db->result($db->query("SELECT COUNT(*) FROM {$tablepre}sessions"), 0);
				dsetcookie('onlineusernum', intval($onlinenum), 300);
			}

			$guestcount = $onlinenum - $membercount;

			$db->free_result($query);
			unset($online);
		}

	} else {
		$whosonlinestatus = 0;
	}

	if($discuz_uid && $newpm) {
		require_once DISCUZ_ROOT.'./include/pmprompt.inc.php';
	}

} else {
	require_once DISCUZ_ROOT.'./include/category.inc.php';

}

if($areaid==2){
$siteurl='http://shy.jiaju001.com';
}else{
$siteurl='http://www.jiaju001.com';
}
include template('discuz');

?>
