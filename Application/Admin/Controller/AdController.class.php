<?php
namespace Admin\Controller;
use Think\Controller;
class AdController extends CommonController {
	private $M = '';
	public function _initialize(){

	}

	public function index(){
		$this->display();
	}

}