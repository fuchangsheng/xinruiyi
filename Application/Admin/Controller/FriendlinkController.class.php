<?php
namespace Admin\Controller;
use Think\Controller;
class FriendlinkController extends CommonController {

	public function index(){
		$M = M("Friendlink");
		$statusArr = array('0'=>'禁用', 1=>'启用');

        $count = $M->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);

        $list = $M->where($map)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {
        	$list[$key]['status_text'] = $statusArr[$val['status']];
        }
        $this->assign('list',$list);
		$this->display();
	}

	public function add(){
		if(IS_POST){
			$data = array();
			$id = I('post.id');
			$data['name'] = I('post.name');
			$data['url'] = I('post.url');
			$data['status'] = I('post.status');
			$data['sort'] = I('post.sort');
			$data['remark'] = I('post.remark');
			$data['update_time'] = NOW_TIME;

			$M = M('Friendlink');
			if($id){
				$M->where('id='.$id)->save($data);
				$result = array('status'=>1, 'info'=>'更新成功！', 'url'=>U('friendlink/index'));
			}else{
				$data['create_time'] = NOW_TIME;
				$M->add($data);
				$result = array('status'=>1, 'info'=>'添加成功！', 'url'=>U('friendlink/index'));
			}
			$this->ajaxReturn($result);
			exit;
		}

		$id = I('get.id');
		if($id){
			$M = M('Friendlink');
			$info = $M->where('id='.$id)->find();
			$this->assign('info',$info);
		}
		$this->display();
	}

	public function del(){
		if (M("Friendlink")->where("id=" . (int) $_GET['id'])->delete()) {
            $result = array('status'=>1, 'info'=>'成功删除！');
        } else {
        	$result = array('status'=>0, 'info'=>'删除失败，可能是不存在该ID的记录');
        }
        $this->ajaxReturn($result);
		exit;
	}

	public function opRoleStatus(){
		$status = I('get.status');
		$data['id'] = I('get.id');
		$data['status'] = $status==1?0:1;
		M("Friendlink")->save($data);
		$result = array('status'=>1, 'info'=>'操作成功！');
        $this->ajaxReturn($result);
		exit;
	}

}