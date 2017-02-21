<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Lib\Category;
class CaseController extends CommonController {
    protected $tableName = 'Case';

    public function index() {
        $M = M("Case");


		if (IS_GET){
			$keyword = trim($_GET['keyword']);

        }

        $count = $M->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $M->where($map)->order('update_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {

        }
        $this->assign('list',$list);
        $this->display();
    }

    public function add() {
        $Case = M('Case');

        $id = I('id');

        if (IS_POST) {
            $data['title']   = I('post.title');
            $data['thumb']   = I('post.thumb');
            $data['content'] = $_POST['content'];
            $data['update_time'] = NOW_TIME;

            if($id){
                $Case->where( array('id'=>$id) )->save($data);
                $result = array('status'=>1, 'info'=>'更新成功！', 'url'=>U('Case/index'));
            }else{
                $data['user_id'] = $this->uid;
                $data['create_time'] = NOW_TIME;
                $Case->add($data);
                $result = array('status'=>1, 'info'=>'添加成功！', 'url'=>U('Case/index'));
            }
            $this->ajaxReturn($result);
            EXIT;
        }

        if($id){
            $info = $Case->find($id);
        }
        $this->assign("info", $info);
        $this->display();
    }


	public function detail(){
		$id = $_REQUEST['id'];
		$where['id'] = $id;
		$this->assign("info", D("Case")->detail($where));
		$this->display();
	}

    public function del() {
        $Case = M("Case");
        $ids = I('post.ids');
        $map['id'] = array('in',$ids);

        if ($Case->where($map)->delete()) {
            $result = array("status"=>1,"info"=>"成功删除",'url'=>'');
        } else {
            $result = array("status"=>0,"info"=>"删除失败，可能是不存在该ID的记录");
        }
        $this->ajaxReturn($result);
        exit;
    }




}