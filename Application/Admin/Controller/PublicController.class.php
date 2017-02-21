<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {

	function verify(){
		$config =    array(
		'fontSize'    =>    30,    // 验证码字体大小
		'length'      =>    3,     // 验证码位数
		'useNoise'    =>    false, // 关闭验证码杂点
		);
		$Verify =     new \Think\Verify($config);
		$Verify->entry();
	}

	// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
	function check_verify($code, $id = ''){
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}
}