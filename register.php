<!DOCTYPE html>
<html>
<head>
  <title>Register Student</title>
</head>
<body>
  <div align="center">
    <p> <h1>สมัครสมาชิก เพื่อลงชื่อเข้างานใช้ระบบ </h1></p>

    <table width="30%" align="center">
      <!-- ฟอร์มส่งข้อมูล ไปหน้า save_student.php ในรูปแบบ POST -->
      <form action="create_user.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">

        <tbody>
          <caption> <h3><u> <a href="login.php">กลับไปหน้า Login </a></u></h3> </caption>
          <tr>
            <td align="right">
              Username:
            </td>
            <td>
              <input type="text" name="username" autofocus>
            </td>
          </tr>
          <tr>
            <td align="right">
              Password:
            </td>
            <td>
              <input type="password" name="password">
            </td>
          </tr>
          <tr>
            <td align="right">
              ชื่อ - สกุล:
            </td>
            <td>
              <input type="text" name="std_name">
            </td>
          </tr>
          <tr align="center">
            <td colspan="3">
              <input type="reset" name="reset" value="ยกเลิก">
              <input type="submit" name="submit" value="บันทึก" >
            </td>
          </tr>
        </tbody>

      </form>
    </table>
  </div>
</body>
</html>