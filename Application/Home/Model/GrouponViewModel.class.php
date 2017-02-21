<?php
namespace Home\Model;
use Think\Model\ViewModel;
class GrouponViewModel extends ViewModel {
    protected $viewFields = array(
		'Groupon'=>array('*','_type'=>'LEFT'),
		'House'=>array('name','thumb','price_qj','price_jj','id'=>'house_id', '_on'=>'Groupon.house_id=House.id')

	);

}

?>
