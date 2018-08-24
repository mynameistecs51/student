<?php

$hostname = "localhost";  //ชื่อ Hostname ที่ใช้งาน
$username = "root"; // username ที่ใช้เข้าสู่ฐานข้อมูล
$password = ""; // password ที่ใช้เข้าสู่ฐานข้อมูล
$dbname = "student"; // ตารางฐานข้อมูล

$connect = mysql_connect($hostname,$username,$password)or die("Connect Failsed"); //ทำการเชื่อมต่อฐานข้อมูล
$selectDB = mysql_select_db($dbname)or die("No't Conect Database");//ทำการเลือกฐานข้อมูล
// check connect

/* กำหนด character เป็น UTF-8 เพื่อไม่ให้การแสดงภาษาไทยเพี้ยน */
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

session_start(); //ประกาศใช้ session
$url = $_SERVER['SERVER_NAME'];
?>