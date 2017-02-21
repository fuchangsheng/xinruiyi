<?php
namespace Admin\Model;
use Think\Model;
use Common\Lib\Category;
class HouseModel extends Model {
    protected $tableName = 'House';

    public function listHouse($where='', $firstRow = 0, $listRows = 20) {
        $M = M("House");
        $category = reformArr(F('house_category_array'));
        $statusArr = array(0=>'未审核', 1=>'已审核');

        $list = $M->where($where)->field()->order("id DESC")->limit("$firstRow , $listRows")->select();
        foreach ($list as $key => $val) {
            $list[$key]['area'] = $category[$val['area']]['name'];
            $list[$key]['status'] = $statusArr[$val['status']];
            $list[$key]['sale_status'] = $category[$val['sale_status']]['name'];
        }
        return $list;
    }

    public function getWhere($where='', $limit=20, $order='id DESC'){
        $M = D('House');
        $list = $M->where($where)->field()->limit($limit)->order($order)->select();
        foreach ($list as $key => $val) {
            $list[$key]['url'] = getHouseUrl($val['id']);
            $list[$key]['thumb'] = C('IMG_PATH').($val['thumb']);
        }
        return $list;
    }

    public function getInfo($id,$field=''){
        $M = M('House');
        $id = !empty($id) ? $id : I('id');
        $info = $M->where('id='.$id)->find();
        $info['open_time'] = !empty($info['open_time']) ? date('Y-m-d',$info['open_time']) : '';
        $info['close_time'] = !empty($info['close_time']) ? date('Y-m-d',$info['close_time']) : '';
        $content = M('HouseContent')->where('id='.$id)->find();
        $info['content'] = $content['content'];
        $info['school'] = $content['school'];
        $info['hospital'] = $content['hospital'];
        $info['bank'] = $content['bank'];
        $info['bus'] = $content['bus'];
        $info['thumb'] = !empty($info['thumb']) ? $info['thumb'] : '';

        if(!empty($field)){
            return $info[$field];
        }else{
            return $info;
        }

    }

    public function category() {
        if (IS_POST) {
            $act = $_POST[act];
            $data = $_POST['data'];
            $data['name'] = addslashes($data['name']);
            $data['name'] = $data['name'];
            $M = M("HouseCategory");
            if ($act == "add") { //添加分类
                unset($data[id]);
                if ($M->where($data)->count() == 0) {
                    if($M->add($data)){
                        $this->updateCategoryCaceh();
                        return array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功添加到系统中', 'url' => U('house/category', array('time' => time(),'pid'=>$data['pid'])) );
                    }else{
                        return array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 添加失败');
                    }
                } else {
                    return array('status' => 0, 'info' => '系统中已经存在分类' . $data['name']);
                }
            } else if ($act == "edit") { //修改分类
                if (empty($data['name'])) {
                    unset($data['name']);
                }
                if ($data['pid'] == $data['id']) {
                    unset($data['pid']);
                }
                if($M->save($data)){
                    $this->updateCategoryCaceh();
                    return array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功更新');
                }else{
                    return array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 更新失败');
                }
            } else if ($act == "del") { //删除分类
                $map = array();
                $data = I('data');
                $map['id'] = $data['id'];
                if($M->where($map)->delete()){
                    $this->updateCategoryCaceh();
                    return array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功删除', 'url' => U('house/category', array('time' => time())));
                }else{
                    echo $M->getLastSql();
                    return array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 删除失败');
                }
            }


        } else {
            $Category = new \Common\Lib\Category('HouseCategory', array('id', 'pid', 'name', 'fullname'));
            $list = $Category->getList();//获取分类结构
            foreach ($list as $key => $val) {
                $arr[$val['id']] = $val;
            }
            $this->updateCategoryCaceh();
            return $arr;
        }
    }

    public function getCategoryList($pid){

        $category = $this->category();
        if(!empty($pid)){
            foreach ($category as $key => $val) {
                if($val['pid']!=$pid){
                    unset($category[$key]);
                }
            }
        }
        return $category;
    }

    public function updateCategoryCaceh(){
        import("Category");
        $cat = new Category('HouseCategory', array('id', 'pid', 'name', 'fullname'));
        $list = $cat->getList();
        foreach ($list as $key => $val) {
            $keylist[$val['id']] = $val;
        }
        F('house_category_array',$keylist);
        F('house_category_tree',$this->getCategoryTree());


    }

    public function getCategoryInfo($id,$field){
        $category = $this->getCategoryList();
        foreach ($category as $key => $val) {
            if($val['id']==$id){
                $info = $val;
                break;
            }
        }
        if(!empty($field)&&is_string($field)){
            return $info[$field];
        }else{
            return $info;
        }
    }

    public function getCategoryTree($pid){
        $list = F('house_category_array');
        if(empty($list)){
            $this->updateCategoryCaceh();
            $list = F('house_category_array');
        }

        $id  = 'id';
        $pid = 'pid';
        foreach ($list as $key => $val) {
            if($val[$pid]==0){
                 $pList[$val[$id]] = $val;
            }else{
                $cList[$val[$pid]][$val[$id]] = $val;
            }
        }
        foreach ($cList as $key => $val) {
            $pList[$key]['sub'] = $val;
        }
        unset($data,$cList);
        return $pList;
    }

    public function add() {
        $M = M("House");
        $data = $this->getHouseData();

        if ($addId = $M->add($data)) {
            $this->addContent($addId);
            return array('status' => 1, 'info' => "操作成功", 'url' => U('House/index',array('id'=>$addId )));
        } else {
            return array('status' => 0, 'info' => "操作失败，请刷新页面尝试操作！");
        }
    }

    public function edit() {
        $M = M("House");
        $data = array();
        $data = $this->getHouseData();
        if ($M->save($data)) {
            $this->addContent($data['id']);
            return array('status' => 1, 'info' => "操作成功", 'url' => U('House/index',array('id'=>$data['id'])));
        } else {
            return array('status' => 0, 'info' => "操作失败，请刷新页面尝试操作！");
        }
    }

    public function getHouseData(){
    	$data = array();
        $id = I('id');
        $wuye_type = I('wuye_type');    //物业类型 多选
        $feature = I('feature');    //特色 多选
        $build_type = I('build_type');    //特色 多选

        if($id){
        	$data['id'] = $id;
        }else{
        	//添加
        	$data['create_time'] = NOW_TIME;
        }

        $data['author'] = C('CFG_WEBNAME');
        $data['source'] = '网络';
        $data['name'] = I('title');
        $data['status'] = I('status',2);
        $data['r'] = I('r',2);
        $data['h'] = I('h',2);
        $data['d'] = I('d',2);
        $data['t'] = I('t',2);
        $data['keywords'] = I('keywords');
        $data['description'] = I('description');
        $data['area'] = I('area');
        $data['wuye_type'] = implode(',',$wuye_type);
        $data['feature'] = implode(',',$feature);
        $data['build_type'] = implode(',',$build_type);
        $data['sale_status'] = I('sale_status');
        $data['fitment'] = I('fitment');    //装修程度
        $data['thumb'] = I('thumb');
        $data['price_qj'] = I('price_qj');
        $data['price_jj'] = I('price_jj');

        $data['qq'] = I('qq');

        $data['hushu'] = I('hushu');
        $data['open_time'] = I('open_time','','strtotime');
        $data['close_time'] = I('close_time','','strtotime');
        $data['sale_tell'] = I('sale_tell');
        $data['address'] = $_POST['address'];
        $data['sale_address'] = $_POST['sale_address'];
        $data['developers'] = $_POST['developers'];
        $data['permit'] = $_POST['permit'];
        $data['property'] = $_POST['property'];
        $data['carport'] = $_POST['carport'];
        $data['planning_area'] = $_POST['planning_area'];
        $data['building_area'] = $_POST['building_area'];
        $data['plot_ratio'] = $_POST['plot_ratio'];
        $data['green_rate'] = $_POST['green_rate'];
        $data['wuye_charge'] = $_POST['wuye_charge'];
        $data['wuye_company'] = $_POST['wuye_company'];
        $data['floor'] = $_POST['floor'];
        $data['map'] = $_POST['map'];
        $data['youdian'] = $_POST['youdian'];
        $data['quedian'] = $_POST['quedian'];
        $data['update_time'] = NOW_TIME;
        /*foreach ($data as $key => $val) {
        	if(trim($val)===''){
        		unset($data[$key]);
        	}
        }*/
    	return $data;
    }



	public function detail($where=''){
        $M = M("House");
        $info = $M->where($where)->find();
		return $info;
    }

    public function addContent($id,$data=array()){
        $M = M('HouseContent');
        $data['id'] = $id;
        $data['content'] = $_POST['content'];
        $data['school'] = $_POST['school'];
        $data['hospital'] = $_POST['hospital'];
        $data['bank'] = $_POST['bank'];
        $data['bus'] = $_POST['bus'];
        $data['floor'] = '';

        if($M->where('id='.$id)->count()>0){
            $M->save($data);
        }else{
            $M->add($data);
        }
    }


    /*添加相册*/
    public function addAlbum() {

        if(empty($_FILES)) return array('status' => 0, 'info' => "请选择上传图片！");
        $house_id = I('house_id');
        $type_id = I('category_id');
        $picname = I('picname');

        if(empty($house_id)) return array('status' => 0, 'info' => "该楼盘不存在！");
        if(empty($type_id)) return array('status' => 0, 'info' => "请选择相册分类");

        $M = M("HouseAlbum");

        $img_info = $this->upload($house_id);

        if($img_info['status']==1){
            $data = array();

            $files = array();
            foreach ($img_info['data'] as $key => $val) {
                $files[$key]['name'] = $picname[$key];
                $files[$key]['house_id'] = $house_id;
                $files[$key]['type_id'] = $type_id;
                $files[$key]['path'] = '/Uploads'.$val['savepath'].$val['savename'];
            }
            $Album = M('HouseAlbum');
            $startId = $Album->addAll($files);

            return array('status' => 1, 'info' => "操作成功！", 'url'=>U('House/album',array('house_id'=>$house_id)));
        }else{
            return $img_info;
        }
    }

    public function addAlbum2() {
        /*相册封面，根据自己需求写业务逻辑代码*/
        $house_id=I('post.house_id');
        $category_id=I('post.category_id');
        $cover=I('post.cover');
        /*上传的图片处理，根据自己需求写业务逻辑代码*/
        $album=explode(',',trim(I('post.album'),','));
        foreach($album as $k =>$v){
            if(!in_array($v,$list)){
                $t=explode('+',$v);
                $tmp=explode('/',$t[0]);
                $num=count($tmp)-1;
                $str=$tmp[$num];
                $n[]=array(
                    'title'=>$t[1],
                    'src'=>$t[0],
                    'src_name'=>$str,
                    'src_thumb'=>str_replace($str,'thumb_'.$str,$t[0]),
                    'date'=>NOW_TIME
                );
            }
        }

        $data = array();
        if( !empty($n) ){
            foreach ($n as $key => $val) {
                $data[$key]['house_id'] = $house_id;
                $data[$key]['type_id'] = $category_id;
                $data[$key]['name'] = $val['title'];
                $data[$key]['create_time'] = $val['date'];

                $savepath = '/Uploads/house/'.$house_id.'/';
                my_mkdir($savepath);    //检索目录是否存在，不存在则创建

                rename('.'.$val['src'],'.'.$savepath.$val['src_name']);
                rename('.'.$val['src_thumb'],'.'.$savepath.'/thumb_'.$val['src_name']);
                $data[$key]['path'] = $savepath.$val['src_name'];
            }

            $num = M('HouseAlbum')->addAll($data);
        }
        if($num){
            return array('status' => 1, 'info' => "操作成功！", 'url'=>U('House/album',array('house_id'=>$house_id)));
        }else{
            return array('status' => 0, 'info' => "操作失败！");
        }
    }

    public function editAlbum(){
        $Album = M('HouseAlbum');
        $album_id = I('album_id');
        $house_id = I('house_id');
        $category_id = I('category_id');
        $picname = I('picname');
        $oldpath = I('oldpath');

        if(empty($album_id)) return array('status' => 0, 'info' => "该图片不存在！");
        if(empty($house_id)) return array('status' => 0, 'info' => "该楼盘不存在！");
        if(empty($category_id)) return array('status' => 0, 'info' => "请选择相册分类");
        if(empty($picname)) return array('status' => 0, 'info' => "请输入图片名称");

        $data = array();
        $data['id'] = $album_id;
        $data['house_id'] = $house_id;
        $data['type_id'] = $category_id;
        $data['name'] = $picname;

        if(!empty($_FILES)){
            //$result = $this->upload();
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath  =      '/house/'; // 设置附件上传目录
            $upload->autoSub  = true;
            $upload->subName  = $house_id;  //以楼盘ID为子目录
            $fileinfo   =   $upload->upload();
            $path = $fileinfo['path'];

            if(!$path) {// 上传错误提示错误信息
                return array('status' => 0, 'info' => $upload->getError());
            }else{
                $fullname =  '/Uploads'.$path['savepath'].$path['savename'];
                if(!empty($album_id)){
                    $oldpath = '.'.$Album->where('id='.$album_id)->getField('path');
                    $thumb = get_thumb($oldpath);
                    if(file_exists($oldpath)){
                        unlink($oldpath);
                    }
                    if(file_exists($thumb)){
                        unlink($thumb);
                    }
                }

                if(file_exists('.'.$fullname)){
                    $image = new \Think\Image();
                    $image->open('.'.$fullname);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                    $image->thumb(360, 360)->save('./Uploads'.$path['savepath'].'thumb_'.$path['savename']);
                }

                $data['path'] = $fullname;
            }
        }


       $startId = $Album->save($data);

       return array('status' => 1, 'info' => "操作成功！", 'url'=>U('House/album',array('house_id'=>$house_id)));

    }

    //价格
    public function price() {
        if (IS_POST) {
            $act = $_POST['act'];
            $house_id = $_POST['house_id'];
            if(!$house_id) return false;

            $M = M("HousePrice");

            $data['price'] = $_POST['price'];
            $data['price_time'] = strtotime($_POST['price_time']);
            $data['price_intro'] = $_POST['price_intro'];
            $data['house_id'] = $house_id;
            $data['sort'] = $_POST['sort']?$_POST['sort']:0;


            if ($act == "add") { //添加分类
                if ($M->where('price_time='.$data['price_time'])->count() == 0) {
                    if($M->add($data)){
                        return array('status' => 1, 'info' => ' 操作成功', 'url' => U('house/price', array('time' => time(),'house_id'=>$house_id)) );
                    }else{
                        return array('status' => 0, 'info' => ' 操作失败');
                    }
                } else {
                    return array('status' => 0, 'info' => '该月份的价格已存在！');
                }
            } else if ($act == "edit") { //修改分类
                $data['id'] = $_POST['id'];

                if($M->save($data)){
                    return array('status' => 1, 'info' => ' 已经成功更新');
                }else{
                    return array('status' => 0, 'info' => ' 更新失败');
                }
            } else if ($act == "del") { //删除分类
                $map = array();
                $id = I('id');
                $map['id'] = $id;
                if($M->where($map)->delete()){
                    return array('status' => 1, 'info' => ' 已经成功删除', 'url' => U('house/price', array('time' => time())));
                }else{
                    echo $M->getLastSql();
                    return array('status' => 0, 'info' => ' 删除失败');
                }
            }


        } else {
            $Category = new \Common\Lib\Category('HousePrice', array('id', 'pid', 'name', 'fullname'));
            $list = $Category->getList();//获取分类结构
            foreach ($list as $key => $val) {
                $arr[$val['id']] = $val;
            }
            F('news_category_array',$arr);
            return $arr;
        }
    }

    public function upload($subName=''){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath  =      '/house/'; // 设置附件上传目录
        $upload->autoSub  = true;
        $upload->subName  = $subName;
        $info   =   $upload->upload();

        if(!$info) {// 上传错误提示错误信息
            return array('status' => 0, 'info' => $upload->getError());
        }else{
            /*$filepath = '/Uploads'.$info['savepath'].$info['savename'];
            $image = new \Think\Image();
            $image->open('.'.$filepath);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
            $image->thumb(360, 360)->save('./Uploads'.$info['savepath'].'thumb_'.$info['savename']);*/
            return array('status' => 1, 'info' => '上传成功！', 'data'=>$info);
        }
        exit;
    }

}

?>
