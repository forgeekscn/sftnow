<?php

namespace News\Controller;
use Common\Controller\AdminbaseController;
 

class AdminIndexController extends AdminbaseController{


	public function index(){

		 
	}

	protected $categoryModel;
	protected $newsItemModel;
	protected $newsFromWorldModel;
	 

	function _initialize(){

		parent::_initialize();
		$this->categoryModel=D("News/PluginArticleCategory");
		$this->newsItemModel=D("News/PluginArticleItem");
		$this->newsFromWorldModel=D("News/PluginArticleItem");

		
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
