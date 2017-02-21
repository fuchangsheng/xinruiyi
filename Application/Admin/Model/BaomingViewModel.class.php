<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class BaomingViewModel extends ViewModel {
    protected $viewFields = array(
		'HouseBaoming'=>array('*','_type'=>'LEFT'),
		'House'=>array('name'=>'house_name', '_on'=>'HouseBaoming.house_id=House.id')

	);

}

?>
