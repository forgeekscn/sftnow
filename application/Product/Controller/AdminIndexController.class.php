<?php
namespace Product\Controller;
use Common\Controller\AdminbaseController;
class AdminIndexController extends AdminbaseController{

	protected $productModel;

	function _initialize(){

		parent::_initialize();
		$this->productModel=D("Product/PluginProductItem");
		
	}

	function edit(){

		$id="".$_GET['id'];
		$categoryId="".$_GET['categoryId'];

		// $data["Id"]=$id;
		// $data["CategoryId"]=$categoryId;
		$product=$this->productModel->where("Id=$id")->find();
		$this->assign("product",$product);
		if($categoryId=='3'){
			$this->display(":edit");
		}else if($categoryId=='4'){
			$this->display(":editW");
		}else if($categoryId=='5'){
			$this->display(":editG");
		}else if($categoryId=='7'){
			$this->display(":editC");
		}else if($categoryId=='10'){
			$this->display(":editS");
		}else {

		}


	}
	 
	 function edit_post(){
	 	 
	 	$data["CategoryId"]=$_POST["categoryid"];
		$data["Title"]=$_POST["Title"];
		$data["ExtendContent01"]=$_POST["ExtendContent01"];
		$data["Content"]=$_POST["Content"];
		$data["ExtendContent03"]=$_POST["ExtendContent03"];
		$data["ExtendContent02"]=$_POST["ExtendContent02"];
		
		
		$config = array(
			'maxSize'    =>    3145728,
			'rootPath'   =>    './public/UploadFiles/Images/admin',
			'savePath'   =>    '',
			'saveName'   =>    array('uniqid',''),
			'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
			'autoSub'    =>    true,
			'subName'    =>    array('date','Ymd'),
		);
		$upload = new \Think\Upload($config);// 实例化上传类
		 
		$info   =   $upload->uploadOne($_FILES['photo']);
	    // if(!$info) {// 上传错误提示错误信息
	    //     $this->error($upload->getError());
	    // }else{// 上传成功 获取上传文件信息
	         // echo $info['savepath'].$info['savename'];
	    $data["ImageUrl"]= "/UploadFiles/Images//admin".date("Ymd") ."/".$info['savename'];
	         // /UploadFiles/Images//admin/201304/02.jpg.axd
	    // }

	    // $idQuery=$this->productModel->field(' MAX(Id) ')->find();
	    // $id=$idQuery['max(id)'];
	    //  $id=intval($id)+1;
	    // $data["Id"]=$id;
	   $id=$_POST["id"];

		$productE=$this->productModel->where("id=%s",array($id))->save($data);
		
		if($_POST["categoryid"]=='3'){
	 		$this->redirect("AdminIndex/productE");
		}else if($_POST["categoryid"]=='4'){
	 		$this->redirect("AdminIndex/productW");
		}else if($_POST["categoryid"]=='5'){
 			$this->redirect("AdminIndex/productG");
		}else if($_POST["categoryid"]=='10'){
 			$this->redirect("AdminIndex/ProductSolution");
		}else if($_POST["categoryid"]=='7'){
 			$this->redirect("AdminIndex/productC");
		}

	 }


	public function deleteW($id){

		if($id==''){
			$this->display("error");
		}else{

			$query=$this->productModel->where("Id=$id")->select();
			if(count($query)>0){
				$this->productModel->where("Id=$id")->delete();
				$this->redirect("AdminIndex/ProductW");
				 
			}
		}
	}

	public function delete($id){

		if($id==''){
			$this->display("error");
		}else{

			$query=$this->productModel->where("Id=$id")->select();
			if(count($query)>0){
				$this->productModel->where("Id=$id")->delete();

				if($_GET['categoryId']=='4'){
					$this->redirect("AdminIndex/ProductW");
				}else if ($_GET['categoryId']=='3') {
					$this->redirect("AdminIndex/ProductE");
				}else if($_GET['categoryId']=='5'){
					$this->redirect("AdminIndex/ProductG");
				}else if($_GET['categoryId']=='7'){
					$this->redirect("AdminIndex/ProductC");
				}else if($_GET['categoryId']=='10'){
					$this->redirect("AdminIndex/ProductSolution");
				}

				
			}
		}
	}

	function addW(){
		$this->display(":addW");

	}


	public function productW(){
		$this->getProductData('4');
		$this->display(":productW");
	
	}
	public function productE(){
 
		$this->getProductData('3');
		$this->display(":productEL");
	}


	function ProductG(){
		$this->getProductData('5');
		$this->display(":productG");
	}

	public function getProductData($categoryId){

		$term=$_POST['term'];
		$keyword=$_POST['keyword'];


		$data['CategoryId']=$categoryId;
		if($term!=0 && $term!=null){
			$data['Title']=$term;

		}
		if($keyword!=null){
			$data['Content']=array('like', "%".$keyword."%");
		} 
		$productE=$this->productModel->where($data)->order('Id')->page($_GET['p'],5)->select();

		$count      =$this->productModel->where($data)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('header','共 %TOTAL_ROW% 条记录');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','尾页');

		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出

		$Titles=$this->productModel->distinct(true)->field('Title')->select();
		$this->assign("productE",$productE);
		$this->assign("Titles",$Titles);
	}


	function add(){
		$categoryid=$_GET['categoryId'];
		if($categoryid=='3'){
			$this->display(":add");
		}else if($categoryid=='4'){
			$this->display(":addW");
		}else if($categoryid=='5'){
			$this->display(":addG");
		}else if($categoryid=='7'){
			$this->display(":addC");
		}else if($categoryid=='10'){
			$this->display(":addS");
		}
		

		




	}
	function addW_post(){

		$data["Title"]=$_POST["Title"];
		$data["ExtendContent01"]=$_POST["ExtendContent01"];
		$data["Content"]=$_POST["Content"];
		$data["ExtendContent03"]=$_POST["ExtendContent03"];
		$data["ExtendContent02"]=$_POST["ExtendContent02"];
		$data["CategoryId"]='4';
		
		$config = array(
			'maxSize'    =>    3145728,
			'rootPath'   =>    './public/UploadFiles/Images/admin',
			'savePath'   =>    '',
			'saveName'   =>    array('uniqid',''),
			'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
			'autoSub'    =>    true,
			'subName'    =>    array('date','Ymd'),
		);
		$upload = new \Think\Upload($config);// 实例化上传类

		$info   =   $upload->uploadOne($_FILES['photo']);
	    // if(!$info) {// 上传错误提示错误信息
	    //     $this->error($upload->getError());
	    // }else{// 上传成功 获取上传文件信息
	         // echo $info['savepath'].$info['savename'];
	         $data["ImageUrl"]= "/UploadFiles/Images//admin".date("Ymd") ."/".$info['savename'];
	         // /UploadFiles/Images//admin/201304/02.jpg.axd
	    // }

	    $idQuery=$this->productModel->field(' MAX(Id) ')->find();
	    $id=$idQuery['max(id)'];
	     $id=intval($id)+1;
	    $data["Id"]=$id;
		$productE=$this->productModel->add($data);
		
 		$this->redirect("AdminIndex/productW");
		 

	}
	public function add_post(){

		$categoryid="".$_POST['categoryId'];
		$this->datapost($categoryid);
  		
  		if($categoryid=='3'){
  			$this->redirect("AdminIndex/ProductE");
  		}else if($categoryid=='4'){
  			$this->redirect("AdminIndex/ProductW");
  		}else if($categoryid=='5'){
  			$this->redirect("AdminIndex/ProductG");
  		}else if($categoryid=='5'){
  			$this->redirect("AdminIndex/ProductC");
  		}else if($categoryid=='10'){
  			$this->redirect("AdminIndex/ProductSolution");
  		}else {
  			// $this->redirect("AdminIndex/ProductE");
  		}
		

 
	}
 
 

	public function datapost($categoryId){
		$data["CategoryId"]=$categoryId;
		$data["Title"]=$_POST["Title"];
		$data["ExtendContent01"]=$_POST["ExtendContent01"];
		$data["Content"]=$_POST["Content"];
		$data["ExtendContent03"]=$_POST["ExtendContent03"];
		$data["ExtendContent02"]=$_POST["ExtendContent02"];
		
		
		$config = array(
			'maxSize'    =>    3145728,
			'rootPath'   =>    './public/UploadFiles/Images/admin',
			'savePath'   =>    '',
			'saveName'   =>    array('uniqid',''),
			'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
			'autoSub'    =>    true,
			'subName'    =>    array('date','Ymd'),
		);
		$upload = new \Think\Upload($config);// 实例化上传类

		$info   =   $upload->uploadOne($_FILES['photo']);
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功 获取上传文件信息
	         // echo $info['savepath'].$info['savename'];
	         $data["ImageUrl"]= "/UploadFiles/Images//admin".date("Ymd") ."/".$info['savename'];
	         // /UploadFiles/Images//admin/201304/02.jpg.axd
	    }

	    $idQuery=$this->productModel->field(' MAX(Id) ')->find();
	    $id=$idQuery['max(id)'];
	     $id=intval($id)+1;
	    $data["Id"]=$id;
		$productE=$this->productModel->add($data);
		
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
 
	}

 




	function ProductSolution(){
		$this->getProductData('10');
		$this->display(":productSolution");
	}

	function ProductC(){
		$this->getProductData('7');
		$this->display(":productC");
	}

	function ProductOther(){
		$this->getProductData('10');
		$this->display(":productOther");
	}

}
