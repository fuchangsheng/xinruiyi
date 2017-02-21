<?php
namespace Home\Controller;
use Think\Controller;
class PartnerController extends CommonController {
    protected $tableName = 'Partner';
    function _initialize() {
        parent::_initialize();
        header("Content-Type:text/html;charset=utf-8");
    }

    public function index() {
        $M = M("Partner");
        $map = array();

        $keyword = I('kw');
        $cid = I('cid');
        if($cid){
            if(!empty($cid)) $map['category_id'] = array('in',$cid);
        }
		if (!empty($keyword)&&$keyword!='请输入搜索关键词'){
			$map['title'] = array('like','%'.$keyword.'%');
		}
        if(!empty($cid)){
            $map['category_id'] = $cid;
        }

        $count = $M->where($map)->count();
        $Page       = new \Think\Page($count,10);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $M->where($map)->order('create_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {
            $list[$key]['url'] = url_news_show($val['id']);
            $list[$key]['thumb'] = !empty($val['thumb']) ? $val['thumb'] : '/Public/images/nopic.gif';
        }
        $this->assign('list',$list);
        $this->display('');
    }


    public function show(){
    	$id = I('id');

    	$Partner = M("Partner");
    	$info = $Partner->where('id='.$id)->find();
    	$info['content'] = M('PartnerContent')->where('id='.$id)->getField('content');
    	$this->assign('info',$info);

    	/*$related = D('Partner')->getPartnerRelated($id);
    	$this->assign('news_related',$related);*/

        $categoryArr = F('news_category_array');
        $this->assign('category_list',$categoryArr);

        $this->_side();
    	$this->display();
    }

}