<?php
	$Link = mysqli_connect('localhost','root','');
	if (!$Link) 
	{
//		　die(' 連線失敗，輸出錯誤訊息 : ' . mysqli_error());
	}
//	echo ' 連線成功 ';
	$dbname='dataarduino';
	mysqli_select_db($Link, $dbname); 
//	mysqli_set_charset($Link, 'UTF8');
	mysqli_query($Link,"SET NAMES 'UTF8'");	
?>