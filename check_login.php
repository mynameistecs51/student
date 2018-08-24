<?php
include "connect.php"; //เรียกใช้ไฟล์ connect.php
$username = $_POST['username']; //เก็บข้อมูล username ที่ได้จากหน้า login
$password = $_POST['password']; //เก็บข้อมูล password ที่ได้จากหน้า login
//สร้าวคำสั่ง SQL
$sql      = "SELECT * FROM account WHERE ac_username = '" . $username . "' AND  ac_password = '" . $password . "' ";
$query    = mysql_query($sql); //query คำสั่ง sql
$num_rows = mysql_num_rows($query); //นับจำนวนข้อมูลในฐานข้อมูล
if (!empty($num_rows)) {
    //ถ้าข้อมูลไม่เท่ากับค่าว่างหรือเท่าไม่เท่ากับ 0
    while ($rows = mysql_fetch_assoc($query)) { //ใช้ ลูป while ในการ แสดงค่าของตัวแปร $query
        $_SESSION['username']  = $rows['ac_username']; //เก็บข้อมู username ในรูปแบบ session
        $_SESSION['full_name'] = $rows['ac_full_name']; //เก็บช้อมูล full_name ในรูปแบบ session
    }
    // ให้ไปหน้า index
    header("Location: index.php");
} else {
    //ถ้า login ไม่สำเร็จ ให้แสดงข้อความ Username หรือ Password ไม่ถูกต้อง !!
    echo "Username หรือ Password ไม่ถูกต้อง !!";
    header('refresh: 2; url=' . dirname($_SERVER['SCRIPT_NAME']) . '/login.php'); //แสดงข้อความค้างไว้ 2 วินาที แล้วไปหน้า login
}
