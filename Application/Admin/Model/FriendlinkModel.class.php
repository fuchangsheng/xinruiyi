<?php
namespace Admin\Model;
use Think\Model;
class FriendlinkModel extends Model {
	public function getList($limit=10){
		$Friendlink = M('Friendlink');
		$list = $Friendlink->where($map)->limit($limit)->order('id DESC')->select();
		return $list;
	}



    public function addFriendlink(){
    	$Friendlink = M('Friendlink');
    	$data['name'] = I('name');
    	$data['url'] = I('url');
    	$data['status'] = I('status');
    	$Friendlink->add($data);
    	$result = array('status'=>1,'info'=>'添加成功！','url' => U('Block/friendlylink'));
    	return $result;
    }

    public function saveFriendlink(){
    	$Friendlink = M('Friendlink');
    	$data = I('data');
    	foreach ($data as $key => $val) {
    		if($val==''){
    			unset($data[$key]);
    		}
    	}
    	$Friendlink->save($data);
    	$result = array('status'=>1,'info'=>'更新成功！','url' => U('Block/friendlylink'));
    	return $result;
    }


	public function getNavList($pid=0){
		$Nav = M('Nav');
		$where['pid'] = $pid;
		$where['status'] = 1;
		$navList = $Nav->where('pid='.$pid)->order('sort')->select();
		foreach($navList as $key=>$val){
			$subNavNum = $Nav->where('pid='.$val['id'])->count();
			if( !empty($subNavNum) ){
				$navList[$key]['subNav'] = $this->getSubNav($val['id']);
			}
		}
		return $navList;
	}

	private function getSubNav($pid){
		$Nav = M('Nav');
		$where['pid'] = $pid;
		$where['status'] = 1;
		$list = $Nav->where('pid='.$pid)->order('sort')->select();
		foreach($list as $key=>$val){
			$subNavNum = $Nav->where('pid='.$val['id'])->count();
			if( !empty($subNavNum) ){
				$list[$key]['subNav'] = $this->getSubNav($val['id']);
			}
		}
		return $list;
	}

}

?>
