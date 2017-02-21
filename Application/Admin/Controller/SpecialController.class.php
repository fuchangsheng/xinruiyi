<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Lib\Category;
class SpecialController extends CommonController {
    protected $tableName = 'Special';

    public function index() {
        $M = M("Special");

        $special_list = get_special_category_list();
        $this->assign('category_list',$special_list);

		if (IS_GET){
			$keyword = trim($_GET['keyword']);
			if(!empty($keyword)) $map['title'] = array('like','%'.$keyword.'%');
		}

        $count = $M->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $M->where($map)->order('update_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function category() {
        $SpecialCategory = M("SpecialCategory");
         $count = $SpecialCategory->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $SpecialCategory->where($map)->order('sort ASC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function addcategory(){
        $SpecialCategory = M("SpecialCategory");

        if(IS_POST){
            $id = I('post.id');

            $data['name'] = I('post.name');
            $data['sort'] = I('post.sort');
            $data['thumb'] = I('post.thumb');
            if($id){
                $SpecialCategory->where( array('id'=>$id) )->save($data);
                $result = array( 'status'=>1, 'info'=>'更新成功！', 'url'=>U('special/category'));
            }else{
                $SpecialCategory->add($data);
                $result = array( 'status'=>1, 'info'=>'添加成功', 'url'=>U('special/category'));
            }
            $this->ajaxReturn($result);
            exit;
        }
        $id = I('get.id');
        $info = $SpecialCategory->where( array('id'=>$id) )->find();
        $this->assign('info',$info);

        $this->display('category_add');
    }

    public function delcategory(){
        $SpecialCategory = M("SpecialCategory");
        $id = I('get.id');

        $SpecialCategory->where( array('id'=>$id) )->delete();
        $result = array( 'status'=>1, 'info'=>'删除成功！', 'url'=>U('special/category'));
        $this->ajaxReturn($result);
    }

    public function add() {
        if (IS_POST) {
            $id = I('id');
            if(!$id){
                echo json_encode(D("Special")->add());
            }else{
                echo json_encode(D("Special")->edit());
            }
        } else {
            $id = I('id');
            $info = array();
            if($id){
                $M = M('Special');
                $info = $M->find($id);
            }
            $this->assign("info", $info);

            $special_list = get_special_category_list();
   			$this->assign('category_list',$special_list);
            $this->display();
        }
    }

    /*
        审核
     */
    public function shenhe(){

        $Special = M('Special');

        if(IS_POST){
            $id = I('post.id');
            $status = I('post.status');
            $Special->where( array('id'=>$id) )->setField('status',$status);
            echo json_encode(array("status" => 1, "info" => "操作成功！"));
            exit;
        }
        $id = I('get.id');
        $info = $Special->find($id);
        $this->assign('info',$info);
        $this->display();
    }

    public function checkSpecialTitle() {
        $M = M("Special");
        $where = "title='" . $this->_get('title') . "'";
        if (!empty($_GET['id'])) {
            $where.=" And id !=" . (int) $_GET['id'];
        }
        if ($M->where($where)->count() > 0) {
            echo json_encode(array("status" => 0, "info" => "已经存在，请修改标题"));
        } else {
            echo json_encode(array("status" => 1, "info" => "可以使用"));
        }
    }

	public function detail(){
		$id = $_REQUEST['id'];
		$where['id'] = $id;
		$this->assign("info", D("Special")->detail($where));
		$this->display();
	}

    public function del() {
        $Special = M("Special");
        $ids = I('post.ids');
        $map['id'] = array('in',$ids);

        if ($Special->where($map)->delete()) {
            $result = array("status"=>1,"info"=>"成功删除",'url'=>'');
        } else {
            $result = array("status"=>0,"info"=>"删除失败，可能是不存在该ID的记录");
        }
        $this->ajaxReturn($result);
        exit;
    }

    /*
        统计
     */
    public function tongji(){
        $Admin = M('Admin');
        $Special = M('Special');


        if (IS_GET){
            $keyword = trim($_GET['keyword']);
            if(!empty($keyword)) $map['username'] = $keyword;
        }


        $admin_list = $Admin->where($map)->order('role_id ASC')->select();
        foreach ($admin_list as $key => $val) {
            $admin_list[$key]['total'] = $Special->where( array('user_id'=>$val['id']) )->count();
            $admin_list[$key]['status1'] = $Special->where( array('user_id'=>$val['id'],'status'=>1) )->count();
            $admin_list[$key]['status2'] = $Special->where( array('user_id'=>$val['id'],'status'=>2) )->count();
            $admin_list[$key]['status0'] = $Special->where( array('user_id'=>$val['id'],'status'=>0) )->count();
        }

        $this->assign('admin_list',$admin_list);
        $this->display();
    }



}