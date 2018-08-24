<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Log out</title>
		<link rel="stylesheet" href="">
	</head>
	<body>
		<?php
		session_start(); //เปิดใช้งาน session
		session_destroy(); //ลบข้อมูลทั้งหมดที่เก็บในรูปแบบ session
		echo "!! ลงชื่อออก เรียบร้อยคะ !!"; //แสดงข้อความ ลงชื่อออกเรียบร้อย
		header('refresh: 2; url=' . dirname($_SERVER['SCRIPT_NAME']) . '/login.php'); //แสดงข้อความค้างไว้ 2 วินาที แล้วไปหน้า login
		?>
	</body>
</html>