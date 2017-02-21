<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index() {
		//pre($_SESSION['my_info']);
        //服务器信息
        if (function_exists('gd_info')) {
            $gd = gd_info();
            $gd = $gd['GD Version'];
        } else {
            $gd = "不支持";
        }
        $info = array(
            '操作系统' => PHP_OS,
            '主机名IP端口' => $_SERVER['SERVER_NAME'] . ' (' . $_SERVER['SERVER_ADDR'] . ':' . $_SERVER['SERVER_PORT'] . ')',
            '运行环境' => $_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式' => php_sapi_name(),
            '程序目录' => WEB_ROOT,
            'MYSQL版本' => function_exists("mysql_close") ? mysql_get_client_info() : '不支持',
            'GD库版本' => $gd,
			//'MYSQL版本' => mysql_get_server_info(),
            '上传附件限制' => ini_get('upload_max_filesize'),
            '执行时间限制' => ini_get('max_execution_time') . "秒",
            '剩余空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
            '服务器时间' => date("Y年n月j日 H:i:s"),
            '北京时间' => gmdate("Y年n月j日 H:i:s", time() + 8 * 3600),
            '采集函数检测' => ini_get('allow_url_fopen') ? '支持' : '不支持',
            'register_globals' => get_cfg_var("register_globals") == "1" ? "ON" : "OFF",
            'magic_quotes_gpc' => (1 === get_magic_quotes_gpc()) ? 'YES' : 'NO',
            'magic_quotes_runtime' => (1 === get_magic_quotes_runtime()) ? 'YES' : 'NO',
            '当前数据库' => C('DB_NAME'),
            '' => ''
        );
        $this->assign('server_info', $info);
        $this->display();
    }

    public function myInfo() {
        if (IS_POST) {
            $user_id = $_SESSION[C('USER_AUTH_KEY')];
            $old_pwd = I('pwd');
            $npwd = I('npwd');
            $rpwd = I('rpwd');
            $M = M('Admin');
            $map = array();
            $map['id'] = $user_id;
            $map['password'] = password($old_pwd);
            $info = $M->where($map)->find();
            if(empty($info)){
                $result = array('status' => 0, 'info' => "原密码错误！");
            }else{
                $new_password = password($npwd);
                $M->where('id='.$user_id)->setField('password',$new_password);
                $result = array('status' => 1, 'info' => "操作成功！", 'url'=>"/admin.php/Index/myinfo");
            }
            echo json_encode($result);
        } else {
            $this->display();
        }
    }

    public function changeinfo() {
        if (IS_POST) {
            $M = M("Admin");
            $data = array();
            $data['id'] = $_SESSION['user_id'];
            $data['nickname'] = I('nickname');
            $data['remark'] = I('remark');
            $data['email'] = I('email');
            $data['address'] = I('address');
            $data['conpany'] = I('conpany');

            if ($M->save($data)) {
                $result = array('status' => 1, 'info' => "操作成功！");
            } else {
                $result = array('status' => 0, 'info' => "信息没有改动！");
            }
            echo json_encode($result);
            exit;
        } else {
            $uid = $_SESSION['user_id'];
            $userInfo = M('Admin')->find($uid);
            $this->assign('userInfo',$userInfo);
            $this->display();
        }
    }


    public function cache() {
        $caches = array(
            "HomeCache" => array("name" => "网站前台缓存文件", "path" => RUNTIME_PATH . "Cache/Home/"),
            "AdminCache" => array("name" => "网站后台缓存文件", "path" => RUNTIME_PATH . "Cache/Admin/"),

            "HomeLog" => array("name" => "网站前台日志缓存文件", "path" => RUNTIME_PATH . "Logs/Home/"),
            "AdminLog" => array("name" => "网站后台日志缓存文件", "path" => RUNTIME_PATH . "Logs/Admin/"),

            "HomeTemp" => array("name" => "网站前台临时缓存文件", "path" => RUNTIME_PATH . "Temp/Home/"),
            "AdminTemp" => array("name" => "网站后台临时缓存文件", "path" => RUNTIME_PATH . "Temp/Admin/"),

            "Homeruntime" => array("name" => "网站前台runtime.php缓存文件", "path" => RUNTIME_PATH . "Home/~runtime.php"),
            "Adminruntime" => array("name" => "网站后台runtime.php缓存文件", "path" => RUNTIME_PATH . "Admin/~runtime.php"),

            "MinFiles" => array("name" => "JS\CSS压缩缓存文件", "path" => RUNTIME_PATH . "MinFiles/")
            //"CommonDate" => array("name" => "公共Date缓存文件", "path" => RUNTIME_PATH . "Data/")
        );
        if (IS_POST) {
            foreach ($_POST['cache'] as $path) {
                if (isset($caches[$path]))
                    del_dir_file($caches[$path]['path']);
            }
//            pre($_POST);
//            $this->checkToken();
            echo json_encode(array("status"=>1,"info"=>"缓存文件已清除"));
        } else {
            $this->assign("caches", $caches);
            $this->display();
        }
    }
}