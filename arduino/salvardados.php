<?php

	include("conecta.php");
	
	$sensor1 = $_GET['h'];
	$sensor2 = $_GET['t'];
	$sensor3 = $_GET['hic'];
	$sensor4 = $_GET['hif'];
	
	$sql_insert = "insert into tablearduino (Humidity,Temperature,Heat_hic,Heat_hif) values ('$sensor1','$sensor2','$sensor3','$sensor4')";
	
	mysqli_query($connect, $sql_insert);
	//mysqli_query($sql_insert);
	
	if($sql_insert)
	{
		echo "sql_insert success";
	} else {
		echo "sql_insert error";
	}
?>