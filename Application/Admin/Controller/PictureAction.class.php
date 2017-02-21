<?php

class PictureAction extends CommonAction {
	protected $tableName = 'Userfiles';

    public function index() {
		import("ORG.Util.Page");
		$M = M($this->tableName);
		if (IS_GET){
			$displayModes = $_GET['displayModes'];
			$typeId = (int)$_GET['typeId'];
			if(!empty($typeId)){
				$map['type_id'] = $typeId;
			}
		}

		$map['type'] = 'image';
		$count = $M->where($map)->count();
		$page = new Page($count, 28);
        $showPage = $page->show();
        $this->assign("page", $showPage);
		$this->assign('picList',D('Picture')->index($map, $page->firstRow, $page->listRows));
		$this->assign('typeList',D('Picture')->category());
        $this->display($displayModes);
    }

	public function addPic(){
		if(IS_POST){
			$result = D('Picture')->addPic();
			echo json_encode($result);
		}else{
			$id = I('id');
			if(!empty($id)){
				$this->assign('info',D('Picture')->detail());
			}
			$this->assign('category',D('Picture')->category());
			$this->display();
		}
	}

	public function delPic(){
		$result = D('Picture')->delPic();
		echo json_encode($result);
	}

	public function picType(){
		$this->assign('list',D('Picture')->typeList($where, $page->firstRow, $page->listRows));
		$this->display('typeList');
	}

	public function addType(){
		if(IS_POST){
			$result = D('Picture')->addType();
			echo json_encode($result);
		}
	}

	public function delType(){

	}
}