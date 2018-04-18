<?php 
	header("content-type:text/html;charset=UTF-8");
	header('Access-Control-Allow-Origin:*');//跨域
	header('Access-Control-Allow-Method:_POST,_POST');//跨域
	require_once 'mysql.func.php';
	ini_set('date.timezone','Asia/Shanghai');
	error_reporting( E_ALL&~E_NOTICE );

	
	echo "hello";


 ?>