<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];



include './connection.php';

if (isset($_POST['update'])) {
  $id = $_POST['fid'];
  $name = $_POST['faname'];
  $email = $_POST['faemail'];
  $phone = $_POST['faphone'];
  $pass = $_POST['fapass'];
  $qualification = $_POST['faqualification'];

  if (!empty($id) || !empty($name) || !empty($email) || !empty($phone) || !empty($pass) || !empty($qualification)) {

    $sql = "UPDATE `pmas`.`faculty` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$pass', `qualification` = '$qualification' WHERE `faculty`.`f_id` = '$id';";
    mysqli_query($conn, $sql);
    $conn->close();
    header('Location:fa_search.php');
  } else {
    echo 'Please fill up all fields';
    header('Location:fa_search.php');
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

    <body>
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
      <form method="post" action="fa_search.php">
        <div class="loginn">
          <table cellpadding="05">
            <tr>
              <td>
                <font>Faculty ID&nbsp;:&nbsp; </font>
              </td>
              <td>
                <?php
                include '../connection.php';
                $sql = "select f_id from faculty";
                $result =  mysqli_query($conn, $sql)
                ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px;">
                  <option>Faculty</option>
                  <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                    $category = $row['f_id'];
                  ?>
                    <option selected="selected" value="<?php echo $category; ?>"><?php echo $category; ?></option>
                  <?php
                  }
                  ?>

                </select></td>
            </tr>
            <tr>
              <th colspan="1" scope="col">
              <td><input class="submit" id="bt " type="submit" name="search" value="Search" />
              </td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </div>
        <div class="login1">
          <table  cellpadding="05">
            <?php
            if (isset($_POST['search'])) {
              $username = $_POST['id'];
              $sql1 = "select * from faculty where f_id ='$username'; ";
              $rec = mysqli_query($conn, $sql1);
              $row = mysqli_fetch_assoc($rec);
            }
            ?>
            <tr>
              <td>
                <font>Faculty ID&nbsp;:&nbsp;</font>
              </td>
              <td><input id="in" type="text" name="fid" value="<?php echo $row['f_id']; ?>" /></td>
            </tr>
            <tr>
              <td>
                <font>Name&nbsp;:&nbsp;</font>
              </td>
              <td><input id="in" type="text" name="faname" value="<?php echo $row['name']; ?>" /></td>
            </tr>
            <tr>
              <td>
                <font>Email&nbsp;:&nbsp;</font>
              </td>
              <td><input id="in" type="email" name="faemail" value="<?php echo $row['email']; ?>" /></td>
            </tr>
            <tr>
              <td>
                <font>Phone&nbsp;:&nbsp;</font>
              </td>
              <td><input id="in" type="text" name="faphone" value="<?php echo $row['phone']; ?>" /></td>
            </tr>
            <tr>
              <td>
                <font>Password &nbsp;:&nbsp;</font>
              </td>
              <td><input id="in" type="password" name="fapass" value="<?php echo $row['password']; ?>" /></td>
            </tr>
            <tr>
              <td>
                <font>Qualification&nbsp;:&nbsp;</font>
              </td>
              <td><input id="in" type="text" name="faqualification" value="<?php echo $row['qualification']; ?>" /></td>
            </tr>
            <tr>
              <th colspan="1" scope="col">
              <td> <input type="submit" class="submit" name="update" value="Update" id="bt" /></td>
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