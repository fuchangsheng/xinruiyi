<?php
namespace Admin\Controller;
use Think\Controller;
class GrouponController extends CommonController {

    public function index() {
        $M = M('Groupon');
        $House = M('House');

        $count      = $M->where('status=1')->count();
        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();

        $list = $M->where($map)->order('sort ASC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {
            $list[$key]['price_jj'] = $House->where('id='.$val['house_id'])->getField('price_jj');
        }
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

   public function add() {
        $id = I('id');
        if (IS_POST) {
            if(empty($id)){
                echo json_encode(D("Groupon")->add());
            }else{
                echo json_encode(D("Groupon")->edit());
            }
        } else {
            if($id){
                $info = D('Groupon')->getInfo($id);
                $info['start_date'] = date('Y-m-d',$info['start_time']);
                $info['end_date'] = date('Y-m-d',$info['end_time']);
                $this->assign("info", $info);
            }
            $House = M('House');
            $map = array();
            $map['status'] = 1;
            $house_list = $House->where($map)->field('id,name')->order('name')->limit(100)->select();
            $this->assign('house_list',$house_list);

            $this->display();
        }
    }

    public function del(){
        if (M("Groupon")->where("id=" . (int) $_GET['id'])->delete()) {
            $result = array('status'=>1, 'info'=>'成功删除！');
        } else {
            $result = array('status'=>0, 'info'=>'删除失败，可能是不存在该ID的记录');
        }
        $this->ajaxReturn($result);
        exit;
    }

    public function groupon_sort(){
        $Groupon = M('Groupon');
        if(IS_POST){
            $sort = I('post.sort');
            foreach ($sort as $key => $val) {
                $Groupon->where('id='.$key)->setField('sort',$val);
            }
            $result = array('status'=>1, 'info'=>'更新成功！', 'url'=>U('groupon/index'));
            $this->ajaxReturn($result);
            exit;
        }
    }

    public function order(){
        /*$M = M('GrouponOrder');
        $order_id = I('order_id');

        $map = array();

        if($order_id){
            $map['order_id'] = $order_id;
        }
        $count      = $M->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();

        $list = $M->where($map)->order()->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);
        $this->assign('page',$show);*/
        $this->display();
    }

    public function orderadd(){
        $M = M('GrouponOrder');
        $id = I('id');
        if(IS_POST){
            $data = array();
            if($id){
                $id = $id;
                $data['client_name'] = I('client_name');
                $data['client_phone'] = I('client_phone');
                $M->save($data);
            }

            $result = array('status'=>1, 'info'=>'操作成功！', 'url'=>'admin.php/Groupon/order');
            $this->ajaxReturn($result);
            exit;
        }
        $info = $M->where('id='.$id)->find();
        $this->assign('info',$info);
        $this->display();
    }

    public function del_order(){
        $M = M('GrouponOrder');
        $idArr = I('idArr');
        $map['id'] = array('in',$idArr);
        $M->where($map)->delete();
        $result = array('status'=>1, 'info'=>'操作成功！', 'url'=>'admin.php/Groupon/order');
        $this->ajaxReturn($result);
    }

}