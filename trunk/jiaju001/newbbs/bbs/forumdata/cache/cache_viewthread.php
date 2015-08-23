<?php
//Discuz! cache file, DO NOT modify me!
//Created: Apr 21, 2010, 10:12
//Identify: 22881d6d0dec00523b03b21229ea4992

$_DCACHE['advs'] = array (
);

$_DCACHE['bbcodes'] = array (
  'searcharray' => 
  array (
    0 => '/\\[qq]([^"\\[]+?)\\[\\/qq\\]/is',
  ),
  'replacearray' => 
  array (
    0 => '<a href="http://wpa.qq.com/msgrd?V=1&Uin=\\1&amp;Site=[Discuz!]&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:\\1:1" border="0"></a>',
  ),
);

$_DCACHE['custominfo'] = array (
  'customauthorinfo' => 
  array (
    2 => '<dt>UID</dt><dd>$post[uid]&nbsp;</dd><dt>帖子</dt><dd>$post[posts]&nbsp;</dd><dt>精华</dt><dd>$post[digestposts]&nbsp;</dd><dt>积分</dt><dd>$post[credits]&nbsp;</dd><dt>阅读权限</dt><dd>$post[readaccess]&nbsp;</dd>".($post[location] ? "<dt>来自</dt><dd>$post[location]&nbsp;</dd>" : "")."<dt>在线时间</dt><dd>$post[oltime] 小时&nbsp;</dd><dt>注册时间</dt><dd>$post[regdate]&nbsp;</dd><dt>最后登录</dt><dd>$post[lastdate]&nbsp;</dd>',
    1 => NULL,
  ),
  'fieldsadd' => '',
  'profilefields' => 
  array (
  ),
  'postno' => 
  array (
    0 => '<sup>#</sup>',
  ),
);

$_DCACHE['focus'] = array (
  'title' => NULL,
  'data' => 
  array (
  ),
);

$_DCACHE['forums'] = array (
  1 => 
  array (
    'fid' => '1',
    'type' => 'group',
    'name' => 'Discuz!',
    'fup' => '0',
    'viewperm' => '',
    'orderby' => 'lastpost',
    'ascdesc' => 'DESC',
    'status' => '1',
    'extra' => 
    array (
    ),
  ),
  2 => 
  array (
    'fid' => '2',
    'type' => 'forum',
    'name' => '默认版块',
    'fup' => '1',
    'viewperm' => '',
    'orderby' => 'lastpost',
    'ascdesc' => 'DESC',
    'users' => NULL,
    'status' => '1',
    'extra' => 
    array (
    ),
  ),
);

$_DCACHE['groupicon'] = array (
  1 => 'images/common/online_admin.gif',
  2 => 'images/common/online_supermod.gif',
  3 => 'images/common/online_moderator.gif',
  0 => 'images/common/online_member.gif',
);

$_DCACHE['ranks'] = array (
);

$_DCACHE['smileytypes'] = array (
  1 => 
  array (
    'name' => '默认',
    'directory' => 'default',
  ),
  2 => 
  array (
    'name' => '酷猴',
    'directory' => 'coolmonkey',
  ),
  3 => 
  array (
    'name' => '呆呆男',
    'directory' => 'grapeman',
  ),
);

$_DCACHE['smilies'] = array (
  'searcharray' => 
  array (
    13 => '/\\:loveliness\\:/',
    23 => '/\\:handshake/',
    20 => '/\\:victory\\:/',
    36 => '/\\{\\:2_36\\:\\}/',
    53 => '/\\{\\:3_53\\:\\}/',
    40 => '/\\{\\:2_40\\:\\}/',
    57 => '/\\{\\:3_57\\:\\}/',
    27 => '/\\{\\:2_27\\:\\}/',
    44 => '/\\{\\:3_44\\:\\}/',
    61 => '/\\{\\:3_61\\:\\}/',
    31 => '/\\{\\:2_31\\:\\}/',
    48 => '/\\{\\:3_48\\:\\}/',
    18 => '/\\:sleepy\\:/',
    35 => '/\\{\\:2_35\\:\\}/',
    52 => '/\\{\\:3_52\\:\\}/',
    39 => '/\\{\\:2_39\\:\\}/',
    56 => '/\\{\\:3_56\\:\\}/',
    26 => '/\\{\\:2_26\\:\\}/',
    43 => '/\\{\\:3_43\\:\\}/',
    60 => '/\\{\\:3_60\\:\\}/',
    30 => '/\\{\\:2_30\\:\\}/',
    47 => '/\\{\\:3_47\\:\\}/',
    64 => '/\\{\\:3_64\\:\\}/',
    17 => '/\\:shutup\\:/',
    34 => '/\\{\\:2_34\\:\\}/',
    51 => '/\\{\\:3_51\\:\\}/',
    38 => '/\\{\\:2_38\\:\\}/',
    55 => '/\\{\\:3_55\\:\\}/',
    25 => '/\\{\\:2_25\\:\\}/',
    42 => '/\\{\\:3_42\\:\\}/',
    59 => '/\\{\\:3_59\\:\\}/',
    29 => '/\\{\\:2_29\\:\\}/',
    46 => '/\\{\\:3_46\\:\\}/',
    63 => '/\\{\\:3_63\\:\\}/',
    33 => '/\\{\\:2_33\\:\\}/',
    50 => '/\\{\\:3_50\\:\\}/',
    37 => '/\\{\\:2_37\\:\\}/',
    54 => '/\\{\\:3_54\\:\\}/',
    41 => '/\\{\\:3_41\\:\\}/',
    58 => '/\\{\\:3_58\\:\\}/',
    28 => '/\\{\\:2_28\\:\\}/',
    45 => '/\\{\\:3_45\\:\\}/',
    62 => '/\\{\\:3_62\\:\\}/',
    32 => '/\\{\\:2_32\\:\\}/',
    49 => '/\\{\\:3_49\\:\\}/',
    16 => '/\\:dizzy\\:/',
    15 => '/\\:curse\\:/',
    14 => '/\\:funk\\:/',
    22 => '/\\:kiss\\:/',
    21 => '/\\:time\\:/',
    24 => '/\\:call\\:/',
    19 => '/\\:hug\\:/',
    12 => '/\\:lol/',
    4 => '/\\:\'\\(/',
    6 => '/\\:o/',
    10 => '/\\:L/',
    1 => '/\\:\\)/',
    5 => '/\\:@/',
    9 => '/;P/',
    8 => '/\\:\\$/',
    3 => '/\\:D/',
    7 => '/\\:P/',
    11 => '/\\:Q/',
    2 => '/\\:\\(/',
  ),
  'replacearray' => 
  array (
    13 => 'loveliness.gif',
    23 => 'handshake.gif',
    20 => 'victory.gif',
    36 => '12.gif',
    53 => '13.gif',
    40 => '16.gif',
    57 => '17.gif',
    27 => '03.gif',
    44 => '04.gif',
    61 => '21.gif',
    31 => '07.gif',
    48 => '08.gif',
    18 => 'sleepy.gif',
    35 => '11.gif',
    52 => '12.gif',
    39 => '15.gif',
    56 => '16.gif',
    26 => '02.gif',
    43 => '03.gif',
    60 => '20.gif',
    30 => '06.gif',
    47 => '07.gif',
    64 => '24.gif',
    17 => 'shutup.gif',
    34 => '10.gif',
    51 => '11.gif',
    38 => '14.gif',
    55 => '15.gif',
    25 => '01.gif',
    42 => '02.gif',
    59 => '19.gif',
    29 => '05.gif',
    46 => '06.gif',
    63 => '23.gif',
    33 => '09.gif',
    50 => '10.gif',
    37 => '13.gif',
    54 => '14.gif',
    41 => '01.gif',
    58 => '18.gif',
    28 => '04.gif',
    45 => '05.gif',
    62 => '22.gif',
    32 => '08.gif',
    49 => '09.gif',
    16 => 'dizzy.gif',
    15 => 'curse.gif',
    14 => 'funk.gif',
    22 => 'kiss.gif',
    21 => 'time.gif',
    24 => 'call.gif',
    19 => 'hug.gif',
    12 => 'lol.gif',
    4 => 'cry.gif',
    6 => 'shocked.gif',
    10 => 'sweat.gif',
    1 => 'smile.gif',
    5 => 'huffy.gif',
    9 => 'titter.gif',
    8 => 'shy.gif',
    3 => 'biggrin.gif',
    7 => 'tongue.gif',
    11 => 'mad.gif',
    2 => 'sad.gif',
  ),
  'typearray' => 
  array (
    13 => '1',
    23 => '1',
    20 => '1',
    36 => '2',
    53 => '3',
    40 => '2',
    57 => '3',
    27 => '2',
    44 => '3',
    61 => '3',
    31 => '2',
    48 => '3',
    18 => '1',
    35 => '2',
    52 => '3',
    39 => '2',
    56 => '3',
    26 => '2',
    43 => '3',
    60 => '3',
    30 => '2',
    47 => '3',
    64 => '3',
    17 => '1',
    34 => '2',
    51 => '3',
    38 => '2',
    55 => '3',
    25 => '2',
    42 => '3',
    59 => '3',
    29 => '2',
    46 => '3',
    63 => '3',
    33 => '2',
    50 => '3',
    37 => '2',
    54 => '3',
    41 => '3',
    58 => '3',
    28 => '2',
    45 => '3',
    62 => '3',
    32 => '2',
    49 => '3',
    16 => '1',
    15 => '1',
    14 => '1',
    22 => '1',
    21 => '1',
    24 => '1',
    19 => '1',
    12 => '1',
    4 => '1',
    6 => '1',
    10 => '1',
    1 => '1',
    5 => '1',
    9 => '1',
    8 => '1',
    3 => '1',
    7 => '1',
    11 => '1',
    2 => '1',
  ),
);

$_DCACHE['stamps'] = array (
  0 => 
  array (
    'url' => '001.gif',
    'text' => '精华',
  ),
  1 => 
  array (
    'url' => '002.gif',
    'text' => '热帖',
  ),
  2 => 
  array (
    'url' => '003.gif',
    'text' => '美图',
  ),
  3 => 
  array (
    'url' => '004.gif',
    'text' => '优秀',
  ),
  4 => 
  array (
    'url' => '005.gif',
    'text' => '置顶',
  ),
  5 => 
  array (
    'url' => '006.gif',
    'text' => '推荐',
  ),
  6 => 
  array (
    'url' => '007.gif',
    'text' => '原创',
  ),
  7 => 
  array (
    'url' => '008.gif',
    'text' => '版主推荐',
  ),
  8 => 
  array (
    'url' => '009.gif',
    'text' => '爆料',
  ),
);

$_DCACHE['tags'] = array (
  1 => '[\'%E4%BA%8C%E6%89%8B%E6%88%BF%E8%A3%85%E4%BF%AE\',\'%E5%AE%B6%E5%85%B7\',\'%E6%97%A7%E6%88%BF%E7%BF%BB%E6%96%B0\',\'%E6%97%A7%E6%88%BF%E8%A3%85%E4%BF%AE\',\'%E4%BA%8C%E6%89%8B%E6%88%BF%E6%94%B9%E9%80%A0\',\'%E6%99%BA%E8%83%BD%E5%AE%B6%E5%B1%85\',\'%E8%83%8C%E6%99%AF%E9%9F%B3%E4%B9%90\',\'%E5%BB%BA%E6%9D%90\',\'%E4%BA%BA%E9%80%A0%E7%9F%B3\',\'%E8%A3%85%E4%BF%AE\',\'%E5%8C%97%E4%BA%AC%E4%BA%BA%E9%80%A0%E7%9F%B3\',\'%E4%BA%BA%E9%80%A0%E7%9F%B3%E5%8A%A0%E5%B7%A5\',\'%E5%AE%9E%E5%88%9B%E6%9C%80%E6%96%B0%E6%B4%BB%E5%8A%A8\',\'%E4%BA%BA%E9%80%A0%E7%9F%B3%E5%8F%B0%E9%9D%A2\',\'%E9%98%B2%E6%B0%B4%E7%BB%B4%E4%BF%AE\',\'%E4%BA%BA%E9%80%A0%E7%9F%B3%E4%BB%B7%E6%A0%BC\',\'%E7%99%BE%E9%82%A6%E8%A3%85%E9%A5%B0\',\'%E7%AE%80%E7%BA%A6\',\'28800%E7%B2%BE%E8%A3%85\',\'%E6%BC%8F%E6%B0%B4%E7%BB%B4%E4%BF%AE\',\'%E5%AE%9E%E5%88%9B\',\'%E6%B0%91%E7%94%A8%E5%AE%B6%E5%85%B7\',\'%E6%9D%BF%E5%BC%8F%E5%AE%B6%E5%85%B7\',\'%E5%8A%9E%E5%85%AC%E5%AE%B6%E5%85%B7\',\'%E4%BA%91%E5%8D%97%E6%97%85%E6%B8%B8\',\'%E8%A1%A3%E6%9F%9C\',\'%E7%8E%AF%E4%BF%9D\',\'%E5%A2%99%E9%9D%A2%E7%B2%89%E5%88%B7\',\'%E4%BA%8C%E6%89%8B%E6%88%BF\',\'%E6%B0%B4%E7%AE%A1%E7%BB%B4%E4%BF%AE\',\'%E8%A3%85%E4%BF%AE%E5%85%AC%E5%8F%B8\',\'%E4%BC%9A%E5%B1%95\',\'%E6%9D%AD%E5%B7%9E%E7%B1%B3%E5%A5%A5%E5%85%B0%E7%89%B9\',\'%E5%8C%97%E4%BA%AC%E8%A3%85%E4%BF%AE\',\'%E9%A6%99%E6%A0%BC%E9%87%8C%E6%8B%89%E6%97%85%E6%B8%B8\',\'%E5%A4%A7%E7%90%86%E6%97%85%E6%B8%B8\',\'%E4%B8%9C%E4%BA%AC\',\'%E6%97%A5%E6%9C%AC%E5%BB%BA%E6%9D%90%E5%B1%95\',\'%E4%B8%BD%E6%B1%9F%E6%97%85%E6%B8%B8\',\'%E8%A5%BF%E5%8F%8C%E7%89%88%E7%BA%B3%E6%97%85%E6%B8%B8\',\'%E6%95%B4%E4%BD%93%E5%8E%A8%E6%88%BF\',\'%E6%B0%B4%E7%94%B5%E7%BB%B4%E4%BF%AE\',\'%E5%B9%BB%E5%9B%BE%E6%BC%86\',\'%E7%8E%AF%E4%BF%9D%E6%B6%82%E6%96%99\',\'%E5%8C%97%E4%BA%AC\',\'%E8%A3%85%E9%A5%B0%E5%BB%BA%E6%9D%90%E4%BB%A3%E7%90%86\',\'%E5%8C%97%E4%BA%AC%E8%A3%85%E9%A5%B0%E5%85%AC%E5%8F%B8\',\'%E6%B0%B4%E7%AE%A1%E6%BC%8F%E6%B0%B4\',\'%E5%8A%9E%E5%85%AC%E5%AE%A4%E8%A3%85%E4%BF%AE\',\'%E5%BA%97%E9%9D%A2%E8%A3%85%E4%BF%AE\',\'%E9%9B%86%E9%87%87%E6%B4%BB%E5%8A%A8\',\'%E8%BD%AF%E6%B0%B4%E6%9C%BA\',\'%E6%97%A7%E6%88%BF%E6%94%B9%E9%80%A0\',\'%E5%93%81%E7%89%8C\',\'%E6%AC%A7%E5%BE%B7%E4%B8%BD%E5%B0%94\',\'%E6%9C%A8%E5%9C%B0%E6%9D%BF\',\'%E5%8A%A0%E7%9B%9F\',\'%E7%8E%AF%E4%BF%9D%E6%A3%80%E6%B5%8B%E6%8A%A5%E5%91%8A\',\'%E5%AE%9E%E6%9C%A8%E5%AE%B6%E5%85%B7\',\'%E6%89%8B%E6%9C%BA\',\'%E5%B0%8F%E5%9E%8B%E9%A1%B9%E7%9B%AE\',\'%E9%A1%B9%E7%9B%AE%E6%8A%95%E8%B5%84\',\'%E6%99%BA%E8%83%BD\',\'%E6%95%B0%E7%A0%81%E9%80%9A%E8%AE%AF\',\'%E6%97%B6%E5%B0%9A\',\'%E5%8C%97%E4%BA%AC%E8%A3%85%E4%BF%AE%E5%85%AC%E5%8F%B8\',\'%E8%89%BA%E6%9C%AF%E6%B6%82%E6%96%99\',\'%E7%81%AF%E9%A5%B0\',\'%E5%8E%9F%E6%9C%A8%E5%AE%B6%E5%85%B7\',\'%E7%8E%AF%E5%A2%83\',\'%E7%BB%BF%E8%89%B2\',\'%E9%A6%99%E5%B7%B4%E6%8B%89%E5%AE%B6%E5%B1%85%E7%BD%91\',\'%E5%BC%80%E6%8B%93%E8%80%85\',\'%E5%8E%A8%E5%8D%AB%E5%9B%A2%E8%B4%AD\',\'%E6%8B%8D%E7%85%A7\',\'%E4%BD%8E%E6%88%90%E6%9C%AC%EF%BC%8C%E9%AB%98%E5%88%A9%E6%B6%A6\',\'%E5%B0%8F%E5%9E%8B%E6%8A%95%E8%B5%84\',\'%E6%97%A7%E6%88%BF\',\'%E5%A2%99%E5%90%8C%E7%B2%89%E5%88%B7\',\'%E6%97%B6%E5%B0%9A%E5%AE%B6%E5%B1%85\',\'%E6%94%B9%E9%80%A0\',\'%E4%BB%A3%E7%90%86\',\'%E7%8E%AF%E4%BF%9D%E6%96%B0%E9%A1%B9%E7%9B%AE\',\'%E8%B5%9A%E9%92%B1%E6%9C%80%E5%AE%B9%E6%98%93\',\'%E8%89%BA%E6%9C%AF%E5%A2%99%E9%9D%A2%E6%BC%86\',\'%E5%8A%9E%E5%85%AC%E5%AE%A4%E8%A3%85%E6%BD%A2\',\'%E5%8A%9E%E5%85%AC%E5%AE%A4%E8%A3%85%E9%A5%B0\',\'%E7%94%B5%E8%B7%AF%E7%BB%B4%E4%BF%AE\',\'%E9%98%B2%E6%B0%B4%E6%BC%8F%E6%B0%B4\',\'%E6%B0%B4%E7%94%B5%E8%B7%AF%E5%AE%89%E8%A3%85\',\'%E5%BA%97%E9%93%BA%E8%A3%85%E4%BF%AE\',\'%E4%BA%A7%E5%93%81\',\'%E6%9C%8D%E8%A3%85%E5%BA%97%E8%A3%85%E4%BF%AE\',\'%E5%AE%A4%E5%86%85%E6%B6%82%E6%96%99\',\'%E5%BB%BA%E7%AD%91%E6%9D%90%E6%96%99\',\'%E5%A2%99%E6%BC%86\',\'%E4%BA%91%E5%8D%97%E9%85%92%E5%BA%97\',\'%E4%BA%91%E5%8D%97%E9%85%92%E5%BA%97%E9%A2%84%E8%AE%A2\',\'08%E5%88%9B%E4%B8%9A%E6%96%B0%E9%A1%B9%E7%9B%AE\',\'%E9%98%B2%E6%B0%B4%E5%A0%B5%E6%BC%8F\']',
  0 => '[\'二手房装修\',\'家具\',\'旧房翻新\',\'旧房装修\',\'二手房改造\',\'智能家居\',\'背景音乐\',\'建材\',\'人造石\',\'装修\',\'北京人造石\',\'人造石加工\',\'实创最新活动\',\'人造石台面\',\'防水维修\',\'人造石价格\',\'百邦装饰\',\'简约\',\'28800精装\',\'漏水维修\',\'实创\',\'民用家具\',\'板式家具\',\'办公家具\',\'云南旅游\',\'衣柜\',\'环保\',\'墙面粉刷\',\'二手房\',\'水管维修\',\'装修公司\',\'会展\',\'杭州米奥兰特\',\'北京装修\',\'香格里拉旅游\',\'大理旅游\',\'东京\',\'日本建材展\',\'丽江旅游\',\'西双版纳旅游\',\'整体厨房\',\'水电维修\',\'幻图漆\',\'环保涂料\',\'北京\',\'装饰建材代理\',\'北京装饰公司\',\'水管漏水\',\'办公室装修\',\'店面装修\',\'集采活动\',\'软水机\',\'旧房改造\',\'品牌\',\'欧德丽尔\',\'木地板\',\'加盟\',\'环保检测报告\',\'实木家具\',\'手机\',\'小型项目\',\'项目投资\',\'智能\',\'数码通讯\',\'时尚\',\'北京装修公司\',\'艺术涂料\',\'灯饰\',\'原木家具\',\'环境\',\'绿色\',\'香巴拉家居网\',\'开拓者\',\'厨卫团购\',\'拍照\',\'低成本，高利润\',\'小型投资\',\'旧房\',\'墙同粉刷\',\'时尚家居\',\'改造\',\'代理\',\'环保新项目\',\'赚钱最容易\',\'艺术墙面漆\',\'办公室装潢\',\'办公室装饰\',\'电路维修\',\'防水漏水\',\'水电路安装\',\'店铺装修\',\'产品\',\'服装店装修\',\'室内涂料\',\'建筑材料\',\'墙漆\',\'云南酒店\',\'云南酒店预订\',\'08创业新项目\',\'防水堵漏\']',
  2 => '200',
);

$_DCACHE['usergroups'] = array (
  1 => 
  array (
    'type' => 'system',
    'grouptitle' => '管理员',
    'stars' => '9',
    'groupavatar' => '',
    'readaccess' => '200',
    'allowcusbbcode' => '1',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  18 => 
  array (
    'type' => 'special',
    'grouptitle' => '信息监察员',
    'stars' => '9',
    'groupavatar' => '',
    'readaccess' => '200',
    'allowcusbbcode' => '1',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  17 => 
  array (
    'type' => 'special',
    'grouptitle' => '网站编辑',
    'stars' => '8',
    'groupavatar' => '',
    'readaccess' => '150',
    'allowcusbbcode' => '1',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  16 => 
  array (
    'type' => 'special',
    'grouptitle' => '实习版主',
    'stars' => '7',
    'groupavatar' => '',
    'readaccess' => '100',
    'allowcusbbcode' => '1',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  19 => 
  array (
    'type' => 'special',
    'grouptitle' => '审核员',
    'stars' => '7',
    'groupavatar' => '',
    'readaccess' => '100',
    'allowcusbbcode' => '1',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  9 => 
  array (
    'type' => 'member',
    'grouptitle' => '乞丐',
    'creditshigher' => '-9999999',
    'creditslower' => '0',
    'stars' => '0',
    'groupavatar' => '',
    'readaccess' => '0',
    'allowcusbbcode' => '0',
    'allowgetattach' => '0',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  8 => 
  array (
    'type' => 'system',
    'grouptitle' => '等待验证会员',
    'stars' => '0',
    'groupavatar' => '',
    'readaccess' => '0',
    'allowcusbbcode' => '0',
    'allowgetattach' => '0',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  7 => 
  array (
    'type' => 'system',
    'grouptitle' => '游客',
    'stars' => '0',
    'groupavatar' => '',
    'readaccess' => '1',
    'allowcusbbcode' => '0',
    'allowgetattach' => '0',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  6 => 
  array (
    'type' => 'system',
    'grouptitle' => '禁止 IP',
    'stars' => '0',
    'groupavatar' => '',
    'readaccess' => '0',
    'allowcusbbcode' => '0',
    'allowgetattach' => '0',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  5 => 
  array (
    'type' => 'system',
    'grouptitle' => '禁止访问',
    'stars' => '0',
    'groupavatar' => '',
    'readaccess' => '0',
    'allowcusbbcode' => '0',
    'allowgetattach' => '0',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  2 => 
  array (
    'type' => 'system',
    'grouptitle' => '超级版主',
    'stars' => '8',
    'groupavatar' => '',
    'readaccess' => '150',
    'allowcusbbcode' => '1',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  3 => 
  array (
    'type' => 'system',
    'grouptitle' => '版主',
    'stars' => '7',
    'groupavatar' => '',
    'readaccess' => '100',
    'allowcusbbcode' => '1',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  4 => 
  array (
    'type' => 'system',
    'grouptitle' => '禁止发言',
    'stars' => '0',
    'groupavatar' => '',
    'readaccess' => '0',
    'allowcusbbcode' => '0',
    'allowgetattach' => '0',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  10 => 
  array (
    'type' => 'member',
    'grouptitle' => '新手上路',
    'creditshigher' => '0',
    'creditslower' => '50',
    'stars' => '1',
    'groupavatar' => '',
    'readaccess' => '10',
    'allowcusbbcode' => '0',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  11 => 
  array (
    'type' => 'member',
    'grouptitle' => '注册会员',
    'creditshigher' => '50',
    'creditslower' => '200',
    'stars' => '2',
    'groupavatar' => '',
    'readaccess' => '20',
    'allowcusbbcode' => '0',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  12 => 
  array (
    'type' => 'member',
    'grouptitle' => '中级会员',
    'creditshigher' => '200',
    'creditslower' => '500',
    'stars' => '3',
    'groupavatar' => '',
    'readaccess' => '30',
    'allowcusbbcode' => '1',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  13 => 
  array (
    'type' => 'member',
    'grouptitle' => '高级会员',
    'creditshigher' => '500',
    'creditslower' => '1000',
    'stars' => '4',
    'groupavatar' => '',
    'readaccess' => '50',
    'allowcusbbcode' => '1',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  14 => 
  array (
    'type' => 'member',
    'grouptitle' => '金牌会员',
    'creditshigher' => '1000',
    'creditslower' => '3000',
    'stars' => '6',
    'groupavatar' => '',
    'readaccess' => '70',
    'allowcusbbcode' => '1',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
  15 => 
  array (
    'type' => 'member',
    'grouptitle' => '论坛元老',
    'creditshigher' => '3000',
    'creditslower' => '9999999',
    'stars' => '8',
    'groupavatar' => '',
    'readaccess' => '90',
    'allowcusbbcode' => '1',
    'allowgetattach' => '1',
    'edittimelimit' => '0',
    'userstatusby' => 1,
  ),
);

?>