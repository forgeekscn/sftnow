<?php
namespace Product\Controller ;
use Common\Controller\HomebaseController;
use Common\Model\CommonModel;

class IndexController extends HomebaseController{

	protected $productModel;

	function _initialize(){
		parent::_initialize();
		$this->productModel=D("Product/PluginProductItem");
	}


	function getdata($categoryId){
		 
		$this->assign("categoryId",$categoryId); 
		$this->display(":product");

	}

  
	public function getsolution(){
		$this->display(":solution");
	}

	public function getProduct(){
		$this->display(":product");
	}

	 

}