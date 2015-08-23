<?php

/*
	[Discuz!] (C)2001-2007 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: index.php 16415 2008-11-02 03:27:38Z monkey $
*/

define('CURSCRIPT', 'index');

require_once './include/common.inc.php';
require_once DISCUZ_ROOT.'./include/forum.func.php';

$discuz_action = 1;

if($cacheindexlife && !$discuz_uid && $showoldetails != 'yes' && (!$_DCACHE['settings']['frameon'] || $_DCACHE['settings']['frameon'] && $_GET['frameon'] != 'yes') && empty($gid)) {

	$indexcache = getcacheinfo(0);

	if($timestamp - $indexcache['filemtime'] > $cacheindexlife) {
		@unlink($indexcache['filename']);
		define('CACHE_FILE', $indexcache['filename']);
		$styleid = $_DCACHE['settings']['styleid'];
	} elseif($indexcache['filename']) {
		@readfile($indexcache['filename']);
		$debug && debuginfo();
		$debug ? die('<script type="text/javascript">document.getElementById("debuginfo").innerHTML = " '.($debug ? 'Updated at '.gmdate("H:i:s", $indexcache['filemtime'] + 3600 * 8).', Processed in '.$debuginfo['time'].' second(s), '.$debuginfo['queries'].' Queries'.($gzipcompress ? ', Gzip enabled' : '') : '').'";</script>') : die();
	}
}


if(isset($showoldetails)) {
	switch($showoldetails) {
		case 'no': dsetcookie('onlineindex', 0, 86400 * 365); break;
		case 'yes': dsetcookie('onlineindex', 1, 86400 * 365); break;
	}
} else {
	$showoldetails = false;
}

$currenttime = gmdate($timeformat, $timestamp + $timeoffset * 3600);
$lastvisittime = dgmdate("$dateformat $timeformat", $lastvisit + $timeoffset * 3600);

$memberenc = rawurlencode($lastmember);
$newthreads = round(($timestamp - $lastvisit + 600) / 1000) * 1000;

//----首页五格代码开始
$colorarray = array('', 'red', 'orange', 'yellow', 'green', 'cyan', 'blue', 'purple', 'gray');
//新贴
$hack_cut_str = 28; //标题字数
$hack_cut_strauthor = 9;
$new_post_threadlist = array();
$nthread = array();
$query = $db->query("SELECT t.*, f.name FROM {$tablepre}threads t, {$tablepre}forums f WHERE t.fid<>'$fid' AND f.fid=t.fid AND f.fid not in (0) AND t.displayorder not in (-1,-2) ORDER BY t.dateline DESC LIMIT 0, 10");
while($nthread = $db->fetch_array($query)) {
        $nthread['forumname'] = ereg_replace('<[^>]*>','',$nthread['name']);
        $nthread['view_subject'] = cutstr($nthread['subject'],$hack_cut_str);
        $nthread['view_author'] = cutstr($nthread['author'],$hack_cut_strauthor);
        $nthread['date']= gmdate("$dateformat $timeformat", $nthread['dateline'] + $timeoffset * 3600);
        $nthread['lastreplytime']= gmdate("$dateformat $timeformat", $nthread[lastpost] + ($timeoffset * 3600));
        if($nthread['highlight']) {
                $string = sprintf('%02d', $nthread['highlight']);
                $stylestr = sprintf('%03b', $string[0]);
                $nthread['highlight'] = 'style="';
                $nthread['highlight'] .= $stylestr[0] ? 'font-weight: bold;' : '';
                $nthread['highlight'] .= $stylestr[1] ? 'font-style: italic;' : '';
                $nthread['highlight'] .= $stylestr[2] ? 'text-decoration: underline;' : '';
                $nthread['highlight'] .= $string[1] ? 'color: '.$colorarray[$string[1]] : '';
                $nthread['highlight'] .= '"';
        } else {
                $nthread['highlight'] = '';
        }
        $new_post_threadlist[] = $nthread;
}

//新回复
$hack_cut_str = 28; //标题字数
$hack_cut_strauthor = 9;
$new_reply_threadlist = array();
$rthread = array();
$query = $db->query("SELECT t.*, f.name FROM {$tablepre}threads t, {$tablepre}forums f WHERE t.fid<>'$fid' AND f.fid=t.fid  AND t.closed NOT LIKE 'moved|%' AND t.replies !=0 AND f.fid not in (0) AND t.displayorder not in (-1,-2) ORDER BY t.lastpost DESC LIMIT 0, 10");
while($rthread = $db->fetch_array($query)) {
        $rthread['forumname'] = ereg_replace('<[^>]*>','',$rthread['name']);
        $rthread['view_subject'] = cutstr($rthread['subject'],$hack_cut_str);
        $rthread['view_lastposter'] = cutstr($rthread['lastposter'],$hack_cut_strauthor);
		$rthread['date']= gmdate("$dateformat $timeformat", $rthread['dateline'] + $timeoffset * 3600);
        $rthread['lastreplytime']= gmdate("$dateformat $timeformat", $rthread[lastpost] + ($timeoffset * 3600));
        if($rthread['highlight']) {
                $string = sprintf('%02d', $rthread['highlight']);
                $stylestr = sprintf('%03b', $string[0]);
                $rthread['highlight'] = 'style="';
                $rthread['highlight'] .= $stylestr[0] ? 'font-weight: bold;' : '';
                $rthread['highlight'] .= $stylestr[1] ? 'font-style: italic;' : '';
                $rthread['highlight'] .= $stylestr[2] ? 'text-decoration: underline;' : '';
                $rthread['highlight'] .= $string[1] ? 'color: '.$colorarray[$string[1]] : '';
                $rthread['highlight'] .= '"';
        } else {
                $rthread['highlight'] = '';
        }
        $new_reply_threadlist[] = $rthread;
}

//热帖
$hack_cut_str = 30; //标题字数
$hack_cut_strauthor = 9;
$new_hot_threadlist = array();
$mthread = array();
$ctime=$timestamp-3600*24*7;//最后7是天数为本周  
$query = $db->query("SELECT t.*, f.name FROM {$tablepre}threads t, {$tablepre}forums f WHERE t.fid<>'$fid' AND f.fid=t.fid  AND t.closed NOT LIKE 'moved|%' AND t.replies !=0 AND t.dateline>$ctime AND f.fid not in (0) AND t.displayorder not in (-1,-2) ORDER BY t.replies DESC LIMIT 0, 10");
while($mthread = $db->fetch_array($query)) {
        $mthread['forumname'] = ereg_replace('<[^>]*>','',$mthread['name']);
        $mthread['view_subject'] = cutstr($mthread['subject'],$hack_cut_str);
        $mthread['view_lastposter'] = cutstr($mthread['lastposter'],$hack_cut_strauthor);
		$mthread['date']= gmdate("$dateformat $timeformat", $mthread['dateline'] + $timeoffset * 3600);
        $mthread['lastreplytime']= gmdate("$dateformat $timeformat", $mthread[lastpost] + ($timeoffset * 3600));
        if($mthread['highlight']) {
                $string = sprintf('%02d', $mthread['highlight']);
                $stylestr = sprintf('%03b', $string[0]);
                $mthread['highlight'] = 'style="';
                $mthread['highlight'] .= $stylestr[0] ? 'font-weight: bold;' : '';
                $mthread['highlight'] .= $stylestr[1] ? 'font-style: italic;' : '';
                $mthread['highlight'] .= $stylestr[2] ? 'text-decoration: underline;' : '';
                $mthread['highlight'] .= $string[1] ? 'color: '.$colorarray[$string[1]] : '';
                $mthread['highlight'] .= '"';
        } else {
                $mthread['highlight'] = '';
        }
        $new_hot_threadlist[] = $mthread;
}

//今日发贴排行
$tomonth=date(n);
$todate=date(j);
$toyear=date(Y);
$time=mktime(0,0,0,$tomonth,$todate,$toyear);
$query=$db->query("select count(pid) as num,authorid,author from $tablepre"."posts where dateline>=$time group by authorid order by num desc limit 0,10");
while($result=$db->fetch_array($query)){
	$poststar.="<a href=space.php?uid=".$result[authorid].">".cutstr($result[author],8)."</a><font color=red>[".$result[num]."]</font>&nbsp; ";
}
//----首页五格代码结束

$rsshead = $rssstatus ? ('<link rel="alternate" type="application/rss+xml" title="'.$bbname.'" href="'.$boardurl.'rss.php?auth='.$rssauth."\" />\n") : '';

$customtopics = '';
if($qihoo['maxtopics']) {
	foreach(explode("\t", isset($_DCOOKIE['customkw']) ? $_DCOOKIE['customkw'] : '') as $topic) {
		$topic = dhtmlspecialchars(trim(stripslashes($topic)));
		$customtopics .= '<a href="topic.php?keyword='.rawurlencode($topic).'" target="_blank">'.$topic.'</a> &nbsp;';
	}
}

$catlist = $forumlist = $sublist = $forumname = $collapseimg = $collapse = array();
$threads = $posts = $todayposts = $fids = $announcepm = 0;
$postdata = $historyposts ? explode("\t", $historyposts) : array();

foreach(array('forumlinks', 'sidebar') as $key) {
	if(!isset($_COOKIE['discuz_collapse']) || strpos($_COOKIE['discuz_collapse'], $key) === FALSE) {
		$collapseimg[$key] = 'collapsed_no';
		$collapse[$key] = '';
	} else {
		$collapseimg[$key] = 'collapsed_yes';
		$collapse[$key] = 'display: none';
	}
}

if(!empty($gid)) {
	$infosidestatus[2] = !empty($infosidestatus['f'.$gid][0]) ? $infosidestatus['f'.$gid][0] : $infosidestatus[2];
}
$infosidestatus['allow'] = $infosidestatus['allow'] && $infosidestatus[2] && $infosidestatus[2] != -1 ? (!$collapse['sidebar'] ? 2 : 1) : 0;


$gid = !empty($gid) ? intval($gid) : 0;

if(!$gid) {
	$announcements = '';
	if($_DCACHE['announcements']) {
		$readapmids = !empty($_DCOOKIE['readapmid']) ? explode('D', $_DCOOKIE['readapmid']) : array();
		foreach($_DCACHE['announcements'] as $announcement) {
			if(empty($announcement['groups']) || in_array($groupid, $announcement['groups'])) {
				if(empty($announcement['type'])) {
					$announcements .= '<li><a href="announcement.php?id='.$announcement['id'].'">'.$announcement['subject'].
						'<em>('.gmdate($dateformat, $announcement['starttime'] + $timeoffset * 3600).')</em></a></li>';
				} elseif($announcement['type'] == 1) {
					$announcements .= '<li><a href="'.$announcement['message'].'" target="_blank">'.$announcement['subject'].
						'<em>('.gmdate($dateformat, $announcement['starttime'] + $timeoffset * 3600).')</em></a></li>';
				}
			}
		}
	}
	unset($_DCACHE['announcements']);

	$sql = !empty($accessmasks) ?
				"SELECT f.fid, f.fup, f.type, f.name, f.threads, f.posts, f.todayposts, f.lastpost, f.inheritedmod, f.forumcolumns, f.simple, ff.description, ff.moderators, ff.icon, ff.viewperm, ff.redirect, a.allowview FROM {$tablepre}forums f
					LEFT JOIN {$tablepre}forumfields ff ON ff.fid=f.fid
					LEFT JOIN {$tablepre}access a ON a.uid='$discuz_uid' AND a.fid=f.fid
					WHERE f.status>0 ORDER BY f.type, f.displayorder"
				: "SELECT f.fid, f.fup, f.type, f.name, f.threads, f.posts, f.todayposts, f.lastpost, f.inheritedmod, f.forumcolumns, f.simple, ff.description, ff.moderators, ff.icon, ff.viewperm, ff.redirect FROM {$tablepre}forums f
					LEFT JOIN {$tablepre}forumfields ff USING(fid)
					WHERE f.status>0 ORDER BY f.type, f.displayorder";

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
	unset($catid, $category);

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
			$onlinenum = $db->result_first("SELECT COUNT(*) FROM {$tablepre}sessions");
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
			unset($actioncode, $online);

			if($onlinenum > $maxonlinelist) {
				$membercount = $db->result_first("SELECT COUNT(*) FROM {$tablepre}sessions WHERE uid <> '0'");
				$invisiblecount = $db->result_first("SELECT COUNT(*) FROM {$tablepre}sessions WHERE invisible = '1'");
			}

			if($onlinenum < $membercount) {
				$onlinenum = $db->result_first("SELECT COUNT(*) FROM {$tablepre}sessions");
				dsetcookie('onlineusernum', intval($onlinenum), 300);
			}

			$guestcount = $onlinenum - $membercount;

			$db->free_result($query);
			unset($online);
		}

	} else {
		$whosonlinestatus = 0;
	}

} else {
	require_once DISCUZ_ROOT.'./include/category.inc.php';

}

$lastvisit = $lastvisit ? dgmdate("$dateformat $timeformat", $lastvisit + 3600 * $timeoffset) : 0;

$lastmember= $db->result_first("SELECT username FROM {$tablepre}members ORDER BY uid DESC LIMIT 1");
$lastmemberuid= $db->result_first("SELECT uid FROM {$tablepre}members ORDER BY uid DESC LIMIT 1");
include template('discuz');

?>
