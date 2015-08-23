<?php
require_once(dirname(__FILE__)."/include/config_base.php");
require_once(dirname(__FILE__)."/include/inc_taglist_view.php");
$PageNo = 1;
if(isset($_SERVER["QUERY_STRING"]))
{
	$tag = trim($_SERVER["QUERY_STRING"]);
	$tags = explode('/',$tag);
	$tag = $tags[1];
	if(count($tags)>3) $PageNo = intval($tags[2]);
}
else
{
	$tag = '';
}
$tag = ereg_replace("[\r\n\t\"\\'%\r\n\t]",'',urldecode($tag));
if($tag != addslashes($tag)) $tag = '';

if($tag=='') $dlist = new TagList($tag,'tag.htm');
else $dlist = new TagList($tag,'taglist.htm');

$dlist->Display();
?>