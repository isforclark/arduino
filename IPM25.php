<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title>各地區即時PM2.5</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
		<link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

		<script src="./js/pm.js"></script>
		
		<style type="text/css">
			body{
				background-color:#fefefe;
			}
			.title-block{
				background-color:#eeeeee;
				box-shadow: 2px 2px 5px #888888;
			}

			hr{
				height: 2px;
				border: 0;
				box-shadow: 0 10px 10px -10px #8c8b8b inset;
			}

			i{
				margin-right: 1em;
			}

			img{
				padding: 1em 1em 1em 0;
    			width: 150%;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class='row'>
				<div class='col-md-12 col-sm-12 title-block'>
					<div class="col-md-6 col-sm-6">
						<div class="col-md-2 col-lg-2"><img src="2.png"></img></div>
						<div class="col-md-10col-lg-10">
							<h1>TAKE DEEP BREATH<span><h5>avoid pm 2.5</h6></span></h1>
							
						</div>
						
					</div>
					<div class="col-md-6 col-sm-6" style="margin-top:2em;text-align:right;">
						<a href="personpage.php"><button class="btn btn-success btn-lg" align="center" >歷史紀錄</button></a>
						<a href="warning.php"><button class="btn btn-warning btn-lg" align="center">今日警告</button></a>
					</div>
					
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6"  style="text-align:center;padding:1em;">
					<h3><i class="fa fa-map-pin" aria-hidden="true"></i>依區域查詢</h4>
					<hr>
					<button class="btn btn-default search_button" value="10">全部</button>
					<button class="btn btn-default search_button" value="1">北部</button>
					<button class="btn btn-default search_button" value="3">竹苗</button>
					<button class="btn btn-default search_button" value="4">中部</button>
					<button class="btn btn-default search_button" value="6">雲嘉南</button>
					<button class="btn btn-default search_button" value="7">高屏</button>
					<button class="btn btn-default search_button" value="8">宜蘭</button>
					<button class="btn btn-default search_button" value="9">花東</button>
					<button class="btn btn-default search_button" value="0">離島</button>
				</div>
				<div class="col-md-6" style="text-align:center;padding:1em;">
					<h3><i class="fa fa-rocket" aria-hidden="true"></i>快速搜尋</h4>
					<hr>
					<select class="selectpicker" id="sp">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relsh</option>
					</select>
					<!--canvas id="myChart" width="400" height="400"></canvas-->	
				</div>
				<div class="col-md-12" id="result"></div>	
			</div>
		</div>
	</body>
</html>