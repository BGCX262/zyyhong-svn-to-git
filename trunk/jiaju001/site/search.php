<?php
require_once './include/config.inc.php';
require_once("./cache/list.php");$lists_db = unserialize(stripslashes($lists_db));
if($listename){
$attrd=$attrd?str_replace("\"",".",json_encode($attrd)):"";$shops=$shops?$shops:array();
$path="/list/".$listename."-1-".$attrd."-".implode(".",$shops).".html";
ObHeader($path);
}else{
if($key){
$queryall = $db->query("SELECT * FROM odiy_product where goodsname like '%$key%' and level=1");
$count = $db->num_rows($queryall);$db->free_result($queryall);
!$page && $page=1;
$page_set=$view?$view:30;$start_limit =($page-1)*$page_set;
$numofpage = $count%$page_set==0?$count/$page_set:floor($count/$page_set)+1;
//$strat $end
if($numofpage<11){$strat=1;$end=$numofpage+1;}else{
if($page<5){$strat=1;$end=$page+5;}elseif($page>4 && $page>$numofpage-4){$strat=$page-4;$end=$numofpage+1;}else{$strat=$page-4;$end=$page+4;}}
for($i=$strat;$i<$end;$i++){if($i == $page){
$pages .=" <span class='red'>[".$i."]</span> ";}else{
$pages .=" <a href='./search?key=".$key."&page=".$i."'>[".$i."]</a> ";}}
$list['pages'] = $pages; $list['count'] = $count; $list['page_set'] = $page_set; $list['page'] = $page; $list['numofpage'] = $numofpage;
$query = $db->query("select id,goodsname,mprice,sprice,cprice,stime,etime,img,unit from odiy_product where goodsname like '%$key%' and level=1 order by id desc LIMIT $start_limit,$page_set");
while($read=$db->fetch_array($query)){
$read['img'] = $read['img'] ? $read['img'] : "noimg.gif";
$read['goodsname'] = substrs($read['goodsname'],60);
$goods[] = $read;
}
unset($read);$db->free_result($query);
//print_r($goods);
}
}
$data['title'] = "站内搜索 - ".$cfg['sitename'];
include('core/site/search.php');
?>
