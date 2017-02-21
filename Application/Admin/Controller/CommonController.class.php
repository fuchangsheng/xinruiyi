<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    protected $controllerName = CONTROLLER_NAME;
    protected $actionName = ACTION_NAME;
    protected $uid = ACTION_NAME;

	function _initialize() {
		header("Content-Type:text/html;charset=utf-8");
        header('Content-Type:application/json; charset=utf-8');
        defined('IN_ADMIN') or exit('Access Denied');

        $this->checkLogin();
        $this->auth();
        $this->uid = session('user_id');

        $menu_pid = I('menu_pid');
        if(empty($menu_pid)){
            $Menu = D('Menu');
            $menu_pid = $Menu->getPid(strtolower($this->controllerName),strtolower($this->actionName));
        }
        $this->assign("menu", $this->show_menu($menu_pid));
        $this->assign("sub_menu", $this->show_sub_menu($menu_pid));


        $Admin = M('Admin');
        $adminInfo = $Admin->where( array('id'=>$this->uid) )->find();
        $this->assign('adminInfo',$adminInfo);

        //后台左菜单二维码
        $this->assign('QRcodeUrl','/Public/images/liqingbo_qrcode.png');
    }

    function checkLogin(){
    	if(!session('user_id')){
    		$this->display('Login:login');
    		exit;
    	}
    }

    function auth(){
        $uid = session('user_id');
        $role_id = get_role_id($uid);
        if($role_id==1) return true;
        /*$not_check = array('Index/index','Index/main','Index/clear_cache',
            'Index/edit_pwd','Index/logout','Admin/admin_list',
            'Admin/admin_list','Admin/admin_edit','Admin/admin_add');

        //当前操作的请求  模块名/方法名
        if(in_array(CONTROLLER_NAME.'/'.ACTION_NAME, $not_check)){
            return strue;
        }*/

        //下面代码动态判断权限
        $AuthRule = M('AuthRule');
        $rule_list = $AuthRule->where( array('status'=>1) )->select();
        foreach ($rule_list as $key => $val) {
            $ruleList[] = strtolower($val['c_name'].'_'.$val['a_name']);
        }

        $currentAction = strtolower(CONTROLLER_NAME.'_'.ACTION_NAME);

        $map = array();
        $map['c_name'] = strtolower(CONTROLLER_NAME);
        $map['a_name'] = strtolower(ACTION_NAME);
        $map['status'] = 1;
        $currentRuleId = $AuthRule->where($map)->getField('id');

        if(!empty($currentRuleId)){

            $rules = get_rules($role_id);
            $ruleArr = explode(',', $rules);


            if(!in_array($currentRuleId, $ruleArr)){
                if(IS_AJAX){
                    echo json_encode( array('status'=>0,'info'=>'没有权限！') );
                    exit;
                }else{
                    $this->error('没有权限');
                    exit;
                }
                exit;
            }
        }
    }

    /**
     * 显示一级菜单
     */
    private function show_menu($menu_pid=0) {
        $css = '';
        $menu_list = get_admin_menu_tree();

        $count = count($menu_list);
        $i = 1;
        $menu = "";

        foreach ($menu_list as $key => $val) {

            if ($i == 1) {
                $css = ($val['id'] == $menu_pid) ? "fisrt_current" : "fisrt";
                $menu .= '<li class="'.$css.'"><span><a href="'.U($val['controller'].'/'.$val['action']).'">' . $val['name'] . '</a></span></li>';
            } else if ($i == $count) {
                $css = ($val['id'] == $menu_pid) ? "end_current" : "end";
                $menu .= '<li class="' . $css . '"><span><a href="' . U($val['controller'].'/'.$val['action']).'">' . $val['name'] . '</a></span></li>';
            } else {
                $css = $val['id'] == $menu_pid ? "current" : "";
                $menu .= '<li class="' . $css . '"><span><a href="' . U($val['controller'].'/'.$val['action']). '">' . $val['name'] . '</a></span></li>';
            }
            $i++;
        }
        return $menu;
    }

    /**
     * 显示二级菜单
     */
    private function show_sub_menu($menu_pid=0) {
        $menu_list = get_admin_menu_tree();
        $secondary = $menu_list[$menu_pid];
        if(!empty($secondary)){
            foreach ($secondary['sub'] as $key => $val) {
                if(strtolower($val['action'])==strtolower($this->actionName)&&strtolower($val['controller'])==strtolower($this->controllerName)){
                    $secondary['sub'][$key]['class'] = 'on';
                }else{
                    $secondary['sub'][$key]['class'] = '';
                }
            }
        }

        return $secondary;
    }

}