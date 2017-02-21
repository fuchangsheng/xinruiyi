<?php
namespace Admin\Controller;
use Think\Controller;
class HouseController extends CommonController {
    protected $tableName = 'House';

    public function index() {
        $M = M($this->tableName);
        $Album = M('HouseAlbum');
        $News = M('News');

        $id = I('id');  //楼盘ID
        $area = I('area');
        $sale_status = I('sale_status');
        $fitment = I('fitment');
        $build_type = I('build_type');
        $item = I('item');
        $keyword = I('keyword','','trim');
        $discount = I('discount');
        $recommend = I('recommend');
        $hot_sell = I('hot_sell');
        $status = I('status');

        $category = D('House')->category();
        $categoryTree = D('House')->getCategoryTree();
        $this->assign('categoryTree',$categoryTree);

        $statusArr = array(0=>'未审核', 1=>'已审核');


        $map = array();
        if(!empty($id)){
            $map['id'] = $id;
        }
        if(!empty($area)){
            $map['area'] = $area;
        }
        if(!empty($sale_status)){
            $map['sale_status'] = $sale_status;
        }
        if(!empty($fitment)){
            $map['fitment'] = $fitment;
        }
        if(!empty($build_type)){
            $map['build_type'] = $build_type;
        }
        if(!empty($discount)){
            $map['d'] = 1;
        }
        if(!empty($recommend)){
            $map['r'] = 1;
        }
        if(!empty($hot_sell)){
            $map['h'] = 1;
        }
        if(!empty($status)){
            $map['status'] = $status;
        }
        if(!empty($keyword)&&$keyword!='请输入关键词'){
            $map['name'] = array('like','%'.$keyword.'%');
        }

        $count      = $M->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();
        $this->assign('page',$show);

        $list = $M->where($map)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $M->getLastSql();
        foreach ($list as $key => $val) {
            $list[$key]['area'] = $category[$val['area']]['name'];
            $list[$key]['status'] = $statusArr[$val['status']];
            $list[$key]['sale_status'] = $category[$val['sale_status']]['name'];
            $list[$key]['albumNum'] = $Album->where('house_id='.$val['id'])->count();
            $list[$key]['newsNum'] = $News->where('house_id='.$val['id'])->count();
        }
        $this->assign('list',$list);

        $this->assign('category',$category);

        //print_r($category);


        $this->display();
    }

    public function add() {
        if (IS_POST) {
            $id = I('id');
            if($id){
                echo json_encode(D("House")->edit());
            }else{
                echo json_encode(D("House")->add());
            }
        } else {
            $id = I('id');
            if(!empty($id)){
                $info = D('House')->getInfo();
                $this->assign('info',$info);
            }

            $categoryTree = D("House")->getCategoryTree();
            $this->assign("categoryTree",$categoryTree);
            $this->display();
        }
    }

    public function addContent(){
        if (IS_POST) {
            $data = I('post.data');
            if(empty($data['id'])){
                echo json_encode(D("House")->addHouse());
            }else{
                echo json_encode(D("House")->edit());
            }
        } else {
            $id = I('id');
            if(!empty($id)){
                $info = D('House')->getInfo();
                $this->assign('info',$info);
            }

            $categoryTree = D("House")->getCategoryTree();
            $this->assign("categoryTree",$categoryTree);
            $this->display();
        }
    }

    public function checkHouseTitle() {
        $M = M("House");
        $where = "title='" . $this->_get('title') . "'";
        if (!empty($_GET['id'])) {
            $where.=" And id !=" . (int) $_GET['id'];
        }
        if ($M->where($where)->count() > 0) {
            echo json_encode(array("status" => 0, "info" => "已经存在，请修改标题"));
        } else {
            echo json_encode(array("status" => 1, "info" => "可以使用"));
        }
    }

	public function detail(){
		$id = $_REQUEST['id'];
		$where['id'] = $id;
		$this->assign("info", D("House")->detail($where));
		$this->display();
	}

    public function del() {
        $id = I('id');
        if (M("House")->where("id=" . $id)->delete()) {
            M("HouseContent")->where("id=" . $id)->delete();
            M("HouseAlbum")->where("house_id=" . $id)->delete();
            echo json_encode(array("status"=>1,"info"=>"成功删除", 'id'=>$id));
            exit;
        } else {
            $this->error("删除失败，可能是不存在该ID的记录");
        }
    }

	public function changeHouseStatus(){
		$statusId = $_GET['statusId'];
		$id = $_GET['id'];
		if(empty($id)) return false;
		if($statusId==1){
			$data['status'] = 0;
			$info = "待审核";
		}else{
			$data['status'] = 1;
			$info = "审核通过";
		}
		M('House')->where('id='.$id)->save($data);
		$this->ajaxReturn($data['status'],$info,1);
	}

    public function category() {
        if (IS_POST) {
            echo json_encode(D("House")->category());
        } else {
            $this->assign("list", D("House")->category());
            $this->display();
        }
    }

    /*相册*/
    public function album(){
        $M = M('HouseAlbum');

        $category_id = I('category_id');
        $house_id = I('house_id');

        $category = F('house_category_array');
        if(!empty($house_id)){
            $houseInfo = D('House')->getInfo($house_id);
            $this->assign('houseInfo',$houseInfo);
        }

        $map = array();
        if($category_id){
            $map['type_id'] = $category_id;
        }
        if($house_id){
            $map['house_id'] = $house_id;
        }


        $count      = $M->where($map)->count();

        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();
        $this->assign('page',$show);
        $imageList = $M->where($map)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($imageList as $key => $val) {
            $imageList[$key]['thumb'] = get_thumb($val['path']);
            $imageList[$key]['categoryName'] = $category[$val['type_id']]['name'];
        }
        $this->assign('imageList',$imageList);

        $albumTypeList = D('House')->getCategoryList(52);
        $this->assign('albumTypeList',$albumTypeList);


        $this->assign('empty','');
        $this->display();
    }

    public function addAlbum(){

        if(IS_POST){
            echo json_encode(D("House")->addAlbum());
            exit;
        }
        $house_id = I('house_id');
        if(!empty($house_id)){
            $houseInfo = D('House')->getInfo($house_id);
            $this->assign('houseInfo',$houseInfo);
        }

        if(!$house_id){
            $M = M('House');
            $map = array();
            $house_list = $M->where($map)->limit(100)->select();
            $this->assign('house_list',$house_list);
        }
        $albumTypeList = D('House')->getCategoryList(52);
        $this->assign('albumTypeList',$albumTypeList);
        $this->display();
    }

    public function addAlbum2(){
        if(IS_POST){
            echo json_encode(D("House")->addAlbum2());
            exit;
        }

        $house_id = I('house_id');
        if(!empty($house_id)){
            $houseInfo = D('House')->getInfo($house_id);
            $this->assign('houseInfo',$houseInfo);
        }

        if(!$house_id){
            $M = M('House');
            $map = array();
            $house_list = $M->where($map)->limit(100)->select();
            $this->assign('house_list',$house_list);
        }
        $albumTypeList = D('House')->getCategoryList(52);
        $this->assign('albumTypeList',$albumTypeList);
        $this->display();
    }

    public function editAlbum(){
        if(IS_AJAX){
            $act = I('act');
            if($act=='changename'){
                $id = $_GET['id'];
                $name = $_GET['name'];
                $M = M('HouseAlbum');
                $M->where('id='.$id)->setField('name',$name);
                $result = array('status'=>1, 'info'=>'操作成功！');
                echo json_encode($result);
                exit;
            }else{
                echo json_encode(D("House")->editAlbum());
                exit;
            }

        }

        $album_id = I('album_id');
        if($album_id){
            $Album = M('HouseAlbum');

            //获取相册信息
            $albumInfo = $Album->find($album_id);
            $this->assign('albumInfo',$albumInfo);

            //获取楼盘信息
            if(!empty($albumInfo['house_id'])){
                $House = M('House');
                $houseInfo = $House->find($albumInfo['house_id']);
                $this->assign('houseInfo',$houseInfo);
            }
        }

        $albumTypeList = D('House')->getCategoryList(52);
        $this->assign('albumTypeList',$albumTypeList);
        $this->display();
    }

    public function delAlbum() {
        $M = M('HouseAlbum');
        $id = I('id');
        $map = array();
        $map['id'] = $id;
        $path = $M->where($map)->getField('path');
        if ($M->where($map)->delete()) {
            $fullpath = '.'.$path;
            if(is_file($fullpath)&&file_exists($fullpath)){
                unlink($fullpath);
            }
            echo json_encode(array("status"=>1,"info"=>"成功删除"));
            exit;
        } else {
            echo json_encode(array("status"=>0,"info"=>"删除失败！"));
            exit;
        }
    }


    //历史价格
    public function price(){
        if (IS_POST) {
            echo json_encode(D("House")->price());
            exit;
        }
        $M = M('HousePrice');
        $house_id = I('house_id');

        if($house_id){
            $houseInfo = D('House')->getInfo($house_id);
            $this->assign('houseInfo',$houseInfo);
        }

        $map = array();

        if($house_id){
            $map['house_id'] = $house_id;
        }


        $count      = $M->where($map)->count();

        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();
        $this->assign('page',$show);
        $list = $M->where($map)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);

        $this->display();
    }


    //测评
    public function ceping(){
        $house_id = I('house_id');

        if($house_id){
            $Ceping = M('HouseCeping');
            $House = M('House');
            if(IS_POST){
                $assessor_id = I('post.assessor_id');
                $num = $Ceping->where('house_id='.$house_id)->count();
                $data = array();
                $data['house_id'] = $house_id;
                if(!empty($assessor_id)){
                    $data['user_id'] = $assessor_id;
                }else{
                    $data['user_id'] = session('user_id');
                }

                $data['total'] = I('post.total');
                $data['jiaotong'] = I('post.jiaotong');
                $data['peitao'] = I('post.peitao');
                $data['guihua'] = I('post.guihua');
                $data['sheji'] = I('post.sheji');
                $data['zonghe'] = I('post.zonghe');
                $data['youdian'] = $_POST['youdian'];
                $data['quedian'] = $_POST['quedian'];
                $data['create_time'] = NOW_TIME;
                if($num>0){
                    $Ceping->where('house_id='.$house_id)->save($data);
                }else{
                    $Ceping->add($data);
                }
                $House->where('id='.$house_id)->setField('grade',$data['total']);
                $result = array('status'=>1, 'info'=>'操作成功！');
                echo json_encode($result);
                exit;
            }else{
                $houseInfo = $House->where('id='.$house_id)->find();
                $this->assign('houseInfo',$houseInfo);

                $info = $Ceping->where('house_id='.$house_id)->find();
                $this->assign('info',$info);

                $Assessor = M('Assessor');
                $assessor_list = $Assessor->where('status=1')->order()->limit()->select();
                $this->assign('assessor_list',$assessor_list);
                $this->display('House:ceping_add');
            }
            exit;
        }
        //测评列表
        $Ceping = D('CepingView');

        $list = $Ceping->where()->order()->limit()->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function ceping_del(){
        $ids = I('ids');
        $Ceping = M('HouseCeping');

        if(is_array($ids)){
            $map['id'] = array('in',$ids);
        }else{
            $map['id'] = array('in',explode($ids));
        }

        $result = $Ceping->where($map)->delete();

        if ($result) {
            echo json_encode(array("status"=>1,"info"=>"成功删除", 'url'=>U('house/ceping') ));
            exit;
        } else {
            $this->error("删除失败，可能是不存在该ID的记录");
        }
    }

    //楼盘报名
    public function baoming(){
        $Baoming = D('BaomingView');
        /*$category_id = I('category_id');
        $house_id = I('house_id');

        if(!empty($house_id)){
            $houseInfo = D('House')->getInfo($house_id);
            $this->assign('houseInfo',$houseInfo);
        }*/

        $act = I('act');
        if($act=='edit'){
            $id = I('id',0);
            if(IS_POST){
                $M = M('HouseBaoming');
                $data = array();
                $data['client_name'] = $_POST['client_name'];
                $data['client_phone'] = $_POST['client_phone'];
                $data['client_email'] = $_POST['client_email'];
                $data['client_sex'] = $_POST['client_sex'];
                $M->where('id='.$id)->save($data);
                $result = array('status'=>1, 'info'=>'操作成功！');
                $this->ajaxReturn($result);
            }
            $info = $Baoming->where("HouseBaoming.id=$id")->find();
            $this->assign('info',$info);
            $this->display('House:baoming_add');
            exit;
        }
        $map = array();
        if($category_id){
            $map['type_id'] = $category_id;
        }

        $count      = $Baoming->where($map)->count();

        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();
        $this->assign('page',$show);
        $list = $Baoming->where($map)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {

        }
        $this->assign('list',$list);
        $this->display();
    }

    public function del_baoming() {
        $Baoming = M("HouseBaoming");
        $ids = I('post.ids');
        $map['id'] = array('in',$ids);
        if ($Baoming->where($map)->delete()) {
            $result = array("status"=>1,"info"=>"成功删除",'url'=>'');
        } else {
            $result = array("status"=>0,"info"=>"删除失败，可能是不存在该ID的记录");
        }
        $this->ajaxReturn($result);
        exit;
    }

    //楼盘点评
    public function comment(){
        $Comment = D('CommentView');
        /*$category_id = I('category_id');
        $house_id = I('house_id');

        if(!empty($house_id)){
            $houseInfo = D('House')->getInfo($house_id);
            $this->assign('houseInfo',$houseInfo);
        }*/

        $act = I('act');
        if($act=='edit'){
            $id = I('id',0);
            if(IS_POST){
                $M = M('HouseComment');
                $data = array();
                $data['client_name'] = $_POST['client_name'];
                $data['client_phone'] = $_POST['client_phone'];
                $data['client_email'] = $_POST['client_email'];
                $data['client_sex'] = $_POST['client_sex'];
                $M->where('id='.$id)->save($data);
                $result = array('status'=>1, 'info'=>'操作成功！');
                $this->ajaxReturn($result);
            }
            $info = $Comment->where("HouseComment.id=$id")->find();
            $this->assign('info',$info);
            $this->display('House:comment_add');
            exit;
        }
        $map = array();
        if($category_id){
            $map['type_id'] = $category_id;
        }

        $count      = $Comment->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();
        $this->assign('page',$show);
        $list = $Comment->where($map)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {

        }
        $this->assign('list',$list);
        $this->display();
    }

    public function comment_del(){
        $ids = I('post.ids');
        if(!empty($ids) && is_array($ids)){
            $Comment = M('HouseComment');
            $map['id'] = array('in',$ids);
            $Comment->where($map)->delete();
            $result = array('status'=>1, 'info'=>'删除成功！','url'=>'/admin.php/house/comment/');
            $this->ajaxReturn($result);
            exit;
        }else{
            $result = array('status'=>0, 'info'=>'所删除的评论不存在');
            $this->ajaxReturn($result);
            exit;
        }
    }

    public function ask(){
        $HouseAsk = D('HouseAsk');
        $act = I('get.act');
        if($act=='edit'){
            $id = I('id',0);
            if(IS_POST){
                $data = array();
                $data['content'] = $_POST['content'];
                $data['reply'] = $_POST['reply'];
                $data['reply_time'] = NOW_TIME;
                $HouseAsk->where('id='.$id)->save($data);
                $result = array('status'=>1, 'info'=>'操作成功！');
                $this->ajaxReturn($result);
            }
            $info = $HouseAsk->where('id='.$id)->find();
            $info['houseName'] = M('House')->where('id='.$info['house_id'])->getField('name');
            $this->assign('info',$info);
            $this->display('House:ask_reply');
            exit;
        }

        $HouseAsk = D('HouseAsk');
        $map = array();
        $keyword = I('get.keyword');
        if(!empty($keyword)&&$keyword!='请输入关键词'){
            $map['content'] = array('like','%'.$keyword.'%');
        }

        $count      = $HouseAsk->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();
        $this->assign('page',$show);
        $list = $HouseAsk->where($map)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {

        }
        $this->assign('list',$list);
        $this->display();
    }

    public function news(){
        $house_id = I('house_id');


        $News = M("News");
        $categoryList = D('News')->getCategoryList();
        $adminArr = F('admin_list');
        $statusArr = array('1'=>'已审核', '2'=>'未审核');

        $map = array();
        $map['house_id'] = array('eq',$house_id);
        $count = $News->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $News->where($map)->order('update_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();

        foreach ($list as $key => $val) {
            $list[$key]['categoryName'] = $categoryList[$val['category_id']]['name'];
            $list[$key]['admin'] = $adminArr[$val['user_id']]['username'];
            $list[$key]['status'] = $statusArr[$val['status']];
        }
        $this->assign('list',$list);



        if(!empty($house_id)){
            $houseInfo = D('House')->getInfo($house_id);
            $this->assign('houseInfo',$houseInfo);
        }
        $this->display();
    }

    public function news_add(){
        $News = M("News");

        if(IS_POST){
            $ids = I('post.ids');
            $house_id = I('post.house_id');
            if(!empty($ids) && is_array($ids)){

                $map['id'] = array('in',$ids);
                $News->where($map)->setField('house_id',$house_id);
                $result = array('status'=>1, 'info'=>'添加成功！','url'=>U('house/news',array('house_id'=>$house_id)));
                $this->ajaxReturn($result);
                exit;
            }else{
                $result = array('status'=>0, 'info'=>'参数错误！');
                $this->ajaxReturn($result);
                exit;
            }
        }
        $category_id = I('category_id',0);
        $categoryList = D('News')->getCategoryList();
        $adminArr = F('admin_list');
        $statusArr = array('1'=>'已审核', '2'=>'未审核');

        if (IS_GET){
            $keyword = trim($_GET['keyword']);

            if(!empty($category_id)){
                $map['category_id'] = $category_id;
            }

            if(!empty($cidArr)) $map['category_id'] = array('in',$cidArr);
            if(!empty($keyword)) $map['title'] = array('like','%'.$keyword.'%');
        }

        $map['house_id'] = array('eq',0);
        $count = $News->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $News->where($map)->order('update_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();

        foreach ($list as $key => $val) {
            $list[$key]['categoryName'] = $categoryList[$val['category_id']]['name'];
            $list[$key]['admin'] = $adminArr[$val['user_id']]['username'];
            $list[$key]['status'] = $statusArr[$val['status']];
        }
        $this->assign('list',$list);
        $this->assign('category_list',$categoryList);

        $house_id = I('house_id');
        if(!empty($house_id)){
            $houseInfo = D('House')->getInfo($house_id);
            $this->assign('houseInfo',$houseInfo);
        }
        $this->display();
    }

    public function news_del(){
        $News = M("News");

        if(IS_POST){
            $ids = I('post.ids');
            $house_id = I('post.house_id');
            if(empty($house_id)){
                $result = array('status'=>0, 'info'=>'楼盘参数错误！');
                $this->ajaxReturn($result);
                exit;
            }
            if(!empty($ids) && is_array($ids)){
                $map['id'] = array('in',$ids);
                $News->where($map)->setField('house_id',0);
                $result = array('status'=>1, 'info'=>'操作成功！','url'=>U('house/news',array('house_id'=>$house_id)));
                $this->ajaxReturn($result);
                exit;
            }else{
                $result = array('status'=>0, 'info'=>'参数错误！');
                $this->ajaxReturn($result);
                exit;
            }
        }
        $this->display();
    }
}