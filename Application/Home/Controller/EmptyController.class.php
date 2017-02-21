<?php
namespace Home\Controller;
use Think\Controller;

// 本类由系统自动生成，仅供测试用途
class EmptyController extends Controller{
    function _empty(){
       echo '当前模块路径:'.MODULE_PATH.'<br>';
       echo '当前模块名:'.MODULE_NAME.'<br>';
       echo '当前控制器名:'.CONTROLLER_NAME.'<br>';
       echo '当前操作名:'.ACTION_NAME.'<br>';
       echo '是否开启调试模式:'.APP_DEBUG.'<br>';
    }
}