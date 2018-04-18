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
	//获取轮播图
	if($act == 'st_getlb'){
		$part = isset($_GET['part']) ? $_GET['part']: '';
		$query = "select * from st_imgs where part='$part'";
		$arr = fetchAll($link,$query);
		echo json_encode($arr);
	};
	//轮播显示设置
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
	//删除轮播图
	if($post_act == 'st_dellb'){
		$id = isset($_POST['id'])? $_POST['id'] : '';
		$file = isset($_POST['file'])? $_POST['file'] : '';
		$name = isset($_POST['name'])? $_POST['name'] : '';
		$src = '../'.$file.'/'.$name.'.png';
		if(file_exists($src)){
			$res = unlink(iconv("UTF-8","gb2312",$src));
			if($res){
				$res_1 = delete($link,$table,"id='$id'");
				if(res_1){
					echo '删除成功';
				}else{
					echo 'NO';
				};
			}else{
				echo 'NO';
			};
		}else{
			$res_1 = delete($link,$table,"id='$id'");
			if(res_1){
				echo '删除成功';
			}else{
				echo 'NO';
			};
		};
	};
 ?>