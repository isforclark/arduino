<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ARDUINO php</title>
	</head>
	
	<body>
		<h1>ARDUINO php</h1>
		
		<table width="500" border="1" cellspacing="2" cellpadding="5">
			
			<tr>
				<td><b>ID</b></td>
				<td><b>DATA e HORA</b></td>
				<td><b>SENSOR 1</b></td>
				<td><b>SENSOR 2</b></td>
				<td><b>SENSOR 3</b></td>
			</tr>
<?php

	include("conecta.php");
	
	$resultado = mysql_query("select * from tabelaarduino");
	
	while($linha = mysql_fetch_array($resultado))
	{
		echo '<tr>';
			echo '<td>'.$linha["id"].'</td>';
//			echo '<td>'.$linha["evento"].'</td>';
			echo '<td>'.date('d/m/Y - H:i:s' , strtotime($linha["evento"])).'</td>';
			echo '<td>'.$linha["sensor1"].'</td>';
			echo '<td>'.$linha["sensor2"].'</td>';
			echo '<td>'.$linha["sensor3"].'</td>';
		echo '</tr>';	
	}

?>			
		</table>
	</body>
</html>