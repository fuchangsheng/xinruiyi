<?php
namespace Admin\Controller;
use Think\Controller;
class MapController extends CommonController {

    public function index() {
        $Sysconfig = M('Sysconfig');
        if(IS_POST){
            $data = array();
            $data = I('post.data');
            foreach ($data as $key => $value) {
                $map['varname'] = $key;
                $Sysconfig->where($map)->setField('value',$value);
            }
            $result = array('status'=>1,'info'=>'操作成功！');
            echo json_encode($result);
            exit;
        }

        $list = $Sysconfig->where($map)->select();
        foreach ($list as $key => $val) {
            $info[$val['varname']] = $val['value'];
        }


        F('baseinfo',$info);
        $this->assign('info',$info);
        $this->display();
    }

}