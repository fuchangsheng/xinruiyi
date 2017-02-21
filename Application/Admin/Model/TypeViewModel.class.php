<?php
// Article视图模型

class TypeViewModel extends ViewModel {
    protected $viewFields = array(
        'HouseType'=>array('house_id,"type",keywords,description,status,name', 'id'=>'housetype_id', '_type'=>'LEFT'),
        'Userfiles'=>array('*','id'=>'file_id', 'sort'=>'file_sort', '_on'=>'HouseType.file_id=Userfiles.id'),
    );
}
?>