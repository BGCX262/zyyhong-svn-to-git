<?php 
require_once './include/config.inc.php';
if(!$userid)
{
    if($_SERVER['HTTP_REFERER'] == '')
    {
        if($_SESSION['jumps'] != true)
        {   
            $ipt = getip();
            include_once('./include/getip.php');
            $myobj=new ipLocation();
            $address = $myobj->getaddress($ipt);
            $myobj=NULL;
            session_start();
            $_SESSION['jumps'] = true;
            $address['area1'] = iconv('gb2312','utf-8', $address['area1'].$address['area2']);
     
            if(strpos($address['area1'], '辽宁') || strpos($address['area1'], '沈阳'))
            {
                obheader('http://shy.jiaju001.com');
            }
        }
    }

}

//分类
require_once './cache/list.php'; $data['list_db'] = unserialize(stripslashes($lists_db));
require_once './cache/list_son.php'; $data['list_son'] = unserialize(stripslashes($lists_son));
require_once './cache/ad_index.php'; $data['ad']= unserialize(stripslashes($ad));

//友情连接
$query = $db->query("select name,url,img from odiy_links where is_best=1 order by img,linkid");
while($read=$db->fetch_array($query)){$data['links'][]=$read;}
unset($read);$db->free_result($query);

//品牌列表
$query = $db->query("select name,ename,listid from odiy_shops where level=1");
while($read=$db->fetch_array($query)){$data['shops'][]=$read;}
unset($read);$db->free_result($query);

$data['title'] = "北京家居网 - 做最精湛的家具建材消费服务提供商|建材团购|家具团购|电器团购|一站式团购|选材顾问|装修指导|网络直销商城";
$data['keywords'] = "家居建材团购、家居集采 、装修设计咨询、诺贝尔、史密斯、一统 、 安信、  万和、方太、马可波罗、澳柯玛、 箭牌、法恩莎等众多一线品牌";


$data['description'] = '北京家居网-家居建材首选全京城最低价让装修省到底  5月22日北京家居网建材团购全京城最低价再贴券，一站式购齐好礼相送，价格举报有奖 咨询4006503056';//建材团购到北京家居网,最专业的建材网络直销商城,北京家居网建材家具电器团购,超低折扣、劲爆单价、限量抢购,热线:400-650-3056;直击建材价格底限,直接让利消费者,订单执行及售后服务监督,一对一选材顾问消费指导
$tmparr = array('zhuce', 'zhaopin','us','sitemap','peisong','links','dingdan','buy','biz','bao','baozhang','agree','about','yikahui','huiyuan','help');
if(in_array($pgname, $tmparr) && $dirt)
{
    if($pgname == 'yikahui'){$part = 'event';}
    include_once('./page/header.htm');
    include_once('./'.$dirt.'/'. $pgname .'.html');
    exit();
}else if($pgname && $dirt)
{
    include_once('./'.$dirt.'/'.$pgname.'.html');
    exit();
}
require_once './txtad.php';                 $txtad     = unserialize($txtad);
require_once './cache/home4_titlenews.php'; $titlenews = unserialize($titlenews);
require_once './cache/home4_spics.php';     $spics     = unserialize($spics);
require_once './cache/home4_recommond.php'; $recommond = unserialize($recommond);
require_once './cache/home4_smallpics.php'; $smallpics = unserialize($smallpics);
require_once './cache/home4_titlebar.php';  $titlebar  = unserialize($titlebar);
include('./core/site/index.php');
?>
