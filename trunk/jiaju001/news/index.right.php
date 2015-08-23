<?php
require_once './../../site/cache/ad_index.php'; $ad= unserialize(stripslashes($ad));
?>
<div class="note"><div style="text-align:right"><div style="float:left"><strong>活动与公告</strong></div><a href='http://www.homebjjj.com/huodong/'>更多>></a></div>
<?php
if($ad['event']){
foreach($ad['event'] as $a){
echo '<a href="http://www.jiaju001.com',$a['url'],'">',$a['title'],'</a><br />';
}
}
?></div>
	