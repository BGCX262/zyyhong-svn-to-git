<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head><body>
<?php
require_once './include/config.inc.php';
?><h3>活动自动报名程序</h3>
<form action="" method="post">
	活动ID：<input name="cid" value="<?php echo $cid?>" /><br />
	活动举行时间：<input name="etime" value="<?php echo $etime?>" /><br />
	报名开始时间：<input name="stime" value="<?php echo $stime?>" /><br />
	<input name="act" type="submit" value="create" />
</form>
1.活动时间的10天内开始报名<br />
2.报名频率9:00-18:00 2个/小时  18:00-21:00  1个/小时<br />
<script src="images/calendar.js"></script>
<?php
if($act=="create"){
(!$cid||!$etime||!$stime)&&exit("参数丢失。活动ID，开始报名时间，活动时间都必须填写");
$endtime = strtotime($etime);
$moba = array(130,131,132,133,135,136,138,139,153,155,158,159);
$randtime=strtotime($stime);
$sql = "insert into odiy_cai_lu (`caiid`,`userid`,`mob`,`co`,`ip`,`created`) values";
echo $etime,"|",$cid,"|",$stime;
echo "<textarea style='width:1100px;height:400px'>",$sql;
$i = 0;
for(;;){
    $i++;
if($randtime>$endtime) break;
$h = date("H",$randtime);
if($h<9){
//获得今天的9点
$randtime=strtotime(date("Y-m-d",$randtime))+32400+rand(600,1200);
}elseif($h>7&&$h<16){
$randtime +=rand(6600,9300);
}elseif($h>15&&$h<20){
$randtime +=rand(6600,9300);
}else{
//获得明天的9点
$randtime=strtotime(date("Y-m-d",$randtime))+118800+rand(600,1200);
}
//echo date("Y-m-d H:i:s",$randtime)," => ",$moba[rand(0,11)].rand(11111111,99999999),"<br />";
echo "('$cid','0','".$moba[rand(0,11)].rand(11111111,99999999),"','0','0','".$randtime."'),";
}
echo "</textarea>";
echo $i-1;
}
?>

</body></html>
