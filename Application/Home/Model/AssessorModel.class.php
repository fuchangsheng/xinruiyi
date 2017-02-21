<?php

namespace Home\Model;

use Think\Model;

class AssessorModel extends Model {

	public function getAssessorRelated($id=0,$limit=10){

		$M = M('Assessor');

		$map = array();

		$list = $M->where($map)->limit($limit)->select();

		foreach ($list as $key => $val) {

			$list[$key]['url'] = C('CFG_BASEHOST').'/assessor/show-'.$val['id'].'.html';

		}

		return $list;

	}



	public function getAssessorList($limit=10){

		$M = M('Assessor');

		$map = array();

		$list = $M->where($map)->limit($limit)->select();

		foreach ($list as $key => $val) {

			$list[$key]['url'] = C('CFG_BASEHOST').'/assessor/show-'.$val['id'].'.html';

		}

		return $list;

	}

}