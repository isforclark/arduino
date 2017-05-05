<?php
$h = $_GET['h'];
$t = $_GET['t'];
 
$db_user = 'root';
$db_pass = '';
$db = new PDO('mysql:host=DB_URL;dbname=DB_NAME', $db_user, $db_pass);
 
$sql = "INSERT INTO dht22 ( humidity, temperature) VALUES ( :humidity, :temperature)";
 
$query = $db->prepare($sql);
$query->execute(array(':humidity' => $h, ':temperature' => $t));
?>