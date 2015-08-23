<? if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('D:\Website\51shangcheng.cn\htdocs\./templates/default/pm_viewnew.htm', 'D:\Website\51shangcheng.cn\htdocs\./templates/default/header_ajax.htm', 1250740645, '2', './templates/uchome')
|| checktplrefresh('D:\Website\51shangcheng.cn\htdocs\./templates/default/pm_viewnew.htm', 'D:\Website\51shangcheng.cn\htdocs\./templates/default/footer_ajax.htm', 1250740645, '2', './templates/uchome')
;?><? ob_end_clean(); ob_start(); @header("Expires: -1"); @header("Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0", FALSE); @header("Pragma: no-cache"); @header("Content-type: application/xml; charset=$charset"); echo '<?xml version="1.0" encoding="'.$charset.'"?>';; ?><root><![CDATA[<ul><? if(is_array($pmlist)) { foreach($pmlist as $pm) { ?><li>
<? if($pm['msgfromid'] > 0) { ?>
<a href="pm.php?uid=<?=$pm['touid']?>&amp;filter=privatepm&amp;daterange=<?=$pm['daterange']?>#new" target="_blank"><em><?=$pm['msgfrom']?></em><?=$pm['subject']?></a>
<? } else { ?>
<a href="pm.php?pmid=<?=$pm['pmid']?>&amp;filter=systempm" target="_blank"><em>系统消息</em><?=$pm['subject']?></a>
<? } ?>
</li><? } } if($morenum) { ?>
<li><a href="pm.php">以及另外 <?=$morenum?> 条新消息...</a></li>
<? } ?>
</ul><? $s = ob_get_contents(); ob_end_clean(); $s = preg_replace("/([\x01-\x08\x0b-\x0c\x0e-\x1f])+/", ' ', $s); $s = str_replace(array(chr(0), ']]>'), array(' ', ']]&gt;'), $s); ?><?=$s?>
]]></root><? exit; ?>