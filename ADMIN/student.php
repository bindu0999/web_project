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
<body>
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
    <form method="post" action="st.php">
        <div>
            <table cellspacing="01" cellpadding="05">
  <tr>
    <th  scope="col">&nbsp;</th>
    <th  scope="col">&nbsp;</th>
    <th  scope="col">&nbsp;</th>
    <th  scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td ><font> Student ID&nbsp;:&nbsp;</font></td>
    <td><input type="text"  id="in" name="id"/><font color="red" size="4">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td <font> Name&nbsp;:&nbsp;</font></td>
    <td><input type="text"  size="20" id="in" name="stname"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td ><font>Email&nbsp;:&nbsp;</font></td>
    <td><input type="email" id="in" name="stemail"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td ><font >Phone&nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="stphone"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td > <font>Password &nbsp;:&nbsp;</font></td>
    <td><input type="password" id="in" name="stpass"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td ><font >Year&nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="styear"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td ><font>Stream&nbsp;: &nbsp;</font></td>
    <td><select name="stream" style="width: 193px; height: 2em; font-size: 15px;">
         <option value="Selcet">Select</option>
        <option value="CSE">CSE</option>
        <option value="COM">COM</option>
        <option value="EE">EE</option>          
        </select><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr  >
    <td>&nbsp;</td>
    <br/>
    <td colspan="2"><input type="submit"  name="add" value="Add" id="bt" />
    				
    <td>&nbsp;</td>
  </tr>
            </table> <br/><br/>  </div></form>
 <?php
}
elseif($role=="Faculty")    
{
?>
    <?php 
    header('Location:../Admin.php');
    ?>
 <?php
}
else   
{
?>
    <?php 
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
    
    

<p>&nbsp;</p>
