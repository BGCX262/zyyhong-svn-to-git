<?php
//API PHPWind GBK 通行证接口 类
class passport
{
	var $passport_api;
	var $action;
	var $passport_key;
	var $passport_cookietime;
	var $db;
	var $member;
	var $encode;
	var $forward;
	var $verify;
	var $exiturl;
	//引入处部变量PHP5支持
	function __construct(){
		$this->db = $GLOBALS["dsql"];
		if(empty($this->db)) $this->db = new DedeSql(false);
		$this->passport_key = $GLOBALS["cfg_cookie_encode"];
		$this->passport_cookietime = $GLOBALS["cfg_keep_time"];
		$this->passport_api = $GLOBALS["cfg_pp_indexurl"].'/passport_client.php';
		$this->member = $GLOBALS['cfg_basehost'].'/member/';
		$this->exiturl = $GLOBALS["cfg_pp_exiturl"];
	}
	//PHP5以下版本构造外部变量
	function passport(){
		$this->__construct();
	}
	//登录动作
	function login($userId,$pwd){
		global $forward,$gourl;
		$this->action = 'login';
		if(isset($forward)){
			$this->forward = rawurldecode($forward);
			unset($forward);
		}elseif(isset($gourl)){
			$gourl = str_replace("../","/",$gourl);
			$gourl = str_replace("//","/",$gourl);
			unset($gourl);
			$this->forward = $GLOBALS["cfg_basehost"]."/".$gourl;
		}else{
			$this->forward = $GLOBALS["cfg_basehost"]."/member/control.php";
		}
		$userdb = array();
		$rs = $this->db->GetOne("SELECT uname,email,scores,money FROM #@__member WHERE userid='$userId'");
		$userdb['uid']		= $rs['ID'];
		$userdb['username']	= $userId;
		$userdb['password']	= md5($pwd);
		$userdb['email']	= $rs['email'];
		$userdb['money']	= $rs['money'];
		$userdb['credit']	= $rs['scores'];
		$userdb['time']		= time();
		$userdb['cktime']	= $userdb['time']+36000;
		$encode = '';
		foreach($userdb as $key=>$val)
		{
			$encode .= $encode ? "&$key=$val" : "$key=$val";
		}
		$this->encode = str_replace('=', '', $this->StrCode($encode));
		$this->verify = md5("login".$this->encode.$this->forward.$this->passport_key);
		unset($userdb);
		$this->_Interface();
	}
	//退出动作
	function logout(){
		global $forward;
		if(!isset($forward)) $this->forward = $this->member."index.php";
		else $this->forward = $forward;
		$userdb = array();
		$this->action = 'quit';
		$userdb['uid']		= '';
		$userdb['username']	= 'exit';
		$userdb['password']	= 'exit';
		$userdb['email']	= 'exit';
		$userdb['time']		= time();
		$userdb['cktime']	= $userdb['time']+36000;
		$encode = '';
		foreach($userdb as $key=>$val)
		{
			$encode .= $encode ? "&$key=$val" : "$key=$val";
		}
		$this->encode = str_replace('=', '', $this->StrCode($encode));
		$this->verify = md5("quit".$this->encode.$this->forward.$this->passport_key);
		unset($userdb);
		$this->_Interface();
	}
	//PW加密编码
	function StrCode($string,$action='ENCODE')
	{
		$key	= substr(md5($_SERVER["HTTP_USER_AGENT"].$this->passport_key),8,18);
		$string	= $action == 'ENCODE' ? $string : base64_decode($string);
		$len	= strlen($key);
		$code	= '';
		for($i=0; $i<strlen($string); $i++)
		{
			$k		= $i % $len;
			$code  .= $string[$i] ^ $key[$k];
		}
		$code = $action == 'DECODE' ? $code : base64_encode($code);
		return $code;
	}
	//转向目标接口	
	function _Interface(){
		$this->db->Close();
		$this->passport_api = $this->passport_api."?action=".$this->action;
		$this->passport_api .= "&userdb=".rawurlencode($this->encode)."&forward=".rawurlencode($this->forward)."&verify=".rawurlencode($this->verify);
		header("Location: ".$this->passport_api);
		exit();
	}
}
?>