<?php
/*******************************************************************************
* [LQBCMS] LQBCMS
* @Copyright (C) 2014-2015  http://www.liqingbo.cn   All rights reserved.
* @Team  liqingbo.cn
* @Author: 码农 QQ:252588119
* @Licence http://www.liqingbo.cn/license.txt
*******************************************************************************/

function yearArray(){
	$tody = getdate();
	$todyYear = $tody['year'];
	$startYear = 1900-1;
	$i = 1;
	for($startYear; $startYear < $todyYear; $startYear++){
		$yearArr[$i] = $startYear+1;
		$i++;
	}
	return $yearArr;
}

function monthArray(){
	$monthArr = array(1,2,3,4,5,6,7,8,9,10,11,12);
	return $monthArr;
}

function dayArray(){
	$dayArr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
	return $dayArr;
}

function weekArr(){
	return  array('1'=>'星期一','2'=>'星期二','3'=>'星期三','4'=>'星期四','5'=>'星期五','6'=>'星期六','7'=>'星期日');
}

function fileArr($parameter=''){
	$arr =   array('null'=>'无分类','product'=>'案例','news'=>'新闻资讯');
	return $arr[$parameter];
}

function statusArr($status){
	$arr = array(0=>'已禁用',1=>'已启用');
	return $arr[$status];
}

function checkArr($status){
	$arr = array(0=>'未审核',1=>'<span class="blue">已审核</span>',2=>'<span class="red">审核失败</span>');
	return $arr[$status];
}

function checkArr2($status){
	$arr = array(0=>'未授权',1=>'<span class="green">已授权</span>',2=>'<span class="red">审核失败</span>');
	return $arr[$status];
}

function sexArr($parameter=1){
	$arr = array(0=>'女', 1=>'男');
	return $arr[$parameter];
}


function product_category_list($id=0, $field=''){
	$ProductCategory = M('ProductCategory');
	if(!empty($id)){
		$info = $ProductCategory->where('id='.$id)->find();
		if(!empty($field)){
			return $info[$field];
		}else{
			return $info;
		}
	}
	$list = $ProductCategory->where()->order('sort ASC')->select();
	return $list;
}

function product_category_info($id,$field=''){
	$ProductCategory = M('ProductCategory');
	$map['id'] = $id;
	$info = $ProductCategory->where($map)->find();
	if(!empty($field)){
		return $info[$field];
	}
	return $info;
}

function product_texture_list($id=0, $field=''){
	$ProductTexture = M('ProductTexture');
	if(!empty($id)){
		$info = $ProductTexture->where('id='.$id)->find();
		if(!empty($field)){
			return $info[$field];
		}else{
			return $info;
		}
	}
	$list = $ProductTexture->where()->order('sort ASC')->select();
	return $list;
}

function product_price_list(){
	$ProductPrice = M('ProductPrice');
	$list = $ProductPrice->where()->order('sort ASC')->select();
	return $list;
}


function getClassifyList($pid=''){
	$Classify = M('Classify');
	if($pid!=''){
		$map['pid'] = $pid;
	}
	$list = $Classify->where($map)->order('sort ASC')->select();
	return $list;
}

function getClassifyInfo($id='', $field=''){
	$Classify = M('Classify');
	$map['id'] = $id;
	$info = $Classify->where($map)->find();
	if(!empty($field)){
		return $info[$field];
	}
	return $info;
}

function provinceList($limit=10,$order='sort'){
	$Area = M('Area');
	$map['pid'] = 0;
	$list = $Area->where($map)->order()->limit()->select();
	return $list;
}

function cityList($pid=0){
	$Area = M('Area');
	$map['pid'] = $pid;
	$map['cid'] = 0;
	$list = $Area->where($map)->order()->limit()->select();
	return $list;
}

function areaList($cid=0){
	$Area = M('Area');
	$map['cid'] = $cid;
	$list = $Area->where($map)->order()->limit()->select();
	return $list;
}

function getAreaInfo($id,$field=''){
	$Area = M('Area');
	$map['id'] = $id;
	$info = $Area->where($map)->find();
	if(!empty($field)){
		return $info[$field];
	}
	return $info;
}


function getUserInfo($user_id){
	$Admin = M('Admin');
	if(!empty($user_id)){
		return $info = $Admin->where('id='.$user_id)->find();
	}
	return '';
}

function getAdminInfo($user_id=0, $field=''){
	if(empty($user_id)) return false;
	$Admin = M('Admin');
	$info = $Admin->where('id='.$user_id)->find();
	if(empty($info)) return false;
	if(!empty($field)) return $info[$field];
	return $info;
}
?>