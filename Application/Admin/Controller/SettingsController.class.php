<?php
namespace Admin\Controller;
use Think\Controller;
class SettingsController extends CommonController {

    public function index() {
        if(IS_POST){
            $data = I('post.data');

            if(!is_array($data)) return FALSE;
            $configfile = APP_PATH.'Common/Conf/config_setting.php';
            if(!is_writable($configfile)) return FALSE;
            $str = '<?php'.PHP_EOL.'return array('.PHP_EOL;
            $i = 0;
            foreach($data as $k=>$v) {
                $str .= "'".strtoupper($k)."' => '".$v."',".PHP_EOL;
            }
            $str = substr($str,0,-1);
            $str .= ');'.PHP_EOL.' ?>';
            file_put_contents($configfile, $str);

            $this->ajaxReturn( array('status'=>1,'info'=>'操作成功！') );
            exit;
        }

        //获取前台调试模式
        $home_file_content = file_get_contents('./index.php');
        preg_match ('/APP_DEBUG\',([a-zA-Z]+)/', $home_file_content, $matches);
        $this->assign('home_debug_status',strtolower($matches[1]));

        $admin_file_content = file_get_contents('./index.php');
        preg_match ('/APP_DEBUG\',([a-zA-Z]+)/', $admin_file_content, $matches);
        $this->assign('admin_debug_status',strtolower($matches[1]));

        $this->display();
    }

    //基本设置
    public function base(){

        if(IS_POST){
            $filename =  CONF_PATH.'config_base.php';
            file_put_contents($filename, strip_whitespace("<?php\treturn " . var_export($_POST, true) . ";?>"));
            $this->success('操作成功！');
        }
        $this->display();
    }

    //动态配置
    public function config(){
        if(IS_POST){
            $filename =  CONF_PATH.'config_base.php';
            file_put_contents($filename, strip_whitespace("<?php\treturn " . var_export($_POST, true) . ";?>"));
            $this->success('操作成功！');
        }
        $this->display();
    }

    public function email(){
        if(IS_POST){
            $filename =  CONF_PATH.'config_email.php';
            file_put_contents($filename, strip_whitespace("<?php\treturn " . var_export($_POST, true) . ";?>"));
            $this->success('操作成功！');
        }

        $this->display();
    }

    public function set_email() {
        C('TOKEN_ON', false);
        $return = send_mail($_POST['test_email'], "", "测试配置是否正确", "这是一封测试邮件，如果收到了说明配置没有问题", "", $_POST);
        if ($return == 1) {
            echo json_encode(array('status' => 1, 'info' => "测试邮件已经发往你的邮箱" . $_POST['test_email'] . "中，请注意查收"));
        } else {
            echo json_encode(array('status' => 0, 'info' => "$return"));
        }
    }


    //LOGO设置
    public function logo(){
        if(IS_POST){
            $default_theme__home_path = C('DEFAULT_THEME__HOME_PATH');
            if(empty($default_theme__home_path)){
                $result = array('status'=>0,'info'=>'请先设置LOGO路径');
                echo json_encode($result);
                exit;
            }

            if($_FILES['file']['error']==0 && !empty($_FILES)){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath =  '.'.$default_theme__home_path.'static/';// 设置附件上传目录3
                $upload->savePath =  '/images/';// 设置附件上传目录3
                $upload->saveName  = 'logo';

                $upload->autoSub  = true;
                $upload->subName  = false;
                $upload->replace  = true;   //同名覆盖
                $info   =   $upload->uploadOne($_FILES['file']);
                if($info) {
                    $result = array('status'=>1,'info'=>'上传成功！','url'=>U('settings/logo'));
                    echo json_encode($result);
                    exit;
                }
            }
            $result = array('status'=>1,'info'=>'操作成功！');
            echo json_encode($result);
            exit;
        }
        $this->display();
    }

    //模板设置
    public function settpl(){

        if(IS_POST){
            $act = I('post.act');
            $themes = I('post.themes');
            if($act=='set'){
                $home_conf_path = APP_PATH.'Home/Conf/config.php';
                $data = array();
                $data['DEFAULT_THEME'] = $themes;
                replace_config($home_conf_path,$data);


                $config_theme = APP_PATH.'Common/Conf/config_theme.php';
                $data = array();
                $data['DEFAULT_THEME__HOME_PATH'] = '/Themes/Home/'.$themes.'/';
                replace_config($config_theme,$data);
                $result = array('status'=>1 ,'info'=>'操作成功！');
                $this->ajaxReturn($result);
            }
        }
        //前台模板路径
        $themes_path = './Themes/Home/';
        $folder_list =  get_file_folder_List($themes_path,1);
        $this->assign('folder_list',$folder_list);

        //获取前台配置文件信息
        $home_conf_path = APP_PATH.'Home/Conf/config.php';
        $home_config = include($home_conf_path);
        $this->assign('home_config',$home_config);

        $data = array();
        $data['DEFAULT_THEME'] = 'm';
        //replace_config($home_conf_path,$data);
        $this->display('settpl');
    }

    public function nav() {
        if (IS_POST) {
            echo json_encode(D("Nav")->nav());
        } else {

            $this->assign("list", D("Nav")->nav());
            $this->display("nav");
        }
    }

	public function friendlylink() {
        if (IS_POST) {
            echo json_encode(D("Friendlylink")->friendlylink());
        } else {
            $this->assign("list", D("Friendlylink")->friendlylink());
            $this->display("friendlylink");
        }
    }

	public function addFriendlylink() {
        if (IS_POST) {
            echo json_encode(D("Friendlylink")->friendlylink());
        } else {
            $this->assign("list", D("Friendlylink")->friendlylink());
            $this->display();
        }
    }

	public function changeNavStatus(){
		$statusId = $_GET['statusId'];
		$id = $_GET['id'];
		if(empty($id)) return false;
		if($statusId==1){
			$data['status'] = 0;
			$info = "待审核";
		}else{
			$data['status'] = 1;
			$info = "审核通过";
		}
		M('Nav')->where('id='.$id)->save($data);
		$this->ajaxReturn($data['status'],$info,1);
	}

    function set_config($data=array()) {
        if(!is_array($data)) return FALSE;
        $configfile = WEB_ROOT.'Application/Common/Conf/config_setting.php';
        if(!is_writable($configfile)) return FALSE;
        $str = '<?php'.PHP_EOL.'return array('.PHP_EOL;
        $i = 0;
        foreach($data as $k=>$v) {
            $str .= "'".strtoupper($k)."' => '".$v."',".PHP_EOL;
        }
        $str = substr($str,0,-1);
        $str .= ');'.PHP_EOL.' ?>';
        return file_put_contents($configfile, $str);
    }

    //设置数据库配置信息
    public function sysconfig($value='') {
        $Sysconfig = M('Sysconfig');

        if(IS_POST){
            $act = I('post.act');
            $data = I('post.data');
            if($act=='edit'){
                $updateNum = $Sysconfig->where('id='.$data['id'])->save($data);
                $result = array('status'=>1, 'info'=>'操作成功！');
                $this->ajaxReturn($result);
            }
            if($act=='add'){
                $addid = $Sysconfig->add($data);
                $result = array('status'=>1, 'info'=>'操作成功！');
                $this->ajaxReturn($result);
            }
            if($act=='status'){
                $id = I('post.id');
                $status = I('post.status');

                $addid = $Sysconfig->where('id='.$id)->setField('status',$status);
                $result = array('status'=>1, 'info'=>'操作成功！');
                $this->ajaxReturn($result);
            }



        }
        $list = $Sysconfig->where()->order('groupid ASC,sort ASC')->select();
        foreach ($list as $key => $val) {
            $list[$key]['group_on'][$val['groupid']] = 'checked';
        }
        //print_r($list);
        $this->assign('list',$list);
        $this->display();
    }

    public function change_index_debug(){
        $status = I('get.status');
        $file_path = './index.php';
        $file_content = file_get_contents($file_path);
        $put_content = preg_replace('/\'APP_DEBUG\',([a-zA-Z]+)/i',"'APP_DEBUG',".$status,$file_content);
        file_put_contents($file_path, $put_content);
    }

    public function change_admin_debug(){
        $status = I('get.status');
        $file_path = './admin.php';
        $file_content = file_get_contents($file_path);
        $put_content = preg_replace('/\'APP_DEBUG\',([a-zA-Z]+)/i',"'APP_DEBUG',".$status,$file_content);
        file_put_contents($file_path, $put_content);
    }


    //开发模式
    public function development_mode(){
        $status = I('get.status');

        $file_path = './index.php';
        $file_content = file_get_contents($file_path);
        $put_content = preg_replace('/\'APP_DEBUG\',([a-zA-Z]+)/i',"'APP_DEBUG',".$status,$file_content);
        file_put_contents($file_path, $put_content);

        $file_path = './admin.php';
        $file_content = file_get_contents($file_path);
        $put_content = preg_replace('/\'APP_DEBUG\',([a-zA-Z]+)/i',"'APP_DEBUG',".$status,$file_content);
        file_put_contents($file_path, $put_content);

        //关闭后台菜单
        $Menu = M('Menu');
        if($status=='true'){
            $Menu->where( array('id'=>16) )->setField('status',1);
        }else{
            $Menu->where( array('id'=>16) )->setField('status',4);
        }
        $this->ajaxReturn( array('status'=>1) );
    }
}