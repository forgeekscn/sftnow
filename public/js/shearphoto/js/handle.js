window.ShearPhoto.MINGGE(function() {
		var relativeUrl= SHEAR.PATH_RES+"/shearphoto";//by rainfer,相对路径
		var avatarUrl= SHEAR.PATH_AVATAR;//by rainfer,头像路径
	    relativeUrl = relativeUrl.replace(/(^\s*)|(\s*$)/g, "");//去掉相对路径的所有空格
        relativeUrl === "" || (relativeUrl += "/");//在相对地址后面加斜框，不需要用户自己加
		var publicRelat= document.getElementById("relat");     //"relat"对像     
	    var publicRelatImg=publicRelat.getElementsByTagName("img");  //"relat"下的两张图片对像   
	    var Shear = new ShearPhoto;
        Shear.config({			     	
			relativeUrl:relativeUrl,  //取回相对路径
			avatarUrl:avatarUrl,//by rainfer,头像路径
			traverse:true,//可选 true,false 。 是否在拖动或拉伸时允许历遍全图（是否让大图动呢）,
			translate3d:false,  //是否开启3D移动，CPU加速。可选true  false。默认关闭的
			HTML5:true,//可选 true,false  是否使用HTML5进行切图
			HTML5MAX:500, //默认请设0 (最大尺寸做事)， HTML上传截图最大宽度， 宽度越大，HTML5截出来的图片容量越大，服务器压力就大，截图就更清淅
			HTML5Quality:0.9,	//截好的截图  0至1范围可选（可填小数）   HTML5切图的质量   为1时 最高	
			HTML5FilesSize:50,      //如果是HTML5切图时，选择的图片不能超过多少，单位M
			HTML5Effects:true,//是否开启图片特效功能给用户  可选true false,  提示：有HTML5浏览器才会开启的！当然开启HTML5切图，该设置才有效
			HTML5ZIP:[900,0.9],//HTML5截图前载入的大图 是否压缩图片(数组成员 是数字)
			preview:[100],// 开启动态预览图片 (数组成员整数型，禁止含小数点 可选false 和数组)     
			url:relativeUrl+"php/shearphoto.php",   //后端处理地址
			scopeWidth:300,                 //可拖动范围宽  也就是"main"对象的初始大小(整数型，禁止含小数点) 宽和高的值最好能一致  
            scopeHeight:300,                //可拖动范围高  也就是"main"对象的初始大小(整数型，禁止含小数点) 宽和高的值最好能一致      
            proportional:[1/1,100,133],   
			Min:50,                 //截框拉伸或拖拽不能少于多少PX(整数型，禁止含小数点)  
			Max:300,                //一开始启动时，图片的宽和高，有时候图片会很大的，必须要设置一下(整数型，禁止含小数点)
			backgroundColor:"#000",   //遮层色
			backgroundOpacity:0.6, //遮层透明度-数字0-1 可选
			Border:0,               //截框的边框大小 0代表动态边框。大于0表示静态边框，大于0时也代表静态边框的粗细值
            BorderStyle:"solid",  //只作用于静态边框，截框的边框类型，其实是引入CSS的border属性，和CSS2的border属性是一样的
            BorderColor:"#09F",  //只作用于静态边框，截框的边框色彩
			relat:publicRelat,              //请查看 id:"relat"对象 
			scope:document.getElementById("main"),//main范围对象 
			ImgDom:publicRelatImg[0],         //截图图片对象（小）  
			ImgMain:publicRelatImg[1],         //截图图片对象（大）
			black:document.getElementById("black"),//黑色遮层对象
			form:document.getElementById("smallbox"),//截框对象
			ZoomDist:document.getElementById("ZoomDist"),//放大工具条,可从HTML查看此对象，不作详细解释了
			ZoomBar:document.getElementById("ZoomBar"), //放大工具条，可从HTML查看此对象
			to:{
				BottomRight:document.getElementById("BottomRight"),//拉伸点中右
				TopRight:document.getElementById("TopRight"),//拉伸点上右，下面如此类推，一共8点进行拉伸,下面不再作解释
				Bottomleft:document.getElementById("Bottomleft"),
				Topleft:document.getElementById("Topleft"),
				Topmiddle:document.getElementById("Topmiddle"),
				leftmiddle:document.getElementById("leftmiddle"),
				Rightmiddle:document.getElementById("Rightmiddle"),
				Bottommiddle:document.getElementById("Bottommiddle")
			},
			Effects:document.getElementById("shearphoto_Effects") || false,
			DynamicBorder:[document.getElementById("borderTop"),document.getElementById("borderLeft"),document.getElementById("borderRight"),document.getElementById("borderBottom")],
			SelectBox:document.getElementById("SelectBox"),         //选择图片方式的对象
			Shearbar:document.getElementById("Shearbar"),          //截图工具条对象
			UpFun:function() {                   //鼠标健松开时执行函数
				Shear.MoveDiv.DivWHFun();   //把截框现时的宽高告诉JS    
			}                    
          });
		Shear.complete=function(serverdata) {//截图成功完成时，由shearphoto.php返回数据过来的成功包
			//alert(SHEAR.URL);//你可以调试一下这个返回包
			var point = this.arg.scope.childNodes[0];
			point.className === "point" && this.arg.scope.removeChild(point);
			var complete = document.createElement("div");
			complete.className = "complete";
			complete.style.height = this.arg.scopeHeight + "px";
			this.arg.scope.insertBefore(complete, this.arg.scope.childNodes[0]);
			var length = serverdata.length,creatImg;
			for (var i = 0; i < length; i++)  
			{
			creatImg = document.createElement("img");	
			complete.appendChild(creatImg);
			creatImg.src=this.arg.avatarUrl + serverdata[i]["ImgUrl"];
			}
			this.HTML5.EffectsReturn();
			this.HTML5.BOLBID	&&   this.HTML5.URL.revokeObjectURL(this.HTML5.BOLBID);
			creatImg = document.createElement("DIV");	
			creatImg.className=	"completeTxt";
			creatImg.innerHTML='<strong><i></i>恭喜你！截图成功</strong> <p>以上是你图片的' + length + '种尺寸</p><a href="javascript:;" id="completeA">完成</a>';
			complete.appendChild(creatImg);
			var completeA = document.getElementById("completeA");
			var this_ = this;
			this_.preview.close_();
			completeA.onclick || (completeA.onclick = function() {
					completeA.onclick = null;
					this_.arg.scope.removeChild(complete);
					this_.again();
			////by rainfer,增加ajax开始
					$.ajax({
						type: "post",
						dataType: "json",
						data:{'imgurl':serverdata[0]['ImgUrl']},
						url: SHEAR.URL,
						success:function(data,status){
							if(data){
							//实时更新当前页面头像
							document.getElementById("avatar_big").src=avatarUrl+serverdata[0]['ImgUrl'];
							document.getElementById("avatar_small").src=avatarUrl+serverdata[0]['ImgUrl'];
							this_.pointhandle(3e3, 10, "头像更新成功！", 2, "#fbeb61", "#3a414c");
							}else{
							this_.pointhandle(3e3, 10, "头像更新失败，请重试！", 2, "#fbeb61", "#3a414c");
							}
						}
					});
			//////增加ajax结束
			});
          }  
  
var photoalbum = document.getElementById("photoalbum");//相册对象
var ShearPhotoForm = document.getElementById("ShearPhotoForm");//FORM对象
ShearPhotoForm.UpFile.onclick=function(){return false}//一开始时先不让用户点免得事件阻塞
var up = new ShearPhoto.frameUpImg({
	url:relativeUrl+"php/upload.php",            //HTML5切图时，不会用到该文件，后端处理地址
	FORM:ShearPhotoForm,                         //FORM对象传到设置
	UpType:new Array("jpg", "jpeg", "png", "gif"),//图片类限制，上传的一定是图片，你就不要更改了
    FilesSize:2,                             //选择的图片不能超过 单位M（注意：是非HTML5时哦）
	HTML5:Shear.HTML5,                       
	HTML5FilesSize:Shear.arg.HTML5FilesSize,
    HTML5ZIP:Shear.arg.HTML5ZIP,      
	erro:function(msg) {
        Shear.pointhandle(3e3, 10, msg, 0, "#f82373", "#fff");
	},
    fileClick:function(){//先择图片被点击时，触发的事件
		Shear.pointhandle(-1);//关闭提示，防止线程阻塞事件冒泡
	},
	preced:function(fun) { //点击选择图，载入图片时的事件
        try{
			photoalbum.style.display = "none"; //什么情况下都关了相册
            camClose.onclick(); //什么情况下都关了视频
		}catch (e){console.log("在加载图片时，发现相册或拍照的对象检测不到，错误代码："+e);}
		Shear.pointhandle(0, 10, "正在为你加载图片，请你稍等哦......", 2, "#307ff6", "#fff",fun);
    }
});

up.run(function(data,True) {//upload.php成功返回数据后
         //alert(data);你可以调试一下这个返回包
          True ||  (data = ShearPhoto.JsonString.StringToJson(data));
          if (data === false) {
                    Shear.SendUserMsg("错误：请保证后端环境运行正常", 5e3, 0, "#f4102b", "#fff",  true,true);
                    return;
          }
          if (data["erro"]) {
                    Shear.SendUserMsg("错误：" + data["erro"], 5e3, 0, "#f4102b", "#fff",  true,true);
                    return;
          }
          Shear.run(data["success"],true);
});

try{
var AllType= {".jpg":"image/jpeg",  ".jpeg":"image/jpeg",  ".gif":"image/jpeg", ".png":"image/png"};
var	URLType =function(url){
             return AllType[/\.[^.]+$/.exec(url)] || "image/jpeg";//取后缀
             }
var DE = document.documentElement;
var PhotoLoading = document.getElementById("PhotoLoading");
var photoalbumLi = photoalbum.getElementsByTagName("li");
var photoalbumLifun = function() {
	      var serveUrl= this.getElementsByTagName("img")[0].getAttribute("serveUrl");
	      Shear.HTML5.ImagesType=URLType(serveUrl);//告诉HTML5，图片的类型
          Shear.run(serveUrl);                    //通过API 接口，加载图片
          photoalbum.style.display = "none";      
};

for (var i = 0; i < photoalbumLi.length; i++) photoalbumLi[i].onclick = photoalbumLifun;//为相册的每张照加入一个点击事件
PhotoLoading.onclick = function() {             //从相册选取事件
          photoalbum.style.display = "block";
		  
         
};
 document.getElementById("close").onclick = function() {     //关闭相册事件
          photoalbum.style.display = "none";
};
}catch (e){console.log("相册对象检测有误，默认你抱弃这个功能，错误代码："+e );}

  Shear.addEvent(document.getElementById("saveShear"), "click", function() { //按下截图事件，提交到后端的shearphoto.php接收
   Shear.SendPHP({shearphoto:"",mingge:""});//我们示例截图并且传参数，后端文件shearphoto.php用 示例：$_POST["shearphoto"] 接收参数，不需要传参数请清空Shear.SendPHP里面的参数示例 Shear.SendPHP();
   
});

 Shear.addEvent(document.getElementById("LeftRotate"), "click", function() {//向左旋转事件
          Shear.Rotate("left");
});
 
  Shear.addEvent(document.getElementById("RightRotate"), "click", function() { //向右旋转事件
          Shear.Rotate("right");
});
 
 Shear.addEvent(document.getElementById("againIMG"), "click", function() {     //重新选择事件
           Shear.preview.close_();
		   Shear.again();
		   Shear.HTML5.EffectsReturn();
		   Shear.HTML5.BOLBID	&&   Shear.HTML5.URL.revokeObjectURL(Shear.HTML5.BOLBID);
           Shear.pointhandle(3e3, 10, "已取消！重新选择", 2, "#fbeb61", "#3a414c");
});
 

try{
 webcam.init_config={
		
		width  : 300,                 //摄像头像素宽度，也就是说后端生成图片的大小
		
		height : 300,                 //摄像头像素高度，也就是说后端生成图片的大小
		
		server_width : 300,            //网页中flash的显示宽度
		
		server_height : 300,           //网页中flash的显示高度
		
		uploadfield : "UpFile",       //上传的FORMDATA名称
		postargs:{mingge:"shearphoto我爱你",shearphoto:"shearphoto好"}//示例传入POST参数到后端。后端示例$_POST['XXXX'] 接收！如果！ 不需要传参数，请把postargs删除，需填参数请保证参数格式
	 },

webcam.set_api_url(relativeUrl+"php/upload.php"); //拍照连接后端的URL文件，后端处理地址   
webcam.set_swf_url(relativeUrl+"images/webcam.swf");//拍照是FLASH的相对路径
webcam.set_shutter_sound(true,relativeUrl+"images/shutter.mp3")//拍照声音，参数1 是否开启， 参数2：声音路径
webcam.set_quality(95);//拍照的图片质量
					 
var CamFlash = document.getElementById("CamFlash");
var timing = document.getElementById("timing");
var CamOk = document.getElementById("CamOk");
var CamBox = document.getElementById("CamBox");
var camerasImage = document.getElementById("camerasImage");
var camClose = document.getElementById("camClose");
var setCam = document.getElementById("setCam");

 webcam.noCamcall=function(msg){
	 Shear.SendUserMsg(msg, 5e3, 0, "#f4102b", "#fff", true,true);
	 camClose.onclick(); 
	 }
	 
setCam.onclick =function() {webcam.configure();}//点击拍照设置按钮事件
camClose.onclick = function() { //拍照点关闭后
          webcam.Homing(timing);
          CamFlash.innerHTML = "";
          CamBox.style.display = "none";
		  camerasImage.onclick=camerasImageOnclick;
};
var camerasImageOnclick = function() {            //按下弹出拍照框事件
       CamBox.style.display = "block";
	     CamFlash.innerHTML = webcam.get_html();
         webcam.newsnap(timing, CamFlash, CamOk);
		 camerasImage.onclick=null;
};
camerasImage.onclick=camerasImageOnclick;


webcam.set_hook("onComplete", function(data) {//拍照服务器返回数据事件
         //alert(data);你可以调试一下这个返回包
         camClose.onclick();
		 data = ShearPhoto.JsonString.StringToJson(data);
          if (data === false) {
                    Shear.SendUserMsg("错误：请保证后端环境运行正常", 5e3, 0, "#f4102b", "#fff", true,true);
                    return;
          }
          if (data["erro"]) {
                    Shear.SendUserMsg("错误：" + data["erro"], 5e3, 0, "#f4102b", "#fff", true,true);
					return;
          }
		  Shear.HTML5.ImagesType="image/jpeg";//告诉HTML5，图片的类型
          Shear.run(data["success"]);
});
}catch (e){console.log("拍照对象检测不到，默认你抱弃这个功能，错误代码："+e);}
var shearphoto_loading=document.getElementById("shearphoto_loading");
var shearphoto_main=document.getElementById("shearphoto_main");
shearphoto_loading && shearphoto_loading.parentNode.removeChild(shearphoto_loading);
shearphoto_main.style.visibility="visible";
 });
