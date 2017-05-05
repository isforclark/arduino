<?php

include("IPM25.php");

	$Link = mysqli_connect('localhost','root','');
	$dbname='dataarduino';
	mysqli_select_db($Link, $dbname); 
	mysqli_query($Link, 'SET CHARACTER SET UTF-8');
	
	$sql = 'TRUNCATE TABLE areapm';
	$result = mysqli_query($Link, $sql);
	

	$sql = "INSERT INTO areapm
	(Sitename, Immediate, Onehourago)
	 VALUES
	()";
	$result = mysqli_query($Link, $sql);

	
 /*
 mysql_connect("localhost","root","");    //與資料庫建立連線
 mysql_select_db("dataarduino");  //選擇資料庫

 
 /*建立資料表
 $sql="create table areaPM
 (areaID int(10) auto_increment,
  Sitename varchar(10),
  Immediate int(10),
  Onehourago int(10),
  primary key (areaID)) charset=utf8";
  
  
  /*執行SQL指令
 mysql_query($sql) or die("資料庫和資料表建立失敗");
 echo "2.資料庫和資料表建立成功<br>";
 
 
if( $_POST )
{
  $con = mysql_connect("localhost","root","");

  if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }
}
 */
 ?> 