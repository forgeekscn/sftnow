<?php

namespace News\Controller;
use Common\Controller\AdminbaseController;
 

class AdminIndexController extends AdminbaseController{


	

	protected $categoryModel;
	protected $newsItemModel;
	protected $newsFromWorldModel;
	 
	public function index(){

		 
	}
	function _initialize(){

		parent::_initialize();
		$this->categoryModel=D("News/PluginArticleCategory");
		$this->newsItemModel=D("News/PluginArticleItem");
		$this->newsFromWorldModel=D("News/PluginArticleItem");

		
	}




	function add(){
		$categoryid=$_GET['categoryId'];
		if($categoryid=='5'){
			$this->display(":addFC");
		}else if($categoryid=='6'){
			$this->display(":addFW");
		}


	}

	function add_post(){


		$data['Content']=htmlspecialchars_decode($_POST['content']);
		$data["Title"]=$_POST["title"];
		 
		$data["Author"]=get_current_admin_id();
		$data["CategoryId"]=$_POST["CategoryId"];
		$data["CreateTime"]=date("Ymd");
		$data["LastTime"]=date("Ymd");
		print_r($data['Content']);

		// $config = array(
		// 	'maxSize'    =>    3145728,
		// 	'rootPath'   =>    './public/UploadFiles/Images/admin',
		// 	'savePath'   =>    '',
		// 	'saveName'   =>    array('uniqid',''),
		// 	'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
		// 	'autoSub'    =>    true,
		// 	'subName'    =>    array('date','Ymd'),
		// );
		// $upload = new \Think\Upload($config);// 实例化上传类

		// $info   =   $upload->uploadOne($_FILES['photo']);
	 //    // if(!$info) {// 上传错误提示错误信息
	 //    //     $this->error($upload->getError());
	 //    // }else{// 上传成功 获取上传文件信息
	 //    // echo $info['savepath'].$info['savename'];
	 //    $data["ImageUrl"]= "/UploadFiles/Images//admin".date("Ymd") ."/".$info['savename'];
	 //    // /UploadFiles/Images//admin/201304/02.jpg.axd
	 //    // }

	 //    $idQuery=$this->productModel->field(' MAX(Id) ')->find();
	 //    $id=$idQuery['max(id)'];
	 //     $id=intval($id)+1;
	 //    $data["Id"]=$id;
		// $productE=$this->productModel->add($data);
		
 		$this->redirect("AdminIndex/newsFC");
	}




	function newsFC(){
		$this->getdata('5');
		$this->display(":newsFC");
	}

	function newsFW(){
		$this->getdata('6');
		$this->display(":newsFW");
	}
	function getdata($categoryId){
 


		$term=$_POST['term'];
		$keyword=$_POST['keyword'];


		$data['CategoryId']=$categoryId;
		if($term!=0 && $term!=null){
			$data['Title']=$term;

		}
		if($keyword!=null){
			$data['Content']=array('like', "%".$keyword."%");
		} 
		$newslist=$this->newsItemModel->where($data)->order('Id')->page($_GET['p'],5)->select();

		$count      =$this->newsItemModel->where($data)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
 
		$this->assign("newslist",$newslist);
		 

	}

	public function newsFromCompany(){

		/*
			数据库取出所有公司新闻
			
		*/

		$newsItemResult=$this->newsItemModel->where("CategoryId=5")->select();
		$this->assign("newsItemResult",$newsItemResult);
		 
		$categoryResult=$this->categoryModel->where("1=1")->select();
		$this->assign("categoryModel",$categoryResult);

		$this->display("AdminIndex:newsFromCompany");
	}

	public function newsFromWorld(){


		$newsFromWorldModel=$this->newsFromWorldModel->where("CategoryId=6")->select();
		$this->assign("newsFromWorldModel",$newsFromWorldModel);
		$this->display("AdminIndex:newsFromWorld");

	}

	 

}
