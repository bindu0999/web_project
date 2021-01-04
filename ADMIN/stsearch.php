<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];



include './connection.php';

if (isset($_POST['update'])) {
  $id = $_POST['sid'];
  $name = $_POST['stname'];
  $email = $_POST['stemail'];
  $phone = $_POST['stphone'];
  $pass = $_POST['stpass'];
  $year = $_POST['styear'];
  $stream = $_POST['stream'];

  if (!empty($id) || !empty($name) || !empty($email) || !empty($phone) || !empty($pass) || !empty($year) || $stream != "Select") {

    $sql = "UPDATE `pms`.`student` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$pass', `year` = '$year', `stream` = '$stream' WHERE `student`.`s_id` = '$id';";
    mysqli_query($conn, $sql);
    $conn->close();
    header('Location:stsearch.php');
  } else {
    echo 'Please fill up all fields';
    header('Location:stsearch.php');
  }
}
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
    <div>

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

        <form method="post" action="stsearch.php">
          <div class="loginn">
            <table cellspacing="00" cellpadding="05">
              <tr>
                <td>
                  <font>Student ID&nbsp;:&nbsp;</font>
                </td>
                <td>
                  <?php
                  include '../connection.php';
                  $sql = "select s_id from student";
                  $result =  mysqli_query($conn, $sql)
                  ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px; ">
                    <option selected="selected">Student</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                      $category = $row['s_id'];
                    ?>
                      <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <th colspan="1" scope="col">
                  <td><input class="submit" type="submit" name="search" value="Search" id="bt" />
                </td>
                <td>&nbsp;</td>
              </tr>
            </table>
          </div>
          <div class="login1">
        <table cellpadding="03">
            <?php
            if (isset($_POST['search'])) {
              $username = $_POST['id'];
              $sql1 = "select * from student where s_id ='$username'; ";
              $rec = mysqli_query($conn, $sql1);
              $row = mysqli_fetch_assoc($rec);
            }
            ?>
            <tr>
              <td>
                <font>Student ID&nbsp;:&nbsp;</font>
              </td>
              <td><input id="in" type="text" name="sid" value="<?php echo $row['s_id']; ?>" />
              </td>
            </tr>
            <tr>
              <td>
                <font>Name&nbsp;:&nbsp;</font>
              </td>
              <td><input id="in" type="text" name="stname" value="<?php echo $row['name']; ?>" /></td>
            </tr>
            <tr>
              <td>
                <font>Email&nbsp;:&nbsp;</font>
              </td>
              <td><input id="in" type="email" name="stemail" value="<?php echo $row['email']; ?>" /></td>
            </tr>
            <tr>
              <td>
              <font>Phone&nbsp;:&nbsp;</font>
              </td>
              <td><input id="in" type="text" name="stphone" value="<?php echo $row['phone']; ?>" /></td>
            </tr>
            <tr>
              <td>
                <font >Password &nbsp;:&nbsp;</font> </td> <td><input id="in" type="password" name="stpass" value="<?php echo $row['password']; ?>" />
              </td>
            </tr>
            <tr>
              <td>
                <font>Year&nbsp;:&nbsp;</font>
              </td>
              <td><input id="in" type="text" name="styear" value="<?php echo $row['year']; ?>" /></td>
            </tr>
            <tr>
              <td>
                <font>Stream&nbsp;: &nbsp;</font>
              </td>
              <td><select name="stream" style="width: 185px; height: 1.6em; font-size: 15px; ">
                  <option value="Selcet">Select</option>
                  <option value="CSE" <?php if ($row['stream'] == 'CSE') echo 'selected="selected"'; ?>>CSE</option>
                  <option value="COM" <?php if ($row['stream'] == 'COM') echo 'selected="selected"'; ?>>COM</option>
                  <option value="EE" <?php if ($row['stream'] == 'EE') echo 'selected="selected"'; ?>>EE</option>
                </select></td>
            </tr>
            <tr>
              <th colspan="1"scope="col">
                <td>
                <input class="submit" type="submit" name="update" value="Update" id="bt" /></td>
            </tr>
          </table><br />
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
  </table>
<?php
}
?>