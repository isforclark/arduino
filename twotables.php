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
<title>資料表合併</title>
<style type="text/css">
     body{background-color:#FFFFBB;} 
     
	</style>
<!-- 設定網頁編碼為UTF-8 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>
	<div align=center>
		<?php
			
			echo "<table width='700' border='0' align='center'>";
			$sql = "SELECT * FROM  person";
			$result = mysqli_query($Link, $sql);
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
			echo '</table>';
        ?>
		
	</div>
</body>
</html>