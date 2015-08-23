<?php
//强制检查变量
function FilterNotSafeString(&$str)
{
	 global $cfg_notallowstr,$cfg_replacestr;
	 if(strlen($str)>10)
	 {
	  	//禁止字串
	  	if(!empty($cfg_notallowstr) && eregi($cfg_notallowstr,$str)) {
	  		 echo "Messege Error! <a href='javascript:history.go(-1)'>[Go Back]</a>";
	  		 exit();
	  	}
	  	//替换字串
	  	if(!empty($cfg_replacestr)) {
	  	  	$str = eregi_replace($cfg_replacestr,'***',$str);
	  	}
	 }
}

//注册请求字符串并加转义
function RunMagicQuotes(&$str)
{
	global $needFilter,$cfg_notallowstr,$cfg_replacestr;
	if(!get_magic_quotes_gpc())
	{
		 if( is_array($str) ) {
			  foreach($str as $key => $val) $str[$key] = RunMagicQuotes($val);
		 }else{
			  if($needFilter) FilterNotSafeString($str);
			  $str = addslashes($str);
		 }
	}
	else
	{
		 if($needFilter) {
		 	  $str = stripslashes($str);
		 	  FilterNotSafeString($str);
		 	  $str = addslashes($str);
		 }
	}
	return $str;
}

foreach(Array('_GET','_POST','_COOKIE') as $_request) 
{
	 foreach($$_request as $_k => $_v){
	 	 if($_k{0} != '_') ${$_k} = RunMagicQuotes($_v);
	 }
}

//文件上传安全检查
if(is_array($_FILES))
{
  $cfg_not_allowall = "php|pl|cgi|asp|aspx|jsp|php3|shtm|shtml";
  $keyarr = array('name','type','tmp_name','size');
  foreach($_FILES as $_key=>$_value)
  {
	  foreach($keyarr as $k) {
		  if(!isset($_FILES[$_key][$k])) exit('Request Error!');
	  }
	  $$_key = $_FILES[$_key]['tmp_name'] = str_replace("\\\\","\\",$_FILES[$_key]['tmp_name']);
	  ${$_key.'_name'} = $_FILES[$_key]['name'];
	  ${$_key.'_type'} = $_FILES[$_key]['type'] = eregi_replace('[^0-9a-z\./]','',$_FILES[$_key]['type']);
	  ${$_key.'_size'} = $_FILES[$_key]['size'] = ereg_replace('[^0-9]','',$_FILES[$_key]['size']);
	  if(!empty(${$_key.'_name'}) && (eregi("\.(".$cfg_not_allowall.")$",${$_key.'_name'}) || !ereg("\.",${$_key.'_name'})) )
	  {
		   if(!defined('DEDEADMIN')) exit('Upload filetype not allow !');
	  }
	  if(empty(${$_key.'_size'})) ${$_key.'_size'} = @filesize($$_key);
  }
}
?>