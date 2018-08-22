<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login Student</title>
</head>
<body>
  <div align="center">
   <p> <h1>ลงชื่อ เพื่อเข้างานใช้ระบบ </h1></p>

   <table border='1' width="30%" align="center">
    <!-- ฟอร์มส่งข้อมูล ไปหน้า check_login.php ในรูปแบบ POST -->
    <form action="check_login.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">

      <tbody>
        <caption> <h3><u> <a href="register.php"> สมัครสมาชิก </a></u></h3> </caption>
        <tr>
          <td>Username: </td>
          <td><input type="text" name="username" placeholder="username" autofocus required></td>
        </tr>
        <tr>
          <td>Password: </td>
          <td><input type="password" name="password" placeholder="password"></td>
        </tr>
        <tr>
          <td align="right"><input type="reset" name="reset" value="reset"></td>
          <td><input type="submit" value="Login"></td>
        </tr>
      </tbody>
    </table>
  </form>
</div>

</body>
</html>