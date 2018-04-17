<?php 
	header("content-type:text/html;charset=UTF-8");
	header('Access-Control-Allow-Origin:*');//跨域
	header('Access-Control-Allow-Method:_POST,_POST');//跨域
	require_once 'mysql.func.php';
	ini_set('date.timezone','Asia/Shanghai');
	error_reporting( E_ALL&~E_NOTICE );
	$link = connect1('qdm167417171.my3w.com','qdm167417171','851979283','utf-8','qdm167417171_db');
	$link->query('SET character_set_client = utf8;');
	$link->query('SET character_set_results = utf8;');
	$link->query('SET character_set_connection = utf8;');
	$table = 'st_imgs';

	$act = isset($_POST['action'])? $_POST['action']: '';
	if($act == 'st_ad'){
		$tmp = $_FILES['file']['tmp_name'];
		$name = intval(time());
		$file = 'st_imge';
		$dir = iconv("UTF-8", "GBK", "../".$file);
		if(file_exists($dir)){
			$path = "../".$file."/";
		}else{
			mkdir ($dir,0777);
			$path = "../".$file."/";
		};
		$res = move_uploaded_file($tmp, iconv("UTF-8","gb2312",$path.$name.'.png'));
		if($res){
			$title = isset($_POST['title'])? $_POST['title']: '';
			$content = isset($_POST['content'])? $_POST['content']: '';
			$part = isset($_POST['part'])? $_POST['part']: '';
			$str = $_FILES['file']['name'];
			$oldname = explode('.', $str)[0];
			$time = date('Y-m-d h:i:s');
			$arr = array(
				'file' => $file,
				'title' => $title,
				'name' => $name,
				'content' => $content,
				'part' => $part,
				'oldname' => $oldname,
				);
			$res_1 = insert($link,$arr,$table);
			if($res_1){
				echo 'OK';
			}else{
				echo 'NO';
			};
		}else{
			echo 'NO';
		};
	};

 ?>