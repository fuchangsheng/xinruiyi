<?php

class PictureModel extends Model {
	protected $tableName = 'Userfiles';
	protected $pathPrefix = './Uploads';

    public function index($where='', $firstRow = 0, $listRows = 20) {
        $M = M($this->tableName);
        $list = $M->where($where)->field()->order("id DESC")->limit("$firstRow , $listRows")->select();
        foreach ($list as $key => $val) {
        	$list[$key]['path'] = $this->pathPrefix.$val['path'];
        	$list[$key]['thumb'] = $this->getThumb($list[$key]['path']);
        }
        return $list;
    }

	public function addPic(){
		$M = M($this->tableName);
		if($_FILES['path']['error']===0){
			$fileList = $this->upload();
			$fileInfo = $fileList[0];
			if(!empty($fileInfo['error'])){
				$result = array('status'=>0,'info'=>$fileInfo['error']);
				echo json_encode($result);
				exit;
			}
			$data['path'] = $fileInfo['savepath'].$fileInfo['savename'];
			$data['size'] = $fileInfo['size'];
		}

		$id = I('id');
		$filename = I('filename');
		$data['filename'] = !empty($filename) ? $filename : $fileInfo['name'];

		$data['uid'] = 1;
		$data['uname'] = 'admin';
		$data['type'] = 'image';
		$data['sort'] = I('sort');
		$data['category'] = I('category');
		$data['create_time'] = NOW_TIME;
		if(empty($id)){
			$addId = $M->add($data);
			if(!empty($addId)){
				$result = array('status'=>1,'info'=>'图片上传成功！','url'=>$Think.__URL__.'/index/');
			}else{
				$result = array('status'=>0,'info'=>'图片上传失败！');
			}
			echo json_encode($result);
			exit;
		}else{
			if($data['path']){
				$info = $this->detail();
				if(file_exists($info['path'])){
					unlink ($info['path']);
				}
				if(file_exists($info['thumb'])){
					unlink ($info['thumb']);
				}
			}
			$M->where('id='.$id)->save($data);
			$result = array('status'=>1,'info'=>'成功更新图片！','url'=>$Think.__URL__.'/index/');
			echo json_encode($result);
			exit;
		}

		return array('status' => $status, 'info' =>$info);
	}

	public function delPic(){
		$M = M($this->tableName);
		$id = I('id');
		$info = $this->detail();
		$num = $M->where('id='.$id)->delete();
		if(!empty($num)){
			if(file_exists($info['path'])){
				unlink ($info['path']);
			}
			if(file_exists($info['thumb'])){
				unlink ($info['thumb']);
			}
			return array('status' => 1, 'info' =>'删除成功！');
		}else{
			return array('status' => 0, 'info' =>'删除失败！');
		}
	}

	public function typeList($where='', $firstRow = 0, $listRows = 20){
		$M = M("PictureType");
        $list = $M->where($where)->order('sort')->select();
        return $list;
	}

	public function addType(){
		$M = M("PictureType");
		$id		= $_POST['id'];
		$data['name']	= $_POST['name'];
		$data['sort']	= !empty($_POST['sort']) ? $_POST['sort'] : 0;
		if(empty($id)){
			$addId = $M->add($data);
			if(!empty($addId)){
				return array('status' => 1, 'info' =>'添加成功！');
			}else{
				return array('status' => 0, 'info' =>'添加失败');
			}
		}else{
			$M->where('id='.$id)->save($data);
			return array('status' => 1, 'info' =>'更新成功！');
		}
	}

	public function delType(){

	}


	public function getTypeList(){
		$M = M('PictureType');
		$list = $M->select();
		return $list;
	}

  	public function upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  $this->pathPrefix.'/userfiles/'.date('Ym').'/';// 设置附件上传目录
		$upload->thumb = true;
		$upload->thumbMaxWidth = '50,200';
		$upload->thumbMaxHeight = '50,200';

		if(!$upload->upload()) {// 上传错误提示错误信息
			$info[0]['error'] = $upload->getErrorMsg();
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			foreach ($info as $key => $val) {
				$info[$key]['savepath'] = substr($val['savepath'],strlen($this->pathPrefix));
			}
		}
		return $info;
	}

	public function detail($id){ 
		$M = M($this->tableName);
		$map['id'] = !empty($id) ? $id : I('id');
		$info = $M->where($map)->find();
		$info['path'] = $this->pathPrefix.$info['path'];
		$info['thumb'] = $this->getThumb($info['path']);
		return $info;
	}

	public function getThumb($path=''){
		$arr = explode('/', $path);
		$len = count($arr);
		$arr[$len-1] = 'thumb_'.$arr[$len-1];
		return implode('/', $arr);
	}

	public function category(){
		$arr = array(
			'1' => 'news'
			);
		return $arr;
	}


	public function apiAdd($name='file'){
		if($_FILES['file']['error']===0){
			$fileList = $this->upload();
			$fileInfo = $fileList[0];
			if(!empty($fileInfo['error'])){
				return $fileInfo;
			}
			$data['path'] = $fileInfo['savepath'].$fileInfo['savename'];
			$data['size'] = $fileInfo['size'];
			$data['filename'] = $fileInfo['name'];
			$data['uid'] = 1;
			$data['uname'] = 'admin';
			$data['type'] = 'image';
			$data['sort'] = I('sort');
			$data['category'] = I('category');
			$data['create_time'] = NOW_TIME;
			$M->add($data);
			return $data;
		}else{
			return false;
		}
	}
}

?>
