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

	function getnum(){
		// $this->show(100);
		// $this->fetch(":product");
		// $this->display("");
		// $this->success("success", U('Product/index/getdata',array('categoryId'=>'3')) ,1) ;
		// $this->error("error",0); 
		$url="".U('News/index/getnews',array('newsId'=>'1') );
		$this->redirect(U('News/index/getnews',array('newsId'=>'1','url'=>$url) ) );
	}
  
  function test(){
  	$this->show("test function");
  }
	public function getsolution(){
		
		$this->display(":solution");
	}

	public function getProduct(){

		$this->display(":product");
	}

	 

}