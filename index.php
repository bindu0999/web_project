<?php
session_start();
if (empty($_SESSION['email'])) {
?>

  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Project Management System</title>
  </head>

  <body>
    <div class=".headbg">
    <p class="heading">Project Managenent System</p>
    <br/><br/>
    <hr />
    </div>
   
    <br />
    <div class="login">
      <form name="login" action="chk.php" method="post">
        <table cellspacing="02" cellpadding="05">
          <tr>
            <th colspan="2" scope="col">
              <font>LOGIN</font>
            </th>
          </tr>
          <tr>
            <td>ID&nbsp;:&nbsp;</font>
            </td>
            <td><input style="height: 20px; font-size: 15px;" type="text" name="id" /><br />
            </td>
          </tr>
          <tr>
            <td>Password&nbsp;:&nbsp;</font>
            </td>
            <td><input style="height: 20px; font-size: 15px;" type="password" name="pass" /></td>
          </tr>
          <tr>
            <td>Login_As&nbsp;:&nbsp;</font>
            </td>
            <td>
              <select name="role">
                <option value="Student">Student</option>
                <option value="Faculty">Faculty</option>
                <option value="Admin">Admin</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><input type="submit" class="submit" name="register" value="Submit" /></td>
          </tr>
        </table>
    </div>
  </body>

  </html>
<?php
} else {
  header("location:Admin.php");
}
?>