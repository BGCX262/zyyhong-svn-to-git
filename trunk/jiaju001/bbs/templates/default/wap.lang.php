<?php

// Message Pack for Discuz! WAP Version 1.0.0
// Created by Crossday

$lang = array
(

	'username' => '用户名',
	'password' => '密码',
	'submit' => '提交',
	'page' => '页',
	'replies' => '回',
	'views' => '点',
	'reply' => '回复',
	'delete' => '删除',
	'anonymous' => '匿名',
	'forum' => '版块',
	'from' => '来自:',
	'type' => '分类:',
	'subject' => '标题:',
	'message' => '内容:',
	'home_page' => '首页',
	'last_page' => '上页',
	'next_page' => '下页',
	'end_page' => '尾页',
	'turn_page' => '翻页',
	'next_thread' => '下一主题',
	'last_thread' => '上一主题',
	'end' => '结束',
	'unread' => '未读',
	'sub_forums' => '子版块',
	'email'	=> '电子邮件',
	'more'	=> '更多',
	'search' => '搜索',
	'digest' => '精华',
	'reload' => '刷新',
	'author' => '作者:',
	'dateline' => '时间:',
	'return' => '返回',
	'keywords' => '关键词',

	'not_loggedin' => '请登录后使用本功能',
	'wap_disabled' => 'WAP 功能未启用',
	'board_closed' => '论坛目前临时关闭',
	'undefined_action' => '未定义操作',

	'home_online' => '在线人数:',
	'home_members' => '会员',
	'home_newpm' => '条新短消息',
	'home_forums' => '论坛板块',
	'home_tools' => '工具箱',
	'home_newthreads' => '查看新帖',

	'login' => '登录',
	'login_username' => '用户名/UID',
	'login_succeed' => '{$discuz_user}成功登录',
	'login_strike' => '累计5次密码错误,15分钟内不能登录',
	'login_invalid' => '用户名或密码有误,您共有5次尝试机会',
	'logout' => '退出',
	'logout_succeed' => '成功退出登录',
	'security_question' => '安全提问',
	'security_answer' => '回答',
	'security_question_0' => '无安全提问',
	'security_question_1' => '母亲的名字',
	'security_question_2' => '爷爷的名字',
	'security_question_3' => '父亲出生的城市',
	'security_question_4' => '您其中一位老师的名字',
	'security_question_5' => '您个人计算机的型号',
	'security_question_6' => '您最喜欢的餐馆名称',
	'security_question_7' => '驾驶执照的最后四位数字',

	'register' => '注册',
	'register_username' => '用户名',
	'register_disable' => '此论坛禁止通过WAP注册',
	'register_ctrl' => '对不起，您的 IP 地址在 $regctrl 小时内只能注册一个帐号，请返回。',
	'register_flood_ctrl' => '对不起，同一 IP 地址在 24 小时内只能进行 $regfloodctrl 次注册尝试，请返回。',
	'register_manual_verify' => '非常感谢您的注册，管理员设置了人工验证新注册用户，请等待审核通过，现在将转入控制面板首页。',
	'register_succeed' => '非常感谢您的注册，现在将以会员身份登录论坛。',

	'fav_add_succeed' => '已成功添加到收藏夹中，请返回。',
	'fav_existence' => '您过去已经收藏过这个主题或者版块，请返回。',

	'goto_last_nonexistence' => '没有比这个主题更早的主题了',
	'goto_next_nonexistence' => '没有比这个主题更晚的主题了',

	'forum_thread_sticky' => '[顶]',
	'forum_thread_digest' => '[精]',
	'forum_nopermission' => '无权访问本版块',
	'forum_nonexistence' => '指定版块不存在',
	'forum_list' => '帖子列表',
	'forum_sublist' => '子版块列表',

	'my' => '我的',
	'my_uid' => 'UID:',
	'my_username' => '用户名:',
	'my_gender' => '性别:',
	'my_bday' => '生日:',
	'my_location' => '来自:',
	'my_bio' => '自我介绍:',
	'my_phone' => '我的手机',
	'my_favorites' => '我的收藏',
	'my_addfav' => '设为我的收藏',
	'my_nonexistence' => '该用户不存在',
	'my_male' => '男',
	'my_female' => '女',
	'my_secrecy' => '保密',
	'my_threads' => '我的主题',
	'my_replies' => '我的回复',
	'my_fav_thread' => '我收藏的主题',
	'my_fav_forum' => '我收藏的版块',

	'thread_nopermission' => '无权查看本主题',
	'thread_nonexistence' => '指定主题不存在',
	'thread_replylist' => '回复列表',
	'thread_reply' => '回复主题:',
	'thread_quickreply' => '快速回复',

	'post_reply' => '回复本帖',
	'post_new' => '发新话题',
	'post_sm_isnull' => '未填写标题或内容',
	'post_subject_toolong' => '标题超过80字节',
	'post_message_toolong' => '内容超过{$minpostsize}字节限制',
	'post_message_tooshort' => '内容少于{$maxpostsize}字节限制',
	'post_type_isnull' => '未选择主题分类',
	'post_flood_ctrl' => '两次发表少于{$floodctrl}秒',
	'post_mod_succeed' => '成功提交人工审核',
	'post_mod_forward' => '回到当前论坛',
	'post_thread_closed' => '本主题已关闭',
	'post_thread_closed_by_dateline' => '本主题发布于$forum[autoclose]天前<br />已被自动关闭',
	'post_thread_closed_by_lastpost' => '本主题最后回复于$forum[autoclose]天前<br />已被自动关闭',
	'post_newbie_span' => '注册{$newbiespan}小时后才可发帖',
	'post_hide_nopermission' => '无权使用[hide]代码',
	'post_newthread_nopermission' => '无权在本论坛发新话题',
	'post_newthread_succeed' => '主题发表成功<br /><a href=\"index.php?action=forum&amp;fid=$fid\">返回论坛</a>',
	'post_newthread_forward' => '查看主题',
	'post_newreply_nopermission' => '无权在本论坛发表回复',
	'post_newreply_succeed' => '主题回复成功<br /><a href=\"index.php?action=forum&amp;fid=$fid\">返回论坛</a>',
	'post_newreply_forward' => '查看回复',

	'profile_username_toolang' => '对不起，您的用户名超过 15 个字符，请返回输入一个较短的用户名。',
	'profile_username_tooshort' => '对不起，您输入的用户名小于3个字符, 请返回输入一个较长的用户名。',
	'profile_passwd_notmatch' => '两次输入的密码不一致，请返回检查后重试。',
	'profile_username_duplicate' => '该用户名已经被注册了，请返回重新填写。',
	'profile_email_duplicate' => '该 Email 地址已经被注册了，请返回重新填写。',
	'profile_username_illegal' => '用户名包含敏感字符或被系统屏蔽，请返回重新填写。',
	'profile_passwd_illegal' => '密码空或包含非法字符，请返回重新填写。',
	'profile_email_illegal' => 'Email 地址无效或包含不可使用的邮箱域名，请返回重新填写。',
	'profile_email_verify' => '确认 Email 已经发送，请用邮件中提供的方法激活您的帐号。如果您没有收到我们发送的系统邮件，请点击控制面板首页中的“重新验证 Email 有效性”，或尝试更换另外一个地址。注意：在完成激活之前，根据管理员设置，您将只能以等验证会员的身份访问论坛，您可能不能进行发帖等操作。激活成功后，上述限制将自动取消。',

	'pm' => '短消息',
	'pm_home' => '短消息首页',
	'pm_list' => '短消息列表',
	'pm_unread' => '未读消息',
	'pm_all' => '全部消息',
	'pm_send' => '发送短消息',
	'pm_to' => '收信人',
	'pm_delete_all' => '删除已读短信',
	'pm_flood_ctrl' => '两次发表少于{$floodctrl}秒',
	'pm_delete_confirm' => '确认删除所有已读短信',

	'pm_sm_isnull' => '未填写标题或内容',
	'pm_nonexistence' => '短消息不存在',
	'pm_send_nonexistence' => '收信人不存在',
	'pm_send_ignore' => '收件人拒收短消息',
	'pm_send_succeed' => '短消息成功发送',
	'pm_delete_succeed' => '短消息成功删除',

	'return_thread' => '返回主题',
	'return_forum' => '返回板块',

	'stats' => '论坛统计',
	'stats_threads' => '主题数',
	'stats_posts' => '帖子数',
	'stats_members' => '会员数',

	'search' => '论坛搜索',
	'search_result' => '搜索结果',
	'search_invalid' => '您没有指定要搜索的关键字或用户名，请返回重新填写。',
	'search_ctrl' => '对不起，您在 $searchctrl 秒内只能进行一次搜索，请返回。',
	'search_id_invalid' => '您指定的搜索不存在或已过期，请返回。',
	'search_group_nopermission' => '您所在的用户组没有搜索权限，请返回',

	'goto' => 'WAP跳转',
	'wap_submit_invalid' => '验证信息不正确',
	'post_hide_reply_hidden' => '** 本内容隐藏 **',
    'topindex' => '城市家居网首页',
'infoo' => '<br />wap.jiaju001.com 京ICP证090435号<br />客服电话 400-650-3056',

);

?>