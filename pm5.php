<a href=""><i
<html>
	<head>
		<title>各地區即時PM2.5</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
	<div style="text-align:center;"><img src="2.jpg"></img></div>
	<div></br></div>
	<div style="text-align:center;">
		<a href="personpage.php"><button align="center" style="width:120px;height:40px;font-size:20px;">歷史紀錄</button></a>
		<a href="warning.php"><button align="center" style="width:120px;height:40px;font-size:20px;">今日警告</button></a>
	</div>
	<div></br></div>
	<div style="text-align:center;">
		<a href="pm1.php"><input type="button" value="北部" style="width:120px;height:40px;font-size:20px;"></a>
		<a href="pm2.php"><input type="button" value="竹苗" style="width:120px;height:40px;font-size:20px;"></a>
		<a href="pm3.php"><input type="button" value="中部" style="width:120px;height:40px;font-size:20px;"></a>
		<a href="pm4.php"><input type="button" value="雲嘉南" style="width:120px;height:40px;font-size:20px;"></a>
		
		<a href="pm6.php"><input type="button" value="宜蘭" style="width:120px;height:40px;font-size:20px;"></a>
		<a href="pm7.php"><input type="button" value="花東" style="width:120px;height:40px;font-size:20px;"></a>
		<a href="pm8.php"><input type="button" value="離島" style="width:120px;height:40px;font-size:20px;"></a>
		<a href="IPM25.php"><input type="button" value="全部" style="width:120px;height:40px;font-size:20px;"></a>
	</div>
	<div></br></div>
	<?php
	require('simple_html_dom.php');
	$html = file_get_html('http://taqm.epa.gov.tw/pm25/tw/PM25A.aspx?area=7');
	echo "<table class='table table-hover' style='background:#CBD6FF'>";
	$data = $html->find("table[class='TABLE_G'] tbody tr");
	echo '<thead><tr><th>站名</th><th>即時濃度</th><th>上一小時濃度</th></tr></thead><tbody>';
	foreach(array_slice($data,1) as $element){
		echo '<tr><td>'.$element->children(0)->children(0)->innertext .'</td>';	
		echo '<td>'.$element->children(1)->innertext .'</td>';	
		echo '<td>'.$element->children(2)->innertext .'</td></tr>';
	}
	echo '</tbody></table>';
	?>
	
	
	</body>
</html>