<?php 
	header("content-type:text/html;charset=UTF-8");
	header('Access-Control-Allow-Origin:*');//跨域
	header('Access-Control-Allow-Method:POST,GET');//跨域
	require_once 'mysql.func.php';
	ini_set('date.timezone','Asia/Shanghai');
	error_reporting( E_ALL&~E_NOTICE );
	$link = connect1('qdm167417171.my3w.com','qdm167417171','851979283','utf-8','qdm167417171_db');
	$link->query('SET character_set_client = utf8;');
	$link->query('SET character_set_results = utf8;');
	$link->query('SET character_set_connection = utf8;');
	$statue = true;
	$table = 'admin';
	$act = $_POST['act'];
	$name = isset($_POST['name'])?$_POST['name']:'';
	$tel = isset($_POST['tel'])?$_POST['tel']:'';
	$email = isset($_POST['email'])?$_POST['email']:'';
	$education = isset($_POST['education'])?$_POST['education']:'';
	$school = isset($_POST['school'])?$_POST['school']:'';
	$job = isset($_POST['job'])?$_POST['job']:'';
	$introduce = isset($_POST['introduce'])?$_POST['introduce']:'';
	$time = date('Y-m-d h:i:s');
	if($act == 'id'){
		$id = $_POST['id'];
		$statue = false;
		//echo $id;
		$query = "select * from admin where id='$id'";
		$arr = fetchAll($link,$query);
		echo json_encode($arr);
	};
	if($act == 'delect'){
		$statue = false;
		$id = $_POST['id'];
		//$query = "select * from admin where id='$id'";
		$res = delete($link, $table, "id='$id'");
		if($res){echo "删除信息成功";}else{echo "删除信息失败,请重试";};
	};
	if($act == 'addadmin'){
		$statue = false;
		$adminarr = array(
			'name' => $name,
			'tel' => $tel,
			'email' => $email,
			'education' => ($education==undefined)?'本科':$education,
			'school' => ($school==undefined)?'哈佛':$school,
			'job' => ($job==undefined)?'搬砖':$job,
			'introduce' => ($introduce==undefined)?'一块砖两毛,两块四毛,四块八毛。。。。':$introduce,
			'time' => $time,
		);
		$res = insert($link,$adminarr,$table);
		if(!$res){
			echo '添加用户信息失败';
			$statue = false;
		};
	};
	if($act == 'writeadmin'){
		$statue = false;
		$id = $_POST['id'];
		$arr = array(
			'name' => $name,
			'tel' => $tel,
			'email' => $email,
			'education' => ($education==undefined)?'本科':$education,
			'school' => ($school==undefined)?'哈佛':$school,
			'job' => ($job==undefined)?'搬砖':$job,
			'introduce' => ($introduce==undefined)?'一块砖两毛,两块四毛,四块八毛。。。。':$introduce,
			'time' => $time,
		);
		$res = update($link,$arr,$table,"id='$id'");
		if($res){
			echo "用户信息更新成功";
		}else{
			echo "用户信息更新失败,请重试";
		};
	};
	if($statue){
		$query = 'select * from admin';
		$arr = fetchAll($link,$query);
		echo json_encode($arr);
	};



















































 ?>