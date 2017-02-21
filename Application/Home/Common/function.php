<?php
/*******************************************************************************
* [LQBCMS] LQBCMS
* @Copyright (C) 2014-2015  http://www.lqbcms.com   All rights reserved.
* @Team  lqbcms.com
* @Author: 码农 QQ:252588119
* @Licence http://www.lqbcms.com/license.txt
*******************************************************************************/

function get_ad_list($place=0, $limit=3){
    $Advert = M('Advert');
    $map['place'] = $place;
    $map['status'] = 1;
    $list = $Advert->where($map)->order('sort ASC')->limit($limit)->select();
    $html = '';
    foreach ($list as $key => $val) {

        if($val['file_type']==2){
            $html .= '<div style="width:1200px;margin:0 auto;padding-top:5px;">'.
               '<embed style="padding: 0px; height:70px; width:100%"  src="'.$val['file'].'"  type="application/x-shockwave-flash" wmode="transparent" quality="high"></embed>'.
            '</div>';
        }else{
            $html .= '<div style="width:1200px;margin:0 auto;padding-top:5px;">'.
               '<a href="'.$val['url'].'" target="_bank" title="'.$val['name'].'">'.
                    '<img src="'.$val['file'].'">'.
                '</a>'.
            '</div>';
        }

    }
    echo $html;
}

function get_ad_list2($place=0, $limit=3){
    $Advert = M('Advert');
    $map['place'] = $place;
    $map['status'] = 1;
    $list = $Advert->where($map)->order('sort ASC')->limit($limit)->select();
    $html = '';
    foreach ($list as $key => $val) {
        $html .= '<a class="list-a" target="_blank" href="'.$val['url'].'" '.$style.'><img src="'.$val['file'].'" alt="'.$val['name'].'" /></a>';
    }
    echo $html;
}

function get_ad_list3($place=0, $limit=3){
    $Advert = M('Advert');
    $map['place'] = $place;
    $map['status'] = 1;
    $list = $Advert->where($map)->order('sort ASC')->limit($limit)->select();
    $html = '';
    foreach ($list as $key => $val) {
        $html .= '<a class="banner-a banner-3" target="_blank" href="'.$val['url'].'"><img src="'.$val['file'].'" alt="'.$val['name'].'"></a>';
    }
    echo $html;
}

function get_ad_list4($place=0, $limit=3){
    $Advert = M('Advert');
    $map['place'] = $place;
    $map['status'] = 1;
    $list = $Advert->where($map)->order('sort ASC')->limit($limit)->select();
    $html = '';
    foreach ($list as $key => $val) {
        $html .= '<li> <a target="_blank" href="'.$val['url'].'"><img src="'.$val['file'].'" alt="'.$val['name'].'"></a> </li>';
    }
    echo $html;
}

function get_ad_show($place=0){
    $Advert = M('Advert');
    $map['place'] = $place;
    $info = $Advert->where($map)->order('sort ASC')->find();
    $html = '';
    $html .= '<a class="top-a" target="_blank" href="'.$info['url'].'"><img src="'.$info['file'].'" alt="'.$info['name'].'"></a>';
    echo $html;
}

function get_ad_info($id=0, $field=''){
    $Advert = M('Advert');
    $info = $Advert->where( array('id'=>$id) )->find();
    if(!empty($field)) return $info[$field];
    return $info;
}
?>