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
	$table_text = 'st_home_text';
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
				echo 'NO';
				continue;
			}else{
				echo 'OK';
			};
		};
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
	if($post_act == 'st_subText'){
		$user = isset($_POST['user']) ? $_POST['user'] : '';
		$wx = isset($_POST['wx']) ? $_POST['wx'] : '';
		$QQ1 = isset($_POST['QQ1']) ? $_POST['QQ1'] : '';
		$QQ2 = isset($_POST['QQ2']) ? $_POST['QQ2'] : '';
		$QQ3 = isset($_POST['QQ3']) ? $_POST['QQ3'] : '';
		$tel1 = isset($_POST['tel1']) ? $_POST['tel1'] : '';
		$tel2 = isset($_POST['tel2']) ? $_POST['tel2'] : '';
		$tel3 = isset($_POST['tel3']) ? $_POST['tel3'] : '';
		$adress = isset($_POST['adress']) ? $_POST['adress'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$introduce1 = isset($_POST['introduce1']) ? $_POST['introduce1'] : '';
		$introduce2 = isset($_POST['introduce2']) ? $_POST['introduce2'] : '';
		$introduce3 = isset($_POST['introduce3']) ? $_POST['introduce3'] : '';
		$introduce4 = isset($_POST['introduce4']) ? $_POST['introduce4'] : '';
		$arr = array(
			'user' => $user,
			'wx' => $wx,
			'QQ1' => $QQ1,
			'QQ2' => $QQ2,
			'QQ3' => $QQ3,
			'tel1' => $tel1,
			'tel2' => $tel2,
			'tel3' => $tel3,
			'adress' => $adress,
			'email' => $email,
			'introduce1' => $introduce1,
			'introduce2' => $introduce2,
			'introduce3' => $introduce3,
			'introduce4' => $introduce4,
			);
		$res = update($link,$arr,$table_text,"id=1");
		if($res){
			echo 'OK';
		}else{
			echo 'NO';
		};
	};

	if($post_act == 'st_validate_admin'){
		$admin = isset($_POST['adminUser']) ? $_POST['adminUser'] : '';
		$password = isset($_POST['adminPassworld']) ? $_POST['adminPassworld'] : '';
		$query = "select * from st_admin where admin=1";
		$arr = fetchOne($link,$query);
		if($admin === $arr['user'] && $password === $arr['passworld']){
			echo 'OK';
		}else{
			echo 'NO';
		};
	};
 ?>