<?php
/*
	[Ucenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: config.new.php 9293 2008-10-30 06:44:42Z liguode $
*/

//Ucenter Home���ò���
$_SC = array();
$_SC['dbhost']  		= 'localhost'; //��������ַ
$_SC['dbuser']  		= 'root'; //�û�
$_SC['dbpw'] 	 		= 'lic77158906'; //����
$_SC['dbcharset'] 		= 'utf8'; //�ַ���
$_SC['pconnect'] 		= 0; //�Ƿ��������
$_SC['dbname']  		= 'newclub'; //���ݿ�
$_SC['tablepre'] 		= 'uchome_'; //����ǰ׺
$_SC['charset'] 		= 'utf-8'; //ҳ���ַ���

$_SC['gzipcompress'] 	= 0; //����gzip

$_SC['cookiepre'] 		= 'uchome_'; //COOKIEǰ׺
$_SC['cookiedomain'] 	= ''; //COOKIE������
$_SC['cookiepath'] 		= '/'; //COOKIE����·��

$_SC['attachdir']		= './attachment/'; //�������ر���λ��(������·��, ���� 777, ����Ϊ web �ɷ��ʵ���Ŀ¼, ���Ŀ¼����� "./" ��ͷ, ĩβ�� "/")
$_SC['attachurl']		= 'attachment/'; //��������URL��ַ(��Ϊ��ǰ URL �µ���Ե�ַ�� http:// ��ͷ�ľ��Ե�ַ, ĩβ�� "/")

$_SC['siteurl']			= ''; //վ��ķ���URL��ַ(http:// ��ͷ�ľ��Ե�ַ, ĩβ�� "/")��Ϊ�յĻ���ϵͳ���Զ�ʶ��

$_SC['tplrefresh']		= 0; //�ж�ģ���Ƿ���µ�Ч�ʵȼ�����ֵԽ��Ч��Խ��; ����Ϊ0�����ò��ж�

//Ucenter Home��ȫ���
$_SC['founder'] 		= '1'; //��ʼ�� UID, ����֧�ֶ����ʼ�ˣ�֮��ʹ�� ��,�� �ָ������ֹ�����ֻ�д�ʼ�˲ſɲ�����
$_SC['allowedittpl']	= 0; //�Ƿ��������߱༭ģ�塣Ϊ�˷�������ȫ��ǿ�ҽ���ر�

//Ӧ�õ�UCenter������Ϣ(���Ե�UCenter��̨->Ӧ�ù���->�鿴��Ӧ��->���������Ӧ��������Ϣ�����滻)
define('UC_CONNECT', 'mysql'); // ���� UCenter �ķ�ʽ: mysql/NULL, Ĭ��Ϊ��ʱΪ fscoketopen(), mysql ��ֱ�����ӵ����ݿ�, Ϊ��Ч��, ������� mysql
define('UC_DBHOST', 'localhost'); // UCenter ���ݿ�����
define('UC_DBUSER', 'root'); // UCenter ���ݿ��û���
define('UC_DBPW', 'lic77158906'); // UCenter ���ݿ�����
define('UC_DBNAME', 'newclub'); // UCenter ���ݿ�����
define('UC_DBCHARSET', 'utf8'); // UCenter ���ݿ��ַ���
define('UC_DBTABLEPRE', '`newclub`.uc_'); // UCenter ���ݿ��ǰ׺
define('UC_DBCONNECT', '0'); // UCenter ���ݿ�־����� 0=�ر�, 1=��
define('UC_KEY', '17Ye90D7MdLeh7n0g5Z1p4ac94M3adLfE927z2YfqasbB4P0F7TepeicM3I2bdzb'); // �� UCenter ��ͨ����Կ, Ҫ�� UCenter ����һ��
define('UC_API', 'http://localhost/newbbs/ucenter'); // UCenter �� URL ��ַ, �ڵ���ͷ��ʱ�����˳���
define('UC_CHARSET', 'utf8'); // UCenter ���ַ���
define('UC_IP', '127.0.0.1'); // UCenter �� IP, �� UC_CONNECT Ϊ�� mysql ��ʽʱ, ���ҵ�ǰӦ�÷�������������������ʱ, �����ô�ֵ
define('UC_APPID', '1'); // ��ǰӦ�õ� ID
define('UC_PPP', 20);