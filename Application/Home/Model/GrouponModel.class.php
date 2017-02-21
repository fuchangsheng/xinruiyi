<?php

namespace Home\Model;

use Think\Model;

class GrouponModel extends Model {

	public function getGrouponList($limit=10, $map=array()){

		$M = M('Groupon');

		$map['status'] = 1;

		$list = $M->where($map)->limit($limit)->select();

		foreach ($list as $key => $val) {

			$list[$key]['url'] = url_house_show($val['id']);

		}

		return $list;

	}



	public function getGrouponRelated($id=0,$limit=10){

		$M = M('Groupon');

		$map = array();

		$list = $M->where($map)->limit($limit)->select();

		foreach ($list as $key => $val) {

			$list[$key]['url'] = url_house_show($val['id']);

		}

		return $list;

	}







	public function getGrouponRecommend($limit=10){

		$M = M('Groupon');

		$map = array();

		$list = $M->where($map)->limit($limit)->select();

		foreach ($list as $key => $val) {

			$list[$key]['url'] = url_house_show($val['id']);

		}

		return $list;

	}



	public function getInfo($id=0){

		$M = M('Groupon');

		$id = I('id',$id);

		$info = $M->find($id);

		return $info;

	}

}