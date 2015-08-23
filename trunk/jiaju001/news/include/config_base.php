<?php 
/*************************************************
本文件的信息不建议用户自行更改，否则发生意外自行负责
**************************************************/
error_reporting(E_ALL || ~E_NOTICE);

define('DEDEINC',dirname(__FILE__));

//全局安全检测
foreach($_REQUEST AS $_k => $_v) { 
    if(eregi("^(globals|cfg_)",$_k)) exit('Request var not allow!');
}

//载入用户配置的系统变量
require_once(DEDEINC.'/config_hand.php');
//设置站点维护状态开启后，程序文件最上方有 $cfg_IsCanView=true; 则该程序仍访问
if(!isset($cfg_IsCanView)) $cfg_IsCanView = false;
if(isset($cfg_websafe_open) && $cfg_websafe_open=='Y' && !$cfg_IsCanView)
{
	include(DEDEINC.'/alert.htm');
	exit();
}

//php5.1版本以上时区设置
if(PHP_VERSION > '5.1') {
	$time51 = 'Etc/GMT'.($cfg_cli_time > 0 ? '-' : '+').abs($cfg_cli_time);
	function_exists('date_default_timezone_set') ? @date_default_timezone_set($time51) : '';
}

if(!isset($cfg_needFilter)) $cfg_needFilter = false;

//安全模式检测
$cfg_isUrlOpen = @ini_get('allow_url_fopen');
$cfg_isSafeMode = @ini_get('safe_mode');
if($cfg_isSafeMode)
{
	$cfg_os = strtolower(isset($_ENV['OS']) ? $_ENV['OS'] : @getenv('OS'));
	if($cfg_os=='windows_nt') $cfg_isSafeMode = false;
}

//注册请求变量以及进行安全性检测
require_once(DEDEINC.'/inc_request_vars.php');

//Session保存路径
$sessSavePath = DEDEINC."/../data/sessions/";
if(is_writeable($sessSavePath) && is_readable($sessSavePath)){ session_save_path($sessSavePath); }

//对于仅需要简单ＳＱＬ操作的页面，引入本文件前把此$__ONLYDB设为true，可避免引入不必要的文件
if(!isset($__ONLYDB)) $__ONLYDB = false;
if(!isset($__ONLYCONFIG)) $__ONLYCONFIG = false;

//站点根目录
$ndir = str_replace("\\","/",dirname(__FILE__));
$cfg_basedir = eregi_replace($cfg_cmspath."/include[/]{0,1}$","",$ndir);
if($cfg_multi_site == 'Y') $cfg_mainsite = $cfg_basehost;
else  $cfg_mainsite = '';

//数据库连接信息
$cfg_dbhost = 'localhost';
$cfg_dbname = 'news';
$cfg_dbuser = 'news';
$cfg_dbpwd = '18946981';
$cfg_dbprefix = 'dede_';
$cfg_db_language = 'utf8';

//模板的存放目录
$cfg_templets_dir = $cfg_cmspath.'/templets';
$cfg_templeturl = $cfg_mainsite.$cfg_templets_dir;

//插件目录，这个目录是用于存放计数器、投票、评论等程序的必要动态程序
$cfg_plus_dir = $cfg_cmspath.'/plus';
$cfg_phpurl = $cfg_mainsite.$cfg_plus_dir;

//会员目录
$cfg_member_dir = $cfg_cmspath.'/member';
$cfg_memberurl = $cfg_mainsite.$cfg_member_dir;

//会员个人空间目录#new
$cfg_space_dir = $cfg_cmspath.'/space';
$cfg_spaceurl = $cfg_basehost.$cfg_space_dir;

$cfg_medias_dir = $cfg_cmspath.$cfg_medias_dir;
//上传的普通图片的路径,建议按默认
$cfg_image_dir = $cfg_medias_dir.'/allimg';
//上传的缩略图
$ddcfg_image_dir = $cfg_medias_dir.'/litimg';
//专题列表的存放路径
$cfg_special = $cfg_cmspath.'/special';
//用户投稿图片存放目录
$cfg_user_dir = $cfg_medias_dir.'/userup';
//上传的软件目录
$cfg_soft_dir = $cfg_medias_dir.'/soft';
//上传的多媒体文件目录
$cfg_other_medias = $cfg_medias_dir.'/media';
//圈子目录
$cfg_group_path = $cfg_cmspath.'/group';
//书库目录
$cfg_book_path = $cfg_cmspath.'/book';
//问答模块目录
$cfg_ask_path = $cfg_cmspath.'/ask';
//圈子网址
$cfg_group_url = $cfg_mainsite.$cfg_group_path;
//书库网址
$cfg_book_url = $cfg_mainsite.$cfg_book_path;
//问答模块网址
$cfg_ask_url = $cfg_mainsite.$cfg_ask_path;

//软件摘要信息，****请不要删除本项**** 否则系统无法正确接收系统漏洞或升级信息
//-----------------------------
$cfg_softname = "织梦内容管理系统";
$cfg_soft_enname = "DedeCms V5.1 UTF8版 SP1";
$cfg_soft_devteam = "织梦团队";
$cfg_version = 'V51UTF8_SP1_B88';
$cfg_ver_lang = 'utf-8'; //严禁手工修改此项

//默认扩展名，仅在命名规则不含扩展名的时候调用
$art_shortname = '.shtml';
//文档的默认命名规则
$cfg_df_namerule = '{typedir}/{Y}{M}/{aid}.shtml';
$cfg_df_listnamerule = '{typedir}/{tid}-{page}.shtml';
//新建目录的权限，如果你使用别的属性，本程不保证程序能顺利在Linux或Unix系统运行
$cfg_dir_purview = 0755;

//引入数据库类和常用函数
require_once(DEDEINC.'/config_passport.php');
if($cfg_pp_isopen) include_once(DEDEINC.'/../member/passport/pw.passport.class.php');
if(!$__ONLYCONFIG) include_once(DEDEINC.'/pub_db_mysql.php');
if(!$__ONLYDB) include_once(DEDEINC.'/inc_functions.php');
?>
