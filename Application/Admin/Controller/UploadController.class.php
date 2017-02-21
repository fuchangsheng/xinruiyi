<?php
namespace Admin\Controller;
use Think\Controller;
class UploadController extends Controller {
    function index(){
		$data['session_tem']=session_id();
		$this->assign('data',$data);
		$this->display();
    }

	function upload(){

		$upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  '/temp/';// 设置附件上传目录3

        $upload->autoSub  = true;
        $upload->subName  = '';
        $info   =   $upload->uploadOne($_FILES['Filedata']);
		if($info){
			$filepath = '/Uploads'.$info['savepath'].$info['savename'];

			$image = new \Think\Image(); $image->open('.'.$filepath);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
			$image->thumb(360, 360)->save('./Uploads'.$info['savepath'].'thumb_'.$info['savename']);

			$result = array('status'=>1,'info'=>'上传成功！','path'=>$filepath, 'data'=>$info);
			echo json_encode($result);
			exit;
		}else{
			$result = array('status'=>0,'info'=>$upload->getError());
			echo json_encode($result);
			exit;
		}
	}

	function save(){
		/*相册封面，根据自己需求写业务逻辑代码*/
		$cover=I('post.cover');
		/*上传的图片处理，根据自己需求写业务逻辑代码*/
		$album=explode(',',trim(I('post.album'),','));
		foreach($album as $k =>$v){
			if(!in_array($v,$list)){
				$t=explode('+',$v);
				$tmp=explode('/',$t[0]);
				$num=count($tmp)-1;
				$str=$tmp[$num];
				$n[]=array('title'=>$t[1],'src'=>$t[0],'src_thumb'=>str_replace($str,'thumb_'.$str,$t[0]),'date'=>NOW_TIME);
			}
		}
		dump($n);
		if(!empty($n)){
			//M('img')->AddAll($n);
		}
	}

	function del(){
		/*删除图片*/
		$t=urldecode(I('post.path'));
		$t1=explode('+',$t);
		$src=$t1[0];
		$tmp=explode('/',$src);
		$num=count($tmp)-1;
		$str=$tmp[$num];
		$thumb = str_replace($str,'thumb_'.$str ,$src);
		@unlink('.'.$src);
		@unlink('.'.$thumb);
	}

}