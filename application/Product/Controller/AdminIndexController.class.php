<?php
namespace Product\Controller;
use Common\Controller\AdminbaseController;
class AdminIndexController extends AdminbaseController{

	protected $productModel;

	function _initialize(){

		parent::_initialize();
		$this->productModel=D("Product/PluginProductItem");
		
	}

	function editE(){

		$this->display(":edit");
		// if($id==''){
		// 	$this->display("error");
		// }
		// else {
		// 	$this->assign("id",$id);
		// 	$this->display(":edit");

		// }
	}
	// }


	public function delete($id){

		if($id==''){
			$this->display("error");
		}else{

			$query=$this->productModel->where("Id=$id")->select();
			if(count($query)>0){
				// $this->productModel->where("Id=$id")->delete();
				$productE=$this->productModel->where("CategoryId=3")->select();
				$this->assign("productE",$productE);
				$this->display(":productEL");
			}
		}
	}

	public function productE(){

		// $pageIndex=$_POST['PageIndex'];

		// if($_POST['PageIndex']==null){
		// 	$pageIndex=1;
		// }

		$term=$_POST['term'];
		$keyword=$_POST['keyword'];


		$data['CategoryId']='3';
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

		// print_r($productE);
		$this->display(":productEL");
	}


	function add(){
		

		$this->display(":add");




	}

	function add_post(){

		$data["Title"]=$_POST["Title"];
		$data["ExtendContent01"]=$_POST["ExtendContent01"];
		$data["Content"]=$_POST["Content"];
		$data["ExtendContent03"]=$_POST["ExtendContent03"];
		$data["ExtendContent02"]=$_POST["ExtendContent02"];
		$data["CategoryId"]='3';
		
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
		
		$term=$_POST['term'];
		$keyword=$_POST['keyword'];
		$data1['CategoryId']='3';
		if($term!=0 && $term!=null){
			$data1['ExtendContent01']=$term;
		}
		if($keyword!=null){
			$data1['Content']=array('like', "%".$keyword."%");

		} 
		$productE=$this->productModel->order('Id')->where($data1)->page(1,5)->select();

		$count      =$this->productModel->where($data1)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出

		$extendcontent01s=$this->productModel->distinct(true)->field('extendcontent01')->select();
		$this->assign("productE",$productE);
		$this->assign("extendcontent01s",$extendcontent01s);

		// print_r($productE);
		$this->display(":productEL");


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
