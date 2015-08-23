<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<div class="float" id="floatlayout_topicadmin">
<div class="floatboxnarrow">
<h3 class="float_ctrl">
<em id="return_mods">选择了 <?=$modpostsnum?> 篇帖子</em>
<span>
<a href="javascript:;" class="float_close" onclick="floatwin('close_mods')" title="关闭">关闭</a>
</span>
</h3>
<form id="moderateform" method="post" action="topicadmin.php?action=moderate&amp;optgroup=<?=$optgroup?>&amp;modsubmit=yes&amp;infloat=yes" onsubmit="ajaxpost('moderateform', 'return_mods', 'return_mods', 'onerror');return false;">
<input type="hidden" name="frommodcp" value="<?=$frommodcp?>" />
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="fid" value="<?=$fid?>" />
<input type="hidden" name="listextra" value="<?=$listextra?>" />
<? if(!empty($infloat)) { ?><input type="hidden" name="handlekey" value="<?=$handlekey?>" /><? } if(is_array($threadlist)) { foreach($threadlist as $thread) { ?><input type="hidden" name="moderate[]" value="<?=$thread['tid']?>" /><? } } ?><div class="postbox">
<? if($optgroup == 1) { ?>
<ul class="listtopicadmin">
<? if($allowstickthread) { ?>
<li id="itemcp_stick">
<table cellspacing="0" cellpadding="5">
<tr>
<td width="15"><input name="operations[]" onclick="if(this.checked) switchitemcp('itemcp_stick')" type="checkbox" value="stick" <?=$defaultcheck['stick']?> /></td>
<td>
<label onclick="switchitemcp('itemcp_stick')" class="labeltxt">置顶</label>
<div class="detailopt">
<select name="sticklevel">
<option value="0">无</option>
<option value="1" <?=$stickcheck['1']?>><?=$threadsticky['2']?></option>
<? if($allowstickthread >= 2) { ?>
<option value="2" <?=$stickcheck['2']?>><?=$threadsticky['1']?></option>
<? if($allowstickthread == 3) { ?>
<option value="3" <?=$stickcheck['3']?>><?=$threadsticky['0']?></option>
<? } } ?>
</select>
</div>
</td>
</tr>
<tr class="detailopt">
<td></td>
<td>
<p class="hasdropdownbtn">
<label for="expirationstick" class="labeltxt">有效期</label>
<input onclick="InFloat='floatlayout_mods';showcalendar(event, this, true)" type="text" autocomplete="off" id="expirationstick" name="expirationstick" class="txt" value="<?=$expirationstick?>" tabindex="1" />
<a href="javascript:;" class="dropdownbtn" onclick="InFloat='floatlayout_mods';showselect(this, 'expirationstick')">^</a>
</p>
</td>
</tr>
</table>
</li>
<? } ?>
<li id="itemcp_highlight">
<table cellspacing="0" cellpadding="5">
<tr>
<td width="15"><input name="operations[]" onclick="if(this.checked) switchitemcp('itemcp_highlight')" type="checkbox" value="highlight" <?=$defaultcheck['highlight']?> /></td>
<td><? $colorarray = array(1=>'#EE1B2E', 2=>'#EE5023', 3=>'#996600', 4=>'#3C9D40', 5=>'#2897C5', 6=>'#2B65B7', 7=>'#8F2A90', 8=>'#EC1282'); ?><label onclick="switchitemcp('itemcp_highlight')" class="labeltxt">高亮</label>
<div class="detailopt">
<span class="hasdropdownbtn">
<input type="hidden" id="highlight_color" name="highlight_color" value="<?=$colorcheck?>" />
<input type="hidden" id="highlight_style_1" name="highlight_style[1]" value="<?=$stylecheck['1']?>" />
<input type="hidden" id="highlight_style_2" name="highlight_style[2]" value="<?=$stylecheck['2']?>" />
<input type="hidden" id="highlight_style_3" name="highlight_style[3]" value="<?=$stylecheck['3']?>" />
<input id="color_bg" type="text" class="txt" readonly="readonly" <? if($colorcheck) { ?>style="background: <?=$colorarray[$colorcheck]?>" <? } ?>/>
<a href="javascript:;" onclick="display('color_menu')" class="dropdownbtn">^</a>
</span>
<div id="color_menu" class="color_menu" style="display: none">
<a href="javascript:;" onclick="switchhl(1, this, 0);removehl()" title="取消高亮" style="background:<?=LINK?>;text-indent:0;color:#F00;text-decoration:none;">X</a><? if(is_array($colorarray)) { foreach($colorarray as $key => $color) { ?><a href="javascript:;" onclick="switchhl(1, this, <?=$key?>)" style="background:<?=$color?>;color:<?=$color?>;"><?=$color?></a><? } } ?></div>
<a href="javascript:;" id="highlight_op_1" onclick="switchhl(2, this, 1)" class="detailopt_bold<? if($stylecheck['1']) { ?> current<? } ?>" style="text-indent:0;text-decoration:none;font-weight:700;" title="粗体">B</a>
<a href="javascript:;" id="highlight_op_2" onclick="switchhl(2, this, 2)" class="detailopt_italic<? if($stylecheck['2']) { ?> current<? } ?>" style="text-indent:0;text-decoration:none;font-style:italic;" title="斜体">I</a>
<a href="javascript:;" id="highlight_op_3" onclick="switchhl(2, this, 3)" class="detailopt_underline<? if($stylecheck['3']) { ?> current<? } ?>" style="text-indent:0;text-decoration:underline;" title="下划线">U</a>
</div>
</td>
</tr>
<tr class="detailopt">
<td></td>
<td>
<p class="hasdropdownbtn">
<label for="expirationhighlight" class="labeltxt">有效期</label>
<input onclick="InFloat='floatlayout_mods';showcalendar(event, this, true)" type="text" autocomplete="off" id="expirationhighlight" name="expirationhighlight" class="txt" value="<?=$expirationhighlight?>" tabindex="1" />
<a href="javascript:;" class="dropdownbtn" onclick="InFloat='floatlayout_mods';showselect(this, 'expirationhighlight')">^</a>
</p>
</td>
</tr>
</table>
</li>
<li id="itemcp_digest">
<table cellspacing="0" cellpadding="5">
<tr>
<td width="15"><input name="operations[]" onclick="if(this.checked) switchitemcp('itemcp_digest')" type="checkbox" value="digest" <?=$defaultcheck['digest']?> /></td>
<td>
<label onclick="switchitemcp('itemcp_digest')" class="labeltxt">精华</label>
<div class="detailopt">
<select name="digestlevel">
<option value="0">解除</option>
<option value="1" <?=$digestcheck['1']?>>精华 1</option>
<option value="2" <?=$digestcheck['2']?>>精华 2</option>
<option value="3" <?=$digestcheck['3']?>>精华 3</option>
</select>
</div>
</td>
</tr>
<tr class="detailopt">
<td></td>
<td>
<p class="hasdropdownbtn">
<label for="expirationdigest" class="labeltxt">有效期</label>
<input onclick="InFloat='floatlayout_mods';showcalendar(event, this, true)" type="text" autocomplete="off" id="expirationdigest" name="expirationdigest" class="txt" value="<?=$expirationdigest?>" tabindex="1" />
<a href="javascript:;" class="dropdownbtn" onclick="InFloat='floatlayout_mods';showselect(this, 'expirationdigest')">^</a>
</p>
</td>
</tr>
</table>
</li>
<? if($forum['modrecommend']['open'] && $forum['modrecommend']['sort'] != 1) { ?>
<li id="itemcp_recommend">
<table cellspacing="0" cellpadding="5">
<tr>
<td width="15"><input name="operations[]" onclick="if(this.checked) switchitemcp('itemcp_recommend')" type="checkbox" value="recommend" <?=$defaultcheck['recommend']?> /></td>
<td>
<label onclick="switchitemcp('itemcp_recommend')"  class="labeltxt">推荐</label>
<div class="detailopt">
<label><input class="radio" type="radio" name="isrecommend" value="1" checked="checked" /> 推荐</label>
<label><input class="radio" type="radio" name="isrecommend" value="0" /> 解除</label>
</div>
</td>
</tr>
<tr class="detailopt">
<td></td>
<td>
<p class="hasdropdownbtn">
<label for="expirationrecommend" class="labeltxt">有效期</label>
<input onclick="InFloat='floatlayout_mods';showcalendar(event, this, true)" type="text" autocomplete="off" id="expirationrecommend" name="expirationrecommend" class="txt" value="<?=$expirationrecommend?>" tabindex="1" />
<a href="javascript:;" class="dropdownbtn" onclick="InFloat='floatlayout_mods';showselect(this, 'expirationrecommend')">^</a>
</p>
</td>
</tr>
</table>
</table>
</li>
<? } ?>
<li>
<table cellspacing="0" cellpadding="5">
<tr>
<td width="15"><input name="operations[]" type="checkbox" value="bump" <?=$defaultcheck['bump']?> /></td>
<td><label for="">提升</label></td>
</tr>
</table>
</li>
</ul>
<? } elseif($optgroup == 2) { ?>
<div class="topicadminlow">
<? if($operation != 'type') { ?>
<input type="hidden" name="operations[]" value="move" />
<p class="tah_body tah_fixiesel">
目标版块: <select id="moveto" name="moveto" onchange="if(this.value) {$('moveext').style.display='';} else {$('moveext').style.display='none';}">
<?=$forumselect?>
</select>
</p>
<p class="tah_body">
<ul class="inlinelist" id="moveext" style="display:none;margin:5px 0;">
<li class="wide"><label><input class="radio" type="radio" name="type" value="normal" checked="checked" /> 移动主题</label></li>
<li class="wide"><label><input class="radio" type="radio" name="type" value="redirect" /> 保留转向</label></li>
</ul>
</p>
<? } else { if($typeselect) { ?>
<input type="hidden" name="operations[]" value="type" />
<p>分类: <?=$typeselect?></p>
<? } else { ?>
当前版块无分类设置，请联系管理员到后台设置主题分类<? $hiddensubmit = true; } } ?>

</div>
<? } elseif($optgroup == 3) { ?>
<div class="topicadminlow">
<ul class="inlinelist">
<? if($operation == 'delete') { if($allowdelpost) { ?>
<input name="operations[]" type="hidden" value="delete"/>
<p>您确认要 <strong>删除</strong> 选择的主题么?</p>
<? } else { ?>
<p>您没有删除此主题权限</p>
<? } } elseif($operation == 'down' || $operation='bump') { ?>
<li class="wide"><label><input class="radio" type="radio" name="operations[]" value="bump" checked="checked"/> 提升主题</label></li>
<li class="wide"><label><input class="radio" type="radio" name="operations[]" value="down" /> 下沉主题</label></li>
<? } ?>
</ul>
</div>
<? } elseif($optgroup == 4) { ?>
<table cellspacing="0" cellpadding="0">
<tr>
<td>有效期:&nbsp;</td>
<td>
<p class="hasdropdownbtn">
<input onclick="InFloat='floatlayout_mods';showcalendar(event, this, true)" type="text" autocomplete="off" id="expirationclose" name="expirationclose" class="txt" value="<?=$expirationclose?>" tabindex="1" />
<a href="javascript:;" class="dropdownbtn" onclick="InFloat='floatlayout_mods';showselect(this, 'expirationclose')">^</a>
</p>
</td>
</tr>
<tr>
<td colspan="2" style="padding: 5px 0;">
<ul class="inlinelist">
<li class="wide"><label><input class="radio" type="radio" name="operations[]" value="open" <?=$closecheck['0']?> />打开主题</label></li>
<li class="wide"><label><input class="radio" type="radio" name="operations[]" value="close" <?=$closecheck['1']?> />关闭主题</label></li>
</ul>
</td>
</tr>
</table>
<? } ?>
<div class="topicadminlog">
<? if(empty($hiddensubmit)) { ?>
<h4>
<span class="hasdropdownbtn right"><a onclick="InFloat='floatlayout_mods';showselect(this, 'reason', 'reasonselect')" class="dropdownbtn" href="javascript:;">^</a></span>
操作原因:
</h4>
<p><textarea id="reason" name="reason" class="txtarea" onkeyup="seditor_ctlent(event, '$(\'moderateform\').submit()')"></textarea></p>
<ul id="reasonselect" style="display: none"><? echo modreasonselect(); ?></ul>
<p>
<input name="modsubmit" type="submit" value="确定" />
<input type="checkbox" name="sendreasonpm" id="sendreasonpm" class="checkbox"<? if($reasonpm == 2 || $reasonpm == 3) { ?> checked="checked" disabled="disabled"<? } ?> /> <label for="sendreasonpm" />通知作者</label>
</p>
<? } ?>
</div>
</div>
</form>
</div>
</div>

<script src="include/js/calendar.js?<?=VERHASH?>" type="text/javascript" reload="1"></script>

<script type="text/javascript" reload="1">
function submithandle_mods(locationhref) {
floatwinreset = 1;
floatwin('close_mods');
<? if(!empty($from)) { ?>
location.href = 'viewthread.php?tid=<?=$from?>&extra=<?=$listextra?>';
<? } else { ?>
location.href = locationhref;
<? } ?>
}
var lastsel = null;
function switchitemcp(id) {
if(lastsel) {
lastsel.className = '';
}
$(id).className = 'currentopt';
lastsel = $(id);
}
<? if(!empty($operation)) { ?>
if($('itemcp_<?=$operation?>')) {
switchitemcp('itemcp_<?=$operation?>');
}
<? } ?>
function switchhl(op, obj, v) {
if(op == 1) {
$('highlight_color').value = v;
$('color_bg').style.backgroundColor = obj.style.backgroundColor;
$('color_menu').style.display = 'none';
} else if(op == 2) {
if(parseInt($('highlight_style_' + v).value)) {
$('highlight_style_' + v).value = 0;
obj.className = obj.className.replace(/ current/, '');
} else {
$('highlight_style_' + v).value = 1;
obj.className += ' current';
}
}
}
function removehl() {
$('highlight_style_' + 1).value = $('highlight_style_' + 2).value = $('highlight_style_' + 3).value = 0;
$('highlight_op_1').className = $('highlight_op_1').className.replace(/ current/, '');
$('highlight_op_2').className = $('highlight_op_2').className.replace(/ current/, '');
$('highlight_op_3').className = $('highlight_op_3').className.replace(/ current/, '');
}
</script>
<? include template('footer'); ?>
