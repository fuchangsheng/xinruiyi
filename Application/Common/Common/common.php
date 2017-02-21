<?php
/*******************************************************************************
* [LQBCMS] LQBCMS
* @Copyright (C) 2014-2015  http://www.liqingbo.cn   All rights reserved.
* @Team  liqingbo.cn
* @Author: 秦大侠 QQ:176881336
* @Licence http://www.liqingbo.cn/license.txt
*******************************************************************************/

// OneThink常量定义
const LQBCMS_VERSION    = '2.0';
const LQBCMS_ADDON_PATH = './Addons/';


function ajax_return($status=0, $info='', $url=''){

    $result['status'] = $status;
    $result['info'] = $info;
    $result['url'] = $url;
    echo json_encode($result);
    exit;
}


/**
 * 验证码检查
 */
function check_verify($code, $id = 1){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

function get_sysconfig_info(){
    $Sysconfig = M('sysconfig');
    $list = $Sysconfig->where()->select();
    foreach ($list as $key => $val) {
        $arr[$val['varname']] = $val['value'];
    }
    return $arr;
}

/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $count 要分页的总记录数
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */

function getpage($count, $pagesize = 10) {
	$p = new Think\Page($count, $pagesize);
	$p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
	$p->setConfig('prev', '上一页');
	$p->setConfig('next', '下一页');
	$p->setConfig('last', '末页');
	$p->setConfig('first', '首页');
	$p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
	$p->lastSuffix = false;//最后一页不显示为总页数
	return $p;
}

/**
* 格式化字节大小
* @param  number $size      字节数
* @param  string $delimiter 数字和单位分隔符
* @return string            格式化后的带单位的大小
 */
function get_byte($size, $delimiter = '') {
	$units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
	for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
	return round($size, 2) . $delimiter . $units[$i];
}

function mydate($time){
    if(empty($time)) return '';
    return date('Y-m-d',$time);
}

function mytime($time){
    if(empty($time)) return '';
    return date('Y-m-d H:i:s',$time);
}

/**
 * 生成随机字符串
 * @param string $lenth 长度
 * @return string 字符串
 */
function get_randomstr($lenth = 6) {
	return get_random($lenth, '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ');
}

/**
 * 产生随机字符串
 *
 * @param    int        $length  输出长度
 * @param    string     $chars   可选的 ，默认为 0123456789
 * @return   string     字符串
 */
function get_random($length, $chars = '0123456789') {
	$hash = '';
	$max = strlen($chars) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}


/**
 * 数据库备份目录
 * @  USER_DATA_PATH在配置文件config中定义
 */
function get_db_path() {
	return C('USER_DATA_PATH'). '/Backupdata';
}

/**
 * 功能：计算文件大小
 * @param int $bytes
 * @return string 转换后的字符串
 */
function byteFormat($bytes) {
	$sizetext = array(" B", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
	return round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), 2) . $sizetext[$i];
}

/**
 * 格式化字节大小
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 * @author 码农 <252588119@qq.com>
 */
function format_bytes($size, $delimiter = '') {
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    return round($size, 2) . $delimiter . $units[$i];
}

function my_mkdir($Folder){ // 创建图片上传目录和缩略图目录
        if(!is_dir($Folder)){
			$dir = explode('/',$Folder);
			foreach($dir as $v){
				if($v){
					$d .= $v . '/';
					if(!is_dir($d)){
						$state = mkdir($d);
						if(!$state){
							die('在创建目录' . $d . '时出错！');
						}
					}
				}
			}
        }
    }

/**
 * 循环删除目录和文件函数
 * @param string $dirName 路径
 * @param boolean $fileFlag 是否删除目录
 * @return void
 */
function del_dir_file($dirName, $bFlag = false ) {
	if ( $handle = opendir( "$dirName" ) ) {
		while ( false !== ( $item = readdir( $handle ) ) ) {
			if ( $item != "." && $item != ".." ) {
				if ( is_dir( "$dirName/$item" ) ) {
					del_dir_file("$dirName/$item", $bFlag);
				} else {
					unlink( "$dirName/$item" );
				}
			}
		}
		closedir( $handle );
		if($bFlag) rmdir($dirName);
	}
}

/**
 * 删除目录及目录下所有文件或删除指定文件
 * @param str $path   待删除目录路径
 * @param int $delDir 是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
 * @return bool 返回删除状态
 */
function del_dir_and_file($path, $delDir = FALSE) {
    $handle = opendir($path);
    if ($handle) {
        while (false !== ( $item = readdir($handle) )) {
            if ($item != "." && $item != "..")
                is_dir("$path/$item") ? del_dir_and_file("$path/$item", $delDir) : unlink("$path/$item");
        }
        closedir($handle);
        if ($delDir)
            return rmdir($path);
    }else {
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return FALSE;
        }
    }
}

/**
 *  作用：将xml转为array
 */
function xmlToArray($xml)
{
    //将XML转为array
    $array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    return $array_data;
}



/**
 * 递归重组信息为多维
 * @param string $dirName 路径
 * @param boolean $fileFlag 是否删除目录
 * @return void
 */
function node_merge($attr, $arr) {
	//$arr=array();
// 	dump($arr);
// 	exit;
	foreach($attr as $v){
		if (is_array($arr)){
			$v['access'] = in_array($v['id'],$arr) ? 1: 0;
		}
	}
	return $attr;
}

/**
 * 验证手机号是否正确
 * @author 范鸿飞
 * @param INT $mobile
 */
function isMobile($mobile) {
	if (!is_numeric($mobile)) {
		return false;
	}
	return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
}


function get_extension($file)  {
    $info = pathinfo($file);
    return $info['extension'];
}

/**
 * 获取文件信息
 * @param string $filepath 路径
 * @param string $key 指定返回某个键值信息
 * @return array
 */
function get_file_info($filepath='', $key=''){
    //打开文件，r表示以只读方式打开
    $handle = fopen($filepath,"r");
    //获取文件的统计信息
    $fstat = fstat($handle);

    fclose($handle);
    $fstat['filename'] = basename($filepath);
    if(!empty($key)){
    	return $fstat[$key];
    }else{
    	return $fstat;
    }
}

/**
 * 获取文件目录列表
 * @param string $pathname 路径
 * @param integer $fileFlag 文件列表 0所有文件列表,1只读文件夹,2是只读文件(不包含文件夹)
 * @param string $pathname 路径
 * @return array
 */
function get_file_folder_List($pathname,$fileFlag = 0, $pattern='*') {
	$fileArray = array();
	$pathname = rtrim($pathname,'/') . '/';
	$list   =   glob($pathname.$pattern);
	foreach ($list  as $i => $file) {
		switch ($fileFlag) {
			case 0:
				$fileArray[]=basename($file);
				break;
			case 1:
				if (is_dir($file)) {
					$fileArray[]=basename($file);
				}
				break;

			case 2:
				if (is_file($file)) {
					$fileArray[]=basename($file);
				}
				break;

			default:
				break;
		}
	}

	if(empty($fileArray)) $fileArray = NULL;
	return $fileArray;
}

/**
 * PHP 非递归实现查询该目录下所有文件
 * @param unknown $dir
 * @return multitype:|multitype:string
 */
function scanfiles($dir) {
    if (! is_dir ( $dir )) return array ();

    // 兼容各操作系统
    $dir = rtrim ( str_replace ( '\\', '/', $dir ), '/' ) . '/';

    // 栈，默认值为传入的目录
    $dirs = array ( $dir );

    // 放置所有文件的容器
    $rt = array ();

    do {
        // 弹栈
        $dir = array_pop ( $dirs );

        // 扫描该目录
        $tmp = scandir ( $dir );

        foreach ( $tmp as $f ) {

            // 过滤. ..
            if ($f == '.' || $f == '..')
                continue;

            // 组合当前绝对路径
            $path = $dir . $f;


            // 如果是目录，压栈。
            if (is_dir ( $path )) {
                array_push ( $dirs, $path . '/' );
            } else if (is_file ( $path )) { // 如果是文件，放入容器中
                $rt [] = $path;
            }
        }

    } while ( $dirs ); // 直到栈中没有目录

    return $rt;
}


/**
 * 截取中文字符
 */
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true){
	if(function_exists("mb_substr")){
		$slice= mb_substr($str, $start, $length, $charset);
	}elseif(function_exists('iconv_substr')) {
		$slice= iconv_substr($str,$start,$length,$charset);
	}else{
		$re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
		$re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
		$re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
		$re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
		preg_match_all($re[$charset], $str, $match);
		$slice = join("",array_slice($match[0], $start, $length));
	}
	$fix='';
	if(strlen($slice) < strlen($str)){
		$fix='...';
	}
	return $suffix ? $slice.$fix : $slice;
}

/**
 * 反字符 去标签 自动加点 去换行 截取字符串
 */
function cutstr ($data, $no, $le = '') {
	$data = strip_tags(htmlspecialchars_decode($data));
	$data = str_replace(array("\r\n", "\n\n", "\r\r", "\n", "\r"), '', $data);
	$datal = strlen($data);
	$str = msubstr($data, 0, $no);
	$datae = strlen($str);
	if ($datal > $datae)
		$str .= $le;
	return $str;
}

/**
 * [字符串截取]
 * @param  [type]  $Str    [字符串]
 * @param  [type]  $Length [长度]
 * @param  boolean $more   [模型]
 * @return [type]          [截取后的字符串]
 */
function cut($Str, $Length,$more=true) {//$Str为截取字符串，$Length为需要截取的长度

    global $s;
    $i = 0;
    $l = 0;
    $ll = strlen($Str);
    $s = $Str;
    $f = true;

    while ($i <= $ll) {
        if (ord($Str{$i}) < 0x80) {
            $l++; $i++;
        } else if (ord($Str{$i}) < 0xe0) {
            $l++; $i += 2;
        } else if (ord($Str{$i}) < 0xf0) {
            $l += 2; $i += 3;
        } else if (ord($Str{$i}) < 0xf8) {
            $l += 1; $i += 4;
        } else if (ord($Str{$i}) < 0xfc) {
            $l += 1; $i += 5;
        } else if (ord($Str{$i}) < 0xfe) {
            $l += 1; $i += 6;
        }

        if (($l >= $Length - 1) && $f) {
            $s = substr($Str, 0, $i);
            $f = false;
        }

        if (($l > $Length) && ($i < $ll) && $more) {
            $s = $s . '...'; break; //如果进行了截取，字符串末尾加省略符号“...”
        }
    }
    return $s;
}

/**
 * 将一个字符串转换成数组，支持中文
 * @param string    $string   待转换成数组的字符串
 * @return string   转换后的数组
 */
function strToArray($string) {
    $strlen = mb_strlen($string);
    while ($strlen) {
        $array[] = mb_substr($string, 0, 1, "utf8");
        $string = mb_substr($string, 1, $strlen, "utf8");
        $strlen = mb_strlen($string);
    }
    return $array;
}


/**
* 对查询结果集进行排序
* @access public
* @param array $list 查询结果
* @param string $field 排序的字段名
* @param array $sortby 排序类型
* asc正向排序 desc逆向排序 nat自然排序
* @return array
*/
function list_sort_by($list,$field, $sortby='asc') {
   if(is_array($list)){
       $refer = $resultSet = array();
       foreach ($list as $i => $data)
           $refer[$i] = &$data[$field];
       switch ($sortby) {
           case 'asc': // 正向排序
                asort($refer);
                break;
           case 'desc':// 逆向排序
                arsort($refer);
                break;
           case 'nat': // 自然排序
                natcasesort($refer);
                break;
       }
       foreach ( $refer as $key=> $val)
           $resultSet[] = &$list[$key];
       return $resultSet;
   }
   return false;
}


/**
 * 把返回的数据集转换成Tree
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 * @return array
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function list_to_tree($list, $pk='id', $pid = 'pid', $child = '_child', $root = 0) {
    // 创建Tree
    $tree = array();
    if(is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] =& $list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId =  $data[$pid];
            if ($root == $parentId) {
                $tree[] =& $list[$key];
            }else{
                if (isset($refer[$parentId])) {
                    $parent =& $refer[$parentId];
                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }
    return $tree;
}

/**
 * 将list_to_tree的树还原成列表
 * @param  array $tree  原来的树
 * @param  string $child 孩子节点的键
 * @param  string $order 排序显示的键，一般是主键 升序排列
 * @param  array  $list  过渡用的中间数组，
 * @return array        返回排过序的列表数组
 * @author yangweijie <yangweijiester@gmail.com>
 */
function tree_to_list($tree, $child = '_child', $order='id', &$list = array()){
    if(is_array($tree)) {
        $refer = array();
        foreach ($tree as $key => $value) {
            $reffer = $value;
            if(isset($reffer[$child])){
                unset($reffer[$child]);
                tree_to_list($value[$child], $child, $order, $list);
            }
            $list[] = $reffer;
        }
        $list = list_sort_by($list, $order, $sortby='asc');
    }
    return $list;
}


/**
 * 设置跳转页面URL
 * 使用函数再次封装，方便以后选择不同的存储方式（目前使用cookie存储）
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function set_redirect_url($url){
    cookie('redirect_url', $url);
}

/**
 * 获取跳转页面URL
 * @return string 跳转页URL
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_redirect_url(){
    $url = cookie('redirect_url');
    return empty($url) ? __APP__ : $url;
}


/**
 * 时间戳格式化
 * @param int $time
 * @return string 完整的时间显示
 * @author huajie <banhuajie@163.com>
 */
function time_format($time = NULL,$format='Y-m-d H:i'){
    $time = $time === NULL ? NOW_TIME : intval($time);
    return date($format, $time);
}


/**
* 加密
* @param  string $str      需加密字符串
* @return string            加密后的字符串
 */
function password($str){
	return md5($str);
}

/**
 * 功能：获取时间差
 * @param int $time
 * @return string 时间差值
 */
function tranTime($time) {
    $rtime = date("m-d H:i",$time);
    $htime = date("H:i",$time);

    $time = time() - $time;

    if ($time < 60) {
        $str = '刚刚';
    }
    elseif ($time < 60 * 60) {
        $min = floor($time/60);
        $str = $min.'分钟前';
    }
    elseif ($time < 60 * 60 * 24) {
        $h = floor($time/(60*60));
        $str = $h.'小时前 '.$htime;
    }
    elseif ($time < 60 * 60 * 24 * 3) {
        $d = floor($time/(60*60*24));
        if($d==1)
           $str = '昨天 '.$rtime;
        else
           $str = '前天 '.$rtime;
    }
    else {
        $str = $rtime;
    }
    return $str;
}

/**
 * 功能：检测一个字符串是否是邮件地址格式
 * @param string $value    待检测字符串
 * @return boolean
 */
function is_email($value) {
    return preg_match("/^[0-9a-zA-Z]+(?:[\_\.\-][a-z0-9\-]+)*@[a-zA-Z0-9]+(?:[-.][a-zA-Z0-9]+)*\.[a-zA-Z]+$/i", $value);
}

/**
 * 功能：系统邮件发送函数
 * @param string $to    接收邮件者邮箱
 * @param string $name  接收邮件者名称
 * @param string $subject 邮件主题
 * @param string $body    邮件内容
 * @param string $attachment 附件列表
 * @return boolean
 */
function send_mail($to, $name, $subject = '', $body = '', $attachment = null, $config = '') {
    $config = is_array($config) ? $config : C('SYSTEM_EMAIL');

    include_once('./Application/Common/Lib/PHPMailer/PHPMailer.class.php');

    $mail = new \PHPMailer();    //PHPMailer对象
    $mail->CharSet = 'UTF-8';                           //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->IsSMTP();                                   // 设定使用SMTP服务
//    $mail->IsHTML(true);
    $mail->SMTPDebug = 1;                             // 关闭SMTP调试功能 1 = errors and messages2 = messages only
    $mail->SMTPAuth = true;                           // 启用 SMTP 验证功能
    if ($config['smtp_port'] == 465)
        $mail->SMTPSecure = 'ssl';                    // 使用安全协议
    $mail->Helo = 'Hello smtp.qq.com Server';
    $mail->Host = $config['smtp_host'];                // SMTP 服务器
    $mail->Port = $config['smtp_port'];                // SMTP服务器的端口号
    $mail->Username = $config['smtp_user'];           // SMTP服务器用户名
    $mail->Password = $config['smtp_pass'];           // SMTP服务器密码
    $mail->SetFrom($config['from_email'], $config['from_name']);
    $replyEmail = $config['reply_email'] ? $config['reply_email'] : $config['from_email'];
    $replyName = $config['reply_name'] ? $config['reply_name'] : $config['from_name'];
    $mail->AddReplyTo($replyEmail, $replyName);
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $mail->AddAddress($to, $name);
    if (is_array($attachment)) { // 添加附件
        foreach ($attachment as $file) {
            if (is_array($file)) {
                is_file($file['path']) && $mail->AddAttachment($file['path'], $file['name']);
            } else {
                is_file($file) && $mail->AddAttachment($file);
            }
        }
    } else {
        is_file($attachment) && $mail->AddAttachment($attachment);
    }
    return $mail->Send() ? true : $mail->ErrorInfo;
}


function reformArr($arr,$primary='id'){
    foreach ($arr as $key => $val) {
       $list[$val[$primary]] = $val;
    }
    unset($arr);
    return $list;
}

//
function setChecked($status,$defualt=1){
	if($status==$defualt){
		return 'checked="checked"';
	}else{
		return '';
	}
}

function get_category_attr($id=0, $arr=array(), $attr='name'){
	return $arr[$id][$attr];
}

function get_category_text($value='',$arr=array()){
	$str = array();
	$idArr = explode(',', $value);
	foreach ($idArr as $key => $val) {
		$str[] = $arr[$val]['name'];
	}
	return implode('、', $str);
}

function get_thumb($path='',$prefix='thumb_'){
    if(empty($path)) return false;
    return preg_replace("/([\w]+\.)/is", $prefix."$1", $path);
}


function del_thumb($path='',$prefix='thumb'){
    if(empty($path)) return false;
    if(file_exists('.'.$path)){
        @unlink('.'.$path);
    }

    $thumb = get_thumb($path);
    if(file_exists('.'.$thumb)){
        @unlink('.'.$thumb);
    }
    return true;
}

function get_house_category_name($id){
    $categoryArr = F('house_category_arr');
    if(empty($categoryArr)){
        return $houseCategoryName = M('HouseCategory')->where('id='.$id)->getField('name');
    }
    return $categoryArr[$id]['name'];
}



//判断是否是手机访问
function check_wap() {
     if (isset($_SERVER['HTTP_VIA'])) return true;
     if (isset($_SERVER['HTTP_X_NOKIA_CONNECTION_MODE'])) return true;
     if (isset($_SERVER['HTTP_X_UP_CALLING_LINE_ID'])) return true;
     if (strpos($_SERVER['HTTP_USER_AGENT'],"MicroMessenger")) return true;

     $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte");
    $is_mobile = false;
    foreach ($mobile_agents as $val) {//这里把值遍历一遍，用于查找是否有上述字符串出现过
       if (stristr($user_agent, $val)) { //stristr 查找访客端信息是否在上述数组中，不存在即为PC端。
            $is_mobile = true;
            break;
        }
    }
    return $is_mobile;
}



?>