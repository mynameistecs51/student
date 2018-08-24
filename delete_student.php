<?php
// เรียกใช้ไฟล์ connect
include "connect.php";
//เช็คว่ามีการลงชื่อเข้าใช้ระบบหรือยัง
if (empty($_SESSION['username'])) { //ถ้า username เป็น 0 หรือค่าว่าง
    echo "กรุณาลงชื่อเข้าใช้ระบบ !!"; //แสดงข้อความ กรุณาลงชื่อเข้าใช้ระบบ !!
    header('refresh: 2; url=' . dirname($_SERVER['SCRIPT_NAME']) . '/login.php'); //แสดงข้อความค้างไว้ 2 วินาที แล้วไปหน้า login
    exit; //ออกจากการทำงาน
}
//แสดงชื่อผู้ใช้งาน และเมนูลงชื่อออกจากระบบ
echo "<h2 align='right'> คุณ " . $_SESSION['full_name'] . " /<a href='logout.php' align='right'>ลงชื่อออก</a></h2>";
//สร้างตัวแปร $id มารับข้อมูล id ที่ส่งมาแบบ GET
$id = $_GET["id"];
//สร้างตัวแปร $picture_dir มาเก็บ parth ของรูปภาพ
$picture_dir = "images/";
//สร้างตัวแปรมา เก็บคำสั่ง sql
$delPicture = "SELECT * FROM student WHERE std_id = " . $id;
// query คำสั่ง sql แล้วเอาค่าที่ได้มาเก็บไว้ใน  $pictureQuery ถ้า query ไม่ได้จะแสดงข้อความ NO query
$pictureQuery = mysql_query($delPicture) or die("No query");
//สร้างตัวแปร $row มาเก็บ่ข้อมูล ที่ได้จากการ query
$row = mysql_fetch_assoc($pictureQuery);
//ถ้ามีรูปำาพ
if (!empty($row['std_picture'])) {
//ให้ลบรูปภาพออกก่อน
    unlink($picture_dir . $row["std_picture"]);
//แล้วทำการลบข้อมูลในฐานข้อมูล
    $strSql   = "DELETE FROM student WHERE std_id = " . $id;
    $sqlQuery = mysql_query($strSql) or die("Not query sql");
} else {
//ถ้าไม่มีรูปภาพให้ลบข้อมูลที่อยู่ในฐานข้อมูล
    $strSql   = "DELETE FROM student WHERE std_id = " . $id;
    $sqlQuery = mysql_query($strSql) or die("Not query sql");
}
//เมื่อระบบทำงานเสร็จแล้วให้กลับไปหน้า index
header('Location: index.php');
