<?php
namespace Admin\Controller;
use Think\Controller;
class UserfilesController extends CommonController {

	public function index() {
        $Userfiles = M("Userfiles");

		if (IS_GET){
			$keyword = trim($_GET['keyword']);

            if(!empty($category)){
                $map['category'] = $category;
            }


			if(!empty($cidArr)) $map['category'] = array('in',$cidArr);
			if(!empty($keyword)) $map['title'] = array('like','%'.$keyword.'%');
		}

        $count = $Userfiles->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $Userfiles->where($map)->order('create_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {

        }
        $this->assign('list',$list);

        $this->display();
    }


	public function add(){
		if(IS_POST){
			$result = D('Userfiles')->addPic();
			echo json_encode($result);
		}else{
			$id = I('id');
			if(!empty($id)){
				$M = M('userfiles');
				$map['id'] = $id;
				$info = $M->where($map)->find();
				$this->assign('info',$info);
			}
			$this->display();
		}
	}

	public function del_file(){
		$ids = I('post.ids');

		$Userfiles = M("Userfiles");

		$map['id'] = array('in',$ids);
		$list = $Userfiles->where( $map )->select();
		foreach ($list as $key => $val) {
			del_thumb($val['path']);
		}
		$map = array();
		$map['id'] = array('in',$ids);
		$Userfiles->where( $map )->delete();

		$this->ajaxReturn( array('status'=>1, 'info'=>'删除成功！', 'url'=>U('userfiles/index')) );
	}

	//同步数据
	public function synchronous_data(){
		$dirpath = './Uploads/userfiles/';

		$list = scanfiles($dirpath);

		$Userfiles = M('Userfiles');
		foreach ($list as $key => $val) {
			if(!strstr($val,"thumb")){
				$fileInfo = get_file_info($val);
				$path = substr($val,1);
				$pathinfo = pathinfo($path);

				if(!empty($pathinfo['basename'])){

					$map = array();
					$map['savename'] = $pathinfo['basename'];
					$count = $Userfiles->where( $map )->count();

					if($count==0){
						$data                = array();
						$data['filename']    = $pathinfo['filename'];
						$data['savepath']    = $pathinfo['dirname'];
						$data['savename']    = $pathinfo['basename'];
						$data['ext']         = $pathinfo['extension'];
						$data['type']        = 'images/'.$pathinfo['extension'];
						$data['size']        = $fileInfo['size'];;
						$data['path']        = $path;
						$data['create_time'] = NOW_TIME;
						$data['category']    = 'null';
						$data['remark']    = '系统同步数据';
						$Userfiles->add($data);
					}
				}
			}
		}



		$this->ajaxReturn( array('status'=>1, 'info'=>'同步成功！', 'url'=>U('userfiles/index')) );
	}


	public function delPic(){
		$result = D('Userfiles')->delPic();
		echo json_encode($result);
	}

	public function picType(){
		$this->assign('list',D('Userfiles')->typeList($where, $page->firstRow, $page->listRows));
		$this->display('typeList');
	}

	public function addType(){
		if(IS_POST){
			$result = D('Userfiles')->addType();
			echo json_encode($result);
		}
	}

	public function delType(){

	}


	public function uploadOne(){
		$result = array('status'=>1,'info'=>'上传失败');
		echo json_encode($result);
        exit;
        if (!empty($_FILES)) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath =  '/userfiles/';// 设置附件上传目录3

            $upload->autoSub  = true;
            $upload->subName  = array('date','Ym');
            $info   =   $upload->uploadOne($_FILES['file']);
            if($info) {
         		$data = array('status'=>1,'message'=>'上传成功！');
            	$data['path'] = '/Uploads'.$info['savepath'].$info['savename'];
         	}else{
         		// 上传错误提示错误信息
	            $data = array('status'=>0,'message'=>$upload->getError());
            }
        }else{
        	$data = array('status'=>0,'message'=>'请选择所要上传的文件！');
        }

        $this->ajaxReturn($data);
        exit;
	}

	public function remove(){

	}

	public function toremove(){

	}

	public function uploadimage(){
		if(IS_POST){
			if (!empty($_FILES)) {
	            $upload = new \Think\Upload();// 实例化上传类
	            $upload->maxSize   =     3145728 ;// 设置附件上传大小
	            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	            $upload->savePath =  '/userfiles/';// 设置附件上传目录3

	            $upload->autoSub  = true;
	            $upload->subName  = array('date','Ym');
	            $info   =   $upload->uploadOne($_FILES['path']);

	            if($info) {
	            	$filepath = '/Uploads'.$info['savepath'].$info['savename'];

	            	//生成缩略图
	            	$image = new \Think\Image();
	            	$image->open('.'.$filepath);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
	            	$image->thumb(460, 460)->save('./Uploads'.$info['savepath'].'thumb_'.$info['savename']);


	            	$data = array();
					$data['user_id']     = $_SESSION[C('USER_AUTH_KEY')];
					$data['filename']    = $info['name'];
					$data['savepath']    = $info['savepath'];
					$data['savename']    = $info['savename'];
					$data['ext']         = $info['ext'];
					$data['type']        = $info['type'];;	//为图片
					$data['size']        = $info['size'];
					$data['path']       = $filepath;
					$data['category']    = I('post.category','news');
					$data['aid']         = 0;
					$data['sort']        = 0;
					$data['remark']      = '';
					$data['create_time'] = NOW_TIME;
	            	M('userfiles')->add($data);
	            	$result = array('status'=>1,'info'=>'上传成功！');
	         	}else{
	         		// 上传错误提示错误信息
		            $result = array('status'=>0,'info'=>$upload->getError());
	            }
	         }
			$this->assign('path',$filepath);
			$this->assign('result',$result);
			$this->assign('ok',1);
		}

		$category = I('get.category');
		$this->assign('category',$category);
        $this->display();
    }



	/*

	if(!empty($_FILES)){
            $filesInfo = $this->upload();
            $fileData = $filesInfo[0];
            $files['path'] = substr($fileData['savepath'],strlen('./Uploads')).$fileData['savename'];
            $files['thumb'] = substr($fileData['savepath'],strlen('./Uploads')).'thumb_'.$fileData['savename'];
            $files['size'] = $fileData['size'];
            $files['filename'] = $fileData['name'];
            $files['uid'] = 1;
            $files['uname'] = 'admin';
            $files['type'] = 'image';
            $files['sort'] = 0;
            $files['category'] = 'house';
            $files['create_time'] = NOW_TIME;
            $Userfiles = M('Userfiles');
            $thumbId = $Userfiles->add($files);
            if($thumbId){
                $data['thumb'] = $files['path'];
            }
        }
	 */
}