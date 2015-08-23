<? if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('D:\Website\51shangcheng.cn\htdocs\./templates/default/post_forumselect.htm', 'D:\Website\51shangcheng.cn\htdocs\./templates/default/header_nofloat.htm', 1253437883, '2', './templates/uchome')
|| checktplrefresh('D:\Website\51shangcheng.cn\htdocs\./templates/default/post_forumselect.htm', 'D:\Website\51shangcheng.cn\htdocs\./templates/default/footer_nofloat.htm', 1253437883, '2', './templates/uchome')
;?>
<? include template('header'); if(empty($infloat)) { ?><link rel="stylesheet" type="text/css" href="forumdata/cache/style_<?=STYLEID?>_float.css?<?=VERHASH?>" />

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

<div style="display: none">
<ul id="fs_group"><?=$grouplist?></ul>
<ul id="fs_forum_common"><?=$commonlist?></ul><? if(is_array($forumlist)) { foreach($forumlist as $forumid => $forum) { ?><ul id="fs_forum_<?=$forumid?>"><?=$forum?></ul><? } } if(is_array($subforumlist)) { foreach($subforumlist as $forumid => $forum) { ?><ul id="fs_subforum_<?=$forumid?>"><?=$forum?></ul><? } } ?></div>

<div class="float" style="width: 600px;">
<div class="floatbox floatbox1">
<h3 class="float_ctrl">
<em>导航</em>
<span>
<? if(!empty($infloat)) { ?><a href="javascript:;" class="float_close" onclick="floatwin('close_nav')" title="关闭">关闭</a><? } ?>
</span>
</h3>
<div class="postbox">
<p class="s_clear">
<button class="right" id="postbtn" onclick="floatwin('close_nav');floatwin('open_newthread', 'post.php?action=newthread&fid=' + selectfid, 600, 410, '600,0');" disabled="disabled">发帖</button>
<button class="right" id="enterbtn" onclick="locationforums(currentblock, currentfid)" disabled="disabled">进入</button>
<span class="switchnav"><?=$bbname?><span id="switchnav"></span></span>
</p>
<ul class="postboardlist s_clear">
<li id="block_group"></li>
<li id="block_forum"></li>
<li id="block_subforum"></li>
</ul>
</div>
</div>
</div>

<script type="text/javascript" reload="1">
var s = '<p><a id="commonforum" href="javascript:;" onclick="switchforums(this, 1, \'common\')" class="hassubboard lightlink">常用版块</a></p>';
var lis = $('fs_group').getElementsByTagName('LI');
for(i = 0;i < lis.length;i++) {
var gid = lis[i].getAttribute('fid');
if($('fs_forum_' + gid)) {
s += '<p><a href="javascript:;" ondblclick="locationforums(1, ' + gid + ')" onclick="switchforums(this, 1, ' + gid + ')" class="hassubboard">' + lis[i].innerHTML + '</a></p>';
}

}
$('block_group').innerHTML = s;
var lastswitchobj = null;
var selectfid = 0;
var switchforum = switchsubforum = '';

switchforums($('commonforum'), 1, 'common');

function switchforums(obj, block, fid) {
if(lastswitchobj != obj) {
if(lastswitchobj) {
lastswitchobj.parentNode.className = '';
}
obj.parentNode.className = 'pbl_selected';
}
var s = '';
if(fid != 'common') {
$('enterbtn').removeAttribute("disabled");
currentblock = block;
currentfid = fid;
} else {
$('enterbtn').setAttribute("disabled", "disabled");
}
if(block == 1) {
var lis = $('fs_forum_' + fid).getElementsByTagName('LI');
for(i = 0;i < lis.length;i++) {
fid = lis[i].getAttribute('fid');
if(fid != '') {
s += '<p><a href="javascript:;" ondblclick="locationforums(2, ' + fid + '\)" onclick="switchforums(this, 2, ' + fid + ')"' + ($('fs_subforum_' + fid) ?  ' class="hassubboard"' : '') + '>' + lis[i].innerHTML + '</a></p>';
}
}
$('block_forum').innerHTML = s;
$('block_subforum').innerHTML = '';
switchforum = switchsubforum = '';
selectfid = 0;
$('postbtn').setAttribute("disabled", "disabled");
} else if(block == 2) {
selectfid = fid;
if($('fs_subforum_' + fid)) {
var lis = $('fs_subforum_' + fid).getElementsByTagName('LI');
for(i = 0;i < lis.length;i++) {
fid = lis[i].getAttribute('fid');
s += '<p><a href="javascript:;" ondblclick="locationforums(3, ' + fid + ')" onclick="switchforums(this, 3, ' + fid + ')">' + lis[i].innerHTML + '</a></p>';
}
$('block_subforum').innerHTML = s;
} else {
$('block_subforum').innerHTML = '';
}
switchforum = obj.innerHTML;
switchsubforum = '';
$('postbtn').removeAttribute("disabled");
} else {
selectfid = fid;
switchsubforum = obj.innerHTML;
$('postbtn').removeAttribute("disabled");
}
lastswitchobj = obj;
$('switchnav').innerHTML = switchforum ? '&nbsp;&gt;&nbsp;' + switchforum + (switchsubforum ? '&nbsp;&gt;&nbsp;' + switchsubforum : '') : '';
}

function locationforums(block, fid) {
location.href = block == 1 ? '<?=$indexname?>?gid=' + fid : 'forumdisplay.php?fid=' + fid;
}

</script>

<? if(empty($infloat)) { ?></div>

</div></div></div>

</div><? } include template('footer'); ?>
