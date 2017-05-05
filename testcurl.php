<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
<body>
	<?php
		require('connectDB.php');
		mysqli_query($Link, "DELETE FROM areapm");
		$sql = 'SELECT * FROM areapm';
		$result = mysqli_query($Link, $sql);
		
		while( $row = mysqli_fetch_assoc($result) )
		{ 
			echo $row['Sitename']."/".$row['Immediate']."/".$row['Onehourago'];
		}
		
		require('simple_html_dom.php');
		$html = file_get_html('http://taqm.epa.gov.tw/pm25/tw/PM25A.aspx?area=10');
		$data = $html->find("table[class='TABLE_G'] tbody tr");
		foreach(array_slice($data,1) as $element){
			$Sitename = $element->children(0)->children(0)->innertext;	
			$Immediate = $element->children(1)->children(0)->innertext ;	
			$Onehourago = $element->children(2)->children(0)->innertext ;
			$sql = "INSERT INTO areapm (Sitename, Immediate, Onehourago ) VALUES ('$Sitename','$Immediate','$Onehourago')" ;
			$result = mysqli_query($Link,$sql);
			
			
		}

		//mysqli_free_result($result); 
		//mysqli_close($Link);
		
	?>
</body>
</html>