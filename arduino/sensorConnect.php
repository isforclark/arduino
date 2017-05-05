<?php

	include("conecta.php");
	
	$sensor1 = $_GET['sensor1'];
	$sensor2 = $_GET['sensor2'];
	$sensor3 = $_GET['sensor3'];
	$sensor4 = $_GET['sensor4'];
	
	$sql_insert = "insert into tablesensor (sensor1,sensor2,sensor3,sensor4) values ('$sensor1','$sensor2','$sensor3','$sensor4')";
	
	mysqli_query($connect, $sql_insert);
	//mysqli_query($sql_insert);
	
	if($sql_insert)
	{
		echo "sql_insert success";
	} else {
		echo "sql_insert error";
	}
?>