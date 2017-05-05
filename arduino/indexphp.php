<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Arduino e MySQL com PHP</title>

	</head>
	
	<body>
		<h1>Arduino e MySQL com PHP</h1>
		
		<table width="50%" border="1" cellspacing="2" cellpadding="5">
		
			<tr>
				<td width="12%"><b>ID</b></td>
				<td width="40%"><b>TIME</b></td>
				<td width="12%"><b>Humidty</b></td>
				<td width="12%"><b>Temperature</b></td>
				<td width="12%"><b>Heat_hic</b></td>
				<td width="12%"><b>Heat_hit</b></td>
				
			</tr>
			
<?php

	include("conecta.php");
	
	
	$query = "select * from tablearduino";
    //$result = $mysqli->query($query);
	$result= mysqli_query($connect,$query);
	
	
	
	/*	
$row=mysqli_fetch_array($result,MYSQLI_NUM);
printf ("%s : %s",$row[0],$row[1]);
		

while( $row = mysqli_fetch_array($result)){
	
	echo $row[0]. ':' . $row[1];
	echo '<br/>';	
	
}	
*/

	
	
	
	
	//$resultado = mysql_query("select * from databasearduino");
	//$result= mysqli_query($connect,"select * from databasearduino");
	
   
	
	echo "<table width='50%' border='1' cellspacing='2' cellpadding='5'>";
	
	while($row = mysqli_fetch_array($result))	
	//while($row = mysqli_fetch_array(mysqli_query($connect,$result))	

	//while($linha = mysqli_fetch_array(ct * from databasearduino"))
	
	{
		
				
		echo'<tr>';
		echo'<td width="12%">'.$row["id"].'</td>';
		//echo '<td>'.$row["evento"].'</td>';
		echo '<td width="40%">'.date('d/m/Y - H:i:s',strtotime($row["Time"])).'</td>';
		echo'<td width="12%">'.$row["Humidty"].'</td>';
	    echo'<td width="12%">'.$row["Temperature"].'</td>';
		echo'<td width="12%">'.$row["Heat_hic"].'</td>';
		echo'<td width="12%">'.$row["Heat_hit"].'</td>';
		
	    echo'</tr>';
		
	}
	
	echo"</table>";
?>
			
		</table>
		
	</body>
</html>