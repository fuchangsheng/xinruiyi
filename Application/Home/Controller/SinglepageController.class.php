<?php
namespace Home\Controller;
use Think\Controller;
class SinglepageController extends CommonController {
    protected $tableName = 'Singlepage';

    public function index() {
        $M = M("Singlepage");

        $categoryArr = F('news_category_array');
        $adminArr = F('admin_list');
        $statusArr = array('1'=>'已审核', '2'=>'未审核');


        $keyword = I('keyword');
        $cid = I('cid');

		if (IS_POST){

			if(!empty($cid)) $map['category_id'] = array('in',$cid);
			if(!empty($keyword)&&$keyword!='请输入搜索关键词') $map['title'] = array('like','%'.$keyword.'%');
		}

        $count = $M->where($map)->count();
        $Page       = new \Think\Page($count,5);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $M->where($map)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {
            $list[$key]['categoryName'] = $categoryArr[$val['category_id']]['name'];
            $list[$key]['admin'] = $adminArr[$val['user_id']]['username'];
            $list[$key]['status'] = $statusArr[$val['status']];
            $list[$key]['url'] = '/news/show-'.$val['id'].'.html';
        }
        $this->assign('list',$list);
        $this->assign('category_list',$categoryArr);
        $this->display();
    }


    public function show(){
    	$id = I('id');
    	$M = M($this->tableName);
        $info = $M->find($id);
        $this->assign('info',$info);
    	$this->display();
    }
}