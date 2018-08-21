<!DOCTYPE html>
<html>
<head>
  <title>เพิ่มนักศึกษา</title>
</head>
<body>
  <?php
//ประกาศใช้ session
  session_start();
//เช็คว่ามีการลงชื่อเข้าใช้ระบบหรือยัง
  if(empty($_SESSION['username'])){  //ถ้า username เป็นค่าว่างหรือเท่ากับ 0
    echo "กรุณาลงชื่อเข้าใช้ระบบ !!"; //ให้แสดงข้อความ  กรุณาลงชื่อเข้าใช้ระบบ!!
    header( 'refresh: 2; url=/student/login.php' );//แสดงข้อความค้างไว้ 2 วินาที แล้วไปหน้า login
    exit; //ออกจากการทำงาน
  }else{//ถ้า login สำเร็จให้แสดงชื่อผุ้เข้าใช้ กับข้อความ ลงชื่อออก
    echo "<h2 align='right'> คุณ ".$_SESSION['full_name']." /<a href='logout.php' align='right'>ลงชื่อออก</a></h2>";
  }
  ?>

  <div align="center">
    <p> <h1>ข้อมูลนักศึกษา </h1></p>

    <table border='1' width="30%" align="center">
      <!-- ฟอร์มส่งข้อมูล ไปหน้า save_student.php ในรูปแบบ POST -->
      <form action="save_student.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">

        <tbody>
          <caption> <h3><u> <a href="index.php"> หน้าแรก </a></u></h3> </caption>
          <tr>
            <td rowspan="4" width="200">
             <input type="file" name="std_picture">

           </td>
           <td>
            รหัสนักศึกษา: <br>
            <input type="text" name="std_no">
          </td>
        </tr>
        <tr>
          <td>
            ชื่อ - สกุล: <br>
            <input type="text" name="std_name">
          </td>
        </tr>
        <tr>
          <td>
            สาขาวิชา: <br>
            <input type="text" name="std_branch">
          </td>
        </tr>
        <tr>
          <td>
            คณะ: <br>
            <input type="text" name="std_faculty">
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