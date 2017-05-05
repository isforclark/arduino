<?php

		$Link = mysqli_connect('localhost','root','');
		if ($Link) 
		{
			$dbname='dataarduino';
			mysqli_select_db($Link, $dbname); 
//			mysqli_query($Link, 'SET CHARACTER SET UTF-8');
			mysqli_query($Link,"SET NAMES 'UTF8'");
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
			echo "<table width='700' border='1' align='center'>";
//			$sql = "SELECT * FROM  person";
			$sql = "SELECT * FROM person where userID='stu001'";
			$result = mysqli_query($Link,  $sql);
			if (!$result) {
				printf("Error: %s\n", mysqli_error($Link));
				exit();
			}
			echo '<tr>
				<td>姓名</td>
				<td>年齡</td>
				<td>性別</td>
				<td>地址</td>
				<td>遺傳疾病</td>
				
				</tr>';	
			while( $row = mysqli_fetch_array($result) )
			{
					echo '<tr>
					<td>'.$row["name"].'</td>
					<td>'.$row["age"].'</td>
					<td>'.$row["sex"].'</td>
					<td>'.$row["address"].'</td>
					<td>'.$row["wfgh"].'</td>
						</tr>';
			}
			mysqli_free_result($result);
			
			?>
		
		<?php
		echo "<p/>";
		echo "<table width='700' border='1' align='center'> ";
		$sql = 'SELECT * FROM tablearduino order by ID DESC limit 0,1';
		$result = mysqli_query($Link, $sql);
		echo '<tr>
				<td>ID</td>
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
					echo '<tr>
					<td>'.$row["ID"].'</td>
					<td>'.$row["Time"].'</td>
					<td>'.$row["Humidity"].'</td>
					<td>'.$row["Temperature"] . "</td>
					<td>".$di."</td>
					<td>".$warn."</td>
				</tr>";
				}
		
		echo '</table>';
		
		mysqli_free_result($result); 
		//mysqli_close($Link);
		
		
/*			
			echo "<table width='700' border='0' align='center'>";
			$sql = 'SELECT * FROM tablearduino order by ID DESC limit 0,1';
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
					<td>'.$row["id"].'</td>
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
*/			
        ?>
		<?php
		echo "</br>";
		echo "<table width='700' border='1' align='center'> ";
		$sql = "SELECT * FROM areapm WHERE Sitename='萬華'";
		
		$result = mysqli_query($Link, $sql);
		
		echo '<tr>
				<td>站名</td>
				<td>即時濃度</td>
				<td>前一小時濃度</td>
				<td>警訊</td>
			</tr>';
			while( $row = mysqli_fetch_assoc($result) )
			{
			
			$warn = 0;
				if($row["Immediate"] < 35 && $row["Immediate"]>= 0)
					{
						$warn ='正常活動';
					}
				elseif($row["Immediate"] <53 && $row["Immediate"] >= 35)
					{
						$warn = '正常活動:有心臟、呼吸道及心血管疾病的成人與孩童感受到徵狀時，應考慮減少體力消耗，特別是減少戶外活動。';
					}
				elseif($row["Immediate"] < 70 && $row["Immediate"]>=53)
					{
						$warn = '任何人如果有不適，如眼痛，咳嗽或喉嚨痛等，應該考慮減少戶外活動;有心臟、呼吸道及心血管疾病的成人與孩童，應考慮減少體力消耗，特別是減少戶外活動。老人應減少體力消耗。具有氣喘的人可能需增加使用吸入劑頻率。';
					}
		/*		elseif($di < 65)
					{
						$warn = '正常';
					}
		*/
				else
					{
						$warn = '任何人如果有不適，如眼痛，咳嗽或喉嚨痛等，應減少體力消耗，特別是減少戶外活動;有心臟、呼吸道及心血管疾病的成人與孩童，以及老人應避免體力消耗，特別是避免戶外活動。具有氣喘的人可能需增加使用吸入劑頻率。';
					}
			
			echo '<tr>			
					
					<td>'.$row["Sitename"].'</td>
					<td>'.$row["Immediate"].'</td>
					<td>'.$row["Onehourago"].'</td>
					<td>'.$warn."</td>
					
				</tr>";
			}
			echo '</table>';
		
		mysqli_free_result($result); 
		mysqli_close($Link);
	?>
		
	</div>
	<div style="text-align:center;">
		<a href="IPM25.php"><button>各地區即時PM2.5</button></a>
		<a href="personpage.php"><button>歷史紀錄</button></a>
	</div>
</body>
</html>