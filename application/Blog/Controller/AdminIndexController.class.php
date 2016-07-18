<?php

namespace Blog\Controller;
use Common\Controller\AdminbaseController;

class AdminIndexController extends AdminbaseController{
	public function index(){
		echo 'this is adminindexcontroller ...';
	}

	public function passage(){
		$this->assign('passage','here is my passage');
		$this->display();
		
    }

	public function type(){

		echo 'this is types...';
	}


}