<?php
/*
design by Clement
change by xuon
*/

//---����---start
$shownums	= 5;//��ʾ���� 6����
$searchnums	= 50;//��������
$cachelife	= 1800;//����ʱ��
$orderby	= 'dateline';//����˳��:������dateline/���������downloads/���rand
$cachename	= 'showpic';//������.����β����ͻ���޸�,ֻҪ����ͻ����Ӱ��ʹ��.
$searchfid	= '';//����fid��Χ.����������.���ö������,��'1,2,3'
//---����---end

if((@!include('forumdata/cache/cache_'.$cachename.'.php')) || $expiration < time() || $cacheshownums != $shownums || $cachesearchnums != $searchnums || $cachecachelife != $cachelife || $cacheorderby != $orderby || $cachecachename != $cachename || $cachesearchfid != $searchfid) {
	require_once './include/common.inc.php';
	$orderby = $orderby != 'rand' ? 'attach.'.$orderby : 'rand()';
	$fids = $searchfid ? 'AND '."t.fid IN ($searchfid)" : '';
	$data = array();
	$query = $db->query("SELECT attach.aid, attach.attachment, t.tid, t.fid, t.subject FROM {$tablepre}attachments attach LEFT JOIN {$tablepre}threads t ON t.tid=attach.tid WHERE attach.readperm='0' AND displayorder>='0' AND filetype='image/pjpeg' $fids GROUP BY attach.tid ORDER BY $orderby DESC LIMIT $searchnums");
	while ($pic = $db->fetch_array($query)) {
		$data['pic'][$pic[aid]]['showpicpics'] = $attachurl.'/'.$pic['attachment'];
		$data['pic'][$pic[aid]]['showpiclinks'] = "viewthread.php?tid=$pic[tid]";
		$data['pic'][$pic[aid]]['showpictexts'] = str_replace('\'', '&nbsp;',$pic['subject']);
	}
	$data['expiration'] = $cachelife + time();
	$data['cacheshownums'] = $shownums;
	$data['cachesearchnums'] = $searchnums;
	$data['cachecachelife'] = $cachelife;
	$data['cacheorderby'] = $orderby;
	$data['cachecachename'] = $cachename;
	$data['cachesearchfid'] = $searchfid;
	require_once DISCUZ_ROOT.'./include/cache.func.php';
	writetocache($cachename, '', getcachevars($data));
	include(DISCUZ_ROOT.'./forumdata/cache/cache_'.$cachename.'.php');
}

//shuffle($pic);
$i = 0;
$j = 0;
while ($j < $shownums && isset($pic[$i])) {
	if(is_readable($pic[$i]['showpicpics'])) {
		$showpicpics .= $comma.$pic[$i]['showpicpics'];
		$showpiclinks .= $comma.$pic[$i]['showpiclinks'];
		$showpictexts .= $comma.$pic[$i]['showpictexts'];
		$comma = '|';
		$j++;
	}
	$i++;
}
?>
var swf_width=260	
var swf_height=198
var config='5|0xffffff|0x0099ff|50|0xffffff|0x0099ff|0x000000'
// config ���÷ֱ�Ϊ: �Զ�����ʱ��(��)|������ɫ|���ֱ���ɫ|���ֱ���͸����|��������ɫ|��ǰ����ɫ|��ͨ����ɫ
var files='<?php echo $showpicpics;?>'
var links='<?php echo $showpiclinks;?>'
var texts='<?php echo $showpictexts;?>'
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
document.write('<param name="movie" value="images/focus.swf" />');
document.write('<param name="quality" value="high" />');
document.write('<param name="menu" value="false" />');
document.write('<param name=wmode value="opaque" />');
document.write('<param name="FlashVars" value="config='+config+'&bcastr_flie='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'" />');
document.write('<embed src="images/focus.swf" wmode="opaque" FlashVars="config='+config+'&bcastr_flie='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'& menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
document.write('</object>');