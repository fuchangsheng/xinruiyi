<?php

namespace Home\Model;

use Think\Model;

class HouseModel extends Model {

	public function getHouseList($limit=10, $map=array()){
		$M = M('House');
		$map['status'] = 1;
		$list = $M->where($map)->limit($limit)->select();
		foreach ($list as $key => $val) {
			$list[$key]['url'] = url_house_show($val['id']);
			$list[$key]['thumb'] = $val['thumb']=='' ? C('NOPIC') : $val['thumb'];
		}
		return $list;

	}



	public function getHouseNew($limit=10, $map=array()){

		$M = M('House');

		$map['status'] = 1;

		$list = $M->where($map)->order('id DESC')->limit($limit)->select();

		foreach ($list as $key => $val) {

			$list[$key]['url'] = url_house_show($val['id']);

			$list[$key]['thumb'] = $val['thumb']=='' ? C('NOPIC') : $val['thumb'];

		}

		return $list;

	}



	public function getHouseRelated($id=0,$limit=10){

		$M = M('House');

		$map = array();

		$list = $M->where($map)->limit($limit)->select();

		foreach ($list as $key => $val) {

			$list[$key]['url'] = url_house_show($val['id']);

		}

		return $list;

	}



	public function getHouseHot($limit=10){

		$M = M('House');

		$house_category_array = F('house_category_array');



		$map = array();

		$list = $M->where($map)->order('clicks DESC')->limit($limit)->select();

		foreach ($list as $key => $val) {

			$list[$key]['area'] = $list[$key]['area'] = $house_category_array[$val['area']]['name'];

			$list[$key]['url'] = url_house_show($val['id']);

		}

		return $list;

	}



	public function getHouseZhoubian($limit=10,$area=0){

		$M = M('House');

		$house_category_array = F('house_category_array');



		$map = array();

		if($area){

			$map['area'] = $area;

		}

		$list = $M->where($map)->order('id DESC')->limit($limit)->select();

		foreach ($list as $key => $val) {

			$list[$key]['area'] = $list[$key]['area'] = $house_category_array[$val['area']]['name'];

			$list[$key]['url'] = url_house_show($val['id']);

		}

		return $list;

	}



	public function getHouseRecommend($limit=10){

		$M = M('House');

		$house_category_array = F('house_category_array');

		$map = array();

		$map['r'] = 1;

		$list = $M->where($map)->limit($limit)->select();

		foreach ($list as $key => $val) {

			$list[$key]['area'] = $list[$key]['area'] = $house_category_array[$val['area']]['name'];

			$list[$key]['url'] = url_house_show($val['id']);
			$list[$key]['price_jj'] = floatval($val['price_jj']);

		}

		return $list;

	}



	public function getInfo($id=0){
		$M = M('House');
		$Category = M('HouseCategory');
        $id = !empty($id) ? $id : I('id');
        $info = $M->where('id='.$id)->find();
        $info['open_time'] = !empty($info['open_time']) ? date('Y-m-d',$info['open_time']) : '';
        $info['close_time'] = !empty($info['close_time']) ? date('Y-m-d',$info['close_time']) : '';
        $content = M('HouseContent')->where('id='.$id)->find();
        $info['content'] = $content['content'];
        $info['school'] = $content['school'];
        $info['hospital'] = $content['hospital'];
        $info['bank'] = $content['bank'];
        $info['bus'] = $content['bus'];
        $info['thumb'] = !empty($info['thumb']) ? $info['thumb'] : C('NOPIC');
        $info['area_name'] = $Category->where('id='.$info['area'])->getField('name');
        return $info;

	}

	public function addClicks($id=0){
		$House = M('House');
		$map['id'] = $id;
		$House->where($map)->setInc('clicks');
	}

}