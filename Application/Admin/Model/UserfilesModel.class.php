<?php
namespace Admin\Model;
use Think\Model;
class UserfilesModel extends Model {
    protected $tableName = 'Userfiles';

    public function add(){

    }

    public function getFileIdArr(){
        $filesInfo = $this->upload();
        if($filesInfo){
            $files = array();
            foreach ($filesInfo as $key => $val) {
                $files[$key]['path'] = substr($val['savepath'],strlen('./Uploads')).$val['savename'];
                $files[$key]['thumb'] = substr($val['savepath'],strlen('./Uploads')).'thumb_'.$val['savename'];
                $files[$key]['size'] = $val['size'];
                $files[$key]['filename'] = $val['name'];
                $files[$key]['uid'] = 1;
                $files[$key]['uname'] = 'admin';
                $files[$key]['type'] = 'image';
                $files[$key]['sort'] = 0;
                $files[$key]['category'] = 'Userfiles';
                $files[$key]['create_time'] = NOW_TIME;
            }
            $Userfiles = M('Userfiles');
            $startId = $Userfiles->addAll($files);
            return $idArr = range($startId,$startId+count($files)-1);
        }else{
            return false;
        }
    }


    public function upload_api(){

    }

    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  '/Uploads/';// 设置附件上传目录3
        $upload->autoSub  = true;
        $upload->subName  = array('date','Ym');
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            $this->success('上传成功！');
        }
    }


    public function upload2(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  './Uploads/userfiles/'.date('Ymd').'/';// 设置附件上传目录
        $upload->thumb = true;
        $upload->thumbMaxWidth = '50,200';
        $upload->thumbMaxHeight = '50,200';

        if(!$upload->upload()) {// 上传错误提示错误信息
            $error = $upload->getErrorMsg();
            return false;
        }else{// 上传成功 获取上传文件信息

            $filesInfo =  $upload->getUploadFileInfo();
            import('ORG.Util.Image');
            $Image = new Image();
            foreach ($filesInfo as $key => $val) {
                $path = $val['savepath'].$val['savename'];
                $thumb = $val['savepath'].'thumb_'.$val['savename'];
                $Image->water($path,'./Public/images/mlogo.png');
                $Image->water($thumb,'./Public/images/mlogo.png');
            }


            return $filesInfo;
        }
    }

}

?>
