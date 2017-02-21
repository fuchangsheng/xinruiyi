<?php
namespace Admin\Model;
use Think\Model;
class SpecialModel extends Model {
    protected $tableName = 'Special';

    public function listSpecial($where='', $firstRow = 0, $listRows = 20) {
        $M = M("Special");
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
            $list[$key]['url'] = getSpecialUrl($val['id']);
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

 

    public function add() {
        $M = M("Special");
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
        $data['company'] = I('company');
        $data['update_time'] = NOW_TIME;
        $data['create_time'] = NOW_TIME;
        $data['content'] = $_POST['content'];

        if ($id = $M->add($data)) {
            return array('status' => 1, 'info' => "已经发布", 'url' => U('Special/index'));
        } else {
            return array('status' => 0, 'info' => "发布失败，请刷新页面尝试操作");
        }
    }

    public function edit() {
        $M = M("Special");
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
        $data['company'] = I('company');
        $data['content'] = $_POST['content'];
        $data['update_time'] = NOW_TIME;

        if ($M->save($data)) {
            return array('status' => 1, 'info' => "成功更新专题！", 'url' => U('Special/index',array('cid'=>$data['cid'])));
        } else {
            return array('status' => 0, 'info' => "更新失败，请刷新页面尝试操作！");
        }
    }

}

?>
