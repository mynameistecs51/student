<!DOCTYPE html>
<html>
<head>
  <title>Student Case</title>
</head>
<body>
  <?php

  include "connect.php";//เรียกใช้ไฟล์ connect.php
  if(!empty($_SESSION['username'])){ //ถ้าผู้ใช้งานไม่เท่ากับ 0 หรือค่าว่าง
//ให้แสดงชื่อผู้ใช้ และข้อความ ลงชื่อออกจากระบบ
   echo "<h2 align='right'> คุณ ".$_SESSION['full_name']." /<a href='logout.php' align='right'>ลงชื่อออก</a></h2>";
 }

//สร้างคำสั่ง SQL
 $strSql = "SELECT * FROM student";
  $result = mysql_query($strSql)or die("Query Error "); // เชค query Sql ถ้า query ไม่ผ่านจะขึ้นแสดงข้อความแจ้งเตือน
  $num_row = mysql_num_rows($result); // เช้คว่ามีข้อมูลหรือไม่ โดยให้นับแถวในตารางข้อมูล

  ?>

  <div align="center">

    <p> <h1>ข้อมูลนักศึกษา </h1></p>
    <h3><u> <a href="add_student.php" align="center"> เพิ่มนักศักษา </a> </u></h3>
    <table border="1" width="80%">
      <caption width='100%'>
        <div align="right">
          <form action="search_student.php" method="post" accept-charset="utf-8">
            รหัสนักศึกษา:
            <input type="text" name="std_no">
            <button type="submit"> ค้นหา</button>
          </form>
        </div>

      </caption>
      <thead>
        <tr>
          <th> ภาพ </th>
          <th> รัหนักศึกษา </th>
          <th> ชื่อ - สกุล </th>
          <th> สาขาวิชา </th>
          <th> คณะ </th>
          <th> จัดการข้อมูล </th>
        </tr>
      </thead>

      <tbody align="center">
        <!-- เชคข้อมูลในแถวว่า มีจำนวนเท่า 0 หรือไม่  ถ้าเท่ากับ 0 ให้แสดงข้อความว่า ไม่มีข้อมูล ถ้าไม่ใช่ให้แสดงข้อมูลทั้งหมด-->
        <?php if($num_row == 0): ?>
         <tr>
          <td colspan="6">
            ================= ไม่มีข้อมูล =================
          </td>
        </tr>
        <?php else: ?>
          <!-- เราจะใช้ while loop เพื่อนำข้อมูลทั้งหมดมาแสดง โดยนำข้อมูลที่ query ออกมาได้เก็บไว้ใน คำสั่งชื่อ mysql_fetch_assoc() -->
          <?php while($row = mysql_fetch_assoc($result)): ?>
            <tr>
              <td>
                <?php
              if(!empty($row['std_picture'])){  //เชคว่ามีรูปหรือไม่ ถ้ามีให้แสดงรูปภาพ ถ้าไม่มีให้แสดงข้อความ No Picture
                echo "<img src="."images/".$row['std_picture']." alt='' width='100' height='auto'>";
              }else{
                echo "No Picture";
              }
              ?>
            </td>
            <td><?php echo $row["std_no"]; ?></td>  <!-- นำข้อมูล รหัสนึกศึกษามาแสด -->
            <td><?php echo $row["std_name"]; ?></td>  <!-- นำข้อมูล ชื่อ - สกุล มาแสดง -->
            <td><?php echo $row["std_branch"]; ?></td>  <!-- นำข้อมูล สาขาวิชา มาแสดง  -->
            <td><?php echo $row["std_faculty"]; ?></td>  <!-- นำข้อมูล คณะมาแสดง -->
            <td>
              <a href='<?php echo "edit_student.php?id=".$row["std_id"];?>' ><button> แก้ไข </button></a>
              <a href='<?php echo "delete_student.php?id=".$row["std_id"];?>' ><button> ลบ </button></a>
            </td>
          </tr>

          <?php endwhile ?>  <!-- จบ while loop -->
        <?php endif ?> <!-- จบ if statements -->
      </tbody>

    </table>
  </div>
</body>
</html>