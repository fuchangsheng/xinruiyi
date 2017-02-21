<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    function _initialize() {
		header("Content-Type:text/html;charset=utf-8");
        header('Content-Type:application/json; charset=utf-8');
        defined('IN_LIQINGBO') or exit('Access Denied');

        //热门关键词
        $hot_keywords = C('hot_keywords');
        if(!empty($hot_keywords)){
            $hotKeywordsArr = explode('|', $hot_keywords);
            $this->assign('hotKeywordsArr',$hotKeywordsArr);
        }
        
        //幻灯片
        $Advert = M('Advert');
        $slide_list = $Advert->where( array('place'=>1, 'status'=>1) )->order('sort ASC')->limit(5)->select();
        $this->assign('slide_list',$slide_list);


        $this->_setNavCss();

        $this->assign('house_hot',F('house_hot'));
        /*if(check_wap()){
            C('DEFAULT_THEME','m');
            $m_static = 'http://'.$_SERVER['SERVER_NAME'].'/Themes/Home/m/static';
            C('TMPL_PARSE_STRING.__STATIC__',$m_static);
        }*/

        $news_tree = get_news_category_tree();
        foreach ($news_tree as $key => $val) {
            if($val['id']==15||$val['id']==16||$val['id']==17){
                unset($news_tree[$key]);
            }
        }
        $this->assign('news_tree',$news_tree);


    }

    protected function _setNavCss(){
        $on = 'class="hover"';
        $class['index'] = array();
        $class['about'] = array();
        $class['news'] = array();


        $controllerName = strtolower(CONTROLLER_NAME);
        $actionName = strtolower(ACTION_NAME);
        $class[$controllerName] = $on;

        if($controllerName=='news'){
            if($actionName=='index'){
                $cid = I('get.cid');
                $class[$cid] = $on;
            }else{
                $id =I('get.id');
                $cid = D('News')->newsCategoryInfo($id,'id');
                $class[$cid] = $on;
            }
        }

        if($controllerName=='singlepage'){
            $class['about'] = $on;
        }

        $this->assign('navCurrentClass',$class);
    }

}