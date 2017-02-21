<?php
namespace Admin\Controller;
use Think\Controller;
class AdvertController extends CommonController {

	public function index(){
		$M = M("Advert");


		if(IS_POST){
			$table = I('post.table');
			foreach ($table as $key => $val) {
				$M->where('id='.$key)->setField('sort',$val);
			}
			$result = array('status'=>1, 'info'=>'更新成功！', 'url'=>U('advert/index'));
        	$this->ajaxReturn($result);
			exit;
		}
		//初始化
		$statusArr = array('0'=>'禁用', 1=>'启用');
		$keyword = I('get.keyword');
		$place = I('get.place');
		$map = array();
		if(!empty($keyword)){
			$map['name'] = array('like','%'.$keyword.'%');
		}
		if(!empty($place)){
			$map['place'] = $place;
		}

        $count = $M->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);

        $list = $M->where($map)->order('place ASC, sort ASC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {
        	$place = D('Advert')->getPlace($val['place']);
        	$list[$key]['placename'] = $place['name'];
        	$list[$key]['status'] = $statusArr[$val['status']];
        }
        $this->assign('list',$list);
        $this->assign('place_list',D('Advert')->getPlace());
		$this->display();
	}

	public function add(){
		if(IS_POST){
			$M = M('Advert');

			$data = array();
			$id = I('post.id');
			$data['name'] = I('post.name');
			$data['place'] = I('post.place');
			$data['url'] = I('post.url');
			$data['file_type'] = I('post.file_type');
			$data['status'] = I('post.status');
			$data['sort'] = I('post.sort');
			$data['remark'] = I('post.remark');
			$data['update_time'] = NOW_TIME;
			if($_FILES['file']['error']==0 && !empty($_FILES)){
				$upload = new \Think\Upload();// 实例化上传类
	            $upload->maxSize   =     3145728 ;// 设置附件上传大小
	            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','swf');// 设置附件上传类型
	            $upload->savePath =  '/ad/';// 设置附件上传目录3

	            $upload->autoSub  = true;
	            $upload->subName  = false;
	            $info   =   $upload->uploadOne($_FILES['file']);
	            if($info) {
	            	$data['file'] = '/Uploads'.$info['savepath'].$info['savename'];

	            	//如果是更新
	            	if($id){
	            		$oldfile = $M->where('id='.$id)->getField('file');
	            		$fullpath = '.'.$oldfile;
	            		if(file_exists($fullpath)){
	            			unlink($fullpath);
	            		}
					}
	         	}else{
	         		// 上传错误提示错误信息
		            $result = array('status'=>0,'info'=>$upload->getError());
		            $this->ajaxReturn($result);
					exit;
	            }
			}


			if($id){
				$M->where('id='.$id)->save($data);
				$result = array('status'=>1, 'info'=>'更新成功！', 'url'=>U('advert/index',array('place'=>$data['place'])));
			}else{
				$data['create_time'] = NOW_TIME;
				$M->add($data);
				$result = array('status'=>1, 'info'=>'添加成功！', 'url'=>U('advert/index',array('place'=>$data['place'])));
			}


			$this->ajaxReturn($result);
			exit;
		}

		$id = I('get.id');
		if($id){
			$M = M('Advert');
			$info = $M->where('id='.$id)->find();
			$this->assign('info',$info);
		}
		$this->assign('place_list',D('Advert')->getPlace());
		$this->display();
	}

	public function del(){
		$Advert = M("Advert");
		$id = I('id');
		$map['id'] = array('in',$id);
		$info = $Advert->where($map)->find();
        if (!empty($info)) {
        	$Advert->where($map)->delete();
        	$fullpath = '.'.$info['file'];
    		if(file_exists($fullpath)){
    			unlink($fullpath);
    		}
            $result = array('status'=>1, 'info'=>'成功删除！');
        } else {
            $result = array('status'=>0, 'info'=>'删除失败，可能是不存在该ID的记录');
        }

        $this->ajaxReturn($result);
        exit;
    }

	public function place(){
		if(IS_POST){
			$M = M("AdvertPlace");
			$data = array();
			$table = I('post.table');

			foreach ($table as $key => $val) {
				$M->where('id='.$key)->setField('sort',$val);
			}

			$result = array('status'=>1, 'info'=>'成功更新排序', 'url'=>U('advert/place'));
			$this->ajaxReturn($result);
			exit;
		}
		$M = M("AdvertPlace");
        $count = $M->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $M->where($map)->order('sort ASC')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);
		$this->display();
	}

	public function addplace(){
		if(IS_POST){
			$data = array();
			$id = I('post.id');
			$data['placename'] = I('post.placename');
			$data['w'] = I('post.w');
			$data['h'] = I('post.h');
			$data['sort'] = I('post.sort');
			$M = M('AdvertPlace');
			if($id){
				$M->where('id='.$id)->save($data);
				$result = array('status'=>1, 'info'=>'更新成功！', 'url'=>U('advert/place'));
			}else{
				$M->add($data);
				$result = array('status'=>1, 'info'=>'添加成功！', 'url'=>U('advert/place'));
			}
			$this->ajaxReturn($result);
			exit;
		}
		$id = I('get.id');
		if($id){
			$M = M('AdvertPlace');
			$info = $M->where('id='.$id)->find();
			$this->assign('info',$info);
		}
		$this->display('Advert:place_add');
	}

}