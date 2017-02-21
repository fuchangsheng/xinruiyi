<?php
// 地区管理
class AreaAction extends CommonAction {
	private $M = '';
	public function _initialize(){
		$this->M = M($this->getActionName());
	}
	
	public function ajaxCityList(){
		$pid = $_REQUEST['pid']; 
		if( !empty($pid) ){
			$list = $this->getCityList($pid);
			$this->ajaxReturn($list,'成功获取城市列表！',1);
		}else{
			$this->ajaxReturn('','0',0);
		}
	}
	
	public function ajaxAreaList(){
		$cid = $_REQUEST['cid']; 
		if( !empty($cid) ){
			$list = $this->getAreaList($cid);
			$this->ajaxReturn($list,'成功获取区域列表！',1);
		}else{
			$this->ajaxReturn('','0',0);
		}
	}
	
	public function getProvinceList(){
		$list = $this->M->where( 'pid=0 and cid=0' )->select();
		return $list;
	}
	
	public function getCityList($pid=0,$field='',$order=''){
		return $list = $this->M->where( 'pid='.$pid.' and cid=0' )->order($order)->field($field)->select();
	}
	
	public function getAreaList($cid=0, $field='', $order=''){
		return $list = $this->M->where( 'cid='.$cid.' and pid<>0' )->order($order)->field($field)->select();
	}

}