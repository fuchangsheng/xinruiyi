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

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);

// 定义应用目录
define('APP_PATH','./Application/');
header("Content-Type:text/html;charset=utf-8");
define("WEB_ROOT", str_replace("\\", '/',dirname(__FILE__)) . "/");

/*define('WEB_CACHE_PATH', WEB_ROOT."Cache/");//网站当前路径
define("RUNTIME_PATH", WEB_ROOT . "Cache/");
define('DATA_PATH',WEB_ROOT . 'Common/Date/');*/


define('BUILD_DIR_SECURE', false);

// 绑定Admin模块到当前入口文件
define('BIND_MODULE','Admin');

//当在自动创建项目的时候自动创建控制器和视图模型
/*define('BUILD_CONTROLLER_LIST','Public,Index,User,Menu,Common,Login,Test');
define('BUILD_MODEL_LIST','Index,User,Menu,Common');*/


define('IN_ADMIN', true);

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单