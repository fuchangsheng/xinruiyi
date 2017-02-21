<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class CepingViewModel extends ViewModel {
    protected $viewFields = array(
		'HouseCeping'=>array('*','_type'=>'LEFT'),
		'House'=>array('name', '_on'=>'HouseCeping.house_id=House.id')

	);

}

?>
