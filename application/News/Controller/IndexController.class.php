<?php
namespace News\Controller;
use Common\Controller\HomebaseController;
class IndexController extends HomebaseController{

	public function  getTrends(){

		$this->display(":trends");
	}
	public function getNews(){
		// $id="".$_GET['newsId'];
		// $url="".$_GET['url'];
		// $this->show($id." --  ".$url);
		$this->display(":news");
	}

	 

}