<?php

		$Link = mysqli_connect('localhost','root','');
		if ($Link) 
		{
			$dbname='dataarduino';
			mysqli_select_db($Link, $dbname); 
			mysqli_query($Link, 'SET CHARACTER SET UTF-8');
		}
?>  

<html>

<head>
<title>今日警告</title>
<style type="text/css">
     body{background-color:#FFFFBB;} 
     
	</style>
<!-- 設定網頁編碼為UTF-8 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>
	<div align=center>
		<p><img src="warning.jpg"></p>
		<?php
			
			echo "<table width='700' border='0' align='center'>";
			$sql = "SELECT * FROM  person";
			$result = mysqli_query($Link, $sql);
			if (!$result) {
				printf("Error: %s\n", mysqli_error($Link));
				exit();
			}
			echo '<tr>
				<td>姓名</td>
				<td>年齡</td>
				<td>性別</td>
				<td>遺傳疾病</td>
				
				</tr>';	
			while( $row = mysqli_fetch_array($result) )
			{
					echo '<tr>
					<td>'.$row["name"].'</td>
					<td>'.$row["age"].'</td>
					<td>'.$row["sex"].'</td>
					<td>'.$row["wfgh"].'</td>
						</tr>';
			}
			echo "<table width='700' border='0' align='center'>";
			$sql = 'SELECT * FROM tablearduino order by ID DESC 1';
			$result = mysqli_query($Link,  $sql);
			echo '<tr>
				<td>id</td>
				<td>Time</td>
				<td>Humidity</td>
				<td>Temperature</td>
				<td>D.I.</td>
				<td>警訊</td>
			</tr>';			
			
			echo '</table>';
		mysqli_free_result($result); 
		
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
			echo '<tr>
					<td>'.$row["ID"].'</td>
					<td>'.$row["Time"].'</td>
					<td>'.$row["Humidity"].'</td>
					<td>'.$row["Temperature"] . "</td>
					<td>".$di."</td>
					<td>".$warn."</td>
				</tr>";
			
		}
			echo "</table>";
			mysqli_free_result($result); 
		    mysqli_close($Link);
        ?>
		
	</div>
</body>
</html>