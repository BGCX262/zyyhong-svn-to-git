<?//给所有帖子增加随机点击更新
/*


http://www.mjj.hk  一切水货都在这里

=============================================================================
*/
require 'include/common.inc.php'; //调用DZ通用程序
require 'include/forum.func.php'; //调用DZ通用程序

$numstart="10"; //点击次数范围最小数
$numend="100"; //最大数
$tid="18302,18303";//点击范围（论坛的栏目id，改成你自己的呀）
$i=0;//计数
$query = $db->query("SELECT  tid FROM {$tablepre}threads WHERE tid in ($tid) ");
while($dthread = $db->fetch_array($query)) {
$tid=$dthread['tid'];

$randaction = mt_rand($numstart,$numend);//产生随机数
$sql="UPDATE {$tablepre}threads SET views=views+'$randaction' WHERE  tid='$tid'";
$db->query($sql); //入库

$i++;
echo $i.":".$tid."增加点击:".$randaction."<br>";
}
?>