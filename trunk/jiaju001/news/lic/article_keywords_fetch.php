<?php
@ob_start();
@set_time_limit(3600);
require_once(dirname(__FILE__)."/config.php");
CheckPurview('sys_Keyword');
if(empty($action))
{
	require_once(dirname(__FILE__)."/templets/keywords_fetch.htm");
	exit;
}



?>