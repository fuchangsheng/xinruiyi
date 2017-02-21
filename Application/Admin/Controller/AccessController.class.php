<?php
namespace Admin\Controller;
use Think\Controller;
class AccessController extends CommonController {

    /**
     * 管理员列表
     */
    public function index() {
        $this->assign("list", D("Access")->adminList());
        $this->display();
    }

    public function roleList() {
        
        $this->assign("list", D("Access")->roleList());
        $this->display();
    }

    public function addRole() {
        $id = I('get.id',0);
        if (IS_POST) {
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Access")->addRole());
        } else {
            $M = M('AuthGroup');
            if($id){
                $info = $M->where('id='.$id)->find();
                $this->assign('info',$info);
            }
            $this->display("editrole");
        }
    }


    public function opNodeStatus() {
        header('Content-Type:application/json; charset=utf-8');
        echo json_encode(D("Access")->opStatus("AuthRule"));
    }

    public function opRoleStatus() {
        header('Content-Type:application/json; charset=utf-8');
        echo json_encode(D("Access")->opStatus("AuthGroup"));
    }



    /*
        节点列表
     */
    public function nodeList() {
        $this->assign("list", D("Access")->nodeList());
        $this->display();
    }

    public function addNode() {
        $id = I('id');
        if (IS_POST) {
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Access")->addNode($id));
            exit;
        }

        $M = M('AuthRule');
        if($id){
            $info = $M->where('id='.$id)->find();
            $this->assign('info',$info);
        }
        $this->assign("list", D("Access")->nodeList());
        $this->display("editnode");
    }

    public function delNode(){
        $AuthRule = M('AuthRule');
        $id = I('get.id');
        $AuthRule->where( array('id'=>$id) )->delete();
        echo json_encode( array('status'=>1,'info'=>'删除成功！') );
        exit;
    }

    /**
     * 添加管理员
     */
    public function addAdmin() {
        $id = I('get.id');

        if (IS_POST) {
            header('Content-Type:application/json; charset=utf-8');
            if($id){
                echo json_encode(D("Access")->editAdmin());
            }else{
                echo json_encode(D("Access")->addAdmin());
            }
        } else {
            $M = M('Admin');
            if($id){
                $info = $M->where('id='.$id)->find();
            }else{
                $info = array();
            }

            $this->assign("info", $info);
            $this->display();
        }
    }

    public function changeRole() {
        header('Content-Type:application/json; charset=utf-8');
        if (IS_POST) {
            $result = D("Access")->changeRole();
            $this->ajaxReturn($result);
        }

        $id = I('get.id');

        $nodeList = D("Access")->nodeList();
        $this->assign("nodeList", $datas);

        $tree_list = list_to_tree($nodeList,$pk='id',$pid='pid',$child='_child',$root=0);
        $this->assign('tree_list',$tree_list);

        $AuthGroup = M('AuthGroup');
        $rules = $AuthGroup->where( array('id'=>$id) )->getField('rules');
        $this->assign('rules',json_encode(explode(',',$rules)));
        /*print_r($tree_list[0]);
        exit;*/
        $this->display();
    }

    /**
     * 添加管理员
     */
    public function editAdmin() {
        if (IS_POST) {
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Access")->editAdmin());
        } else {
            $M = M("Admin");
            $id = I('id');
            $pre = C("DB_PREFIX");
            $info = $M->find($id);
            if (empty($info['id'])) {
                $this->error("不存在该管理员ID", U('Access/index'));
            }
            if ($info['email'] == C('ADMIN_AUTH_KEY')) {
                $this->error("超级管理员信息不允许操作", U("Access/index"));
                exit;
            }
            //$this->assign("info", $this->getRoleListOption($info));
            $this->assign("info", $info);
            $this->assign('role_list',F('admin_role_list'));
            $this->display("addadmin");
        }
    }

    private function getRole($info = array()) {
        import("Category");
        $cat = new Category('Role', array('id', 'pid', 'name', 'fullname'));
        $list = $cat->getList();               //获取分类结构
        foreach ($list as $k => $v) {
            $disabled = $v['id'] == $info['id'] ? ' disabled="disabled"' : "";
            $selected = $v['id'] == $info['pid'] ? ' selected="selected"' : "";
            $info['pidOption'].='<option value="' . $v['id'] . '"' . $selected . $disabled . '>' . $v['fullname'] . '</option>';
        }
        return $info;
    }

     private function getRoleListOption($info = array()) {
        $M = M('AuthGroup');
        $list = $M->where()->select();
        $info['roleOption'] = "";
        foreach ($list as $v) {
            $disabled = $v['id'] == 1 ? ' disabled="disabled"' : "";
            $selected = $v['id'] == $info['role_id'] ? ' selected="selected"' : "";
            $info['roleOption'].='<option value="' . $v['id'] . '"' . $selected . $disabled . '>' . $v['title'] . '</option>';
        }

        return $info;
    }

    private function getPid($info) {
        $arr = array("请选择", "项目", "模块", "操作");
        for ($i = 1; $i < 4; $i++) {
            $selected = $info['level'] == $i ? " selected='selected'" : "";
            $info['levelOption'].='<option value="' . $i . '" ' . $selected . '>' . $arr[$i] . '</option>';
        }
        $level = $info['level'] - 1;
        import("Category");
        $cat = new \Common\Lib\Category('AuthRule', array('id', 'pid', 'title', 'fullname'));
        $list = $cat->getList();               //获取分类结构
        $option = $level == 0 ? '<option value="0" level="-1">根节点</option>' : '<option value="0" disabled="disabled">根节点</option>';
        foreach ($list as $k => $v) {
            $disabled = $v['level'] == $level ? "" : ' disabled="disabled"';
            $selected = $v['id'] != $info['pid'] ? "" : ' selected="selected"';
            $option.='<option value="' . $v['id'] . '"' . $disabled . $selected . '  level="' . $v['level'] . '">' . $v['fullname'] . '</option>';
        }
        $info['pidOption'] = $option;
        return $info;
    }


    //修改排序
    public function opRule() {
        $AuthRule = M("AuthRule");

        $id   = $_POST['id'];
        $fd = $_POST['fd'];
        $data[$fd] = $_POST['value'];

        if ($AuthRule->where( array('id'=>$id) )->save($data)) {
            echo json_encode(array('status' => 1, 'info' => "处理成功"));
        } else {
            echo json_encode(array('status' => 0, 'info' => "处理失败"));
        }
    }

}