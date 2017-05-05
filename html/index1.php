<?php session_start(); ?>
<html>

<head>
<!---<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />---> 
<title>登入／註冊</title>
<style type="text/css">
     body{background-color:#FFFFBB;} 
     
	</style>
<!-- 設定網頁編碼為UTF-8 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div align=center >
<p><img src="wellcome.jpg"></p>
<form name="form" method="post" action="connect.php">
帳號：<input type="text" name="userID" /> <br>
密碼：<input type="password" name="passWord" /> <br>
<input type="submit" name="button" value="登入" />&nbsp;&nbsp;
<a href="register.html">申請帳號</a>
</div>
</form>
</body>
</html>



<!---http://dreamtails.pixnet.net/blog/post/23583385-%5B%E6%95%99%E5%AD%B8%5Dphp%E6%9C%83%E5%93%A1%E7%99%BB%E5%85%A5%E6%A9%9F%E5%88%B6%EF%BC%8Csession%E7%9A%84%E4%BD%BF%E7%94%A8%EF%BC%8C%E7%B0%A1%E6%98%93%E5%9E%8B--->