<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function _initialize() {
        //幻灯片
        $Advert = M('Advert');
        $slide_list = $Advert->where( array('place'=>1, 'status'=>1) )->order('sort ASC')->limit(4)->select();
        $this->assign('slide_list',$slide_list);
    }

    public function index(){
    	if(IS_POST){
    		$map = array();
    		$password= I('post.password');
    		$username = I('post.username');
    		$M = M('Member');
    		$map = array();
    		$map['username|phone'] = trim($username);
    		$exist = $M->where($map)->count();
    		if(!$exist){
    			$result = array('status'=>0, 'info'=>'该用户名不存在！');
				$this->ajaxReturn($result);
				exit;
    		}
    		$map['password'] = password($password);
    		$userinfo = $M->where($map)->find();
    		if(empty($userinfo)){
    			$result = array('status'=>0, 'info'=>'密码错，请重新输入！');
				$this->ajaxReturn($result);
				exit;
    		}

    		$liqingbo = array();
    		$liqingbo['user_id'] = $userinfo['id'];
    		$liqingbo['username'] = $userinfo['username'];
    		$liqingbo['nickname'] = $userinfo['nickname'];
    		$liqingbo['last_login_time'] = $userinfo['last_login_time'];
    		$liqingbo['last_login_ip'] = $userinfo['last_login_ip'];

    		cookie('liqingbo',$liqingbo);


    		$result = array('status'=>1, 'info'=>'正在登录...', 'url'=>U('index/index'));
			$this->ajaxReturn($result);
			exit;
    	}
        $this->display('login');
    }

    public function register(){
    	if(IS_POST){
    		$data = array();
            $func= I('post.func');

            if(!empty($func)&&is_array($func)){
                foreach($func as $key=>$val){
                    $post[$val['name']] = $val['value'];
                }
            }


            $password  = $post['passWord'];
            $rpassword = $post['passWordAgain'];

            $data['username'] = $post['userName'];
            $data['realname']    = $post['realname'];
            $data['company']    = $post['corpName'];
            $data['phone']    = $post['sms'];
            $data['password'] = password($password);
            $data['role_id']  = 0;

            if($password!=$rpassword){
                ajax_return(0,'再次密码不一致');
            }


            if(empty($data['username'])){
                ajax_return(0,'请输入用户名');
            }

            if(empty($data['phone'])){
                ajax_return(0,'请输入手机号码');
            }

            if( preg_match('/^[0-9]{1,6}$/', $password) ){
                ajax_return(0,'密码过于简单，请重新输入');
            }



    		$M = M('Admin');

            $exist2 = $M->where( array('username'=>trim($data['username'])) )->count();
            if($exist2){
                ajax_return(0,'该用户名已被注册！');
            }

            $exist = $M->where( array('phone'=>trim($data['phone'])) )->count();
            if($exist){
                ajax_return(0,'该手机号码已被注册！');
            }


    		$data['last_login_time'] = NOW_TIME;
    		$data['last_login_ip'] = get_client_ip();
    		$data['create_time'] = NOW_TIME;
    		$data['update_time'] = NOW_TIME;
    		$data['status'] = 0;

    		$M->add($data);

    		$result = array('status'=>1, 'info'=>'恭喜您已注册成功，请登录！', 'url'=>'/admin.php/');
			$this->ajaxReturn($result);
			exit;
    	}
    	$this->display();
    }

    public function logout(){
        cookie('liqingbo',null);
        $this->success('正在退出...',C('CFG_BASEHOST'));
    }
}