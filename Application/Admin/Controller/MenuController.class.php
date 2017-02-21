<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Lib\Category;
class MenuController extends CommonController {
	protected $tableName = 'Menu';

    public function index(){
    	if (IS_POST) {
            echo json_encode(D("Menu")->addMenu());
            $this->updateCache();
        } else {
        	$Menu = new Category($this->tableName, array('id', 'pid', 'name', 'fullname'));
            $this->assign("list", $Menu->getList('',0,'sort ASC'));
            $this->display("index");
        }
	}


	/*
		修改状态

	*/
	public function changeStatus(){
		$id = I('id');
		$status = I('status');
		M('Menu')->where('id='.$id)->setField('status',$status);
		echo json_encode(array('status'=>1));
		$this->updateCache();
	}

	public function getMenuInfo($id){
		$Menu = M('Menu');
		$id = $id ? $id : 0;
		$info = $Menu->find($id);
		return $info;
	}

	public function getSecondMenu($pid){
		$Menu = M('Menu');
		$list = $Menu->field('id,name')->where(array('level'=>'1','pid'=>$pid))->select();
		return $list;
	}

	public function getThreeMenu($pid){
		$Menu = M('Menu');
		$list = $Menu->field('id,name')->where(array('level'=>'2','pid'=>$pid))->select();
		return $list;
	}

	public function getFirstMenu(){
		$Menu = M('Menu');
		$list = $Menu->field('id,name')->where(array('level'=>1))->select();
		return $list;
	}

	public function getMenuList($pid=0, $level=1, $field=''){
		$Menu = M('Menu');
		$map['pid'] = $pid;
		$map['level'] = $level;
		return $list = $Menu->where($map)->field($field)->select();
	}

	public function updateCache(){
        $menu_tree = D('Menu')->getTree();
    	$menu_list = D('Menu')->getList();
        F('admin_menu',$menu_tree);
        F('menu_list',$menu_list);
    }
}