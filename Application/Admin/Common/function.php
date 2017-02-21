<?php

/*******************************************************************************

* [LQBCMS] LQBCMS

* @Copyright (C) 2014-2015  http://liqingbo.cn   All rights reserved.

* @Team  liqingbo.cn

* @Author: 李清波 QQ:1636938163

* @Licence http://liqingbo.cn/license.txt

*******************************************************************************/

/*

 * 更新菜单缓存

 */

function update_menu_ceche(){

	$M = M('Menu');

        $list = $M->where('status=1')->order('pid ASC, sort ASC')->select();



        foreach ($list as $key => $val) {

            if($val['pid']==0){

                $tree[$val['id']] = $val;

            }else{

                $tree[$val['pid']]['sub'][$val['id']] = $val;

            }

        }

        F('admin_menu',$tree);

}


function replace_config($configfile, $config) {
    if(!is_file($configfile)){
        echo $configfile.'该文件不存在';
        exit;
    }
    if(!is_writable($configfile)){
        echo '没有写入权限！';
        exit;
    }
    if(!is_array($config)){
        echo '数据不能为空！';
        exit;
    }

    $pattern = $replacement = array();

    foreach($config as $k=>$v) {
        $pattern[$k] = "/['\"]".strtoupper($k)."['\"]\s*=>\s*([']?)[^']*([']?)\s*/is";
        $replacement[$k] = "'".strtoupper($k)."'=> \${1}".$v."\${2}";
    }
    $str = file_get_contents($configfile);
    $str = preg_replace($pattern, $replacement, $str);
    return file_put_contents($configfile, $str);
}

function replace_define($configfile, $config) {
    if(!is_file($configfile)){
        echo $configfile.'该文件不存在';
        exit;
    }
    if(!is_writable($configfile)){
        echo '没有写入权限！';
        exit;
    }
    if(!is_array($config)){
        echo '数据不能为空！';
        exit;
    }
    exit;
    $pattern = $replacement = array();
    foreach($config as $k=>$v) {
        $pattern[$k] = "/define\(\s*['\"]".strtoupper($k)."['\"]\s*,\s*([']?)[^']*([']?)\s*\)/is";
        $replacement[$k] = "define('".strtoupper($k)."', \${1}".$v."\${2})";
    }
    $str = file_get_contents($configfile);
    $str = preg_replace($pattern, $replacement, $str);
    return file_put_contents($configfile, $str);
}


function get_admin_menu_tree(){
    $menu_list = D('Menu')->getTree();
    return $menu_list;
}


function get_rules($role_id=0){
    $AuthGroup = M('AuthGroup');
    $rules = $AuthGroup->where( array('id'=>$role_id) )->getField('rules');
    return $rules;
}

function get_role_id($uid=0){
    $Admin = M('Admin');
    $role_id = $Admin->where( array('id'=>$uid) )->getField('role_id');
    return $role_id;
}




function get_admin_role_list(){
    $Category = new \Common\Lib\Category('AuthGroup', array('id', 'pid', 'name', 'fullname'));
    $list = $Category->getList();//获取分类结构
    return $list;
}


function get_admin_info($user_id=0, $field=''){

    if(empty($user_id)) return false;
    $Admin = M('Admin');
    $info = $Admin->where('id='.$user_id)->find();
    if(empty($info)) return false;
    if(!empty($field)) return $info[$field];
    return $info;
}

function get_admin_name($uid){
    if(empty($uid)) return false;
    $Admin = M('Admin');
    $info = $Admin->where('id='.$uid)->find();
    $name = $info['username'];
    return $name;
}

function get_admin_role_name($role_id=0){
    $AuthGroup = M('AuthGroup');
    if(empty($role_id)) return '暂无分组';
    $name = $AuthGroup->where( array('id'=>$role_id) )->getField('name');
    return $name;
}

function get_admin_role_name_in_uid($uid=0){
    $Admin = M('Admin');
    $AuthGroup = M('AuthGroup');

    $role_id = $Admin->where( array('id'=>$uid) )->getField('role_id');

    if(empty($role_id)) return '暂无分组';
    $name = $AuthGroup->where( array('id'=>$role_id) )->getField('name');
    return $name;
}



?>