<?php
namespace Product\Controller ;
use Common\Controller\HomebaseController;
use Common\Model\CommonModel;

class IndexController extends HomebaseController{

	
	function productE(){

	}

	public function getsolution(){

		$this->display(":solution");
	}

	public function getProduct(){

		$this->display(":product");
	}

	 

}