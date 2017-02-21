<?php
namespace Admin\Controller;
use Think\Controller;
class BlockController extends CommonController {

    public function index() {
		$this->display();
    }

    public function nav() {
        if (IS_POST) {
            echo json_encode(D("Nav")->nav());
        } else {

            $this->assign("list", D("Nav")->nav());
            $this->display("nav");
        }
    }

	public function friendlylink() {
        if (IS_POST) {
            $act = I('act');
            if($act == 'edit'){
                echo json_encode(D("Friendlylink")->saveFriendlylink());
            }
        } else {
            $list = D("Friendlylink")->friendlylink();
            $this->assign("list", $list);

            //设置缓存
            foreach ($list as $key => $val) {
                if($val['status']==0){
                    unset($list[$key]);
                }
                F('friendlylink',$list);
            }
            $this->display("friendlylink");
        }
    }

	public function addFriendlylink() {
        if (IS_POST) {
            echo json_encode(D("Friendlylink")->addFriendlylink());
        } else {
            $list = D("Friendlylink")->friendlylink();
            $this->assign("list", $list);
            $this->display('addFriendlylink');
        }
    }

	public function changeStatus(){
        $Friendlylink = M('Friendlylink');
        $data['status'] = I('status');
		$data['id'] = I('id');
        $Friendlylink->save($data);
	}

}