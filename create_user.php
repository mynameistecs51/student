<?php
include "connect.php"; //เรียกใช้ไฟล์ connect.php

$username = $_POST['username']; //เก็บข้อมูลที่ส่งมาจากหน้าเพิ่มข้อมูล ในตัวแปร $username
$password = $_POST['password']; //เก็บข้อมูลที่ส่งมาจากหน้าเพิ่มข้อมูล ในตัวแปร $password
$std_name = $_POST['std_name']; //เก็บข้อมูลที่ส่งมาจากหน้าเพิ่มข้อมูล ในตัวแปร $std_name
//สร้างคำสั่ง SQL
$check_regis = "SELECT * FROM account WHERE ac_username = '" . $username . "' ";
$num_row     = mysql_num_rows(mysql_query($check_regis)); //นับจำนวนข้อมูลในฐานข้อมูลที่ได้จากการ Query คำสั่ง SQL

if ($num_row >= 1) { //ถ้ามีข้อมูลมากกว่าหรือเท่ากับ 1 แสดงว่า username นั้นมีการใช้งานแล้ว
    echo "Username นี้มีการใช้งานแล้ว"; //แสดงข้อความว่ามีผู้ใช้ username นี้แล้ว
    header('refresh: 2; url=' . dirname($_SERVER['SCRIPT_NAME']) . '/login.php'); //แสดงข้อความค้างไว้ 2 วินาที แล้วไปหน้า login
} else {
//ถ้าไม่ข้อมูล Username ที่รับเข้ามามีน้อยกว่า 1 แสดงว่า Username นี้ยังไม่มีผู้ใช้งาน
    $sql = "INSERT INTO account (ac_username, ac_password, ac_full_name) VALUES ('" . $username . "', '" . $password . "' ,'" . $std_name . "' )"; //สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูลงในตารางข้อมูล

    mysql_query($sql); //Query คำสั่ง SQL

    header("Location: login.php"); //เพิ่มข้อมูลเสร็จแล้วให้ไปหน้า login
}
