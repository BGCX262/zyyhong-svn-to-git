<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<table cellspacing="0" cellpadding="0" summary="我的主题" class="datatable">
<thead class="colplural">
<tr>
<th>&nbsp;</th>
<td class="forum">版块</td>
<td class="nums">
<select onchange="window.location='my.php?item=threads&filter=' + this.value + '<?=$fidadd?>'">
<option value="">状态</option>
<option value="recyclebin"<? if($filter == 'recyclebin') { ?> selected="selected"<? } ?>>回收站</option>
<option value="aduit"<? if($filter == 'aduit') { ?> selected="selected"<? } ?>>待审核</option>
<option value="close"<? if($filter == 'close') { ?> selected="selected"<? } ?>>关闭</option>
<option value="common"<? if($filter == 'common') { ?> selected="selected"<? } ?>>正常</option>
</option>
</td>
<td class="lastpost"><cite>最后发表</cite></td>
</tr>
</thead>
<? if($threadlist) { ?>
<tbody><? if(is_array($threadlist)) { foreach($threadlist as $thread) { ?><tr>
<th><? if($thread['displayorder'] >= 0) { ?><a href="viewthread.php?tid=<?=$thread['tid']?>" target="_blank"><?=$thread['subject']?></a><? } else { ?><?=$thread['subject']?><? } ?></th>
<td class="forum"><a href="forumdisplay.php?fid=<?=$thread['fid']?>" target="_blank"><?=$thread['forumname']?></a></td>
<td class="nums"><? if($thread['displayorder'] == '-1') { ?>回收站<? } elseif($thread['displayorder'] == '-2') { ?>待审核<? } elseif($thread['closed'] == '1') { ?>关闭<? } else { ?>正常<? } ?></td>
<td class="lastpost">
<cite><? if($thread['lastposter']) { ?><a href="space.php?username=<?=$thread['lastposterenc']?>" target="_blank"><?=$thread['lastposter']?></a><? } else { ?>匿名<? } ?></cite>
<em><a href="redirect.php?tid=<?=$thread['tid']?>&amp;goto=lastpost#lastpost"><?=$thread['lastpost']?></a></em>
</td>
</tr><? } } ?></tbody>
<? } else { ?>
<tr><th colspan="4"><p class="nodata">暂无数据</p></th></tr>
<? } ?>
</table>
<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } ?>