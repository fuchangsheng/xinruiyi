<?php
namespace Home\Controller;
use Think\Controller;
class CaseController extends CommonController {
    protected $tableName = 'Case';
    function _initialize() {
        parent::_initialize();
        header("Content-Type:text/html;charset=utf-8");
    }

    public function index() {
        $M = M("Case");
        $keyword = I('kw');

		if (!empty($keyword)&&$keyword!='请输入搜索关键词'){
			$map['title'] = array('like','%'.$keyword.'%');
		}

        $count = $M->where($map)->count();
        $Page       = new \Think\Page($count,10);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $M->where($map)->order('create_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);

        $this->display('');
    }


    public function show(){
    	$id = I('id');

    	$Case = M("Case");
    	$info = $Case->where('id='.$id)->find();
    	$info['content'] = M('CaseContent')->where('id='.$id)->getField('content');
    	$this->assign('info',$info);

    	/*$related = D('Case')->getCaseRelated($id);
    	$this->assign('news_related',$related);*/

        $categoryArr = F('news_category_array');
        $this->assign('category_list',$categoryArr);

        $this->_side();
    	$this->display();
    }


}