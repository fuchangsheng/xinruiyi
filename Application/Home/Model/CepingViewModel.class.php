<?php

namespace Home\Model;

use Think\Model\ViewModel;

class CepingViewModel extends ViewModel {

    protected $viewFields = array(

		'HouseCeping'=>array('*','_type'=>'LEFT'),

		'House'=>array('name','thumb','price_qj','price_jj','description','area','id'=>'house_id', '_on'=>'HouseCeping.house_id=House.id'),

		'Assessor'=>array('name'=>'assessor','avatar','title','intro', '_on'=>'HouseCeping.user_id=Assessor.id')



	);



}



?>

