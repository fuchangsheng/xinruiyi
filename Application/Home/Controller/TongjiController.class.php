<?php
namespace Home\Controller;
use Think\Controller;
class TongjiController extends CommonController {
    protected $tableName = 'News';

    public function index() {
        $Admin = M('Admin');
        $News = M('News');

        $keyword = trim($_GET['keyword']);
        $company = trim($_GET['company']);
        $admin_id = trim($_GET['admin_id']);


        if (IS_GET){
            if(!empty($keyword)) $map['username'] = $keyword;
            if(!empty($company)) $map['company'] = $company;
            if(!empty($admin_id)) $map['id'] = $admin_id;
        }


        $admin_list = $Admin->where($map)->order('role_id ASC')->select();
        foreach ($admin_list as $key => $val) {
            $admin_list[$key]['total'] = $News->where( array('user_id'=>$val['id']) )->count();
            $admin_list[$key]['status1'] = $News->where( array('user_id'=>$val['id'],'status'=>1) )->count();
            $admin_list[$key]['status2'] = $News->where( array('user_id'=>$val['id'],'status'=>2) )->count();
            $admin_list[$key]['status0'] = $News->where( array('user_id'=>$val['id'],'status'=>0) )->count();
        }

        $this->assign('admin_list',$admin_list);



        $News = M("News");
        $news_rank = $News->where( array('status'=>1) )->order('clicks DESC')->limit(10)->select();
        $this->assign('news_rank',$news_rank);
        $this->display();
    }


}