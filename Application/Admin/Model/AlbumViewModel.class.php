<?php
// Article视图模型

class AlbumViewModel extends ViewModel {
    protected $viewFields = array(
        'HouseAlbum'=>array('house_id,type_id,keywords,description,status,default,name', 'id'=>'album_id', '_type'=>'LEFT'),
        'Userfiles'=>array('*','id'=>'file_id', 'sort'=>'file_sort', '_on'=>'HouseAlbum.file_id=Userfiles.id'),
    );
}
?>