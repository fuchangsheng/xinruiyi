<?php
/*******************************************************************************
* [LQBCMS] LQBCMS
* @Copyright (C) 2014-2015  http://www.liqingbo.cn   All rights reserved.
* @Team  liqingbo.cn
* @Author: 码农 QQ:252588119
* @Licence http://www.liqingbo.cn/license.txt
*******************************************************************************/


function url_nav($controller=''){
    $url_model = C('URL_MODEL');
    switch ($url_model) {
        case 2:
            $url =   '/'.$controller;
            break;
        case 1:
            $url =   '/index.php/'.$controller;
            break;
        default:
            $url = '';
            break;
    }
    return $url;
}

function url_house_show($house_id=0,$action='show'){
    if(empty($house_id)) return false;
    $url_model = C('URL_MODEL');
    switch ($url_model) {
        case 2:
            $url =   '/house/'.$action.'-'.$house_id.'.html';
            break;
        case 1:
            $url =   '/house/'.$action.'/id/'.$house_id;
            break;
        default:
            $url = '';
            break;
    }
    return $url;
}

function url_news_list($cid=0){
    $url_model = C('URL_MODEL');
    if(empty($cid)){
        $url = '/news/';
    }else{
        switch ($url_model) {
            case 2:
                $url =   '/news/list-'.$cid.'.html';
                break;
            case 1:
                $url =   '/news/index/cid/'.$cid;
                break;
            default:
                $url = '';
                break;
        }
    }
    return $url;
}

function url_news_show($id=0,$action='show'){
    if(empty($id)) return false;
    $url_model = C('URL_MODEL');
    switch ($url_model) {
        case 2:
            $url =   '/news/'.$action.'-'.$id.'.html';
            break;
        case 1:
            $url =   '/news/'.$action.'/id/'.$id;
            break;
        default:
            $url = '';
            break;
    }
    return $url;
}


function url_special_list($cid=0){
    $url_model = C('URL_MODEL');
    if(empty($cid)){
        $url = '/special/';
    }else{
        switch ($url_model) {
            case 2:
                $url =   '/special/list-'.$cid.'.html';
                break;
            case 1:
                $url =   '/special/index/cid/'.$cid;
                break;
            default:
                $url = '';
                break;
        }
    }
    return $url;
}

function url_special_show($id=0,$action='show'){
    if(empty($id)) return false;
    $url_model = C('URL_MODEL');
    switch ($url_model) {
        case 2:
            $url =   '/special/'.$action.'-'.$id.'.html';
            break;
        case 1:
            $url =   '/special/'.$action.'/id/'.$id;
            break;
        default:
            $url = '';
            break;
    }
    return $url;
}

function url_product_list($cid=0){
    $url_model = C('URL_MODEL');
    if(empty($cid)){
        $url = '/product/';
    }else{
        switch ($url_model) {
            case 2:
                $url =   '/product/list-'.$cid.'.html';
                break;
            case 1:
                $url =   '/product/index/cid/'.$cid;
                break;
            default:
                $url = '';
                break;
        }
    }
    return $url;
}

function url_product_show($id=0,$action='show'){
    if(empty($id)) return false;
    $url_model = C('URL_MODEL');
    switch ($url_model) {
        case 2:
            $url =   '/product/'.$action.'-'.$id.'.html';
            break;
        case 1:
            $url =   '/product/'.$action.'/id/'.$id;
            break;
        default:
            $url = '';
            break;
    }
    return $url;
}


function url_case_list($cid=0){
    $url_model = C('URL_MODEL');
    if(empty($cid)){
        $url = '/case/';
    }else{
        switch ($url_model) {
            case 2:
                $url =   '/case/list-'.$cid.'.html';
                break;
            case 1:
                $url =   '/case/index/cid/'.$cid;
                break;
            default:
                $url = '';
                break;
        }
    }
    return $url;
}

function url_case_show($id=0,$action='show'){
    if(empty($id)) return false;
    $url_model = C('URL_MODEL');
    switch ($url_model) {
        case 2:
            $url =   '/case/'.$action.'-'.$id.'.html';
            break;
        case 1:
            $url =   '/case/'.$action.'/id/'.$id;
            break;
        default:
            $url = '';
            break;
    }
    return $url;
}




function url_singlepage_show($id=0,$action='show'){

    if(empty($id)) return false;
    $url_model = C('URL_MODEL');
    switch ($url_model) {
        case 2:
            $url =   '/singlepage/'.$action.'-'.$id.'.html';
            break;
        case 1:
            $url =   '/singlepage/'.$action.'/id/'.$id;
            break;
        default:
            $url = '';
            break;
    }
    return $url;
}



?>