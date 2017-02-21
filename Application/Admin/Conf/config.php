<?php
return array(
	//'配置项'=>'配置值'
	'USER_AUTH_KEY'       =>    'user_id',
	'ADMIN_AUTH_KEY'      =>    'username',

	'DEFAULT_MODULE'     => 'Index', //默认模块
	'SESSION_AUTO_START' => true, //是否开启session


	'MODULE_DENY_LIST'      =>  array('Common','Runtime','Api'),
	'MODULE_ALLOW_LIST'    =>    array('Home','Admin','User'),
	'DEFAULT_MODULE'       =>    'Home',

	'APP_PORTAL' => '/admin.php',

	//'DEFAULT_THEME'    =>    'Default',

	//数据备份配置
	'DATA_BACKUP_PATH' => WEB_ROOT.'Application/Database/',
	'DATA_BACKUP_PART_SIZE' => 5242880,
	'DATA_BACKUP_COMPRESS' => 1,	//是否开启压缩 压缩备份文件需要PHP环境支持gzopen,gzwrite函数
	'DATA_BACKUP_COMPRESS_LEVEL' => 1,	//压缩级别 1普通 4一般 9最高
	'sqlFileSize' => 5242880, //该值不可太大，否则会导致内存溢出备份、恢复失败，合理大小在512K~10M间，建议5M一卷
    //10M=1024*1024*10=10485760
    //5M=5*1024*1024=5242880
    //

	//默认错误跳转对应的模板文件
	'TMPL_ACTION_ERROR' => 'Public:error',
	//默认成功跳转对应的模板文件
	'TMPL_ACTION_SUCCESS' => 'Public:success',

	'TMPL_PARSE_STRING'  =>array(
	     '__STATIC__' => '/Application/Admin/View'
	)
);