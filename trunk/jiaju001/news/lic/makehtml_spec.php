<?php
require_once(dirname(__FILE__)."/config.php");
header("Content-Type: text/html; charset={$cfg_ver_lang}");
CheckPurview('sys_MakeHtml');
if(empty($dopost)) $dopost = "";

if($dopost=="ok")
{
  require_once(dirname(__FILE__)."/../include/inc_arcspec_view.php");
  $sp = new SpecView();
  $sp->MakeHtml();
  $sp->Close();
  exit();
}

require_once(dirname(__FILE__)."/templets/makehtml_spec.htm");

ClearAllLink();
?>