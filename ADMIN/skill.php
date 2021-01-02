<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];



include '../connection.php';


 
   if (isset($_POST['view']))
       {
                    $username=$_POST['id'];
                    $sql1="select * from faculty where f_id ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                    $row=mysqli_fetch_assoc($rec);
       }








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
    <form method="post" action="skill.php">
      <div >
       <table  cellspacing="05" cellpadding="05">
  <tr>
    <td>&nbsp;</td>
    <td ><font >Faculty ID&nbsp;:&nbsp;</font>  </td>
    
    <td><?php
            include '../connection.php';
             $sql="select f_id from faculty";
             $result=  mysqli_query($conn, $sql)
                     ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px;">
                 <option selected="selected">Faculty</option>
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['f_id'];
                     ?>
                 <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>
                     </select>
    </td></tr>
           <tr>
               <td  colspan="3">
                   <input type="submit" id="bt" name="view" value="View" />  </td>
    <td>&nbsp;</td>
  </tr>
       </table>
          </div>
       <br/>
       <div >
       <table   width="40%" cellspacing="05" cellpadding="05">
       <?php
       if (isset($_POST['view']))
       {
                    $username=$_POST['id'];
                    $sql1="select * from faculty where f_id ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                    $row=mysqli_fetch_assoc($rec);
       }
       ?>
       
       <tr>
           <br/>
    <td>&nbsp;</td>
    <td ><font >Faculty ID&nbsp;:&nbsp;</font></td>
    <td><br/><input id="in" type="text" readonly name="faid" value="<?php echo $row['f_id'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td ><font >Name&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" readonly name="faname" value="<?php echo $row['name'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td ><font Qualification&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" readonly name="faqualification" value="<?php echo $row['qualification'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><font >Domain&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" readonly name="fadomain" value="<?php echo $row['domain'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td ><font >Research&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" readonly name="faresearch" value="<?php echo $row['research'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td ><font >Others&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" readonly name="faothers" value="<?php echo $row['others'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr >
    <td>&nbsp;</td>
    <td colspan="2">   				
    <td>&nbsp;</td>
  </tr>
</table>
       </div><br/><br/>
        <br/></div>
  </form>
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
<?php
}
?>
      


