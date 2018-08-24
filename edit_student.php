<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>แก้ไขข้อมูลนักศึกษา</title>
  </head>
  <body>
    <?php
    include "connect.php"; //เรียกใช้ไฟล์ connect.php
    //เช็คว่ามีการลงชื่อเข้าใช้ระบบหรือยัง
    if (empty($_SESSION['username'])) { //ถ้า username เป็น 0 หรือค่าว่าง
    echo "กรุณาลงชื่อเข้าใช้ระบบ !!"; //แสดงข้อความ กรุณาลงชื่อเข้าใช้ระบบ !!
    header('refresh: 2; url=' . dirname($_SERVER['SCRIPT_NAME']) . '/login.php'); //แสดงข้อความค้างไว้ 2 วินาที แล้วไปหน้า login
    exit; //ออกจากการทำงาน
    }
    //แสดงชื่อผู้ใช้งาน และเมนูลงชื่อออกจากระบบ
    echo "<h2 align='right'> คุณ " . $_SESSION['full_name'] . " /<a href='logout.php' align='right'>ลงชื่อออก</a></h2>";
    $id       = $_GET["id"];
    $strSql   = "SELECT * FROM student WHERE std_id = " . $id;
    $querySql = mysql_query($strSql) or die("Not query");
    $row      = mysql_fetch_assoc($querySql);
    ?>
    <div align="center">
      <p> <h1>แก้ไขข้อมูลนักศึกษา </h1></p>
      <table border='1' width="30%" align="center">
        <form action="save_editstudent.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <input type="hidden" name="std_id" value="<?php echo $id ?>">
          <tbody>
            <caption> <h3><u> <a href="index.php"> หน้าแรก </a></u></h3> </caption>
            <tr>
              <td rowspan="4" width="200"  align="center">
                <img src="<?php echo "images/" . $row['std_picture']; ?>" alt="" width="200" height="auto">
                <input type="file" name="std_picture">
              </td>
              <td>
                รหัสนักศึกษา: <br>
                <input type="text" name="std_no" value="<?php echo $row['std_no']; ?>">
              </td>
            </tr>
            <tr>
              <td>
                ชื่อ - สกุล: <br>
                <input type="text" name="std_name" value="<?php echo $row['std_name']; ?>">
              </td>
            </tr>
            <tr>
              <td>
                สาขาวิชา: <br>
                <input type="text" name="std_branch" value="<?php echo $row['std_branch']; ?>">
              </td>
            </tr>
            <tr>
              <td>
                คณะ: <br>
                <input type="text" name="std_faculty" value="<?php echo $row['std_faculty']; ?>">
              </td>
            </tr>
            <tr align="center">
              <td colspan="3">
                <input type="submit" value="บันทึก" >
                <input type="reset" name="save" value="ยกเลิก">
              </td>
            </tr>
          </tbody>
        </form>
      </table>
    </div>
  </body>
</html>