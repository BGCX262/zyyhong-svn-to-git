<?php 
$GLOBALS['__funAdmin'] = 1;

function SpGetPinyin($str,$ishead=0,$isclose=1)
{
	global $pinyins;
	$restr = "";
	$str = trim($str);
	$slen = strlen($str);
	if($slen<2) return $str;
	if(count($pinyins)==0){
		$fp = fopen(dirname(__FILE__)."/../data/pinyin.db","r");
		while(!feof($fp)){
			$line = trim(fgets($fp));
			$pinyins[$line[0].$line[1]] = substr($line,3,strlen($line)-3);
		}
		fclose($fp);
	}
	for($i=0;$i<$slen;$i++){
		if(ord($str[$i])>0x80)
		{
			$c = $str[$i].$str[$i+1];
			$i++;
			if(isset($pinyins[$c])){
				if($ishead==0) $restr .= $pinyins[$c];
				else $restr .= $pinyins[$c][0];
			}else $restr .= "-";
		}else if( eregi("[a-z0-9]",$str[$i]) ){	$restr .= $str[$i]; }
		else{ $restr .= "-";  }
	}
	if($isclose==0) unset($pinyins);
	return $restr;
}

function SpCreateDir($spath,$siterefer='',$sitepath='')
{
	if($spath=="") return true;
	global $cfg_dir_purview,$cfg_basedir,$cfg_ftp_mkdir;
	$flink = false;
	if($siterefer==1) $truepath = ereg_replace("/{1,}","/",$cfg_basedir."/".$sitepath);
	else if($siterefer==2){
		$truepath = $sitepath;
		if($cfg_isSafeMode||$cfg_ftp_mkdir=='Y'){ echo "Not Suppot Safemode !"; exit(); }
	}
	else $truepath = $cfg_basedir;
	$spaths = explode("/",$spath);
	$spath = "";
	foreach($spaths as $spath){
		if($spath=="") continue;
		$spath = trim($spath);
		$truepath .= "/".$spath;
		$truepath = str_replace("\\","/",$truepath);
		$truepath = ereg_replace("/{1,}","/",$truepath);
		if(!is_dir($truepath) || !is_writeable($truepath)){ 
			 if(!is_dir($truepath)) $isok = MkdirAll($truepath,$GLOBALS['cfg_dir_purview']);
			 else $isok = ChmodAll($truepath,$GLOBALS['cfg_dir_purview']);
			 if(!$isok){ echo "Create dir ".$truepath." False!<br>"; CloseFtp(); return false; }
		}
	}
	CloseFtp();
	return true;
}

function SpGetEditor($fname,$fvalue,$nheight="350",$etype="Basic",$gtype="print",$isfullpage="false")
{
	if(!isset($GLOBALS['cfg_html_editor'])) $GLOBALS['cfg_html_editor']='fck';
	if($gtype=="") $gtype = "print";
	if($GLOBALS['cfg_html_editor']=='fck'){
	  require_once(dirname(__FILE__)."/../FCKeditor/fckeditor.php");
	  $fck = new FCKeditor($fname);
	  $fck->BasePath		= $GLOBALS['cfg_cmspath'].'/include/FCKeditor/' ;
	  $fck->Width		= '100%' ;
	  $fck->Height		= $nheight ;
	  $fck->ToolbarSet	= $etype ;
	  $fck->Config['FullPage'] = $isfullpage;
	  if($GLOBALS['cfg_fck_xhtml']=='Y'){
	  	$fck->Config['EnableXHTML'] = 'true';
	    $fck->Config['EnableSourceXHTML'] = 'true';
	  }
	  $fck->Value = $fvalue ;
	  if($gtype=="print") $fck->Create();
	  else return $fck->CreateHtml();
  }else{
		require_once(dirname(__FILE__)."/../htmledit/dede_editor.php");
	  $ded = new DedeEditor($fname);
	  $ded->BasePath		= $GLOBALS['cfg_cmspath'].'/include/htmledit/' ;
	  $ded->Width		= '100%' ;
	  $ded->Height		= $nheight ;
	  $ded->ToolbarSet = strtolower($etype);
	  $ded->Value = $fvalue ;
	  if($gtype=="print") $ded->Create();
	  else return $ded->CreateHtml();
	}
}

function SpGetNewInfo()
{
	global $cfg_version,$cfg_cookie_encode;
	$nurl = $_SERVER["HTTP_HOST"];
	if( eregi("[a-z\-]{1,}\.[a-z]{2,}",$nurl) ){ $nurl = urlencode($nurl); }
	else{ $nurl = 'test'; }
	$countCacheFile = dirname(__FILE__).'/../../data/'.md5($cfg_cookie_encode.'cc').'.txt';
	$cnums = 0;
	if(file_exists($countCacheFile)) {
	  $fp = fopen($countCacheFile,'r');
	  $cnums = fread($fp,10);
	  fclose($fp);
	  $fp = fopen($countCacheFile,'w');
		fwrite($fp,0);
		fclose($fp);
	}
	$gs = "<iframe name='stafrm' src='http://www.dedecms.com/newinfo.php?version=".urlencode($cfg_version)."&formurl=$nurl&cnums=$cnums' frameborder='0' id='stafrm' width='100%' height='50'></iframe>\r\n";
	return $gs;
}
?>