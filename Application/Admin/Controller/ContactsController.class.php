<?php
// 后台用户模块
class ContactsAction extends CommonAction {
	public function index(){
		$Contacts = M('Contacts');
		$keyword	= $_GET['keyword'] ? trim($_GET['keyword']) : '';
		$group_id	= $_GET['group_id'] ? intval($_GET['group_id']) : 0;

		if(!empty($keyword)){
			$where['name'] = array('like','%'.$keyword.'%');
		}
		if(!empty($group_id)){
			$where['group_id'] = $group_id;
		}
		import('ORG.Util.Page');
		$count      = $Contacts->where($where)->count();
		$Page       = new Page($count,20);
		$show       = $Page->show();
		$list = D("Contacts")->contactsList($where, $Page->firstRow, $Page->listRows);

		$this->assign('groupList',D("Contacts")->getGroupList());// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('currentNav','通讯录管理 > 联系人列表');
		$this->display('contacts'); // 输出模板

	}

	public function detail(){
		$info = $this->info();
		$info['sex'] = $info['sex']==0 ? '女' : '男';
		$this->assign('info',$info);
		$this->display();
	}

	public function addContacts(){
		$this->assign('yearArray',yearArray());
		$this->assign('monthArray',monthArray());
		$this->assign('dayArray',dayArray());
		$this->assign('groupList',D("Contacts")->getGroupList());// 赋值数据集
		$this->assign('provinceList',R('Area/getProvinceList'));
		if(IS_POST){
			$Contacts = M('Contacts');
			$data = $_POST['info'];
			$data['name'] = $data['surname'].$data['name'];
			$data['update_time'] = time();
			$Contacts->create($data);
			if(!empty($data['id'])){
				$updateId = $Contacts->save($data);
				if(isset($updateId)){
					$this->ajaxReturn($updateId,'更新成功！',1);
				}
			}else{
				$data['create_time'] = time();
				$newId = $Contacts->add($data);
				if(isset($newId)){
					$this->ajaxReturn($newId,'添加成功！',1);
				}else{
					$this->ajaxReturn(0,'添加失败！',0);
				}
			}
		}else{
			if(!empty($_GET['id'])){
				$info = $this->info('Contacts');
				$info['name'] = preg_replace("/^".$info['surname']."/", '', $info['name']);		//去掉姓

				$provinceId = $info['province'];
				$cityId = $info['city'];
				$this->assign('actionName','编辑联系人');
				$this->assign('cityList',R('Area/getCityList',array('pid'=>$info['province'])));
				$this->assign('areaList',R('Area/getAreaList',array('cid'=>$info['city'])));
				$this->assign('info',$info);
			}else{
				$this->assign('actionName','添加联系人');
			}
		}

		$this->display();
	}

	public function saveContacts(){
		$Contacts = M('Contacts');
		$_POST['name'] = $_POST['surname'].$_POST['name'];
		$_POST['create_time'] = time();
		$Contacts->create();
		if(!empty($_POST['id'])){
			$updateId = $Contacts->save();
			if(isset($updateId)){
				$this->ajaxReturn($updateId,'更新成功！',1);
			}
		}else{
			$newId = $Contacts->add();
			if(isset($newId)){
				$this->ajaxReturn($newId,'添加成功！',1);
			}else{
				$this->ajaxReturn(0,'添加失败！',0);
			}
		}
	}

	public function delContacts(){
		$Contacts = M('Contacts');
		$id = $_REQUEST['id'];
		$where['id'] = array('in',$id);
		$delNum = $Contacts->where($where)->delete();
		if(!empty($delNum)){
			$this->ajaxReturn($delNum,'成功删除'.$delNum.'条数据！',1);
		}else{
			$this->ajaxReturn(0,'删除失败！',0);
		}
	}

	//移动分组
	public function moveGroup(){

		if(IS_GET && $_GET['action']=='moveGroup'){
			$Contacts = M('Contacts');
			$ContactsGroup = M('ContactsGroup');
			$idStr		= $_REQUEST['idStr'];
			$groupId	= $_REQUEST['groupId'];
			$map['id']  = array('in',$idStr);
			$updateNum = $Contacts->where( $map )->setField('group_id',$groupId);
			$groupName = $ContactsGroup->where('id='.$groupId)->getField($groupId);

			if( $updateNum > 0 ){
				$this->ajaxReturn(1,'成功移动'.$updateNum.'条数据到<span class="red">'.$groupName.'</span>组！',1);
			}else{
				$this->ajaxReturn(0,'移动失败！',0);
			}
		}else{
			$Contacts = M('Contacts');
			$idStr = $_REQUEST['idArr'];	//JS的数组在PHP中会成为","分割的字符串
			$groupList =  D('Contacts')->getGroupList();
			$contactsList = $Contacts->where(array('id'=>array('in',$idStr)))->select();
			$this->assign('idStr',$idStr);
			$this->assign('groupList',$groupList);
			$this->assign('contactsList',$contactsList);
			$this->display();
		}

	}

	public function group(){
		$this->assign('groupList',D("Contacts")->getGroupList());
		$this->display();
	}

	public function addGroup(){
		if(IS_POST){
			$result = D('Contacts')->addGroup();
			echo json_encode($result);
		}
	}

}