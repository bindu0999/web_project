<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];
include '../connection.php';
if (isset($_POST['view'])) {
  $username = $_POST['id'];
  $sql1 = "select * from faculty where f_id ='$username'; ";
  $rec = mysqli_query($conn, $sql1);
  $row = mysqli_fetch_assoc($rec);
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
        <form method="post" action="skill.php">
          <div class="loginn">
            <table cellpadding="05">
              <tr>
                <td>
                  <font>Faculty ID&nbsp;:&nbsp;</font>
                </td>
                <td><?php
                    include '../connection.php';
                    $sql = "select f_id from faculty";
                    $result =  mysqli_query($conn, $sql)
                    ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px;">
                    <option selected="selected">Faculty</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                      $category = $row['f_id'];
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
                <td>
                  <input class="submit" type="submit" id="bt" name="view" value="View" /> </td>
              </tr>
            </table>
          </div>
          <br />
          <div class="login1">
            <table cellpadding="05">
              <?php
              if (isset($_POST['view'])) {
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
                <td><input id="in" type="text" readonly name="faid" value="<?php echo $row['f_id']; ?>" /></td>
              </tr>
              <tr>
                <td>
                  <font>Name&nbsp;:&nbsp;</font>
                </td>
                <td><input id="in" type="text" readonly name="faname" value="<?php echo $row['name']; ?>" /></td>
              </tr>
              <tr>
                <td>
                  <font >Qualification&nbsp;:&nbsp;</font> </td> 
                  <td><input id="in" type="text" readonly name="faqualification" value="<?php echo $row['qualification']; ?>" />
                </td>
              </tr>
              <tr>
                <td>
                  <font>Domain&nbsp;:&nbsp;</font>
                </td>
                <td><input id="in" type="text" readonly name="fadomain" value="<?php echo $row['domain']; ?>" /></td>
              <tr>
                <td>
                  <font>Research&nbsp;:&nbsp;</font>
                </td>
                <td><input id="in" type="text" readonly name="faresearch" value="<?php echo $row['research']; ?>" /></td>
              </tr>
              <tr>
                <td>
                  <font>Others&nbsp;:&nbsp;</font>
                </td>
                <td><input id="in" type="text" readonly name="faothers" value="<?php echo $row['others']; ?>" /></td>
              </tr>
              <tr>
                <td colspan="2">
                </td>
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