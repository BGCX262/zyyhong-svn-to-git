<?php
require_once './../../site/cache/ad_index.php'; $ad= unserialize(stripslashes($ad));
?>

		<div class="l4 ">
	<div class="lmr_at"><div class="lmr_atxt">活动公告</div><div class="txt_r">><a href="http://www.jiaju001.com/huodong/">更多</a></div></div>
	<div class="lmr_txt lp2">
<?php
if($ad['event'])
{
	foreach($ad['event'] as $a)
	{
		if(!strpos($a['url'], 'jiaju001.com'))
		{
			$a['url'] = 'http://www.jiaju001.com'.$a['url'];
		}
		echo '<a href="',$a['url'],'">',$a['title'],'</a><br />';
	}
}
?></div></div>
<!--
<div class="l4  lt">
	<div class="lmr_at"><div class="lmr_atxt">品牌推荐</div><div class="txt_r">>更多</div></div>
	<div class="lmr_txt lp2">
<?php
if($ad['shop'])
{
	foreach($ad['shop'] as $a)
	{
		if(!strpos($a['url'], 'jiaju001.com'))
		{
			$a['url'] = 'http://www.jiaju001.com'.$a['url'];
		}
		echo '<a href="',$a['url'],'" title="',$a['title'],'"><img class="b4" src="http://www.jiaju001.com/images/',$a['img'],'" alt="',$a['title'],'"></a> ';
	}
}
?>
		</div></div>

		
<div class="l4  lt">
	<div class="lmr_at"><div class="lmr_atxt">相关产品</div><div class="txt_r">>更多</div></div>
	<div class="lmr_txt lp2">
	<?php
if($ad['goods']){
foreach($ad['goods'] as $a)
{
		if(!strpos($a['url'], 'jiaju001.com'))
		{
			$a['url'] = 'http://www.jiaju001.com'.$a['url'];
		}
echo '<a href="',$a['url'],'" title="',$a['title'],'"><img class="b4" src="http://www.jiaju001.com/images/p/s.',substr($a['img'],4,40),'" alt="',$a['title'],'"></a> ';
}
}
?></div>

	
	</div>
	-->