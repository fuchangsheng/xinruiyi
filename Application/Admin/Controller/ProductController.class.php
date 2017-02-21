<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Lib\Category;
class ProductController extends CommonController {
    protected $tableName = 'Product';

    public function index() {
        $Product = M("Product");

        $category_id = I('category_id',0);
        $texture_id = I('texture_id',0);

        $adminArr = F('admin_list');
        $statusArr = array('1'=>'已审核', '2'=>'未审核');

		if (IS_GET){
			$keyword = trim($_GET['keyword']);

            if(!empty($category_id)){
                $map['category_id'] = $category_id;
            }
            if(!empty($texture_id)){
                $map['texture_id'] = $texture_id;
            }

			if(!empty($cidArr)) $map['category_id'] = array('in',$cidArr);
			if(!empty($keyword)) $map['title'] = array('like','%'.$keyword.'%');
		}

        $count = $Product->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $Product->where($map)->order('update_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {
            $list[$key]['admin'] = $adminArr[$val['user_id']]['username'];
            $list[$key]['status'] = $statusArr[$val['status']];

        }
        $this->assign('list',$list);

        $this->display();
    }

    public function getlist(){
        $action = I('get.action');
        $category_id = I('get.category_id');
        $texture_id = I('get.texture_id');

        if($action=='list'){
            $M = M("Product");
            $Album = M("ProductAlbum");
            $category_id = I('category_id',0);
            $texture_id = I('texture_id',0);

            if(!empty($category_id)){
                $map['category_id'] = $category_id;
            }
            if(!empty($texture_id)){
                $map['texture_id'] = $texture_id;
            }

            $count = $M->where($map)->count();
            $Page       = new \Think\Page($count,25);
            $showPage = $Page->show();
            $this->assign("page", $showPage);
            $list = $M->where($map)->order('update_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
            $html = '';
            foreach ($list as $key => $val) {
                $html .= '<li ><a href="#" onclick="" class="product_id" value="'.$val['id'].'">'.$val['title'].'</a></li>';
            }

            echo $html;
            exit;
        }
        $this->display();
    }

    public function category() {
        if (IS_POST) {
            echo json_encode(D("Product")->category());
        } else {
            $this->assign("list", D("Product")->category());
            $this->display();
        }
    }


    public function texture() {
        if (IS_POST) {
            echo json_encode(D("Product")->texture());
        } else {
            $this->assign("list", D("Product")->texture());
            $this->display();
        }
    }

    public function price() {
        if (IS_POST) {
            echo json_encode(D("Product")->price());
        } else {
            $this->assign("list", D("Product")->price());
            $this->display();
        }
    }

    public function add() {
        if (IS_POST) {
            $id = I('id');
            if(!$id){
                echo json_encode(D("Product")->add());
            }else{
                echo json_encode(D("Product")->edit());
            }
        } else {
            $id = I('id');
            $info = array();
            if($id){
                $M = M('Product');
                $Content = M('ProductContent');
                $info = $M->find($id);
                $info['content'] = $Content->where('id='.$id)->getField('content');

                if(!empty($info['house_id'])){
                    $info['houseName'] = D('House')->getInfo($info['house_id'],'name');
                }
            }else{
                $info['status'] = 1;
            }
            $this->assign("info", $info);
            $this->display();
        }
    }

    public function del_baoming() {
        $Product = M("Product");
        $ids = I('post.ids');
        $map['id'] = array('in',$ids);
        if ($Product->where($map)->delete()) {
            $result = array("status"=>1,"info"=>"成功删除",'url'=>'');
        } else {
            $result = array("status"=>0,"info"=>"删除失败，可能是不存在该ID的记录");
        }
        $this->ajaxReturn($result);
        exit;
    }

    public function album(){
        if(IS_POST){
            $result = array('status'=>1, 'info'=>'上传完成！', 'url'=>U('product/index') );
            $this->ajaxReturn($result);
        }

        $id = I('id');
        $info = array();
        if($id){
            $Product = M('Product');
            $Content = M('ProductContent');
            $info = $Product->where('id='.$id)->find();

            $Album = M('ProductAlbum');
            $map = array();
            $map['item_id'] = $id;
            $album_list = $Album->where($map)->order('')->limit()->select();
            $this->assign('album_list',$album_list);
        }

        $this->assign("info", $info);
        $this->display();
    }

    public function album_del(){
        $Album = M('ProductAlbum');
        $ids = I('get.id');
        $map['id'] = array('in',$ids);

        $list = $Album->where( $map )->select();
        foreach ($list as $key => $val) {
            del_thumb($val['path']);
        }

        if ($Album->where($map)->delete()) {
            $result = array("status"=>1,"info"=>"成功删除",'url'=>'');
        } else {
            $result = array("status"=>0,"info"=>"删除失败，可能是不存在该ID的记录");
        }
        $this->ajaxReturn($result);

    }

    //设置默认图
    public function set_album_default(){
        $ProductAlbum = M('ProductAlbum');
        $Product = M('Product');
        $id = I('get.id');
        $item_id = I('get.item_id');

        $map = array();
        $map['id'] = $id;
        $info = $ProductAlbum->where($map)->find();
        $ProductAlbum->where($map)->setField('default',1);



        $map = array();
        $map['item_id'] = $item_id;
        $ProductAlbum->where($map)->setField('default',0);

        $map = array();
        $map['id'] = $item_id;
        $Product->where($map)->setField('thumb',$info['path']);


        $result = array("status"=>1,"info"=>"");
        $this->ajaxReturn($result);
        exit;
    }

}