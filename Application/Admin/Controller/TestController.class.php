<?php
namespace Admin\Controller;
use Think\Db;
use COM\Database;
use Think\Controller;
class TestController extends Controller {
    public function index(){
        D('House')->updateCategoryCaceh();
    }

    
}