<?php
namespace Admin\Model;
use Think\Model;
class NavModel extends Model {
    public function nav() {
        if (IS_POST) {
			$this->makeNavCache();
            $act = $_POST['act'];
            $data = $_POST['data'];
            $data['name'] = addslashes($data['name']);
            $M = M("Nav");
            if ($act == "add") { //添加导航
                unset($data['cid']);
                if ($M->where($data)->count() == 0) {
                    return ($M->add($data)) ? array('status' => 1, 'info' => '导航 ' . $data['name'] . ' 已经成功添加到系统中', 'url' => U('Block/nav', array('time' => time()))) : array('status' => 0, 'info' => '导航 ' . $data['name'] . ' 添加失败');
                } else {
                    return array('status' => 0, 'info' => '系统中已经存在导航' . $data['name']);
                }
            } else if ($act == "edit") { //修改导航
                if (empty($data['name'])) {
                    unset($data['name']);
                }
                if ($data['pid'] == $data['cid']) {
                    unset($data['pid']);
                }
                return ($M->save($data)) ? array('status' => 1, 'info' => '导航 ' . $data['name'] . ' 已经成功更新', 'url' => U('Block/nav', array('time' => time()))) : array('status' => 0, 'info' => '导航 ' . $data['name'] . ' 更新失败');
            } else if ($act == "del") { //删除导航
                unset($data['pid'], $data['name']);
                return ($M->where($data)->delete()) ? array('status' => 1, 'info' => '导航 ' . $data['name'] . ' 已经成功删除', 'url' => U('Block/nav', array('time' => time()))) : array('status' => 0, 'info' => '导航 ' . $data['name'] . ' 删除失败');
            }
        } else {
            import("Category");
            $cat = new Category('Nav', array('id', 'pid', 'name', 'fullname'));
            return $cat->getList();               //获取导航结构
        }
    }
	
	
	public function getNavList($pid=0){
		$Nav = M('Nav');
		$where['pid'] = $pid;
		$where['status'] = 1;
		$navList = $Nav->where('pid='.$pid)->order('sort')->select();
		foreach($navList as $key=>$val){
			$subNavNum = $Nav->where('pid='.$val['id'])->count();
			if( !empty($subNavNum) ){
				$navList[$key]['subNav'] = $this->getSubNav($val['id']);
			}
		}
		return $navList;
	}
	
	private function getSubNav($pid){
		$Nav = M('Nav');
		$where['pid'] = $pid;
		$where['status'] = 1;
		$list = $Nav->where('pid='.$pid)->order('sort')->select();
		foreach($list as $key=>$val){
			$subNavNum = $Nav->where('pid='.$val['id'])->count();
			if( !empty($subNavNum) ){
				$list[$key]['subNav'] = $this->getSubNav($val['id']);
			}
		}
		return $list;
	}
	
	public function makeNavCache(){
		$navList = $this->getNavList();
		F('navCache',$navList);
	}
}

?>
