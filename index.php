<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
define('IN_LIQINGBO', true);
//判断是否安装
if(file_exists("./Install/") && !file_exists("./Install/install.lock")){
	header('Location:Install/index.php');
	exit();
}

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);

header("Content-Type:text/html;charset=utf-8");
define("WEB_ROOT", str_replace("\\", '/',dirname(__FILE__)) . "/");
/*
define('WEB_CACHE_PATH', WEB_ROOT."Cache/");//网站当前路径
define("RUNTIME_PATH", WEB_ROOT . "Cache/");
define('DATA_PATH',WEB_ROOT . 'Application/Common/Date/');*/

// 定义应用目录
define('APP_PATH','./Application/');
define('BUILD_DIR_SECURE', false);

define('BIND_MODULE','Home');

//当在自动创建项目的时候自动创建控制器和视图模型
//define('BUILD_CONTROLLER_LIST','Public,Index,User,Menu,Common,Login,Test');
//define('BUILD_MODEL_LIST','Index,User,Menu,Common');


define('HTML_PATH', './');
define('TMPL_PATH','./Themes/');


//
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单