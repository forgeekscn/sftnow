<?php
namespace Summary\Controller ;
use Common\Controller\HomebaseController;

class IndexController extends HomebaseController{

	public function getSummary(){

		$this->display(":summary");
	}

	public function getCulture(){

		$this->display(":culture");
	}


}