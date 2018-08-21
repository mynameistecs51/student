<?php
//เรียกใช้ไฟล์ connect.php
include "connect.php";

//รับค่าที่ส่งมาจากฟอร์มมีชนิดการส่งเป็น POST
$std_id = $_POST["std_id"];//เก็บข้อมูลที่ได้มาจากหน้า edit student ในตัวแปร $std_id
$std_no = $_POST["std_no"];//เก็บข้อมูลที่ได้มาจากหน้า edit student ในตัวแปร $std_no
$std_name = $_POST["std_name"];//เก็บข้อมูลที่ได้มาจากหน้า edit student ในตัวแปร $std_name
$std_branch = $_POST["std_branch"];//เก็บข้อมูลที่ได้มาจากหน้า edit student ในตัวแปร $std_branch
$std_faculty = $_POST["std_faculty"];//เก็บข้อมูลที่ได้มาจากหน้า edit student ในตัวแปร $std_faculty
$std_picture = $_FILES["std_picture"]['tmp_name'];//เก็บข้อมูลที่ได้มาจากหน้า edit student ในตัวแปร $std_picture

//ประกาศตัวแปรต่าง ๆ เพื่อมาเก็บชื่อของภาพที่ทำการอัพโหลด
$picture_dir = "images/";
$changname_picture = date("Ymdhis");
$extension = !$std_picture ? "" : '.'.explode('/',$_FILES["std_picture"]["type"])[1];
$picture_name = $changname_picture.$extension;

//คำสั่ง sql เพื่อใช้ในการดึงชื่อของรูปภาพของแต่ละ ID ที่ทำการแก้ไข
$sqlDetail = "SELECT * FROM student WHERE std_id = ".$std_id;
$sqlQuery = mysql_query($sqlDetail)or die("Not Query");
$row = mysql_fetch_assoc($sqlQuery);

//ถ้า $_FILES["std_picture"] ไม่เท่ากับค่าว่างแสดงว่ามีการพัอโหลดรูปภาพเข้ามาในระบบ
if(!empty($_FILES["std_picture"]["name"])){

//ให้ลบรูปภาพเดิมทิ้ง
  unlink($picture_dir.$row["std_picture"]);

//ทำการอัพโหลดรูปภาพใหม่เข้ามามาในระบบ
  move_uploaded_file($std_picture,$picture_dir.$picture_name);

// อัพเดทข้อมูลที่กรอกเข้ามาในฟอร์มลงระบบ
  $str_sql = "UPDATE student SET std_no = '".$std_no."', std_name = '".$std_name."', std_branch = '".$std_branch."', std_faculty = '".$std_faculty."', std_picture = '".$picture_name."' WHERE std_id = '".$std_id."' ";

  $sqlQuery = mysql_query($str_sql)or die("Query ผิดพลาด" . $str_sql);

//ถ้าหากว่าไม่มีการอัพโหลดรูปภาพ
}else{
//ให้ทำการอัพเดทเฉพาะข้อมูลที่กรอกเข้ามาเท่านั้น
  $str_sql = "UPDATE student SET std_no = '".$std_no."', std_name = '".$std_name."', std_branch = '".$std_branch."', std_faculty = '".$std_faculty."' WHERE std_id = '".$std_id."' ";

  $sqlQuery = mysql_query($str_sql)or die("Query ผิดพลาด" . $str_sql);
}

//เมื่อระบบทางานเสร็จแล้วให้กลับไปหน้า index
header('Location: index.php');
?>