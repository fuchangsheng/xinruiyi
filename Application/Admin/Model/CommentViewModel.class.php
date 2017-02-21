<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class CommentViewModel extends ViewModel {
    protected $viewFields = array(
		'HouseComment'=>array('*','_type'=>'LEFT'),
		'House'=>array('name'=>'house_name', '_on'=>'HouseComment.house_id=House.id')

	);

}

?>
