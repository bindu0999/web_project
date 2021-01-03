<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];
if(empty($_SESSION['Email']))
{
header("location:index.php");
}
else
{
if($role=="Admin")
{
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
<br/><br/><br/>
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
    <table  border="1" align="center" bgcolor="red">
            <?php
                echo "<tr>";
                echo "<th>"."Meeting ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Faculty ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Student ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Date"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Time"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Description"."</th>";
                echo "</tr>";
                include './connection.php';
                        $sql1="select * from meeting ";
                        $rec=mysqli_query($conn, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                            echo "<td>".$std['meeting_id']."<td/>";
                            echo "<td>".$std['f_id']."<td/>"; 
                            echo "<td>".$std['s_id']."<td/>"; 
                            echo "<td>".$std['date']."<td/>"; 
                            echo "<td>".$std['time']."<td/>"; 
                            echo "<td>".$std['desc']."<td/>"; 
                            ?>  </tr> <?php 
                        }
            ?>
        </table>
    </form>
 <?php
 
}
elseif($role=="Faculty")    
{
    header('Location:../Admin.php'); 
?>
 <?php
}
else   
{
    header('Location:../Admin.php'); 
?>
      
<?php
}
?>
</table>
<p>
  <?php
}
?>
   