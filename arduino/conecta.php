<?php
/*
	$username = 'root';
	$password = "";
	$host = "localhost";
	
	$connect = mysql_connect($host,$username,$password);
	$selecionabd = mysql_select_db('databasearduino', $connect);
	*/
	
	$connect = new mysqli('localhost', 'root', '', 'dataarduino');
	//$selecionabd = mysql_select_db('tablearduino', $connect);
	
	//$connect = new mysqli('localhost', 'root', '');
	
	
	//$selecionabd = mysql_select_db($connect, 'databasearduino');
	
	

	if($connect)
	{
		echo "connect success";
	} else {
		echo "connect error";
	}

?>