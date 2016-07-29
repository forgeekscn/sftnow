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
  
	public function getsolution(){
		
		$this->display(":solution");
	}

	public function getProduct(){

		$this->display(":product");
	}



	  function test(){
	  	$data=date('Y-m-d H:i:s',strtotime('+1 day'));
			  	// $this->show($data);
		$Verify = new \Think\Verify();
		$Verify->entry(1);

	    
	     $verify->check($code, $id);
 
	  }
	function testdata(){

		$data=D("Product/PluginProductItem");
		// $condition['LastUpdateTime']=array('ELT',date('Y-m-d H:i:s'));
		// $rs=$data-> where( $condition)->select();

		// $rs=$data->table('cmf_plugin_product_category')->alias('c')->join('cmf_plugin_product_item  p ON c.Id=p.CategoryId')->select();
		// $rs=$data->field( 'Id , sum(Id) as sum' )->select();
		$rs=$data->field(true)->select();
		$result=json_encode($rs);
	    $this->show($result);

	}
	 

}