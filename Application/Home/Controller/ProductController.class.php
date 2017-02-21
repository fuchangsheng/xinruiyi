<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends CommonController {
    protected $tableName = 'Product';
    function _initialize() {
        parent::_initialize();
        header("Content-Type:text/html;charset=utf-8");
    }

    public function index() {
        $M = M("Product");
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
        $this->display('product');
    }


    public function show(){
    	$id = I('id');

    	$Product = M("Product");
    	$info = $Product->where('id='.$id)->find();
    	$info['content'] = M('ProductContent')->where('id='.$id)->getField('content');
    	$this->assign('info',$info);

    	/*$related = D('Product')->getProductRelated($id);
    	$this->assign('news_related',$related);*/

        $categoryArr = F('news_category_array');
        $this->assign('category_list',$categoryArr);

        $this->_side();
    	$this->display();
    }

    /*public function search(){
        $this->display();
    }*/


    public function _side(){

    }

    public function daoru(){
        /*$A = M("A");
        $B = M("B");
        $Product = M("Product");
        $Content = M("ProductContent");

        $list = $A->join('RIGHT JOIN lqb_b ON lqb_a.aid = lqb_b.aid')->limit(100)->select();
        foreach ($list as $key => $val) {
            $data = array();
            $c = array();
            $data['user_id'] = 1;
            $data['house_id'] = rand(1,10);
            $data['category_id'] = rand(1,5);
            $data['title'] = $val['subject'];
            $data['description'] = $val['abstract'];
            $data['keywords'] = $val['keywords'];
            $data['create_time'] = $val['createdate'];
            $data['update_time'] = $val['updatedate'];
            $content  = str_replace('<!cmsurl />', "/", $val['content']);
            $content  = preg_replace('/<img.+\/>/','',$content);

            $id = $Product->add($data);
            if($id){
                $c['content'] = $content;
                $c['id'] = $id;
                $Content->add($c);
            }
        }
*/

        exit;
    }
}