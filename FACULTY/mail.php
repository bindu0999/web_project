<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];
include '../connection.php';
if (isset($_POST['submit'])) {
 $to = $_POST['student'];
 $msg = $_POST['msg'];
 if (!empty($to)) {
  $sql = "INSERT INTO `pms`.`mail` (`mail_id`, `s_id`, `f_id`, `msg`) VALUES ('', '$to', '$user', '$msg');";
  mysqli_query($conn, $sql);
  $conn->close();
  header('Location:mail.php');
 } else {
  echo 'Please fill up all fields';
  header('Location:mail.php');
 }
}
if (empty($_SESSION['Email'])) {
 header("location:index.php");
} else {
 if ($role == "Admin") {
  header("location:../Admin.php?image=image.php");
?>
 <?php
 } elseif ($role == "Faculty") {
 ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
   <link rel="stylesheet" type="text/css" href="../index.css">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Project Management System</title>
  </head>

  <body class="sub2">
   <font class="heading">Project Managenent System</font>
   <br /><br /><br />
   <ul>
    <li><a href="skill.php">Skill Matrix</a></li>
    <li><a href="view.php">View</a></li>
    <li><a href="mail.php">Mail</a></li>
    <li><a href="meeting.php">Meeting</a></li>
    <li><a href="report.php">Reprots</a></li>
    <li><a href="../logout.php">Logout</a></li>
   </ul>
   </table>
   <bt /><br /><br />
   <form method="post" action="mail.php">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
     <tr bgcolor="white">
      <th>
       <h4>&nbsp;</h4>
      </th>
      <th><input class="submit" style="width: 6em;  height: 2.5em; font-size: 15px;" type="submit" value="Compose" name="compose" /></th>
      <th>&nbsp;</th>
      <th><input class="submit" style="width: 6em;  height: 2.5em; font-size: 15px;" type="submit" value="Inbox" name="inbox" /></th>
      <th>&nbsp;</th>
      <th><input class="submit" style="width: 6em;  height: 2.5em; font-size: 15px;" type="submit" value="Sent Mail" name="sent" /></th>
      <th>&nbsp;</th>
     </tr>
     <?php
     if (isset($_POST['compose'])) {
      $sql1 = "select * from project where s_id ='$user' ";
      $rec = mysqli_query($conn, $sql1);
      $std = mysqli_fetch_assoc($rec);
     ?>
      <tr>
       <td colspan="2">&nbsp;</td>
       <td colspan="3" align="center">
        <br /><br />
        <div style="background-color: beige; width: 40%; margin-left: 5%; border: black;">
         <br /><br />
         <font size="5"> TO: </font><input id="in" type="text" name="from" value="<?php echo $user; ?>" readonly /><br /><br />
         <?php
         include '../connection.php';
         $sql = "select s_id from project where f_id='$user';";
         $result =  mysqli_query($conn, $sql)
         ?> 
          
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
           $category = $row['s_id'];
          ?>
           <option selected="selected" value="<?php echo $category; ?>"><?php echo $category; ?></option>
          <?php
          }
          ?>
         </select>
         <br /><br />
         <font size="5"> From : </font><input id="in" type="text" name="from" value="<?php echo $user; ?>" readonly /><br /><br />
         <textarea name="msg" cols="35" rows="5" placeholder="Message"></textarea><br /><br />
         <input id="bt" type="submit" value="Send" name="submit" />
         <br /><br />
        </div>
       </td>
       <td colspan="2">&nbsp;</td>
      </tr>
     <?php
     } elseif (isset($_POST['inbox'])) {
     ?>
      <?php
      echo '<table width="40%" cellpadding="05" cellspacing="01" border="0" align="center" bgcolor="red">';
      echo "<br/>";
      echo "<br/>";
      echo "<br/>";
      echo "<tr>";
      echo "<th>" . "FROM" . "</th>";
      echo "<th>";
      echo "</th>";
      echo "<th>" . "MESSAGE" . "</th>";
      echo "</tr>";
      $sql1 = "select * from st_mail where f_id ='$user'";
      $rec = mysqli_query($conn, $sql1);
      while ($std = mysqli_fetch_assoc($rec)) {
       echo '<tr bgcolor="beige" align="center">';
       echo "<td>" . $std['s_id'] . "<td/>";
       echo "<td>" . $std['msg'] . "<td/>";
       echo "</tr>";
      }
      echo " </table>";
      echo "<p>".$sql1."</p>";
      ?> <?php
        } elseif (isset($_POST['sent'])) {
         ?>
   <?php
         echo '<table width="40%" cellpadding="0" cellspacing="2" border="0" align="center" bgcolor="red">';
         echo "<br/>";
         echo "<br/>";
         echo "<br/>";
         echo "<tr>";
         echo "<th>" . "TO" . "</th>";
         echo "<th>";
         echo "</th>";
         echo "<th>" . "MESSAGE" . "</th>";
         echo "</>";
         $sql1 = "select * from mail where f_id ='$user' ";
         $rec = mysqli_query($conn, $sql1);
         echo "<tr>";
         while ($std = mysqli_fetch_assoc($rec)) {
          echo '<tr bgcolor="beige" align="center">';
          echo "<td>" . $std['s_id'] . "<td/>";
          echo "<td>" . $std['msg'] . "<td/>";
          echo "</tr>";
         }
         echo "</table> ";
        }
        echo "</form>";
       } else {
        header("location:../Admin.php?image=image.php");
       }
      }
   ?>