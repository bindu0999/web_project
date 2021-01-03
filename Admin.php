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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="index.css">
<title>Project Management System</title>
</head>
<div>
<body>
<font class="heading">Project Managenent System</font>
<br/><br/><br/>
<ul>
<li><a href="ADMIN/student.php">Add Student</a></li>
<li><a href="ADMIN/faculty.php">Add Faculty</a></li>
<li><a href="ADMIN/stsearch.php">Search Student</a></li>
<li><a href="ADMIN/fa_search.php">Search Faculty </a></li>
<li><a href="ADMIN/allocate.php">Allocate</a></li>
<li><a href="ADMIN/skill.php">Skill Matrix</a></li>
<li><a href="ADMIN/report.php">Reports</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>   
 <?php
}
elseif($role=="Faculty")    
{
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="index.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>Project Management System</title>
</head>
<div>
<body>
<font class="heading">Project Managenent System</font>
<br/><br/><br/>
  <ul>
      <li><a href="FACULTY/skill.php">Skill Matrix</a></li>
      <li><a href="FACULTY/view.php">View</a></li>
      <li><a href="FACULTY/mail.php">Mail</a></li>
      <li><a href="FACULTY/meeting.php">Meeting</a></li>
      <li><a href="FACULTY/#">Reprots</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>
 <?php
}
else   
{
?>
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="index.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>Project Management System</title>
</head>
<div>
<body>
<font class="heading">Project Managenent System</font>
<br/><br/><br/>
<ul>
      
    <li><a href="STUDENT/project.php">Project</a></li>
    <li>&nbsp;</th>
    <li><a href="STUDENT/skill.php">View Skill Matrix</a></li>
    <li>&nbsp;</li>
    <li><a href="STUDENT/mail.php">Mail</a></li>
    <li>&nbsp;</li>
    <li><a href="logout.php">Logout</a></li>
    <li>&nbsp;</li>
</ul>
  
       

<?php
}
?>

<p>
  <?php
}
?>
    
    
</p>

  
</table></body>