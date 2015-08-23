<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div class="itemtitle s_clear">
<h1>信用评价</h1>
<ul>
<? if(in_array($filter, array('thisweek', 'thismonth', 'halfyear', 'before')) && in_array($from, array('buyer', 'seller'))) { ?>
<li class="current"><a href="javascript:;" hidefocus="true"><span>
<? if($filter == 'thisweek') { ?>最近1周<? } elseif($filter == 'thismonth') { ?>最近1个月<? } elseif($filter == 'halfyear') { ?>最近6个月<? } else { ?>6个月前<? } ?> 来自<? if($from == 'buyer') { ?>买家<? } else { ?>卖家<? } ?>的<? if($level == 'good') { ?>好评<? } elseif($level == 'soso') { ?>中评<? } elseif($level == 'bad') { ?>差评<? } else { ?>评价<? } ?>
</span></a></li>
<? } if(!$from) { ?>
<li class="current"><a href="javascript:;" hidefocus="true"><span>收到的所有评价</span></a></li>
<? } else { ?>
<li><a href="eccredit.php?action=list&amp;uid=<?=$uid?>" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><span>收到的所有评价</span></a></li>
<? } if($from == 'buyer' && !$filter) { ?>
<li class="current"><a href="javascript:;" hidefocus="true"><span>来自买家的评价</span></a></li>
<? } else { ?>
<li><a href="eccredit.php?action=list&amp;uid=<?=$uid?>&amp;from=buyer" hidefocus="true" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><span>来自买家的评价</span></a></li>
<? } if($from == 'seller' && !$filter) { ?>
<li class="current"><a href="javascript:;" hidefocus="true"><span>来自卖家的评价</span></a></li>
<? } else { ?>
<li><a href="eccredit.php?action=list&amp;uid=<?=$uid?>&amp;from=seller" hidefocus="true" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><span>来自卖家的评价</span></a></li>
<? } if($from == 'myself') { ?>
<li class="current"><a href="javascript:;" hidefocus="true"><span>给他人的评价</span></a></li>
<? } else { ?>
<li><a href="eccredit.php?action=list&amp;uid=<?=$uid?>&amp;from=myself" hidefocus="true" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><span>给他人的评价</span></a></li>
<? } ?>
</ul>
</div>
<div class="datalist">
<table cellspacing="0" cellpadding="5" class="datatable">
<thead class="colplural">
<tr>
<td>&nbsp;</td>
<td>评价内容</td>
<td>宝贝名称/评价人</td>
<td>成交价（元）</td>
</tr>
</thead>
<tbody>
<? if($comments) { if(is_array($comments)) { foreach($comments as $comment) { ?><tr>
<td>
<? if($comment['score'] == 1) { ?>
<img src="images/rank/good.gif" width="14" height="16" /> <span style="color:red">好评</span>
<? } elseif($comment['score'] == 0) { ?>
<img src="images/rank/soso.gif" width="14" height="16" /> <span style="color:green">中评</span>
<? } else { ?>
<img src="images/rank/bad.gif" width="14" height="16" /> 差评
<? } ?>
</td>
<td>
<?=$comment['dateline']?><br /><?=$comment['message']?><br />
<? if($comment['explanation']) { ?>
解释: <?=$comment['explanation']?>
<? } elseif($discuz_uid && $discuz_uid == $comment['rateeid'] && $comment['dbdateline'] >= $timestamp - 30 * 86400) { ?>
<span id="ecce_<?=$comment['id']?>"><a href="eccredit.php?action=explain&amp;id=<?=$comment['id']?>" id="ajax_<?=$comment['id']?>_explain" onclick="ajaxmenu(event, this.id, 0, '', 0)">[ 我要解释 ]</a> 您可以在 <?=$comment['expiration']?> 之前作出解释。</span>
<? } ?>
</td>
<td>
<a href="redirect.php?goto=findpost&amp;special=trade&amp;pid=<?=$comment['pid']?>" target="_blank"><?=$comment['subject']?></a><br />
<? if($from == 'myself') { if($comment['type']) { ?>买家:<? } else { ?>卖家:<? } ?><a href="space.php?uid=<?=$comment['rateeid']?>" target="_blank"><?=$comment['ratee']?></a>
<? } else { if($comment['type']) { ?>卖家:<? } else { ?>买家:<? } ?><a href="space.php?uid=<?=$comment['raterid']?>" target="_blank"><?=$comment['rater']?></a>
<? } ?>
</td>
<td><?=$comment['baseprice']?></td>
</tr><? } } } else { ?>
<tr><td colspan="4">没有找到相关评价！</td></tr>
<? } ?>
</tbody>
</table>
<div class="pages_btns"><?=$multipage?></div>
</div>
<? include template('footer'); ?>
