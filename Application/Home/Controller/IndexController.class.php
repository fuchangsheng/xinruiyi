<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){

        //最新动态 图
        $news_pic = D('News')->getListPic(6);
        $this->assign('news_pic',$news_pic);

        // 行业资讯
        $news_list_1 = D("News")->getCategoryNewsList(1,6);
        $this->assign('news_list_1',$news_list_1);

        $news_list_2 = D("News")->getCategoryNewsList(2,6);
        $this->assign('news_list_2',$news_list_2);

        $news_list_4 = D("News")->getCategoryNewsList(4,6);
        $this->assign('news_list_4',$news_list_4);

        $About = M('Singlepage');
        $aboutInfo = $About->where('id=1')->find();
        $this->assign('aboutInfo',$aboutInfo);

        //专题
        $SpecialCategory = M('SpecialCategory');
        $special_list = $SpecialCategory->where()->order('sort ASC')->limit()->select();
        $this->assign('special_list',$special_list);

        $link_list = $this->getFriendlink();
        $this->assign('link_list',$link_list);


        //统计
        $Admin = M('Admin');
        $News = M('News');


        if (IS_GET){
            $keyword = trim($_GET['keyword']);
            if(!empty($keyword)) $map['username'] = $keyword;
        }


        $map['status'] = 1;
        $admin_list = $Admin->where($map)->order('role_id ASC')->select();
        foreach ($admin_list as $key => $val) {
            $admin_list[$key]['total'] = $News->where( array('user_id'=>$val['id']) )->count();
            $admin_list[$key]['status1'] = $News->where( array('user_id'=>$val['id'],'status'=>1) )->count();
            $admin_list[$key]['status2'] = $News->where( array('user_id'=>$val['id'],'status'=>2) )->count();
            $admin_list[$key]['status0'] = $News->where( array('user_id'=>$val['id'],'status'=>0) )->count();
        }

        $this->assign('admin_list',$admin_list);


        //产品列表
        $product_list = $this->getProduct(9);
        $this->assign('product_list',$product_list);

        //成功案例
        $case_list = $this->getCase(10);
        $this->assign('case_list',$case_list);


        //合作伙伴
        $partner_list = $this->getPartner();
        $this->assign('partner_list',$partner_list);


        $this->display();
    }

    public function getGrouponList(){
        $M = D('GrouponView');
        $list = $M->where()->order()->limit(4)->select();
        foreach ($list as $key => $val) {
            $list[$key]['url'] = url_house_show($val['house_id']);
        }
        return $list;
    }

    public function getAssessorAndHouse(){
        $Assessor = M('Assessor');
        $Ceping = M('HouseCeping');
        $House = M('House');

        $list = $Assessor->where()->order()->limit(3)->select();
        foreach ($list as $key => $val) {
            $house_ids = $Ceping->where('user_id='.$val['id'])->limit(2)->getField('house_id',true);
            if(!empty($house_ids)){
                $map['id'] = array('in',$house_ids);
                $list[$key]['house_list'] = $House->where($map)->select();
                foreach ($list[$key]['house_list'] as $k => $v) {
                    $list[$key]['house_list'][$k]['url'] = url_house_show($v['id']);
                }
            }

        }
        return $list;
    }

    public function getAssessHouseTop(){
        $Ceping = M('HouseCeping');
        $House = M('House');
        $house_id = $Ceping->where()->getField('house_id');
        if(!empty($house_id)){
            $houseInfo = $House->where('id='.$house_id)->find();
            $houseInfo['url'] = url_house_show($house_id);
        }
        return $houseInfo;
    }

    public function getFriendlink(){
        $M = M("Friendlink");
        $map = array();
        $map['status'] = 1;
        $list = $M->where($map)->order('sort ASC')->limit(100)->select();
        return $list;
    }

    public function getPartner(){
        $M = M("Partner");
        $map = array();
        $map['status'] = 1;
        $list = $M->where($map)->order('sort ASC')->limit(100)->select();
        return $list;
    }

    public function getProduct($limit=10){
        $M = M("Product");
        $map = array();
        $map['status'] = 1;
        $list = $M->where($map)->order('id DESC')->limit($limit=10)->select();
        return $list;
    }

    //成功案例
    public function getCase($limit=10){
        $Case = M("Case");
        $map = array();
        $map['status'] = 1;
        $list = $Case->where($map)->order('id DESC')->limit($limit=10)->select();
        return $list;
    }


    public function xieyi(){
        $Singlepage = M("Singlepage");
        $info = $Singlepage->find(5);
        $this->assign('info',$info);
        $this->display("");
    }


}