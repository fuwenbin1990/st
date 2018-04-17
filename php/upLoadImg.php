<?php 
	header("content-type:text/html;charset=UTF-8");
	header('Access-Control-Allow-Origin:*');//跨域
	header('Access-Control-Allow-Method:_POST,_POST');//跨域
	require_once 'mysql.func.php';
	ini_set('date.timezone','Asia/Shanghai');
	error_reporting( E_ALL&~E_NOTICE );

	$time = date('Y-m-d h:i:s');

	$str = $_FILES['file'];

	// $arr = array($str);

	// print_r($arr);

	$str = $_FILES['file']['name'];

	$oldname = explode('.', $str)[0];

	$name = intval(time());

	//el框架上传参数用POST接收
	$act = $_POST['action'];

	$tit = $_POST['title'];

	$con = $_POST['content'];

	$tmp = $_FILES['file']['tmp_name'];

	// $path = '../img/';
	$dir = iconv("UTF-8", "GBK", "../imge");

	//判定文件夹是否存在
	//path路径是相对于PHP文件的路径
	if(file_exists($dir)){
		$path = '../imge/';
	}else{
		mkdir ($dir,0777);
		$path = '../imge/';
	};

	//移动文件到某个文件夹 成功返回true 失败false
	$res = move_uploaded_file($tmp, iconv("UTF-8","gb2312",$path.$name.'.png'));

	
	if($res){
		echo 'OK';
	}else{
		echo 'NO';
	};

	//删除文件
	if($act == 'del'){
		$src = $_POST['src'];
		unlink(iconv("UTF-8","gb2312",$src));
	};
 ?>