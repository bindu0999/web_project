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
    <font class="heading">Project Managenent System</font>

    <br />
    <div class="main">
    <img src="19366.jpg" width="100%">
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
              <td>Login As&nbsp;:&nbsp;</font>
              </td>
              <td>

                <select name="role" style="width: 208px; height: 2em; font-size: 15px;">
                  <option value="Student">Student</option>
                  <option value="Faculty">Faculty</option>
                  <option value="Admin">Admin</option>
                </select>
              </td>
            </tr>
            <tr>
              <th colspan="1" scope="col">
              <td><input type="submit" class="submit" name="register" value="Submit" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </body>

  </html>
<?php
} else {
  header("location:Admin.php");
}
?>