<?php
namespace News\Controller;
use Common\Controller\HomebaseController;
class IndexController extends HomebaseController{

	public function  getTrends(){

		$this->display(":trends");
	}
	public function getNews(){
		$this->display(":news");
	}

	 

}