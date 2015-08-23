<?php
//Discuz! cache file, DO NOT modify me!
//Created: Dec 17, 2009, 17:59
//Identify: e4aba29f61a78801d260bf028e466d6e

$_DCACHE['bbcodes'] = array (
  'searcharray' => 
  array (
    0 => '/\\[flash]([^"]+?)\\[\\/flash\\]/is',
    1 => '/\\[qq]([^"]+?)\\[\\/qq\\]/is',
  ),
  'replacearray' => 
  array (
    0 => '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="550" height="400"><param name="allowScriptAccess" value="sameDomain"><param name="movie" value="\\1"><param name="quality" value="high"><param name="bgcolor" value="#ffffff"><embed src="\\1" quality="high" bgcolor="#ffffff" width="550" height="400" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>',
    1 => '<a href="http://wpa.qq.com/msgrd?V=1&Uin=\\1&amp;Site=[Discuz!]&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:\\1:1" border="0"></a>',
  ),
);

$_DCACHE['bbcodes_display'] = array (
  'flash' => 
  array (
    'icon' => 'bb_flash.gif',
    'explanation' => '嵌入 Flash 动画',
    'params' => '1',
    'prompt' => '请输入 Flash 动画的 URL:',
  ),
  'qq' => 
  array (
    'icon' => 'bb_qq.gif',
    'explanation' => '显示 QQ 在线状态，点这个图标可以和他（她）聊天',
    'params' => '1',
    'prompt' => '请输入显示在线状态 QQ 号码:',
  ),
);

$_DCACHE['icons'] = array (
  114 => 'bb86.gif',
  27 => 'icon9.gif',
  26 => 'icon8.gif',
  108 => '102.gif',
  109 => '108.gif',
  110 => '202.gif',
  112 => '208.gif',
  113 => '209.gif',
  107 => '101.gif',
  111 => '205.gif',
  22 => 'icon4.gif',
  21 => 'icon3.gif',
  23 => 'icon5.gif',
  24 => 'icon6.gif',
  25 => 'icon7.gif',
  19 => 'icon1.gif',
  20 => 'icon2.gif',
);

$_DCACHE['smileytypes'] = array (
  2 => 
  array (
    'name' => '洋葱头',
    'directory' => 'ct',
  ),
);

$_DCACHE['smilies'] = array (
  'searcharray' => 
  array (
    106 => '/jmA077/',
    86 => '/jmA057/',
    85 => '/jmA056/',
    84 => '/jmA055/',
    83 => '/jmA054/',
    82 => '/jmA053/',
    81 => '/jmA052/',
    80 => '/jmA051/',
    79 => '/jmA050/',
    78 => '/jmA049/',
    77 => '/jmA048/',
    76 => '/jmA047/',
    75 => '/jmA046/',
    74 => '/jmA045/',
    73 => '/jmA044/',
    72 => '/jmA043/',
    71 => '/jmA042/',
    70 => '/jmA041/',
    87 => '/jmA058/',
    88 => '/jmA059/',
    105 => '/jmA076/',
    104 => '/jmA075/',
    103 => '/jmA074/',
    102 => '/jmA073/',
    101 => '/jmA072/',
    100 => '/jmA071/',
    99 => '/jmA070/',
    98 => '/jmA069/',
    97 => '/jmA068/',
    96 => '/jmA067/',
    95 => '/jmA066/',
    94 => '/jmA065/',
    93 => '/jmA064/',
    92 => '/jmA063/',
    91 => '/jmA062/',
    90 => '/jmA061/',
    89 => '/jmA060/',
    69 => '/jmA040/',
    68 => '/jmA039/',
    67 => '/jmA038/',
    47 => '/jmA018/',
    46 => '/jmA017/',
    45 => '/jmA016/',
    44 => '/jmA015/',
    43 => '/jmA014/',
    42 => '/jmA013/',
    41 => '/jmA012/',
    40 => '/jmA011/',
    39 => '/jmA010/',
    38 => '/jmA009/',
    37 => '/jmA008/',
    36 => '/jmA007/',
    35 => '/jmA006/',
    34 => '/jmA005/',
    33 => '/jmA004/',
    32 => '/jmA003/',
    31 => '/jmA002/',
    48 => '/jmA019/',
    49 => '/jmA020/',
    66 => '/jmA037/',
    65 => '/jmA036/',
    64 => '/jmA035/',
    63 => '/jmA034/',
    62 => '/jmA033/',
    61 => '/jmA032/',
    60 => '/jmA031/',
    59 => '/jmA030/',
    58 => '/jmA029/',
    57 => '/jmA028/',
    56 => '/jmA027/',
    55 => '/jmA026/',
    54 => '/jmA025/',
    53 => '/jmA024/',
    52 => '/jmA023/',
    51 => '/jmA022/',
    50 => '/jmA021/',
    30 => '/jmA001/',
  ),
  'replacearray' => 
  array (
    106 => 'A077.gif',
    86 => 'A057.gif',
    85 => 'A056.gif',
    84 => 'A055.gif',
    83 => 'A054.gif',
    82 => 'A053.gif',
    81 => 'A052.gif',
    80 => 'A051.gif',
    79 => 'A050.gif',
    78 => 'A049.gif',
    77 => 'A048.gif',
    76 => 'A047.gif',
    75 => 'A046.gif',
    74 => 'A045.gif',
    73 => 'A044.gif',
    72 => 'A043.gif',
    71 => 'A042.gif',
    70 => 'A041.gif',
    87 => 'A058.gif',
    88 => 'A059.gif',
    105 => 'A076.gif',
    104 => 'A075.gif',
    103 => 'A074.gif',
    102 => 'A073.gif',
    101 => 'A072.gif',
    100 => 'A071.gif',
    99 => 'A070.gif',
    98 => 'A069.gif',
    97 => 'A068.gif',
    96 => 'A067.gif',
    95 => 'A066.gif',
    94 => 'A065.gif',
    93 => 'A064.gif',
    92 => 'A063.gif',
    91 => 'A062.gif',
    90 => 'A061.gif',
    89 => 'A060.gif',
    69 => 'A040.gif',
    68 => 'A039.gif',
    67 => 'A038.gif',
    47 => 'A018.gif',
    46 => 'A017.gif',
    45 => 'A016.gif',
    44 => 'A015.gif',
    43 => 'A014.gif',
    42 => 'A013.gif',
    41 => 'A012.gif',
    40 => 'A011.gif',
    39 => 'A010.gif',
    38 => 'A009.gif',
    37 => 'A008.gif',
    36 => 'A007.gif',
    35 => 'A006.gif',
    34 => 'A005.gif',
    33 => 'A004.gif',
    32 => 'A003.gif',
    31 => 'A002.gif',
    48 => 'A019.gif',
    49 => 'A020.gif',
    66 => 'A037.gif',
    65 => 'A036.gif',
    64 => 'A035.gif',
    63 => 'A034.gif',
    62 => 'A033.gif',
    61 => 'A032.gif',
    60 => 'A031.gif',
    59 => 'A030.gif',
    58 => 'A029.gif',
    57 => 'A028.gif',
    56 => 'A027.gif',
    55 => 'A026.gif',
    54 => 'A025.gif',
    53 => 'A024.gif',
    52 => 'A023.gif',
    51 => 'A022.gif',
    50 => 'A021.gif',
    30 => 'A001.gif',
  ),
  'typearray' => 
  array (
    106 => '2',
    86 => '2',
    85 => '2',
    84 => '2',
    83 => '2',
    82 => '2',
    81 => '2',
    80 => '2',
    79 => '2',
    78 => '2',
    77 => '2',
    76 => '2',
    75 => '2',
    74 => '2',
    73 => '2',
    72 => '2',
    71 => '2',
    70 => '2',
    87 => '2',
    88 => '2',
    105 => '2',
    104 => '2',
    103 => '2',
    102 => '2',
    101 => '2',
    100 => '2',
    99 => '2',
    98 => '2',
    97 => '2',
    96 => '2',
    95 => '2',
    94 => '2',
    93 => '2',
    92 => '2',
    91 => '2',
    90 => '2',
    89 => '2',
    69 => '2',
    68 => '2',
    67 => '2',
    47 => '2',
    46 => '2',
    45 => '2',
    44 => '2',
    43 => '2',
    42 => '2',
    41 => '2',
    40 => '2',
    39 => '2',
    38 => '2',
    37 => '2',
    36 => '2',
    35 => '2',
    34 => '2',
    33 => '2',
    32 => '2',
    31 => '2',
    48 => '2',
    49 => '2',
    66 => '2',
    65 => '2',
    64 => '2',
    63 => '2',
    62 => '2',
    61 => '2',
    60 => '2',
    59 => '2',
    58 => '2',
    57 => '2',
    56 => '2',
    55 => '2',
    54 => '2',
    53 => '2',
    52 => '2',
    51 => '2',
    50 => '2',
    30 => '2',
  ),
);

$_DCACHE['smilies_display'] = array (
  2 => 
  array (
    106 => 
    array (
      'code' => 'jmA077',
      'url' => 'A077.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    86 => 
    array (
      'code' => 'jmA057',
      'url' => 'A057.gif',
      'w' => 38,
      'h' => '40',
      'lw' => 47,
    ),
    85 => 
    array (
      'code' => 'jmA056',
      'url' => 'A056.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    84 => 
    array (
      'code' => 'jmA055',
      'url' => 'A055.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    83 => 
    array (
      'code' => 'jmA054',
      'url' => 'A054.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    82 => 
    array (
      'code' => 'jmA053',
      'url' => 'A053.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    81 => 
    array (
      'code' => 'jmA052',
      'url' => 'A052.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    80 => 
    array (
      'code' => 'jmA051',
      'url' => 'A051.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    79 => 
    array (
      'code' => 'jmA050',
      'url' => 'A050.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    78 => 
    array (
      'code' => 'jmA049',
      'url' => 'A049.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    77 => 
    array (
      'code' => 'jmA048',
      'url' => 'A048.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    76 => 
    array (
      'code' => 'jmA047',
      'url' => 'A047.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    75 => 
    array (
      'code' => 'jmA046',
      'url' => 'A046.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    74 => 
    array (
      'code' => 'jmA045',
      'url' => 'A045.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    73 => 
    array (
      'code' => 'jmA044',
      'url' => 'A044.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    72 => 
    array (
      'code' => 'jmA043',
      'url' => 'A043.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    71 => 
    array (
      'code' => 'jmA042',
      'url' => 'A042.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    70 => 
    array (
      'code' => 'jmA041',
      'url' => 'A041.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    87 => 
    array (
      'code' => 'jmA058',
      'url' => 'A058.gif',
      'w' => 29,
      'h' => '40',
      'lw' => 36,
    ),
    88 => 
    array (
      'code' => 'jmA059',
      'url' => 'A059.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    105 => 
    array (
      'code' => 'jmA076',
      'url' => 'A076.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    104 => 
    array (
      'code' => 'jmA075',
      'url' => 'A075.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    103 => 
    array (
      'code' => 'jmA074',
      'url' => 'A074.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    102 => 
    array (
      'code' => 'jmA073',
      'url' => 'A073.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    101 => 
    array (
      'code' => 'jmA072',
      'url' => 'A072.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    100 => 
    array (
      'code' => 'jmA071',
      'url' => 'A071.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    99 => 
    array (
      'code' => 'jmA070',
      'url' => 'A070.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    98 => 
    array (
      'code' => 'jmA069',
      'url' => 'A069.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    97 => 
    array (
      'code' => 'jmA068',
      'url' => 'A068.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    96 => 
    array (
      'code' => 'jmA067',
      'url' => 'A067.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    95 => 
    array (
      'code' => 'jmA066',
      'url' => 'A066.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    94 => 
    array (
      'code' => 'jmA065',
      'url' => 'A065.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    93 => 
    array (
      'code' => 'jmA064',
      'url' => 'A064.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    92 => 
    array (
      'code' => 'jmA063',
      'url' => 'A063.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    91 => 
    array (
      'code' => 'jmA062',
      'url' => 'A062.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    90 => 
    array (
      'code' => 'jmA061',
      'url' => 'A061.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    89 => 
    array (
      'code' => 'jmA060',
      'url' => 'A060.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    69 => 
    array (
      'code' => 'jmA040',
      'url' => 'A040.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    68 => 
    array (
      'code' => 'jmA039',
      'url' => 'A039.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    67 => 
    array (
      'code' => 'jmA038',
      'url' => 'A038.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    47 => 
    array (
      'code' => 'jmA018',
      'url' => 'A018.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    46 => 
    array (
      'code' => 'jmA017',
      'url' => 'A017.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    45 => 
    array (
      'code' => 'jmA016',
      'url' => 'A016.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    44 => 
    array (
      'code' => 'jmA015',
      'url' => 'A015.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    43 => 
    array (
      'code' => 'jmA014',
      'url' => 'A014.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    42 => 
    array (
      'code' => 'jmA013',
      'url' => 'A013.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    41 => 
    array (
      'code' => 'jmA012',
      'url' => 'A012.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    40 => 
    array (
      'code' => 'jmA011',
      'url' => 'A011.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    39 => 
    array (
      'code' => 'jmA010',
      'url' => 'A010.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    38 => 
    array (
      'code' => 'jmA009',
      'url' => 'A009.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    37 => 
    array (
      'code' => 'jmA008',
      'url' => 'A008.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    36 => 
    array (
      'code' => 'jmA007',
      'url' => 'A007.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    35 => 
    array (
      'code' => 'jmA006',
      'url' => 'A006.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    34 => 
    array (
      'code' => 'jmA005',
      'url' => 'A005.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    33 => 
    array (
      'code' => 'jmA004',
      'url' => 'A004.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    32 => 
    array (
      'code' => 'jmA003',
      'url' => 'A003.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    31 => 
    array (
      'code' => 'jmA002',
      'url' => 'A002.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    48 => 
    array (
      'code' => 'jmA019',
      'url' => 'A019.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    49 => 
    array (
      'code' => 'jmA020',
      'url' => 'A020.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    66 => 
    array (
      'code' => 'jmA037',
      'url' => 'A037.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    65 => 
    array (
      'code' => 'jmA036',
      'url' => 'A036.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    64 => 
    array (
      'code' => 'jmA035',
      'url' => 'A035.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    63 => 
    array (
      'code' => 'jmA034',
      'url' => 'A034.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    62 => 
    array (
      'code' => 'jmA033',
      'url' => 'A033.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    61 => 
    array (
      'code' => 'jmA032',
      'url' => 'A032.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    60 => 
    array (
      'code' => 'jmA031',
      'url' => 'A031.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    59 => 
    array (
      'code' => 'jmA030',
      'url' => 'A030.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    58 => 
    array (
      'code' => 'jmA029',
      'url' => 'A029.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    57 => 
    array (
      'code' => 'jmA028',
      'url' => 'A028.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    56 => 
    array (
      'code' => 'jmA027',
      'url' => 'A027.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    55 => 
    array (
      'code' => 'jmA026',
      'url' => 'A026.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    54 => 
    array (
      'code' => 'jmA025',
      'url' => 'A025.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    53 => 
    array (
      'code' => 'jmA024',
      'url' => 'A024.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    52 => 
    array (
      'code' => 'jmA023',
      'url' => 'A023.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    51 => 
    array (
      'code' => 'jmA022',
      'url' => 'A022.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    50 => 
    array (
      'code' => 'jmA021',
      'url' => 'A021.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
    30 => 
    array (
      'code' => 'jmA001',
      'url' => 'A001.gif',
      'w' => 40,
      'h' => '40',
      'lw' => 50,
    ),
  ),
);

?>