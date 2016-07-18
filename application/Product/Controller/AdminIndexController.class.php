<?php
namespace Product\Controller;
use Common\Controller\AdminbaseController;
class AdminIndexController extends AdminbaseController{

	protected $productModel;

	function _initialize(){

		parent::_initialize();
		$this->productModel=D("Product/PluginProductItem");
		
	}

	// function edit($id=''){

	// 	if($id==''){
	// 		$this->display("error");
	// 	}
	// 	else {
	// 		$this->assign("id",$id);
	// 		$this->display(":edit");

	// 	}

	// }


	// function delete($id=''){
	
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

	function add(){
		$this->display(":add");
	}

	function ProductE(){
		$productE=$this->productModel->where("CategoryId=3")->select();

		$this->assign("productE",$productE);
		$this->display(":productE");
	}










//bsdasdsdasds
	function unicode_decode($name)  
	{  
	    // 转换编码，将Unicode编码转换成可以浏览的utf-8
		$pattern = '/([\w]+)|(\\\u([\w]{4}))/i';  
		preg_match_all($pattern, $name, $matches);  
		if (!empty($matches))  
		{  
			$name = '';  
			for ($j = 0; $j < count($matches[0]); $j++)  
			{  
				$str = $matches[0][$j];  
				if (strpos($str, '\\u') === 0)  
				{  
					$code = base_convert(substr($str, 2, 2), 16, 10);  
					$code2 = base_convert(substr($str, 4), 16, 10);  
					$c = chr($code).chr($code2);  
					$c = iconv('UCS-2', 'UTF-8', $c);  
					$name .= $c;  
				}  
				else  
				{  
					$name .= $str;  
				}  
			}  
		}  
		return $name;  
	}  

	function unicode_to_utf8($unicode_str) {
		$utf8_str = '';
		$code = intval(hexdec($unicode_str));
	    //这里注意转换出来的code一定得是整形，这样才会正确的按位操作
		$ord_1 = decbin(0xe0 | ($code >> 12));
		$ord_2 = decbin(0x80 | (($code >> 6) & 0x3f));
		$ord_3 = decbin(0x80 | ($code & 0x3f));
		$utf8_str = chr(bindec($ord_1)) . chr(bindec($ord_2)) . chr(bindec($ord_3));
		return $utf8_str;
	}

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