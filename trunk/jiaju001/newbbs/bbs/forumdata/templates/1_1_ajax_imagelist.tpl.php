<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if($imagelist) { $i = 0; ?><table cellspacing="2" cellpadding="2" class="imglist"><tr><? if(is_array($imagelist)) { foreach($imagelist as $image) { $i++; ?><td valign="bottom" id="image_td_<?=$image['aid']?>" width="25%">
<a href="javascript:;" title="<?=$image['filename']?>"><img src="<?=$image['url']?>/<?=$image['attachment']?>" id="image_<?=$image['aid']?>" onclick="insertAttachimgTag('<?=$image['aid']?>')" width="<?=$image['width']?>" _width="<?=$image['width']?>" _height="110" onload="thumbImg(this, 1)" /></a>
<p class="imginfo">
<span class="right"><a href="javascript:;" onclick="delImgAttach(<?=$image['aid']?>,<? if(!$attach['pid']) { ?>1<? } else { ?>0<? } ?>)" class="deloption">删除</a></span>
<? if($image['description']) { ?>
<input type="text" name="attachnew[<?=$image['aid']?>][description]" class="txt" value="<?=$image['description']?>" id="image_desc_<?=$image['aid']?>" />
<? } else { ?>
<input type="text" class="txt lighttxt" value="描述" onclick="this.style.display='none';$('image_desc_<?=$image['aid']?>').style.display='';$('image_desc_<?=$image['aid']?>').focus();" />
<input type="text" name="attachnew[<?=$image['aid']?>][description]" class="txt" style="display: none" id="image_desc_<?=$image['aid']?>" />
<? } ?>
</p>
</td>
<? if($i % 4 == 0 && isset($imagelist[$i])) { ?></tr><tr><? } } } if(($imgpad = $i % 4) > 0) { echo str_repeat('<td width="25%"></td>', 4 - $imgpad);; } ?>
</tr></table>
<? if(!empty($inajax)) { ?>
<script type="text/javascript" reload="1">
ATTACHNUM['imageunused'] += <? echo count($imagelist); ?>;
updateattachnum('image');
</script>
<? } } ?>