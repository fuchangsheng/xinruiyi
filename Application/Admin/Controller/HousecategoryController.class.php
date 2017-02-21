<?php
namespace Admin\Controller;
use Think\Controller;
class  HousecategoryController extends CommonController {
    protected $tableName = 'HouseCategory';

    public function index() {
        if (IS_POST) {
            echo json_encode(D("House")->category());
        } else {
            $list = D("House")->category();
            $this->assign("list", $list);
            $this->display('category');
        }
    }
}