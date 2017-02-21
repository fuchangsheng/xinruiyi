<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Lib\Category;
class NewsController extends CommonController {
    protected $tableName = 'News';

    public function index() {
        $M = M("News");
        $Admin = M("Admin");

        $category_id = I('category_id',0);
        $company = trim($_GET['company']);
        $admin_id = trim($_GET['admin_id']);

        $categoryList = D('News')->getCategoryList();
        $adminArr = F('admin_list');
        $statusArr = array('1'=>'已审核', '2'=>'未审核');

		if (IS_GET){
			$keyword = trim($_GET['keyword']);

            if(!empty($category_id)){
                $map['category_id'] = $category_id;
            }

			if(!empty($cidArr)) $map['category_id'] = array('in',$cidArr);
			if(!empty($keyword)) $map['title'] = array('like','%'.$keyword.'%');
            if(!empty($admin_id)) {
                $map['user_id'] = $admin_id;
            }else{
                if(!empty($company)){
                    $user_id = $Admin->where( array('company'=>$company) )->getField('id');
                    $map['user_id'] = $user_id;
                }
            }


        }

        $count = $M->where($map)->count();
        $Page       = new \Think\Page($count,25);
        $showPage = $Page->show();
        $this->assign("page", $showPage);
        $list = $M->where($map)->order('update_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $val) {
            $list[$key]['categoryName'] = $categoryList[$val['category_id']]['name'];
            $list[$key]['admin'] = $adminArr[$val['user_id']]['username'];
        }
        $this->assign('list',$list);
        $this->assign('category_list',$categoryList);
        $this->display();
    }

    public function category() {
        if (IS_POST) {
            echo json_encode(D("News")->category());
        } else {
            $this->assign("list", D("News")->category());
            $this->display();
        }
    }

    public function add() {
        if (IS_POST) {
            $id = I('id');
            if(!$id){
                echo json_encode(D("News")->add());
            }else{
                echo json_encode(D("News")->edit());
            }
        } else {
            $id = I('id');
            $info = array();
            if($id){
                $M = M('News');
                $Content = M('NewsContent');
                $info = $M->find($id);
                $info['content'] = $Content->where('id='.$id)->getField('content');

                if(!empty($info['house_id'])){
                    $info['houseName'] = D('House')->getInfo($info['house_id'],'name');
                }
            }
            $this->assign("info", $info);
            $this->assign("list", D("News")->category());
            $this->display();
        }
    }

    /*
        审核
     */
    public function shenhe(){

        $News = M('News');

        if(IS_POST){
            $id = I('post.id');
            $status = I('post.status');
            $News->where( array('id'=>$id) )->setField('status',$status);
            echo json_encode(array("status" => 1, "info" => "操作成功！"));
            exit;
        }
        $id = I('get.id');
        $info = $News->find($id);
        $this->assign('info',$info);
        $this->display();
    }

    public function checkNewsTitle() {
        $M = M("News");
        $where = "title='" . $this->_get('title') . "'";
        if (!empty($_GET['id'])) {
            $where.=" And id !=" . (int) $_GET['id'];
        }
        if ($M->where($where)->count() > 0) {
            echo json_encode(array("status" => 0, "info" => "已经存在，请修改标题"));
        } else {
            echo json_encode(array("status" => 1, "info" => "可以使用"));
        }
    }

	public function detail(){
		$id = $_REQUEST['id'];
		$where['id'] = $id;
		$this->assign("info", D("News")->detail($where));
		$this->display();
	}

    public function del() {
        $News = M("News");
        $ids = I('post.ids');
        $map['id'] = array('in',$ids);

        if ($News->where($map)->delete()) {
            $result = array("status"=>1,"info"=>"成功删除",'url'=>'');
        } else {
            $result = array("status"=>0,"info"=>"删除失败，可能是不存在该ID的记录");
        }
        $this->ajaxReturn($result);
        exit;
    }

    /*
        统计
     */
    public function tongji(){
        $Admin = M('Admin');
        $News = M('News');

        $keyword = trim($_GET['keyword']);
        $company = trim($_GET['company']);
        $admin_id = trim($_GET['admin_id']);


        if (IS_GET){
            if(!empty($keyword)) $map['username'] = $keyword;
            if(!empty($company)) $map['company'] = $company;
            if(!empty($admin_id)) $map['id'] = $admin_id;
        }


        $admin_list = $Admin->where($map)->order('role_id ASC')->select();
        foreach ($admin_list as $key => $val) {
            $admin_list[$key]['total'] = $News->where( array('user_id'=>$val['id']) )->count();
            $admin_list[$key]['status1'] = $News->where( array('user_id'=>$val['id'],'status'=>1) )->count();
            $admin_list[$key]['status2'] = $News->where( array('user_id'=>$val['id'],'status'=>2) )->count();
            $admin_list[$key]['status0'] = $News->where( array('user_id'=>$val['id'],'status'=>0) )->count();
        }

        $this->assign('admin_list',$admin_list);
        $this->display();
    }


    public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = '文章统计'.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        vendor("PHPExcel.PHPExcel");

        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    /**
     *
     * 导出Excel
     */
    function daochu(){//导出Excel
        $xlsName  = "User";
        $xlsCell  = array(
            array('id','序号'),
            array('username','名字'),
            array('company','单位'),
            array('total','文章总数'),
            array('status1','审核成功'),
            array('status2','审核失败'),
            array('status0','未审核')
        );

        $Admin = M('Admin');
        $News = M('News');

        $keyword = trim($_GET['keyword']);
        $company = trim($_GET['company']);
        $admin_id = trim($_GET['admin_id']);


        if (IS_GET){
            if(!empty($keyword)) $map['username'] = $keyword;
            if(!empty($company)) $map['company'] = $company;
            if(!empty($admin_id)) $map['id'] = $admin_id;
        }


        $admin_list = $Admin->where($map)->order('role_id ASC')->select();
        foreach ($admin_list as $key => $val) {
            $admin_list[$key]['total'] = $News->where( array('user_id'=>$val['id']) )->count();
            $admin_list[$key]['status1'] = $News->where( array('user_id'=>$val['id'],'status'=>1) )->count();
            $admin_list[$key]['status2'] = $News->where( array('user_id'=>$val['id'],'status'=>2) )->count();
            $admin_list[$key]['status0'] = $News->where( array('user_id'=>$val['id'],'status'=>0) )->count();
        }

        foreach ($admin_list as $k => $v) {
            $admin_list[$k]['sex']=$v['sex']==1?'男':'女';
        }
        $this->exportExcel($xlsName,$xlsCell,$admin_list);

    }



}