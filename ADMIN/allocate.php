<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];



include './connection.php';


if (isset($_POST['allocate'])) {
  $sid = $_POST['sid'];
  $fid = $_POST['faid'];
  $proid = $_POST['projectid'];

  if (!empty($sid) || !empty($fid) || !empty($proid)) {

    $sql = "INSERT INTO `pmas`.`project` (`p_id`, `name`, `domain`, `s_id`, `f_id`, `ppf`, `psf`, `remark`) VALUES ('$proid', '', '', '$sid', '$fid', '', '', '');";
    mysqli_query($conn, $sql);
    $conn->close();
    header('Location:allocate.php');
  } else {
    echo 'Please fill up all fields';
    header('Location:allocate.php');
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
        <form method="post" action="allocate.php">
          <div class="login">
            <table>
              <tr>
                <td rowspan="2">&nbsp;</td>
                <td><br />
                  <font>Student ID&nbsp;:&nbsp;</font>
                </td>
                <td>
                  <br /><br />
                  <?php
                  include '../connection.php';
                  $sql = "select s_id from student";
                  $result =  mysqli_query($conn, $sql)
                  ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px;">
                    <option>Student</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                      $category = $row['s_id'];
                    ?>
                      <option selected="selected" value="<?php echo $category; ?>"><?php echo $category; ?></option>
                    <?php
                    }
                    ?>
                  </select> <br /><br />
                </td>
                <td rowspan="2">&nbsp;</td>
              </tr>
          </div>
          <?php
          if (isset($_POST['chk'])) {
            $username = $_POST['id'];
            $sql1 = "select * from project where s_id ='$username'; ";
            $rec = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_assoc($rec);
          }
          ?>
          <tr>
            <th colspan="1" scope="col">
            <td><input class="submit" type="submit" style="width:170px;  height: 2em; font-size: 15px;" name="chk" value="Check For Request" /> <br /><br /> </td>
          </tr>
          </table>
    </div>
    <div class="login1">
      <table cellpadding="05">
        <tr>
          <td><br />
            <font>Student ID&nbsp;:&nbsp;</font>
          </td>
          <td><br /><input id="in" type="text" name="sid" value="<?php echo $row['s_id']; ?>"></td>
        </tr>
        <tr>
          <td>
            <font>Faculty ID&nbsp;:&nbsp;</font>
          </td>
          <td><input id="in" type="text" name="faid" value="<?php echo $row['f_id']; ?>"></td>
        </tr>
        <tr>
          <td>
            <font>Project ID&nbsp;:&nbsp;</font>
          </td>
          <td><input id="in" type="text" name="projectid" value="" />
            <font color="red">*</font>
          </td>
        </tr>
        <tr>
          <th colspan="1" scope="col">
           <td> <input class="submit" id="bt" type="submit" name="allocate" value="Allocate" /></td>
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
  </table>
<?php
}
?>