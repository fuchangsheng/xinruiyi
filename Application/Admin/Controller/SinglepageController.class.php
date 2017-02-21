<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Lib\Category;
class SinglepageController extends CommonController {
    protected $tableName = 'Singlepage';

    public function index() {
        $M = M("Singlepage");

        $categoryArr = F('news_category_array');
        $adminArr = F('admin_list');
        $statusArr = array('1'=>'已审核', '2'=>'未审核');

		if (IS_GET){
			$keyword = trim($_GET['keyword']);
			$category_id = !empty($_GET['category_id']) ? $_GET['category_id'] : 0;
            if($category_id){
                //$cidArr = $this->getCategorySubId($category_id);
            }

			if(!empty($cidArr)) $map['category_id'] = array('in',$cidArr);
			if(!empty($keyword)) $map['title'] = array('like','%'.$keyword.'%');
		}

        $count = $M->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $M->where($map)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {
            $list[$key]['categoryName'] = $categoryArr[$val['category_id']]['name'];
            $list[$key]['admin'] = $adminArr[$val['user_id']]['username'];
            $list[$key]['status'] = $statusArr[$val['status']];
        }
        $this->assign('list',$list);
        $this->assign('category_list',$categoryArr);
        $this->display();
    }

    public function add() {
        $M = M("Singlepage");
        if (IS_POST) {
            $data = array();
            $id = I('id');
            if($id){
                $data['id'] = $id;
                $data['user_id'] = $_SESSION['user_id'];
                $data['status'] = I('status',1);
                $data['title'] = I('title');
                $data['varname'] = I('varname');
                $data['keywords'] = I('keywords');
                $data['description'] = I('description');
                $data['clicks'] = I('clicks');
                $data['content'] = I('content','',false);
                $data['update_time'] = NOW_TIME;
                $M->save($data);
            }else{
                $data['user_id'] = $_SESSION['user_id'];
                $data['status'] = I('status',1);
                $data['title'] = I('title');
                $data['varname'] = I('varname');
                $data['keywords'] = I('keywords');
                $data['description'] = I('description');
                $data['clicks'] = I('clicks');
                $data['content'] = I('content','',false);
                $data['update_time'] = NOW_TIME;
                $data['create_time'] = NOW_TIME;
                $M->add($data);
            }
            $result = array('status' => 1, 'info' => "操作成功", 'url' => U('singlepage/index'));
            echo json_encode($result);
            exit;
        } else {
            $id = I('id');
            $info = $M->find($id);
            $this->assign('info',$info);
            $this->display();
        }
    }

	public function detail(){
		$id = $_REQUEST['id'];
		$where['id'] = $id;
		$this->assign("info", D("Singlepage")->detail($where));
		$this->display();
	}

    public function del() {
        if (M("Singlepage")->where("id=" . (int) $_GET['id'])->delete()) {
            $this->success("成功删除");
        //            echo json_encode(array("status"=>1,"info"=>""));
        } else {
            $this->error("删除失败，可能是不存在该ID的记录");
        }
    }


}