<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//資料庫設定
//資料庫位置
$db_server = "localhost:8080";
//資料庫名稱
$db_name = "dataarduino";
//資料庫管理者帳號
$db_user = "root";
//資料庫管理者密碼
$db_passwd = "";

//對資料庫連線
//$mysqli = @new mysqli('localhost', 'fake_user', 'my_password', 'my_db');
     $connect = new mysqli('localhost', 'root', '', 'dataarduino');
     if($connect)
	{
		echo "connect success";
	} else {
		echo "connect error";
	}   
//資料庫連線採UTF8
//mysql_query("SET NAMES utf8");

//選擇資料庫
//if(!@mysql_select_db($db_name))
       // die("無法使用資料庫");
?> 