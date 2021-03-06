<?php
namespace Admin\Model;
use Think\Model;
class ProductModel extends Model {
    protected $tableName = 'Product';

    public function listProduct($where='', $firstRow = 0, $listRows = 20) {
        $M = M("Product");
        $statusArr = array("<span class=\"red\">待审核</span>", "<span class=\"blue\">已审核</span>");
        $aidArr = M("Admin")->field("`aid`,`email`,`nickname`")->select();


        $list = $M->where($where)->field("`id`,`title`,`status`,`create_time`,`cid`,`aid`")->order("`id` DESC")->limit("$firstRow , $listRows")->select();

        foreach ($aidArr as $k => $val) {
            $val['url'] = getHouseUrl($val['id']);
            $val['thumb'] = C('IMG_PATH').($val['thumb']);
            $aids[$val['aid']] = $val;
        }
        unset($aidArr);
        $cidArr = M("Category")->field("`cid`,`name`")->select();
        foreach ($cidArr as $k => $v) {
            $cids[$v['cid']] = $v;
        }
        unset($cidArr);
        foreach ($list as $k => $v) {
            $list[$k]['aidName'] = $aids[$v['aid']]['nickname'] == '' ? $aids[$v['aid']]['email'] : $aids[$v['aid']]['nickname'];
            $list[$k]['cidName'] = $cids[$v['cid']]['name'];
			$list[$k]['statusName'] = $statusArr[$v['status']];
        }
        return $list;
    }

    public function getWhere($map=array(),$limit=10){
        $M = M($this->tableName);
        $list = $M->where($map)->field('content',true)->order("`id` DESC")->limit($limit)->select();
        foreach ($list as $key => $val) {
            $list[$key]['url'] = getProductUrl($val['id']);
            $list[$key]['thumb'] = C('IMG_PATH').$val['thumb'];
        }
        return $list;
    }

    public function getInfo($id){
        $M = M($this->tableName);
        $id = !empty($id) ? $id : I('id');
        $info = $M->find($id);
        $info['thumb'] = !empty($info['thumb']) ? '/Uploads'.$info['thumb'] : '';
        return $info;
    }

    public function category() {
        if (IS_POST) {
            $act = $_POST['act'];
            $data = $_POST['data'];
            $data['name'] = addslashes(trim($data['name']));
            $M = M("ProductCategory");
            if ($act == "add") { //添加分类
                unset($data['id']);
                if ($M->where($data)->count() == 0) {
                    return ($M->add($data)) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功添加到系统中', 'url' => U('Product/category', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 添加失败');
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
                return ($M->save($data)) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功更新', 'url' => U('Product/category', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 更新失败');
            } else if ($act == "del") { //删除分类
                unset($data['pid'], $data['name']);
                return ($M->where($data)->delete()) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功删除', 'url' => U('Product/category', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 删除失败');
            }
        } else {
            $Category = new \Common\Lib\Category('ProductCategory', array('id', 'pid', 'name', 'fullname'));
            $list = $Category->getList();//获取分类结构
            foreach ($list as $key => $val) {
                $arr[$val['id']] = $val;
            }
            F('product_category_array',$arr);
            return $arr;
        }
    }

    public function texture() {
        if (IS_POST) {
            $act = $_POST['act'];
            $data = $_POST['data'];
            $data['name'] = addslashes(trim($data['name']));
            $M = M("ProductTexture");
            if ($act == "add") { //添加分类
                unset($data['id']);
                if ($M->where($data)->count() == 0) {
                    return ($M->add($data)) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功添加到系统中', 'url' => U('Product/texture', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 添加失败');
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
                return ($M->save($data)) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功更新', 'url' => U('Product/texture', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 更新失败');
            } else if ($act == "del") { //删除分类
                unset($data['pid'], $data['name']);
                return ($M->where($data)->delete()) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功删除', 'url' => U('Product/texture', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 删除失败');
            }
        } else {
            $Category = new \Common\Lib\Category('ProductTexture', array('id', 'pid', 'name', 'fullname'));
            $list = $Category->getList();//获取分类结构
            foreach ($list as $key => $val) {
                $arr[$val['id']] = $val;
            }
            F('product_texture_array',$arr);
            return $arr;
        }
    }

    public function price() {
        if (IS_POST) {
            $act = $_POST['act'];
            $data = $_POST['data'];
            $data['name'] = addslashes(trim($data['name']));
            $M = M("ProductPrice");
            if ($act == "add") { //添加分类
                unset($data['id']);
                if ($M->where($data)->count() == 0) {
                    return ($M->add($data)) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功添加到系统中', 'url' => U('Product/price', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 添加失败');
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
                return ($M->save($data)) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功更新', 'url' => U('Product/price', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 更新失败');
            } else if ($act == "del") { //删除分类
                unset($data['pid'], $data['name']);
                return ($M->where($data)->delete()) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功删除', 'url' => U('Product/price', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 删除失败');
            }
        } else {
            $Category = new \Common\Lib\Category('ProductPrice', array('id', 'pid', 'name', 'fullname'));
            $list = $Category->getList();//获取分类结构
            foreach ($list as $key => $val) {
                $arr[$val['id']] = $val;
            }
            F('product_price_array',$arr);
            return $arr;
        }
    }

    public function add() {
        $M = M("Product");
        $data['user_id'] = $_SESSION['user_id'];
        $data['status'] = I('status');
        $data['r'] = I('r',2);
        $data['h'] = I('h',2);
        $data['t'] = I('t',2);
        $data['title'] = I('title');
        $data['keywords'] = I('keywords');
        $data['description'] = I('description');
        $data['category_id'] = I('category_id');
        $data['thumb'] = I('thumb');
        $data['clicks'] = I('clicks');
        $data['url'] = I('url');
        $data['update_time'] = NOW_TIME;
        $data['create_time'] = NOW_TIME;

        if ($id = $M->add($data)) {
            $M->where('id='.$id)->setField('code','JW'.str_pad($id,6,'0',STR_PAD_LEFT));
            $this->addContent($id);
            return array('status' => 1, 'info' => "已经发布", 'url' => U('Product/index'));
        } else {
            return array('status' => 0, 'info' => "发布失败，请刷新页面尝试操作");
        }
    }

    public function edit() {
        $M = M("Product");
        $data['id'] = I('id');
        $data['status'] = I('status');
        $data['r'] = I('r',2);
        $data['h'] = I('h',2);
        $data['t'] = I('t',2);
        $data['title'] = I('title');
        $data['keywords'] = I('keywords');
        $data['description'] = I('description');
        $data['category_id'] = I('category_id');

        $data['thumb'] = I('thumb');
        $data['clicks'] = I('clicks');
        $data['url'] = I('url');
        $data['update_time'] = NOW_TIME;

        if ($M->save($data)) {
            $this->addContent($data['id']);
            return array('status' => 1, 'info' => "操作成功！！", 'url' => U('Product/index',array('cid'=>$data['cid'])));
        } else {
            return array('status' => 0, 'info' => "更操作失败，请刷新页面尝试操作！");
        }
    }

    public function addContent($id=0){
        if(!$id) return false;
        $M = M('ProductContent');
        $data = array();
        $info = $M->where( array('id'=>$id) )->find();
        if(empty($info)){
            $data['id'] = $id;
            $data['content'] = $_POST['content'];
            $M->add($data);
        }else{
            $M->content = $_POST['content'];
            $M->where( array('id'=>$id) )->save();
        }
    }

	public function detail($where=''){
        $M = M("Product");
        $info = $M->where($where)->find();
		return $info;
    }


    public function getCategoryList(){
       $Category = M('ProductCategory');
       $map = array();
       $map['status'] = 1;
       $list = $Category->where($map)->order()->limit()->select();

        return $list;
    }

}

?>
