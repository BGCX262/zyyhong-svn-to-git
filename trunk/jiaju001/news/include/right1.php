<?php
require_once './../../site/cache/ad_index.php'; $ad= unserialize(stripslashes($ad));
?>
<div class="fr col_l">
		<div class="note"><div style="text-align:right"><div style="float:left"><strong>活动与公告</strong></div><a href='http://www.homebjjj.com/huodong/'>更多>></a></div>
<?php
if($ad['event']){foreach($ad['event'] as $a){echo '<a href="http://www.homebjjj.com',$a['url'],'">',$a['title'],'</a><br />';}}?></div>
		<div class="tit2 mt5"><div class="tl"><div>品牌推荐</div></div><div class="tr"></div></div>
	<div class="tbox">
<?php
if($ad['shop']){foreach($ad['shop'] as $a){echo '<a href="http://www.homebjjj.com',$a['url'],'" title="',$a['title'],'"><img class="b4" src="http://www.homebjjj.com/images/',$a['img'],'" alt="',$a['title'],'"></a> ';}}?>
		</div>
	<div class="tb"><div class="tbl"></div><div class="tbr"></div><div class="hack"></div></div>
		
		<div class="tit2"><div class="tl"><div>相关产品</div></div><div class="tr"></div></div>
	<div class="tbox">
	<?php
if($ad['goods']){
foreach($ad['goods'] as $a){
echo '<a href="http://www.homebjjj.com',$a['url'],'" title="',$a['title'],'"><img class="b4" src="http://www.homebjjj.com/images/p/s.',substr($a['img'],4,40),'" alt="',$a['title'],'"></a> ';
}
}
?></div>

	<div class="tb"><div class="tbl"></div><div class="tbr"></div><div class="hack"></div></div>
	</div>