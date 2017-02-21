<?php
namespace Admin\Model;
use Think\Model;
class AdvertModel extends Model {
    protected $tableName = 'Advert';

    public function getPlace($pid=0){
        $list = array();
        $list[1]['id'] = 1;
        $list[1]['name'] = '顶部幻灯片';
        $list[1]['w'] = 2000;
        $list[1]['h'] = 141;

        $list[2]['id'] = 2;
        $list[2]['name'] = '快速通道';
        $list[2]['w'] = 250;
        $list[2]['h'] = 60;

/*
        $list[3]['id'] = 3;
        $list[3]['name'] = '首页(幻灯片下（大）)';
        $list[3]['w'] = 1200;
        $list[3]['h'] = 60;

        $list[4]['id'] = 4;
        $list[4]['name'] = '首页(幻灯片右)';
        $list[4]['w'] = 1200;
        $list[4]['h'] = 60;

        $list[5]['id'] = 5;
        $list[5]['name'] = '首页(超值推荐)';
        $list[5]['w'] = 1200;
        $list[5]['h'] = 60;

        $list[6]['id'] = 6;
        $list[6]['name'] = '首页通栏（四）';
        $list[6]['w'] = 1200;
        $list[6]['h'] = 60;*/

        if(!empty($pid)){
        	return $list[$pid];
        }else{
        	return $list;
        }
    }

}

?>
