<?php
/*
	mysql_connect("localhost","root","");
	mysql_select_db("dataarduino");
	mysql_query("set names utf8");
	$data = mysql_query("select * from dataarduino");
	mysql_query("select * from tablearduino limit 0 , 5")
*/
		$Link = mysqli_connect('localhost','root','');
		if (!$Link) 
		{
//		　die(' 連線失敗，輸出錯誤訊息 : ' . mysqli_error());
		}
//		echo ' 連線成功 ';
		$dbname='dataarduino';
		mysqli_select_db($Link, $dbname); 
		mysqli_query($Link, 'SET CHARACTER SET UTF-8');

		//$sql = 'SELECT * FROM tablearduino order by ID DESC limit 0,30';
		//$result = mysqli_query($Link, $sql);

?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>溫濕度&不舒適指數</title>
	<style>
		body {background-color: #33CCFF;}
		
</style> 
	</head>
	<body>
		<div style="text-align:center;"><img src="1.jpg"></img></div>
		
	<?php
		echo "<table width='700' border='1' align='center'> ";
		$sql = "SELECT * FROM person where userID='stu001'";
		$result = mysqli_query($Link, $sql);
		echo '<tr>
				<td>姓名</td>
				<td>年紀</td>
				<td>體重</td>
				<td>性別</td>
			</tr>';
			while( $row = mysqli_fetch_assoc($result) )
			{
			echo '<tr>			
					
					<td>'.$row["name"].'</td>
					<td>'.$row["age"].'</td>
					<td>'.$row["weight"].'</td>
					<td>'.$row["sex"]."</td>
				</tr>";
			}
			echo '</table>';
		
		mysqli_free_result($result); 
//		mysqli_close($Link);
	?>
	<?php 
		echo "<table width='700' border='1' align='center'> ";
/*		
		$qqq = "SELECT * FROM dbname where userID='stu002'";
		$result = mysqli_query($Link, $qqq);
		echo '<tr>
				<td>姓名</td>
				<td>年紀</td>
				<td>體重</td>
				<td>性別</td>
			</tr>';
			echo '<tr>
					<td>'.$row["userID"].'</td>
					<td>'.$row["password"].'</td>
					<td>'.$row["name"].'</td>
					<td>'.$row["age"].'</td>
					<td>'.$row["weight"].'</td>
					<td>'.$row["sex"]."</td>
				</tr>";
			
			
*/			
		$sql = 'SELECT * FROM tablearduino order by ID DESC limit 0,30';
		$result = mysqli_query($Link, $sql);
		echo '<tr>
				<td>id</td>
				<td>Time</td>
				<td>Humidity</td>
				<td>Temperature</td>
				<td>D.I.</td>
				<td>警訊</td>
			</tr>';			
		while( $row = mysqli_fetch_assoc($result) )
		{ 
			//$di =  $row["Temperature"]*(9/5)+32-0.55*(1- 100/$row["Humidity"] )*($row["Temperature"]*(9/5)+32-58) ;
			$di = ($row["Temperature"]*99-1430)/$row["Humidity"]+ $row["Temperature"]*0.81+46.3;
			$warn = 0;
				if($di < 70 && $di >= 65)
					{
						$warn ='80歲以上老人家需注意';
					}
				elseif($di <75 && $di >= 70)
					{
						$warn = '65歲以上老人家需注意';
					}
				elseif($di < 80 && $di>=75)
					{
						$warn = '50歲以上老人家需注意';
					}
				elseif($di < 65)
					{
						$warn = '正常';
					}
				else
					{
						$warn = '所有人需注意';
					}
/*			
			if($warn >= 65 && $warn < 70)
				{
					echo "80歲以上老人家需注意";
				}
				elseif($warn >= 70 && $warn < 75)
				{
					echo "65歲以上老人家需注意";
				}
				elseif($warn >= 75 && $warn < 85)
				{
					echo "所有人需注意";
				}
*/			
			echo '<tr>
					<td>'.$row["DI"].'</td>
					<td>'.$row["Time"].'</td>
					<td>'.$row["Humidity"].'</td>
					<td>'.$row["Temperature"] . "</td>
					<td>".$di."</td>
					<td>".$warn."</td>
				</tr>";
//			echo $warn;
				
				
		}
		
		echo '</table>';
		
		mysqli_free_result($result); 
		mysqli_close($Link);
		
	?>
	
	<div style="text-align:center;"><a href="IPM25.php"><button>各地區即時PM2.5</button></a></div>
	</body>
</html>