<? if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('D:\Website\51shangcheng.cn\htdocs\././templates/default/post.htm', 'D:\Website\51shangcheng.cn\htdocs\././templates/default/header_nofloat.htm', 1250676350, '1', './templates/default')
|| checktplrefresh('D:\Website\51shangcheng.cn\htdocs\././templates/default/post.htm', 'D:\Website\51shangcheng.cn\htdocs\././templates/default/seccheck.htm', 1250676350, '1', './templates/default')
|| checktplrefresh('D:\Website\51shangcheng.cn\htdocs\././templates/default/post.htm', 'D:\Website\51shangcheng.cn\htdocs\././templates/default/footer_nofloat.htm', 1250676350, '1', './templates/default')
;?>
<? include template('header'); ?><?
$actiontitle = <<<EOF

EOF;
 if($action == 'newthread') { if($special == 0) { 
$actiontitle .= <<<EOF
发新话题
EOF;
 } elseif($special == 1) { 
$actiontitle .= <<<EOF
发布投票
EOF;
 } elseif($special == 2) { 
$actiontitle .= <<<EOF
发布商品
EOF;
 } elseif($special == 3) { 
$actiontitle .= <<<EOF
发布悬赏
EOF;
 } elseif($special == 4) { 
$actiontitle .= <<<EOF
发布活动
EOF;
 } elseif($special == 5) { 
$actiontitle .= <<<EOF
发布辩论
EOF;
 } elseif($special == 6) { 
$actiontitle .= <<<EOF
发布视频
EOF;
 } } elseif($action == 'reply' && !empty($addtrade)) { 
$actiontitle .= <<<EOF
添加商品
EOF;
 } elseif($action == 'reply') { 
$actiontitle .= <<<EOF
参与/回复主题
EOF;
 } elseif($action == 'edit') { 
$actiontitle .= <<<EOF
编辑帖子
EOF;
 } 
$actiontitle .= <<<EOF

EOF;
?>
<? if(empty($infloat)) { $navigation .= '&raquo; '.$actiontitle; ?><link rel="stylesheet" type="text/css" href="forumdata/cache/style_<?=STYLEID?>_float.css?<?=VERHASH?>" />

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
<script type="text/javascript" reload="1">
var infloat = <? if(!empty($infloat)) { ?>1<? } else { ?>0<? } ?>;
var InFloat_Editor = 'floatlayout_<?=$action?>';
var editoraction = '<?=$action?>';
</script><? $adveditor = $isfirstpost && $special || $special == 2 && ($action == 'newthread' || $action == 'reply' && !empty($addtrade) || $action == 'edit' && $thread['special'] == 2); $advmore = !$showthreadsorts && !$special || $action == 'reply' && empty($addtrade) || $action == 'edit' && !$isfirstpost && ($thread['special'] == 2 && !$special || $thread['special'] != 2); ?><div class="float" id="floatlayout_<?=$action?>" style="<? if(!empty($infloat)) { ?>width: 600px; height: 410px;<? } ?>">
<form method="post" id="postform"
<? if($action == 'newthread') { ?>action="post.php?<? if(!empty($infloat)) { ?>infloat=yes<? } ?>&amp;action=<? if($special != 2) { ?>newthread<? } else { ?>newtrade<? } ?>&amp;fid=<?=$fid?>&amp;extra=<?=$extra?>&amp;topicsubmit=yes"
<? } elseif($action == 'reply') { ?>action="post.php?<? if(!empty($infloat)) { ?>infloat=yes<? } ?>&amp;action=reply&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;extra=<?=$extra?>&amp;replysubmit=yes"
<? } elseif($action == 'edit') { ?>action="post.php?<? if(!empty($infloat)) { ?>infloat=yes<? } ?>&amp;action=edit&amp;extra=<?=$extra?>&amp;editsubmit=yes&amp;mod=<?=$mod?>"
<? } ?>
<?=$enctype?> onsubmit="return validate(this)">
<input type="hidden" name="formhash" id="formhash" value="<?=FORMHASH?>" />
<? if(!empty($modthreadkey)) { ?><input type="hidden" name="modthreadkey" id="modthreadkey" value="<?=$modthreadkey?>" /><? } if(!empty($infloat)) { ?><input type="hidden" name="handlekey" value="<?=$handlekey?>" /><? } ?>
<input type="hidden" name="wysiwyg" id="<?=$editorid?>_mode" value="<?=$editormode?>" />
<? if($action == 'edit') { ?>
<input type="hidden" name="fid" id="fid" value="<?=$fid?>" />
<input type="hidden" name="tid" value="<?=$tid?>" />
<input type="hidden" name="pid" value="<?=$pid?>" />
<? } if($special) { ?>
<input type="hidden" name="special" value="<?=$special?>" />
<? } if($isfirstpost) { ?>
<input type="hidden" name="iconid" id="iconid" value="<?=$thread['iconid']?>" />
<? } ?>
<input type="hidden" name="updateswfattach" value="0" />
<div style="clear:both;<? if(!empty($infloat)) { ?> width:2500px<? } ?>">
<? if(!empty($infloat)) { ?><div class="floatbox floatbox1" id="extcreditbox1"></div><? } ?>
<div class="floatbox floatbox1"<? if(!$showthreadsorts && !$adveditor) { ?> id="editorbox"<? } ?>>
<h3 class="float_ctrl">
<em id="returnmessage">
<?=$actiontitle?>
<? if($showthreadsorts) { ?> <?=$forum['threadsorts']['types'][$sortid]?><? } ?>
</em>
<? if($action == 'newthread' && $modnewthreads) { ?><em class="needverify">需审核</em><? } if($action == 'reply' && $modnewreplies) { ?><em class="needverify">需审核</em><? } ?>
<span>
<a href="javascript:;" id="creditlink" onclick="pagescrolls('credit1')" title="积分说明">积分说明</a>
<? if(!empty($infloat)) { ?>
<a href="javascript:;" class="float_newwindow" onclick="editorwindowopen('post.php?<?=$posturl?>')" title="新窗口">新窗口</a>
<? if(!$special && !$showthreadsorts) { ?>
<a href="javascript:;" class="float_max" onclick="resizeEditorwin()" title="最大化" id="resizeEditorwin">最大化</a>
<? } ?>
<a href="javascript:;" class="float_close" onclick="closeEditorwin()" title="关闭">关闭</a>
<? } ?>
</span>
</h3>
<div class="postbox" id="postbox">
<div class="float_postinfo s_clear"<? if($action == 'reply') { ?> style="overflow:hidden"<? } ?>>
<? if(!$special && $isfirstpost) { ?>
<em id="icon" class="dropmenu" onmouseover="InFloat='floatlayout_<?=$action?>';showMenu(this.id)"><img id="icon_img" src="images/icons/<? if($action == 'edit' && $thread['iconid']) { ?><?=$_DCACHE['icons'][$thread['iconid']]?><? } else { ?>icon1.gif<? } ?>" /></em>
<ul id="icon_menu" class="popupmenu_popup" style="display:none"><? if(is_array($_DCACHE['icons'])) { foreach($_DCACHE['icons'] as $id => $icon) { ?><li><a href="javascript:;"><img onclick="switchicon(<?=$id?>, this)" src="images/icons/<?=$icon?>" alt="" /></a></li><? } } ?></ul>
<? } if(!$isfirstpost && $thread['special'] == 5 && empty($firststand) && $action != 'edit') { ?>
<div class="float_typeid short_select">
<select id="stand" name="stand">
<option value="0">中立</option>
<option value="1">正方</option>
<option value="2">反方</option>
</select>
</div>
<? } if($action == 'reply' && !empty($addtrade) || $action == 'edit' && $thread['special'] == 2 && !$postinfo['first']) { ?>
<input name="subject" type="hidden" value="" />
<? } else { if($action != 'reply') { ?>
<span><input name="subject" id="subject" class="txt" value="<?=$postinfo['subject']?>" tabindex="1" /></span>
<? } else { ?>
<span id="subjecthide">RE: <?=$thread['subject']?> [<a href="javascript:;" onclick="display('subjecthide');display('subjectbox');$('subject').value='RE: <? echo htmlspecialchars(str_replace('\'', '\\\'', $thread['subject'])); ?>'">修改</a>]</span>
<span id="subjectbox" style="display:none"><input name="subject" id="subject" class="txt" value="" tabindex="1" /></span>
<? } } if($action == 'edit' && ($isfirstpost && $thread['replies'] < 1 || !$isfirstpost && ($isorigauthor || $forum['ismoderator']))) { ?>
<div class="right"><input type="checkbox" name="delete" id="delete" value="1" title="删除本帖<? if($thread['special'] == 3) { ?>，返还悬赏费用，不退还手续费。<? } ?>"><label for="delete">删?</label></div>
<? } ?>
<div class="left">
<? if(!$special && ($threadsorts = $forum['threadsorts']) && ($action == 'newthread' || $action == 'edit' && $isfirstpost && !$thread['sortid'])) { ?>
<div class="float_typeid">
<select name="sortid" id="sortid" change="switchsort()">
<? if(!$sortid) { ?><option value="0">分类信息</option><? } if(is_array($threadsorts['types'])) { foreach($threadsorts['types'] as $tsortid => $name) { if(!empty($modelid) && $threadsorts['modelid'][$tsortid] == $modelid || empty($modelid)) { ?>
<option value="<?=$tsortid?>"<? if($sortid == $tsortid) { ?> selected="selected"<? } ?>><? echo strip_tags($name);; ?></option>
<? } } } ?></select>
</div>
<? } if($action == 'edit' && $isfirstpost && $sortid) { ?>
<input type="hidden" name="sortid" value="<?=$sortid?>" />
<? } if($isfirstpost && $forum['threadtypes']['types']) { ?>
<div class="float_typeid">
<select name="typeid" id="typeid">
<option value="0">分类</option><? if(is_array($forum['threadtypes']['types'])) { foreach($forum['threadtypes']['types'] as $typeid => $name) { ?><option value="<?=$typeid?>"<? if($thread['typeid'] == $typeid) { ?> selected="selected"<? } ?>><? echo strip_tags($name);; ?></option><? } } ?></select>
</div>
<? } ?>
</div>
</div>
<? if($showthreadsorts) { ?>
<div class="classifieds"<? if(empty($infloat)) { ?> style="overflow-y:visible;height:auto;"<? } ?>>
<table cellpadding="0" cellspacing="0" class="formtable">
<tbody id="threadsorts"><span id="threadsortswait"></span></tbody>
</table>
</div>
</div></div></div>

<div style="clear:both;<? if(!empty($infloat)) { ?> width:2500px<? } ?>">
<? if(!empty($infloat)) { ?><div class="floatbox floatbox1" id="extcreditbox3"></div><? } ?>
<div class="floatbox floatbox1" id="editorbox">
<? if(!empty($infloat)) { ?>
<h3 class="float_ctrl">
<em><button id="creditlink" type="button" onclick="pagescrolls('return');return false">返回</button></em>
<span>
<a href="javascript:;" onclick="pagescrolls('credit3')" title="积分说明">积分说明</a>
<? if(!empty($infloat)) { ?>
<a href="javascript:;" class="float_max" onclick="editorwindowopen('post.php?<?=$posturl?>')" title="新窗口">新窗口</a>
<a href="javascript:;" class="float_max" onclick="resizeEditorwin()" title="最大化" id="resizeEditorwin">最大化</a>
<a href="javascript:;" class="float_close" onclick="closeEditorwin()" title="关闭">关闭</a>
<? } ?>
</span>
</h3>
<? } ?>
<div class="postbox">
<? } elseif($adveditor) { if($special == 1) { include template('post_poll'); } elseif($special == 2) { include template('post_trade'); } elseif($special == 3) { include template('post_reward'); } elseif($special == 4) { include template('post_activity'); } elseif($special == 5) { include template('post_debate'); } elseif($special == 6) { include template('post_video'); } ?>
</div>

<div style="clear:both;<? if(!empty($infloat)) { ?> width:2500px<? } ?>">
<? if(!empty($infloat)) { ?><div class="floatbox floatbox1" id="extcreditbox3"></div><? } ?>
<div class="floatbox floatbox1" id="editorbox">
<? if(!empty($infloat)) { ?>
<h3 class="float_ctrl">
<em><button id="creditlink" type="button" onclick="pagescrolls('return');return false">返回</button></em>
<span>
<a href="javascript:;" onclick="pagescrolls('credit3')" title="积分说明">积分说明</a>
<? if(!empty($infloat)) { ?>
<a href="javascript:;" class="float_max" onclick="editorwindowopen('post.php?<?=$posturl?>')" title="新窗口">新窗口</a>
<a href="javascript:;" class="float_max" onclick="resizeEditorwin()" title="最大化" id="resizeEditorwin">最大化</a>
<a href="javascript:;" class="float_close" onclick="closeEditorwin()" title="关闭">关闭</a>
<? } ?>
</span>
</h3>
<? } ?>
<div class="postbox">
<? } ?>
<div id="<?=$editorid?>_controls" class="editorrow">
<div class="editor">
<a id="<?=$editorid?>_switcher" class="plugeditor editormode"><input type="checkbox" name="checkbox" value="0" <? if(!$editormode) { ?>checked="checked"<? } ?> onclick="switchEditor(this.checked?0:1)" />源码</a>
<div class="editorbtn"><? if(is_array($_DCACHE['bbcodes_display'])) { foreach($_DCACHE['bbcodes_display'] as $tag => $bbcode) { if($bbcode['type'] == '1') { if($bbcode['icon'] == 'popup_simple') { ?>
<a id="<?=$editorid?>_cmd_bold" title="粗体"><?=$bbcode['tag']?></a>
<a id="<?=$editorid?>_popup_simple" title="<?=$bbcode['explanation']?>"><?=$bbcode['tag']?></a>
<? } elseif(!($tag == 'media' && !$forum['allowmediacode']) && !($tag == 'hide' && !$allowhidecode)) { ?>
<a id="<?=$editorid?>_<?=$bbcode['icon']?>" title="<?=$bbcode['explanation']?>"><?=$bbcode['tag']?></a>
<? } } elseif($bbcode['type'] == '0' && $forum['allowbbcode'] && $allowcusbbcode) { ?>
<a id="<?=$editorid?>_cmd_custom<?=$bbcode['params']?>_<?=$tag?>" class="customedit" title="<?=$bbcode['explanation']?>"><img src="images/common/<?=$bbcode['icon']?>" title="<?=$bbcode['explanation']?>" alt="<?=$tag?>" /></a>
<? } } } ?></div>
</div>
<div class="editortoolbar">
<div class="popupmenu_popup fontstyle_menu" id="<?=$editorid?>_popup_simple_menu" style="display: none">
<ul unselectable="on">
<li><a id="<?=$editorid?>_cmd_italic" title="斜体">斜体</a></li>
<li><a id="<?=$editorid?>_cmd_underline" title="下划线">下划线</a></li>
</ul>
</div><? $fontoptions = array("仿宋_GB2312", "黑体", "楷体_GB2312", "宋体", "新宋体", "微软雅黑", "Trebuchet MS", "Tahoma", "Arial", "Impact", "Verdana", "Times New Roman") ?><div class="popupmenu_popup fontname_menu" id="<?=$editorid?>_popup_fontname_menu" style="display: none">
<ul unselectable="on"><? if(is_array($fontoptions)) { foreach($fontoptions as $fontname) { ?><li onclick="discuzcode('fontname', '<?=$fontname?>')" style="font-family: <?=$fontname?>" unselectable="on"><?=$fontname?></li><? } } ?></ul>
</div><? $sizeoptions = array(1, 2, 3, 4, 5, 6, 7) ?><div class="popupmenu_popup fontsize_menu" id="<?=$editorid?>_popup_fontsize_menu" style="display: none">
<ul unselectable="on"><? if(is_array($sizeoptions)) { foreach($sizeoptions as $size) { ?><li onclick="discuzcode('fontsize', <?=$size?>)" unselectable="on"><font size="<?=$size?>" unselectable="on"><?=$size?></font></li><? } } ?></ul>
</div><? $coloroptions = array('Black', 'Sienna', 'DarkOliveGreen', 'DarkGreen', 'DarkSlateBlue', 'Navy', 'Indigo', 'DarkSlateGray', 'DarkRed', 'DarkOrange', 'Olive', 'Green', 'Teal', 'Blue', 'SlateGray', 'DimGray', 'Red', 'SandyBrown', 'YellowGreen','SeaGreen', 'MediumTurquoise','RoyalBlue', 'Purple', 'Gray', 'Magenta', 'Orange', 'Yellow', 'Lime', 'Cyan', 'DeepSkyBlue', 'DarkOrchid', 'Silver', 'Pink', 'Wheat', 'LemonChiffon', 'PaleGreen', 'PaleTurquoise', 'LightBlue', 'Plum', 'White') ?><div class="popupmenu_popup" id="<?=$editorid?>_popup_forecolor_menu" style="display: none">
<table cellpadding="0" cellspacing="0" border="0" unselectable="on" style="width: auto;"><tr><? if(is_array($coloroptions)) { foreach($coloroptions as $key => $colorname) { ?><td class="editor_colornormal" onclick="discuzcode('forecolor', '<?=$colorname?>')" unselectable="on"><div style="background-color: <?=$colorname?>" unselectable="on"></div></td><? if(($key + 1) % 8 == 0) { ?></tr><tr><? } } } ?></tr></table></div>

<div class="popupmenu_popup" id="<?=$editorid?>_popup_justify_menu" style="display: none">
<ul unselectable="on">
<li><a id="<?=$editorid?>_cmd_justifyleft" title="居左">居左</a></li>
<li><a id="<?=$editorid?>_cmd_justifycenter" title="居中">居中</a></li>
<li><a id="<?=$editorid?>_cmd_justifyright" title="居右">居右</a></li>
</ul>
</div>

<? if($_DCACHE['bbcodes_display']['smilies']) { ?>
<div class="smilies" id="<?=$editorid?>_popup_smilies_menu" style="display: none">
<div class="smilieslist">
<div id="smiliesdiv"></div>
<script type="text/javascript" reload="1">
smilies_show('smiliesdiv', <?=$smcols?>, 1);
function smilies_onload_smiliesdiv() {
loadselect('smiliesdiv_seltype', 0, 'floatlayout_<?=$action?>');
}
</script>
</div>
</div>
<? } ?>

<div class="popupmenu_popup" id="<?=$editorid?>_popup_dent_menu" style="display: none">
<ul unselectable="on">
<li><a id="<?=$editorid?>_cmd_indent" title="增加缩进">增加缩进</a></li>
<li><a id="<?=$editorid?>_cmd_outdent" title="减少缩进">减少缩进</a></li>
</ul>
</div>

<div class="popupmenu_popup" id="<?=$editorid?>_popup_float_menu" style="display: none">
<ul unselectable="on">
<li><a id="<?=$editorid?>_cmd_floatleft" title="左浮动">左浮动</a></li>
<li><a id="<?=$editorid?>_cmd_floatright" title="右浮动">右浮动</a></li>
</ul>
</div>

<div class="popupmenu_popup" id="<?=$editorid?>_popup_list_menu" style="display: none">
<ul unselectable="on">
<li><a id="<?=$editorid?>_cmd_insertorderedlist" title="排序的列表">排序的列表</a></li>
<li><a id="<?=$editorid?>_cmd_insertunorderedlist" title="未排序列表">未排序列表</a></li>
</ul>
</div>

<div class="popupmenu_popup" id="<?=$editorid?>_popup_hide_menu" style="display: none">
<ul unselectable="on">
<? if($allowhidecode) { ?><li><a id="<?=$editorid?>_popup_hide" title="插入隐藏内容">插入隐藏内容</a></li><? } ?>
<li><a id="<?=$editorid?>_cmd_table" title="插入表格">插入表格</a></li>
<li><a id="<?=$editorid?>_cmd_free" title="插入免费信息">插入免费信息</a></li>
</ul>
</div>

<div class="popupmenu_popup" id="<?=$editorid?>_popup_tools_menu" style="display: none">
<ul unselectable="on">
<a id="<?=$editorid?>_cmd_removeformat" title="清除文本格式">清除文本格式</a>
<a id="<?=$editorid?>_cmd_unlink" title="移除链接">移除链接</a>
<a id="<?=$editorid?>_cmd_undo" title="撤销">撤销</a>
<a id="<?=$editorid?>_cmd_redo" title="重做">重做</a>
<a id="<?=$editorid?>_cmd_checklength" title="字数检查">字数检查</a>
<a id="<?=$editorid?>_cmd_clearcontent" title="清空内容">清空内容</a>
<br />
<a id="<?=$editorid?>_cmd_autosave" title="自动保存">自动保存<em id="autsavet">(已停止)</em></a>
<a id="<?=$editorid?>_cmd_saveData" title="保存数据">保存数据</a>
<a id="<?=$editorid?>_cmd_loadData" title="恢复数据">恢复数据</a>
</ul>
</div>

</div>
</div>

<div class="newediter">
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="table-layout:fixed">
<tr><td><textarea class="autosave<? if(($action != 'edit' || !$attachments) && (!$swfupload || !$swfattachs)) { ?> max<? } ?>" name="message" id="<?=$editorid?>_textarea" tabindex="1"<? if(empty($infloat)) { ?> class="txt" style="height:300px"<? } ?>><? if($action == 'edit') { ?><?=$postinfo['message']?><? } else { ?><?=$message?><? } ?></textarea></td></tr>
</table>
</div>
</div><div class="popupmenu_popup" id="imgpreview_menu" style="position:absolute;width:180px;height:150px;padding:0px;display: none;"></div>

<div class="post_tablelist postbox" id="attachlist"<? if(($action != 'edit' || !$attachments) && (!$swfupload || !$swfattachs)) { ?> style="display: none"<? } ?>>
<? if($allowpostattach) { ?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td class="attachnum"></td>
<td class="attachctrl"></td>
<td class="attachname">文件名</td>
<? if($allowsetattachperm) { ?><td class="attachview">阅读权限</td><? } if($maxprice) { ?><td class="attachpr"><? if($extcredits[$creditstransextra['1']]['img']) { ?><?=$extcredits[$creditstransextra['1']]['img']?> <? } ?><?=$extcredits[$creditstransextra['1']]['title']?></td><? } ?>
<td class="attachdel"></td>
</tr>
</table>
<div id="uploadlist" class="upfilelist"<? if(empty($infloat)) { ?> style="height:auto"<? } ?>>
<? if($action == 'edit') { include template('post_attachlist'); } ?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tbody id="attachbodyhidden" style="display:none"><tr>
<td class="attachnum"><span id="localno[]"><img src="images/attachicons/common_new.gif" /></span></td>
<td class="attachctrl"><span id="cpadd[]"></span></td>
<td class="attachname">
<span id="deschidden[]" style="display:none">
<a href="javascript:;" onclick='parentNode.innerHTML="<input type=\"text\" name=\"attachdesc[]\" size=\"25\" class=\"txt\" />"'>描述</a>
<span id="localfile[]"></span>
<input type="text" name="attachdesc[]" style="display:none" />
</span>
<input type="hidden" name="localid[]" />
</td>
<? if($allowsetattachperm) { ?><td class="attachview"><input type="text" name="attachperm[]" value="0"size="1" class="txt" /></td><? } if($maxprice) { ?><td class="attachpr"><input type="text" name="attachprice[]" value="0" size="1" class="txt" /></td><? } ?>
<td class="attachdel"><span id="cpdel[]"></span></td>
</tr></tbody>
</table>
<? if($swfupload) { ?>
<div id="swfattachlist">
<? if($swfattachs) { ?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr><td class="attachnum"></td><td>您有 <?=$swfattachs?> 个已经上传的附件 &nbsp;
<a href="javascript:;" onclick="swfattachlistupdate()">使用</a> &nbsp; <a href="javascript:;" onclick="display('swfattachlist')">忽略</a>
</td></tr>
</table>
<? } ?>
</div>
<? } ?>
<table cellpadding="0" cellspacing="0" summary="post_attachbody" border="0" width="100%"><tbody id="attachbody"></tbody></table>
</div>
<? } ?>
</div>
<div id="img_hidden" alt="1" style="position:absolute;top:-100000px;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image');width:<?=$thumbwidth?>px;height:<?=$thumbheight?>px"></div>
</div>

<? if($swfupload) { ?>
<div id="swfuploadbox" class="floatbox floatbox1 floatboxswf" style="display: none">
<h3 class="float_ctrl">
<em<? if(empty($infloat)) { ?> style="display:none"<? } ?>><button type="button" onclick="pagescrolls('swfreturn');return false">返回</button></em>
<? if(empty($infloat)) { ?><em>批量上传</em><? } ?>
<span id="swfclosebtn" style="display:none">
<a href="javascript:;" class="float_close" onclick="swfuploadwin()" title="关闭">关闭</a>
</span>
</h3>
<div id="swfbox" style="display: none">
<script type="text/javascript" reload="1">
$('swfbox').innerHTML = AC_FL_RunContent(
'width', '570', 'height', '318',
'src', 'images/common/upload.swf?site=<?=$boardurl?>misc.php',
'quality', 'high',
'id', 'swfupload',
'menu', 'false',
'allowScriptAccess', 'always'
);
</script>
</div>
</div>
<? } ?>
</div>
<div style="clear:both;<? if(!empty($infloat)) { ?> width:2500px<? } ?>">
<? if(!empty($infloat)) { ?><div class="floatbox floatbox1" id="extcreditbox2"></div><? } ?>
<div class="floatbox floatbox1">
<h3 class="float_ctrl"<? if(empty($infloat)) { ?> style="display:none"<? } ?>>
<em><button type="button" onclick="pagescrolls('editorreturn');return false">返回</button></em>
<span>
<a href="javascript:;" onclick="pagescrolls('credit2')" title="积分说明">积分说明</a>
<? if(!empty($infloat)) { ?>
<a href="javascript:;" class="float_close" onclick="closeEditorwin()" title="关闭">关闭</a>
<? } ?>
</span>
</h3>
<div class="postbox">
<? if($action == 'newthread' || $action == 'edit' && $isfirstpost) { if($tagstatus) { ?>
<div class="posttags">
<p><strong>标签(TAG):</strong> (用逗号或空格隔开多个标签，最多可填写 <strong>5</strong> 个)</p>
<p><input type="text" name="tags" id="tags" class="txt" value="<?=$threadtags?>" tabindex="1" /><button name="addtags" type="button" onclick="relatekw();return false">+可用标签</button> <span id="tagselect"></span></p>
</div>
<? } ?>
<div class="columntype">
<? if($allowsetreadperm) { ?>
<p><strong>阅读权限:</strong></p>
<p><input type="text" name="readperm" value="<?=$thread['readperm']?>" class="txt" tabindex="1" /> 0或空为不限制</p>
<? } if($maxprice && !$special) { ?>
<p><strong>售价</strong>(<?=$extcredits[$creditstransextra['1']]['title']?>):</p>
<p><input type="text" name="price" value="<?=$thread['pricedisplay']?>" class="txt" tabindex="1" /> <?=$extcredits[$creditstransextra['1']]['unit']?> 最高 <?=$maxprice?> <?=$extcredits[$creditstransextra['1']]['unit']?>&nbsp;<? if($maxincperthread) { ?>，单一主题作者最高收入 <?=$maxincperthread?> <?=$extcredits[$creditstransextra['1']]['unit']?><? } if($maxchargespan) { ?>，最高出售时限 <?=$maxchargespan?> 小时<? } ?>
您可以使用 <code><strong>[free]</strong>message<strong>[/free]</strong></code> 代码发表无需付费也能查看的免费信息</p>
<? } ?>
</div>
<? } ?>
<div class="columntype">
<h4>发帖选项:</h4>
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="firstlist">
<? if(($forum['allowhtml'] || ($action == 'edit' && ($org['htmlon'] & 1))) && $allowhtml) { ?>
<p><input type="checkbox" name="htmlon" id="htmlon" value="1" <?=$htmloncheck?> /><label for="htmlon">Html 代码</label></p>
<? } else { ?>
<p><input type="checkbox" name="htmlon" id="htmlon" value="0" <?=$htmloncheck?> disabled="disabled" /><label for="htmlon">Html 代码</label></p>
<? } ?>
<p><input type="checkbox" id="allowimgcode" disabled<? if($forum['allowimgcode']) { ?> checked="checked"<? } ?> /><label for="allowimgcode">[img] 代码</label></p>
</td>
<td>
<p><input type="checkbox" name="parseurloff" id="parseurloff" value="1" <?=$urloffcheck?> tabindex="1" /><label for="parseurloff">禁用 URL 识别</label></p>
<p><input type="checkbox" name="smileyoff" id="smileyoff" value="1" <?=$smileyoffcheck?> tabindex="1" /><label for="smileyoff">禁用 <a href="faq.php?action=faq&amp;id=5&amp;messageid=32" target="_blank">表情</a></label></p>
<p><input type="checkbox" name="bbcodeoff" id="bbcodeoff" value="1" <?=$codeoffcheck?> tabindex="1" /><label for="bbcodeoff">禁用 <a href="faq.php?action=faq&amp;id=5&amp;messageid=18" target="_blank">Discuz!代码</a></label></p>
<? if($tagstatus && ($action == 'newthread' || $action == 'edit' && $isfirstpost)) { ?>
<p><input type="checkbox" name="tagoff" id="tagoff" <? if(!empty($tagoffcheck)) { ?>checked="checked"<? } ?> tabindex="1" /><label for="tagoff">禁用 标签解析</label></p>
<? } ?>
</td>
<td>
<p><input type="checkbox" name="usesig" id="usesig" value="1" <? if(!$maxsigsize) { ?>disabled <? } else { ?><?=$usesigcheck?> <? } ?>tabindex="1" /><label for="usesig">使用个人签名</label></p>
<? if($action != 'edit') { if($allowanonymous) { ?><p><input type="checkbox" name="isanonymous" id="isanonymous" value="1" tabindex="1" /><label for="isanonymous">使用匿名发帖</label></p><? } } else { if($allowanonymous || (!$allowanonymous && $orig['anonymous'])) { ?><p><input type="checkbox" name="isanonymous" value="1" <? if($orig['anonymous']) { ?>checked="checked"<? } ?> tabindex="1" /><label for="isanonymous">使用匿名发帖</label></p><? } } if($action != 'edit') { ?><p><input type="checkbox" name="emailnotify" id="emailnotify" <?=$notifycheck?> tabindex="1" /><label for="emailnotify">接收新回复邮件通知</label></p><? } ?>
</td>
<td>
<? if($action == 'newthread' && $forum['ismoderator'] && ($allowdirectpost || !$forum['modnewposts'])) { if($action == 'newthread' && $forum['ismoderator'] && ($allowdirectpost || !$forum['modnewposts'])) { ?>
<p><input type="checkbox" name="sticktopic" id="sticktopic" value="1" <?=$stickcheck?> tabindex="1" /><label for="sticktopic">主题置顶</label></p>
<p><input type="checkbox" name="addtodigest" id="addtodigest" value="1" <?=$digestcheck?> tabindex="1" /><label for="addtodigest">精华帖子</label></p>
<? } } elseif($action == 'edit' && $auditstatuson) { ?>
<p><input type="checkbox" name="audit" id="audit" value="1"><label for="audit">通过审核</label></p>
<? } if($uchome['addfeed'] && $ucappopen['UCHOME'] && $forum['allowfeed']) { ?>
<p><input type="checkbox" name="addfeed" id="addfeed" value="1" <?=$addfeedcheck?>><label for="addfeed"> 加入事件</label></p>
<? } ?>
</td>
</tr>
</table><br />
</div>
<div class="moreconf" id="moreconf">
<div class="custominfoarea" id="custominfoarea" style="<? if($special && $action != 'reply') { ?>display: none;<? } ?>">
<? if($action == 'newthread' && $sitemessage['newthread'] || $action == 'reply' && $sitemessage['reply']) { ?>
<a href="javascript:;" onclick="display('custominfo_post')" onblur="$('custominfo_post').style.display = 'none'"><img src="<?=IMGDIR?>/info.gif" alt="帮助" /></a>
<div id="custominfo_post" class="sitenote">
<div class="cornerlayger">
<? if($action == 'newthread') { echo $sitemessage['newthread'][array_rand($sitemessage['newthread'])]; } elseif($action == 'reply') { echo $sitemessage['reply'][array_rand($sitemessage['reply'])]; } ?>
</div>
<div class="minicorner"></div>
</div>
<? } ?>
</div>
<button type="submit" id="postsubmit" value="true" name="<? if($action == 'newthread') { ?>topicsubmit<? } elseif($action == 'reply') { ?>replysubmit<? } elseif($action == 'edit') { ?>editsubmit<? } ?>" tabindex="1">
<? if($action == 'newthread') { if($special == 0) { ?>发新话题
<? } elseif($special == 1) { ?>发布投票
<? } elseif($special == 2) { ?>发布商品
<? } elseif($special == 3) { ?>发布悬赏
<? } elseif($special == 4) { ?>发布活动
<? } elseif($special == 5) { ?>发布辩论
<? } elseif($special == 6) { ?>发布视频
<? } } elseif($action == 'reply' && !empty($addtrade)) { ?>添加商品
<? } elseif($action == 'reply') { ?>参与/回复主题
<? } elseif($action == 'edit') { ?>编辑帖子
<? } ?>
</button>
<span id="more_1"<? if($advmore) { ?> style="display: none"<? } ?>>
<? if(!empty($infloat) && ($showthreadsorts || $special)) { ?>
<a href="javascript:;" onclick="pagescrolls('editor')">添加详情<? if($special == 1) { ?>投票<? } elseif($special == 2) { ?>商品<? } elseif($special == 3) { ?>悬赏<? } elseif($special == 4) { ?>活动<? } elseif($special == 5) { ?>辩论<? } elseif($special == 6) { ?>视频<? } ?>描述</a>
<? } ?>
</span>
<span id="more_2"<? if(!$advmore && !empty($infloat)) { ?> style="display: none"<? } ?>>
<? if($allowpostattach) { ?>
<span class="sim_upfile" onmouseover="$('attachinfo').style.display='';" onmouseout="$('attachinfo').style.display='none';">
<span id="attachbtnhidden" style="display:none"><span><input type="file" name="attach[]" size="1" /></span></span>
<span id="attachbtn"></span>
<a href="javascript:;" onclick="return false;">添加附件</a>
<? if($swfupload) { ?>
<a href="javascript:;" onclick="swfuploadwin()">批量上传</a>
<? } ?>
<div id="attachinfo" class="sitenote<? if($action == 'newthread' || ($action == 'edit' && $isfirstpost)) { if($special) { ?> upfile_special<? } else { ?> upfile<? } } ?>" style="display:none;">
<div class="cornerlayger">
文件尺寸: <strong><? if($maxattachsize) { ?>小于 <?=$maxattachsize_mb?> <? } else { ?>大小不限制<? } ?></strong>&nbsp;
<? if($attachextensions) { ?>可用扩展名: <strong><?=$attachextensions?></strong>&nbsp;<? } if($maxprice) { ?>售价: <strong>最高 <?=$maxprice?> <?=$extcredits[$creditstransextra['1']]['unit']?><?=$extcredits[$creditstransextra['1']]['title']?><? if($maxincperthread) { ?>，单一主题作者最高收入 <?=$maxincperthread?> <?=$extcredits[$creditstransextra['1']]['unit']?><? } if($maxchargespan) { ?>，最高出售时限 <?=$maxchargespan?> 小时<? } } ?></strong>
</div>
<div class="minicorner"></div>
</div>
</span>
<a href="javascript:;" onclick="attachlist()">附件列表</a>
<? } if(!empty($infloat)) { ?><a href="javascript:;" id="morelink" onclick="pagescrolls('more')">更多设定</a><? } ?>
</span>
<? if($secqaacheck || $seccodecheck) { ?><span style="position:relative"><? $seccheckfloat = 'floatlayout_'.$action; ?><script type="text/javascript" reload="1">
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
</script></span><? } ?>
</div>
</div>
</div>
</form>
</div>

<? if(!empty($infloat)) { ?>
<div id="extcreditbox" style="display: none">
<h3 class="float_ctrl">
<em><button type="button" onclick="pagescrolls('creditreturn');return false">返回</button></em>
<span>
<a href="faq.php?action=credits&amp;fid=<?=$fid?>" target="_blank">查看积分策略说明</a>
</span>
</h3>
<div class="postbox">
<div class="post_tablelist extcreditbox">
<table cellpadding="0" cellspacing="0" summary="post_attachbody" border="0" width="100%">
<thead>
<tr>
<td class="extname"></td><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { ?><td class="extcredits"><?=$credit['title']?></td><? } } ?><td></td>
</tr>
</thead>
<tbody><? if(is_array($policyarray)) { foreach($policyarray as $operation => $policy) { ?><tr>
<td class="extname">
<? if($operation == 'post') { ?>
发新主题
<? } elseif($operation == 'reply') { ?>
发表回复
<? } elseif($operation == 'digest') { ?>
加入精华
<? } elseif($operation == 'postattach') { ?>
发表附件
<? } elseif($operation == 'getattach') { ?>
下载附件
<? } ?>
</td><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { ?><td class="extcredits">
<? if($creditsarray[$operation][$id]) { ?>
<?=$creditsarray[$operation][$id]?>
<? } else { ?>
-
<? } ?>
</td><? } } ?><td></td>
</tr><? } } ?></tbody>
</table>
总积分计算公式: <?=$creditsformulaexp?>
</div>
</div>
</div>
<? } if($forum['allowmediacode']) { ?>
<div class="popupmenu_popup" id="<?=$editorid?>_popup_media_menu" style="width: 280px;display: none" unselectable="on">
<input type="hidden" id="<?=$editorid?>_mediatype" value="ra">
<table cellpadding="4" cellspacing="0" border="0">
<tr class="popupmenu_option">
<td nowrap>
请输入多媒体文件的地址:<br />
<input id="<?=$editorid?>_mediaurl" style="width: 98%" value="" onkeyup="setmediatype('<?=$editorid?>')" />
</td>
</tr>
<tr class="popupmenu_option">
<td nowrap>
<label style="float: left; width: 32%"><input type="radio" name="<?=$editorid?>_mediatyperadio" id="<?=$editorid?>_mediatyperadio_ra" onclick="$('<?=$editorid?>_mediatype').value = 'ra'" checked="checked">RA</label>
<label style="float: left; width: 32%"><input type="radio" name="<?=$editorid?>_mediatyperadio" id="<?=$editorid?>_mediatyperadio_wma" onclick="$('<?=$editorid?>_mediatype').value = 'wma'">WMA</label>
<label style="float: left; width: 32%"><input type="radio" name="<?=$editorid?>_mediatyperadio" id="<?=$editorid?>_mediatyperadio_mp3" onclick="$('<?=$editorid?>_mediatype').value = 'mp3'">MP3</label>
<label style="float: left; width: 32%"><input type="radio" name="<?=$editorid?>_mediatyperadio" id="<?=$editorid?>_mediatyperadio_rm" onclick="$('<?=$editorid?>_mediatype').value = 'rm'">RM/RMVB</label>
<label style="float: left; width: 32%"><input type="radio" name="<?=$editorid?>_mediatyperadio" id="<?=$editorid?>_mediatyperadio_wmv" onclick="$('<?=$editorid?>_mediatype').value = 'wmv'">WMV</label>
<label style="float: left; width: 32%"><input type="radio" name="<?=$editorid?>_mediatyperadio" id="<?=$editorid?>_mediatyperadio_mov" onclick="$('<?=$editorid?>_mediatype').value = 'mov'">MOV</label>
</td>
</tr>
<tr class="popupmenu_option">
<td nowrap>
<label style="float: left; width: 32%">宽: <input id="<?=$editorid?>_mediawidth" size="5" value="400" /></label>
<label style="float: left; width: 32%">高: <input id="<?=$editorid?>_mediaheight" size="5" value="300" /></label>
</td>
</tr>

<tr class="popupmenu_option">
<td align="center" colspan="2"><input type="button" value="提交" onclick="setmediacode('<?=$editorid?>')"> &nbsp; <input type="button" onclick="hideMenu()" value="取消" /></td>
</tr>
</table>
</div>
<? } if($_DCACHE['bbcodes_display']['img']) { ?>
<div class="popupmenu_popup" id="<?=$editorid?>_cmd_insertimage_menu" style="display: none" unselectable="on">
<ul class="imguptype">
<li><a href="javascript:;" hidefocus="true" class="current" id="insertimage_www"<? if($ucappopen['UCHOME']) { ?> onclick="switchImage('www');"<? } ?>>网络图片</a></li>
<? if($ucappopen['UCHOME']) { ?><li><a href="javascript:;" hidefocus="true" id="insertimage_album" onclick="switchImage('album');">我的相册</a></li><? } ?>
</ul>
<div class="popupmenu_option" unselectable="on" id="insertimage_www_div">
请输入图片地址:<br /><input id="<?=$editorid?>_cmd_insertimage_param_url" style="width: 300px;" value="" class="txt" type="text" onkeydown="editorMenuEvent_onkeydown(this);" />
<br /><center><input id="<?=$editorid?>_cmd_insertimage_submit" value="提交" type="button" onclick="insertimagesubmit()" /> &nbsp; <input onclick="hideMenu();" value="取消" type="button" /></center>
</div>
<? if($ucappopen['UCHOME']) { ?>
<div class="popupmenu_option" unselectable="on" id="insertimage_album_div" style="display: none;">
<div id="uch_photoes"></div><p id="uch_createalbum" style="display: none; padding-left: 4px; magin-top: -1em;">点击图片插入到帖子内容中</p>
</div>
<script type="text/javascript" reload="1">
var showalbum, prealbum;
function switchImage(img) {
if(img == 'www') {
$('insertimage_www_div').style.display='';
$('insertimage_www').className = 'current';
$('insertimage_album_div').style.display='none';
$('insertimage_album').className = '';
} else if(img == 'album') {
$('insertimage_www').className = '';
$('insertimage_album').className = 'current';
if($('insertimage_album_menu')) {
showAlbums();
} else {
var div = document.createElement('DIV');
div.id = 'insertimage_album_menu';
div.className = 'popupmenu_popup';
div.style.display = 'none';
$('append_parent').appendChild(div);
ajaxget('api/uchome.php?action=getalbums', 'insertimage_album_menu', 'uch_photoes', null, 'none');
showalbum = setInterval(showAlbum, 10);
}
}
}
function showAlbum() {
if($('insertimage_album_menu').innerHTML != '') {
showAlbums();
clearInterval(showalbum);
}
}
function showAlbums() {
if($('insertimage_album_menu').innerHTML == 'NOALBUM') {
$('insertimage_www_div').style.display='none';
$('insertimage_album_div').style.display = '';
$('uch_photoes').style.display = '';
$('uch_photoes').innerHTML = '您还没有相册，<a href="<?=$uchomeurl?>/cp.php?ac=upload" target="_blank">点击这里创建自己的相册</a>吧！';
} else {
showMenu('insertimage_album', true, 0, 2, 250, 1);
}
}
</script>
<? } ?>
</div>
<? } ?>

<script type="text/javascript" reload="1">
var pagescroll = new pagescroll_class('floatlayout_<?=$action?>', 600, 410);
<? if(empty($infloat)) { ?>
$('floatlayout_<?=$action?>').scrollLeft = 600;
<? } if($isfirstpost && $forum['threadtypes']['types']) { ?>
loadselect('typeid', 0, 'floatlayout_<?=$action?>');
<? } if(!$isfirstpost && $thread['special'] == 5 && empty($firststand) && $action != 'edit') { ?>
loadselect('stand', 0, 'floatlayout_<?=$action?>');
<? } if(!$special && $forum['threadsorts'] && ($action == 'newthread' || $action == 'edit' && $isfirstpost && !$thread['sortid'])) { ?>
loadselect('sortid', 0, 'floatlayout_<?=$action?>');
function switchsort() {
if($('sortid').value) {
data = wysiwyg ? editdoc.body.innerHTML : textobj.value;
saveData(wysiwyg ? editdoc.body.innerHTML : textobj.value);
<? if($isfirstpost && $sortid) { ?>
ajaxget('post.php?action=threadsorts&sortid=' + $('sortid').value + '&fid=<?=$fid?><? if(!empty($modelid)) { ?>&modelid=<?=$modelid?><? } ?>', 'threadsorts', 'threadsortswait')
<? } elseif(!empty($infloat)) { ?>
window.open('post.php?action=<?=$action?>&fid=<?=$fid?><? if(!empty($tid)) { ?>&tid=<?=$tid?><? } if(!empty($pid)) { ?>&pid=<?=$pid?><? } if(!empty($modelid)) { ?>&modelid=<?=$modelid?><? } ?>&extra=<?=$extra?>&sortid=' + $('sortid').value + (data != '' ? '&cedit=yes' : ''));
<? } else { ?>
location.href = 'post.php?action=<?=$action?>&fid=<?=$fid?><? if(!empty($tid)) { ?>&tid=<?=$tid?><? } if(!empty($pid)) { ?>&pid=<?=$pid?><? } if(!empty($modelid)) { ?>&modelid=<?=$modelid?><? } ?>&extra=<?=$extra?>&sortid=' + $('sortid').value + (data != '' ? '&cedit=yes' : '');
<? } ?>
Editorwin = 0;
}
}
<? } if($isfirstpost && $sortid) { ?>
ajaxget('post.php?action=threadsorts&sortid=<?=$sortid?>&fid=<?=$fid?><? if(!empty($tid)) { ?>&tid=<?=$tid?><? } ?>&inajax=1', 'threadsorts', 'threadsortswait', 'threadsortswait');
<? } if(($action == 'newthread' && $sitemessage['newthread'] || $action == 'reply' && $sitemessage['reply']) && $sitemessage['time']) { ?>
setTimeout('display_opacity(\'custominfo_post\',100)', <?=$sitemessage['time']?>);
<? } ?>

var postminchars = parseInt('<?=$minpostsize?>');
var postmaxchars = parseInt('<?=$maxpostsize?>');
var disablepostctrl = parseInt('<?=$disablepostctrl?>');
var seccodecheck = parseInt('<?=$seccodecheck?>');
var secqaacheck = parseInt('<?=$secqaacheck?>');
var typerequired = parseInt('<?=$forum['threadtypes']['required']?>');
var special = parseInt('<?=$special?>');
var isfirstpost = <? if($isfirstpost) { ?>1<? } else { ?>0<? } ?>;
var allowposttrade = parseInt('<?=$allowposttrade?>');
var allowpostreward = parseInt('<?=$allowpostreward?>');
var allowpostactivity = parseInt('<?=$allowpostactivity?>');
var sortid = '<?=$sortid?>';
var special = parseInt('<?=$special?>');

var editorid = '<?=$editorid?>';
var textobj = $(editorid + '_textarea');
var wysiwyg = (is_ie || is_moz || (is_opera >= 9)) && parseInt('<?=$editormode?>') == 1 ? 1 : 0;
var allowswitcheditor = parseInt('<?=$allowswitcheditor?>');
var allowhtml = parseInt('<?=$allowhtml?>');
var forumallowhtml = parseInt('<?=$forum['allowhtml']?>');
var allowsmilies = parseInt('<?=$forum['allowsmilies']?>');
var allowbbcode = parseInt('<?=$forum['allowbbcode']?>');
var allowimgcode = parseInt('<?=$forum['allowimgcode']?>');
var allowpostattach = parseInt('<?=$allowpostattach?>');
var editorcss = 'forumdata/cache/style_<?=STYLEID?>_common.css?<?=VERHASH?>';
var TABLEBG = '<?=WRAPBG?>';
var uid = parseInt('<?=$discuz_uid?>');
var swfhash = '<? echo md5($_DCACHE['settings']['authkey'].$discuz_uid);; ?>';

<? if($allowpostattach) { ?>
var thumbwidth = parseInt(<?=$thumbwidth?>);
var thumbheight = parseInt(<?=$thumbheight?>);
var extensions = '<?=$attachextensions?>';
<? } ?>

var fontoptions = new Array("仿宋_GB2312", "黑体", "楷体_GB2312", "宋体", "新宋体", "微软雅黑", "Trebuchet MS", "Tahoma", "Arial", "Impact", "Verdana", "Times New Roman");
var custombbcodes = new Array();
<? if($forum['allowbbcode'] && $allowcusbbcode) { if(is_array($_DCACHE['bbcodes_display'])) { foreach($_DCACHE['bbcodes_display'] as $tag => $bbcode) { if($bbcode['type'] == '0') { ?>custombbcodes["<?=$tag?>"] = {'prompt' : '<?=$bbcode['prompt']?>'};<? } } } } ?>

function messagehandle_<?=$action?>(key) {
if(!Editorwin) {
$('floatlayout_<?=$action?>').scrollTop = 0;
<? if(!$showthreadsorts && !($adveditor)) { ?>
$('more_1').style.display='none';pagescroll.up(1, '$(\'more_2\').style.display=\'\';$(\'custominfoarea\').style.display=\'\'');
<? } else { ?>
$('custominfoarea').style.display=$('more_2').style.display='none';pagescroll.up(1, '$(\'more_1\').style.display=\'\'');
<? } ?>
}
}

function messagehandle() {
messagehandle_<?=$action?>();
}

function submithandle_<?=$action?>(locationhref, message) {
<? if($action == 'edit' || $action == 'reply') { ?>
try {
var pid = locationhref.lastIndexOf('#pid');
if(pid != -1) {
pid = locationhref.substr(pid + 4);
<? if($action == 'edit') { ?>
if(pid) {
ajaxget('viewthread.php?tid=<?=$tid?>&viewpid=' + pid, 'post_' + pid, 'ajaxwaitid');
} else {
ajaxget('viewthread.php?tid=<?=$tid?>&viewpid=<?=$pid?>', 'post_<?=$pid?>', 'ajaxwaitid');
}
$('postform').editsubmit.disabled = false;
<? } elseif($action == 'reply' && !empty($addtrade)) { ?>
location.href = locationhref;
<? } elseif($action == 'reply') { ?>
ajaxget('viewthread.php?tid=<?=$tid?>&viewpid=' + pid, 'post_new', 'ajaxwaitid', '', null, 'appendreply()');
if(replyreload) {
var reloadpids = replyreload.split(',');
for(i = 1;i < reloadpids.length;i++) {
ajaxget('viewthread.php?tid=<?=$tid?>&viewpid=' + reloadpids[i], 'post_' + reloadpids[i]);
}
}
<? } ?>
} else {
location.href = locationhref;
}
} catch(e) {
location.href = locationhref;
}
<? } elseif($action == 'newthread') { ?>
var hastid = locationhref.lastIndexOf('tid=');
if(hastid == -1) {
dnotice(message, "location.href='" + locationhref + "'", 390, 130);
} else {
location.href = locationhref;
}
<? } ?>

floatwinreset = 1;
closeEditorwin();
}

<? if(!empty($cedit) && $cedit == 'yes') { ?>
function cedit() {
try {
loadData(1);
} catch(e) {
setTimeout('cedit()', 1000);
}
}
<? } ?>

function openEditor() {
try {
<? if($action == 'reply' && !$message) { ?>
if($('fastpostmessage') && $('fastpostmessage').value) {
textobj.value = $('fastpostmessage').value;
$('fastpostmessage').value = '';
}
<? } if($action == 'edit' || $action == 'reply' && $repquote) { ?>
if(wysiwyg) {
initialized = false;
newEditor(1, bbcode2html(textobj.value));
} else {
newEditor(0);
}
setCaretAtEnd();
<? } else { ?>
newEditor(wysiwyg);
if(editbox) {
<? if(($action != 'edit' || !$attachments) && (!$swfupload || !$swfattachs)) { ?>
editbox.className = 'autosave max';
<? } else { ?>
editbox.className = 'autosave';
<? } ?>
}
<? } ?>
} catch(e) {
setTimeout('openEditor()', 100);
return;
}
if(!$('floatlayout_<?=$action?>').scrollLeft) {
$('floatlayout_<?=$action?>').scrollLeft = 600;
}
<? if($_DCACHE['bbcodes_display']['tools']) { ?>
if(!getcookie('disableautosave')) {
clearInterval(autosaveDatai);
autosaveData(1);
}
if(is_ie >= 5 || is_moz >= 2) {
window.onbeforeunload = function () {
try {
saveData(wysiwyg ? editdoc.body.innerHTML : textobj.value);
} catch(e) {}
};
}
<? } if(!empty($cedit) && $cedit == 'yes') { ?>
cedit();
<? } ?>
}

</script>

<script src="include/js/post.js?<?=VERHASH?>" type="text/javascript" reload="1"></script>
<? if($special) { ?>
<script src="include/js/calendar.js?<?=VERHASH?>" type="text/javascript" reload="1"></script>
<? } ?>
<script src="include/js/bbcode.js?<?=VERHASH?>" type="text/javascript" reload="1"></script>

<? if(empty($infloat)) { ?></div>

</div></div></div>

</div><? } include template('footer'); ?>
