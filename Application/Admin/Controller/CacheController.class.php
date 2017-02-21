<?php
namespace Admin\Controller;
use Think\Controller;
class CacheController extends CommonController {
    public function index(){

    	if(IS_POST){
    		$this->cacheAdminMenu();
            $this->cacheAdminArr();
            $this->cacheAdminRoleList();
    		$this->cacheHouseCategory();
    		$result = array('status'=>1, 'info'=>'更新完成！');
    		echo json_encode($result);
    		exit;
    	}else{
            $info = array();
            $path = RUNTIME_PATH . "Data/admin_menu.php";
            $mtime = get_file_info($path,'mtime');
            $info['admin_menu'] = date('Y-m-d H:i:s',$mtime);

            $path = RUNTIME_PATH . "Data/admin_list.php";
            $mtime = get_file_info($path,'mtime');
            $info['admin_list'] = date('Y-m-d H:i:s',$mtime);

            $this->assign('info',$info);
        }
        $this->display();
    }

    public function cacheAdminMenu(){
        $menu_tree = D('Menu')->getTree();
    	$menu_list = D('Menu')->getList();
        F('admin_menu',$menu_tree);
        F('menu_list',$menu_list);
    }

    public function cacheAdminArr(){
    	$M = M('Admin');
    	$list = $M->where()->limit(1000)->select();
    	foreach ($list as $key => $val) {
    		$arr[$val['id']] = $val;
    	}
    	F('admin_list',$arr);
    	unset($list,$arr);
    	return 1;
    }

    public function cacheAdminRoleList(){
        $M = M('AuthGroup');
        $list = $M->where()->limit(1000)->select();
        foreach ($list as $key => $val) {
            $arr[$val['id']] = $val;
        }
        F('admin_role_list',$arr);
        unset($list,$arr);
        return 1;
    }

    //更新楼盘的分类信息
    public function cacheHouseCategory(){
        $M = M('HouseCategory');
        $list = $M->where()->order('pid ASC,sort ASC')->limit(1000)->select();
        $arr = array();
        $house_category_array = array();
        foreach ($list as $key => $val) {
            if($val['pid']==0){
                $arr[$val['id']] = $val;
            }else{
                $arr[$val['pid']]['sub'][] = $val;
            }
            $house_category_array[$val['id']] = $val;
        }
        F('house_category_tree',$arr);
        F('house_category_array',$house_category_array);
        unset($list,$arr);
        return true;
    }


}