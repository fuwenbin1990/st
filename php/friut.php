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
	$table = 'FruitMarket';
	$act = isset($_POST['action'])?$_POST['action']:'';
	if($act=='friut'){
		$query = "select * from FruitMarket";
		$arr = fetchAll($link,$query);
		echo json_encode($arr);
	};
	if($act == 'friutlist'){
		// echo (gettype((int)$_POST['page']));
		$limt = (int)isset($_POST['limt'])?$_POST['limt']:'';
		$page = (int)isset($_POST['page'])?$_POST['page']:'';
		$page_1 = $page-1;
		$num1 = $limt*$page_1;
		$num2 = $limt*$page;
		$query = "select * from FruitMarket limit $num1,$num2";
		$arr2 = getTotalRows($link, $table);
		$arr1 = fetchAll($link,$query);
		$arr = array(
			'list' => json_encode($arr1),
			'tall' => $arr2,
		);
		echo json_encode($arr);
	};















 ?>