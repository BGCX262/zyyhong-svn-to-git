<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<table cellspacing="0" cellpadding="0" summary="我的投票" class="datatable">
<thead class="colplural">
<tr>
<th>&nbsp;</th>
<td class="forum">版块</td>
<td class="nums">
<select onchange="window.location='my.php?item=polls&filter=' + this.value + '<?=$fidadd?>'">
<option value="">状态</option>
<option value="recyclebin"<? if($filter == 'recyclebin') { ?> selected="selected"<? } ?>>回收站</option>
<option value="aduit"<? if($filter == 'aduit') { ?> selected="selected"<? } ?>>待审核</option>
<option value="close"<? if($filter == 'close') { ?> selected="selected"<? } ?>>关闭</option>
<option value="common"<? if($filter == 'common') { ?> selected="selected"<? } ?>>正常</option>
</option>
</td>
<td class="lastpost"><cite><? if($type == 'poll') { ?>最后发表<? } else { ?>投票日期<? } ?></cite></td>
</tr>
</thead>
<? if($polllist) { ?>
<tbody><? if(is_array($polllist)) { foreach($polllist as $key => $poll) { ?><tr>
<th><a href="viewthread.php?tid=<?=$poll['tid']?>" target="_blank"><?=$poll['subject']?></a></th>
<td class="forum"><a href="forumdisplay.php?fid=<?=$poll['fid']?>" target="_blank"><?=$poll['forumname']?></a></td>
<td class="nums"><? if($poll['displayorder'] == '-1') { ?>回收站<? } elseif($poll['displayorder'] == '-2') { ?>待审核<? } elseif($poll['closed'] == '1') { ?>关闭<? } else { ?>正常<? } ?></td>
<td class="lastpost">
<? if($type == 'poll') { ?>
<cite><? if($poll['lastposter']) { ?><a href="space.php?username=<?=$poll['lastposterenc']?>" target="_blank"><?=$poll['lastposter']?></a><? } else { ?>匿名<? } ?></cite>
<em><a href="redirect.php?tid=<?=$poll['tid']?>&amp;goto=lastpost#lastpost" target="_blank"><?=$poll['lastpost']?></a></em>
<? } else { ?>
<cite><?=$poll['dateline']?></cite>
<? } ?>
</td>
</tr><? } } ?></tbody>
<? } else { ?>
<tr><th colspan="4"><p class="nodata">暂无数据</p></th></tr>
<? } ?>
</table>
<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } ?>