<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; 精华区</div>

<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } ?>

<div class="mainbox threadlist">
	<h1>精华区</h1>
	<table summary="精华区" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<td class="icon">&nbsp;</td>
				<th>标题</th>
				<td lang="forum">版块</td>
				<td class="author">作者</td>
				<td class="nums">回复/查看</td>
				<td class="lastpost">最后发表</td>
			</tr>
		</thead><? if(is_array($threadlist)) { foreach($threadlist as $thread) { ?>		<tbody>
			<tr>
				<td class="icon">
					<? if($thread['special'] == 1) { ?>
						<img src="<?=IMGDIR?>/pollsmall.gif" alt="投票" />
					<? } elseif($thread['special'] == 2) { ?>
						<img src="<?=IMGDIR?>/tradesmall.gif" alt="商品" />
					<? } elseif($thread['special'] == 3) { ?>
						<? if($thread['price'] > 0) { ?>
							<img src="<?=IMGDIR?>/rewardsmall.gif" alt="悬赏" />
						<? } elseif($thread['price'] < 0) { ?>
							<img src="<?=IMGDIR?>/rewardsmallend.gif" alt="悬赏已解决" />
						<? } ?>
					<? } elseif($thread['special'] == 4) { ?>
						<img src="<?=IMGDIR?>/activitysmall.gif" alt="活动" />
					<? } elseif($thread['special'] == 5) { ?>
						<img src="<?=IMGDIR?>/debatesmall.gif" alt="辩论" />
					<? } elseif($thread['special'] == 6) { ?>
						<img src="<?=IMGDIR?>/videosmall.gif" alt="视频" />
					<? } else { ?>
						<?=$thread['icon']?>
					<? } ?>
				</td>
				<th>
				<label>
				<? if($thread['special'] == 1) { ?>
					<img src="<?=IMGDIR?>/pollsmall.gif" alt="投票" />
				<? } ?>
				<? if($thread['special'] == 2) { ?>
					<img src="<?=IMGDIR?>/tradesmall.gif" alt="商品" />
				<? } ?>
				<? if($thread['special'] == 3) { ?>
					<? if($thread['price'] > 0) { ?>
						<img src="<?=IMGDIR?>/rewardsmall.gif" alt="悬赏" />
					<? } elseif($thread['special'] == '3' && $thread['price'] < 0) { ?>
						<img src="<?=IMGDIR?>/rewardsmallend.gif" alt="悬赏已解决" />
					<? } ?>
				<? } ?>
				<? if($thread['special'] == 4) { ?>
					<img src="<?=IMGDIR?>/activitysmall.gif" alt="活动" />
				<? } ?>
				<? if($thread['attachment']) { ?>
					<img src="images/attachicons/common.gif" alt="附件" />
				<? } ?>
				<? if($thread['displayorder']) { ?>
					<img src="<?=IMGDIR?>/pin_<?=$thread['displayorder']?>.gif" alt="置顶<? if($thread['displayorder'] == 3) { ?><?=$threadsticky['0']?><? } elseif($thread['displayorder'] == 2) { ?><?=$threadsticky['1']?><? } elseif($thread['displayorder'] == 1) { ?><?=$threadsticky['2']?><? } ?>" />
				<? } ?>
				<? if($thread['digest']) { ?>
					<img src="<?=IMGDIR?>/digest_<?=$thread['digest']?>.gif" alt="精华 <?=$thread['digest']?>" />
				<? } ?>
				</label>
				<a href="viewthread.php?tid=<?=$thread['tid']?>&amp;highlight=<?=$index['keywords']?>" target="_blank" <?=$thread['highlight']?>><?=$thread['subject']?></a>
				<? if($thread['multipage']) { ?><span class="threadpages"><?=$thread['multipage']?></span><? } ?>
				</th>
				<td class="forum"><a href="forumdisplay.php?fid=<?=$thread['fid']?>"><?=$thread['forumname']?></a></td>
				<td class="author">
				<cite><? if($thread['authorid']) { ?><a href="space.php?uid=<?=$thread['authorid']?>"><?=$thread['author']?></a><? } else { ?>匿名<? } ?></cite>
				<em><?=$thread['dateline']?></em>
				</td>
				<td class="nums"><strong><?=$thread['replies']?></strong> / <em><?=$thread['views']?></em></td>
				<td class="lastpost">
					<em><a href="redirect.php?tid=<?=$thread['tid']?>&amp;goto=lastpost&amp;highlight=<?=$index['keywords']?>#lastpost"><?=$thread['lastpost']?></a></em>
					<cite><? if($thread['lastposter']) { ?><a href="space.php?username=<?=$thread['lastposterenc']?>"><?=$thread['lastposter']?></a><? } else { ?>匿名<? } ?></cite>
				</td>
			</tr>
		</tbody>
		<? } } ?></table>
</div>

<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } ?>

<form method="post" action="digest.php">
	<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
	<div class="box">
		<h4>以下版块精华区</h4>
		<ul class="userlist"><? if(is_array($forumlist)) { foreach($forumlist as $key => $forum) { ?><li><label><input class="checkbox" type="checkbox" name="forums[]" value="<?=$forum['fid']?>" <?=$forumcheck[$forum['fid']]?> /> <?=$forum['name']?></label></li><? } } ?></ul>
	</div>
	<div id="footfilter" class="box">
		<label>关键字: <input type="text" size="15" name="keyword" value="<?=$keyword?>" /></label>
		&nbsp;&nbsp;<label>作者: <input type="text" size="15" name="author" value="<?=$author?>" /></label>
		&nbsp;&nbsp;<label>排序方式: <select name="order">
			<option value="digest" <?=$ordercheck['digest']?>>级别</option>
			<option value="replies" <?=$ordercheck['replies']?>>回复</option>
			<option value="views" <?=$ordercheck['views']?>>查看</option>
			<option value="dateline" <?=$ordercheck['dateline']?>>发布时间</option>
			<option value="lastpost" <?=$ordercheck['lastpost']?>>最后发表</option>
		</select></label>
		&nbsp;&nbsp; <button class="submit" type="submit" value="true">搜索</button>
	</div>
</form>
<? include template('footer'); ?>
