<?php
namespace Admin\Model;
use Think\Model;
class AccessModel extends Model {

    public function nodeList() {
        $Category = new \Common\Lib\Category('AuthRule', array('id', 'pid', 'title', 'fullname'));
        $list = $Category->getList('',0,'sort ASC');
        return $list;
    }

    public function roleList() {
        $M = M("AuthGroup");
        $role = $M->where()->order('id ASC')->select();
        $list = array();
        foreach ($role as $k => $v) {
            $list[$v['id']] = $v;
            $list[$v['id']]['statusTxt'] = $v['status'] == 1 ? "启用" : "禁用";
            $list[$v['id']]['chStatusTxt'] = $v['status'] == 0 ? "启用" : "禁用";
        }

        F('admin_role_list',$list);

        return $list;
    }

    public function opStatus($op = 'Node') {
        $M = M("$op");
        $datas['id'] = (int) $_GET["id"];
        $datas['status'] = $_GET["status"] == 1 ? 0 : 1;
        if ($M->save($datas)) {
            return array('status' => 1, 'info' => "处理成功", 'data' => array("status" => $datas['status'], "txt" => $datas['status'] == 1 ? "禁用" : "启动"));
        } else {
            return array('status' => 0, 'info' => "处理失败");
        }
    }

    public function editNode() {
        $M = M("Node");
        return $M->save($_POST) ? array('status' => 1, info => '更新节点信息成功', 'url' => U('Access/nodeList')) : array('status' => 0, info => '更新节点信息失败');
    }

    /*
        添加节点
     */
    public function addNode($id=0) {
        $AuthRule = M("AuthRule");
        $data = I('post.data');

        if( empty($data['title'])||empty($data['pid']) ){
            return array('status' =>0, 'info' => "参数错误！");
        }
        $pLevel = $AuthRule->where( array('id'=>$data['pid']) )->getField('level');
        $data['level'] = $pLevel+1;

        if($data['level']>2){
            if( empty($data['c_name']) ){
                return array('status' =>0, 'info' => "控制器名称不能为空！");
            }
            if( empty($data['a_name']) ){
                return array('status' =>0, 'info' => "操作名称不能为空！");
            }
        }else{
            $data['c_name'] = '';
            $data['a_name'] = '';
        }


        if($id){
            $AuthRule->where( array('id'=>$id) )->save($data);
        }else{
            $AuthRule->add($data);
        }
        return array('status' => 1, 'info' => "操作成功！", 'url' => U("Access/nodeList"));
    }

    /**
     * 管理员列表
     */
    public function adminList() {
        $list = M("Admin")->select();
        foreach ($list as $k => $v) {
            $list[$k]['statusTxt'] = $v['status'] == 1 ? "启用" : "禁用";
			 $list[$k]['roleName'] = get_role_name($v['role_id']);
        }
        return $list;
    }

    /**
     * 添加管理员
     */
    public function addAdmin() {
        $datas = array();
        $M = M("Admin");
        $datas['username'] = trim($_POST['username']);
        if ($M->where("`username`='" . $datas['username'] . "'")->count() > 0) {
            return array('status' => 0, 'info' => "已经存在该账号");
        }
        $data['nickname'] = I('post.nickname');
        $data['company'] = I('post.company');
        $data['email'] = I('post.email');
        $data['phone'] = I('post.phone');
        $data['address'] = I('post.address');

        $datas['password'] = password(trim($_POST['password']));
        $datas['create_time'] = NOW_TIME;
        $datas['update_time'] = NOW_TIME;
        $datas['status'] = 1;
        $datas['admin'] = 1;

        $role_id = I('post.role_id');
        if ($addId = $M->add($datas)) {
            M("AuthGroupAccess")->add(array('uid' => $addId, 'group_id' => $role_id));
            return array('status' => 1, 'info' => '账号已开通，请通知相关人员', 'url' => '/admin.php/access/index/');
        } else {
            return array('status' => 0, 'info' => "添加新账号失败，请重试");
        }
    }

    /**
     * 添加管理员
     */
    public function editAdmin() {
        $M = M("Admin");
        $user_id = I('id');
        $role_id = I('role_id');
        $status = I('status');
        $remark = $_POST['remark'];
        $pwd = I('pwd','',trim);

        $data = array();
        if(!empty($pwd)){
            $data['password'] = password($pwd);
        }

        $data['id'] = $user_id;
        $data['role_id'] = $role_id;
        $data['nickname'] = I('post.nickname');
        $data['company'] = I('post.company');
        $data['email'] = I('post.email');
        $data['phone'] = I('post.phone');
        $data['address'] = I('post.address');
        $data['status'] = $status;
        $data['remark'] = $remark;
        if(!$M->create($data)){
            //exit($M->getError());
            return array('status' => 0, 'info' => $M->getError());
        }else{
            $n = $M->save($data);
            return array('status' => 1, 'info' => "操作成功！", 'url' => U("Access/index"));
        }

    }

    /**
     * 添加管理员
     */
    public function editRole() {
        $M = M("Role");
        if ($M->save($_POST)) {
            return array('status' => 1, 'info' => "成功更新", 'url' => U("Access/roleList"));
        } else {
            return array('status' => 0, 'info' => "更新失败，请重试");
        }
    }

    /**
     * 添加管理员
     */
    public function addRole() {
        $M = M('AuthGroup');
        $id = I('post.id',0);
        $data = array();
        $data['title'] = I('title');
        $data['status'] = I('status');
        $data['sort'] = I('sort');
        $data['describe'] = I('describe');

        if($id){
            $data['id'] = $id;
            $M->save($data);
        }else{
            $M->add($data);
        }
        return array('status' => 1, 'info' => "操作成功！", 'url' => U("Access/roleList"));
    }

    public function changeRole() {
        $id = I('post.id'); //角色ID
        $idArr = I('post.ids');

        if(!empty($idArr)){
            $ids = implode(',', $idArr);
        }

        $data['rules'] = $ids;


        $AuthGroup = M('AuthGroup');
        $AuthGroup->where( array('id'=>$id) )->save($data);
        return array('status' => 1, 'info' => "操作成功！", 'url' => U('access/rolelist'));
    }


	public function getUserRole(){
		$Role = M("AuthGroup");
		$RoleUser = M("AuthGroupAccess");

		$roleList = $Role->field('id,title')->select();
		foreach($roleList as $key=>$val){
			$roleArr[$val['id']] = $val['title'];
		}
		unset($roleList);

		$roleUserList = $RoleUser->select();
		foreach($roleUserList as $key=>$val){
			$list[$val['user_id']] = $roleArr[$val['role_id']];
		}
		unset($roleUserList);
		unset($roleArr);
		return $list;
	}

}

?>
