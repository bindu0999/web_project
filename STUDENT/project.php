<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

if (isset($_POST['bppf'])) {
    if (isset($_FILES['ppf'])) {
        $file = $_FILES['ppf'];
        //file properties
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        // work out the extension
        $file_ext = explode('.', $file_name);
        $file_ext =  strtolower(end($file_ext));
        $allowed = array('docx', 'doc', 'txt', 'pdf');

        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size <= 9999999999) {
                    $file_name_new = uniqid('', TRUE) . '.' . $file_ext;
                    $file_destination = '../ppf/' . $file_name_new;
                    if (move_uploaded_file($file_temp, $file_destination)) {
                        //echo $file_destination;
                        include '../connection.php';
                        $sql = "UPDATE project SET ppf='$file_name' WHERE s_id='$user'";
                        mysqli_query($conn, $sql);
                        $conn->close();
                        header('Location:project.php');
                    }
                }
            }
        }
    }
} elseif (isset($_POST['bpsf'])) {
    if (isset($_FILES['psf'])) {
        $file = $_FILES['psf'];
        //file properties
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        // work out the extension
        $file_ext = explode('.', $file_name);
        $file_ext =  strtolower(end($file_ext));
        $allowed = array('docx', 'doc', 'txt', 'pdf');

        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size <= 9999999999) {
                    $file_name_new = uniqid('', TRUE) . '.' . $file_ext;
                    $file_destination = '../psf/' . $file_name_new;
                    if (move_uploaded_file($file_temp, $file_destination)) {
                        //echo $file_destination;
                        include '../connection.php';
                        $sql = "UPDATE project SET psf='$file_name' WHERE s_id='$user'";
                        mysqli_query($conn, $sql);
                        $conn->close();
                        header('Location:project.php');
                    }
                }
            }
        }
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
            <link rel="stylesheet" type="text/css" href="index.css">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

            <title>Project Management System</title>
        </head>
        <div>

            <body>
            <?php
            header('Location:../Admin.php');
        } elseif ($role == "Faculty") {
            header('Location:../Admin.php');
            ?>

            <?php
        } else {
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
                            <li><a href="project.php">Project</a></li>
                            <li><a href="skill.php">View Skill Matrix</a></li>

                            <li><a href="mail.php">Mail</a></li>

                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    <?php
                }
                    ?>
                    </table>
                    <p>
                    <?php
                }
                    ?>


                    </p>


                    <br /><br /><br />
                    <form method="post" action="project.php" enctype="multipart/form-data">

                        <table width="100%" border="0" cellspacing="05" cellpadding="05">
                            <tr>
                                <th width="12%" scope="col">&nbsp;</th>
                                <th width="37%" scope="col">&nbsp;</th>
                                <th width="37%" scope="col">&nbsp;</th>
                                <th width="13%" scope="col">&nbsp;</th>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="center">
                                    <div style="background-color:beige ;"><br />
                                        <h3>Project Proposal</h3><br /><input type="file" name="ppf" /><br /><br /><input class="submit" type="submit" name="bppf" value="upload" /><br /><br />
                                    </div>
                                </td>
                                <td align="center">
                                    <div style="background-color: beige;"><br />
                                        <h3>Project Specification</h3><br /><input type="file" name="psf" /><br /><br /><input class="submit" type="submit" name="bpsf" value="upload" /><br /><br />
                                    </div>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                    </form>
                    </table>
                    <br /><br />
                    <form method="post" action="project.php">
                        <div style="background-color: beige; width: 30%; margin-left: 35%">
                            <table align="center">
                                <tr>
                                    <td>&nbsp;<br /><br /></td>
                                    <?php
                                    if (isset($_POST['feedback'])) {
                                        include '../connection.php';
                                        $sql1 = "select * from project where s_id ='$user' ";
                                        $rec = mysqli_query($conn, $sql1);

                                        while ($std = mysqli_fetch_assoc($rec)) {
                                    ?>

                                            <td colspan="2" align="center"><textarea name="feedback" rows="5" cols="30" readonly="readonly" placeholder="FEEDBACK"><?php echo $std['remark']; ?> </textarea> </td>
                                            <td></td>
                                </tr>
                        <?php
                                        }
                                    } ?>
                        <tr>
                            <td></td>
                            <th colspan="1" scope="col">
                            <td><input class="submit" type="submit" name="feedback" value="Get Feedback" /><br /><br /></td>
                            </td>
                        </tr>
                    </form>

                    </table>
                </div>
            </body><br /><br />
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        </body>
        </div>

        </html>