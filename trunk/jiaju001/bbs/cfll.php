<?//������������������������
/*


http://www.mjj.hk  һ��ˮ����������

=============================================================================
*/
require 'include/common.inc.php'; //����DZͨ�ó���
require 'include/forum.func.php'; //����DZͨ�ó���

$numstart="10"; //���������Χ��С��
$numend="100"; //�����
$fid="6,38,43,14,39,35,36";//�����Χ����̳����Ŀid���ĳ����Լ���ѽ��
$i=0;//����
$query = $db->query("SELECT  tid FROM {$tablepre}threads WHERE fid in ($fid) ");
while($dthread = $db->fetch_array($query)) {
$tid=$dthread['tid'];

$randaction = mt_rand($numstart,$numend);//���������
$sql="UPDATE {$tablepre}threads SET views=views+'$randaction' WHERE  tid='$tid'";
$db->query($sql); //���

$i++;
echo $i.":".$tid."���ӵ��:".$randaction."<br>";
}
?>