<?php
namespace Product\Controller;
use Common\Controller\AdminbaseController;
class AdminIndexController extends AdminbaseController{

	protected $productModel;

	function _initialize(){

		parent::_initialize();
		$this->productModel=D("Product/PluginProductItem");
		
	}

	// function edit($id){

	// 	if($id==''){
	// 		$this->display("error");
	// 	}
	// 	else {
	// 		$this->assign("id",$id);
	// 		$this->display(":edit");

	// 	}

	// }


	// function delete($id){
	
	// 	if($id==''){
	// 		$this->display("error");
	// 	}else{

	// 		$query=$this->productModel->where("Id=$id")->select();
	// 		if(count($query)>0){
	// 			$this->productModel->where("Id=$id")->delete();
	// 			$this->display(":productE");
	// 		}


	// 	}

	// }

	function productE(){
		$productE=$this->productModel->where("CategoryId=3")->select();
		$this->assign("productE",$productE);
		// print_r($productE);
		$this->display(":productEL");
	}

	
	function add(){
		$this->display(":add");
	}

	function ProductEl(){

		$productE=$this->productModel->where("CategoryId=3")->select();

		// $this->assign("productE",$productE);
		$this->display(":productE");
	}






//asdasda



	

	function getProductEJson(){
		$productE=$this->productModel->where("CategoryId=3")->select();
	  	  // print_r( $productE[0] );
		$json= array ();

		foreach ($productE as $product) {
	 		// print_r($product['title']);
			$title=$product['title'];
			$content=$product['content'];
			$item = array (
				"product_name" => $title,
				"product_summary"=> $content,
				"product_series" => $product["extendcontent01"],
				"product_advantage" => $product["extendcontent02"],
				"product_property" => $product["extendcontent03"],
				"property_type" => $product["extendcontent04"]

				);
			$json[]=$item;	
		}



		print_r(json_encode($json, JSON_UNESCAPED_UNICODE) ) ;


		// for ($i= 0;$i< count($productE); $i++){
		// 	for($j= 0;$j< count($productE[$i]); $j++){

		// 		$str= $json['id'];
		// 		print_r($str);

		// 	}
		// }

	 // 	$json='{"item1":{"item11":{"n":"chenling","m":"llll"},"sex":"www.111cn.net","age":"25"},
	 // 			"item2":{"item21":"ling","sex":"女","age":"24"}}';
		// //$J=json_decode($json);
		// print_r($productE); 

	}


	function ProductW(){
		$productW=$this->productModel->where("CategoryId=4")->select();
		$this->assign("productW",$productW);
		$this->display(":productW");
	}

	function ProductG(){
		$productG=$this->productModel->where("CategoryId=5")->select();
		$this->assign("productG",$productG);
		$this->display(":productG");
	}



	function ProductSolution(){
		$ProductSolution=$this->productModel->where("CategoryId=10")->select();
		$this->assign("productSolution",$ProductSolution);
		$this->display(":productSolution");
	}

	function ProductC(){
		$productC=$this->productModel->where("CategoryId=7")->select();
		$this->assign("productC",$productC);
		$this->display(":productC");
	}

	function ProductOther(){
		$ProductOther=$this->productModel->where("1=1")->select();
		$this->assign("productOther",$ProductOther);
		$this->display(":productOther");
	}

}
