<!DOCTYPE html>
<?php
	if($_POST){
		mysql_connect("localhost","root","");
		mysql_select_db("puzzle");
		date_default_timezone_set("PRC");
		
		$username=$_POST['username'];
		$c_time=date("Y-m-d H:i:s");
		$ua=$_SERVER["HTTP_USER_AGENT"];
		$ip=$_SERVER["REMOTE_ADDR"];
		$insertSql="insert into puzzle(username,c_time,ua,ip) values('$username','$c_time','$ua','$ip')";
		mysql_query($insertSql);
		header("location:../boon");
	}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"></link>
		<style>
			.center{width:900px;margin:0 auto;text-align:center}
		</style>
	</head>
	<body>
		<div class="center">
			<h1>leave your name</h1>
			<form method="post">
				<input type="text" name="username" placeholder="WHO_ARE _YOU" /><br />
				<input class="btn" type="submit" value="OK" />
			</form>
		</div>
	</body>
</html>
