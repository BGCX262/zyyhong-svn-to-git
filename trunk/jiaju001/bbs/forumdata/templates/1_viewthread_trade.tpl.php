<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if(!$iscircle || !empty($frombbs)) { include template('header'); } else { include template('supesite_header'); } ?>

<script src="include/javascript/viewthread.js" type="text/javascript"></script>
<script type="text/javascript">zoomstatus = parseInt(<?=$zoomstatus?>);</script>

<div id="foruminfo">
	<div id="nav">
		<? if($forumjump && $jsmenu['1']) { ?><a href="<?=$indexname?>" id="forumlist" onmouseover="showMenu(this.id)" class="dropmenu"><?=$bbname?></a><? } else { ?><a href="<?=$indexname?>"><?=$bbname?></a><? } ?> <?=$navigation?>
	</div>
	<div id="headsearch">
	<? if(!empty($google) && ($google & 4)) { ?>
		<script src="forumdata/cache/google_var.js" type="text/javascript"></script>
		<script src="include/javascript/google.js" type="text/javascript"></script>
	<? } ?>
	<? if(!empty($qihoo['status']) && $searchboxstatus) { ?>
		<form method="post" action="search.php?srchtype=qihoo" onSubmit="this.target='_blank';">
			<input type="hidden" name="searchsubmit" value="yes" />
			<input type="text" name="srchtxt" value="<?=$qihoo_searchboxtxt?>" size="27" class="input" style="<?=BGCODE?>" onmouseover="this.focus();this.value='';this.onmouseover=null;" onfocus="this.select()" />
			&nbsp;<button type="submit">搜索</button>
		</form>
	<? } ?>
	</div>
</div>

<? if(!empty($newpmexists) || $announcepm) { ?>
	<div class="maintable" id="pmprompt">
<? include template('pmprompt'); ?>
</div>
<? } ?>

<div class="pages_btns">

	<div class="threadflow"><a href="redirect.php?fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;goto=nextoldset"> &lsaquo;&lsaquo; 上一主题</a> | <a href="redirect.php?fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;goto=nextnewset">下一主题 &rsaquo;&rsaquo;</a></div>

	<? if($allowpost || !$discuz_uid) { ?>
		<span class="postbtn" id="newspecialheader" onmouseover="showMenu(this.id)"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>"><img src="<?=IMGDIR?>/newtopic.gif" border="0" alt="发新话题" title="发新话题" /></a></span>
	<? } ?>
	<? if($allowpostreply || !$discuz_uid) { ?><span class="replybtn"><a href="post.php?action=reply&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;extra=<?=$extra?>"><img src="<?=IMGDIR?>/reply.gif" border="0" alt="" /></a></span><? } ?>
</div>

		<? if($allowposttrade || $allowpostpoll || $allowpostreward || $allowpostactivity || $allowpostdebate || $allowpostvideo || $forum['threadtypes'] || !$discuz_uid) { ?>
			<ul class="popupmenu_popup newspecialmenu" id="newspecialheader_menu" style="display: none">
				<? if(!$forum['allowspecialonly']) { ?><li><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>">发新话题</a></li><? } ?>
				<? if($allowpostpoll || !$discuz_uid) { ?><li class="poll"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=1">发布投票</a></li><? } ?>
				<? if($allowposttrade || !$discuz_uid) { ?><li class="trade"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=2">发布商品</a></li><? } ?>
				<? if($allowpostreward || !$discuz_uid) { ?><li class="reward"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=3">发布悬赏</a></li><? } ?>
				<? if($allowpostactivity || !$discuz_uid) { ?><li class="activity"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=4">发布活动</a></li><? } ?>
				<? if($allowpostdebate || !$discuz_uid) { ?><li class="debate"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=5">发布辩论</a></li><? } ?>
				<? if($allowpostvideo || !$discuz_uid) { ?><li class="video"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;special=6">发布视频</a></li><? } ?>
				<? if($forum['threadtypes'] && !$forum['allowspecialonly']) { if(is_array($forum['threadtypes']['types'])) { foreach($forum['threadtypes']['types'] as $typeid => $threadtypes) { if($forum['threadtypes']['special'][$typeid] && $forum['threadtypes']['show'][$typeid]) { ?>
							<li class="popupmenu_option"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;typeid=<?=$typeid?>"><?=$threadtypes?></a></li>
						<? } } } if(is_array($forum['typemodels'])) { foreach($forum['typemodels'] as $id => $model) { ?><li class="popupmenu_option"><a href="post.php?action=newthread&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;modelid=<?=$id?>"><?=$model['name']?></a></li><? } } } ?>
			</ul>
		<? } ?>

<div class="mainbox viewthread specialthread tradethread">
	<span class="headactions">
		<? if($discuz_uid) { ?>
			<? if($supe['status'] && $xspacestatus && $thread['authorid'] == $discuz_uid) { ?>
				<? if(!$thread['itemid']) { ?>
					<a href="<?=$supe['siteurl']?>/spacecp.php?action=spaceblogs&amp;op=add&amp;tid=<?=$tid?>" target="_blank">加入个人空间</a>
				<? } else { ?>
					<a href="<?=$supe['siteurl']?>/index.php?action/viewspace/itemid/<?=$thread['itemid']?>/fromdiscuz/<?=$supe_fromdiscuz?>" target="_blank">在个人空间查看</a>
				<? } ?>
				<a href="<?=$supe['siteurl']?>/spacecp.php?action=spacenews&amp;op=add&amp;tid=<?=$tid?>" target="_blank">加入资讯</a>
			<? } elseif($spacestatus && $thread['authorid'] && ($thread['authorid'] == $discuz_uid || $forum['ismoderator'])) { ?>
				<? if($thread['blog']) { ?>
					<a href="misc.php?action=blog&amp;tid=<?=$tid?>" id="ajax_blog" onclick="ajaxmenu(event, this.id, 2000, 'changestatus', 0)">从文集移除</a>
				<? } elseif($allowuseblog && $forum['allowshare'] && $thread['authorid'] == $discuz_uid) { ?>
					<a href="misc.php?action=blog&amp;tid=<?=$tid?>" id="ajax_blog" onclick="ajaxmenu(event, this.id, 2000, 'changestatus', 0)">加入文集</a>
				<? } ?>
				<script type="text/javascript">
					function changestatus(obj) {
						obj.innerHTML = obj.innerHTML == '从文集移除' ? '加入文集' : '从文集移除';
					}
				</script>
			<? } ?>
			<a href="misc.php?action=emailfriend&amp;tid=<?=$tid?>" id="emailfriend" onclick="ajaxmenu(event, this.id, 9000000, '', 0)" class="nobdr">推荐</a>
			<a href="my.php?item=subscriptions&amp;subadd=<?=$tid?>" id="ajax_subscription" onclick="ajaxmenu(event, this.id)">订阅</a>
			<a href="my.php?item=favorites&amp;tid=<?=$tid?>" id="ajax_favorite" onclick="ajaxmenu(event, this.id)" class="notabs">收藏</a>
		<? } ?>
	</span>
	<h6>商品主题</h6>
	<? if($lastmod['modaction'] || $thread['blog'] || $thread['readperm'] || $thread['itemid'] || $lastmod['magicname']) { ?>
		<ins>
		<? if($thread['itemid']) { ?>
			<a href="<?=$supe['siteurl']?>/index.php?action/viewspace/itemid/<?=$thread['itemid']?>" target="_blank"><span class="bold" style="margin-right:20px;">本帖已经被作者加入个人空间</span></a>
		<? } ?>
		<? if($lastmod['modaction']) { ?>&nbsp; <a href="misc.php?action=viewthreadmod&amp;tid=<?=$tid?>" title="主题操作记录" target="_blank">本主题由 <?=$lastmod['modusername']?> 于 <?=$lastmod['moddateline']?> <?=$lastmod['modaction']?></a>&nbsp;<? } ?>
		<? if($spacestatus && $thread['blog']) { ?>&nbsp; <a href="space.php?<?=$thread['authorid']?>/myblogs" target="_blank">本主题被作者加入到个人文集中</a> &nbsp;<? } ?>
		<? if($thread['readperm']) { ?>&nbsp; 所需阅读权限 <span class="bold"><?=$thread['readperm']?></span> &nbsp;<? } ?>
		<? if($lastmod['magicname']) { ?>&nbsp; <a href="misc.php?action=viewthreadmod&amp;tid=<?=$tid?>" title="主题操作记录" target="_blank">本主题由 <?=$lastmod['modusername']?> 于 <?=$lastmod['moddateline']?> 使用 <?=$lastmod['magicname']?> 道具</a>&nbsp;<? } ?>
		</ins>
	<? } ?>
	<table summary="" cellpadding="0" cellspacing="0">
		<tr>
			<td class="postcontent">
			<label>商品数: <strong><?=$tradenum?></strong></label><h1><?=$thread['subject']?></h1>
			<div class="postmessage">
				<? if(!empty($post['ratings'])) { ?><span class="postratings"><a href="misc.php?action=viewratings&amp;tid=<?=$tid?>&amp;pid=<?=$post['pid']?>" title="评分 <?=$post['rate']?>"><?=$post['ratings']?></a></span><? } ?>
				<?=$post['counterdesc']?><br />

				<? if($tradenum) { ?>
					<? if($trades) { ?>
						<div class="box tradethumblist">
							<h4>推荐商品</h4><? if(is_array($trades)) { foreach($trades as $key => $trade) { if($trade['displayorder'] > 0) { ?>
									<dl>
										<dt></dt>
										<dd class="thumblist" onclick="window.open('viewthread.php?do=tradeinfo&amp;tid=<?=$tid?>&amp;pid=<?=$trade['pid']?>','','')">
											<img <? if($trade['thumb']) { ?>src="<?=$trade['thumb']?>"<? } else { ?>src="<?=IMGDIR?>/trade_nophoto.gif"<? } ?> onload="thumbImg(this)" width="96" height="96" alt="<? if($trade['typeid']) { ?>[<?=$tradetypes[$trade['typeid']]?>] <? } ?><?=$trade['subject']?>" />
										</dd>
										<dd>
											<p class="tradename"><a href="viewthread.php?do=tradeinfo&amp;tid=<?=$tid?>&amp;pid=<?=$trade['pid']?>" target="_blank"><?=$trade['subject']?></a></p>
											<? if($trade['costprice'] > 0) { ?>
												<p>原价 <del><?=$trade['costprice']?></del> 元</p>
											<? } ?>
											<p>现价 <strong><?=$trade['price']?></strong> 元</p>
											<p>
											<? if($trade['closed']) { ?>
												<em>成交结束</em>
											<? } elseif($trade['expiration'] > 0) { ?>
												<?=$trade['expiration']?>天<?=$trade['expirationhour']?>小时
											<? } elseif($trade['expiration'] == -1) { ?>
												<em>成交结束</em>
											<? } ?>
											</p>
										</dd>
									</dl>
								<? } } } ?></div>
					<? } ?>
					<? if($tradelist) { ?>
						<div id="ajaxtradelist"></div>
						<script type="text/javascript">ajaxget('viewthread.php?fid=<?=$fid?>&tid=<?=$tid?>&do=viewtradelist&page=1', 'ajaxtradelist');</script>
					<? } ?>

					<? if($discuz_uid == $thread['authorid']) { ?>
						<button type="button" onclick="window.open('my.php?item=selltrades&tid=<?=$tid?>','','')">商品交易单</button>&nbsp;&nbsp;
						<button type="button" onclick="location.href='misc.php?action=tradeorder&tid=<?=$tid?>'">柜台商品管理</button>&nbsp;&nbsp;
						<? if($allowposttrade) { ?><button type="button" onclick="location.href='post.php?action=reply&fid=<?=$fid?>&tid=<?=$tid?>&addtrade=yes&extra=<?=$extra?>'">添加商品</button><? } ?>
					<? } ?>

					<? if($thread['tags'] || $relatedkeywords) { ?>
						<p class="posttags">搜索更多相关主题的帖子:
						<? if($thread['tags']) { ?><?=$thread['tags']?><? } ?>
						<? if($relatedkeywords) { ?><span class="postkeywords"><?=$relatedkeywords?></span><? } ?>
						</p>
					<? } ?>

				<? } else { ?>
					<div class="notice">*** 本商品主题尚未开放 ***</div>
					<? if($discuz_uid == $thread['authorid'] && $allowposttrade) { ?><br /><button type="button" onclick="location.href='post.php?action=reply&fid=<?=$fid?>&tid=<?=$tid?>&addtrade=yes&extra=<?=$extra?>'">添加商品</button><? } ?>
				<? } ?>
			</div>
		</td>
		<td class="postauthor">
			<?=$post['avatar']?>
			<dl>
				<dt>卖家</dt><dd><a href="space.php?username=<?=$post['usernameenc']?>" target="_blank"><?=$post['username']?></a></dd>
				<dt><?=$post['authortitle']?></dt><dd>&nbsp;</dd>
				<dt><? showstars($post['stars']); ?></dt><dd>&nbsp;</dd>
				<dt>卖家信用</dt><dd><?=$post['sellercredit']?> <a href="eccredit.php?uid=<?=$post['uid']?>" target="_blank"><img src="images/rank/seller/<?=$post['sellerrank']?>.gif" alt="<?=$post['sellercredit']?>" /></a></dd>
				<dt>买家信用</dt><dd><?=$post['buyercredit']?> <a href="eccredit.php?uid=<?=$post['uid']?>" target="_blank"><img src="images/rank/buyer/<?=$post['buyerrank']?>.gif" alt="<?=$post['buyercredit']?>" /></a></dd>
				<? if($spacedata['limitmytrades']) { ?><dt><a href="space.php?<?=$post['uid']?>/mytrades" target="_blank">查看卖家店铺</a></dt><dd>&nbsp;</dd><? } ?>
			</dl>
			<? if($post['msn'] || $post['qq'] || $post['icq'] || $post['yahoo'] || $post['taobao']) { ?>
			<p class="imicons">
				<? if($post['msn']) { ?><a href="javascript:;" onclick="msnoperate('add', '<?=$post['msn']?>')" title="添加 <?=$post['username']?> 为MSN好友"><img src="<?=IMGDIR?>/msnadd.gif" alt="添加 <?=$post['username']?> 为MSN好友" /></a>
					<a href="javascript:;" onclick="msnoperate('chat', '<?=$post['msn']?>')" title="通过MSN和 <?=$post['username']?> 交谈"><img src="<?=IMGDIR?>/msnchat.gif" alt="通过MSN和 <?=$post['username']?> 交谈" /></a><? } ?>
				<? if($post['qq']) { ?><a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?=$post['qq']?>&amp;Site=<?=$bbname?>&amp;Menu=yes" target="_blank"><img src="<?=IMGDIR?>/qq.gif" alt="QQ" /></a><? } ?>
				<? if($post['icq']) { ?><a href="http://wwp.icq.com/scripts/search.dll?to=<?=$post['icq']?>" target="_blank"><img src="<?=IMGDIR?>/icq.gif" alt="ICQ" /></a><? } ?>
				<? if($post['yahoo']) { ?><a href="http://edit.yahoo.com/config/send_webmesg?.target=<?=$post['yahoo']?>&amp;.src=pg" target="_blank"><img src="<?=IMGDIR?>/yahoo.gif" alt="Yahoo!"  /></a><? } ?>
				<? if($post['taobao']) { ?><script type="text/javascript">document.write('<a target="_blank" href="http://amos1.taobao.com/msg.ww?v=2&amp;uid='+encodeURIComponent('<?=$post['taobaoas']?>')+'&amp;s=2"><img src="<?=IMGDIR?>/taobao.gif" alt="阿里旺旺" /></a>');</script><? } ?>
			</p>
			<? } ?>
			<? if($customauthorinfo['3']) { ?><dl class="profile"><? @eval('echo "'.$customauthorinfo['3'].'";'); ?></dl><? } ?>
			<? if($allowpaytoauthor && $post['alipay']) { ?><p><a href="https://www.alipay.com/payto:<?=$post['alipay']?>?partner=2088002052150939" target="_blank"><img src="<?=IMGDIR?>/payto.gif" border="0" alt="用支付宝求购" /></a></p><? } ?>		</td>
	</tr>
		<tr>
		  <td class="postcontent">
			<p class="postactions">
				<? if($forum['ismoderator'] || $thread['authorid'] == $discuz_uid) { ?><a href="post.php?action=edit&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;pid=<?=$post['pid']?>&amp;page=<?=$page?>&amp;extra=<?=$extra?>">编辑</a><? } ?>
				<? if($raterange && $thread['authorid']) { ?><a href="misc.php?action=rate&amp;tid=<?=$tid?>&amp;pid=<?=$post['pid']?>&amp;page=<?=$page?>" id="ajax_rate_<?=$post['pid']?>" onclick="ajaxmenu(event, this.id, 9000000, '', 0)">评分</a><? } ?>
				<? if($discuz_uid && $magicstatus) { ?><a href="magic.php?action=user&amp;pid=<?=$post['pid']?>" target="_blank">使用道具</a><? } ?>
			</p>		  </td>
	      <td class="postauthor">&nbsp;</td>
	  </tr>
</table>
</div>

<div id="ad_interthread"></div>

<? if($tradenum) { ?>
	<div id="ajaxtradepost"></div>
	<script type="text/javascript">ajaxget('viewthread.php?fid=<?=$fid?>&tid=<?=$tid?>&do=viewall&page=<?=$page?>', 'ajaxtradepost');</script>
<? } include template('viewthread_fastreply'); ?>
