<?php

class ContactsModel extends Model {

    public function contactsList($where='', $firstRow = 0, $listRows = 20) {
        $M = M("Contacts");
		$field = "`id`,`group_id`,`surname`,`name`,`nickname`,`sex`,`phone`,`email`,`address`,`create_time`,`update_time`";
        $list = $M->where($where)->field($field)->order("name DESC")->limit($firstRow , $listRows)->select();
		$groupList = $this->getGroupList();	//获取联系人分组列表
		foreach($groupList as $key=>$val){
			$groupKeyList[$val['id']] = $val;
		}
		unset($groupList);
        foreach ($list as $k => $v) {
			$list[$k]['group'] = $groupKeyList[$v['group_id']]['name'];
			$list[$k]['sex'] = $v['sex']==1 ? '男' : '女';
			$list[$k]['sexClass'] = $v['sex']==1 ? 'icon-sex-man' : 'icon-sex-woman';
        }
        return $list;
    }

	public function getGroupList($where='',$order='',$field=''){
		return $list = M("ContactsGroup")->where($where)->field($field)->order('sort ASC')->select();
	}

	
	
	public function getGroupName($id){
		$ContactsGroup	 =	 M('ContactsGroup');
		$name = $ContactsGroup->where(array('id'=>array('eq',$id)))->getField('name');
		return $name;
	}
	
	public function addGroup(){
		$M = M("ContactsGroup");
		$id		= $_POST['id'];
		$data['name']	= $_POST['name'];
		$data['sort']	= !empty($_POST['sort']) ? $_POST['sort'] : 0;
		if(empty($id)){
			$addId = $M->add($data);
			if(!empty($addId)){
				return array('status' => 1, 'info' =>'添加成功！');
			}else{
				return array('status' => 0, 'info' =>'添加失败');
			}
		}else{
			$M->where('id='.$id)->save($data);
			return array('status' => 1, 'info' =>'更新成功！');
		}
	}
	
	public function importExcel(){
		$dbName = $this->db_contacts;
		$fieldList = array(
			'surname'=>'姓',
			'name'=>'名字',
			'nickname'=>'昵称',
			'sex'=>'性别',
			'phone'=>'电话'
		);
		
		if(IS_POST){
			$insertNum = R('Excel/importExcel',array($dbName,$fieldList));
			$insertNum = $insertNum ? $insertNum : 0;
			$this->ajaxReturn($insertNum,'成功导入'.$insertNum.'条数据！',1);
		}else{
			$this->display();
		}
			
	}
}

?>
