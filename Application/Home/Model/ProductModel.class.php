<?php

namespace Home\Model;

use Think\Model;

class ProductModel extends Model {

	public function getList($limit=10, $cid=0){
		$M = M('Product');
		$map = array();

		$categoryList = $this->getCategoryList();

		if(!empty($cid)){
			$map['category_id'] = $cid;
		}
		$list = $M->where($map)->limit($limit)->order('update_time DESC')->select();
		foreach ($list as $key => $val) {
			$list[$key]['url'] = url_product_show($val['id']);
			$list[$key]['thumb'] = $val['thumb']=='' ? C('NOPIC') : $val['thumb'];
			$list[$key]['category'] = $categoryList[$val['category_id']]['name'];
		}
		return $list;
	}

	public function getListPic($limit=10){
		$M = M('Product');
		$map = array();
		$map['thumb'] = array('neq','');
		$list = $M->where($map)->limit($limit)->order('update_time DESC')->select();
		foreach ($list as $key => $val) {
			$list[$key]['url'] = url_product_show($val['id']);
			if(empty($val['thumb'])||!file_exists('.'.$val['thumb'])){
				$list[$key]['thumb'] = C('NOPIC');
			}
			$list[$key]['thumb'] = $val['thumb']=='' ? C('NOPIC') : $val['thumb'];
			//$list[$key]['category'] = $categoryList[$val['category_id']]['name'];
		}
		return $list;
	}

	public function getRelated($id=0,$limit=10){

		$M = M('Product');
		$map = array();
		$list = $M->where($map)->limit($limit)->order('update_time DESC')->select();
		foreach ($list as $key => $val) {
			$list[$key]['url'] = url_product_show($val['id']);
		}
		return $list;

	}

	public function getRecommend($limit=10){

		$M = M('Product');

		$map = array();
		$map['r'] = 1;
		$list = $M->where($map)->limit($limit)->order('update_time DESC')->select();

		foreach ($list as $key => $val) {

			$list[$key]['url'] = url_product_show($val['id']);

			$list[$key]['thumb'] = $val['thumb']=='' ? C('NOPIC') : $val['thumb'];

		}

		return $list;

	}

	public function getCategoryList(){
		$Category = M('ProductCategory');
		$map['status'] = 1;
		$list = $Category->where($map)->select();
		foreach ($list as $key => $val) {
			$rlist[$val['id']] = $val;
		}
		return $rlist;
	}


}