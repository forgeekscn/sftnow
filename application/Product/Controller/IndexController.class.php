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
		$data['CategoryId']="".$categoryId;
		$result=$this->productModel->where($data)->order('Id')->select();
		// $rs= $this->u2u( json_encode($result) );
		// $rs=$this->u2u("何超");
		$json=json_encode($result);
		$rs=preg_replace("#\\\u([0-9a-f]+)#ie","iconv('UCS-2','UTF-8', pack('H4', '\\1'))",$json);

		echo json_encode("aaa", JSON_UNESCAPED_UNICODE);
	}

  

	function u2u($str){
		return preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2LE', 'UTF-8', pack('H4', '\\1'))", $str);
	}

	public function getsolution(){

		$this->display(":solution");
	}

	public function getProduct(){

		$this->display(":product");
	}

	 

}