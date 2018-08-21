<?php
session_start();//เปิดใช้งาน session

session_destroy(); //ลบข้อมูลทั้งหมดที่เก็บในรูปแบบ session

echo "!! ลงชื่อออก เรียบร้อยคะ !!";//แสดงข้อความ ลงชื่อออกเรียบร้อย

header( 'refresh: 2; url=/student/login.php' );//แสดงข้อความค้างไว้ 2 วินาที แล้วไปหน้า login
?>