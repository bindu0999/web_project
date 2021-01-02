<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];


include '../connection.php';
if(isset($_POST['update']))
{
           $domain=$_POST['domain'];
           $research=$_POST['research']; 
           $others=$_POST['others'];
           
           if (!empty($domain)|| !empty($research)||!empty($others))
           {
              
            $sql= "UPDATE `pmas`.`faculty` SET `domain` = '$domain', `research` = '$research', `others` = '$others' WHERE `faculty`.`f_id` = '$user';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:skill.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:skill.php');
        }  
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
<head><link rel="stylesheet" type="text/css" href="../index.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Project Management System</title>
</head>
<div>
    <body>
<?php
   header('Location:../Admin.php');
   ?>
 <?php
}
elseif($role=="Faculty")    
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
    <li><a href="skill.php">Skill Matrix</a></li>
    <li><a href="view.php">View</a></li>
    <li><a href="mail.php">Mail</a></li>
    <li><a href="meeting.php">Meeting</a></li>
    <li><a href="#">Reprots</a></li>
    <li><a href="../logout.php">Logout</a></li>
</ul>
  
  </table>
      <form action="skill.php" method="post">
          <div >
              <br/>
              <table   cellspacing="05" cellpadding="05" align="center" width="100%">
    <tr>
      <td>&nbsp;</td>
      <td ><font >Domain : </font></td>
      <td><input id="in" type="text" name="domain"/><font color="red">*</font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td ><font >Research : </font></td>
      <td><input id="in" type="text" name="research"/><font color="red">*</font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><font Other Skill (s) if any : </font></td>
      <td><input id="in" type="text" name="others"/></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
        <td colspan="4" align="center"><input id="bt" type="submit" name="update" value="Update" /></td>
    </tr>
  </table>
          </div>
  </form>
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
    
    
    
  </p>
  <p>&nbsp;</p>
    </body>
