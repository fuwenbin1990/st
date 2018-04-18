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

	$act = isset($_GET['action'])? $_GET['action']: '';
	if($act == 'st_home'){
		$query = "select * from st_imgs where showImg=1";
		$arr = fetchAll($link,$query);
		if($arr){
			echo json_encode($arr);
		}else{
			echo "无数据";
		};
		
	};





 ?>