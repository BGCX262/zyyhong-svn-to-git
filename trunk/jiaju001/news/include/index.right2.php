<?php

if(strpos($_SERVER['REQUEST_URI'], 'shy'))
{
	$siteurl = 'http://shy.jiaju001.com';
	require_once './../../site.shy/cache/ad_index.php';
}
else
{
	$siteurl = 'http://www.jiaju001.com';
	require_once './../../site/cache/ad_index.php';
}
$ad= unserialize(stripslashes($ad));
?>
<div class="r_top"><div class="txt">活动与公告</div><div class="txt_r"><a href="<?php echo $siteurl,'/huodong/'; ?>" target="_blank">>更多</a></div></div>
			<div class="r_bot">
<?php
if($ad['event']){
foreach($ad['event'] as $a){//$siteurl,
echo '<a href="',$a['url'],'">',$a['title'],'</a><br />';
}
}
?></div>
	
