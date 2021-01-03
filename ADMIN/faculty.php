<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];
if (empty($_SESSION['Email'])) {
  header("location:index.php");
} else {
  if ($role == "Admin") {
?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
      <link rel="stylesheet" type="text/css" href="../index.css">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

      <title>Project Management System</title>
    </head>
      <body class="sub">
        <font class="heading">Project Managenent System</font>
        <br /><br /><br />
        <ul>
          <li><a href="../ADMIN/student.php">Add Student</a></li>
          <li><a href="../ADMIN/faculty.php">Add Faculty</a></li>
          <li><a href="../ADMIN/stsearch.php">Search Student</a></li>
          <li><a href="../ADMIN/fa_search.php">Search Faculty </a></li>
          <li><a href="../ADMIN/allocate.php">Allocate</a></li>
          <li><a href="../ADMIN/skill.php">Skill Matrix</a></li>
          <li><a href="../ADMIN/report.php">Reports</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
        <form method="post" action="fa.php">
          <div class="loginn">

            <table cellpadding="05">
              <tr>

                <td>
                  <font>Faculty ID&nbsp;:&nbsp;</font>
                </td>
                <td><input id="in" type="text" name="id" />
                  <font color="red">*</font>
                </td>

              </tr>
              <tr>

                <td>
                  <font>Name&nbsp;:&nbsp;</font>
                </td>
                <td><input id="in" type="text" name="faname" />
                  <font color="red">*</font>
                </td>
                <t </tr> <tr>

                  <td>
                    <font>Email&nbsp;:&nbsp;</font>
                  </td>
                  <td><input id="in" type="email" name="faemail" />
                    <font color="red">*</font>
                  </td>

              </tr>
              <tr>

                <td>
                  <font>Phone&nbsp;:&nbsp;</font>
                </td>
                <td><input id="in" type="text" name="faphone" />
                  <font color="red">*</font>
                </td>

              </tr>
              <tr>

                <td>
                  <font>Password &nbsp;:&nbsp;</font>
                </td>
                <td><input id="in" type="password" name="fapass" />
                  <font color="red">*</font>
                </td>

              </tr>
              <tr>

                <td>
                  <font>Qualification&nbsp;:&nbsp;</font>
                </td>
                <td><input id="in" type="text" name="faqulification" />
                  <font color="red">*</font>
                </td>

              </tr>
              <tr>
                <td>&nbsp;</font>
                </td>
              </tr>
              <tr>
                <th colspan="1" scope="col">
                <td><input type="submit" class="submit" name="add" value="Add" id="bt" />
                </td>

              </tr>
            </table>
          </div>
        </form>
      <?php
    } elseif ($role == "Faculty") {
      ?>
        <?php
        header('Location:../Admin.php');
        ?>
      <?php
    } else {
      ?>
        <?php
        header('Location:../Admin.php');
        ?>
      <?php
    }
      ?>

    <?php
  }
    ?>
      </body>
    </html>