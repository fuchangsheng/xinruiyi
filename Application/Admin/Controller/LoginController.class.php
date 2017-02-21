<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    // 用户登出
    public function logout() {
        if(isset($_SESSION[C('USER_AUTH_KEY')])) {
            unset($_SESSION[C('USER_AUTH_KEY')]);
            unset($_SESSION);
            session_destroy();
            $this->success('登出成功！','/admin.php');
        }else {
            $this->error('已经登出！');
        }
    }

    // 登录检测
    public function login() {
    	if(IS_POST){
			$ip		=	get_client_ip();
		    $time	=	time();

	        $username	= I('uname');
	        $password	= I('upass');

	        if(check_verify(I('verify_code'))){
	        	$this->ajaxReturn(0,"验证码错误！",0);
	        	$result = array('status'=>0, 'info'=>'验证码错误！');
    			$this->ajaxReturn($result);
	        }

	        $Admin = M('Admin');
	        $authInfo = $Admin->field()->getByUsername($username);
	        if(empty($authInfo)){
	        	$result = array('status'=>0, 'info'=>'改用户不存在！');
    			$this->ajaxReturn($result);
	        }else if($authInfo['password']!=password($password)){
	        	$result = array('status'=>0, 'info'=>'密码错误！');
    			$this->ajaxReturn($result);
	        }else if($authInfo['status']<0){
                $result = array('status'=>0, 'info'=>'该帐号已被禁封，如有问题请联系管理员,电话：7212302！');
                $this->ajaxReturn($result);
            }else if($authInfo['status']==0){
                $result = array('status'=>0, 'info'=>'该帐号未激活，如有问题请联系管理员,电话：7212302！');
                $this->ajaxReturn($result);
            }

            $_SESSION[C('USER_AUTH_KEY')]   =   $authInfo['id'];
            $admin['id'] = $authInfo['id'];
            $admin['roleid'] = $authInfo['role_id'];
            $admin['username'] = $authInfo['username'];
            $admin['nikcname'] = $authInfo['nickname'];

            if($authInfo['username']=='admin') {
                $admin['administrator']      =   true;
            }
            session('liqingbo',$admin);

            //保存登录信息
            $Admin  =   M('Admin');
            $data = array();
            $data['id'] =   $authInfo['id'];
            $data['last_login_time']    =   NOW_TIME;
            $data['login_count']    =   array('exp','login_count+1');
            $data['last_login_ip']  =   get_client_ip();
            $Admin->save($data);

            /*$loginData['user_id'] = $authInfo['id'];
            $loginData['login_time'] = NOW_TIME;
            $loginData['login_ip'] = get_client_ip();
            M('LoginLog')->add($loginData);*/

	        $result = array('status'=>1, 'info'=>'正在登陆...', 'url'=>C('APP_PORTAL'));
        	$this->ajaxReturn($result);
    	}

    }

    // 更换密码
    public function changePwd() {
        $this->checkUser();
        //对表单提交处理进行处理或者增加非表单数据
        if(md5($_POST['verify'])	!= $_SESSION['verify']) {
            $this->error('验证码错误！');
        }
        $map	=	array();
        $map['password']= pwdHash($_POST['oldpassword']);
        if(isset($_POST['username'])) {
            $map['username']	 =	 $_POST['username'];
        }elseif(isset($_SESSION[C('USER_AUTH_KEY')])) {
            $map['id']		=	$_SESSION[C('USER_AUTH_KEY')];
        }
        //检查用户
        $User    =   M("User");
        if(!$User->where($map)->field('id')->find()) {
            $this->error('旧密码不符或者用户名错误！');
        }else {
            $User->password	=	pwdHash($_POST['password']);
            $User->save();
            $this->success('密码修改成功！');
         }
    }

    // 修改资料
    public function change() {
        $this->checkUser();
        $User	 =	 D("User");
        if(!$User->create()) {
            $this->error($User->getError());
        }
        $result	=	$User->save();
        if(false !== $result) {
            $this->success('资料修改成功！');
        }else{
            $this->error('资料修改失败!');
        }
    }

	public function loginLog(){
		import('ORG.Util.Page');
		$M = M('LoginLog');

		$userId	= (int)$_GET['user_id'];
		$keyword = trim($_GET['keyword']);
		$startTime = strtotime($_GET['startTime']);
		$endTime = strtotime($_GET['endTime']);

		if( !empty($keyword) && $keyword!='请输入搜索关键词' ){
			$where['login_ip'] = $keyword;
		}
		if( !empty($startTime) && empty($endTime) ){
			$where['login_time'] = array('gt',$startTime);
		}else if( !empty($startTime) && !empty($endTime) ){
			$where['login_time'] = array('between',$startTime,$endTime);
		}

		if( !empty($userId) ){
			$where['user_id'] =  $userId;
		}else if( $_SESSION['roleId']!=1 ){
			$where['user_id'] =  $_SESSION[C('USER_AUTH_KEY')];
		}
		$count      = $M->where($where)->count();
		$Page       = new Page($count,25);
		$show       = $Page->show();

        $list = D('Public')->getLoginLogList($where,$Page->firstRow,$Page->listRows );

		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display('LoginLog:loginLog'); // 输出模板
	}

	public function delLoginLog(){
        $result = D('Public')->delLoginLog();
        echo json_encode($result);
	}

    function verify(){
        ob_clean();
		$config =    array(
			'fontSize'    =>    10,    // 验证码字体大小
			'length'      =>    4,     // 验证码位数
			'useNoise'    =>    false, // 关闭验证码杂点
            'useCurve' => false, // 是否画混淆曲线
            'reset' => false // 验证成功后是否重置
		);
		$Verify =     new \Think\Verify($config);
		$Verify->codeSet = '0123456789';
		$Verify->entry();
	}

}