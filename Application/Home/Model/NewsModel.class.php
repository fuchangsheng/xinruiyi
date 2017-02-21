<?php

namespace Home\Model;

use Think\Model;

class NewsModel extends Model {

	public function getList($limit=10, $cid=0){
		$M = M('News');
		$map = array();

		$categoryList = $this->getCategoryList();

		if(!empty($cid)){
			$map['category_id'] = $cid;
		}
		$list = $M->where($map)->limit($limit)->order('update_time DESC')->select();
		foreach ($list as $key => $val) {

		}
		return $list;
	}

	public function getListPic($limit=10){
		$News = M('News');
		$map = array();
		$map['thumb'] = array('neq','');
		$list = $News->where($map)->limit($limit)->order('create_time DESC')->select();
		if(empty($list)) return false;

		foreach ($list as $key => $val) {
			$list[$key]['url'] = url_news_show($val['id']);
			if(empty($val['thumb'])||!file_exists('.'.$val['thumb'])){
				$list[$key]['thumb'] = C('NOPIC');
			}
			$list[$key]['thumb'] = $val['thumb']=='' ? C('NOPIC') : $val['thumb'];
			//$list[$key]['category'] = $categoryList[$val['category_id']]['name'];
		}
		return $list;
	}

	public function getRelated($id=0,$limit=10){

		$M = M('News');
		$map = array();
		$list = $M->where($map)->limit($limit)->order('update_time DESC')->select();
		foreach ($list as $key => $val) {
			$list[$key]['url'] = url_news_show($val['id']);
		}
		return $list;

	}

	public function getRecommend($limit=10){

		$M = M('News');
		$map = array();
		$map['r'] = 1;
		$list = $M->where($map)->limit($limit)->order('update_time DESC')->select();
		foreach ($list as $key => $val) {
			$list[$key]['url'] = url_news_show($val['id']);
			$list[$key]['thumb'] = $val['thumb']=='' ? C('NOPIC') : $val['thumb'];

		}

		return $list;

	}

	/*
		根据文章ID获取当前文章的分类信息
	 */
	public function newsCategoryInfo($newsId=0,$field=''){
		if(empty($newsId)) return false;
		$News = M('News');
		$Category = M('NewsCategory');

		$category_id = $News->where( array('id'=>$newsId) )->getField('category_id');
		$category = $Category->where( array('id'=>$category_id) )->find();
		if(!empty($field)){
			return $category[$field];
		}
		return $category;
	}

	public function getCategoryList(){
		$Category = M('NewsCategory');
		$map['status'] = 1;
		$list = $Category->where($map)->select();
		foreach ($list as $key => $val) {
			$rlist[$val['id']] = $val;
		}
		return $rlist;
	}

	public function getCategoryNewsList($cid=0,$limit=10){
		$M = M('News');
		$map = array();


		if(!empty($cid)){
			$map['category_id'] = $cid;
		}
		$list = $M->where($map)->limit($limit)->order('update_time DESC')->select();
		foreach ($list as $key => $val) {

		}
		return $list;
	}

	public function getCategoryInfo($id){
		if(empty($id)) return false;
		$Category = M('NewsCategory');

		$info = $Category->where( array('id'=>$id) )->find();
		return $info;
	}

	public function getPrev($id=0,$categoryId=0){
        $M = M('News');
        $map['id'] = array('gt',$id);
        if(!empty($categoryId)){
            $map['category_id'] = $categoryId;
        }
        $info = $M->where($map)->order('id ASC')->find();
        if($info){
            $href = '/news/show-'.$info['id'].'.html';
            $a = '<a href="'.$href.'">'.$info['title'].'</a>';
        }else{
            $a = '没有了';
        }
        return $a;
    }
    public function getNext($id=0,$categoryId=0){
        $M = M('News');
        $map['id'] = array('lt',$id);
        if(!empty($categoryId)){
            $map['category_id'] = $categoryId;
        }
        $info = $M->where($map)->order('id DESC')->find();
        if($info){
            $href = '/news/show-'.$info['id'].'.html';
            $a = '<a href="'.$href.'">'.$info['title'].'</a>';
        }else{
            $a = '没有了';
        }
        return $a;
    }


}