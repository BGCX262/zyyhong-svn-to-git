<?php
function SpUpdateStat()
{
	global $cfg_cookie_encode;
	$countCacheFile = dirname(__FILE__).'/../../data/'.md5($cfg_cookie_encode.'cc').'.txt';
	if(!file_exists($countCacheFile)) {
		$fp = fopen($countCacheFile,'w');
		fwrite($fp,1);
		fclose();
	}
	$fp = fopen($countCacheFile,'r');
	$cnums = fread($fp,10);
	fclose($fp);
	$cnums = @intval($cnums);
	$cnums++;
	$fp = fopen($countCacheFile,'w');
	fwrite($fp,$cnums);
	fclose();
  return $cnums;
}
?>