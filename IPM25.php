<?php
	require('testcurl.php');
	$sql = 'SELECT * FROM areapm';
?>

<html>
	<head>
		<title>各地區即時PM2.5</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<style type="text/css">
			.title-block{
				background-color:#CBD6FF;
				box-shadow: 2px 2px 5px #888888;
			}
		</style>
	</head>
	<body>
	<div class='row'>
		<div class='col-md-12 title-block'>
			<div class="col-md-2 col-sm-2"><img src="2.png"></img></div>
			<div class="col-md-10 col-sm-10" style="margin-top:2em;text-align:right;">
				<a href="personpage.php"><button align="center" style="width:120px;height:40px;font-size:20px;">歷史紀錄</button></a>
				<a href="warning.php"><button align="center" style="width:120px;height:40px;font-size:20px;">今日警告</button></a>
			</div>
		</div>	
		</div>
		<div class="col-md-12" style="text-align:center;">
			<h4>依區域查詢</h4>
			<hr>
			<a href="pm1.php"><input type="button" value="北部" style="width:120px;height:40px;font-size:20px;"></a>
			<a href="pm2.php"><input type="button" value="竹苗" style="width:120px;height:40px;font-size:20px;"></a>
			<a href="pm3.php"><input type="button" value="中部" style="width:120px;height:40px;font-size:20px;"></a>
			<a href="pm4.php"><input type="button" value="雲嘉南" style="width:120px;height:40px;font-size:20px;"></a>
			<a href="pm5.php"><input type="button" value="高屏" style="width:120px;height:40px;font-size:20px;"></a>
			<a href="pm6.php"><input type="button" value="宜蘭" style="width:120px;height:40px;font-size:20px;"></a>
			<a href="pm7.php"><input type="button" value="花東" style="width:120px;height:40px;font-size:20px;"></a>
			<a href="pm8.php"><input type="button" value="離島" style="width:120px;height:40px;font-size:20px;"></a>
		</div>
		<div class="col-md-12" style="text-align:center;">
			<h4>快速搜尋</h4>
			<hr>
			
		</div>
	<div>
		
		
	</div>
	<?php
	$result = mysqli_query($Link, $sql);
	
	echo "<table class='table table-hover' style='background:#D6E6FF'>";
	echo '<thead><tr><th>站名</th><th>即時濃度</th><th>上一小時濃度</th><th>警訊</th></tr></thead><tbody>';
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
		
				else
					{
						$warn = '任何人如果有不適，如眼痛，咳嗽或喉嚨痛等，應減少體力消耗，特別是減少戶外活動;有心臟、呼吸道及心血管疾病的成人與孩童，以及老人應避免體力消耗，特別是避免戶外活動。具有氣喘的人可能需增加使用吸入劑頻率。';
					}
		
		
		
		echo '<tr><td>'.$row['Sitename'].'</td>';
		echo '<td>'.$row['Immediate']."</td>";
		echo '<td>'.$row['Onehourago'].'</td>';
		echo '<td>'.$warn.'</td></tr>';
	}

	echo '</tbody></table>';
	mysqli_close($Link);
	?>
	
	
	</body>
</html>