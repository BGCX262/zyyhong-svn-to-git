<? if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('D:\Website\51shangcheng.cn\htdocs\./templates/default/register.htm', 'D:\Website\51shangcheng.cn\htdocs\./templates/default/header_nofloat.htm', 1250727845, '2', './templates/uchome')
|| checktplrefresh('D:\Website\51shangcheng.cn\htdocs\./templates/default/register.htm', 'D:\Website\51shangcheng.cn\htdocs\./templates/default/seccheck.htm', 1250727845, '2', './templates/uchome')
|| checktplrefresh('D:\Website\51shangcheng.cn\htdocs\./templates/default/register.htm', 'D:\Website\51shangcheng.cn\htdocs\./templates/default/footer_nofloat.htm', 1250727845, '2', './templates/uchome')
;?>
<? include template('header'); if(!empty($message)) { ?>
<script type="text/javascript" onload="1">
InFloat = 'floatlayout_register';
pagescroll.right();<? $bbname = str_replace('\'', '\\\'', $bbname); if($regverify == 1) { ?>
$('messageleft1').innerHTML = '<h1>感谢您注册 <?=$bbname?></h1>您的帐号处于非激活状态，请收取邮件激活您的帐号';
$('messageright1').innerHTML = '<h1><a href="memcp.php">个人中心</a></h1><p>如果您没有收到我们发送的系统邮件，请进入个人中心点击“重新验证 Email”或在“密码和安全问题”中更换另外一个 Email 地址。注意：在完成激活之前，根据管理员设置，您将只能以待验证会员的身份访问论坛，您可能不能进行发帖等操作。激活成功后，上述限制将自动取消。</p>';
setTimeout("window.location.href='memcp.php'", <?=$mrefreshtime?>);
<? } elseif($regverify == 2) { ?>
$('messageleft1').innerHTML = '<h1>感谢您注册 <?=$bbname?></h1>请等待管理员审核您的帐号';
$('messageright1').innerHTML = '<h1><a href="memcp.php">个人中心</a></h1>';
setTimeout("window.location.href='memcp.php'", <?=$mrefreshtime?>);
<? } else { if($newbietask) { ?>
$('messageleft1').innerHTML = '<h1>感谢您注册 <?=$bbname?></h1>我们诚邀您参与新手任务 <?=$task['name']?>，现在将转入任务详情页面。';
$('messageright1').innerHTML = '<h1><a href="javascript:;" onclick="location.href=\'task.php?action=view&id=<?=$task['taskid']?>\'">如果该页面长时间没有响应，请点这里刷新</a></h1>';
setTimeout('location.href=\'task.php?action=view&id=<?=$task['taskid']?>\'', <?=$mrefreshtime?>);
<? } else { ?>
$('messageleft1').innerHTML = '<h1>感谢您注册 <?=$bbname?></h1>';
$('messageright1').innerHTML = '<h1><a href="javascript:;" onclick="location.reload()">如果该页面长时间没有响应，请点这里刷新</a></h1>';
setTimeout('location.reload()', <?=$mrefreshtime?>);
<? } } if($_DCACHE['settings']['frameon'] && $_DCOOKIE['frameon'] == 'yes') { ?>
if(top != self) {
parent.leftmenu.location.reload();
}
<? } ?>
floatwinreset = 1;
</script>
<? } else { if(empty($infloat)) { ?><link rel="stylesheet" type="text/css" href="forumdata/cache/style_<?=STYLEID?>_float.css?<?=VERHASH?>" />

<style type="text/css">
.main { overflow: hidden; }
.content { margin: 5px; min-height: 400px; <?=FLOATBGCODE?>; }
* html .content { height: 400px; overflow: auto; }
.fixedbtn { position: static; }
</style>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> <?=$navigation?></div>
<div id="wrap" class="wrap s_clear">

<div class="main"><div class="content"><div class="nojs">

<div id="floatwinnojs"><? } ?>
<div class="float" id="floatlayout_register" style="width: 600px;<? if(!empty($infloat)) { ?> height: 400px;<? } ?>">
<div style="width: 1800px">
<div class="floatbox floatbox1">
<h3 class="float_ctrl">
<span>
<? if(!empty($infloat)) { ?><a href="javascript:;" class="float_close" onclick="floatwin('close_register')" title="关闭">关闭</a><? } ?>
</span>
</h3>
<div id="bbrule" class="gateform">
<h3><?=$bbname?> 网站服务条款</h3>
<div class="clause"><?=$bbrulestxt?></div>
<button onclick="$('agreebbrule').checked = true;$('bbrule').style.display='none';pagescroll.right()">同意</button> &nbsp; <button onclick="floatwin('close_register')">不同意</button>
</div>
</div>
<div class="floatbox floatbox1">
<h3 class="float_ctrl">
<span>
<? if(!empty($infloat)) { ?><a href="javascript:;" class="float_close" onclick="floatwin('close_register')" title="关闭">关闭</a><? } ?>
</span>
</h3>
<form method="post" name="register" id="registerform" class="gateform" onsubmit="ajaxpost('registerform', 'returnmessage4', 'returnmessage4', 'onerror');return false;" action="<?=$regname?>?regsubmit=yes">
<h3 id="returnmessage4"><? if($action != 'activation') { ?><?=$reglinkname?><? } else { ?>您的帐号需要激活<? } ?></h3>
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="referer" value="<?=$referer?>" />
<? if(!empty($infloat)) { ?><input type="hidden" name="handlekey" value="<?=$handlekey?>" /><? } ?>
<input type="hidden" name="activationauth" value="<? if($action == 'activation') { ?><?=$activationauth?><? } ?>" />
<div class="loginform regform">
<div id="reginfo_a" class="regform" style="overflow:hidden">
<span id="activation_hidden"<? if($action == 'activation') { ?> style="display:none"<? } ?>>
<? if(!empty($fromuser)) { ?>
<span>
<label><em>推荐人:</em><?=$fromuser?></label>
<input type="hidden" name="fromuser"value="<?=$fromuser?>" />
</span>
<? } ?>
<label><em>用户名:</em><input type="text" id="username" name="username" autocomplete="off" size="25" maxlength="15" value="" onBlur="checkusername()" tabindex="1" class="txt" /> *</label>
<label><em>密码:</em><input type="password" name="password" size="25" id="password" onkeypress="detectcapslock(event, this)" tabindex="1" class="txt" /> *</label>
<label><em>确认密码:</em><input type="password" name="password2" size="25" id="password2" onkeypress="detectcapslock(event, this)" tabindex="1" value="" class="txt" /> *</label>
<label><em>Email:</em><input type="text" name="email" autocomplete="off" size="25" id="email" onBlur="checkemail()" tabindex="1" class="txt" /> *</label>
<label><em>&nbsp;</em><a href="https://domains.live.com/members/signup.aspx?domain=<?=$msn['domain']?>" target="_blank" style="float: left; overflow: hidden; width: 223px; white-space: nowrap;"><? if($msn['on']) { ?>注册 @<?=$msn['domain']?> 超大 Hotmail 邮箱<? } else { ?>注册超大 Hotmail 邮箱<? } ?></a></label>
</span>
<? if($action == 'activation') { ?>
<span id="activation_user">
<label><em>用户名:</em><?=$username?></label>
</span>
<? } if($secqaacheck || $seccodecheck) { if(!empty($infloat)) { $secchecktype = 1; } else { $seccheckreg = 2; } ?>
<div class="regsec"><label style="display:inline"><em>验证: </em><script type="text/javascript" reload="1">
function updateseccode<?=$secchecktype?>(op) {
if(isUndefined(op)) {
var x = new Ajax();
ajaxget('ajax.php?action=updateseccode&secchecktype=<?=$secchecktype?>', 'seccodeverify<?=$secchecktype?>_menu', 'seccodeverify<?=$secchecktype?>_menu');
} else {
window.document.seccodeplayer.SetVariable("isPlay", "1");
}
$('seccodeverify<?=$secchecktype?>').focus();
}

function updatesecqaa<?=$secchecktype?>() {
var x = new Ajax();
ajaxget('ajax.php?action=updatesecqaa', 'secanswer<?=$secchecktype?>_menu', 'secanswer<?=$secchecktype?>_menu');
}

var secclick<?=$secchecktype?> = new Array();
var seccodefocus = 0;
function opensecwin<?=$secchecktype?>(id, type) {
if(!secclick<?=$secchecktype?>[id]) {
$(id).value = '';
secclick<?=$secchecktype?>[id] = 1;
if(type) {
$(id + '_menu').style.top = (parseInt($(id + '_menu').style.top) - parseInt($(id + '_menu').style.height)) + 'px';
updateseccode<?=$secchecktype?>();
} else {
updatesecqaa<?=$secchecktype?>();
}
}
<? if(empty($secchecktype)) { if(!empty($infloat)) { ?>
InFloat='<?=$seccheckfloat?>';
<? } if($seccheckfloat) { ?>
$(id + '_menu').style.position = 'absolute';
$(id + '_menu').style.top = (-parseInt($(id + '_menu').style.height)) + 'px';
<? if($secqaacheck) { ?>
if(type) {
$(id + '_menu').style.left = $(id).offsetLeft + 'px';
} else {
$(id + '_menu').style.left = '0px';
}
<? } else { ?>
$(id + '_menu').style.left = '0px';
<? } } } elseif($secchecktype == 1) { if(!empty($infloat)) { ?>
InFloat='floatlayout_register';
<? } ?>
showMenu(id, 0, 2, 3);
<? } elseif($secchecktype == 3) { ?>
showMenu(id, 0, 2, 3);
<? } ?>

$(id + '_menu').style.display = '';
$(id).focus();
$(id).unselectable = 'off';
}
</script>

<? if($secqaacheck) { ?>
<input name="secanswer" id="secanswer<?=$secchecktype?>" type="text" autocomplete="off" style="width:50px" value="验证问答" class="txt" onfocus="opensecwin<?=$secchecktype?>(this.id, 0)" onclick="opensecwin<?=$secchecktype?>(this.id, 0)" onblur="display(this.id + '_menu');checksecanswer<?=$secchecktype?>();" tabindex="1">
<span id="checksecanswer<?=$secchecktype?>"><img src="images/common/none.gif" width="16" height="16"></span>
<div id="secanswer<?=$secchecktype?>_menu" class="seccodecontent" style="width:200px;height:80px;display:none"></div>
<? } if($seccodecheck) { ?>
<input name="seccodeverify" id="seccodeverify<?=$secchecktype?>" type="text" autocomplete="off" style="width:50px" value="验证码" class="txt" onfocus="opensecwin<?=$secchecktype?>(this.id, 1)" onclick="opensecwin<?=$secchecktype?>(this.id, 1)" onblur="if(!seccodefocus) {display(this.id + '_menu')}checkseccode<?=$secchecktype?>();" tabindex="1">
<a href="javascript:;" onclick="updateseccode<?=$secchecktype?>()">换一个</a>
<span id="checkseccodeverify<?=$secchecktype?>"><img src="images/common/none.gif" width="16" height="16"></span>
<div id="seccodeverify<?=$secchecktype?>_menu" class="seccodecontent" onmouseover="seccodefocus = 1" onmouseout="seccodefocus = 0" style="cursor: pointer;top: 256px;width:<?=$seccodedata['width']?>px;height:<?=$seccodedata['height']?>px;display:none"></div>
<? } ?>

<script type="text/javascript" reload="1">
var profile_seccode_invalid = '验证码输入错误，请重新填写。';
var profile_secanswer_invalid = '验证问答回答错误，请重新填写。';
var lastseccode = lastsecanswer = '';
function checkseccode<?=$secchecktype?>() {
var seccodeverify = $('seccodeverify<?=$secchecktype?>').value;
if(seccodeverify == lastseccode) {
return;
} else {
lastseccode = seccodeverify;
}
var cs = $('checkseccodeverify<?=$secchecktype?>');
<? if($seccodedata['type'] != 1) { ?>
if(!(/[0-9A-Za-z]{4}/.test(seccodeverify))) {
warning<?=$secchecktype?>(cs, profile_seccode_invalid);
return;
}
<? } else { ?>
if(seccodeverify.length != 2) {
warning<?=$secchecktype?>(cs, profile_seccode_invalid);
return;
}
<? } ?>
ajaxresponse<?=$secchecktype?>('checkseccodeverify<?=$secchecktype?>', 'action=checkseccode&seccodeverify=' + (is_ie && document.charset == 'utf-8' ? encodeURIComponent(seccodeverify) : seccodeverify));
}
function checksecanswer<?=$secchecktype?>() {
        var secanswer = $('secanswer<?=$secchecktype?>').value;
if(secanswer == lastsecanswer) {
return;
} else {
lastsecanswer = secanswer;
}
ajaxresponse<?=$secchecktype?>('checksecanswer<?=$secchecktype?>', 'action=checksecanswer&secanswer=' + (is_ie && document.charset == 'utf-8' ? encodeURIComponent(secanswer) : secanswer));
}
function ajaxresponse<?=$secchecktype?>(objname, data) {
var x = new Ajax('XML', objname);
x.get('ajax.php?inajax=1&' + data, function(s){
        var obj = $(objname);
        if(s == 'succeed') {
        	obj.style.display = '';
                obj.innerHTML = '<img src="<?=IMGDIR?>/check_right.gif" width="16" height="16" />';
obj.className = "warning";
} else {
warning(obj, s);
}
});
}
function warning(obj, msg) {
if((ton = obj.id.substr(5, obj.id.length)) != 'password2') {
$(ton).select();
}
obj.style.display = '';
obj.innerHTML = '<img src="<?=IMGDIR?>/check_error.gif" width="16" height="16" />';
obj.className = "warning";
}
</script></label></div>
<? } if(($regstatus > 1 && $action != 'activation') || $regstatus == 2) { ?>
<label><em>邀请码:</em><input type="text" name="invitecode" autocomplete="off" size="25" maxlength="16" value="<?=$invitecode?>" id="invitecode" onBlur="checkinvitecode()" tabindex="1" class="txt" /><? if($regstatus == 2) { ?> *<? } ?></label>
<? } ?>
</div>
<div id="reginfo_b"<? if(!empty($infloat)) { ?> style="display:none;"<? } ?>>
<? if($regverify == 2) { ?>
<label><em>注册原因:</em><input name="regmessage" autocomplete="off" size="25" tabindex="1" class="txt" /> *</label>
<? } if(is_array($_DCACHE['fields_required'])) { foreach($_DCACHE['fields_required'] as $field) { ?><label<? if($field['description']) { ?> title="<? echo htmlspecialchars($field['description']); ?>"<? } ?>><em><?=$field['title']?>:</em>
<? if($field['selective']) { ?>
<select name="field_<?=$field['fieldid']?>new" tabindex="1">
<option value="">- 请选择 -</option><? if(is_array($field['choices'])) { foreach($field['choices'] as $index => $choice) { ?><option value="<?=$index?>"<? if($index == $member['field_'.$field['fieldid']]) { ?> selected="selected"<? } ?>><?=$choice?></option><? } } ?></select>
<? } else { ?>
<input type="text" name="field_<?=$field['fieldid']?>new" size="25" value="<?=$member['field_'.$field['fieldid']]?>" tabindex="1" class="txt" />
<? } ?> *
</label><? } } ?></div>
</div>
<div class="logininfo singleinfo">
<h4>已有帐号？<a href="logging.php?action=login" onclick="floatwin('close_register');floatwin('open_login', this.href, 600, 400);return false;">现在登录</a></h4>
<? if($action == 'activation') { ?>
<p>放弃激活，<a href="javascript:;" onclick="$('registerform').activationauth.value='';$('activation_hidden').style.display='';$('activation_user').style.display='none'">现在<?=$reglinkname?></a></p>
<? } ?>
</div>
<p class="fsubmit">
<span id="reginfo_a_btn">
<em>&nbsp;</em>
<? if(($field && !empty($infloat)) || $regverify == 2) { ?>
<button class="submit" tabindex="1" onclick="regstep('reginfo_a','reginfo_b'); return false;">下一步</button>
</span>
<span id="reginfo_b_btn" style="display:none">
<em class="regpre"><a href="javascript:;" onclick="regstep('reginfo_b','reginfo_a');">上一步</a></em>
<? } ?>
<button class="submit" id="registerformsubmit" type="submit" name="regsubmit" value="true" tabindex="1">提交</button>
<? if($bbrules) { ?>
<input type="checkbox" class="checkbox" name="agreebbrule" value="<?=$bbrulehash?>" id="agreebbrule" /> <label for="agreebbrule">同意<a href="javascript:;" onclick="pagescroll.left()">网站服务条款</a></label>
<? } ?>
</span>
</p>
</form>
<? if($sitemessage['register']) { ?>
<div class="moreconf sitemsg">
<div class="custominfoarea">
<a href="javascript:;" onclick="display('custominfo_register')" onblur="$('custominfo_register').style.display = 'none'"><img src="<?=IMGDIR?>/info.gif" alt="帮助" /></a>
<div id="custominfo_register" class="sitenote">
<div class="cornerlayger"><? echo $sitemessage['register'][array_rand($sitemessage['register'])]; ?></div>
<div class="minicorner"></div>
</div>
</div>
</div>
<? } ?>
</div>
<div class="floatbox floatbox1">
<h3 class="float_ctrl">
<span>
<? if(!empty($infloat)) { ?><a href="javascript:;" class="float_close" onclick="floatwin('close_register')" title="关闭">关闭</a><? } ?>
</span>
</h3>
<div class="validateinfo">
<div id="messageleft1"></div>
<div id="messageright1"></div>
</div>
</div>
</div>

<script type="text/javascript" reload="1">
var pagescroll = new pagescroll_class('floatlayout_register', 600, 400);
<? if(empty($infloat)) { ?>
$('floatlayout_register').scrollLeft = 600;
<? } if($action != 'activation') { ?>
document.body.focus();
$('username').focus();
<? } if($sitemessage['register'] && $sitemessage['time']) { ?>
setTimeout('display_opacity(\'custominfo_register\',100)', <?=$sitemessage['time']?>);
<? } ?>

var profile_username_toolong = '用户名超过 15 个字符';
var profile_username_tooshort = '用户名小于3个字符';
var doublee = parseInt('<?=$doublee?>');
var lastusername = lastpassword = lastemail = lastinvitecode = '';

function messagehandle_register(key, msg) {
$('returnmessage4').className = key == 1 ? 'onerror' : '';
$('returnmessage4').innerHTML = msg;
}

function checkusername() {
var username = trim($('username').value);
if(username == '' || username == lastusername) {
return;
} else {
lastusername = username;
}
var unlen = username.replace(/[^\x00-\xff]/g, "**").length;
if(unlen < 3 || unlen > 15) {
messagehandle_register(1, unlen < 3 ? profile_username_tooshort : profile_username_toolong);
return;
}
        ajaxget('ajax.php?infloat=register&handlekey=register&action=checkusername&username=' + (is_ie && document.charset == 'utf-8' ? encodeURIComponent(username) : username), 'returnmessage4');
}

function checkemail() {
var email = trim($('email').value);
if(email == '' || email == lastemail) {
return;
} else {
lastemail = email;
}
ajaxget('ajax.php?infloat=register&handlekey=register&action=checkemail&email=' + email, 'returnmessage4');

}
function checkinvitecode() {
var invitecode = trim($('invitecode').value);
if(invitecode == lastinvitecode) {
return;
} else {
lastinvitecode = invitecode;
}
        ajaxget('ajax.php?infloat=register&handlekey=register&action=checkinvitecode&invitecode=' + invitecode, 'returnmessage4');
}
function trim(str) {
return str.replace(/^\s*(.*?)[\s\n]*$/g, '$1');
}
<? if(($field && !empty($infloat)) || $regverify == 2) { ?>
function regstep(obja,objb){
$(obja).style.display = $(obja+'_btn').style.display = 'none';
$(objb).style.display = $(objb+'_btn').style.display = '';
}
<? } if($invitecode) { ?>
ajaxget('ajax.php?infloat=register&handlekey=register&action=checkinvitecode&invitecode=<?=$invitecode?>', 'returnmessage4');
<? } ?>
</script>
<? } updatesession(); if(empty($infloat)) { ?></div>

</div></div></div>

</div><? } include template('footer'); ?>
