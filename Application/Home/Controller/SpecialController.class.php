<?php
namespace Home\Controller;
use Think\Controller;
class SpecialController extends CommonController {
    protected $tableName = 'Special';
    function _initialize() {
        parent::_initialize();
        header("Content-Type:text/html;charset=utf-8");

        $Special = M("Special");
        $news_rank = $Special->where( array('status'=>1) )->order('clicks DESC')->limit(10)->select();
        $this->assign('news_rank',$news_rank);
    }

    public function index() {
        $M = M("Special");
        $map = array();
        $categoryArr = F('news_category_array');
        $adminArr = F('admin_list');
        $statusArr = array('1'=>'已审核', '2'=>'未审核');


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

        $map['status'] = 1;
        $count = $M->where($map)->count();
        $Page       = new \Think\Page($count,10);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $M->where($map)->order('create_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {
            $list[$key]['categoryName'] = $categoryArr[$val['category_id']]['name'];
            $list[$key]['admin'] = $adminArr[$val['user_id']]['username'];
            $list[$key]['status'] = $statusArr[$val['status']];
            $list[$key]['url'] = url_news_show($val['id']);
            $list[$key]['thumb'] = !empty($val['thumb']) ? $val['thumb'] : '/Public/images/nopic.gif';
        }
        $this->assign('list',$list);
        $this->assign('category_list',$categoryArr);

        //$this->_side();

        $seo_list = F('seo_list');
        foreach ($seo_list as $key => $val) {
            if($val['id']==2){
                $this->assign('seo',$val);
            }
        }

        if(!empty($cid)){
            $categoryInfo = D('Special')->getCategoryInfo($cid);
            $this->assign('categoryInfo',$categoryInfo);
        }
        $this->display();
    }


    public function show(){
    	$id = I('id');

    	$Special = M("Special");
    	$info = $Special->where('id='.$id)->find();
    	$this->assign('info',$info);

        $this->assign('prev',D('Special')->getPrev($info['id']));
        $this->assign('next',D('Special')->getNext($info['id']));

    	$this->display();
    }


    public function _side(){

    }

}