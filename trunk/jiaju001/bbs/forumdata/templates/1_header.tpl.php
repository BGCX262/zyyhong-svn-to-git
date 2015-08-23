<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$charset?>" />
<title><?=$navtitle?> <?=$bbname?> <?=$seotitle?> - 诺贝尔、史密斯、一统 、 安信、万和、方太、马可波罗、澳柯玛、 箭牌、 法恩莎 、阿里斯顿、 陇星、 大马仕、 科宝博洛尼、汇德邦、克洛尼 家居建材团购资讯装修点评-家</title>
<?=$seohead?>
<meta name="keywords" content="<?=$metakeywords?><?=$seokeywords?>" />
<meta name="description" content="<?=$metadescription?> <?=$bbname?> <?=$seodescription?>" />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<link rel="archives" title="<?=$bbname?>" href="<?=$boardurl?>archiver/" />
<?=$rsshead?>
<?=$extrahead?>
<? if($allowcsscache) { ?>
	<link rel="stylesheet" type="text/css" href="forumdata/cache/style_<?=STYLEID?>.css" />
	<link rel="stylesheet" type="text/css" href="forumdata/cache/style_<?=STYLEID?>_append.css" />
	
<? } else { ?>
	<style type="text/css">
<? include template('css'); ?>
</style>
	<style type="text/css">
<? include template('css_append'); ?>
</style>
<? } ?>
<script type="text/javascript">var IMGDIR = '<?=IMGDIR?>';var attackevasive = '<?=$attackevasive?>';var gid = 0;<? if(in_array(CURSCRIPT, array('viewthread', 'forumdisplay'))) { ?>gid = parseInt('<?=$thisgid?>');<? } elseif(CURSCRIPT == 'index') { ?>gid = parseInt('<?=$gid?>');<? } ?>var fid = parseInt('<?=$fid?>');var tid = parseInt('<?=$tid?>');</script>
<script src="include/javascript/common.js" type="text/javascript"></script>
<script src="include/javascript/menu.js" type="text/javascript"></script>
<script src="include/javascript/ajax.js" type="text/javascript"></script>
</head>
<body onkeydown="if(event.keyCode==27) return false;">
	<div id="append_parent"></div><div id="ajaxwaitid"></div>
	<div class="wrap"><div class="logo"><a href="http://bbs.jiaju001.com<? if($areaid==2) { ?>/?areaid=2<? } ?>" title="家居论坛">家居论坛</a></div><div id="tbar">
<ul>
			<? if($discuz_uid) { ?>
				<li><cite><a href="space.php?action=viewpro&amp;uid=<?=$discuz_uid?>"><?=$discuz_userss?></a></cite></li>
				<li><a href="<?=$link_logout?>" class="notabs">退出</a></li>
				<? if($maxpmnum) { ?><li<? if($BASESCRIPT == 'pm.php') { ?> class="current"<? } ?>><a href="pm.php" target="_blank">短消息</a></li><? } ?>
			<? } else { ?>
				<li<? if($BASESCRIPT == $regname) { ?> class="current"<? } ?>><a href="<?=$link_register?>" class="notabs"><?=$reglinkname?></a></li>
				<li<? if($BASESCRIPT == 'logging.php') { ?> class="current"<? } ?>><a href="<?=$link_login?>">登录</a></li>
			<? } ?>

			<? if($memliststatus) { ?><li<? if($BASESCRIPT == 'member.php') { ?> class="current"<? } ?>><a href="member.php?action=list">会员</a></li><? } ?>
			<? if($allowsearch || $qihoo['status']) { ?><li<? if($BASESCRIPT == 'search.php') { ?> class="current"<? } ?>><a href="search.php<? if(!empty($fid)) { ?>?srchfid=<?=$fid?><? } ?>">搜索</a></li><? } ?>
			<? if($tagstatus) { ?><li<? if($BASESCRIPT == 'tag.php') { ?> class="current"<? } ?>><a href="tag.php">标签</a></li><? } ?>
			<? if(!empty($plugins['links'])) { if(is_array($plugins['links'])) { foreach($plugins['links'] as $module) { ?>						<? if(!$module['adminid'] || ($module['adminid'] && $adminid > 0 && $module['adminid'] >= $adminid)) { ?><li><?=$module['url']?></li><? } ?>
				<? } } } ?>
			<? if($discuz_uid) { ?>
				<? if($jsmenu['4']) { ?><li id="my" class="dropmenu<? if($BASESCRIPT == 'my.php') { ?> current<? } ?>" onmouseover="showMenu(this.id)"><a href="my.php">我的</a></li><? } else { ?><li><a href="my.php?item=threads"<? if($BASESCRIPT == 'my.php') { ?>class="current"<? } ?>>我的话题</a></li><? } ?>
				<? if($jsmenu['2']) { ?><li id="memcp" class="dropmenu<? if($BASESCRIPT == 'memcp.php') { ?> current<? } ?>" onmouseover="showMenu(this.id)"><a href="memcp.php">控制面板</a></li><? } else { ?><li><a href="memcp.php"<? if($BASESCRIPT == 'memcp.php') { ?>class="current"<? } ?>>控制面板</a></li><? } ?>
				<? if($regstatus > 1) { ?><li<? if($BASESCRIPT == 'invite.php') { ?> class="current"<? } ?>><a href="invite.php">邀请注册</a></li><? } ?>
				<? if($magicstatus) { ?><li<? if($BASESCRIPT == 'magic.php') { ?> class="current"<? } ?>><a href="magic.php">道具</a></li><? } ?>
			<? } ?>
			<? if(!empty($plugins['jsmenu'])) { ?><li id="plugin" class="dropmenu" onmouseover="showMenu(this.id)"><a href="#"><?=$pluginjsmenu?></a></li><? } ?>
			<? if($allowviewstats) { if(!empty($jsmenu['3'])) { ?><li id="stats" class="dropmenu<? if($BASESCRIPT == 'stats.php') { ?> current<? } ?>" onmouseover="showMenu(this.id)"><a href="stats.php">统计</a></li><? } else { ?><li><a href="stats.php">统计</a></li><? } } ?>
			<? if($discuz_uid && in_array($adminid, array(1, 2, 3))) { ?><li><a href="admincp.php" target="_blank">系统设置</a></li><? } ?></ul>
</div><div class="addfav"><ul><li id="cart"><a href="<?=$siteurl?>/member/cart.html">购物车</a></li><li id="my"><a href="http://www.jiaju001.com/member/">我的账户</a></li><li id="card"><a href="<?=$siteurl?>/page/getcard.html">索取会员卡</a></li><li><span style="CURSOR: hand" onClick="var strHref=window.location.href;this.style.behavior='url(#default#homepage)';this.setHomePage('<?=$siteurl?>');" class="set_home">设为首页</span> <a href="javascript:viod(0)" title="北京家居网" onClick="window.external.addFavorite('<?=$siteurl?>','北京家居网')">收藏</a></li></ul></div><div class="hack"></div></div><div class="wrap"><div class="nav"><div class="tl"></div><div class="tr"><ul><li><a href="<?=$siteurl?>/page/bao.html" title="购物保障">购物保障</a></li><li><a href="<?=$siteurl?>/page/buy.html" title="购物流程">购物流程</a></li></ul></div><div class="tm"><div class="menu"><ul><li><a href="<?=$siteurl?>">商城首页</a></li><li><a href="http://news.jiaju001.com">家居资讯</a></li><li><a href="<?=$siteurl?>/huodong/" target="_parent">活动专区</a></li><li><a href="<?=$siteurl?>/cuxiao/" target="_parent">促销专区</a></li><li><a href="<?=$siteurl?>/card/" target="_parent">家居龙卡</a><img style="position:absolute;top:51px;margin-left:20px;"src="http://www.jiaju001.com/images/v2/icon_new.gif"  width="20" height="23" border="0" alt="全新上线"/></li><li><a href="<?=$siteurl?>/jifen/" target="_parent">积分换礼</a></li><li class="cur"><a href="http://bbs.jiaju001.com<? if($areaid==2) { ?>/?areaid=2<? } ?>">家居论坛</a></li></ul><div class="hack"></div></div><div class="search-bar"><form id="globalsearch" action="<?=$siteurl?>/search" method="get" onsubmit="cleanTip()"><input id="search-key" name="key" value="搜索您感兴趣的商品、品牌..." title="搜索您感兴趣的商品、品牌..." class="so-from" onclick="cleanTip();" onblur="cleanTip();" /> <input src="http://www.jiaju001.com/images/v2/inco_so.png" type="image" align="absmiddle" /><a href="<?=$siteurl?>/list/diban.html">地板</a> <a href="<?=$siteurl?>/list/cizhuan.html">瓷砖</a> <a href="<?=$siteurl?>/list/bizhi.html">壁纸</a> <a href="<?=$siteurl?>/list/weiyu.html">卫浴</a> <a href="<?=$siteurl?>/list/men.html">门窗</a> <a href="<?=$siteurl?>/list/chugui.html">橱柜</a> <a href="<?=$siteurl?>/list/youqi.html"></a> <a href="<?=$siteurl?>/list/jiaju.html">家具</a></form></div></div></div></div><div class="wrap">
		
		