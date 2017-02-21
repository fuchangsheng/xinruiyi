<?php
/*******************************************************************************
* [LQBCMS] LQBCMS
* @Copyright (C) 2014-2015  http://www.liqingbo.cn   All rights reserved.
* @Team  liqingbo.cn
* @Author: 码农 QQ:252588119
* @Licence http://www.liqingbo.cn/license.txt
*******************************************************************************/

function get_product_code(){
    $Product = M('Product');
    $endId = $Product->order('id DESC')->getField('id');
    $nextId = $endId+1;
    $str = 'JW'.str_pad($nextId,8,'0',STR_PAD_LEFT);
    return $str;
}


function house_status_icon($id=0){
    switch ($id) {
        case 37:
            $icon = '<i class="selstag2"></i>'; //待售
            break;
        case 38:
            $icon = '<i class="selstag2"></i>'; //在售
            break;
        case 39:
            $icon = '<i class="selstag3"></i>'; //尾盘
            break;
        case 40:
            $icon = '<i class="selstag4"></i>'; //售完
            break;
        default:
            $icon = '1';
            break;
    }
    return $icon;
}


function get_product_category_list(){
    $Category = new \Common\Lib\Category('ProductCategory', array('id', 'pid', 'name', 'fullname'));
    $list = $Category->getList();//获取分类结构
    return $list;
}

function get_product_category_tree(){
    $list = get_product_category_list();
    return $tree = list_to_tree($list);
}

function get_news_category_list(){
    $Category = new \Common\Lib\Category('NewsCategory', array('id', 'pid', 'name', 'fullname'));
    $list = $Category->getList();//获取分类结构
    return $list;
}

function get_news_category_name($cid=0){
    return M("NewsCategory")->where( array('id'=>$cid))->getField('name');
}

function get_news_category_tree(){
    $news_list = get_news_category_list();
    $tree = list_to_tree($news_list,$pk='id',$pid='pid',$child='_child',$root=0);
    return $tree;
}

function get_news_list($cid=0, $limit=10, $order='id DESC'){
    $News = M('News');
    $map = array();


    if(!empty($cid)){
        $map['category_id'] = $cid;
    }
    $list = $News->where($map)->limit($limit)->order($order)->select();
    foreach ($list as $key => $val) {
        $list[$key]['url'] = url_news_show($val['id']);
        $list[$key]['thumb'] = $val['thumb']=='' ? C('NOPIC') : $val['thumb'];
    }
    return $list;
}


function get_special_category_list(){
    $Category = new \Common\Lib\Category('SpecialCategory', array('id', 'pid', 'name', 'fullname'));
    $list = $Category->getList();//获取分类结构
    return $list;
}

function get_special_category_tree(){
    $list = get_special_category_list();
    $tree = list_to_tree($list,$pk='id',$pid='pid',$child='_child',$root=0);
    return $tree;
}

function get_special_info($id=0, $field=''){
    $SpecialCategory = M('SpecialCategory');
    $info = $SpecialCategory->where( array('id'=>$id) )->find();
    if(!empty($field)){
        return $info[$field];
    }else{
        return $info;
    }
}

function get_special_category_name($id=0){
    $SpecialCategory = M('SpecialCategory');
    $name = $SpecialCategory->where( array('id'=>$id) )->getField('name');
    return $name;
}

function get_company_list(){
    $Admin = M('Admin');
    $list = $Admin->where()->order('id DESC')->group('company')->select();
    return $list;
}


function get_admin_list(){
    $Admin = M('Admin');
    $map['status'] = 1;
    $list = $Admin->where($map)->order('id DESC')->group('company')->select();
    return $list;
}

function get_role_list(){
    $AuthGroup = M('AuthGroup');
    $map['status'] = 1;
    $list = $AuthGroup->where($map)->order('id DESC')->select();
    return $list;
}

function get_role_name($role_id=0){
    $AuthGroup = M('AuthGroup');
    $map['id'] = $role_id;
    $list = $AuthGroup->where($map)->getField('title');
    return $list;
}

?>