<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends CommonController {
    protected $tableName = 'News';
    function _initialize() {
        parent::_initialize();
        header("Content-Type:text/html;charset=utf-8");

        $News = M("News");
        $news_rank = $News->where( array('status'=>1) )->order('clicks DESC')->limit(10)->select();
        $this->assign('news_rank',$news_rank);
    }

    public function index() {
        $M = M("News");
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
            $categoryInfo = D('News')->getCategoryInfo($cid);
            $this->assign('categoryInfo',$categoryInfo);
        }
        $this->display();
    }


    public function show(){
    	$id = I('id');

    	$News = M("News");
    	$info = $News->where('id='.$id)->find();
    	$info['content'] = M('NewsContent')->where('id='.$id)->getField('content');
    	$this->assign('info',$info);

        $categoryArr = F('news_category_array');
        $this->assign('category_list',$categoryArr);

        $this->assign('prev',D('News')->getPrev($info['id'],$info['category_id']));
        $this->assign('next',D('News')->getNext($info['id'],$info['category_id']));

        if(!empty($info['category_id'])){
            $categoryInfo = D('News')->getCategoryInfo($info['category_id']);
            $this->assign('categoryInfo',$categoryInfo);
        }
    	$this->display();
    }

   public function search(){
        $M = M("News");
        $map = array();
        $categoryArr = F('news_category_array');
        $adminArr = F('admin_list');
        $statusArr = array('1'=>'已审核', '2'=>'未审核');


        $keyword = I('q');

        if (!empty($keyword)&&$keyword!='请输入搜索关键词'){
            $map['title'] = array('like','%'.$keyword.'%');
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
            $categoryInfo = D('News')->getCategoryInfo($cid);
            $this->assign('categoryInfo',$categoryInfo);
        }

        $this->display();
   }

    public function _side(){

    }

}