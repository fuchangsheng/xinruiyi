<?php

namespace Home\Model;

use Think\Model;

class SpecialModel extends Model {

	public function getList($limit=10, $cid=0){
		$M = M('Special');
		$map = array();

		$categoryList = $this->getCategoryList();

		if(!empty($cid)){
			$map['category_id'] = $cid;
		}
		$list = $M->where($map)->limit($limit)->order('update_time DESC')->select();
		foreach ($list as $key => $val) {
			$list[$key]['url'] = url_special_show($val['id']);
			$list[$key]['thumb'] = $val['thumb']=='' ? C('NOPIC') : $val['thumb'];
			$list[$key]['category'] = $categoryList[$val['category_id']]['name'];
		}
		return $list;
	}

	public function getListPic($limit=10){
		$Special = M('Special');
		$map = array();
		$map['thumb'] = array('neq','');
		$list = $Special->where($map)->limit($limit)->order('create_time DESC')->select();
		if(empty($list)) return false;

		foreach ($list as $key => $val) {
			$list[$key]['url'] = url_special_show($val['id']);
			if(empty($val['thumb'])||!file_exists('.'.$val['thumb'])){
				$list[$key]['thumb'] = C('NOPIC');
			}
			$list[$key]['thumb'] = $val['thumb']=='' ? C('NOPIC') : $val['thumb'];
			//$list[$key]['category'] = $categoryList[$val['category_id']]['name'];
		}
		return $list;
	}

	public function getRelated($id=0,$limit=10){

		$M = M('Special');
		$map = array();
		$list = $M->where($map)->limit($limit)->order('update_time DESC')->select();
		foreach ($list as $key => $val) {
			$list[$key]['url'] = url_special_show($val['id']);
		}
		return $list;

	}

	public function getRecommend($limit=10){

		$M = M('Special');
		$map = array();
		$map['r'] = 1;
		$list = $M->where($map)->limit($limit)->order('update_time DESC')->select();
		foreach ($list as $key => $val) {
			$list[$key]['url'] = url_special_show($val['id']);
			$list[$key]['thumb'] = $val['thumb']=='' ? C('NOPIC') : $val['thumb'];

		}

		return $list;

	}

	/*
		根据文章ID获取当前文章的分类信息
	 */
	public function specialCategoryInfo($specialId=0,$field=''){
		if(empty($specialId)) return false;
		$Special = M('Special');
		$Category = M('SpecialCategory');

		$category_id = $Special->where( array('id'=>$specialId) )->getField('category_id');
		$category = $Category->where( array('id'=>$category_id) )->find();
		if(!empty($field)){
			return $category[$field];
		}
		return $category;
	}

	public function getCategoryList(){
		$Category = M('SpecialCategory');
		$map['status'] = 1;
		$list = $Category->where($map)->select();
		foreach ($list as $key => $val) {
			$rlist[$val['id']] = $val;
		}
		return $rlist;
	}

	public function getCategoryInfo($id){
		if(empty($id)) return false;
		$Category = M('SpecialCategory');

		$info = $Category->where( array('id'=>$id) )->find();
		return $info;
	}

	public function getPrev($id=0,$categoryId=0){
        $M = M('Special');
        $map['id'] = array('gt',$id);
        $info = $M->where($map)->order('id ASC')->find();
        if($info){
            $href = '/special/show-'.$info['id'].'.html';
            $a = '<a href="'.$href.'">'.$info['title'].'</a>';
        }else{
            $a = '没有了';
        }
        return $a;
    }
    public function getNext($id=0,$categoryId=0){
        $M = M('Special');
        $map['id'] = array('lt',$id);
        $info = $M->where($map)->order('id DESC')->find();
        if($info){
            $href = '/special/show-'.$info['id'].'.html';
            $a = '<a href="'.$href.'">'.$info['title'].'</a>';
        }else{
            $a = '没有了';
        }
        return $a;
    }


}