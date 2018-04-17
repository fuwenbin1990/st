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
	$post_act = isset($_POST['action'])? $_POST['action']: '';
	if($act == 'st_getlb'){
		$query = "select * from st_imgs where part='首页轮播图'";
		$arr = fetchAll($link,$query);
		echo json_encode($arr);
	};
	if($post_act == 'st_postlb'){
		$list = isset($_POST['list'])? $_POST['list']: '';
		foreach ($list as $key => $value) {
			$id = $value['id'];
			$res = update($link,$value,$table,"id='$id'");
			if(!$res){
				echo $value['title'].'插入失败';
				continue;
			};
		};
		echo 'OK';
	};
 ?>