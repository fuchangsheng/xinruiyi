<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Lib\Category;
class MemberController extends CommonController {

	 public function index() {
        $M = M("Member");

        $count = $M->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);

        $list = $M->where($map)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {

        }
        $this->assign('list',$list);

        $this->display();
    }

    public function add() {
		$M = M("Member");
        if(IS_POST){
            $id = I('post.id');
            $data = array();
            $username = I('post.username');
            $password = I('post.password');
            $data['status'] = I('post.status');
            $data['remark'] = I('post.remark');

            if($id){
                //更新

                if(!empty($password)){
                    $data['password'] = password($password);
                }
                $M->where('id='.$id)->save($data);
                $result = array('status'=>1, 'info'=>'更新成功！', 'url'=>U('member/index'));
            }else{
                $map = array();
                $map['username'] = trim($username);
                $exist = $M->where($map)->count();
                if($exist){
                    $result = array('status'=>0, 'info'=>'该用户名已被注册，请选择其他用户名！');
                    $this->ajaxReturn($result);
                    exit;
                }
                //添加
                $data['last_login_time'] = NOW_TIME;
                $data['create_time'] = NOW_TIME;
                $data['update_time'] = NOW_TIME;
                $data['username'] = I('post.username');
                $data['password'] = password($password);
                $M->add($data);
                $result = array('status'=>1, 'info'=>'添加成功', 'url'=>U('member/index'));
            }
            $this->ajaxReturn($result);
            exit;
        }
        $map = array();
        $id = I('id');
        if($id){
            $map['id'] = $id;
            $info = $M->where($map)->find();
            $this->assign('info',$info);
        }

        $this->display();
    }



}