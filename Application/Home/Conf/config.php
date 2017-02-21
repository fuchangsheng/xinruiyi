<?php

return array(
	//'配置项'=>'配置值'
	'BASEHOST'     => 'http://'.$_SERVER['SERVER_NAME'], //默认模块
	'DEFAULT_MODULE'     => 'Index', //默认模块
	//'TMPL_FILE_DEPR'=>'_',//修改模板文件目录层次,主题模板目录/模块_方法.html

	// 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
	'URL_MODEL'          => '2', //URL模式

	'SESSION_AUTO_START' => true, //是否开启session

	'MODULE_DENY_LIST'      =>  array('Common','Runtime','Api'),
	'MODULE_ALLOW_LIST'    =>    array('Home','Admin','User'),
	'DEFAULT_MODULE'       =>    'Home',
	'DEFAULT_THEME'=> 'lanse', // 默认模板主题名称
	'LOAD_EXT_CONFIG' => 'attach'//加载扩展配置文件

);