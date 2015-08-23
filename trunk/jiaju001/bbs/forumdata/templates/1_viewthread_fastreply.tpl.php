<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if($relatedthreadlist && $qihoo['relate']['position']) { include template('viewthread_relatedthread'); } if($fastpost && $allowpostreply && $thread['closed'] == 0) { ?>
	<script src="include/javascript/post.js" type="text/javascript"></script>
	<script type="text/javascript">
	var postminchars = parseInt('<?=$minpostsize?>');
	var postmaxchars = parseInt('<?=$maxpostsize?>');
	var disablepostctrl = parseInt('<?=$disablepostctrl?>');
	function validate(theform) {
		if (theform.message.value == "" && theform.subject.value == "") {
			alert("请完成标题或内容栏。");
			theform.message.focus();
			return false;
		} else if (theform.subject.value.length > 80) {
			alert("您的标题超过 80 个字符的限制。");
			theform.subject.focus();
			return false;
		}
		if (!disablepostctrl && ((postminchars != 0 && theform.message.value.length < postminchars) || (postmaxchars != 0 && theform.message.value.length > postmaxchars))) {
			alert("您的帖子长度不符合要求。\n\n当前长度: "+theform.message.value.length+" 字节\n系统限制: "+postminchars+" 发送到 "+postmaxchars+" 字节");
			return false;
		}
		if(!fetchCheckbox('parseurloff')) {
			theform.message.value = parseurl(theform.message.value, 'bbcode');
		}
		theform.replysubmit.disabled = true;
		return true;
	}
	</script>
	<form method="post" id="postform" action="post.php?action=reply&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;extra=<?=$extra?>&amp;replysubmit=yes" onSubmit="return validate(this)">
		<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
		<div id="quickpost" class="box">
			<span class="headactions"><a href="member.php?action=credits&amp;view=forum_reply&amp;fid=<?=$fid?>" target="_blank">查看积分策略说明</a></span>
			<h4>快速回复主题</h4>
			<div class="postoptions">
				<h5>选项</h5>
				<p><label><input class="checkbox" type="checkbox" name="parseurloff" id="parseurloff" value="1"> 禁用 URL 识别</label></p>
				<p><label><input class="checkbox" type="checkbox" name="smileyoff" id="smileyoff" value="1"> 禁用 <a href="faq.php?action=message&amp;id=32" target="_blank">表情</a></label></p>
				<p><label><input class="checkbox" type="checkbox" name="bbcodeoff" id="bbcodeoff" value="1"> 禁用 <a href="faq.php?action=message&amp;id=18" target="_blank">Discuz!代码</a></label></p>
				<? if($allowanonymous || $forum['allowanonymous']) { ?><p><label><input class="checkbox" type="checkbox" name="isanonymous" value="1"> 使用匿名发帖</label></p><? } ?>
				<p><label><input class="checkbox" type="checkbox" name="usesig" value="1" <?=$usesigcheck?>> 使用个人签名</label></p>
				<p><label><input class="checkbox" type="checkbox" name="emailnotify" value="1"> 接收新回复邮件通知</label></p>
			</div>
			<div class="postform">
				<h5>标题
				<? if($thread['special'] == 5) { ?>
					<select name="stand" <?=$firststanddisabled?>><option value="0"<?=$firststandselect['0']?>>中立</option><option  value="1"<?=$firststandselect['1']?>>正方</option><option  value="2"<?=$firststandselect['2']?>>反方</option></select>
				<? } ?>
				<input type="text" id="subject" name="subject" value="" tabindex="1"></h5>
				<p><label>内容</label>
				<textarea rows="7" cols="80" class="autosave" name="message" id="message" onKeyDown="ctlent(event);" tabindex="2"></textarea>
				</p>
				<p class="btns">
					<button type="submit" name="replysubmit" id="postsubmit" value="replysubmit" tabindex="3">发表帖子</button>[完成后可按 Ctrl+Enter 发布]&nbsp;
					<a href="###" id="previewpost" onclick="$('postform').action=$('postform').action + '&previewpost=yes';$('postform').submit();">预览帖子</a>&nbsp;
					<a href="###" id="restoredata" title="恢复上次自动保存的数据" onclick="loadData()">恢复数据</a>&nbsp;
					<a href="###" onclick="$('postform').reset()">清空内容</a>
				</p>
			</div>
			<? if($smileyinsert) { ?>
				<div class="smilies">
					<div id="smilieslist"></div>
					<script type="text/javascript">ajaxget('post.php?action=smilies', 'smilieslist');</script>
				</div>
			<? } ?>
			<script type="text/javascript">
				var textobj = $('message');
				window.onbeforeunload = function () {saveData(textobj.value)};
				if(is_ie >= 5 || is_moz >= 2) {
					lang['post_autosave_none'] = "没有可以恢复的数据！";
					lang['post_autosave_confirm'] = "此操作将覆盖当前帖子内容，确定要恢复数据吗？";
				} else {
					$('restoredata').style.display = 'none';
				}
			</script>
		</div>
	</form>
<? } if($forum['ismoderator'] || $forumjump && !$jsmenu['1'] || $visitedforums) { ?>
	<script type="text/javascript">
		function modaction(action) {
			if(!action) {
				return;
			}
			if(!in_array(action, ['delpost', 'banpost'])) {
				window.location=('topicadmin.php?tid=<?=$tid?>&fid=<?=$fid?>&action='+ action +'&sid=<?=$sid?>');
			} else {
				document.modactions.action = 'topicadmin.php?action='+ action +'&fid=<?=$fid?>&tid=<?=$tid?>&page=<?=$page?>;'
				document.modactions.submit();
			}
		}
	</script>
	<div id="footfilter" class="box">
	<? if($forum['ismoderator']) { ?>
		<form action="#">管理选项:
		<select name="action" id="action" onchange="modaction(this.options[this.selectedIndex].value)">
		<option value="" selected>管理选项</option>
		<? if($allowdelpost) { ?>
			<option value="delpost">删除回帖</option>
			<option value="delete">删除主题</option>
		<? } ?>
		<option value="banpost">屏蔽帖子</option>
		<option value="close">关闭主题</option>
		<option value="move">移动主题</option>
		<? if(!$thread['special']) { ?><option value="copy">复制主题</option><? } ?>
		<option value="highlight">高亮显示</option>
		<option value="type">主题分类</option>
		<option value="digest">设置精华</option>
		<? if($allowstickthread) { ?><option value="stick">主题置顶</option><? } ?>
		<? if($thread['price'] > 0 && $allowrefund && $thread['special'] == 0) { ?><option value="refund">强制退款</option><? } ?>
		<? if(!$thread['special']) { ?><option value="split">分割主题</option><? } ?>
		<? if(!$thread['special']) { ?><option value="merge">合并主题</option><? } ?>
		<? if($thread['special'] == 3 && $thread['price'] > 0) { ?><option value="removereward">取消悬赏</option><? } ?>
		<option value="bump">提升主题</option>
		<option value="repair">修复主题</option>
		<? if($forum['modrecommend']['sort'] != 1) { ?><option value="recommend">推荐主题</option><? } ?>
		<? if($supe['status'] && $allowpushthread && $forum['supe_pushsetting']['status'] == 2 && $thread['supe_pushstatus'] == 0) { ?>
			<option value="supe_push">推送/解除</option>
		<? } ?>
		</select>
		</form>
	<? } ?>
	<? if($forumjump && !$jsmenu['1']) { ?>
		<select onchange="if(this.options[this.selectedIndex].value != '') {
		window.location=('forumdisplay.php?fid='+this.options[this.selectedIndex].value+'&amp;sid=<?=$sid?>') }">
		<option value="">版块跳转 ...</option>
		<?=$forumselect?>
		</select>&nbsp;
	<? } ?>
	<? if($visitedforums) { ?>
		<select onchange="if(this.options[this.selectedIndex].value != '') {
		window.location=('forumdisplay.php?fid='+this.options[this.selectedIndex].value+'&amp;sid=<?=$sid?>') }">
		<option value="">最近访问的版块 ...</option>
		<?=$visitedforums?>
		</select>
	<? } ?>
</div>
<? } if($forumjump && $jsmenu['1']) { ?>
	<div class="popupmenu_popup" id="forumlist_menu" style="display: none">
		<?=$forummenu?>
	</div>
<? } if(!$iscircle || !empty($frombbs)) { include template('footer'); } else { include template('supesite_footer'); } ?>
<script src="include/javascript/msn.js" type="text/javascript"></script>
<? if($relatedthreadupdate) { ?>
<script src="relatethread.php?tid=<?=$tid?>&subjectenc=<?=$thread['subjectenc']?>&tagsenc=<?=$thread['tagsenc']?>&verifykey=<?=$verifykey?>&up=<?=$qihoo_up?>" type="text/javascript"></script>
<? } ?>
