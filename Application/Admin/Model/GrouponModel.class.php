<?php
namespace Admin\Model;
use Think\Model;
class GrouponModel extends Model {
    protected $tableName = 'Groupon';

    public function listGroupon($where='', $firstRow = 0, $listRows = 20) {
        $M = M("Groupon");
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
            $list[$key]['url'] = getGrouponUrl($val['id']);
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
        $M = M("Groupon");
        $data = array();
        $data['create_time'] =  NOW_TIME;
        $data['update_time'] =  NOW_TIME;
        $data['user_id'] = session('user_id');

        $data['house_id'] = I('house_id');
        $data['house_name'] = I('house_name');
        $data['title'] = I('title');
        $data['status'] = I('status');
        //$data['price_jj'] = I('price_jj');    //直接获取楼盘价格
        $data['price_tg'] = I('price_tg');
        $data['buy_num'] = I('buy_num');
        $data['end_time'] = strtotime($_POST['end_time']);
        $data['cuxiao'] = I('cuxiao');
        $data['zhekou'] = I('zhekou');
        $data['liquan'] = I('liquan');
        $data['keywords'] = I('keywords');
        $data['description'] = I('description');

        if ($M->add($data)) {
            return array('status' => 1, 'info' => "已经发布", 'url' => U('Groupon/index'));
        } else {
            return array('status' => 0, 'info' => "发布失败，请刷新页面尝试操作");
        }
    }

    public function edit() {
        $M = M("Groupon");
        $data = array();
        $update_time = I('update_time');
        $data['update_time'] = !empty($update_time) ? strtotime($update_time) : NOW_TIME;
        $data['user_id'] = session('user_id');

        $data['id'] = I('id');
        $data['house_id'] = I('house_id');
        $data['house_name'] = I('house_name');
        $data['title'] = I('title');
        $data['status'] = I('status');
        $data['price_tg'] = I('price_tg');
        $data['buy_num'] = I('buy_num');
        $data['end_time'] = strtotime($_POST['end_time']);
        $data['cuxiao'] = I('cuxiao');
        $data['zhekou'] = I('zhekou');
        $data['liquan'] = I('liquan');
        $data['keywords'] = I('keywords');
        $data['description'] = I('description');
        if ($M->save($data)) {
            return array('status' => 1, 'info' => "成功更新！", 'url' => U('Groupon/index',array('cid'=>$data['cid'])));
        } else {
            return array('status' => 0, 'info' => "更新失败，请刷新页面尝试操作！");
        }
    }

	public function detail($where=''){
        $M = M("Groupon");
        $info = $M->where($where)->find();
		return $info;
    }



    public function upload(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  './Uploads/userfiles/'.date('Ymd').'/';// 设置附件上传目录
        $upload->thumb = true;
        $upload->thumbMaxWidth = '50,200';
        $upload->thumbMaxHeight = '50,200';

        if(!$upload->upload()) {// 上传错误提示错误信息
            $error = $upload->getErrorMsg();
            return false;
        }else{// 上传成功 获取上传文件信息
            return $filesInfo =  $upload->getUploadFileInfo();
        }
    }

}

?>
