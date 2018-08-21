<?php
include "connect.php";

$std_no = $_POST["std_no"];  // รับค่า รหัสนักศึกษามาจากฟอร์มเพิ่มข้อมูล  ในรูปแบบ POST
$std_name = $_POST["std_name"]; // รับค่า ชื่อ - สกุล ศึกษามาจากฟอร์มเพิ่มข้อมูล  ในรูปแบบ POST
$std_branch = $_POST["std_branch"]; // รับค่า รหัสนักศึกษามาจากฟอร์มเพิ่มข้อมูล  ในรูปแบบ POST
$std_faculty = $_POST["std_faculty"]; // รับค่า ชื่อคณะมาจากฟอร์มเพิ่มข้อมูล  ในรูปแบบ POST
$std_picture = $_FILES["std_picture"]['tmp_name'];  //รับค่า ไฟล์ที่พัอโหลด
$picture_dir = "images/"; //ประกาศ path ที่จะทำการเก็บรูปภาพ
$changname_picture = date("Ymdhis");  // สร้างตัวแปรวันที่เพื่อจะใช้เป็นชื่อภาพเวลาจัดเกํบ
//สร้างตัวแปรมารองรับ นามสกุลของรูปภาพ
$extension = !$std_picture ? "" : '.'.explode('/',$_FILES["std_picture"]["type"])[1];
$picture_name = $changname_picture.$extension; //สร้างตัวแปรมาเก็บชื่อและนามสกุลของภาพ

if(!empty($_FILES["std_picture"]["name"])){   //เชคว่ามีการอัพโหลดรูปภาพ
// ทำการบันทึกรูปภาพลงโฟลเดอร์ที่เตรียมไว้
  move_uploaded_file($std_picture,$picture_dir.$picture_name);
// สร้างคำสั่ง SQL
  $str_sql = "INSERT INTO student (std_no,std_name,std_branch,std_faculty,std_picture) VALUES ('".$std_no."','".$std_name."','".$std_branch."','".$std_faculty."','".$picture_name."')";

  $sqlQuery = mysql_query($str_sql)or die("Query ผิดพลาด" . $str_sql);//Query คำสั่ง sql

}else{ //ถ้าไม่มีการอัพโหลดรูปภาพให้ บันทึกข้อมูลต่อ
//สร้างคำสั่ง SQL
  $str_sql = "INSERT INTO student (std_no,std_name,std_branch,std_faculty,std_picture) VALUES ('".$std_no."','".$std_name."','".$std_branch."','".$std_faculty."','')";

 $sqlQuery = mysql_query($str_sql)or die("Query ผิดพลาด" . $str_sql);//Query คำสั่ง sql
}


//เมื่อบันทึกเสร็จแล้วให้กลับไปหน้า index
header('Location: index.php');
?>