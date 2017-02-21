<?php
namespace Admin\Model;
use Think\Model;
class MenuModel extends Model {
    protected $tableName = 'Menu';

    public function getList() {
        $M = M($this->tableName);
        $list = $M->where()->order('pid ASC, sort ASC')->select();
        foreach ($list as $key => $val) {
            $newList[$val['id']] = $val;
        }
        return $newList;
    }

    public function getTree(){
        $M = M($this->tableName);
        $list = $M->where('status=1')->order('pid ASC, sort ASC')->select();

        foreach ($list as $key => $val) {
            if($val['pid']==0){
                $tree[$val['id']] = $val;
            }else{
                $tree[$val['pid']]['sub'][$val['id']] = $val;
            }
        }
        return $tree;
    }

    public function getInfo(){

    }

    public function getWhere($map,$num=1){
        $M = M($this->tableName);
        $list = $M->where($map)->limit($num)->select();
        if($num==1){
            return $list[0];
        }
        return $list;
    }

    public function getPid($controller,$action){
        $M = M($this->tableName);
        $map['controller'] = $controller;
        $map['action'] = $action;

        $info = $M->where($map)->find();
        if($info['pid']==0){
            return $info['id'];
        }else{
            return $info['pid'];
        }
    }

    public function addMenu(){
        if(IS_POST){
            $Menu = M('Menu');
            $data = $_POST['data'];
            if( empty($data['id']) ){
                $data['model'] = 'Admin';
                if($addId = $Menu->add($data)){
                    return $result = array('status'=>1, 'info'=>'操作成功！', 'url'=>'');
                }else{
                    return $result = array('status'=>0, 'info'=>'操作失败！');
                }
            }else{
                $updateNum = $Menu->save($data);
                return $result = array('status'=>1, 'info'=>'操作成功！');
            }
        }
    }
}
?>
