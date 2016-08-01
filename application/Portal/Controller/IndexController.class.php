<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 首页
 */
class IndexController extends HomebaseController {
	

	protected $newsModel;
    //首页
	public function index() {
		 

		 

		$this->newsModel=D("News/PluginArticleItem");
		$newslist1=$this->newsModel->where("CategoryId='5'")->order("LastUpdateTime desc")->limit('4')->select();
		$this->assign("newslist1",$newslist1);
		
		$newslist2=$this->newsModel->where("CategoryId='6'")->order("LastUpdateTime desc")->limit('4')->select();
		$this->assign("newslist2",$newslist2);


    	$this->display(":index");
    }

    //测试方法
    public function test(){
			
		// $this->getMenu();
		// $this->getAbout();
		// $this->getNews();、
		$this->getProduct();
		// $this->getService();
		// $this->getHR();
		// $this->getContact();

    }

    function getContact(){

    	//http://www.sftnow.com/Contact/9.aspx
    	$list = array(
    		'0' => array('filename'=>'/Contact/9.html','linked'=>'http://www.sftnow.com/Contact/9.aspx'),
    		'1' => array('filename'=>'/Contact/12.html','linked'=>'http://www.sftnow.com/Contact/12.aspx')

    	);  
	 
    	foreach ($list as $value) {
			$content = file_get_contents($value['linked']);
			$content = str_replace('.aspx', '.html', $content );
			$content = str_replace('.axd', '', $content );
			$content = str_replace('//', '/', $content );
			// echo "<br/><br/><br/>".$content;
			
			// $fp = fopen($value['filename'],"w+");
			// fwrite($fp,$content);
			$this->saveFile($content ,$value['filename']);
    	}
    }
    function getHR(){
    	//http://www.sftnow.com/HR/3.aspx
    	$list = array(
    		'0' => array('filename'=>'/HR/3.html','linked'=>'http://www.sftnow.com/HR/3.aspx'),
    		'1' => array('filename'=>'/HR/9.html','linked'=>'http://www.sftnow.com/HR/9.aspx'),
    		'2' => array('filename'=>'/HR/10.html','linked'=>'http://www.sftnow.com/HR/10.aspx')

    	);  
	 
    	foreach ($list as $value) {
			$content = file_get_contents($value['linked']);
			$content = str_replace('.aspx', '.html', $content );
			$content = str_replace('.axd', '', $content );
			$content = str_replace('//', '/', $content );
			// echo "<br/><br/><br/>".$content;
			
			// $fp = fopen($value['filename'],"w+");
			// fwrite($fp,$content);
			$this->saveFile($content ,$value['filename']);
    	}
    }

	//获取服务详情页
    function getService(){
    	$list = array(
    		'0' => array('filename'=>'/Service/15.html','linked'=>'http://www.sftnow.com/Service/15.aspx'),
    		'1' => array('filename'=>'/Service/16.html','linked'=>'http://www.sftnow.com/Service/16.aspx'),
    		'2' => array('filename'=>'/Service/14.html','linked'=>'http://www.sftnow.com/Service/14.aspx'),
    		'3' => array('filename'=>'/Service/4.html','linked'=>'http://www.sftnow.com/Service/4.aspx'),
    		'4' => array('filename'=>'/Service/9.html','linked'=>'http://www.sftnow.com/Service/9.aspx')

    	);  
	 
    	foreach ($list as $value) {
			$content = file_get_contents($value['linked']);
			$content = str_replace('.aspx', '.html', $content );
			$content = str_replace('.axd', '', $content );
			$content = str_replace('//', '/', $content );
			// echo "<br/><br/><br/>".$content;
			
			// $fp = fopen($value['filename'],"w+");
			// fwrite($fp,$content);
			$this->saveFile($content ,$value['filename']);
    	}
    }

    //获取产品列表
    function getProduct(){

    	$list = array(
    		
    	); 

    	for($i=53;$i<=63;$i++){
    		//http://www.sftnow.com/Products/3/53.aspx
    		$linked='http://www.sftnow.com/Products/3/'.$i.'.aspx' ;
    		$filename='/Products/'.$i.'.html';
    		$list[]=array('filename'=>$filename,'linked'=>$linked);
	 		
    	}
    	 $list[]=array('filename'=>'/Products/3-2.html','linked'=>'http://www.sftnow.com/Products/3-2.aspx');
    		
    		// print_r($list);
	 
    	foreach ($list as $value) {
			$content = file_get_contents($value['linked']);
			$content = str_replace('.aspx', '.html', $content );
			$content = str_replace('.axd', '', $content );
			$content = str_replace('//', '/', $content );
			// echo "<br/><br/><br/>".$content;
			
			// $fp = fopen($value['filename'],"w+");
			// fwrite($fp,$content);
			$this->saveFile($content ,$value['filename']);
    	}

    	//http://www.sftnow.com/Products/8.aspx
    }

    function getNews(){

    	$list = array(
    		'0' => array('filename'=>'/News/5.html','linked'=>'http://www.sftnow.com/News/5.aspx'),
    		'1' =>   array('filename'=>'/News/6.html','linked'=>'http://www.sftnow.com/News/6.aspx')
    	); 
    	for($i=2;$i<=11;$i++){
    		$linked='http://www.sftnow.com/News/5-'.$i.'.aspx' ;
    		$filename='/News/5-'.$i.'.html';
    		$list[]=array('filename'=>$filename,'linked'=>$linked);
	 		
    	}
    	for($i=2;$i<=5;$i++){
    		$linked='http://www.sftnow.com/News/6-'.$i.'.aspx' ;
    		$filename='/News/6-'.$i.'.html';
    		$list[]=array('filename'=>$filename,'linked'=>$linked);
	 		
    	}
    		
    		// print_r($list);
	 
    	foreach ($list as $value) {
			$content = file_get_contents($value['linked']);
			$content = str_replace('.aspx', '.html', $content );
			$content = str_replace('.axd', '', $content );
			$content = str_replace('//', '/', $content );
			// echo "<br/><br/><br/>".$content;
			
			// $fp = fopen($value['filename'],"w+");
			// fwrite($fp,$content);
			$this->saveFile($content ,$value['filename']);
    	}


    }
	//获取关于我们的详细页
    function getAbout(){

    	$aboutList = array(
    		'0' => array('filename'=>'/About/3.html','linked'=>'http://www.sftnow.com/About/3.aspx'),
    		'1' =>  array('filename'=>'/About/4.html','linked'=>'http://www.sftnow.com/About/4.aspx'),
    		'2' =>  array('filename'=>'/About/17.html','linked'=>'http://www.sftnow.com/About/17.aspx'),
    		'3' => array('filename'=>'/About/5.html','linked'=>'http://www.sftnow.com/About/5.aspx'),
    		'4' =>  array('filename'=>'/About/6.html','linked'=>'http://www.sftnow.com/About/6.aspx'),
    		'5' =>  array('filename'=>'/About/10.html','linked'=>'http://www.sftnow.com/About/10.aspx'),
    		'6' =>  array('filename'=>'/About/21.html','linked'=>'http://www.sftnow.com/About/21.aspx'),
			'7' =>  array('filename'=>'/About/19.html','linked'=>'http://www.sftnow.com/About/19.aspx'),

    	);//http://www.sftnow.com/About/19.aspx
	 
	 
    	foreach ($aboutList as $value) {
			$content = file_get_contents($value['linked']);
			$content = str_replace('.aspx', '.html', $content );
			$content = str_replace('.axd', '', $content );
			$content = str_replace('//', '/', $content );
			// echo "<br/><br/><br/>".$content;
			
			// $fp = fopen($value['filename'],"w+");
			// fwrite($fp,$content);
			$this->saveFile($content ,$value['filename']);
    	}
    }

    //抓取首页菜单
    function getMenu(){

		$menulist = array(
    		'0' => array('filename'=>'/index.html','linked'=>'http://www.sftnow.com'),
    		'1' => array('filename'=>'/About/Default.html','linked'=>'http://www.sftnow.com/About/Default.aspx'),
    		'2' => array('filename'=>'/News/Default.html','linked'=>'http://www.sftnow.com/News/Default.aspx'),
    		'3' => array('filename'=>'/Products/Default.html','linked'=>'http://www.sftnow.com/Products/Default.aspx'),
    		'4' => array('filename'=>'/Products/Default.html','linked'=>'http://www.sftnow.com/Products/Default.aspx'),
    		'5' => array('filename'=>'/Solution/10.html','linked'=>'http://www.sftnow.com/Solution/10.aspx'),
    		'6' => array('filename'=>'/Service/Default.html','linked'=>'http://www.sftnow.com/Service/Default.aspx'),
    		'7' => array('filename'=>'/HR/Default.html','linked'=>'http://www.sftnow.com/HR/Default.aspx'),
    		'8' => array('filename'=>'/Contact/Default.html','linked'=>'http://www.sftnow.com/Contact/Default.aspx')
    	);
	 
	 
    	foreach ($menulist as $value) {
			$content = file_get_contents($value['linked']);
			$content = str_replace('.aspx', '.html', $content );
			$content = str_replace('.axd', '', $content );
			$content = str_replace('//', '/', $content );
			// echo "<br/><br/><br/>".$content;
			
			// $fp = fopen($value['filename'],"w+");
			// fwrite($fp,$content);
			$this->saveFile($content ,$value['filename']);
    	}
    }

	//保存静态页面方法
	function saveFile($content,$filename ){

		preg_match("#/[A-Za-z]+/#i",$filename, $matches);
		// echo $matches[0];
		$dir= "F://hechao/wampp/wamp/www".$matches[0];
		// echo $dir."<br/>";
		//无法创建目录
		// if(!file_exists($dir)){
		// 	mkdir($dir,0777);
		// 	echo $result;
		// 	// echo $dir." is created.<br/>";
		// }

		$filename="F://hechao/wampp/wamp/www".$filename;
		// $fp = fopen($filename,"w+");
		file_put_contents($filename, $content);
		// fwrite($fp,$content);
		// fclose($fp);
		echo ''.$filename.' saved '.'<br/>';
	}


    /*
    public function test1(){
    	$menu = array(
    		'0' => array(''=>'index.html','linked'=>'http://www.sftnow.com'),
    		'1' => array('filename'=>'/About/Default.html','linked'=>'http://www.sftnow.com/About/Default.aspx'),
    		'2' => array('filename'=>'/About/3.html','linked'=>'http://www.sftnow.com/About/3.aspx'),
    		'3' => array('filename'=>'/News/Default.aspx','linked'=>'http://www.sftnow.com/News/Default.aspx'),
    		'4' => array('filename'=>'/Products/Default.aspx','linked'=>'http://www.sftnow.com/Products/Default.aspx'),
    		'5' => array('filename'=>'/Solution/10.aspx','linked'=>'http://www.sftnow.com/Solution/10.aspx'),
    		'6' => array('filename'=>'/Service/Default.aspx','linked'=>'http://www.sftnow.com/Service/Default.aspx'),
    		'7' => array('filename'=>'index.html','linked'=>'http://www.sftnow.com/'),
    		'8' => array('filename'=>'index.html','linked'=>'http://www.sftnow.com/'),
    		'9' => array('filename'=>'index.html','linked'=>'http://www.sftnow.com/'),
    		);
    	foreach ($menu as $value) {
			$content = file_get_contents($value['linked']);
			$content = str_replace('.aspx', '.html', $content );
			//qudiao tupian
			//生成html文件，路径为 $value['filename']
    	}

			$content = file_get_contents('http://www.sftnow.com/News/Default.aspx'));
    	//分类采集
    	for(){
			$content = file_get_contents('http://www.sftnow.com/News/5-'.$a.'.aspx'));
			$content = str_replace('.aspx', '.html', $content );
    	}
    	for(){
			$content = file_get_contents('http://www.sftnow.com/News/5-'.$a.'.aspx'));
			$content = str_replace('.aspx', '.html', $content );
    	}
    	for(){
			$content = file_get_contents('http://www.sftnow.com/Products/5-'.$a.'.aspx'));
			$content = str_replace('.aspx', '.html', $content );
    	}

		$idList = D("atriclt")->filed('id,CategoryId')->select();//取整站文章ID
		foreach ($idList as $value) {
			$path = 'News';
			$product = array();/产品分类ID
			if(in_array($value['CategoryId'], $product)){
				$path = 'Products';
			}
			$filepath = $path.'/'.$value['CategoryId'].'/'.$value['CategoryId'];
			$content = file_get_contents('http://www.sftnow.com/'.$filepath.'.aspx');
			$content = str_replace($filepath.'.html', '.html', $content );
			//qudiao tupian
			//生成html文件，路径为 $value['filename']
    	}

		$filename="F://www/index.html";
		$fp = fopen($filename,"w+");
		fwrite($fp,$homepage);
		fclose($fp);
    }
	*/		
}


