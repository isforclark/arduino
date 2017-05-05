<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Arduino e MySQL com PHP</title>
</head>
	<body>
		<h1>Arduino e MySQL com PHP</h1>
		
<!--		<table width="50%" border="1" cellspacing="2" cellpadding="5">
-->
		
<!--			<tr>
				<td width="12%"><b>ID</b></td>
				<td width="40%"><b>TIME</b></td>
				<td width="12%"><b>Humidty</b></td>
				<td width="12%"><b>Temperature</b></td>
				<td width="12%"><b>Heat_hic</b></td>
				<td width="12%"><b>Heat_hit</b></td>
				<td width="12%"><b>heartbeat</b></td>
			</tr>
			
			<tr>
				<td width="12%"><b></b></td>
				<td width="40%"><b></b></td>
				<td width="12%"><b></b></td>
				<td width="12%"><b></b></td>
				<td width="12%"><b></b></td>
				<td width="12%"><b></b></td>
				<td width="12%"><b></b></td>
			</tr>
			
			<tr>
				<td width="12%"><b></b></td>
				<td width="40%"><b></b></td>
				<td width="12%"><b></b></td>
				<td width="12%"><b></b></td>
				<td width="12%"><b></b></td>
				<td width="12%"><b></b></td>
				<td width="12%"><b></b></td>
			</tr>
-->
		<?php
			
			include("conecta.php");
			
			$query = "select * from tablearduino";
			$result= mysqli_query($connect,$query);
			
			$query1 = "select * from tablesensor";
			$result1= mysqli_query($connect1,$query1);
			
			$query2 = "select * from user";
			$result2= mysqli_query($connect2,$query2);
			
		
				echo"</table>";
			
			echo "<table align='center' width='50%' border='1' cellspacing='2' cellpadding='5'>";
				echo "<tr>";
				
					echo "<td width='12%' align='center'><b> ID </b></td>";
					echo "<td width='40%' align='center'><b> TIME </b></td>";
					echo "<td width='12%' align='center'><b> Humidty </b></td>";
					echo "<td width='12%' align='center'><b> Temperature </b></td>";
					echo "<td width='12%' align='center'><b> Heat_hic </b></td>";
					echo "<td width='12%' align='center'><b> Heat_hit </b></td>";
					echo "<td width='12%' align='center'><b> heartbeat </b></td>";
					
				echo "</tr>";
				while($row = mysqli_fetch_array($result))	
			
			{
				
						
				echo'<tr>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo '<td width="40%">'.date('d/m/Y - H:i:s',strtotime($row["Time"])).'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'</tr>';
				
			}
			
			echo"</table>";
/*			include("conecta.php");
			
			
			$query = "select * from tablearduino";
			$result= mysqli_query($connect,$query);
			
			$query1 = "select * from ";
			$result1= mysqli_query($connect1,$query1);
			
			$query2 = "select * from ";
			$result2= mysqli_query($connect2,$query2);
*/			
			

			echo "<table align='center' width='50%' border='1' cellspacing='2' cellpadding='5'>";
				echo "<tr>";
				
					echo "<td width='12%' align='center'><b> ID </b></td>";
					echo "<td width='40%' align='center'><b> Sensor1 </b></td>";
					echo "<td width='12%' align='center'><b> Sensor2 </b></td>";
					echo "<td width='12%' align='center'><b> Sensor3 </b></td>";
					echo "<td width='12%' align='center'><b> Sensor4 </b></td>";
					
				echo "</tr>";
			
				while($row = mysqli_fetch_array($result1))	
			
			{
				
						
				echo'<tr>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo '<td width="40%">'.date('d/m/Y - H:i:s',strtotime($row["Time"])).'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'</tr>';
				
			}
			
				echo"</table>";
			
			echo "<table align='center' width='50%' border='1' cellspacing='2' cellpadding='5'>";
				echo "<tr>";
				
					echo "<td width='12%' align='center'><b> userID </b></td>";
					echo "<td width='40%' align='center'><b> userPW </b></td>";
					echo "<td width='12%' align='center'><b> userName </b></td>";
					echo "<td width='12%' align='center'><b> userAge </b></td>";
					echo "<td width='12%' align='center'><b> userAdd </b></td>";
					echo "<td width='12%' align='center'><b> userHeight </b></td>";
					echo "<td width='12%' align='center'><b> userWeight </b></td>";
					echo "<td width='12%' align='center'><b> userWFGH </b></td>";
					
				echo "</tr>";
				while($row = mysqli_fetch_array($result2))	
			
			{
				
						
				echo'<tr>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo '<td width="40%">'.date('d/m/Y - H:i:s',strtotime($row["Time"])).'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'<td width="12%">'.$row[""].'</td>';
				echo'</tr>';
				
			}
			
			echo"</table>";
		?>
			
		</table>
		
	</body>
</html>